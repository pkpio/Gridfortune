<?php
require_once 'functions.php';

function updateNewFiles($dirRef){
	//getting file list in the directory...$dirRef for making this function to be able to call from any file
	//$dirRef='../upload/server/php/files/';
	$dir = $dirRef.$_SESSION['user_id'].'/';
	if ($handle = opendir($dir)) {
		$i=0;
    	while (false !== ($entry = readdir($handle))) {
        	if ($entry != "." && $entry != ".." && $entry != '.htacess.txt') {
            $folderFile[$i] = $entry;
			$i++;
        	}
    	}
    closedir($handle);
	}
	
	//Getting his file list from database
	dbConnect();	
	$sql = "SELECT user_files
	FROM tbl_users
	WHERE user_id = '{$_SESSION['user_id']}'";
	$result = mysql_query($sql) or die("error fetching details." . mysql_error());
	$filesdata = mysql_fetch_assoc($result);
	
	$dbFile = explode("/", $filesdata['user_files']);
	for($i=0;$i<sizeof($folderFile);$i++){
		$match=0;
		for($j=0;$j<sizeof($dbFile);$j++){
			if($dbFile[$j]==$folderFile[$i]){
				$match=1;
			}
		}
		if($match==0){
			dbUpdate($folderFile[$i],$i,$dirRef);
		}
	}
}

function dbUpdate($filename,$extra,$dirRef){
	$filenameOpen = $dirRef.$_SESSION['user_id'].'/'.$filename;//For actual path
	$xml=simplexml_load_file($filenameOpen);	
	$p =0;

	/* For each <character> node, we echo a separate <name>. */

	//Getting feed title and other minor data
	$title = $xml->title;
	$subtitle = $xml->entry->title;
	foreach ($xml->entry as $entry) {
	$updated = $entry->updated;
	$published = $entry->published;
	}


	//Main data looping
	foreach ($xml->entry as $entry) {
	foreach ($entry->content as $content) {
	foreach ($content->IntervalBlock as $intervalBlock) {
	foreach ($intervalBlock->IntervalReading as $intervalReading) {
	$p++;
	$duration[$p]=$intervalReading->timePeriod->duration;
	$start[$p]=$intervalReading->timePeriod->start;
	$value[$p]=$intervalReading->value;
	$cost[$p]=$intervalReading->cost;
	$blockDuration[$p]=$intervalBlock->interval->duration;
	$blockStart[$p]=$intervalBlock->interval->start;
	//Extracting week number for each start
	//(int) to convert string to int
	$tempDate = getdate((int)$start[$p]);
	$weekNum[$p]=$tempDate['wday']+1;
	}
	}
	}
	}
		
	dbConnect();	
	//Creating Table...
	$utc = time();//For unique table name we are using utc value
	$tableName = 'gbdata_'.$_SESSION['user_id'].'_'.$utc.$extra;
	$sql = "CREATE TABLE ".$tableName."
	(
	id int(10) NOT NULL auto_increment,
	userid int,
	filename varchar(80),
	duration int,
	start int,
	value int,
	cost int,
	weeknum int(1),
	blockduration int,
	bloackstart int,
	title varchar(60), 
	subtitle varchar(60),
	updated varchar(50), 
	published varchar(50),  
	PRIMARY KEY (id),
	UNIQUE id (id)
	)";
	dbQuery($sql);

	//Inserting Data..
	for($k=1;$k<sizeof($blockStart);$k++){//
	$sql = "INSERT INTO ".$tableName." (userid, filename, duration, start, value, cost, weeknum, blockduration, bloackstart, title, subtitle, updated, published) 
	VALUES ('{$_SESSION['user_id']}','$filename','$duration[$k]','$start[$k]','$value[$k]','$cost[$k]','$weekNum[$k]','$blockDuration[$k]','$blockStart[$k]','$title','$subtitle','$updated','$published')";
	dbQuery($sql);
	}
	
	//Updating table and associated file details in users files field..1st getting filelist in db and then appending current file..
	
	dbConnect();	
	$sql = "SELECT user_files, user_tables
	FROM tbl_users
	WHERE user_id = '{$_SESSION['user_id']}'";
	$result = mysql_query($sql) or die("error fetching details." . mysql_error());
	$userdata = mysql_fetch_assoc($result);
	
	$newTables	 = $userdata['user_tables'].'/'.$tableName.'='.$filename;
	$newFilelist = $userdata['user_files'].'/'.$filename;
	
	mysql_query("UPDATE tbl_users SET user_tables='$newTables', user_files = '$newFilelist'
	WHERE user_id='{$_SESSION['user_id']}'");
}
?>