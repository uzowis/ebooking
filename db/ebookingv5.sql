-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 07:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Support', 'uzowis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Godwin David', 'ebookingng@gmail.com', '@admin..'),
(3, 'User', 'info@ebooking.com.ng', '@Pass..');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `booked_dates` varchar(200) NOT NULL,
  `duration` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `no_of_persons` int(11) NOT NULL,
  `total_cost` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `hotel_id`, `room_id`, `booking_id`, `booked_dates`, `duration`, `name`, `email`, `phone`, `notes`, `no_of_rooms`, `no_of_persons`, `total_cost`, `date`) VALUES
(1, 1, 2, 1652458863, '05/14/2022 - 05/16/2022', 3, 'Wisdom Aturuobi', 'uzowis@gmail.com', '08134110107', 'I need a lot of parking space.', 1, 2, '75,000.000', '2022-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `h_name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `avg_cost` varchar(200) NOT NULL,
  `website` text NOT NULL,
  `h_address` text NOT NULL,
  `h_state` text NOT NULL,
  `h_city` text NOT NULL,
  `h_phone` varchar(200) NOT NULL,
  `h_email` varchar(200) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `h_name`, `type`, `avg_cost`, `website`, `h_address`, `h_state`, `h_city`, `h_phone`, `h_email`, `details`) VALUES
(1, 'Gushen Hotels', 'Hotel', '15000', 'www.gushe.com', 'Elelenwo Police station, ph', 'Rivers', 'Port Harcourt', '08134110107', 'tmapros@gmail.com', 'This is a very nice hotel, We provide all hospitality services.'),
(2, 'Greenwood Hotel', 'Hotel', '18000', '', 'Tombia Strt, GRA, Portharcourt', 'Rivers', 'Port Harcourt', '080025545555', 'green@gmail.com', 'Home away from Home'),
(3, 'Diamond Hotels', 'Hotel', '30000', '', 'No 15 Holy strt New york', 'Abuja', 'Abuja', '0813254542', 'hol@gmail.com', 'A hotel with taste'),
(4, 'Orlando Hotels', 'Hotel', '12000', '', 'Dangote strt, Yenegoa', 'Bayelsa', 'Bayelsa', '08112124545', 'orl@gmai.com', 'A place to relax and chill'),
(5, 'Jabro Hotels', 'Hotel', '30000', '', 'No 15 Holy strt New ', 'Abuja', 'Abuja', '08112124544', 'gren@gmail.com', 'Wonderful hotel for relaxation.'),
(6, 'Kamaro Hotels & suites', 'Hotel', '22000', 'www.kamaro.com', 'Dangote strt, Abuja', 'Abuja', 'Abuja', '0813254541', 'gre@gmail.com', 'Lovely Hotel'),
(7, 'Mandari Hotels', 'Hotel', '25000', '', '24 Tombia Strt, GRA, Portharcourt', 'Rivers', 'Gra, Port Harcourt', '080025545155', 'tmaros@gmail.com', 'Suite for the big boys'),
(8, 'Nollywood Hotels', 'Hotel', '19000', '', '23 Edon Strt, Uyo', 'Cross River', 'Calabar', '08133522255', 'geen@gmail.com', 'Hotel with presidential taste.'),
(9, 'Mina Hotels', 'Hotel', '36000', '', '34 Old GRA, Portharcourt', 'Rivers', 'Gra, Port Harcourt', '08112124543', 'gr@gmail.com', 'For the big Boys'),
(10, 'Jaqua Hotels', 'Hotel', '18000', '', '23 Edon Strt, Ikenegbu', 'Imo', 'Owerri', '08125452222', 'grees@gmail.com', 'A home away from home'),
(11, 'Logan Suites', 'Hotel', '25000', '', 'Elelenwo Police station, ph', 'Rivers', 'Port Harcourt', '08112124540', 'tmros@gmail.com', 'A relaxation place.');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_img`
--

CREATE TABLE `hotel_img` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_img`
--

INSERT INTO `hotel_img` (`id`, `hotel_id`, `images`) VALUES
(1, 1, '10990525531652456443.jpg'),
(2, 2, '8677076391652457891.jpg'),
(3, 3, '3693876171652456878.jpg'),
(4, 4, '4215157361652456970.jpg'),
(5, 5, '10811893241652457050.jpg'),
(6, 6, '295881571652457137.jpg'),
(7, 7, '6118691621652457206.jpg'),
(8, 8, '15194731721652457308.jpg'),
(9, 9, '18573296381652457380.jpg'),
(10, 10, '7732380731652457478.jpg'),
(11, 11, '15971320811652457536.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `rev_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `reviews` text NOT NULL,
  `cleanliness` int(11) NOT NULL,
  `comfort` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `facilities` int(11) NOT NULL,
  `score` decimal(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `hotel_id`, `rev_name`, `email`, `reviews`, `cleanliness`, `comfort`, `staff`, `facilities`, `score`) VALUES
(1, 1, '', '', '', 5, 5, 5, 4, '4.8');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_title` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `no_of_guest` int(100) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `room_title`, `price`, `no_of_guest`, `details`) VALUES
(1, 1, 'Standard Room', '15000', 2, 'Well furnished, and ventilated.'),
(2, 1, 'Presidential suite', '25000', 2, 'Rooms with presidential taste.'),
(3, 1, 'London Suite', '45000', 3, 'Rooms with presidential taste.'),
(5, 2, 'Standard Room', '15000', 2, 'Rooms with presidential taste.'),
(6, 3, 'Standard Room', '25000', 2, 'Lovely furnished.'),
(7, 6, 'Presidential suite', '36000', 2, 'Lovely furnished.'),
(8, 5, 'Presidential suite', '50000', 3, 'Lovely furnished and cool.');

-- --------------------------------------------------------

--
-- Table structure for table `room_imgs`
--

CREATE TABLE `room_imgs` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_imgs`
--

INSERT INTO `room_imgs` (`id`, `hotel_id`, `images`) VALUES
(1, 1, '3293885001652456492.jpg'),
(2, 1, '858866311652456529.jpg'),
(3, 1, '19065528571652456579.jpg'),
(5, 2, '9530849031652456754.jpg'),
(6, 3, '3652413531652457574.jpg'),
(7, 6, '1133865821652457598.jpg'),
(8, 5, '21358672781652457623.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `h_email` (`h_email`);

--
-- Indexes for table `hotel_img`
--
ALTER TABLE `hotel_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `room_imgs`
--
ALTER TABLE `room_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hotel_img`
--
ALTER TABLE `hotel_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_imgs`
--
ALTER TABLE `room_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `hotel_img`
--
ALTER TABLE `hotel_img`
  ADD CONSTRAINT `hotel_img_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `room_imgs`
--
ALTER TABLE `room_imgs`
  ADD CONSTRAINT `room_imgs_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
