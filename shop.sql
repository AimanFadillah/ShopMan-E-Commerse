-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 03:51 AM
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
(1, 'Gion', 'mengurangi bug'),
(4, 'aiman', 'Apa iya');

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
(1, 'Aiman', 'sama kayanya'),
(2, 'Bejo', 'Loh iya kah');

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
(1, 'Aiman', 'Tulip ip ip ip ip');

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
(1, 'aiman', 'boleh 😛😛😌'),
(2, 'Faisal', 'Boleh');

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
(1, 'Elon Musk', 'udah normal lagi ');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_65`
--

CREATE TABLE `komentar_65` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `komentar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_65`
--

INSERT INTO `komentar_65` (`id`, `nama`, `komentar`) VALUES
(1, 'Aiman', 'First');

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
  `id_komen` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `keterangan`, `harga`, `img`, `id_komen`, `kategori`) VALUES
(60, 'Koala', 'mahal yap', 1200000, 'Koala.jpg', '60', 'hewan'),
(61, 'Jeruk dari bali', 'yoi', 5000, 'jeruk.jpg', '61', 'makanan'),
(62, 'Tulip', 'Harga nya terjakau cuy', 2000, 'Tulips.jpg', '62', 'makanan'),
(63, 'Bandar', 'yooo', 10000, 'Penguins.jpg', '63', 'hewan'),
(64, 'Rumah', 'yap', 200000, 'Lighthouse.jpg', '64', 'Perabotan'),
(65, 'JellyFish', 'yap', 1000000, 'Jellyfish.jpg', '65', 'hewan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar_60`
--
ALTER TABLE `komentar_60`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar_61`
--
ALTER TABLE `komentar_61`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar_62`
--
ALTER TABLE `komentar_62`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_63`
--
ALTER TABLE `komentar_63`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar_64`
--
ALTER TABLE `komentar_64`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_65`
--
ALTER TABLE `komentar_65`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
