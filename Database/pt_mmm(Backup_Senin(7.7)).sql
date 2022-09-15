-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 04:50 AM
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
  `id_ongkos` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
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
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_2ddesaindetail`
--

INSERT INTO `tbl_2ddesaindetail` (`id_detail`, `id_header`, `model`, `submodel`, `id_tipe`, `id_warna`, `id_material`, `beratmaterial`, `ukuran`, `id_finishing`, `id_konsepkepala`, `id_ongkos`, `gender`, `hargamaterial`, `hargadiamond`, `hargakepala`, `ongkos`, `totalharga`, `totaljumlah`, `totalberat`, `jsfinishing`, `jspolesrangka`, `jspasangbatu`, `jsrakit`, `jspoleschrome`, `approvedjs`, `approveddate`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `video1`, `video2`, `video3`, `deleted`) VALUES
(1, '1', 'SMPLEWRSET3_F4M', '131', '5', '4', '7', 2.1, 26.5, '5', '1', '2', 'Pria', 1800000, 950000, 420000, 55000, 3225000, 6, 0.5, 0.0032, 0.0032, 0.0032, 0.0032, 0.0032, '', '0000-00-00', '5d9950b074e4032b70539346f7ca6436.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 1),
(2, '1', 'SMPLEWRSET3_F41', '123', '5', '4', '8', 1.5, 26.5, '5', '1', '1', 'Pria', 1350000, 4000000, 700000, 50000, 6100000, 1, 2, 0.003, 0.003, 0.003, 0.003, 0.003, '', '0000-00-00', 'f56ae5e1226cc3684156e9c2a37b9e0e.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 0),
(3, '1', 'SMPLEWRSET3_F45', '543', '5', '4', '8', 0.5, 27.5, '5', '1', '2', 'Pria', 1800000, 4250000, 735000, 55000, 5940000, 2, 2.5, 0.0004, 0.0004, 0.0004, 0.0004, 0.0004, '', '0000-00-00', '13d812a09744b7077ff3671b602400e0.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 0),
(4, '2', '064007', '123', '5', '4', '7', 1.65, 30.6, '5', '1', '2', 'Pria', 1940400, 1600000, 595000, 55000, 4190400, 2, 0.8, 1.005, 1.005, 1.005, 1.005, 1.005, '', '0000-00-00', '149a829722843af28270a1cd706630e5.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 0),
(5, '2', '12345675', '001', '5', '4', '8', 4, 27.5, '5', '1', '2', 'Pria', 3600000, 1000000, 896000, 55000, 5551000, 3, 0.5, 1.5, 1.5, 1.5, 1.5, 1.5, '', '0000-00-00', 'd01b8317c0d4bbbada10c7ec24828cbe.jpg', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 'Tidak Ada File', 1);

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

--
-- Dumping data for table `tbl_2ddesainheader`
--

INSERT INTO `tbl_2ddesainheader` (`id_header`, `nomor`, `tanggal`, `id_karyawan`, `id_client`, `memo`, `tipedesain`, `disetujui_1`, `date_1`, `disetujui_2`, `date_2`, `disetujui_3`, `date_3`, `disetujui_4`, `date_4`, `disetujui_5`, `date_5`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '00001', '2022-08-19', '8', '3', '                                                                                                                                                                                                                                                                                                                                                                        <ul data-testid=\"lblPDPInfoProduk\" class=\"css-1ijyj3z eytdjj02\" style=\"box-sizing: inherit; display: flex; flex-flow: column wrap; height: 96px; margin-bottom: -4px; padding: 0px;\" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; line-height: 20px;\"><font color=\"#040054\"><span style=\"white-space: nowrap;\">&lt;?php echo $this-&gt;lang-&gt;line(\'productmaster\')?&gt;</span></font><br></li></ul>                                                                                                                                                                                                                                                                                                                                                      ', 'Client Order', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-19'),
(2, '00002', '2022-08-14', '7', '', '                                                                                                                        <ul data-testid=\"lblPDPInfoProduk\" class=\"css-1ijyj3z eytdjj02\" style=\"box-sizing: inherit; display: flex; flex-flow: column wrap; height: 96px; margin-bottom: -4px; padding: 0px; color: rgba(0, 0, 0, 0.54); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kondisi: Lama</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Berat Satuan: </span><span class=\"main\" style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.96));\">650 g</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kategori: </span><a href=\"https://www.tokopedia.com/p/elektronik/audio/headphone\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Headphone</span></a></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Etalase: </span><a href=\"https://www.tokopedia.com/usamsidofficial/etalase/tws\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">TWS</span></a></li></ul><div class=\"css-1k1relq\" style=\"box-sizing: inherit; margin-top: 12px; font-size: 14px; line-height: 20px; color: var(--N700,rgba(49,53,59,0.96)); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;\"=\"\"><span class=\"css-11oczh8 eytdjj00\" style=\"box-sizing: inherit; display: contents; overflow: hidden; max-height: 160px;\"><span class=\"css-168ydy0 eytdjj01\" style=\"box-sizing: inherit; display: -webkit-box; -webkit-line-clamp: unset; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow: hidden; word-break: break-word;\"><div data-testid=\"lblPDPDescriptionProduk\" style=\"box-sizing: inherit;\">USAMS YN001 WIRELESS NOISE CANCELLING/HEADPHONE BT<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">*KEMASAN PRODUK AKAN KAMI BUKA UNTUK DI QC*<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">SPESIFIKASI<br style=\"box-sizing: inherit;\">Model : US-YN001<br style=\"box-sizing: inherit;\">Warna : Balck<br style=\"box-sizing: inherit;\">BT Version : 4.2<br style=\"box-sizing: inherit;\">Connection Distance : ≤10m<br style=\"box-sizing: inherit;\">Impedance : 32Ω<br style=\"box-sizing: inherit;\">Speaker Diamete r: 40mm<br style=\"box-sizing: inherit;\">Speaker Sensitivity : 121dB±3<br style=\"box-sizing: inherit;\">Frequency Range：50Hz~50KHz<br style=\"box-sizing: inherit;\">Battery Capacity : 250mAh<br style=\"box-sizing: inherit;\">Playing Time : About 10h<br style=\"box-sizing: inherit;\">Charging Time : About 2h<br style=\"box-sizing: inherit;\">Stand-by Time : About 3 months<br style=\"box-sizing: inherit;\">Berat : About 200g<br style=\"box-sizing: inherit;\">Compatibility : For Android/ Apple devices with BT function<br style=\"box-sizing: inherit;\">Aksesories : 1*Kabel charge micro , 1* Kabel audio<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">FITUR :<br style=\"box-sizing: inherit;\">1. 40mm speaker, powerful 3D surround sound.<br style=\"box-sizing: inherit;\">2. Fully enclosed noise cancellation, make calls clear.<br style=\"box-sizing: inherit;\">3. Independent button control, easy function switching.<br style=\"box-sizing: inherit;\">4. Soft and comfortable caps, light and adjustable arm.<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">*WAJIB MENYERTAKAN VIDEO UNBOXING PAKET DAN HUBUNGI CUSTOMER SERVICE KAMI UNTUK MENGKLAIM GARANSI ATAU PRODUK YANG TIDAK LENGKAP*<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">GARANSI PRODUK 12 BULAN<br style=\"box-sizing: inherit;\">PRODUK USAMS ORIGINAL 100%</div></span></span></div>                                                                                                                  ', 'New Design', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-18'),
(3, '00003', '2022-08-18', '6', '', '                                                                                                                        <ul data-testid=\"lblPDPInfoProduk\" class=\"css-1ijyj3z eytdjj02\" style=\"box-sizing: inherit; display: flex; flex-flow: column wrap; height: 96px; margin-bottom: -4px; padding: 0px; color: rgba(0, 0, 0, 0.54); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kondisi: Lama</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Berat Satuan: </span><span class=\"main\" style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.96));\">650 g</span></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Kategori: </span><a href=\"https://www.tokopedia.com/p/elektronik/audio/headphone\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">Headphone</span></a></li><li class=\"css-1dmo88g\" style=\"box-sizing: inherit; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; margin: 0px 12px 4px 0px; padding: 0px; list-style-type: none; color: var(--N700,rgba(49,53,59,0.96)); font-size: 1rem; line-height: 20px;\"><span style=\"box-sizing: inherit; color: var(--N700,rgba(49,53,59,0.68));\">Etalase: </span><a href=\"https://www.tokopedia.com/usamsidofficial/etalase/tws\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"box-sizing: inherit; color: var(--G500,#03AC0E);\"><span style=\"box-sizing: inherit; font-weight: bolder;\">TWS</span></a></li></ul><div class=\"css-1k1relq\" style=\"box-sizing: inherit; margin-top: 12px; font-size: 14px; line-height: 20px; color: var(--N700,rgba(49,53,59,0.96)); font-family: \" open=\"\" sauce=\"\" one\",=\"\" sans-serif;\"=\"\"><span class=\"css-11oczh8 eytdjj00\" style=\"box-sizing: inherit; display: contents; overflow: hidden; max-height: 160px;\"><span class=\"css-168ydy0 eytdjj01\" style=\"box-sizing: inherit; display: -webkit-box; -webkit-line-clamp: unset; -webkit-box-orient: vertical; text-overflow: ellipsis; overflow: hidden; word-break: break-word;\"><div data-testid=\"lblPDPDescriptionProduk\" style=\"box-sizing: inherit;\">USAMS YN001 WIRELESS NOISE CANCELLING/HEADPHONE BT<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">*KEMASAN PRODUK AKAN KAMI BUKA UNTUK DI QC*<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">SPESIFIKASI<br style=\"box-sizing: inherit;\">Model : US-YN001<br style=\"box-sizing: inherit;\">Warna : Balck<br style=\"box-sizing: inherit;\">BT Version : 4.2<br style=\"box-sizing: inherit;\">Connection Distance : ≤10m<br style=\"box-sizing: inherit;\">Impedance : 32Ω<br style=\"box-sizing: inherit;\">Speaker Diamete r: 40mm<br style=\"box-sizing: inherit;\">Speaker Sensitivity : 121dB±3<br style=\"box-sizing: inherit;\">Frequency Range：50Hz~50KHz<br style=\"box-sizing: inherit;\">Battery Capacity : 250mAh<br style=\"box-sizing: inherit;\">Playing Time : About 10h<br style=\"box-sizing: inherit;\">Charging Time : About 2h<br style=\"box-sizing: inherit;\">Stand-by Time : About 3 months<br style=\"box-sizing: inherit;\">Berat : About 200g<br style=\"box-sizing: inherit;\">Compatibility : For Android/ Apple devices with BT function<br style=\"box-sizing: inherit;\">Aksesories : 1*Kabel charge micro , 1* Kabel audio<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">FITUR :<br style=\"box-sizing: inherit;\">1. 40mm speaker, powerful 3D surround sound.<br style=\"box-sizing: inherit;\">2. Fully enclosed noise cancellation, make calls clear.<br style=\"box-sizing: inherit;\">3. Independent button control, easy function switching.<br style=\"box-sizing: inherit;\">4. Soft and comfortable caps, light and adjustable arm.<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">*WAJIB MENYERTAKAN VIDEO UNBOXING PAKET DAN HUBUNGI CUSTOMER SERVICE KAMI UNTUK MENGKLAIM GARANSI ATAU PRODUK YANG TIDAK LENGKAP*<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">GARANSI PRODUK 12 BULAN<br style=\"box-sizing: inherit;\">PRODUK USAMS ORIGINAL 100%</div></span></span></div>                                                                                                                  ', 'New Design', NULL, NULL, '', NULL, NULL, NULL, '1', NULL, NULL, NULL, 0, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-18');

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
  `deleted` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_2ddesainkepala`
--

INSERT INTO `tbl_2ddesainkepala` (`id_subdetailkepala`, `id_detail`, `id_barang`, `jumlah`, `harga`, `id_user`, `deleted`) VALUES
(6, 1, '1', '1.2', 350000, '1', '1'),
(7, 2, '1', '2', 350000, '1', '0'),
(8, 3, '1', '2.1', 350000, '1', '0'),
(9, 4, '1', '1.7', 350000, '1', '0'),
(10, 5, '1', '2.56', 350000, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_2ddesainsubdetail`
--

CREATE TABLE `tbl_2ddesainsubdetail` (
  `id_subdetail` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_parcel` varchar(50) NOT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `berat` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `deleted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_2ddesainsubdetail`
--

INSERT INTO `tbl_2ddesainsubdetail` (`id_subdetail`, `id_detail`, `id_parcel`, `jumlah`, `berat`, `harga`, `id_user`, `deleted`) VALUES
(5, 1, '16', '1', '0.4', 2000000, '1', '1'),
(6, 1, '13', '5', '0.1', 1500000, '1', '1'),
(7, 2, '16', '1', '2', 2000000, '1', '0'),
(8, 3, '16', '1', '1', 2000000, '1', '0'),
(9, 3, '13', '1', '1.5', 1500000, '1', '0'),
(11, 4, '12', '1', '0.3', 2000000, '1', '0'),
(12, 4, '16', '1', '0.5', 2000000, '1', '0'),
(13, 5, '12', '1', '0.2', 2000000, '1', '1'),
(14, 5, '16', '2', '0.3', 2000000, '1', '1');

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
(8, 'BOD', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00');

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
(10, 'ca', 'C', 'N', 'B', '12', 0, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbankdetail`
--

CREATE TABLE `tbl_cashbankdetail` (
  `id_cashbankdetail` int(11) NOT NULL,
  `id_cashbankheader` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
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
(1, '1', '00001', '100,01', '12.000', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
(2, '0', '2', '100,02', '21.111', 'KAS BESAR', 1, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
(3, '2', '00002', '100,01', '11.458', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(4, '3', '00003', '100,02', '11.547', 'KAS BESAR', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(5, '4', '00004', '100,02', '12.755', 'KAS BESAR', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
(6, '0', '2', '100,02', '22222', 'KAS BESAR', 1, 'AnggaKP', '2022-08-08', 'AnggaKP', '2022-08-16'),
(7, '0', '2', '100,02', '2', 'KAS BESAR', 1, 'AnggaKP', '2022-08-16', '', '0000-00-00');

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

--
-- Dumping data for table `tbl_cashbankheader`
--

INSERT INTO `tbl_cashbankheader` (`id_cashbankheader`, `id_matauang`, `inout`, `nomor`, `tanggal`, `typetransaksi`, `rate`, `subaccount`, `total`, `memo`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
('1', '4', 'I', '00001', '2022-07-22', 'Reguler', '1.00', '1234567891', '24 ', '', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
('2', '4', 'I', '00002', '2022-07-22', 'Reguler', '1.00', '1234567891', '22.916 ', '', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
('3', '4', 'I', '00003', '2022-07-22', 'Reguler', '1.00', '1234567891', '23.094 ', '', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
('4', '4', 'I', '00004', '2022-07-22', 'Reguler', '1.00', '1234567891', '25.51 ', '', 0, 'AnggaKP', '2022-07-22', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashbanklawan`
--

CREATE TABLE `tbl_cashbanklawan` (
  `id_cashbanklawan` int(11) NOT NULL,
  `id_cashbankheader` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cashbanklawan`
--

INSERT INTO `tbl_cashbanklawan` (`id_cashbanklawan`, `id_cashbankheader`, `nomor`, `akun`, `nilai`, `keterangan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, '1', '00001', '100,01', '12.000', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(2, '0', '2', '100,01', '23.222', 'KAS KECIL ', 1, 'AnggaKP', '2022-07-22', '', '0000-00-00'),
(3, '2', '00002', '100,01', '11.458', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(4, '3', '00003', '100,01', '11.547', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(5, '4', '00004', '100,01', '12.755', 'KAS KECIL ', 0, 'AnggaKP', '2022-07-22', 'AnggaKP', '2022-07-22'),
(6, '0', '2', '100,02', '1000', 'KAS BESAR', 1, 'AnggaKP', '2022-07-29', '', '0000-00-00');

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
(15, 'contohs', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15');

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
(5, 'a', 'Angga', 'yogyakarta', 'ciamis', 'jawa barat', '46212', '055861085294', 'angga', 'putraangga2810@gmail.com', '45613', 1, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16');

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
(95, NULL, 1, '10', '2', 'KAS - BANK ', 'H', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(96, NULL, 1, '100', '3', 'KAS', 'H', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(97, '3', 1, '100,01', '4', 'KAS KECIL ', 'D', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-07-15'),
(98, '3', 1, '100,02', '4', 'KAS BESAR', 'D', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(99, '3', 1, '100,03', '4', 'contoh', 'D', 0, 'AnggaKP', '2022-07-20', '', '0000-00-00'),
(100, '', 2, '20', '2', 'contoh', 'H', 0, 'AnggaKP', '2022-07-20', '', '0000-00-00'),
(101, NULL, 12, '12', '1', 'ca', 'H', 0, 'AnggaKP', '2022-08-16', '', '0000-00-00');

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
(13, 'kuning', 0, 'AnggaKP', '2022-08-15', NULL, NULL);

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
(10, '12', 'Angga', 0, 'AnggaKP', '2022-07-13', '', '0000-00-00');

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
(13, 's', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15');

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
(9, '5', '1', '2', '2', 1, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15');

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
(5, 'contoh', 0, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-08-19');

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
(3, 'CASH BANK', 'Kas Kecil', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-07-15');

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
(8, '5', '123456', 13123123, 'Ibnu', 'Bekasi', 'Bekasi', 'Jawa Barat', '462111', '0857123131413141', 'Ibnu', 'ibnu@gmail.com', '123131', '2022-08-17', 0, 'Quality Management', '2022-08-09', 'Quality Management', '2022-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsepkepala`
--

CREATE TABLE `tbl_konsepkepala` (
  `id_konsepkepala` int(11) NOT NULL,
  `konsepkepala` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_konsepkepala`
--

INSERT INTO `tbl_konsepkepala` (`id_konsepkepala`, `konsepkepala`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Contoh saja', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(2, 'Ini contoh yaa', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurs`
--

CREATE TABLE `tbl_kurs` (
  `id_kurs` int(11) NOT NULL,
  `id_matauang` varchar(50) NOT NULL,
  `rate` int(11) NOT NULL,
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
(12, '3', 15000, '2022-07-18 09:42:01', 0, 'AnggaKP', '2022-07-18', '', '0000-00-00'),
(13, '5', 15000, '2022-07-29 11:37:41', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(14, '6', 123, '2022-08-08 11:51:28', 1, 'AnggaKP', '2022-08-08', 'AnggaKP', '2022-08-16');

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
(14, '7', 1500000, '2022-08-04 16:23:00', 0, 'AnggaKP', '2022-08-12', '', '0000-00-00');

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
(59, 'contoh', 'oke', '1', 'AnggaKP', '2022-08-19', '', '0000-00-00');

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
  `deskripsiproduk` varchar(3000) NOT NULL,
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
(1, '1', 0, 'AnggaKP', '2022-08-04', 'AnggaKP', '2022-08-04', '003', '005', 'ini produk contoh', 'contoh saja yaa   ', '7', '12', '16', '18', '25', '30', '32', '20', '30', '30', '30', '36', '37', '20', '5', '350000', '250000', 0, 0, '', '', '', '659560d5decc0b9ee3f1800308462eeb.jpeg', 'Planet9_Wallpaper_5000x2813.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matauang`
--

CREATE TABLE `tbl_matauang` (
  `id_matauang` int(11) NOT NULL,
  `kodematauang` varchar(50) NOT NULL,
  `namamatauang` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_matauang`
--

INSERT INTO `tbl_matauang` (`id_matauang`, `kodematauang`, `namamatauang`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'USD', 'United State Dollar', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'IDR', 'Indonesia Rupiah', 0, 'AnggaKP', '2022-07-15', 'AnggaKP', '2022-08-19'),
(5, 'SGD', 'Singapore Dollar', 0, 'AnggaKP', '2022-07-15', '', '0000-00-00'),
(6, 'f', 'a', 1, 'AnggaKP', '2022-08-16', 'AnggaKP', '2022-08-16');

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
(12, 'WhiteGold', 'Kg', 1, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ongkos`
--

CREATE TABLE `tbl_ongkos` (
  `id_ongkos` int(11) NOT NULL,
  `ongkos` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ongkos`
--

INSERT INTO `tbl_ongkos` (`id_ongkos`, `ongkos`, `harga`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'ongkos sample', '50000', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00'),
(2, 'fee', '55000', 0, 'AnggaKP', '2022-07-29', '', '0000-00-00');

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
  `hargabeli` varchar(50) NOT NULL,
  `hargajual` varchar(50) NOT NULL,
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
(12, 'P01CA', '4', '4', '2', '3', '2000000', '2500000', '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(13, 'P01CA', '7', '4', '2', '3', '1500000', '1800000', '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(14, 'P01CA', '8', '4', '2', '3', '4000000', '3500000', '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(15, 'C01CA', '4', '4', '3', '4', '4500000', '5000000', '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02'),
(16, 'C01CA', '7', '4', '3', '3', '2000000', '3000000', '0', 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-08-02');

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
(2, 'Admin');

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
(9, 'fass', 0, 'AnggaKP', '2022-08-15', 'AnggaKP', '2022-08-15');

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
(4, 'Wedding', 0, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-08-03'),
(5, 'Bangle', 0, 'AnggaKP', '2022-08-03', '', '0000-00-00'),
(6, 'Contoh', 1, 'AnggaKP', '2022-08-03', '', '0000-00-00');

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
(2, 'Admin', 'admin', 'default.png', '$2y$10$p/V0ClrNLzaWnvywodsHdOZGeGAH64ZTq/Hrvuoojt58ZrGjCBVCG', 2, 1, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_access_menu`
--

INSERT INTO `tbl_user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 2, 1),
(17, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Master Produk'),
(3, 'Master Mata Uang'),
(4, 'Master Client'),
(5, 'Master Karyawan'),
(6, 'BSIS'),
(7, 'Cash Bank'),
(8, '2D Design');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_menu`
--

CREATE TABLE `tbl_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `url_1` varchar(128) NOT NULL,
  `url_2` varchar(128) NOT NULL,
  `url_3` varchar(128) NOT NULL,
  `url_4` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `jenis` int(1) NOT NULL,
  `target` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_sub_menu`
--

INSERT INTO `tbl_user_sub_menu` (`id`, `menu_id`, `title`, `url`, `url_1`, `url_2`, `url_3`, `url_4`, `icon`, `jenis`, `target`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', '', '', '', '', 'fas fa-fw fa-tachometer-alt', 1, '', 1),
(2, 2, 'Master Produk', '#', '', '', '', '', 'fas fa-fw fa-box', 2, '#collapseTen', 1),
(3, 2, 'Diamond', '#', '', '', '', '', 'fas fa-fw fa-box', 2, '#collapseFour', 1),
(4, 2, 'Material', 'listmaterial', 'tambahdatamaterial', 'editdatamaterial', '', '', 'fas fa-fw fa-box', 1, '', 1),
(6, 2, 'Kurs Material', 'listkursmaterial', 'tambahdatakursmaterial', 'editdatakursmaterial', '', '', 'fas fa-fw fa-box', 1, '', 1),
(7, 2, 'Lain-Lain', '#', '', '', '', '', 'fas fa-fw fa-box', 2, '#collapseFive', 1),
(8, 3, 'Mata Uang', 'listmatauang', 'tambahdatamatauang', 'editdatamatauang', '', '', 'fas fa-fw fa-money-bill', 1, '', 1),
(9, 3, 'Kurs Mata Uang', 'listkurs', 'tambahdatakurs', 'editdatakurs', '', '', 'fas fa-fw fa-money-bill', 1, '', 1),
(10, 4, 'Client', 'listclient', 'tambahdataclient', 'editdataclient', 'detaildataclient', '', 'fa-solid fa-chalkboard-user', 1, '', 1),
(12, 5, 'Karyawan', 'listkaryawan', 'tambahdatakaryawan', 'editdatakaryawan', 'detaildatakaryawan', '', 'fas fa-fw fa-address-card', 1, '', 1),
(13, 5, 'Bagian', 'listbagian', 'tambahdatabagian', 'editdatabagian', '', '', 'fas fa-fw fa-book', 1, '', 1),
(14, 6, 'BSIS', 'listbsis', 'tambahdatabsis', 'editdatabsis', '', '', 'fas fa-fw fa-file', 1, '', 1),
(15, 6, 'COA', 'listcoa', 'tambahdatacoa', 'editdatacoa', '', '', 'fas fa-fw fa-file', 1, '', 1),
(16, 6, 'Cost Center', 'listcostcenter', 'tambahdatacostcenter', 'editdatacostcenter', '', '', 'fas fa-fw fa-file', 1, '', 1),
(17, 6, 'Group Akun', 'listgroupakun', 'tambahdatagroupakun', 'editdatagroupakun', '', '', 'fas fa-fw fa-file', 1, '', 1),
(18, 7, 'Cash Bank', 'listcashbank', 'tambahdatacashbank', 'editdatacashbank', 'editdetailcashbank', 'detaildatacashbank', 'fas fa-fw fa-file', 1, '', 1),
(19, 8, '2D Design', 'list2ddesain', 'tambahdata2ddesain', 'editdata2ddesain', 'editdetail2ddesain', 'detaildata2ddesain', 'fas fa-fw fa-file', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_sub_menu`
--

CREATE TABLE `tbl_user_sub_sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `url_1` varchar(128) NOT NULL,
  `url_2` varchar(128) NOT NULL,
  `target` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_sub_sub_menu`
--

INSERT INTO `tbl_user_sub_sub_menu` (`id`, `sub_menu_id`, `title`, `url`, `url_1`, `url_2`, `target`, `is_active`) VALUES
(1, 2, 'Produk', 'listproduk', 'tambahdataproduk', 'editdataproduk', 'collapseTen', 1),
(2, 2, 'MasterID', 'listmasterid', 'tambahdatamasterid', 'editdatamasterid', 'collapseTen', 1),
(3, 3, 'Clarity', 'listclarity', 'tambahdataclarity', 'editdataclarity', 'collapseFour', 1),
(4, 3, 'Shape', 'listshape', 'tambahdatashape', 'editdatashape', 'collapseFour', 1),
(5, 3, 'Warna', 'listcolor', 'tambahdatacolor', 'editdatacolor', 'collapseFour', 1),
(6, 3, 'Diagroup', 'listdiagroup', 'tambahdatadiagroup', 'editdatadiagroup', 'collapseFour', 1),
(7, 3, 'Diameter', 'listdiameter', 'tambahdatadiameter', 'editdatadiameter', 'collapseFour', 1),
(8, 3, 'Parcel', 'listparcel', 'tambahdataparcel', 'editdataparcel', 'collapseFour', 1),
(9, 7, 'Tipe Design', 'listtipedesign', 'tambahdatatipedesign', 'editdatatipedesign', 'collapseFive', 1),
(10, 7, 'Finishing', 'listfinishing', 'tambahdatafinishing', 'editdatafinishing', 'collapseFive', 1),
(11, 7, 'Warna Produk', 'listwarnaproduk', 'tambahdatawarnaproduk', 'editdatawarnaproduk', 'collapseFive', 1),
(12, 7, 'Konsep Kepala', 'listkonsepkepala', 'tambahdatakonsepkepala', 'editdatakonsepkepala', 'collapseFive', 1),
(13, 7, 'Ongkos', 'listongkos', 'tambahdataongkos', 'editdataongkos', 'collapseFive', 1);

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
(4, 'Merah', 0, 'AnggaKP', '2022-07-20', 'AnggaKP', '2022-07-20');

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
-- Indexes for table `tbl_ongkos`
--
ALTER TABLE `tbl_ongkos`
  ADD PRIMARY KEY (`id_ongkos`);

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
-- Indexes for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_sub_sub_menu`
--
ALTER TABLE `tbl_user_sub_sub_menu`
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
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_2ddesainkepala`
--
ALTER TABLE `tbl_2ddesainkepala`
  MODIFY `id_subdetailkepala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_2ddesainsubdetail`
--
ALTER TABLE `tbl_2ddesainsubdetail`
  MODIFY `id_subdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bsis`
--
ALTER TABLE `tbl_bsis`
  MODIFY `id_bsis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cashbankdetail`
--
ALTER TABLE `tbl_cashbankdetail`
  MODIFY `id_cashbankdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cashbanklawan`
--
ALTER TABLE `tbl_cashbanklawan`
  MODIFY `id_cashbanklawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_clarity`
--
ALTER TABLE `tbl_clarity`
  MODIFY `id_clarity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_coa`
--
ALTER TABLE `tbl_coa`
  MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_costcenter`
--
ALTER TABLE `tbl_costcenter`
  MODIFY `id_costcenter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_detailbarang`
--
ALTER TABLE `tbl_detailbarang`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_diagroup`
--
ALTER TABLE `tbl_diagroup`
  MODIFY `id_diagroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_diameter`
--
ALTER TABLE `tbl_diameter`
  MODIFY `id_diameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_finishing`
--
ALTER TABLE `tbl_finishing`
  MODIFY `id_finishing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_groupakun`
--
ALTER TABLE `tbl_groupakun`
  MODIFY `id_groupakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_konsepkepala`
--
ALTER TABLE `tbl_konsepkepala`
  MODIFY `id_konsepkepala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kurs`
--
ALTER TABLE `tbl_kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kursmaterial`
--
ALTER TABLE `tbl_kursmaterial`
  MODIFY `id_kursmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_masterid`
--
ALTER TABLE `tbl_masterid`
  MODIFY `id_masterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_masterproduk`
--
ALTER TABLE `tbl_masterproduk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_matauang`
--
ALTER TABLE `tbl_matauang`
  MODIFY `id_matauang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_ongkos`
--
ALTER TABLE `tbl_ongkos`
  MODIFY `id_ongkos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_parcel`
--
ALTER TABLE `tbl_parcel`
  MODIFY `id_parcel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_shape`
--
ALTER TABLE `tbl_shape`
  MODIFY `id_shape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_tipedesign`
--
ALTER TABLE `tbl_tipedesign`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_sub_sub_menu`
--
ALTER TABLE `tbl_user_sub_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_warnaproduk`
--
ALTER TABLE `tbl_warnaproduk`
  MODIFY `id_warnaproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
