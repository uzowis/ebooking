<?php
$hotels_query = mysqli_query($db, "SELECT * FROM hotels");
$hotelNo = mysqli_num_rows($hotels_query);
$bookings_query = mysqli_query($db, "SELECT * FROM bookings");
$bookingNo = mysqli_num_rows($bookings_query);
?>
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
<header class="main-header">
    <!-- header-top-->
    <div class="header-top fl-wrap">
        <div class="container">
            <div class="logo-holder">
                <a href="index.php"><img src="images/logo.png" alt=""></a>
            </div>
            <a href="dashboard-add-listing.php" class="add-hotel">Add Your Hotel <span><i class="far fa-plus"></i></span></a>
            <div class="lang-wrap">
                <div class="show-lang"><img src="images/lan/1.png" alt=""> <span>Eng</span><i class="fa fa-caret-down"></i></div>
                
            </div>
            <div class="currency-wrap">
                <div class="show-currency-tooltip"> <span>NGN <i class="fa fa-caret-down"></i> </span></div>
                
            </div>
        </div>
    </div>
    <!-- header-top end-->
    <!-- header-inner-->

    <!-- header-inner end-->
    <!-- header-search -->

    <!-- header-search  end -->
</header>
<!--  header end -->
<!--  wrapper  -->
<div id="wrapper">
    <!-- content-->
    <div class="content">

        <section class="flat-header color-bg adm-header">
            <div class="wave-bg wave-bg2"></div>
            <div class="container">
                <div class="dasboard-wrap fl-wrap">
                    <div class="dasboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a href="#">Dashboard</a><span>Profile page</span></div>
                    <!--dasboard-sidebar-->
                    <div class="dasboard-sidebar">
                        <div class="dasboard-sidebar-content fl-wrap">
                            <div class="dasboard-avatar">
                                <img src="images/avatar/1.jpg" alt="">
                            </div>
                            <div class="dasboard-sidebar-item fl-wrap">
                                <h3>
                                    <span>Welcome </span>
                                    <?php echo $result_admin['name']; ?><br>
                                    <p><?php echo $result_admin['email']; ?></p>
                                </h3>
                            </div>
                            <a href="dashboard-add-listing.php" class="ed-btn">Add Hotel</a>
                            <div class="user-stats fl-wrap">
                                <ul>
                                    <li>
                                        Listings
                                        <span><?php echo $hotelNo ?></span>
                                    </li>
                                    <li>
                                        Bookings
                                        <span><?php echo $bookingNo ?></span>
                                    </li>

                                </ul>
                            </div>
                            <a href="dashboard-bookings.php?logout=1" class="log-out-btn color-bg">Log Out <i class="far fa-sign-out"></i></a>
                        </div>
                    </div>
                    <!--dasboard-sidebar end-->
                    <!-- dasboard-menu-->
                    <div class="dasboard-menu">
                        <div class="dasboard-menu-btn color3-bg">Dashboard Menu <i class="fal fa-bars"></i></div>
                        <ul class="dasboard-menu-wrap">
<!--                            <li>-->
<!--                                <a href="#"><i class="far fa-user"></i>Profile</a>-->
<!--                                <ul>-->
<!--                                    <li><a href="#dashboard-myprofile.html">Edit profile</a></li>-->
<!--                                    <li><a href="#dashboard-password.html">Change Password</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li>
                                <a href="dashboard-listing-table.php?page=1" ><i class="far fa-th-list"></i> My listigs  </a>
                                <ul>
                                    <li><a href="dashboard-add-listing.php">Add Hotel</a></li>
                                    <li><a href="add_rooms.php">Add Room</a></li>
                                </ul>

                            </li>
                            <li><a href="dashboard-bookings.php?page=1" > <i class="far fa-calendar-check"></i> Bookings <span></span></a></li>

                        </ul>
                    </div>
                    <!--dasboard-menu end-->
                    <!--Tariff Plan menu-->

                    <!--Tariff Plan menu end-->
                </div>
            </div>
        </section>