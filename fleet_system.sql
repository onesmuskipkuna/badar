-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 09:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleet_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cleared_goods`
--

CREATE TABLE `cleared_goods` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `conditions` varchar(100) NOT NULL,
  `full_pallets_qty` int(11) NOT NULL,
  `half_pallets_qty` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `receipt_code` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `delivery_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `assigned_driver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cleared_goods`
--

INSERT INTO `cleared_goods` (`id`, `serial_number`, `quantity`, `conditions`, `full_pallets_qty`, `half_pallets_qty`, `recipient`, `payment_method`, `receipt_code`, `delivery_date`, `status`, `delivery_status`, `user_id`, `assigned_driver`) VALUES
(3, 'MOTIY123', 30, 'Great', 20, 15, 6, 'MPESA', 'OTY4764CD', '2020-10-15', 0, 0, 4, 3),
(4, 'KMET245', 30, 'Perishable', 20, 15, 6, 'MPESA', 'OTY4764CD', '2020-10-30', 0, 0, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `delivered_goods`
--

CREATE TABLE `delivered_goods` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_comments` varchar(100) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `date_received` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivered_goods`
--

INSERT INTO `delivered_goods` (`id`, `driver_id`, `customer_id`, `customer_comments`, `goods_id`, `date_received`) VALUES
(1, 3, 2, '<p>Well Received</p>\r\n', 4, '2020-10-02'),
(2, 3, 3, '<p>wakey wakey</p>\r\n', 3, '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `driver_verification` varchar(100) NOT NULL,
  `driver_verification_date` int(11) NOT NULL,
  `customer_verification` int(11) NOT NULL,
  `customer_verification_date` datetime NOT NULL DEFAULT current_timestamp(),
  `officer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `role`, `password`) VALUES
(3, 'Kipkorir', 'kip@gmail.com', 'Kip', 'Driver', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Morgan', 'ingosi@gmail.com', 'Ingosi', 'Clearence Officer', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Dan', 'dan@gmail.com', 'Dan', 'Sales Manager', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Alvin', 'alvo@gmail.com', 'Alvo', 'Customer', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'admin', 'admin@gmail.com', 'admin', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Shadrack', 'shad@gmail.com', 'Shady', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cleared_goods`
--
ALTER TABLE `cleared_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivered_goods`
--
ALTER TABLE `delivered_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cleared_goods`
--
ALTER TABLE `cleared_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivered_goods`
--
ALTER TABLE `delivered_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
