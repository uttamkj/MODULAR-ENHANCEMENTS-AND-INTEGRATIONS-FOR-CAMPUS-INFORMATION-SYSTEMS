-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 07:34 AM
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
-- Table structure for table `weekly_menu`
--

CREATE TABLE `weekly_menu` (
  `menu_id` int(11) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `meal_type` varchar(10) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `is_veg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly_menu`
--

INSERT INTO `weekly_menu` (`menu_id`, `day_of_week`, `meal_type`, `menu`, `is_veg`) VALUES
(1, 'Monday', 'Breakfast', 'Idli with Sambar', 1),
(2, 'Monday', 'Lunch', 'Rice with Dal and Mixed Vegetables', 1),
(3, 'Monday', 'Dinner', 'Chapati with Paneer Butter Masala', 1),
(4, 'Tuesday', 'Breakfast', 'Poha with Sev', 1),
(5, 'Tuesday', 'Breakfast', 'Egg Bhurji with Toast', 0),
(6, 'Tuesday', 'Lunch', 'Fried Rice with Manchurian', 1),
(7, 'Tuesday', 'Lunch', 'Chicken Fried Rice with Manchurian', 0),
(8, 'Tuesday', 'Dinner', 'Dosa with Coconut Chutney', 1),
(9, 'Tuesday', 'Dinner', 'Egg Curry with Paratha', 0),
(10, 'Wednesday', 'Breakfast', 'Upma with Chutney', 1),
(11, 'Wednesday', 'Breakfast', 'Omelette with Toast', 0),
(12, 'Wednesday', 'Lunch', 'Mix-Veg Pulao with Raita', 1),
(13, 'Wednesday', 'Lunch', 'Chicken Pulao with Raita', 0),
(14, 'Wednesday', 'Dinner', 'Paratha with Aloo Gobi', 1),
(15, 'Wednesday', 'Dinner', 'Fish Fry with Lemon Rice', 0),
(16, 'Thursday', 'Breakfast', 'Aloo Paratha with Curd', 1),
(17, 'Thursday', 'Lunch', 'Lemon Rice with Papad', 1),
(18, 'Thursday', 'Dinner', 'Vegetable Pulao with Raita', 1),
(19, 'Friday', 'Breakfast', 'Sandwich with Chutney', 1),
(20, 'Friday', 'Breakfast', 'Bacon and Eggs', 0),
(21, 'Friday', 'Lunch', 'Khichdi with Pickle', 1),
(22, 'Friday', 'Lunch', 'Fish Curry with Rice', 0),
(23, 'Friday', 'Dinner', 'Noodles with Stir-fried Vegetables', 1),
(24, 'Friday', 'Dinner', 'Chicken Stir Fry with Noodles', 0),
(25, 'Saturday', 'Breakfast', 'Puri with Aloo Curry', 1),
(26, 'Saturday', 'Breakfast', 'Chicken Sandwich', 0),
(27, 'Saturday', 'Lunch', 'Veg Biryani with Raita', 1),
(28, 'Saturday', 'Lunch', 'Mutton Biryani with Raita', 0),
(29, 'Saturday', 'Dinner', 'Chapati with Mixed Vegetable Curry', 1),
(30, 'Saturday', 'Dinner', 'Grilled Chicken with Salad', 0),
(31, 'Sunday', 'Breakfast', 'Masala Dosa with Sambar', 1),
(32, 'Sunday', 'Breakfast', 'Egg Benedict', 0),
(33, 'Sunday', 'Lunch', 'Paneer Butter Masala with Naan', 1),
(34, 'Sunday', 'Lunch', 'Fish Curry with Rice', 0),
(35, 'Sunday', 'Dinner', 'Tomato Soup with Grilled Sandwich', 1),
(36, 'Sunday', 'Dinner', 'Chicken Soup with Garlic Bread', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weekly_menu`
--
ALTER TABLE `weekly_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD UNIQUE KEY `unique_menu` (`day_of_week`,`meal_type`,`is_veg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weekly_menu`
--
ALTER TABLE `weekly_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
