<?php
error_reporting(0);
session_start();
$admin_email = $_SESSION['email'];


include('controllers/add_hotel_room.php');

if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: admin.php');
}

// Query Database for all Hotels
$query_hotels = mysqli_query($db, "SELECT * FROM hotels");
$result_rows = mysqli_num_rows($query_hotels);

// query admin user details
$query_admin = mysqli_query($db, "SELECT * FROM admin WHERE email = '$admin_email'");
$result_admin = mysqli_fetch_assoc($query_admin);

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Ebooking.ng - Hotel Booking Directory Listing</title>
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
          <?php include ('admin_header.php');?>
                    <!-- section end-->
                    <!-- section  -->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <div class="dasboard-wrap fl-wrap">
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
                                    <?php if($add_room_success){ echo '<h3 style="color: white; background-color: green; padding: 30px;">'.$add_room_success.'</h3>';} ?>
                                   
                                    <!-- profile-edit-container end-->                                         
                                    <div class="box-widget-item-header mat-top">
                                        <h3>Add Hotel Rooms</h3>
                                    </div>
                                    <!-- profile-edit-container-->
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <div class="room-add-item">
												<label>Hotel Name</label>
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="City" name='h_name' class="chosen-select no-search-select" >

													<option>Select Hotel</option>
                                                    <?php while($result= mysqli_fetch_assoc($query_hotels)){ ?>
													<option><?php echo $result['h_name']; ?></option>
                                                    <?php }?>

                                                </select>
                                            </div>
                                                <label>Room title <i class="fal fa-warehouse-alt"></i></label>
                                                <input type="text" name='room_title' placeholder="eg. Standard Room" value=""/>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Price <i class="fal fa-dollar-sign"></i></label>
                                                        <input type="text" name='price' placeholder="eg. NGN5,000" value=""/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Guest <i class="fal fa-briefcase"></i></label>
                                                        <input type="text" name='no_of_guest' placeholder=" Numder of guests" value=""/>
                                                    </div>
                                                </div>
                                                <label>Room Details</label>
                                                <textarea cols="40" rows="3" name="details" placeholder="Datails"></textarea>
                                                <div class="profile-edit-container" style="margin-top:30px">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Gallery (Choose Hotel Image)</label>
                                                            <input type="file" name='fileUpload[]' class="upload" multiple>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <!-- Checkboxes -->
                                                            <ul class="fl-wrap filter-tags" style="margin-top:24px">
                                                                <li>
                                                                    <input id="check-aaa51" type="checkbox" name="check" checked>
                                                                    <label for="check-aaa51">Free WiFi</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-bb51" type="checkbox" name="check" checked>
                                                                    <label for="check-bb51">1 Bathroom</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-dd51" type="checkbox" name="check">
                                                                    <label for="check-dd51">Air conditioner</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-cc51" type="checkbox" name="check">
                                                                    <label for="check-cc51">Tv Inside</label>
                                                                </li>
                                                                <li>
                                                                    <input id="check-ff51" type="checkbox" name="check" checked>
                                                                    <label for="check-ff51">Breakfast</label>
                                                                </li>
                                                            </ul>

                                                            <!-- hotel-facts end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"  class="add-button color-bg">Add Room +</button>
                                        </form>
                                    </div>
                                    <!-- profile-edit-container end-->                                             
                                    
                                    <!-- profile-edit-container--> 
                                    
                                    <!-- profile-edit-container end-->                                    
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
                                    <h3>Sign In <span>E-<strong>Booking.ng</strong></span></h3>
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
                                        <h3>Sign Up <span>E-<strong>Booking.ng</strong></span></h3>
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
                                <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
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
        <script type="text/javascript" src="js/map-add.js"></script>
    </body>
</html>