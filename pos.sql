-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2020 at 02:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email_admin` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`, `level`, `foto`, `create_at`, `update_at`) VALUES
(15, 'Uchiha Sasuke', 'sasukeUchiha@mail.com', '1234', 'superadmin', 'Admin-1576916683.jpg', '2019-12-21', '2019-12-31 12:44:40'),
(18, 'Naruto Uzumaki', 'nartuo@gmail.com', '123', 'admin', 'Admin-1576925436.png', '2019-12-21', '2019-12-27 12:52:17'),
(30, 'Nanang Setiawan', 'nanangyorozuya@gmail.com', '12345678', 'superadmin', 'Admin-1577794862.jpg', '2019-12-31', '2019-12-31 12:21:01');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `admin_tambah` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Admin Baru ',CONCAT('Nama Admin = ',new.nama_admin,' Akses Level = ',new.level),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_admin` BEFORE DELETE ON `admin` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Hapus Admin ',CONCAT('Nama Admin = ',old.nama_admin,' Akses Level = ',old.level),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_admin` AFTER UPDATE ON `admin` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,data_lama,tanggal) VALUES('Perubahan Admin ',CONCAT('Nama Admin = ',new.nama_admin,' Email Admin = ',new.email_admin,' Level = ',new.level),CONCAT('Nama Admin = ',old.nama_admin,' Email Admin = ',old.email_admin,' Level = ',old.level),now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `id_kategori`, `harga_barang`, `create_at`, `update_at`) VALUES
(1, 'Fruit Tea', 45, 1, 4500, '2019-12-21 00:00:00', '2019-12-31 11:57:04'),
(2, 'Aqua', 19, 1, 45000, '2019-12-21 00:00:00', '2019-12-31 11:52:41'),
(3, 'Kinderjoy', 15, 3, 200000, '2019-12-21 00:00:00', '2019-12-26 10:00:18'),
(4, 'Kapal Api', 15, 2, 40000, '2019-12-21 00:00:00', '2019-12-31 11:57:04'),
(5, 'Kitkat', 10, 1, 5000, '2019-12-21 00:00:00', '2019-12-31 12:01:51'),
(18, 'Kopi ABC', 39, 1, 1000, '2019-12-22 03:38:01', '2019-12-31 11:52:41'),
(22, 'Hujan', 15, 1, 2000, '2019-12-22 06:14:08', '2019-12-26 09:16:46'),
(26, 'Pecel Lele', 20, 2, 10000, '2019-12-26 10:34:14', '2019-12-26 09:34:14'),
(27, 'Kopi Pahit', 10, 1, 2000, '2019-12-26 10:37:41', '2019-12-26 09:56:29'),
(30, 'Modal', 49, 2, 1500, '2019-12-27 04:57:00', '2019-12-27 06:40:04'),
(31, 'Gethuk Lindri', 50, 2, 2000, '2019-12-27 04:58:27', '2019-12-27 03:58:27'),
(36, 'Motonari', 25, 1, 4000, '2019-12-27 10:05:05', '2019-12-29 15:06:41'),
(101, 'Lemon Teh', 5, 1, 3500, '2019-12-31 01:17:17', '2019-12-31 12:18:44');

--
-- Triggers `barang`
--
DELIMITER $$
CREATE TRIGGER `barang_tambah` AFTER INSERT ON `barang` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Barang Baru',CONCAT(' Nama Barang = ',new.nama_barang,' Harga = ',new.harga_barang,' Stok = ',new.stok),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `barang_update` BEFORE UPDATE ON `barang` FOR EACH ROW BEGIN
    INSERT INTO log (keterangan,data_baru,data_lama,tanggal) 
    VALUES (CONCAT('Perubahan Pada Barang '),CONCAT('Nama Baru = ',new.nama_barang,' Stok Baru = ',new.stok,' Harga Baru = ',new.harga_barang),CONCAT(' Nama Lama = ',old.nama_barang,' Stok Lama = ',old.stok,' Harga Lama = ',old.harga_barang),now()); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_barang` BEFORE DELETE ON `barang` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_lama,tanggal) VALUES('Hapus Barang ',CONCAT('Nama Barang = ',old.nama_barang,' Harga Barang = ',old.harga_barang,' Stok = ',old.stok),now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`) VALUES
(1, 'Minuman', 'MIN'),
(2, 'Makanan', 'MAK'),
(3, 'Elektronik', 'ELE');

--
-- Triggers `kategori`
--
DELIMITER $$
CREATE TRIGGER `edit_kategori` AFTER UPDATE ON `kategori` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,data_lama,tanggal) VALUES('Perubahan Kategori ',CONCAT('.Nama Kategori = ',new.nama_kategori,', Kode Kategori = ',new.kode_kategori),CONCAT('.Nama Kategori = ',old.nama_kategori,' .Kode Kategori = ',old.kode_kategori),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_kategori` BEFORE DELETE ON `kategori` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Hapus Kategori ',CONCAT('.Nama Kategori = ',old.nama_kategori,' .Kode Kategori = ',old.kode_kategori),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_kategori` AFTER INSERT ON `kategori` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Kategori Baru ',CONCAT('.Nama Kategori = ',new.nama_kategori,' .Kode Kategori = ',new.kode_kategori),now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `data_lama` text DEFAULT NULL,
  `data_baru` text DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `keterangan`, `data_lama`, `data_baru`, `tanggal`) VALUES
(28, 'Hapus Kategori ', NULL, ',Nama Kategori = FKXIO ,Kode Kategori = FKX', '2019-12-29 15:46:32'),
(29, 'Perubahan Pada Barang ', ' Nama Lama = Aqua Stok Lama = 20 Harga Lama = 45000', 'Nama Baru = Aqua Stok Baru = 19 Harga Baru = 45000', '2019-12-31 11:52:41'),
(30, 'Perubahan Pada Barang ', ' Nama Lama = Kopi ABC Stok Lama = 40 Harga Lama = 1000', 'Nama Baru = Kopi ABC Stok Baru = 39 Harga Baru = 1000', '2019-12-31 11:52:41'),
(31, 'Perubahan Pada Barang ', ' Nama Lama = Fruit Tea Stok Lama = 50 Harga Lama = 4500', 'Nama Baru = Fruit Tea Stok Baru = 45 Harga Baru = 4500', '2019-12-31 11:57:04'),
(32, 'Perubahan Pada Barang ', ' Nama Lama = Kapal Api Stok Lama = 20 Harga Lama = 40000', 'Nama Baru = Kapal Api Stok Baru = 15 Harga Baru = 40000', '2019-12-31 11:57:04'),
(33, 'Perubahan Pada Barang ', ' Nama Lama = Kitkat Stok Lama = 10 Harga Lama = 5000', 'Nama Baru = Kitkat Stok Baru = 5 Harga Baru = 5000', '2019-12-31 11:57:04'),
(34, 'Perubahan Pada Barang ', ' Nama Lama = Kitkat Stok Lama = 5 Harga Lama = 5000', 'Nama Baru = Kitkat Stok Baru = 10 Harga Baru = 5000', '2019-12-31 12:01:51'),
(35, 'Barang Baru', NULL, ' Nama Barang = Lemon Tea Harga = 45000 Stok = 5', '2019-12-31 12:17:17'),
(36, 'Perubahan Pada Barang ', ' Nama Lama = Lemon Tea Stok Lama = 5 Harga Lama = 45000', 'Nama Baru = Lemon Teh Stok Baru = 5 Harga Baru = 3500', '2019-12-31 12:18:44'),
(37, 'Admin Baru ', NULL, 'Nama Admin = Nanang Setiawan Akses Level = superadmin', '2019-12-31 12:21:01'),
(38, 'Perubahan Admin ', 'Nama Admin = Uchiha Sakura Email Admin = sasukeistri@mail.com Level = superadmin', 'Nama Admin = Uchiha Sakura Email Admin = sasukeistri@mail.com Level = admin', '2019-12-31 12:21:14'),
(39, 'Hapus Kategori ', NULL, '.Nama Kategori = ada .Kode Kategori = ADA', '2019-12-31 12:21:36'),
(40, 'Hapus Kategori ', NULL, '.Nama Kategori = Alkohol .Kode Kategori = ALK', '2019-12-31 12:21:38'),
(41, 'Hapus Kategori ', NULL, '.Nama Kategori = Fashion .Kode Kategori = FAS', '2019-12-31 12:21:41'),
(42, 'Kategori Baru ', NULL, '.Nama Kategori = Fashion .Kode Kategori = FAS', '2019-12-31 12:21:51'),
(43, 'Supplier Baru ', NULL, 'Nama Supplier = Pt Tiga Dewa Email = tigadewa@mail.com Hp = 62890393 Alamat = adadeadsa', '2019-12-31 12:22:20'),
(44, 'Admin Baru ', NULL, 'Nama Admin = Afifah Nur aini Akses Level = admin', '2019-12-31 12:27:35'),
(45, 'Hapus Admin ', NULL, 'Nama Admin = Afifah Nur aini Akses Level = admin', '2019-12-31 12:27:40'),
(46, 'Hapus Admin ', NULL, 'Nama Admin = Uchiha Sakura Akses Level = admin', '2019-12-31 12:35:51'),
(47, 'Perubahan Admin ', 'Nama Admin = Sasuke Uchiha Email Admin = sasukeUchiha@mail.com Level = superadmin', 'Nama Admin = Uchiha Sasuke Email Admin = sasukeUchiha@mail.com Level = superadmin', '2019-12-31 12:44:40'),
(48, 'Hapus Kategori ', NULL, '.Nama Kategori = Fashion .Kode Kategori = FAS', '2019-12-31 12:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id_masterBarang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_up` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_barang`
--

INSERT INTO `master_barang` (`id_masterBarang`, `id_barang`, `id_supplier`, `jumlah`, `tgl_up`, `status`, `keterangan`) VALUES
(6, 22, 1, -5, '2019-12-22', 'Keluar', 'Kadaluarsa'),
(11, 2, 1, 3, '2019-12-23', 'Masuk', 'Bonus'),
(12, 1, 1, 5, '2019-12-23', 'Masuk', 'Mantap'),
(13, 22, 1, 5, '2019-12-23', 'Masuk', 'a'),
(14, 22, 1, 5, '2019-12-23', 'Masuk', 'Datang Lagi'),
(15, 22, 1, 5, '2019-12-23', 'Masuk', 'mmm'),
(16, 1, 1, 2, '2019-12-23', 'Masuk', 'Baru'),
(17, 1, 1, 5, '2019-12-23', 'Masuk', 'Masuk'),
(18, 28, 2, 99, '2019-12-26', 'Masuk', NULL),
(19, 29, 1, 20, '2019-12-26', 'Masuk', 'Stok Masuk Awal'),
(20, 27, 2, 5, '2019-12-26', 'Masuk', 'Masuk Lagi'),
(21, 3, 0, -3, '2019-12-26', 'Keluar', 'Kadaluarsa'),
(22, 30, 1, 50, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(23, 31, 0, 50, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(24, 32, 2, 323, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(25, 33, 4, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(26, 34, 4, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(27, 35, 2, 1, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(28, 36, 2, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(29, 37, 1, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(30, 38, 1, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(31, 39, 2, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(32, 40, 1, 21, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(33, 41, 4, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(34, 42, 4, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(35, 43, 2, 3, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(36, 44, 2, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(37, 45, 2, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(38, 46, 4, 2323, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(39, 47, 4, 32, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(40, 48, 4, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(41, 49, 4, 22, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(42, 50, 2, 2, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(43, 51, 4, 22, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(44, 52, 2, 23, '2019-12-27', 'Masuk', 'Stok Masuk Awal'),
(45, 2, 4, 5, '2019-12-28', 'Masuk', 'Masuk'),
(46, 1, 2, 3, '2019-12-28', 'Masuk', 'as'),
(47, 1, 2, 3, '2019-12-28', 'Masuk', 'as'),
(48, 1, 2, 3, '2019-12-28', 'Masuk', 'as'),
(49, 1, 2, 3, '2019-12-28', 'Masuk', 'as'),
(50, 1, 4, -2, '2019-12-28', 'Keluar', 'as'),
(51, 1, 2, 1, '2019-12-28', 'Masuk', 'a'),
(52, 1, 2, 1, '2019-12-28', 'Masuk', 'a'),
(53, 1, 2, 1, '2019-12-28', 'Masuk', 'a'),
(54, 1, 2, 1, '2019-12-28', 'Masuk', 'a'),
(55, 1, 2, 1, '2019-12-28', 'Masuk', 'a'),
(56, 1, 2, 2, '2019-12-28', 'Masuk', 'a'),
(57, 1, 2, 2, '2019-12-28', 'Masuk', 'a'),
(58, 1, 2, 2, '2019-12-28', 'Masuk', 'a'),
(59, 2, 0, 1, '2019-12-28', 'Masuk', '1'),
(60, 2, 4, 1, '2019-12-28', 'Masuk', '1'),
(61, 2, 4, 1, '2019-12-28', 'Masuk', '1'),
(62, 1, 0, 1, '2019-12-28', 'Masuk', 'asas'),
(63, 1, 0, 1, '2019-12-28', 'Masuk', 'asas'),
(64, 1, 0, 1, '2019-12-28', 'Masuk', 'asas'),
(65, 1, 2, 1, '2019-12-28', 'Masuk', 'asas'),
(66, 1, 2, 4, '2019-12-28', 'Masuk', 'Masuk'),
(67, 1, 2, -4, '2019-12-28', 'Keluar', 'Kadaluarsa'),
(68, 36, 2, 10, '2019-12-29', 'Masuk', 'New'),
(69, 1, 2, 3, '2019-12-29', 'Masuk', 'Masuk Boss'),
(70, 2, 2, 2, '2019-12-29', 'Masuk', 'a'),
(71, 4, 0, 1, '2019-12-29', 'Masuk', 'SS'),
(72, 18, 2, 2, '2019-12-29', 'Masuk', 'qwe'),
(73, 18, 0, 2, '2019-12-29', 'Masuk', 'asda'),
(74, 18, 0, 2, '2019-12-29', 'Masuk', 'a'),
(75, 3, 0, 4, '2019-12-29', 'Masuk', 'aa'),
(76, 1, 0, 5, '2019-12-29', 'Masuk', 'ada'),
(77, 1, 0, 3, '2019-12-29', 'Masuk', 'aaa'),
(78, 101, 2, 5, '2019-12-31', 'Masuk', 'Stok Masuk Awal');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_detail_orders` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_detail_orders`, `id_barang`, `jumlah`, `diskon`, `sub_total`) VALUES
(25, 31, 2, 2, 0, 90000),
(26, 31, 5, 2, 0, 10000),
(27, 31, 3, 3, 0, 600000),
(28, 32, 18, 1, 0, 1000),
(29, 33, 22, 5, 0, 10000),
(30, 33, 4, 1, 0, 40000),
(31, 34, 4, 1, 0, 40000),
(32, 34, 5, 1, 0, 5000),
(33, 35, 5, 5, 0, 25000),
(34, 36, 1, 5, 0, 15000),
(35, 37, 3, 2, 0, 400000),
(36, 38, 2, 1, 0, 45000),
(37, 39, 3, 1, 0, 200000),
(38, 40, 4, 1, 0, 40000),
(39, 41, 2, 1, 0, 45000),
(40, 42, 30, 1, 0, 1500),
(41, 43, 18, 1, 0, 1000),
(42, 44, 2, 1, 0, 45000),
(43, 44, 18, 1, 0, 1000),
(44, 45, 1, 5, 0, 22500),
(45, 45, 4, 5, 0, 200000),
(46, 45, 5, 5, 0, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders_detail` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `invoice` bigint(20) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders_detail`, `id_admin`, `invoice`, `sub_total`, `diskon`, `total`, `create_at`) VALUES
(31, 15, 201912230000, 700000, 0, 700000, '2019-12-23 06:34:19'),
(32, 15, 201912230001, 1000, 0, 1000, '2019-12-23 06:34:23'),
(33, 1, 201912230002, 50000, 0, 50000, '2019-12-23 00:40:32'),
(34, 1, 201912240000, 45000, 0, 45000, '2019-12-24 03:12:47'),
(35, 1, 201912240000, 25000, 0, 25000, '2019-12-24 03:19:50'),
(36, 1, 201912240000, 15000, 0, 15000, '2019-12-24 03:29:20'),
(37, 1, 201912240001, 400000, 0, 400000, '2019-12-24 03:31:20'),
(38, 1, 201912250000, 45000, 0, 45000, '2019-12-25 03:29:47'),
(39, 1, 201912250001, 200000, 0, 200000, '2019-12-25 03:29:59'),
(40, 1, 201912250002, 40000, 0, 40000, '2019-12-25 03:30:09'),
(41, 1, 201912250003, 45000, 0, 45000, '2019-12-25 03:30:30'),
(42, 1, 201912270000, 1500, 0, 1500, '2019-12-27 00:40:04'),
(43, 15, 201912280000, 1000, 0, 1000, '2019-12-28 04:20:08'),
(44, 1, 201912310000, 46000, 0, 46000, '2019-12-31 05:52:41'),
(45, 15, 201912310001, 247500, 0, 247500, '2019-12-31 05:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier`, `email`, `hp`, `alamat`) VALUES
(2, 'Pt Kasino', 'kasino@gmail.com', '6223999978', 'Pecangaan'),
(4, 'Pt Mau Mundor', 'nanangtfc@gmail.com', '626289123456', 'sdsfsd'),
(7, 'Pt Tiga Dewa', 'tigadewa@mail.com', '62890393', 'adadeadsa');

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `edit_supplier` AFTER UPDATE ON `supplier` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,data_lama,tanggal) VALUES ('Supplier Baru ',CONCAT('Nama Supplier = ',new.supplier,' Email = ',new.email,' Hp = ',new.hp,' Alamat = ',new.alamat),CONCAT('Nama Supplier = ',old.supplier,' Email = ',old.email,' Hp = ',old.hp,' Alamat = ',old.alamat),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus_supplier` BEFORE DELETE ON `supplier` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_lama,tanggal) VALUES ('Hapus Supplier ',CONCAT('Nama Supplier = ',old.supplier,' Email = ',old.email,' Hp = ',old.hp,' Alamat = ',old.alamat),now());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_supplier` AFTER INSERT ON `supplier` FOR EACH ROW BEGIN
	INSERT INTO log(keterangan,data_baru,tanggal) VALUES ('Supplier Baru ',CONCAT('Nama Supplier = ',new.supplier,' Email = ',new.email,' Hp = ',new.hp,' Alamat = ',new.alamat),now());
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id_masterBarang`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_orders_detail`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id_masterBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id_orders_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
