-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:27 AM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `img`) VALUES
(1, 'Eletronik', 'elektronik'),
(2, 'Pakaian', 'pakaian'),
(3, 'Makanan', 'makanan'),
(4, 'Kecantikan', 'kecantikan'),
(5, 'Obat', 'Obat'),
(6, 'Mainan', 'mainan'),
(7, 'Perabotan', 'perabotan'),
(8, 'Hewan', 'hewan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_produk` int(11) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_produk`, `user`) VALUES
(61, 'aiman'),
(62, 'ilyas'),
(63, 'ilyas'),
(65, 'abyan'),
(63, 'abyan'),
(64, 'abyan');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(255) DEFAULT NULL,
  `id_produk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `komentar`, `id_produk`) VALUES
(1, 'aiman', 'bug berhasil dicegah', '60');

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
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `keterangan`, `harga`, `img`, `kategori`) VALUES
(60, 'Koala', 'mahal yap', 12000, 'Koala.jpg', 'hewan'),
(61, 'Jeruk bali', 'yoi', 5000, 'jeruk.jpg', 'makanan'),
(62, 'Tulip ip ip', 'Harga nya terjakau cuy', 2000, 'Tulips.jpg', 'makanan'),
(63, 'Bandar', 'yooo', 10000, 'Penguins.jpg', 'hewan'),
(64, 'Rumah Ytta', 'ya', 2000000, 'Lighthouse.jpg', 'perabotan'),
(65, 'ikan ubur ubur', 'yooo', 140000, 'Jellyfish.jpg', 'hewan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`) VALUES
('638310', 'aiman', '$2y$10$Z.d9UCtPYkhbgJ/9Z5dEiOmhkPlP8.7T7HYrEMb8WmCsY1Fx8uFCi'),
('6383143', 'ilyas', '$2y$10$PYWzJn2YoAIkLmaywLAaNOi0JqOAyH0CIm2JbU7kpSc6ac94TaQni'),
('6389c71eb3a66', 'pradika', '$2y$10$APEbC0JFwymoe4Eoq5Ds1usQhA9.O8GnjQ5eokhW3Ii291McdjUMm'),
('638ad16e3383c', 'abyan', '$2y$10$f2MLud/dWDTsgcvFAnopTezMcYNGho/DCFp5YecwmIsY0U8eZM4A2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
