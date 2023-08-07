-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 10:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbadmins`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_name`) VALUES
(3, 'aljazera'),
(1, 'gaza'),
(6, 'KSA'),
(2, 'rafh'),
(4, 'UK'),
(5, 'US');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) DEFAULT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_photo` varchar(150) DEFAULT NULL,
  `admin_email` varchar(30) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_password`, `admin_photo`, `admin_email`, `permission_id`) VALUES
(2, 'yousef', '$2y$10$x2hPpD4f3BZ9oZKgwU9p/e7gP6qQ/9rNjLa77xkDL/VDJsfr1Cmpy', '1684265581_7363632.webp', 'si@example.com', 1),
(3, 'ahmed', '$2y$10$0Bh2SLY84j.oysf1ymYlg.AWiF.JPF9vJggHUy2iYvQcZxdpXgQFK', '1684268079_8864568.jpeg', 'ahmed123@example.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `category_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_code`) VALUES
(1, 'ANDROID', 'CH0016'),
(3, 'PROBOOK', 'CH107'),
(27, 'computer', 'CP010'),
(28, 'Happy Category', 'HAP010');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `company_email` varchar(30) DEFAULT NULL,
  `company_logo` varchar(150) DEFAULT NULL,
  `creationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_email`, `company_logo`, `creationDate`) VALUES
(1, 'ClashWar', 'company.sa@outlook.sa', '1684265694_7432469.webp', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `permission_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_type`) VALUES
(1, 'MVP'),
(2, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `user_id`, `store_id`, `rate`) VALUES
(1, 15, 21, 2),
(2, 15, 18, 2),
(5, 15, 15, 4),
(6, 15, 19, 5),
(7, 15, 16, 2),
(8, 15, 22, 3),
(10, 16, NULL, NULL),
(11, 16, 21, 4),
(12, 16, 15, 2),
(13, 15, 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(30) DEFAULT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `store_photo` varchar(150) DEFAULT NULL,
  `store_phone` varchar(30) DEFAULT NULL,
  `store_address` varchar(30) DEFAULT NULL,
  `total_rate` int(11) DEFAULT NULL,
  `number_of_rate` int(11) DEFAULT NULL,
  `store_rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `category_name`, `store_photo`, `store_phone`, `store_address`, `total_rate`, `number_of_rate`, `store_rate`) VALUES
(15, 'Ni_KILLUA', 'ANDROID', '1684266316_2322067.png', '05900010', 'UK', 90, 72, 1),
(16, 'SI_INDIA', 'ANDROID', '1684266385_3935734.webp', '05960', 'KSA', 67, 26, 3),
(18, 'IOS', 'computer', '1684266287_7972155.png', '0591245', 'KSA', 123, 48, 3),
(19, 'Hawaii', 'computer', '1684268859_223251.jpg', '0645454', 'US', 98, 25, 4),
(21, 'A12', 'ANDROID', '1684266439_8752154.png', '054478', 'UK', 79, 27, 3),
(22, 'HAPPY', 'Happy Category', '1684266455_5464150.png', '05978124', 'UK', 3, 1, 3),
(27, 'store_computer', 'computer', '1684245900_6107298.jpg', '3333', 'gaza', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `u_account`
--

CREATE TABLE `u_account` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_account`
--

INSERT INTO `u_account` (`user_id`, `user_name`) VALUES
(15, '::1'),
(16, '::2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `unique_name` (`address_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `unique_name` (`category_name`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`),
  ADD UNIQUE KEY `permission_type` (`permission_type`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `category_name` (`category_name`),
  ADD KEY `store_address` (`store_address`);

--
-- Indexes for table `u_account`
--
ALTER TABLE `u_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `u_account`
--
ALTER TABLE `u_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `u_account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`store_address`) REFERENCES `address` (`address_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
