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
-- Table structure for table `meal_schedule`
--

CREATE TABLE `meal_schedule` (
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `scheduled_date` date NOT NULL,
  `meal_type` enum('Breakfast','Lunch','Dinner') NOT NULL,
  `menu` varchar(255) NOT NULL,
  `status` enum('Accessed','Not Accessed') DEFAULT 'Not Accessed',
  `access_time` datetime DEFAULT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') GENERATED ALWAYS AS (dayname(`scheduled_date`)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_schedule`
--

INSERT INTO `meal_schedule` (`meal_id`, `user_id`, `scheduled_date`, `meal_type`, `menu`, `status`, `access_time`) VALUES
(1, 1, '2025-04-18', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-18 08:30:00'),
(2, 1, '2025-04-18', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-18 12:15:00'),
(3, 1, '2025-04-18', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Not Accessed', NULL),
(4, 1, '2025-04-19', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-19 09:00:00'),
(5, 1, '2025-04-19', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-19 13:00:00'),
(6, 1, '2025-04-19', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Not Accessed', NULL),
(7, 1, '2025-04-20', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-20 08:45:00'),
(8, 1, '2025-04-20', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-20 12:30:00'),
(9, 1, '2025-04-20', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Not Accessed', NULL),
(10, 1, '2025-04-21', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-21 08:15:00'),
(11, 1, '2025-04-21', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-21 12:45:00'),
(12, 1, '2025-04-21', 'Dinner', 'Chapati with Paneer Butter Masala', 'Not Accessed', NULL),
(13, 1, '2025-04-22', 'Breakfast', 'Poha with Sev', 'Accessed', '2025-04-22 09:00:00'),
(14, 1, '2025-04-22', 'Lunch', 'Fried Rice with Manchurian', 'Accessed', '2025-04-22 13:30:00'),
(15, 1, '2025-04-22', 'Dinner', 'Dosa with Coconut Chutney', 'Not Accessed', NULL),
(16, 1, '2025-04-23', 'Breakfast', 'Upma with Chutney', 'Accessed', '2025-04-23 08:00:00'),
(17, 1, '2025-04-23', 'Lunch', 'Jeera Rice with Rajma', 'Accessed', '2025-04-23 12:00:00'),
(18, 1, '2025-04-23', 'Dinner', 'Paratha with Aloo Gobi', 'Not Accessed', NULL),
(19, 1, '2025-04-24', 'Breakfast', 'Aloo Paratha with Curd', 'Accessed', '2025-04-24 08:30:00'),
(20, 1, '2025-04-24', 'Lunch', 'Lemon Rice with Papad', 'Accessed', '2025-04-24 12:30:00'),
(21, 1, '2025-04-24', 'Dinner', 'Vegetable Pulao with Raita', 'Not Accessed', NULL),
(22, 2, '2025-04-18', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-18 09:00:00'),
(23, 2, '2025-04-18', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-18 12:30:00'),
(24, 2, '2025-04-18', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-18 20:45:00'),
(26, 2, '2025-04-19', 'Lunch', 'Veg Biryani with Raita', 'Not Accessed', NULL),
(27, 2, '2025-04-19', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-19 20:50:00'),
(28, 2, '2025-04-20', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-20 08:40:00'),
(29, 2, '2025-04-20', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-20 13:00:00'),
(30, 2, '2025-04-20', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-20 20:35:00'),
(31, 2, '2025-04-21', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-21 08:10:00'),
(32, 2, '2025-04-21', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-21 12:20:00'),
(33, 2, '2025-04-21', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-21 20:40:00'),
(34, 2, '2025-04-22', 'Breakfast', 'Poha with Sev', 'Accessed', '2025-04-22 09:05:00'),
(35, 2, '2025-04-22', 'Lunch', 'Fried Rice with Manchurian', 'Accessed', '2025-04-22 12:55:00'),
(36, 2, '2025-04-22', 'Dinner', 'Dosa with Coconut Chutney', 'Accessed', '2025-04-22 20:55:00'),
(37, 2, '2025-04-23', 'Breakfast', 'Upma with Chutney', 'Accessed', '2025-04-23 08:25:00'),
(38, 2, '2025-04-23', 'Lunch', 'Jeera Rice with Rajma', 'Not Accessed', NULL),
(39, 2, '2025-04-23', 'Dinner', 'Paratha with Aloo Gobi', 'Accessed', '2025-04-23 20:30:00'),
(40, 2, '2025-04-24', 'Breakfast', 'Aloo Paratha with Curd', 'Accessed', '2025-04-24 09:10:00'),
(41, 2, '2025-04-24', 'Lunch', 'Lemon Rice with Papad', 'Accessed', '2025-04-24 12:45:00'),
(42, 2, '2025-04-24', 'Dinner', 'Vegetable Pulao with Raita', 'Accessed', '2025-04-24 20:40:00'),
(43, 3, '2025-04-18', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-18 08:20:00'),
(44, 3, '2025-04-18', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-18 12:10:00'),
(45, 3, '2025-04-18', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-18 20:35:00'),
(46, 3, '2025-04-19', 'Breakfast', 'Puri with Aloo Curry', 'Not Accessed', NULL),
(47, 3, '2025-04-19', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-19 13:05:00'),
(48, 3, '2025-04-19', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-19 20:55:00'),
(49, 3, '2025-04-20', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-20 08:50:00'),
(50, 3, '2025-04-20', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-20 12:40:00'),
(51, 3, '2025-04-20', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-20 20:25:00'),
(52, 3, '2025-04-21', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-21 09:15:00'),
(53, 3, '2025-04-21', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-21 12:50:00'),
(54, 3, '2025-04-21', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-21 20:30:00'),
(55, 3, '2025-04-22', 'Breakfast', 'Poha with Sev', 'Accessed', '2025-04-22 08:35:00'),
(56, 3, '2025-04-22', 'Lunch', 'Fried Rice with Manchurian', 'Accessed', '2025-04-22 12:15:00'),
(57, 3, '2025-04-22', 'Dinner', 'Dosa with Coconut Chutney', 'Accessed', '2025-04-22 20:45:00'),
(58, 3, '2025-04-23', 'Breakfast', 'Upma with Chutney', 'Accessed', '2025-04-23 08:05:00'),
(59, 3, '2025-04-23', 'Lunch', 'Jeera Rice with Rajma', 'Accessed', '2025-04-23 12:10:00'),
(60, 3, '2025-04-23', 'Dinner', 'Paratha with Aloo Gobi', 'Accessed', '2025-04-23 20:50:00'),
(61, 3, '2025-04-24', 'Breakfast', 'Aloo Paratha with Curd', 'Accessed', '2025-04-24 09:00:00'),
(62, 3, '2025-04-24', 'Lunch', 'Lemon Rice with Papad', 'Accessed', '2025-04-24 12:30:00'),
(63, 3, '2025-04-24', 'Dinner', 'Vegetable Pulao with Raita', 'Accessed', '2025-04-24 20:55:00'),
(64, 4, '2025-04-18', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-18 08:10:00'),
(65, 4, '2025-04-18', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-18 12:05:00'),
(66, 4, '2025-04-18', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-18 20:20:00'),
(67, 4, '2025-04-19', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-19 08:20:00'),
(68, 4, '2025-04-19', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-19 12:55:00'),
(69, 4, '2025-04-19', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-19 20:35:00'),
(70, 4, '2025-04-20', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-20 08:05:00'),
(71, 4, '2025-04-20', 'Lunch', 'Paneer Butter Masala with Naan', 'Not Accessed', NULL),
(72, 4, '2025-04-20', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-20 20:40:00'),
(73, 4, '2025-04-21', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-21 08:25:00'),
(74, 4, '2025-04-21', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-21 12:40:00'),
(75, 4, '2025-04-21', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-21 20:45:00'),
(76, 4, '2025-04-22', 'Breakfast', 'Poha with Sev', 'Accessed', '2025-04-22 08:50:00'),
(77, 4, '2025-04-22', 'Lunch', 'Fried Rice with Manchurian', 'Accessed', '2025-04-22 12:20:00'),
(78, 4, '2025-04-22', 'Dinner', 'Dosa with Coconut Chutney', 'Accessed', '2025-04-22 20:30:00'),
(79, 4, '2025-04-23', 'Breakfast', 'Upma with Chutney', 'Accessed', '2025-04-23 08:15:00'),
(80, 4, '2025-04-23', 'Lunch', 'Jeera Rice with Rajma', 'Accessed', '2025-04-23 12:25:00'),
(81, 4, '2025-04-23', 'Dinner', 'Paratha with Aloo Gobi', 'Accessed', '2025-04-23 20:10:00'),
(82, 4, '2025-04-24', 'Breakfast', 'Aloo Paratha with Curd', 'Accessed', '2025-04-24 08:35:00'),
(83, 4, '2025-04-24', 'Lunch', 'Lemon Rice with Papad', 'Accessed', '2025-04-24 12:15:00'),
(84, 4, '2025-04-24', 'Dinner', 'Vegetable Pulao with Raita', 'Accessed', '2025-04-24 20:50:00'),
(85, 5, '2025-04-18', 'Breakfast', 'Sandwich with Chutney', 'Not Accessed', NULL),
(86, 5, '2025-04-18', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-18 12:35:00'),
(87, 5, '2025-04-18', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-18 20:25:00'),
(88, 5, '2025-04-19', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-19 08:40:00'),
(89, 5, '2025-04-19', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-19 13:10:00'),
(90, 5, '2025-04-19', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-19 20:55:00'),
(91, 5, '2025-04-20', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-20 08:30:00'),
(92, 5, '2025-04-20', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-20 12:20:00'),
(93, 5, '2025-04-20', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-20 20:15:00'),
(94, 5, '2025-04-21', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-21 09:05:00'),
(95, 5, '2025-04-21', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-21 12:55:00'),
(96, 5, '2025-04-21', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-21 20:30:00'),
(97, 5, '2025-04-22', 'Breakfast', 'Poha with Sev', 'Accessed', '2025-04-22 09:15:00'),
(98, 5, '2025-04-22', 'Lunch', 'Fried Rice with Manchurian', 'Accessed', '2025-04-22 12:45:00'),
(99, 5, '2025-04-22', 'Dinner', 'Dosa with Coconut Chutney', 'Accessed', '2025-04-22 20:40:00'),
(100, 5, '2025-04-23', 'Breakfast', 'Upma with Chutney', 'Accessed', '2025-04-23 08:20:00'),
(101, 5, '2025-04-23', 'Lunch', 'Jeera Rice with Rajma', 'Accessed', '2025-04-23 12:30:00'),
(102, 5, '2025-04-23', 'Dinner', 'Paratha with Aloo Gobi', 'Accessed', '2025-04-23 20:45:00'),
(103, 5, '2025-04-24', 'Breakfast', 'Aloo Paratha with Curd', 'Accessed', '2025-04-24 08:45:00'),
(104, 5, '2025-04-24', 'Lunch', 'Lemon Rice with Papad', 'Accessed', '2025-04-24 12:25:00'),
(105, 5, '2025-04-24', 'Dinner', 'Vegetable Pulao with Raita', 'Accessed', '2025-04-24 20:35:00'),
(139, 3, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 15:30:47'),
(141, 1, '2025-04-27', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-27 16:08:56'),
(142, 1, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 16:13:35'),
(143, 2, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 16:20:00'),
(174, 2, '2025-04-27', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-27 22:48:54'),
(177, 1, '2025-04-25', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-25 08:32:15'),
(178, 1, '2025-04-25', 'Lunch', 'Fish Curry with Rice', 'Accessed', '2025-04-25 12:45:22'),
(179, 1, '2025-04-25', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-25 20:59:03'),
(180, 2, '2025-04-25', 'Breakfast', 'Bacon and Eggs', 'Accessed', '2025-04-25 09:13:10'),
(181, 2, '2025-04-25', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-25 13:05:44'),
(182, 2, '2025-04-25', 'Dinner', 'Chicken Stir Fry with Noodles', 'Accessed', '2025-04-25 21:12:51'),
(183, 3, '2025-04-25', 'Breakfast', 'Sandwich with Chutney', 'Not Accessed', NULL),
(184, 3, '2025-04-25', 'Lunch', 'Fish Curry with Rice', 'Accessed', '2025-04-25 13:17:32'),
(185, 3, '2025-04-25', 'Dinner', 'Chicken Stir Fry with Noodles', 'Accessed', '2025-04-25 21:05:10'),
(186, 4, '2025-04-25', 'Breakfast', 'Bacon and Eggs', 'Accessed', '2025-04-25 08:55:00'),
(187, 4, '2025-04-25', 'Lunch', 'Khichdi with Pickle', 'Accessed', '2025-04-25 13:48:14'),
(188, 4, '2025-04-25', 'Dinner', 'Noodles with Stir-fried Vegetables', 'Accessed', '2025-04-25 20:41:08'),
(189, 5, '2025-04-25', 'Breakfast', 'Sandwich with Chutney', 'Accessed', '2025-04-25 08:23:45'),
(190, 5, '2025-04-25', 'Lunch', 'Fish Curry with Rice', 'Accessed', '2025-04-25 13:10:30'),
(191, 5, '2025-04-25', 'Dinner', 'Chicken Stir Fry with Noodles', 'Accessed', '2025-04-25 21:27:42'),
(192, 1, '2025-04-26', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-26 09:02:19'),
(193, 1, '2025-04-26', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-26 12:51:39'),
(194, 1, '2025-04-26', 'Dinner', 'Grilled Chicken with Salad', 'Accessed', '2025-04-26 21:08:22'),
(195, 2, '2025-04-26', 'Breakfast', 'Chicken Sandwich', 'Accessed', '2025-04-26 09:34:40'),
(196, 2, '2025-04-26', 'Lunch', 'Mutton Biryani with Raita', 'Accessed', '2025-04-26 13:24:57'),
(197, 2, '2025-04-26', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-26 20:38:06'),
(198, 3, '2025-04-26', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-26 08:57:01'),
(199, 3, '2025-04-26', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-26 12:45:11'),
(200, 3, '2025-04-26', 'Dinner', 'Grilled Chicken with Salad', 'Accessed', '2025-04-26 21:15:12'),
(201, 4, '2025-04-26', 'Breakfast', 'Chicken Sandwich', 'Not Accessed', NULL),
(202, 4, '2025-04-26', 'Lunch', 'Mutton Biryani with Raita', 'Accessed', '2025-04-26 13:12:35'),
(203, 4, '2025-04-26', 'Dinner', 'Grilled Chicken with Salad', 'Accessed', '2025-04-26 20:45:19'),
(204, 5, '2025-04-26', 'Breakfast', 'Puri with Aloo Curry', 'Accessed', '2025-04-26 09:11:56'),
(205, 5, '2025-04-26', 'Lunch', 'Veg Biryani with Raita', 'Accessed', '2025-04-26 12:38:47'),
(206, 5, '2025-04-26', 'Dinner', 'Chapati with Mixed Vegetable Curry', 'Accessed', '2025-04-26 20:58:10'),
(207, 1, '2025-04-27', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-27 08:44:10'),
(208, 1, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 13:05:18'),
(209, 1, '2025-04-27', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-27 20:48:55'),
(210, 2, '2025-04-27', 'Breakfast', 'Egg Benedict', 'Accessed', '2025-04-27 09:22:13'),
(211, 2, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 13:20:17'),
(212, 2, '2025-04-27', 'Dinner', 'Chicken Soup with Garlic Bread', 'Accessed', '2025-04-27 21:03:32'),
(213, 3, '2025-04-27', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-27 08:18:47'),
(214, 3, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 12:55:22'),
(215, 3, '2025-04-27', 'Dinner', 'Chicken Soup with Garlic Bread', 'Not Accessed', NULL),
(216, 4, '2025-04-27', 'Breakfast', 'Egg Benedict', 'Accessed', '2025-04-27 09:05:42'),
(217, 4, '2025-04-27', 'Lunch', 'Fish Curry with Rice', 'Accessed', '2025-04-27 13:35:30'),
(218, 4, '2025-04-27', 'Dinner', 'Tomato Soup with Grilled Sandwich', 'Accessed', '2025-04-27 21:10:10'),
(219, 5, '2025-04-27', 'Breakfast', 'Masala Dosa with Sambar', 'Accessed', '2025-04-27 08:33:03'),
(220, 5, '2025-04-27', 'Lunch', 'Paneer Butter Masala with Naan', 'Accessed', '2025-04-27 13:02:40'),
(221, 5, '2025-04-27', 'Dinner', 'Chicken Soup with Garlic Bread', 'Accessed', '2025-04-27 21:05:59'),
(222, 1, '2025-04-28', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-28 08:55:14'),
(223, 1, '2025-04-28', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-28 13:10:02'),
(224, 1, '2025-04-28', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-28 20:53:20'),
(225, 2, '2025-04-28', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-28 09:12:30'),
(226, 2, '2025-04-28', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-28 12:40:25'),
(227, 2, '2025-04-28', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-28 20:49:40'),
(228, 3, '2025-04-28', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-28 08:28:52'),
(229, 3, '2025-04-28', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-28 13:18:00'),
(230, 3, '2025-04-28', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-28 21:00:10'),
(231, 4, '2025-04-28', 'Breakfast', 'Idli with Sambar', 'Not Accessed', NULL),
(232, 4, '2025-04-28', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-28 13:25:42'),
(233, 4, '2025-04-28', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-28 20:57:35'),
(234, 5, '2025-04-28', 'Breakfast', 'Idli with Sambar', 'Accessed', '2025-04-28 08:47:23'),
(235, 5, '2025-04-28', 'Lunch', 'Rice with Dal and Mixed Vegetables', 'Accessed', '2025-04-28 12:49:10'),
(236, 5, '2025-04-28', 'Dinner', 'Chapati with Paneer Butter Masala', 'Accessed', '2025-04-28 20:43:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_schedule`
--
ALTER TABLE `meal_schedule`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_schedule`
--
ALTER TABLE `meal_schedule`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_schedule`
--
ALTER TABLE `meal_schedule`
  ADD CONSTRAINT `meal_schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `food_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
