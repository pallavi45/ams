-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2019 at 07:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id_number` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id_number`, `name`, `password`) VALUES
('R151541', 'Tejesh', '359@tejesh');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `subject`) VALUES
(1, 'SELAB');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `name`, `message`, `time`) VALUES
(1, 'TEJESH', 'Hello', '2019-04-25 16:15:22'),
(2, 'TEJESH', 'Every One', '2019-04-25 16:15:44'),
(3, 'Teja', 'Hi', '2019-04-25 16:17:21'),
(4, 'Teja', 'How are you?', '2019-04-25 16:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `CN`
--

CREATE TABLE `CN` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CNLAB`
--

CREATE TABLE `CNLAB` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commenter_name` varchar(30) NOT NULL,
  `comment_data` text NOT NULL,
  `post_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commenter_name`, `comment_data`, `post_time`) VALUES
('TEJESH', 'At What Time??', '2019-04-25 18:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `ENG`
--

CREATE TABLE `ENG` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `IAI`
--

CREATE TABLE `IAI` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ICC`
--

CREATE TABLE `ICC` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `IR`
--

CREATE TABLE `IR` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MAD`
--

CREATE TABLE `MAD` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MAD`
--

INSERT INTO `MAD` (`student_id`, `date`) VALUES
('R151541', '2019-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `MADLAB`
--

CREATE TABLE `MADLAB` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `title` varchar(200) NOT NULL,
  `files` text NOT NULL,
  `content` text NOT NULL,
  `comments` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`title`, `files`, `content`, `comments`, `date`) VALUES
('First Post', '', 'This is about the Software Engineering Lab.\r\nAll have to attend to the hall within the time.', '', '2019-04-25 18:10:36'),
('Second Post', '', 'Second Post Second Post Second Post\r\nSecond Post Second Post Second Post Second Post', '', '2019-04-25 18:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `SE`
--

CREATE TABLE `SE` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SELAB`
--

CREATE TABLE `SELAB` (
  `student_id` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_data`
--

CREATE TABLE `students_data` (
  `id_number` varchar(7) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `student_name` varchar(41) DEFAULT NULL,
  `nick_name` varchar(30) NOT NULL,
  `section` varchar(3) DEFAULT NULL,
  `ip_address` varchar(12) DEFAULT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_data`
--

INSERT INTO `students_data` (`id_number`, `password`, `student_name`, `nick_name`, `section`, `ip_address`, `date_of_birth`) VALUES
('R151518', '', 'PEDDA MEKALA MUKUNDA', 'MUKUNDA', 'B', '10.30.48.131', '0000-00-00'),
('R151117', '', 'THATIGUTLA HEMALATHA', 'HEMALATHA', 'B', '10.30.48.115', '0000-00-00'),
('R151567', '', 'KULAMPALLE SARADA', 'SARADA', 'B', '10.30.48.178', '0000-00-00'),
('R151279', '', 'YEDDULA SWETHA', '', 'B', '10.30.48.15', '0000-00-00'),
('R151204', 'tEAI3ZBw1fjUE', 'BODREDDI DIVYA', 'DIVYA', 'B', '10.30.48.204', '0000-00-00'),
('R151316', '', 'THIMMIGALLA SUKANYA', 'SUKANYA', 'B', '10.30.48.105', '0000-00-00'),
('R151418', '', 'K GEETHA', 'GEETHA', 'B', '10.30.48.37', '0000-00-00'),
('R151626', '', 'MUDE SARALA BAI', 'SARALA', 'B', '10.30.48.137', '0000-00-00'),
('R151523', '', 'K DEVISREE', 'DEVISREE', 'B', '10.30.48.147', '0000-00-00'),
('R151839', '', 'DONTHU BHAGYALAKSHMI', 'BHAGYALAKSHMI', 'B', '10.30.48.118', '0000-00-00'),
('R151016', '', 'PEDDA SOMAPPAGARI GAYATRI', 'GAYATRI', 'B', '10.30.48.130', '0000-00-00'),
('R151370', '', 'CHAVAKULA LAKSHMI PRIYANKA', 'PRIYANKA', 'B', '10.30.48.122', '0000-00-00'),
('R151271', '', 'MANNEM DEVESWARI', 'DEVESWARI', 'B', '10.30.48.44', '0000-00-00'),
('R151893', '', 'SHAIK CHANDINI', 'CHANDINI', 'B', '10.30.48.165', '0000-00-00'),
('R151619', '', 'BANDELA SRAVANI', 'SRAVANI', 'B', '10.30.48.166', '0000-00-00'),
('R151310', '', 'MADIGUNDU LATHA', 'LATHA', 'B', '10.30.48.24', '0000-00-00'),
('R151286', '', 'KOSURI GANESH REDDY', 'GANESH', 'B', '10.30.48.222', '0000-00-00'),
('R151032', '', 'S RAJASEKHAR', 'RAJASEKHAR', 'B', '10.30.48.234', '0000-00-00'),
('R151037', '123', 'PUJARI NAGENDRA', 'NAGENDRA', 'B', '10.30.48.218', '0000-00-00'),
('R151441', '', 'S SHASIDHAR', 'SHASIDHAR', 'B', '10.30.48.123', '0000-00-00'),
('R151541', 'tEVv0cO4tWyQM', 'PALAGIRI TEJESH', 'TEJESH', 'B', '10.30.48.11', '0000-00-00'),
('R151543', '', 'YAMMANURU VINAY TEJESWAR REDDY', '', 'B', '10.30.48.27', '0000-00-00'),
('R151284', '', 'NARE PAVAN KUMAR', 'PAVAN', 'B', '10.30.48.220', '0000-00-00'),
('R151189', '', 'EERA CHIKKAMMA GARI KULADEEPU', 'KULADEEPU', 'B', '10.30.48.237', '0000-00-00'),
('R151144', '', 'VASANTHU DHARANEESWARREDDY', 'DHARANEESWARREDDY', 'B', '10.30.48.225', '0000-00-00'),
('R151038', '', 'KAMINENI BALAJI', 'BALAJI', 'B', '10.30.48.104', '0000-00-00'),
('R151515', 'tEVv0cO4tWyQM', 'UDUGUNDLA SUSMITHA', 'Susmitha', 'D', '10.30.48.9', '0000-00-00'),
('R151100', 'tElmQNH4.Sxcw', 'Teja', 'Teja', 'B', '::1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students_ipaddress`
--

CREATE TABLE `students_ipaddress` (
  `ID` varchar(50) NOT NULL,
  `IP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_ipaddress`
--

INSERT INTO `students_ipaddress` (`ID`, `IP`) VALUES
('R151032', '10.30.48.234'),
('R151037', '10.30.48.218'),
('R151038', '10.30.48.104'),
('R151117', '10.30.48.115'),
('R151144', '10.30.48.225'),
('R151189', '10.30.48.237'),
('R151204', '10.30.48.204'),
('R151271', '10.30.48.44'),
('R151279', '10.30.48.15'),
('R151284', '10.30.48.220'),
('R151286', '10.30.48.222'),
('R151310', '10.30.48.24'),
('R151316', '10.30.48.105'),
('R151370', '10.30.48.122'),
('R151418', '10.30.48.37'),
('R151441', '10.30.48.123'),
('R151518', '10.30.48.131'),
('R151523', '10.30.48.147'),
('R151541', '10.30.48.11'),
('R151543', '10.30.48.27'),
('R151567', '10.30.48.178'),
('R151619', '10.30.48.166'),
('R151626', '10.30.48.137'),
('R151839', '10.30.48.118'),
('R151893', '10.30.48.165');

-- --------------------------------------------------------

--
-- Table structure for table `student_files`
--

CREATE TABLE `student_files` (
  `id` int(11) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `file_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_files`
--

INSERT INTO `student_files` (`id`, `student_id`, `file_name`) VALUES
(5, 'R151541', 'Leave.png'),
(6, 'R151515', 'viva questions and paper sets.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CN`
--
ALTER TABLE `CN`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `CNLAB`
--
ALTER TABLE `CNLAB`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `ENG`
--
ALTER TABLE `ENG`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `IAI`
--
ALTER TABLE `IAI`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `ICC`
--
ALTER TABLE `ICC`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `IR`
--
ALTER TABLE `IR`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `MAD`
--
ALTER TABLE `MAD`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `MADLAB`
--
ALTER TABLE `MADLAB`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `SE`
--
ALTER TABLE `SE`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `SELAB`
--
ALTER TABLE `SELAB`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `students_data`
--
ALTER TABLE `students_data`
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- Indexes for table `students_ipaddress`
--
ALTER TABLE `students_ipaddress`
  ADD UNIQUE KEY `IP` (`IP`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `student_files`
--
ALTER TABLE `student_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_files`
--
ALTER TABLE `student_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
