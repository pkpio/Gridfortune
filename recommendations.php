<?php

$id = 1234;

$time = time() - 86400; 

/////////////////////// Connect to MySQL /////////////////////
	
	$con = mysql_connect("localhost","root","");
	
	if (!$con){
		die('Could not connect: ' . mysql_error());
		}

	mysql_select_db("spatchaker", $con); 
	

		$sql = "SELECT * FROM matches WHERE id_1 = '$id' OR id_1 = '$id' AND date > '$time' ORDER BY date";
		
		$res = mysql_query($sql) or die("Query failed with error: ".mysql_error());
		
		while($row = mysql_fetch_array($res)){
		
		echo $row['sport'];
		
		}
		
		

?>
