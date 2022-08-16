-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 04:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2h_em`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `password`, `status`) VALUES
(1, 'enock-meston', '$2y$10$IbSbjXoROOmSgDPSLcKxYOmrh3L2MJ9cX.m.jJr095ZClAMpkt1Gi', 1),
(2, 'arthur', '$2y$10$IbSbjXoROOmSgDPSLcKxYOmrh3L2MJ9cX.m.jJr095ZClAMpkt1Gi', 1),
(3, 'admin', '$2y$10$E4eiK7L6S2qCsBkggFL8teo1XjBQOqs7ZnktanDRvCQRBqH4hfvIy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'nahayo', 'nahayoarthur0@gmail.com', 'none', 'test 1'),
(27, 'nahayo', 'nahayoarhur0@gmail.com', 'none', 'test 2');

-- --------------------------------------------------------

--
-- Table structure for table `producttbl`
--

CREATE TABLE `producttbl` (
  `pid` int(11) NOT NULL,
  `PostTitle` varchar(200) NOT NULL,
  `PostDetails` longtext NOT NULL,
  `prodPrice` varchar(20) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttbl`
--

INSERT INTO `producttbl` (`pid`, `PostTitle`, `PostDetails`, `prodPrice`, `thumbnail`, `date`, `status`) VALUES
(1, 'Gutters', 'big Gutters ', '2000', 'thurmbnail/IMG-62f57146d771b8.79217551.jpg', '2022-08-11 21:14:46', 1),
(3, 'stairs', 'all stairs', '23000', 'thurmbnail/IMG-62f5735a7578a6.06413018.jpg', '2022-08-11 21:23:38', 1),
(4, 'Bed', 'very confy', '90000', 'thurmbnail/IMG-62f579c40a5621.94428547.jpg', '2022-08-11 21:51:00', 1),
(5, 'Office chair', 'very confy', '80000', 'thurmbnail/IMG-62f7bebc520de0.62633138.jpg', '2022-08-13 15:09:48', 1),
(6, 'PPGI', 'Colorful and strong', '12500', 'thurmbnail/IMG-62f7bf10f3c833.42622238.jpg', '2022-08-13 15:11:13', 1),
(8, 'Sheets', 'they weight more compared to others, around 8kg', '8000', 'thurmbnail/IMG-62f7bfee37ced7.48171011.jpg', '2022-08-13 15:14:54', 1),
(9, 'metals', 'anyshape you want', '3000', 'thurmbnail/IMG-62f7c03e8a1d06.67316187.jpg', '2022-08-13 15:16:14', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
