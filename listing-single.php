<?php
error_reporting(0);
require ('controllers/db.php');
session_start();
$_SESSION['msg']= 'success';

$hotel_id ="";
$rows = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $q_id = mysqli_query($db, "SELECT * FROM hotels WHERE id ='$id'");
    $rows = mysqli_num_rows($q_id);
    if($rows <1){
        header('location: listing.php');
    }

}

if(isset($_GET['id'])){
    $hotel_id= $_GET['id'];
}else{
    header('location: index.php');
}


$query_hotels = mysqli_query($db, "SELECT * FROM hotels WHERE id = $hotel_id ");
$query_room = mysqli_query($db, "SELECT * FROM rooms WHERE hotel_id =$hotel_id");
$result = mysqli_fetch_assoc($query_hotels);



$_SESSION['hotel_name'] =$result['h_name'];
$_SESSION['hotel_addr'] =$result['h_address'];

include('query_reviews.php');



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
            .gbAWcy{
                width: 30px !important;
                height: 30px !important;
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
            <?php include ('header_user.html'); ?>
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="list-single-hero" data-scrollax-parent="true" id="sec1">
                        <div class="bg par-elem "  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="list-single-hero-title fl-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="listing-rating-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        </div>
                                        <h2><span><?php echo $result['h_name'] ?></span></h2>
                                        <div class="list-single-header-contacts fl-wrap">
                                            <ul>
                                                <!--<li><i class="far fa-phone"></i><a  href="#">+7(111)123456789</a></li>-->
                                                <li><i class="far fa-map-marker-alt"></i><a  href="#"><?php echo $result['h_address'] ?></a></li>
                                                <!--<li><i class="far fa-envelope"></i><a  href="#">yourmail@domain.com</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <!--  list-single-hero-details-->
                                        <div class="list-single-hero-details fl-wrap">
                                            <!--  list-single-hero-rating-->
                                            <div class="list-single-hero-rating">
                                                <div class="rate-class-name">

                                                    <div class="score"><strong><?php echo $remark; ?> </strong><?php echo mysqli_num_rows($q_reviews); ?> Reviews </div>
                                                    <span><?php if($score == 0){ echo '4.0';}else echo $score ;?> </span>
                                                </div>
                                                <!-- list-single-hero-rating-list-->
                                                <div class="list-single-hero-rating-list">
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Cleanliness</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo ($cleanliness/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $cleanliness; ?> </div>
                                                    </div>
                                                    <!-- rate item end-->
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Comfort</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo ($comfort/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $comfort; ?> </div>
                                                    </div>
                                                    <!-- rate item end-->                                                        
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Staff</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo ($staff/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $staff; ?> </div>
                                                    </div>
                                                    <!-- rate item end-->  
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Facilities</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo ($facilities/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $facilities; ?> </div>
                                                    </div>

                                                    <!-- rate item end--> 
                                                </div>
                                                <!-- list-single-hero-rating-list end-->
                                            </div>
                                            <!--  list-single-hero-rating  end-->
                                            <div class="clearfix"></div>
                                            <!-- list-single-hero-links-->
                                            <div class="list-single-hero-links">
                                                <a class="lisd-link" href="#book-now" style="background-color: #f8bb11;"><i class="fal fa-bookmark"></i> Book Now</a>
                                                <a class="custom-scroll-link lisd-link" href="#sec6" style="background-color: #3aaced;"><i class="fal fa-comment-alt-check"></i> Add review</a>
                                            </div>
                                            <!--  list-single-hero-links end-->                                            
                                        </div>
                                        <!--  list-single-hero-details  end-->
                                    </div>
                                </div>
                                <div class="breadcrumbs-hero-buttom fl-wrap">
                                    <div class="breadcrumbs"><a href="./index.php">Home</a><a href="./listing.php">Listings</a><span>Hotels</span></div>
                                    <div class="list-single-hero-price" >AvG/NIGHT<span>N <?php echo $result['avg_cost'] ?></span></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="grey-blue-bg small-padding scroll-nav-container" id="sec2">
                        <!--  scroll-nav-wrapper  -->

                        <!--  scroll-nav-wrapper end  -->
                        <!--   container  -->
                        <div class="container">
                            <!--   row  -->
                            <div class="row">
                                <!--   datails -->
                                <div class="col-md-8">
                                    <div class="list-single-main-container ">
                                        <!-- fixed-scroll-column  -->
                                        <div class="fixed-scroll-column">
                                            <div class="fixed-scroll-column-item fl-wrap">
                                                <div class="showshare sfcs fc-button"><i class="far fa-share-alt"></i><span>Share </span></div>
                                                <div class="share-holder fixed-scroll-column-share-container">
                                                    <div class="share-container  isShare"></div>
                                                </div>
                                                <a class="fc-button custom-scroll-link" href="#sec6"><i class="far fa-comment-alt-check"></i> <span>  Add review </span></a>
                                                <a class="fc-button" href="#"><i class="far fa-heart"></i> <span>Save</span></a>
                                                <a class="fc-button" href="booking-single.php"><i class="far fa-bookmark"></i> <span> Book Now </span></a>
                                            </div>
                                        </div>
                                        <h2 style="font-size: 1.5rem; padding-bottom: 20px; font-weight: bold; color: green"><?php if(isset($_SESSION['rev_success'])){echo $_SESSION['rev_success'];} unset($_SESSION['rev_success']); ?></h2>
                                        <!-- fixed-scroll-column end   -->
                                        <div class="list-single-main-media fl-wrap">
                                            <!-- gallery-items   -->
                                            <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                                <?php
                                                    $query_img = mysqli_query($db, "SELECT * FROM room_imgs WHERE hotel_id ='$hotel_id' LIMIT 6");
                                                    while ($query_img_result = mysqli_fetch_assoc($query_img)){
                                                ?>
                                                <!-- 1 -->
                                                <div class="gallery-item ">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/hotel_imgs/<?php echo $query_img_result['images']?>"   alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 1 end -->
                                                <?php } ?>
                                                <!-- 7 end -->
                                            </div>
                                            <!-- end gallery items -->                                          
                                        </div>
                                        <!-- list-single-header end -->
                                        <div class="list-single-facts fl-wrap">
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-bed"></i>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts  -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-users"></i>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-taxi"></i>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->
                                            <!-- inline-facts -->
                                            <div class="inline-facts-wrap">
                                                <div class="inline-facts">
                                                    <i class="fal fa-cocktail"></i>
                                                </div>
                                            </div>
                                            <!-- inline-facts end -->                                                                        
                                        </div>
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>About Hotel </h3>
                                            </div>
                                            <p><?php echo $result['details']?></p>

                                        </div>
                                        <!--   list-single-main-item end -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec3">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Amenities</h3>
                                            </div>
                                            <div class="listing-features fl-wrap">
                                                <ul>
                                                    <li><i class="fal fa-wifi"></i> Free Wi Fi</li>
                                                    <li><i class="fal fa-parking"></i> Free Parking</li>
                                                    <li><i class="fal fa-snowflake"></i> Air Conditioned</li>
                                                    <li><i class="fal fa-plane"></i>Airport Shuttle</li>
                                                    <li><i class="fal fa-paw"></i> Pet Friendly</li>
                                                    <li><i class="fal fa-utensils"></i> Restaurant Inside</li>
                                                    <li><i class="fal fa-wheelchair"></i> Wheelchair Friendly</li>
                                                </ul>
                                            </div>
                                            <!--<span class="fw-separator"></span>-->
                                            <!--<div class="list-single-main-item-title no-dec-title fl-wrap">-->
                                            <!--    <h3>Tags</h3>-->
                                            <!--</div>-->
                                            <!--<div class="list-single-tags tags-stylwrap">-->
                                            <!--    <a href="#">Hotel</a>-->
                                            <!--    <a href="#">Hostel</a>-->
                                            <!--    <a href="#">Room</a>-->
                                            <!--    <a href="#">Spa</a>-->
                                            <!--    <a href="#">Restourant</a>-->
                                            <!--    <a href="#">Parking</a>                                                                               -->
                                            <!--</div>-->
                                        </div>
                                        <!--   list-single-main-item end -->     
                                        <!-- accordion
                                        <div class="accordion mar-top">
                                            <a class="toggle act-accordion" href="#"> Details option   <span></span></a>
                                            <div class="accordion-inner visible">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                            </div>
                                            <a class="toggle" href="#"> Details option 2  <span></span></a>
                                            <div class="accordion-inner">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                            </div>
                                            <a class="toggle" href="#"> Details option 3  <span></span></a>
                                            <div class="accordion-inner">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
                                            </div>
                                        </div>
                                        accordion end -->
                                        <!--   list-single-main-item -->

                                        <!-- list-single-main-item end -->
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Reviews </h3>
                                            </div>
                                            <!--reviews-score-wrap-->

                                            <div class="reviews-score-wrap fl-wrap">
                                                <div class="review-score-total">
                                                    <span>
                                                    <?php if($score == 0){ echo '4.0';}else echo $score ;?>
                                                    <strong><?php echo $remark ;?></strong>
                                                    </span>
                                                    <a href="#sec6" class="color2-bg custom-scroll-link">Add Review</a>
                                                </div>
                                                <div class="review-score-detail">
                                                    <!-- review-score-detail-list-->
                                                    <div class="review-score-detail-list">
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Cleanliness</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo ($cleanliness/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $cleanliness ;?></div>
                                                        </div>
                                                        <!-- rate item end-->
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Comfort</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo ($comfort/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $comfort ;?></div>
                                                        </div>
                                                        <!-- rate item end-->                                                        
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Staff</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo ($staff/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $staff ;?></div>
                                                        </div>
                                                        <!-- rate item end-->  
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Facilities</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo ($facilities/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $facilities ;?></div>
                                                        </div>
                                                        <!-- rate item end--> 
                                                    </div>
                                                    <!-- review-score-detail-list end-->
                                                </div>
                                            </div>
                                            <!-- reviews-score-wrap end -->   
                                            <div class="reviews-comments-wrap">
                                                <?php
                                                while($reviews = mysqli_fetch_assoc($q_reviews)){
                                                    $remark = '';
                                                    $score = $reviews['score'];
                                                    switch ($score){
                                                        case $score >= 4.5 :
                                                            $remark = 'Excellent';
                                                            break;
                                                        case $score >= 4 :
                                                            $remark = 'Very Good';
                                                            break;
                                                        case $score >= 3 :
                                                            $remark = 'Good';
                                                            break;
                                                        case $score < 1 :
                                                            $remark = 'Very Good';
                                                            break;
                                                        default :
                                                            $remark = 'Fair';
                                                    }
                                                    if($reviews['rev_name'] !== ''){


                                                ?>
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="images/avatar/avatar-bg.png" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <h4><a href="#"><?php echo $reviews['rev_name']; ?></a></h4>
                                                        <div class="review-score-user">
                                                            <span><?php if($score == 0){ echo '4.0';}else echo  $reviews['score'] ;?></span>
                                                            <strong><?php echo $remark ?></strong>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p><?php echo $reviews['reviews']; ?></p>

                                                    </div>
                                                </div>
                                                <!--reviews-comments-item end-->
                                                <?php }} ?>

                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->   
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec6">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Add Review</h3>
                                            </div>
                                            <!-- Add Review Box -->
                                            <div id="add-review" class="add-review-box">
                                                <!-- Review Comment -->
                                                <form id="add-comment" action="add_review.php" method="GET" class="add-comment  custom-form" name="rangeCalc" >
                                                    <fieldset>
                                                        <div class="review-score-form fl-wrap">
                                                            <div class="review-range-container">
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Cleanliness</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="cleanliness"  data-step="1" value="4">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Comfort</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="comfort"  data-step="1"  value="1">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Staff</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="staff"  data-step="1" value="5" >
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Facilities</div>
                                                                    <div class="range-slider-wrap">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="facilities"  data-step="1" value="3">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end -->                                     
                                                            </div>
<!--                                                            <div class="review-total">-->
<!--                                                                <span><input type="text" name="rg_total"  data-form="AVG({rgcl})" value="0"></span>-->
<!--                                                                <strong>Your Score</strong>-->
<!--                                                            </div>-->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-user"></i></label>
                                                                <input type="text" name="name" placeholder="Your Name *" value=""/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-envelope"></i>  </label>
                                                                <input type="text" name="email" placeholder="Email Address*" value=""/>
                                                                <input type="hidden" name="hotel_id" value="<?php echo $hotel_id;?>" >
                                                            </div>
                                                        </div>
                                                        <textarea cols="40" name="reviews" rows="3" placeholder="Your Review:"></textarea>
                                                    </fieldset>
                                                    <button class="btn  big-btn flat-btn float-btn color2-bg" style="margin-top:30px">Submit Review <i class="fal fa-paper-plane"></i></button>
                                                </form>
                                            </div>
                                            <!-- Add Review Box / End -->
                                        </div>
                                        <!-- list-single-main-item end -->                                    
                                    </div>
                                </div>
                                <!--   datails end  -->
                                <!--   sidebar  -->
                                <div  class="col-md-4" >
                                    <!--box-widget-wrap -->  
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header" >
                                                        <h3 id="book-now"> Book This Hotel </h3>
                                                    </div>
                                                    <form action="booking-single.php" method="post" name="bookFormCalc"   class="book-form custom-form">
                                                        <fieldset>
                                                            <div class="cal-item">
                                                                <div class="listsearch-input-item">
                                                                    <label>Room Type</label>
                                                                    <select data-placeholder="Room Type" required id="room" name="repopt"   class="chosen-select no-search-select" >
                                                                        <option value="" selected >Select Room</option>
                                                                        <?php while($result= mysqli_fetch_assoc($query_room)){ ?>
                                                                            <option  value="<?php echo $result['price']; ?>"><?php echo $result['room_title']; ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                    <!--data-formula -->
                                                                    <input type="text" name="item_total" class="hid-input"  value=""  data-form="{repopt}">
                                                                    <input type="text" name="room" class="hid-input"  id="display" value=""  >
                                                                    <input type="text" name="hotel_id" class="hid-input"   value="<?php echo $hotel_id; ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="cal-item">
                                                                <div class="bookdate-container  fl-wrap">
                                                                    <label><i class="fal fa-calendar-check"></i> When </label>
                                                                    <input type="text"  required  placeholder="Date In-Out" name="bookdates"   value=""/>
                                                                    <div class="bookdate-container-dayscounter"><i class="far fa-question-circle"></i><span>Days : <strong>0</strong></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="cal-item">
                                                                <div class="quantity-item fl-wrap">
                                                                    <label> Adults</label>
                                                                    <div class="quantity">
                                                                        <input type="number" required name="adults" min="1"  step="1" value="1">

                                                                    </div>
                                                                </div>
                                                                <div class="quantity-item fl-wrap fcit">
                                                                    <label> Rooms</label>
                                                                    <div class="quantity">
                                                                        <input type="number"  name="qty3" min="1"  step="1" value="1">
                                                                        <input type="text" name="item_total" class="hid-input" value="0" data-form="{qty3} * {repopt} - {repopt}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <input type="number"  id="totaldays" name="qty5" class="hid-input">
                                                        <div class="total-coast fl-wrap"><strong>Total Cost</strong> <span>N <input type="text" name="grand_total" value="" data-form="SUM({item_total}) * {qty5}"></span></div>


                                                        <button class="btnaplly color2-bg"  style="padding:10px 50px !important;" name="book_now" type="submit">Book Now <i class="fal fa-paper-plane"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                                      
                                        <!--box-widget-item -->
                                        <!--<div class="box-widget-item fl-wrap">-->
                                        <!--    <div class="box-widget counter-widget" data-countDate="09/12/2019">-->
                                        <!--        <div class="banner-wdget fl-wrap">-->
                                        <!--            <div class="overlay"></div>-->
                                        <!--            <div class="bg"  data-bg="images/bg/1.jpg"></div>-->
                                        <!--            <div class="banner-wdget-content fl-wrap">-->
                                        <!--                <h4>Get a discount <span>20%</span> when ordering a room from three days.</h4>-->
                                        <!--                <div class="countdown fl-wrap">-->
                                        <!--                    <div class="countdown-item">-->
                                        <!--                        <span class="days rot">00</span>-->
                                        <!--                        <p>days</p>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="countdown-item">-->
                                        <!--                        <span class="hours rot">00</span>-->
                                        <!--                        <p>hours </p>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="countdown-item">-->
                                        <!--                        <span class="minutes rot">00</span>-->
                                        <!--                        <p>minutes </p>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="countdown-item">-->
                                        <!--                        <span class="seconds rot">00</span>-->
                                        <!--                        <p>seconds</p>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <a href="#">Book Now</a>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--box-widget-item end -->                                       
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3> Contact Information</h3>
                                                    </div>
                                                    <div class="box-widget-list">
                                                        <ul>
                                                            
                                                            <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">07034417619, 09151927648</a></li>
                                                            <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">ebookingng@gmail.com</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social">
                                                        <ul>
                                                            <li><a href="#" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="#" target="_blank" ><i class="fab fa-vk"></i></a></li>
                                                            <li><a href="#" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                          
                                        <!--box-widget-item -->

                                        <!--box-widget-item end -->                             
                                        <!--box-widget-item -->

                                        <!--box-widget-item end -->    
                                        <!--box-widget-item end -->   
                                        <!--box-widget-item -->

                                        <!--box-widget-item end -->                           

                                        <!--box-widget-item end -->                              

                                        <!--box-widget-item end -->                            
                                    </div>
                                    <!--box-widget-wrap end -->  
                                </div>
                                <!--   sidebar end  -->
                            </div>
                            <!--   row end  -->
                        </div>
                        <!--   container  end  -->
                    </section>
                    <!--  section  end-->
                </div>
                <!-- content end-->
                <div class="limit-box fl-wrap"></div>
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
                                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">0807 558 1223</a></li>
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
                                        <a href="tel:+2348075581223" class="cs-mumber">0807 558 1223</a>
                                        <a href="tel:+2348075581223" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
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
            <!--booking-modal-wrap -->   
            <div class="booking-modal-wrap">
                <div class="booking-modal-container">
                    <div class="booking-modal-content fl-wrap">
                        <div class="booking-modal-info">
                            <div class="booking-modal-close color-bg"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <div class="bg"  data-bg="images/bg/1.jpg" ></div>
                            <div class="overlay"></div>
                            <div class="booking-modal-info_content fl-wrap">
                                <h4>Luxury Hotel Spa</h4>
                                <ul>
                                    <li>Date : <span>05.05.2020</span></li>
                                    <li>Persons : <span>2</span></li>
                                    <li>Price : <span>$120</span> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bookiing-form-wrap">
                            <ul id="progressbar">
                                <li class="active"><span>01.</span>Personal Info</li>
                                <li><span>02.</span>Billing Address</li>
                                <li><span>03.</span>Payment Method</li>
                                <li><span>04.</span>Confirm</li>
                            </ul>
                            <!--   list-single-main-item -->
                            <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                <div class="profile-edit-container">
                                    <div class="custom-form">
                                        <form>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Your personal Information</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>First Name <i class="far fa-user"></i></label>
                                                        <input type="text" placeholder="Your Name" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Last Name <i class="far fa-user"></i></label>
                                                        <input type="text" placeholder="Your Last Name" value=""/> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Email Address<i class="far fa-envelope"></i>  </label>
                                                        <input type="text" placeholder="yourmail@domain.com" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Phone<i class="far fa-phone"></i>  </label>
                                                        <input type="text" placeholder="87945612233" value=""/>
                                                    </div>
                                                </div>
                                                <div class="log-massage">Existing Customer? <a href="#" class="modal-open">Click here to login</a></div>
                                                <div class="log-separator fl-wrap"><span>or</span></div>
                                                <div class="soc-log fl-wrap">
                                                    <p>For faster login or register use your social account.</p>
                                                    <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                                                </div>
                                                <div class="filter-tags">
                                                    <input id="check-a" type="checkbox" name="check">
                                                    <label for="check-a">By continuing, you agree to the<a href="#" target="_blank">Terms and Conditions</a>.</label>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <a  href="#"  class="next-form action-button btn no-shdow-btn color-bg">Billing Address <i class="fal fa-angle-right"></i></a>
                                            </fieldset>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Billing Address</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>City <i class="fal fa-globe-asia"></i></label>
                                                        <input type="text" placeholder="Your city" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Country </label>
                                                        <div class="listsearch-input-item ">
                                                            <select data-placeholder="Your Country" class="chosen-select no-search-select" >
                                                                <option>United states</option>
                                                                <option>Asia</option>
                                                                <option>Australia</option>
                                                                <option>Europe</option>
                                                                <option>South America</option>
                                                                <option>Africa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Street <i class="fal fa-road"></i> </label>
                                                        <input type="text" placeholder="Your Street" value=""/>                                                  
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <label>State<i class="fal fa-street-view"></i></label>
                                                        <input type="text" placeholder="Your State" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label>Postal code<i class="fal fa-barcode"></i> </label>
                                                        <input type="text" placeholder="123456" value=""/>
                                                    </div>
                                                </div>
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Addtional Notes</h3>
                                                </div>
                                                <textarea cols="40" rows="3" placeholder="Notes"></textarea>
                                                <span class="fw-separator"></span>
                                                <a  href="#"  class="previous-form action-button back-form   color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                <a  href="#"  class="next-form back-form action-button btn no-shdow-btn color-bg">Payment Step <i class="fal fa-angle-right"></i></a>
                                            </fieldset>
                                            <fieldset class="fl-wrap book_mdf">
                                                <div class="list-single-main-item-title fl-wrap">
                                                    <h3>Payment method</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Cardholder's Name<i class="far fa-user"></i></label>
                                                        <input type="text" placeholder="" value="Adam Kowalsky"/>                                                  
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Card Number <i class="fal fa-credit-card-front"></i></label>
                                                        <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" value=""/> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label>Expiry Month<i class="fal fa-calendar"></i></label>
                                                        <input type="text" placeholder="MM" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Expiry Year<i class="fal fa-calendar"></i></label>
                                                        <input type="text" placeholder="YY" value=""/>                                                  
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label>CVV / CVC *<i class="fal fa-credit-card"></i></label>
                                                        <input type="password" placeholder="***" value=""/> 
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <p style="padding-top:20px;">*Three digits number on the back of your card</p>
                                                    </div>
                                                </div>
                                                <div class="log-separator fl-wrap"><span>or</span></div>
                                                <div class="soc-log fl-wrap">
                                                    <p>Select Other Payment Method</p>
                                                    <a href="#" class="paypal-log"><i class="fab fa-paypal"></i>Pay With Paypal</a>
                                                </div>
                                                <span class="fw-separator"></span>
                                                <a  href="#"  class="previous-form  back-form action-button    color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                <a  href="#"  class="next-form  action-button btn color2-bg no-shdow-btn">Confirm and Pay<i class="fal fa-angle-right"></i></a>                                               
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
                                                        <br>
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
                </div>
            </div>
            <div class="bmw-overlay"></div>
            <!--booking-modal-wrap end -->			
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
                                        <h3>Sign Up <span>E-<strong>Booking</strong></span></h3>
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
            <!--ajax-modal-container-->
            <div class="ajax-modal-overlay"></div>
            <div class="ajax-modal-container">
                <!--ajax-modal -->
                <div class='ajax-loader'>
                    <div class='ajax-loader-cirle'></div>
                </div>
                <div id="ajax-modal" class="fl-wrap"> 
                </div>
                <!--ajax-modal-container end -->
            </div>
            <!--ajax-modal-container end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script>
            (function() {

                // get references to select list and display text box
                var sel = document.getElementById('room');
                var el = document.getElementById('display');

                document.getElementById('room').onchange = function () {
                    // access text property of selected option
                    el.value = sel.options[sel.selectedIndex].text;
                }


            }());
        </script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
<!--        <script src="https://maps.googleapis.com/maps/api/js?key=YOURAPIKEYHERE&libraries=places&callback=initAutocomplete"></script> -->
<!--        <script type="text/javascript" src="js/map-single.js"></script> -->

        <!-- GetButton.io widget -->
        <!--<script type="text/javascript">-->
        <!--    (function () {-->
        <!--        var options = {-->
                    <!--whatsapp: "2349151927648", // WhatsApp number-->
                    <!--call_to_action: "", // Call to action-->
                    <!--button_color: "#FF6550", // Color of button-->
                    <!--position: "right", // Position may be 'right' or 'left'-->
                    <!--pre_filled_message: "Hello!", // WhatsApp pre-filled message-->
        <!--        };-->
        <!--        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;-->
        <!--        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';-->
        <!--        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };-->
        <!--        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);-->
        <!--    })();-->
        <!--</script>-->
        <!-- /GetButton.io widget -->
    </body>
</html>