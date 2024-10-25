-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 09:34 AM
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
-- Database: `jewelry_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `jewelry`
--

CREATE TABLE `jewelry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jewelry`
--

INSERT INTO `jewelry` (`id`, `name`, `image`, `price`, `category`) VALUES
(1, 'Diamond Ring', 'images/g4.png', 499.99, 'Ring'),
(2, 'Gold Necklace', 'images/d2.webp', 749.99, 'Necklace'),
(3, 'Silver Earrings', 'images/e7.png', 199.99, 'Earrings'),
(4, 'Platinum Bracelet', 'images/b1.png', 999.99, 'Bracelet'),
(5, 'Ruby Pendant', 'images/p5.png', 299.99, 'Pendant'),
(6, 'Gold Ring ', 'images/g1.png', 15000.00, 'Ring'),
(7, 'Gold Ring ', 'images/g1.png', 15000.00, 'Ring'),
(8, 'Gold Ring ', 'https://admin.pngadgil1832.com/UploadedFiles/CategoryImages/GR14287557PNG_01.png', 15000.00, 'Ring'),
(9, 'Diamond Earrings ', 'https://pngimg.com/d/jewelry_PNG6823.png', 150000.00, 'earring');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'chauhan savan bhupenbhai', 'chauhansavan@gmail.com', 'bhupen', '$2y$10$N0cRtVicMl9d18KnVOI.N..tKF/ntNENIh3jatWFJTX0j.xuDuHWi', '2024-09-15 15:43:33'),
(2, 'chauhan savan bhupenbhai', 'chauhansavan1@gmail.com', 'BHUPEN66', '$2y$10$zRT4QQHaiYD7J05JbhPaSe0FOgbnHPMdaAYgN/lOWWrMNrFzLz5oC', '2024-09-16 10:10:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jewelry`
--
ALTER TABLE `jewelry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jewelry`
--
ALTER TABLE `jewelry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
