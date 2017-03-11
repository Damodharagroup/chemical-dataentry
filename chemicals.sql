-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2017 at 05:47 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemicals`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE `ADDRESS` (
  `AID` int(11) NOT NULL,
  `DOORNO` varchar(30) DEFAULT NULL,
  `STREETNO` varchar(30) DEFAULT NULL,
  `LOCALITY` varchar(30) DEFAULT NULL,
  `TOWN` varchar(20) DEFAULT NULL,
  `STATE` varchar(20) DEFAULT NULL,
  `PIN` int(11) DEFAULT NULL,
  `CONTACT` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADDRESS`
--

INSERT INTO `ADDRESS` (`AID`, `DOORNO`, `STREETNO`, `LOCALITY`, `TOWN`, `STATE`, `PIN`, `CONTACT`, `EMAIL`) VALUES
(1, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5132, '13165', 'tssd19@gmail.com'),
(2, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '13165', 'tssd19@gmail.com'),
(3, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '131658', 'tssd19@gmail.com'),
(4, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '131659', 'tssd19@gmail.com'),
(5, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '131650', 'tssd19@gmail.com'),
(6, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '131650', 'tssd19@gmail.com'),
(7, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '1316501', 'tssd19@gmail.com'),
(8, '78', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '1316501', 'tssd19@gmail.com'),
(9, '781', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '21312311', 'tssd19@gmail.com'),
(10, '781', '4125', 'tyd', 'bnvnb', 'nbv', 5137, '456468', 'tssd19@gmail.com'),
(11, '789', '4578/445', 'foreign', 'local', 'same', 456789, '9963587412', '78@outlook.com'),
(12, 'n,n', 'n', 'k', 'jk', 'k', 465, '54', '6545dxvs');

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ADMIN`
--

INSERT INTO `ADMIN` (`username`, `password`) VALUES
('swaroop', 'harekrishna@108');

-- --------------------------------------------------------

--
-- Table structure for table `CHEMCOMP`
--

CREATE TABLE `CHEMCOMP` (
  `COMP_ID` int(11) NOT NULL,
  `CASRN` varchar(50) NOT NULL,
  `PURITY` varchar(10) NOT NULL,
  `NATURE` varchar(10) DEFAULT NULL,
  `MINQUANTITY` varchar(10) DEFAULT NULL,
  `MAXQUANTITY` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CHEMICALS`
--

CREATE TABLE `CHEMICALS` (
  `CASRN` varchar(20) NOT NULL,
  `CHEM_NAME` varchar(50) NOT NULL,
  `PUBCHEMID` int(11) NOT NULL,
  `MOLECULAR_WEIGHT` float NOT NULL,
  `DENSITY` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CHEMICALS`
--

INSERT INTO `CHEMICALS` (`CASRN`, `CHEM_NAME`, `PUBCHEMID`, `MOLECULAR_WEIGHT`, `DENSITY`) VALUES
('343', 'lksdja', 455, 454, 65);

-- --------------------------------------------------------

--
-- Table structure for table `COMPANY`
--

CREATE TABLE `COMPANY` (
  `COMP_ID` int(11) NOT NULL,
  `COMP_NAME` varchar(50) NOT NULL,
  `ADDRESSID` int(11) DEFAULT NULL,
  `PRODUCT_TYPE` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMPANY`
--

INSERT INTO `COMPANY` (`COMP_ID`, `COMP_NAME`, `ADDRESSID`, `PRODUCT_TYPE`) VALUES
(2, 'Keerthis', 7, 'gas'),
(3, 'datta', 9, 'liquid'),
(4, 'dattathallam', 10, 'liquid'),
(5, 'dattasai', 11, 'solid');

-- --------------------------------------------------------

--
-- Table structure for table `USERINFO`
--

CREATE TABLE `USERINFO` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERINFO`
--

INSERT INTO `USERINFO` (`username`, `password`) VALUES
('swaroop', 'harekrishna@108');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `CHEMCOMP`
--
ALTER TABLE `CHEMCOMP`
  ADD PRIMARY KEY (`COMP_ID`,`CASRN`,`PURITY`),
  ADD KEY `CASRN` (`CASRN`);

--
-- Indexes for table `CHEMICALS`
--
ALTER TABLE `CHEMICALS`
  ADD PRIMARY KEY (`CASRN`),
  ADD UNIQUE KEY `CHEM_NAME` (`CHEM_NAME`);

--
-- Indexes for table `COMPANY`
--
ALTER TABLE `COMPANY`
  ADD PRIMARY KEY (`COMP_ID`),
  ADD KEY `ADDRESSID` (`ADDRESSID`);

--
-- Indexes for table `USERINFO`
--
ALTER TABLE `USERINFO`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `COMPANY`
--
ALTER TABLE `COMPANY`
  MODIFY `COMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CHEMCOMP`
--
ALTER TABLE `CHEMCOMP`
  ADD CONSTRAINT `CHEMCOMP_ibfk_1` FOREIGN KEY (`COMP_ID`) REFERENCES `COMPANY` (`COMP_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CHEMCOMP_ibfk_2` FOREIGN KEY (`CASRN`) REFERENCES `CHEMICALS` (`CASRN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `COMPANY`
--
ALTER TABLE `COMPANY`
  ADD CONSTRAINT `COMPANY_ibfk_1` FOREIGN KEY (`ADDRESSID`) REFERENCES `ADDRESS` (`AID`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
