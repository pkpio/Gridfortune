<?php
require_once 'require/functions.php';
?>
<style>
#footer{
	position:absolute;
	top:720px;
	left:0px;
	width:100%;
}
#footer a {
	text-decoration:none;
	color:#000;
}
#footer a.hover{
	font-style:underlined;
}
.button{
	font-size:12px;
	background: #0082cd;
	color: #fff;
	font-weight: 500;
	font-style: normal;
	border: 0;
	cursor: pointer;
	width:90px;
	height:20px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;

}
.button:hover{
	background: #0076cd;
}
.print{
	font-size:12px;
	background: #666;
	color: #fff;
	font-weight: 500;
	font-style: normal;
	border: 0;
	cursor: pointer;
	width:90px;
	height:20px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;

}
.print:hover{
	background: #000;
}
</style>
<?php if(!empty($_SESSION['user_email'])){


$email = $_SESSION['user_email'];
$sql = "SELECT user_name
		FROM tbl_users
		WHERE user_email = '$email'";
$result = mysql_query($sql) or die("error fetching details." . mysql_error());
$userdata = mysql_fetch_assoc($result);
	
	 ?>
<div id="logo">
    <a href="http://www.gridfortune.com/app/user/"><img src="http://www.gridfortune.com/app/images/logo2.png" style="width:348px;height:90px; position:absolute;left:170px;top:55px;" /></a>
    </div>
    
    <div style="position:absolute; left:1050px; top:70px; text-align:left;">
    <?php echo $userdata['user_name']; ?></div>
    <div style="position:absolute; left:1020px; top:90px"><a href="http://www.gridfortune.com/app/user/logout/"><input type="button" value="logout" class="button" /></a>
    </div>
    
    
    <div style="position:absolute; left:1020px; top:115px"><input type="button" value="Print page" class="print" onClick="window.print()" />
    </div>
    
    <hr style="position:absolute;left:160px;top:160px;width:1000px;"/>
</div>
<?php
}else{?>

<div id="logo">
    <a href="http://www.gridfortune.com/app/"><img src="http://www.gridfortune.com/app/images/logo2.png" style="width:348px;height:90px; position:absolute;left:170px;top:55px;"  /></a>
    </div>
    
	<div id="login" style="text-align:right; position:absolute; left:600px;top:65px;">
    <div style="position:absolute; left:70px; text-align:left;"><form action="user/login/" method="post" name="login">
    Email: <input type="text" name="email" style="width: 220px; padding: 6px; color: #09F;	font-family: Arial,  Verdana, Helvetica, sans-serif;	font-size: 11px; border: 1px solid #cecece;"/></div>
    <div style="position:absolute; left:325px; text-align:left;">
    Password: <input type="password" name="password" style="width: 220px; padding: 6px; color: #09F;	font-family: Arial,  Verdana, Helvetica, sans-serif;	font-size: 11px; border: 1px solid #cecece;" /></div>
    <div style="position:absolute; left:470px; top:55px"><input type="submit" value="login" class="button" /></div></form>
       
    </div>
    <div id="forgot" style="text-align:center; position:absolute; left:600px;top:65px;">
    <div style="position:absolute; left:-10px; top:55px;width:300px;"> <a href="password/" style="color:#000;">Forgot your password?</a></div>
    </div>
    <hr style="position:absolute;left:160px;top:160px;width:1000px;"/>
<?php }?>