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
-- Table structure for table `votes2`
--

CREATE TABLE `votes2` (
  `id` int(10) NOT NULL,
  `voter_sic` varchar(20) NOT NULL,
  `candidate_sic` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `vote_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes2`
--

INSERT INTO `votes2` (`id`, `voter_sic`, `candidate_sic`, `course`, `time`, `vote_type`) VALUES
(30, '23mmci44', '23mmci89', 'MCA', '2025-03-23 10:57:57.925274', 'GS'),
(31, '23mmci44', '22mmci55', 'MTech', '2025-03-23 10:58:24.745263', 'HS'),
(32, '22mmci66', '22mmci33', 'MTech', '2025-03-23 11:12:27.348638', 'GS'),
(33, '22mmci66', '22mmci89', 'MTech', '2025-03-23 11:12:48.703227', 'CR'),
(34, '23mmci71', '23mmci77', 'MCA', '2025-03-23 11:14:06.020073', 'HS'),
(35, '23mmci71', '21mmci44', 'BTech', '2025-03-23 11:15:07.071765', 'GS'),
(37, '21mmci78', '23mmci77', 'MCA', '2025-03-23 11:19:48.093162', 'HS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `votes2`
--
ALTER TABLE `votes2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `votes2`
--
ALTER TABLE `votes2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
