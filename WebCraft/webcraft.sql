-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 09:51 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `property_number` varchar(255) NOT NULL,
  `account_code` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `unit_value` varchar(255) NOT NULL,
  `total_value` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `other_information` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

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
  `other_information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `users`
--

-- admin@wmsu.edu.ph
-- adminPass
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','anonymous') NOT NULL DEFAULT 'anonymous'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 
--
INSERT INTO `users` (`fullname`, `email`, `password`, `role`)
VALUES ('Admin', 'admin@wmsu.edu.ph', '$2y$10$8w3Mv8eL4fUq6kb1zO8eXu0wL7yYkXKk7lmnW8S2cFvGoMgJYcYU2', 'admin');
--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
