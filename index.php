<?php
require_once 'require/functions.php';
if(isset($_SESSION['user_email']))header( "Refresh: 0; url=/app/user" );
else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Grid Fortune</title>
<style>
#header{
	top:0px;
	left:0px;
	height:100px;
}
#apps{
	position:absolute;
	left:180px;
	top:200px;
	border-right:1px solid;
	width:560px;
	height:500px;
}
#register{
	position:absolute;
	top:200px;
	left:850px;
	width:400px;
	padding:20px 20px;
}
body{
	font-family: garamond;
}
</style>
</head>

<body>
<div align="center" style="width:700px;">
<div id="header">
	<?php include_once 'header.php'; ?>
</div>

<div id="main">

    <div id="apps" style="text-align:left;">
    <h2><font color="green" style="font-size:22px; line-height:40px; font-family: garamond; font-weight:bold;">Grid Fortune</font></h2>
        <h3><font color="black" style="font-size:18px; line-height:30px; font-family: garamond;">A students approach to analyze the Green Button data.</font></h3>
            <h4><font color="black" style="font-size:15px; line-height:20px; font-family: garamond;">  Grid Fortune Application is built on the idea that analysis of Green Button data can be more intuitive, 
            innovative, efficient, and useful for the consumers in saving the electricity. And maybe even exciting! After all, Grid Fortune has:</font></h4>
      
         
            
            
    <iframe src="http://gridfortune.com/app/cycle/" width="120%" height="100%" style="position:absolute;left:-60px;top:120px;" frameborder="0"></iframe>
    </div>
 
    <div id="register">
    <link rel="stylesheet" href="./formFiles/general.css" type="text/css" media="screen">

	<div id="container" style="width:482px; position:absolute; top:-32px; left:-50px;">
		<h1>Registration process</h1>
		
		
		<form method="post" id="customForm" action="user/register/index.php" name="register">
			<div>
				<label name="name" style="font-family: garamond;">Name</label>
				<input id="name" name="name" type="text" autocomplete="off" goog_input_chext="chext" class="error">
				<span id="nameInfo" class="error">Atleast 3 letters!</span>
			</div>
			<div>
				<label name="email" style="font-family: garamond;">E-mail</label>
				<input id="email" name="email" type="text" autocomplete="off" goog_input_chext="chext" class="">
				<span id="emailInfo" class="">Valid E-mail please, you will need it to log in!</span>
			</div>
			<div>
				<label name="password" style="font-family: garamond;">Password</label>
				<input id="pass1" name="password" type="password" class="error">
				<span id="pass1Info" class="error">Ey! Remember: At least 5 characters</span>
			</div>
			<div>
				<label name="repassword" style="font-family: garamond;">Confirm Password</label>
				<input id="pass2" name="repassword" type="password" class="">
				<span id="pass2Info" class="">Confirm password</span>
			</div>
            <div>
            <input type="checkbox" name="agrement" align="left" id="checkBox" style="float:left; position:absolute; left:-95px;">
            <label for="checkBox" style="position:relative; left:20px; font-weight:700">I agree Terms and Conditions <a href="conditions/" style="font-size:9px;">(?)</a></label>
            </div>
			<div>
				<input id="send" name="send" type="submit" value="Register">
			</div>
		</form>
	</div>
	<script type="text/javascript" src="./formFiles/jquery.js"></script>
	<script type="text/javascript" src="./formFiles/validation.js"></script>
    </div>
</div>
<div id="footer">
    <?php include_once 'footer.php'; ?>
</div>


</body>

</html>
<?php } ?>