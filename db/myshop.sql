-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 08:09 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `userId` varchar(30) NOT NULL,
  `products` varchar(50) NOT NULL,
  `isDelivered` varchar(50) NOT NULL,
  `deliverDate` varchar(100) NOT NULL,
  `deliveredBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `userId`, `products`, `isDelivered`, `deliverDate`, `deliveredBy`) VALUES
(1, '2', '1113', 'yes', '14/11/2017', '4');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `delivaryman_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `location` varchar(30) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`delivaryman_id`, `status`, `location`, `userID`) VALUES
(0, 'active', 'uttara', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` mediumblob NOT NULL,
  `comments` varchar(255) NOT NULL,
  `brand_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `img`, `comments`, `brand_Name`) VALUES
(1, 'Samsung J7', 'A very good phone with reasonable price', '30000', 0x6a372e6a7067, '', 'Samsung '),
(2, 'walton primo ef', 'Walton Rockzz', '5500', 0x65662e6a7067, '', 'Walton'),
(3, 'Walton Prime', 'Has a very good Camera', '7000', 0x77616c746f6e2e6a7067, '', 'Walton '),
(4, 'Walton Primo NX2', 'you are smart so am I.', '15000', 0x77332e504e47, '', 'Walton '),
(5, 'Walton Primo S3', 'A product for life time ', '8000', 0x77342e504e47, '', 'Walton'),
(6, 'Walton Primo RX3', 'Be smart,Be mordern', '14000', 0x77352e504e47, '', 'Walton'),
(7, 'Walton Primo ZX2 Mini', 'Be Bangladeshi', '12000', 0x77362e504e47, '', 'Walton');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Account_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Fname`, `Lname`, `username`, `password`, `Phone`, `Email`, `Address`, `Image`, `Account_type`) VALUES
(1, 'Humayun', 'Kabir', 'admin', 'admin', '12', 'humayunkabirtorab@gmail.com', 'Dhaka', 'admin.png', 101),
(2, 'Mr.', 'User', 'user', 'user', '1', 'asd@gmail.com', 'uttara', 'user.png', 303),
(4, 'mr', 'delivery', 'delivery', 'delivery', '11', '12@gmailcom', 'uttara', 'delivery.png', 202);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`delivaryman_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
