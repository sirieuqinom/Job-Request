-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 07:36 AM
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
  `local_number` int(20) DEFAULT NULL,
  `software` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `request`, `dates`, `account_type`, `provided_email`, `provided_id`, `local_number`, `software`, `dept`, `problem`) VALUES
(7, 'biometric record', 'May 15 - 30, 2022', '', '', '', 0, '', '', ''),
(8, 'daily time record', 'May 1 - 15, 2021', '', '', '', 0, '', '', ''),
(9, 'reset password', '', 'tup_portal', 'giann825@gmail.com', 'tupm-18-0229', 0, '', '', ''),
(10, 'daily time record', 'June 10 - 25, 2023', '', '', '', 0, '', '', ''),
(11, 'telephone repair', '', '', '', '', 101, '', 'cla', ''),
(12, 'software installation', '', '', '', '', 0, 'microsoft office', 'irtc', ''),
(13, 'internet connection', '', '', '', '', 0, '', 'cafa', ''),
(14, 'internet connection', '', '', '', '', 0, '', 'cla', ''),
(15, 'telephone repair', '', '', '', '', 111, '', 'cla', ''),
(16, 'publication update of info in website', '', '', '', '', 0, '', 'coe', ''),
(17, 'ict repair equipment', '', '', '', '', 0, '', 'irtc', 'Broken Computer'),
(18, 'others', '', '', '', '', 0, '', 'cafa', 'Installation of new Computers');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
