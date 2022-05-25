-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10
=======
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 03:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6
>>>>>>> 449125c07e9f3bfd6a4403c3e493175e2b90bb57

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
  `supplierName` varchar(20) NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdata`
--

INSERT INTO `orderdata` (`OID`, `user`, `status`, `date`, `supplierName`, `quantity`) VALUES
(1, 'testUser', 'onlyForTest', 'empty', 'Test', 1);

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
<<<<<<< HEAD
(1, 1, 'uploadedfiles/med-1.jpg'),
(2, 2, 'uploadedfiles/med-2.jpg'),
(3, 3, 'uploadedfiles/Panadol-Advance.jpeg'),
(4, 4, 'uploadedfiles/ibuprofen.jpeg'),
(6, 6, 'uploadedfiles/panadol-extra.jpg'),
(7, 7, 'uploadedfiles/Voltarol.jpeg\r\n'),
(8, 8, 'uploadedfiles/aspirin.jpeg'),
(9, 9, 'uploadedfiles/spray.jpg'),
=======
(1, 1, 'uploadedfiles/med-1.jfif'),
(2, 2, 'uploadedfiles/med-2.jpg'),
(3, 3, 'uploadedfiles/Panadol-Advance.jpeg'),
(4, 4, 'uploadedfiles/ibuprofen.jpeg'),
(5, 5, 'uploadedfiles/Panadol-Extra.avif'),
(6, 6, 'uploadedfiles/Panadol-Extra.avif'),
(7, 7, 'uploadedfiles/Voltarol.jpeg\r\n'),
(8, 8, 'uploadedfiles/aspirin.jpeg'),
(9, 9, 'uploadedfiles/spray.jfif'),
>>>>>>> 449125c07e9f3bfd6a4403c3e493175e2b90bb57
(10, 10, 'uploadedfiles/sinus.png'),
(11, 11, 'uploadedfiles/broncho.jpeg'),
(12, 12, 'uploadedfiles/strepsils.jpeg');

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
<<<<<<< HEAD
  `ID` int(9) NOT NULL,
=======
  `ID` int(11) NOT NULL,
>>>>>>> 449125c07e9f3bfd6a4403c3e493175e2b90bb57
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID`, `name`, `number`) VALUES
(1, 'supplier1', '1777666'),
(2, 'supplier2', '1777222');

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
<<<<<<< HEAD
(222, 'B1BBB', 'B1@email.com', 'B1b111', 'Pharmacist'),
(223, 'test2', 'Test12', 'test@gmail.com', 'Customer'),
(555, 'admin', 'admin@gmail.com', 'admiN1', 'Admin'),
(556, 'test1', 'Test11', 'test1@gmail.cm', 'Customer');
=======
(222, 'B1BBB', 'B1@email.com', 'bbBB11', 'Pharmacist');
>>>>>>> 449125c07e9f3bfd6a4403c3e493175e2b90bb57

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
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`PICTURE_ID`),
  ADD UNIQUE KEY `ID` (`ID`);

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdata`
--
ALTER TABLE `orderdata`
  MODIFY `OID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `PICTURE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Sid` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
<<<<<<< HEAD
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 449125c07e9f3bfd6a4403c3e493175e2b90bb57

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WID` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`UID`) REFERENCES `user` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
