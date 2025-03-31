-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 05:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` text NOT NULL,
  `Password` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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

CREATE TABLE `feed` (
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Rating` int(11) NOT NULL,
  `Text` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`Name`, `Email`, `Rating`, `Text`, `date`, `id`) VALUES
('Purva', 'purva@gmail.com', 5, ' Excellent !!', '2025-03-29', 4),
('Purva Gandhi', 'purva@gmail.com', 5, 'Very useful site for the colleges/schools', '2025-03-29', 5),
('Prajval', 'prajvalgandhi483@gmail.com', 4, 'Smooth user experience', '2025-03-29', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `From` text NOT NULL,
  `Title` text NOT NULL,
  `Desc` text NOT NULL,
  `id` int(11) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'general',
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`From`, `Title`, `Desc`, `id`, `attachment`, `category`, `featured`, `date`) VALUES
('Purva', 'Coding Competition', 'For third year students', 4, 'uploads/notices/67e7d95ee3220_SY BTECH MARKSHEET.pdf', 'events', 1, '2025-03-29'),
('Sports Department', 'Carrom Competition', 'Intercollege carrom competition is organizaed by our college. Do register.', 5, 'uploads/notices/67e7de6deafc6_44642.jpg', 'events', 1, '2025-03-29'),
('Neeta Gade', 'Class Test-2', 'This is to inform you, our Class Test to will be started from Monday. ', 6, 'uploads/notices/67e7dfb6012b6_67e7d95ee3220_SY BTECH MARKSHEET.pdf', 'examination', 1, '2025-03-29'),
('abc', 'temp', 'temp2', 8, 'uploads/DALL·E 2025-02-21 19.53.47 - A high-definition animated-style portrait of a young teenage male programmer sitting at a desk with a modern laptop fully visible from the back. He ha.webp', 'general', 0, '2025-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
