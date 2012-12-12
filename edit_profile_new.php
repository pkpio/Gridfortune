<?php 

$id = $_COOKIE['userid'];
$name = $_COOKIE['username'];

echo $id;

?>

<?php error_reporting (E_ALL ^ E_NOTICE); ?>




<?php

 
// Connect to database

include_once "connect_to_mysql.php";
	 
	mysql_select_db("spatchaker", $con);
	 
	$query = "SELECT * FROM my_members WHERE id = '$id' ";
	$result = mysql_query($query);
	$userdata = mysql_fetch_array($result);

echo isset($_REQUEST);

if(empty($userdata[ldap_id])){
}
else{
echo("<script> top.location.href='http://apps.facebook.com/miki-mona/edit_profile.php'</script>");
}
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

</style>

</head>

<body>
<?php include_once "header.php"; ?>
<h2 class="centering">Edit your Profile</h2><br/>
<p>We recognised u as new user.We strongly recommend you to fill ur correct <abbr title="This app is designed only for the internal use of IIT BOMBAY students who have a valid LDAP ID"><b>LDAP Id</b></abbr>  as it cant be changed at a later stage and important for your account activation.
<h3 class="centering">Basic Info:</h3>

<form method="post" action="make_changes_new.php">
<table>
<tr>
            <td width="99" class="bglight">Name:</td>
            <td width="580" class="bglight"><input name="name" type="text" class="formFields" value="<?php print "$name"; ?>" size="32" maxlength="20" /></td>
          </tr>
          
          <tr>
            <td width="99" class="bgdark">Year:</td>
            <td width="580" class="bglight"><input name="year" type="text" class="formFields" value="<?php print "$year"; ?>" size="32" maxlength="20" /></td>
          </tr>

<tr>
            <td width="99" class="bglight"><b>LDAP Id:</b></td>
            <td width="580" class="bglight"><input name="ldap_id" type="text" class="formFields" value="" size="32" maxlength="20" /></td>
          </tr>
          <tr>
            <td class="bgdark">Department:</td>
            <td class="bgdark">
            
            
            <select name="department">
                <option value="ae" <?php if($department=="ae") echo "selected=\"selected\"" ?> >Aerospace Engineering</option>
                <option value="bio" <?php if($department=="bio") echo "selected=\"selected\"" ?> >Bio</option>
                <option value="che" <?php if($department=="che") echo "selected=\"selected\"" ?> >Chemical</option>
                <option value="civil" <?php if($department=="civil") echo "selected=\"selected\"" ?> >Civil Engineering</option>
                <option value="cse" <?php if($department=="cse") echo "selected=\"selected\"" ?> >Computer Science and Engg.</option>
                <option value="ese" <?php if($department=="ese") echo "selected=\"selected\"" ?> >Earth Sciences</option>
                <option value="ee" <?php if($department=="ee") echo "selected=\"selected\"" ?> >Electrical Engineering</option>
                <option value="hss" <?php if($department=="hss") echo "selected=\"selected\"" ?> >Humanities and SS</option>
                <option value="idc" <?php if($department=="idc") echo "selected=\"selected\"" ?> >Industrial Design Center</option>
                <option value="math" <?php if($department=="math") echo "selected=\"selected\"" ?> >Mathematics</option>
                <option value="mech" <?php if($department=="mech") echo "selected=\"selected\"" ?> >Mechanical Engineering</option>
                <option value="mems" <?php if($department=="mech") echo "selected=\"selected\"" ?> >MEMS</option>
                <option value="phy" <?php if($department=="phy") echo "selected=\"selected\"" ?> >Physics</option>
              </select>
              
            </td>
          </tr>
          <tr>
            <td class="bglight">Hostel:</td>
            <td class="bglight">
            
            <select name="hostel">
                <option value="1" <?php if($hostel==1) echo "selected=\"selected\"" ?> >1</option>
                <option value="2" <?php if($hostel==2) echo "selected=\"selected\"" ?> >2</option>
                <option value="3" <?php if($hostel==3) echo "selected=\"selected\"" ?> >3</option>
                <option value="4" <?php if($hostel==4) echo "selected=\"selected\"" ?> >4</option>
                <option value="5" <?php if($hostel==5) echo "selected=\"selected\"" ?> >5</option>
                <option value="6" <?php if($hostel==6) echo "selected=\"selected\"" ?> >6</option>
                <option value="7" <?php if($hostel==7) echo "selected=\"selected\"" ?> >7</option>
                <option value="8" <?php if($hostel==8) echo "selected=\"selected\"" ?> >8</option>
                <option value="9" <?php if($hostel==9) echo "selected=\"selected\"" ?> >9</option>
                <option value="10" <?php if($hostel==10) echo "selected=\"selected\"" ?> >10</option>
                <option value="11" <?php if($hostel==11) echo "selected=\"selected\"" ?> >11</option>
                <option value="12" <?php if($hostel==12) echo "selected=\"selected\"" ?> >12</option>
                <option value="13" <?php if($hostel==13) echo "selected=\"selected\"" ?> >13</option>
                <option value="14" <?php if($hostel==14) echo "selected=\"selected\"" ?> >14</option>
                <option value="15" <?php if($hostel==15) echo "selected=\"selected\"" ?> >Tansa</option>
                <option value="16" <?php if($hostel==16) echo "selected=\"selected\"" ?> >Others</option>
              </select>
              
            </td>
          </tr>                  
          <tr>
            <td class="bgdark">Me and Sports: </td>
            <td class="bgdark"><label>
              <textarea name="about_me" cols="70" rows="10"> 
			  <?php if(isset($about_us))
			  {echo $about_me;}  
			  else
			  {echo "Please type in something about the sports you play" ;}  ?>
              </textarea>
            </label></td>
          </tr>

</table><br/>
<h3 class="centering">Sports Info:</h3>

<form name = 'fs' action="http://localhost/app/make_changes.php" target="_top" method="post">
<table>
  <td class="bglight" width="99">Tennis:  </td>
            <td bgcolor="#FFFFFF"><label>
              <select name="tennis">
                <option value="1" <?php if($tennis) echo "selected=\"selected\"" ?> >yes</option>
                <option value="0" <?php if(!$tennis) echo "selected=\"selected\"" ?> >no</option>
              </select>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level 
            <select name="tennis_level">
              <option value="1" <?php if($tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
              <option value="2" <?php if($tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
              <option value="3" <?php if($tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
              <option value="4" <?php if($tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
              <option value="5" <?php if($tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
            </select>
            </label></td>
          </tr>
          
          <td class="bgdark" width="99">Table Tennis:  </td>
            <td class="bgdark"><label>
              <select name="table_tennis">
                <option value="1" <?php if($tennis) echo "selected=\"selected\"" ?> >yes</option>
                <option value="0" <?php if(!$tennis) echo "selected=\"selected\"" ?> >no</option>
              </select>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level 
            <select name="table_tennis_level">
              <option value="1" <?php if($tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
              <option value="2" <?php if($tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
              <option value="3" <?php if($tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
              <option value="4" <?php if($tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
              <option value="5" <?php if($tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
            </select>
            </label></td>
          </tr>
          
          <td class="bglight" width="99">Squash:  </td>
            <td class="bglight"><label>
              <select name="squash">
                <option value="1" <?php if($tennis) echo "selected=\"selected\"" ?> >yes</option>
                <option value="0" <?php if(!$tennis) echo "selected=\"selected\"" ?> >no</option>
              </select>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level 
            <select name="squash_level">
              <option value="1" <?php if($tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
              <option value="2" <?php if($tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
              <option value="3" <?php if($tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
              <option value="4" <?php if($tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
              <option value="5" <?php if($tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
            </select>
            </label></td>
          </tr>
          
          <td class="bgdark" width="99">Baddy:  </td>
            <td class="bgdark"><label>
              <select name="baddy">
                <option value="1" <?php if($tennis) echo "selected=\"selected\"" ?> >yes</option>
                <option value="0" <?php if(!$tennis) echo "selected=\"selected\"" ?> >no</option>
              </select>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level 
            <select name="baddy_level">
              <option value="1" <?php if($tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
              <option value="2" <?php if($tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
              <option value="3" <?php if($tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
              <option value="4" <?php if($tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
              <option value="5" <?php if($tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
            </select>
            </label></td>
          </tr>
          </table>
          
        <p align="center"> <input type="submit" name="Submit" value="Save" /> </p>
        </form>




<?php include_once "footer.php"; ?>
</body>
</html>