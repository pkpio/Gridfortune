<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request a match.</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<link href="form.css" rel="stylesheet" type="text/css" />
	
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){
			
	
				// Datepicker
				$('#date').datepicker({
					inline: true
				});
				
				// Time Picker.
				$('#time_start').timepicker({
	hourGrid: 4,
	minuteGrid: 10
});
				// Time Picker.
				$('#time_end').timepicker({
	hourGrid: 4,
	minuteGrid: 10
});
				
			});
		</script>
		<style type="text/css">
			/*demo page css*/
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
		#retain {
	font-size: 11pt;
}
        </style>	
	</head>

<body>

<div class="main">
<div class="box">

<form name = 'fs' action="http://localhost/app/compare_requests.php" target="_top" method="post">

<label>
  <span>Select the sport you wish to play</span>
    
      <select class="input-text" name="sport" id="sport">
        <option value="1">Tennis</option>
        <option value="2">Table Tennis</option>
        <option value="3">Squash</option>
        <option value="4">Baddy</option>
        </select>
      <br />
      <br />
      <br />
</label>
    <label>
    <span>During these times</span>
  
    
      <input class="input-text" name="time_start" type="text" id="time_start" size="5" maxlength="5" />
      </label>
      <label>
   <span> to </span>
    
    <input class="input-text" name="time_end" type="text" id="time_end" size="5" maxlength="5" />
    <br />
    <br />
    <br />
    </label>
    
    <label>
    <span>On </span>
   
      <input type="text" name="date" id="date" />
      <br />
      <br />
    </label>
    
    <p align="center"> <input name="Submit" type="Submit" class="green" value="Request" /> </p>
    
    </form>
  
</div>
</div>

</body>
</html>