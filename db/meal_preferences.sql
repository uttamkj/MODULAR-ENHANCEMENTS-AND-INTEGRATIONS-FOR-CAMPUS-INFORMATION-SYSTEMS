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
-- Table structure for table `meal_preferences`
--

CREATE TABLE `meal_preferences` (
  `preference_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meal_type` varchar(20) NOT NULL,
  `scheduled_date` date NOT NULL,
  `preference` enum('Veg','Non-Veg','Both') NOT NULL DEFAULT 'Veg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_preferences`
--

INSERT INTO `meal_preferences` (`preference_id`, `user_id`, `meal_type`, `scheduled_date`, `preference`) VALUES
(6, 1, 'Dinner', '2025-04-27', 'Veg'),
(7, 2, 'Dinner', '2025-04-27', 'Non-Veg'),
(9, 4, 'Dinner', '2025-04-27', 'Non-Veg'),
(11, 1, 'Dinner', '2025-04-28', 'Veg'),
(12, 1, 'Lunch', '2025-04-28', 'Veg'),
(16, 1, 'Dinner', '2025-04-29', 'Non-Veg'),
(18, 1, 'Lunch', '2025-04-29', 'Non-Veg'),
(22, 1, 'Breakfast', '2025-04-30', 'Non-Veg'),
(24, 1, 'Lunch', '2025-04-30', 'Veg'),
(26, 1, 'Dinner', '2025-04-30', 'Non-Veg'),
(29, 1, 'Breakfast', '2025-05-02', 'Non-Veg'),
(30, 1, 'Lunch', '2025-05-02', 'Non-Veg'),
(31, 1, 'Dinner', '2025-05-02', 'Non-Veg'),
(36, 1, 'Dinner', '2025-05-03', 'Non-Veg'),
(38, 1, 'Dinner', '2025-05-04', 'Non-Veg'),
(39, 1, 'Lunch', '2025-05-03', 'Non-Veg'),
(43, 1, 'Dinner', '2025-05-01', 'Veg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_preferences`
--
ALTER TABLE `meal_preferences`
  ADD PRIMARY KEY (`preference_id`),
  ADD UNIQUE KEY `unique_user_meal` (`user_id`,`meal_type`,`scheduled_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_preferences`
--
ALTER TABLE `meal_preferences`
  MODIFY `preference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_preferences`
--
ALTER TABLE `meal_preferences`
  ADD CONSTRAINT `meal_preferences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `food_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
