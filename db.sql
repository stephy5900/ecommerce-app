-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 02:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photo_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photograph_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photograph_id`, `created`, `author`, `body`) VALUES
(1, 3, '2018-07-02 09:11:04', 'Stephanie', 'this baby is cute'),
(2, 3, '2018-07-02 09:25:09', 'adjoa', 'reminds me of my kid brother'),
(3, 3, '2018-07-02 18:53:51', 'alicia', 'i love this baby'),
(4, 6, '2018-07-03 10:16:57', 'Jennifer', 'hearts:)'),
(5, 10, '2018-07-03 10:28:43', 'Agatha', 'fiery little one'),
(6, 16, '2018-07-05 10:53:05', 'alicia', 'i love green'),
(7, 18, '2018-07-05 14:19:38', 'AMA', 'Its very efficient'),
(12, 17, '2018-07-06 12:39:59', 'John Kuma', 'I love this piece.'),
(13, 18, '2018-07-06 12:42:35', 'Asamba', 'Does it come in green too'),
(20, 17, '0000-00-00 00:00:00', 'mel', 'lovely piece'),
(21, 20, '2018-07-19 11:13:07', 'Oforiwaa', 'How can something this small produce such wonderful sounds.'),
(26, 21, '2018-07-26 13:04:38', 'Kwaku Li', 'It\'s exactly as described. Thanks Boxie'),
(30, 21, '2018-07-26 13:21:38', 'Sarah', 'I love the fact that it is in green');

-- --------------------------------------------------------

--
-- Table structure for table `c_login`
--

CREATE TABLE `c_login` (
  `id` int(100) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_login`
--

INSERT INTO `c_login` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Kojo', 'Boadu', 'kojo2@gmail.com', '1234'),
(2, 'Anita', 'Amankwah', 'aaamankwah@yahoo.com', 'nitty'),
(3, 'Janice', 'Omaboe', 'jayabena@yahoo.com', 'steph'),
(4, 'Hannah', 'Bernard', 'hannidee@gmail.com', 'dee'),
(5, 'Anthony', 'Antwi', 'papa@yahoo.com', 'papa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone_num` int(13) NOT NULL,
  `product` varchar(60) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone_num`, `product`, `qty`, `address`, `price`, `total`) VALUES
(4, 'Stephanie Dumod', 572715020, 'Green headphones', '1', '2nd Adotey Obour Link', '195.99', '195.99'),
(5, 'Kofi Appiah', 244575088, 'Blue Wristband Tracker', '1', 'No. 2 forest drive, Achimota', '75.99', '75.99'),
(6, 'Angelina Acheampong', 244568651, 'Blue Headphones', '2', 'Dr. Hilla Limann Hall, ug', '99.45', '198.90'),
(7, 'Vera', 244789356, 'Lime Green Speaker', '5', 'Hilla Limann Hall, UG', '125.65', '628.25'),
(9, 'Kwabena Adu', 244789628, 'Lime Green Speaker', '2', '2nd Adotey Obour Link', '125.65', '251.30'),
(10, 'Angel', 244789652, 'Lime Green Speaker', '5', 'North Ridge Hospital', '125.65', '628.25'),
(11, 'Samuel Ofori', 501477798, 'Green Speaker', '1', 'Dr. Close, Korle-Bu', '89.00', '89.00'),
(12, 'Afia', 572715020, 'Green Headphones', '5', 'No. 2 forest drive, Achimota', '195.99', '979.95');

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

CREATE TABLE `photographs` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `filename`, `type`, `size`, `caption`, `price`, `description`) VALUES
(16, 'ArmyGreenheadphones_400x300-jpg-keep-ratio.png', 'image/png', 88178, 'Green Headphones', '195.99', 'Lorem ipsum blab bas Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie'),
(17, 'BlueHeadphones_400x300-jpg-keep-ratio.png', 'image/png', 88035, 'Blue Headphones', '99.45', 'Lorem ipsum blab bas Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie'),
(18, 'BlueJawbone_400x300-jpg-keep-ratio.png', 'image/png', 37852, 'Blue Wristband Tracker', '75.99', 'Lorem ipsum blab bas Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie'),
(19, 'LimeGreenSpeaker_400x300-jpg-keep-ratio.png', 'image/png', 94244, 'Lime Green Speaker', '125.65', 'Lorem ipsum blab bas Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie  is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie'),
(20, 'LimeGreenroundspeaker_400x300-jpg-keep-ratio.png', 'image/png', 68033, 'Green Speaker', '89.00', 'Lorem ipsum blab bas Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie'),
(21, 'LimeGreenFitBit_400x300-jpg-keep-ratio.png', 'image/png', 58451, 'Lime Green Fitness Tracker', '145.99', 'Lorem ipsum blab bas Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie is a clean and modern HTML/CSS Template for your LemonStand cloud store! User friendly and simple for Boxie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(40) DEFAULT NULL,
  `First_name` varchar(30) DEFAULT NULL,
  `Last_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `First_name`, `Last_name`) VALUES
(1, 'afya', 'love5900', 'Steph', 'Carter'),
(2, 'kofi', '123', 'dan', 'bannerman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photograph_id` (`photograph_id`);

--
-- Indexes for table `c_login`
--
ALTER TABLE `c_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price` (`price`);

--
-- Indexes for table `photographs`
--
ALTER TABLE `photographs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `caption` (`caption`),
  ADD UNIQUE KEY `price` (`price`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `c_login`
--
ALTER TABLE `c_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `photographs`
--
ALTER TABLE `photographs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`price`) REFERENCES `photographs` (`price`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
