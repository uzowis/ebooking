<?php
error_log(E_ALL);
include ('controllers/db.php');

session_start();

if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}

$booking_id = '';
// Cancel booking
if(isset($_GET['cancel_booking']) && isset($_GET['id'])){
    $booking_id = $_GET['id'];
    $booking_status = $_GET['cancel_booking'];
    
    // Query booking details
    $query_booking = mysqli_query($db, "SELECT * FROM bookings WHERE booking_id='$booking_id'");
    $booking_result = mysqli_fetch_assoc($query_booking);
    $hotel_id = $booking_result['hotel_id'];
    $customer_name = $booking_result['name'];
    $dates = $booking_result['booked_dates'];
    $rooms = $booking_result['no_of_rooms'];
    $user_email = $booking_result['email'];
    
    // Use hotel Id to query the booked hotel
    $query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE id='$hotel_id'");
    $hotel = mysqli_fetch_assoc($query_hotel);
    $hotel_email = $hotel['h_email'];
    
    $cancel_booking = mysqli_query($db, "UPDATE bookings SET booking_status ='$booking_status'  WHERE booking_id='$booking_id'");
    if($cancel_booking){
        require_once ('controllers/hotelMail.php');
        // echo $hotel_id ;
        //   echo $customer_name;
        //   echo $dates;
        //     echo $rooms;
        //     echo $user_email ;
        //     echo $booking_id ;
        //     echo $hotel_email ;
        
        hotelMailCancelBooking($hotel_email, $booking_id, $customer_name,$dates, $rooms);
        bookingMailCancelBooking($user_email, $booking_id);
        
        header('location: ./dashboard-bookings.php');
    }else{
       echo  mysqli_error($cancel_booking);
    }
}

?>