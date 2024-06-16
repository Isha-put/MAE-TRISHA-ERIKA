-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 11:59 AM
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
-- Database: `student_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `enrolled_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`enrolled_id`, `student_id`, `subject_id`) VALUES
(122, 123123, 1),
(123, 123123, 2),
(124, 123123, 9),
(125, 123123, 8),
(126, 123123, 19),
(127, 123123, 20),
(128, 123123, 21);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `address`, `date_of_birth`, `email`, `password`) VALUES
(60324, 'kirkfabonnnn@gmail.com', 'asdasd', '2024-06-15', 'adsasd', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `units` int(11) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `course_code`, `course_title`, `units`, `time`, `room`, `day`, `instructor`) VALUES
(1, 'IT GE ELEC 4', 'The Entrepreneurial Mind', 3, '10:00 12:00\r\n09:30 10:30', 'IT-AC203\r\n', 'W\r\nF', 'J.LUCAS\r\nJ.LUCAS\r\n'),
(2, 'GEC 9', 'The Life and Works of Rizal', 3, '01:00 02:30\r\n\r\n\r\n', 'IT-AC204\r\n', 'MW', 'A.GALOPE, JR.'),
(3, 'IT 221', 'Information Management', 3, '08:00 09:00\r\n01:00 02:00\r\n', 'IT-AL102', 'M\r\nF', 'D.Cabauatan\r\nD.Cabauatan'),
(4, 'IT 222', 'Networking 1', 3, '02:30 03:30 \r\n01:00 02:00', 'IT-АС106\r\nIT-AC208', 'W\r\nΤΗ', 'LTAPITAN\r\nLTAPITAN'),
(5, 'IT 223', 'Quantitative Methods (including modeling and simulation)', 3, '08:00 09:30\r\n\r\n\r\n', 'IT_AC303', 'THF', 'F.SUIP'),
(6, 'IT 224', 'Integrative Programming and Technologies', 3, '01:00 02:00 \r\n09:30 10:30\r\n02:00 05:00 \r\n\r\n', 'IT-AL104\r\nIT-АС203\r\nIT-AL104\r\n', 'T\r\nTH\r\nT', 'V.BALISI\r\nV.BALISI\r\nV.BALISI'),
(7, 'IT 225', 'Accounting for Information Technology', 3, '02:30 04:00\r\n\r\n\r\n', 'IT-AC211', 'MF', 'L.GAMMAD-Pasicolan'),
(8, 'IT APPDEV 1', 'Fundamentals of Mobile Technology', 3, '08:00 09:00\r\n03:30 04:30\r\n\r\n\r\n\r\n\r\n', 'IT-AL103\r\nIT-AC106\r\n', 'T\r\nW\r\n', 'LTAPITAN\r\nLTAPITAN'),
(9, 'PE 4', 'Physical Activity Towards Health and Fitness IV (Dance, Team Sports, Outdoor & Adventure Activities)', 2, '08:00 10:00\r\n', 'IT_AC303\r\n', 'W', 'M.DAILEG'),
(20, 'CITE 001', 'Object Oriented Programming', 3, '', '', '', ''),
(21, 'CITE 002', 'data structure and algorithm', 3, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`enrolled_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `enrolled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123128;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
