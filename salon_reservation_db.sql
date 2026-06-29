-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2026 at 05:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('salon-reservation-cache-../../../../../../../../../../../../../../../../|127.0.0.1', 'i:1;', 1780769508),
('salon-reservation-cache-../../../../../../../../../../../../../../../../|127.0.0.1:timer', 'i:1780769508;', 1780769508),
('salon-reservation-cache-../../../../../../../../../../../../../../../../etc/passwd|127.0.0.1', 'i:1;', 1780769499),
('salon-reservation-cache-../../../../../../../../../../../../../../../../etc/passwd|127.0.0.1:timer', 'i:1780769499;', 1780769499),
('salon-reservation-cache-../../../../../../../../../../../../../../../../windows/system.ini|127.0.0.1', 'i:1;', 1780769481),
('salon-reservation-cache-../../../../../../../../../../../../../../../../windows/system.ini|127.0.0.1:timer', 'i:1780769481;', 1780769481),
('salon-reservation-cache-..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\windows\\system.ini|127.0.0.1', 'i:1;', 1780769490),
('salon-reservation-cache-..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\..\\windows\\system.ini|127.0.0.1:timer', 'i:1780769490;', 1780769490),
('salon-reservation-cache-/|127.0.0.1', 'i:1;', 1780769504),
('salon-reservation-cache-/|127.0.0.1:timer', 'i:1780769504;', 1780769504),
('salon-reservation-cache-/etc/passwd|127.0.0.1', 'i:1;', 1780769495),
('salon-reservation-cache-/etc/passwd|127.0.0.1:timer', 'i:1780769495;', 1780769495),
('salon-reservation-cache-aliali@gmail.com|127.0.0.1', 'i:1;', 1779277124),
('salon-reservation-cache-aliali@gmail.com|127.0.0.1:timer', 'i:1779277124;', 1779277124),
('salon-reservation-cache-andi@gmail.com|127.0.0.1', 'i:2;', 1779265700),
('salon-reservation-cache-andi@gmail.com|127.0.0.1:timer', 'i:1779265700;', 1779265700),
('salon-reservation-cache-anindita@gmail.com|127.0.0.1', 'i:1;', 1781080936),
('salon-reservation-cache-anindita@gmail.com|127.0.0.1:timer', 'i:1781080936;', 1781080936),
('salon-reservation-cache-atha@gmail.com|127.0.0.1', 'i:1;', 1779265677),
('salon-reservation-cache-atha@gmail.com|127.0.0.1:timer', 'i:1779265677;', 1779265677),
('salon-reservation-cache-c:/windows/system.ini|127.0.0.1', 'i:1;', 1780769476),
('salon-reservation-cache-c:/windows/system.ini|127.0.0.1:timer', 'i:1780769476;', 1780769476),
('salon-reservation-cache-c:\\windows\\system.ini|127.0.0.1', 'i:1;', 1780769485),
('salon-reservation-cache-c:\\windows\\system.ini|127.0.0.1:timer', 'i:1780769485;', 1780769485),
('salon-reservation-cache-tesa@gmail.com|127.0.0.1', 'i:1;', 1781161197),
('salon-reservation-cache-tesa@gmail.com|127.0.0.1:timer', 'i:1781161197;', 1781161197),
('salon-reservation-cache-zaproxy@example.com|127.0.0.1', 'i:1;', 1780769438),
('salon-reservation-cache-zaproxy@example.com|127.0.0.1:timer', 'i:1780769438;', 1780769438);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `urutan` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `gambar`, `deskripsi`, `urutan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hair Coloring Art', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80', 'Balayage & ombre terbaik', 1, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(2, 'Nail Art Collection', 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=800&q=80', 'Desain kuku eksklusif', 2, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(3, 'Luxury Facial', 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=800&q=80', 'Perawatan wajah premium', 3, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(4, 'Spa Relaxation', 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=800&q=80', 'Ritual spa eksklusif', 4, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(5, 'Bridal Makeup', 'https://plus.unsplash.com/premium_photo-1661326352695-6cbe1ff74ee9?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Riasan pengantin impian', 5, 1, '2026-05-15 04:33:38', '2026-05-20 04:40:22'),
(6, 'Hair Spa Treatment', 'https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?w=800&q=80', 'Perawatan rambut premium', 6, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(7, 'Eyelash Extension', 'https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?w=800&q=80', 'Extension natural sempurna', 7, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(8, 'Aromatherapy Session', 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=800&q=80', 'Spa aromaterapi holistik', 8, 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hair',
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi_menit` int NOT NULL,
  `harga` decimal(12,2) NOT NULL DEFAULT '0.00',
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('available','unavailable','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `kuota_harian` int NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `kategori`, `deskripsi`, `durasi_menit`, `harga`, `gambar`, `status`, `kuota_harian`, `created_at`, `updated_at`) VALUES
(1, 'Hair Cut & Style', 'hair', 'Potong rambut profesional dengan konsultasi gaya terkini. Termasuk blow dry dan styling sesuai bentuk wajah.', 60, '150000.00', 'https://images.unsplash.com/photo-1560066984-138dadb4c035?w=600&q=80', 'available', 12, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(2, 'Hair Coloring', 'hair', 'Pewarnaan rambut premium dengan produk internasional. Konsultasi warna gratis untuk hasil yang sempurna.', 150, '450000.00', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=80', 'available', 6, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(3, 'Hair Spa & Mask', 'hair', 'Perawatan rambut intensif dengan masker premium dan pijat kepala relaksasi. Cocok untuk rambut rusak & kering.', 90, '220000.00', 'https://images.unsplash.com/photo-1595476108010-b4d1f102b1b1?w=600&q=80', 'available', 10, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(4, 'Smoothing', 'hair', 'Pelurusan rambut dengan teknologi terkini. Rambut lebih lembut, halus, dan tahan lama hingga 6 bulan.', 180, '650000.00', 'https://images.unsplash.com/photo-1582095133179-bfd08e2fb6b8?w=600&q=80', 'available', 4, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(5, 'Keratin Treatment', 'hair', 'Treatment keratin premium untuk rambut lebih berkilau, anti-frizz, dan mudah diatur. Hasil tahan 3–5 bulan.', 180, '800000.00', 'https://images.unsplash.com/photo-1607006483224-a0e8cc7ec48a?w=600&q=80', 'available', 3, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(6, 'Scalp Treatment', 'hair', 'Perawatan kulit kepala mendalam untuk mengatasi ketombe, rambut rontok, dan kulit kepala berminyak.', 75, '280000.00', 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=80', 'available', 8, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(7, 'Manicure Classic', 'nail', 'Perawatan kuku tangan lengkap: shaping, cuticle care, buffing, dan polish dengan pilihan warna eksklusif.', 60, '120000.00', 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=600&q=80', 'available', 10, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(8, 'Pedicure Spa', 'nail', 'Perawatan kuku kaki mewah dengan foot soak aromaterapi, scrub gula, dan massage betis yang menenangkan.', 75, '150000.00', 'https://images.unsplash.com/photo-1519014816548-bf5fe059798b?w=600&q=80', 'available', 10, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(9, 'Nail Art Premium', 'nail', 'Desain kuku artistik custom dengan gel polish, glitter, sticker, dan hand-painted art. Eksklusif & tahan lama.', 90, '200000.00', 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=600&q=80', 'available', 8, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(10, 'Gel Nails Extension', 'nail', 'Perpanjangan kuku dengan gel premium. Tampil elegan dengan kuku panjang alami dan tahan hingga 3 minggu.', 120, '320000.00', 'https://images.unsplash.com/photo-1519014816548-bf5fe059798b?w=600&q=80', 'available', 6, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(11, 'Deep Cleansing Facial', 'face', 'Pembersihan wajah mendalam dengan teknologi ultrasonic dan serum premium untuk kulit bersih bercahaya.', 75, '280000.00', 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=600&q=80', 'available', 8, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(12, 'Anti-Aging Facial', 'face', 'Perawatan anti-penuaan dengan collagen serum, micro-current, dan masker LED. Kulit lebih kencang dan muda.', 90, '450000.00', 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=600&q=80', 'unavailable', 6, '2026-05-15 04:33:38', '2026-06-11 00:15:57'),
(13, 'Eyelash Extension', 'face', 'Pemasangan bulu mata extension natural yang sempurna. Mata terlihat lebih besar dan ekspresif tanpa riasan.', 120, '350000.00', 'https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?w=600&q=80', 'available', 6, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(14, 'Brow Shaping & Styling', 'face', 'Pembentukan alis presisi sesuai bentuk wajah. Termasuk waxing, threading, dan pengisian dengan tinta premium.', 45, '130000.00', 'https://images.unsplash.com/photo-1521747116042-5a810fda9664?w=600&q=80', 'available', 12, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(15, 'Bridal Makeup', 'face', 'Riasan pengantin profesional yang tahan lama. Termasuk konsultasi, trial, dan touch-up kit di hari H.', 180, '1200000.00', 'https://images.unsplash.com/photo-1487412947147-5cebf100d281?w=600&q=80', 'available', 2, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(16, 'Full Body Massage', 'relaxation', 'Pijat tubuh penuh dengan teknik Swedish dan deep tissue. Hilangkan lelah dan ketegangan otot secara menyeluruh.', 90, '320000.00', 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80', 'available', 8, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(17, 'Aromatherapy Spa', 'relaxation', 'Ritual spa aromaterapi dengan essential oil pilihan dan musik relaksasi. Pengalaman spa mewah yang memanjakan.', 120, '480000.00', 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?w=600&q=80', 'available', 6, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(18, 'Hot Stone Therapy', 'relaxation', 'Terapi batu panas vulkanik yang merilekskan otot dan meningkatkan sirkulasi darah. Sensasi spa bintang 5.', 90, '420000.00', 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80', 'available', 6, '2026-05-15 04:33:38', '2026-05-15 04:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_add_role_to_users_table', 1),
(5, '2024_01_01_000002_create_layanan_table', 1),
(6, '2024_01_01_000003_create_profesional_table', 1),
(7, '2024_01_01_000004_create_reservasi_table', 1),
(8, '2024_01_02_000001_update_layanan_add_premium_fields', 1),
(9, '2024_01_02_000002_update_profesional_add_premium_fields', 1),
(10, '2024_01_02_000003_create_galeri_table', 1),
(11, '2024_01_02_000004_create_testimonial_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesional`
--

CREATE TABLE `profesional` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialisasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) NOT NULL DEFAULT '5.0',
  `bio` text COLLATE utf8mb4_unicode_ci,
  `status` enum('available','on_leave','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `jadwal_json` json DEFAULT NULL COMMENT 'Available days: [1,2,3,4,5] = Mon-Fri',
  `pengalaman_tahun` int NOT NULL,
  `tarif` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profesional`
--

INSERT INTO `profesional` (`id`, `nama`, `spesialisasi`, `foto`, `rating`, `bio`, `status`, `jadwal_json`, `pengalaman_tahun`, `tarif`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Wijaya', 'hair', 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=400&q=80', '4.9', 'Spesialis teknik pewarnaan balayage & ombre. Lulusan terbaik dari L\'Oréal Professional Academy Jakarta.', 'available', '[1, 2, 3, 4, 5]', 8, '150000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(2, 'Diana Putri', 'hair', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80', '4.7', 'Ahli potong rambut modern & classic. Berpengalaman menangani berbagai tekstur rambut Asia.', 'available', '[1, 2, 3, 5, 6]', 5, '120000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(3, 'Rina Kusuma', 'hair', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&q=80', '5.0', 'Senior hair artist berpengalaman 12 tahun. Spesialis smoothing, keratin, dan rebonding berkualitas premium.', 'available', '[2, 3, 4, 5, 6]', 12, '200000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(4, 'Maya Sari', 'nail', 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&q=80', '4.8', 'Nail artist creative dengan keahlian 3D nail art dan nail extension. Setiap kuku adalah karya seni.', 'available', '[1, 2, 3, 4, 5, 6]', 6, '100000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(5, 'Lisa Permata', 'nail', 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&q=80', '4.6', 'Spesialis manicure & pedicure spa dengan sentuhan lembut dan detail yang sempurna.', 'available', '[1, 3, 4, 5, 6]', 4, '85000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(6, 'Dr. Fitri Handayani', 'face', 'https://plus.unsplash.com/premium_photo-1661405696739-b938b2a58996?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', '5.0', 'Dokter kecantikan bersertifikat dengan keahlian perawatan kulit medis dan anti-aging. Konsultasi kulit gratis.', 'available', '[1, 2, 4, 5]', 12, '250000.00', '2026-05-15 04:33:38', '2026-05-20 04:44:35'),
(7, 'Nadia Rahmawati', 'face', 'https://images.unsplash.com/photo-1542206395-9feb3edaa68d?w=400&q=80', '4.8', 'Makeup artist & facial therapist dengan spesialisasi eyelash extension dan brow styling terkini.', 'available', '[1, 2, 3, 4, 5, 6]', 7, '180000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(8, 'Dewi Anggraini', 'relaxation', 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=400&q=80', '4.9', 'Certified spa therapist dari Bali Spa Academy. Ahli dalam aromatherapy, hot stone, dan Swedish massage.', 'available', '[1, 2, 3, 4, 5]', 9, '220000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(9, 'Reni Maharani', 'relaxation', 'https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?w=400&q=80', '4.7', 'Terapis spa dengan keahlian deep tissue massage dan terapi relaksasi holistik.', 'on_leave', '[2, 3, 4, 5, 6]', 5, '180000.00', '2026-05-15 04:33:38', '2026-05-15 04:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `layanan_id` bigint UNSIGNED NOT NULL,
  `profesional_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','confirmed','done','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `user_id`, `layanan_id`, `profesional_id`, `tanggal`, `jam`, `status`, `nama_pemesan`, `no_hp`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 2, '2026-05-22', '14:00', 'confirmed', 'tesa', '089765431262', NULL, '2026-05-15 06:51:09', '2026-05-15 06:51:31'),
(2, 2, 10, 5, '2026-05-28', '14:00', 'confirmed', 'tesa', '089765431262', NULL, '2026-05-15 07:00:31', '2026-05-15 07:01:02'),
(3, 3, 1, 1, '2026-05-28', '14:00', 'confirmed', 'atha', '0888981762', '-', '2026-05-19 21:42:59', '2026-05-19 21:45:33'),
(4, 4, 17, 8, '2026-05-21', '10:00', 'cancelled', 'ali', '089765431837', NULL, '2026-05-20 02:19:04', '2026-06-09 00:18:05'),
(5, 4, 2, 1, '2026-05-30', '10:00', 'confirmed', 'ali', '087564736542', NULL, '2026-05-20 04:46:58', '2026-06-09 00:17:59'),
(6, 5, 10, 5, '2026-06-21', '15:00', 'done', 'allen deviana ayu', '081574821255', NULL, '2026-05-20 22:32:07', '2026-06-09 00:17:45'),
(7, 6, 12, 6, '2026-06-11', '11:00', 'confirmed', 'anin', '083467451243', NULL, '2026-06-09 00:13:25', '2026-06-09 00:17:55'),
(8, 7, 1, 1, '2026-06-12', '11:00', 'confirmed', 'tesa', '09207239644', NULL, '2026-06-11 00:01:36', '2026-06-11 00:15:35'),
(9, 7, 1, 3, '2026-06-12', '16:00', 'confirmed', 'tesa', '08947362598', NULL, '2026-06-11 00:11:22', '2026-06-11 00:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qh1DAC8Gn7vjIyWwR0W3zYB6PfzWnwkXMl0218Wb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1U1WGpsYW5KNGs1NjAwZjM1RWxidDAyU1F5MnZkNlkwV3VWVWNiWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7czo1OiJyb3V0ZSI7czo4OiJyZWdpc3RlciI7fX0=', 1781160670),
('tB3yMDeRvOPE8FShVZJ21GS3GTz2BxXjizzvqLaW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjgwejdPd2d1S0VvbHo2dTJDQUNkQlZINFY5eGVRNkNKZGxVUXdDRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9fQ==', 1781165411);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint UNSIGNED NOT NULL DEFAULT '5',
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `layanan_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `nama`, `avatar`, `rating`, `komentar`, `layanan_label`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Anindita Rahma', 'https://ui-avatars.com/api/?name=Anindita+Rahma&background=D9B8A8&color=8B6B61&size=200', 5, 'Pengalaman yang luar biasa! Rambut saya terasa lebih hidup dan berkilau setelah hair spa. Staff sangat ramah dan profesional.', 'Hair Spa & Mask', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(2, 'Bella Oktaviani', 'https://ui-avatars.com/api/?name=Bella+Oktaviani&background=E8D8C8&color=8B6B61&size=200', 5, 'Nail art di sini selalu hasilnya bagus banget! Maya sangat kreatif dan sabar. Sudah langganan 2 tahun.', 'Nail Art Premium', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(3, 'Clarissa Dewi', 'https://ui-avatars.com/api/?name=Clarissa+Dewi&background=D9B8A8&color=8B6B61&size=200', 5, 'Facial treatment terbaik yang pernah saya coba. Kulit terasa bersih dan glowing. Dr. Fitri sangat informatif.', 'Anti-Aging Facial', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(4, 'Dinda Maharani', 'https://ui-avatars.com/api/?name=Dinda+Maharani&background=C6A27E&color=fff&size=200', 5, 'Aromatherapy spa di sini bikin jiwa raga relaks total. Suasananya tenang dan mewah. Wajib datang lagi!', 'Aromatherapy Spa', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(5, 'Eka Fitriani', 'https://ui-avatars.com/api/?name=Eka+Fitriani&background=8B6B61&color=fff&size=200', 4, 'Booking sangat mudah dan cepat. Sarah melakukan keratin treatment dengan sangat baik. Hasilnya bertahan lama!', 'Keratin Treatment', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38'),
(6, 'Farida Kusuma', 'https://ui-avatars.com/api/?name=Farida+Kusuma&background=D9B8A8&color=8B6B61&size=200', 5, 'Makeup pengantin saya sungguh memukau! Nadia sangat detail dan hasilnya fotogenik. Semua tamu memuji.', 'Bridal Makeup', 1, '2026-05-15 04:33:38', '2026-05-15 04:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `no_hp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Salon', 'admin@salon.com', '2026-05-15 04:33:38', '$2y$12$4IwuPBiDZIQIgFmbZU/7G.gerq3Il8kqMoinClSluaGUE494.BsuS', 'admin', '081234567890', '6oX065ycXhEviPzpqLc9WUytE9kMpELTH4TK6hZuU59NXm08oSyPzF5dSPwC', '2026-05-15 04:33:38', '2026-05-15 06:02:46'),
(2, 'tesa', 'tesa@gmail.com', NULL, '$2y$12$oJp.WpXDb6iyGF9D7Jr.qOtKLrUVgWjSIECLu1QtY4M1F9n6Yp822', 'user', NULL, NULL, '2026-05-15 06:49:52', '2026-05-15 06:49:52'),
(3, 'atha', 'atha@gmail.com', NULL, '$2y$12$ihbe4.6Lmf3Q4EJ1YxNpCeT.9Q/lNXf6ITEHhTBaQoQVGbWPP14w.', 'user', NULL, NULL, '2026-05-19 21:41:43', '2026-05-19 21:41:43'),
(4, 'ali', 'aliali12@gmail.com', NULL, '$2y$12$HzBfXHIM57lpYGli.WoPz.z0UngIpo8r5kvmQp7Ao31C4haxnSYsC', 'user', NULL, NULL, '2026-05-20 01:28:23', '2026-05-20 01:28:23'),
(5, 'allen deviana ayu', '24091397126@mhs.unesa.ac.id', NULL, '$2y$12$uFpsJmDxM.aRgBnyMkHxd./K7/4LKi0wvLkpwjOgP7pYn/lp2wThe', 'user', NULL, NULL, '2026-05-20 22:31:04', '2026-05-20 22:31:04'),
(6, 'anin', 'anin@gmail.com', NULL, '$2y$12$9lQeoXKfEbxPWQdU5vI1xuMjJwp/GyvmWteGqDfOn3/3Yzb8WFUGK', 'user', '087564736542', NULL, '2026-06-09 00:10:39', '2026-06-09 00:14:16'),
(7, 'tesa', 'tesaagri@gmail.com', NULL, '$2y$12$VvE5Ze6r/JQBguJphLZu3e5VcOSIjn7YY1pAbD/1enuc4ajZzlmWu', 'user', NULL, NULL, '2026-06-11 00:00:08', '2026-06-11 00:00:08'),
(8, 'allen', 'allend@gmail.com', NULL, '$2y$12$Pgx24Qxy1HA8Zp58/eWjvOEo9aDvHqE.TBA6ykreQO0sej4m4Exou', 'user', NULL, NULL, '2026-06-11 00:13:18', '2026-06-11 00:13:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profesional`
--
ALTER TABLE `profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_booking_slot` (`profesional_id`,`tanggal`,`jam`,`status`),
  ADD KEY `reservasi_user_id_foreign` (`user_id`),
  ADD KEY `reservasi_layanan_id_foreign` (`layanan_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profesional`
--
ALTER TABLE `profesional`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_profesional_id_foreign` FOREIGN KEY (`profesional_id`) REFERENCES `profesional` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
