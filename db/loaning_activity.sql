-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 07:49 AM
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
-- Database: `loaning_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_info`
--

CREATE TABLE `acc_info` (
  `acc_no` int(11) NOT NULL,
  `email` varchar(49) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `acc_status` enum('Pending','Approved','Rejected') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_info`
--

INSERT INTO `acc_info` (`acc_no`, `email`, `password`, `acc_status`, `date_created`) VALUES
(1, 'kobie.oracion12@gmail.com', 'admin123', 'Pending', '2022-05-02 07:12:24'),
(7, 'richardako123@gmail.com', '123', 'Pending', '2022-05-03 06:10:02'),
(13, 'jirehramos@gmail.com', '123', 'Pending', '2022-05-04 02:18:18'),
(17, 'akosineil123@gmail.com', NULL, 'Pending', '2022-05-07 04:04:50'),
(18, 'ralphako123@gmail.com', NULL, 'Pending', '2022-05-07 04:05:02'),
(19, 'pogi_tulfo@gmail.com', NULL, 'Pending', '2022-05-07 03:55:54'),
(20, 'zoeoracion12@gmail.com', 'admin123', 'Pending', '2022-05-07 05:15:50'),
(21, 'nimez@gmail.com', '123', 'Pending', '2022-05-07 05:43:01'),
(22, 'nimez@gmail.com', '123', 'Pending', '2022-05-07 05:43:58');

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

--
-- Dumping data for table `chat_table`
--

INSERT INTO `chat_table` (`message_id`, `sender_id`, `receiver_id`, `received_message`, `sent_message`, `date_sent`) VALUES
(5, 1, 7, NULL, 'Pahinging pera', '2022-05-03 14:58:06'),
(6, 1, 7, NULL, 'Helpppppppppp', '2022-05-03 14:58:07'),
(7, 1, 7, NULL, 'mamamatay na po ako', '2022-05-03 14:58:07'),
(8, 1, 7, NULL, 'Wala na po akong pera', '2022-05-03 14:58:08'),
(9, 1, 7, NULL, 'mapupuno na po ang storage ko', '2022-05-03 14:58:09'),
(10, 1, 0, NULL, 'magulo ang buhay ko', '2022-05-03 15:06:27'),
(11, 1, 0, NULL, 'asdasdasd', '2022-05-03 15:11:38'),
(12, 1, 0, NULL, 'asdasdasdasdasdas', '2022-05-03 15:21:01'),
(13, 1, 0, NULL, 'another', '2022-05-03 15:21:35'),
(14, 1, 0, NULL, 'anotherr', '2022-05-03 15:22:29'),
(15, 1, 0, NULL, 'anotherrrr', '2022-05-03 15:23:01'),
(16, 1, 0, NULL, 'shit', '2022-05-03 15:24:29'),
(17, 1, 0, NULL, 'shit2', '2022-05-03 15:24:48'),
(18, 1, 0, NULL, 'shit3', '2022-05-03 15:25:56'),
(19, 1, 0, NULL, 'shit4', '2022-05-03 15:26:53'),
(20, 1, 0, NULL, 'shit5', '2022-05-03 15:29:14'),
(21, 1, 0, NULL, 'shit6', '2022-05-03 15:30:31'),
(22, 1, 0, NULL, 'i love you bebe kuj', '2022-05-03 15:31:26'),
(23, 1, 0, NULL, 'wtf', '2022-05-05 05:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL,
  `last_name` text NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `category` text NOT NULL,
  `p_address` varchar(49) NOT NULL,
  `e_address` varchar(49) NOT NULL,
  `birth_date` date NOT NULL,
  `t_number` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `mother` text NOT NULL,
  `contact` int(11) NOT NULL,
  `father` text NOT NULL,
  `c_person` text NOT NULL,
  `spouse` text NOT NULL,
  `s_number` int(11) NOT NULL,
  `c_affiliated` longtext NOT NULL,
  `c_address` varchar(49) NOT NULL,
  `c_number` int(11) NOT NULL,
  `c_position` varchar(49) NOT NULL,
  `w_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `last_name`, `first_name`, `middle_name`, `category`, `p_address`, `e_address`, `birth_date`, `t_number`, `id_card`, `mother`, `contact`, `father`, `c_person`, `spouse`, `s_number`, `c_affiliated`, `c_address`, `c_number`, `c_position`, `w_status`) VALUES
(2, 'Ramos', 'Richard', 'Deleon', 'atm', 'Santisima Cruz Santa Cruz Laguna', 'ramosrichard310@gmail.com', '2022-05-05', 954321, 12345, 'mother_name', 1234567, 'father_name', 'c_person', 's_name', 9654321, 'c_name', 'c_address', 1234567, 'c_position', 'w_status'),
(12, 'a', 'b', 'c', 'sps', 'd', 'e', '2022-05-11', 1, 2, 'f', 3, 'h', 'g', 'i', 4, 'j', 'k', 5, 'l', 'm'),
(13, 'a', 'b', 'c', 'spsv1', 'd', 'e', '2022-05-17', 1, 2, 'f', 3, 'h', 'g', 'i', 4, 'j', 'k', 5, 'l', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `loan_info`
--

CREATE TABLE `loan_info` (
  `loan_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account` varchar(15) NOT NULL,
  `payment_details` text NOT NULL,
  `remaining_balance` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `loan_name` text NOT NULL,
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
  `user_mobile` int(11) NOT NULL,
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
(1, 'Kobie Oracion', 'Admin', NULL, 0, 0, '', '', '', ''),
(7, 'Richard Ramos', 'Branch Manager', NULL, 0, 0, '', '', '', ''),
(13, 'Jireh Ramos', 'Staff', NULL, 0, 0, '', '', '', ''),
(17, ' Pornela', 'Admin', '0000-00-00 00:00:00', 0, 0, '', '', '', ''),
(18, 'Ralph Vincent Pagcaliwagan', 'Admin', '1969-08-22 00:00:00', 915221994, 420, 'Calawang, Laguna', 'Unknown', '1969-08-22', 'Married'),
(19, 'Justine Dale Violanta', 'Admin', '1966-09-08 00:00:00', 915221994, 69, 'Liliw, Laguna', 'Tulfo', '1966-09-08', 'Married'),
(20, 'Zoe Oracion', 'Admin', '2022-02-12 00:00:00', 2147483647, 1, 'Luisiana, Laguna', 'Female', '2022-02-12', 'Single'),
(22, 'Maricito Nimez', 'Branch Manager', '2000-10-01 00:00:00', 2147483647, 21, 'Sta.Cruz, Laguna', 'Male', '2000-10-01', 'Single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_info`
--
ALTER TABLE `acc_info`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `chat_table`
--
ALTER TABLE `chat_table`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD PRIMARY KEY (`loan_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `acc_no` (`acc_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_info`
--
ALTER TABLE `acc_info`
  MODIFY `acc_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chat_table`
--
ALTER TABLE `chat_table`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loan_info`
--
ALTER TABLE `loan_info`
  MODIFY `loan_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_info`
--
ALTER TABLE `loan_info`
  ADD CONSTRAINT `loan_info_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_info` (`customer_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`acc_no`) REFERENCES `acc_info` (`acc_no`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
