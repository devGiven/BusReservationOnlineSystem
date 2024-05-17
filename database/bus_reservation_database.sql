-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 07:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_reservation_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '1=Paid, 0- Unpaid',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `schedule_id`, `ref_no`, `name`, `qty`, `status`, `date_updated`) VALUES
(1, 1, '202405081234', 'Thabo Mnek', 2, 1, '2024-06-25 21:43:13'),
(2, 4, '202405082446', 'Sipho Dlamini', 2, 0, '2024-06-25 17:10:27'),
(3, 2, '202405083123', 'Nokuthula Khumalo', 3, 1, '2024-06-25 23:21:55'),
(4, 4, '202405084215', 'Lerato Motaung', 1, 1, '2024-06-25 20:02:23'),
(5, 7, '202405085678', 'Bongani Ndlovu', 34, 0, '2024-06-25 20:04:20'),
(6, 5, '202405086073', 'Nomvula Sithole', 3, 1, '2024-06-25 23:19:45'),
(7, 9, '202405087107', 'Thandiwe Zulu', 1, 0, '2024-06-25 23:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `bus_number` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `bus_number`, `status`, `date_updated`) VALUES
(1, 'GreenLine', 'XRT1234', 1, '2024-05-13 10:30:00'),
(2, 'TransitExpress', 'TRS5678', 1, '2024-05-12 11:45:00'),
(3, 'CityShuttle', 'CTY9102', 1, '2024-05-11 13:20:00'),
(4, 'MetroLink', 'MLK3456', 1, '2024-05-10 15:00:00'),
(5, 'RapidRide', 'RPR7890', 1, '2024-05-09 14:00:00'),
(6, 'BlueBird', 'BBR2345', 1, '2024-05-08 16:15:00'),
(7, 'SunsetTransport', 'SNT6789', 1, '2024-05-07 08:30:00'),
(8, 'ExpressTransit', 'EXP1234', 1, '2024-05-06 10:45:00'),
(9, 'SilverArrow', 'SLV5678', 1, '2024-05-05 12:20:00'),
(10, 'CityConnector', 'CTC9101', 1, '2024-05-04 14:00:00'),
(11, 'GoldenWheels', 'GLD2345', 1, '2024-05-03 16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `driver` (
  `id` int(30) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `license_number` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
-- 

INSERT INTO `driver` (`id`, `image`, `name`, `license_number`, `status`, `date_updated`) VALUES
(1,'assets/img/drivers/driver', 'John Doe', 'DL123456', 1, '2024-05-13 10:30:00'),
(2,'assets/img/drivers/driver', 'Jane Smith', 'DL789012', 1, '2024-05-12 11:45:00'),
(3,'assets/img/drivers/driver', 'Richard Roe', 'DL345678', 1, '2024-05-11 13:20:00'),
(4,'assets/img/drivers/driver', 'Alice Johnson', 'DL901234', 0, '2024-05-10 15:00:00'),
(5,'assets/img/drivers/driver', 'Michael Brown', 'DL567890', 1, '2024-05-09 14:00:00'),
(6,'assets/img/drivers/driver', 'Emily Davis', 'DL234567', 1, '2024-05-08 16:15:00'),
(7,'assets/img/drivers/driver', 'Daniel Wilson', 'DL890123', 1, '2024-05-07 08:30:00'),
(8,'assets/img/drivers/driver', 'Sophia Martinez', 'DL456789', 1, '2024-05-06 10:45:00'),
(9,'assets/img/drivers/driver', 'James Taylor', 'DL123789', 1, '2024-05-05 12:20:00'),
(10,'assets/img/drivers/driver', 'Linda Anderson', 'DL789345', 1, '2024-05-04 14:00:00'),
(11,'assets/img/drivers/driver', 'David Moore', 'DL345901', 1, '2024-05-03 16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `terminal_name` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0= inactive , 1= active',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--


INSERT INTO `location` (`id`, `terminal_name`, `city`, `state`, `status`, `date_updated`) VALUES
(1, 'Union', 'Johannesburg', 'Gauteng', 1, '2024-05-13 10:30:00'),
(2, 'Central', 'Cape Town', 'Western Cape', 1, '2024-05-12 11:45:00'),
(3, 'Victory', 'Durban', 'KwaZulu-Natal', 1, '2024-05-11 13:20:00'),
(4, 'Pioneer', 'Pretoria', 'Gauteng', 1, '2024-05-10 15:00:00'),
(5, 'Broadway', 'Port Elizabeth', 'Eastern Cape', 1, '2024-05-09 14:00:00'),
(6, 'Gateway', 'Bloemfontein', 'Free State', 1, '2024-05-08 16:15:00'),
(7, 'Grand', 'East London', 'Eastern Cape', 1, '2024-05-07 08:30:00'),
(8, 'Liberty', 'Nelspruit', 'Mpumalanga', 1, '2024-05-06 10:45:00'),
(9, 'Summit', 'Kimberley', 'Northern Cape', 1, '2024-05-05 12:20:00'),
(10, 'Cedar', 'Pietermaritzburg', 'KwaZulu-Natal', 1, '2024-05-04 14:00:00'),
(11, 'Midtown', 'Polokwane', 'Limpopo', 1, '2024-05-03 16:30:00'),
(12, 'Riverside', 'Rustenburg', 'North West', 1, '2024-05-02 17:45:00');
-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `bus_id` int(30) NOT NULL,
  `from_location` int(30) NOT NULL,
  `to_location` int(30) NOT NULL,
  `departure_time` datetime NOT NULL,
  `eta` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `availability` int(11) NOT NULL,
  `price` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `bus_id`, `from_location`, `to_location`, `departure_time`, `eta`, `status`, `availability`, `price`, `date_updated`) VALUES
(1, 11, 1, 5, '2024-06-25 15:00:00', '2024-06-25 20:00:00', 1, 25, '500','2024-06-25 17:27:08'),
(2, 6, 1, 4, '2024-06-25 20:00:00', '2024-06-25 01:00:00', 1, 30, '260', '2024-06-25 09:09:20'),
(3, 1, 3, 9, '2024-06-26 10:00:00', '2024-06-26 16:00:00', 1, 32, '330', '2024-06-25 09:10:46'),
(4, 9, 4, 1, '2024-06-26 08:00:00', '2024-06-26 19:00:00', 1, 30, '650', '2024-06-25 09:11:55'),
(5, 7, 8, 10, '2024-06-27 10:00:00', '2024-06-27 19:00:00', 1, 33, '800','2024-06-25 09:13:02'),
(6, 4, 7, 6, '2024-06-26 11:00:00', '2024-06-25 19:00:00', 1, 35, '430', '2024-06-25 09:17:10'),
(7, 8, 9, 4, '2024-06-27 15:00:00', '2024-06-27 23:00:00', 1, 34, '750', '2024-06-25 09:18:08'),
(8, 3, 6, 2, '2024-06-27 12:00:00', '2024-06-25 17:00:00', 1, 31, '680', '2024-06-25 09:20:35'),
(9, 10, 11, 12, '2024-06-26 10:00:00', '2024-06-26 19:00:00', 1, 38, '650','2024-06-25 17:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT ' 0 = incative , 1 = active',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `username`, `password`, `status`, `date_updated`) VALUES
(1, 'Ampfarisaho Nedzamba', 1, 'admin@email.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-25 20:13:42'),
(3, 'Sipho Dlamini', 2, 'Sipho@email.com', '202cb962ac59075b964b07152d234b70', 1, '2022-06-25 20:14:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
