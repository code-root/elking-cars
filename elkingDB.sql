-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2022 at 05:29 PM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elkingDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` text NOT NULL,
  `status` int(3) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `status`, `FullName`) VALUES
(1, 'admin', 'admin@gmail.com', '21cc9783658a11be7149e47251cc989a38c1e331', 2, 'El-king Cars');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `LicenseRelease` varchar(25) DEFAULT NULL,
  `LicenseExpiration` varchar(25) NOT NULL,
  `CariInspection` varchar(25) NOT NULL,
  `passage` varchar(25) DEFAULT NULL,
  `OunerName` varchar(25) DEFAULT NULL,
  `Category` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `motorID` varchar(25) DEFAULT NULL,
  `DateEntry` varchar(25) NOT NULL,
  `ExitDate` varchar(25) NOT NULL,
  `date` varchar(20) NOT NULL,
  `color` varchar(25) NOT NULL,
  `Plate` varchar(20) NOT NULL,
  `CarsID` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  `active` bit(1) NOT NULL,
  `FileID` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `IDNumber` varchar(25) NOT NULL,
  `PassportID` varchar(50) DEFAULT NULL,
  `AccountNumber` varchar(30) NOT NULL,
  `numderone` varchar(30) DEFAULT NULL,
  `numdertwo` int(11) NOT NULL,
  `number` varchar(25) NOT NULL,
  `addressone` varchar(255) NOT NULL,
  `addresstwo` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `FileID` varchar(25) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ddos`
--

CREATE TABLE `ddos` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `UniqueMachineID` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `duration_history`
--

CREATE TABLE `duration_history` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `receiptID` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payer` int(11) NOT NULL,
  `Residual` int(11) NOT NULL,
  `ToDate` text NOT NULL,
  `status` bit(1) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `IDNumber` varchar(25) NOT NULL,
  `AccountNumber` varchar(30) NOT NULL,
  `numderone` varchar(30) DEFAULT NULL,
  `numdertwo` int(11) NOT NULL,
  `number` varchar(25) NOT NULL,
  `addressone` varchar(30) NOT NULL,
  `addresstwo` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `FileID` varchar(25) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `number_count` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `outlay`
--

CREATE TABLE `outlay` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `customerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `number_count` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(11) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `kay` varchar(50) NOT NULL,
  `ex_date` int(11) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_receipt`
--

CREATE TABLE `payment_receipt` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `receiptID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `carsID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `total` varchar(25) NOT NULL,
  `payer` varchar(25) NOT NULL,
  `Residual` varchar(25) NOT NULL,
  `collectorsDate` varchar(25) DEFAULT NULL,
  `FromDate` varchar(25) DEFAULT NULL,
  `ToDate` varchar(25) DEFAULT NULL,
  `FileID` varchar(20) NOT NULL,
  `date` varchar(25) DEFAULT NULL,
  `status` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `snapchat` varchar(25) NOT NULL,
  `nameWeb` text,
  `instagram` varchar(30) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `address` text,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `snapchat`, `nameWeb`, `instagram`, `facebook`, `twitter`, `address`, `phone`, `email`) VALUES
(1, NULL, '', 'El-king Cars', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update-admin`
--

CREATE TABLE `update-admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploadedfile`
--

CREATE TABLE `uploadedfile` (
  `id` int(11) NOT NULL,
  `file` text,
  `rand` varchar(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `case` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` int(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `Registration` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ddos`
--
ALTER TABLE `ddos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duration_history`
--
ALTER TABLE `duration_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlay`
--
ALTER TABLE `outlay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update-admin`
--
ALTER TABLE `update-admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadedfile`
--
ALTER TABLE `uploadedfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ddos`
--
ALTER TABLE `ddos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duration_history`
--
ALTER TABLE `duration_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outlay`
--
ALTER TABLE `outlay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_receipt`
--
ALTER TABLE `payment_receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `update-admin`
--
ALTER TABLE `update-admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadedfile`
--
ALTER TABLE `uploadedfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
