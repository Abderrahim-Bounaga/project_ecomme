-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 03:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(30) DEFAULT NULL,
  `Fname_admin` varchar(20) NOT NULL,
  `Lname_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id_admin`, `email_admin`, `password_admin`, `Fname_admin`, `Lname_admin`) VALUES
(1, 'abdelmatari36@gmail.com', '123456789', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Category_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Category_title`) VALUES
(1, 'eyes'),
(2, 'face'),
(3, 'Fcheeks'),
(4, 'sets'),
(7, 'brows'),
(8, 'lips'),
(10, 'nails');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_info` varchar(350) NOT NULL,
  `product_image` blob NOT NULL,
  `product_CategoryId` int(11) DEFAULT NULL,
  `product_archif` int(11) DEFAULT 0,
  `product_date` date NOT NULL,
  `Sou_CategoryId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_price`, `product_desc`, `product_info`, `product_image`, `product_CategoryId`, `product_archif`, `product_date`, `Sou_CategoryId`) VALUES
(1, 'test', 1000, '                        ezfzdc', '                        fevefv', 0x612e6a7067, NULL, 1, '0000-00-00', 0),
(2, 'edde', 222, '                        vfdc q', '                        fcfvfvf', 0x632e6a7067, 0, 0, '0000-00-00', 1),
(3, 'rvgeftgte', 100, '               eftrg         ', 'erf                        ', 0x622e6a7067, 0, 0, '2020-07-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sou_category`
--

CREATE TABLE `sou_category` (
  `Sou_Category_id` int(3) NOT NULL,
  `Sou_Category_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sou_category`
--

INSERT INTO `sou_category` (`Sou_Category_id`, `Sou_Category_title`) VALUES
(1, 'mascara'),
(2, 'eyeshadow'),
(3, 'Eyeshadow'),
(4, 'singleeyeshadow'),
(5, 'liquideyeshadow'),
(6, 'pigment'),
(7, 'eyeliner');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fname` varchar(60) DEFAULT NULL,
  `Lname` varchar(60) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `Email`, `Password`) VALUES
(29, 'ABDELFATTAH', 'HAISSOUN', 'abdelmatari36@gmail.com', '$2y$10$ZuwQg8bVjykqGMlmr8'),
(30, 'ABDELFATTAH', 'HAISSOUN', 'abdelfatahhaissoun@hotmail.com', '$2y$10$Fz3TE9ASTrFcFZsmYX'),
(31, 'ABDELFATTAH', 'HAISSOUN', 'abdelfataetgvehhaissoun@hotmail.com', '$2y$10$mbi9whCtRT.d4fHsIO'),
(32, 'vaq', 'vqefb', 'abdefvelfatahhaissoun@hotmail.com', '$2y$10$FxYx1DrE5SIxEgDhQ3'),
(33, 'ABDELFATTAH', 'HAISSOUN', 'ffabdelfatahhaissoun@hotmail.com', '$2y$10$4VP2FQOiCIC1TmGSzx'),
(34, 'ABDELFATTAH', 'HAISSOUN', 'dll@hotmail.com', '$2y$10$NF4fMkcr6H56fTHSnF'),
(35, 'ABDELFATTAH', 'HAISSOUN', 'ss@hotmail.com', 'aA2+ibiujb'),
(40, 'ff', 'ff', 'koko@gmail.com', '$2y$10$kwbufnPQLbnKaGDX6q'),
(43, 'ff', 'ff', 'kokok@gmail.com', '$2y$10$BF4dq3UNtMySGEhWxg.83eI3ezYskko9W6pTo0Wa.GYxuZFPr2Ob.'),
(44, 'abdotest', 'test', 'abdelmatari11@gmail.com', '$2y$10$4DQXrx.fjh71IVSyM1mR7.jB8DxbE5sBTS3nKpn/cDP2heNUovphS'),
(45, 'fve', 'vffdvf', 'kokffffok@gmail.com', '$2y$10$TWkzn3v0aRUFn36sTXN/k.H1LXiJkOkUO/7OTY/ODonCFqXplTyt.'),
(46, 'geqbg', 'gqbqgv', 'kokgggo@gmail.com', '$2y$10$fghZnoKP8EZk2vdwxaj4tuaC384GGbvhjSVHBq.yC9JIxBWksMIWa'),
(47, 'fvfs', 'vevffsce', 'kokvvvok@gmail.com', '$2y$10$jKZL5mglcUDV2FOXXkqvS.j5gHXD4K4y.MFnfveoQCDJyVLYVwL0O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sou_category`
--
ALTER TABLE `sou_category`
  ADD PRIMARY KEY (`Sou_Category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sou_category`
--
ALTER TABLE `sou_category`
  MODIFY `Sou_Category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
