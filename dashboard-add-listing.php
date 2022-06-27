<?php
include('controllers/add_listing.php');

session_start();
$admin_email = $_SESSION['email'];
if (!isset($_SESSION['email'])) {
    header('location: admin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: admin.php');
}
// query admin user details

$query_admin = mysqli_query($db, "SELECT * FROM admin WHERE email = '$admin_email'");
$result_admin = mysqli_fetch_assoc($query_admin);

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Easybook - Hotel Booking Directory Listing Template</title>
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
                    <!-- section  -->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <div class="dasboard-wrap fl-wrap">
							<form action="" method="POST" enctype="multipart/form-data">
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
									<?php if($query_success){ echo '<h1 style="color: white; background-color: green; padding: 20px; margin-bottom:10px">'.$query_success.'</h1>';} ?>
                                    <div class="box-widget-item-header">
                                        <h3> Basic Informations</h3>
                                    </div>
                                    <!-- profile-edit-container--> 
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <label>Hotel Title <i class="fal fa-briefcase"></i></label>
                                            <input type="text" name="h_name" placeholder="Name of your Hotel" value="" required/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Type / Category</label>
                                                    <div class="listsearch-input-item">
                                                        <select data-placeholder="Apartments" name="type"class="chosen-select no-search-select"  required>
                                                            <option>All Categories</option>
                                                            <option>Apartments</option>
                                                            <option>Hotel</option>
                                                            <option>Hostel</option>
                                                            <option>Guest House</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label> AVG/Night Cost <i class="far fa-globe"></i>  </label>
													<input type="text" name="avg_cost" placeholder="Average cost per night" value="" required />
                                                </div>
                                            </div>
											<div class="col-md-6">
                                                    <label> Website <i class="far fa-globe"></i>  </label>
													<input type="text" name="h_website" placeholder="www.example.com" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- profile-edit-container end--> 
                                    <div class="box-widget-item-header">
                                        <h3> Location / Contacts</h3>
                                    </div>
                                    <!-- profile-edit-container--> 
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <label>Address<i class="fal fa-map-marker"></i></label>
                                            <input type="text" name="h_address" placeholder="Address of your Hotel" value="" required/>
											
											<div class="row">
                                                <div class="col-md-6">
                                                    <label>Location</label>
													<div class="listsearch-input-item">
														<select data-placeholder="City" name="h_state" class="chosen-select no-search-select" required >
															<option>Select State</option>
															<option >Abia</option>
															<option >Abuja</option>
															<option >Abuja Federal Capital Territory</option>
															<option >Adamawa</option>
															<option >Akwa Ibom</option>
															<option >Anambra</option>
															<option >Bauchi</option>
															<option >Bayelsa</option>
															<option >Benue</option>
															<option >Borno</option>
															<option >Cross River</option>
															<option >Delta</option>
															<option >Ebonyi</option>
															<option >Edo</option>
															<option >Ekiti</option>
															<option >Enugu</option>
															<option >FCT</option>
															<option >Gombe</option>
															<option >Imo</option>
															<option >Jigawa</option>
															<option >Kaduna</option>
															<option >Kano</option>
															<option >Katsina</option>
															<option >Kebbi</option>
															<option >Kogi</option>
															<option >Kwara</option>
															<option >Lagos</option>
															<option >Nasarawa</option>
															<option >Niger</option>
															<option >Ogun</option>
															<option >Ondo</option>
															<option >Osun</option>
															<option >Oyo</option>
															<option >Plateau</option>
															<option >Rivers</option>
															<option >Sokoto</option>
															<option >Taraba</option>
															<option >Yobe</option>
															<option >Zamfara</option>
														</select>
													</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>City <i class="fab fa-mixcloud"></i></label>
                                                    <input type="text" placeholder="City" name="h_city" value="" required/>
                                                </div>
                                            </div>
											
                                            
											<div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone Number <i class="fal fa-phone"></i></label>
													<input type="text" placeholder="Hotel Phone Number" name="h_phone" value=""/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email <i class="fa fa-envelope"></i></label>
                                                    <input type="text" placeholder="Hotel Email" name="h_email" value=""/>
                                                </div>
                                            </div>
											
                                            
                                            
                                        </div>
                                    </div>
                                   
                                    <!-- profile-edit-container end-->                                        
                                    <div class="box-widget-item-header mat-top">
                                        <h3>Details</h3>
                                    </div>
                                    <!-- profile-edit-container--> 
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <label>About Hotel</label><br>
                                            <textarea cols="40" rows="3" name="h_about" placeholder="Datails"></textarea> 
                                        </div>

                                    </div>
                                    <div class="profile-edit-container" style="margin-top:30px">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p style="padding-left: 0px !important;">Gallery (Choose Hotel Image)</p>
                                                <input type="file" name='fileUpload' >
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

                                    
                                    <!-- profile-edit-container end-->                                    
                                    
                                    <!-- profile-edit-container end-->                                    
                                </div>
                                <!-- dashboard-list-box end--> 
								 <button class="btn color3-bg  float-btn" type="submit">Add Hotel<i class="fal fa-paper-plane"></i></button>
								</form>
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