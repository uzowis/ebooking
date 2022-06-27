<?php
include ('controllers/db.php');
$keyword = '';
if(isset($_GET['search'])){
    $keyword = mysqli_real_escape_string($db, $_GET['search']);
}

$query = mysqli_query($db, "SELECT * FROM hotels WHERE (h_name LIKE '%$keyword%') OR (h_city like '%$keyword%')");



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
           <?php include ('header_user.html'); ?>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper" >
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section single-par" data-scrollax-parent="true">
                        <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="section-title center-align big-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2><span>Available Hotels</span></h2>
                                </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec1" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="./index.php">Home</a><a href="#">Listing </a></div>
                        </div>
                    </div>
                    <!--  section-->
                    <section class="grey-blue-bg small-padding" id="sec1" style="min-width: 300px; overflow-x: scroll ">
                        <div class="container">
                            <div class="row">
                                <!--filter sidebar end-->
                                <!--listing -->
                                <div class="col-md-12" style="margin: 0px auto !important;">
                                    <!--col-list-wrap -->
                                    <div class="col-list-wrap fw-col-list-wrap post-container">
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- list-main-wrap-opt-->
                                            <div class="list-main-wrap-opt fl-wrap">
                                                <div class="list-main-wrap-title fl-wrap col-title">
                                                    <h2>Results For : <span><?php echo strtoupper($keyword)?> </span></h2>
                                                </div>
                                                <!-- price-opt-->
<!--                                                <div class="price-opt">-->
<!--                                                    <span class="price-opt-title">Sort results by:</span>-->
<!--                                                    <div class="listsearch-input-item">-->
<!--                                                        <select data-placeholder="Popularity" class="chosen-select no-search-select" >-->
<!--                                                            <option>Popularity</option>-->
<!--                                                            <option>Average rating</option>-->
<!--                                                            <option>Price: low to high</option>-->
<!--                                                            <option>Price: high to low</option>-->
<!--                                                        </select>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <!-- price-opt end-->
                                                <!-- price-opt-->
                                                <div class="grid-opt">
                                                    <ul>

                                                        <li><span class="one-col-grid act-grid-opt" ><i class="fas fa-bars"></i></span></li>
<!--                                                        <li><span class="two-col-grid "><i class="fas fa-th-large"></i></span></li>-->
                                                    </ul>
                                                </div>
                                                <!-- price-opt end-->                               
                                            </div>
                                            <!-- list-main-wrap-opt end-->
                                            <!-- listing-item-container -->
                                            <div class="listing-item-container init-grid-items fl-wrap">
                                                <!-- listing-item  -->
                                                <?php
                                                include ('controllers/db.php');
                                                // variable to store number of rows per page

                                                $limit = 5;

                                                // query to retrieve all rows from the table Countries

                                                $getQuery = "SELECT * FROM hotels ";

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
                                                    echo "<script type='text/javascript'> window.location.replace('./listing.php?page=1');</script>";
                                                }

                                                // get the initial page number

                                                $initial_page = ($page_number-1) * $limit;

                                                //query hotel details
                                                $query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE (h_name LIKE '%$keyword%') OR (h_city like '%$keyword%') LIMIT " . $initial_page . ',' . $limit);

                                                while($result = mysqli_fetch_assoc($query_hotel)){

                                                ?>

                                                <div class="listing-item has_one_column">
                                                    <article class="geodir-category-listing fl-wrap">
                                                            <div class="geodir-category-img">
                                                                <?php $hotel_id = $result['id'];
                                                                $query_hotel_img = mysqli_query($db, "SELECT * FROM hotel_img WHERE hotel_id='$hotel_id'");
                                                                $img_result = mysqli_fetch_assoc($query_hotel_img);

                                                                ?>
                                                                <a href="listing-single.php?id=<?php echo $result['id'];?>"><img src="images/hotel_imgs/<?php echo $img_result['images'];?>" alt=""></a>
<!--                                                                <div class="geodir-category-opt">-->
<!--                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>-->
<!--                                                                    <div class="rate-class-name">-->
<!--                                                                        <div class="score"><strong>Very Good</strong>27 Reviews </div>-->
<!--                                                                        <span>5.0</span>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
                                                            </div>
                                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                                <div class="geodir-category-content-title fl-wrap">
                                                                    <div class="geodir-category-content-title-item">
                                                                        <h3 class="title-sin_map"><a href="listing-single.php?id=<?php echo $result['id'];?>"><?php echo $result['h_name'];?></a></h3>
                                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i><?php echo $result['h_address'];?></a></div>
                                                                    </div>
                                                                </div>
<!--                                                                <p>--><?php //echo $result['details'];?><!--.</p>-->
                                                                <ul class="facilities-list fl-wrap">
                                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                                </ul>
                                                                <div class="geodir-category-footer fl-wrap">
                                                                    <div class="geodir-category-price">Avg/Night <span>N <?php echo $result['avg_cost'];?></span></div>
                                                                    <div class="geodir-opt-list">
                                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
<!--                                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>-->
<!--                                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                </div>
                                                <?php }?>
                                                <!-- listing-item end -->

                                            </div>
                                            <!-- listing-item-container end-->
<!--                                            <a class="load-more-button" href="#">Load more <i class="fal fa-spinner"></i> </a>-->
                                            <!-- pagination-->
                                            <div class="pagination">
                                                <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                                <?php
                                                // show page number with link
                                                for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                                    ?>

                                                    <?php echo '<a class="" href = "./listing.php?page=' . $page_number . '">' . $page_number . ' </a>'; ?>
                                                <?php }  ?>
                                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                            </div>

                                        </div>
                                        <!-- list-main-wrap end-->
                                    </div>
                                    <!--col-list-wrap end -->
                                </div>
                                <!--listing  end-->
                            </div>
                            <!--row end-->
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
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
                                                <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">info@ebooking.com.ng or ebookingng@gmail.com</a></li>
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
            </div>
            <!--wrapper end -->

            <!--map-modal -->
            <div class="map-modal-wrap">
                <div class="map-modal-wrap-overlay"></div>
                <div class="map-modal-item">
                    <div class="map-modal-container fl-wrap">
                        <div class="map-modal fl-wrap">
                            <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                        </div>
                        <h3><i class="fal fa-location-arrow"></i><a href="#">Hotel Title</a></h3>
                        <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text" placeholder="What Nearby ?   Bar , Gym , Restaurant ">
                        <div class="map-modal-close"><i class="fal fa-times"></i></div>
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
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script> -->
        <script type="text/javascript" src="js/map-single.js"></script>         
    </body>
</html>