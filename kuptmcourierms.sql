-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 06:03 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuptmcourierms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininformation`
--

CREATE TABLE `admininformation` (
  `id` int(11) NOT NULL,
  `username` varchar(14) NOT NULL,
  `password` varchar(14) NOT NULL,
  `AdminName` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininformation`
--

INSERT INTO `admininformation` (`id`, `username`, `password`, `AdminName`, `phone`) VALUES
(1, 'admin', 'admin', 'Ahmad Edham Bin Rabuan', '0123456789'),
(4, 'admin1', 'pass', 'Ahmad Abu Bin Ali', '0190000000');

-- --------------------------------------------------------

--
-- Table structure for table `collectorinformation`
--

CREATE TABLE `collectorinformation` (
  `id` int(11) NOT NULL,
  `idcardcollector` varchar(12) NOT NULL,
  `namecollector` text NOT NULL,
  `nophonecollector` varchar(12) NOT NULL,
  `datecollect` date NOT NULL,
  `idparcel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectorinformation`
--

INSERT INTO `collectorinformation` (`id`, `idcardcollector`, `namecollector`, `nophonecollector`, `datecollect`, `idparcel`) VALUES
(8, 'AM1705001111', 'Ilyana Natasha', '015746332', '2019-04-24', 14),
(9, 'AM1705001112', 'Khairul Haiqqal', '01278463447', '2019-04-25', 18),
(10, 'Am1705001113', 'Amirun Harun', '01966677443', '2019-04-24', 19),
(11, 'AM1705001245', 'Muhammad Afiq', '0185894456', '2019-04-23', 10),
(12, 'Am1705006346', 'Muhammad Faiz Zainol', '0199886456', '2019-04-24', 13),
(13, 'am1705002198', 'Ahmad Edham Bin Rabuan', '60172464445', '2019-04-24', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kuptmcollectorinfo`
--

CREATE TABLE `kuptmcollectorinfo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `trackingno` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `idparcel` int(15) NOT NULL,
  `sign` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuptmcollectorinfo`
--

INSERT INTO `kuptmcollectorinfo` (`id`, `name`, `trackingno`, `date`, `idparcel`, `sign`) VALUES
(20, 'Bahagian Kewangan', 'MY947220235', '2019-04-24', 7, 'sign/signature/7.png'),
(21, 'Faculty Account', 'My3456746236', '2019-04-26', 10, 'sign/signature/10.png'),
(22, 'Bahagian Kewangan', 'MY14567363', '2019-04-24', 6, 'sign/signature/6.png'),
(23, 'Bahagian Kewangan', 'MY4634734624', '2019-04-19', 13, 'sign/signature/13.png');

-- --------------------------------------------------------

--
-- Table structure for table `kuptmparcelinfo`
--

CREATE TABLE `kuptmparcelinfo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `trackingno` varchar(25) NOT NULL,
  `dateArrive` date NOT NULL,
  `courier` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuptmparcelinfo`
--

INSERT INTO `kuptmparcelinfo` (`id`, `name`, `trackingno`, `dateArrive`, `courier`, `status`) VALUES
(6, 'Bahagian Kewangan', 'MY14567363', '2019-04-24', 'Ninja Van', 'COLLECTED'),
(7, 'Bahagian Kewangan', 'MY947220235', '2019-04-19', 'PosLaju', 'COLLECTED'),
(8, 'Dekan CS', 'My984342474', '2019-04-19', 'PosLaju', 'UNCOLLECTED'),
(9, 'Faculty CS', 'MY56788844347', '2019-04-20', 'PosLaju', 'UNCOLLECTED'),
(10, 'Faculty Account', 'My3456746236', '2019-04-20', 'FedEx', 'COLLECTED'),
(11, 'Puan Aini', 'My977626327', '2019-04-19', 'Ninja Van', 'UNCOLLECTED'),
(12, 'Tuan Haji Asri', 'My67252627', '2019-04-20', 'PosLaju', 'UNCOLLECTED'),
(13, 'Bahagian Kewangan', 'MY4634734624', '2019-04-19', 'PosLaju', 'COLLECTED'),
(14, 'Bahagian HEP', 'MY683916131', '2019-04-20', 'PosLaju', 'UNCOLLECTED'),
(15, 'Counselor', 'my1234', '2019-04-20', 'PosLaju', 'UNCOLLECTED');

-- --------------------------------------------------------

--
-- Table structure for table `parcelinformation`
--

CREATE TABLE `parcelinformation` (
  `id` int(11) NOT NULL,
  `trackingnum` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `nophone` varchar(15) NOT NULL,
  `dateArrive` date NOT NULL,
  `courier` text NOT NULL,
  `statusParcel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcelinformation`
--

INSERT INTO `parcelinformation` (`id`, `trackingnum`, `name`, `nophone`, `dateArrive`, `courier`, `statusParcel`) VALUES
(9, 'MY863567992', 'Muhammad Helmi', '0164784478', '2019-04-17', 'Ninja Van', 'UNCOLLECTED'),
(10, 'MY573629262', 'Muhammad Afiq', '0185894456', '2019-04-17', 'PosLaju', 'COLLECTED'),
(11, 'MY1234', 'Ahmad Edham Bin Rabuan', '60172464445', '2019-04-18', 'PosLaju', 'COLLECTED'),
(12, 'My345678982', 'Muhamad Asraf', '0122234534', '2019-04-19', 'PosLaju', 'UNCOLLECTED'),
(13, 'MY685527823', 'Muhammad Faiz Zainol', '0199886456', '2019-04-20', 'Ninja Van', 'COLLECTED'),
(14, 'MY46728373', 'Ilyana Natasha', '015746332', '2019-04-20', 'PosLaju', 'COLLECTED'),
(15, 'MY3569956677', 'Danial Hakim', '0196568345', '2019-04-21', 'PosLaju', 'UNCOLLECTED'),
(16, 'MY56784264', 'Cammilia Latif', '0146894533', '2019-04-22', 'DHL', 'UNCOLLECTED'),
(17, 'My3467899273', 'Faiz Roslan', '60164883424', '2019-04-23', 'FedEx', 'UNCOLLECTED'),
(18, 'MY356743685', 'Khairul Haiqqal', '01278463447', '2019-04-26', 'FedEx', 'COLLECTED'),
(19, 'MY3499987544', 'Amirun Harun', '01966677443', '2019-04-24', 'DHL', 'COLLECTED'),
(20, 'MY538968864', 'Muhadhazzib ', '01737942533', '2019-04-24', 'PosLaju', 'UNCOLLECTED'),
(21, 'MY134566778', 'Edham', '0109024390', '2019-04-18', 'PosLaju', 'UNCOLLECTED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininformation`
--
ALTER TABLE `admininformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collectorinformation`
--
ALTER TABLE `collectorinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuptmcollectorinfo`
--
ALTER TABLE `kuptmcollectorinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuptmparcelinfo`
--
ALTER TABLE `kuptmparcelinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcelinformation`
--
ALTER TABLE `parcelinformation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininformation`
--
ALTER TABLE `admininformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collectorinformation`
--
ALTER TABLE `collectorinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuptmcollectorinfo`
--
ALTER TABLE `kuptmcollectorinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `kuptmparcelinfo`
--
ALTER TABLE `kuptmparcelinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parcelinformation`
--
ALTER TABLE `parcelinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
