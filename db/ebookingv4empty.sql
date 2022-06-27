-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 05:26 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `hotel_img`
--

CREATE TABLE `hotel_img` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_img`
--
ALTER TABLE `hotel_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_imgs`
--
ALTER TABLE `room_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
