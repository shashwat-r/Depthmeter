-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 21, 2017 at 07:58 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `iot_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Water_Level`
--

CREATE TABLE `Water_Level` (
  `Id` int(11) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Level` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Water_Level`
--

INSERT INTO `Water_Level` (`Id`, `Time_Stamp`, `Level`) VALUES
(1, '2017-03-21 18:37:51', 0.98),
(2, '2017-03-21 18:38:02', 0.98),
(3, '2017-03-21 18:38:13', 0.98),
(4, '2017-03-21 18:38:23', 0.98),
(5, '2017-03-21 18:38:34', 0.98),
(6, '2017-03-21 18:38:45', 0.98),
(7, '2017-03-21 18:38:55', 0.98),
(8, '2017-03-21 18:39:06', 0.98),
(9, '2017-03-21 18:39:17', 0.98),
(10, '2017-03-21 18:39:27', 0.98),
(11, '2017-03-21 18:39:38', 0.98),
(12, '2017-03-21 18:39:49', 0.98),
(13, '2017-03-21 18:39:59', 0.98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Water_Level`
--
ALTER TABLE `Water_Level`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Time_Stamp` (`Time_Stamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Water_Level`
--
ALTER TABLE `Water_Level`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;