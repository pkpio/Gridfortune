<?php
require_once 'functions.php';

// Delcare dome global variables for passing data over various functions...remove these comments once done ;)

$filename = null;
$tableName = null;

$g_elem = null;

$use1 = null;
$use2 = null;
$use3 = null;

$duration = null;
$start = null;
$value = null;
$cost = null;
$blockDuration = null;
$blockStart = null;
  
function startElement( $parser, $name, $attrs ) {
  
  global $g_books, $g_elem, $use1, $use2, $use3;
  
  if ( $name == 'entry' ){
	  $use1 = null;
	  $use2 = null;
	  $use3 = null;
	}
  if ( $name == 'interval' ){
	  $use1 = 1;
	  $use2 = null;
	  $use3 = null;
	}
  if ( $name == 'timePeriod' ){
	  $use1 = null;
	  $use2 = 1;
	  $use3 = null;
	}
  if ( $name == 'IntervalReading' ){
	  $use1 = null;
	  $use2 = null;
	  $use3 = 1;
	}
		  
	  $g_elem = $name;
		  
}
  
function endElement( $parser, $name ) 
  {
  global $g_elem;
  $g_elem = null;
  }
  
function textData( $parser, $text ){
  global $g_books, $g_elem, $use1, $use2, $use3, $duration, $start, $value, $cost, $blockDuration, $blockStart;
  
  
  //Use 1.....
  
  
  if ($g_elem == 'start' && $use1 == 1) $blockDuration = $text;
  
  if ($g_elem == 'duration' && $use1 == 1) $blockStart = $text;
  
  //Use 2.....
  
  if ($g_elem == 'start' && $use2 == 1) $start = $text;
  
  if ($g_elem == 'duration' && $use2 == 1) $duration = $text;
  
  //Use 3.....
  
  if ($g_elem == 'value' && $use3 == 1) $value = $text;
  
  if ($g_elem == 'cost' && $use3 == 1) $cost = $text;
  
  
  //dbUpdate data...
  if(!empty($duration) && !empty($start) && !empty($blockDuration) && !empty($blockStart)){
	  //Temp dummy
	  $title ='';
	  $subtitle = '';
	  $updated = '';
	  $published = '';
	  
  global $filename, $tableName;
  
	$tempDate = getdate((int)$start);
	$weekNum=$tempDate['wday']+1;
	  
	  $sql = "INSERT INTO ".$tableName." (userid, filename, duration, start, value, cost, weeknum, blockduration, bloackstart, title, subtitle, updated, published) 
	VALUES ('{$_SESSION['user_id']}','$filename','$duration','$start','$value','$cost','$weekNum','$blockDuration','$blockStart','$title','$subtitle','$updated','$published')";
	dbQuery($sql);
	
	
  }
  
}


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
 

function dbUpdate($filename1,$extra,$dirRef){
	
  global $filename, $tableName;
  $filename = $filename1;  
  
  $filenameOpen = $dirRef.$_SESSION['user_id'].'/'.$filename;//For actual path
  	

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
	
  
  $parser = xml_parser_create();
  
  xml_set_element_handler( $parser, "startElement", "endElement" );
  xml_set_character_data_handler( $parser, "textData" );
  xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
  
  $f = fopen( $filenameOpen, 'r' );
  
  while( $data = fread( $f, 4096 ) )
  {
  xml_parse( $parser, $data );
  }
  
  xml_parser_free( $parser );
  
  //Updating table and associated file details in users files field..1st getting filelist in db and then appending current file..
	
	dbConnect();
	
// we could probably write our new btach sql update lines here....

//That coud probably save some of the sql query time .... Best optimised as far as I believe!	

// for this to work we would probably be need to usimg global variables for the functions...,ay be an array not more..
		
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
  