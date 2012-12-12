<?php
require_once '../../../require/functions.php';
$sql = "SELECT duration, start, value
	FROM gbdata_14_13359940610
	WHERE userid = '{$_SESSION['user_id']}'";
	$result = mysql_query($sql) or die("error fetching details." . mysql_error());
	
	$i = 0;
	while($graphData = mysql_fetch_array($result)) {
		$duration[$i] = $graphData['duration'];
		$value[$i]	= $graphData['value'];
		$start[$i]	= $graphData['start'];
		$datetime = getdate($start[$i]);
		$startMins[$i] = $datetime['minutes'];
		$startHrs[$i] = $datetime['hours'];
		//echo $startHrs[$i].'<br>';
		//echo $duration[$i].'<br/>';
		$i++;
	}
	echo '<br><br><br>';
		
	for($i=0;$i<24;$i++){
		$plotValue[$i] = 0;
		$count[$i] = 0;	
	}
	
		$temptime = 0;
	
	for($i=0;$i<sizeof($value);$i++){
		if($startHrs[$i]==$temptime){
			$plotValue[$temptime]+=$value[$i];
			$count[$temptime]++;
		}
		else{
			$temptime++;
		}
	}
	
	for($i=0;$i<24;$i++){
		if($count[$i]!=0){
			$plotValue[$i]=$plotValue[$i]/$count[$i];
			$plotValueExpected[$i]=$plotValue[$i]*2;
			$plotValueHigh[$i]=$plotValue[$i]/3;
			//echo $plotValue[$i].'<br/>';
		}
		else{
			$plotValue[$i]=0;
			$plotValueExpected[$i]=200;
			$plotValueHigh[$i]=643;
			//echo $plotValue[$i].'<br/>';
		}
	}
						
?>







<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="../js/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="../js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'spline'
					},
					title: {
						text: 'Wind speed during two days'
					},
					subtitle: {
						text: 'October 6th and 7th 2009 at two locations in Vik i Sogn, Norway'
					},
					xAxis: {
						title: {
							text: 'Time (hours)'
						},
						type: 'datetime'
					},
					yAxis: {
						title: {
							text: 'Usage (kWh)'
						},
						min: 0,
						minorGridLineWidth: 0, 
						gridLineWidth: 0,
						alternateGridColor: null,
						
					},
					tooltip: {
						formatter: function() {
				                return ''+
								Highcharts.dateFormat('%e. %b %Y, %H:00', this.x) +': '+ this.y +' m/s';
						}
					},
					plotOptions: {
						spline: {
							lineWidth: 4,
							states: {
								hover: {
									lineWidth: 5
								}
							},
							marker: {
								enabled: false,
								states: {
									hover: {
										enabled: true,
										symbol: 'circle',
										radius: 5,
										lineWidth: 1
									}
								}	
							},
							pointInterval: 3600000, // one hour
							pointStart: Date.UTC(2009, 9, 6, 0, 0, 0)
						}
					},
					series: [{
						name: 'Actual use',
						data: [
						<?php 
						for($j=0;$j<23;$j++){
						echo $plotValue[$j].', ';
						}
						echo $plotValue[23];
						?>]
				
					},{
						name: 'Unsually high use',
						data: [
						<?php 
						for($j=0;$j<23;$j++){
						echo $plotValueHigh[$j].', ';
						}
						echo $plotValueHigh[23];
						?>]
					},{
						name: 'Expected use range',
						data: [
						<?php 
						for($j=0;$j<23;$j++){
						echo $plotValueExpected[$j].', ';
						}
						echo $plotValueExpected[23];
						?>]
					}]
					,
					navigation: {
						menuItemStyle: {
							fontSize: '10px'
						}
					}
				});
				
				
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
		
				
	</body>
</html>
