-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 03, 2020 at 07:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carseva`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(256) NOT NULL,
  `admin_pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_pass`) VALUES
('admin', 'admin123'),
('admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `owner` varchar(256) NOT NULL,
  `company` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`owner`, `company`, `phone`, `link`, `approved`, `latitude`, `longitude`) VALUES
('Prakash Dubey', 'Sarkar Garage', '8108229811', 'Thakur Village Kandivali', 0, 19.207, 72.8773),
('Priya', 'Priya Shop', '8976233112', 'Malad', 1, 19.189107099999998, 72.86335199999999),
('Raju', 'Drivershop', '9864732019', 'Kandivali', 1, 19.203606, 72.857),
('Ramesh Viraj', 'Smriti Motors', '8878675419', 'Borivali', 1, 19.222757, 72.864024),
('Uday Patil', 'Uday Traveller Garage', '8769554212', 'Laxmi Sadan Kandivali', 1, 19.2098, 72.8746);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `vehicle` varchar(256) NOT NULL,
  `plate` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `vehicle`, `plate`, `phone`) VALUES
('Kritik', 'abc@gmail.com', 'abcde', 'toyota', 'MDF354', '8799876586'),
('Anuja Ajay Somthankar', 'abc@gmail.coms', 'dfgh', 'Tesla model 3', 'MH 02 CGQ 3135', '8976233445'),
('Samiksha', 'abcsa@gmail.com', 'pookie', 'tesla', 'AMSD421', '8976511321'),
('Kritik', 'anuja@gmail.com', 'qwerty', 'BMW ', 'MHX234', '9876543210'),
('Anuja Ajay Somthankar', 'anujas@gmail.com', 'qwerty', 'car honda', 'MHX234', '9876543210'),
('Anuja Ajay Somthankar', 'anujasom@gmail.com', 'qwerty123', 'Tesla model 3', 'MH 02 CGQ 3135', '8976233445'),
('Manisha', 'man@gmail.com', 'qwerty', 'toyota', 'SWD215', '9876543298'),
('Sam', 'sam@gmail.com', 'qwerty', 'BMW ', 'SWE234', '8774931232'),
('Suraj', 'suraj@gmail.com', 'cars', 'Mercedes', 'SKFD120', '989345091');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_name`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`owner`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
