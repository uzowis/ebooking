<?php
include ('controllers/db.php');
$booking_id = "";
if (isset($_GET['book_id'])){
    $booking_id = $_GET['book_id'];
}
// Query booking db for booking details
$query_booking = mysqli_query($db, "SELECT * FROM bookings WHERE booking_id = '$booking_id'");
$result_booking = mysqli_fetch_assoc($query_booking);
$invoice_id = '00'.$result_booking['id'];
$date = $result_booking['date'];
$name = $result_booking['name'];
$phone = $result_booking['phone'];
$days = $result_booking['duration'];
$bookdates = $result_booking['booked_dates'];
$quests = $result_booking['no_of_persons'];
$rooms = $result_booking['no_of_rooms'];
$total = $result_booking['total_cost'];

$room_id = $result_booking['room_id'];
$hotel_id = $result_booking['hotel_id'];

//query hotel details
$query_hotel = mysqli_query($db, "SELECT * FROM hotels WHERE id = '$hotel_id'");
$result_hotel = mysqli_fetch_assoc($query_hotel);
$hotel = $result_hotel['h_name'];
$hotel_addr = $result_hotel['h_address'];
$hotel_phone = $result_hotel['h_phone'];

//query Room details
$query_room = mysqli_query($db, "SELECT * FROM rooms WHERE id = '$room_id' AND hotel_id = '$hotel_id'");
$result_room = mysqli_fetch_assoc($query_room);
$room_title = $result_room['room_title'];
$room_price = $result_room['price'];




?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Ebooking - Best Hotel Booking Website in Nigeria </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="css/invoice.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <div class="invoice-box">
            <table  >
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <a href="./index.php">
                                    <img src="images/logo3.png" style="width:150px; height:auto" alt=""> </a>
                                </td>
                                <td>
                                    Invoice #: <?php echo $invoice_id; ?><br>
                                    Created: <?php echo $date; ?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="1">
                        <table>
                            <tr>
                                <td>
                                    <b>Booking ID: <?php echo $booking_id; ?></b><br>
                                    <?php echo $name; ?><br>
                                    <a href="#"  style="color:#666; text-decoration:none"><?php echo $phone; ?></a>
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        Payment Method
                    </td>
                    <td>

                    </td>

                </tr>
                <tr class="details">
                    <td>
                        Payment at Hotel Reception
                    </td>

                </tr>
                <tr class="heading">
                    <td>
                        Option
                    </td>
                    <td>
                        Details
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Hotel
                    </td>
                    <td>
                        <?php echo $hotel; ?><br>
                        (Addr: <?php echo $hotel_addr; ?>)
                    </td>
                </tr>
                <tr class="item">
                    <td>
                        Room Type
                    </td>
                    <td>
                        <?php echo $room_title; ?> - N<?php echo $room_price; ?>
                    </td>
                </tr>
                <tr class="item ">
                    <td>
                        Checking In - Check out Date
                    </td>
                    <td>
                        <?php echo $bookdates; ?>
                    </td>
                </tr>
                <tr class="item ">
                    <td>
                        Days 
                    </td>
                    <td>
                        <?php echo $days; ?>
                    </td>
                </tr>
                <tr class="item ">
                    <td>
                        Guests
                    </td>
                    <td>
                        <?php echo $quests; ?>
                    </td>
                </tr>

                <tr class="item last">
                    <td>
                        Rooms
                    </td>
                    <td>
                        <?php echo $rooms; ?>
                    </td>
                </tr>
                <tr class="total">
                    <td></td>
                    <td style="padding-top:50px;"> 
                        Total: N<?php echo $total; ?>
                    </td>
                </tr>
            </table>
        </div>
        <a href="javascript:window.print()" class="print-button">Print this invoice</a> 
    </body>
</html>