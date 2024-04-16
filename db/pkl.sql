-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2024 pada 19.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
  `id_absen` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `kls` varchar(50) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `name`, `kls`, `jam`, `tgl`, `email`, `img`, `status`) VALUES
(57, 'M Rafli Fauzan', 'XII RPL 2', '18:55:57', '26 October 2023', 'rafli@gmail.com', '653a53ce02360.png', 'success'),
(62, 'Zidan ', 'XII RPL 3', '19:57:09', '6 February 2024', 'zidan@gmail.com', '65c22ca5e4757.png', 'rejected'),
(64, 'Zidan ', 'XII RPL 3', '11:37:10', '14 March 2024', 'zidan@gmail.com', '65f27ef778aa4.png', 'rejected'),
(65, 'Zidan ', 'XII RPL 3', '11:37:22', '14 March 2024', 'zidan@gmail.com', '65f27f02c07e6.png', 'success'),
(66, 'Zidan ', 'XII RPL 3', '11:37:33', '14 March 2024', 'zidan@gmail.com', '65f27f0dc7bdb.png', 'success'),
(67, 'Zidan ', 'XII RPL 3', '13:09:31', '14 March 2024', 'zidan@gmail.com', '65f2949c0b524.png', 'rejected'),
(68, 'Wawanan Ari F', 'XII RPL  3', '13:35:21', '14 March 2024', 'ari@gmail.com', '65f29aaa99d83.png', 'success'),
(69, 'Wawanan Ari F', 'XII RPL  3', '13:44:32', '14 March 2024', 'ari@gmail.com', '65f29cd059957.png', 'success'),
(70, 'Wawanan Ari F', 'XII RPL  3', '13:44:38', '14 March 2024', 'ari@gmail.com', '65f29cd6d3246.png', 'rejected'),
(71, 'M Rafli Fauzan', 'XII RPL 2', '13:44:58', '14 March 2024', 'rafli@gmail.com', '65f29ceb078d0.png', 'rejected'),
(72, 'M Rafli Fauzan', 'XII RPL 2', '13:45:06', '14 March 2024', 'rafli@gmail.com', '65f29cf286d73.png', 'rejected'),
(73, 'M Rafli Fauzan', 'XII RPL 2', '13:45:14', '14 March 2024', 'rafli@gmail.com', '65f29cfaa1aff.png', 'success'),
(74, 'M Rafli Fauzan', 'XII RPL 2', '15:24:39', '14 March 2024', 'rafli@gmail.com', '65f2b4483419a.png', 'success'),
(75, 'Zidan ', 'XII RPL 3', '13:50:59', '19 March 2024', 'zidan@gmail.com', '65f935d435d04.png', 'success'),
(78, 'Sita Aprilia Rahmani', 'XII RPL 2', '13:18:49', '16 April 2024', 'sita@gmail.com', '661e1849a8df0.png', 'success'),
(79, 'Sita Aprilia Rahmani', 'XII RPL 2', '14:48:40', '16 April 2024', 'sita@gmail.com', '661e2d596ff58.png', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kls` varchar(12) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `tlpn` varchar(50) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `kls`, `alamat`, `email`, `tlpn`, `img`, `password`, `level`) VALUES
(1, 'Azi saputra', 'XII RPL 2', 'Tamansari', 'azi@gmail.com', '089519217821', '64f0731540308-removebg-preview.png', 'admin', 'admin'),
(5, 'Zidan ', 'XII RPL 3', 'Awi Luar', 'zidan@gmail.com', '089326373736', 'user.png', '2023', 'siswa'),
(6, 'M Habib', 'XII RPL 1', 'Kawalu', 'habib@gmail.com', '089333736452', 'user.png', '2023', 'siswa'),
(7, 'M Rafli Fauzan', 'XII RPL 2', 'Cisangkir', 'rafli@gmail.com', '089342363764', 'User.png', '2023', 'siswa'),
(14, 'Wawanan Ari F', 'XII RPL  3', 'Karangtaulan', 'ari@gmail.com', '0482374819', 'user.png', '2023', 'siswa'),
(15, 'Sita Aprilia Rahmani', 'XII RPL 2', 'ci Bodas ', 'sita@gmail.com', '0823654823', 'user.png', '2023', 'siswa'),
(29, 'Rizwan', 'XII RPL 3', 'ci badak', 'Rizwan@email.com', '8965421783', 'user.png', '2023', 'siswa'),
(30, 'Zaidan', 'XII RPL 3', 'ci badak', 'Zaidan@email.com', '8637376135', 'user.png', '2023', 'siswa');

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
