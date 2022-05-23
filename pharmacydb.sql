-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 01:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(9) NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Building` varchar(30) NOT NULL,
  `Block` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(9) NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` double NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Name`, `Description`, `Quantity`, `Price`, `Brand`, `Category`, `Photo`) VALUES
(1, 'First Medicine', 'First Medicine', 10, 3.99, 'First', 'Pill', 'Fill'),
(2, 'Second Medi', 'Second Medicine', 5, 1, 'Medi', 'Drink', 'Second'),
(3, 'Panadol Advance', 'Blue Panadol', 30, 0.35, 'Panadol', 'Pill', 'PanadolAd'),
(4, 'Ibuprofen', 'Anti-Inflammatory Drug', 25, 0.5, 'Ibuprofen', 'Pill', 'Ibuprofen'),
(6, 'Panadol Extra', 'Paracetemol', 15, 1.99, 'Panadol', 'Tablet', 'PanExtra'),
(7, 'Voltarol', 'Joint Pain relief', 20, 19.5, 'Voltarol', 'Gel', 'Volt'),
(8, 'Aspirin', 'Aspirin and Caffiene', 18, 2.79, 'Beechams', 'Pill', 'Aspirin'),
(9, 'Isotonic Nasal Hygiene Spray', 'A spray for nasal hygiene', 10, 2.79, 'Sterimar', 'Spray', 'SterimarSpray'),
(10, 'Sinus Rinse Kit', 'Rinisng kit to apply for sinuses', 20, 17.99, 'NeilMed', 'Inhaler', 'RinseKit'),
(11, 'BronchoStop Cough Syrup', 'Cough Syrup for treating fierce coughs', 30, 10.5, 'BronchoStop', 'Drink', 'BronchoSyrup'),
(12, 'Strepsils Honey & Lemon', 'Tablet for soothing sore throats', 40, 4.79, 'Strepsils', 'Tablet', 'Strepsils');

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `OID` int(9) NOT NULL,
  `user` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `supplier name` varchar(20) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PID` int(9) NOT NULL,
  `Full Name` varchar(20) NOT NULL,
  `card number` int(16) NOT NULL,
  `date` date NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Sid` int(9) NOT NULL,
  `CPR` int(9) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Academic Degree` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Building` varchar(30) NOT NULL,
  `Block` int(5) NOT NULL,
  `Picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(9) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Username`, `Email`, `Password`, `Type`) VALUES
(111, 'A1AAA', 'A1@email.com', 'aaAA11', 'Customer'),
(222, 'B1BBB', 'B1@email.com', 'B1B111', 'Pharmacist');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WID` int(9) NOT NULL,
  `item ID` int(9) NOT NULL,
  `CID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Sid`),
  ADD UNIQUE KEY `CPR` (`CPR`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WID`),
  ADD UNIQUE KEY `WID` (`WID`,`CID`),
  ADD UNIQUE KEY `CID` (`CID`),
  ADD UNIQUE KEY `item ID` (`item ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `OID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Sid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WID` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;