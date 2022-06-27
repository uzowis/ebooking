<?php
require ('controllers/db.php');
session_start();
if(!isset($_SESSION['msg'])){
    header('location: index.php');
}


if (isset($_POST['repopt']) && isset($_POST['bookdates'])&& isset($_POST['room'])&& isset($_POST['hotel_id'])&& isset($_POST['qty5'])&& isset($_POST['adults'])&& isset($_POST['qty3'])&& isset($_POST['grand_total'])){
    $_SESSION['room_title'] = $_POST['room'];
    $_SESSION['room_price'] = $_POST['repopt'];
    $_SESSION['duration'] = $_POST['bookdates'];
    $_SESSION['days'] = $_POST['qty5'];
    $_SESSION['no_of_rooms'] = $_POST['qty3'];
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['total'] = $_POST['grand_total'];
    $_SESSION['hotel_id'] = $_POST['hotel_id'];
}else{
    header('location: listing.php');
}

$hotel_id = $_SESSION['hotel_id'];
$room_title = $_SESSION['room_title'];

$query = mysqli_query($db, "SELECT * FROM hotels WHERE id ='$hotel_id'");
$result = mysqli_fetch_assoc($query);

// Query Hotel Image
$query_hotel_img2 = mysqli_query($db, "SELECT * FROM hotel_img WHERE hotel_id='$hotel_id'");
$img_result2 = mysqli_fetch_assoc($query_hotel_img2);

// Query Room ID
$query_room = mysqli_query($db, "SELECT * FROM rooms WHERE room_title = '$room_title' AND hotel_id='$hotel_id'");
$result_room = mysqli_fetch_assoc( $query_room);


// DATA TO BE SENT TO DB
$_SESSION['room_id'] = $result_room['id'];




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
            <?php include('header_user.html'); ?>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Pages</a><span>Booking Page</span></div>
                        </div>
                    </div>
                    <section class="middle-padding gre y-blue-bg">
                        <div class="container">
                            <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                                <h2>Booking form for : <span><?php echo $result['h_name'];?></span></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="bookiing-form-wrap">

                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                            <div class="profile-edit-container">
                                                <div class="custom-form">
                                                    <form action="process_booking.php" method="post">
                                                        <fieldset class="fl-wrap book_mdf">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Your personal Information</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>First Name <i class="far fa-user"></i></label>
                                                                    <input type="text" name="fname" placeholder="Your Name" required value=""/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Last Name <i class="far fa-user"></i></label>
                                                                    <input type="text" name="lname"  placeholder="Your Last Name" required value=""/>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>Email Address<i class="far fa-envelope"></i>  </label>
                                                                    <input type="text" name="email" placeholder="yourmail@domain.com" required value=""/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Phone<i class="far fa-phone"></i>  </label>
                                                                    <input type="text" name="phone"  placeholder="08022211111" value=""/>
                                                                </div>
                                                            </div>
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Additional Request</h3>
                                                            </div>
                                                            <textarea cols="40" rows="3" name="notes" placeholder="Notes"></textarea>
                                                            <span class="fw-separator"></span>

                                                            <div class="filter-tags">
                                                                <input id="check-a" type="checkbox" name="check" required>
                                                                <label for="check-a">By continuing, you agree to the<a href="#" target="_blank">Terms and Conditions</a>.</label>
                                                            </div>
                                                            <span class="fw-separator"></span>
                                                            <button class="btnaplly color2-bg"  style="padding:10px 50px !important;" type="submit">Pay at Hotel <i class="fal fa-angle-right"></i></button>

                                                        </fieldset>
                                                        <fieldset class="fl-wrap book_mdf">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Confirmation</h3>
                                                            </div>
                                                            <div class="success-table-container">
                                                                <div class="success-table-header fl-wrap">
                                                                    <i class="fal fa-check-circle decsth"></i>
                                                                    <h4>Thank you. Your reservation has been received.</h4>
                                                                    <div class="clearfix"></div>
                                                                    <p>Your payment has been processed successfully.</p>
                                                                    <a href="invoice.php" target="_blank" class="color-bg">View Invoice</a>
                                                                </div>
                                                            </div>
                                                            <span class="fw-separator"></span>
                                                            <a  href="#"  class="previous-form action-button  back-form   color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--   list-single-main-item end -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-widget-item-header">
                                        <h3> Your  cart </h3>
                                    </div>
                                    <!--cart-details  --> 
                                    <div class="cart-details fl-wrap">
                                        <!--cart-details_header--> 
                                        <div class="cart-details_header">
                                            <a href="#"  class="widget-posts-img"><img src="./images/hotel_imgs/<?php echo $img_result2['images']?>" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title=""><?php echo $result['h_name'];?></a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> <?php echo $result['h_address']; ?></a></div>
                                            </div>
                                        </div>
                                        <!--cart-details_header end-->       
                                        <!--ccart-details_text-->          
                                        <div class="cart-details_text">
                                            <ul class="cart_list">
                                                <li>Room Type <span><?php echo $_SESSION['room_title']; ?> <strong>N<?php echo $_SESSION['room_price']; ?> </strong></span></li>
                                                <li>Duration <span><?php echo $_SESSION['duration']; ?> </span></li>
                                                <li>Days<span><?php echo $_SESSION['days']; ?>  </span></li>
                                                <li>Rooms <span><?php echo $_SESSION['no_of_rooms']; ?> </span></li>
                                               <!-- <li>Adults <span><?php echo $_SESSION['adults']; ?> </span></li>-->
                                            </ul>
                                        </div>
                                        <!--cart-details_text end --> 
                                    </div>
                                    <!--cart-details end --> 
                                    <!--cart-total --> 
                                    <div class="cart-total">
                                        <span class="cart-total_item_title">Total Cost</span>
                                        <strong>N<?php echo $_SESSION['total']; ?> </strong>
                                    </div>
                                    <!--cart-total end -->                             
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->
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
                                            <li> <span><i class="fal fa-map-marker-alt"></i> Adress :</span><a href="#" target="_blank">25 Ogbunabali Road, off Garrison Junction, Port Harcourt, Rivers State, Nigeria.</a></li>
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
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script>       -->
    </body>
</html>