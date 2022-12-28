-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 10:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`) VALUES
(1, 'admin@renga.com', 'admin', '5d41402abc4b2a76b9719d911017c592');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `plate_id` varchar(50) NOT NULL,
  `model` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`plate_id`, `model`, `year`, `price`) VALUES
('1', 'C class', 2019, 500),
('2', 'Matrix', 2016, 200),
('3', 'Verna', 2008, 400),
('4', 'Seat 133', 1980, 100);

-- --------------------------------------------------------

--
-- Table structure for table `car_status`
--

CREATE TABLE `car_status` (
  `plate_id` varchar(50) NOT NULL,
  `today` datetime NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `reserved` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_status`
--

INSERT INTO `car_status` (`plate_id`, `today`, `status`, `reserved`) VALUES
('1', '2022-12-28 23:37:02', 'active', 'NO'),
('2', '2022-12-27 00:00:00', 'active', 'YES'),
('2', '2022-12-28 23:37:28', 'active', 'NO'),
('2', '2022-12-30 00:00:00', 'active', 'NO'),
('2', '2022-12-31 00:00:00', 'active', 'NO'),
('3', '2022-12-28 23:37:48', 'active', 'NO'),
('4', '2022-12-27 00:00:00', 'active', 'YES'),
('4', '2022-12-28 23:38:07', 'out of service', 'NO'),
('4', '2022-12-28 23:46:56', 'active', 'NO'),
('4', '2022-12-30 00:00:00', 'active', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `reservation_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_time` datetime DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_number` int(11) NOT NULL,
  `plate_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_date`, `user_id`, `reservation_number`, `plate_id`) VALUES
('2022-12-28 23:49:04', 2, 2, '2'),
('2022-12-28 23:53:04', 3, 3, '4');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_status`
--

CREATE TABLE `reserve_status` (
  `plate_id` varchar(50) NOT NULL,
  `reservation_number` int(11) NOT NULL,
  `pickup_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve_status`
--

INSERT INTO `reserve_status` (`plate_id`, `reservation_number`, `pickup_date`, `return_date`) VALUES
('2', 2, '2022-12-27 00:00:00', '2022-12-30 00:00:00'),
('4', 3, '2022-12-27 00:00:00', '2022-12-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `birthdate`, `license`) VALUES
(2, 'Youssef Dawoud', 'qq@qq.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2001-07-25', 'safjkl123'),
(3, 'Amged', 'zz@zz.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2001-07-31', 'adfskljh123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`plate_id`);

--
-- Indexes for table `car_status`
--
ALTER TABLE `car_status`
  ADD PRIMARY KEY (`plate_id`,`today`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`reservation_number`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`user_id`,`plate_id`),
  ADD UNIQUE KEY `reservation_number` (`reservation_number`),
  ADD KEY `plate_id` (`plate_id`);

--
-- Indexes for table `reserve_status`
--
ALTER TABLE `reserve_status`
  ADD PRIMARY KEY (`plate_id`,`reservation_number`),
  ADD KEY `plate_id` (`plate_id`,`pickup_date`),
  ADD KEY `plate_id_2` (`plate_id`,`return_date`),
  ADD KEY `reservation_number` (`reservation_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `reservation_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_status`
--
ALTER TABLE `car_status`
  ADD CONSTRAINT `car_status_ibfk_1` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reservation_number`) REFERENCES `reservation` (`reservation_number`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `reservation` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`plate_id`) REFERENCES `car` (`plate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reserve_status`
--
ALTER TABLE `reserve_status`
  ADD CONSTRAINT `reserve_status_ibfk_1` FOREIGN KEY (`plate_id`,`pickup_date`) REFERENCES `car_status` (`plate_id`, `today`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_status_ibfk_2` FOREIGN KEY (`plate_id`,`return_date`) REFERENCES `car_status` (`plate_id`, `today`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserve_status_ibfk_3` FOREIGN KEY (`reservation_number`) REFERENCES `reservation` (`reservation_number`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
