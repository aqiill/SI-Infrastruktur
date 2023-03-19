-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 13.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_infrastruktur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_capaian`
--

CREATE TABLE `tb_capaian` (
  `id_capaian` int(5) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `sumber` text NOT NULL,
  `id_kategori` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_capaian`
--

INSERT INTO `tb_capaian` (`id_capaian`, `uraian`, `sumber`, `id_kategori`) VALUES
(1, 'provinsi jawa tengah', 'BPBD Provinsi Jawa Tengah 02 Maret 2022, 11:55:10', 1),
(5, 'wonogiri', 'BPBD 09 Desember 2021, 09:44:36', 2),
(9, 'KENDAL', '29 September 2021, 10:45:28', 1),
(10, 'KOTA SALATIGA', 'https://web.salatiga.go.id 06 November 2021, 18:51:40', 3),
(11, 'Provinsi Jawa Tengah', 'BPBD Provinsi Jawa Tengah 28 Maret 2022, 11:34:47', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil_capaian`
--

CREATE TABLE `tb_hasil_capaian` (
  `id_hasil_capaian` int(5) NOT NULL,
  `id_capaian` int(5) NOT NULL,
  `id_tahun` int(5) NOT NULL,
  `capaian` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil_capaian`
--

INSERT INTO `tb_hasil_capaian` (`id_hasil_capaian`, `id_capaian`, `id_tahun`, `capaian`, `satuan`) VALUES
(1, 1, 1, '41.50 \n', '%'),
(2, 1, 2, '44.75 \r\n', '%'),
(3, 1, 3, '46.10 \r\n', '%'),
(4, 1, 4, '60.99 \r\n', '%'),
(5, 5, 1, '74.02 \r\n', '%'),
(6, 5, 2, '75.00 \r\n', '%'),
(7, 5, 3, '75.03 \r\n', '%'),
(8, 5, 4, '79.17 \r\n', '%'),
(9, 11, 1, '41.00', '%'),
(10, 11, 2, '50.55', '%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `display` enum('block','none') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `display`) VALUES
(1, 'Pendidikan', 'block'),
(2, 'Kesehatan', 'block'),
(3, 'Pangan', 'block'),
(4, 'Pertanahan', 'none'),
(5, 'sosial', 'none');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun`
--

CREATE TABLE `tb_tahun` (
  `id_tahun` int(5) NOT NULL,
  `tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tahun`
--

INSERT INTO `tb_tahun` (`id_tahun`, `tahun`) VALUES
(1, 2019),
(2, 2020),
(3, 2021),
(4, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_user`, `email_user`, `password`) VALUES
(1, 'aqil rahman', 'aqilrahman23@gmail.com', 'c53255317bb11707d0f614696b3ce6f221d0e2f2'),
(4, 'admin', 'aqil.rahman.tif420@polban.ac.id', '5cec175b165e3d5e62c9e13ce848ef6feac81bff');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_capaian`
--
ALTER TABLE `tb_capaian`
  ADD PRIMARY KEY (`id_capaian`);

--
-- Indeks untuk tabel `tb_hasil_capaian`
--
ALTER TABLE `tb_hasil_capaian`
  ADD PRIMARY KEY (`id_hasil_capaian`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_capaian`
--
ALTER TABLE `tb_capaian`
  MODIFY `id_capaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil_capaian`
--
ALTER TABLE `tb_hasil_capaian`
  MODIFY `id_hasil_capaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_tahun`
--
ALTER TABLE `tb_tahun`
  MODIFY `id_tahun` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
