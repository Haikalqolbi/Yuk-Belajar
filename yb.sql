-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 08, 2022 at 04:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`) VALUES
(4, 'qolby_2727@yahoo.com', '$2y$10$G7A2gugM7jDr5WyADaO4KOYkQgJOtjt51Kwy.xSbLz/B3onFBmnZ2');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `id_cust` int(100) NOT NULL,
  `emailuser` varchar(255) NOT NULL,
  `passworduser` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`id_cust`, `emailuser`, `passworduser`, `nama`, `alamat`, `no_hp`) VALUES
(7, 'zaki@gmail.com', '$2y$10$pMAwoLojs0pR9Z8OQwuwl.YrgudMNZqldO4yW/e8V1UrBITQE4DBy', 'haikal', 'asa', '08');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_checkout`
--

CREATE TABLE `tabel_checkout` (
  `id_pesanan` int(100) NOT NULL,
  `emailuser` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_checkout`
--

INSERT INTO `tabel_checkout` (`id_pesanan`, `emailuser`, `nama`, `alamat`, `no_hp`, `gambar`, `status`, `total`, `cust_id`) VALUES
(53, 'zaki@gmail.com', 'haikal', 'asa', '08', 'Not Define', 'Belum Dibayar', 50000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `id_product` int(100) NOT NULL,
  `judul_product` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `admin_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_produk`
--

INSERT INTO `tabel_produk` (`id_product`, `judul_product`, `harga`, `deskripsi`, `gambar`, `admin_id`) VALUES
(10, 'Coursera', 50000, 'program online ', 'Coursera.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `judul_product` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`,`email`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id_cust`,`emailuser`);

--
-- Indexes for table `tabel_checkout`
--
ALTER TABLE `tabel_checkout`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_id_cust` (`cust_id`);

--
-- Indexes for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_product` (`product_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `id_cust` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tabel_checkout`
--
ALTER TABLE `tabel_checkout`
  MODIFY `id_pesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  MODIFY `id_product` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_checkout`
--
ALTER TABLE `tabel_checkout`
  ADD CONSTRAINT `fk_id_cust` FOREIGN KEY (`cust_id`) REFERENCES `cust` (`id_cust`);

--
-- Constraints for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD CONSTRAINT `tabel_produk_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD CONSTRAINT `fk_id_product` FOREIGN KEY (`product_id`) REFERENCES `tabel_produk` (`id_product`),
  ADD CONSTRAINT `tabel_transaksi_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `cust` (`id_cust`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
