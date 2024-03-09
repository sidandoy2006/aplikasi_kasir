-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2024 pada 00.44
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
-- Database: `db_mrf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `tanggal_waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `nama_produk` varchar(40) DEFAULT NULL,
  `harga_produk` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah` int(20) NOT NULL,
  `kode_unik` varchar(255) DEFAULT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `harga_produk`, `created_at`, `updated_at`, `jumlah`, `kode_unik`, `status`) VALUES
(8, 'Susu Sereal', 10000, '2024-02-27 04:01:20', NULL, 4, '65dd5e90db181', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `uang_pelanggan` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal_pembuatan` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_modifikasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_produk`, `harga_produk`, `jumlah`, `kode_unik`, `total_harga`, `uang_pelanggan`, `kembalian`, `tanggal_pembuatan`, `tanggal_modifikasi`, `username`) VALUES
(2, '', 0, 0, '', 10000, 10000987, 9990987, '2024-03-09 23:43:54', '2024-03-09 23:43:54', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_produk`
--

CREATE TABLE `transaksi_produk` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` decimal(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode_unik` varchar(50) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_produk`
--

INSERT INTO `transaksi_produk` (`id`, `id_transaksi`, `nama_produk`, `harga_produk`, `jumlah`, `kode_unik`, `total_harga`) VALUES
(34, 105, 'ASUS A43J', 6000000.00, 1, 'LT001', 6000000.00),
(35, 106, 'Axioo', 5000000.00, 1, 'LT004', 5000000.00),
(36, 107, 'ASUS A43JSA', 6000000.00, 1, 'LT003', 6000000.00),
(37, 1, 'Susu Sereal', 10000.00, 1, '65dd5e90db181', 10000.00),
(38, 2, 'Susu Sereal', 10000.00, 1, '65dd5e90db181', 10000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('owner','admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `nama`, `created_at`, `updated_at`, `role`) VALUES
(2, 'admin', 'admin', 'admin', '2024-03-04 11:37:07', '2024-03-04 11:37:07', 'admin'),
(3, 'kasir', 'kasir', 'kasir_1', '2024-02-27 03:57:04', '2024-02-27 03:57:04', 'kasir'),
(4, 'ddd', 'sss', 'ddd', '2024-02-26 06:14:44', '2024-02-26 06:14:44', 'kasir'),
(10, 'ih', 'ih', 'ih', '2024-03-04 16:10:54', '2024-03-04 16:10:54', 'kasir'),
(11, 'iqbal', '123', 'iqbal', '2024-03-09 23:06:59', '2024-03-09 23:06:59', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
