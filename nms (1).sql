-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2021 at 08:10 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Email` text NOT NULL,
  `Password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('shaikh@gmail.com', 333),
('gandhi@gmail.com', 111),
('chaudhary@gmail.com', 222);

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Rating` int(11) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`Name`, `Email`, `Rating`, `Text`) VALUES
('Matin ', 'shaikhmatin3230@gmail.com', 5, ' This is the best site'),
('Paju', 'paju@gmail.com', 4, ' this better than others'),
('Pillu', 'pillu@gmail.com', 3, ' This is the best site i ever seen'),
('Paju', 'chmn@gmail.com', 5, ' This is best site i ever seen');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `From` text NOT NULL,
  `Title` text NOT NULL,
  `Desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`From`, `Title`, `Desc`) VALUES
('Shaikh Sir', 'Holidays', 'Due to COVID-19 There will be holidays of 3 months'),
('Gandhi Sir', 'Unit Test', 'After the holidays there will be unit test of all branches.'),
('Chaudhary Sir', 'Compitition', 'There will be Compitition in next Month');
