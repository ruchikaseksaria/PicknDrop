-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 03:23 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickndrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addd`
--

CREATE TABLE `addd` (
  `admin` char(15) NOT NULL,
  `password` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addd`
--

INSERT INTO `addd` (`admin`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` int(6) UNSIGNED NOT NULL,
  `Pickup` varchar(50) NOT NULL,
  `Dropoff` varchar(50) NOT NULL,
  `PickTime` datetime NOT NULL,
  `Employee_ID` varchar(50) NOT NULL,
  `DriveID` varchar(15) NOT NULL,
  `status` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `Pickup`, `Dropoff`, `PickTime`, `Employee_ID`, `DriveID`, `status`) VALUES
(1, 'Mathikere', 'Marathali', '2019-12-08 17:27:17', 'PN232', '3', 0x31),
(2, 'Marathali', 'Kormangla', '2019-12-08 17:28:12', 'PN232', '2', 0x31),
(3, 'Sikar', 'Jaipur', '2019-12-08 17:29:04', 'PR123', '2', 0x31),
(4, 'Rammurti Nagar', 'Marathali', '2019-12-19 08:19:13', 'PR123', '3', 0x31),
(5, 'SP Road ', 'Town Hall', '2019-12-20 11:45:52', 'PN232', '2', 0x31),
(6, 'MG road', 'Ramaiah Bus stop', '2019-12-20 11:48:19', 'PN232', '2', 0x31),
(7, 'sds', 'sdf', '2019-12-21 10:14:00', 'RJ12', '', 0x30);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `did` int(6) UNSIGNED NOT NULL,
  `FirstName` char(15) NOT NULL,
  `LastName` char(15) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `City` char(10) NOT NULL,
  `CarName` varchar(10) NOT NULL,
  `CarNumber` varchar(10) NOT NULL,
  `CarInsuranceNo` varchar(15) NOT NULL,
  `Experience` varchar(30) NOT NULL,
  `Dlno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Password`, `City`, `CarName`, `CarNumber`, `CarInsuranceNo`, `Experience`, `Dlno`) VALUES
(1, 'chandu', 'mathur', 'ChandreshMathur@gmai', 2147483647, '123', 'Mumbai', 'Swift', 'RJ123', 'RJ9878809fr', '5 Years of experince', '677ERT'),
(2, 'Ram', 'Babu', 'ramk@gmail.com', 2147483647, '4152', 'Mumbai', 'i20', 'Rj131', 'RJ41141', '2 Years ', '09899Rj'),
(3, 'navdeep', 'rajpurohit', 'navdeep@gmail.com', 2147483647, '125', 'Pune', 'Swift', 'RJ5353', 'RJ244242', '6 Years ', '78646SHSH');

-- --------------------------------------------------------

--
-- Table structure for table `empdeet`
--

CREATE TABLE `empdeet` (
  `bid` int(6) UNSIGNED NOT NULL,
  `Name` char(20) NOT NULL,
  `Company_Name` varchar(15) NOT NULL,
  `Employee_ID` varchar(6) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empdeet`
--

INSERT INTO `empdeet` (`bid`, `Name`, `Company_Name`, `Employee_ID`, `Email`, `Password`, `PhoneNumber`, `Address`) VALUES
(1, 'Pranshu', 'olx', 'PR123', 'pras@gmail.com', '456', 2147483647, 'jaipur'),
(2, 'Prashant sharma', 'Cerner', 'PN232', 'pn@gmail.com', '412', 2147483647, 'Sikar'),
(45, 'fsadf', ' sdf', 'fsdf', 'fsdf@h', '6', 64, 'dsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `empdeet`
--
ALTER TABLE `empdeet`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `did` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `empdeet`
--
ALTER TABLE `empdeet`
  MODIFY `bid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
