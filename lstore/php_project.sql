-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 08:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin1', 'ad1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(3, 9000.00, 'shipped', 3, 123456789, 'ho chi minh', '112/3', '2023-11-19 17:42:12'),
(4, 18000.00, 'not paid', 3, 123456789, 'ho chi minh', '112/3', '2023-11-21 06:46:22'),
(6, 1400.00, 'not paid', 3, 123456789, 'ho chi minh', '112/3', '2023-11-21 07:10:53'),
(7, 15400.00, 'not paid', 4, 12345678, 'ho chi minh', '123/4', '2023-12-02 05:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, '2', 'ASUS Zenbook Duo 14', 'featured2.jpg', 1400.00, 3, 3, '2023-11-12 20:28:14'),
(2, 1, '3', 'Predator 21X', 'featured3.jpg', 9000.00, 1, 3, '2023-11-12 20:28:14'),
(3, 2, '4', 'HP Spectre 360X', 'featured4.jpg', 2000.00, 3, 3, '2023-11-13 02:25:53'),
(4, 2, '3', 'Predator 21X', 'featured3.jpg', 9000.00, 1, 3, '2023-11-13 02:25:53'),
(5, 3, '3', 'Predator 21X', 'featured3.jpg', 9000.00, 1, 3, '2023-11-19 17:42:12'),
(6, 4, '3', 'Predator 21X', 'featured3.jpg', 9000.00, 2, 3, '2023-11-21 06:46:22'),
(7, 6, '2', 'ASUS Zenbook Duo 14', 'featured2.jpg', 1400.00, 1, 3, '2023-11-21 07:10:53'),
(8, 7, '2', 'ASUS Zenbook Duo 14', 'featured2.jpg', 1400.00, 11, 4, '2023-12-02 05:52:02'),
(9, 8, '14', 'test', 'test', 9999.00, 8, 4, '2023-12-02 07:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(9,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`) VALUES
(1, 'MSI Katana 15', 'Gaming', 'Msi gaming laptop ', 'featured1.jpg', 'featured1.jpg', 'featured1.jpg', 'featured1.jpg', 1100.00, 0),
(2, 'ASUS Zenbook Duo 14', 'Office', 'Asus office laptop ', 'featured2.jpg', 'featured2.jpg', 'featured2.jpg', 'featured2.jpg', 1400.00, 0),
(3, 'Predator 21X', 'Gaming', 'Predator most powerful laptop ', 'featured3.jpg', 'featured3.jpg', 'featured3.jpg', 'featured3.jpg', 9000.00, 0),
(4, 'HP Spectre 360X', 'Office', 'HP office laptop ', 'featured4.jpg', 'featured4.jpg', 'featured4.jpg', 'featured4.jpg', 2000.00, 0),
(5, 'Asus Vivobook 14', 'Office', 'Asus office vivobook', 'office1.jpg', 'office1.jpg', 'office1.jpg', 'office1.jpg', 1000.00, 0),
(6, 'Msi Mordern 15', 'Office', 'Msi office laptop', 'office2.png', 'office2.png', 'office2.png', 'office2.png', 600.00, 0),
(7, 'HP ProBook 450', 'Office', 'HP office laptop', 'office3.png', 'office3.png', 'office3.png', 'office3.png', 700.00, 0),
(8, 'HP Pavilion 15', 'Office', 'hp office lap', 'office4.jpg', 'office4.jpg', 'office4.jpg', 'office4.jpg', 1200.00, 0),
(9, 'Msi Raider GE76/66', 'Gaming', 'MSI gaming laptop', 'gaming1.jpg', 'gaming1.jpg', 'gaming1.jpg', 'gaming1.jpg', 2500.00, 0),
(10, 'Msi Stealth GS77/66', 'Gaming', 'MSI gaming laptop', 'gaming2.jpg', 'gaming2.jpg', 'gaming2.jpg', 'gaming2.jpg', 2200.00, 0),
(11, 'Asus ROG Strix G16', 'Gaming', 'Asus gaming laptop', 'gaming3.jpg', 'gaming3.jpg', 'gaming3.jpg', 'gaming3.jpg', 2400.00, 0),
(12, 'Asus TUF A15', 'Office', 'Asus gaming TUF laptop', 'gaming4.png', 'gaming4.png', 'gaming4.png', 'gaming4.png', 1600.00, 0),
(17, 'test1', 'Gaming', 'test', 'test11.jpeg', 'test12.jpeg', 'test13.jpeg', 'test14.jpeg', 100000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(3, 'user1', 'u1@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(4, 'u2', 'user2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
