-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:10 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar_60`
--

CREATE TABLE `komentar_60` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_60`
--

INSERT INTO `komentar_60` (`id`, `nama`, `komentar`) VALUES
(1, 'AIMAN', 'mengurangi bug'),
(2, 'xio', 'mudah mudahan gk ada bug yang menggangu lagi'),
(3, 'kasurman', 'Apa iya coba cari lagi buggnya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_61`
--

CREATE TABLE `komentar_61` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_61`
--

INSERT INTO `komentar_61` (`id`, `nama`, `komentar`) VALUES
(1, 'Aiman', 'bedanya sama jeruk biasa apa?');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_62`
--

CREATE TABLE `komentar_62` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_62`
--

INSERT INTO `komentar_62` (`id`, `nama`, `komentar`) VALUES
(1, 'man', 'Tulip ip ip ip');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_63`
--

CREATE TABLE `komentar_63` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_63`
--

INSERT INTO `komentar_63` (`id`, `nama`, `komentar`) VALUES
(1, 'aiman', 'boleh 😛😛😌');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_64`
--

CREATE TABLE `komentar_64` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_64`
--

INSERT INTO `komentar_64` (`id`, `nama`, `komentar`) VALUES
(1, 'Elon', 'loh wkwkwk bisa gitu harga nya');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_65`
--

CREATE TABLE `komentar_65` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `produk` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `id_komen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `keterangan`, `harga`, `img`, `id_komen`) VALUES
(60, 'koala', 'mahal lah', 1200000, 'Koala.jpg', '60'),
(61, 'Jeruk dari bali', 'yoi', 5000, 'jeruk.jpg', '61'),
(62, 'Tulip', 'Harga nya terjakau cuy', 2000, 'Tulips.jpg', '62'),
(63, 'Bandar', 'yooo', 1000000, 'Penguins.jpg', '63'),
(64, 'Rumah mas Elon', 'yeyeye', 2147483647, 'Lighthouse.jpg', '64'),
(65, 'JellyFish', 'apakah negbug lagi', 1000000000, 'Jellyfish.jpg', '65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar_60`
--
ALTER TABLE `komentar_60`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_61`
--
ALTER TABLE `komentar_61`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_62`
--
ALTER TABLE `komentar_62`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_63`
--
ALTER TABLE `komentar_63`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_64`
--
ALTER TABLE `komentar_64`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_65`
--
ALTER TABLE `komentar_65`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar_60`
--
ALTER TABLE `komentar_60`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar_61`
--
ALTER TABLE `komentar_61`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_62`
--
ALTER TABLE `komentar_62`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_63`
--
ALTER TABLE `komentar_63`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_64`
--
ALTER TABLE `komentar_64`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_65`
--
ALTER TABLE `komentar_65`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
