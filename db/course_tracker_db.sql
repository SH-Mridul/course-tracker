-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 09:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses_table`
--

CREATE TABLE `courses_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `couse_credit` float(10,1) NOT NULL,
  `course_code` int(11) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `mid_exam` tinyint(1) NOT NULL DEFAULT 0,
  `final_exam` tinyint(1) NOT NULL DEFAULT 0,
  `mark_as_retake` tinyint(1) NOT NULL DEFAULT 0,
  `course_status` tinyint(1) NOT NULL DEFAULT 1,
  `mark_as_passed` tinyint(1) NOT NULL DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_table`
--

INSERT INTO `courses_table` (`id`, `user_id`, `course_title`, `couse_credit`, `course_code`, `faculty_name`, `mid_exam`, `final_exam`, `mark_as_retake`, `course_status`, `mark_as_passed`, `is_delete`) VALUES
(1, 1, 'AI', 3.0, 123, 'Maliha', 1, 1, 0, 0, 1, 0),
(2, 1, 'computer fundamental', 3.0, 122, 'Taofica Amrin', 1, 1, 0, 0, 1, 0),
(3, 2, 'AI', 3.0, 123, 'Maliha', 1, 1, 0, 0, 1, 0),
(4, 2, 'computer fundamental', 3.0, 122, 'Taofica Amrin', 1, 1, 0, 0, 1, 0),
(5, 2, 'Computer Networking ', 3.0, 332, 'Monoara begum', 1, 1, 0, 0, 1, 0),
(6, 1, 'Computer Networking ', 3.0, 332, 'Monoara Begum', 1, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `user_name`, `user_email`, `user_password`, `user_status`) VALUES
(1, 'mridul', 'mridul@gmail.com', 'mridul123', 1),
(2, 'runa', 'runa@gmail.com', 'runa123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_table`
--
ALTER TABLE `courses_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_table`
--
ALTER TABLE `courses_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
