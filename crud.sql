-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2021 pada 07.17
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pukul`
--

CREATE TABLE `pukul` (
  `id` int(11) NOT NULL,
  `pukul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pukul`
--

INSERT INTO `pukul` (`id`, `pukul`) VALUES
(1, '08.15 - 09.55'),
(2, '10.00 - 11.40'),
(3, '14.00 - 15.40'),
(4, '16.30 - 18.10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roster`
--

CREATE TABLE `roster` (
  `id` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_pukul` int(11) NOT NULL,
  `matakuliah` varchar(128) NOT NULL,
  `ruang_kuliah` varchar(128) NOT NULL,
  `pengajar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roster`
--

INSERT INTO `roster` (`id`, `id_hari`, `id_pukul`, `matakuliah`, `ruang_kuliah`, `pengajar`) VALUES
(13, 1, 4, 'Komunikasi Data B', 'E.02.08', 'Zulfan, M.Sc'),
(15, 1, 3, 'Praktikum SIG A', 'Daring', 'Rizki Nabilah & Farah Anisa'),
(16, 2, 1, 'Teori Graf A', 'DMIR', 'Junidar, M.Kom'),
(17, 2, 3, 'Aslab Pemrograman C', 'Lab TIK', 'Saya'),
(18, 2, 4, 'Struktur Data dan Algoritma C', 'DMIR', 'Alim Misbullah M.S'),
(20, 3, 2, 'Praktikum SDA C', 'LAB Database', 'Giyaddy Ilmi'),
(21, 3, 3, 'Grafika Komputer C', 'Daring', 'Dalila Husna Yunardi, M.Sc'),
(22, 4, 1, 'Pemrograman Berbasis Website C', 'DMIR', 'Alim Misbullah M.S'),
(23, 4, 3, 'Rekayasa Perangkat Lunak A', 'Daring', 'Rahmad Dawood, M.Sc'),
(25, 5, 2, 'Kewirausahaan', 'E.02.07', 'Muslim, M.IT'),
(26, 5, 4, 'Sistem Informasi Geografi B', 'Daring', 'Dr. Nizamuddin, M.InfoSc'),
(34, 3, 1, 'Praktikum PBW C', 'Daring', 'Syahril & Ghazi ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pukul`
--
ALTER TABLE `pukul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roster`
--
ALTER TABLE `roster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pukul`
--
ALTER TABLE `pukul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roster`
--
ALTER TABLE `roster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
