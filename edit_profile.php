<?php 

 $id = $_COOKIE['userid'];


?>

 <?php // error_reporting (E_ALL ^ E_NOTICE); ?>




<?php

 
// Connect to database

include_once "connect_to_mysql.php";
	 
	mysql_select_db("spatchaker", $con);
	 
	$query = "SELECT * FROM my_members WHERE id = '$id' ";
	$result = mysql_query($query);
	$userdata = mysql_fetch_array($result);

echo isset($_REQUEST);

    
	 $year = $userdata["year"];
	 $department = $userdata["department"];
	 $hostel = $userdata["hostel"];
	 $about_me = $userdata["about_me"];
	 $tennis = $userdata["tennis"];
	 $table_tennis = $userdata["table_tennis"];
	 $squash = $userdata["squash"];
	 $baddy = $userdata["baddy"];
	 
	 $tennis_level = $userdata["tennis_level"];
	 $table_tennis_level = $userdata["table_tennis_level"];
	 $squash_level = $userdata["squash_level"];
	 $baddy_level = $userdata["baddy_level"];
   
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

<link href="facebook div styles.css" rel="stylesheet" type="text/css" />
<link href="form.css" rel="stylesheet" type="text/css" />



</head>

<body>
<div class="fb" id='fb'>


<?php include_once("header.php"); ?>
<br />
<h2 class="centering">Edit your Profile</h2><br/><br/>
<h3 class="centering">Basic Info:</h3>

<div class="main">


<div class="box">

<form name = 'fs' action="http://localhost/app/make_changes.php" target="_top" method="post">
<table>
<tr>
            <td width="684">
              
              <label>
                <span> Year</span>
                <input name="year" type="text" class="input-text" value="<?php print "$year"; ?>" size="32" maxlength="20" />
              </label>
           
        	  <label><span>Department</span>
        	    <select name="department" class="input-text">
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
        	      <option value="mems" <?php if($department=="mems") echo "selected=\"selected\"" ?> >MEMS</option>
        	      <option value="phy" <?php if($department=="phy") echo "selected=\"selected\"" ?> >Physics</option>
      	      </select>
        	  </label>
        
        <label>
           <span>Hostel</span>
          <select name="hostel" class="input-text">
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
          <br />
          <br />
          <br />
        </label>
             
              
              <label>
              <span>Me and Sports
                
                </span>
                
                
                <textarea name="about_me" cols="50" rows="13" class="input-text"> 
			  <?php if(isset($about_me))
			  {echo $about_me;}  
			  else
			  {echo "Please type in something about the sports you play" ;}  ?>
              </textarea>
              </label>
                
        </tr>
    </table><br/>
<h3 class="centering">Sports Info:</h3>

<form name = 'fs' action="http://localhost/app/make_changes.php" target="_top" method="post">
<table>
            <tr>
              <td width="358"><label><span>Table Tennis</span>
                  <select name="table_tennis">
                    <option value="1" <?php if($table_tennis) echo "selected=\"selected\"" ?> >yes</option>
                    <option value="0" <?php if(!$table_tennis) echo "selected=\"selected\"" ?> >no</option>
                  </select>
                  </label>

<label><span>Level</span>
<select name="table_tennis_level">
  <option value="1" <?php if($table_tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
  <option value="2" <?php if($table_tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
  <option value="3" <?php if($table_tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
  <option value="4" <?php if($table_tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
  <option value="5" <?php if($table_tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
</select>
</label>
              </td>
              <td width="294">
            <label>
            <span>Tennis</span>
                <select name="tennis2">
      <option value="1" <?php if($tennis) echo "selected=\"selected\"" ?> >yes</option>
      <option value="0" <?php if(!$tennis) echo "selected=\"selected\"" ?> >no</option>
    </select>
    </label>
    <label>
     <span>Level</span>
     <select name="tennis_level">
       <option value="1" <?php if($tennis_level == 1) echo "selected=\"selected\"" ?> >1</option>
       <option value="2" <?php if($tennis_level == 2) echo "selected=\"selected\"" ?> >2</option>
       <option value="3" <?php if($tennis_level == 3) echo "selected=\"selected\"" ?> >3</option>
       <option value="4" <?php if($tennis_level == 4) echo "selected=\"selected\"" ?> >4</option>
       <option value="5" <?php if($tennis_level == 5) echo "selected=\"selected\"" ?> >5</option>
     </select>
          
    </label></td>
            </tr>
          
            <tr>
              <td width="358"><label><span>Baddy</span>
                  <select name="baddy">
                    <option value="1" <?php if($baddy) echo "selected=\"selected\"" ?> >yes</option>
                    <option value="0" <?php if(!$baddy) echo "selected=\"selected\"" ?> >no</option>
                  </select>
                  
                  </label>
<label><span>Level</span>
<select name="baddy_level">
  <option value="1" <?php if($baddy_level == 1) echo "selected=\"selected\"" ?> >1</option>
  <option value="2" <?php if($baddy_level == 2) echo "selected=\"selected\"" ?> >2</option>
  <option value="3" <?php if($baddy_level == 3) echo "selected=\"selected\"" ?> >3</option>
  <option value="4" <?php if($baddy_level == 4) echo "selected=\"selected\"" ?> >4</option>
  <option value="5" <?php if($baddy_level == 5) echo "selected=\"selected\"" ?> >5</option>
</select>
</label>
              </td>
              <td width="294" height="64"><label><span>Squash  </span>
                <select name="squash2">
                <option value="1" <?php if($squash) echo "selected=\"selected\"" ?> >yes</option>
                <option value="0" <?php if(!$squash) echo "selected=\"selected\"" ?> >no</option>
            </select>
            </label>
              <label><span>Level</span>
              <select name="squash_level2">
                <option value="1" <?php if($squash_level == 1) echo "selected=\"selected\"" ?> >1</option>
                <option value="2" <?php if($squash_level == 2) echo "selected=\"selected\"" ?> >2</option>
                <option value="3" <?php if($squash_level == 3) echo "selected=\"selected\"" ?> >3</option>
                <option value="4" <?php if($squash_level == 4) echo "selected=\"selected\"" ?> >4</option>
                <option value="5" <?php if($squash_level == 5) echo "selected=\"selected\"" ?> >5</option>
              </select>
              </label></td>
            </tr>
      </table>
<p align="center"> <input name="Submit" type="submit" class="green" value="Save" /> </p>
        
    </form>

</div>


<?php include_once "footer.php"; ?>
</div>


</body>
</html>