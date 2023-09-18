-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Sep 2023 pada 12.56
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kls` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jam` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `name`, `kls`, `jam`, `tgl`, `email`, `img`, `status`) VALUES
(54, 'M Rafli Fauzan', 'XII RPL 2', '13:31:13', '18 September 2023', 'rafli@gmail.com', '6507eeb1a6755.png', 'selesai'),
(55, 'M Rafli Fauzan', 'XII RPL 2', '13:31:25', '18 September 2023', 'rafli@gmail.com', '6507eebe8cbb8.png', 'proses'),
(56, 'Wawanan Ari F', 'XII RPL  3', '14:11:08', '18 September 2023', 'ari@gmail.com', '6507f80caa4af.png', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kls` varchar(12) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tlpn` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `kls`, `alamat`, `email`, `tlpn`, `img`, `password`, `level`) VALUES
(1, 'Azi saputra', 'XII RPL 2', 'Tamnsari', 'azi@gmail.com', '089519217821', 'user.png', 'admin', 'admin'),
(5, 'Zidan ', 'XII RPL 3', 'Awi Luar', 'zidan@gmail.com', '089326373736', 'user.png', '2023', 'siswa'),
(6, 'M Habib', 'XII RPL 1', 'Kawalu', 'habib@gmail.com', '089333736452', 'user.png', '2023', 'siswa'),
(7, 'M Rafli Fauzan', 'XII RPL 2', 'Cisangkir', 'rafli@gmail.com', '089342363764', 'User.png', '2023', 'siswa'),
(13, 'Annisa Desniyanti', 'XII RPL 2', 'Singkup Barat', 'nisdes@gmail.com', '089321264812', 'user.png', '2023', 'siswa'),
(14, 'Wawanan Ari F', 'XII RPL  3', 'Karangtaulan', 'ari@gmail.com', '0482374819', 'user.png', '2023', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
