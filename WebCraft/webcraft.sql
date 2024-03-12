-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 05:55 PM
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
-- Table structure for table `approved_report`
--

CREATE TABLE `approved_report` (
  `approved_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `article` text DEFAULT NULL,
  `unit_ID` varchar(255) DEFAULT NULL,
  `unit_issue` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_report`
--

INSERT INTO `approved_report` (`approved_ID`, `user_ID`, `article`, `unit_ID`, `unit_issue`, `timestamp`) VALUES
(3, 6, 'kasd', 'UNIT-0015', ' LOST', '2024-03-11 16:36:21');

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
  `total_unit` int(11) NOT NULL,
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

INSERT INTO `equipment` (`equipment_ID`, `image`, `article`, `description`, `deployment`, `user`, `property_number`, `account_code`, `total_unit`, `unit_value`, `total_value`, `remarks`, `year_received`, `warranty_image`, `warranty_start`, `warranty_end`, `budget`, `instruction`) VALUES
(161, '3472049428.jpg', 'Cabinet', 'JIT-LF01 2 layers glass sliding door cabinet, with lock 4 adjustable salves, color: beige.', 'College of Medicine', NULL, 'ICS-23-F101-0018/2-1-2', '1-04-06-010', 2, '9920', '19,840.00', '', 2023, 'in.png', '2024-03-01', '2024-03-28', NULL, 'qwe'),
(162, 'in.png', 'Extension Wire', 'OMNI 3 Gang Universal outlet', 'College of Medicine', NULL, 'ICS-23-F101-0019-10-1-10', '1-04-05-190', 6, '1528', '15,280.00', '', 2023, 'in.png', '2024-03-29', '2024-03-31', NULL, ''),
(163, '', 'kasd', '', '', NULL, '', '', 1, '', '', '', 0, '', '0000-00-00', '0000-00-00', NULL, ''),
(164, 'MBFP-1003.jpg', 'Alcohol Dispenser', 'MBFP-1003.jpg\', \'Alcohol Dispenser\', \'Foot press alcohol dispenser metal type. Specification: Height: 5ft x 8.3 inches, made of stainless steel (T202),  hand face, up to 500ml alcohol pump bottle capacity, 102cm height.', 'College of Medicine', NULL, 'ICS-22-STF-0296/20-4', '1-04-05-100', 1, '1500', '1,500.00', '', 2022, 'in.png', '2024-03-28', '2024-03-28', NULL, ''),
(165, 'in.png', 'Chair', 'LINO URATEX - school char, plastic school chair with work surface, white, for adult users.', 'College of Medicine', NULL, 'ICS-23-F101-0017/110-1-110', '1-04-06-010', 15, '110', '1,650.00', '', 2023, 'in.png', '2024-04-05', '2024-03-28', NULL, ''),
(166, 'in.png', 'Fire Extenguisher', '\'Dry Chemical 10lbs\\\', \\\'College of Medicine', 'College of Medicine', NULL, 'ICS-22-STF-00147/52-27-39', '\'1-04-05-080', 3, '1899', '5,697.00', '', 2022, 'in.png', '2024-03-01', '2024-04-04', NULL, ''),
(167, 'in.png', 'Desktop Computer', 'Intel Core i3 9100 6M cache, up to 4.20 GHZ', 'College of Medicine', NULL, 'ICS-21-F101-0024/20-115', '1-06-05-030', 15, '33575', '503,625.00', '', 2021, 'in.png', '2024-03-29', '2024-02-29', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_ID` int(11) NOT NULL,
  `equipment_ID` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_ID`, `equipment_ID`, `equipment_name`, `user`) VALUES
(1, 161, 'Cabinet', 'Khriz Marr Falcatan'),
(2, 161, 'Cabinet', 'John Mark Taborada'),
(3, 162, 'Extension Wire', 'Rogie Gabotero'),
(4, 162, 'Extension Wire', 'Rogie Gabotero'),
(5, 162, 'Extension Wire', 'Rogie Gabotero'),
(6, 162, 'Extension Wire', 'Rogie Gabotero'),
(7, 162, 'Extension Wire', 'Rogie Gabotero'),
(16, 163, 'kasd', 'Arp-J Villares'),
(18, 164, 'Alcohol Dispenser', 'Padwa Tingkasan'),
(19, 165, 'Chair', 'Rogie Gabotero'),
(20, 165, 'Chair', 'Rogie Gabotero'),
(21, 165, 'Chair', 'Rogie Gabotero'),
(22, 165, 'Chair', 'Rogie Gabotero'),
(23, 165, 'Chair', 'Rogie Gabotero'),
(24, 165, 'Chair', 'Padwa Tingkasan'),
(25, 165, 'Chair', 'Padwa Tingkasan'),
(26, 165, 'Chair', 'Padwa Tingkasan'),
(27, 165, 'Chair', 'Padwa Tingkasan'),
(28, 165, 'Chair', 'Padwa Tingkasan'),
(29, 165, 'Chair', 'Khriz Marr Falcatan'),
(30, 165, 'Chair', 'Khriz Marr Falcatan'),
(31, 165, 'Chair', 'Khriz Marr Falcatan'),
(32, 165, 'Chair', 'Khriz Marr Falcatan'),
(33, 165, 'Chair', 'Khriz Marr Falcatan'),
(34, 166, 'Fire Extenguisher', 'John Mark Taborada'),
(35, 166, 'Fire Extenguisher', 'Arp-J Villares'),
(36, 166, 'Fire Extenguisher', 'Arp-J Villares'),
(37, 167, 'Desktop Computer', 'John Mark Taborada'),
(38, 167, 'Desktop Computer', 'John Mark Taborada'),
(39, 167, 'Desktop Computer', 'John Mark Taborada'),
(40, 167, 'Desktop Computer', 'John Mark Taborada'),
(41, 167, 'Desktop Computer', 'John Mark Taborada'),
(42, 167, 'Desktop Computer', 'Khriz Marr Falcatan'),
(43, 167, 'Desktop Computer', 'Khriz Marr Falcatan'),
(44, 167, 'Desktop Computer', 'Khriz Marr Falcatan'),
(45, 167, 'Desktop Computer', 'Khriz Marr Falcatan'),
(46, 167, 'Desktop Computer', 'Khriz Marr Falcatan'),
(47, 167, 'Desktop Computer', 'Rogie Gabotero'),
(48, 167, 'Desktop Computer', 'Rogie Gabotero'),
(49, 167, 'Desktop Computer', 'Rogie Gabotero'),
(50, 167, 'Desktop Computer', 'Rogie Gabotero'),
(51, 167, 'Desktop Computer', 'Rogie Gabotero');

-- --------------------------------------------------------

--
-- Table structure for table `unit_report`
--

CREATE TABLE `unit_report` (
  `report_ID` int(11) NOT NULL,
  `equipment_ID` int(11) DEFAULT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `unit_ID` varchar(50) DEFAULT NULL,
  `unit_handler` varchar(255) DEFAULT NULL,
  `report_issue` varchar(255) DEFAULT NULL,
  `problem_desc` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'You have sent a report.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit_report`
--

INSERT INTO `unit_report` (`report_ID`, `equipment_ID`, `user_ID`, `unit_ID`, `unit_handler`, `report_issue`, `problem_desc`, `timestamp`, `status`) VALUES
(1, 163, 6, 'UNIT-0015', NULL, 'FOR RETURN', 'kln', '2024-03-11 05:12:40', 'Your report has been approved.'),
(2, 163, 6, 'UNIT-0016', NULL, 'LOST', 'dsf', '2024-03-11 09:07:31', 'Your report has been approved.'),
(3, 163, 6, 'UNIT-0015', NULL, 'LOST', 'fff', '2024-03-11 09:35:49', 'Your report has been approved.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','anonymous') NOT NULL DEFAULT 'anonymous',
  `contact` varchar(15) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `contact`, `department`, `profile_img`, `username`, `gender`, `address`) VALUES
(1, 'Ryan Torres', 'admin@wmsu.edu.ph', '$2y$10$9Y2twzt5f5BdSdK0V3wDFuZxw2WXU7JbcLi2xWWcskjQtfOzsrx7O', 'admin', '00000', '', 'kyle kuzma.jpg', 'kyle', '', ''),
(2, 'Rogie Gabotero', 'rogie@gmail.com', '$2y$10$84PvOmbRIEkHFN7gyMGHneKxzDUennPHDcrNxC39xjAEIeu002eey', 'user', '00000', 'College of Computing Studies', 'rogie.jpg', 'Gie', 'Male', 'ZC'),
(3, 'Padwa Tingkasan', 'padwa@gmail.com', '$2y$10$VOOiCimGE1nYFnYwy0lYfeTN24op75mVoOCNARSN9iHLtqmZo4T1y', 'user', '00000', 'College of Computing Studies', 'padwa.png', 'Paw', 'Female', 'ZC'),
(4, 'Khriz Marr Falcatan', 'khriz@gmail.com', '$2y$10$ue4ZCK8IJH2fKQfyHkdR0OXnVcnCFRks9MGR7kLJgaG3jjUqyguR6', 'user', '000000', 'College of Computing Studies', 'khriz.jpg', 'Khriz', 'Male', 'ZC'),
(5, 'John Mark Taborada', 'john@gmail.com', '$2y$10$LzaPzeSkto5zsp.jLiB9.OaMSZ73gS8VoBYnNnDMZbjVyaBhS2MAa', 'user', '00000', 'College of Computing Studies', 'tabs.png', 'Tabs', 'Male', 'ZC'),
(6, 'Arp-J Villares', 'arp@gmail.com', '$2y$10$dMu9OE0oNDfQm./UR7T2re.ApRRIUfRYA8flTtZEiP5SJDsBvdITi', 'user', '00000', 'College of Computing Studies', 'arp.png', 'Arp', 'Male', 'ZC');

-- --------------------------------------------------------

--
-- Table structure for table `user_unit`
--

CREATE TABLE `user_unit` (
  `user` varchar(255) NOT NULL,
  `article` varchar(255) DEFAULT NULL,
  `units_handled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_unit`
--

INSERT INTO `user_unit` (`user`, `article`, `units_handled`) VALUES
('Khriz Marr Falcatan', 'Cabinet', 1),
('John Mark Taborada', 'Cabinet', 1),
('Rogie Gabotero', 'Extension Wire', 5),
('Arp-J Villares', 'Extension Wire', 5),
('Arp-J Villares', 'kasd', 5),
('Padwa Tingkasan', 'Alcohol Dispenser', 1),
('Rogie Gabotero', 'Chair', 5),
('Padwa Tingkasan', 'Chair', 5),
('Khriz Marr Falcatan', 'Chair', 5),
('John Mark Taborada', 'Fire Extenguisher', 1),
('Arp-J Villares', 'Fire Extenguisher', 2),
('John Mark Taborada', 'Desktop Computer', 5),
('Khriz Marr Falcatan', 'Desktop Computer', 5),
('Rogie Gabotero', 'Desktop Computer', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_report`
--
ALTER TABLE `approved_report`
  ADD PRIMARY KEY (`approved_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_ID`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_ID`,`equipment_name`),
  ADD KEY `equipment_ID` (`equipment_ID`);

--
-- Indexes for table `unit_report`
--
ALTER TABLE `unit_report`
  ADD PRIMARY KEY (`report_ID`),
  ADD KEY `equipment_ID` (`equipment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_report`
--
ALTER TABLE `approved_report`
  MODIFY `approved_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `unit_report`
--
ALTER TABLE `unit_report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`);

--
-- Constraints for table `unit_report`
--
ALTER TABLE `unit_report`
  ADD CONSTRAINT `unit_report_ibfk_1` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
