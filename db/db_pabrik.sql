-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2023 pada 07.32
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pabrik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perawatan`
--

CREATE TABLE `tb_perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `fotoafter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perawatan`
--

INSERT INTO `tb_perawatan` (`id_perawatan`, `tanggal`, `mesin`, `foto`, `keterangan`, `fotoafter`) VALUES
(18, '2023-11-08', 'bodaaa', 'download (1).jpg', 'lancar', 'download (2).jpg'),
(19, '2023-11-08', 'body', 'download.jpg', 'Rusak', 'download (2).jpg'),
(30, '2023-11-08', 'body', 'download (2).jpg', 'lancar', 'download (1).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'hasan', 'hasan'),
(2, 'ali', 'ali'),
(3, 'dirham', 'dirham'),
(4, 'ibu', 'ibu'),
(5, 'ayah', 'ayah'),
(6, 'met', 'met');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_perawatan`
--
ALTER TABLE `tb_perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_perawatan`
--
ALTER TABLE `tb_perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
