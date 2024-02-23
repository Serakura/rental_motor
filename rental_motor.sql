-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 03:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `nomor_ktp` varchar(16) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`nomor_ktp`, `nama_customer`, `username`, `password`, `no_telp`, `jenkel`, `alamat`) VALUES
('1234567891234567', 'Fido', 'fido', 'fido', '0811121312', 'Laki-laki', 'asda'),
('24042010231123', 'firdaus', 'fido24', '641497844d85cd76388bca1f14125055', '812839812938', 'Laki-laki', 'Gamping Kidul RT 03/ RW 19'),
('3234567897654321', 'Bambang', 'bambang', 'asd', '12131212121', 'Laki-laki', 'asasad');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `kode_peminjaman` char(10) NOT NULL,
  `kode_pengembalian` char(10) NOT NULL,
  `nomor_ktp` char(16) NOT NULL,
  `plat_nomor` char(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `total_biaya` varchar(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_motor`
--

CREATE TABLE `jenis_motor` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_motor`
--

INSERT INTO `jenis_motor` (`id_jenis`, `jenis`) VALUES
(1, 'Matic'),
(2, 'Sport'),
(3, 'Bebek'),
(4, 'Listrik'),
(5, 'Adventure'),
(6, 'Trail'),
(7, 'Naked Sport');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama`) VALUES
(1, 'Yamaha'),
(2, 'Honda'),
(3, 'Suzuki'),
(4, 'Kawasaki'),
(5, 'Piagio'),
(6, 'Vespa');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `plat_nomor` char(12) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `tahun_pembuatan` varchar(20) NOT NULL,
  `tarif` double DEFAULT NULL,
  `status_motor` int(11) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_merek` int(11) DEFAULT NULL,
  `nama_kendaraan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`plat_nomor`, `warna`, `tahun_pembuatan`, `tarif`, `status_motor`, `foto`, `id_jenis`, `id_merek`, `nama_kendaraan`) VALUES
('AB 2012 DC', 'Hitam ', '2019', 30000, 1, '6283cb2cb859f.png', 1, 2, 'Vario 150'),
('B 1123 DL', 'Merah  ', '2019', 25000, 1, '6283cab9b15cc.jpg', 7, 1, 'Byson FI'),
('G 1189 XS', 'Hitam Merah', '2016', 550000, 1, '6283c38b167dc.jpg', 2, 4, 'Ninja 250 FI SE');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` char(10) NOT NULL,
  `nomor_ktp` char(16) NOT NULL,
  `plat_nomor` char(12) NOT NULL,
  `tanggal` date NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `total_bayar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `insert_history` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
INSERT INTO history(kode_peminjaman,nomor_ktp,plat_nomor,tanggal_pinjam,total_biaya)
VALUES (OLD.kode_peminjaman,OLD.nomor_ktp,OLD.plat_nomor,OLD.tanggal,OLD.total_bayar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_booking` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN 
	UPDATE motor SET status_motor = status_motor-1 WHERE plat_nomor = NEW.plat_nomor;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_pengembalian` char(10) NOT NULL,
  `kode_peminjaman` char(10) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `trigger_pengembalian` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN
	UPDATE motor
	INNER JOIN peminjaman ON motor.plat_nomor = peminjaman.plat_nomor
	INNER JOIN pengembalian ON peminjaman.kode_peminjaman = pengembalian.kode_peminjaman
	SET status_motor = status_motor+1
	WHERE motor.plat_nomor= peminjaman.plat_nomor;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_history` AFTER INSERT ON `pengembalian` FOR EACH ROW BEGIN 
UPDATE history SET tanggal_kembali = NEW.tanggal_pengembalian, kode_pengembalian=NEW.kode_pengembalian WHERE kode_peminjaman = NEW.kode_peminjaman;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`nomor_ktp`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`plat_nomor`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_peminjaman`),
  ADD KEY `nomor_ktp` (`nomor_ktp`),
  ADD KEY `plat_nomor` (`plat_nomor`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_pengembalian`),
  ADD KEY `kode_peminjaman` (`kode_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jenis_motor`
--
ALTER TABLE `jenis_motor`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `motor`
--
ALTER TABLE `motor`
  ADD CONSTRAINT `motor_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motor_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_motor` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nomor_ktp`) REFERENCES `customer` (`nomor_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`plat_nomor`) REFERENCES `motor` (`plat_nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
