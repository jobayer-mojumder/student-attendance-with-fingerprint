-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2017 at 12:37 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `institute_info`
--

CREATE TABLE `institute_info` (
  `school_id` int(11) NOT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `eiin_number` varchar(20) DEFAULT NULL,
  `institute_type` varchar(20) DEFAULT NULL,
  `weekend` varchar(10) DEFAULT NULL,
  `contact_num` varchar(15) DEFAULT NULL,
  `house_no` varchar(20) DEFAULT NULL,
  `road_no` varchar(20) DEFAULT NULL,
  `thana` varchar(50) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `activate_status` varchar(20) DEFAULT NULL,
  `reg_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_info`
--

INSERT INTO `institute_info` (`school_id`, `institute_name`, `eiin_number`, `institute_type`, `weekend`, `contact_num`, `house_no`, `road_no`, `thana`, `district`, `activate_status`, `reg_time`) VALUES
(1, 'Nothing', '2345678', 'Primary School', 'friday', '5676', '6587', '43534534', '4353453', '345353', '1', '2017-01-19 14:57:52'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2017-01-19 15:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_info_table`
--

CREATE TABLE `student_info_table` (
  `std_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `class` varchar(25) DEFAULT NULL,
  `std_section` varchar(7) DEFAULT NULL,
  `std_roll` int(11) DEFAULT NULL,
  `std_group` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `std_shift` varchar(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `father_name` varchar(32) DEFAULT NULL,
  `father_occupation` varchar(32) DEFAULT NULL,
  `father_phone` varchar(32) DEFAULT NULL,
  `mother_name` varchar(64) DEFAULT NULL,
  `mother_occupation` varchar(32) DEFAULT NULL,
  `mother_phone` varchar(32) DEFAULT NULL,
  `local_guardian` varchar(50) DEFAULT NULL,
  `local_occupation` varchar(30) DEFAULT NULL,
  `local_phone` varchar(15) DEFAULT NULL,
  `permanent_house_no` varchar(32) DEFAULT NULL,
  `permanent_road_no` varchar(32) DEFAULT NULL,
  `permanent_thana` varchar(64) DEFAULT NULL,
  `permanent_district` varchar(64) DEFAULT NULL,
  `present_house_no` varchar(255) DEFAULT NULL,
  `present_road_no` varchar(255) DEFAULT NULL,
  `present_thana` varchar(255) DEFAULT NULL,
  `present_district` varchar(255) DEFAULT NULL,
  `student_status` int(2) DEFAULT NULL,
  `fingerPrintId` varchar(50) DEFAULT NULL,
  `reg_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info_table`
--

INSERT INTO `student_info_table` (`std_id`, `full_name`, `class`, `std_section`, `std_roll`, `std_group`, `birth_date`, `std_shift`, `image`, `gender`, `religion`, `father_name`, `father_occupation`, `father_phone`, `mother_name`, `mother_occupation`, `mother_phone`, `local_guardian`, `local_occupation`, `local_phone`, `permanent_house_no`, `permanent_road_no`, `permanent_thana`, `permanent_district`, `present_house_no`, `present_road_no`, `present_thana`, `present_district`, `student_status`, `fingerPrintId`, `reg_time`, `school_id`) VALUES
(3, 'Shakil', '11', 'A', 12, 'Science', '1999-02-02', 'none', '', 'Male', 'Islam', 'sadas', 'asdasd', '1234567', 'DSDA', 'dasda', NULL, 'DADAS', 'sada', '234534', '87', '098', 'dhaka', 'dhaka', '34', '34', 'Dhaka', 'dhaka', NULL, NULL, '2017-01-19 15:31:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `imageref` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `activate_status` int(11) DEFAULT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `password`, `full_name`, `designation`, `institute_id`, `imageref`, `phone`, `user_type`, `activate_status`, `regtime`) VALUES
(1, 'jobayer', '1234', 'Jobayer Mojumder', 'dsfa', 1, 'none', 'NULL', 'school_admin', 1, '2017-01-19 08:56:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `institute_info`
--
ALTER TABLE `institute_info`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `student_info_table`
--
ALTER TABLE `student_info_table`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `institute_info`
--
ALTER TABLE `institute_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_info_table`
--
ALTER TABLE `student_info_table`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_info_table`
--
ALTER TABLE `student_info_table`
  ADD CONSTRAINT `student_info_table_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `institute_info` (`school_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
