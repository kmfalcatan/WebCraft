-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcraft`
--
-- admin@wmsu.edu.ph
-- adminPass
-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipment_ID` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deployment` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `property_number` varchar(255) NOT NULL,
  `account_code` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `unit_value` varchar(255) NOT NULL,
  `total_value` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `year_received` int(11) NOT NULL,
  `warranty_image` varchar(255) DEFAULT NULL,
  `warranty_start` date DEFAULT NULL,
  `warranty_end` date DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `instruction` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipment_ID`, `image`, `article`, `description`, `deployment`, `user`, `property_number`, `account_code`, `units`, `unit_value`, `total_value`, `remarks`, `year_received`, `warranty_image`, `warranty_start`, `warranty_end`, `budget`, `instruction`) VALUES
(1, 'MBFP-1003.jpg', 'Alcohol Dispenser', 'Foot press alcohol dispenser metal type. Specification: Height: 5ft x 8.3 inches, made of stainless steel (T202), hand face, up to 500ml alcohol pump bottle capacity, 102cm height.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-22-STF-0296/20-4', '1-0-05-100', '1', '1, 500.00', '1, 500.00', 'none', 2022, 'MBFP-1003.jpg', '2020-10-28', '2027-06-03', '1, 500.00', '1.	Position the dispenser on the floor.\r\n2.	Place your foot on the pedal or press area.\r\n3.	Apply pressure to activate the dispenser.\r\n4.	Dispense alcohol onto your hand.\r\n5.	Rub your hands together.\r\n6.	Allow hands to dry.\r\n'),
(2, '3472049428.jpg', 'Cabinet', 'JIT-LF01 2 layers glass sliding door cabinet, with lock 4 adjustable salves, color: beige.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-23-F101-0018/2-1-2', '1-04-06-010', '2', '9920', '19840', 'Operational', 2023, '3472049428.jpg', '2023-06-04', '2024-06-04', '5000.00', '1.	Identify the handles or knobs on the sliding doors.\r\n2.	Gently pull or push on the handles/knobs to slide the doors open.\r\n3.	Slide the doors to the desired position to access the shelves inside.\r\n4.	Place or retrieve items from the shelves as needed.\r\n5.	After use, slide the doors back to their original closed position.\r\n'),
(3, 'in.png', 'Chair', 'LINO URATEX - school char, plastic school chair with work surface, white, for adult users.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-23-F101-0017/110-1-110', '1-04-05-100', '110', '1000', '110000', 'Operational', 2023, 'in.png', '2023-12-14', '2024-12-12', '10, 000.00', '1.	Position the chair in a suitable area.\r\n2.	Sit on the chair comfortably.\r\n3.	Place your belongings on the work surface.\r\n4.	Use the work surface for writing, reading, and perform tasks as needed.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','anonymous') NOT NULL DEFAULT 'anonymous'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@wmsu.edu.ph', '$2y$10$8w3Mv8eL4fUq6kb1zO8eXu0wL7yYkXKk7lmnW8S2cFvGoMgJYcYU2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
