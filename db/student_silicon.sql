-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3301
-- Generation Time: Mar 26, 2025 at 08:34 PM
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
-- Table structure for table `student_silicon`
--

CREATE TABLE `student_silicon` (
  `sl_no` int(11) NOT NULL,
  `sic_no` varchar(10) DEFAULT NULL,
  `university_regd_no` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `course` varchar(10) DEFAULT NULL,
  `original_branch` varchar(5) DEFAULT NULL,
  `branch_change` char(1) DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `lateral` char(1) DEFAULT NULL,
  `roll_no` varchar(15) DEFAULT NULL,
  `caste` varchar(10) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `moa` varchar(10) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_admission` date DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `fs_or_discontinued` char(1) DEFAULT NULL,
  `cgpa` decimal(4,2) DEFAULT NULL,
  `year_of_passing` varchar(10) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_silicon`
--

INSERT INTO `student_silicon` (`sl_no`, `sic_no`, `university_regd_no`, `name`, `course`, `original_branch`, `branch_change`, `branch`, `gender`, `lateral`, `roll_no`, `caste`, `religion`, `nationality`, `category`, `moa`, `rank`, `date_of_birth`, `date_of_admission`, `district`, `state`, `fs_or_discontinued`, `cgpa`, `year_of_passing`, `company`) VALUES
(1, 'CS124490', '1201209078', 'APURVA AGRAWAL', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '107140018', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 730, '1993-10-21', '2012-08-09', 'SAMBALPUR', 'ODISHA', 'C', 9.18, '2015-2016', 'Wipro'),
(2, 'CS124172', '1201209094', 'SOUMYA RANJAN DIXIT', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101037444', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 3495, '1994-05-28', '2012-08-07', 'BHADRAK', 'ODISHA', 'C', 7.19, '2015-2016', NULL),
(3, 'AI124298', '1201209001', 'SUBHALINA PANDA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101060032', 'Open', 'Hindu', 'Indian', 'MI', 'JEE', 211, '1993-02-09', '2012-08-07', 'KORAPUT', 'ODISHA', 'C', 8.75, '2015-2016', 'Wipro'),
(4, 'AI124170', '1201209003', 'SUBHENDU BIKASH MISHRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '107069246', 'Open', 'Hindu', 'Indian', 'GE', 'AIEEE', 75844, '1994-03-30', '2012-08-07', 'MAYURBHANJ', 'ODISHA', 'C', 7.55, '2015-2016', 'Wipro'),
(5, 'AI124567', '1201209005', 'RAJU MAHAPATRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '107068492', 'Open', 'Hindu', 'Indian', 'TFW', 'JEE', 6677, '1994-05-19', '2012-08-25', 'BARGARH', 'ODISHA', 'C', 7.88, '2015-2016', 'TCS'),
(6, 'AI124087', '1201209006', 'LALIT KUMAR MAHARANA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101052300', 'Open', 'Hindu', 'Indian', 'TFW', 'JEE', 3756, '1994-07-31', '2012-08-06', 'GANJAM', 'ODISHA', 'C', 8.19, '2015-2016', 'Wipro'),
(7, 'AI124480', '1201209007', 'SANEYEEKA KAR', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105093551', 'Open', 'Hindu', 'Indian', 'GE', 'AIEEE', 85136, '1994-06-30', '2012-08-09', 'CUTTACK', 'ODISHA', 'C', 8.51, '2015-2016', 'Tech Mahindra'),
(8, 'AI124310', '1201209008', 'MANISH KUMAR PANDEY', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '201228542', 'Open', 'Hindu', 'Indian', 'OSGE', 'JEE', 510, '1993-09-04', '2012-08-08', 'BOKARO', 'JHARKHAND', 'C', 8.03, '2015-2016', NULL),
(9, 'AI124477', '1201209009', 'SUSREE SUKANYA SATAPATHY', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101131192', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 481, '1994-02-13', '2012-08-09', 'Rayagada', 'ODISHA', 'C', 8.98, '2015-2016', 'Wipro'),
(10, 'AI124484', '1201209010', 'AKASH SAUMYA PRUSTI', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101047300', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8096, '1993-11-27', '2012-08-08', 'BALASORE', 'ODISHA', 'C', 8.63, '2015-2016', 'Infosys'),
(11, 'AI124169', '1201209011', 'ASUTOSH BEHERA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '105090203', 'Open', 'Hindu', 'Indian', 'GC', 'JEE', 943, '1995-12-01', '2012-08-07', 'CUTTACK', 'ODISHA', 'C', 8.16, '2015-2016', 'Wipro'),
(14, 'AI124299', '1201209014', 'LALIT KUMAR SINGH', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101134091', 'OBC', 'Hindu', 'Indian', 'GE', 'JEE', 8694, '1992-10-13', '2012-08-06', 'GAYA', 'BIHAR', 'C', 7.76, '2015-2016', NULL),
(15, 'AI124478', '1201209015', 'KUMARI RICHA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101134076', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 9001, '1994-09-09', '2012-08-09', 'SUNDARGARH', 'ODISHA', 'C', 8.68, '2015-2016', 'Wipro'),
(16, 'AI124483', '1201209016', 'RAHUL RANJAN', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '201223502', 'OBC', 'Hindu', 'Indian', 'OSGE', 'JEE', 342, '1994-12-20', '2012-08-06', 'GAYA', 'BIHAR', 'C', 8.52, '2015-2016', 'Wipro'),
(17, 'AI124163', '1201209017', 'SAMBIT MOHAPATRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101028312', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8902, '1994-11-24', '2012-08-07', 'BALASORE', 'ODISHA', 'C', 8.32, '2015-2016', 'Wipro'),
(18, 'AI124093', '1201209018', 'AKASH PATNAIK', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '105041146', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8168, '1994-01-04', '2012-08-06', 'KHORDHA', 'ODISHA', 'C', 8.62, '2015-2016', 'Tech Mahindra'),
(19, 'AI124168', '1201209019', 'SOUMYA PRIYA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105059411', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 1682, '1994-01-08', '2012-08-07', 'Khurda', 'ODISHA', 'C', 8.80, '2015-2016', 'Wipro'),
(20, 'AI124479', '1201209020', 'BANISHREE PRIYADARSHINI', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105041466', 'SC', 'Hindu', 'Indian', 'SC', 'JEE', 1498, '1995-02-10', '2012-08-09', 'NAYAGARH', 'ODISHA', 'C', 8.30, '2015-2016', 'Wipro'),
(21, 'AI124473', '1201209021', 'CHANDAN KUMAR BHADANI', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '22400805', 'OBC', 'Hindu', 'Indian', 'Others', 'AIEEE', 89827, '1992-02-20', '2012-08-08', 'GIRIDIH', 'JHARKHAND', 'C', 6.59, '2015-2016', NULL),
(22, 'AI124303', '1201209022', 'SWETA RATH', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105094293', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 527, '1994-05-09', '2012-08-09', 'CUTTACK', 'ODISHA', 'C', 8.31, '2015-2016', NULL),
(23, 'AI124534', '1201209023', 'AAYUSH KUMAR SINGH', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '201226022', 'Open', 'Hindu', 'Indian', 'OSGE', 'JEE', 553, '1993-12-06', '2012-08-09', 'RAMGARH', 'JHARKHAND', 'C', 7.75, '2015-2016', 'Wipro'),
(24, 'AI124476', '1201209024', 'RITUPARNA TRIPATHY', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101054198', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 786, '1995-01-07', '2012-08-09', 'BALASORE', 'ODISHA', 'C', 8.42, '2015-2016', 'Wipro'),
(25, 'AI124164', '1201209025', 'SARTHAK DAS', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101056201', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 5251, '1994-08-16', '2012-08-07', 'KHURDA', 'ODISHA', 'C', 8.30, '2015-2016', 'Wipro'),
(26, 'AI124475', '1201209026', 'LIPSA GARNAIK', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101052331', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 1186, '1994-10-05', '2012-08-07', 'KHURDA', 'ODISHA', 'C', 7.02, '2015-2016', 'Infosys'),
(27, 'AI124481', '1201209027', 'MADHUSMITA BISWAL', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '110087432', 'OBC', 'Hindu', 'Indian', 'GEWO', 'JEE', 1530, '1994-04-22', '2012-08-09', 'CUTTACK', 'ODISHA', 'C', 8.95, '2015-2016', 'Wipro'),
(28, 'AI124305', '1201209028', 'SAMBEET KUMAR NAYAK', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '110132179', 'OBC', 'Hindu', 'Indian', 'GC', 'JEE', 1287, '1994-03-10', '2012-08-08', 'RAYAGADA', 'ODISHA', 'C', 7.65, '2015-2016', 'Wipro'),
(29, 'AI124472', '1201209029', 'AKASH KUMAR', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '21027076', 'OBC', 'Hindu', 'Indian', 'GE', 'AIEEE', 72310, '1994-05-06', '2012-08-09', 'PATNA', 'BIHAR', 'C', 7.89, '2015-2016', NULL),
(30, 'AI124304', '1201209030', 'ANANYA ANURADHA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '110040128', 'OBC', 'Hindu', 'Indian', 'GEWO', 'JEE', 1573, '1994-10-22', '2012-08-08', 'JAJPUR', 'ODISHA', 'C', 8.97, '2015-2016', 'Infosys'),
(31, 'AI124167', '1201209031', 'ALFRIDA DUNGDUNG', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105041157', 'ST', 'Christian', 'Indian', 'ST', 'JEE', 1646, '1994-02-01', '2012-08-07', 'SUNDARGARH', 'ODISHA', 'C', 7.69, '2015-2016', NULL),
(32, 'AI124301', '1201209032', 'VIVEK BANJEET', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101136401', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 6563, '1993-11-24', '2012-08-08', 'JAJPUR', 'ODISHA', 'C', 6.95, '2015-2016', 'Wipro'),
(33, 'AI124094', '1201209033', 'IPSITA JENA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105093119', 'Open', 'Hindu', 'Indian', 'GCWO', 'JEE', 231, '1994-04-17', '2012-08-06', 'CUTTACK', 'ODISHA', 'C', 8.51, '2015-2016', 'Wipro'),
(34, 'AI124096', '1201209034', 'SHREECHANDAN MALLICK', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '110046035', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 9077, '1994-03-09', '2012-08-06', 'Kedrapara', 'ODISHA', 'C', 8.33, '2015-2016', 'Wipro'),
(35, 'AI124089', '1201209035', 'SURAJ KUMAR SUBUDHI', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101060359', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8530, '1994-07-05', '2012-08-06', 'KHURDHA', 'ODISHA', 'C', 8.23, '2015-2016', 'Wipro'),
(36, 'AI124171', '1201209036', 'ABHISHEK PATEL', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '107136436', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 9118, '1993-05-26', '2012-08-05', 'SUNDARGARH', 'ODISHA', 'C', 6.90, '2015-2016', NULL),
(37, 'AI124487', '1201209037', 'ARPITA SAMANTARAY', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105041351', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 1469, '1994-09-19', '2012-04-08', 'khurda', 'ODISHA', 'C', 8.41, '2015-2016', 'Infosys'),
(38, 'AI124542', '1201209038', 'ANISH KUMAR GUPTA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '22500524', 'Open', 'Hindu', 'Indian', 'GE', 'AIEEE', 66428, '1991-09-22', '2012-09-08', 'GIRIDIH', 'JHARKHAND', 'C', 6.97, '2015-2016', 'TCS'),
(39, 'AI124308', '1201209039', 'VIVEK KUMAR YADAV', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '201212071', 'Open', 'Hindu', 'Indian', 'GE', 'AIEEE', 81707, '1992-08-09', '2012-08-08', 'SERAIKELLA KHARSAWAN', 'JHARKHAND', 'C', 8.34, '2015-2016', 'Wipro'),
(40, 'AI124300', '1201209040', 'Rahul Kumar Chaudhary', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101134432', 'SC', 'Hindu', 'Indian', 'SC', 'JEE', 1258, '1995-02-02', '2012-08-08', 'Darbhanga', 'Bihar', 'D', NULL, NULL, NULL),
(41, 'AI124297', '1201209041', 'Sarthak Dash Bhattamishra', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101056204', 'Open', 'Hindu', 'Indian', 'GE', 'AIEEE', 80865, '1994-10-20', '2012-08-08', 'KHURDA', 'ODISHA', 'D', NULL, NULL, NULL),
(42, 'AI124097', '1201209042', 'RITUMBHARA THAKUR', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '201209571', 'Open', 'Hindu', 'Indian', 'OSGE', 'JEE', 370, '1992-12-03', '2012-06-08', 'SERAIKELA-KHARSAWAN', 'JHARKHAND', 'C', 8.10, '2015-2016', 'Wipro'),
(43, 'AI124307', '1201209043', 'CHANDANA RAY', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '112061271', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8980, '1995-01-10', '2012-09-08', 'KHURDA', 'ODISHA', 'C', 8.78, '2015-2016', 'Sankalp'),
(44, 'AI124474', '1201209044', 'NANDAN KUMAR JAGADISH MOHAPATRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101037272', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8595, '1994-08-10', '2012-09-08', 'KEONJHAR', 'ODISHA', 'C', 8.09, '2015-2016', NULL),
(45, 'AI124092', '1201209045', 'SATYA SWAROOP PATRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '105026298', 'OBC', 'Hindu', 'Indian', 'GE', 'JEE', 8180, '1993-08-28', '2012-06-08', 'GANJAM', 'ODISHA', 'C', 7.72, '2015-2016', NULL),
(46, 'AI124306', '1201209046', 'ANIRBAN PATRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '111035453', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 6983, '1994-07-22', '2012-08-08', 'GANJAM', 'ODISHA', 'C', 8.08, '2015-2016', 'Wipro'),
(47, 'AI124095', '1201209047', 'SATAKCHI KUMARI SINGH', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '107013130', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 9259, '1994-03-28', '2012-06-08', 'Balasore', 'ODISHA', 'C', 7.68, '2015-2016', NULL),
(48, 'AI124302', '1201209048', 'POOJA MUANKHIA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105058302', 'SC', 'Hindu', 'Indian', 'SCWO', 'JEE', 328, '1995-08-21', '2012-08-08', 'KHORDA', 'ODISHA', 'C', 6.71, '2015-2016', NULL),
(49, 'AI124309', '1201209049', 'MANISH KUMAR', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '201228528', 'OBC', 'Hindu', 'Indian', 'GE', 'AIEEE', 92013, '1994-09-18', '2012-08-08', 'NALANDA', 'BIHAR', 'C', 8.25, '2015-2016', 'TCS'),
(50, 'AI124091', '1201209050', 'SOUMYA MISHRA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '105019422', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 900, '1994-03-03', '2012-06-08', 'Mayurbhanj', 'ODISHA', 'C', 8.68, '2015-2016', 'Wipro'),
(51, 'AI124166', '1201209051', 'PRASAD NAYAK', 'B.Tech', 'AEI', 'N', 'AEI', 'Male', 'N', '101217226', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8708, '1994-04-08', '2012-07-08', 'GANJAM', 'ODISHA', 'C', 8.03, '2015-2016', 'TCS'),
(52, 'AI124088', '1201209052', 'RAJASHREE BEHERA', 'B.Tech', 'AEI', 'N', 'AEI', 'Female', 'N', '101053572', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 9095, '1994-07-11', '2012-06-08', 'CUTTACK', 'ODISHA', 'C', 8.48, '2015-2016', 'Wipro'),
(53, 'CS124189', '1201209053', 'PRIYANKA RAY', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '105217558', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 1016, '1994-08-01', '2012-07-08', 'KENDRAPARA', 'ODISHA', 'C', 8.31, '2015-2016', 'Wipro'),
(54, 'CS124178', '1201209054', 'TAPAN KUMAR SAHU', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101062065', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 5765, '1995-01-05', '2012-07-08', 'KHURDA', 'ODISHA', 'C', 8.01, '2015-2016', 'Wipro'),
(55, 'CS124320', '1201209055', 'S SUMAN RATH', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101054271', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 7984, '1995-03-05', '2012-08-08', 'KHURDA', 'ODISHA', 'C', 8.01, '2015-2016', 'Tech Mahindra'),
(56, 'CS124187', '1201209056', 'BIPASSA PANIGRAHI', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '105041573', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 7176, '1994-11-05', '2012-07-08', 'KHURDA', 'ODISHA', 'C', 6.64, '2015-2016', NULL),
(57, 'CS124347', '1201209057', 'INDIRA APARAJITA MISHRA', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '301217126', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 4206, '1994-02-26', '2012-08-08', 'KURUKSHETRA', 'HARYANA', 'C', 7.90, '2015-2016', 'Wipro'),
(58, 'CS124190', '1201209058', 'ALSA MOHANTY', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '107062322', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 7869, '1993-07-21', '2012-06-08', 'KHURDA', 'ODISHA', 'C', 7.76, '2015-2016', 'Persistent'),
(59, 'CS124323', '1201209059', 'SMITA PRADHAN', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '101057128', 'Open', 'Hindu', 'Indian', 'MIWO', 'JEE', 92, '1993-08-14', '2012-08-08', 'KHURDA', 'ODISHA', 'C', 7.94, '2015-2016', 'capgemini'),
(60, 'CS124325', '1201209060', 'SWASTIN SAHOO', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101062002', 'OBC', 'Hindu', 'Indian', 'GE', 'JEE', 6894, '1995-05-19', '2012-08-14', 'CUTTACK', 'ODISHA', 'C', 7.13, '2015-2016', NULL),
(61, 'CS124339', '1201209061', 'MEGHNA SONY', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '105093242', 'OBC', 'Hindu', 'Indian', 'GCWO', 'JEE', 193, '1993-09-25', '2012-08-08', 'CUTTACK', 'ODISHA', 'C', 8.31, '2015-2016', 'Infosys'),
(62, 'CS124183', '1201209062', 'DIVYALOCHAN SAHU', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101218036', 'Open', 'Hindu', 'Indian', 'GC', 'JEE', 470, '1993-07-25', '2012-07-08', 'NAWARANGPUR', 'ODISHA', 'C', 8.64, '2015-2016', 'Wipro'),
(63, 'CS124175', '1201209063', 'SMRUTI RANJAN PATRA', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101057140', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 5148, '1994-04-24', '2012-08-17', 'KHURDA', 'ODISHA', 'C', 8.32, '2015-2016', 'Wipro'),
(64, 'CS124344', '1201209064', 'NILESH RANJAN SAHOO', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '201217193', 'OBC', 'Hindu', 'Indian', 'OSGE', 'AIEEE', 57675, '1994-09-01', '2012-08-08', 'PURI', 'ODISHA', 'C', 6.92, '2015-2016', 'Wipro'),
(65, 'CS124493', '1201209065', 'MANISHA PARIDA', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '101091208', 'Open', 'Hindu', 'Indian', 'GEWO', 'JEE', 596, '1995-04-16', '2012-09-08', 'CUTTACK', 'ODISHA', 'C', 8.60, '2015-2016', 'Wipro'),
(66, 'CS124184', '1201209066', 'SNEHA KUMARI', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '101225237', 'Open', 'Hindu', 'Indian', 'GE', 'JEE', 8127, '1994-01-14', '2012-07-08', 'SAMBALPUR', 'ODISHA', 'C', 7.93, '2015-2016', 'Infosys'),
(67, 'CS124334', '1201209067', 'SUDHIR SINDUR', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101136234', 'ST', 'Christian', 'Indian', 'ST', 'JEE', 2153, '1991-07-01', '2012-08-08', 'SUNDARGARH', 'ODISHA', 'C', 7.54, '2015-2016', NULL),
(68, 'CS124197', '1201209068', 'CHAKRAVORTY DEVOPRIYA DEVASHISH', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '201215183', 'Open', 'Hindu', 'Indian', 'OSGE', 'JEE', 306, '1995-02-26', '2012-07-08', 'MUZAFFARPUR', 'BIHAR', 'C', 7.57, '2015-2016', 'Tech Mahindra'),
(69, 'CS124494', '1201209069', 'MD HAARIS', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '101134167', 'Open', 'Muslim', 'Indian', 'GE', 'JEE', 6148, '1992-03-18', '2012-09-08', 'SUNDARGARH', 'ODISHA', 'C', 8.51, '2015-2016', 'Infosys'),
(70, 'CS124195', '1201209070', 'NISHANT KUMAR', 'B.Tech', 'CSE', 'N', 'CSE', 'Male', 'N', '201208424', 'OBC', 'Hindu', 'Indian', 'OSGE', 'JEE', 117, '1993-07-17', '2012-07-08', 'SINGHBHUM WEST', 'JHARKHAND', 'F', NULL, NULL, NULL),
(71, 'CS124496', '1201209071', 'Mary Shiny Ekka', 'B.Tech', 'CSE', 'N', 'CSE', 'Female', 'N', '105093238', 'ST', 'Christian', 'Indian', 'STWO', 'JEE', 287, '1992-08-08', '2012-09-08', 'CUTTACK', 'ODISHA', 'D', NULL, NULL, NULL),
(76, '23mmci80', '1201204444', 'Uttam KJ', 'MCA', 'MCA', 'N', 'MCA', 'Male', 'N', '80188866', 'GEN', 'Hindu', 'Indian', 'GE', 'OJEE', 161, '2015-03-10', '2023-03-09', 'BALASORE', 'ODISHA', 'N', 8.54, '2024-2025', 'Techno'),
(77, '23mmci74', '80188867', 'Akankshya Das', 'MCA', 'MCA', 'N', 'MCA', 'Female', 'N', '80188867', 'open', 'Hindu', 'Indian', 'GEN', 'OJEE', 250, '2015-03-10', '2023-03-09', 'KHORDHA', 'ODISHA', 'N', 8.45, '2024-2025', 'LTIMindtree');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_silicon`
--
ALTER TABLE `student_silicon`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `course` (`course`,`branch`,`moa`,`district`,`company`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
