<?php



function adminMail($admin_email){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Host = 'ebooking.com.ng';
    $mail->Port = 465;
    $mail->Username = 'hello@ebooking.com.ng';
    $mail->Password = 'x+}2Q*I*~eZw';
    $mail->setFrom('hello@ebooking.com.ng', "Ebooking.com.ng");
    $mail->addAddress($admin_email, 'Ebooking Admin Email');
    $mail->isHTML(true);
    $message ="Hello Admin,";
    $message .="<br><br>";
    $message .="<b>A Customer just booked a hotel, Kindly login to Ebooking Dashboard to view Details. </b>";
    $message .="<p><br></p>";
    $message .="<a style='background-color: darkgreen; color:white; padding: 10px; margin-top: 10px; text-decoration: none; font-weight: bold;' href='https://www.ebooking.com.ng/admin.php'>Sign In</a>";
    $message .="<br><br>";
    $message .="From Ebooking.com.ng<br>";
    $mail->Subject = 'New Hotel Booking';
    $mail->Body = $message;
    //send the message, check for errors
    if (!$mail->send()) {
        echo "ERROR: " . $mail->ErrorInfo;
    }

}

?>