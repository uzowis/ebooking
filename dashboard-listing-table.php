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
        <title>E-booking.ng - Hotel Booking Directory Listing</title>
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
            <?php include('admin_header.php'); ?>
                    <!-- section end-->
                    <!-- section-->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <div class="dasboard-wrap fl-wrap">
							<p><?php if($delete_success != ''){echo $delete_success; }?></p>
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
                                    <div class="dashboard-list-box fl-wrap">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Your Listings</h3>
                                        </div>
                                        <?php
                                        include ('controllers/db.php');
                                        // variable to store number of rows per page

                                        $limit = 5;

                                        // query to retrieve all rows from the table Countries

                                        $getQuery = "SELECT * FROM hotels";

                                        // get the result

                                        $q_result = mysqli_query($db, $getQuery);

                                        $total_rows = mysqli_num_rows($q_result);

                                        // get the required number of pages

                                        $total_pages = ceil ($total_rows / $limit);

                                        // update the active page number

                                        if (!isset ($_GET['page']) ) {

                                            $page_number = 0;

                                        } else {

                                            $page_number = $_GET['page'];

                                        }
                                        if($page_number > $total_pages){
                                            echo "<script type='text/javascript'> window.location.replace('./dashboard-listing-table.php');</script>";
                                        }

                                        // get the initial page number

                                        $initial_page = ($page_number-1) * $limit;

                                        //query hotel details
                                        $query_hotel = mysqli_query($db, "SELECT * FROM hotels LIMIT " . $initial_page . ',' . $limit);

                                        while($result_hotel = mysqli_fetch_assoc($query_hotel)){

                                        ?>
                                        <!-- dashboard-list  -->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
<!--                                                <span class="new-dashboard-item"></span>-->
                                                <div class="dashboard-listing-table-image">
                                                    <?php $hotel_id = $result_hotel['id'];
                                                    $query_hotel_img = mysqli_query($db, "SELECT * FROM hotel_img WHERE hotel_id='$hotel_id'");
                                                    $img_result = mysqli_fetch_assoc($query_hotel_img);

                                                    ?>
                                                    <a href="listing-single.html"><img src="images/hotel_imgs/<?php echo $img_result['images']; ?>" alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4><a href="listing-single.html"><?php echo $result_hotel['h_name'];?></a></h4>
                                                    <span class="dashboard-listing-table-address"><i class="far fa-map-marker"></i><a  href="#"><?php echo $result_hotel['h_address'] ;?></a></span>
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <li><a href="edit_hotel.php?id=<?php echo $result_hotel['id']; ?>">Edit <i class="fal fa-edit"></i></a></li>
                                                        <li><a href="edit_hotel.php?del=<?php echo $result_hotel['id']; ?>" class="del-btn">Delete <i class="fal fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <!-- dashboard-list end-->

                                    </div>
                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <?php
                                        // show page number with link
                                        for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                            ?>

                                            <?php echo '<a class="" href = "./dashboard-listing-table.php?page=' . $page_number . '">' . $page_number . ' </a>'; ?>
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