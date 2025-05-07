-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3301
-- Generation Time: Feb 04, 2025 at 04:32 PM
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
-- Table structure for table `notice`
--

CREATE TABLE notice(
    id INT AUTO_INCREMENT PRIMARY KEY,
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    author VARCHAR(100) NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    file VARCHAR(255) DEFAULT NULL
);



--
-- Dumping data for table `notice`
--

INSERT INTO notice (posted_date, author, title, category, file) VALUES
('2025-01-25 02:39:39', 'Prayag Prasad Mishra (FAS01015)', 'Back paper registration notice 2024-25', 'Exam', 'back_paper_form.pdf'),
('2025-01-24 09:13:43', 'Ramaprasad Panda (FES07437)', 'Republic Day Celebration Notice', 'Event', 'republic_day.pdf'),
('2025-01-18 01:01:52', 'Prayag Prasad Mishra (FAS01015)', 'Examination registration notice 2024-25', 'Exam', 'exam_registration.pdf'),
('2025-01-17 04:30:50', 'Pragyan Paramita Das (FCS23394)', 'Digital Digest - Science & Tech Journal', 'Academic', 'digital_digest.pdf'),
('2025-01-15 05:47:32', 'Mukti Routray (FCS07440)', 'FORMS TO BE FILLED', 'Administration', 'form.doc'),
('2025-01-15 05:45:09', 'Mukti Routray (FCS07440)', 'Project Notice 2024-25', 'Academic', 'project_notice.pdf'),
('2025-01-06 05:41:38', 'Ramaprasad Panda (FES07437)', 'Fee Payment Notice - 2nd Semester', 'Finance', 'fee_payment_notice.pdf'),
('2024-12-26 08:27:52', 'Surajit Das (FCS22210)', 'WAD Reference Docs', 'Academic', 'wad_module.html'),
('2024-12-23 10:00:47', 'Surajit Das (FCS22210)', 'Surprise Test Link', 'Academic', NULL),
('2024-12-21 02:00:09', 'Prayag Prasad Mishra (FAS01015)', 'Admit card distribution for the end term examinations 2024-25', 'Exam', 'admit_card_distribution.pdf'),
('2024-12-16 11:24:23', 'Ramaprasad Panda (FES07437)', 'Registrar Notice - Class Suspension', 'Administration', 'class_suspension.pdf'),
('2024-12-13 07:21:13', 'Ramaprasad Panda (FES07437)', 'Registrar Notice - Restricted Entry', 'Administration', 'restricted_entry_notice.pdf'),
('2024-12-03 05:13:58', 'Prayag Prasad Mishra (FAS01015)', '1st & 3rd Semester End-Term Examinations 2024-25', 'Exam', 'sem_exam.pdf');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_silicon`
--
-- ALTER TABLE `student_silicon`
--   ADD PRIMARY KEY (`sl_no`),
--   ADD KEY `course` (`course`,`branch`,`moa`,`district`,`company`);
-- COMMIT;

-- ALTER TABLE `notice` 
--   ADD COLUMN `category` VARCHAR(50) NOT NULL;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
