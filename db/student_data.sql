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
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sic` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `cgpa` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `name`, `sic`, `course`, `cgpa`) VALUES
(46, 'Aarav Sharma', '23mmci56', 'MCA', 8.95),
(47, 'Bhavya Patel', '21mmci22', 'BTech', 7.85),
(48, 'Chetan Kumar', '22mmci33', 'MTech', 9.00),
(49, 'Divya Singh', '24mmci88', 'MSc', 8.60),
(50, 'Esha Gupta', '23mmci77', 'MCA', 9.30),
(51, 'Farhan Khan', '21mmci44', 'BTech', 8.10),
(52, 'Gauri Desai', '22mmci55', 'MTech', 8.75),
(53, 'Harsh Joshi', '24mmci66', 'MSc', 7.95),
(54, 'Ishita Reddy', '23mmci88', 'MCA', 9.05),
(55, 'Jatin Mehta', '21mmci99', 'BTech', 8.50),
(56, 'Kavya Iyer', '23mmci12', 'MCA', 8.80),
(57, 'Lakshmi Nair', '21mmci34', 'BTech', 8.20),
(58, 'Manish Choudhary', '22mmci49', 'MTech', 8.90),
(59, 'Nandini Rao', '24mmci56', 'MSc', 8.40),
(60, 'Omkar Deshpande', '23mmci67', 'MCA', 9.10),
(61, 'Priya Menon', '21mmci78', 'BTech', 8.60),
(62, 'Rahul Verma', '22mmci89', 'MTech', 8.70),
(63, 'Sneha Bhatia', '24mmci90', 'MSc', 8.30),
(64, 'Karan Kapoor', '23mmci01', 'MCA', 9.00),
(65, 'Uday Singhania', '21mmci23', 'BTech', 7.50),
(66, 'Varun Malhotra', '22mmci45', 'BTech', 8.80),
(67, 'Yash Trivedi', '24mmci67', 'MSc', 8.60),
(68, 'Aman Pandey', '23mmci89', 'MCA', 9.20),
(69, 'Aditya Joshi', '21mmci11', 'BTech', 8.40),
(70, 'Bhumi Agarwal', '22mmci22', 'MTech', 8.90),
(71, 'Chirag Shah', '24mmci33', 'MSc', 7.70),
(72, 'Deepika Reddy', '23mmci44', 'MCA', 9.10),
(73, 'Eshaan Kapoor', '21mmci55', 'BTech', 8.30),
(74, 'Falguni Patel', '22mmci66', 'MTech', 8.80),
(75, 'Gaurav Singh', '24mmci77', 'MSc', 8.50),
(76, 'Jatin Sharma', '23mmci71', 'BTech', 8.72);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sic` (`sic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
