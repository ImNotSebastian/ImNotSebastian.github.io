-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2024 at 08:15 AM
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
-- Table structure for table `Businesses`
--

CREATE TABLE `Businesses` (
  `BusinessID` bigint(20) UNSIGNED NOT NULL,
  `CompanyName` varchar(64) NOT NULL,
  `Availability` varchar(64) NOT NULL,
  `ProductID` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `BusinessID` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BusinessOwners`
--

INSERT INTO `BusinessOwners` (`Name`, `UserName`, `Password`, `OwnerID`, `PhoneNum`, `BusinessID`) VALUES
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
(37, '123 abc street', NULL, NULL, 16, 83843, 123, 123, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Evil House', NULL, NULL, 16, 95123, 6000, 30, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Services`
--

CREATE TABLE `Services` (
  `ProductID` bigint(20) UNSIGNED NOT NULL,
  `BusinessID` bigint(20) UNSIGNED NOT NULL,
  `Price` int(16) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Availability` int(16) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Businesses`
--
ALTER TABLE `Businesses`
  ADD PRIMARY KEY (`BusinessID`),
  ADD KEY `fk_ProductID` (`ProductID`);

--
-- Indexes for table `BusinessOwners`
--
ALTER TABLE `BusinessOwners`
  ADD PRIMARY KEY (`OwnerID`),
  ADD KEY `BusinessID` (`BusinessID`);

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
-- Indexes for table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `BusinessService` (`BusinessID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Businesses`
--
ALTER TABLE `Businesses`
  MODIFY `BusinessID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `Services`
--
ALTER TABLE `Services`
  MODIFY `ProductID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Businesses`
--
ALTER TABLE `Businesses`
  ADD CONSTRAINT `fk_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `Services` (`ProductID`);

--
-- Constraints for table `BusinessOwners`
--
ALTER TABLE `BusinessOwners`
  ADD CONSTRAINT `BusinessID` FOREIGN KEY (`BusinessID`) REFERENCES `Businesses` (`BusinessID`);

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
  ADD CONSTRAINT `BusinessService` FOREIGN KEY (`BusinessID`) REFERENCES `Businesses` (`BusinessID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
