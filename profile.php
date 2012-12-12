<?php

$id = $_COOKIE['userid'];

// Connect to database

include_once "connect_to_mysql.php";
	 
	mysql_select_db("spatchaker", $con);
	 
	$query = "SELECT * FROM my_members WHERE id = '$id' ";
	$result = mysql_query($query);
	$userdata = mysql_fetch_array($result);


?>

<?php if (empty($userdata["ldap_id"])): ?>
// Redirect the user to edit_profile_new.php as he is going to be a new user in that case.

echo("<script> top.location.href='http://apps.facebook.com/spatchaker/edit_profile_new.php'</script>");

<?php else: ?>



<?php 
//The user has signed up before so now we will show him his profile information we have in our database
     
//Loading data into session variables
	 
	 $id = $userdata["id"];
	 $name = $userdata["name"];
	 $department = $userdata["department"];
	 $hostel = $userdata["hostel"];
	 $about_me = $userdata["about_me"];
	 $ldap_id = $userdata["ldap_id"];
	 $email_active = $userdata["email_active"];
	 $tennis = $userdata["tennis"];
	 $baddy = $userdata["baddy"];
	 $squash = $userdata["squash"];
	 $table_tennis = $userdata["table_tennis"];
	 $first_time = $userdata["first_time"];
	 $year = $userdata["year"];
	 $tennis_level = $userdata["tennis_level"];
	 $baddy_level = $userdata["baddy_level"];
	 $squash_level = $userdata["squash_level"];
	 $table_tennis_level = $userdata["table_tennis_level"];
	
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style>
.centering{
	text-align:center;
}
.mainBodyTable tr td table form tr td table tr th p {
	font-size: 12px;
}
.bglight{
	background-color:#FFFFFF;
}
.bgdark{
	background-color:#EFEFEF;
}
.tiny {
font-size:10px;
color: #777;
text-align:center;
}

</style>

<link href="facebook div styles.css" rel="stylesheet" type="text/css" />
<link href="form.css" rel="stylesheet" type="text/css" />

<!--Start of Search script-->
<script type="text/javascript">
function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}
</script>
<!--End of Search script-->

</head>

<body>



<div class="fb" id='fb'>


<?php include_once("header.php"); ?>
<br />
<h2 class="centering"><?php echo $_COOKIE['username'] . "'s Profile"; ?><sup><a href="http://apps.facebook.com/miki-mona/edit_profile.php" class="edit" target="_top">&nbsp;&nbsp;Edit</a></sup></h2>

<!--Start of Search Box HTML code-->
<form action="" class="centering"> 
Search People: <input type="text" id="txt1" onKeyUp="showHint(this.value)" />
<span class="tiny">Only activated accounts will be shown in suggestions</span></form>
<p>Suggestions: <span id="txtHint"></span></p>
<!--End of search box HTML code-->

<div class="main">
<h3 class="centering">Basic Info:</h3>
<div class="box">
<table>
<tr>
            <td width="320">
            <p><b>Name  : </b><span style="font-weight:normal;"><?php echo $name; ?></span></p>
			<p><b>Department : </b><span style="font-weight:normal;"><?php echo $department; ?></span></p>
			<p><b>Year : </b><span style="font-weight:normal;"><?php echo $year; ?></span></p>
            </td>
            <td width="320">
            <p><b>Hostel : </b><span style="font-weight:normal;"><?php echo $hostel; ?></span></p>
			<p><b>LDAP Id : </b><span style="font-weight:normal;"><?php echo $ldap_id; ?></span></p>
			<p><b>About Me : </b><span style="font-weight:normal;"><?php echo $about_me; ?></span></p>
            </td>
</tr>
</table></div>
<h3 class="centering">Sports Info:</h3>

<div class="box">
<table>
<span class="tiny">Sports I play</span>
<tr>
            <th width="320">Type 1 sports</th>
            <th width="320">Type 2 sports</th>
</tr>
<tr>
            <td width="250"><ul>
            	<span style="font-weight:normal;">
				<?php if($tennis=='1'){echo "<li>Tennis (" . $userdata["tennis_level"] .")</li>"; } else { } ?>
				<?php if($baddy=='1'){echo "<li>Baddy (" . $userdata["baddy_level"] .")</li>"; } else { } ?>
				<?php if($table_tennis=='1'){echo "<li>Table tennis (" . $userdata["table_tennis_level"] .")</li>"; } else { } ?>
				<?php if($squash=='1'){echo "<li>Squash (" . $userdata["squash_level"] .")</li>"; } else { } ?></span>
            </ul></td>
<!-- This part is just a trial code to show u how we may display things in our multiplayer supporting version-->
            <td width="320"><ul>
            <span style="font-weight:normal;">
            <li>Volley</li>
            <li>Cricket</li>
            <li>Basketball</li>
            <li>Footer</li>
            <li>Hockey</li>
            <li>Other sport</li></span>
<!--End of trial code-->                
</tr>
<tr><td colspan="2"><span class="tiny">P.S: Numbers shown in bracks are your level in the corresponding sport</span></td></tr>
</table>


</div>

<?php endif ?>
<?php include_once "footer.php"; ?>
</div>


</body>
</html>