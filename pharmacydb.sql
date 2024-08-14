-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2024 at 07:16 PM
-- Server version: 8.0.39-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

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
  `CID` int NOT NULL,
  `Fname` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Building` varchar(30) NOT NULL,
  `Block` int NOT NULL,
  `UID` int NOT NULL,
  `Profile_pic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `Fname`, `Lname`, `Mobile`, `Building`, `Block`, `UID`, `Profile_pic`) VALUES
(2, 'Shaikh', 'Rahman', '38012087', '222', 222, 563, 'default.jpg'),
(3, 'testtwo', 'testtwo', '38222222', '2222', 222, 564, 'default.jpg'),
(4, 'Shaikh', 'Rahman', '38012087', '444', 444, 565, 'default.jpg'),
(5, 'customer', 'three', '35225256', '441', 5236, 568, 'default.jpg'),
(6, 'testperson', 'test perso', '38222222', '343', 245, 573, 'default.jpg'),
(7, 'Ahmed', 'Abdulla', '36363636', '999', 4444, 111, 'picpikawoah165505491139712933862a6223f5e215.png'),
(8, 'Alex', 'Hertz', '32425353', '545', 645, 575, 'picspooderman165556165211409242462adddb40d063.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int NOT NULL,
  `Name` varchar(70) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Quantity` int NOT NULL,
  `Price` double NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Category` varchar(30) NOT NULL,
  `expiry` date NOT NULL DEFAULT '2024-08-13',
  `status` varchar(30) NOT NULL DEFAULT 'present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Name`, `Description`, `Quantity`, `Price`, `Brand`, `Category`, `expiry`, `status`) VALUES
(1, 'First Medicine', 'First Medicine', -3, 3.99, 'First', 'Pill', '2027-02-11', 'deleted'),
(2, 'Second Medi', 'Second Medicine', 5, 1, 'Medi', 'Drink', '2022-05-24', 'present'),
(3, 'Panadol Advance', '  Blue Panadol', 18, 3.5, 'Panadol', 'Pill', '2023-05-25', 'deleted'),
(4, 'Ibuprofen', 'Anti-Inflammatory Drug', 0, 0.5, 'Ibuprofen', 'Pill', '2022-12-22', 'present'),
(6, 'Panadol Extra', 'Paracetemol', 14, 1.99, 'Panadol', 'Tablet', '2026-10-18', 'present'),
(7, 'Voltarol', 'Joint Pain relief', 12, 19.5, 'Voltarol', 'Gel', '2028-05-25', 'present'),
(8, 'Aspirin', 'Aspirin and Caffiene', 15, 2.79, 'Beechams', 'Pill', '2028-08-19', 'present'),
(9, 'Isotonic Nasal Hygiene Spray', ' A spray for nasal hygiene', 7, 2.79, 'Sterimar', 'Spray', '2027-05-25', 'present'),
(10, 'Sinus Rinse Kit', 'Rinisng kit to apply for sinuses', 20, 17.99, 'NeilMed', 'Inhaler', '2028-05-25', 'present'),
(11, 'BronchoStop Cough Syrup', 'Cough Syrup for treating fierce coughs', 30, 10.5, 'BronchoStop', 'Drink', '2029-05-25', 'present'),
(12, 'Strepsils Honey & Lemon', 'Tablet for soothing sore throats', 40, 4.79, 'Strepsils', 'Tablet', '2030-05-25', 'present'),
(13, 'diarrhoea medicine', 'for diarrhoea', 1, 12, 'Bromine', 'pill', '2022-05-26', 'present'),
(14, 'diarrhoea medicine2', 'for diarrhoea2', 2, 2, 'philix', 'pill', '2022-05-26', 'present'),
(15, 'diarrhoea medicine3', 'for diarrhoea3', 3, 3, 'venom', 'pill', '2022-05-26', 'present'),
(16, 'diarrhoea medicine4', 'for diarrhoea4', 4, 4, 'spider', 'pill', '2022-05-26', 'present'),
(17, 'diarrhoea medicine4', 'for diarrhoea4', 4, 4, 'spider', 'pill', '2022-05-26', 'present'),
(18, 'Kalbol', 'cough syrup', 5, -2.5, 'Clarider', 'pill', '2022-05-26', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `orderdata`
--

CREATE TABLE `orderdata` (
  `OID` int NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `supplier_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `PICTURE_ID` int NOT NULL,
  `ID` int NOT NULL,
  `PICTURE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int NOT NULL,
  `item_id` int NOT NULL,
  `c_id` int NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(7, 3, 111, 1, '2022-05-26'),
(8, 1, 111, 8, '2022-06-12'),
(9, 1, 111, 8, '2022-06-12'),
(10, 1, 111, 8, '2022-06-12'),
(11, 1, 111, 8, '2022-06-12'),
(12, 1, 111, 8, '2022-06-12'),
(13, 1, 111, 8, '2022-06-12'),
(14, 4, 111, 8, '2022-06-12'),
(15, 4, 111, 8, '2022-06-12'),
(16, 4, 111, 8, '2022-06-12'),
(17, 4, 111, 9, '2022-06-12'),
(18, 3, 111, 1, '2022-06-12'),
(19, 3, 111, 1, '2022-06-12'),
(20, 3, 111, 6, '2022-06-12'),
(21, 8, 111, 1, '2022-06-12'),
(22, 8, 111, 4, '2022-06-12'),
(23, 8, 111, 6, '2022-06-12'),
(24, 9, 111, 1, '2022-06-12'),
(25, 9, 111, 3, '2022-06-12'),
(26, 9, 111, 2, '2022-06-12'),
(27, 9, 111, 1, '2022-06-12'),
(38, 3, 575, 1, '2022-06-18'),
(39, 4, 575, 1, '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Sid` int NOT NULL,
  `CPR` int NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Academic Degree` varchar(30) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Building` varchar(30) NOT NULL,
  `Block` int NOT NULL,
  `Picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `contract` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `name`, `number`, `contract`) VALUES
(3, 'tahmid', '17777777', 'active'),
(4, 'KAnoo', '17254856', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `Username`, `Email`, `Password`, `Type`) VALUES
(111, 'Tahmid', 'A1@email.com', 'Abcde1', 'Customer'),
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
(574, 'pharma6', 'pharma6@gmail.com', 'Pharma6', 'Pharmacist'),
(575, 'arhertz', 'arhertz@gmail.com', 'Arhertz1', 'Customer');

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
  MODIFY `CID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `OID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `PICTURE_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Sid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

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
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchase_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`),
  ADD CONSTRAINT `fk_purhase_customer` FOREIGN KEY (`c_id`) REFERENCES `user` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
