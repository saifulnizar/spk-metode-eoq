-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 01:09 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `db_morodadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(15) NOT NULL,
  `id_supp` int(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `harga_jual` varchar(25) NOT NULL,
  `stok_awal` varchar(30) NOT NULL,
  `stok_akhir` varchar(25) NOT NULL,
  `stok_min` varchar(25) NOT NULL,
  `biaya_pesan` varchar(30) NOT NULL,
  `biaya_simpan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_supp`, `nama_barang`, `harga_beli`, `harga_jual`, `stok_awal`, `stok_akhir`, `stok_min`, `biaya_pesan`, `biaya_simpan`) VALUES
(5, 1, 'semen', '6000', '7000', '45', '45', '10', '270000', '360'),
(7, 2, 'gamping', '6000', '7000', '34', '35', '10', '204000', '360'),
(8, 4, 'paralon', '6000', '7000', '34', '34', '10', '204000', '360');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_supp` int(15) NOT NULL,
  `item_pembelian` varchar(50) NOT NULL,
  `jumlah_pembelian` varchar(20) NOT NULL,
  `harga_pembelian` varchar(20) NOT NULL,
  `total_pembelian` varchar(50) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `id_supp`, `item_pembelian`, `jumlah_pembelian`, `harga_pembelian`, `total_pembelian`, `tanggal_pembelian`, `action`) VALUES
(18, 1, 2, '7', '37', '6000', '198000', '2019-10-22 15:41:13', 2),
(19, 1, 2, '7', '35', '6000', '168000', '2019-10-22 15:45:09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah_penjualan` varchar(50) NOT NULL,
  `harga_item` varchar(25) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tanggal_penjualan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_barang`, `jumlah_penjualan`, `harga_item`, `total`, `tanggal_penjualan`) VALUES
(30, 1, 7, '30', '7000', '210000', '2019-10-22 15:36:46'),
(31, 1, 7, '30', '7000', '210000', '2019-10-22 15:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id_barang` int(10) NOT NULL,
  `eoq` double NOT NULL,
  `stok_beli` int(10) NOT NULL,
  `keterangan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`id_barang`, `eoq`, `stok_beli`, `keterangan`) VALUES
(5, 18, -27, 2),
(7, 17, -18, 2),
(8, 18, -16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(15) NOT NULL,
  `nama_supp` varchar(30) NOT NULL,
  `alamat_supp` varchar(50) NOT NULL,
  `tlp_supp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supp`, `alamat_supp`, `tlp_supp`) VALUES
(1, 'Afif ', 'Jetis', '09766543'),
(2, 'mohammad', 'Temanggung', '08996'),
(3, 'ipol', 'kaponan', '08xxxx'),
(4, 'kuslan', 'salatiga', '0813xxx');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `userlogin` varchar(20) NOT NULL,
  `psslogin` varchar(10) NOT NULL,
  `level` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `userlogin`, `psslogin`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'kasir', 'kasir', 2),
(3, 'gudang', 'gudang', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supp` (`id_supp`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_supp` (`id_supp`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
