-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 10:11 PM
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
-- Database: `bbhw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_pass` text NOT NULL,
  `admin_role` enum('1','2') NOT NULL,
  `admin_created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `admin_name`, `admin_username`, `admin_pass`, `admin_role`, `admin_created_on`) VALUES
(1, 'admin', 'admin', '$2y$10$tE.TuU/XGg6DrcbD6tf9u.1c3cp7qFbPEZgE2kclGKpCtMC9TlLwu', '1', '2022-07-24 05:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `products_master`
--

CREATE TABLE `products_master` (
  `pm_id` int(11) NOT NULL,
  `pm_created_by` int(11) NOT NULL,
  `pm_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pm_name` text DEFAULT NULL,
  `pm_description` text DEFAULT NULL,
  `pm_price` decimal(11,2) DEFAULT NULL,
  `pm_sale_price` decimal(11,2) DEFAULT NULL,
  `pm_stock` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `products_master`
--
ALTER TABLE `products_master`
  ADD PRIMARY KEY (`pm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_master`
--
ALTER TABLE `products_master`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
