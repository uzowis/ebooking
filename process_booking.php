<?php
include ('controllers/db.php');
error_log(E_ALL);
session_start();
if (!isset($_SESSION['room_id'])){
    header('location: index.php');
}

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['notes'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname." ".$lname;
    $email = $_POST['email'];
    $admin_email = 'uzowis@gmail.com';
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
    $date = date('Y/m/d');
    $booking_id = time();
    $booking_status = 'Booked';
    $hotel_id = $_SESSION['hotel_id'];
    $room_id = $_SESSION['room_id'];
   // $room = $_SESSION['room'];
    $room_price = $_SESSION['room_price'];
    $bookdates = $_SESSION['duration'];
    $days = $_SESSION['days'];
    $no_of_rooms = $_SESSION['no_of_rooms'];
    $guests = $_SESSION['adults'] ;
    $total = $_SESSION['total'];
    $room_title = $_SESSION['room_title'];

    // get hotel email
    $query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE id='$hotel_id'");
    $result = mysqli_fetch_assoc($query_hotel);
    $hotel_email = $result['h_email'];

    // send data to DB
    $query_submit = mysqli_query($db, "INSERT INTO bookings (hotel_id, room_id, booking_id, booked_dates, duration, name, email, phone, notes, no_of_rooms, no_of_persons, total_cost, date, booking_status) VALUES ('$hotel_id', '$room_id', '$booking_id', '$bookdates', '$days', '$name', '$email', '$phone', '$notes', '$no_of_rooms', '$guests', '$total', '$date', '$booking_status')");
    if ($query_submit){
        require_once ('controllers/bookingMail.php');
        require_once ('controllers/adminMail.php');
        require_once ('controllers/hotelMail.php');
        bookingMail($email, $booking_id);
        hotelMail($hotel_email, $booking_id, $name, $days, $bookdates, $guests, $no_of_rooms, $room_title, $notes);
        adminMail($admin_email, $booking_id);

        header('location: success.php?id='.$booking_id);
    }else{
        echo mysqli_error($db). "An error Occured!";
    }
}




?>