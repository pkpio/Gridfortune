<?php
require_once '../../require/functions.php' ;
if(!empty($_POST['email']) && !empty($_POST['password'])){
//	$email 		= 	$_POST['email'];
//	$password 	= 	$_POST['password'];
	

	$result = doLogin();
	if($result == "false"){
		//Redirect him now...
			$redirectionTime = 1;
			$newPageUrl = "/app/";
			header( "Refresh: $redirectionTime; url=$newPageUrl" );
		echo "<p style=\"color:#F00\"> Authentication failed ! Invalid username password combination! Please try again.</p> " ;
	}
}
else{
	//header('Location:  http://localhost/gf');
}
?>