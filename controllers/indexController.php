<?php
include ('db.php');

$query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE h_name = '$hotel_name'");
$query_result = mysqli_fetch_assoc($query_hotel);
$hotel_id = $query_result['id'];
?>