<?php
require_once 'database.php';

function dbQuery($sql) {
	dbConnect();
	mysql_query($sql) or die('Encountered an unexpected error. Please try again, If problem persists please contact the <a href="http://home.iitb.ac.in/~praveendath92/">administrator </a>' . mysql_error());
	mysql_close();
}

function dbNumRows($result) {
	return mysql_num_rows($result);
}

function dbUserexist($email) {
	$sql = "SELECT user_email
		       FROM tbl_users 
			   WHERE user_email = '$email'";
	dbConnect();
	$result = mysql_query($sql);
	$rows = dbNumRows($result);
	return $rows;
}

function doLogin()
{
	dbConnect();
	// if we found an error save the error message in this variable
	$errorMessage = '';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
		// check the database and see if the username and password combo do match
		$sql = "SELECT user_email, user_password, user_id
		        FROM tbl_users 
				WHERE user_email = '$email' AND user_password = '$password'";
		$result = mysql_query($sql);
		
		if (mysql_num_rows($result) == '1') {
			$row = mysql_fetch_assoc($result);
			//Session start
			$_SESSION['user_email'] = $row['user_email'];
			$_SESSION['user_id'] = $row['user_id'];
			
/*			// log the time when the user last login
			$sql = "UPDATE tbl_users 
			        SET user_last_login = NOW() 
					WHERE user_email = '{$row['user_email']}'";
			dbQuery($sql);
*/			//Redirect him now...
			$redirectionTime = 0;
			$newPageUrl = "../";
			header( "Refresh: $redirectionTime; url=$newPageUrl" );

		} else {
			$errorMessage = 'false';
		}
		
	return $errorMessage;
}
/*
	Logout a user
*/
function doLogout()
{
	if (isset($_SESSION['user_email'])) {
		unset($_SESSION['user_email']);
		session_unregister('user_email');
		session_destroy();
	}

			//Redirect him now...
			$redirectionTime = 0;
			$newPageUrl = "../../";
			header( "Refresh: $redirectionTime; url=$newPageUrl" );
	exit;
}

function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}

function get_rand_id($length)
{
  if($length>0) 
  { 
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}
?>