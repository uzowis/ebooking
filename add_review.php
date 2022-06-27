<?php
include('controllers/db.php');

if(isset($_GET['facilities']) && isset($_GET['cleanliness']) && isset($_GET['staff']) && isset($_GET['comfort'])){
    $hotel_id = $_GET['hotel_id'];
    $facilities = $_GET['facilities'];
    $cleanliness = $_GET['cleanliness'];
    $staff = $_GET['staff'];
    $comfort = $_GET['comfort'];
    $reviews = $_GET['reviews'];
    $name = $_GET['name'];
    $email = $_GET['email'];

    $score = $comfort+$facilities+$staff+$comfort;
    $score = number_format($score/4, 1);

    $add_review = mysqli_query($db, "INSERT INTO reviews (hotel_id, rev_name, email, reviews, cleanliness, comfort, staff, facilities, score) VALUES('$hotel_id', '$name', '$email', '$reviews', '$cleanliness', '$comfort', '$staff', '$facilities', '$score' )");
    if($add_review){
        session_start();
        $_SESSION['rev_success'] = 'Thanks you for reviewing our hotel';
        $url = './listing-single.php?id='.$hotel_id;
        echo "<script type='text/javascript'> window.location.replace('". $url."');</script>";
    }
}






?>