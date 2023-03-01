-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20 Feb 2023 pada 06.37
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_users`
--

CREATE TABLE `is_users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_id` varchar(20) NOT NULL,
  `label` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jawab` varchar(50) NOT NULL,
  `ktp` varchar(25) NOT NULL,
  `no_rek` int(25) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `pasar` int(5) NOT NULL,
  `lagu` int(5) NOT NULL,
  `peringkat` int(5) NOT NULL,
  `nilai` int(20) NOT NULL,
  `saldo` int(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('User','Admin') NOT NULL DEFAULT 'User',
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kode` varchar(4) NOT NULL DEFAULT '1234',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `no_id`, `label`, `alamat`, `telpon`, `email`, `jawab`, `ktp`, `no_rek`, `bank`, `pasar`, `lagu`, `peringkat`, `nilai`, `saldo`, `foto`, `hak_akses`, `status`, `created_at`, `kode`, `updated_at`) VALUES
(1, 'admin', 'Ahmad Zainuri', '12345', '110', 'PT saya', 'Jakarta', '08121112231', 'jasakoding@gmail.com', 'Ahmad', '110123123', 2147483647, 'BNI', 41, 11, 11, 1806019, 525988, 'depan.jpg', 'Admin', 'aktif', '2017-04-01 08:15:15', '1234', '2022-06-27 03:45:24'),
(2, 'user', 'susi', '123', '111', 'PT', 'BL', '089', 'a@ail.com', 'Adi', '111', 34567, 'BCA', 0, 0, 0, 3000, 20253, 'logo-rumah-png-5.png', 'User', 'aktif', '2019-05-10 01:02:58', '1234', '2022-06-26 16:55:35'),
(7, 'adi', 'adi', '123', '08', 'PT asa', 'Karang', 'q@gmail.com', '0812', '123', '123', 123, '123', 0, 0, 0, 0, 0, NULL, 'User', 'aktif', '2022-06-27 08:49:50', '1234', '2022-06-27 08:49:50'),
(8, 'susan', 'susan', '123', '0011', 'PT', 'Bandung', '0812', 'a@gmail.com', 'Ahmad', '110', 2147483647, 'BNI', 0, 0, 0, 0, 0, NULL, 'User', 'aktif', '2022-06-27 08:53:20', '1234', '2022-06-27 08:53:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_antar`
--

CREATE TABLE `tb_antar` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank` varchar(25) NOT NULL,
  `rek` int(25) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `fee` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_antar`
--

INSERT INTO `tb_antar` (`id_transaksi`, `tgl`, `bank`, `rek`, `metode`, `jumlah`, `fee`, `total`, `keterangan`, `status`, `id_user`) VALUES
('AB000001', '2023-02-20 05:18:10', 'BNI', 3444, '', 454, 2000, 0, '545', 'Selesai', 2),
('AB000002', '2023-02-20 06:27:26', 'BNI', 34, 'BI Fast', 3000, 2000, 5000, 'dfd', 'Pending', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kirim`
--

CREATE TABLE `tb_kirim` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `penerima` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah` int(20) NOT NULL,
  `fee` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kirim`
--

INSERT INTO `tb_kirim` (`id_transaksi`, `tgl`, `penerima`, `alamat`, `jumlah`, `fee`, `total`, `keterangan`, `status`, `id_user`) VALUES
('KU000001', '2023-02-20 06:31:32', 'qw', '343', 4000, 2000, 6000, '565', 'Pending', 2),
('KU000002', '2023-02-20 06:31:43', 'wew', 'ewe', 40000, 2000, 42000, '445', 'Pending', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_saldo`
--

CREATE TABLE `tb_saldo` (
  `id_saldo` varchar(20) NOT NULL,
  `label` text NOT NULL,
  `no_id` varchar(50) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `penanggung` varchar(50) NOT NULL,
  `ktp` int(50) NOT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_saldo`
--

INSERT INTO `tb_saldo` (`id_saldo`, `label`, `no_id`, `no_rek`, `bank`, `penanggung`, `ktp`, `saldo`) VALUES
('SL000001', '1', '2', 3, '4', '5', 6, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setor`
--

CREATE TABLE `tb_setor` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_setor`
--

INSERT INTO `tb_setor` (`id_transaksi`, `tgl`, `jumlah`, `keterangan`, `status`, `id_user`) VALUES
('ST000001', '2023-02-19 00:23:20', 3455, 'trtr', 'Selesai', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarik`
--

CREATE TABLE `tb_tarik` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jumlah` int(20) NOT NULL,
  `fee` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tarik`
--

INSERT INTO `tb_tarik` (`id_transaksi`, `tgl`, `jumlah`, `fee`, `total`, `keterangan`, `status`, `id_user`) VALUES
('TR000001', '2023-02-20 06:10:53', 3000, 15000, 0, 'Tunai', 'Pending', 2),
('TR000002', '2023-02-20 06:21:24', 2000, 15000, 0, '17000', 'Pending', 2),
('TR000003', '2023-02-20 06:22:51', 40000, 15000, 55000, 'Tunai', 'Pending', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunai`
--

CREATE TABLE `tb_tunai` (
  `id_transaksi` varchar(20) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rek` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `fee` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_tunai`
--

INSERT INTO `tb_tunai` (`id_transaksi`, `tgl`, `rek`, `jumlah`, `fee`, `total`, `keterangan`, `status`, `id_user`) VALUES
('TR000001', '2023-02-20 06:26:04', 787, 6000, 15000, 21000, 'ijij', 'Pending', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- Indexes for table `tb_antar`
--
ALTER TABLE `tb_antar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_kirim`
--
ALTER TABLE `tb_kirim`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_saldo`
--
ALTER TABLE `tb_saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `tb_setor`
--
ALTER TABLE `tb_setor`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_tarik`
--
ALTER TABLE `tb_tarik`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_tunai`
--
ALTER TABLE `tb_tunai`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
