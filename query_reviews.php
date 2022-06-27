<?php
//include('controllers/db.php');
$q_reviews = mysqli_query($db, "SELECT * FROM reviews WHERE  hotel_id='$hotel_id'");
$reviews = mysqli_fetch_assoc($q_reviews);

$facilities = $reviews['facilities'];
$cleanliness = $reviews['cleanliness'];
$staff = $reviews['staff'];
$comfort = $reviews['comfort'];
$reviews = $reviews['reviews'];

$score = number_format(($facilities + $cleanliness + $staff + $comfort) / 4, 1);
$remark = '';
switch ($score) {
    case $score >= 4.5 :
        $remark = 'Excellent';
        break;
    case $score >= 4 :
        $remark = 'Very Good';
        break;
    case $score >= 3 :
        $remark = 'Good';
        break;
    case $score < 1 :
        $remark = 'Very Good';
        break;
    default :
        $remark = 'Fair';
}
?>