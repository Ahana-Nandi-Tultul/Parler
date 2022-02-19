-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 04:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apourler`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_address` varchar(80) NOT NULL,
  `admin_phn_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_address`, `admin_phn_number`) VALUES
(1, 'Ahana Nandi', 'ahana@gmail.com', 'a', 'Jhenaidah, Bangladesh', '1910923785');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `apointment_no` int(255) NOT NULL,
  `cno` int(255) NOT NULL,
  `a_customer_name` varchar(50) NOT NULL,
  `a_customer_address` varchar(40) NOT NULL,
  `a_customer_email` varchar(50) NOT NULL,
  `a_customer_phn_no` varchar(11) NOT NULL,
  `a_customer_pre_time` varchar(80) NOT NULL,
  `a_customer_pre_date` varchar(30) NOT NULL,
  `a_customer_services` varchar(50) NOT NULL,
  `a_service_status` varchar(60) NOT NULL,
  `paid_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`apointment_no`, `cno`, `a_customer_name`, `a_customer_address`, `a_customer_email`, `a_customer_phn_no`, `a_customer_pre_time`, `a_customer_pre_date`, `a_customer_services`, `a_service_status`, `paid_amount`) VALUES
(2, 1, 'Ahana45', 'Hamdah, Jhenaidah, Bangladesh', 'ahana45@gmail.com', '1910', '21:00', '2022-02-19', 'facial aesthetics', 'Complete', ''),
(7, 3, 'Ahana54', 'Hamdah, Khandakarpara, Jhenaidah, Bangla', 'ahana54@gmail.com', '01310', '13:30', '2022-02-26', 'foot care', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cno` int(255) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cmail` varchar(50) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `caddress` varchar(80) NOT NULL,
  `cphoneNumber` varchar(11) NOT NULL,
  `TimeStmp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cno`, `cname`, `cmail`, `cpassword`, `caddress`, `cphoneNumber`, `TimeStmp`) VALUES
(1, 'Ahana45', 'ahana45@gmail.com', 'ac', 'Hamdah, Jhenaidah, Bangladesh', '1910', '2022-02-18 13:30:02'),
(3, 'Ahana54', 'ahana54@gmail.com', 'a54', 'Hamdah, Khandakarpara, Jhenaidah, Bangladesh', '01310', '2022-02-18 14:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `notification_admin`
--

CREATE TABLE `notification_admin` (
  `sno` int(255) NOT NULL,
  `ano` int(255) NOT NULL,
  `smgs` varchar(255) NOT NULL,
  `cancelingTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_admin`
--

INSERT INTO `notification_admin` (`sno`, `ano`, `smgs`, `cancelingTime`) VALUES
(3, 1, 'Customer: Ahana54 bearing Email: ahana54@gmail.com cancel her appointment.', '2022-02-18 20:29:16'),
(5, 1, 'Customer: Ahana54 bearing Email: ahana54@gmail.com cancel her appointment.', '2022-02-18 20:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `notification_customers`
--

CREATE TABLE `notification_customers` (
  `sno` int(255) NOT NULL,
  `cno` int(255) NOT NULL,
  `smgs` varchar(255) NOT NULL,
  `changingTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_customers`
--

INSERT INTO `notification_customers` (`sno`, `cno`, `smgs`, `changingTime`) VALUES
(1, 3, 'Your appointment date has been change from 2022-02-25 to 2022-02-26', '2022-02-18 20:45:04'),
(2, 3, 'Your appointment time has been change from 13:25 to 13:30', '2022-02-18 20:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`apointment_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cno`);

--
-- Indexes for table `notification_admin`
--
ALTER TABLE `notification_admin`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `notification_customers`
--
ALTER TABLE `notification_customers`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `apointment_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification_customers`
--
ALTER TABLE `notification_customers`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
