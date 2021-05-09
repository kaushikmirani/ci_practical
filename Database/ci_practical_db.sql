-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 10:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_practical_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_type` enum('super','sub') NOT NULL DEFAULT 'super'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `password`, `admin_type`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'super'),
(2, 'sub_admin', 'e10adc3949ba59abbe56e057f20f883e', 'sub');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'kauhikmirani', 'kaushik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'kaushikmi', 'kaushik123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'kauhikmirani', 'kaushik12345@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'kaushikmira', 'kaushik@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'kaushiktest', 'kaushik485@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `vehical_name` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`id`, `category_id`, `vehical_name`, `status`, `added_on`) VALUES
(1, 2, 'Truck', 'a', '2021-05-09 00:00:00'),
(2, 2, 'Construction Equipments', 'a', '2021-05-09 00:00:00'),
(3, 2, 'Bus', 'a', '2021-05-09 00:00:00'),
(4, 2, 'JCB', 'a', '2021-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehical_bookings`
--

CREATE TABLE `vehical_bookings` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `vehical` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `booking_for` varchar(50) NOT NULL,
  `booking_session` varchar(50) NOT NULL,
  `hours` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_number` text NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehical_bookings`
--

INSERT INTO `vehical_bookings` (`id`, `category_id`, `vehical`, `date`, `booking_for`, `booking_session`, `hours`, `name`, `email`, `user_id`, `phone_number`, `birth_date`, `address`, `zip_code`, `city`, `state`, `added_on`) VALUES
(1, 2, 2, '2021-05-11', 'hourly', '0', 2, 'kaushiktest', 'kaushik485@gmail.com', 6, '1234567890', '2021-05-27', 'test address', '123456', 'citytest', 'statetest', '2021-05-09 09:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `vehical_category`
--

CREATE TABLE `vehical_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehical_category`
--

INSERT INTO `vehical_category` (`id`, `category_name`, `status`, `added_on`) VALUES
(1, 'Light Motor vehical', 'a', '2021-05-09 00:00:00'),
(2, 'Heavy Motor vehical', 'a', '2021-05-09 00:00:00'),
(3, 'Heavy passenger Motor vehical', 'a', '2021-05-09 00:00:00'),
(4, 'Heavy Transport vehical', 'a', '2021-05-09 00:00:00'),
(5, 'Trailer', 'a', '2021-05-09 00:00:00'),
(6, 'Motorcycle', 'a', '2021-05-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `vehical_bookings`
--
ALTER TABLE `vehical_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical_category`
--
ALTER TABLE `vehical_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehical_bookings`
--
ALTER TABLE `vehical_bookings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehical_category`
--
ALTER TABLE `vehical_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD CONSTRAINT `vehicals_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `vehical_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
