<?php
include("db.php");

// Test Db Connectivity
//echo $test_db;

// Variable Declarations
$query_success = '';

// Input validation
if(isset($_FILES['fileUpload']['name']) && isset($_POST['hotel_id'])&& isset($_POST['h_name']) && isset($_POST['h_email'])&& isset($_POST['h_phone'])&& isset($_POST['h_website'])&& isset($_POST['h_address'])&& isset($_POST['h_state'])&& isset($_POST['h_city'])&& isset($_POST['type'])&& isset($_POST['h_about'])&& isset($_POST['avg_cost']) ){
	$hotel_id = mysqli_real_escape_string($db, $_POST['hotel_id']);
	$hotel_name = mysqli_real_escape_string($db, $_POST['h_name']);
	$hotel_email = mysqli_real_escape_string($db, $_POST['h_email']);
	$hotel_phone = mysqli_real_escape_string($db, $_POST['h_phone']);
	$hotel_website = mysqli_real_escape_string($db, $_POST['h_website']);
	$hotel_address = mysqli_real_escape_string($db, $_POST['h_address']);
	$hotel_state= mysqli_real_escape_string($db, $_POST['h_state']);
	$hotel_city = mysqli_real_escape_string($db, $_POST['h_city']);
	$type = mysqli_real_escape_string($db, $_POST['type']);
	$about = mysqli_real_escape_string($db, $_POST['h_about']);
	$avg_cost = mysqli_real_escape_string($db, $_POST['avg_cost']);

    $uploadsDir = "./images/hotel_imgs/";
    $allowedFileType = array('jpg', 'png', 'jpeg', 'JPG');

    // Velidate if files exist
    if (!empty($_FILES['fileUpload']['name'])) {

            // Get files upload path
            $rnd = rand();
            $salt =$rnd.time();
            $fileName = $_FILES['fileUpload']['name'];
            $tempLocation = $_FILES['fileUpload']['tmp_name'];
            $targetFilePath = $uploadsDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Change the Image name to custom
            $fileName = $salt . "." . $fileType;
            $_FILES['fileUpload']['name'] = $fileName;

            if (in_array($fileType, $allowedFileType)){
                if (move_uploaded_file($tempLocation, $uploadsDir.$fileName)) {
                    mysqli_query($db, "UPDATE hotels SET h_name='$hotel_name', type='$type', avg_cost='$avg_cost', website='$hotel_website', h_address='$hotel_address', h_state='$hotel_state', h_city='$hotel_city', h_phone='$hotel_phone', h_email='$hotel_email', details='$about' WHERE id ='$hotel_id' ");
                    $insert = mysqli_query($db,"UPDATE hotel_img SET images='$fileName' WHERE hotel_id='$hotel_id'");
                    if($insert){
                        $query_success .= 'Hotel Details Added to List Successfully, Proceed to add Hotel Rooms';
                    }
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File could not be uploaded."
                    );
                }

            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }





}else{
	$update = mysqli_query($db, "UPDATE hotels SET h_name='$hotel_name', type='$type', avg_cost='$avg_cost', website='$hotel_website', h_address='$hotel_address', h_state='$hotel_state', h_city='$hotel_city', h_phone='$hotel_phone', h_email='$hotel_email', details='$about' WHERE id ='$hotel_id' ");
	if($update){
		$query_success .= 'Hotel Details Updated!';
	}
	
}

}

?>