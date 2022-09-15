-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 10.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `tbl_bahanbaku`
--

CREATE TABLE `tbl_bahanbaku` (
  `id_bahanbaku` int(11) NOT NULL,
  `bahanbaku` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bahanbaku`
--

INSERT INTO `tbl_bahanbaku` (`id_bahanbaku`, `bahanbaku`, `satuan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Cairan Kimias', 'Meter', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_clarity`
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
-- Dumping data untuk tabel `tbl_clarity`
--

INSERT INTO `tbl_clarity` (`id_clarity`, `clarity`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'VVS2', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(4, 'VVS1', 0, 'AnggaKP', '2022-07-11', NULL, NULL),
(5, 'VVS3', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, 'VVS3', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'AS2', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(8, 'x', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, 'b', 1, 'AnggaKP', '2022-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_color`
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
-- Dumping data untuk tabel `tbl_color`
--

INSERT INTO `tbl_color` (`id_color`, `color`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 'G/H', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(3, 'D/E/F', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'G/H', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(5, 'D/E/F/H', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, 's', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(8, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(9, 'x', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(10, 'dsd12', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailbarang`
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
-- Dumping data untuk tabel `tbl_detailbarang`
--

INSERT INTO `tbl_detailbarang` (`id_detail`, `kode_jenis`, `kode_barang`, `samplesatu`, `sampledua`, `sampletiga`, `sampleempat`, `samplelima`, `sampleenam`) VALUES
(10, 'D00001', 'BRG-00001', 'contoh sample', 'Contoh sample dua', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diagroup`
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
-- Dumping data untuk tabel `tbl_diagroup`
--

INSERT INTO `tbl_diagroup` (`id_diagroup`, `diagroup`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(5, 'MELE', 0, 'AnggaKP', '2022-07-12', NULL, NULL),
(6, 'STAR', 0, 'AnggaKP', '2022-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_diameter`
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
-- Dumping data untuk tabel `tbl_diameter`
--

INSERT INTO `tbl_diameter` (`id_diameter`, `id_diagroup`, `diameter_from`, `diameter_to`, `carat`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(4, '5', '0,09', '0,11', '2', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(5, '6', '0,09', '0,11', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(6, '6', '0,10', '0,12', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(7, '5', '0,12', '0,15', '3', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(8, '5', '0,16', '0,17', '3', 0, 'AnggaKP', '2022-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gold`
--

CREATE TABLE `tbl_gold` (
  `id_gold` int(11) NOT NULL,
  `gold` varchar(50) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `deleted` int(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gold`
--

INSERT INTO `tbl_gold` (`id_gold`, `gold`, `satuan`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'White Gold 750', 'Gram', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lawantransaksi`
--

CREATE TABLE `tbl_lawantransaksi` (
  `id_lawantransaksi` int(11) NOT NULL,
  `costcenter` varchar(15) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matauang`
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
-- Dumping data untuk tabel `tbl_matauang`
--

INSERT INTO `tbl_matauang` (`id_matauang`, `kodematauang`, `namamatauang`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'USD', 'United State Dollar', 1, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_parcel`
--

CREATE TABLE `tbl_parcel` (
  `id_parcel` int(11) NOT NULL,
  `parcel` varchar(50) NOT NULL,
  `id_diameter` varchar(50) NOT NULL,
  `id_clarity` varchar(50) NOT NULL,
  `id_shape` varchar(50) NOT NULL,
  `id_color` varchar(50) NOT NULL,
  `deleted` varchar(1) NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_parcel`
--

INSERT INTO `tbl_parcel` (`id_parcel`, `parcel`, `id_diameter`, `id_clarity`, `id_shape`, `id_color`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(12, 'P01CA', '4', '4', '2', '3', '0', 'AnggaKP', '2022-07-12', NULL, NULL),
(13, 'P01CA', '7', '4', '3', '3', '0', 'AnggaKP', '2022-07-12', NULL, NULL),
(14, 'P01CA', '8', '4', '2', '3', '0', 'AnggaKP', '2022-07-12', NULL, NULL),
(15, 'C01CA', '4', '4', '3', '4', '0', 'AnggaKP', '2022-07-12', NULL, NULL),
(16, 'C01CA', '7', '4', '3', '3', '0', 'AnggaKP', '2022-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `id_jenisproduk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shape`
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
-- Dumping data untuk tabel `tbl_shape`
--

INSERT INTO `tbl_shape` (`id_shape`, `shape`, `deleted`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Marquise', 1, 'AnggaKP', '2022-07-11', 'AnggaKP', '2022-07-11'),
(2, 'Round', 0, 'AnggaKP', '2022-07-12', NULL, NULL),
(3, 'Marquise', 0, 'AnggaKP', '2022-07-12', 'AnggaKP', '2022-07-12'),
(4, 'Round1', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(5, 'a', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(6, 'c', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(7, 'z', 1, 'AnggaKP', '2022-07-12', NULL, NULL),
(8, 'ad', 1, 'AnggaKP', '2022-07-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
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
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `image`, `password`, `role_id`, `is_active`, `tanggal_daftar`) VALUES
(1, 'AnggaKP', 'anggakp', 'add.png', '$2y$10$zgQDm4gaA4JQFtwWDv3e5eN7CXV4uhSaP1b.Oj0fkwfpZz4ENzKfu', 1, 1, '2021-01-01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indeks untuk tabel `tbl_clarity`
--
ALTER TABLE `tbl_clarity`
  ADD PRIMARY KEY (`id_clarity`);

--
-- Indeks untuk tabel `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indeks untuk tabel `tbl_detailbarang`
--
ALTER TABLE `tbl_detailbarang`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tbl_diagroup`
--
ALTER TABLE `tbl_diagroup`
  ADD PRIMARY KEY (`id_diagroup`);

--
-- Indeks untuk tabel `tbl_diameter`
--
ALTER TABLE `tbl_diameter`
  ADD PRIMARY KEY (`id_diameter`);

--
-- Indeks untuk tabel `tbl_gold`
--
ALTER TABLE `tbl_gold`
  ADD PRIMARY KEY (`id_gold`);

--
-- Indeks untuk tabel `tbl_lawantransaksi`
--
ALTER TABLE `tbl_lawantransaksi`
  ADD PRIMARY KEY (`id_lawantransaksi`);

--
-- Indeks untuk tabel `tbl_matauang`
--
ALTER TABLE `tbl_matauang`
  ADD PRIMARY KEY (`id_matauang`);

--
-- Indeks untuk tabel `tbl_parcel`
--
ALTER TABLE `tbl_parcel`
  ADD PRIMARY KEY (`id_parcel`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_shape`
--
ALTER TABLE `tbl_shape`
  ADD PRIMARY KEY (`id_shape`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_clarity`
--
ALTER TABLE `tbl_clarity`
  MODIFY `id_clarity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_detailbarang`
--
ALTER TABLE `tbl_detailbarang`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_diagroup`
--
ALTER TABLE `tbl_diagroup`
  MODIFY `id_diagroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_diameter`
--
ALTER TABLE `tbl_diameter`
  MODIFY `id_diameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_gold`
--
ALTER TABLE `tbl_gold`
  MODIFY `id_gold` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_lawantransaksi`
--
ALTER TABLE `tbl_lawantransaksi`
  MODIFY `id_lawantransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_matauang`
--
ALTER TABLE `tbl_matauang`
  MODIFY `id_matauang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_parcel`
--
ALTER TABLE `tbl_parcel`
  MODIFY `id_parcel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_shape`
--
ALTER TABLE `tbl_shape`
  MODIFY `id_shape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
