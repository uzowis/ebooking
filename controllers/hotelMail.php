<?php

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/src/Exception.php');

function hotelMail($hotel_email, $booking_id, $customer_name, $days, $dates, $quests, $rooms, $room, $notes){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'ebooking.com.ng';
    $mail->Port = 465;
    $mail->Username = 'hello@ebooking.com.ng';
    $mail->Password = 'x+}2Q*I*~eZw';
    $mail->setFrom('hello@ebooking.com.ng', "Ebooking");
    $mail->addAddress($hotel_email, 'Hotel Admin Email');
    $mail->isHTML(true);
    $message ="Hello,";
    $message .="<br><br>";
    $message .="Your Hotel was booked from Ebooking.ng, kindly find details below:<br><br>";
    $message .="<b>Customer Name:</b>  $customer_name <br>";
    $message .="<b>Booking ID:</b>  $booking_id <br>";
    $message .="<b>Booked Date:</b>  $dates <br>";
    $message .="<b>Duration:</b>  $days <br>";
    $message .="<b>No of Guests:</b>  $quests <br>";
    $message .="<b>No of Rooms Booked:</b>  $rooms <br>";
    $message .="<b>Room Type:</b>  $room <br>";
    $message .="<b>Special Request:</b>  $notes <br>";
    $message .="<br><br>";
    $message .="Thanks For Choosing us.<br>";

    $mail->Subject = 'Hotel Booking Success';
    $mail->Body = $message;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    }

}

function hotelMailCancelBooking($hotel_email, $booking_id, $customer_name,$dates, $rooms){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'ebooking.com.ng';
    $mail->Port = 465;
    $mail->Username = 'hello@ebooking.com.ng';
    $mail->Password = 'x+}2Q*I*~eZw';
    $mail->setFrom('hello@ebooking.com.ng', "Ebooking");
    $mail->addAddress($hotel_email, 'Hotel Admin Email');
    $mail->isHTML(true);
    $message ="Hello,";
    $message .="<br><br>";
    $message .="Hotel reservation was cancelled by the customer with details below:<br><br>";
    $message .="<b>Customer Name:</b>  $customer_name <br>";
    $message .="<b>Booking ID:</b>  $booking_id <br>";
    $message .="<b>Booked Date:</b>  $dates <br>";
    $message .="<b>No of Rooms Booked:</b>  $rooms <br>";
    $message .="<br><br>";
    $message .="Thanks For Choosing us.<br>";

    $mail->Subject = 'Hotel Reservation Cancellation';
    $mail->Body = $message;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    }

}

function bookingMailCancelBooking($user_email, $booking_id){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'ebooking.com.ng';
    $mail->Port = 465;
    $mail->Username = 'hello@ebooking.com.ng';
    $mail->Password = 'x+}2Q*I*~eZw';
    $mail->setFrom('hello@ebooking.com.ng', "Ebooking");
    $mail->addAddress($user_email, 'Customer Email');
    $mail->isHTML(true);
    $message ="Your hotel reservation with Booking ID: $booking_id was cancelled";
    $message .="<br><br>";
    $message .="<b>We're always here to serve you better. </b>";
    $message .="<br><br>";
    $message .="Thanks For Choosing us.<br>";
    $mail->Subject = 'Hotel Reservation Cancellation';
    $mail->Body = $message;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    }

}

?>