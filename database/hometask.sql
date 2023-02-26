-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 06:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hometask`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `sid` int(255) NOT NULL,
  `collegeid` varchar(255) NOT NULL,
  `collegename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`sid`, `collegeid`, `collegename`) VALUES
(1, 'clg0', 'surendranath college');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `sid` int(255) NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`sid`, `courseid`, `coursename`) VALUES
(1, 'crs0', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `sid` int(255) NOT NULL,
  `degreeid` varchar(255) NOT NULL,
  `degreename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`sid`, `degreeid`, `degreename`) VALUES
(1, 'deg0', 'Bsc');

-- --------------------------------------------------------

--
-- Table structure for table `deg_crs`
--

CREATE TABLE `deg_crs` (
  `sid` int(255) NOT NULL,
  `degid` varchar(255) NOT NULL,
  `crsid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deg_crs`
--

INSERT INTO `deg_crs` (`sid`, `degid`, `crsid`) VALUES
(1, 'deg0', 'crs0');

-- --------------------------------------------------------

--
-- Table structure for table `deg_crs_clg`
--

CREATE TABLE `deg_crs_clg` (
  `sid` int(255) NOT NULL,
  `degid` varchar(255) NOT NULL,
  `crsid` varchar(255) NOT NULL,
  `clgid` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deg_crs_clg`
--

INSERT INTO `deg_crs_clg` (`sid`, `degid`, `crsid`, `clgid`, `fee`) VALUES
(1, 'deg0', 'crs0', 'clg0', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sid` int(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `clgid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reqdate` varchar(255) NOT NULL,
  `statusdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sid`, `stud_id`, `clgid`, `name`, `number`, `dateofbirth`, `status`, `reqdate`, `statusdate`) VALUES
(1, 'o', 'd', '4', 'od', 'o', 'o', '', ''),
(2, '2019clg0deg0crs0001', 'clg0', 'shahensha alam', '8768009813', '2022-11-01', '2', '', ''),
(4, '2019clg0deg0crs0001', 'clg0', 'shahensha alam', '8768009810', '2022-11-01', '-1', '', ''),
(6, '2019clg0deg0crs0001', 'clg0', 'Shahensha Alam', '8768009813', '2022-11-01', '1', '19/11/2022 08:59:44 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sid` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `lvl` varchar(255) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sid`, `id`, `password`, `date`, `lvl`, `last_login`) VALUES
(1, 'admin', 'admin', '', '0', '20/11/2022 11:20:05 am'),
(2, 'clg0', 'clg0', '13/11/2022', '10', '19/11/2022 08:47:08 pm'),
(3, '2019clg0deg0crs0001', '20221101', '13/11/2022', '5', '19/11/2022 08:53:58 pm');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(255) NOT NULL,
  `myid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `dateofbirth` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `myid`, `name`, `number`, `dateofbirth`, `degree`, `course`, `college`, `session`, `fee`) VALUES
(1, '2019clg0deg0crs0001', 'shahensha alam', '8768009813', '2022-11-01', 'deg0', 'crs0', 'clg0', '2019', '10000.Rs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `deg_crs`
--
ALTER TABLE `deg_crs`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `deg_crs_clg`
--
ALTER TABLE `deg_crs_clg`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deg_crs`
--
ALTER TABLE `deg_crs`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deg_crs_clg`
--
ALTER TABLE `deg_crs_clg`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
