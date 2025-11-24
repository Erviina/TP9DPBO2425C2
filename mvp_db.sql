-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2025 pada 04.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembalap`
--

CREATE TABLE `pembalap` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tim` varchar(255) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `poinMusim` int(11) DEFAULT NULL,
  `jumlahMenang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembalap`
--

INSERT INTO `pembalap` (`id`, `nama`, `tim`, `negara`, `poinMusim`, `jumlahMenang`) VALUES
(1, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
(2, 'Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
(3, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
(4, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
(5, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
(6, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
(7, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
(8, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
(9, 'Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
(10, 'Fernando Alonso', 'Alpine', 'Spain', 65, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `negara` varchar(100) DEFAULT NULL,
  `kontrakMulai` date DEFAULT NULL,
  `kontrakSelesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sponsor`
--

INSERT INTO `sponsor` (`id`, `nama`, `negara`, `kontrakMulai`, `kontrakSelesai`) VALUES
(1, 'Benefit', 'Indo', '2023-11-11', '2025-11-11'),
(2, 'Ninja', 'US', '2024-03-02', '2025-03-02'),
(3, 'Toyota', 'Indo', '2022-12-12', '2024-12-12'),
(4, 'Pertamina', 'indo', '2023-11-11', '2026-11-11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembalap`
--
ALTER TABLE `pembalap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
