-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 08.36
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecasting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode` varchar(10) NOT NULL,
  `nm_barang` varchar(40) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode`, `nm_barang`, `harga`, `id_unit`, `id_supplier`) VALUES
('24002040', 'Monoaxial Pedicle Screw 4.5×30', 30000, 1, 2),
('NMSMA4530', 'NORMMED Monoaxial Screw 4.5x30mm + Set S', 55000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id_order` varchar(10) NOT NULL,
  `id_request` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `approval` varchar(40) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `tanggal_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_order`, `id_request`, `harga_total`, `approval`, `status_order`, `tanggal_order`) VALUES
('ADH5209', 31, 4500000, 'Manager', 'completed', '2020-11-01'),
('ANB1708', 13, 30965000, 'Manager', 'completed', '2020-07-31'),
('APN2034', 30, 900000, 'Manager', 'completed', '2020-10-07'),
('EEG4087', 1, 30965000, 'Manager', 'completed', '2020-01-02'),
('FFV2497', 11, 4785000, 'Manager', 'completed', '2020-06-29'),
('LXW2835', 4, 7500000, 'Manager', 'completed', '2020-01-02'),
('MAP0428', 12, 4230000, 'Manager', 'completed', '2020-06-29'),
('MYI8015', 3, 16500000, 'Manager', 'completed', '2020-03-02'),
('NFC3968', 35, 11000000, 'Manager', 'completed', '2020-11-02'),
('QJO9637', 34, 5460000, 'Manager', 'completed', '2020-11-30'),
('QNI3751', 10, 12000000, 'Manager', 'completed', '2020-05-30'),
('QNV6824', 7, 27500000, 'Manager', 'completed', '2020-04-30'),
('RPV5891', 36, 11000000, 'Manager', 'completed', '2020-11-20'),
('SCE1798', 5, 27500000, 'Manager', 'completed', '2020-04-01'),
('TAO9351', 29, 13915000, 'Manager', 'completed', '2020-10-01'),
('TCO9405', 14, 16890000, 'Manager', 'completed', '2020-07-31'),
('UKG7194', 33, 12155000, 'Manager', 'completed', '2020-11-30'),
('VKB7402', 8, 9000000, 'Manager', 'completed', '2020-04-30'),
('WEU2305', 6, 15000000, 'Manager', 'completed', '2020-04-01'),
('WVU0374', 32, 7425000, 'Manager', 'completed', '2020-11-01'),
('XTM6104', 2, 15300000, 'Manager', 'completed', '2020-03-02'),
('ZFI2045', 9, 22000000, 'Manager', 'completed', '2020-05-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `id_order` varchar(10) NOT NULL,
  `qty_awal` decimal(5,2) NOT NULL,
  `qty_masuk` decimal(5,2) NOT NULL,
  `minus` decimal(5,2) NOT NULL,
  `keterangan` text NOT NULL,
  `qty_stock` decimal(5,2) NOT NULL,
  `staff_gudang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `tgl_terima`, `id_order`, `qty_awal`, `qty_masuk`, `minus`, `keterangan`, `qty_stock`, `staff_gudang`) VALUES
(1, '2020-01-03', 'EEG4087', '0.00', '563.00', '1.00', 'Kemasan Rusak', '562.00', 'Admin'),
(2, '2020-01-02', 'XTM6104', '0.00', '510.00', '2.00', 'Rusak', '508.00', 'Admin'),
(3, '2020-03-03', 'LXW2835', '33.00', '250.00', '0.00', '-', '283.00', 'Admin'),
(4, '2020-03-03', 'MYI8015', '74.00', '300.00', '0.00', '-', '374.00', 'Admin'),
(5, '2020-04-01', 'SCE1798', '7.00', '500.00', '0.00', '-', '507.00', 'Admin'),
(6, '2020-04-01', 'WEU2305', '9.00', '500.00', '0.00', '-', '509.00', 'Admin'),
(7, '2020-05-01', 'QNV6824', '122.00', '500.00', '0.00', '-', '622.00', 'Admin'),
(8, '2020-05-01', 'VKB7402', '242.00', '300.00', '0.00', '-', '542.00', 'Admin'),
(9, '2020-06-01', 'QNI3751', '291.00', '400.00', '0.00', '-', '691.00', 'Admin'),
(10, '2020-06-01', 'ZFI2045', '357.00', '400.00', '0.00', '-', '757.00', 'Admin'),
(11, '2020-07-01', 'FFV2497', '233.00', '87.00', '0.00', '-', '310.00', 'Admin'),
(12, '2020-07-01', 'MAP0428', '187.00', '141.00', '0.00', '-', '328.00', 'Admin'),
(13, '2020-08-01', 'ANB1708', '0.00', '563.00', '0.00', '-', '563.00', 'Admin'),
(14, '2020-08-01', 'TCO9405', '0.00', '563.00', '0.00', '-', '563.00', 'Admin'),
(34, '2020-10-01', 'TAO9351', '45.00', '253.00', '0.00', '-', '298.00', 'Admin'),
(35, '2020-10-11', 'APN2034', '1.00', '30.00', '0.00', '-', '31.00', 'Admin'),
(36, '2020-11-01', 'WVU0374', '94.00', '135.00', '0.00', '-', '229.00', 'Admin'),
(37, '2020-11-01', 'ADH5209', '9.00', '150.00', '0.00', '-', '159.00', 'Admin'),
(38, '2020-12-01', 'QJO9637', '4.00', '182.00', '0.00', '', '186.00', 'Admin'),
(39, '2020-12-01', 'UKG7194', '2.00', '221.00', '0.00', '-', '223.00', 'Admin'),
(40, '2020-11-02', 'NFC3968', '0.00', '200.00', '0.00', '-', '200.00', 'Admin'),
(41, '2020-11-20', 'RPV5891', '0.00', '200.00', '0.00', '', '200.00', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `beg_qty` decimal(5,2) NOT NULL,
  `qty_keluar` decimal(5,2) NOT NULL,
  `end_qty` decimal(5,2) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `staff_gudang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_keluar`, `kode`, `beg_qty`, `qty_keluar`, `end_qty`, `id_unit`, `staff_gudang`) VALUES
(1, '2020-01-28', 'NMSMA4530', '563.00', '263.00', '300.00', 1, 'Admin'),
(2, '2020-01-28', '24002040', '510.00', '255.00', '255.00', 1, 'Admin'),
(3, '2020-02-28', 'NMSMA4530', '300.00', '226.00', '74.00', 1, 'Admin'),
(4, '2020-02-28', '24002040', '255.00', '222.00', '33.00', 1, 'Admin'),
(5, '2020-03-28', 'NMSMA4530', '374.00', '367.00', '7.00', 1, 'Admin'),
(6, '2020-03-28', '24002040', '283.00', '274.00', '9.00', 1, 'Admin'),
(7, '2020-04-29', 'NMSMA4530', '507.00', '385.00', '122.00', 1, 'Admin'),
(8, '2020-04-29', '24002040', '509.00', '267.00', '242.00', 1, 'Admin'),
(9, '2020-05-28', 'NMSMA4530', '622.00', '265.00', '357.00', 1, 'Admin'),
(10, '2020-05-28', '24002040', '542.00', '251.00', '291.00', 1, 'Admin'),
(11, '2020-06-28', 'NMSMA4530', '757.00', '524.00', '233.00', 1, 'Admin'),
(12, '2020-06-28', '24002040', '691.00', '504.00', '187.00', 1, 'Admin'),
(13, '2020-07-28', 'NMSMA4530', '320.00', '320.00', '0.00', 1, 'Admin'),
(14, '2020-07-28', '24002040', '328.00', '328.00', '0.00', 1, 'Admin'),
(15, '2020-08-30', 'NMSMA4530', '563.00', '234.00', '329.00', 1, 'Admin'),
(16, '2020-08-30', '24002040', '563.00', '189.00', '374.00', 1, 'Admin'),
(29, '2020-09-30', 'NMSMA4530', '329.00', '284.00', '45.00', 1, 'Admin'),
(30, '2020-09-30', '24002040', '374.00', '233.00', '141.00', 1, 'Admin'),
(31, '2020-10-12', 'NMSMA4530', '298.00', '104.00', '194.00', 1, 'Admin'),
(32, '2020-10-19', 'NMSMA4530', '194.00', '100.00', '94.00', 1, 'Admin'),
(33, '2020-10-11', '24002040', '141.00', '140.00', '1.00', 1, 'Admin'),
(34, '2020-10-19', '24002040', '31.00', '22.00', '9.00', 1, 'Admin'),
(35, '2020-11-27', '24002040', '159.00', '155.00', '4.00', 1, 'Admin'),
(36, '2020-11-27', 'NMSMA4530', '229.00', '227.00', '2.00', 1, 'Admin'),
(37, '2020-12-29', 'NMSMA4530', '223.00', '223.00', '0.00', 1, 'Admin'),
(38, '2020-12-29', '24002040', '186.00', '186.00', '0.00', 1, 'Admin'),
(39, '2021-01-17', 'NMSMA4530', '200.00', '200.00', '0.00', 1, 'Admin'),
(40, '2021-01-01', 'NMSMA4530', '200.00', '200.00', '0.00', 1, 'Admin'),
(41, '2020-11-20', 'NMSMA4530', '200.00', '100.00', '100.00', 1, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peramalan`
--

CREATE TABLE `peramalan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `bln` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `alpha` float(1,1) NOT NULL,
  `forcasting` decimal(10,3) NOT NULL,
  `MAE` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peramalan`
--

INSERT INTO `peramalan` (`id`, `kode`, `bulan`, `bln`, `tahun`, `alpha`, `forcasting`, `MAE`) VALUES
(16, 'NMSMA4530', 'Januari', 1, 2020, 0.1, '263.000', '0.000'),
(17, 'NMSMA4530', 'Februari', 2, 2020, 0.1, '263.000', '0.000'),
(18, 'NMSMA4530', 'Maret', 3, 2020, 0.1, '259.300', '18.500'),
(19, 'NMSMA4530', 'April', 4, 2020, 0.1, '270.070', '48.233'),
(20, 'NMSMA4530', 'Mei', 5, 2020, 0.9, '381.827', '51.508'),
(21, 'NMSMA4530', 'Juni', 6, 2020, 0.1, '279.907', '55.239'),
(22, 'NMSMA4530', 'Juli', 7, 2020, 0.1, '304.316', '86.714'),
(23, 'NMSMA4530', 'Agustus', 8, 2020, 0.1, '305.884', '76.567'),
(24, 'NMSMA4530', 'September', 9, 2020, 0.1, '298.696', '75.982'),
(25, 'NMSMA4530', 'Oktober', 10, 2020, 0.1, '297.226', '69.172'),
(30, 'NMSMA4530', 'November', 11, 2020, 0.1, '287.904', '71.578'),
(42, '24002040', 'Januari', 1, 2020, 0.1, '255.000', '0.000'),
(43, '24002040', 'Februari', 2, 2020, 0.1, '255.000', '0.000'),
(44, '24002040', 'Maret', 3, 2020, 0.1, '251.700', '16.500'),
(45, '24002040', 'April', 4, 2020, 0.1, '253.930', '18.433'),
(46, '24002040', 'Mei', 5, 2020, 0.1, '255.237', '17.093'),
(47, '24002040', 'Juni', 6, 2020, 0.1, '254.813', '14.521'),
(48, '24002040', 'Juli', 7, 2020, 0.1, '279.732', '53.632'),
(49, '24002040', 'Agustus', 8, 2020, 0.3, '329.541', '47.479'),
(50, '24002040', 'September', 9, 2020, 0.1, '275.003', '58.203'),
(51, '24002040', 'Oktober', 10, 2020, 0.1, '270.803', '56.403'),
(52, '24002040', 'November', 11, 2020, 0.1, '259.922', '61.643');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `tgl_request` date NOT NULL,
  `kode` varchar(10) NOT NULL,
  `qty_barang` decimal(10,2) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status_request` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_request`, `tgl_request`, `kode`, `qty_barang`, `tgl_kirim`, `status_request`) VALUES
(1, '2020-01-01', 'NMSMA4530', '563.00', '2020-01-02', 'approved'),
(2, '2020-01-01', '24002040', '510.00', '2020-01-02', 'approved'),
(3, '2020-03-01', 'NMSMA4530', '300.00', '2020-03-02', 'approved'),
(4, '2020-03-01', '24002040', '250.00', '2020-03-02', 'approved'),
(5, '2020-03-28', 'NMSMA4530', '500.00', '2020-04-01', 'approved'),
(6, '2020-03-28', '24002040', '500.00', '2020-04-01', 'approved'),
(7, '2020-04-29', 'NMSMA4530', '500.00', '2020-05-01', 'approved'),
(8, '2020-04-29', '24002040', '300.00', '2020-05-01', 'approved'),
(9, '2020-05-28', 'NMSMA4530', '400.00', '2020-06-01', 'approved'),
(10, '2020-05-28', '24002040', '400.00', '2020-06-01', 'approved'),
(11, '2020-06-29', 'NMSMA4530', '87.00', '2020-07-01', 'approved'),
(12, '2020-06-29', '24002040', '141.00', '2020-07-01', 'approved'),
(13, '2020-07-30', 'NMSMA4530', '563.00', '2020-08-01', 'approved'),
(14, '2020-07-30', '24002040', '563.00', '2020-08-01', 'approved'),
(29, '2020-09-30', 'NMSMA4530', '253.00', '2020-10-01', 'approved'),
(30, '2020-09-30', '24002040', '30.00', '2020-10-01', 'approved'),
(31, '2020-11-01', '24002040', '150.00', '2020-11-02', 'approved'),
(32, '2020-11-01', 'NMSMA4530', '135.00', '2020-11-01', 'approved'),
(33, '2020-11-29', 'NMSMA4530', '221.00', '2020-11-30', 'approved'),
(34, '2020-11-29', '24002040', '182.00', '2020-11-30', 'approved'),
(35, '2020-11-02', 'NMSMA4530', '200.00', '2021-01-01', 'approved'),
(36, '2020-11-20', 'NMSMA4530', '200.00', '2020-11-20', 'approved'),
(38, '2020-11-23', '24002040', '2000.00', '2020-11-23', 'proccessed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_unit` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_unit`, `unit`, `keterangan`) VALUES
(1, 'Pcs', 'Perkemasan atau perpotong'),
(2, 'ROLL', 'Pergulung'),
(3, 'PACK', 'Perkotak atau kardus'),
(4, 'Tin', 'Perkaleng atau perbuah'),
(5, 'KG', 'Perkilo Gram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `quality` decimal(5,2) NOT NULL,
  `min_stock` decimal(5,2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`id_stock`, `kode`, `id_unit`, `quality`, `min_stock`, `status`) VALUES
(1, 'NMSMA4530', 1, '100.00', '5.00', 'Tersedia'),
(2, '24002040', 1, '0.00', '5.00', 'Stok Habis !');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nm_supplier` varchar(25) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nm_supplier`, `telp`, `alamat`) VALUES
(1, 'Normmed Medikal ve Makina', '903123956', 'Vedik Organize Sanayi Bölgesi, 1468. Cad. No : 193, 06378 Yenimahalle, Turki'),
(2, 'Jiangsu Ultracare Medical', '8651986488', 'No.80,Wujin West Rd.,Wujin National Hi-Tech Industrial  Development Zone,Changzhou City,Jiangsu Province,213164'),
(3, 'PT. Berani Maju', '076134221', 'Jl. Kaharuddin Nasution Km.15, No.27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `foto`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '20200609-171613.jpg', 'Stocker'),
(11, 'mg', 'b351bb9b0af6e4fc678749675c53ad67', 'Manager', '20201120-201436.png', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
