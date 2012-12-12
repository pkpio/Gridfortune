<?php 

	$id = 1234;
	
	/////////////////////// Connect to MySQL /////////////////////
	
	$con = mysql_connect("localhost","root","");
	if (!$con){
		die('Could not connect: ' . mysql_error());
		}

	mysql_select_db("spatchaker", $con);
	
	////////////////////// Put the form data in the database ////////////////////////
	
	$sport = $_REQUEST["sport"];
	$time_start_1 = $_REQUEST["time_start"];
	$time_end_1 = $_REQUEST["time_end"];
	$date = strtotime($_REQUEST["date"]);
	$timestamp = time();
	
	$base = strtotime("00:00");
	$time_start_1 = strtotime($time_start_1)- $base;
	$time_end_1 = strtotime($time_end_1) - $base;

	echo $sport;
	echo $timestamp;
	echo $date;
	
	$sql="INSERT INTO request (id, sport, time_start, time_end, date , timestamp) VALUES('$id','$sport','$time_start_1','$time_end_1','$date','$timestamp')";

	if (!mysql_query($sql,$con)){
		die('Error: ' . mysql_error());
    }
	else {
		echo "1 record added";
	}
	
	
	$count = mysql_insert_id();
	
	$request_seq_1 = $count;
	
	////
	
	/*
	
	All these variables are brought in from databases and given the following names
	
		                 Variables of user 1                 Variables of user 2
						 
		seq. no. of req.	seq_1								seq_2
		id					id_1								id_2
		sport				sport								sport
		time_start			time_start_1    					time_start_
		time_end			time_end_1							time_end_2
		date				date_1								date_2
		year				year_1								year_2		
		department			department_1						department_2						
		gender				gender_1							gender_2							
		hostel				hostel_1							hostel_2												
		rating_level		rating_level_1						rating_level_2
		time stamps			time_1								time_2

	*/
	
	$query_1 = "SELECT * FROM my_members WHERE id = '$id'";
	$res_1 = mysql_query($query_1);
	$result_1 = mysql_fetch_array($res_1);
	

	$id_1 = $id;
	$year_1	= $result_1['year'];
	$department_1 = $result_1['department'];
	$gender_1 = $result_1['gender'];
	$hostel_1 = $result_1['hostel'];
	
	if($sport == 1 ) {
		$rating_level_1 = $result_1['tennis_level'];
	}
	else if($sport == 2){
		$rating_level_1 = $result_1['table_tennis_level'];
	}
	else if($sport == 3){
		$rating_level_1 = $result_1['squash_level'];
	}
	else if($sport == 4){
		$rating_level_1 = $result_1['baddy_level'];
	}
	
	
	
	echo $department_1;
	
		
	
	
	
	//////////////////////////////////////////////////////////////////////////////////
	
	
	$time = time();
	
	$int_1 = mysql_query("SELECT * FROM request WHERE date > '$time' AND id != '$id_1'");


	
while($row = mysql_fetch_array($int_1)){


		$request_seq_2 = $row['seq'];
		$id_2 = $row['id'];
		$sport_2 = $row['sport'];
		$time_start_2 = $row['time_start'];
		$time_end_2 = $row['time_end'];
		$date_2 = $row['date'];
		$time_2 = $row['timestamp'];
		
		///
		
		$query_2 = "SELECT * FROM my_members WHERE id = '$id_2'";
		$res_2 = mysql_query($query_2);
		$result_2 = mysql_fetch_array($res_2);
		

			
		$year_2	= $result_2['year'];
		$department_2 = $result_2['department'];
		$gender_2 = $result_2['gender'];
		$hostel_2 = $result_2['hostel'];
		
		if($sport == 1 ) {
			$rating_level_2 = $result_2['tennis_level'];
		}
		else if($sport == 2){
			$rating_level_2 = $result_2['table_tennis_level'];
			}
		else if($sport == 3){
			$rating_level_2 = $result_2['squash_level'];
		}
		else if($sport == 4){
			$rating_level_2 = $result_2['baddy_level'];
		}
		
		
		
		/* Test for time ---
		
		Time1		|_____________|
		Time2			|________________|
							
		Time1		|__________|
		Time2			           |________________|
		
		Time1		|__________________|
		Time2		       |_________|
		
		the fraction of the time common is taken as the measuring parameter
		
		*/
						
			

		
		if( ($time_start_1 < $time_start_2)  && ($time_start_2 < $time_end_1)  && ($time_end_1 < $time_end_2) ) {
		
			$fraction = ($time_end_2-$time_start_1)/($time_end_2-$time_start_1);
		}
		else if (($time_start_1 < $time_end_1)  && ($time_end_1 < $time_start_2)  && ($time_start_2 < $time_end_2)){
		
			$fraction = ($time_start_2-$time_end_1)/($time_end_2-$time_start_1);
		}
		else if ( ($time_start_1 < $time_start_2)  && ($time_start_2 < $time_end_2)  && ($time_end_2 < $time_end_1) ){
		
			$fraction = ($time_end_2-$time_start_2)/($time_end_1 - $time_start_1);
			
		}
		else if( ($time_start_2 < $time_start_1)  && ($time_start_1 < $time_end_2)  && ($time_end_2 < $time_end_1) ) {
		
			$fraction = ($time_end_1-$time_start_2)/($time_end_1-$time_start_2);
		}
		else if (($time_start_2 < $time_end_2)  && ($time_end_2 < $time_start_1)  && ($time_start_1 < $time_end_1)){
		
			$fraction = ($time_start_1-$time_end_2)/($time_end_1-$time_start_2);
		}
		else if ( ($time_start_2 < $time_start_1)  && ($time_start_1 < $time_end_1)  && ($time_end_1 < $time_end_2) ){
		
			$fraction = ($time_end_1-$time_start_1)/($time_end_2 - $time_start_2);
			
		}
		
		// Final timings decided
		
		$time_start = abs($time_start_1 - $time_start_2)/2;
		
		$time_end = abs($time_end_1 - $time_end_2)/2;
		
		
		/////
		$year_diff = abs($year_1 - $year_2);
		
		
		if($year_diff == 0){
			$year_score = 30;
			}
		else if($year_diff == 1){
			$year_score = 20;
			}
		else if($year_diff == 2){
			$year_score = 10;
			}
		else if($year_diff == 3){
			$year_score = -10;
			}
		else if($year_diff == 4){
			$year_score = -40;
			}
		
		
		/////
		
		//////
		if($department_1 == $department_2) {
			$department_diff = 0;
		}
		else {
			$department_diff = 1;
		}
		//////
		
		//////
		if($gender_1 == $gender_2) {
			$gender_diff = 0;
		}
		else {
			$gender_diff = 1;
		}
		//////
		
		//////
		if($hostel_1 == $hostel_2) {
			$hostel_diff = 0;
		}
		else {
			$hostel_diff = 1;
		}
		
		
		//////
		
		$rating_diff = abs($rating_level_1 - $rating_level_2);
		
		
		
		if($rating_diff < 1){
			$rating_score = 60;
			}
		else if($rating_diff < 2){
			$rating_score = 20;
			}
		else if($rating_diff < 3){
			$rating_score = -20;
			}
		else if($rating_diff < 4){
			$rating_score = -70;
			}
		else if($rating_diff < 5){
			$rating_score = -120;
			}
			
		
		//////
		$score = $fraction - 100*$gender_diff + 30*(!$department_diff) + 30*(!$hostel_diff) + $year_score  + $rating_score;
		
		echo $fraction;
		echo "*";
		echo $score;
		echo "***";
		
		if($score > 100 ){
		
		$sql="INSERT INTO matches 
		
		(id_1, id_2, request_seq_1, request_seq_2, sport, time_start, time_end, date , score, time) 
		
		VALUES('$id_1','$id_2','$request_seq_1','$request_seq_2','$sport','$time_start','$time_end','$date','$score','$time')";
		
		// $tron = mysql_query($sql);
		
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else {
			echo "1 record added";
		}
		
		}
		
		}	
?>
	
	