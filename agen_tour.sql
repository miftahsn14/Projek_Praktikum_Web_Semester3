-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 03:28 PM
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
-- Database: `agen_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `jml_orang` int(11) NOT NULL,
  `jenis` enum('Reguler','Paket','Cicilan') NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `keuntungan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id_booking`, `id_tour`, `nama_pemesan`, `jml_orang`, `jenis`, `tgl_pemesanan`, `keuntungan`) VALUES
(119, 1, 'paket', 4, 'Paket', '2024-11-18 20:51:12', 11000000.00),
(120, 1, 'paket 5 org', 5, 'Paket', '2024-11-18 20:51:48', 8250000.00),
(121, 1, 'untung reguler', 1, 'Reguler', '2024-11-18 20:53:49', 2750000.00),
(122, 1, 'untung paket', 5, 'Paket', '2024-11-18 20:53:49', 8250000.00),
(123, 1, 'untung cicilan', 1, 'Cicilan', '2024-11-18 20:53:49', 2750000.00),
(124, 1, 'untung cicilan 2', 1, 'Cicilan', '2024-11-18 21:09:01', 2750000.00),
(125, 1, 'untung cicilan 3', 1, 'Cicilan', '2024-11-18 21:22:17', 2750000.00),
(126, 1, 'cicialn 4', 1, 'Cicilan', '2024-11-18 21:23:41', 2750000.00),
(127, 1, 'haduh cicialn keuntungan', 2, 'Cicilan', '2024-11-18 21:26:24', 5500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id_detail` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `tiket_pesawat` decimal(10,2) NOT NULL,
  `transportasi` decimal(10,2) NOT NULL,
  `konsumsi` decimal(10,2) NOT NULL,
  `tiket_wisata` decimal(10,2) NOT NULL,
  `tour_guide` decimal(10,2) NOT NULL,
  `insurance` decimal(10,2) NOT NULL,
  `hotel` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id_detail`, `id_tour`, `tiket_pesawat`, `transportasi`, `konsumsi`, `tiket_wisata`, `tour_guide`, `insurance`, `hotel`) VALUES
(1, 1, 4000000.00, 2500000.00, 3500000.00, 1250000.00, 1000000.00, 3000000.00, 4000000.00),
(2, 2, 3750000.00, 2750000.00, 3750000.00, 2000000.00, 2500000.00, 4250000.00, 5000000.00),
(3, 3, 3500000.00, 3000000.00, 4000000.00, 1475000.00, 1500000.00, 3525000.00, 4500000.00),
(4, 4, 3500000.00, 3000000.00, 4000000.00, 2500000.00, 1500000.00, 3500000.00, 3000000.00),
(5, 5, 3000000.00, 2625000.00, 4000000.00, 2375000.00, 2000000.00, 3000000.00, 3750000.00),
(6, 6, 2000000.00, 1750000.00, 3000000.00, 1250000.00, 1000000.00, 1500000.00, 2000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id_tour` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `original_price` decimal(15,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id_tour`, `country`, `duration`, `price`, `original_price`, `description`, `tanggal`) VALUES
(1, 'Canada', 5, 22000000.00, 25000000.00, 'Explore the beautiful cities of Canada with our 5-day tour.', '24 - 28 January 2025'),
(2, 'Japan', 7, 30000000.00, 32000000.00, 'Experience the culture and history of Japan in this 7-day tour.', '22 - 28 June 2025'),
(3, 'France', 6, 27000000.00, 29000000.00, 'Discover the elegance of France with our guided tour. Explore the romantic allure of Paris.', '1 - 6 July 2025'),
(4, 'China', 5, 24000000.00, 26000000.00, 'Explore the wonders of China! Embark on a journey through the rich history and culture of the Middle Kingdom.', '10 - 14 July 2025'),
(5, 'Germany', 5, 22000000.00, 24000000.00, 'Enjoy the architectural marvels of Germany. Germany’s architecture is a testament to centuries of artistic achievement and innovation', '7 - 11 October 2025'),
(6, 'Thailand', 4, 15000000.00, 24000000.00, 'Thailand, officially the Kingdom of Thailand, is a Southeast Asian country known for its stunning beaches, vibrant culture, and delicious cuisine.', '1 - 6 May 2025');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$rarDrkSW7reTFVCyBThfbe4KD7UhhN7UJwbA/JKQcEh.8p6ZrWdhO'),
(2, 'admin2', '$2y$10$DKPI5YQEww1mxJV7w.b8DOkrn6ItwD3HS.c5c6dVTHxP.KoEs/imO'),
(3, 'miftah', '$2y$10$bfpDfKO2laUPpnMxniyW9Otd9fPyt3Wpov/C2lI0LpftgZmxSMQ7u'),
(4, 'ketty', '$2y$10$8K4kjf3U5m88ZQUk85x6NeJLl82cAggO/af7f1U6lXs/FUn6GoaOK'),
(5, 'admin3', '$2y$10$y4AHSHgv/GGJtN456cZoReg8fT7KtpBk5K0oaGEWYNaDVx0l6JEC.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_id_tour` (`id_tour`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_idtour` (`id_tour`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id_tour`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id_tour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_id_tour` FOREIGN KEY (`id_tour`) REFERENCES `tours` (`id_tour`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_idtour` FOREIGN KEY (`id_tour`) REFERENCES `tours` (`id_tour`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
