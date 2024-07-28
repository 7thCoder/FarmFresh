-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2024 at 12:12 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

DROP TABLE IF EXISTS `farmer`;
CREATE TABLE IF NOT EXISTS `farmer` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) NOT NULL,
  `Image` varchar(256) NOT NULL,
  `Role` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Subject` varchar(256) NOT NULL,
  `Message` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(256) NOT NULL,
  `clientId` varchar(256) NOT NULL,
  `SellerId` varchar(256) NOT NULL,
  `buyer` varchar(256) NOT NULL,
  `tel` varchar(256) NOT NULL,
  `adress` varchar(256) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `Price` varchar(256) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `SellerId` varchar(256) NOT NULL,
  `Image` varchar(256) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `Image` varchar(256) NOT NULL,
  `Status` varchar(256) NOT NULL,
  `adress` varchar(256) NOT NULL,
  `tel` varchar(256) NOT NULL,
  `products` varchar(256) NOT NULL,
  `registered` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `username`, `email`, `password`, `Image`, `Status`, `adress`, `tel`, `products`, `registered`) VALUES
(2, 'admin', 'admin@all.cm', 'admin', '', 'admin', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
