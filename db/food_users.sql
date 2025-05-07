-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 07:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `23mmci74`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_users`
--

CREATE TABLE `food_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sic_no` varchar(20) NOT NULL,
  `category` enum('Resident','Day Scholar') NOT NULL,
  `caution_deposit` enum('YES','NO') NOT NULL,
  `regd_type` enum('Registration','One-Day') NOT NULL,
  `from_date` date NOT NULL,
  `status` enum('Completed','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_users`
--

INSERT INTO `food_users` (`user_id`, `name`, `sic_no`, `category`, `caution_deposit`, `regd_type`, `from_date`, `status`) VALUES
(1, 'Aarav Sharma', '23mmci56', 'Resident', 'YES', 'Registration', '2025-04-01', 'Completed'),
(2, 'Bhavya Patel', '21mmci22', 'Day Scholar', 'NO', 'One-Day', '2025-04-02', 'Pending'),
(3, 'Chetan Kumar', '22mmci33', 'Resident', 'YES', 'Registration', '2025-04-03', 'Completed'),
(4, 'Divya Singh', '24mmci88', 'Resident', 'YES', 'Registration', '2025-04-04', 'Completed'),
(5, 'Esha Gupta', '23mmci77', 'Day Scholar', 'NO', 'One-Day', '2025-04-05', 'Pending'),
(6, 'Farhan Khan', '21mmci44', 'Resident', 'YES', 'Registration', '2025-04-06', 'Completed'),
(7, 'Gauri Desai', '22mmci55', 'Day Scholar', 'NO', 'One-Day', '2025-04-07', 'Pending'),
(8, 'Harsh Joshi', '24mmci66', 'Resident', 'YES', 'Registration', '2025-04-08', 'Completed'),
(9, 'Ishita Reddy', '23mmci88', 'Day Scholar', 'NO', 'One-Day', '2025-04-09', 'Pending'),
(10, 'Jatin Mehta', '21mmci99', 'Resident', 'YES', 'Registration', '2025-04-10', 'Completed'),
(11, 'Kavya Iyer', '23mmci12', 'Day Scholar', 'NO', 'One-Day', '2025-04-11', 'Pending'),
(12, 'Lakshmi Nair', '21mmci34', 'Resident', 'YES', 'Registration', '2025-04-12', 'Completed'),
(13, 'Manish Choudhary', '22mmci49', 'Day Scholar', 'NO', 'One-Day', '2025-04-13', 'Pending'),
(14, 'Nandini Rao', '24mmci56', 'Resident', 'YES', 'Registration', '2025-04-14', 'Completed'),
(15, 'Omkar Deshpande', '23mmci67', 'Day Scholar', 'NO', 'One-Day', '2025-04-15', 'Pending'),
(16, 'Priya Menon', '21mmci78', 'Resident', 'YES', 'Registration', '2025-04-16', 'Completed'),
(17, 'Rahul Verma', '22mmci89', 'Day Scholar', 'NO', 'One-Day', '2025-04-17', 'Pending'),
(18, 'Sneha Bhatia', '24mmci90', 'Resident', 'YES', 'Registration', '2025-04-18', 'Completed'),
(19, 'Karan Kapoor', '23mmci01', 'Day Scholar', 'NO', 'One-Day', '2025-04-19', 'Pending'),
(20, 'Uday Singhania', '21mmci23', 'Resident', 'YES', 'Registration', '2025-04-20', 'Completed'),
(21, 'Varun Malhotra', '22mmci45', 'Day Scholar', 'NO', 'One-Day', '2025-04-21', 'Pending'),
(22, 'Yash Trivedi', '24mmci67', 'Resident', 'YES', 'Registration', '2025-04-22', 'Completed'),
(23, 'Aman Pandey', '23mmci89', 'Day Scholar', 'NO', 'One-Day', '2025-04-23', 'Pending'),
(24, 'Aditya Joshi', '21mmci11', 'Resident', 'YES', 'Registration', '2025-04-24', 'Completed'),
(25, 'Bhumi Agarwal', '22mmci22', 'Day Scholar', 'NO', 'One-Day', '2025-04-25', 'Pending'),
(26, 'Chirag Shah', '24mmci33', 'Resident', 'YES', 'Registration', '2025-04-26', 'Completed'),
(27, 'Deepika Reddy', '23mmci44', 'Day Scholar', 'NO', 'One-Day', '2025-04-27', 'Pending'),
(28, 'Eshaan Kapoor', '21mmci55', 'Resident', 'YES', 'Registration', '2025-04-28', 'Completed'),
(29, 'Falguni Patel', '22mmci66', 'Day Scholar', 'NO', 'One-Day', '2025-04-29', 'Pending'),
(30, 'Gaurav Singh', '24mmci77', 'Resident', 'YES', 'Registration', '2025-04-30', 'Completed'),
(31, 'Jatin Sharma', '23mmci71', 'Day Scholar', 'NO', 'One-Day', '2025-05-01', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_users`
--
ALTER TABLE `food_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `sic_no` (`sic_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_users`
--
ALTER TABLE `food_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
