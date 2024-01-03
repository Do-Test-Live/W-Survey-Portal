-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 11:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `inserted_at`) VALUES
(1, 'Survey Admin', 'test@survey.com', '@BCD1234', '', '2024-01-03 11:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 1,
  `question` text NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `answer` text NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `admin_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'Which option should be considered first in adult patients requiring parenteral nutrition\n(PN) support?', 'Central PN', 'Peripheral PN', 'Depends on the situation', '', '', '2024-01-03 15:49:03', '2024-01-03 15:49:03'),
(2, 1, 'What is the volume range commonly used when providing parenteral nutrition (PN) to\nadult patients?', '1000 ml to 1500 ml', '1500 ml to 2000 ml', '>2000ml', '', '', '2024-01-03 15:53:28', '2024-01-03 15:53:28'),
(3, 1, 'Is protein intake sufficient for most postoperative or critically ill patients?', 'Yes', 'No', 'Not a major factor', '', '', '2024-01-03 15:54:09', '2024-01-03 15:54:09'),
(4, 1, 'When considering parenteral nutrition (PN), do postoperative or critically ill patients\r\nrequire high protein supplementation?', 'Yes', 'No', 'Depends on the situation', '', '', '2024-01-03 15:55:18', '2024-01-03 15:55:18'),
(5, 1, 'Can high protein delivery in PN improve clinical function in critical illness patients?', 'Yes', 'No', 'Depends on the situation', '', '', '2024-01-03 15:56:02', '2024-01-03 15:56:02'),
(6, 1, 'Do you think high protein delivery is important not only during the acute phase, but also during the recovery phase to improve function in critical illness patients?', 'Yes', 'No', 'Depends on the situation', '', '', '2024-01-03 15:58:32', '2024-01-03 15:58:32'),
(7, 1, 'What is the consideration range for soybean oil in lipid emulsions when providing parenteral nutrition (PN)?', 'Less than 30%', 'Less than 50%', 'Less than 100%', '', '', '2024-01-03 15:59:42', '2024-01-03 15:59:42'),
(8, 1, 'What do you think are the benefits of using olive oil-based lipid emulsions in parenteral nutrition (PN)?', 'Immune effect', 'Inflammatory effect', 'Not available', '', '', '2024-01-03 16:00:58', '2024-01-03 16:00:58'),
(9, 1, 'Are sufficient micronutrients provided to patients requiring parenteral nutrition (PN)?', 'Yes', 'No', 'Not a major factor', '', '', '2024-01-03 16:01:39', '2024-01-03 16:01:39'),
(10, 1, 'Is osmolarity an important factor in patients’ tolerance to parenteral nutrition (PN)?', 'Important factor in central PN', 'Important factor in peripheral PN', 'Not a major factor', '', '', '2024-01-03 16:02:17', '2024-01-03 16:02:17'),
(11, 1, 'Does the type of lipid emulsion used in parenteral nutrition (PN) affect liver function in hospitalized patients?', 'Yes', 'No', 'Not a major factor', '', '', '2024-01-03 16:03:12', '2024-01-03 16:03:12'),
(12, 1, 'Is it necessary to discontinue parenteral nutrition (PN) when patients indicate liver\r\nfunction disturbance?', 'Discontinue PN', 'Change PN type if possible', 'Depends on the situation', '', '', '2024-01-03 16:04:01', '2024-01-03 16:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `survey_max_end_time` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `survey_max_end_time`, `time`, `inserted_at`, `updated_at`) VALUES
(1, 'Survey-End-Time', '01:00:00', '2024-01-03 16:24:19', '2024-01-03 16:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `survey_result`
--

CREATE TABLE `survey_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_taken_date` datetime NOT NULL,
  `survey_start` time NOT NULL,
  `survey_end` time NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `inserted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `inserted_at`, `updated_at`) VALUES
(1, 'User 1', 'user1@survey.com', '@BCD1234', '', '2024-01-03 16:22:29', '2024-01-03 16:22:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_result`
--
ALTER TABLE `survey_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_result`
--
ALTER TABLE `survey_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
