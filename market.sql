-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2020 pada 07.18
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agents`
--

CREATE TABLE `agents` (
  `kd_agen` int(10) UNSIGNED NOT NULL,
  `nama_toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agents`
--

INSERT INTO `agents` (`kd_agen`, `nama_toko`, `nama_pemilik`, `alamat`, `latitude`, `longitude`, `img_toko`, `created_at`, `updated_at`) VALUES
(2, 'Toko Ramedia', 'Ibrahum Yahya', 'Jl. Kh. Agus Salim No.348, Wumialo, Kota Tengah, Kota Gorontalo, Gorontalo 96138', '0.558527', '123.049603', 'agent/20200705034356.jpg', '2020-07-05 10:43:56', '2020-07-05 10:43:56'),
(4, 'Toko Mitra It', 'Ko Kiki', 'S. Parman 45,, Kel. Biawao, Kec. Kota Selatan, Biawao, Kota Sel., Kota Gorontalo', '0.533998', '123.058129', 'agent/20200712043646.jpeg', '2020-07-12 11:36:46', '2020-07-12 11:36:46'),
(5, 'Karsa Utama Store', 'Hj. Daeng', 'Jl. S. Parman No.77, Biawao, Kota Sel., Kota Gorontalo, Gorontalo 96133', '0.536466', '123.058919', 'agent/20200712044041.jpg', '2020-07-12 11:40:41', '2020-07-12 11:40:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `kd_keranjang` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_produk` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `kd_kategori` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`kd_kategori`, `kategori`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Alat Komputer', 'category/20200712040643.jpg', '2020-06-28 02:10:27', '2020-07-12 11:06:43'),
(3, 'Pakaian', 'category/20200712040739.jpg', '2020-06-28 13:11:56', '2020-07-12 11:07:39'),
(4, 'Alat Tulis Kantor', 'category/20200712040805.jpg', '2020-07-12 11:08:05', '2020-07-12 11:08:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employes`
--

CREATE TABLE `employes` (
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employes`
--

INSERT INTO `employes` (`username`, `password`, `nama_pegawai`, `jk`, `alamat`, `is_active`, `created_at`, `updated_at`) VALUES
('didi12', '$2y$10$scl6D2edlR3GjrjjzV7.Eu4HNqquBujEcOjkVhrLC9ff2L2T/Y0CG', 'didi serga', 'pria', 'jl. Suprapto', 0, '2020-06-27 11:45:10', '2020-06-27 11:45:10'),
('fahmi12', '$2y$10$mD6qqvdmI/d60BpeF8U5EurwrRrTkkQZtdcul5q60GLhpxDGlsV4G', 'fahmi adnan', 'pria', 'Jl Kalimantan Kota Gorontalo', 1, '2020-06-27 11:43:35', '2020-06-28 00:52:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_06_26_210553_create_table_supplier', 2),
(6, '2020_06_27_025501_create_table_employe', 3),
(7, '2020_06_27_181436_create_categori_table', 4),
(9, '2020_06_27_230755_create_table_porduct', 5),
(10, '2020_07_02_030158_create_table__transaction', 6),
(16, '2020_07_03_191342_create_table_agent', 7),
(17, '2020_07_03_191735_create_table_cart', 7),
(18, '2020_07_03_192906_create_table_sale_transaction', 7),
(19, '2020_07_03_193823_create_table_sale_transaction_detail', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `kd_produk` int(10) UNSIGNED NOT NULL,
  `kd_kategori` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `img_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`kd_produk`, `kd_kategori`, `nama_produk`, `harga`, `img_produk`, `stok`, `created_at`, `updated_at`) VALUES
(3, 2, 'Komputer Asus', 5800000, 'product/20200628071002.jpg', 158, '2020-06-28 14:02:10', '2020-07-12 11:26:04'),
(5, 2, 'printer canon', 2100000, 'product/20200703034306.jpg', 5, '2020-07-03 10:43:06', '2020-07-10 00:34:15'),
(6, 2, 'Laptop Acer', 5600000, 'product/20200712040923.jpg', 6, '2020-07-12 11:09:23', '2020-07-12 11:19:14'),
(7, 2, 'Laptop Dell', 7600000, 'product/20200712041029.jpeg', 6, '2020-07-12 11:10:30', '2020-07-12 11:20:03'),
(8, 2, 'Macbook Apple', 10200000, 'product/20200712041117.jpeg', 8, '2020-07-12 11:11:17', '2020-07-12 11:58:29'),
(9, 3, 'Celana Chino', 560000, 'product/20200712041158.jpg', 20, '2020-07-12 11:11:58', '2020-07-12 11:56:45'),
(10, 3, 'celana pria', 230000, 'product/20200712041231.jpg', 20, '2020-07-12 11:12:31', '2020-07-12 11:21:57'),
(11, 3, 'Celana Katun Pria', 290000, 'product/20200712041305.jpg', 24, '2020-07-12 11:13:05', '2020-07-12 11:22:37'),
(12, 4, 'Binder Clip', 50000, 'product/20200712041337.jpg', 30, '2020-07-12 11:13:37', '2020-07-12 11:24:39'),
(13, 4, 'Binder Folder', 23000, 'product/20200712041353.jpg', 23, '2020-07-12 11:13:53', '2020-07-12 11:25:03'),
(14, 4, 'BallPoint', 25000, 'product/20200712041426.jpg', 20, '2020-07-12 11:14:26', '2020-07-12 11:25:42'),
(15, 4, 'Ballpoin tinta', 15000, 'product/20200712041449.jpg', 60, '2020-07-12 11:14:49', '2020-07-12 11:46:00'),
(16, 4, 'Buku Tulis', 5600, 'product/20200712041511.jpg', 120, '2020-07-12 11:15:11', '2020-07-12 11:26:30'),
(17, 4, 'Buku Album', 7800, 'product/20200712041536.jpg', 50, '2020-07-12 11:15:36', '2020-07-12 11:52:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saledetails`
--

CREATE TABLE `saledetails` (
  `kd_saledetail` int(10) UNSIGNED NOT NULL,
  `no_faktur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_produk` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saledetails`
--

INSERT INTO `saledetails` (`kd_saledetail`, `no_faktur`, `kd_produk`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, '090720000001', 5, 2, 2100000, '2020-07-10 00:34:15', '2020-07-10 00:34:15'),
(2, '120720000001', 17, 20, 7800, '2020-07-12 11:52:38', '2020-07-12 11:52:38'),
(3, '120720000001', 9, 10, 560000, '2020-07-12 11:56:45', '2020-07-12 11:56:45'),
(4, '120720000001', 8, 4, 10200000, '2020-07-12 11:58:29', '2020-07-12 11:58:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saletransactions`
--

CREATE TABLE `saletransactions` (
  `kd_tsale` int(10) UNSIGNED NOT NULL,
  `no_faktur` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kd_agen` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saletransactions`
--

INSERT INTO `saletransactions` (`kd_tsale`, `no_faktur`, `tgl_penjualan`, `kd_agen`, `username`, `total`, `created_at`, `updated_at`) VALUES
(1, '090720000001', '2020-07-09', 2, 'fahmi12', 4200000, '2020-07-10 00:34:15', '2020-07-10 00:34:15'),
(2, '120720000001', '2020-07-12', 2, 'fahmi12', 156000, '2020-07-12 11:52:38', '2020-07-12 11:52:38'),
(3, '120720000001', '2020-07-12', 5, 'fahmi12', 5600000, '2020-07-12 11:56:45', '2020-07-12 11:56:45'),
(4, '120720000001', '2020-07-12', 4, 'fahmi12', 40800000, '2020-07-12 11:58:29', '2020-07-12 11:58:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `kd_supplier` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`kd_supplier`, `nama_supplier`, `alamat_supplier`, `created_at`, `updated_at`) VALUES
(2, 'cv mana doi', 'desa lomaya', '2020-06-27 08:33:15', '2020-06-27 08:33:15'),
(3, 'cv indo makna', 'desa  mongiilo', '2020-06-27 08:35:38', '2020-06-27 08:35:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `kd_transaksi` int(10) UNSIGNED NOT NULL,
  `kd_produk` int(10) UNSIGNED NOT NULL,
  `kd_supplier` int(10) UNSIGNED NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`kd_transaksi`, `kd_produk`, `kd_supplier`, `tgl_transaksi`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(4, 5, 3, '2020-07-09', 7, 2200000, '2020-07-03 11:21:48', '2020-07-03 11:21:48'),
(5, 3, 2, '2020-07-11', 4, 5500000, '2020-07-03 11:22:38', '2020-07-03 11:22:38'),
(6, 6, 2, '2020-07-02', 6, 5000000, '2020-07-12 11:19:14', '2020-07-12 11:19:14'),
(7, 7, 3, '2020-07-09', 6, 7000000, '2020-07-12 11:20:03', '2020-07-12 11:20:03'),
(8, 8, 2, '2020-07-07', 12, 10000000, '2020-07-12 11:20:29', '2020-07-12 11:20:29'),
(9, 3, 3, '2020-07-15', 34, 500000, '2020-07-12 11:21:31', '2020-07-12 11:21:31'),
(10, 10, 3, '2020-07-09', 20, 200000, '2020-07-12 11:21:57', '2020-07-12 11:21:57'),
(11, 11, 2, '2020-07-07', 24, 200000, '2020-07-12 11:22:37', '2020-07-12 11:22:37'),
(13, 12, 2, '2020-07-07', 30, 25000, '2020-07-12 11:24:39', '2020-07-12 11:24:39'),
(14, 13, 3, '2020-07-06', 23, 17000, '2020-07-12 11:25:03', '2020-07-12 11:25:03'),
(15, 14, 3, '2020-07-05', 20, 15600, '2020-07-12 11:25:42', '2020-07-12 11:25:42'),
(16, 3, 2, '2020-07-04', 120, 12500, '2020-07-12 11:26:04', '2020-07-12 11:26:04'),
(17, 16, 2, '2020-07-04', 120, 3900, '2020-07-12 11:26:30', '2020-07-12 11:26:30'),
(18, 17, 2, '2020-07-10', 70, 6600, '2020-07-12 11:26:53', '2020-07-12 11:26:53'),
(19, 9, 2, '2020-07-09', 30, 510000, '2020-07-12 11:45:08', '2020-07-12 11:45:08'),
(20, 15, 3, '2020-07-07', 60, 13000, '2020-07-12 11:46:00', '2020-07-12 11:46:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('staf','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `level`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'Syafrin Ibrahim', 'syafrinibrahim12@gmail.com', NULL, '$2y$10$p1GdoN1fuiOV9pfbzZvilOn4T3uoxlDOhpVd3KYCG.62fB6PoZX5C', NULL, '2020-06-23 10:02:07', '2020-06-23 10:02:07'),
(3, 'dita', 'staf', 'Dita Susanti', 'dita@mail.com', NULL, '$2y$10$lcS3iygEeu2BDVkREe5exO0PVrinxjjXw5wRycyRiFOKBEiDAm5Li', NULL, '2020-06-25 02:41:58', '2020-07-12 10:14:03'),
(4, 'dika', 'staf', 'Dika Cahyani', 'dika@mail.com', NULL, '$2y$10$VhnqiIahP8XeyhhfR.CdaeqEFyYngda9dI82nXPoZD8G8Dftt0V/i', NULL, '2020-06-25 02:41:58', '2020-07-12 10:15:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`kd_agen`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`kd_keranjang`),
  ADD KEY `carts_username_foreign` (`username`),
  ADD KEY `carts_kd_produk_foreign` (`kd_produk`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `products_kd_kategori_foreign` (`kd_kategori`);

--
-- Indeks untuk tabel `saledetails`
--
ALTER TABLE `saledetails`
  ADD PRIMARY KEY (`kd_saledetail`),
  ADD KEY `saledetails_no_faktur_foreign` (`no_faktur`),
  ADD KEY `saledetails_kd_produk_foreign` (`kd_produk`);

--
-- Indeks untuk tabel `saletransactions`
--
ALTER TABLE `saletransactions`
  ADD PRIMARY KEY (`kd_tsale`),
  ADD KEY `saletransactions_kd_agen_foreign` (`kd_agen`),
  ADD KEY `saletransactions_username_foreign` (`username`),
  ADD KEY `saletransactions_no_faktur_index` (`no_faktur`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `transactions_kd_produk_foreign` (`kd_produk`),
  ADD KEY `transactions_kd_supplier_foreign` (`kd_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agents`
--
ALTER TABLE `agents`
  MODIFY `kd_agen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `kd_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `kd_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `kd_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `kd_saledetail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `saletransactions`
--
ALTER TABLE `saletransactions`
  MODIFY `kd_tsale` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `kd_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `kd_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_kd_produk_foreign` FOREIGN KEY (`kd_produk`) REFERENCES `products` (`kd_produk`),
  ADD CONSTRAINT `carts_username_foreign` FOREIGN KEY (`username`) REFERENCES `employes` (`username`);

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_kd_kategori_foreign` FOREIGN KEY (`kd_kategori`) REFERENCES `categories` (`kd_kategori`);

--
-- Ketidakleluasaan untuk tabel `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `saledetails_kd_produk_foreign` FOREIGN KEY (`kd_produk`) REFERENCES `products` (`kd_produk`),
  ADD CONSTRAINT `saledetails_no_faktur_foreign` FOREIGN KEY (`no_faktur`) REFERENCES `saletransactions` (`no_faktur`);

--
-- Ketidakleluasaan untuk tabel `saletransactions`
--
ALTER TABLE `saletransactions`
  ADD CONSTRAINT `saletransactions_kd_agen_foreign` FOREIGN KEY (`kd_agen`) REFERENCES `agents` (`kd_agen`),
  ADD CONSTRAINT `saletransactions_username_foreign` FOREIGN KEY (`username`) REFERENCES `employes` (`username`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_kd_produk_foreign` FOREIGN KEY (`kd_produk`) REFERENCES `products` (`kd_produk`),
  ADD CONSTRAINT `transactions_kd_supplier_foreign` FOREIGN KEY (`kd_supplier`) REFERENCES `suppliers` (`kd_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
