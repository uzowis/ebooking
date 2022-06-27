<?php
error_reporting(0);
session_start();
$admin_email = $_SESSION['email'];
if(!isset($_SESSION['email'])){
    header('location: admin.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: admin.php');
}
// query admin user details
require_once ('controllers/db.php');
$query_admin = mysqli_query($db, "SELECT * FROM admin WHERE email = '$admin_email'");
$result_admin = mysqli_fetch_assoc($query_admin);


?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Ebooking.com.ng - Hotel Booking Directory Listing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin">
                <div class="pulse"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->

                    <!-- section-->
                    <?php include('admin_header.php'); ?>
                    <!-- section end-->
                    <!-- section-->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <div class="dasboard-wrap fl-wrap">
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
                                    <div class="dashboard-list-box fl-wrap">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Bookings</h3>
                                        </div>


                                    </div>
                                    <!-- pagination-->
                                    <?php
                                    include ('controllers/db.php');
                                    // variable to store number of rows per page

                                    $limit = 5;

                                    // query to retrieve all rows from the table Countries

                                    $getQuery = "SELECT * FROM bookings";

                                    // get the result

                                    $q_result = mysqli_query($db, $getQuery);

                                    $total_rows = mysqli_num_rows($q_result);

                                    // get the required number of pages

                                    $total_pages = ceil ($total_rows / $limit);

                                    // update the active page number

                                    if (!isset ($_GET['page']) ) {

                                        $page_number = 1;

                                    } else {

                                        $page_number = $_GET['page'];

                                    }
                                    if($page_number > $total_pages){
                                       echo "<script type='text/javascript'> window.location.replace('./dashboard-bookings.php');</script>";
                                    }

                                    // get the initial page number

                                    $initial_page = ($page_number-1) * $limit;

                                    // get data of selected rows per page

                                    $query_booking = "SELECT *FROM bookings ORDER BY id DESC LIMIT " . $initial_page . ',' . $limit;

                                    $result_ = mysqli_query($db, $query_booking);

                                    //display the retrieved result on the webpage

                                    while ($result_booking = mysqli_fetch_assoc($result_)) {

                                            $date = $result_booking['date'];
                                            $name = $result_booking['name'];
                                            $phone = $result_booking['phone'];
                                            $email = $result_booking['email'];
                                            $days = $result_booking['duration'];
                                            $bookdates = $result_booking['booked_dates'];
                                            $quests = $result_booking['no_of_persons'];
                                            $rooms = $result_booking['no_of_rooms'];
                                            $total = $result_booking['total_cost'];
                                            $booking_status = $result_booking['booking_status'];
                                            $booking_id = $result_booking['booking_id'];

                                            $room_id = $result_booking['room_id'];
                                            $hotel_id = $result_booking['hotel_id'];

                                            //query hotel details
                                            $query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE id = '$hotel_id'");
                                            $result_hotel = mysqli_fetch_assoc($query_hotel);
                                            $hotel = $result_hotel['h_name'];
                                            $hotel_addr = $result_hotel['h_address'];
                                            $hotel_phone = $result_hotel['h_phone'];

                                            //query Room details
                                            $query_room = mysqli_query($db, "SELECT * FROM rooms WHERE id = '$room_id' AND hotel_id = '$hotel_id'");
                                            $result_room = mysqli_fetch_assoc($query_room);
                                            $room_title = $result_room['room_title'];
                                            $room_price = $result_room['price'];




                                            ?>
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <span class="new-dashboard-item" <?php if($booking_status === 'Cancelled'){ echo 'style="background-color: #ffa500; color: white; "';} ?> ><?php echo $booking_status;?> <a href="./cb.php?id=<?php echo $booking_id; ?>&cancel_booking=Cancelled" <?php if($booking_status === 'Booked'){ echo 'style="background-color: #ed3939; color: white; padding: 8px 12px 8px 5px"';}else{ echo 'style="display: none"' ;} ?> >Cancel</a></span>
                                            <div class="dashboard-message-avatar">

                                            </div>
                                            <div class="dashboard-message-text">
                                                <h4><?php echo $result_booking['name']?> - <span><?php echo $date; ?></span></h4>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Hotel :</span>
                                                    <span class="booking-text"><a href="#"><?php echo $hotel; ?></a></span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Persons :</span>
                                                    <span class="booking-text"><?php echo $quests; ?> People</span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Room Type :</span>
                                                    <span class="booking-text"><?php echo $room_title; ?> - N<?php echo $room_price; ?></span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">No of Rooms :</span>
                                                    <span class="booking-text"><?php echo $rooms; ?> rooms</span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Booking Date :</span>
                                                    <span class="booking-text"><?php echo $bookdates; ?></span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Customer Email:</span>
                                                    <span class="booking-text"><a href="#" target="_top"><?php echo $email; ?></a></span>
                                                </div>
                                                <div class="booking-details fl-wrap">
                                                    <span class="booking-title">Phone :</span>
                                                    <span class="booking-text"><a href="tel:0807 558 1223" target="_top"><?php echo $phone; ?></a></span>
                                                </div>
                                                <!--<div class="booking-details fl-wrap">
                                                    <span class="booking-title">Payment State :</span>
                                                    <span class="booking-text"> <strong class="done-paid">Paid  </strong>  using Paypal</span>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <!-- dashboard-list end-->




                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <?php
                                        // show page number with link
                                            for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                        ?>

                                        <?php echo '<a class="" href = "./dashboard-bookings.php?page=' . $page_number . '">' . $page_number . ' </a>'; ?>
                                        <?php }  ?>
                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                    </div>

                                </div>
                                <!-- dashboard-list-box end--> 
                            </div>
                            <!-- dasboard-wrap end-->
                        </div>
                    </section>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->
            <!--footer -->
            
                          
                <!--sub-footer end -->
            </footer>
            <!--footer end -->
            <!--map-modal -->
            <div class="map-modal-wrap">
                <div class="map-modal-wrap-overlay"></div>
                <div class="map-modal-item">
                    <div class="map-modal-container fl-wrap">
                        <h3>Hotel Title</h3>
                        <div class="map-modal fl-wrap">
                            <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                        </div>
                        <a href="#" class="btn color2-bg">View Details <i class="fal fa-angle-right"></i></a>
                        <div class="map-modal-close"><i class="far fa-times"></i></div>
                    </div>
                </div>
            </div>
            <!--map-modal end -->            
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="reg-overlay"></div>
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                        </ul>
                        <!--tabs -->                       
                        <div id="tabs-container">
                            <div class="tab">
                                <!--tab -->
                                <div id="tab-1" class="tab-content">
                                    <h3>Sign In <span>Easy<strong>Book</strong></span></h3>
                                    <div class="custom-form">
                                        <form method="post"  name="registerform">
                                            <label>Username or Email Address <span>*</span> </label>
                                            <input name="email" type="text"   onClick="this.select()" value="">
                                            <label >Password <span>*</span> </label>
                                            <input name="password" type="password"   onClick="this.select()" value="" >
                                            <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                                <!--tab -->
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <h3>Sign Up <span>Easy<strong>Book</strong></span></h3>
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >Full Name <span>*</span> </label>
                                                <input name="name" type="text"   onClick="this.select()" value="">
                                                <label>Email Address <span>*</span></label>
                                                <input name="email" type="text"  onClick="this.select()" value="">
                                                <label >Password <span>*</span></label>
                                                <input name="password" type="password"   onClick="this.select()" value="" >
                                                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                            </div>
                            <!--tabs end -->
                            <div class="log-separator fl-wrap"><span>or</span></div>
                            <div class="soc-log fl-wrap">
                                <p>For faster login or register use your social account.</p>
                                <a href="https://web.facebook.com/e-bookingng-107512831151322" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--register form end -->
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script>        
    </body>
</html>