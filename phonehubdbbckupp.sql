-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 06:56 PM
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
-- Database: `phonehubdbbckupp`
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
  `item_code` int(11) NOT NULL,
  `item_image` varchar(256) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` text NOT NULL,
  `item_stat` enum('A','B','','') NOT NULL COMMENT 'A = "Active" B = "Blocked"',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `cat_id`, `item_name`, `item_code`, `item_image`, `item_price`, `item_desc`, `item_stat`, `user_id`) VALUES
(7, 2, 'Samsung Galaxy 12', 11990, '', 23000, 'kkkkkkkkkkkkkk', 'A', 3),
(23, 2, 'Samsung Galaxy 111', 1016, 'vivo y11.png', 55, 'efsdf', 'A', 1),
(24, 1, 'Realme C2', 1016, 'vivo y11.png', 123, 'ujtyjy', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_code` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `net_amt` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` enum('A','P','D','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `item_name`, `item_code`, `order_qty`, `net_amt`, `order_date`, `order_status`) VALUES
(1, 1, '', 1, 0, 0, '2021-03-01', 'A'),
(2, 1, '', 1, 0, 0, '2021-03-01', 'A'),
(3, 1, '', 1, 0, 0, '2021-02-01', 'A'),
(4, 2, '', 1, 0, 0, '2021-02-01', 'A'),
(5, 3, '', 2, 0, 0, '2021-02-21', 'A'),
(6, 3, '', 4, 0, 0, '2021-02-14', 'P'),
(7, 2, '', 3, 0, 0, '2021-01-01', 'P'),
(8, 6, '', 1, 2, 0, '2021-02-21', 'D'),
(9, 5, '', 3, 2, 0, '2021-02-25', 'P'),
(10, 5, '', 3, 2, 0, '2021-02-25', 'P'),
(11, 4, '', 2, 1, 0, '2021-02-25', 'A');

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
-- Table structure for table `suppitems`
--

CREATE TABLE `suppitems` (
  `supp_item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `supp_item_name` varchar(20) NOT NULL,
  `supp_item_code` int(11) NOT NULL,
  `supp_item_image` varchar(256) NOT NULL,
  `supp_item_price` int(11) NOT NULL,
  `supp_item_desc` text NOT NULL,
  `supp_item_stat` enum('A','B','','') NOT NULL COMMENT 'A = "Active" B = "Blocked"',
  `supp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppitems`
--

INSERT INTO `suppitems` (`supp_item_id`, `cat_id`, `supp_item_name`, `supp_item_code`, `supp_item_image`, `supp_item_price`, `supp_item_desc`, `supp_item_stat`, `supp_id`) VALUES
(27, 1, 'Realme CC', 12245, 'product-1.jpg', 33000, 'vvv', 'A', 6),
(29, 1, 'Vivo V2', 1222, 'product-1.jpg', 12000, 'dddddd', 'A', 1),
(30, 1, 'Vivo V24', 1222, 'product-1.jpg', 12000, 'dddddd', 'A', 1),
(40, 1, 'Vivo V99v', 12245, 'vivo y11.png', 23000, 'dddddddd', 'A', 11),
(41, 1, 'Vivo V234', 12245, 'product-4.jpg', 12000, 'qww', 'A', 1),
(42, 1, 'Vivo V99', 1224, 'product-thumb-2.jpg', 34000, 'rrr', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supp_id` int(11) NOT NULL,
  `supp_username` varchar(255) NOT NULL,
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

INSERT INTO `suppliers` (`supp_id`, `supp_username`, `supp_name`, `supp_image`, `supp_mun`, `supp_prov`, `supp_pass`, `supp_stat`) VALUES
(1, '@vivoshop', 'Vivo Edge Store235', 'product-thumb-4.jpg', 'Ligao-ligo', 'Wakanda', 'vivo', 'A'),
(2, '@samsungshop', 'Samsung Shop', 'brand2.png', 'Sorsogon', 'Sorsogon', 'samsung', 'A'),
(3, '@realmeshop', 'Realme Shop', 'brand3.png', 'Guinobatan', 'Albay', 'realme', 'A'),
(4, '@iphoneshop', 'Iphone Shop', 'brand4.png', 'Pasay', 'NCR', 'iphone', 'A'),
(5, '@anticshop', 'Antic CP Shop', 'brand5.png', 'Busay', 'Baguio', 'antic', 'A'),
(6, '@cellstore', 'Cell Store', 'brand1.png', 'Busay', 'Baguio', 'cell', 'A'),
(11, '@eternity', 'Eternity Shop', 'brand5.png', 'Ligao', 'Wakanda', 'qwerty', 'A'),
(12, '@cpcapital22', 'The CP Capital', '', 'Ligao', 'Wakanda', 'qwe', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(256) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_muni` enum('Ligao','Guinobatan','Polangui','Oas','Camalig','Daraga') NOT NULL,
  `user_prov` enum('Albay','Camarines Norte','Camarines Sur','Masbate','Sorsogon') NOT NULL,
  `user_gender` enum('M','F','','') NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_stat` enum('A','B','','') NOT NULL,
  `user_type` enum('U','S','B','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `first_name`, `last_name`, `user_image`, `user_address`, `user_muni`, `user_prov`, `user_gender`, `user_pass`, `user_stat`, `user_type`) VALUES
(1, '@jpmoratalla', 'Jhun Paul', 'Moratalla', 'paul.jpg', 'San Pascual, Nale', 'Oas', 'Albay', 'M', 'imjp', 'A', 'U'),
(2, '@arnelgaming', 'Arnel', 'Sta. Romana', '', 'Banao', 'Guinobatan', 'Albay', 'M', 'imarnel', 'A', 'U'),
(3, '@jhonhenrick', 'John Henrick', 'Orbase', '', 'GuaGua Street 01', 'Guinobatan', 'Albay', 'M', 'imhenrick', 'A', 'U'),
(4, '@kimmy', 'Kemmy', 'Menez', 'profile.jpg', 'Ligao, al', 'Ligao', 'Albay', 'F', 'qw44', 'B', 'U');

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
  ADD PRIMARY KEY (`item_id`);

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
-- Indexes for table `suppitems`
--
ALTER TABLE `suppitems`
  ADD PRIMARY KEY (`supp_item_id`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- AUTO_INCREMENT for table `suppitems`
--
ALTER TABLE `suppitems`
  MODIFY `supp_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
