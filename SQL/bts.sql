-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2016 at 11:44 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `bts`
--

CREATE TABLE IF NOT EXISTS `bts` (
  `Bus_id` bigint(20) NOT NULL,
  `Source1` varchar(200) NOT NULL,
  `Destination1` varchar(200) NOT NULL,
  `Source2` varchar(200) NOT NULL,
  `Destination2` varchar(200) NOT NULL,
  `Bus_Name` varchar(200) NOT NULL,
  `Approximate_Fare` varchar(200) NOT NULL,
  `Approximate_Time` varchar(200) NOT NULL,
  `Distance` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bts`
--

INSERT INTO `bts` (`Bus_id`, `Source1`, `Destination1`, `Source2`, `Destination2`, `Bus_Name`, `Approximate_Fare`, `Approximate_Time`, `Distance`) VALUES
(1, 'Dhanmondi', 'Mohammadpur', 'Mohammadpur', 'Dhanmondi', 'Midway', '20 Tk', '30 mins', '10 KM'),
(2, 'Banani', 'Mohammadpur', 'Mohammadpur', 'Banani', 'Taranga', '20 TK', '30 mins', '20 KM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bts`
--
ALTER TABLE `bts`
  ADD PRIMARY KEY (`Bus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bts`
--
ALTER TABLE `bts`
  MODIFY `Bus_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
