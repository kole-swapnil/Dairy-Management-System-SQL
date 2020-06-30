-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2020 at 04:43 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milk_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `aadhar`) VALUES
(2, 'PC', 7897897891),
(9, 'Vivi', 48181564455),
(10, 'Abhinav', 4646488489),
(11, 'Deepro', 1358421585),
(12, 'Swapnil', 1284154843),
(14, 'Naru', 1212121212);

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farm_id` int(11) NOT NULL,
  `location` varchar(30) DEFAULT NULL,
  `dairy_produced` bigint(20) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `location`, `dairy_produced`, `farmer_id`) VALUES
(7, 'dholakpur', 222, 6),
(8, 'Bombai', 785, 7);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `farmer_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `aadhar` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `name`, `aadhar`) VALUES
(4, 'Ramu', 4585498427),
(5, 'Shamu', 2354498427),
(6, 'Babu Bhaiya', 3333498427),
(7, 'Raju', 2354411111);

-- --------------------------------------------------------

--
-- Table structure for table `milk_packet`
--

CREATE TABLE `milk_packet` (
  `packet_id` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `mfg_date` date DEFAULT NULL,
  `farm_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `milk_packet`
--

INSERT INTO `milk_packet` (`packet_id`, `capacity`, `mfg_date`, `farm_id`, `customer_id`) VALUES
(12, 2500, '2020-05-01', 7, 9),
(13, 1000, '2020-05-01', 7, 11),
(14, 1000, '2020-05-01', 8, 12),
(15, 2500, '2020-04-12', 7, 14),
(16, 2500, '2020-04-12', 7, 14),
(21, 1000, '2020-04-12', 8, 14),
(22, 200, '2020-04-16', 8, 2),
(28, 0, '2020-04-17', 8, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `aadhar` (`aadhar`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `location` (`location`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`farmer_id`),
  ADD KEY `aadhar` (`aadhar`) USING BTREE;

--
-- Indexes for table `milk_packet`
--
ALTER TABLE `milk_packet`
  ADD PRIMARY KEY (`packet_id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `milk_packet`
--
ALTER TABLE `milk_packet`
  MODIFY `packet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmer` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `milk_packet`
--
ALTER TABLE `milk_packet`
  ADD CONSTRAINT `milk_packet_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milk_packet_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
