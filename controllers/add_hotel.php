<?php

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/src/Exception.php');

$success_msg = '';

if(isset($_POST['h_name']) && isset($_POST['h_email'])&& isset($_POST['h_phone'])&& isset($_POST['h_website'])&& isset($_POST['h_address'])&& isset($_POST['state'])&& isset($_POST['city'])&& isset($_POST['fname'])&& isset($_POST['p_email']) ){
	$hotel_name = $_POST['h_name'];
	$hotel_email = $_POST['h_email'];
	$hotel_phone = $_POST['h_phone'];
	$hotel_website = $_POST['h_website'];
	$hotel_address = $_POST['h_address'];
	$hotel_state= $_POST['state'];
	$hotel_city = $_POST['city'];
	$fullname = $_POST['fname'];
	$p_email = $_POST['p_email'];
}
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'mail.ebooking.com.ng';
$mail->Port = 465;
$mail->Username = 'hello@ebooking.com.ng';
$mail->Password = 'x+}2Q*I*~eZw';
$mail->setFrom('hello@ebooking.com.ng', "Ebooking.com.ng");
$mail->addAddress('uzowis@gmail.com');
$mail->isHTML(true);
$message ="Hotel with below details have requested Listing on E-booking.ng";
$message .="<br><br>";
$message .="<b>Hotel Details </b> <br>";
$message .="HOTEL NAME: \t\t ".$hotel_name." <br>";
$message .="HOTEL EMAIL: \t\t ".$hotel_email." <br>";
$message .="HOTEL PHONE NUMBER: \t\t ".$hotel_phone." <br>";
$message .="HOTEL WEBSITE: \t\t ".$hotel_website." <br>";
$message .="HOTEL ADDRESS: \t\t ".$hotel_address." <br>";
$message .="HOTEL STATE: \t\t ".$hotel_state." <br>";
$message .="HOTEL CITY: \t\t ".$hotel_city." <br><br>";
$message .="<b>Hotel Contact Person</b> <br>";
$message .="FULL NAME: \t\t ".$fullname." <br>";
$message .="EMAIL ADDRESS: \t\t ".$p_email." <br>";

$mail->Subject = 'Hotel Registration Request';
$mail->Body = $message;
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    $success_msg.= "Your Hotel Details was sucessfully Submitted, We'll get back to you soon.";
    session_start();
    $_SESSION['success_msg'] = $success_msg;
    header('location: ../add_hotel.php');
}

?>