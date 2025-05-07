-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3301
-- Generation Time: Apr 02, 2025 at 10:56 AM
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
-- Database: `23mmci80`
--

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `scholarship_year` varchar(10) DEFAULT NULL,
  `application_number` varchar(30) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `sic_no` varchar(20) DEFAULT NULL,
  `regd_no` varchar(20) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `year_of_study` varchar(10) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `scholarship_type` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `caste` varchar(20) DEFAULT NULL,
  `application_type` varchar(30) DEFAULT NULL,
  `date_of_application` date DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `scholarship_name` varchar(100) DEFAULT NULL,
  `sanctioned_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `scholarship_year`, `application_number`, `student_name`, `sic_no`, `regd_no`, `course`, `branch`, `year_of_study`, `department`, `scholarship_type`, `gender`, `state`, `caste`, `application_type`, `date_of_application`, `payment_status`, `scholarship_name`, `sanctioned_amount`) VALUES
(1, '2022-2023', 'HE592301272743509', 'A.Nutan Patro', '22BCTD84', '2201209397', 'B.Tech', 'CST', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'New', '2023-01-27', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(2, '2020-2021', 'HE59210423531634', 'Aaleesa Pattnaik', '20BECC22', '2001209378', 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'New', '2021-04-23', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(3, '2023-2024', 'HE592312263663661', 'Abhaya Kumar Das', '23MMCI79', '2305209002', 'MCA', 'MCA', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2023-12-26', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(4, '2024-2025', 'HE592409036010965', 'Abhaya Kumar Das', '23MMCI79', '2305209002', 'MCA', 'MCA', '2nd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(5, '2024-2025', 'HE592410216087208', 'Abhigyan Dash', '24BECE88', NULL, 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2024-10-21', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(6, '2023-2024', 'STSC92402213590421', 'ABHIGYAN PRUSTY', '22BCSD30', '2201209001', 'B.Tech', 'CSE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2024-02-21', 'Payment Success', 'Post Matric Scholarship', NULL),
(7, '2024-2025', 'STSC92412127039972', 'ABHIGYAN PRUSTY', '22BCSD30', '2201209001', 'B.Tech', 'CSE', '3rd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2024-12-12', 'Sanctioned by Approve Authority', 'Post Matric Scholarship', NULL),
(8, '2020-2021', 'STSC9210111932721', 'Abhijeet Sahoo', '20BECA42', '2001209344', 'B.Tech', 'ECE', '1st Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2021-01-11', 'Sanctioned by District Authority', 'Post Matric Scholarship', NULL),
(9, '2021-2022', 'STSC9210921620011', 'Abhijeet Sahoo', '20BECA42', '2001209344', 'B.Tech', 'ECE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2021-09-21', 'Sanctioned by District Authority', 'Post Matric Scholarship', NULL),
(10, '2022-2023', 'STSC92211141806497', 'Abhijeet Sahoo', '20BECA42', '2001209344', 'B.Tech', 'ECE', '3rd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2022-11-14', 'Payment Success', 'Post Matric Scholarship', NULL),
(11, '2023-2024', 'HE592312253664847', 'Abhijeet Sahoo', '23BECB64', NULL, 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2023-12-25', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(12, '2023-2024', 'STSC92309213081120', 'Abhijeet Sahoo', '20BECA42', '2001209344', 'B.Tech', 'ECE', '4th Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2023-09-21', 'Payment Success', 'Post Matric Scholarship', NULL),
(13, '2024-2025', 'HE592409036010810', 'Abhijeet Sahoo', '23BECB64', NULL, 'B.Tech', 'ECE', '2nd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(14, '2023-2024', 'HE592402234599903', 'Abhijeet Samal', '22BECI69', '2201209555', 'B.Tech', 'ECE', '2nd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2024-02-23', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(15, '2024-2025', 'HE592409036015182', 'Abhijeet Samal', '22BECI69', '2201209555', 'B.Tech', 'ECE', '3rd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(16, '2023-2024', 'HE592312203616801', 'Abhijit Mahakul', '21BCSA94', '2101209065', 'B.Tech', 'CSE', '3rd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2023-12-20', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(17, '2024-2025', 'HE592409036009803', 'Abhijit Mahakul', '21BCSA94', '2101209065', 'B.Tech', 'CSE', '4th Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(18, '2023-2024', 'HE592312083522818', 'Abhijit Padhi', '23BCSB17', '2301209153', 'B.Tech', 'CSE-TFW', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2023-12-08', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(19, '2024-2025', 'HE592409036008202', 'Abhijit Padhi', '23BCSB17', '2301209153', 'B.Tech', 'CSE-TFW', '2nd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(20, '2021-2022', 'HE592202031437570', 'Abhijit Raj', '21BECF13', '2101209400', 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2022-02-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(21, '2021-2022', 'HE592201161379678', 'ABHIJIT SWAIN', '21BEEB16', '2101209309', 'B.Tech', 'EEE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2022-01-16', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(22, '2021-2022', 'HE592202031437492', 'Abhilash Jena', '21BEEB58', '2101209388', 'B.Tech', 'EEE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2022-02-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(23, '2023-2024', 'STSC92402113460215', 'Abhilash Kumar Patra', '22BECF52', '2201209556', 'B.Tech', 'ECE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2024-02-11', 'Sanctioned by Approve Authority', 'Post Matric Scholarship', NULL),
(24, '2024-2025', 'STSC92411176579675', 'Abhilash Kumar Patra', '22BECF52', '2201209556', 'B.Tech', 'ECE', '3rd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2024-11-17', 'Sanctioned by Approve Authority', 'Post Matric Scholarship', NULL),
(25, '2023-2024', 'HE592312283681020', 'ABHILIPSA SENAPATI', '23BECE87', '2301209545', 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'New', '2023-12-28', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(26, '2024-2025', 'HE592409036011793', 'ABHILIPSA SENAPATI', '23BECE87', '2301209545', 'B.Tech', 'ECE', '2nd Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'Renew in Same Course', '2024-09-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(27, '2020-2021', 'HE59210525555718', 'ABHINAB PARIDA', '20BCTE34', '2001209230', 'B.Tech', 'CST', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2021-05-25', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(28, '2022-2023', 'HE592301302737844', 'Abhipsa Pattanaik', '22BCEC09', '2201209478', 'B.Tech', 'CEN', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'New', '2023-01-30', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(29, '2020-2021', 'HE59210508540229', 'Abhipsha Tripathy', '20BCSC15', '2001209065', 'B.Tech', 'CSE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Female', 'Odisha', 'General', 'New', '2021-05-08', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(30, '2021-2022', 'HE592202031433638', 'ABHISEK JENA', '21BECF59', '2101209403', 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2022-02-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(31, '2023-2024', 'STSC92402244631181', 'Abhisek Kumar Subudhi', '22MMCB14', '2205209002', 'MCA', 'MCA', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2024-02-24', 'Payment Success', 'Post Matric Scholarship', NULL),
(32, '2024-2025', 'HE592411136518224', 'Abhisek Pahadsingh', '22BEEG07', '2201209234', 'B.Tech', 'EEE', '3rd Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2024-11-13', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(33, '2021-2022', 'HE592202251391517', 'Abhisek Samantray', '21BCTD34', '2101209248', 'B.Tech', 'CST', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2022-02-25', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(34, '2022-2023', 'HE592212282625530', 'Abhisek Satapathy', '22BCSC46', '2201209006', 'B.Tech', 'CSE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2022-12-28', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(35, '2021-2022', 'HE592201081362852', 'Abhisekh Panda', '21BECC24', '2101209404', 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2022-01-08', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(36, '2023-2024', 'STSC92403123309814', 'Abhishek Baral', '23BCSA94', '2301209155', 'B.Tech', 'CSE', '1st Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'EBC', 'Renew in New Course', '2024-03-12', 'Payment Success', 'Post Matric Scholarship', NULL),
(37, '2024-2025', 'STSC92412126229030', 'Abhishek Baral', '23BCSA94', '2301209155', 'B.Tech', 'CSE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'EBC', 'Renew in Same Course', '2024-12-12', 'Recommended by Institute', 'Post Matric Scholarship', NULL),
(38, '2020-2021', 'HE59210407520839', 'Abhishek Nanda', '20BCTA18', '2001209231', 'B.Tech', 'CST', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2021-04-07', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(39, '2023-2024', 'STSC92404114991123', 'Abhishek Nayak', '22BCSG36', '2201209005', 'B.Tech', 'CSE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2024-04-11', 'Payment Success', 'Post Matric Scholarship', NULL),
(40, '2024-2025', 'STSC92411286808592', 'Abhishek Nayak', '22BCSG36', '2201209005', 'B.Tech', 'CSE', '3rd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in New Course', '2024-11-28', 'Recommended by Institute', 'Post Matric Scholarship', NULL),
(41, '2021-2022', 'HE592201281411913', 'Abhishek Patro', '21BCSF19', '2101209239', 'B.Tech', 'CSE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2022-01-28', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(42, '2024-2025', 'STSC92411166419617', 'ABHISHEK SAHOO', '24BEIG96', NULL, 'B.Tech', 'EIE', '1st Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2024-11-16', 'Recommended by Institute', 'Post Matric Scholarship', NULL),
(43, '2022-2023', 'STSC92211262294406', 'ABHISHEK SAHU', '22MMCB58', '2205209003', 'MCA', 'MCA', '1st Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2022-11-26', 'Payment Success', 'Post Matric Scholarship', NULL),
(44, '2023-2024', 'STSC92311073345098', 'ABHISHEK SAHU', '22MMCB58', '2205209003', 'MCA', 'MCA', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'OBC/SEBC', 'Renew in Same Course', '2023-11-07', 'Payment Success', 'Post Matric Scholarship', NULL),
(45, '2020-2021', 'HE59210403518336', 'Abhyudoy Senapati', '20BEEC14', '2001209337', 'B.Tech', 'EEE-TFW', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'OBC/SEBC', 'New', '2021-04-03', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(46, '2023-2024', 'STSC92402284672255', 'Abinash Pattanaik', '23MDSA02', NULL, 'M.Sc', 'DS', '1st Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Male', 'Odisha', 'EBC', 'Renew in New Course', '2024-02-28', 'Payment Success', 'Post Matric Scholarship', NULL),
(47, '2021-2022', 'HE592203261603393', 'Adarsh Nayak', '21BCTD24', '2101209249', 'B.Tech', 'CST', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'SC', 'New', '2022-03-26', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00),
(48, '2024-2025', 'STSC92411306854696', 'Aditi Dash', '22BEEH49', NULL, 'B.Tech', 'EEE', '3rd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Female', 'Odisha', 'EBC', 'New', '2024-11-30', 'Recommended by Institute', 'Post Matric Scholarship', NULL),
(49, '2024-2025', 'STSC92501297361098', 'Aditi Patel', '23BECD59', '2301209549', 'B.Tech', 'ECE', '2nd Year', 'ST&SC and MBC Welfare Department', 'Post Matric Scholarship', 'Female', 'Odisha', 'OBC/SEBC', 'New', '2025-01-29', 'Recommended by Institute', 'Post Matric Scholarship', NULL),
(50, '2024-2025', 'HE592411136499530', 'ADITYA CHAKRABORTY', '24BECE97', NULL, 'B.Tech', 'ECE', '1st Year', 'Higher Education Department', 'Technical and Professional', 'Male', 'Odisha', 'General', 'New', '2024-11-13', 'Payment Success', 'e-Medhabruti - Technical and Professional', 20000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
