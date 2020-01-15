-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 02:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classbookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `annex`
--

CREATE TABLE `annex` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annex`
--

INSERT INTO `annex` (`id`, `name`) VALUES
(1, 'Annex1'),
(2, 'Annex2'),
(3, 'Annex3'),
(4, 'Annex4'),
(5, 'Annex5');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `starttime` varchar(10) NOT NULL,
  `endtime` varchar(10) NOT NULL,
  `cancelledby` varchar(30) DEFAULT NULL,
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `userid`, `classid`, `courseid`, `status`, `date`, `description`, `starttime`, `endtime`, `cancelledby`, `addedby`) VALUES
(1, 7, 1, 1, 1, '2020-01-09', 'Booked', '8:00', '11:00', NULL, '2020-60'),
(2, 7, 1, 1, 1, '2020-01-18', 'Booked', '8:00', '9:30', '', '2020-60'),
(3, 7, 1, 1, 1, '2020-01-29', 'Booked', '8:00', '9:30', '', '2020-60'),
(10, 6, 1, 5, 1, '2020-01-31', 'Booked', '10:00', '12:00', NULL, '2020-2'),
(11, 6, 2, 5, 1, '2020-01-22', 'Booked', '2:00', '5:00', NULL, '2020-2'),
(12, 6, 2, 5, 1, '2020-01-26', 'Booked', '2:00', '5:00', NULL, '2020-2'),
(13, 6, 1, 5, 1, '2020-01-31', 'Booked', '3:30', '5:00', NULL, '2020-2'),
(14, 6, 1, 1, 1, '2020-02-17', 'Booked', '8:00', '9:30', NULL, '2020-2');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `roomname` varchar(10) NOT NULL,
  `typeid` int(11) NOT NULL,
  `annexid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `roomname`, `typeid`, `annexid`) VALUES
(1, '3101', 1, 3),
(2, '3201', 2, 3),
(3, '2101', 1, 2),
(4, '2202', 2, 2),
(5, '1101', 1, 1),
(6, '5201', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `coursename` text NOT NULL,
  `deptid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursename`, `deptid`) VALUES
(1, 'Algorithm', 2),
(2, 'Microprocessor', 3),
(3, 'English', 7),
(4, 'Accounting', 4),
(5, 'Design Model', 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'CSE'),
(3, 'EEE'),
(4, 'BBA'),
(5, 'COE'),
(6, 'ARCHITECTURE'),
(7, 'ENGLISH'),
(8, 'MATH'),
(9, 'BIOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(11) NOT NULL,
  `typename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `typename`) VALUES
(1, 'Theory'),
(2, 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 2,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `departmentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `name`, `email`, `password`, `phone`, `status`, `type`, `time`, `departmentid`) VALUES
(1, '2020-1', 'Mohammad Tareq', 'mddtareq@gmail.com', '07452544a8ab5fb6d62b3e9014c7f60b', '01982667024', 1, 1, '2020-01-07 23:35:32', 1),
(6, '2020-2', 'Nadia Bhuyan', 'nadia@gmail.com', '5012502b7bd3b2e56d6acd3a1922b2b9', '01765588782', 1, 2, '2020-01-12 20:46:25', 6),
(7, '2020-60', 'Rafe Bhuyan', 'Rafe@gmail.com', '42d4924a7542d3394b308ef62d41665b', '01982667025', 1, 2, '2020-01-10 18:42:25', 2),
(17, '2020-16', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '285614fcaca9a73ff836563135a1bd74', '01982667023', 1, 2, '2020-01-13 18:27:01', 5),
(79, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '228ecba9f0baedbee1b05f7e0f57c1ac', '01982667024', 0, 2, '2020-01-09 13:32:05', 3),
(80, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '228ecba9f0baedbee1b05f7e0f57c1ac', '01982667024', 0, 2, '2020-01-09 13:34:55', 3),
(81, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '285614fcaca9a73ff836563135a1bd74', '01982667024', 0, 2, '2020-01-09 14:14:59', 3),
(82, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '285614fcaca9a73ff836563135a1bd74', '01982667024', 0, 2, '2020-01-09 14:15:58', 5),
(83, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '285614fcaca9a73ff836563135a1bd74', '01982667024', 0, 2, '2020-01-09 14:17:53', 5),
(84, '2020-1', 'Tareq Mohammad', 'mhdtareq32@gmail.com', '285614fcaca9a73ff836563135a1bd74', '01982667024', 0, 2, '2020-01-09 14:25:39', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annex`
--
ALTER TABLE `annex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typeid` (`typeid`),
  ADD KEY `annexid` (`annexid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annex`
--
ALTER TABLE `annex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
