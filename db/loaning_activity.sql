-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 09:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loaning_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_cred`
--

CREATE TABLE `acc_cred` (
  `acc_no` int(11) NOT NULL,
  `email` varchar(49) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `acc_status` enum('Pending','Approved','Declined') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_cred`
--

INSERT INTO `acc_cred` (`acc_no`, `email`, `password`, `acc_status`, `date_created`) VALUES
(1, 'justinviolanta@gmail.com', '123', 'Pending', '2022-05-09 19:09:52'),
(2, 'ramosrichard310@gmail.com', '123', 'Pending', '2022-05-09 19:10:20'),
(3, 'rendhelpizon@gmail.com', '123', 'Pending', '2022-05-09 19:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `chat_table`
--

CREATE TABLE `chat_table` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `received_message` longtext DEFAULT NULL,
  `sent_message` longtext DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_cred`
--

CREATE TABLE `customer_cred` (
  `customer_id` int(11) NOT NULL,
  `last_name` text NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `category` text NOT NULL,
  `p_address` varchar(49) NOT NULL,
  `e_address` varchar(49) NOT NULL,
  `birth_date` date NOT NULL,
  `t_number` bigint(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `mother` text NOT NULL,
  `contact` bigint(11) NOT NULL,
  `father` text NOT NULL,
  `c_person` text NOT NULL,
  `spouse` text NOT NULL,
  `s_number` bigint(11) NOT NULL,
  `c_affiliated` longtext NOT NULL,
  `c_address` varchar(49) NOT NULL,
  `c_number` bigint(11) NOT NULL,
  `c_position` varchar(49) NOT NULL,
  `w_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_info`
--

CREATE TABLE `loan_info` (
  `customer_id` int(11) NOT NULL,
  `account` varchar(15) NOT NULL,
  `payment_details` int(99) NOT NULL,
  `remaining_balance` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `loan_id` int(11) NOT NULL,
  `loan_amount` int(99) NOT NULL,
  `loan_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `acc_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` enum('Admin','Branch Manager','Staff') NOT NULL,
  `user_bday` datetime DEFAULT NULL,
  `user_mobile` bigint(11) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_gender` varchar(11) NOT NULL,
  `user_edu` varchar(255) NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`acc_no`, `name`, `position`, `user_bday`, `user_mobile`, `user_age`, `user_address`, `user_gender`, `user_edu`, `user_status`) VALUES
(1, 'Justine Violanta', 'Admin', NULL, 0, 0, '', '', '', ''),
(2, 'Richard Ramos', 'Branch Manager', '2022-05-12 00:00:00', 9066000346, 21, 'Santisima Cruz Santa Cruz Laguna', 'Male', 'College', 'Single'),
(3, 'Rendhel Pizon', 'Staff', '2022-05-11 00:00:00', 9066000346, 21, 'Santisima Cruz Santa Cruz Laguna', 'Male', 'College', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_cred`
--
ALTER TABLE `acc_cred`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `customer_cred`
--
ALTER TABLE `customer_cred`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `acc_no` (`acc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_cred`
--
ALTER TABLE `acc_cred`
  MODIFY `acc_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_cred`
--
ALTER TABLE `customer_cred`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD CONSTRAINT `loan_info_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_cred` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD CONSTRAINT `loan_type_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `customer_cred` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`acc_no`) REFERENCES `acc_cred` (`acc_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
