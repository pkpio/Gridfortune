<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
</head>



	<?php echo $_REQUEST["time_start"]; ?>
	<br />

	<?php echo $_REQUEST["time_end"]; ?>
	<br />

	<?php echo $_REQUEST["date"]; ?>

	<?php 
	// 	$id = $_COOKIE['user'];

		$time = time();
		
		$id = 2345;
		
		$sport = $_REQUEST["sport"];
		$time_start = $_REQUEST["time_start"];
		$time_end = $_REQUEST["time_end"];
		$date = strtotime($_REQUEST["date"]);
		$base = strtotime("00:00");
		$time_start = strtotime($time_start)- $base;
		$time_end = strtotime($time_end) - $base;
	
		
		$timestamp = time();
				
		$con = mysql_connect("localhost","root","");
		
		if (!$con)
			{
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("spatchaker", $con);
		
		
		


		mysql_query("INSERT INTO request 
		(id, sport, time_start, time_end, day, timestamp) VALUES('$id', '$sport', '$time_start', '$time_end', '$date', '$timestamp' ) ") 
		or die(mysql_error());
		
		/// Bring in the data of the person who's put in the request
		
		$query = "SELECT * FROM my_members WHERE id = '$id' ";
		$result = mysql_query($query);
		$userdata = mysql_fetch_array($result);
		
		$year_1 = $userdata['year'];
		$department_1 = $userdata['department'];
		$gender_1 = $userdata['gender'];
		
		if( $sport == 1 ) {
			$rating_level_1 = $userdata['tennis_level'];
			}
		else if( $sport == 2 ) {
			$rating_level_1 = $userdata['table_tennis_level'];
			}
		else if( $sport == 3 ) {
			$rating_level_1 = $userdata['squash_level'];
			}
		else if( $sport == 4 ) {
			$rating_level_1 = $userdata['baddy_level'];
			}
			
			
		
		
		/*
		
			                 Variables of user 1                 Variables of user 2
						 
		seq. no. of req.	seq_1								seq_2
		id					id_1								id_2
		sport				sport_1								sport_2
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
		
		////////// Comparision of requests
		
	

				
		$time = time();
		
		$query_1 = "SELECT * FROM request WHERE day > '$time' ORDER BY 'timestamp' ";
		$res_1 = mysql_query($query_1) or die("Query failed with error: ".mysql_error());
		
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}
		
		$result_1 = mysql_fetch_array($res_1);
		
		while($row = mysql_fetch_array($result_1)){
			$seq_1 = $row['seq'];
			$id_1 = $row['id'];
			$sport_1 = $row['sport'];
			$time_start_1 = $row['time_start'];
			$time_end_1 = $row['time_end'];
			$date_1 = $row['date'];
			$time_1 = $row['time'];
			
			
			//// Get the general data of the second user.
			
			
			$query_1 = "SELECT * FROM my_members WHERE id = '$id_1' ";
			$result_2 = mysql_query($query_1);
			$userdata_1 = mysql_fetch_array($result_2);
			
			$year_2 = $userdata_1['year'];
			$department_2 = $userdata_1['department'];
			$gender_2 = $userdata_1['gender'];
			
			if( $sport == 1 ) {
				$rating_level_2 = $userdata_1['tennis_level'];
			}
			else if( $sport == 2 ) {
				$rating_level_2 = $userdata_1['table_tennis_level'];
			}
			else if( $sport == 3 ) {
				$rating_level_2 = $userdata_1['squash_level'];
			}
			else if( $sport == 4 ) {
				$rating_level_2 = $userdata_1['baddy_level'];
			}
			
			
			
			
			
			
				$timediff1 = abs(time_start_1-time_start_2)/60;
				$timediff2 = abs(time_end_1-time_end_2)/60;
				
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
				
				$rating_diff = abs(rating_level_1 - rating_level_2);
				
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
				
				
				
				////// score calculator 
				
				$score = -4*$timediff1 -2*timediff2 - 100*$gender_diff + 30*(!$department_diff) + 30*(!$hostel_diff) + $year_score + $rating_score; 
				
				//// classify the matches according to how good it is 
				
				//// class 1 --- Near Ideal 
				
				//// same starting time, no gender diff ... same year, ratingdiff < 1, SCORE = 60
				
				//// class 2 --- SCORE between 0 and 60 Pretty good
				
				//// class 3  --- SCORE between -50 and 0
				
				//// class 4  --- SCORE between -50 and 0
				
				//// class 5  --- SCORE between -125 and -50
				
				// Else, trash data ....
				
				if($score > 60){
					$category = 1;
				}
				else if($score > 0){
					$category = 20;
				}
				else if($score > -10 ){
					$category = -20;
				}
				else if($score > -50 ){
					$category = -70;
				}
				else if($score > -90 ){
					$category = -120;
				}
			
			
			
		
		
		}
	
		
		





	?>

	

<body>
</body>
</html>