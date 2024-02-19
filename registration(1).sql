-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 08:08 AM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`) VALUES
(1, 1, 'Brain'),
(2, 2, 'Networking'),
(3, 3, 'Malware'),
(4, 4, 'Spam'),
(5, 5, 'Hacker');

-- --------------------------------------------------------

--
-- Table structure for table `essay_answers`
--

CREATE TABLE `essay_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student` varchar(50) NOT NULL,
  `answer` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `essay_questions`
--

CREATE TABLE `essay_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `essay_questions`
--

INSERT INTO `essay_questions` (`id`, `question`, `level`, `subject`) VALUES
(1, 'Discuss tradeoff from continuity communication', 'NTA Level 8', 'mobile computing'),
(2, 'a) Discuss briefly on the concept of Block chain technology\r\nb) Explain various security mechanisms/ strategies to ensure security for Internet of things (IoT)', 'NTA Level 6', 'Computer Security & Cryptography');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `nta_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `subject`, `nta_level`) VALUES
(1, 'First boot sector virus is ______', 'Computed', 'Mind', 'Brain', 'Computer security', 8),
(2, 'The linking of computers with a communication system is called', 'Assembling', 'Pairing', 'Networking', 'Computer security', 8),
(3, 'The phrase ____ describe viruses, worms, Trojan horse, attack applets and attack scripts.', 'Spam', 'Malware', 'Virus', 'Computer security', 8),
(4, 'Abuse messaging systems to send unsolicited is', 'Spam', 'Firewall', 'Phishing', 'Computer security', 8),
(5, 'A person who uses his or expertise to gain access to other people\'s  computers to get information illegally is a', 'Analyst', 'Programmer', 'Hacker', 'Computer security', 8);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_answer` varchar(255) NOT NULL,
  `score` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `username`, `question_id`, `selected_answer`, `score`, `timestamp`) VALUES
(1, 'liazer', 1, 'Brain', 60, '2023-06-26 10:25:19'),
(2, 'liazer', 2, 'Networking', 60, '2023-06-26 10:25:37'),
(3, 'liazer', 3, 'Malware', 60, '2023-06-26 10:25:42'),
(4, 'liazer', 4, 'Firewall', 60, '2023-06-26 10:25:47'),
(5, 'liazer', 5, 'Programmer', 60, '2023-06-26 10:25:55'),
(6, 'ihonde', 1, 'Brain', 0, '2023-06-26 22:15:06'),
(7, 'ihonde', 2, 'Networking', 0, '2023-06-26 22:15:12'),
(8, 'ihonde', 3, 'Spam', 0, '2023-06-26 22:15:17'),
(9, 'ihonde', 4, 'Spam', 0, '2023-06-26 22:15:23'),
(10, 'ihonde', 5, 'Hacker', 0, '2023-06-26 22:15:26'),
(11, 'ihonde', 1, 'Brain', 0, '2023-06-26 22:24:06'),
(12, 'ihonde', 2, 'Networking', 0, '2023-06-26 22:24:11'),
(13, 'ihonde', 3, 'Malware', 0, '2023-06-26 22:24:15'),
(14, 'ihonde', 4, 'Firewall', 0, '2023-06-26 22:24:19'),
(15, 'ihonde', 5, 'Programmer', 0, '2023-06-26 22:24:27'),
(16, 'yggeorge', 1, 'Brain', 0, '2023-06-27 08:11:56'),
(17, 'yggeorge', 2, 'Networking', 0, '2023-06-27 08:12:03'),
(18, 'yggeorge', 3, 'Malware', 0, '2023-06-27 08:12:09'),
(19, 'yggeorge', 4, 'Firewall', 0, '2023-06-27 08:12:16'),
(20, 'yggeorge', 5, 'Hacker', 0, '2023-06-27 08:12:19'),
(21, 'yggeorge', 1, 'Brain', 0, '2023-07-13 22:21:49'),
(22, 'yggeorge', 2, 'Assembling', 0, '2023-07-13 22:22:21'),
(23, 'yggeorge', 3, 'Spam', 0, '2023-07-13 22:22:24'),
(24, 'yggeorge', 4, 'Spam', 0, '2023-07-13 22:22:28'),
(25, 'yggeorge', 5, 'Hacker', 0, '2023-07-13 22:22:33'),
(26, 'Jon6', 1, 'Brain', 0, '2023-09-16 15:56:39'),
(27, 'Jon6', 2, 'Networking', 0, '2023-09-16 15:56:52'),
(28, 'Jon6', 3, 'Malware', 0, '2023-09-16 15:57:03'),
(29, 'Jon6', 4, 'Spam', 0, '2023-09-16 15:57:10'),
(30, 'Jon6', 5, 'Hacker', 0, '2023-09-16 15:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','lecturer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(2, 'Stanley', '123456', 'lecturer'),
(4, 'Mango', '123456', 'student'),
(5, 'yggeorge', '123456', 'student'),
(8, 'Yusuph', '123456', 'lecturer'),
(9, 'Ramadhan', '123456', 'lecturer'),
(10, 'Hamis', '123456', 'lecturer'),
(11, 'mabduel', 'eyoel3377', 'lecturer'),
(12, 'liazer', '123456', 'student'),
(13, 'george', '123456', 'lecturer'),
(14, 'ihonde', '1234', 'student'),
(15, 'Jon6', '123456', 'student'),
(16, 'jonasy', '123456', 'lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `essay_answers`
--
ALTER TABLE `essay_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `essay_questions`
--
ALTER TABLE `essay_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question` (`question`),
  ADD KEY `id` (`question`),
  ADD KEY `id_2` (`question`),
  ADD KEY `id_3` (`question`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `essay_answers`
--
ALTER TABLE `essay_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `essay_questions`
--
ALTER TABLE `essay_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `essay_answers`
--
ALTER TABLE `essay_answers`
  ADD CONSTRAINT `essay_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `essay_questions` (`id`);

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
