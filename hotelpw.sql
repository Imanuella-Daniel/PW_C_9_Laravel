-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2024 pada 03.19
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
-- Database: `hotelpw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `IDFasilitas` int(11) NOT NULL,
  `NamaFasilitas` varchar(255) NOT NULL,
  `Kapasitas` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `Biaya` decimal(10,2) NOT NULL,
  `Facility` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Rating` float NOT NULL,
  `Gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`IDFasilitas`, `NamaFasilitas`, `Kapasitas`, `Deskripsi`, `Biaya`, `Facility`, `Status`, `Rating`, `Gambar`) VALUES
(1, 'Meeting Room', 14, 'This meeting room can accommodate up to 14 people, making it ideal for business meetings, strategic sessions....', 900000.00, 'LCD Projector, Free Wireless Internet, 2x Snack & 1x meal, Air Conditioner, Toilet', 'Available', 5, 'img/ruangPertemuan.jpg'),
(2, 'Romantic Dining', 2, 'Enjoy an intimate and elegant dining experience, perfect for couples celebrating special moments. Guests will be treated....', 700000.00, 'Meja', 'Available', 4.5, 'img/dining.jpg\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `NoKamar` int(11) NOT NULL,
  `TipeKamar` varchar(50) DEFAULT NULL,
  `Kapasitas` int(11) DEFAULT NULL,
  `JumlahKamar` int(11) DEFAULT NULL,
  `HargaKamar` decimal(10,2) DEFAULT NULL,
  `Desc` varchar(1000) DEFAULT NULL,
  `Facility` text DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`NoKamar`, `TipeKamar`, `Kapasitas`, `JumlahKamar`, `HargaKamar`, `Desc`, `Facility`, `Status`, `photo`) VALUES
(117, 'Deluxe', 2, 25, 1490542.00, 'All Premiere Rooms feature a spacious balcony with views of the lush Royal Garden. Additional amenities include a complimentary minibar, Wi-Fi, coffee & tea equipment, iron and ironing board, hairdryer, smart LED TV, in-room safe, and premium bedding with pillow-top mattresses.', 'Smart LED TV, Safe, Wi-Fi, Complimentary Minibar, Coffee & Tea Equipment, Iron and Ironing Board, Hairdryer, Spacious Balcony, Premium Bedding with Pillow-Top Mattresses.', 'booked', 'uploads/GsdP7ySH7bcXfPVlkmzuxnFx1HnXFuT6sPAGnzL6.jpg'),
(118, 'Superior', 2, 20, 1850142.00, 'The Superior Rooms are spacious corner rooms, elegantly designed for both leisure and business travelers. Each room features a mini sofa set and a private balcony with views of the swimming pool, Royal Garden, or the cultural heritage site Kedhaton Ambarrukmo. Amenities include a complimentary minibar, bathrobe, Wi-Fi, coffee & tea equipment, iron and ironing board, hairdryer, smart LED TV, in-room safe, and premium bedding with pillow-top mattresses for an exceptional stay.', 'Smart LED TV, Safe, Wi-Fi, Complimentary Minibar, Coffee & Tea Equipment, Iron and Ironing Board, Hairdryer, Bathrobe, Mini Sofa Set, Private Balcony, Premium Bedding with Pillow-Top Mattresses.', 'available', 'uploads/wQIg88gaYTMs5i0F5foBhwOFzHWvR4vV38QZn78Q.jpg'),
(119, 'Junior Suite', 3, 15, 4157500.00, 'The 60-square-meter suite features a long sofa and a balcony with views of Merapi volcano for ultimate comfort. It includes access to the luxurious Royal Club Lounge, along with amenities such as a complimentary minibar, bathrobe, Wi-Fi, coffee & tea equipment, iron and ironing board, hairdryer, smart LED TV, in-room safe, and premium bedding with pillow-top mattresses for a perfect stay.', 'Smart LED TV, Safe, Wi-Fi, Complimentary Minibar, Coffee & Tea Equipment, Iron and Ironing Board, Hairdryer, Bathrobe, Long Sofa, Balcony with Merapi Volcano Scenery, Premium Bedding with Pillow-Top Mattresses, Access to the Royal Club Lounge.', 'available', 'uploads/vtLYuFfI3RB5UO4GGv3moHMLvFzHvuYe4baMLvKY.jpg'),
(120, 'Suite', 3, 15, 9007500.00, 'The 120-square-meter Atma Suite offers stunning views of Merapi volcano, featuring an elegant bedroom, living room, dining area, and pantry. It includes access to the Royal Club Lounge and amenities such as a minibar, bathrobe, bathtub, Wi-Fi, coffee & tea equipment, iron and ironing board, hairdryer, in-room safe, Salvatore Ferragamo bath products, and premium bedding with pillow-top mattresses.', 'Smart LED TV, Safe, Wi-Fi, Complimentary Minibar, Coffee & Tea Equipment, Iron and Ironing Board, Hairdryer, Bathrobe, Bathtub, Salvatore Ferragamo Bath Amenities, Living Room, Dining Area, Pantry, Balcony with Merapi Volcano Scenery, Premium Bedding with Pillow-Top Mattresses, Access to the Royal Club Lounge.', 'available', 'uploads/ZUljxlyABXRqF5yYdYZWX9SoiAV3cpDbEt0OC2VE.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_06_120718_add_timestamps_to_user_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesananfasilitas`
--

CREATE TABLE `pemesananfasilitas` (
  `IDFasilitas` int(11) NOT NULL,
  `NamaFasilitas` varchar(100) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Biaya` decimal(10,2) DEFAULT NULL,
  `NoTransaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesananfasilitas`
--

INSERT INTO `pemesananfasilitas` (`IDFasilitas`, `NamaFasilitas`, `Deskripsi`, `Biaya`, `NoTransaksi`) VALUES
(1, '1', '1', 1.00, NULL),
(2, NULL, NULL, NULL, 29),
(3, NULL, NULL, NULL, 30),
(4, NULL, NULL, NULL, 31),
(5, NULL, NULL, NULL, 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanankamar`
--

CREATE TABLE `pemesanankamar` (
  `IDPesanan` int(11) NOT NULL,
  `NoTransaksi` int(11) DEFAULT NULL,
  `NoKamar` int(11) DEFAULT NULL,
  `TanggalPesan` date DEFAULT NULL,
  `JumlahDewasa` int(11) DEFAULT NULL,
  `JumlahAnak` int(11) DEFAULT NULL,
  `PermintaanKhusus` text DEFAULT NULL,
  `TanggalCheckIn` date DEFAULT NULL,
  `TanggalCheckOut` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanankamar`
--

INSERT INTO `pemesanankamar` (`IDPesanan`, `NoTransaksi`, `NoKamar`, `TanggalPesan`, `JumlahDewasa`, `JumlahAnak`, `PermintaanKhusus`, `TanggalCheckIn`, `TanggalCheckOut`) VALUES
(19, 16, 119, '2024-12-17', 1, 0, '111', '2024-12-18', '2024-12-20'),
(21, 18, 120, '2024-12-17', 4, 0, 'Mau makan', '2024-12-18', '2024-12-28'),
(22, 19, 120, '2024-12-17', 1, 0, '123', '2024-12-18', '2024-12-26'),
(28, 32, 120, '2024-12-18', 1, 0, 'Makan ayam', '2024-12-18', '2024-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('81hb2VFWBzFnKKvnREfjELidMx1SnDrfAgMIEYqh', 16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibHFkNGFXUGUwNm9aMkg0MWhRTU5XQW9aV056ZVd0VE1MQXNRZmF0aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTY7czoxMToicm9vbURldGFpbHMiO2E6OTp7czo3OiJOb0thbWFyIjtpOjEyMDtzOjQ6Im5hbWUiO3M6NToiU3VpdGUiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjM5OToiVGhlIDEyMC1zcXVhcmUtbWV0ZXIgQXRtYSBTdWl0ZSBvZmZlcnMgc3R1bm5pbmcgdmlld3Mgb2YgTWVyYXBpIHZvbGNhbm8sIGZlYXR1cmluZyBhbiBlbGVnYW50IGJlZHJvb20sIGxpdmluZyByb29tLCBkaW5pbmcgYXJlYSwgYW5kIHBhbnRyeS4gSXQgaW5jbHVkZXMgYWNjZXNzIHRvIHRoZSBSb3lhbCBDbHViIExvdW5nZSBhbmQgYW1lbml0aWVzIHN1Y2ggYXMgYSBtaW5pYmFyLCBiYXRocm9iZSwgYmF0aHR1YiwgV2ktRmksIGNvZmZlZSAmIHRlYSBlcXVpcG1lbnQsIGlyb24gYW5kIGlyb25pbmcgYm9hcmQsIGhhaXJkcnllciwgaW4tcm9vbSBzYWZlLCBTYWx2YXRvcmUgRmVycmFnYW1vIGJhdGggcHJvZHVjdHMsIGFuZCBwcmVtaXVtIGJlZGRpbmcgd2l0aCBwaWxsb3ctdG9wIG1hdHRyZXNzZXMuIjtzOjU6InByaWNlIjtzOjEwOiI5MDA3NTAwLjAwIjtzOjE0OiJmb3JtYXR0ZWRQcmljZSI7czoxMzoiUnAuIDkuMDA3LjUwMCI7czoxMDoiZmFjaWxpdGllcyI7czozMTE6IlNtYXJ0IExFRCBUViwgU2FmZSwgV2ktRmksIENvbXBsaW1lbnRhcnkgTWluaWJhciwgQ29mZmVlICYgVGVhIEVxdWlwbWVudCwgSXJvbiBhbmQgSXJvbmluZyBCb2FyZCwgSGFpcmRyeWVyLCBCYXRocm9iZSwgQmF0aHR1YiwgU2FsdmF0b3JlIEZlcnJhZ2FtbyBCYXRoIEFtZW5pdGllcywgTGl2aW5nIFJvb20sIERpbmluZyBBcmVhLCBQYW50cnksIEJhbGNvbnkgd2l0aCBNZXJhcGkgVm9sY2FubyBTY2VuZXJ5LCBQcmVtaXVtIEJlZGRpbmcgd2l0aCBQaWxsb3ctVG9wIE1hdHRyZXNzZXMsIEFjY2VzcyB0byB0aGUgUm95YWwgQ2x1YiBMb3VuZ2UuIjtzOjY6ImltYWdlcyI7czo1MjoidXBsb2Fkcy9aVWxqeGx5QUJYUnFGNXlZZFlaV1g5U29pQVYzY3BEYkV0ME9DMlZFLmpwZyI7czoxNDoiVGFuZ2dhbENoZWNrSW4iO3M6MDoiIjtzOjE1OiJUYW5nZ2FsQ2hlY2tPdXQiO3M6MDoiIjt9czoxNToiZmFjaWxpdHlEZXRhaWxzIjthOjg6e3M6MTE6IklERmFzaWxpdGFzIjtpOjE7czo0OiJuYW1lIjtzOjEyOiJNZWV0aW5nIFJvb20iO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjExMjoiVGhpcyBtZWV0aW5nIHJvb20gY2FuIGFjY29tbW9kYXRlIHVwIHRvIDE0IHBlb3BsZSwgbWFraW5nIGl0IGlkZWFsIGZvciBidXNpbmVzcyBtZWV0aW5ncywgc3RyYXRlZ2ljIHNlc3Npb25zLi4uLiI7czo1OiJwcmljZSI7czo5OiI5MDAwMDAuMDAiO3M6MTQ6ImZvcm1hdHRlZFByaWNlIjtzOjExOiJScC4gOTAwLjAwMCI7czoxMDoiZmFjaWxpdGllcyI7czo4MjoiTENEIFByb2plY3RvciwgRnJlZSBXaXJlbGVzcyBJbnRlcm5ldCwgMnggU25hY2sgJiAxeCBtZWFsLCBBaXIgQ29uZGl0aW9uZXIsIFRvaWxldCI7czo2OiJpbWFnZXMiO3M6MjI6ImltZy9ydWFuZ1BlcnRlbXVhbi5qcGciO3M6MTQ6IlRhbmdnYWxCb29raW5nIjtzOjA6IiI7fX0=', 1734488276);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `NoTransaksi` int(11) NOT NULL,
  `IDUser` int(11) DEFAULT NULL,
  `TanggalPembayaran` date DEFAULT NULL,
  `MetodePembayaran` varchar(50) DEFAULT NULL,
  `NoKartu` varchar(20) DEFAULT NULL,
  `BiayaKamar` decimal(10,2) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`NoTransaksi`, `IDUser`, `TanggalPembayaran`, `MetodePembayaran`, `NoKartu`, `BiayaKamar`, `Status`) VALUES
(11, 12, '2024-12-16', 'e_money', '11', 7.00, 'Berhasil'),
(12, 12, '2024-12-16', 'e_money', '123', 7.00, 'Berhasil'),
(13, 12, '2024-12-16', 'e_money', '123', 7.00, 'Berhasil'),
(14, 12, '2024-12-16', 'e_money', '1234', 1.00, 'Berhasil'),
(15, 12, '2024-12-17', 'e_money', '085254666666', 12605778.00, 'Berhasil'),
(16, 14, '2024-12-17', 'e_money', '12344', 8315000.00, 'Berhasil'),
(17, 12, '2024-12-17', 'e_money', '11', 2801284.00, 'Berhasil'),
(18, 12, '2024-12-17', 'e_money', '111', 90075000.00, 'Berhasil'),
(19, 14, '2024-12-17', 'e_money', '111', 72060000.00, 'Berhasil'),
(20, 14, '2024-12-17', 'bank_transfer', '111', 14006420.00, 'Berhasil'),
(21, 14, '2024-12-17', 'e_money', '11', 11205136.00, 'Berhasil'),
(22, 12, '2024-12-17', 'bank_transfer', '11', 11205136.00, 'Berhasil'),
(23, 12, '2024-12-17', 'bank_transfer', '11', NULL, 'Berhasil'),
(24, 12, '2024-12-17', 'bank_transfer', '11', NULL, 'Berhasil'),
(25, 12, '2024-12-17', 'bank_transfer', '1', 2801284.00, 'Berhasil'),
(26, 12, '2024-12-17', 'bank_transfer', '11', NULL, 'Berhasil'),
(27, 12, '2024-12-18', 'bank_transfer', '11', 45037500.00, 'Berhasil'),
(28, 12, '2024-12-18', 'bank_transfer', '11', NULL, 'Berhasil'),
(29, 12, '2024-12-18', 'bank_transfer', '11', NULL, 'Berhasil'),
(30, 12, '2024-12-18', 'bank_transfer', '11', NULL, 'Berhasil'),
(31, 12, '2024-12-18', 'bank_transfer', '11', NULL, 'Berhasil'),
(32, 16, '2024-12-18', 'bank_transfer', '11', 72060000.00, 'Berhasil'),
(33, 16, '2024-12-18', 'bank_transfer', '11', NULL, 'Berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `NamaBelakang` varchar(50) DEFAULT NULL,
  `NamaDepan` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `NoTelepon` varchar(15) DEFAULT NULL,
  `Negara` varchar(50) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IDUser`, `NamaBelakang`, `NamaDepan`, `Email`, `NoTelepon`, `Negara`, `Alamat`, `Username`, `Password`, `Foto`, `created_at`, `updated_at`) VALUES
(12, 'Daniel', 'Imanuellaaaa', 'ella@gmail.com', '8525460694567', 'Indonesia', 'Tambak bayan 7 no 8b', 'Ella', '$2y$12$IQeKZDAP13u9gAdAnBVCxOJQc5DzB9Rz1Zcy2llP.N8dbP.ou87yq', NULL, '2024-12-07 11:56:26', '2024-12-17 17:07:23'),
(14, 'Rakhel', 'Tesya', '123@gmail.com', '12345678912', 'Indonesia', 'Tambak bayan 7 no 8b', 'Tesya02', '$2y$12$VjuACzLfjAeV44fuWR8hleCpoG54BLBBGshwhETn7nJFOMhFWXqeO', NULL, '2024-12-17 05:55:43', '2024-12-17 05:55:43'),
(15, '1', '1', '11123@gmail.com', '111', 'Indonesia', 'Tambak bayan 7 no 8b', '123', '$2y$12$Pz9z1O/eWx4G1wUJ.5SYJeIe9CfH2JWETDtzyBZtMQLJAUQihgZUu', NULL, '2024-12-17 18:28:45', '2024-12-17 18:28:45'),
(16, 'niiii', 'Ima', 'ella@gmail.com', '123455555', 'Indonesia', 'Tambak bayan 7 no 8b', 'Ella123', '$2y$12$u.ubZZQYHBIstgSApnoyPu2XRD/KjliAgK2Nr.COOWJVyVzxaNQXC', NULL, '2024-12-17 18:56:18', '2024-12-17 18:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`IDFasilitas`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`NoKamar`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemesananfasilitas`
--
ALTER TABLE `pemesananfasilitas`
  ADD PRIMARY KEY (`IDFasilitas`),
  ADD KEY `fk_transaksi_fasilitas` (`NoTransaksi`);

--
-- Indeks untuk tabel `pemesanankamar`
--
ALTER TABLE `pemesanankamar`
  ADD PRIMARY KEY (`IDPesanan`),
  ADD KEY `pemesanankamar_ibfk_1` (`NoTransaksi`),
  ADD KEY `pemesanankamar_ibfk_2` (`NoKamar`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NoTransaksi`),
  ADD KEY `transaksi_ibfk_1` (`IDUser`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `IDFasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `NoKamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesananfasilitas`
--
ALTER TABLE `pemesananfasilitas`
  MODIFY `IDFasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemesanankamar`
--
ALTER TABLE `pemesanankamar`
  MODIFY `IDPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `NoTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesananfasilitas`
--
ALTER TABLE `pemesananfasilitas`
  ADD CONSTRAINT `fk_transaksi_fasilitas` FOREIGN KEY (`NoTransaksi`) REFERENCES `transaksi` (`NoTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanankamar`
--
ALTER TABLE `pemesanankamar`
  ADD CONSTRAINT `pemesanankamar_ibfk_1` FOREIGN KEY (`NoTransaksi`) REFERENCES `transaksi` (`NoTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanankamar_ibfk_2` FOREIGN KEY (`NoKamar`) REFERENCES `kamar` (`NoKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
