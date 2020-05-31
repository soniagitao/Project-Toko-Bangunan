-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 12:05 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobangunanbaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_nota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_nota`, `id_user`, `id_sup`, `tanggal`) VALUES
(10, 1, 3, '2020-05-03'),
(13, 1, 2, '2020-05-07'),
(14, 1, 4, '2020-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penjualan`
--

INSERT INTO `data_penjualan` (`id_penjualan`, `id_user`, `tanggal_penjualan`) VALUES
(59, 1, '2020-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `data_stok`
--

CREATE TABLE `data_stok` (
  `id_stok` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_stok`
--

INSERT INTO `data_stok` (`id_stok`, `jenis_barang`, `stok`) VALUES
(1, 'Kayu', 50);

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id_sup` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sup` varchar(225) NOT NULL,
  `no_telp` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`id_sup`, `id_user`, `nama_sup`, `no_telp`, `alamat`) VALUES
(2, 1, 'Sonia', '081245678190', 'Malang'),
(3, 1, 'Fildzah', '081249854487', 'Gresik'),
(4, 1, 'Nian', '081237283372', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang_masuk`
--

CREATE TABLE `detail_barang_masuk` (
  `id_barang` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `jenis_barang` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang_masuk`
--

INSERT INTO `detail_barang_masuk` (`id_barang`, `id_nota`, `jenis_barang`, `jumlah`) VALUES
(8, 10, 'Semen Gresik', 6),
(13, 13, 'Besi', 20),
(14, 14, 'Paku Payung', 383),
(15, 14, 'Kayu Jati', 42),
(16, 14, 'Triplex', 60);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_jual` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_jual`, `id_penjualan`, `id_barang`, `jumlah_jual`) VALUES
(62, 59, 8, 3),
(63, 59, 14, 50),
(64, 59, 15, 3);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE detail_barang_masuk SET jumlah= jumlah-NEW.jumlah_jual
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `level` enum('penjual','owner','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'penjual', 'penjual', 'penjual'),
(2, 'owner', 'owner', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sup` (`id_sup`);

--
-- Indexes for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id_sup`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_nota` (`id_nota`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_jual`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_supplier`
--
ALTER TABLE `data_supplier`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_sup`) REFERENCES `data_supplier` (`id_sup`);

--
-- Constraints for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD CONSTRAINT `data_penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`);

--
-- Constraints for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD CONSTRAINT `data_supplier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `login` (`id_user`);

--
-- Constraints for table `detail_barang_masuk`
--
ALTER TABLE `detail_barang_masuk`
  ADD CONSTRAINT `detail_barang_masuk_ibfk_1` FOREIGN KEY (`id_nota`) REFERENCES `barang_masuk` (`id_nota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `data_penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `detail_barang_masuk` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
