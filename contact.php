<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["sendcontact"]))
{
	$mail = new PHPMailer(true);

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'insert@youremail.com';
	$mail->Password = 'emailpassword';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;

	$mail->setFrom($_POST['email'], $_POST['name']);

	$mail->addAddress('insert@youremail.com');
	$mail->addAddress($_POST['email']);


	$mail->isHTML(true);

	$mail->Subject = $_POST['subject'];
	$mail->Body = "Message From: ".$_POST['name']."<br>"."Email: ".$_POST['email']."<br><br>".$_POST['message'];

	$mail->send();

	echo 
	"
	<script>
	alert('Sent Successfully');
	document.location.href = 'contact.html';
	</script>
	";
}


?>