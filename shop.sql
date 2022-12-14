-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 11:33 AM
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
(74, 'abyan'),
(91, 'abyan'),
(92, 'abyan'),
(93, 'abyan');

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
  `kategori` varchar(50) DEFAULT NULL,
  `pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `keterangan`, `harga`, `img`, `kategori`, `pemilik`) VALUES
(74, 'Tulip ip ip', 'tuiip,bungan,kucing,', 3000, 'Tulips.jpg', 'obat', '638310'),
(91, 'Koala', 'suka tidur makan dll', 2000, 'Koala.jpg', 'hewan', '638310'),
(92, 'Rumah Mas elon', 'rumah paling murah dari mas elon dijamin ori', 1000, 'Lighthouse.jpg', 'perabotan', '638310'),
(93, 'Ubur Ubur dari tadi', 'suka ditangkep sama spongebob', 2000, 'Jellyfish.jpg', 'hewan', '638310'),
(94, 'jeruk oren', 'jeruk yang dipetik pilihan', 500, 'jeruk.jpg', 'makanan', '638310'),
(95, 'Bandar pilihan', 'dapat memberika anda link link pilihan diluar sana', 1000, 'Penguins.jpg', 'hewan', '638310'),
(101, 'Gunung', 'yooo', 200, 'belakang.jpg', 'perabotan', '638ad16e3383c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dompet` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `tentangToko` varchar(255) NOT NULL,
  `namaToko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `dompet`, `img`, `tentangToko`, `namaToko`) VALUES
('638310', 'aiman', '$2y$10$Z.d9UCtPYkhbgJ/9Z5dEiOmhkPlP8.7T7HYrEMb8WmCsY1Fx8uFCi', 3650, 'bawaan.jpg', 'Tidak ada Tentang Toko', 'aiman'),
('6383143', 'ilyas', '$2y$10$PYWzJn2YoAIkLmaywLAaNOi0JqOAyH0CIm2JbU7kpSc6ac94TaQni', 2000, 'bawaan.jpg', 'Tidak ada Tentang Toko', 'ilyas'),
('6389c71eb3a66', 'pradika', '$2y$10$APEbC0JFwymoe4Eoq5Ds1usQhA9.O8GnjQ5eokhW3Ii291McdjUMm', 1000, 'bawaan.jpg', 'Tidak ada Tentang Toko', 'pradika'),
('638ad16e3383c', 'abyan', '$2y$10$f2MLud/dWDTsgcvFAnopTezMcYNGho/DCFp5YecwmIsY0U8eZM4A2', 1050, 'Screenshot (506).png', 'Toko Murah dan Terpercaya', 'Toko Wilayah'),
('63933b4fddcc3', 'hani', '$2y$10$.gwLDg185KncFSvSKzCnR.ge/Fn0aC4RTlbufUqEk7XIELKFrHX3a', 500, 'bawaan.jpg', 'Tidak ada Tentang Toko', 'hani'),
('6395d3c940f92', 'dama', '$2y$10$7QA7gUmQBhNt0Jnp9Pp9jOcBk38c7eCJcbsgVNcC3KgbdCI28KL2O', 2800, 'bawaan.jpg', 'Tidak ada Tentang Toko', 'dama');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
