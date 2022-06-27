<?php
include ('controllers/db.php');
$error = '';
if(isset($_POST['email']) && isset($_POST['pass'])){
    $pass = $_POST['pass'];
    $pass = md5($pass);
    $email = $_POST['email'];

    $query = mysqli_query($db, "SELECT * FROM admin WHERE email = '$email' && pass = '$pass'");
    $query_row = mysqli_num_rows($query);
    if($query_row > 0){
        session_start();
        $_SESSION['email'] = $email;
        header('location: dashboard-bookings.php');
    } else{
        //header('location: index.php');
       echo 'Incorrect Login Details';
    }
}
?>
