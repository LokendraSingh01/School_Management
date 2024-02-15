-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 05:19 AM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` text NOT NULL DEFAULT 'Admin',
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 'Admin', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(10) NOT NULL,
  `class` int(5) NOT NULL,
  `fees` int(15) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `class`, `fees`, `date`) VALUES
(1, 1, 20000, '2024-02-14'),
(2, 2, 24000, '2024-02-14'),
(3, 3, 26000, '2024-02-14'),
(4, 4, 28000, '2024-02-14'),
(5, 5, 30000, '2024-02-14'),
(6, 6, 32000, '2024-02-14'),
(7, 7, 34000, '2024-02-14'),
(8, 8, 36000, '2024-02-14'),
(9, 9, 38000, '2024-02-14'),
(10, 10, 40000, '2024-02-14'),
(11, 11, 42000, '2024-02-14'),
(21, 12, 45000, '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `roll_no` varchar(20) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `class` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(20) NOT NULL DEFAULT '000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_no`, `name`, `email`, `class`, `address`, `mob`, `gender`, `date`, `password`) VALUES
(7, '11AVM1.', 'Lokendra Singh', 'lokendra2672@gmail.com', 11, 'sikar rajasthan', '1234567898', 'Male', '2024-02-02', '12345'),
(8, '11AVM2', 'Palak saini', 'palak@gmail.com', 11, 'sikar rajasthan', '1234567898', 'Female', '2024-02-13', '4553456'),
(9, '12AVM1', 'kamal singh', 'kamal@gmail.com', 12, 'sikar rajasthan', '1234567898', 'Male', '2024-02-13', '24113213'),
(10, '12AVM2', 'akash', 'akash@gmail.com', 12, 'jaipur,rajasthan', '3414654323', 'Male', '2024-02-13', '4321'),
(12, '5AVM1', 'sohan', 'sohan@gmail.com', 5, 'sikar rajasthan', '3414654323', 'Male', '2024-02-01', '4321');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` int(10) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `class` int(3) NOT NULL,
  `paid_fee` int(10) NOT NULL DEFAULT 0,
  `due_fee` int(10) NOT NULL,
  `total_fees` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `roll_no`, `name`, `class`, `paid_fee`, `due_fee`, `total_fees`, `date`) VALUES
(1, '12AVM3', 'akash', 12, 10000, 34000, 44000, '2024-02-13'),
(2, '5AVM1', 'sohan', 5, 0, 30000, 30000, '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `techer`
--

CREATE TABLE `techer` (
  `id` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mob` varchar(11) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `class` varchar(50) NOT NULL,
  `salary` int(9) NOT NULL,
  `joining_date` date NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techer`
--

INSERT INTO `techer` (`id`, `name`, `email`, `mob`, `gender`, `address`, `subject`, `class`, `salary`, `joining_date`, `date`) VALUES
(2, 'Palak ', 'palak@gmail.com', '1234567898', 'Female', 'sikar rajasthan', 'java', '1,2,9', 89000, '2024-02-08', '2024-02-14 17:22:34.829202');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `techer`
--
ALTER TABLE `techer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `techer`
--
ALTER TABLE `techer`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
