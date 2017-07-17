-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2017 at 07:48 PM
-- Server version: 5.7.18-0ubuntu0.17.04.1-log
-- PHP Version: 7.0.18-0ubuntu0.17.04.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Mohabdb`
--
CREATE DATABASE IF NOT EXISTS `Mohabdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Mohabdb`;

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--
-- Creation: Jun 23, 2017 at 02:12 PM
--

DROP TABLE IF EXISTS `Address`;
CREATE TABLE IF NOT EXISTS `Address` (
  `AddressId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CityId` int(11) DEFAULT NULL,
  `StateId` int(11) DEFAULT NULL,
  `MainAddress` text NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`AddressId`),
  KEY `StateId` (`StateId`),
  KEY `CityId` (`CityId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Address`:
--

-- --------------------------------------------------------

--
-- Table structure for table `AnswerComments`
--
-- Creation: Jun 24, 2017 at 04:07 PM
--

DROP TABLE IF EXISTS `AnswerComments`;
CREATE TABLE IF NOT EXISTS `AnswerComments` (
  `AnswerCommentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `AnswerCommentText` text NOT NULL,
  `AnswerCommentDate` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CommentId` int(11) NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`AnswerCommentId`),
  KEY `UserId` (`UserId`),
  KEY `CommentId` (`CommentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `AnswerComments`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Avatar`
--
-- Creation: Jun 23, 2017 at 02:11 PM
--

DROP TABLE IF EXISTS `Avatar`;
CREATE TABLE IF NOT EXISTS `Avatar` (
  `AvatarId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `AvatarName` text,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`AvatarId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Avatar`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Cities`
--
-- Creation: Jun 22, 2017 at 03:09 PM
--

DROP TABLE IF EXISTS `Cities`;
CREATE TABLE IF NOT EXISTS `Cities` (
  `CityId` int(11) UNSIGNED NOT NULL,
  `CityTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Cities`:
--

-- --------------------------------------------------------

--
-- Table structure for table `CommentsLike`
--
-- Creation: Jun 23, 2017 at 02:28 PM
--

DROP TABLE IF EXISTS `CommentsLike`;
CREATE TABLE IF NOT EXISTS `CommentsLike` (
  `CommentLikeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CommentId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`CommentLikeId`),
  KEY `CommentId` (`CommentId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `CommentsLike`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Gender`
--
-- Creation: Jun 22, 2017 at 02:50 PM
--

DROP TABLE IF EXISTS `Gender`;
CREATE TABLE IF NOT EXISTS `Gender` (
  `GenderId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `GenderTitle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GenderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Gender`:
--

-- --------------------------------------------------------

--
-- Table structure for table `MainSlider`
--
-- Creation: Jun 24, 2017 at 04:30 PM
--

DROP TABLE IF EXISTS `MainSlider`;
CREATE TABLE IF NOT EXISTS `MainSlider` (
  `SlideId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SlideTitle` varchar(255) NOT NULL,
  `SlideDescription` text NOT NULL,
  `LinkUrl` text NOT NULL,
  `SlideImageName` text NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`SlideId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `MainSlider`:
--

-- --------------------------------------------------------

--
-- Table structure for table `MobileNumbers`
--
-- Creation: Jun 23, 2017 at 02:06 PM
--

DROP TABLE IF EXISTS `MobileNumbers`;
CREATE TABLE IF NOT EXISTS `MobileNumbers` (
  `MobileNumberId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Priority` bit(1) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`MobileNumberId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `MobileNumbers`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Month`
--
-- Creation: Jun 22, 2017 at 03:00 PM
--

DROP TABLE IF EXISTS `Month`;
CREATE TABLE IF NOT EXISTS `Month` (
  `MonthId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MonthTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`MonthId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- RELATIONS FOR TABLE `Month`:
--

-- --------------------------------------------------------

--
-- Table structure for table `OrderPayments`
--
-- Creation: Jul 02, 2017 at 06:59 AM
--

DROP TABLE IF EXISTS `OrderPayments`;
CREATE TABLE IF NOT EXISTS `OrderPayments` (
  `PaymentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `OrderId` int(11) NOT NULL,
  `PaymentYear` varchar(255) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`PaymentId`),
  KEY `OrderId` (`OrderId`),
  KEY `CustomerId` (`CustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `OrderPayments`:
--

-- --------------------------------------------------------

--
-- Table structure for table `OrderPaymentsStatus`
--
-- Creation: Jul 02, 2017 at 12:03 PM
--

DROP TABLE IF EXISTS `OrderPaymentsStatus`;
CREATE TABLE IF NOT EXISTS `OrderPaymentsStatus` (
  `OrderPaymentsStatusId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `OrderPaymentsStatus` varchar(512) NOT NULL,
  PRIMARY KEY (`OrderPaymentsStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `OrderPaymentsStatus`:
--

--
-- Dumping data for table `OrderPaymentsStatus`
--

INSERT INTO `OrderPaymentsStatus` (`OrderPaymentsStatusId`, `OrderPaymentsStatus`) VALUES
(1, 'WaitingPayment'),
(2, 'Paymented');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--
-- Creation: Jul 02, 2017 at 11:51 AM
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE IF NOT EXISTS `Orders` (
  `OrderId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserNo` varchar(512) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `OrderYear` varchar(50) NOT NULL,
  `OrderCount` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`OrderId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Orders`:
--

-- --------------------------------------------------------

--
-- Table structure for table `OrderStatus`
--
-- Creation: Jul 02, 2017 at 11:58 AM
--

DROP TABLE IF EXISTS `OrderStatus`;
CREATE TABLE IF NOT EXISTS `OrderStatus` (
  `OrderStatusId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `OrderStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`OrderStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `OrderStatus`:
--

--
-- Dumping data for table `OrderStatus`
--

INSERT INTO `OrderStatus` (`OrderStatusId`, `OrderStatus`) VALUES
(1, 'AddToOrders'),
(2, 'DeleteFromOrders');

-- --------------------------------------------------------

--
-- Table structure for table `PhoneNumbers`
--
-- Creation: Jul 13, 2017 at 03:40 PM
--

DROP TABLE IF EXISTS `PhoneNumbers`;
CREATE TABLE IF NOT EXISTS `PhoneNumbers` (
  `PhoneNumberId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PhoneNumber` bigint(20) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `Priority` bit(1) DEFAULT NULL,
  PRIMARY KEY (`PhoneNumberId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PhoneNumbers`:
--

-- --------------------------------------------------------

--
-- Table structure for table `PostCategories`
--
-- Creation: Jun 22, 2017 at 04:09 PM
--

DROP TABLE IF EXISTS `PostCategories`;
CREATE TABLE IF NOT EXISTS `PostCategories` (
  `CategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryTitle` text NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PostCategories`:
--

-- --------------------------------------------------------

--
-- Table structure for table `PostComments`
--
-- Creation: Jun 24, 2017 at 04:06 PM
--

DROP TABLE IF EXISTS `PostComments`;
CREATE TABLE IF NOT EXISTS `PostComments` (
  `PostCommentId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PostCommentText` text NOT NULL,
  `PostId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CommentDate` varchar(255) NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`PostCommentId`),
  KEY `PostId` (`PostId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PostComments`:
--

-- --------------------------------------------------------

--
-- Table structure for table `PostImages`
--
-- Creation: Jun 24, 2017 at 04:06 PM
--

DROP TABLE IF EXISTS `PostImages`;
CREATE TABLE IF NOT EXISTS `PostImages` (
  `PostImageId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PostImageName` text NOT NULL,
  `PostId` int(11) NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`PostImageId`),
  KEY `PostId` (`PostId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PostImages`:
--

-- --------------------------------------------------------

--
-- Table structure for table `PostLike`
--
-- Creation: Jun 23, 2017 at 02:24 PM
--

DROP TABLE IF EXISTS `PostLike`;
CREATE TABLE IF NOT EXISTS `PostLike` (
  `PostLikeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `PostId` int(11) NOT NULL,
  PRIMARY KEY (`PostLikeId`),
  KEY `PostId` (`PostId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PostLike`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--
-- Creation: Jul 06, 2017 at 04:49 PM
--

DROP TABLE IF EXISTS `Posts`;
CREATE TABLE IF NOT EXISTS `Posts` (
  `PostId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PostTitle` text NOT NULL,
  `PostCategoryId` int(11) NOT NULL,
  `PostAbstract` text,
  `PostMainText` text,
  `PostDate` varchar(255) DEFAULT NULL,
  `PageDescription` text,
  `PostKeyWords` text,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`PostId`),
  KEY `CategoryId` (`PostCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Posts`:
--

-- --------------------------------------------------------

--
-- Table structure for table `PostViewers`
--
-- Creation: Jun 23, 2017 at 02:26 PM
--

DROP TABLE IF EXISTS `PostViewers`;
CREATE TABLE IF NOT EXISTS `PostViewers` (
  `PostViewerId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PostId` int(11) NOT NULL,
  `IpAddress` varchar(255) NOT NULL,
  PRIMARY KEY (`PostViewerId`),
  KEY `PostId` (`PostId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `PostViewers`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Prices`
--
-- Creation: Jun 24, 2017 at 03:36 PM
--

DROP TABLE IF EXISTS `Prices`;
CREATE TABLE IF NOT EXISTS `Prices` (
  `PricesId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Date` varchar(255) NOT NULL,
  PRIMARY KEY (`PricesId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Prices`:
--

-- --------------------------------------------------------

--
-- Table structure for table `ProductCategories`
--
-- Creation: Jun 22, 2017 at 03:24 PM
--

DROP TABLE IF EXISTS `ProductCategories`;
CREATE TABLE IF NOT EXISTS `ProductCategories` (
  `CategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryTitle` text NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `ProductCategories`:
--

-- --------------------------------------------------------

--
-- Table structure for table `ProductImages`
--
-- Creation: Jun 24, 2017 at 04:14 PM
--

DROP TABLE IF EXISTS `ProductImages`;
CREATE TABLE IF NOT EXISTS `ProductImages` (
  `ProductImageId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductImageName` text NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`ProductImageId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `ProductImages`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--
-- Creation: Jul 06, 2017 at 04:50 PM
--

DROP TABLE IF EXISTS `Products`;
CREATE TABLE IF NOT EXISTS `Products` (
  `ProductId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductTitle` text NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Status` int(3) NOT NULL,
  `ProductDescription` text,
  `PageDescription` text,
  `PageKeyWords` text,
  PRIMARY KEY (`ProductId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Products`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Repository`
--
-- Creation: Jun 24, 2017 at 04:42 PM
--

DROP TABLE IF EXISTS `Repository`;
CREATE TABLE IF NOT EXISTS `Repository` (
  `RepositoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int(11) NOT NULL,
  `ProductCount` int(11) NOT NULL,
  PRIMARY KEY (`RepositoryId`),
  KEY `ProductId` (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Repository`:
--

-- --------------------------------------------------------

--
-- Table structure for table `States`
--
-- Creation: Jun 22, 2017 at 03:09 PM
--

DROP TABLE IF EXISTS `States`;
CREATE TABLE IF NOT EXISTS `States` (
  `StateId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `StateTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`StateId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `States`:
--

-- --------------------------------------------------------

--
-- Table structure for table `UserLevel`
--
-- Creation: Jun 23, 2017 at 03:00 PM
--

DROP TABLE IF EXISTS `UserLevel`;
CREATE TABLE IF NOT EXISTS `UserLevel` (
  `UserLevelId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `UserLevelTitle` varchar(255) NOT NULL,
  PRIMARY KEY (`UserLevelId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `UserLevel`:
--

--
-- Dumping data for table `UserLevel`
--

INSERT INTO `UserLevel` (`UserLevelId`, `UserLevelTitle`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
-- Creation: Jul 17, 2017 at 02:48 PM
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `UserId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `GenderId` int(11) DEFAULT NULL,
  `DayBirth` int(3) NOT NULL,
  `MonthBirth` int(3) NOT NULL,
  `YearBirth` int(11) NOT NULL,
  `NationalCode` int(11) DEFAULT NULL,
  `CardNumber` bigint(20) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `WebSiteAddress` varchar(255) DEFAULT NULL,
  `UserLevelId` int(11) NOT NULL,
  `Status` int(3) NOT NULL,
  PRIMARY KEY (`UserId`),
  KEY `GenderId` (`GenderId`),
  KEY `UserLevelId` (`UserLevelId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Users`:
--

-- --------------------------------------------------------

--
-- Table structure for table `Verification`
--
-- Creation: Jul 17, 2017 at 02:48 PM
--

DROP TABLE IF EXISTS `Verification`;
CREATE TABLE IF NOT EXISTS `Verification` (
  `VerificationId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Email` varchar(512) NOT NULL,
  `Active_Code` int(11) NOT NULL,
  PRIMARY KEY (`VerificationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `Verification`:
--
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
