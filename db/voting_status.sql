-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8888
-- Generation Time: Mar 23, 2025 at 12:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `voting_status`
--

CREATE TABLE `voting_status` (
  `id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `vote_type` varchar(50) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voting_status`
--

INSERT INTO `voting_status` (`id`, `course`, `vote_type`, `status`) VALUES
(1, 'MCA', 'CR', 'off'),
(2, 'MCA', 'CCC', 'on'),
(3, 'All', 'GS', 'on'),
(4, 'All', 'HS', 'on'),
(5, 'BTech', 'CR', 'off'),
(6, 'BTech', 'CCC', 'off'),
(9, 'MTech', 'CR', 'on'),
(10, 'MTech', 'CCC', 'off'),
(13, 'MSc', 'CR', 'off'),
(14, 'MSc', 'CCC', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voting_status`
--
ALTER TABLE `voting_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch` (`course`,`vote_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voting_status`
--
ALTER TABLE `voting_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
