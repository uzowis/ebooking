-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 06:41 PM
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
(1, 'Godwin David', 'uzowis@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

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
(1, 1, 7, 1652024255, '05/10/2022 - 05/12/2022', 3, 'Jeremiah Wisdom', 'tmapros@gmail.com', '08132452225', 'I would a hot shower, hope you can provide that. Would also need some fine babes to take good care of me. Smiles', 1, 1, '51.00', '2022-05-08'),
(2, 12, 4, 1652025680, '05/10/2022 - 05/11/2022', 2, 'Jasmine Holland Wisdom', 'tmapros@gmail.com', '08132452225', 'Nothing', 1, 2, '50,000.000', '2022-05-08'),
(3, 1, 6, 1652258016, '05/15/2022 - 05/17/2022', 3, 'Attah Ojoma', 'tmapros@gmail.com', '08132452225', 'I need good food.', 2, 1, '144,000.000', '2022-05-11');

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
(1, 'Orlando Suites Hotels', 'Hotel', '50000', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Rivers', 'Port Harcourt', '+2348134110108', 'info@olando.com', 'Very Affordable and serene environment'),
(2, 'Diamond Suites Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abia', 'Port Harcourt', '+2348134110107', 'hello@olando.com', 'Very Affordable and serene environment'),
(10, 'Dia Suites Hotels', 'Hotel', '', 'www.olando.com', '22 Josy jane street', 'Abia', 'Aba', '08144110107', 'holla@olando.com', ''),
(12, 'Diamondwoods Hotels', 'Hotel', '15800', 'www.hollywodd.com', 'No 15 Holy strt New york', 'Abuja', 'Abuja', '08132522255', 'tmapros@gmail.com', 'Serene Environment, cheap and affordable.'),
(20, 'Gushen Hotels', 'Hotel', '21000', '', 'Elelenwo Police station, ph', 'Rivers', 'Port Harcourt', '080025545555', 'gushen@gmail.com', 'Well furnished Hotel Rooms');

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
(1, 12, '19269503481652041259.jpg'),
(2, 12, '19269503481652041259.jpg'),
(3, 12, '19269503481652041259.jpg'),
(4, 12, '19269503481652041259.jpg'),
(5, 12, '19269503481652041259.jpg'),
(6, 12, '19269503481652041259.jpg'),
(7, 12, '19269503481652041259.jpg'),
(8, 12, '19269503481652041259.jpg'),
(9, 20, '8289363541652258339.jpg');

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
(1, 12, 'wisdom yO', 'tmapros@gmail.com', 'This is A NICE HOTEL', 4, 1, 5, 3, '3.0'),
(2, 12, 'wisdom yO', 'tmapros@gmail.com', 'This is A NICE HOTEL', 4, 1, 5, 3, '3.0'),
(3, 12, '', '', '', 4, 1, 5, 3, '3.0'),
(4, 12, '', '', '', 4, 1, 5, 3, '3.0'),
(5, 12, '', '', '', 4, 1, 5, 3, '3.0'),
(6, 12, '', '', '', 4, 1, 5, 3, '3.0'),
(7, 20, 'John Logan', 'john@gmail.com', 'Lovely and serene environment, recommended.', 5, 5, 5, 4, '5.0'),
(8, 20, 'Logan Paul', 'pau@gmail.com', 'Quiet and lovely.', 4, 5, 5, 4, '4.8'),
(9, 20, '', '', '', 4, 3, 5, 5, '4.0'),
(10, 20, '', '', '', 4, 1, 5, 3, '2.5'),
(11, 20, 'Daniel King', 'dan@gmail.com', 'This hotel is a home away from home. I give them my recommendation.', 5, 5, 5, 5, '5.0'),
(12, 12, 'Williams James', 'dan@gmail.com', 'A lovely place to be', 4, 5, 5, 4, '4.8');

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
(1, 2, 'Luxurious Room', '20000', 5, 'cool room'),
(2, 10, 'Luxurious Room', '20000', 3, 'very nice'),
(4, 12, 'Presidential suite', '25000', 2, 'For the sake of luxury.'),
(5, 12, 'Classic', '17000', 2, ''),
(6, 1, 'Presidential suite', '24000', 2, 'A lovely room'),
(7, 1, 'Classic', '17000', 2, 'Excellent'),
(8, 20, 'London Suite', '25000', 2, 'Well furnished'),
(9, 20, 'Calm Suite', '22000', 2, 'Neatly furnished');

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
(1, 1, '5674951061652023927.jpg'),
(2, 20, '14871577661652258387.jpg'),
(3, 20, '9111731991652258431.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hotel_img`
--
ALTER TABLE `hotel_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_imgs`
--
ALTER TABLE `room_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
