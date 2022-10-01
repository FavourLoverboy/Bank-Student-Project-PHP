-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 01:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `godson`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(11) NOT NULL,
  `customerId` varchar(50) NOT NULL,
  `accNo` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `customerId` varchar(50) NOT NULL,
  `accNo` int(11) NOT NULL,
  `accName` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `accType` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(8) NOT NULL,
  `ms` varchar(10) NOT NULL,
  `nname` varchar(20) NOT NULL,
  `nnum` varchar(15) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `passCode` varchar(5) NOT NULL,
  `level` varchar(10) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `customerId`, `accNo`, `accName`, `email`, `accType`, `address`, `phone`, `dob`, `sex`, `ms`, `nname`, `nnum`, `userName`, `password`, `passCode`, `level`, `passport`, `date`) VALUES
(1, '9120445059', 1638709664, 'Joseph Blessing Okon', 'blessingj@yahoo.com', 'Saving', '#14b okania street, Rumuokwuta, Port-Harcourt', 12222233, '1995-12-05', 'Male', 'Single', 'Kelly John Kelly', '12345678909', 'Joseph', '463588', '391', 'Customer', '83374285.jpg', '2021-12-05'),
(2, '5845645788', 1638710005, 'Kenule Nnah', 'kenule@gmail.com', 'Current', '#14b okania street, Rumuokwuta, Port-Harcourt', 45667890, '2021-12-05', 'Male', 'Single', 'John Kenneth', '12345678909', 'Kenule', '165829', '282', 'Customer', 'chef_main.jpg', '2021-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `id` int(11) NOT NULL,
  `accNo` varchar(15) NOT NULL,
  `destAcc` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`id`, `accNo`, `destAcc`, `amount`, `date`) VALUES
(1, 'Internal', 1638709664, 30000, '2021-12-05 00:00:00'),
(2, 'Internal', 1638709664, 10000, '2021-12-05 00:00:00'),
(3, '1638709664', 1638710005, 15000, '2021-12-05 14:23:14'),
(4, 'Internal', 1638710005, 500000, '2021-12-05 00:00:00'),
(5, '1638710005', 1638709664, 200000, '2021-12-05 14:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogin`
--

CREATE TABLE `tbluserlogin` (
  `id` int(11) NOT NULL,
  `customerId` varchar(12) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `passCode` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserlogin`
--

INSERT INTO `tbluserlogin` (`id`, `customerId`, `userName`, `password`, `passCode`, `level`) VALUES
(1, '1234567890', 'NNAH', '2021', '1981', 'Admin'),
(2, '9120445059', 'Joseph', '463588', '391', 'Customer'),
(3, '5845645788', 'kenule', '2020', '282', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluserlogin`
--
ALTER TABLE `tbluserlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluserlogin`
--
ALTER TABLE `tbluserlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
