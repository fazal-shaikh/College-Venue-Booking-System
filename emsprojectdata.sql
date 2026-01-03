-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 06:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsprojectdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `venueid` varchar(20) NOT NULL,
  `vname` varchar(20) NOT NULL,
  `eid` varchar(20) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `edate` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `requestedby` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `inchargeApproval` varchar(10) NOT NULL,
  `principalApproval` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `venueid`, `vname`, `eid`, `ename`, `edate`, `start`, `end`, `requestedby`, `department`, `inchargeApproval`, `principalApproval`) VALUES
(134, 'NMV1', 'Sadananda Auditorium', 'sa', 'ds', '2021-12-20', 9, 11, 'admin', 'AI/ML', 'pending', 'pending'),
(135, 'NMV2', 'Sambhram Auditorium', 'gfds', 'Quiz', '2021-12-22', 10, 12, 'admin', 'CSE', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `venueid` varchar(10) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`venueid`, `start`, `end`) VALUES
('NMV1', 9, 10),
('NMV1', 10, 11),
('NMV1', 11, 12),
('NMV1', 12, 13),
('NMV1', 13, 14),
('NMV1', 14, 15),
('NMV1', 15, 16),
('NMV1', 16, 17),
('NMV1', 17, 18),
('NMV2', 9, 10),
('NMV2', 10, 11),
('NMV2', 11, 12),
('NMV2', 12, 13),
('NMV2', 13, 14),
('NMV2', 14, 15),
('NMV2', 15, 16),
('NMV2', 16, 17),
('NMV2', 17, 18),
('NMV3', 9, 10),
('NMV3', 10, 11),
('NMV3', 11, 12),
('NMV3', 12, 13),
('NMV3', 13, 14),
('NMV3', 14, 15),
('NMV3', 15, 16),
('NMV3', 16, 17),
('NMV3', 17, 18),
('NMV4', 9, 10),
('NMV4', 10, 11),
('NMV4', 11, 12),
('NMV4', 12, 13),
('NMV4', 13, 14),
('NMV4', 14, 15),
('NMV4', 15, 16),
('NMV4', 16, 17),
('NMV4', 17, 18),
('NMV5', 9, 10),
('NMV5', 10, 11),
('NMV5', 11, 12),
('NMV5', 12, 13),
('NMV5', 13, 14),
('NMV5', 14, 15),
('NMV5', 15, 16),
('NMV5', 16, 17),
('NMV5', 17, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@nmamit.in', 'nmamit100'),
(3, 'incharge', 'incharge@nmamit.in', 'incharge100'),
(4, 'principal', 'principal@gmail.com', 'prince123');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venueid` varchar(10) NOT NULL,
  `vname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venueid`, `vname`) VALUES
('NMV1', 'Civil Auditorium'),
('NMV2', 'Mechanical Auditorium'),
('NMV3', 'Shambhavi Hall'),
('NMV4', 'Sowparnika Hall'),
('NMV5', 'Phalguni Hall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venueid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
