-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 08:54 AM
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
(1, 'Orlando Suites Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Rivers', 'Port Harcourt', '+2348134110107', 'info@olando.com', 'Very Affordable and serene environment'),
(2, 'Diamond Suites Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abia', 'Port Harcourt', '+2348134110107', 'hello@olando.com', 'Very Affordable and serene environment'),
(4, 'Armold Suites Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abia', 'Port Harcourt', '+2348134110107', 'ho@olando.com', 'Very Affordable and serene environment'),
(5, 'RedBull  Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abuja Federal Capital Territory', 'Port Harcourt', '+2348134110107', 'zello@olando.com', 'fhfhfgfgxfgxfgxgxgxg'),
(6, 'Jara Suites Hotels', 'Hotel', '', 'www.olando.com', '22 Josy jane street', 'Abia', 'Aba', '08144110107', 'yello@olando.com', 'kljklfjsdfjdsijfodjfsifjisfsfsfsfs'),
(7, 'Ankara Suites Hotels', 'Hotel', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abia', 'Port Harcourt', '+2348134110107', 'hola@olando.com', 'kjgdfkgldfklgkldfkgldlfgdgdgdgdgd'),
(8, 'RedHorse Hotels', 'Guest House', '', 'www.olando.com', 'No 14 Chiorlu Crescent, Rumukwrusi , Portharcourt Rivers state', 'Abuja', 'Port Harcourt', '+2348134110107', 'zellwo@olando.com', 'bbijifdgmflgfgodfgfdgdfgdfgdg'),
(10, 'Dia Suites Hotels', 'Hotel', '', 'www.olando.com', '22 Josy jane street', 'Abia', 'Aba', '08144110107', 'holla@olando.com', ''),
(11, 'Kangaroo Hotels And Suite', 'Hotel', '12000', 'www.olando.com', '45 Scout Strrt, Angel Road', 'Abuja Federal Capital Territory', 'Kubwa', '+2348038423240', 'hoola@olando.com', 'We offer nothing but the best, come feel hospitality at its peak');

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
  `img` varchar(200) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `room_title`, `price`, `no_of_guest`, `img`, `details`) VALUES
(1, 2, 'Luxurious Room', '20000', 5, '1606247452.jpg', 'cool room'),
(2, 10, 'Luxurious Room', '20000', 3, '1606247952.jpg', 'very nice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `h_email` (`h_email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
