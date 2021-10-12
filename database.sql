-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2021 at 04:10 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text,
  `fullname` varchar(255) DEFAULT NULL,
  `type` enum('admin','user','receptionis','kasir') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `fullname`, `type`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin'),
(5, 'anggrek', 'd41d8cd98f00b204e9800998ecf8427e', 'anggrek', 'user'),
(6, 'mangga', '5ac590c94ad91a0faa947c9aa05604b5', 'mangga', 'user'),
(7, 'jeruk', '479aab68c5ef42e325a732bc2cab18eb', 'jeruk', 'user'),
(8, 'user', '21232f297a57a5a743894a0e4a801fc3', 'Receptionis', 'receptionis'),
(9, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `image`) VALUES
(1, 5, 'Nasi Goreng1', '15000', 'High quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'ayam.jpeg'),
(2, 1, 'Mie Rebus', '15000', 'High quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'ayam.jpeg'),
(3, 1, 'Sop Buntut', '15000', 'NULLHigh quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'cumi.jpeg'),
(4, 1, 'Nasi Rendang', '15000', 'High quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'ayam.jpeg'),
(5, 1, 'Telor Dadar', '15000', 'High quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'ayam.jpeg'),
(6, 1, 'Ayam Bakar', '15000', 'High quality Fresh Orange fruit exporters from South Korea for sale. All citrus trees belong to the single genus Citrus and remain almost entirely interfertile. This includes grapefruits, lemons, limes, oranges, and various other types and hybrids. The fruit of any citrus tree is considered a hesperidium, a kind of modified berry; it is covered by a rind originated by a rugged thickening of the ovary wall.', 'nasi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'Fruits'),
(2, 'Fruits'),
(3, 'Milk & Egg'),
(4, 'Vegetables'),
(5, 'Organic'),
(6, 'Meat');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `villa_id` int(11) DEFAULT NULL,
  `status` enum('dipesan','diproses','dikirim','selesai','reject') DEFAULT NULL,
  `TOKEN` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `villa_id`, `status`, `TOKEN`, `created_at`, `updated_at`) VALUES
(1, 'Rizky Musthofa', 6, 'dipesan', '1624202471', '2021-05-03 15:00:00', '2021-05-03 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(50) DEFAULT NULL,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `transaction_id`, `product_id`, `qty`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 24, 50000, 'Jangan Pedas', '2021-05-03 15:00:00', '2021-05-03 15:00:00'),
(2, 1, 2, 24, 50000, 'Jangan Pedas', '2021-05-03 15:00:00', '2021-05-03 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `villa`
--

CREATE TABLE `villa` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `penyewa` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villa`
--

INSERT INTO `villa` (`id`, `name`, `penyewa`) VALUES
(6, 'Jeruk', 'jakarta'),
(8, 'Anggrek', 'Jakarta'),
(9, 'Kemang', 'jakarta Selatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villa`
--
ALTER TABLE `villa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `villa`
--
ALTER TABLE `villa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
