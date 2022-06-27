<?php
// connect to the database
$db = mysqli_connect('localhost', 'ebooking_user', 'pZl~h7J{XGj?', 'ebooking_db');
$test_db = ($db)? "Successfully Connected" : " Error Connecting to DB";
?>