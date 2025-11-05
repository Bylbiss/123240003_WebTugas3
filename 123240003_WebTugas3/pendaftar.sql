-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2025 pada 10.20
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
-- Database: `bimbel_babarsari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `price1` int(11) NOT NULL,
  `price2` int(11) NOT NULL,
  `price3` int(11) NOT NULL,
  `price4` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `taxes` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `email`, `paket`, `fasilitas`, `lokasi`, `metode_pembayaran`, `catatan`, `price1`, `price2`, `price3`, `price4`, `tax`, `taxes`, `total_biaya`, `tanggal_daftar`) VALUES
(1, 'Buncis', 'Bunciss960@gmail.com', 'Paket Reguler', 'Modul Cetak Lengkap, Video Rekaman Kelas', 'Yogyakarta', 'Transfer Bank', '', 750000, 125000, 80000, 3000, 10, 95800, 1053800, '2025-11-05 10:09:00'),
(2, 'Uleerr', 'pytoonn142@gmail.com', 'Undefined', 'Grup Diskusi Telegram', 'Jakarta Pusat', 'E-Wallet', '', 0, 40000, 100000, 2000, 10, 14200, 156200, '2025-11-05 10:09:42'),
(3, 'Onyett', 'onyet04@gmail.com', 'Paket Supercamp SBMPTN', 'Modul Cetak Lengkap, Modul PDF, Video Rekaman Kelas, Grup Diskusi Telegram', 'Surabaya', 'Transfer Bank', '', 1000000, 190000, 150000, 3000, 10, 134300, 1477300, '2025-11-05 10:10:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
