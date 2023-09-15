-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 14, 2022 at 09:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amethyst store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `F_name` varchar(40) NOT NULL,
  `L_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `F_name`, `L_name`, `email`, `password`) VALUES
(12312355, 'Hajar', 'Bawazir', 'Hajar.11@gmail.com', 'Hajar.123456'),
(12477845, 'Sahar', 'Alzahrani', 'Sahar.22@gmail.com', 'Sahar.965835'),
(12511789, 'Wadha', 'Alhajri', 'Wadha.33 @gmail.com', 'Wadha.643843'),
(12633221, 'Teaf', 'Bashamakh', 'Teaf.44@gmail.com', 'Teaf.537436'),
(12799003, 'Asma', 'Alhajri', 'Asma.55@gmail.com', 'Asma.653754'),
(12814467, 'Lama', 'Alghamdi', 'Lama.66@gmail.com', 'Lama.464378'),
(12999734, 'Nour', 'Almatroudi', 'Nour.77@gmail.com', 'Nour.654785'),
(13067846, 'Waad', 'Alsobi', 'Waad.88@gmail.com', 'Waad.654784');

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Message` text NOT NULL,
  `Done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_service`
--

INSERT INTO `customer_service` (`id`, `Name`, `Email`, `Message`, `Done`) VALUES
(1, 'Lola Marshall', 'Lola@gmail.com', 'Did you know the word essay is derived from a Latin word exagium, which roughly translates to presenting ones case? So essays are a short piece of writing representing ones side of the argument or ones experiences, stories, etc. Essays are very personalized. So let us learn about types of essays, format, and tips for essay-writing.', 0),
(2, 'Chandler Mathews', 'Chandler@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(3, 'Payten Pierce', 'Payten@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(4, 'Fernando Cameron', 'Chaim@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(5, 'Jaslene Odom', 'Jaslene@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(6, 'Colton Dorsey', 'Colton@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(7, 'Eugene Tucker', 'Eugene@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(8, 'Armani Wolfe', 'Armani@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(9, 'Lola Marshall', 'Lola@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0),
(10, 'Chandler Mathews', 'Chandler@gmail.com', 'Styling an HTML table isn\'t the most glamorous job in the world, but sometimes we all have to do it. This article provides a guide to making HTML tables look good, with some specific table styling techniques highlighted.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `picture` varchar(60) NOT NULL,
  `category` varchar(40) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `picture`, `category`, `price`, `stock`, `description`) VALUES
(111, 'white gold amethyst pendant necklace', 'images/white_necklace.png', 'necklace', '700', 8, 'this amethyst pendant Constructed from 18kt white gold and adorned with diamonds.'),
(112, 'Gold-Tone, Amethyst and Blue Quartz Earrings', 'images/quartz.png', 'Earrings', '889', 8, 'Gold-tone, amethyst, and blue quartz earrings that is 14-karat gold-plated and contains a beautiful and rare Amythest gemstone with Quartz it.'),
(113, 'The Amethyst Crescent Necklace', 'images/necklace_am.png', 'necklace', '300', 10, 'This necklace is made with healing amethyst stones and one gold-plated crescent charm.'),
(222, 'Rose Gold Amethyst Ring', 'images/Rose_Gold_Ring.jpg', 'Ring', '280', 10, '18K rose gold ring garnished with a gleaming Purple Amethyst at its center. '),
(333, 'Amethyst Necklace', 'images/necklace.png', 'necklace', '800', 9, 'Amythest Necklace that is made out of gold and contains a beautiful and rare Amythest gemstone within the center of a golden loop.'),
(444, 'Diamond Necklace', 'images/diamond_necklace.png', 'necklace', '500', 11, 'Diamond Necklace that is amethyst, 14-karat gold-plated and contains a beautiful and rare Amythest gemstone.'),
(555, 'Amethyst Powerful Stone', 'images/Powerful_Stone.png', 'necklace ', '147', 10, 'Natural Genuine Pink Amethyst - Gemstone Amethyst jewelry - Stone necklace - Handmade Jewelry Amethyst Gemstone Pink Necklace, Minimize exposure to water. Clean with a soft cloth when required. '),
(666, 'Round Ring Gold, Purple Amethyst', 'images/RoundRing.jpg', 'Ring', '600', 11, 'It is made out of Purple Amethyst and cast from 14-karat gold with a chunky band.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13067848;

--
-- AUTO_INCREMENT for table `customer_service`
--
ALTER TABLE `customer_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
