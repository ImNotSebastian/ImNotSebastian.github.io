-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 02:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iCare`
--

-- --------------------------------------------------------

--
-- Table structure for table `BusinessOwners`
--

CREATE TABLE `BusinessOwners` (
  `Name` varchar(64) NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `OwnerID` bigint(20) UNSIGNED NOT NULL,
  `PhoneNum` int(16) NOT NULL,
  `ProductID` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BusinessOwners`
--

INSERT INTO `BusinessOwners` (`Name`, `UserName`, `Password`, `OwnerID`, `PhoneNum`, `ProductID`) VALUES
('biztest', 'biztest@biztest', 'biztest', 6, 1234567890, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Homeowners`
--

CREATE TABLE `Homeowners` (
  `Name` varchar(64) NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `PhoneNum` int(16) DEFAULT NULL,
  `PropertyID` bigint(20) UNSIGNED DEFAULT NULL,
  `CustomerID` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Homeowners`
--

INSERT INTO `Homeowners` (`Name`, `UserName`, `Password`, `PhoneNum`, `PropertyID`, `CustomerID`) VALUES
('test', 'test@test.test', 'test', 1234567890, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `Properties`
--

CREATE TABLE `Properties` (
  `PropertyID` bigint(20) UNSIGNED NOT NULL,
  `Address` varchar(64) NOT NULL,
  `Insurance` varchar(16) DEFAULT NULL,
  `Internet` varchar(16) DEFAULT NULL,
  `OwnerID` bigint(20) UNSIGNED NOT NULL,
  `Zipcode` int(5) DEFAULT NULL,
  `YardSize` int(6) DEFAULT NULL,
  `TreeCount` int(3) DEFAULT NULL,
  `Mbps` int(8) DEFAULT NULL,
  `DeviceCount` int(4) DEFAULT NULL,
  `BathroomCount` int(2) DEFAULT NULL,
  `FloorSize` int(6) DEFAULT NULL,
  `FloorPlans` mediumblob DEFAULT NULL,
  `BedCount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Properties`
--

INSERT INTO `Properties` (`PropertyID`, `Address`, `Insurance`, `Internet`, `OwnerID`, `Zipcode`, `YardSize`, `TreeCount`, `Mbps`, `DeviceCount`, `BathroomCount`, `FloorSize`, `FloorPlans`, `BedCount`) VALUES
(37, '123 abc street', NULL, NULL, 16, 83843, 123, 123, 123, 12, 1, 2, NULL, 2),
(38, 'Evil House', NULL, NULL, 16, 95123, 6000, 30, 12, 12, 1, 3, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Requests`
--

CREATE TABLE `Requests` (
  `RequestID` bigint(20) NOT NULL,
  `CustomerID` bigint(20) UNSIGNED DEFAULT NULL,
  `ProductID` bigint(20) DEFAULT NULL,
  `Description` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `ProductID` bigint(20) UNSIGNED NOT NULL,
  `Price` int(16) UNSIGNED NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Availability` varchar(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `BusinessID` bigint(20) UNSIGNED DEFAULT NULL,
  `Clients` bigint(20) UNSIGNED DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `Address` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Services`
--

INSERT INTO `Services` (`ProductID`, `Price`, `Description`, `Availability`, `name`, `BusinessID`, `Clients`, `zipcode`, `Address`) VALUES
(39, 12, '12', '123', 'bob', 6, NULL, 213, '123'),
(40, 12, '12', '123', 'bob', 6, NULL, 213, '123'),
(41, 12, '12', '12', 'qdqwd', 6, NULL, 12, '12'),
(42, 12, '12', '12', 'qdqwd', 6, NULL, 12, '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BusinessOwners`
--
ALTER TABLE `BusinessOwners`
  ADD PRIMARY KEY (`OwnerID`),
  ADD KEY `FK_BusinessOwners_ProductID` (`ProductID`);

--
-- Indexes for table `Homeowners`
--
ALTER TABLE `Homeowners`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `PropertyID` (`PropertyID`);

--
-- Indexes for table `Properties`
--
ALTER TABLE `Properties`
  ADD PRIMARY KEY (`PropertyID`),
  ADD KEY `fk_Properties_OwnerID` (`OwnerID`);

--
-- Indexes for table `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `idx_BusinessID` (`BusinessID`),
  ADD KEY `fk_clients` (`Clients`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BusinessOwners`
--
ALTER TABLE `BusinessOwners`
  MODIFY `OwnerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Homeowners`
--
ALTER TABLE `Homeowners`
  MODIFY `CustomerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `Properties`
--
ALTER TABLE `Properties`
  MODIFY `PropertyID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Requests`
--
ALTER TABLE `Requests`
  MODIFY `RequestID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `ProductID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BusinessOwners`
--
ALTER TABLE `BusinessOwners`
  ADD CONSTRAINT `FK_BusinessOwners_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `Services` (`ProductID`);

--
-- Constraints for table `Homeowners`
--
ALTER TABLE `Homeowners`
  ADD CONSTRAINT `PropertyID` FOREIGN KEY (`PropertyID`) REFERENCES `Properties` (`PropertyID`);

--
-- Constraints for table `Properties`
--
ALTER TABLE `Properties`
  ADD CONSTRAINT `fk_Properties_OwnerID` FOREIGN KEY (`OwnerID`) REFERENCES `Homeowners` (`CustomerID`);

--
-- Constraints for table `Services`
--
ALTER TABLE `Services`
  ADD CONSTRAINT `FK_BusinessOwners_Service` FOREIGN KEY (`BusinessID`) REFERENCES `BusinessOwners` (`OwnerID`),
  ADD CONSTRAINT `fk_clients` FOREIGN KEY (`Clients`) REFERENCES `Homeowners` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
