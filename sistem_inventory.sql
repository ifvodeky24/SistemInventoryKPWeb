-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 03:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang_master` int(11) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `id_barang_master`, `jumlah_barang`, `tanggal_keluar`, `tanggal_update`) VALUES
(2, 1, 10, '2019-09-21 13:49:07', '2019-09-21 13:49:07'),
(3, 1, 20, '2019-10-09 17:00:00', '2019-10-30 09:09:22'),
(4, 2, 1, '2019-10-24 17:00:00', '2019-10-30 10:26:58');

--
-- Triggers `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran_barang` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
	UPDATE tb_barang_master SET stok_barang=stok_barang-NEW.jumlah_barang WHERE id_barang_master = NEW.id_barang_master;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_master`
--

CREATE TABLE `tb_barang_master` (
  `id_barang_master` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenis_barang` enum('Semen','Pasir','Split Setengah','Split Medium','PC Wire','Spiral Wire','Kawat Ikat','Besi D16','Pipa Setengah','Baut Adre','Mur') NOT NULL,
  `satuan_barang` enum('Ton','Kg') NOT NULL,
  `stok_barang` int(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_master`
--

INSERT INTO `tb_barang_master` (`id_barang_master`, `kode_barang`, `nama_barang`, `jenis_barang`, `satuan_barang`, `stok_barang`, `tanggal_update`) VALUES
(1, 'E001', 'Semen Padang', 'Semen', 'Ton', -10, '2019-10-30 09:09:22'),
(2, 'E002', 'Semen Tiga Roda', 'Semen', 'Kg', 29, '2019-10-30 10:26:58'),
(3, 'E003', 'Pasir Biru', 'Pasir', 'Kg', 23, '2019-09-21 14:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang_master` int(11) NOT NULL,
  `harga_barang` int(50) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_barang_masuk`, `id_barang_master`, `harga_barang`, `jumlah_barang`, `tanggal_masuk`, `tanggal_update`) VALUES
(5, 1, 46655, 10, '2019-09-21 13:44:10', '2019-09-21 13:44:10'),
(6, 2, 12000, 10, '2019-09-21 13:47:38', '2019-09-21 13:47:38'),
(7, 3, 1112222, 12, '2019-01-10 17:00:00', '2019-09-21 14:51:29');

--
-- Triggers `tb_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `pemasukan_barang` AFTER INSERT ON `tb_barang_masuk` FOR EACH ROW BEGIN
	UPDATE tb_barang_master SET stok_barang=stok_barang+NEW.jumlah_barang WHERE id_barang_master = NEW.id_barang_master;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(50) NOT NULL,
  `accesToken` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `level` enum('Admin','Manager','Logistik') NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `authKey`, `accesToken`, `nama_lengkap`, `email`, `alamat`, `jabatan`, `level`, `foto_profil`, `jenis_kelamin`) VALUES
(1, 'nana', 'nana', 'opa-1234567', 'us3r', 'Nova Juliana', 'juliana@gnail.com', 'jl.buluhcina', 'karyawan', 'Manager', 'nova.jpg', 'Wanita'),
(3, 'admin', 'admin', 'ksdks', 'skdjksdj', 'Admin', 'admin@gmail.com', 'Jalan Admin', 'Admin', 'Admin', 'hei.jpg', 'Wanita'),
(4, 'ridho', '123456', 'dfdgere43', 'sdsdwe42', 'Ridho Nova Afni', 'ridho.nova@gmail.com', 'jalan naga sakti', 'Supervisor', 'Logistik', 'nova.jpg', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_barang_master` (`id_barang_master`);

--
-- Indexes for table `tb_barang_master`
--
ALTER TABLE `tb_barang_master`
  ADD PRIMARY KEY (`id_barang_master`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang_master` (`id_barang_master`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_barang_master`
--
ALTER TABLE `tb_barang_master`
  MODIFY `id_barang_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD CONSTRAINT `tb_barang_keluar_ibfk_1` FOREIGN KEY (`id_barang_master`) REFERENCES `tb_barang_master` (`id_barang_master`);

--
-- Constraints for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD CONSTRAINT `tb_barang_masuk_ibfk_1` FOREIGN KEY (`id_barang_master`) REFERENCES `tb_barang_master` (`id_barang_master`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
