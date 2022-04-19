-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 07:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `request_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `request` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `provided_email` varchar(255) NOT NULL,
  `provided_id` varchar(255) NOT NULL,
  `local_number` varchar(20) DEFAULT NULL,
  `software` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request`, `dates`, `account_type`, `provided_email`, `provided_id`, `local_number`, `software`, `dept`, `problem`, `status`) VALUES
(36, 'telephone repair', '', '', '', '', '789', '', 'CAFA', '', 'pending'),
(37, 'daily time record', 'May 1 - 15, 2021', '', '', '', '', '', '', '', 'pending'),
(38, 'ict repair equipment', '', '', '', '', '', '', 'CLA', 'Broken Computer', 'pending'),
(39, 'others', '', '', '', '', '', '', 'IRTC', 'Need Cash', 'pending'),
(40, 'reset password', '', 'TUP Web ERS', 'giann825@gmail.com', 'tupm-18-0229', '', '', '', '', 'pending'),
(41, 'software installation', '', '', '', '', '', 'microsoft office', 'CIE', '', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
