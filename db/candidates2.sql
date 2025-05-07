-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8888
-- Generation Time: Mar 23, 2025 at 12:35 PM
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
-- Table structure for table `candidates2`
--

CREATE TABLE `candidates2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sic` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL,
  `vote_type` varchar(50) NOT NULL,
  `vote_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates2`
--

INSERT INTO `candidates2` (`id`, `name`, `sic`, `course`, `vote_type`, `vote_count`) VALUES
(47, 'Aarav sharma', '23mmci56', 'MCA', 'CR', 0),
(48, 'Esha Gupta', '23mmci77', 'All', 'HS', 2),
(49, 'Ishita reddy', '23mmci88', 'MCA', 'CR', 0),
(50, 'Kavya iyer', '23mmci12', 'MCA', 'CCC', 0),
(51, 'Aman pandey', '23mmci89', 'All', 'GS', 1),
(52, 'Karan kapoor', '23mmci01', 'MCA', 'CCC', 0),
(53, 'Farhan khan', '21mmci44', 'All', 'GS', 1),
(54, 'Jatin mehta', '21mmci99', 'BTech', 'CCC', 0),
(55, 'Lakshmi nair', '21mmci34', 'BTech', 'CR', 0),
(56, 'Priya menon', '21mmci78', 'BTech', 'CR', 0),
(57, 'Aditya joshi', '21mmci11', 'BTech', 'CR', 0),
(58, 'Chetan kumar', '22mmci33', 'All', 'GS', 1),
(59, 'Gauri desai', '22mmci55', 'All', 'HS', 1),
(60, 'Manish choudhary', '22mmci49', 'MTech', 'CR', 0),
(61, 'Rahul verma', '22mmci89', 'MTech', 'CR', 1),
(62, 'Varun malhotra', '22mmci45', 'BTech', 'CCC', 0),
(63, 'Divya singh', '24mmci88', 'All', 'GS', 0),
(64, 'Nandini rao', '24mmci56', 'MSc', 'CR', 0),
(65, 'Yash trivedi', '24mmci67', 'MSc', 'CR', 0),
(66, 'Sneha bhatia', '24mmci90', 'All', 'HS', 0),
(67, 'Jatin sharma', '23mmci71', 'All', 'HS', 0),
(68, 'Eshaan kapoor', '21mmci55', 'All', 'HS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates2`
--
ALTER TABLE `candidates2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sic` (`sic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates2`
--
ALTER TABLE `candidates2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
