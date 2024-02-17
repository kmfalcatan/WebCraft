-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 10:45 PM
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
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `request_ID` int(11) NOT NULL,
  `equipment_ID` int(11) DEFAULT NULL,
  `article` varchar(255) DEFAULT NULL,
  `date_request` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `equipment_img` varchar(255) DEFAULT NULL,
  `equip_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`request_ID`, `equipment_ID`, `article`, `date_request`, `description`, `fullname`, `email`, `contact_number`, `status`, `equipment_img`, `equip_img`) VALUES
(1, 4, 'Extension Wire', '2024-02-23', 'damage', 'Padwa Tingkasan ', 'powie@gmail.com', '1234567890', 'pending', NULL, 'images (11).jpeg');

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
(1, 'MBFP-1003.jpg', 'Alcohol Dispenser', 'Foot press alcohol dispenser metal type. Specification: Height: 5ft x 8.3 inches, made of stainless steel (T202), hand face, up to 500ml alcohol pump bottle capacity, 102cm height.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-22-STF-0296/20-4', '1-0-05-100', '2', '1, 500.00', '1, 500.00', 'none', 2022, 'MBFP-1003.jpg', '2020-10-28', '2027-06-03', '1, 500.00', '1.	Position the dispenser on the floor.\r\n2.	Place your foot on the pedal or press area.\r\n3.	Apply pressure to activate the dispenser.\r\n4.	Dispense alcohol onto your hand.\r\n5.	Rub your hands together.\r\n6.	Allow hands to dry.\r\n'),
(2, '3472049428.jpg', 'Cabinet', 'JIT-LF01 2 layers glass sliding door cabinet, with lock 4 adjustable salves, color: beige.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-23-F101-0018/2-1-2', '1-04-06-010', '2', '9920', '19840', 'Operational', 2023, '3472049428.jpg', '2023-06-04', '2024-06-04', '5000.00', '1.	Identify the handles or knobs on the sliding doors.\r\n2.	Gently pull or push on the handles/knobs to slide the doors open.\r\n3.	Slide the doors to the desired position to access the shelves inside.\r\n4.	Place or retrieve items from the shelves as needed.\r\n5.	After use, slide the doors back to their original closed position.\r\n'),
(3, 'in.png', 'Chair', 'LINO URATEX - school char, plastic school chair with work surface, white, for adult users.', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-23-F101-0017/110-1-110', '1-04-05-100', '110', '1000', '110000', 'Operational', 2023, 'in.png', '2023-12-14', '2024-12-12', '10, 000.00', '1.	Position the chair in a suitable area.\r\n2.	Sit on the chair comfortably.\r\n3.	Place your belongings on the work surface.\r\n4.	Use the work surface for writing, reading, and perform tasks as needed.\r\n'),
(4, 'images (10).jpeg', 'Extension Wire', 'OMNI 3 Gang Universal outlet', 'College of Medicine ', 'Vincent Robinson Balido', 'ICS-23-f101-0019/10-10-10', '01-04-05-190', '10', '1528', '15280', 'Operational', 2023, '415698161_284560747642277_6576589458493813153_n (1).jpg', '2024-02-05', '2025-02-05', '20500', 'Fill in later'),
(5, 'images (11).jpeg', 'Fire Extinguisher', 'Dry Chemical 10lbs', 'College of Medicine ', 'Vincent Robinson Balido', 'ICS-22-STF-00147/52-37-39', '01-04-05-080', '3', '1899', '5697', 'Operational', 2022, 'Electrical-Contractor-Warranty-Form.jpg', '2024-02-06', '2025-02-06', '20500', 'PULL... Pull the pin. This will also break the tamper seal.\r\n\r\nAIM... Aim low, pointing the extinguisher nozzle (or its horn or hose) at the base of the fire.\r\n\r\nNOTE: Do not touch the plastic discharge horn on CO2 extinguishers, it gets very cold and may damage skin.\r\n\r\nSQUEEZE... Squeeze the handle to release the extinguishing agent.\r\nSWEEP... Sweep from side to side at the base of the fire until it appears to be out. Watch the area. If the fire re-ignites, repeat steps 2 - 4.'),
(6, 'b3f82f0e02c655a5eb79eb7c125a91d3.jpg', 'Gloves', 'hand gloves, rubber, reusable, heavy-duty, good Quality ', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-22-STF-0290/33-13', '1-04-05-190', '1', '124', '124', 'Operational ', 2022, 'Electrical-Contractor-Warranty-Form.jpg', '2024-02-06', '2025-02-06', '20500', 'Gloves are worn for protection, so cleaning them can extend their lifespan and protect against contamination. Here is a step-by-step process to help you clean your gloves whether they are vinyl, nitrile, or latex gloves:\r\n\r\n1. Washing the outside of the gloves with soap or a mild detergent and hot water while they are still on your hands can help keep them sanitary. Rub the gloves together or with a cloth to remove dirt, germs, and other organic materials. Thoroughly rinse the gloves under running water.\r\n2. Take off the gloves and wash your hands with soap and water.\r\n3. Soak the gloves inside out in a mixture of soap and water for a few minutes.\r\n4. Hang the gloves to dry in a well-ventilated location. Make sure they are completely dry before folding them and putting them away.\r\n5. Keep the clean rubber gloves in a dry place to prevent mildew growth.'),
(7, 'TL-SG1016D_UN_7.0_01_1499779712369t.jpg', 'Internet Switch', 'TP-link internet Switch 16 ports 10/100 MBPS, Auto Negotiation ', 'College of Medicine', 'Vincent Robinson Balido', 'ICS=22-F101-0361', '1-04-05-130', '1', '1450', '1450', 'Operational', 2022, 'Electrical-Contractor-Warranty-Form.jpg', '2024-02-06', '2025-02-06', '20500', 'Setting Up a 16-Port Switch\r\nSetting up a 16-port switch might sound daunting, but it’s simpler than you might think. Here’s a straightforward guide to get you started:\r\n1.	Location and Connections: First, choose a central location for your switch. This should be a place where all your devices can easily connect. Plug one end of an Ethernet cable into each device you want to connect, and then plug the other end into any of the available ports on the switch. The ports on the switch are like the outlets in your home – they’re where your devices plug in.\r\n2.	Powering Up: Connect the power adapter to the switch and plug it into a power outlet. Once powered up, the switch’s lights should start blinking, indicating that it’s working. These lights help you see which ports are active and connected.\r\n3.	Configuration (If Needed): In most cases, a 16-port switch is ready to use as soon as it’s powered up and devices are connected. However, if you have specific needs or want to optimize your network further, some switches might offer a web interface for more advanced configuration. You can access this interface through a web browser by typing in the switch’s IP address.\r\nIn essence, setting up a 16-port switch involves connecting your devices to its ports, supplying power, and then enjoying smoother and faster network connections. It’s a small effort that leads to a big improvement in your digital experience.\r\n\r\n'),
(8, 'study_chair1.jpg', 'Monoblock Chair', 'uno Study Chair, whit Arm and Writing pad, 100% virgin Plastic resin (from Araceli lim)', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-21-STF-0110/264-1-100', '1-04-06-010', '100', '998', '99800', 'All Operational', 2022, 'Electrical-Contractor-Warranty-Form.jpg', '2024-02-06', '2025-02-06', '20500', 'Encourages Movement — The first point we must tackle is the chair’s ability to allow movement.\r\n\r\nAdequate Space — Did you know that in the 20th Century, the classroom furniture was produced to encourage upright posture?\r\n\r\n“A 135-degree body-thigh sitting posture was demonstrated to be the best biomechanical sitting position, as opposed to a 90-degree posture, which most people consider normal.\r\n\r\nWe were not created to sit down for long hours, but somehow modern life requires the vast majority of the global population to work in a seated position,” stated Dr. Waseem Bashir, MBChB from the University of Alberta Hospital, Canada.\r\n\r\nFlexible — Flexibility talks about the chair’s lightweight design that can accommodate different teaching techniques and learning styles.\r\n\r\nRight Fit — We should not forget the size of the chair. If you have long legs you wouldn’t want to sit on a chair shorter than you. The same applies to classroom chairs.\r\n\r\nIt’s not just the left or right-handed chairs that teachers need to ask about but also if there are chairs that can fit the height of the children.'),
(9, 'images (12).jpeg', 'Monoblock Chair', 'UNO Monoblock Chair with Writing Desk- for adult user with writing desk, without armrest 100% virgin plastic resin (15 units for lest handed, 40 units for right handed)', 'College of Medicine', 'Vincent Robinson Balido', 'ICS-22-STF-00173/55-1-55', '1-04-06-010', '55', '1000', '55000', 'Operational', 2022, 'Electrical-Contractor-Warranty-Form.jpg', '2024-02-06', '2025-02-06', '20500', '1. Chair size\r\n\r\nSchools require chairs of different sizes because students come from various age groups. Hence, the chair should:\r\n\r\nFit their body height, size, and weight.\r\nEnsure comfort and good body posture.\r\nProvide adequate support for the back, shoulders, and arms.\r\n2. Chair material\r\n\r\nGenerally, school chairs are made from leather, wood, hard plastic, and soft plastic. These materials impact the chair’s comfort, look, durability, and maintenance. Without a doubt, leather and mesh chairs are highly recommended if you want to tick all the boxes. Lower-quality materials are, of course, prone to more wear and tear. Hence, it’s best to choose what gives more value to your money.\r\n\r\n3. Chair colour\r\n\r\nSchool furniture is no longer restricted to drab, dull, and mundane colours like brown, beige, and grey. However, picking a colour tone that aligns with the purpose is essential. Light colour tones are known for their soothing effect, while mid-tones stimulate the senses and creative elements.\r\n\r\n4. Adjustable features\r\n\r\nIf these chairs are used in a classroom setting, they should have height adjustability features to accommodate students of all ages. Leg and armrests make the chair more ergonomic. Students can sit comfortably through long exams or lectures without fidgeting or squirming if it is slightly tiltable.\r\n\r\n5. Storage space\r\n\r\nNowadays, student chairs with writing pads come with book baskets fixed under the chair. This feature serves a dual purpose:\r\nIt eliminates the need for a separate desk or shelf for storing books and other paraphernalia.\r\nIt offers easy access to school supplies without disturbing the classroom or moving things around.\r\n\r\n6. Writing pad size\r\n\r\nThe larger the writing pad, the more workspace it provides. The desk and chair combo comes with a tablet for student writing and is generally equipped with casters to facilitate collaborative and dynamic learning environments in the classroom.\r\n\r\nHas our blog piqued your interest in buying student chairs with writing pads? To purchase your chairs, look no further than Inspace, the furniture industry pioneers who specialize in custom-made, ergonomic school furniture.'),
(28, 'bg.png', 'White Board', 'sadasdasd', 'College of Medicine', '', 'ICS1243', '01-02-05-1996', '3', '', '1.788', '', 2022, 'bg.png', '2024-01-31', '2024-03-09', '2,000', 'dfsdfsddfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `recycle_bin`
--

CREATE TABLE `recycle_bin` (
  `recycle_ID` int(11) NOT NULL,
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
  `instruction` text DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_ID` int(11) NOT NULL,
  `equipment_ID` int(11) NOT NULL,
  `equipment_name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_ID`, `equipment_ID`, `equipment_name`, `status`) VALUES
(1, 28, 'White Board', 'Available'),
(2, 28, 'White Board', 'Available'),
(3, 28, 'White Board', 'Available');

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
(1, 'Kyle Kuzma', 'admin@wmsu.edu.ph', '$2y$10$4i0fG49uA1Z6PwBYbrMAVORPvB6Z0ZDS3s9ZbTwgkA7rlB5H8VjOO', 'admin', '000000', 'College of Medicine', 'kyle kuzma.jpg', 'alle', NULL, NULL),
(21, 'Vincent Robinson Balido', 'padwa@gmail.com', '$2y$10$NVLiU9YDLagVX8xBQ3e2deUt3zpc6pO1wCfFcXTARkQyA3371radS', 'user', '', 'CCS', 'paw.png', NULL, NULL, NULL),
(22, 'SHARNALYN BALUAN TULAWIE', 'pawtingkasan20@gmail.com', '$2y$10$JNN4Cf4s43XreWTCP80VRuJ.rVabu8CobSgqp/YhOJXISew.GF2Gy', 'user', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Padwa Tingkasan ', 'powie@gmail.com', '$2y$10$NDSdPKKn3Ou1DXAqAvwNneu9nOqxNaTZ..pwWg2hVrjnBT/DPIaCK', 'user', '8080', '', 'padwa.png', 'paw', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`request_ID`),
  ADD KEY `equipment_ID` (`equipment_ID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_ID`);

--
-- Indexes for table `recycle_bin`
--
ALTER TABLE `recycle_bin`
  ADD PRIMARY KEY (`recycle_ID`),
  ADD KEY `equipment_ID` (`equipment_ID`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_ID`,`equipment_name`),
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recycle_bin`
--
ALTER TABLE `recycle_bin`
  MODIFY `recycle_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`);

--
-- Constraints for table `recycle_bin`
--
ALTER TABLE `recycle_bin`
  ADD CONSTRAINT `fk_recycle_bin_equipment` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `recycle_bin_ibfk_1` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`equipment_ID`) REFERENCES `equipment` (`equipment_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
