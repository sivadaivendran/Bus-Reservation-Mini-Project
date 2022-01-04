-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 06:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus_ticket_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bus_id`
--

CREATE TABLE IF NOT EXISTS `bus_id` (
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_id`
--

INSERT INTO `bus_id` (`id`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `dt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dt`) VALUES
('0');

-- --------------------------------------------------------

--
-- Table structure for table `ftd`
--

CREATE TABLE IF NOT EXISTS `ftd` (
  `from` varchar(70) NOT NULL,
  `to` varchar(70) NOT NULL,
  `date` varchar(20) NOT NULL,
  `count` int(20) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftd`
--

INSERT INTO `ftd` (`from`, `to`, `date`, `count`, `class`) VALUES
('Tirunelveli(New Bus Stand)', 'Chennai(koyambedu)', '2020-03-11', 8, 'Second Class(Semi Sleeper)');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
`id` int(20) NOT NULL,
  `company` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `accountno` varchar(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provider_id`
--

CREATE TABLE IF NOT EXISTS `provider_id` (
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider_id`
--

INSERT INTO `provider_id` (`id`) VALUES
(121001);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`id` int(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `busno` varchar(20) NOT NULL,
  `from` varchar(70) NOT NULL,
  `to` varchar(70) NOT NULL,
  `ddate` varchar(20) NOT NULL,
  `dtime` varchar(20) NOT NULL,
  `adate` varchar(20) NOT NULL,
  `atime` varchar(20) NOT NULL,
  `fseat` int(50) NOT NULL,
  `sseat` int(50) NOT NULL,
  `famount` int(20) NOT NULL,
  `samount` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` blob NOT NULL,
  `st` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `provider_id` int(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `p_contact` varchar(20) NOT NULL,
  `bus_id` int(20) NOT NULL,
  `bus_no` varchar(30) NOT NULL,
  `from_place` varchar(50) NOT NULL,
  `to_place` varchar(50) NOT NULL,
  `ddate` varchar(20) NOT NULL,
  `dtime` varchar(20) NOT NULL,
  `adate` varchar(20) NOT NULL,
  `atime` varchar(20) NOT NULL,
  `bseat` int(20) NOT NULL,
  `total_amount` int(20) NOT NULL,
  `commission` int(20) NOT NULL,
  `pamt` int(20) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `name`, `aadharno`, `contact`, `provider_id`, `company`, `email`, `p_contact`, `bus_id`, `bus_no`, `from_place`, `to_place`, `ddate`, `dtime`, `adate`, `atime`, `bseat`, `total_amount`, `commission`, `pamt`, `pdate`, `class`) VALUES
(12, 262002, 'james', '456787654345', '8903851619', 847007, 'SJT Nellai', 'sjtnellai@gmail.com', '9942017420', 141003, 'TN 45363', 'Tirunelveli(New Bus Stand)', 'Chennai(koyambedu)', '2020-03-07', '02:58', '2020-03-08', '03:57', 2, 3000, 300, 2700, '2020-03-07', 'First Class(Sleeper)'),
(14, 393003, 'joe', '456433454532', '9842151619', 121001, 'SRS Travels', 'vigneshscadece@gmail.com', '9677606973', 141002, 'TN 45899', 'Tirunelveli(New Bus Stand)', 'Chennai(koyambedu)', '2020-03-11', '03:56', '2020-03-12', '02:55', 8, 7200, 720, 6480, '2020-03-11', 'Second Class(Semi Sleeper)');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
`user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `aadharno` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=262004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `email`, `contact`, `address`, `aadharno`) VALUES
(393003, 'joe', 'praveenmakalovei459@gmail.com', '9842151619', ' tiruchendur road, palay', '456433454532');

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE IF NOT EXISTS `user_id` (
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_id`
--

INSERT INTO `user_id` (`id`) VALUES
(393003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=262004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
