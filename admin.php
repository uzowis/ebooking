<?php
error_reporting(0);
include ('controllers/db.php');
$query_hotels = mysqli_query($db, "SELECT * FROM hotels ORDER BY id DESC LIMIT 8");
$result = mysqli_fetch_assoc($query_hotels);
$hotel_id = $result['id'];

$query_room = mysqli_query($db, "SELECT * FROM room");


?>

<?php include('header_admin.html'); ?>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--section -->
                    <section class="hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="hero-parallax">
                            <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
                            <div class="overlay op7"></div>
                        </div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="home-intro">
                                    <div class="section-title-separator"><span></span></div>
                                    <h2>Book Hotels Anywhere in Nigeria</h2>
                                    <span class="section-separator"></span>                                    
                                    <h3>Let's start exploring the world together with Ebooking.ng</h3>
                                </div>
                                <div class="main-search-input-wrap">
                                    <div class="main-search-input fl-wrap">
                                        <form action="listing.php" method="get">
                                            <div class="main-search-input-item location" id="autocomplete-container">
                                                <span class="inpt_dec"><i class="fal fa-map-marker"></i></span>
                                                <input type="text" name="search" required placeholder="Hotel , City..." class="" id="autocompleteid2"  value=""/>
                                                <a href="#"><i class="fal fa-dot-circle"></i></a>
                                            </div>
                                            <div class="main-search-input-item main-date-parent main-search-input-item_small">
                                                <span class="inpt_dec"><i class="fal fa-calendar-check"></i></span> <input type="text" placeholder="When"   value=""/>
                                            </div>
                                            <div class="main-search-input-item">
                                                <div class="qty-dropdown fl-wrap">
                                                    <div class="qty-dropdown-header fl-wrap"><i class="fal fa-users"></i> Persons</div>
                                                    <div class="qty-dropdown-content fl-wrap">
                                                        <div class="quantity-item">
                                                            <label><i class="fas fa-male"></i> Adults</label>
                                                            <div class="quantity">
                                                                <input type="number" min="1" max="3" step="1" value="1">
                                                            </div>
                                                        </div>
                                                        <div class="quantity-item">
                                                            <label><i class="fas fa-child"></i> Children</label>
                                                            <div class="quantity">
                                                                <input type="number" min="0" max="3" step="1" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <button class="main-search-button color2-bg" type="submit">Search <i class="fal fa-search"></i></button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec2" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!-- section end -->
					
                    <!--section -->
                    <?php
                    function getHotelNo($db, $city){
                        $query = mysqli_query($db, "SELECT * FROM hotels WHERE (h_address LIKE '%$city%') OR (h_city like '%$city%')");
                        $hotelNo = mysqli_num_rows($query);
                        if($hotelNo > 0){echo $hotelNo;}
                    }
                    ?>
                    <section id="sec2">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Popular Destinations</h2>
                                <span class="section-separator"></span>
                                <p>See our top pick of cities visited by most guests.</p>
                            </div>
						 </div>
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span><?php getHotelNo($db, 'Port Harcourt')?>
											</span> Hotels</div>
                                            <img  src="images/city/1.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.php?search=Port Harcourt">Port Harcourt </a></h3>
                                                <div class="weather-grid"   data-grcity="Rome"></div>
                                                <div class="clearfix"></div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="images/city/3.jpg"   alt="">
                                            <div class="listing-counter"><span><?php getHotelNo($db, 'Abuja')?> </span> Hotels</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.php?search=Abuja">Abuja</a></h3>
                                                <div class="weather-grid"   data-grcity="Abuja"></div>
                                                <div class="clearfix"></div>
<!--                                                <p>Hotels located around GRA axis of Portharcourt</p>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span><?php getHotelNo($db, 'Bayelsa')?> </span> Hotels</div>
                                            <img  src="images/city/0.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.php?search=Bayelsa">Bayelsa</a></h3>
                                                <div class="weather-grid"   data-grcity="London"></div>
                                                <div class="clearfix"></div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span><?php getHotelNo($db, 'Owerri')?></span> Hotels</div>
                                            <img  src="images/city/2.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.php?search=Owerri">Owerri</a></h3>
                                                <div class="weather-grid"   data-grcity="owerri"></div>
                                                <div class="clearfix"></div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span><?php getHotelNo($db, 'Calabar')?></span> Hotels</div>
                                            <img  src="images/city/4.jpg"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="listing.php?search=Calabar">Calabar</a></h3>
                                                <div class="weather-grid"   data-grcity="Calabar"></div>
                                                <div class="clearfix"></div>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                            </div>
                            <!-- portfolio end -->
                            <a href="listing.php" class="btn    color-bg">Explore All Cities<i class="fas fa-caret-right"></i></a>
                    </section>
                    <!-- section end -->
                    <!-- section-->
                    <section class="grey-blue-bg">
                        <!-- container-->
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Recently Added Hotels</h2>
                                <span class="section-separator"></span>
                                <p>Below are our most recently added hotels. </p>
                            </div>
                        </div>
                        <!-- container end-->
                        <!-- carousel --> 
                        <div class="list-carousel fl-wrap card-listing ">
                            <!--listing-carousel-->
                            <div class="listing-carousel  fl-wrap ">
                                <!--slick-slide-item-->
                                <?php

                                    while($result = mysqli_fetch_assoc($query_hotels)){
                                        $hotel_id = $result['id'];;
                                        include('query_reviews.php');
                                ?>
                                
                                <div class="slick-slide-item">
                                    <!-- listing-item  -->
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                
                                                <?php $hotel_id = $result['id'];
                                                    $query_hotel_img = mysqli_query($db, "SELECT * FROM hotel_img WHERE hotel_id='$hotel_id'");
                                                    $img_result = mysqli_fetch_assoc($query_hotel_img);

                                                ?>
                                                <a  href="listing-single.php?id=<?php echo $result['id'];?>"><img src="images/hotel_imgs/<?php echo $img_result['images']?>" alt=""></a>

                                                <!--<div class="sale-window">Sale 60%</div>-->
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong><?php echo $remark; ?></strong><?php echo mysqli_num_rows($q_reviews) ;?> Reviews </div>
                                                        <span><?php echo $score; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="listing-single.php?id=<?php echo $result['id'];?>" ><?php echo $result['h_name']; ?></a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> <?php echo $result['h_address']; ?></a></div>
                                                    </div>
                                                </div>
                                               
                                                <p><?php echo $result['details']; ?></p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-category-price">Avg/Night <span>N <?php echo $result['avg_cost']; ?></span></div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.72956781" data-newlongitude="-73.99726866"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>		
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end -->
                                </div>
                                <?php } ?>
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                               
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->
                                <!-- Commented out for now
                                <div class="slick-slide-item">
                                    listing-item
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="listing-single.html"><img src="images/gal/1.jpg" alt=""></a>
                                                <div class="listing-avatar"><a href="author-single.html"><img src="images/avatar/2.jpg" alt=""></a>
                                                    <span class="avatar-tooltip">Added By  <strong>Godwin</strong></span>
                                                </div>
                                                <div class="sale-window">Sale 10%</div>
                                                <div class="geodir-category-opt">
                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                    <div class="rate-class-name">
                                                        <div class="score"><strong>Very Good</strong>2 Reviews </div>
                                                        <span>4.7</span>                                             
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap title-sin_item">
                                                <div class="geodir-category-content-title fl-wrap">
                                                    <div class="geodir-category-content-title-item">
                                                        <h3 class="title-sin_map"><a href="listing-single.html">Christine Hotels</a></h3>
                                                        <div class="geodir-category-location fl-wrap"><a href="#" class="map-item"><i class="fas fa-map-marker-alt"></i> Mbonu Street, Dline Port Harcourt</a></div>
                                                    </div>
                                                </div>
                                                <p>This is a lovely spot for leisure purposes. You can even organize business meetings with ease </p>
                                                <ul class="facilities-list fl-wrap">
                                                    <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                    <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                    <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                    <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                </ul>
                                                <div class="geodir-category-footer fl-wrap">
                                                    <div class="geodir-opt-link">
                                                        <div class="geodir-category-price">Awg/Night <span>N 15000</span></div>
                                                    </div>
                                                    <div class="geodir-opt-list">
                                                        <a href="#" class="single-map-item" data-newlatitude="40.94982541" data-newlongitude="-73.84357452"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map</span></a>
                                                        <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                                                        <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    listing-item end
                                </div>-->
                                <!--slick-slide-item end-->
                                <!--slick-slide-item-->

                                <!--slick-slide-item end-->
                            </div>
                            <!--listing-carousel end-->
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                        </div>
                        <!--  carousel end-->
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay op7"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="colomn-text fl-wrap pad-top-column-text_small">
                                        <div class="colomn-text-title">
                                            <h3>Most Popular Hotels</h3>
                                            <p></p>
                                            <a href="listing.php" class="btn  color2-bg float-btn">View All Hotels<i class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!--light-carousel-wrap-->
                                    <div class="light-carousel-wrap fl-wrap">
                                        <!--light-carousel-->
                                        <div class="light-carousel">
                                            <!--slick-slide-item-->

                                            <?php
                                            $hotels_query = mysqli_query($db, 'SELECT * FROM hotels LIMIT 3');
                                            while($result_ = mysqli_fetch_assoc($hotels_query)){
                                            $hotel_id2 = $result_['id'];
                                            $hotel_id = $hotel_id2;
                                            include('query_reviews.php');
                                            $query_hotel_img2 = mysqli_query($db, "SELECT * FROM hotel_img WHERE hotel_id='$hotel_id2'");
                                            $img_result2 = mysqli_fetch_assoc($query_hotel_img2);

                                            ?>
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img card-post">
                                                        <a href="listing-single.php?id=<?php echo $result_['id']?>"><img src="images/gal/1.jpg" alt=""></a>
                                                        <div class="listing-counter">Avg/Night <strong>N <?php echo $result_['avg_cost']; ?></strong></div>
<!--                                                        <div class="sale-window">Sale 20%</div>-->
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.php?id=<?php echo $result_['id']?>"><?php echo $result_['h_name']; ?></a></h4>
                                                            <div class="geodir-category-location"><a style="max-width: fit-content" href="#" class="single-map-item" data-newlatitude="40.90261483" data-newlongitude="-74.15737152"><i class="fas fa-map-marker-alt"></i> <?php echo $result_['h_state']; ?></a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> <?php echo $remark ;?></strong><?php echo mysqli_num_rows($q_reviews) ;?> Reviews </div>
                                                                <span><?php if($score == 0){ echo '4.0';}else echo $score ;?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->

                                            <?php } ?>

                                        </div>
                                        <!--light-carousel end-->
                                        <div class="fc-cont  lc-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="fc-cont  lc-next"><i class="fal fa-angle-right"></i></div>
                                    </div>
                                    <!--light-carousel-wrap end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>Why Choose Us</h2>
                                <span class="section-separator"></span>
                                <p>We are very reliable.</p>
                            </div>
                            <!-- -->
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-headset"></i></div>
                                        <h4><a href="#"> Best service guarantee</a></h4>
                                        <p>We guarantee your convinience.</p>
                                    </div>
                                    <!-- process-item end -->
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-gift"></i></div>
                                        <h4> <a href="#">Exclusive gifts</a></h4>
                                        <p>We provide comfort.</p>
                                    </div>
                                    <!-- process-item end -->                                
                                </div>
                                <div class="col-md-4">
                                    <!-- process-item-->
                                    <div class="process-item big-pad-pr-item nodecpre">
                                        <span class="process-count"> </span>
                                        <div class="time-line-icon"><i class="fal fa-credit-card"></i></div>
                                        <h4><a href="#"> Get more from your card</a></h4>
                                        <p>Your comfort is our watch word.</p>
                                    </div>
                                    <!-- process-item end -->                                
                                </div>
                            </div>
                            <!--process-wrap   end-->

                        </div>
                    </section>
                    <!-- section end -->

                    <!--section -->
                   
                    <!-- section end-->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <!-- column text-->
                                    <div class="colomn-text fl-wrap">
                                        <div class="colomn-text-title" >
                                            <h3>The owner of the hotel or business ?</h3>
                                            <p>To Add your hotel Please download our agreement form and Send us a mail of your hotel, pictures, prices, room types to ebookingng@gmail.com or info@ebooking.com.ng</p>
                                            <div style="align-items: center">
                                                <a style="padding-top: 7px" href="./agreement.pdf" class=" down-btn color3-bg"><i class="fab fa-android"></i> Agreement</a>
                                                <a href="add_hotel.php" class="btn  color-bg float-btn">Add your hotel<i class="fal fa-plus"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--column text   end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->                       

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
                                    <div class="col-md-4"><a class="contact-btn color-bg" href="mailto:info@ebooking.com.ng">Get In Touch<i class="fal fa-envelope"></i></a></div>
                                    <div class="col-md-8">
                                        <div class="customer-support-widget fl-wrap">
                                            <h4>Customer support : </h4>
                                            <a href="tel:+2347034417619" class="cs-mumber">07034417619, 09151927648</a>
                                            <a href="tel:+2347034417619" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
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
                            <!--<li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>-->
                        </ul>
                        <!--tabs -->                       
                        <div id="tabs-container">
                            <div class="tab">
                                <!--tab -->
                                <div id="tab-1" class="tab-content">
                                    <h3>Sign In to <img src="images/logo3.png" width="35%" height="auto"/></span></h3>
                                    <div class="custom-form">
                                        <form method="post"  action="login.php" name="login">
                                            <p><?php //echo $error ;?></p>
                                            <label>Username or Email Address <span>*</span> </label>
                                            <input name="email" type="text"    value="">
                                            <label >Password <span>*</span> </label>
                                            <input name="pass" type="password"    value="" >
                                            <button type="submit"  class="log-submit-btn color-bg"><span>Log In</span></button>
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
                                                <button type="submit"     class="log-submit-btn color-bg"  ><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                            </div>
                            <!--tabs end -->
                            <!--
                            <div class="log-separator fl-wrap"><span>or</span></div>
                            <div class="soc-log fl-wrap">
                                <p>For faster login or register use your social account.</p>
                                <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                            </div> -->
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBV8-quQ74wYUV0NyRA05rcxDTUQiOqCE&libraries=places&callback=initAutocomplete"></script>
        <script type="text/javascript" src="js/map-single.js"></script>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "2349151927648", // WhatsApp number
            call_to_action: "", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            pre_filled_message: "Hello!", // WhatsApp pre-filled message
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
        

    </body>
</html>