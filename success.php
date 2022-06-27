<?php

$booking_id = '';
if(isset($_GET['id'])){
    $booking_id = $_GET['id'];
}




?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Ebooking - Best Hotel Booking Website in Nigeria</title>
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
            margin-top: 50px;
        }
        .main-header {
            height: 60px !important;

        }
        .add-hotel{
            background-color: orange !important;
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

    <div id="wrapper">
        <!-- content-->
        <div class="content">
            <div class="breadcrumbs-fs fl-wrap">
                <div class="container">
                    <div class="breadcrumbs fl-wrap"><a href="./index.php">Home</a><a href="#">Pages</a><span>Booking Page</span></div>
                </div>
            </div>
            <section class="middle-padding gre y-blue-bg">
                <div class="container">
                    <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                        <h2>Booking ID : <span><?php echo $booking_id ;?></span></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="bookiing-form-wrap">

                                <!--   list-single-main-item -->
                                <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                    <div class="profile-edit-container">
                                        <div class="custom-form">
                                            <form>

                                                <fieldset class="fl-wrap book_mdf">
                                                    <div class="list-single-main-item-title fl-wrap">
                                                        <h3>Confirmation</h3>
                                                    </div>
                                                    <div class="success-table-container">
                                                        <div class="success-table-header fl-wrap">
                                                            <i class="fal fa-check-circle decsth"></i>
                                                            <h4>Thank you. Your reservation has been received.</h4>
                                                            <div class="clearfix"></div>
                                                            <p>Kindly make payment at the Hotel reception.</p>
                                                            <a href="invoice.php?book_id=<?php echo $booking_id;?>" target="_blank" class="color-bg">View Invoice</a>
                                                        </div>
                                                    </div>
                                                    <span class="fw-separator"></span>
                                                    <a  href="./index.php"  class="previous-form action-button   color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--   list-single-main-item end -->
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- section end -->
        </div>
        <!-- content end-->
    </div>
    <!--wrapper end -->
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
                                            <a href="tel:+2347034417619" class="cs-mumber">07034417619, 09151927648</a>
                                            <a href="tel:+23487034417619" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
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
                            <h3>Sign In <span>E-<strong>Booking</strong></span></h3>
                            <div class="custom-form">
                                <form method="post"  name="registerform">
                                    <label>Username or Email Address <span>*</span> </label>
                                    <input name="email" type="text"   onClick="this.select()" value="">
                                    <label >Password <span>*</span> </label>
                                    <input name="password" type="password"   onClick="this.select()" value="" >
                                    <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a12" type="checkbox" name="check">
                                        <label for="check-a12">Remember me</label>
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
</body>
</html>