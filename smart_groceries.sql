-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 16 jun 2026 om 09:19
-- Serverversie: 8.0.46
-- PHP-versie: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_groceries`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `job_batches`
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
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_15_000000_create_shopping_lists_table', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `barcode` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `brand`, `image_url`) VALUES
(1, '8712423012345', 'Coca-Cola Zero 1.5L', 'Coca-Cola', 'https://static.ah.nl/dam/product/AHI_51543952567136585144574d4c5f3851524843556951?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(2, '8712423022222', 'Raffaello 230g', 'Ferrero', 'https://static.ah.nl/dam/product/AHI_4354523130303231303635?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(3, '8712423033333', 'AH Halfvolle Melk 1L', 'Albert Heijn', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/29092023_1695995419910_1695995432971_8718452136261_9.png'),
(4, '8712423044444', 'Jumbo Pindakaas 350g', 'Jumbo', 'https://static.ah.nl/dam/product/AHI_434d50323138353333?fileType=binary&rendition=400x400_JPG_Q85&revLabel=4'),
(5, '8712423055555', 'PLUS Volkoren Brood', 'PLUS', 'https://images.ctfassets.net/s0lodsnpsezb/585579_M/d431668f0512e6239238ada9c0059bbd/585579.png?fit=pad&fm=webp&h=380&q=85&w=380'),
(8, '8712423088888', 'Lays Naturel Chips 200g', 'Lays', 'https://static.ah.nl/dam/product/AHI_4a2d70474b616957524b5350706b484862326b4c6741?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(9, '8712423090001', 'Lidl Halfvolle Melk 1L', 'Lidl', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/29092023_1695995419910_1695995432971_8718452136261_9.png'),
(10, '8712423090002', 'Lidl Volkoren Brood', 'Lidl', 'https://images.ctfassets.net/s0lodsnpsezb/585579_M/d431668f0512e6239238ada9c0059bbd/585579.png?fit=pad&fm=webp&h=380&q=85&w=380'),
(11, '8712423090003', 'Lidl Eieren M 10 stuks', 'Lidl', 'https://static.ah.nl/dam/product/AHI_6d4d39766479444a5151615456795564304a31714151?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(12, '8712423090004', 'Lidl Cola Zero 1.5L', 'Freeway', 'https://static.ah.nl/dam/product/AHI_51543952567136585144574d4c5f3851524843556951?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(13, '8712423090011', 'Aldi Halfvolle Melk 1L', 'Aldi', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/29092023_1695995419910_1695995432971_8718452136261_9.png'),
(14, '8712423090012', 'Aldi Tarwebrood', 'Aldi', 'https://images.ctfassets.net/s0lodsnpsezb/585579_M/d431668f0512e6239238ada9c0059bbd/585579.png?fit=pad&fm=webp&h=380&q=85&w=380'),
(15, '8712423090013', 'Aldi Pindakaas 350g', 'Aldi', 'https://static.ah.nl/dam/product/AHI_434d50323138353333?fileType=binary&rendition=400x400_JPG_Q85&revLabel=4'),
(16, '8712423090014', 'Aldi Chips Naturel 200g', 'Snackrite', 'https://static.ah.nl/dam/product/AHI_43545239373932383839?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(17, '8712423090021', 'Jumbo Halfvolle Melk 1L', 'Jumbo', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/29092023_1695995419910_1695995432971_8718452136261_9.png'),
(18, '8712423090022', 'Jumbo Volkoren Brood', 'Jumbo', 'https://images.ctfassets.net/s0lodsnpsezb/585579_M/d431668f0512e6239238ada9c0059bbd/585579.png?fit=pad&fm=webp&h=380&q=85&w=380'),
(19, '8712423090023', 'Jumbo Eieren M 10 stuks', 'Jumbo', 'https://static.ah.nl/dam/product/AHI_6d4d39766479444a5151615456795564304a31714151?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(20, '8712423090024', 'Jumbo Huismerk Chips Naturel 200g', 'Jumbo', 'https://static.ah.nl/dam/product/AHI_43545239373932383839?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(21, '8712423090031', 'AH Volkoren Brood', 'Albert Heijn', 'https://images.ctfassets.net/s0lodsnpsezb/585579_M/d431668f0512e6239238ada9c0059bbd/585579.png?fit=pad&fm=webp&h=380&q=85&w=380'),
(22, '8712423090032', 'AH Eieren M 10 stuks', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_6d4d39766479444a5151615456795564304a31714151?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(23, '8712423090033', 'AH Pindakaas Naturel 350g', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_434d50323138353333?fileType=binary&rendition=400x400_JPG_Q85&revLabel=4'),
(24, '8712423090034', 'AH Chips Naturel 200g', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_36477962715f4170516d6d4f5a586d42573444545877?revLabel=1&rendition=800x800_JPG_Q90&fileType=binary'),
(25, '8712423090035', 'AH Rond volkoren heel', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_4b4d422d355145695167694b7667306d534859427377?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(26, '8712423090036', 'AH Vrije uitloop eieren M 10 stuks', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_6d4d39766479444a5151615456795564304a31714151?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(27, '8712423090037', 'Jumbo Pindakaas Naturel 350g', 'Jumbo', 'https://static.ah.nl/dam/product/AHI_434d50323138353333?fileType=binary&rendition=400x400_JPG_Q85&revLabel=4'),
(28, '8712423090038', 'Jumbo Vrije Uitloop Eieren M/L 10 stuks', 'Jumbo', 'https://static.ah.nl/dam/product/AHI_6d4d39766479444a5151615456795564304a31714151?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(29, '8712423090005', 'Coca-Cola Zero Sugar 1.5L', 'Coca-Cola', 'https://static.ah.nl/dam/product/AHI_51543952567136585144574d4c5f3851524843556951?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(30, '8712423090006', 'Nutella Hazelnootpasta 400g', 'Ferrero', 'https://static.ah.nl/dam/product/AHI_43545239373331303537?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(31, '8712423090007', 'Douwe Egberts Aroma Rood Filterkoffie 500g', 'Douwe Egberts', 'https://static.ah.nl/dam/product/AHI_43545239353733333132?fileType=binary&rendition=400x400_JPG_Q85&revLabel=4'),
(32, '8712423090008', 'Lay\'s Superchips Naturel 200g', 'Lay\'s', 'https://static.ah.nl/dam/product/AHI_43545239373932383839?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(33, '8712423099999', 'AH Bananen Tros', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_4342735756724b545179654d416c7478496c46363077?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(34, '8712423100001', 'AH Goudse Jong Belegen 30+ Plakken 190g', 'Albert Heijn', 'https://static.ah.nl/dam/product/AHI_4354523130323130353435?fileType=binary&rendition=400x400_JPG_Q85&revLabel=1'),
(35, '8712423100002', 'Jumbo Milde Kwark Mager 500g', 'Jumbo', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/15042026_1776260037077_1776260049586_8718452979479_596.png'),
(36, '8712423100003', 'Jumbo Chocolade Hagelslag Melk 600g', 'Jumbo', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/10082023_1691677208252_1691677215348_8718452611737_1.png'),
(37, '8712423100004', 'PLUS Halfvolle Melk 1L', 'PLUS', 'https://www.jumbo.com/dam-images/fit-in/360x360/Products/29092023_1695995419910_1695995432971_8718452136261_9.png'),
(38, '8712423100005', 'PLUS Goudse Jong Belegen 30+ Plakken 190g', 'PLUS', 'https://images.ctfassets.net/s0lodsnpsezb/915063_M/874e5560fcd84cec36afe47cc7d10df5/915063.png?fit=pad&fm=webp&h=380&q=85&w=380');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_prices`
--

CREATE TABLE `product_prices` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `supermarket_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `supermarket_id`, `price`) VALUES
(1, 1, 1, 2.49),
(2, 1, 2, 2.69),
(3, 1, 3, 2.59),
(4, 1, 4, 2.29),
(5, 1, 5, 2.25),
(6, 2, 1, 5.49),
(7, 2, 2, 5.79),
(8, 2, 3, 5.59),
(9, 2, 4, 5.29),
(10, 2, 5, 5.19),
(11, 3, 2, 1.09),
(12, 4, 1, 2.19),
(13, 5, 3, 1.99),
(14, 6, 1, 6.99),
(15, 6, 2, 7.29),
(16, 6, 3, 6.89),
(17, 6, 4, 6.69),
(18, 6, 5, 6.59),
(19, 7, 1, 4.29),
(20, 7, 2, 4.49),
(21, 7, 3, 4.39),
(22, 7, 4, 3.99),
(23, 7, 5, 3.95),
(24, 8, 1, 1.89),
(25, 8, 2, 1.99),
(26, 8, 3, 1.95),
(27, 8, 4, 1.75),
(28, 8, 5, 1.69),
(29, 9, 4, 1.05),
(30, 10, 4, 1.89),
(31, 11, 4, 3.29),
(32, 12, 4, 0.89),
(33, 13, 5, 1.03),
(34, 14, 5, 1.79),
(35, 15, 5, 1.99),
(36, 16, 5, 1.29),
(37, 17, 1, 1.09),
(38, 18, 1, 1.99),
(39, 19, 1, 3.49),
(40, 20, 1, 1.39),
(41, 21, 2, 1.99),
(42, 22, 2, 3.59),
(43, 23, 2, 3.25),
(44, 24, 2, 1.39),
(45, 25, 2, 2.49),
(46, 26, 2, 3.59),
(47, 27, 1, 2.19),
(48, 28, 1, 3.49),
(49, 29, 1, 2.49),
(50, 29, 2, 2.69),
(51, 29, 3, 2.59),
(52, 29, 4, 2.29),
(53, 29, 5, 2.25),
(54, 30, 1, 4.29),
(55, 30, 2, 4.49),
(56, 30, 3, 4.39),
(57, 30, 4, 3.99),
(58, 30, 5, 3.95),
(59, 31, 1, 6.99),
(60, 31, 2, 7.29),
(61, 31, 3, 6.89),
(62, 31, 4, 6.69),
(63, 31, 5, 6.59),
(64, 32, 1, 1.89),
(65, 32, 2, 1.99),
(66, 32, 3, 1.95),
(67, 32, 4, 1.75),
(68, 32, 5, 1.69),
(69, 33, 2, 2.49),
(70, 34, 2, 3.59),
(71, 35, 1, 2.19),
(72, 36, 1, 3.49),
(73, 37, 1, 2.49),
(74, 37, 2, 2.69),
(75, 37, 3, 2.59),
(76, 37, 4, 2.29),
(77, 37, 5, 2.25),
(78, 38, 1, 4.29),
(79, 38, 2, 4.49),
(80, 38, 3, 4.39),
(81, 38, 4, 3.99),
(82, 38, 5, 3.95),
(83, 39, 1, 6.99),
(84, 39, 2, 7.29),
(85, 39, 3, 6.89),
(86, 39, 4, 6.69),
(87, 39, 5, 6.59),
(88, 40, 1, 1.89),
(89, 40, 2, 1.99),
(90, 40, 3, 1.95),
(91, 40, 4, 1.75),
(92, 40, 5, 1.69),
(93, 41, 2, 1.45),
(94, 42, 2, 2.49),
(95, 43, 1, 1.49),
(96, 44, 1, 1.09),
(97, 45, 3, 1.09),
(98, 46, 3, 2.49),
(99, 47, 2, 1.45),
(100, 48, 2, 2.49),
(101, 49, 1, 1.49),
(102, 50, 1, 1.09),
(103, 51, 3, 1.09),
(104, 52, 3, 2.49);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shopping_lists`
--

CREATE TABLE `shopping_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shopping_lists`
--

INSERT INTO `shopping_lists` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Boodschappenlijst 1', '2026-06-16 07:42:52', '2026-06-16 07:42:52'),
(2, 1, 'Boodschappenlijst 2', '2026-06-16 07:49:31', '2026-06-16 07:49:31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shopping_list_items`
--

CREATE TABLE `shopping_list_items` (
  `id` bigint UNSIGNED NOT NULL,
  `shopping_list_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `highest_price` decimal(10,2) DEFAULT NULL,
  `supermarket_id` bigint UNSIGNED DEFAULT NULL,
  `supermarket_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `shopping_list_items`
--

INSERT INTO `shopping_list_items` (`id`, `shopping_list_id`, `product_id`, `name`, `brand`, `image_url`, `price`, `highest_price`, `supermarket_id`, `supermarket_name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Coca-Cola Zero 1.5L', 'Coca-Cola', NULL, 2.49, 2.69, 1, 'Jumbo', 1, '2026-06-16 07:43:01', '2026-06-16 07:43:01'),
(2, 1, 6, 'Douwe Egberts Roodmerk 500g', 'Douwe Egberts', NULL, 6.89, 7.29, 3, 'PLUS', 2, '2026-06-16 07:43:40', '2026-06-16 07:49:02'),
(3, 1, 2, 'Raffaello 230g', 'Ferrero', NULL, 5.49, 5.79, 1, 'Jumbo', 1, '2026-06-16 07:43:58', '2026-06-16 07:43:58'),
(4, 1, 8, 'Lays Naturel Chips 200g', 'Lays', NULL, 1.89, 1.99, 1, 'Jumbo', 1, '2026-06-16 07:44:30', '2026-06-16 07:44:30'),
(5, 1, 7, 'Nutella 400g', 'Ferrero', NULL, 4.29, 4.49, 1, 'Jumbo', 1, '2026-06-16 07:48:25', '2026-06-16 07:48:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `supermarkets`
--

CREATE TABLE `supermarkets` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `supermarkets`
--

INSERT INTO `supermarkets` (`id`, `name`, `logo_url`) VALUES
(1, 'Jumbo', NULL),
(2, 'Albert Heijn', NULL),
(3, 'PLUS', NULL),
(4, 'Lidl', NULL),
(5, 'Aldi', NULL),
(6, 'Lidl', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Lidl-Logo.svg/1200px-Lidl-Logo.svg.png'),
(7, 'Aldi', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/ALDI_Nord_201x_logo.svg/1200px-ALDI_Nord_201x_logo.svg.png'),
(8, 'Lidl', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Lidl-Logo.svg/1200px-Lidl-Logo.svg.png'),
(9, 'Aldi', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/ALDI_Nord_201x_logo.svg/1200px-ALDI_Nord_201x_logo.svg.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo User', 'demo@smartgroceries.nl', NULL, '$2y$12$GJr9fi9p2MsRqzyyFQM9Ju1g1B3cyS/Bur.m8zNvk9Fippj3I4CUu', 'cFYQNZDR4srckWrQWnhMDgvcQNEwFbzYamLx3PfaM93cuOVfIfVqzwaXAAuQ', '2026-06-16 07:40:01', '2026-06-16 07:40:01');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexen voor tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexen voor tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexen voor tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_product_id_index` (`product_id`),
  ADD KEY `product_prices_supermarket_id_index` (`supermarket_id`);

--
-- Indexen voor tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexen voor tabel `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_lists_user_id_foreign` (`user_id`);

--
-- Indexen voor tabel `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shopping_list_items_shopping_list_id_product_id_unique` (`shopping_list_id`,`product_id`);

--
-- Indexen voor tabel `supermarkets`
--
ALTER TABLE `supermarkets`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT voor een tabel `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT voor een tabel `shopping_lists`
--
ALTER TABLE `shopping_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `supermarkets`
--
ALTER TABLE `supermarkets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD CONSTRAINT `shopping_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `shopping_list_items`
--
ALTER TABLE `shopping_list_items`
  ADD CONSTRAINT `shopping_list_items_shopping_list_id_foreign` FOREIGN KEY (`shopping_list_id`) REFERENCES `shopping_lists` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
