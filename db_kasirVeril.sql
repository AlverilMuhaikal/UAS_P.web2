-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 06:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainitpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_toko`, `nama_kategori`) VALUES
(1, 1, 'Snack'),
(2, 1, 'Dapur'),
(3, 1, 'ATK');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_toko`, `nama_pelanggan`, `email_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 1, 'Hidayah', 'Hidayah@gmail.com', '0824354658', 'Jeddah'),
(2, 1, 'Hidayat', 'Hidayat@gmail.com', '0834256758', 'jambi');
(3, 1, 'Putra', 'Putra@gmail.com' , '0849573427' , 'jambi');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `bayar_penjualan` int(11) NOT NULL,
  `kembalian_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_toko`, `id_user`, `tanggal_penjualan`, `total_penjualan`, `bayar_penjualan`, `kembalian_penjualan`) VALUES
(1, 0, 1, 1, '2024-01-03 16:03:07', 8000, 30000, 22000),
(2, 1, 1, 1, '2024-01-03 17:32:05', 13000, 50000, 37000),
(4, 2, 1, 1, '2024-01-04 06:24:19', 30000, 50000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_produk`
--

CREATE TABLE `penjualan_produk` (
  `id_penjualan_produk` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `nama_jual` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `subtotal_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`id_penjualan_produk`, `id_penjualan`, `id_produk`, `id_toko`, `harga_beli`, `nama_jual`, `harga_jual`, `jumlah_jual`, `subtotal_jual`) VALUES
(1, 1, 1, 1, 2000, 'Taro Pedas', 3000, 1, 3000),
(2, 1, 2, 1, 4000, 'Richese Nabati', 5000, 1, 5000),
(3, 2, 2, 1, 4000, 'Richese Nabati', 5000, 2, 10000),
(4, 2, 1, 1, 2000, 'Taro Pedas', 3000, 1, 3000),
(9, 4, 1, 1, 2000, 'Taro Pedas', 3000, 2, 6000),
(10, 4, 2, 1, 4000, 'Richese Nabati', 5000, 2, 10000),
(11, 4, 4, 1, 5000, 'Pensil 2b Asli', 7000, 2, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `kode_produk` varchar(25) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `beli_produk` int(11) NOT NULL,
  `jual_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `keterangan_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_supplier`, `id_kategori`, `id_toko`, `kode_produk`, `nama_produk`, `beli_produk`, `jual_produk`, `stok_produk`, `foto_produk`, `keterangan_produk`) VALUES
(1, 1, 1, 1, '100', 'Taro Pedas', 2000, 3000, 8, 'taro.jpeg', ''),
(2, 1, 1, 1, '100', 'Richese Nabati', 4000, 5000, 9, 'nabati.jpeg', ''),
(4, 3, 3, 1, 'GG11', 'Pensil 2b Asli', 5000, 7000, 8, 'th (1).jpeg', 'pensil untuk ujian lolos komputer'),
(5, 1, 1, 1, 'GG12', 'Bengbeng 200gr', 1500, 200, 15, 'bengbeng.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_supplier` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_toko`, `nama_supplier`) VALUES
(1, 1, 'SRC'),
(2, 1, 'LOTTE'),
(3, 1, 'MIROTA'),
(4, 1, 'NESTLE');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`) VALUES
(1, 'TOKO RIZKY', 'RT 11 Marene Kota Jambi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level_user` enum('kasir','gudang','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_toko`, `email_user`, `password_user`, `nama_user`, `level_user`) VALUES
(1, 1, 'veril@gmail.com', 'a4f9cbc9e5948ed01249aad995221de0a7256ae9', 'Alveril Muhaikal', 'kasir'),
(2, 1, 'alverilmuhaikal@gmail.com', 'ed99088ce9d6aa2d74040139769f7cf3fac7d113', 'Alveril Muhaikal', 'gudang'),
(3, 1, 'Alveril@gmail.com', '6394210ce21ac27fb5de7645824dff9be9ba0690', 'Alveril Muhaikal', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`id_penjualan_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  MODIFY `id_penjualan_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
