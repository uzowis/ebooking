<?php

// connect to the database
include ('db.php');
$hotel_name = $_POST['h_name'];
$query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE h_name = '$hotel_name'");
$query_result = mysqli_fetch_assoc($query_hotel);
$hotel_id = $query_result['id'];


$add_room_success ="";
$fileSizeError_sign = '';
$fileSizeError_photo = '';
$fileTypeError_sign = '';
$fileTypeError_photo = '';
$error_email = '';
$error_user = '';
$error_id = '';
$error_phone = '';
$error_pwd = '';
$error_pwd_change = "";
$error_photo = '';
$error_sign = '';
$login_error = '';
$success = "";
$download = '';
$date_of_reg = date("Y/m/d");


// Add room to hotels
if (isset($_FILES['fileUpload']['name']) && isset($_POST['h_name'])&& isset($_POST['room_title'])&& isset($_POST['price'])&& isset($_POST['no_of_guest'])&& isset($_POST['details']) ) {

        // receive all input values from the form
        $h_name = mysqli_real_escape_string($db, $_POST['h_name']);
        $room_title = mysqli_real_escape_string($db, $_POST['room_title']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $no_of_guest = mysqli_real_escape_string($db, $_POST['no_of_guest']);
        $details = mysqli_real_escape_string($db, $_POST['details']);


        $uploadsDir = "./images/hotel_imgs/";
        $allowedFileType = array('jpg', 'png', 'jpeg', 'JPG');

        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {

            // Loop through file items
            foreach ($_FILES['fileUpload']['name'] as $id => $val) {
                // Get files upload path
                $rnd = rand();
                $salt =$rnd.time();
                $fileName = $_FILES['fileUpload']['name'][$id];
                $tempLocation = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath = $uploadsDir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

                // Change the Image name to custom
                $fileName = $salt . "." . $fileType;
                $_FILES['fileUpload']['name'][$id] = $fileName;

                if (in_array($fileType, $allowedFileType)) {
                    if (move_uploaded_file($tempLocation, $uploadsDir.$fileName)) {
                        $sqlVal = "('" . $hotel_id . "', '" . $fileName . "')";
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
                // Add into MySQL database
                if (!empty($sqlVal)) {
                    $insert = mysqli_query($db,"INSERT INTO room_imgs (hotel_id, images) VALUES $sqlVal");

                    if ($insert) {
                            $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    } else {
                        echo mysqli_error($query);
                        echo mysqli_error($insert);
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }

        }
    $query = mysqli_query($db, "INSERT INTO rooms (hotel_id, room_title, price, no_of_guest, details) VALUES('$hotel_id','$room_title', '$price', '$no_of_guest', '$details')");
    if($query){
        $add_room_success ="Hotel Room was Successfully added! You can add more rooms below";
    }
// else {
//        // Error
//        $response = array(
//            "status" => "alert-danger",
//            "message" => "Please select a file to upload."
//        );
//    }



}



// Add room to hotels
//if (isset($_FILES['img']['name']) && isset($_POST['h_name'])&& isset($_POST['room_title'])&& isset($_POST['price'])&& isset($_POST['no_of_guest'])&& isset($_POST['details']) ) {
//
//        // receive all input values from the form
//        $h_name = mysqli_real_escape_string($db, $_POST['h_name']);
//        $room_title = mysqli_real_escape_string($db, $_POST['room_title']);
//        $price = mysqli_real_escape_string($db, $_POST['price']);
//        $no_of_guest = mysqli_real_escape_string($db, $_POST['no_of_guest']);
//        $details = mysqli_real_escape_string($db, $_POST['details']);
//        $img_dir = './images/hotel_imgs/';
//        $img_filename = $img_dir . basename($_FILES['img']['name']);
//
//
//        // Select File type
//        $imgFileType = strtolower(pathinfo($img_filename, PATHINFO_EXTENSION));
//
//        // Change the Image name to custom
//        $img = $salt . "." . $imgFileType;
//        $_FILES['img']['name'] = $img;
//
//        // Restrict file size to 2MB
//        $imgFilesize = $_FILES['img']['size'];
//        $imgFilesize = round($imgFilesize / 2048);
//
//
//        if ($imgFilesize > 2048) {
//            $fileSizeError_photo = "Maximum file size Exceeded";
//        } else {
//
//            // Valid File Extensions
//            $extensions_arr = array("jpg", "jpeg", "png", 'JPEG', "JPG");
//
//            // Check Extensions
//                if (in_array($imgFileType, $extensions_arr)) {
//                    // Insert into db
//                    $query = "INSERT INTO rooms (hotel_id, room_title, price, no_of_guest, img, details) VALUES('$hotel_id','$room_title', '$price', '$no_of_guest', '$img', '$details')";
//                    if (mysqli_query($db, $query)) {
//                        // move images to their respective folders in server
//                        move_uploaded_file($_FILES['img']['tmp_name'], $img_dir . $img);
//                        $add_room_success .="Hotel Room was Successfully added! You can add more rooms below";
//
//                    } else {
//                        echo "<br>Query Unsuccessful " . mysqli_error($db);
//                    }
//
//                } else {
//                    $fileTypeError_sign = "Invalid File Type. File must be in (JPEG, JPG, PNG) format";
//                }
//
//
//
//
//
//
//    }
//
//
//}


// Database
include ('db.php');




?>
