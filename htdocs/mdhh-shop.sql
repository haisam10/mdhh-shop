-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 11:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdhh-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_description`, `item_price`, `item_image`) VALUES
(20, 'Shop t-shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled itff', 900.00, 't-shirt-1.avif'),
(23, 'hoodie-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', 960.00, 'hoodie-1.avif'),
(24, 'Cup-Black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it is', 400.00, 'cup-black.avif'),
(25, 'Baby-cap-black', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', 600.00, 'baby-cap-black.avif'),
(26, 'baby-onesie-beige-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', 550.00, 'baby-onesie-beige-1.avif'),
(27, 'bag-1-dark', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it view', 100.00, 'bag-1-dark.avif'),
(28, 'mug-1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it', 300.00, 'mug-1.avif'),
(31, 'green-shirt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500.00, 'green-shirt.jpg'),
(54, 'Titan ', 'Titan Quartz Analog Black Dial Ceramic Strap Watch for Men', 513.00, 'watch.png'),
(55, 'Purple Ceramics Green Dial Steel & Ceramic Strap Watch for Women', 'This watch offers 24 months warranty on the Movement and 12 months warranty on the Battery from the date of purchase', 378.00, 'watch2.png'),
(59, 'Shaving Kit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.Lobortis imperdiet, excepteur accumsan ', 200.00, 'shaving-kit.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` enum('new_order','packaging','out_for_delivery','delivered') DEFAULT 'new_order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `phone`, `address`, `order_date`, `status`) VALUES
(1, 'MDHH', '1985767704', 'Dhaka', '2025-01-19 19:29:53', 'packaging'),
(2, 'MDHH', '0123456789', 'Dhaka', '2025-01-19 20:10:12', 'delivered'),
(3, 'MDHH', '66312', 'Dhaka', '2025-03-26 19:48:42', 'delivered'),
(4, 'MDHH', '1234567', 'Dhaka', '2025-05-27 05:11:54', 'packaging'),
(5, 'arsi', '123456789', 'dhaka', '2025-05-27 05:25:50', 'out_for_delivery'),
(6, 'arshi', '123456', 'Dhaka', '2025-06-27 05:26:18', 'packaging'),
(7, 'sac', '656320320', 'asca', '2025-07-31 18:10:37', 'packaging'),
(8, 'dv', '51561', '++dfbd', '2025-07-31 19:54:56', 'delivered'),
(9, 'adnan', '123456789', 'dhaka,uttara', '2025-07-31 20:05:35', 'delivered'),
(10, 'kbace', '123456789', 'hakjncka', '2025-07-31 20:06:27', 'out_for_delivery'),
(11, 'ujjol', '123456789', 'qwertyuiop', '2025-07-31 20:07:07', 'packaging'),
(12, 'lorm 25', '123456789', 'dfghjkl;', '2025-07-31 22:09:20', 'out_for_delivery'),
(13, 'nobeta', '1232456789', 'adhjkl', '2025-07-31 22:13:19', 'delivered'),
(14, 'svs', '87465', 'sdvsv', '2025-07-31 22:24:35', 'new_order'),
(15, 'acasc', '8941651', 'sacas', '2025-07-31 22:29:43', 'new_order'),
(16, 'haisam', '123456789', 'qwertyuiop', '2025-07-31 23:14:23', 'packaging'),
(17, 'jeson', '123456789', 'qwertyuiop', '2025-07-31 23:21:48', 'new_order');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_name`, `price`, `image`) VALUES
(1, 1, 'hoodie-1', 960.00, 'hoodie-1.avif'),
(2, 1, 'green-shirt', 500.00, 'green-shirt.jpg'),
(3, 2, 'green-shirt', 500.00, 'green-shirt.jpg'),
(4, 2, 'hoodie-1', 960.00, 'hoodie-1.avif'),
(5, 3, 'Shop t-shirt-1', 900.00, 't-shirt-1.avif'),
(6, 3, 'Cup-Black', 400.00, 'cup-black.avif'),
(7, 4, 'Shop t-shirt-1', 900.00, 't-shirt-1.avif'),
(8, 4, 'mug-1', 300.00, 'mug-1.avif'),
(9, 4, 'Titan ', 513.00, 'watch.png'),
(10, 5, 'Shop t-shirt-1', 900.00, 't-shirt-1.avif'),
(11, 6, 'Shop t-shirt-1', 900.00, 't-shirt-1.avif'),
(12, 7, 'Cup-Black', 400.00, 'cup-black.avif'),
(13, 7, 'Baby-cap-black', 600.00, 'baby-cap-black.avif'),
(14, 8, 'Cup-Black', 400.00, 'cup-black.avif'),
(15, 8, 'Baby-cap-black', 600.00, 'baby-cap-black.avif'),
(16, 8, 'acasc', 23.00, 'XPJRJiCm38RlA_KTejq0Wl404veux0O9mSGGzrvZZK2QZDW50UBTSTlra7P0BwhMzlx-d-tid1W25xbDapGvK4l8Nc23b2RR-abDSg_HJjHNcYYvCWj4QiM5HiTDiBocoaZ0w7vanS6uZNAGuvwmngryEXUTFKd2Z8rtNUPORP2lzU7H87GhugFWefKUfLQrS1F_Bhaxi0jcT1fSXlUO-Q.png'),
(17, 9, 'Shop t-shirt-1', 900.00, 't-shirt-1.avif'),
(18, 9, 'hoodie-1', 960.00, 'hoodie-1.avif'),
(19, 10, 'hoodie-1', 960.00, 'hoodie-1.avif'),
(20, 11, 'Cup-Black', 400.00, 'cup-black.avif'),
(21, 11, 'Baby-cap-black', 600.00, 'baby-cap-black.avif'),
(22, 12, 'hoodie-1', 960.00, 'hoodie-1.avif'),
(23, 13, 'Cup-Black', 400.00, 'cup-black.avif'),
(24, 14, 'Cup-Black', 400.00, 'cup-black.avif'),
(25, 15, 'Purple Ceramics Green Dial Steel & Ceramic Strap Watch for Women', 378.00, 'watch2.png'),
(26, 16, 'Shaving Kit', 200.00, 'shaving-kit.jpg'),
(27, 17, 'Shaving Kit', 200.00, 'shaving-kit.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
