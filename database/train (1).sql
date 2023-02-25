-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 08:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choices` varchar(255) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choices`, `sub_id`) VALUES
('256', 1),
('128', 1),
('rsa', 2),
('Des', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cloud_providers`
--

CREATE TABLE `cloud_providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `services` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cloud_providers`
--

INSERT INTO `cloud_providers` (`id`, `name`, `website`, `services`) VALUES
(1, 'Amazon Web Services', 'aws.amazon.com', 'Compute, Storage, Database, Networking, etc.'),
(2, 'Microsoft Azure', 'azure.microsoft.com', 'Compute, Storage, Database, Networking, etc.'),
(3, 'Google Cloud Platform', 'cloud.google.com', 'Compute, Storage, Database, Networking, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `controls`
--

CREATE TABLE `controls` (
  `control_id` int(11) NOT NULL,
  `control_name` varchar(255) NOT NULL,
  `control_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `controls`
--

INSERT INTO `controls` (`control_id`, `control_name`, `control_description`) VALUES
(1, 'Cryptography, Encryption & Key Management(CEK)', 'This is a description of control 1'),
(2, 'Data Security and Privacy Lifecycle Management', 'This is a description of control 2'),
(3, 'Infrastructure & Virtualization Security', 'This is a description of control 3');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `stations` varchar(200) NOT NULL,
  `station_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`stations`, `station_id`) VALUES
('Abdo Basha', 12),
('Bab-El-She3reya', 14);

-- --------------------------------------------------------

--
-- Table structure for table `subcontrols`
--

CREATE TABLE `subcontrols` (
  `subcontrol_id` int(11) NOT NULL,
  `control_id` int(11) DEFAULT NULL,
  `subcontrol_name` varchar(255) NOT NULL,
  `subcontrol_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcontrols`
--

INSERT INTO `subcontrols` (`subcontrol_id`, `control_id`, `subcontrol_name`, `subcontrol_description`) VALUES
(1, 1, 'Data Encryption', 'This is a description of subcontrol 1.1'),
(2, 1, 'Encryption Algorithm', 'This is a description of subcontrol 1.2'),
(3, 2, 'Data Inventory', 'This is a description of subcontrol 2.1'),
(4, 2, 'Data Classification', 'This is a description of subcontrol 2.2'),
(5, 3, 'Infrastructure and Virtualization Security Policy and Procedures', 'This is a description of subcontrol 3.1'),
(6, 3, 'Network Security', 'This is a description of subcontrol 3.2');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketID` int(200) NOT NULL,
  `source` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `trip_type` varchar(200) NOT NULL,
  `trip_class` varchar(200) NOT NULL,
  `ticketCount` int(200) NOT NULL,
  `by_user_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticketID`, `source`, `destination`, `date`, `return_date`, `time`, `trip_type`, `trip_class`, `ticketCount`, `by_user_id`) VALUES
(5, 'station1', 'station5', '2022-08-04', NULL, '13:55', 'One way trip', '1st - Class Carriage', 0, 0),
(6, 'station2', 'station1', '2022-08-05', NULL, '15:01', 'One way trip', '2nd - Class Carriage', 0, 0),
(7, 'station3', 'station2', '2022-08-05', NULL, '00:06', 'One way trip', '2nd - Class Carriage', 5, 0),
(8, 'station5', 'station6', '2022-08-04', NULL, '14:09', 'Two way trip', '1st - Class Carriage', 1, 0),
(9, 'test', '></option><option value = Test Destination Station', '2022-08-16', NULL, '01:51', 'Two way trip', '2nd - Class Carriage', 1, 0),
(10, 'Attaba', 'Test', '2022-08-11', NULL, '01:53', 'Two way trip', '1st - Class Carriage', 1, 0),
(11, 'Attaba', 'Test', '2022-08-11', NULL, '01:53', 'Two way trip', '1st - Class Carriage', 1, 0),
(12, 'Test', 'Test', '2022-08-11', NULL, '13:57', 'One way trip', '1st - Class Carriage', 1, 0),
(13, 'Test', 'wegz', '2022-08-03', NULL, '02:04', 'One way trip', '2nd - Class Carriage', 1, 0),
(14, 'Sheraton', 'Tagamoa', '2022-08-04', NULL, '17:09', 'Two way trip', '1st - Class Carriage', 3, 0),
(15, 'Sheraton', 'Tagamoa', '2022-08-04', NULL, '02:15', 'One way trip', '2nd - Class Carriage', 6, 0),
(16, 'Attaba', 'megz', '2022-08-31', NULL, '07:00', 'One way trip', '1st - Class Carriage', 1, 34),
(17, 'megz', 'Attaba', '2022-08-17', NULL, '10:02', 'Two way trip', '1st - Class Carriage', 2, 34),
(18, 'Attaba', 'Sheraton', '2022-08-19', NULL, '09:21', 'One way trip', '2nd - Class Carriage', 5, 35),
(19, 'Sheraton', 'Mangawy', '2022-08-25', NULL, '08:22', 'One way trip', '2nd - Class Carriage', 1, 36),
(20, 'Attaba', 'megz', '2022-08-25', NULL, '06:22', 'One way trip', '1st - Class Carriage', 1, 36),
(21, 'Sheraton', 'Test', '2022-08-17', NULL, '06:25', 'One way trip', '1st - Class Carriage', 2, 36),
(22, 'Attaba', 'megz', '2022-08-25', NULL, '08:41', 'Two way trip', '2nd - Class Carriage', 1, 36),
(23, 'Abbasya', 'Abdo', '2022-08-17', NULL, '08:32', 'One way trip', '1st - Class Carriage', 1, 36),
(24, 'Abbasya', 'Abdo', '2022-08-16', NULL, '07:49', 'One way trip', '2nd - Class Carriage', 1, 34),
(25, 'Abdo', 'Bab-El-She3reya', '2022-08-26', NULL, '09:35', 'One way trip', '1st - Class Carriage', 1, 1),
(26, 'Abdo', 'Bab-El-She3reya', '2022-08-24', '2022-08-26', '11:36', 'Two way trip', '1st - Class Carriage', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_phone` int(12) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'default-pp.jpg',
  `hasTicket` int(1) NOT NULL,
  `user_balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_type`, `profile_picture`, `hasTicket`, `user_balance`) VALUES
(1, 'Youssef Magdy', 'youssef@magdy.com', 'password', 1140523092, 'Admin', 'Youssef Magdy62f8a4a266e9d2.59705553.png', 1, 50),
(2, 'asd', 'admin@admin.com', 'admin', 0, 'Admin', '', 0, 0),
(3, 'asd', 'asd', 'asd', 0, 'User', '', 0, 0),
(4, 'test2', 'test2', 'test2', 0, 'User', '', 0, 0),
(5, '123', '123', '123', 123, 'User', '', 0, 0),
(6, 'Matchmakers', '123', 'Youssef1_abouyo', 123, 'User', '', 0, 0),
(9, 'Youssef', 'test', 'qweasd123', 0, 'User', '', 0, 0),
(10, 'Youssef', '123', 'qweasd123', 123, 'User', '', 0, 0),
(11, 'youssef@magdy.com', '', 'password', 0, 'User', '', 0, 0),
(12, 'youssef@magdy.com', '', 'password', 0, 'User', '', 0, 0),
(13, 'sas', '', 'password', 0, 'User', '', 0, 0),
(14, '', '', 'password', 0, '', '', 0, 0),
(15, '', '', 'password', 0, '', '', 0, 0),
(16, 'asd', '', 'password', 0, '', '', 0, 0),
(17, '', '', 'password', 0, '', '', 0, 0),
(18, '123', '', 'password', 0, '', '', 0, 0),
(19, 'a12', '', 'password', 1140523092, '', '', 0, 0),
(20, 'youssef@magdy.com', '', 'password', 1140523092, 'User', '', 0, 0),
(21, '12', '', 'password', 1140523092, '', '', 0, 0),
(22, 'youssef@magdy.com', '', 'password', 0, 'User', '', 0, 0),
(23, 'youssef@magdy.com', '', 'password', 0, 'User', '', 0, 0),
(24, 'youssef@magdy.com', '', 'password', 0, 'User', '', 0, 0),
(26, 'youssef@magdy.com', '', 'password', 0, '', '', 0, 0),
(27, 'Youssef', 'asd@asd.ai', 'qweasd123', 1140523092, 'User', '', 0, 60),
(28, 'youssef@magdy.com', 'youssef@magdy.com121212', 'qweasd123', 1140523092, 'User', '', 0, 0),
(29, 'Ahmed', 'youssef@magdy.com', 'qweqweqwe', 1140523092, 'User', '', 0, 0),
(30, 'q123', 'youssef@magdy.com', 'qweqweqwe', 1140523092, 'User', '', 0, 0),
(31, '', '', 'qweasd123', 0, '', '', 0, 0),
(33, '123', 'w@w.com', 'qweasd123', 1140523092, 'User', '', 0, 0),
(34, 'Joey', 'test@tete.com', 'qweasd123', 1140523092, 'User', 'Joey62f88ed978b970.43824763.png', 1, 0),
(35, 'Magdy', 'leo@leo.leo', 'qweasd123', 1140523092, 'User', 'kaka62f74ec7e16299.26638901.png', 1, 0),
(36, 'youssef', 'testt@test.com', 'qweasd123', 1140523092, 'User', 'youssef62f87ad7b5ba77.18344624.jpg', 1, 10),
(37, 'asd', 'youssef@mail.com', 'qweasd123', 1140523092, 'User', 'asd62f89f4ad844f5.59944088.png', 0, 0),
(38, 'Megz', 'a@a.ca', 'qweasd123', 1140523093, 'User', 'default-pp.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `cloud_providers`
--
ALTER TABLE `cloud_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`control_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `subcontrols`
--
ALTER TABLE `subcontrols`
  ADD PRIMARY KEY (`subcontrol_id`),
  ADD KEY `control_id` (`control_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloud_providers`
--
ALTER TABLE `cloud_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `controls`
--
ALTER TABLE `controls`
  MODIFY `control_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcontrols`
--
ALTER TABLE `subcontrols`
  MODIFY `subcontrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subcontrols` (`subcontrol_id`);

--
-- Constraints for table `subcontrols`
--
ALTER TABLE `subcontrols`
  ADD CONSTRAINT `subcontrols_ibfk_1` FOREIGN KEY (`control_id`) REFERENCES `controls` (`control_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
