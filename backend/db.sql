-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 07:50 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--
CREATE DATABASE IF NOT EXISTS `capstone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `capstone`;

-- --------------------------------------------------------

--
-- Table structure for table `chasers`
--

CREATE TABLE `chasers` (
  `id` int(11) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chasers`
--

INSERT INTO `chasers` (`id`, `last_name`, `first_name`, `middle_name`, `username`, `password`, `email`, `addr`, `birthdate`, `regdate`, `bio`, `status`) VALUES
(1, 'Kuma', 'Sama', NULL, 'kuma', '131322Clear', 'kumaaa.sama@gmail.com', NULL, '2003-03-01', '2017-02-14 02:03:11', NULL, 1),
(2, 'Kuma', 'Sama', NULL, 'kumarino', '131322Clear', 'kumaaa.sama@gmail.com', NULL, '2003-03-01', '2017-02-14 02:03:28', NULL, 1),
(3, 'Kuma', 'Sama', NULL, 'kumasama', '131322', 'kumaaa.sama@gmail.com', NULL, '2003-03-01', '2017-02-14 15:19:35', NULL, 1),
(4, 'Kuma', 'Sama', NULL, 'kuma', '131322Clear', 'kumaaa.sama@gmail.com', NULL, '2003-03-01', '2017-02-14 15:20:35', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chasers`
--
ALTER TABLE `chasers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chasers`
--
ALTER TABLE `chasers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
