<?php

//turn on error reporting first
error_reporting(E_ALL); 

	// $id = $_COOKIE['userid'];
	$id = 1011823732;
	
	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("spatchaker", $con);
//	include_once("connect_to_mysql.php");
	
	// Copy the post variables into normal non-array
	
	//if (isset($_REQUEST['submit'])){
	
     $year = $_REQUEST['year'];
	 $department = $_REQUEST['department'];
	 $hostel = $_REQUEST["hostel"];
	 $about_me = $_REQUEST["about_me"];
	 
	 $tennis = $_REQUEST["tennis"];
	 $table_tennis = $_REQUEST["table_tennis"];
	 $squash = $_REQUEST["squash"];
	 $baddy = $_REQUEST["baddy"];
	 
	 $tennis_level = $_REQUEST["tennis_level"];
	 $table_tennis_level = $_REQUEST["table_tennis_level"];
	 $squash_level = $_REQUEST["squash_level"];
	 $baddy_level = $_REQUEST["baddy_level"];
	 

	 


$sql = "UPDATE my_members SET year = $year, department = $department, hostel = $hostel, about_me = $about_me, tennis = $tennis,
 table_tennis = $table_tennis, squash = $squash, baddy = $baddy, tennis_level = $tennis_level, table_tennis_level = $table_tennis_level, squash_level = $squash_level, baddy_level = $baddy_level WHERE id='$id'";
 
 $result=mysql_query($sql,$con)or die("Query sending failed: ".mysql_error());

// Testing 

// if successfully updated.
if($result){
echo "Successful";
echo "<BR>";
}

else {
echo "ERROR";
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Redirect the user back.

?>