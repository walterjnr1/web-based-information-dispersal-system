-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 12:54 PM
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
-- Database: `dispersal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

CREATE TABLE `tblgroup` (
  `ID` int(5) NOT NULL,
  `groupname` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(9, 'Admin'),
(8, 'Principal'),
(7, 'Super Admin'),
(11, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `ID` int(4) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `user` varchar(35) NOT NULL,
  `date_paid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`ID`, `amount`, `userid`, `user`, `date_paid`) VALUES
(8, '290', 'S/AT/7198', 'Xavier Umoh Jnr', '2023-06-20 16:3'),
(9, '320', '340', 'Victor Nyah', '2023-06-20 16:3');

-- --------------------------------------------------------

--
-- Table structure for table `tblsms`
--

CREATE TABLE `tblsms` (
  `ID` int(3) NOT NULL,
  `sms_type` varchar(10) NOT NULL,
  `senderID` varchar(11) NOT NULL,
  `sendername` varchar(40) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `msg` varchar(320) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `date_sent` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsms`
--

INSERT INTO `tblsms` (`ID`, `sms_type`, `senderID`, `sendername`, `sender`, `msg`, `phone`, `date_sent`, `status`) VALUES
(19, 'Single SMS', 'javis', 'Xavier Umoh Jnr', 'S/AT/7198', 'dsdsfsdd', '08067361023', '2023-06-20 17:00:57', 'OK'),
(20, 'Bulk SMS', 'ISUPPORT', 'Xavier Umoh Jnr', 'S/AT/7198', 'wqdfdgf', '08067361023', '2023-06-20 17:02:09', 'OK'),
(21, 'Single SMS', 'ISUPPORT', 'Victor Nyah', '340', 'xcd', '08067361023', '2023-06-20 17:03:49', 'OK'),
(22, 'Bulk SMS', 'javis', 'Victor Nyah', '340', 'bulk student', '08066534343,', '2023-06-20 17:05:34', 'OK');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `ID` int(3) NOT NULL,
  `staffID` varchar(10) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `staff_type` varchar(15) NOT NULL,
  `date_appointment` varchar(15) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `date_reg` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `unit` int(6) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`ID`, `staffID`, `fullname`, `password`, `sex`, `phone`, `dept`, `staff_type`, `date_appointment`, `qualification`, `date_reg`, `status`, `unit`, `photo`) VALUES
(23, 'S/AT/7198', 'Xavier Umoh Jnr', '12345678', 'Male', '08067361023', 'Computer Science', 'Non-Academic', '2023-06-07', 'FSLC', '2023-06-17 12:1', 1, 2272, 'upload/imagesf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(4) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `regnum` varchar(20) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `status` int(10) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `date_reg` varchar(25) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `fullname`, `password`, `regnum`, `sex`, `phone`, `dept`, `status`, `unit`, `date_reg`, `photo`) VALUES
(1, 'Victor Nyah', '12345678', '340', 'Male', '08066534343', 'Computer Science', 1, '1622', '12/09/2023', 'upload/imagesxzdf.jpg'),
(13, 'Sunday Toh', '12345678', 'A35626', 'Male', '0903787963', 'Computer Science', 1, '0', '2023-06-10 13:24:00', 'upload/10.png'),
(19, 'Ndueso Sunday', '0c74S7C', '19/21321', 'Male', '08067361023', 'Computer Science', 1, '0', '2023-06-17 11:42:39', 'upload/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastaccess` varchar(22) NOT NULL,
  `last_ip` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `photo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `fullname`, `email`, `lastaccess`, `last_ip`, `status`, `photo`) VALUES
(3, 'admin', 'admin123', 'Gabriel Godwin', 'Gabsolution@yahoo.com', '2023-06-17 10:49:54', '::1', 1, 'upload/images.png'),
(28, 'walterjnr1', 'escobar2012', 'Ndueso Walter', 'newleastpaysolution@gmail.com', 'Nill', 'Nill', 1, 'upload/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinfo`
--

CREATE TABLE `websiteinfo` (
  `ID` int(2) NOT NULL,
  `websitename` varchar(150) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `sms_username` varchar(40) NOT NULL,
  `sms_password` varchar(20) NOT NULL,
  `payment_secretkey` varchar(50) NOT NULL,
  `logo` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`ID`, `websitename`, `email`, `phone`, `sms_username`, `sms_password`, `payment_secretkey`, `logo`) VALUES
(1, 'DESIGN AND IMPLEMENTATION OF A WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS', 'suport@aurthur.com', '08067361023', 'info.autosyst@gmail.com', 'Integax.sms@2022', 'FLWPUBK_TEST-2c7a9c3062c7ef43c062e7c1a0463bd1-X', 'upload/favicon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblgroup`
--
ALTER TABLE `tblgroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsms`
--
ALTER TABLE `tblsms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblgroup`
--
ALTER TABLE `tblgroup`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblsms`
--
ALTER TABLE `tblsms`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
