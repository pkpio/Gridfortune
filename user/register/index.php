<meta http-equiv="refresh" content="3; url=http://gridfortune.com/app/">
<?php
require_once '../../require/functions.php';
//Redirect back to Registration page if he tried to land on this page without any details..
if(empty($_POST['name'])){
	header("Refresh: 2; url=../");
//	echo "NULL values!";
}
else{
$name 		= 	$_POST['name'];
$email	 	= 	$_POST['email'];
$password 	= 	$_POST['password'];
$password1  =	$_POST['repassword'];
?>

<?php
if($password != $password1){
?>
<p align='center'><b style='color:#F00'>Passwords didn't match.</b> We are re-directing you now. Please re-enter your details and submit again.</p>
<?php
}
else{
//Checking if the email Id is already taken..
	if (dbUserexist($email) == '0') { //Change this to a code with number of rows..
	//Conformed that emailId wasn't taken ..
	//Generating random code..
	$random_code = get_rand_id(25); //We can change the length of the random code genrated by changing this number later. Not switching to Javascript
								//generation of code becoz its not reliable..

	//Inserting the values into Database..	
	$sql = "INSERT INTO tbl_users (user_name, user_password, user_email, user_activation_code)
	VALUES ('$name', '$password', '$email', '$random_code')";
	dbQuery($sql);
	$sql = "SELECT user_id
		FROM tbl_users
		WHERE user_email = '$email'";
	
	dbConnect();
	$result = mysql_query($sql) or die("error fetching details." . mysql_error());
	$userdata = mysql_fetch_assoc($result);
//	echo $userdata['user_id'];
	$structure = './../../upload/server/php/files/'.$userdata['user_id'].'/';
	if (!mkdir($structure, 0755, true)) {
    die('Failed to create folders...');
}
?>
<p align="center">Registration successfull. Please check your mail for a conformation message! You will be redirected in a while...</p>
<?php
	}
	else{
?>
<p align="center" style="color:#F00">EmailId already Registered! <a href="#">Forgot password?</a></p><!-- keep a small popup window over here for procedure of regaining control over account--> 
<?php
	}
}
}
?>