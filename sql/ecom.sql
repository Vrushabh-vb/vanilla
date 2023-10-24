-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 08:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `pid` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `descr` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`pid`, `img`, `title`, `price`, `descr`, `category`) VALUES
(7, 'card1.webp', 'WROGEN', 1, 'This is Wrogen!!', 'Men'),
(8, 'arrow.webp', 'Arrow', 1200, 'Arrow is a Premium clothing Brand', 'Men'),
(9, 'peter.webp', 'Peter England', 999, 'PE', 'Men'),
(12, 'h$m.webp', 'H&M', 2000, 'NA', 'Men'),
(13, 'levies.webp', 'Levis', 899, 'NA', ''),
(14, 'puma hoodie.webp', 'PUMA', 999, 'NA', ''),
(15, 'allen solly.webp', 'Allen Solly', 1300, 'NA', ''),
(16, 'card2.webp', 'Raymond', 1499, 'NA', ''),
(17, 'biba.webp', 'BIBA', 850, 'NA', ''),
(26, 'women4.webp', 'HM Kurti', 999, 'na', 'Women'),
(27, 'women5.webp', 'BIBA', 1500, 'na', 'Women'),
(28, 'fish-burger.png', 'Burger', 99, 'na', 'Men'),
(29, 'fish-burger.png', 'Fish burger', 120, 'na', 'Men'),
(30, 'veggie-burger.png', 'Veggie Burger', 80, 'na', 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`) VALUES
(1, 'vrushabh', 'vb@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
