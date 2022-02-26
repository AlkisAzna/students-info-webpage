-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 172.19.0.1:6033
-- Generation Time: Dec 06, 2019 at 09:58 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nefos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `ID` varchar(20) NOT NULL,
  `NAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `FATHERSNAME` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `GRADE` float DEFAULT NULL,
  `MOBILENUMBER` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `BIRTHDAY` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`ID`, `NAME`, `SURNAME`, `FATHERSNAME`, `GRADE`, `MOBILENUMBER`, `BIRTHDAY`) VALUES
('1234567890', 'Gewrgia', 'Antonela', 'Argiris', 8.6, '6988900871', '1995-12-29'),
('2012030163', 'Ira', 'Katara', 'Antonis', 9.2, '6978678653', '1997-08-15'),
('2013030152', 'Giannis', 'Panos', 'Aleksandros', 7.7, '6985678654', '2013-08-07'),
('2014030052', 'Iwanna', 'Panagiotopoulou', 'Giwrgos', 6.4, '6985656354', '2019-10-07'),
('2015030010', 'Alkis', 'Aznavouridis', 'Pavlos', 8.6, '6988900870', '1995-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `ID` varchar(30) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`ID`, `NAME`, `SURNAME`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES
('1234567890', 'Admin', 'Admin', 'admin', 'admin', 'admin@gmail.com'),
('2015030010', 'Alkis', 'Aznavouridis', 'AlkisAzna', 'agelkis1995', 'alkaznavouridis@gmail.com'),
('5392104854', 'Xrisa', 'Xaniwtaki', 'XrisaXan', 'xrisaxan98', 'xrisa@gmail.com'),
('6532145698', 'Antonis', 'Paulopoulos', 'Antouan', 'antouan1995', 'antouan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
