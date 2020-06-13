-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2020 at 08:22 AM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautyne_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_masakan`
--

CREATE TABLE `kategori_masakan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_masakan`
--

INSERT INTO `kategori_masakan` (`id`, `nama`) VALUES
(1, 'Italian Food'),
(2, 'Japanese Food'),
(3, 'Breakfast'),
(4, 'Snack'),
(6, 'Chinese Food'),
(7, 'Soft Drink'),
(8, 'Milk'),
(9, 'Juice');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(7) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id`, `nama`, `id_kategori`, `harga`, `gambar`) VALUES
(1, 'Roti Bakar', 3, 10000, 'background_food_breakfast_83059_800x600.jpg'),
(2, 'Molen', 4, 5000, 'croissant_cakes_food_106664_800x600.jpg'),
(6, 'Greentea', 3, 9000, 'thai-matcha-green-tea-latte-frappe.jpg'),
(7, 'Pisang Keju', 3, 11000, 'resep-pisang-keju-coklat-yang-crispy-gak-ada-duanya-455bfff5ac73278eca5b39767eae87e7.jpg'),
(8, 'Thai Tea', 7, 9000, 'thai-tea.jpg'),
(10, 'Indomie Kuah', 3, 10000, 'Indomie-kuah.jpg'),
(11, 'Indomie Goreng', 3, 10000, 'indomie-goreng.jpg'),
(12, 'Sosis Bakar', 4, 10000, '1-38.jpg'),
(13, 'Roti Topping Sosis Bakar', 3, 11000, '2-37.jpg'),
(14, 'Sosis Bakar Cumi', 3, 12000, '4-35.jpg'),
(16, 'Sosis Bakar Madu', 3, 12000, '6-23.jpg'),
(17, 'Sosis Bakar Lada Hitam', 3, 12000, '8-17.jpg'),
(18, 'Sup Bakso Suki', 2, 17000, 'sop_suki_logo.jpg'),
(19, 'Jus Mangga', 9, 10000, 'shutterstock_1265282248.jpg'),
(20, 'Jus Alpukat', 9, 11000, 'doktersehat-alpukat.jpg'),
(21, 'Jus Wortel', 9, 10000, 'rsz_oojz1t0_42_20190605180208zQ9o0H.jpg'),
(22, 'Jus Buah Naga', 9, 13000, 'jus_buah_naga.png'),
(23, 'Jus Strawberry', 9, 11000, 'jus_strawberry.jpg'),
(24, 'Jus Jambu', 9, 10000, 'jus-jambu-ampuh-tingkatkan-daya-tahan-tubuh-ini-kandungan-nutrisinya-gB2lOPnasR.jpg'),
(25, 'Jus Sirsak', 9, 10000, 'jus_sirsak.jpg'),
(26, 'Jus Jeruk', 9, 12000, '062801_orangejuice_cvr.jpg'),
(27, 'Nasi Goreng', 3, 15000, 'cara-membuat-nasi-goreng-spesial-dan-rumahan-yang-enak-sederhana-serta-mudah-rev-1.jpg'),
(28, 'Ayam Penyet + Nasi', 9, 20000, '1920px-Ayam_penyet.jpg'),
(29, 'Ayam Geprek + Nasi', 9, 21000, 'ayam-geprek-chicken-di-dapur-ayam-juara-99.jpg'),
(30, 'Ayam Bakar + Nasi', 3, 22000, 'shutterstock_583077343-780x440.jpg'),
(31, 'Pecel Lele', 3, 19000, 'SAVE_20200611_110242.jpg'),
(32, 'Lele Kremes', 3, 17000, 'AnyConv_com__images_(14).jpg'),
(33, 'Ayam Lada Hitam', 3, 20000, 'AnyConv_com__images_(15).jpg'),
(34, 'Cumi Asam Manis', 3, 22000, 'AnyConv_com__images_(16).jpg'),
(35, 'Ikan Bakar Mujair', 3, 28000, 'AnyConv_com__images_(17).jpg'),
(36, 'Milk Shake', 7, 10000, 'AnyConv_com__images_(18).jpg'),
(37, 'Bakso', 4, 15000, 'ezgif_com-webp-to-jpg.jpg'),
(38, 'Mie Ayam', 4, 13000, 'AnyConv_com__images_(20).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `no_meja` int(3) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`, `jumlah_kursi`, `status`) VALUES
(1, 1, 4, '0'),
(3, 2, 5, '0'),
(4, 3, 2, '0'),
(5, 4, 4, '0'),
(6, 5, 4, '0'),
(7, 6, 4, '0'),
(8, 7, 4, '0'),
(9, 8, 4, '0'),
(10, 9, 4, '0'),
(11, 10, 4, '0'),
(12, 11, 8, '0'),
(13, 12, 8, '0'),
(14, 13, 8, '0'),
(15, 14, 8, '0'),
(16, 15, 8, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ordermeja`
--

CREATE TABLE `ordermeja` (
  `id` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordermeja`
--

INSERT INTO `ordermeja` (`id`, `no_meja`, `tanggal`, `keterangan`) VALUES
(3, 16, '2020-06-11', 'DP sudah dibayar, tolong proses dari sekarang.');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `alamat`) VALUES
('Barata Cafe', 'Desa Cibitung RT 002 RW 001, Kecamatan Buahdua, Kabupaten Sumedang');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$NYgbnscO0dm7Lfxkk.t3wendlzK21JKAEkb5mm7gQV7SW2hSBAT.y');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `masakan` varchar(100) NOT NULL,
  `total` varchar(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `masakan`, `total`, `no_meja`, `tanggal`, `harga`) VALUES
(7, 'Thai Tea,Sosis Bakar,Ayam Geprek   Nasi', '8,8,8', 15, '2020-06-11', '9000,10000,21000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_masakan`
--
ALTER TABLE `kategori_masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_meja` (`no_meja`);

--
-- Indexes for table `ordermeja`
--
ALTER TABLE `ordermeja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_masakan`
--
ALTER TABLE `kategori_masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ordermeja`
--
ALTER TABLE `ordermeja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
