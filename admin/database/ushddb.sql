-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 08:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ushddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `act_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`act_id`, `user_name`, `name`, `activity`, `date`) VALUES
(1, '20004000', 'admin', 'add a student ddd', '2022-08-01 08:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `afirstname` varchar(200) NOT NULL,
  `alastname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `afirstname`, `alastname`) VALUES
(2, '2000', '2000', 'sanjana', 'dilhara'),
(3, 'ushd2022', 'ushd2022', 'ushd', 'admin'),
(4, 'sanjana', 'sanjana', 'admin', 'ushd');

-- --------------------------------------------------------

--
-- Table structure for table `c_course`
--

CREATE TABLE `c_course` (
  `cid` varchar(50) NOT NULL,
  `course` varchar(150) NOT NULL,
  `department` text NOT NULL,
  `year` varchar(20) NOT NULL,
  `sm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `c_course`
--

INSERT INTO `c_course` (`cid`, `course`, `department`, `year`, `sm`) VALUES
('efwefwef', '66', 'ICT', '1st', '1st'),
('EN 1001', 'Integrated English Language Skills for Technology', 'ALL', '1st', '1st'),
('FT 1201', 'Basic Mathematics ', 'ALL', '1st', '1st'),
('FT 1204', 'Computer Applications', 'ALL', '2nd', '1st'),
('FT 1301', 'Physics ', 'ALL', '1st', '1st'),
('IAT1201', 'Electronic ', 'IAT', '1st', '1st'),
('newc', '1102', 'ICTIAT', '1st', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `dep_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `dep_name`) VALUES
(1, 'ICT'),
(2, 'IAT'),
(3, 'ET'),
(4, 'AT');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `parent_comment` varchar(500) NOT NULL,
  `student` varchar(1000) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(1, '0', 'ghgh', 'eerer', '2022-07-31 21:14:43'),
(3, '1', 'rtrtr', 'rrrtr', '2022-08-01 17:22:18'),
(4, '0', 'gfgf', 'gfgfg', '2022-08-01 17:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `linktitle` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `cid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `title`, `mname`, `linktitle`, `link`, `cid`) VALUES
(80, 'fgvfgv', '', 'uj', '', 'efwefwef'),
(81, 'rgeg', '', 'rgeg', '', 'efwefwef'),
(85, 'aaa', '4345-DBMS-Labsheet-3.pdf', 'aaa', 'aaa', 'FT 1201');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `nid` int(10) NOT NULL,
  `topic` varchar(400) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adid` int(11) DEFAULT NULL,
  `lecid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`nid`, `topic`, `discription`, `date`, `adid`, `lecid`) VALUES
(509, 'admin notice', 'ghgh  g hg h g  gghghgg gjhgjg ghggjg gkjkluyuy dvcbc', '2022-08-01 09:43:17', 4, NULL),
(510, 'first notice', 'jh  hjghjh jhj hj h', '2022-08-01 09:49:10', 4, NULL),
(511, 'first notice', 'jh  hjghjh jhj hj h', '2022-08-01 09:49:13', 4, NULL),
(512, 'first notice', 'jh  hjghjh jhj hj h', '2022-08-01 09:49:18', 4, NULL),
(513, 'first notice', 'jh  hjghjh jhj hj h', '2022-08-01 09:49:18', 4, NULL),
(514, 'first notice', 'jh  hjghjh jhj hj h', '2022-08-01 09:49:19', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `year` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `dep` varchar(50) NOT NULL,
  `bg_year` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `year`, `sem`, `dep`, `bg_year`, `fname`) VALUES
(27, '2nd', '1st', 'ICT', 2019, '6670-labsheet4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dep_id` int(10) NOT NULL,
  `position` int(10) NOT NULL,
  `batch` int(6) DEFAULT NULL,
  `profile` varchar(200) NOT NULL DEFAULT 'profiles/noprofile.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `nic`, `phone`, `email`, `password`, `dep_id`, `position`, `batch`, `profile`) VALUES
(5, 'usr', 'usr', '20009000', '0773453675', 'ghhghjfgh@mail.com', '20009000', 1, 2, 0, 'profiles/noprofile.jpg'),
(7, 'sandeepa', 'fffff', '2004500', '0773453675', 'efwere@gmail.com', '2004900', 4, 1, 2020, 'profiles/noprofile.jpg'),
(10, 'daniel', 'dilhara', '22002223', '0767358574', 'sanjanadilhara2000@gmail.com', '22002223daniel', 2, 1, 2020, 'profiles/noprofile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `log_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`log_id`, `user_name`, `name`, `login_date`, `logout_date`) VALUES
(2, '2000', 'sanjana', '2022-08-01 08:14:26', '2022-08-01 13:48:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_course`
--
ALTER TABLE `c_course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_ibfk_1` (`cid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `notice_ibfk_1` (`adid`),
  ADD KEY `lecid` (`lecid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD KEY `dep_id` (`dep_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `c_course` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`adid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notice_ibfk_2` FOREIGN KEY (`lecid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
