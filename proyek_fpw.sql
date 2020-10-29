-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 01:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_fpw`
--
CREATE DATABASE IF NOT EXISTS `proyek_fpw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyek_fpw`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL COMMENT 'id= 2 huruf awal+ no digit',
  `nama_barang` varchar(255) NOT NULL,
  `id_jenis` varchar(255) NOT NULL COMMENT 'forgein id jenis barang',
  `stock_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_jenis`, `stock_barang`, `harga_barang`) VALUES
('BE001', 'Beras', 'SE001', 10, 30000),
('IK001', 'Ikan', 'DA001', 10, 30000),
('KA001', 'Kangkung', 'SA001', 20, 10000),
('SA001', 'Sapi', 'DA001', 10, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `dtrans_in`
--

DROP TABLE IF EXISTS `dtrans_in`;
CREATE TABLE `dtrans_in` (
  `id_htrans_in` varchar(255) NOT NULL COMMENT 'foreign htrans_in',
  `id_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans_in`
--

INSERT INTO `dtrans_in` (`id_htrans_in`, `id_barang`, `jumlah_barang`) VALUES
('2020-05-01-001', 'IK001', 2),
('2020-05-01-002', 'KA001', 6),
('2020-05-01-002', 'SA001', 3),
('2020-05-01-001', 'BE001', 2),
('2020-05-01-002', 'BE001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtrans_out`
--

DROP TABLE IF EXISTS `dtrans_out`;
CREATE TABLE `dtrans_out` (
  `id_htrans_out` varchar(255) NOT NULL COMMENT 'forgein htrans_out',
  `id_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans_out`
--

INSERT INTO `dtrans_out` (`id_htrans_out`, `id_barang`, `jumlah_barang`, `total_harga`) VALUES
('2020-05-01-001', 'SA001', 3, 60000),
('2020-05-01-001', 'KA001', 6, 60000),
('2020-05-01-002', 'KA001', 15, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `htrans_in`
--

DROP TABLE IF EXISTS `htrans_in`;
CREATE TABLE `htrans_in` (
  `id_htrans_in` varchar(255) NOT NULL COMMENT 'tahun+bulan+tanggal+3no urut (2020-04-02-001)',
  `id_supplier` varchar(255) NOT NULL COMMENT 'foreign key',
  `tanggal_htrans_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans_in`
--

INSERT INTO `htrans_in` (`id_htrans_in`, `id_supplier`, `tanggal_htrans_in`) VALUES
('2020-05-01-001', 'IN001', '2020-05-01 11:58:06'),
('2020-05-01-002', 'KO001', '2020-05-01 11:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `htrans_out`
--

DROP TABLE IF EXISTS `htrans_out`;
CREATE TABLE `htrans_out` (
  `ID_htrans_out` varchar(255) NOT NULL COMMENT 'id sama seperti htrans in',
  `username_pegawai` varchar(255) NOT NULL,
  `username_pelanggan` varchar(255) NOT NULL,
  `tanggal_htrans_out` datetime NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans_out`
--

INSERT INTO `htrans_out` (`ID_htrans_out`, `username_pegawai`, `username_pelanggan`, `tanggal_htrans_out`, `jumlah`) VALUES
('2020-05-01-001', 'donny', 'leonardi', '2020-05-01 12:28:07', 150000),
('2020-05-01-001', 'donny', 'maximilanus', '2020-05-01 12:28:07', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

DROP TABLE IF EXISTS `jenis_barang`;
CREATE TABLE `jenis_barang` (
  `id_jenis` varchar(255) NOT NULL COMMENT 'id=2huruf petama nama+ 3 digit no urut',
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
('BU001', 'Buah'),
('DA001', 'Daging'),
('SA001', 'Sayur'),
('SE001', 'Sembako');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id_supplier` varchar(255) NOT NULL COMMENT '2 huruf pertama nana+3 digit no urut',
  `nama_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`) VALUES
('IN001', 'Indofood'),
('KO001', 'Kominfood');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `jenis_user` int(11) NOT NULL COMMENT '0 =pelanggan. 1 =pegawai',
  `status_delete_user` int(11) NOT NULL COMMENT '0=aktif 1=soft delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username_user`, `password_user`, `jenis_user`, `status_delete_user`) VALUES
('donny', 'password', 1, 1),
('john', 'dave', 0, 1),
('leonardi', 'leonardi', 0, 0),
('maximilianus', 'zero', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `htrans_in`
--
ALTER TABLE `htrans_in`
  ADD PRIMARY KEY (`id_htrans_in`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
