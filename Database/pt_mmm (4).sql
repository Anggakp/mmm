-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 03:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_mmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ddesaindetail`
--

CREATE TABLE `tbl_2ddesaindetail` (
  `id_detail` int(11) NOT NULL,
  `id_header` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `submodel` varchar(50) DEFAULT NULL,
  `id_tipe` varchar(50) NOT NULL,
  `id_warna` varchar(50) NOT NULL,
  `id_material` varchar(50) NOT NULL,
  `beratmaterial` double NOT NULL,
  `ukuran` double NOT NULL,
  `id_finishing` varchar(50) NOT NULL,
  `id_konsepkepala` varchar(50) NOT NULL,
  `id_ongkosrangka` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `id_ongkoslainnya` int(11) NOT NULL,
  `hargamaterial` int(50) NOT NULL,
  `hargadiamond` int(50) NOT NULL,
  `hargakepala` int(50) NOT NULL,
  `ongkos` int(50) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `totaljumlah` int(50) NOT NULL,
  `totalberat` double NOT NULL,
  `jsfinishing` double NOT NULL,
  `jspolesrangka` double NOT NULL,
  `jspasangbatu` double NOT NULL,
  `jsrakit` double NOT NULL,
  `jspoleschrome` double NOT NULL,
  `approvedjs` varchar(50) NOT NULL,
  `approveddate` date NOT NULL,
  `gambar1` varchar(50) NOT NULL,
  `gambar2` varchar(50) NOT NULL,
  `gambar3` varchar(50) NOT NULL,
  `gambar4` varchar(50) NOT NULL,
  `gambar5` varchar(50) NOT NULL,
  `video1` varchar(50) NOT NULL,
  `video2` varchar(50) NOT NULL,
  `video3` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ddesainheader`
--

CREATE TABLE `tbl_2ddesainheader` (
  `id_header` int(11) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `id_client` varchar(50) NOT NULL,
  `memo` varchar(10000) DEFAULT NULL,
  `tipedesain` varchar(90) NOT NULL,
  `disetujui_1` varchar(50) DEFAULT NULL,
  `date_1` date DEFAULT NULL,
  `disetujui_2` varchar(50) DEFAULT NULL,
  `date_2` date DEFAULT NULL,
  `disetujui_3` varchar(50) DEFAULT NULL,
  `date_3` date DEFAULT NULL,
  `disetujui_4` varchar(50) DEFAULT NULL,
  `date_4` date DEFAULT NULL,
  `disetujui_5` varchar(50) DEFAULT NULL,
  `date_5` date DEFAULT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ddesainkepala`
--

CREATE TABLE `tbl_2ddesainkepala` (
  `id_subdetailkepala` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `harga` int(50) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `deleted` varchar(1) NOT NULL,
  `status` int(12) NOT NULL,
  `part` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ddesainsubdetail`
--

CREATE TABLE `tbl_2ddesainsubdetail` (
  `id_subdetail` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_headsetting` int(11) NOT NULL,
  `id_parcel` varchar(50) NOT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `berat` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `hargaheadsetting` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `deleted` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `bagian`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Web Developer', 1, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-14'),
(4, 'DESIGN MANAGER', 0, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-29'),
(5, 'DESIGNER 2D', 0, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-29'),
(6, 'SALESMAN', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(7, 'SALES MANAGER', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(8, 'BOD', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(9, 'Contohf', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bsis`
--

CREATE TABLE `tbl_bsis` (
  `id_bsis` int(11) NOT NULL,
  `namaakun` varchar(50) NOT NULL,
  `normal` varchar(50) NOT NULL,
  `pengurang` varchar(50) NOT NULL,
  `bsis` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bsis`
--

INSERT INTO `tbl_bsis` (`id_bsis`, `namaakun`, `normal`, `pengurang`, `bsis`, `akun`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'CURRENT ASSETS', 'D', 'N', 'B', '1', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-08-19'),
(3, 'FIXED ASSETS', 'D', 'N', 'B', '2', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(4, 'LIABILITIES', 'C', 'N', 'B', '3', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(5, 'EQUITY', 'C', 'N', 'B', '4', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(6, 'INCOME', 'D', 'N', 'I', '5', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(7, 'EXPENSE', 'C', 'Y', 'I', '6', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(9, 'Contoh', 'D', 'Y', 'B', '7', 0, 'AnggaKP', '2022-07-14', '', '0000-00-00'),
(10, 'ca', 'C', 'N', 'B', '12', 1, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16'),
(11, 's', 'D', 'Y', 'B', '10', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbankdetail`
--

CREATE TABLE `tbl_cashbankdetail` (
  `id_cashbankdetail` int(11) NOT NULL,
  `id_cashbankheader` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cashbankdetail`
--

INSERT INTO `tbl_cashbankdetail` (`id_cashbankdetail`, `id_cashbankheader`, `nomor`, `akun`, `nilai`, `keterangan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(4, '0', '2', '100,01', 2, 'KAS KECIL ', 1, 'Superadmin', '2022-09-07', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbankheader`
--

CREATE TABLE `tbl_cashbankheader` (
  `id_cashbankheader` varchar(20) NOT NULL,
  `id_matauang` varchar(50) NOT NULL,
  `inout` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `typetransaksi` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `subaccount` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `memo` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbanklawan`
--

CREATE TABLE `tbl_cashbanklawan` (
  `id_cashbanklawan` int(11) NOT NULL,
  `id_cashbankheader` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `nilai` int(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clarity`
--

CREATE TABLE `tbl_clarity` (
  `id_clarity` int(11) NOT NULL,
  `clarity` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clarity`
--

INSERT INTO `tbl_clarity` (`id_clarity`, `clarity`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'VVS2', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(4, 'VVS1', 0, 'AnggaKP', '2022-07-11', NULL, NULL),
(5, 'VVS3', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, 'VVS3', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'AS2', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(8, 'x', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, 'b', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(10, 'Contoh', 1, 'AnggaKP', '2022-08-15', NULL, NULL),
(11, 'Contoh', 1, 'AnggaKP', '2022-08-15', NULL, NULL),
(12, 'Contoh', 1, 'AnggaKP', '2022-08-15', NULL, NULL),
(13, 'Contoh', 1, 'AnggaKP', '2022-08-15', NULL, NULL),
(14, 'Ini contoh saja yaa', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(15, 'contohs', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(16, 'sad', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` int(11) NOT NULL,
  `subaccount` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodepos` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id_client`, `subaccount`, `nama`, `alamat`, `kota`, `provinsi`, `kodepos`, `phone`, `kontak`, `email`, `npwp`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, '1234567891', 'PT. Mita Express, Peter Jonatan', 'Medan', 'Medan', 'Sumatra Utara', '46211', '+62812563211256', 'Nugroho Chandra, Slamet', 'peter@gmail.com', '12345678909', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, '123456789112', 'Angga Kusuma Putra', 'ciamis', 'Ciamis', 'jawa barat', '46211', '+6285861085294', 'Angga Kusuma Putra', 'angga@gmail.com', '12345678909', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(5, 'a', 'Angga', 'yogyakarta', 'ciamis', 'jawa barat', '46212', '055861085294', 'angga', 'putraangga2810@gmail.com', '45613', 1, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16'),
(6, '123412412131', 'Rahmah Salsabila', 'maleber', 'ciamis', 'jawa barat', '462111', '085861085294', '-', 'rahmah@gmail.com', '-', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02'),
(7, '24124141132131', 'contoh', 'yogyakarta', 'ciamis', 'Jawa Tengah', '46212', '055861085294', '-', 'anggakusumaputra63@gmail.com', '12345151', 1, 'Superadmin', '2022-09-02', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coa`
--

CREATE TABLE `tbl_coa` (
  `id_coa` int(11) NOT NULL,
  `id_groupakun` varchar(15) DEFAULT NULL,
  `kode` int(11) DEFAULT NULL,
  `akun` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `namaakun` varchar(50) NOT NULL,
  `headerdetail` varchar(50) DEFAULT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_coa`
--

INSERT INTO `tbl_coa` (`id_coa`, `id_groupakun`, `kode`, `akun`, `level`, `namaakun`, `headerdetail`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, NULL, 2, '2', '1', 'FIXED ASSETS', 'H', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-07-13'),
(3, NULL, 3, '3', '1', 'LIABILITIES', 'H', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-07-14'),
(4, NULL, 4, '4', '1', 'EQUITY', 'H', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(5, NULL, 5, '5', '1', 'INCOME', 'H', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(6, NULL, 6, '6', '1', 'EXPENSE', 'H', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-07-13'),
(34, NULL, 1, '1', '1', 'CURRENT ASSETS', 'H', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-07-13'),
(95, NULL, 1, '10', '2', 'KAS - BANK ', 'H', 1, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(96, NULL, 1, '100', '3', 'KAS', 'H', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(97, '3', 1, '100,01', '4', 'KAS KECIL ', 'D', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-07-15'),
(98, '3', 1, '100,02', '4', 'KAS BESAR', 'D', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(99, '3', 1, '100,03', '4', 'contoh', 'D', 0, 'AnggaKP', '2022-07-20', '', '0000-00-00'),
(100, '', 2, '20', '2', 'contoh', 'H', 0, 'AnggaKP', '2022-07-20', '', '0000-00-00'),
(101, NULL, 12, '12', '1', 'ca', 'H', 1, 'AnggaKP', '2022-08-16', '', '0000-00-00'),
(102, NULL, 10, '10', '1', 's', 'H', 1, 'Superadmin', '2022-09-02', '', '0000-00-00'),
(103, '3', 1, '1512', '4', '123254', 'D', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id_color`, `color`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'G/H', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(3, 'D/E/F', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'G/H', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(5, 'D/E/F/H', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, 's', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(8, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, 'x', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(10, 'dsd12', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(11, 'senja', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(12, 'kuning', 1, 'AnggaKP', '2022-08-15', NULL, NULL),
(13, 'kuning', 0, 'AnggaKP', '2022-08-15', NULL, NULL),
(14, 'd', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02'),
(15, 's', 1, 'Superadmin', '2022-09-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_costcenter`
--

CREATE TABLE `tbl_costcenter` (
  `id_costcenter` int(11) NOT NULL,
  `kodecostcenter` varchar(50) NOT NULL,
  `namacostcenter` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_costcenter`
--

INSERT INTO `tbl_costcenter` (`id_costcenter`, `kodecostcenter`, `namacostcenter`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(6, '1', 'Contoh', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(7, '2', 'Baik', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(8, '3', 'Cantik', 0, 'AnggaKP', '2022-07-13', 'AnggaKP', '2022-07-13'),
(9, '21', 'Contoh lagi', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(10, '12', 'Angga', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00'),
(11, 's', 'contoh', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE `tbl_detail` (
  `id_spkdetail` int(11) NOT NULL,
  `id_spkheader` varchar(50) NOT NULL,
  `nomordetail` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `submodel` varchar(50) DEFAULT NULL,
  `id_tipe` varchar(50) NOT NULL,
  `id_warna` varchar(50) NOT NULL,
  `id_material` varchar(50) NOT NULL,
  `beratmaterial` double NOT NULL,
  `gender` varchar(50) NOT NULL,
  `ukuran` double NOT NULL,
  `id_finishing` varchar(50) NOT NULL,
  `id_konsepkepala` varchar(50) NOT NULL,
  `id_ongkos` varchar(50) NOT NULL,
  `hargamaterial` int(50) NOT NULL,
  `hargadiamond` int(50) NOT NULL,
  `hargakepala` int(50) NOT NULL,
  `ongkos` int(50) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `jsfinishing` double NOT NULL,
  `jspolesrangka` double NOT NULL,
  `jspasangbatu` double NOT NULL,
  `jsrakit` double NOT NULL,
  `jspoleschrome` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailbarang`
--

CREATE TABLE `tbl_detailbarang` (
  `id_detail` int(11) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `samplesatu` varchar(50) DEFAULT NULL,
  `sampledua` varchar(50) DEFAULT NULL,
  `sampletiga` varchar(50) DEFAULT NULL,
  `sampleempat` varchar(50) DEFAULT NULL,
  `samplelima` varchar(50) DEFAULT NULL,
  `sampleenam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detailbarang`
--

INSERT INTO `tbl_detailbarang` (`id_detail`, `kode_jenis`, `kode_barang`, `samplesatu`, `sampledua`, `sampletiga`, `sampleempat`, `samplelima`, `sampleenam`) VALUES
(10, 'D00001', 'BRG-00001', 'contoh sample', 'Contoh sample dua', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_reference`
--

CREATE TABLE `tbl_detail_reference` (
  `id_reference` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `ref_number` int(12) NOT NULL,
  `ref_part` varchar(128) NOT NULL,
  `ref_option` varchar(128) NOT NULL,
  `hasil_part` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagroup`
--

CREATE TABLE `tbl_diagroup` (
  `id_diagroup` int(11) NOT NULL,
  `diagroup` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diagroup`
--

INSERT INTO `tbl_diagroup` (`id_diagroup`, `diagroup`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(5, 'MELE', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-19'),
(6, 'STAR', 0, 'AnggaKP', '2022-07-12', NULL, NULL),
(13, 's', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(14, 'gdgd', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diameter`
--

CREATE TABLE `tbl_diameter` (
  `id_diameter` int(11) NOT NULL,
  `id_diagroup` varchar(50) NOT NULL,
  `diameter_from` varchar(50) NOT NULL,
  `diameter_to` varchar(50) NOT NULL,
  `carat` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diameter`
--

INSERT INTO `tbl_diameter` (`id_diameter`, `id_diagroup`, `diameter_from`, `diameter_to`, `carat`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(4, '5', '0,09', '0,11', '2', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(5, '6', '0,09', '0,11', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, '6', '0,10', '0,12', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(7, '5', '0,12', '0,15', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(8, '5', '0,16', '0,17', '3', 0, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, '5', '1', '2', '2', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(10, '5', 'ada', '2', '123', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finishing`
--

CREATE TABLE `tbl_finishing` (
  `id_finishing` int(11) NOT NULL,
  `finishing` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_finishing`
--

INSERT INTO `tbl_finishing` (`id_finishing`, `finishing`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Glossy,', 1, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-14'),
(5, 'contoh', 0, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-08-19'),
(6, 'Example Finishing', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groupakun`
--

CREATE TABLE `tbl_groupakun` (
  `id_groupakun` int(11) NOT NULL,
  `groupakun` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_groupakun`
--

INSERT INTO `tbl_groupakun` (`id_groupakun`, `groupakun`, `nama`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'CASH BANK', 'Kas Kecil', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-07-15'),
(4, 's', 'Contoh', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_header_reference`
--

CREATE TABLE `tbl_header_reference` (
  `id_header` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `hasil_reference` varchar(128) NOT NULL,
  `deleted` int(11) NOT NULL,
  `create_by` varchar(128) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(128) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_headsetting`
--

CREATE TABLE `tbl_headsetting` (
  `id_headsetting` int(11) NOT NULL,
  `headsetting` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_headsetting`
--

INSERT INTO `tbl_headsetting` (`id_headsetting`, `headsetting`, `price`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Pasang Head', 60000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(4, 'Pasang Crown', 60000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(5, 'Ganti Kuku', 30000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(6, 'Pasang EPL/EPA', 175000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(7, 'Pasang EP/EPR', 225000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(8, 'Pasang ELP', 375000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(9, 'Pasang Fancy Head', 375000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(10, 'Laser Logo', 25000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_bagian` varchar(30) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nip` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kodepos` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `tanggalmasuk` date NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `id_bagian`, `nik`, `nip`, `nama`, `alamat`, `kota`, `provinsi`, `kodepos`, `phone`, `kontak`, `email`, `npwp`, `tanggalmasuk`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(5, 'DESIGN MANAGER', '1271122810000003', 23311, 'Angga Kusuma Putra', 'Lingkungan Limusnunggal', 'Ciamis', 'Jawa Barat', '46211', '+6285861085294', 'Angga Kusuma Putra', 'anggakp@gmail.com', '123124512312451', '2022-07-13', 0, 'AnggaKP', '2022-07-12', 'Quality Management', '2022-08-09'),
(6, '5', '12312414553453453', 0, 'Putra Kusuma', 'ciamis', 'Ciamis', 'jawa barat', '46211', '+62812563211256', 'Nugroho Chandra, Slamet', 'angga@gmail.com', '1231251512', '2022-07-14', 0, 'AnggaKP', '2022-07-14', '', '0000-00-00'),
(7, '5', '12341245125151515151', 123313, 'Angga Kusuma Putra', 'yogyakarta', 'ciamis', 'Jawa Tengah', '123141', '085861085294', 'Angga', 'anggakusumautra007@gmail.com', '12345151', '2022-08-18', 0, 'AnggaKP', '2022-08-09', 'Quality Management', '2022-08-09'),
(8, '5', '123456', 13123123, 'Ibnu', 'Bekasi', 'Bekasi', 'Jawa Barat', '462111', '0857123131413141', 'Ibnu', 'ibnu@gmail.com', '123131', '2022-08-17', 0, 'Quality Management', '2022-08-09', 'Quality Management', '2022-08-09'),
(9, '4', '131313131321314', 1231411241, 'Gusta', 'Jakarta', 'Jakarta Utara', 'jawa barat', '4621', '082131231545', '085831512238', 'gusta123@gmail.com', '123451', '2022-09-02', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsepkepala`
--

CREATE TABLE `tbl_konsepkepala` (
  `id_konsepkepala` int(11) NOT NULL,
  `konsepkepala` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_konsepkepala`
--

INSERT INTO `tbl_konsepkepala` (`id_konsepkepala`, `konsepkepala`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Contoh saja', 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(2, 'Ini contoh yaa', 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(3, 'Vivan_', 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurs`
--

CREATE TABLE `tbl_kurs` (
  `id_kurs` int(11) NOT NULL,
  `id_matauang` varchar(50) NOT NULL,
  `rate` int(15) NOT NULL,
  `tanggal` datetime NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kurs`
--

INSERT INTO `tbl_kurs` (`id_kurs`, `id_matauang`, `rate`, `tanggal`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(10, '4', 1, '2022-07-15 05:16:34', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-08-19'),
(11, '3', 14975, '2022-07-18 09:41:24', 0, 'AnggaKP', '2022-07-18', '', '0000-00-00'),
(12, '3', 15000, '2022-07-18 09:42:01', 1, 'AnggaKP', '2022-07-18', '', '0000-00-00'),
(13, '5', 15000, '2022-07-29 11:37:41', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(14, '6', 123, '2022-08-08 11:51:28', 1, 'AnggaKP', '2022-08-08', 'AnggaKP', '2022-08-16'),
(15, '8', 15000, '2022-09-02 08:36:52', 0, 'Superadmin', '2022-09-02', '', '0000-00-00'),
(16, '5', 20000, '2022-09-02 08:37:10', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kursmaterial`
--

CREATE TABLE `tbl_kursmaterial` (
  `id_kursmaterial` int(11) NOT NULL,
  `id_material` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kursmaterial`
--

INSERT INTO `tbl_kursmaterial` (`id_kursmaterial`, `id_material`, `rate`, `tanggal`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '7', 2100000, '2022-08-11 13:55:02', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(2, '8', 900000, '2022-08-11 14:55:10', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(3, '8', 2000000, '2022-08-11 13:55:47', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(4, '8', 900000, '2022-08-10 14:33:12', 0, 'AnggaKP', '2022-08-10', 'AnggaKP', '2022-08-12'),
(5, '8', 1500000, '2022-08-10 14:33:56', 0, 'AnggaKP', '2022-08-10', 'AnggaKP', '2022-08-12'),
(6, '8', 3500000, '2022-08-11 14:45:48', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(7, '8', 3200000, '2022-08-11 14:48:00', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(8, '3', 1200000, '2022-08-11 16:52:00', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(9, '6', 1200000, '2022-08-11 16:52:24', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(10, '3', 1250000, '2022-08-11 16:52:41', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-12'),
(11, '6', 1100000, '2022-08-11 16:53:02', 0, 'AnggaKP', '2022-08-11', 'AnggaKP', '2022-08-19'),
(12, '7', 2000000, '2022-08-12 01:26:05', 1, 'AnggaKP', '2022-08-12', '', '0000-00-00'),
(13, '7', 1200000, '2022-08-10 13:27:00', 0, 'AnggaKP', '2022-08-12', 'AnggaKP', '2022-08-12'),
(14, '7', 1500000, '2022-08-04 16:23:00', 0, 'AnggaKP', '2022-08-12', '', '0000-00-00'),
(15, '3', 23333, '2022-09-01 11:14:00', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masterid`
--

CREATE TABLE `tbl_masterid` (
  `id_masterid` int(11) NOT NULL,
  `masterid` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `deleted` varchar(50) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_masterid`
--

INSERT INTO `tbl_masterid` (`id_masterid`, `masterid`, `keterangan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Tipe Produk', 'Bahan Baku', '0', 'AnggaKP', '2022-08-03', 'AnggaKP', '2022-08-03'),
(3, 'Tipe Produk', 'Bahan Baku Pembantu', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(4, 'Tipe Produk', 'Konsep Kepala', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(5, 'Tipe Produk', 'Alat Tukang', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(6, 'Brand', 'No Brand', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(7, 'Brand', 'LG', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(8, 'Brand', 'Phillips', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(9, 'Brand', 'Sony', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(10, 'Category', 'Cairan Kimia', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(11, 'Category', 'Alat Bor', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(12, 'Category', 'Alat Poles', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(13, 'Category', 'ATK', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(14, 'Tipe Produk', 'Konsep Kepala', '1', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(15, 'Etalase', '0125', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(16, 'Etalase', '0126', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(17, 'Etalase', '0127', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(18, 'Jenis Garansi', 'Tidak Garansi', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(19, 'Jenis Garansi', 'Garansi Toko', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(20, 'Jenis Garansi', 'Garansi Supplier', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(21, 'Jenis Garansi', 'Garansi Resmi Brand', '0', 'AnggaKP', '2022-08-03', '', '2022-08-03'),
(22, 'Jenis Garansi', 'Garansi International', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(23, 'Periode Garansi', '1 Bulan', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(24, 'Periode Garansi', '2 Bulan', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(25, 'Periode Garansi', '6 Bulan', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(26, 'Periode Garansi', '12 Bulan', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(27, 'Periode Garansi', '24 Bulan', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(28, 'Periode Garansi', 'Lifetime', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(29, 'Claim Garansi', 'Tidak Garansi', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(30, 'Claim Garansi', 'Tukar Baru', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(31, 'Claim Garansi', 'Service', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(32, 'Kondisi', 'Baru', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(33, 'Kondisi', 'Bekas', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(34, 'Kondisi', 'Discontinue', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(35, 'Satuan Besar', 'Dus', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(36, 'Satuan Besar', 'Lusin', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(37, 'Satuan Kecil', 'PC', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(38, 'Satuan Kecil', 'Botol', '0', 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(57, 'Jenis Garansi', 'Garansi Tidak Resmi Brand', '0', 'AnggaKP', '2022-08-03', '', '2022-08-03'),
(58, 's', 'c', '1', 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16'),
(59, 'contoh', 'oke', '1', 'AnggaKP', '2022-08-19', '', '0000-00-00'),
(60, 'hhh', '12', '1', 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02'),
(61, 'contoy', 'contoh', '0', 'Admin', '2022-09-06', '', '0000-00-00'),
(62, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(63, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(64, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(65, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(66, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(67, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(68, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(69, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(70, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(71, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(72, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(73, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(74, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(75, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(76, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(77, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(78, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(79, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(80, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(81, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(82, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(83, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(84, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00'),
(85, 'dsds', 'sdsd', '0', 'Superadmin', '2022-09-08', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masterproduk`
--

CREATE TABLE `tbl_masterproduk` (
  `id_produk` int(11) NOT NULL,
  `id_tipeproduk` varchar(1) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL,
  `skuproduk` varchar(100) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `deskripsiproduk` varchar(10000) NOT NULL,
  `id_brand` varchar(50) NOT NULL,
  `id_category` varchar(50) NOT NULL,
  `id_etalase` varchar(50) NOT NULL,
  `id_jenisgaransi` varchar(50) NOT NULL,
  `id_periodegaransi` varchar(50) NOT NULL,
  `id_claimgaransi` varchar(50) NOT NULL,
  `id_kondisi` varchar(50) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `panjang` varchar(50) NOT NULL,
  `lebar` varchar(50) NOT NULL,
  `tinggi` varchar(50) NOT NULL,
  `id_satuanbesar` varchar(50) NOT NULL,
  `id_satuankecil` varchar(50) NOT NULL,
  `konversisatuan` varchar(50) NOT NULL,
  `id_matauang` varchar(50) NOT NULL,
  `hargabeli` varchar(50) NOT NULL,
  `hargajual` varchar(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `minimumstock` int(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `hargabeliterakhir` varchar(50) NOT NULL,
  `hargabelimean` varchar(50) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `gambar4` varchar(100) NOT NULL,
  `gambar5` varchar(100) NOT NULL,
  `video1` varchar(100) NOT NULL,
  `video2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_masterproduk`
--

INSERT INTO `tbl_masterproduk` (`id_produk`, `id_tipeproduk`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`, `skuproduk`, `barcode`, `namaproduk`, `deskripsiproduk`, `id_brand`, `id_category`, `id_etalase`, `id_jenisgaransi`, `id_periodegaransi`, `id_claimgaransi`, `id_kondisi`, `berat`, `panjang`, `lebar`, `tinggi`, `id_satuanbesar`, `id_satuankecil`, `konversisatuan`, `id_matauang`, `hargabeli`, `hargajual`, `stock`, `minimumstock`, `supplier`, `hargabeliterakhir`, `hargabelimean`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `video1`, `video2`) VALUES
(1, '1', 0, 'AnggaKP', '2022-08-04', 'Superadmin', '2022-09-02', '003', '005', 'Contoh Produk', 'contoh saja yaa        ', '7', '12', '16', '18', '25', '30', '32', '20', '30', '30', '30', '36', '37', '20', '5', '250000', '350000', 0, 0, '', '', '', '659560d5decc0b9ee3f1800308462eeb.jpeg', 'Planet9_Wallpaper_5000x2813.jpg', '', '', '', '', ''),
(2, '4', 0, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02', '003231', '003', 'ini adalah contoh', 'contoh dari produk  ', '7', '10', '15', '20', '25', '29', '32', '1', '3', '4', '3', '35', '37', '2', '4', '900000', '900000', 0, 0, '', '', '', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File'),
(3, '3', 1, 'Superadmin', '2022-09-02', '', '0000-00-00', '13213', '13213', 'ada', ' adad ', '6', '10', '15', '18', '23', '29', '32', '2', '2', '2', '2', '35', '37', '20', '5', '5000000', '2000000', 0, 0, '', '', '', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File'),
(4, '5', 0, 'Superadmin', '2022-09-07', 'Superadmin', '2022-09-07', '001', '001', 'Alat Untuk Memperbaiki,Cordless Electric Impact Wrench,mesin bor - 48V 1baterai', '<ul data-testid=\"lblPDPInfoProduk\" class=\"css-1ijyj3z eytdjj02\" style=\"box-sizing: inherit; display: flex; flex-flow: column wrap; height: 96px; margin-bottom: -4px; padding: 0px; color: rgba(0, 0, 0, 0.54); font-family: \"Open Sauce One\", sans-serif; font-size: 14px;\"><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kondisi: </span><span class=\"main\" style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.96));\">Baru</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Berat Satuan: </span><span class=\"main\" style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.96));\">4,2 - 5,2 kg</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kategori: </span><a href=\"https://www.tokopedia.com/p/pertukangan/power-tools/mesin-bor\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Mesin Bor</span></a></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Etalase: </span><a href=\"https://www.tokopedia.com/internationalsupermart/etalase/all\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Semua Etalase</span></a></li></ul><div class=\"css-1k1relq\" style=\"box-sizing: inherit; margin-top: 12px; font-size: 14px; line-height: 20px; color: var(--N700,rgba(49,53,59,0.96)); font-family: \"Open Sauce One\", sans-serif;\"><span class=\"css-11oczh8 eytdjj00\" style=\"box-sizing: inherit; display: contents; overflow: hidden; max-height: 160px;\"><span class=\"css-168ydy0 eytdjj01\" style=\"box-sizing: inherit; display: -webkit-box; -webkit-line-clamp: unset; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow: hidden; word- ', '6', '11', '16', '19', '26', '30', '33', '2000', '4', '3', '5', '36', '37', '20', '4', '774200', '770000', 0, 0, '', '', '', 'Foto_Profi.jpg', 'c96fa37d76a932467c46cfcea0f2727a.jpg', 'f19a0fae7c9aa0ea2b79f80394174478.jpg', 'e66e23bb6da646ae68a3bb18c7d6bdc1.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matauang`
--

CREATE TABLE `tbl_matauang` (
  `id_matauang` int(11) NOT NULL,
  `kodematauang` varchar(50) NOT NULL,
  `namamatauang` varchar(50) NOT NULL,
  `symbol` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matauang`
--

INSERT INTO `tbl_matauang` (`id_matauang`, `kodematauang`, `namamatauang`, `symbol`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'USD', 'United State Dollar', ' $', 0, 'AnggaKP', '2022-07-12', 'Superadmin', '2022-09-02'),
(4, 'IDR', 'Indonesia Rupiah', 'Rp', 0, 'AnggaKP', '2022-07-15', 'Superadmin', '2022-09-02'),
(5, 'SGD', 'Singapore Dollar', 'S$', 0, 'AnggaKP', '2022-07-15', 'Superadmin', '2022-09-02'),
(6, 'f', 'a', '', 1, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16'),
(7, 'as', 'Peso', '', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02'),
(8, 'PHP', 'Peso', '₱', 0, 'Superadmin', '2022-09-02', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `id_material` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`id_material`, `material`, `satuan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'White Gold 750', 'Gram', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'WhiteGold', 'Gram', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29'),
(5, 'Contoh', 'Kilogram', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(6, 'Contoh Saja', 'Kilogram', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(7, 'Emas Murni', 'Kilogram', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(8, 'Emas Unggul', 'Kilogram', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(9, 'WhiteGold', 'KIlogram', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29'),
(10, 'WhiteGold', 'Kg', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29'),
(11, 'WhiteGold', 'G', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29'),
(12, 'WhiteGold', 'Kg', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29'),
(13, 'GoldWhite', 'Gram', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkoslainnya`
--

CREATE TABLE `tbl_ongkoslainnya` (
  `id_ongkoslainnya` int(11) NOT NULL,
  `ongkoslainnya` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ongkoslainnya`
--

INSERT INTO `tbl_ongkoslainnya` (`id_ongkoslainnya`, `ongkoslainnya`, `price`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'Laser Logo', 25000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(3, 'Laser Nama', 15000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(4, 'Laser Ornamen', 110000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(5, 'Miligrain', 35000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(6, 'Doft', 40000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12'),
(7, 'Enamel', 35000, 0, 'Superadmin', '2022-09-12', 'Superadmin', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkosrangka`
--

CREATE TABLE `tbl_ongkosrangka` (
  `id_ongkosrangka` int(11) NOT NULL,
  `noro` varchar(50) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `kesulitan` varchar(50) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `ongkosrangka` int(50) NOT NULL,
  `kode` int(1) NOT NULL,
  `filter` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ongkosrangka`
--

INSERT INTO `tbl_ongkosrangka` (`id_ongkosrangka`, `noro`, `id_tipe`, `kesulitan`, `ukuran`, `ongkosrangka`, `kode`, `filter`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(22, 'NO', 5, 'Mudah', 'Kecil 1-2', 70000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(23, 'RO', 5, 'Mudah', 'Kecil 1-2', 550000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(24, 'NO', 5, 'Mudah', 'Sedang/3-4', 800000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(25, 'RO', 5, 'Mudah', 'Sedang/3-4', 650000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(26, 'NO', 5, 'Mudah', 'Besar >4', 900000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(27, 'RO', 5, 'Mudah', 'Besar >4', 700000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(28, 'NO', 5, 'Sedang', 'Kecil 1-2', 1000000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(29, 'RO', 5, 'Sedang', 'Kecil 1-2', 750000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(30, 'NO', 5, 'Sedang', 'Sedang/3-4', 1100000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(31, 'RO', 5, 'Sedang', 'Sedang/3-4', 800000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(32, 'NO', 5, 'Sedang', 'Besar >4', 1300000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(33, 'RO', 5, 'Sedang', 'Besar >4', 900000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(34, 'NO', 5, 'Sulit', 'Kecil 1-2', 1450000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(35, 'RO', 5, 'Sulit', 'Kecil 1-2', 950000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(36, 'NO', 5, 'Sulit', 'Sedang/3-4', 1600000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(37, 'RO', 5, 'Sulit', 'Sedang/3-4', 1000000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(38, 'NO', 5, 'Sulit', 'Besar >4', 2150000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(39, 'RO', 5, 'Sulit', 'Besar >4', 1150000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(40, 'NO', 4, 'Mudah', 'Kecil 1-2', 375000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(41, 'RO', 4, 'Mudah', 'Kecil 1-2', 250000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(42, 'NO', 4, 'Mudah', 'Sedang/3-4', 400000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(43, 'RO', 4, 'Mudah', 'Sedang/3-4', 300000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(44, 'NO', 4, 'Mudah', 'Besar >4', 450000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(45, 'RO', 4, 'Mudah', 'Besar >4', 350000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(46, 'NO', 4, 'Sedang', 'Kecil 1-2', 575000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(47, 'RO', 4, 'Sedang', 'Kecil 1-2', 350000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(48, 'NO', 4, 'Sedang', 'Sedang/3-4', 650000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(49, 'RO', 4, 'Sedang', 'Sedang/3-4', 400000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(50, 'NO', 4, 'Sedang', 'Besar >4', 750000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(52, 'RO', 4, 'Sedang', 'Besar >4', 425000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(53, 'NO', 4, 'Sulit', 'Kecil 1-2', 800000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(54, 'RO', 4, 'Sulit', 'Kecil 1-2', 450000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(55, 'NO', 4, 'Sulit', 'Sedang/3-4', 900000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(56, 'RO', 4, 'Sulit', 'Sedang/3-4', 550000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(57, 'NO', 4, 'Sulit', 'Besar >4', 1000000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(58, 'RO', 4, 'Sulit', 'Besar >4', 625000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(59, 'NO', 8, 'Mudah', 'Kecil 1-2', 375000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(60, 'RO', 8, 'Mudah', 'Kecil 1-2', 250000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(61, 'NO', 8, 'Mudah', 'Sedang/3-4', 400000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(62, 'RO', 8, 'Mudah', 'Sedang/3-4', 300000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(63, 'NO', 8, 'Mudah', 'Besar >4', 450000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(64, 'RO', 8, 'Mudah', 'Besar >4', 350000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(65, 'NO', 8, 'Sedang', 'Kecil 1-2', 575000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(66, 'RO', 8, 'Sedang', 'Kecil 1-2', 350000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(67, 'NO', 8, 'Sedang', 'Sedang/3-4', 650000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(68, 'RO', 8, 'Sedang', 'Sedang/3-4', 400000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(69, 'NO', 8, 'Sedang', 'Besar >4', 750000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(70, 'RO', 8, 'Sedang', 'Besar >4', 425000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(71, 'NO', 8, 'Sulit', 'Kecil 1-2', 800000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(72, 'RO', 8, 'Sulit', 'Kecil 1-2', 450000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(73, 'NO', 8, 'Sulit', 'Sedang/3-4', 900000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(74, 'RO', 8, 'Sulit', 'Sedang/3-4', 550000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(75, 'NO', 8, 'Sulit', 'Besar >4', 1000000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(76, 'RO', 8, 'Sulit', 'Besar >4', 625000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(77, 'NO', 9, 'Mudah', 'Kecil 1-2', 575000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(78, 'RO', 9, 'Mudah', 'Kecil 1-2', 250000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(79, 'NO', 9, 'Mudah', 'Sedang/3-4', 750000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(80, 'RO', 9, 'Mudah', 'Sedang/3-4', 300000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(81, 'NO', 9, 'Mudah', 'Besar >4', 800000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(82, 'RO', 9, 'Mudah', 'Besar >4', 300000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(83, 'NO', 9, 'Sedang', 'Kecil 1-2', 900000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(84, 'RO', 9, 'Sedang', 'Kecil 1-2', 750000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(85, 'NO', 9, 'Sedang', 'Sedang/3-4', 1000000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(86, 'RO', 9, 'Sedang', 'Sedang/3-4', 550000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(87, 'NO', 9, 'Sedang', 'Besar >4', 1150000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(88, 'RO', 9, 'Sedang', 'Besar >4', 700000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(89, 'NO', 9, 'Sulit', 'Kecil 1-2', 1450000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(90, 'RO', 9, 'Sulit', 'Kecil 1-2', 800000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(91, 'NO', 9, 'Sulit', 'Sedang/3-4', 2100000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(92, 'RO', 9, 'Sulit', 'Sedang/3-4', 1000000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(93, 'NO', 9, 'Sulit', 'Besar >4', 2400000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(94, 'RO', 9, 'Sulit', 'Besar >4', 1350000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(95, 'NO', 10, 'Mudah', 'Kecil 1-2', 525000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(96, 'RO', 10, 'Mudah', 'Kecil 1-2', 350000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(97, 'NO', 10, 'Mudah', 'Sedang/3-4', 650000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(98, 'NO', 0, 'Mudah', 'Besar >4', 800000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(99, 'RO', 10, 'Mudah', 'Besar >4', 500000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(100, 'NO', 10, 'Sedang', 'Kecil 1-2', 900000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(101, 'RO', 10, 'Sedang', 'Kecil 1-2', 750000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(102, 'NO', 10, 'Sedang', 'Sedang/3-4', 1000000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(103, 'RO', 10, 'Sedang', 'Sedang/3-4', 850000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(104, 'NO', 10, 'Sedang', 'Besar >4', 1400000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(105, 'RO', 10, 'Sedang', 'Besar >4', 925000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(106, 'NO', 10, 'Sulit', 'Kecil 1-2', 1700000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(107, 'RO', 10, 'Sulit', 'Kecil 1-2', 950000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(108, 'NO', 10, 'Sulit', 'Sedang/3-4', 2300000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(109, 'RO', 10, 'Sulit', 'Sedang/3-4', 1000000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(110, 'NO', 10, 'Sulit', 'Besar >4', 2900000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(111, 'RO', 10, 'Sulit', 'Besar >4', 1400000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(112, 'RO', 10, 'Mudah', 'Sedang/3-4', 400000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(113, 'NO', 11, 'Mudah', 'Kecil 1-2', 400000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(114, 'RO', 11, 'Mudah', 'Kecil 1-2', 300000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(115, 'NO', 11, '', 'Sedang/3-4', 450000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(116, 'RO', 11, 'Mudah', 'Sedang/3-4', 350000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(117, 'NO', 11, 'Mudah', 'Besar >4', 525000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(118, 'RO', 11, 'Mudah', 'Besar >4', 375000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(119, 'NO', 11, 'Sedang', 'Kecil 1-2', 700000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(120, 'RO', 11, 'Sedang', 'Kecil 1-2', 450000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(121, 'NO', 11, 'Sedang', 'Sedang/3-4', 850000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(122, 'RO', 11, 'Sedang', 'Sedang/3-4', 575000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(123, 'NO', 11, 'Sedang', 'Besar >4', 1000000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(124, 'RO', 11, 'Sedang', 'Besar >4', 700000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(125, 'NO', 11, 'Sulit', 'Kecil 1-2', 1150000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(126, 'RO', 11, 'Sulit', 'Kecil 1-2', 800000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(127, 'NO', 11, 'Sulit', 'Sedang/3-4', 1450000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(128, 'RO', 11, 'Sulit', 'Sedang/3-4', 900000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(129, 'NO', 11, 'Sulit', 'Besar >4', 2250000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(130, 'RO', 11, 'Sulit', 'Besar >4', 1000000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-09', 'Superadmin', '2022-09-12'),
(132, 'NO', 12, 'Mudah', 'Kecil 1-2', 450000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(133, 'RO', 12, 'Mudah', '', 300000, 1, 'Mudah Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(134, 'NO', 12, 'Mudah', 'Sedang/3-4', 500000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(135, 'RO', 12, 'Mudah', 'Sedang/3-4', 350000, 2, 'Mudah Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(136, 'NO', 12, 'Mudah', 'Besar >4', 550000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(137, 'RO', 12, 'Mudah', 'Besar >4', 450000, 3, 'Mudah Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(138, 'NO', 12, 'Sedang', 'Kecil 1-2', 700000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(139, 'RO', 12, 'Sedang', 'Kecil 1-2', 550000, 4, 'Sedang Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(140, 'NO', 12, 'Sedang', 'Sedang/3-4', 800000, 5, 'Sedang Sedang/3-4', 1, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(141, 'RO', 12, 'Sedang', 'Sedang/3-4', 575000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(142, 'NO', 12, 'Sedang', 'Besar >4', 900000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(143, 'RO', 12, 'Sedang', 'Besar >4', 650000, 6, 'Sedang Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(144, 'NO', 12, 'Sulit', 'Kecil 1-2', 1150000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(145, 'RO', 12, 'Sulit', 'Kecil 1-2', 700000, 7, 'Sulit Kecil 1-2', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(147, 'NO', 12, 'Sedang', 'Sedang/3-4', 800000, 5, 'Sedang Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(148, 'NO', 12, 'Sulit', 'Sedang/3-4', 1500000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(149, 'RO', 12, 'Sulit', 'Sedang/3-4', 800000, 8, 'Sulit Sedang/3-4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(150, 'NO', 12, 'Sulit', 'Besar >4', 1700000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00'),
(151, 'RO', 12, 'Sulit', 'Besar >4', 850000, 9, 'Sulit Besar >4', 0, 'Superadmin', '2022-09-12', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parcel`
--

CREATE TABLE `tbl_parcel` (
  `id_parcel` int(11) NOT NULL,
  `parcel` varchar(50) NOT NULL,
  `id_diameter` varchar(50) NOT NULL,
  `id_clarity` varchar(50) NOT NULL,
  `id_shape` varchar(50) NOT NULL,
  `id_color` varchar(50) NOT NULL,
  `hargabeli` int(50) NOT NULL,
  `hargajual` int(50) NOT NULL,
  `deleted` varchar(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_parcel`
--

INSERT INTO `tbl_parcel` (`id_parcel`, `parcel`, `id_diameter`, `id_clarity`, `id_shape`, `id_color`, `hargabeli`, `hargajual`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(12, 'P01CA', '4', '4', '2', '3', 2000000, 2500000, '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(13, 'P01CA', '7', '4', '2', '3', 1500000, 1800000, '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(14, 'P01CA', '8', '4', '2', '3', 4000000, 3500000, '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(15, 'C01CA', '4', '4', '7', '4', 4500000, 5000000, '0', 'AnggaKP', '2022-07-12', 'Superadmin', '2022-09-08'),
(16, 'C01CA', '7', '4', '3', '3', 2000000, 3000000, '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `id_jenisproduk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(6, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shape`
--

CREATE TABLE `tbl_shape` (
  `id_shape` int(11) NOT NULL,
  `shape` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shape`
--

INSERT INTO `tbl_shape` (`id_shape`, `shape`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Marquise', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(2, 'Round', 0, 'AnggaKP', '2022-07-12', NULL, NULL),
(3, 'Marquise', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'Round1', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(5, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(6, 'c', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'z', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(8, 'ad', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, 'fass', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15'),
(10, 'sd', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spkdetail`
--

CREATE TABLE `tbl_spkdetail` (
  `id_spkdetail` int(11) NOT NULL,
  `id_spkheader` varchar(50) NOT NULL,
  `no_detail` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `submodel` varchar(50) DEFAULT NULL,
  `id_tipe` varchar(50) NOT NULL,
  `id_warna` varchar(50) NOT NULL,
  `id_material` varchar(50) NOT NULL,
  `beratmaterial` double NOT NULL,
  `ukuran` double NOT NULL,
  `id_finishing` varchar(50) NOT NULL,
  `id_konsepkepala` varchar(50) NOT NULL,
  `id_ongkosrangka` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `hargamaterial` int(50) NOT NULL,
  `hargadiamond` int(50) NOT NULL,
  `hargakepala` int(50) NOT NULL,
  `ongkos` int(50) NOT NULL,
  `totalharga` int(50) NOT NULL,
  `totaljumlah` int(11) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `jsfinishing` double NOT NULL,
  `jspolesrangka` double NOT NULL,
  `jspasangbatu` double NOT NULL,
  `jsrakit` double NOT NULL,
  `jspoleschrome` double NOT NULL,
  `deleted` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spkdiamonddetail`
--

CREATE TABLE `tbl_spkdiamonddetail` (
  `id_diamonddetail` int(11) NOT NULL,
  `id_spkdetail` int(11) NOT NULL,
  `id_parcel` varchar(50) NOT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `berat` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `deleted` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `part` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spkheaddetail`
--

CREATE TABLE `tbl_spkheaddetail` (
  `id_headdetail` int(11) NOT NULL,
  `id_spkdetail` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `harga` int(50) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `deleted` varchar(1) NOT NULL,
  `status` int(12) NOT NULL,
  `part` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spkheader`
--

CREATE TABLE `tbl_spkheader` (
  `id_spkheader` int(11) NOT NULL,
  `typespk` varchar(50) NOT NULL,
  `nomorspk` varchar(50) NOT NULL,
  `tanggalspk` date NOT NULL,
  `id_client` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `submodel` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `memo` varchar(10000) DEFAULT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipedesign`
--

CREATE TABLE `tbl_tipedesign` (
  `id_tipe` int(11) NOT NULL,
  `tipedesign` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tipedesign`
--

INSERT INTO `tbl_tipedesign` (`id_tipe`, `tipedesign`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, ' Bangle', 1, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-14'),
(4, 'Pendant', 0, 'AnggaKP', '2022-07-20', 'Superadmin', '2022-09-09'),
(5, 'Bangle', 0, 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(6, 'Contoh', 1, 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(7, 'Example', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02'),
(8, 'Ladies Ring / WR', 0, 'Superadmin', '2022-09-09', '', '0000-00-00'),
(9, 'Bracelet', 0, 'Superadmin', '2022-09-09', '', '0000-00-00'),
(10, 'Necklace', 0, 'Superadmin', '2022-09-09', '', '0000-00-00'),
(11, 'Earring', 0, 'Superadmin', '2022-09-09', '', '0000-00-00'),
(12, 'Men\'s Ring', 0, 'Superadmin', '2022-09-09', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(130) NOT NULL,
  `username` varchar(50) NOT NULL,
  `image` varchar(130) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `image`, `password`, `role_id`, `is_active`, `tanggal_daftar`) VALUES
(1, 'Superadmin', 'superadmin', 'add.png', '$2y$10$Z7ozudpBndTrZ7bcFgftu.jD8Tr5bcZPBLvl3A5RjjIafxpjNI3k.', 1, 1, '2021-01-01'),
(2, 'Admin', 'admin', 'default.png', '$2y$10$p/V0ClrNLzaWnvywodsHdOZGeGAH64ZTq/Hrvuoojt58ZrGjCBVCG', 2, 1, '2021-01-01'),
(7, 'Testing', 'testing', 'default.png', '$2y$10$qbMxSl3DroWN5DRBwtfL9.HL/NOpfYBjqecQpqShJvAu8S2zIcx8i', 6, 1, '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `add_btn` int(11) NOT NULL,
  `update_btn` int(11) NOT NULL,
  `delete_btn` int(1) NOT NULL,
  `detail_btn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_access_menu`
--

INSERT INTO `tbl_user_access_menu` (`id`, `role_id`, `menu_id`, `add_btn`, `update_btn`, `delete_btn`, `detail_btn`) VALUES
(1, 1, 1, 1, 1, 1, 0),
(2, 1, 2, 1, 1, 1, 0),
(3, 1, 3, 1, 1, 1, 0),
(4, 1, 4, 1, 1, 1, 0),
(5, 1, 5, 1, 1, 1, 0),
(6, 1, 6, 1, 1, 1, 0),
(7, 1, 7, 1, 1, 1, 0),
(8, 1, 8, 1, 1, 1, 0),
(10, 1, 10, 1, 1, 1, 0),
(12, 1, 12, 1, 1, 1, 0),
(13, 1, 13, 1, 1, 1, 0),
(14, 1, 14, 1, 1, 1, 0),
(15, 1, 15, 1, 1, 1, 0),
(16, 1, 16, 1, 1, 1, 0),
(17, 1, 17, 1, 1, 1, 0),
(21, 1, 21, 1, 1, 1, 0),
(22, 1, 22, 1, 1, 1, 0),
(23, 1, 23, 1, 1, 1, 0),
(24, 1, 24, 1, 1, 1, 0),
(25, 1, 25, 1, 1, 1, 0),
(26, 1, 26, 1, 1, 1, 0),
(27, 1, 27, 1, 1, 1, 0),
(28, 1, 28, 1, 1, 1, 1),
(29, 1, 29, 1, 1, 1, 1),
(30, 1, 30, 1, 1, 1, 0),
(31, 1, 31, 1, 1, 1, 0),
(32, 1, 32, 1, 1, 1, 0),
(33, 1, 33, 1, 1, 1, 0),
(34, 1, 34, 1, 1, 1, 0),
(35, 1, 35, 1, 1, 1, 1),
(36, 1, 36, 1, 1, 1, 1),
(38, 1, 38, 1, 1, 1, 0),
(40, 1, 37, 1, 1, 1, 0),
(45, 1, 9, 1, 1, 1, 0),
(46, 2, 1, 0, 0, 0, 0),
(47, 2, 9, 1, 1, 0, 0),
(48, 2, 10, 1, 0, 0, 0),
(49, 2, 12, 1, 1, 0, 0),
(50, 2, 11, 0, 0, 0, 0),
(51, 2, 8, 0, 0, 0, 0),
(52, 1, 11, 1, 1, 1, 0),
(53, 1, 18, 1, 1, 1, 0),
(54, 1, 19, 1, 1, 1, 0),
(55, 1, 20, 1, 1, 1, 0),
(61, 1, 0, 0, 0, 0, 0),
(63, 2, 0, 0, 0, 0, 0),
(66, 1, 48, 0, 0, 0, 0),
(67, 1, 49, 1, 1, 1, 1),
(68, 1, 50, 0, 0, 0, 0),
(69, 1, 51, 1, 1, 1, 0),
(70, 1, 52, 0, 0, 0, 0),
(71, 1, 53, 0, 0, 0, 0),
(72, 1, 55, 1, 1, 1, 0),
(73, 1, 56, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id` int(11) NOT NULL,
  `kode_sub` int(11) DEFAULT NULL,
  `kode_sub_menu` int(11) DEFAULT NULL,
  `kode_sub_sub` int(12) DEFAULT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `level` int(12) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `url_1` varchar(128) DEFAULT NULL,
  `url_2` varchar(128) DEFAULT NULL,
  `url_3` varchar(128) DEFAULT NULL,
  `url_4` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `jenis` int(1) DEFAULT NULL,
  `target` varchar(128) DEFAULT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id`, `kode_sub`, `kode_sub_menu`, `kode_sub_sub`, `menu`, `level`, `url`, `url_1`, `url_2`, `url_3`, `url_4`, `icon`, `jenis`, `target`, `is_active`) VALUES
(0, NULL, NULL, NULL, 'Dashboard', 1, 'dashboard', NULL, NULL, NULL, NULL, '', NULL, '', 1),
(1, NULL, NULL, NULL, 'Master Produk', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, NULL, NULL, NULL, 'Master Mata Uang', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, NULL, NULL, NULL, 'Master Client', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, NULL, NULL, NULL, 'Master Karyawan', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, NULL, NULL, NULL, 'BSIS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, NULL, NULL, NULL, 'Cash Bank', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, NULL, NULL, NULL, '2D Design', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 1, 2, NULL, 'Master Produk', 2, '#', NULL, NULL, NULL, NULL, 'fas fa-fw fa-box', 2, '#collapseTen', 0),
(9, NULL, NULL, 2, 'Produk', 3, 'listproduk', 'tambahdataproduk', 'editdataproduk', NULL, NULL, NULL, 1, 'collapseTen', 0),
(10, NULL, NULL, 2, 'MasterID', 3, 'listmasterid', 'tambahdatamasterid', 'editdatamasterid', NULL, NULL, NULL, 1, 'collapseTen', 0),
(11, 1, 3, NULL, 'Diamond', 2, '#', NULL, NULL, NULL, NULL, 'fas fa-fw fa-box', 2, '#collapseFour', 0),
(12, NULL, NULL, 3, 'Clarity', 3, 'listclarity', 'tambahdataclarity', 'editdataclarity', NULL, NULL, '', 1, 'collapseFour', 0),
(13, NULL, NULL, 3, 'Shape', 3, 'listshape', 'tambahdatashape', 'editdatashape', NULL, NULL, '', 1, 'collapseFour', 0),
(14, NULL, NULL, 3, 'Warna', 3, 'listcolor', 'tambahdatacolor', 'editdatacolor', NULL, NULL, '', 1, 'collapseFour', 0),
(15, NULL, NULL, 3, 'Diagroup', 3, 'listdiagroup', 'tambahdatadiagroup', 'editdatadiagroup', NULL, NULL, '', 1, 'collapseFour', 0),
(16, NULL, NULL, 3, 'Diameter', 3, 'listdiameter', 'tambahdatadiameter', 'editdatadiameter', NULL, NULL, '', 1, 'collapseFour', 0),
(17, NULL, NULL, 3, 'Parcel', 3, 'listparcel', 'tambahdataparcel', 'editdataparcel', NULL, NULL, '', 1, 'collapseFour', 0),
(18, 1, 4, NULL, 'Material', 2, 'listmaterial', 'tambahdatamaterial', 'editdatamaterial', NULL, NULL, 'fas fa-fw fa-box', 1, NULL, 0),
(19, 1, 5, NULL, 'Kurs Material', 2, 'listkursmaterial', 'tambahdatakursmaterial', 'editdatakursmaterial', NULL, NULL, 'fas fa-fw fa-box', 1, NULL, 0),
(20, 1, 6, NULL, 'Lain-Lain', 2, '#', NULL, NULL, NULL, NULL, 'fas fa-fw fa-box', 2, '#collapseFive', 0),
(21, NULL, NULL, 6, 'Tipe Design', 3, 'listtipedesign', 'tambahdatatipedesign', 'editdatatipedesign', NULL, NULL, '', 1, 'collapseFive', 0),
(22, NULL, NULL, 6, 'Finishing', 3, 'listfinishing', 'tambahdatafinishing', 'editdatafinishing', NULL, NULL, '', 1, 'collapseFive', 0),
(23, NULL, NULL, 6, 'Warna Produk', 3, 'listwarnaproduk', 'tambahdatawarnaproduk', 'editdatawarnaproduk', NULL, NULL, '', 1, 'collapseFive', 0),
(24, NULL, NULL, 6, 'Konsep Kepala', 3, 'listkonsepkepala', 'tambahdatakonsepkepala', 'editdatakonsepkepala', NULL, NULL, '', 1, 'collapseFive', 0),
(25, NULL, NULL, 6, 'Ongkos Rangka', 3, 'listongkosrangka', 'tambahdataongkosrangka', 'editdataongkosrangka', NULL, NULL, '', 1, 'collapseFive', 0),
(26, 2, NULL, NULL, 'Mata Uang', 2, 'listmatauang', 'tambahdatamatauang', 'editdatamatauang', NULL, NULL, 'fas fa-fw fa-money-bill', 1, NULL, 0),
(27, 2, NULL, NULL, 'Kurs Mata Uang', 2, 'listkurs', 'tambahdatakurs', 'editdatakurs', NULL, NULL, 'fas fa-fw fa-money-bill', 1, NULL, 0),
(28, 3, NULL, NULL, 'Client', 2, 'listclient', 'tambahdataclient', 'editdataclient', 'detaildataclient', NULL, 'fa-solid fa-chalkboard-user', 1, NULL, 0),
(29, 4, NULL, NULL, 'Karyawan', 2, 'listkaryawan', 'tambahdatakaryawan', 'editdatakaryawan', 'detaildatakaryawan', NULL, 'fas fa-fw fa-address-card', 1, '', 0),
(30, 4, NULL, NULL, 'Bagian', 2, 'listbagian', 'tambahdatabagian', 'editdatabagian', NULL, NULL, 'fas fa-fw fa-book', 1, '', 0),
(31, 5, NULL, NULL, 'BSIS', 2, 'listbsis', 'tambahdatabsis', 'editdatabsis', NULL, NULL, 'fas fa-fw fa-file', 1, '', 0),
(32, 5, NULL, NULL, 'COA', 2, 'listcoa', 'tambahdatacoa', 'editdatacoa', NULL, NULL, 'fas fa-fw fa-file', 1, '', 0),
(33, 5, NULL, NULL, 'Cost Center', 2, 'listcostcenter', 'tambahdatacostcenter', 'editdatacostcenter', NULL, NULL, 'fas fa-fw fa-file', 1, NULL, 0),
(34, 5, NULL, NULL, 'Group Akun', 2, 'listgroupakun', 'tambahdatagroupakun', 'editdatagroupakun', NULL, NULL, 'fas fa-fw fa-file', 1, NULL, 0),
(35, 6, NULL, NULL, 'Cash Bank', 2, 'listcashbank', 'tambahdatacashbank', 'editdatacashbank', 'editdetailcashbank', 'detaildatacashbank', 'fas fa-fw fa-file', 1, NULL, 0),
(36, 7, NULL, NULL, '2D Design', 2, 'list2ddesain', 'tambahdata2ddesain', 'editdata2ddesain', 'editdetail2ddesain', 'detaildata2ddesain', 'fas fa-fw fa-file', 1, '', 0),
(48, NULL, NULL, NULL, 'Order/SPK', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, 48, NULL, NULL, 'Order/SPK', 2, 'listspk', 'tambahdataspk', 'editdataspk', 'editdetailspk', 'detaildataspk', 'fas fa-fw fa-file-invoice ', 1, '', 0),
(50, NULL, NULL, NULL, 'User', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(51, 50, NULL, NULL, 'User Management', 2, 'listuser', 'tambahdatauser', 'editdatauser', NULL, NULL, 'fa-solid fa-user-gear', 1, '', 0),
(52, NULL, NULL, NULL, 'Pengaturan', 1, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0),
(53, 52, NULL, NULL, 'Pengaturan', 2, 'pengaturan', 'tambahreference', NULL, NULL, NULL, 'fa-solid fa-gear', 1, NULL, 0),
(55, NULL, NULL, 6, 'Head Setting', 3, 'listheadsetting', 'tambahdataheadsetting', 'editdataheadsetting', NULL, NULL, '', 1, 'collapseFive', 0),
(56, NULL, NULL, 6, 'Ongkos Lainnya', 3, 'listongkoslainnya', 'tambahdataongkoslainnya', 'editdataongkoslainnya', NULL, NULL, '', 1, 'collapseFive', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warnaproduk`
--

CREATE TABLE `tbl_warnaproduk` (
  `id_warnaproduk` int(11) NOT NULL,
  `warnaproduk` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_warnaproduk`
--

INSERT INTO `tbl_warnaproduk` (`id_warnaproduk`, `warnaproduk`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'White Gold', 0, 'AnggaKP', '2022-07-14', 'AnggaKP', '2022-07-14'),
(4, 'Merah', 0, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-20'),
(5, 'Abu ABu', 1, 'Superadmin', '2022-09-02', 'Superadmin', '2022-09-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_2ddesaindetail`
--
ALTER TABLE `tbl_2ddesaindetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_2ddesainheader`
--
ALTER TABLE `tbl_2ddesainheader`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `tbl_2ddesainkepala`
--
ALTER TABLE `tbl_2ddesainkepala`
  ADD PRIMARY KEY (`id_subdetailkepala`);

--
-- Indexes for table `tbl_2ddesainsubdetail`
--
ALTER TABLE `tbl_2ddesainsubdetail`
  ADD PRIMARY KEY (`id_subdetail`);

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tbl_bsis`
--
ALTER TABLE `tbl_bsis`
  ADD PRIMARY KEY (`id_bsis`);

--
-- Indexes for table `tbl_cashbankdetail`
--
ALTER TABLE `tbl_cashbankdetail`
  ADD PRIMARY KEY (`id_cashbankdetail`);

--
-- Indexes for table `tbl_cashbankheader`
--
ALTER TABLE `tbl_cashbankheader`
  ADD PRIMARY KEY (`id_cashbankheader`);

--
-- Indexes for table `tbl_cashbanklawan`
--
ALTER TABLE `tbl_cashbanklawan`
  ADD PRIMARY KEY (`id_cashbanklawan`);

--
-- Indexes for table `tbl_clarity`
--
ALTER TABLE `tbl_clarity`
  ADD PRIMARY KEY (`id_clarity`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tbl_coa`
--
ALTER TABLE `tbl_coa`
  ADD PRIMARY KEY (`id_coa`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `tbl_costcenter`
--
ALTER TABLE `tbl_costcenter`
  ADD PRIMARY KEY (`id_costcenter`);

--
-- Indexes for table `tbl_detailbarang`
--
ALTER TABLE `tbl_detailbarang`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_detail_reference`
--
ALTER TABLE `tbl_detail_reference`
  ADD PRIMARY KEY (`id_reference`);

--
-- Indexes for table `tbl_diagroup`
--
ALTER TABLE `tbl_diagroup`
  ADD PRIMARY KEY (`id_diagroup`);

--
-- Indexes for table `tbl_diameter`
--
ALTER TABLE `tbl_diameter`
  ADD PRIMARY KEY (`id_diameter`);

--
-- Indexes for table `tbl_finishing`
--
ALTER TABLE `tbl_finishing`
  ADD PRIMARY KEY (`id_finishing`);

--
-- Indexes for table `tbl_groupakun`
--
ALTER TABLE `tbl_groupakun`
  ADD PRIMARY KEY (`id_groupakun`);

--
-- Indexes for table `tbl_header_reference`
--
ALTER TABLE `tbl_header_reference`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `tbl_headsetting`
--
ALTER TABLE `tbl_headsetting`
  ADD PRIMARY KEY (`id_headsetting`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_konsepkepala`
--
ALTER TABLE `tbl_konsepkepala`
  ADD PRIMARY KEY (`id_konsepkepala`);

--
-- Indexes for table `tbl_kurs`
--
ALTER TABLE `tbl_kurs`
  ADD PRIMARY KEY (`id_kurs`);

--
-- Indexes for table `tbl_kursmaterial`
--
ALTER TABLE `tbl_kursmaterial`
  ADD PRIMARY KEY (`id_kursmaterial`);

--
-- Indexes for table `tbl_masterid`
--
ALTER TABLE `tbl_masterid`
  ADD PRIMARY KEY (`id_masterid`);

--
-- Indexes for table `tbl_masterproduk`
--
ALTER TABLE `tbl_masterproduk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_matauang`
--
ALTER TABLE `tbl_matauang`
  ADD PRIMARY KEY (`id_matauang`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `tbl_ongkoslainnya`
--
ALTER TABLE `tbl_ongkoslainnya`
  ADD PRIMARY KEY (`id_ongkoslainnya`);

--
-- Indexes for table `tbl_ongkosrangka`
--
ALTER TABLE `tbl_ongkosrangka`
  ADD PRIMARY KEY (`id_ongkosrangka`);

--
-- Indexes for table `tbl_parcel`
--
ALTER TABLE `tbl_parcel`
  ADD PRIMARY KEY (`id_parcel`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shape`
--
ALTER TABLE `tbl_shape`
  ADD PRIMARY KEY (`id_shape`);

--
-- Indexes for table `tbl_spkdetail`
--
ALTER TABLE `tbl_spkdetail`
  ADD PRIMARY KEY (`id_spkdetail`);

--
-- Indexes for table `tbl_spkdiamonddetail`
--
ALTER TABLE `tbl_spkdiamonddetail`
  ADD PRIMARY KEY (`id_diamonddetail`);

--
-- Indexes for table `tbl_spkheaddetail`
--
ALTER TABLE `tbl_spkheaddetail`
  ADD PRIMARY KEY (`id_headdetail`);

--
-- Indexes for table `tbl_spkheader`
--
ALTER TABLE `tbl_spkheader`
  ADD PRIMARY KEY (`id_spkheader`);

--
-- Indexes for table `tbl_tipedesign`
--
ALTER TABLE `tbl_tipedesign`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_warnaproduk`
--
ALTER TABLE `tbl_warnaproduk`
  ADD PRIMARY KEY (`id_warnaproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_2ddesainheader`
--
ALTER TABLE `tbl_2ddesainheader`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2ddesainkepala`
--
ALTER TABLE `tbl_2ddesainkepala`
  MODIFY `id_subdetailkepala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_2ddesainsubdetail`
--
ALTER TABLE `tbl_2ddesainsubdetail`
  MODIFY `id_subdetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bsis`
--
ALTER TABLE `tbl_bsis`
  MODIFY `id_bsis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_cashbankdetail`
--
ALTER TABLE `tbl_cashbankdetail`
  MODIFY `id_cashbankdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cashbanklawan`
--
ALTER TABLE `tbl_cashbanklawan`
  MODIFY `id_cashbanklawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_clarity`
--
ALTER TABLE `tbl_clarity`
  MODIFY `id_clarity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_coa`
--
ALTER TABLE `tbl_coa`
  MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_costcenter`
--
ALTER TABLE `tbl_costcenter`
  MODIFY `id_costcenter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_detailbarang`
--
ALTER TABLE `tbl_detailbarang`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_detail_reference`
--
ALTER TABLE `tbl_detail_reference`
  MODIFY `id_reference` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_diagroup`
--
ALTER TABLE `tbl_diagroup`
  MODIFY `id_diagroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_diameter`
--
ALTER TABLE `tbl_diameter`
  MODIFY `id_diameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_finishing`
--
ALTER TABLE `tbl_finishing`
  MODIFY `id_finishing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_groupakun`
--
ALTER TABLE `tbl_groupakun`
  MODIFY `id_groupakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_headsetting`
--
ALTER TABLE `tbl_headsetting`
  MODIFY `id_headsetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_konsepkepala`
--
ALTER TABLE `tbl_konsepkepala`
  MODIFY `id_konsepkepala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kurs`
--
ALTER TABLE `tbl_kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_kursmaterial`
--
ALTER TABLE `tbl_kursmaterial`
  MODIFY `id_kursmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_masterid`
--
ALTER TABLE `tbl_masterid`
  MODIFY `id_masterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_masterproduk`
--
ALTER TABLE `tbl_masterproduk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_matauang`
--
ALTER TABLE `tbl_matauang`
  MODIFY `id_matauang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_ongkoslainnya`
--
ALTER TABLE `tbl_ongkoslainnya`
  MODIFY `id_ongkoslainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_ongkosrangka`
--
ALTER TABLE `tbl_ongkosrangka`
  MODIFY `id_ongkosrangka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tbl_parcel`
--
ALTER TABLE `tbl_parcel`
  MODIFY `id_parcel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_shape`
--
ALTER TABLE `tbl_shape`
  MODIFY `id_shape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_spkdetail`
--
ALTER TABLE `tbl_spkdetail`
  MODIFY `id_spkdetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_spkdiamonddetail`
--
ALTER TABLE `tbl_spkdiamonddetail`
  MODIFY `id_diamonddetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_spkheaddetail`
--
ALTER TABLE `tbl_spkheaddetail`
  MODIFY `id_headdetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tipedesign`
--
ALTER TABLE `tbl_tipedesign`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_warnaproduk`
--
ALTER TABLE `tbl_warnaproduk`
  MODIFY `id_warnaproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
