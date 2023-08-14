-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 02:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ice-cream`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(12, 'meital', 'sss@gmail.com', '0547484568', 'asasasd', 'cod', 'berries(2), oreo&white chocolate(4)', '106.1'),
(59, 'asaf', 'reemix.ib@gmail.com', '0509232702', '', 'cod', 'pistachio(1), chocolate(2), melon(3)', '85.5');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `stock_qty` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `stock_qty`, `product_image`, `product_code`) VALUES
(1, 'berries', '15.10', 1, 4, 'berries.jpg', '1000'),
(2, 'cherry', '20', 1, 8, 'cherry.jpg', '1001'),
(3, 'chocolate', '14.50', 1, 2, 'chocolate.jpg', '1002'),
(4, 'coconut', '30', 1, 26, 'coconut.jpg', '1003'),
(5, 'loacker', '12.40', 1, 13, 'lwaker.jpg', '1004'),
(6, 'melon', '15.50', 1, 65, 'melon.jpg', '1005'),
(7, 'mix vegan', '21', 1, 55, 'mix vegan.jpg', '1006'),
(8, 'nut andchocolate', '15.50', 1, 53, 'nutchocolate.jpg', '1007'),
(9, 'oreo&chocolate', '19', 1, 40, 'oreo&white chocolate.jpg', '1008'),
(10, 'salty prtzel', '25.50', 1, 10, 'salty prtzel.jpg', '1009'),
(11, 'strawberry', '21.90', 1, 30, 'strawberry.jpg', '1010'),
(12, 'vanilla', '10', 1, 35, 'vanilla.jpg', '1011'),
(13, 'watermelon', '10', 1, 15, 'watermelon.jpg', '1012'),
(14, 'pistachio', '10', 1, 12, 'pistachio.jpg', '1014'),
(20, 'peach', '10', 1, 18, 'peach.jpg', '1017'),
(21, 'blueberry', '10', 1, 12, 'blueberry.jpg', '1019');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'reemix', '123', 'rem'),
(8, 'meital', '1234', 'meital'),
(10, 'asaf', '123', 'asaf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
