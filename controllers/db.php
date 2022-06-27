<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ebooking');
$test_db = ($db)? "Successfully Connected" : " Error Connecting to DB";
?>