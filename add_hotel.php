<?php
error_reporting(0);
session_start();
$success_msg = $_SESSION['success_msg'];
session_destroy();
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Ebooking.ng - Best Hotel Booking Website in Nigeria</title>
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
        <style>
            #wrapper {
                padding-top: 0px;
            }
            .main-header {
                height: 60px !important;

            }

        </style>
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
            <?php include ('header_user.html'); ?>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!-- section-->
                   <!-- <section class="flat-header color-bg adm-header">
                        <div class="wave-bg wave-bg2"></div>
                        
                           
                        
                    </section> -->
					<h1 class="text text-center" style="font-size: 25px !important; margin-top:100px !important; color:#3AACED !important;">Add Hotel</h1>
                    <!-- section end-->
                    <!-- section  -->
                    <section class="middle-padding" >
                        <div class="container">
                            <!--dasboard-wrap-->
							
                            <div class="dasboard-wrap fl-wrap" style="padding-left: 0px !important; ">
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
								<form method="POST" action="controllers/add_hotel.php">
                                    <h3 style="color: green"><?php if ($success_msg) {echo $success_msg; }?></h3>
                                    <div class="box-widget-item-header">
                                        <h3> Basic Informations</h3>
                                    </div>
									
                                    <!-- profile-edit-container--> 
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <label>Hotel Name <i class="fal fa-briefcase"></i></label>
                                            <input type="text" placeholder="Name of your Hotel" name="h_name" value=""/>
											<label>Email Address <i class="fal fa-envelope"></i></label>
                                            <input type="text" placeholder="Hotel Email Address" name="h_email" value=""/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone Number <i class="fal fa-phone"></i></label>
													<input type="text" placeholder="Hotel Phone Number" name="h_phone" value=""/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Website <i class="fa fa-globe"></i></label>
                                                    <input type="text" placeholder="Hotel Website" name="h_website" value=""/>
                                                </div>
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
                                            <input type="text" placeholder="Address of your Hotel" name="h_address" value=""/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Location<i class="fal fa-long-arrow-alt-right"></i>  </label>
													<select data-placeholder="Apartments" name="state" class="chosen-select no-search-select" >
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
                                                <div class="col-md-6">
                                                    <label>City<i class="fab fa-mixcloud"></i> </label>
                                                    <input type="text" placeholder="Enter City/town"  name="city"  value=""/>                                            
                                                </div>
                                            </div>
											
											<div class="box-widget-item-header">
												<h3> Personal Information</h3>
											</div>
											
											<label>Full Name <i class="fal fa-user"></i> </label>
                                            <input type="text" placeholder="Full Name" name="fname"  value=""/>  
											
											<label>Email Address<i class="fal fa-envelope"></i> </label>
                                            <input type="text" placeholder="Personal Email Address" name="p_email"   value=""/>  
											
                                            
                                            <button class="btn color2-bg  float-btn" type="submit">Send Listing<i class="fal fa-paper-plane"></i></button>
                                        </div>
                                    </div>
									</form>
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
                <!--footer -->
                <footer class="main-footer">
                    <!--subscribe-wrap-->
                    <!--                    <div class="subscribe-wrap color-bg  fl-wrap">-->
                    <!--                        <div class="container">-->
                    <!--                            <div class="sp-bg"> </div>-->
                    <!--                            <div class="row">-->
                    <!--                                <div class="col-md-6">-->
                    <!--                                    <div class="subscribe-header">-->
                    <!--                                        <h3>Subscribe</h3>-->
                    <!--                                        <p>Want to be notified when we have new updates or launch a product. Just sign up and we'll send you a notification by email.</p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                                <div class="col-md-1"></div>-->
                    <!--                                <div class="col-md-5">-->
                    <!--                                    <div class="footer-widget fl-wrap">-->
                    <!--                                        <div class="subscribe-widget fl-wrap">-->
                    <!--                                            <div class="subcribe-form">-->
                    <!--                                                <form id="subscribe">-->
                    <!--                                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">-->
                    <!--                                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fas fa-rss-square"></i> Subscribe</button>-->
                    <!--                                                    <label for="subscribe-email" class="subscribe-message"></label>-->
                    <!--                                                </form>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="wave-bg"></div>-->
                    <!--                    </div>-->
                    <!--subscribe-wrap end -->
                    <!--footer-inner-->
                    <div class="footer-inner">
                        <div class="container">

                            <div class="row">
                                <!--footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget fl-wrap">
                                        <h3>About Us</h3>
                                        <div class="footer-contacts-widget fl-wrap">
                                            <p>A Hotel Booking  company registered in Nigeria whose corporate office  is located at No. 25 Ogbunabali Road, off Garrison Junction, Port Harcourt, Rivers State, Nigeria. </p>
                                            <ul  class="footer-contacts fl-wrap">
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">info@e-booking.ng or ebookingng@gmail.com</a></li>
                                                <!--<li> <span><i class="fal fa-map-marker-alt"></i> Adress :</span><a href="#" target="_blank">25 Ogbunabali Road, off Garrison Junction, Port Harcourt, Rivers State, Nigeria.</a></li>-->
                                                <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">07034417619, 09151927648</a></li>
                                            </ul>
                                            <div class="footer-social">
                                                <span>Find us : </span>
                                                <ul>
                                                    <li><a href="https://web.facebook.com/e-bookingng-107512831151322" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="https://twitter.com/EbookingN" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--footer-widget end-->
                                <!--footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget fl-wrap">
                                        <h3>Top Destinations</h3>
                                        <div class="widget-posts fl-wrap">
                                            <ul>
                                                <li class="clearfix">
                                                    <div class="widget-posts-descr">
                                                        <a href="listing.php?search=Port Harcourt" title="">Port Harcourt</a>
                                                </li>
                                                <li class="clearfix">
                                                    <div class="widget-posts-descr">
                                                        <a href="listing.php?search=Abuja" title="">Abuja</a>
                                                </li>
                                                <li class="clearfix">
                                                    <div class="widget-posts-descr">
                                                        <a href="listing.php?search=Owerri" title="">Owerri</a>
                                                </li>
                                                <li class="clearfix">
                                                    <div class="widget-posts-descr">
                                                        <a href="listing.php?search=Calabar" title="">Calabar</a>
                                                </li>
                                                <li class="clearfix">
                                                    <div class="widget-posts-descr">
                                                        <a href="listing.php?search=Lagos" title="">Lagos</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--footer-widget end-->
                                <!--footer-widget -->
                                <div class="col-md-4">
                                    <div class="footer-widget fl-wrap">
                                        <h3 style="border: none !important;"></h3>
                                        <div class="fl-wrap"> <a href="listing.php"> <img  src="./images/banners/3.jpeg" alt=""> </a></div>

                                    </div>
                                </div>
                                <!--footer-widget end-->
                            </div>
                            <div class="clearfix"></div>
                            <!--footer-widget -->
                            <div class="footer-widget">
                                <div class="row">
                                    <div class="col-md-4"><a class="contact-btn color-bg" href="mailto:info@ebooking.comng">Get In Touch<i class="fal fa-envelope"></i></a></div>
                                    <div class="col-md-8">
                                        <div class="customer-support-widget fl-wrap">
                                            <h4>Customer support : </h4>
                                            <a href="#" class="cs-mumber">07034417619, 09151927648</a>
                                            <a href="tel:+23407034417619" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--footer-widget end -->
                        </div>
                    </div>
                    <!--footer-inner end -->
                    <div class="footer-bg">
                    </div>
                    <!--sub-footer-->
                    <div class="sub-footer">
                        <div class="container">
                            <div class="copyright"> &#169; Ebooking.com.ng <?php echo date('Y')?> .  All rights reserved.</div>
                            <div class="subfooter-lang">
                                <div class="subfooter-show-lang"><span>Eng</span><i class="fa fa-caret-up"></i></div>
                                <ul class="subfooter-lang-tooltip">
                                    <li><a href="#">Dutch</a></li>
                                    <li><a href="#">Italian</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                            <div class="subfooter-nav">
                                <ul>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--sub-footer end -->
                </footer>
                <!--footer end -->
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