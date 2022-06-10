-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 02:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
  `Block` int(5) NOT NULL,
  `UID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `Fname`, `Lname`, `Mobile`, `Building`, `Block`, `UID`) VALUES
(2, 'Shaikh', 'Rahman', '38012087', '222', 222, 563),
(3, 'testtwo', 'testtwo', '38222222', '2222', 222, 564),
(4, 'Shaikh', 'Rahman', '38012087', '444', 444, 565),
(5, 'customer', 'three', '35225256', '441', 5236, 568),
(6, 'testperson', 'test perso', '38222222', '343', 245, 573),
(7, 'Ahmed', 'Abdulla', '36363636', '999', 333, 111);

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
  `Photo` varchar(30) NOT NULL,
  `expiry` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Name`, `Description`, `Quantity`, `Price`, `Brand`, `Category`, `Photo`, `expiry`) VALUES
(1, 'First Medicine', 'First Medicine', 9, 3.99, 'First', 'Pill', 'Fill', '2027-02-11'),
(2, 'Second Medi', 'Second Medicine', 5, 1, 'Medi', 'Drink', 'Second', '2022-05-24'),
(3, 'Panadol Advance', 'Blue Panadol', 29, 0.35, 'Panadol', 'Pill', 'PanadolAd', '2023-05-25'),
(4, 'Ibuprofen', 'Anti-Inflammatory Drug', 25, 0.5, 'Ibuprofen', 'Pill', 'Ibuprofen', '2022-12-22'),
(6, 'Panadol Extra', 'Paracetemol', 15, 1.99, 'Panadol', 'Tablet', 'PanExtra', '2022-10-18'),
(7, 'Voltarol', 'Joint Pain relief', 19, 19.5, 'Voltarol', 'Gel', 'Volt', '2025-05-25'),
(8, 'Aspirin', 'Aspirin and Caffiene', 18, 2.79, 'Beechams', 'Pill', 'Aspirin', '2026-05-25'),
(9, 'Isotonic Nasal Hygiene Spray', 'A spray for nasal hygiene', 10, 2.79, 'Sterimar', 'Spray', 'SterimarSpray', '2027-05-25'),
(10, 'Sinus Rinse Kit', 'Rinisng kit to apply for sinuses', 20, 17.99, 'NeilMed', 'Inhaler', 'RinseKit', '2028-05-25'),
(11, 'BronchoStop Cough Syrup', 'Cough Syrup for treating fierce coughs', 30, 10.5, 'BronchoStop', 'Drink', 'BronchoSyrup', '2029-05-25'),
(12, 'Strepsils Honey & Lemon', 'Tablet for soothing sore throats', 40, 4.79, 'Strepsils', 'Tablet', 'Strepsils', '2030-05-25'),
(13, 'diarrhoea medicine', 'for diarrhoea', 1, 12, 'Bromine', 'pill', 'diarrhoea.jpg', '2022-05-26'),
(14, 'diarrhoea medicine2', 'for diarrhoea2', 2, 2, 'philix', 'pill', 'diarrhoea.jpg', '2022-05-26'),
(15, 'diarrhoea medicine3', 'for diarrhoea3', 3, 3, 'venom', 'pill', 'diarrhoea.jpg', '2022-05-26'),
(16, 'diarrhoea medicine4', 'for diarrhoea4', 4, 4, 'spider', 'pill', 'diarrhoea.jpg', '2022-05-26'),
(17, 'diarrhoea medicine4', 'for diarrhoea4', 4, 4, 'spider', 'pill', 'diarrhoea.jpg', '2022-05-26'),
(18, 'Kalbol', 'cough syrup', -5, -2.5, 'Clarider', 'pill', 'diarrhoea.jpg', '2022-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `OID` int(9) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `supplier_id` int(20) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `PICTURE_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `PICTURE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`PICTURE_ID`, `ID`, `PICTURE`) VALUES
(1, 1, 'med-1.jpg'),
(2, 2, 'med-2.jpg'),
(3, 3, 'Panadol-Advance.jpeg'),
(4, 4, 'ibuprofen.jpeg'),
(6, 6, 'panadol-extra.jpg'),
(7, 7, 'Voltarol.jpeg\r\n'),
(8, 8, 'aspirin.jpeg'),
(9, 9, 'spray.jpg'),
(10, 10, 'sinus.png'),
(11, 11, 'broncho.jpeg'),
(12, 12, 'strepsils.jpeg'),
(13, 14, 'diarrhoea.jpg'),
(14, 15, 'diarrhoea.jpg'),
(15, 16, 'diarrhoea.jpg'),
(16, 17, 'diarrhoea.jpg'),
(17, 18, 'diarrhoea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pictures`
--

CREATE TABLE `profile_pictures` (
  `pfpID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `Profile_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_pictures`
--

INSERT INTO `profile_pictures` (`pfpID`, `UID`, `Profile_pic`) VALUES
(1, 111, 'default.jpg'),
(2, 223, 'default.jpg'),
(3, 563, 'default.jpg'),
(4, 564, 'default.jpg'),
(5, 565, 'default.jpg'),
(6, 568, 'default.jpg'),
(7, 573, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `item_id`, `c_id`, `quantity`, `date`) VALUES
(1, 7, 111, 3, '2022-05-25'),
(2, 1, 111, 7, '2022-05-25'),
(3, 3, 111, 2, '2022-05-24'),
(4, 4, 568, 5, '2022-05-17'),
(5, 10, 568, 20, '2022-04-12'),
(6, 7, 573, 1, '2022-05-26'),
(7, 3, 111, 1, '2022-05-26');

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
  `ID` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `name`, `number`) VALUES
(1, 'supplier1', '1777666'),
(2, 'supplier2', '1777222'),
(3, 'tahmid', '17777777'),
(4, 'KAnoo', '17254856');

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
(223, 'test2', 'Test12', 'test@gmail.com', 'Customer'),
(555, 'admin', 'admin@gmail.com', 'admiN1', 'Admin'),
(563, 'Test11', 'Test11', 'shaikhtahmidurrahman10@gmail.com', 'Customer'),
(564, 'test2222', 'Test22', 'testtwo@gmail.com', 'Customer'),
(565, 'test22211', 'Test2222', 'shaikhtahmidurrahman10@gmail.com', 'Customer'),
(566, 'pharma2', 'pharm2@gmail.com', 'Pharma2', 'Pharmacist'),
(568, 'customer3', 'customer3@gmail.com', 'Customer3', 'Customer'),
(570, 'pharma4', 'pharma4@fdfd.cd', 'Pharma4', 'Pharmacist'),
(571, 'Pharma5', 'pharma5@fdfd.dfs', 'Pharma5', 'Pharmacist'),
(573, 'testperson', 'testperson@gmail.com', 'Testperson1', 'Customer'),
(574, 'pharma6', 'pharma6@gmail.com', 'Pharma6', 'Pharmacist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `UID` (`UID`),
  ADD KEY `UID_2` (`UID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`PICTURE_ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `profile_pictures`
--
ALTER TABLE `profile_pictures`
  ADD PRIMARY KEY (`pfpID`),
  ADD UNIQUE KEY `UID` (`UID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Sid`),
  ADD UNIQUE KEY `CPR` (`CPR`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `OID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `PICTURE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profile_pictures`
--
ALTER TABLE `profile_pictures`
  MODIFY `pfpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Sid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=575;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `orderdata`
--
ALTER TABLE `orderdata`
  ADD CONSTRAINT `fk_order_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`ID`);

--
-- Constraints for table `profile_pictures`
--
ALTER TABLE `profile_pictures`
  ADD CONSTRAINT `fk_pfpPictures_user` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchase_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`),
  ADD CONSTRAINT `fk_purhase_customer` FOREIGN KEY (`c_id`) REFERENCES `user` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
