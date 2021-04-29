-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 03:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonehubdbbckup`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_desc`, `cat_image`) VALUES
(1, 'Vivo', 'brand1.png'),
(2, 'Samsung', 'brand3.png'),
(3, 'Real Me', ''),
(4, 'Iphone', 'brand4.png'),
(5, 'HTC', 'brand5.png');

-- --------------------------------------------------------

--
-- Table structure for table `currentstock`
--

CREATE TABLE `currentstock` (
  `item_code` int(11) NOT NULL,
  `stock_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentstock`
--

INSERT INTO `currentstock` (`item_code`, `stock_available`) VALUES
(1, 10),
(2, 5),
(3, 10),
(4, 5),
(5, 5),
(6, 7),
(7, 10),
(8, 5),
(9, 6),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `item_image` varchar(256) NOT NULL,
  `item_code` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` text NOT NULL,
  `item_stat` enum('A','B','','') NOT NULL COMMENT 'A = "Active" B = "Blocked"',
  `supp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `cat_id`, `item_name`, `item_image`, `item_code`, `item_price`, `item_desc`, `item_stat`, `supp_id`) VALUES
(1, 1, 'Vivo Y11', 'product-1.jpg', 1, 7000, 'this phone is a ………product of creativity', 'A', 1),
(1, 1, 'Vivo Y11', 'product-1.jpg', 2, 7000, 'this phone is a ……….', 'A', 1),
(1, 1, 'Vivo Y11', 'product-1.jpg', 3, 7000, 'this phone is a ……….', 'A', 1),
(1, 1, 'Vivo Spro', 'product-4.jpg', 4, 10000, 'this phone is a ……….', 'A', 1),
(1, 1, 'Vivo Spro', 'product-2.jpg', 5, 10000, 'this phone is a ……….', 'A', 1),
(1, 1, 'Vivo Ultra', 'product-3.jpg', 6, 15000, 'this phone is a ……….', 'A', 1),
(2, 2, 'Samsung A5', 'product-4.jpg', 7, 8000, 'this phone is a ……….', 'A', 2),
(2, 2, 'Samsung A5', 'product-5.jpg', 8, 8000, 'this phone is a ……….', 'A', 2),
(2, 2, 'Samsung S10', 'product-1.jpg', 9, 16000, 'this phone is a ……….', 'A', 2),
(2, 2, 'Samsung S10', 'product-2.jpg', 10, 16000, 'this phone is a ……….', 'A', 2),
(3, 3, 'Realme C1', 'product-3.jpg', 11, 4000, 'this phone is a ……….', 'A', 3),
(3, 3, 'Realme C2', 'product-4.jpg', 12, 5000, 'this phone is a ……….', 'A', 3),
(3, 3, 'Realme C3', 'product-5.jpg', 13, 7000, 'this phone is a ……….', 'A', 3),
(3, 3, 'Realme C15', 'product-1.jpg', 14, 15000, 'Brand new', 'A', 3),
(4, 4, 'Iphone X', 'product-3.jpg', 15, 20000, 'the newest', 'A', 4),
(4, 4, 'Iphone XXX', 'product-3.jpg', 16, 20000, 'brand new', 'A', 4),
(5, 5, 'Konckhick 1', 'product-1.jpg', 17, 34000, 'rrrrrrrrrrrrrrr', 'A', 5),
(5, 5, 'Konckhick 2', 'product-3.jpg', 18, 34000, 'rrrrrrrrrrrrrrr', 'A', 5),
(5, 5, 'Konckhick 3', 'product-3.jpg', 19, 34000, 'rrrrrrrrrrrrrrr', 'A', 5),
(3, 3, 'Realme C12', 'product-3.jpg', 20, 4000, 'this phone is a ……….', 'A', 3),
(1, 1, 'Vivo Y11', 'product-1.jpg', 31, 7000, 'this phone is a ……….', 'A', 1),
(2, 2, 'Samsung S10', 'product-1.jpg', 32, 16000, 'this phone is a ………. genius', 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `net_amt` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` enum('A','P','D','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `item_code`, `order_qty`, `net_amt`, `order_date`, `order_status`) VALUES
(1, 1, 1, 0, 0, '2021-03-01', 'A'),
(2, 1, 1, 0, 0, '2021-03-01', 'A'),
(3, 1, 1, 0, 0, '2021-02-01', 'A'),
(4, 2, 1, 0, 0, '2021-02-01', 'A'),
(5, 3, 2, 0, 0, '2021-02-21', 'A'),
(6, 3, 4, 0, 0, '2021-02-14', 'P'),
(7, 2, 3, 0, 0, '2021-01-01', 'P'),
(8, 6, 1, 2, 0, '2021-02-21', 'D'),
(9, 5, 3, 2, 0, '2021-02-25', 'P'),
(10, 5, 3, 2, 0, '2021-02-25', 'P'),
(11, 4, 2, 1, 0, '2021-02-25', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `order_id`, `report_date`) VALUES
(1, 1, '2021-03-01'),
(2, 2, '2021-03-02'),
(3, 2, '2021-03-02'),
(4, 3, '2021-03-03'),
(5, 4, '2021-03-04'),
(6, 5, '2021-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `stockshistory`
--

CREATE TABLE `stockshistory` (
  `stock_entry_id` int(11) NOT NULL,
  `stock_date_added` date NOT NULL,
  `stock_qty_added` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockshistory`
--

INSERT INTO `stockshistory` (`stock_entry_id`, `stock_date_added`, `stock_qty_added`, `item_code`, `user_id`) VALUES
(1, '2021-01-01', 10, 1, 1),
(2, '2021-01-01', 10, 1, 1),
(3, '2021-01-01', 20, 1, 2),
(4, '2021-01-01', 30, 2, 2),
(5, '2021-01-01', 10, 2, 3),
(6, '2021-01-02', 20, 3, 3),
(7, '2021-01-02', 30, 3, 4),
(8, '2021-01-03', 10, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(30) NOT NULL,
  `supp_image` varchar(256) NOT NULL,
  `supp_mun` varchar(30) NOT NULL,
  `supp_prov` varchar(30) NOT NULL,
  `supp_pass` varchar(15) NOT NULL,
  `supp_stat` enum('A','B','','') NOT NULL COMMENT 'A = Active , B = Blocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supp_id`, `supp_name`, `supp_image`, `supp_mun`, `supp_prov`, `supp_pass`, `supp_stat`) VALUES
(1, 'Vivo Shop', 'brand1.png', 'Guinobatan', 'Albay', 'vivoshop', 'A'),
(2, 'Samsung Shop', 'brand2.png', 'Sorsogon', 'Sorsogon', 'samsungshop', 'A'),
(3, 'Realme Shop', 'brand3.png', 'Guinobatan', 'Albay', 'realmeshop', 'A'),
(4, 'Iphone Shop', 'brand4.png', 'Pasay', 'NCR', 'authenshop', 'B'),
(5, 'Antic CP Shop', 'brand5.png', 'Busay', 'Baguio', 'anticshop', 'B'),
(6, 'Cell Store', 'brand1.png', 'Busay', 'Baguio', 'cellstore', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_muni` enum('LI','GU','PO','OA','CA','DA') NOT NULL,
  `user_prov` enum('AL','CA','CS','MA','SS') NOT NULL,
  `user_gender` enum('M','F','','') NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_stat` enum('A','B','','') NOT NULL,
  `user-type` enum('U','S','B','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `user_address`, `user_muni`, `user_prov`, `user_gender`, `user_pass`, `user_stat`, `user-type`) VALUES
(337, '@jpmoratalla', 'Jhun Paul', 'Moratalla', 'San Pascual, Nale', 'OA', 'AL', 'M', 'imjp', 'A', 'U'),
(338, '@arnelgaming', 'Arnel', 'Sta. Romana', 'Sapang Palay', 'GU', 'AL', 'M', 'imarnel', 'A', 'U'),
(339, '@henrickkkkk01', 'John Henrick', 'Orbase', 'Purok 1 San Roque', 'GU', 'AL', 'M', 'imhenrickkkk', 'A', 'U'),
(340, '@kimmy', 'Kim', 'Munez', 'Zone 6 Hermosa', 'PO', 'AL', 'F', 'qwerty', 'A', 'U'),
(341, '@helsi', 'Helsenki', 'Memo', 'Gugua', 'PO', 'AL', 'M', 'taken001', 'A', 'U'),
(342, '@thorin', 'Thorin', 'Oakenshield', 'Banao', 'GU', 'AL', 'M', 'thorin', 'A', 'U'),
(343, '@jhunrico', 'Jhun Jhun', 'Rico', 'Nale, Oas, Albay', 'LI', 'AL', 'M', 'qwert', 'A', 'U');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `currentstock`
--
ALTER TABLE `currentstock`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_code`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `stockshistory`
--
ALTER TABLE `stockshistory`
  ADD PRIMARY KEY (`stock_entry_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currentstock`
--
ALTER TABLE `currentstock`
  MODIFY `item_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stockshistory`
--
ALTER TABLE `stockshistory`
  MODIFY `stock_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
