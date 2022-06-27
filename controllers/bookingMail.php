<?php

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/src/Exception.php');

function bookingMail($user_email, $booking_id){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'ebooking.com.ng';
    $mail->Port = 465;
    $mail->Username = 'hello@ebooking.com.ng';
    $mail->Password = 'x+}2Q*I*~eZw';
    $mail->setFrom('hello@ebooking.com.ng', "Ebooking.ng");
    $mail->addAddress($user_email, 'Customer Email');
    $mail->isHTML(true);
    $message ="Hotel booking was successful,";
    $message .="<br><br>";
    $message .="<b>Kindly Click the button below to view and print your Booking Invoice. </b>";
    $message .="<p><br></p>";
    $message .="<a style='background-color: darkblue; color:white; padding: 10px; margin-top: 12px; text-decoration: none; font-weight: bold;' href='https://www.ebooking.com.ng/invoice.php?book_id=$booking_id'>VIEW INVOICE</a>";
    $message .="<br><br>";
    $message .="Thanks For Choosing us.<br>";
    $mail->Subject = 'Hotel Booking Success';
    $mail->Body = $message;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    }

}

?>