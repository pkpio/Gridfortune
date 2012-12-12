<?php

error_reporting(0);

include("phpmailer/class.phpmailer.php");
//include("phpmailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = $mail->getFile('contents.html');
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "sandesh.ee.iitb.ac.in";      // sets GMAIL as the SMTP server
$mail->Port       = 25;                   // set the SMTP port for the GMAIL server

$mail->Username   = "eesa";  // GMAIL username
$mail->Password   = "ronaldo1";            // GMAIL password

$mail->AddReplyTo("praveendath92@gmail.com","AdminPraveen");

$mail->From       = "name@yourdomain.com";
$mail->FromName   = "First Last";

$mail->Subject    = "PHPMailer Test Subject via gmail";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

$mail->AddAddress("100070028@iitb.ac.in", "Praveen");

$mail->AddAttachment("images/phpmailer.gif");             // attachment

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}


?>
