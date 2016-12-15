-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~trusty.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2016 at 07:12 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `postId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `userId`, `postId`, `created_at`, `updated_at`) VALUES
(96, 14, 75, '2016-12-01 08:59:16', '2016-12-01 08:59:16'),
(197, 59, 97, '2016-12-09 11:20:50', '2016-12-09 11:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `user_id`, `created_at`, `updated_at`) VALUES
(90, 11, 11, '2016-11-23 11:03:08', '2016-11-23 11:03:08'),
(96, 8, 8, '2016-11-24 08:02:54', '2016-11-24 08:02:54'),
(99, 12, 12, '2016-11-25 10:31:10', '2016-11-25 10:31:10'),
(104, 12, 11, '2016-11-25 10:31:33', '2016-11-25 10:31:33'),
(106, 12, 8, '2016-11-25 10:31:39', '2016-11-25 10:31:39'),
(115, 13, 13, '2016-12-01 06:44:56', '2016-12-01 06:44:56'),
(121, 14, 14, '2016-12-01 08:40:19', '2016-12-01 08:40:19'),
(122, 14, 11, '2016-12-01 08:40:39', '2016-12-01 08:40:39'),
(132, 19, 19, '2016-12-01 09:15:47', '2016-12-01 09:15:47'),
(133, 19, 11, '2016-12-01 10:00:06', '2016-12-01 10:00:06'),
(137, 20, 8, '2016-12-01 10:15:05', '2016-12-01 10:15:05'),
(138, 20, 13, '2016-12-01 10:15:07', '2016-12-01 10:15:07'),
(139, 19, 20, '2016-12-01 10:28:51', '2016-12-01 10:28:51'),
(147, 19, 17, '2016-12-01 11:39:03', '2016-12-01 11:39:03'),
(148, 19, 8, '2016-12-01 11:39:09', '2016-12-01 11:39:09'),
(149, 19, 15, '2016-12-01 11:39:20', '2016-12-01 11:39:20'),
(164, 22, 22, '2016-12-07 03:13:30', '2016-12-07 03:13:30'),
(165, 22, 17, '2016-12-07 03:13:41', '2016-12-07 03:13:41'),
(166, 22, 19, '2016-12-07 03:13:58', '2016-12-07 03:13:58'),
(180, 12, 23, '2016-12-08 12:07:53', '2016-12-08 12:07:53'),
(182, 12, 13, '2016-12-08 12:08:35', '2016-12-08 12:08:35'),
(214, 11, 19, '2016-12-09 07:14:46', '2016-12-09 07:14:46'),
(215, 56, 56, '2016-12-09 08:52:31', '2016-12-09 08:52:31'),
(216, 57, 57, '2016-12-09 09:09:36', '2016-12-09 09:09:36'),
(219, 57, 8, '2016-12-09 09:10:08', '2016-12-09 09:10:08'),
(220, 57, 53, '2016-12-09 09:10:22', '2016-12-09 09:10:22'),
(226, 58, 58, '2016-12-09 10:43:45', '2016-12-09 10:43:45'),
(227, 59, 59, '2016-12-09 11:15:20', '2016-12-09 11:15:20'),
(229, 59, 56, '2016-12-09 11:19:08', '2016-12-09 11:19:08'),
(230, 59, 11, '2016-12-09 11:19:10', '2016-12-09 11:19:10'),
(232, 59, 57, '2016-12-09 11:19:15', '2016-12-09 11:19:15'),
(233, 59, 14, '2016-12-09 11:20:52', '2016-12-09 11:20:52'),
(234, 59, 22, '2016-12-09 11:21:04', '2016-12-09 11:21:04'),
(236, 59, 19, '2016-12-09 11:21:10', '2016-12-09 11:21:10'),
(237, 59, 17, '2016-12-09 11:21:12', '2016-12-09 11:21:12'),
(241, 59, 8, '2016-12-09 11:21:36', '2016-12-09 11:21:36'),
(242, 59, 13, '2016-12-09 11:21:38', '2016-12-09 11:21:38'),
(244, 59, 12, '2016-12-09 11:21:41', '2016-12-09 11:21:41'),
(246, 59, 53, '2016-12-09 11:21:44', '2016-12-09 11:21:44'),
(249, 59, 23, '2016-12-09 11:21:47', '2016-12-09 11:21:47'),
(251, 59, 20, '2016-12-09 11:21:50', '2016-12-09 11:21:50'),
(253, 59, 58, '2016-12-09 11:21:59', '2016-12-09 11:21:59'),
(265, 12, 14, '2016-12-12 06:32:31', '2016-12-12 06:32:31'),
(338, 3, 5, '2016-12-15 12:52:45', '2016-12-15 12:52:45'),
(339, 3, 8, '2016-12-15 12:52:50', '2016-12-15 12:52:50'),
(340, 3, 3, '2016-12-15 12:53:53', '2016-12-15 12:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `mapLocation`
--

CREATE TABLE `mapLocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `place_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mapLocation`
--

INSERT INTO `mapLocation` (`id`, `name`, `latitude`, `longitude`, `place_id`, `created_at`, `updated_at`) VALUES
(1, 'Kochi', 9.9967, 76.3009, 'ChIJqfN2-QgNCDsRVNRu8ES0zek', NULL, NULL),
(2, 'Infopark', 10.0147, 76.3636, 'ChIJl2yiMX0LCDsRSoF_6qUXLwU', NULL, NULL),
(3, 'Kaloor', 10.0001, 76.2906, 'ChIJHW_QfWwNCDsRo-417qp77Ck', NULL, NULL),
(4, 'Kaloor, Kochi, Kerala, India', 9.99507, 76.2922, 'ChIJsUcT7hMNCDsRxKruGn0myYk', '2016-11-18 12:15:40', '2016-11-18 12:15:40'),
(5, 'Palarivattom Bypass, Ernakulam', 10.0051, 76.313, 'ChIJV4BwkhwNCDsRZC97ySoJgJ8', '2016-11-18 12:20:26', '2016-11-18 12:20:26'),
(6, 'Muscat Governorate, Oman', 23.6227, 58.1684, 'ChIJ0WK2tavykT4RYWFJzBe5lcY', '2016-11-18 12:21:23', '2016-11-18 12:21:23'),
(7, 'Muscat, Oman', 23.5957, 58.5428, 'ChIJya-ah6j_kT4RLKd5DW2HU9s', '2016-11-18 12:22:15', '2016-11-18 12:22:15'),
(8, 'Dubai - UAE', 25.1413, 55.1854, 'ChIJIaaMNUxqXz4RBFvZ_Q2JOps', '2016-11-18 12:36:06', '2016-11-18 12:36:06'),
(9, 'Ruwi, Muscat, Oman', 23.5958, 58.5439, 'ChIJh-ntXc75kT4R7J-oUsgqa6I', '2016-11-18 12:41:33', '2016-11-18 12:41:33'),
(10, 'Palarivattom, Kochi', 10.0047, 76.313, 'ChIJZSwMiRwNCDsR9soVblFwZHU', '2016-11-18 12:55:18', '2016-11-18 12:55:18'),
(11, 'Infopark Campus, Kochi, India', 10.0149, 76.3636, 'ChIJHYpop2ILCDsRUAQJbaj2IOo', '2016-11-22 13:22:48', '2016-11-22 13:22:48'),
(12, 'Rasipuram, Tamil Nadu 637408, India', 11.4409, 78.1777, 'ChIJndTsOvnBqzsRntQZ0gOCQfw', '2016-11-23 11:05:22', '2016-11-23 11:05:22'),
(13, 'Thrikkakara, Edappally, Ernakulam, Kerala, India', 10.0342, 76.3315, 'ChIJm4-0w0UMCDsRbufnheIWMmI', '2016-12-01 06:48:10', '2016-12-01 06:48:10'),
(14, 'Southern Nations, Nationalities, and People\'s Region, Ethiopia', 7.91443, 38.5123, 'ChIJRVVRJI6ZrxcRNJNfJzlZ3rg', '2016-12-01 08:53:33', '2016-12-01 08:53:33'),
(15, 'Pallikkara, Kerala, India', 10.0274, 76.3923, 'ChIJ6wFZAwULCDsRlNazUPjmfco', '2016-12-08 12:59:22', '2016-12-08 12:59:22'),
(16, 'Echamuku, Kunnumpuram, Padamughal, Vazhakkala, Kakkanad, Kerala, India', 10.0159, 76.3422, 'ChIJt-cqEYsMCDsR_dB-IjwVpSw', '2016-12-08 12:59:24', '2016-12-08 12:59:24'),
(17, 'Palarivattom, Kochi, Kerala, India', 10.0041, 76.3127, 'ChIJF7dV1AsNCDsRQvY8Ru6R1yw', '2016-12-08 13:00:43', '2016-12-08 13:00:43'),
(18, 'Kerala 686673, India', 9.9899, 76.5764, 'ChIJgYB7H37nBzsRsarzrTc2o3A', '2016-12-08 13:01:19', '2016-12-08 13:01:19'),
(19, 'Kochi, Kerala, India', 9.96623, 76.4113, 'ChIJv8a-SlENCDsRkkGEpcqC1Qs', '2016-12-08 13:04:03', '2016-12-08 13:04:03'),
(20, 'Ernakulam, Kerala, India', 10.1276, 76.251, 'ChIJH9ar3hXkBzsRb_fT7icSkWs', '2016-12-08 13:37:38', '2016-12-08 13:37:38'),
(21, 'Kerala 680583, India', 10.7104, 76.2558, 'ChIJFdG-KbbCpzsRwQiP--92mx0', '2016-12-08 13:37:52', '2016-12-08 13:37:52'),
(22, 'Ooty, Tamil Nadu, India', 11.4136, 76.6935, 'ChIJjdfztYS9qDsRQj8-yRTbmxc', '2016-12-08 13:38:10', '2016-12-08 13:38:10'),
(23, 'Tamil Nadu 641111, India', 11.1496, 76.8803, 'ChIJSWau0d2MqDsRTl6GgM8Bsts', '2016-12-08 13:38:23', '2016-12-08 13:38:23'),
(24, 'Shimoga, Karnataka, India', 13.516, 75.1664, 'ChIJK7SL-yOpuzsR7jLSHm1ArRY', '2016-12-08 13:38:40', '2016-12-08 13:38:40'),
(25, 'Udupi, Karnataka, India', 13.7909, 74.856, 'ChIJjZ4yiGm7vDsR3O3HfamQz98', '2016-12-08 13:40:39', '2016-12-08 13:40:39'),
(26, 'Karnataka 581450, India', 14.5472, 74.8121, 'ChIJN8Igb8KnvjsRubEKjfXAFLU', '2016-12-08 13:40:49', '2016-12-08 13:40:49'),
(27, 'Pune, Maharashtra, India', 18.5273, 73.8673, 'ChIJARFGZy6_wjsRQ-Oenb9DjYI', '2016-12-08 13:44:34', '2016-12-08 13:44:34'),
(28, 'Maharashtra 402204, India', 18.6002, 72.9774, 'ChIJc-R1plFw6DsRT4NCXHySfKw', '2016-12-08 13:52:22', '2016-12-08 13:52:22'),
(29, 'Maharashtra 402209, India', 18.6614, 72.9074, 'ChIJ0z1Sm6536DsRVFIa8_JigCk', '2016-12-08 14:28:24', '2016-12-08 14:28:24'),
(30, 'Raigad, Maharashtra, India', 18.6666, 72.9953, 'ChIJjfO02zt66DsRn3LsnNeC5nk', '2016-12-08 14:28:46', '2016-12-08 14:28:46'),
(31, 'Pune, Maharashtra, India', 18.1924, 73.9346, 'ChIJQ97RPE_AwjsR5zbDDbo3wHI', '2016-12-08 14:28:56', '2016-12-08 14:28:56'),
(32, 'Battarahalli, Bengaluru, Karnataka, India', 13.0309, 77.7139, 'ChIJIdnHnVYQrjsRvAq4Ikolxb4', '2016-12-08 14:29:36', '2016-12-08 14:29:36'),
(33, 'Kolar, Karnataka, India', 12.9948, 77.9419, 'ChIJswtPHOnqrTsRYjVK5fGED8c', '2016-12-08 14:30:18', '2016-12-08 14:30:18'),
(34, 'Chintadripet, Chennai, Tamil Nadu, India', 13.0788, 80.2727, 'ChIJiTxWwgRmUjoRLq6ETQcCAyI', '2016-12-08 14:36:53', '2016-12-08 14:36:53'),
(35, 'Tamil Nadu 637018, India', 11.3992, 78.1749, 'ChIJmQuoYFXbqzsRWKoWO_qXMMM', '2016-12-09 05:15:12', '2016-12-09 05:15:12'),
(36, 'Kerala 682310, India', 9.98318, 76.452, 'ChIJN89LCrcKCDsRdD935e57kjA', '2016-12-09 07:23:30', '2016-12-09 07:23:30'),
(37, 'Manhattan, New York, NY, USA', 40.7847, -73.963, 'ChIJYeZuBI9YwokRjMDs_IEyCwo', '2016-12-12 06:12:18', '2016-12-12 06:12:18'),
(38, 'Shiniuku West Exit Willer Bus Terminal, 西新宿オーク 1 Chome-4-5 Nishishinjuku, Shinjuku-ku, Tōkyō-to 160-0023, Japan', 35.6915, 139.697, 'ChIJ8ey9vtaMGGARh9Td_5QIBGA', '2016-12-12 06:58:41', '2016-12-12 06:58:41'),
(39, '2 Chome-28 Honchō, Nakano-ku, Tōkyō-to 164-0012, Japan', 35.6948, 139.682, 'ChIJ8ZX-ldDyGGARc2D3vPcr0wc', '2016-12-12 06:59:26', '2016-12-12 06:59:26'),
(40, 'Yoyogikamizonocho, Shibuya, Tokyo 151-0052, Japan', 35.6748, 139.697, 'ChIJO1zNZraMGGARESOe90YfVUI', '2016-12-12 06:59:42', '2016-12-12 06:59:42'),
(41, 'Surugadaishita, 3 Chome Kanda Ogawamachi, Chiyoda-ku, Tōkyō-to 101-0052, Japan', 35.6957, 139.762, 'ChIJ_zjJihCMGGARKJLapu_6TH8', '2016-12-12 06:59:56', '2016-12-12 06:59:56'),
(42, '4 Chome-29 Takadanobaba, Shinjuku-ku, Tōkyō-to 169-0075, Japan', 35.7119, 139.699, 'ChIJg-WT8DaNGGARNaW4Xhk6XAk', '2016-12-12 07:00:02', '2016-12-12 07:00:02'),
(43, '2 Chome-24, Nakai, Shinjuku-ku, Tōkyō-to 161-0035, Japan', 35.7152, 139.683, 'ChIJ55VDP7DyGGARzc1FhImSYRU', '2016-12-12 07:00:55', '2016-12-12 07:00:55'),
(44, 'Totowa, NJ 07512, USA', 40.8886, -74.2267, 'ChIJe_Zg4_4Bw4kRCg1LSrfxElA', '2016-12-12 09:15:10', '2016-12-12 09:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_03_182914_create_mapLocation_table', 1),
(4, '2016_11_03_182706_create_posts_table', 2),
(5, '2016_11_04_102545_alter_users_table', 3),
(6, '2016_11_07_100943_create_followers_table', 4),
(7, '2016_11_08_095219_alter_followers_table', 5),
(8, '2016_11_08_134358_create_favourites_table', 6),
(9, '2016_09_13_070520_add_verification_to_user_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anishpraveen7@gmail.com', '9d959f6c212b61142de03231c1025615c3b3d5fb46c52df080a7f35faf7195a3', '2016-11-16 05:14:22'),
('root@admin.com', '870af44150b3b233b49d8a12417665aec633ce3b55f7ac5bc7b2cac5090b8c86', '2016-12-15 13:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mapId` int(10) UNSIGNED NOT NULL,
  `publishedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `imageName`, `userId`, `description`, `mapId`, `publishedOn`, `created_at`, `updated_at`) VALUES
(1, 'uploads/posts/582ac4516e8a7.png', 3, 'Dog', 1, '2016-11-15 02:46:17', '2016-11-15 02:46:17', '2016-11-15 02:46:17'),
(2, 'uploads/posts/582ad5ec0976e.jpg', 4, 'Birds Eye', 1, '2016-11-15 04:01:24', '2016-11-15 04:01:24', '2016-11-15 04:01:24'),
(3, 'uploads/posts/582ae0405ad74.png', 3, 'Teddy', 1, '2016-11-15 04:45:28', '2016-11-15 04:45:28', '2016-11-15 04:45:28'),
(4, 'uploads/posts/582ae04c34cec.png', 3, 'Twins', 1, '2016-11-15 04:45:40', '2016-11-15 04:45:40', '2016-11-15 04:45:40'),
(5, 'uploads/posts/582ae05a5d313.png', 3, 'hello', 1, '2016-11-15 04:45:54', '2016-11-15 04:45:54', '2016-11-15 04:45:54'),
(6, 'uploads/posts/582ae07dcf3d6.svg', 3, 'heart', 1, '2016-11-15 04:46:29', '2016-11-15 04:46:29', '2016-11-15 04:46:29'),
(7, 'uploads/posts/582ae092d4aab.svg', 3, 'Time', 1, '2016-11-15 04:46:50', '2016-11-15 04:46:50', '2016-11-15 04:46:50'),
(8, 'uploads/posts/582ae0ad35618.png', 3, 'Hello', 1, '2016-11-15 04:47:17', '2016-11-15 04:47:17', '2016-11-15 04:47:17'),
(9, 'uploads/posts/582ae0c1d54fb.png', 3, 'Friends', 1, '2016-11-15 04:47:37', '2016-11-15 04:47:37', '2016-11-15 04:47:37'),
(10, 'uploads/posts/582ae0d29db16.png', 3, 'Teddy2', 1, '2016-11-15 04:47:54', '2016-11-15 04:47:54', '2016-11-15 04:47:54'),
(11, 'uploads/posts/582ae0ec6eb47.png', 3, 'High', 1, '2016-11-15 04:48:20', '2016-11-15 04:48:20', '2016-11-15 04:48:20'),
(12, 'uploads/posts/582ae0fa6badf.jpg', 3, 'Peace', 1, '2016-11-15 04:48:34', '2016-11-15 04:48:34', '2016-11-15 04:48:34'),
(13, 'uploads/posts/582ae10c237db.png', 3, 'Hangout', 1, '2016-11-15 04:48:52', '2016-11-15 04:48:52', '2016-11-15 04:48:52'),
(14, 'uploads/posts/582ae124289e7.png', 3, 'Search', 1, '2016-11-15 04:49:16', '2016-11-15 04:49:16', '2016-11-15 04:49:16'),
(15, 'uploads/posts/582ae1b1cf3dd.png', 5, 'Hi all', 1, '2016-11-15 04:51:37', '2016-11-15 04:51:37', '2016-11-15 04:51:37'),
(16, 'uploads/posts/582ae1bcb43f0.png', 5, 'hanging low', 1, '2016-11-15 04:51:48', '2016-11-15 04:51:48', '2016-11-15 04:51:48'),
(17, 'uploads/posts/582ae1c8308ea.svg', 3, 'Follow', 1, '2016-11-15 04:52:00', '2016-11-15 04:52:00', '2016-11-15 04:52:00'),
(18, 'uploads/posts/582ae20126adb.png', 5, 'to all', 1, '2016-11-15 04:52:57', '2016-11-15 04:52:57', '2016-11-15 04:52:57'),
(19, 'uploads/posts/582ae21434f7e.png', 3, 'Dogs and cats', 1, '2016-11-15 04:53:16', '2016-11-15 04:53:16', '2016-11-15 04:53:16'),
(20, 'uploads/posts/582ae221225b3.png', 5, 'Friend', 1, '2016-11-15 04:53:29', '2016-11-15 04:53:29', '2016-11-15 04:53:29'),
(21, 'uploads/posts/582ae85f766bc.jpg', 5, 'Water', 2, '2016-11-15 05:20:07', '2016-11-15 05:20:07', '2016-11-15 05:20:07'),
(22, 'uploads/posts/582ae8ab703a1.jpg', 5, 'Sky', 2, '2016-11-15 05:21:23', '2016-11-15 05:21:23', '2016-11-15 05:21:23'),
(23, 'uploads/posts/582ae8ba1ed15.png', 5, 'High low', 2, '2016-11-15 05:21:38', '2016-11-15 05:21:38', '2016-11-15 05:21:38'),
(24, 'uploads/posts/582ae8cb262f6.jpg', 5, 'Peace', 2, '2016-11-15 05:21:55', '2016-11-15 05:21:55', '2016-11-15 05:21:55'),
(25, 'uploads/posts/582ae8da7645e.png', 5, 'Lone', 2, '2016-11-15 05:22:10', '2016-11-15 05:22:10', '2016-11-15 05:22:10'),
(26, 'uploads/posts/582ef5f351da5.jpg', 3, 'Dubai', 8, '2016-11-18 07:07:07', '2016-11-18 07:07:07', '2016-11-18 07:07:07'),
(27, 'uploads/posts/5834448b4363e.jpg', 3, 'calm', 8, '2016-11-22 07:43:47', '2016-11-22 07:43:47', '2016-11-22 07:43:47'),
(31, 'uploads/posts/58368a53892b2.svg', 3, 'chat', 8, '2016-11-24 01:06:03', '2016-11-24 01:06:03', '2016-11-24 01:06:03'),
(32, 'uploads/posts/58368a71562fd.svg', 3, 'ccc', 8, '2016-11-24 01:06:33', '2016-11-24 01:06:33', '2016-11-24 01:06:33'),
(33, 'uploads/posts/583814ad63510.jpg', 12, 'Test 123', 1, '2016-11-25 10:38:37', '2016-11-25 10:38:37', '2016-11-25 10:38:37'),
(34, 'uploads/posts/58381ebc14578.jpg', 3, 'High', 7, '2016-11-25 05:51:32', '2016-11-25 05:51:32', '2016-11-25 05:51:32'),
(35, 'uploads/posts/583824d3c2cfe.jpg', 3, 'Peace', 7, '2016-11-25 06:17:31', '2016-11-25 06:17:31', '2016-11-25 06:17:31'),
(64, 'uploads/posts/583be24f32ee0.png', 3, 'Dummy Test 2', 7, '2016-11-28 02:22:47', '2016-11-28 02:22:47', '2016-11-28 02:22:47'),
(66, 'uploads/posts/583be292a781a.png', 3, 'Test3', 7, '2016-11-28 02:23:54', '2016-11-28 02:23:54', '2016-11-28 02:23:54'),
(67, 'uploads/posts/583bea343302f.jpg', 3, 'Test4', 7, '2016-11-28 02:56:28', '2016-11-28 02:56:28', '2016-11-28 02:56:28'),
(68, 'uploads/posts/583bea701599b.png', 3, 'Test5', 7, '2016-11-28 02:57:28', '2016-11-28 02:57:28', '2016-11-28 02:57:28'),
(70, 'uploads/posts/583c1b1c9e791.png', 3, 'Try out', 1, '2016-11-28 06:25:08', '2016-11-28 06:25:08', '2016-11-28 06:25:08'),
(75, 'uploads/posts/583fc77206be8.jpg', 13, 'Winter is coming...', 1, '2016-12-01 06:47:14', '2016-12-01 06:47:14', '2016-12-01 06:47:14'),
(76, 'uploads/posts/583fe40f7d4b4.jpeg', 14, 'Somethings aren\'t free.. common sense being one of them!!', 1, '2016-12-12 08:25:50', '2016-12-01 08:49:19', '2016-12-01 08:49:19'),
(78, 'uploads/posts/58477efe97b2a.png', 22, 'World', 1, '2016-12-12 08:26:03', '2016-12-07 03:16:14', '2016-12-07 03:16:14'),
(84, 'uploads/posts/584a3a17e10ce.png', 19, 'Google Analytics Overview', 1, '2016-12-09 04:59:03', '2016-12-09 04:59:03', '2016-12-09 04:59:03'),
(85, 'uploads/posts/584a3ac60b4c0.png', 19, 'Sign In', 1, '2016-12-09 05:02:33', '2016-12-09 05:01:58', '2016-12-09 05:01:58'),
(86, 'uploads/posts/584a3afb839b7.png', 19, 'Sign Up', 1, '2016-12-09 05:02:51', '2016-12-09 05:02:51', '2016-12-09 05:02:51'),
(87, 'uploads/posts/584a3b0d304b6.png', 19, 'Landing', 1, '2016-12-09 05:03:09', '2016-12-09 05:03:09', '2016-12-09 05:03:09'),
(88, 'uploads/posts/584a3b18e593d.png', 19, 'Profile', 1, '2016-12-09 05:03:20', '2016-12-09 05:03:20', '2016-12-09 05:03:20'),
(89, 'uploads/posts/584a3b24d7111.png', 19, 'Settings', 1, '2016-12-09 05:03:32', '2016-12-09 05:03:32', '2016-12-09 05:03:32'),
(90, 'uploads/posts/584a3b3b65ca2.png', 19, 'Favourites', 1, '2016-12-09 05:03:55', '2016-12-09 05:03:55', '2016-12-09 05:03:55'),
(91, 'uploads/posts/584a3b4a622ce.png', 19, 'Search', 1, '2016-12-09 05:04:10', '2016-12-09 05:04:10', '2016-12-09 05:04:10'),
(95, 'uploads/posts/584a5c8dd6d18.png', 19, 'Map', 36, '2016-12-09 07:26:05', '2016-12-09 07:26:05', '2016-12-09 07:26:05'),
(97, 'uploads/posts/584a78fab607f.jpg', 57, 'Hello', 1, '2016-12-12 06:05:14', '2016-12-09 09:27:22', '2016-12-09 09:27:22'),
(104, 'uploads/posts/584e4c0283d91.jpg', 8, '#Tokyo#Temple', 43, '2016-12-12 07:04:34', '2016-12-12 07:04:34', '2016-12-12 07:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `profilePic` varchar(255) COLLATE utf8_unicode_ci DEFAULT '/uploads/profilePic/avatar.png',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapId` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `birthday`, `gender`, `profilePic`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `mapId`, `verified`, `verification_token`) VALUES
(3, 'Root', 'Admin', '1997-12-20', 'male', '/uploads/profilePic/5838221916b3d.png', 'root@admin.com', '$2y$10$ZMKuMLGQkUoHsjrD6WlZVOuj0V55HJfT6v.SHgka1cpFB8c46dWzi', 'zBWEoi7rMVLJlunbsekLm4pjoZdYz5AOsQ7TngL6BZSSyCJQGmKvEQsMZUKX', '2016-11-15 02:45:55', '2016-12-15 13:35:34', 44, 1, 'admin'),
(4, 'Anish', 'Praveen', NULL, 'male', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'anishpraveen7@gmail.com', '$2y$10$j/7duDM.fcSeyhehI0PYyeBMuOM33HA83VT7PLFlAu/nRMBMuTTW.', 'tBunbC0YxmM9F97DRyUoBBmQevdP6L6duBawIkTfBNAMrJZQRfkRdxDZzWM2', '2016-11-15 03:59:56', '2016-11-15 04:16:34', 3, 1, NULL),
(5, 'User', 'Root', '1987-12-14', 'male', '/uploads/profilePic/582ad9df3a004.png', 'user@root.com', '$2y$10$1YBNuVAJn.nLVNUhIJocYe1Qim6cuattT799aoRPhCYkHslAGh3y2', 'bmxuXfIQUJgF3W0SU0WGvjwXyNWS7AyikgpvXFGK2bpFB8ojIwo2BWDhWmfS', '2016-11-15 04:18:15', '2016-11-22 08:28:12', 11, 1, NULL),
(6, 'Anish', 'Praveen', NULL, 'male', 'https://lh4.googleusercontent.com/-5qkLeG3Qi3k/AAAAAAAAAAI/AAAAAAAAAWI/Z5uq0SuNXlc/photo.jpg?sz=50', 'anishpraveen.mec@gmail.com', '$2y$10$u54xTUCJNVZtn0SbyRAmNewRxiiCw0DtyQcIgsmZPkLo9EeD9e7Dm', 'WC97lPt5iODH3q68Z3xzld5zu8f2cxS3DlmmGhgsUIBB4JI73iOhjuLZmtJ6', '2016-11-15 22:31:36', '2016-11-15 23:44:01', 1, 1, NULL),
(7, 'Anish', 'Praveen', '1999-12-12', 'male', '/uploads/profilePic/582be90b44cb7.png', 'anish@root.com', '$2y$10$ggzmyr5ypQcXjjMtO/Jl0eXW5U3Zx6ue9EOzPWIA350tjqFI9EBCO', '9gRgxSH6zCoAC4zE0jpHkXumu44F3gcTrF1JkzOjC6mNIZJN6lYu4ZI7ZXU9', '2016-11-15 23:35:15', '2016-11-24 02:31:27', 9, 1, NULL),
(8, 'Shoko', 'User', '1995-11-15', 'female', '/uploads/profilePic/582efa1da3ae4.png', 'test@user.com', '$2y$10$CDNn/xTYHnM2E06RoSbTFei4Ztml/OjxUahTpMya7HmT90HL5qoIa', 'wUTQK6kwIldFBR0N1d7OIvUcOdFOj8mtzaxfZ3AGI0Tpbyk9xeq8by5dGfwe', '2016-11-18 12:54:53', '2016-12-12 07:00:55', 43, 1, NULL),
(11, 'James', 'User', '1999-11-15', 'female', '/uploads/profilePic/5835776c0bbd3.png', 'chat@admin.com', '$2y$10$N1iCA6bZ1hE14Oukugy9IOvB/ll6JzIhqhadtPsKvLsd8WoEJ2jPC', 'sfkdGF1pjgU9Zkjxndyzlu3FLmwlOsLa3KRcroCoBmP0fUR9WJQDFTpt9elD', '2016-11-23 11:03:08', '2016-12-09 05:15:12', 35, 1, NULL),
(12, 'Luther', '123', '1970-01-01', 'male', '/uploads/profilePic/583812ee14ac7.jpg', 'nithing@qburst.com', '$2y$10$QNApFSWyIf/di4zW7T/bieq6TuUphZPzTg1nJdK5Sq9FXZ946uXpC', 'm7BY2JWSlSn0Kp6pr0tTCwgaM5zTA6jNOzfH6RPxfH5nQulsl0CtIB7w8l62', '2016-11-25 10:31:10', '2016-12-12 06:38:32', 5, 1, NULL),
(13, 'Jon', 'Snow', '1994-08-06', 'male', '/uploads/profilePic/583fc6e85c458.jpg', 'lordcommander@wall.com', '$2y$10$OZWXtWTOHreext7s4x2IT.Nzt9oGJAfNHYWKckC0o3P0bJj.574K.', '111JPqdJfHER8DAb9K39OwuvBt0z3yCznjJ0aB0ef01IRvyUWzlqpim2mwxj', '2016-12-01 06:44:56', '2016-12-09 11:16:38', 13, 1, NULL),
(14, 'shine', 'ali', '1993-01-30', 'male', '/uploads/profilePic/583fe1f304a43.jpeg', 'shineali.mec@gmail.com', '$2y$10$Na1oozTm5DxIS8NOh3HWPuA7yi6eGqUozFD7noehuJCd0YeGshnaW', 'CnunDX2f1pZAg91cGOINYju4ifuqS9RF3jYPqM5ILxALvXiBzEZ9JUJrWC1M', '2016-12-01 08:40:19', '2016-12-01 08:59:30', 14, 1, NULL),
(15, 'shine', 'ali', NULL, 'male', 'https://lh4.googleusercontent.com/-1lvuC6qcJz4/AAAAAAAAAAI/AAAAAAAAB4U/oX0D9rhs-kw/photo.jpg?sz=50', 'alishine007@gmail.com', '$2y$10$3cEzVQ6hYbPC98hAfFBu7e2073zEULjO8vrRtqpomSVGqD3XB8Nt6', 'bwClm1GrypjN1KFwntvyjMuGGLWkjTfo5paG7BHOYpH8KXc8vDh2QvxOsmVp', '2016-12-01 09:02:14', '2016-12-01 09:02:51', 1, 1, NULL),
(17, 'Shine', 'Ali', NULL, 'male', 'https://lh5.googleusercontent.com/-H2xC0aDT118/AAAAAAAAAAI/AAAAAAAAAA4/7H14YMUzSNg/photo.jpg?sz=50', 'shinea@qburst.com', '$2y$10$1bEpRfsNRHzJ.kdIMU2DYeHgFn5ELizojMvoeVaeSo/BV0L65bCYa', 'pqq2tDDOVHfoSU7QuJU6wXxetyPEkLzex6XJyCEAkO8UtAAVCs6LfCIikLoZLbxG', '2016-12-01 09:13:10', '2016-12-01 09:13:10', 1, 1, NULL),
(19, 'Sam', '2', '1977-11-01', 'female', '/uploads/profilePic/avatar.png', 'tester@admin.com', '$2y$10$GDzfxS7tPVjzfv59CtYF.uP2cpHg9DPyjdY4YFKNNJYyK3djewufW', 'XuFDrPSMvQHNkH2uffiAv5ner377B9Q0ssfwNDYFjkUAQAM5hXARm5PUgdyH', '2016-12-01 09:15:47', '2016-12-15 13:36:11', 36, 1, NULL),
(20, 'Samar', 'Sirajuddin', NULL, 'male', '/uploads/profilePic/583ff8111d617.jpeg', 'samar@qburst.com', '$2y$10$2r5HgwVFR/a9C5RU9cgzCuAru3xaMi6GxAkE92.dvJ3anCjTf3QaS', 'dzIEYmJ0yMqzr5IKuMPVRVeiMdlfVJBOnTUE1qDe17tiyld48VaiXZboLG2W', '2016-12-01 10:08:13', '2016-12-01 10:14:41', 1, 1, NULL),
(22, 'aparna', 'manju', '1994-03-05', 'female', '/uploads/profilePic/avatar.png', 'aparnamanju@qburst.com', '$2y$10$vqFS7XbHxnJMgrXhOeTtEezpW1HG/zQ34JnGKCiq77rpDpPlOZFym', 'MzNB7EJ73dlvAKdt7kMQ0EfGxtFIslfeRX9mGjpqhWRpbrnZqIYwGHIqFPUG', '2016-12-07 03:13:30', '2016-12-07 03:18:27', 1, 1, NULL),
(23, 'Dhiya', 'Thankachan', NULL, 'male', 'https://lh6.googleusercontent.com/-N3Iyhln659s/AAAAAAAAAAI/AAAAAAAAABk/WjoLanS0Of0/photo.jpg?sz=50', 'dhiya@qburst.com', '$2y$10$6Zsdh3D57Wdr3lwF0h7rp.Ww.pJ.DGPmAAgPqT8yECHy3ctM7SjP6', 'dewZ2jp21ILCAJ5EXxOe8YDGrwlh1nJC3f29L5eOCamodrC21UIHJoLekJws', '2016-12-08 04:30:35', '2016-12-08 04:31:02', 1, 1, NULL),
(53, 'Dhiya', 'Ann', NULL, 'female', 'https://lh5.googleusercontent.com/-SqtvOyVp1Nc/AAAAAAAAAAI/AAAAAAAAADk/dsVBU_Hv0oA/photo.jpg?sz=50', 'dhiyaannthankachan.mec@gmail.com', '$2y$10$cERAKWKY/a/gf3t7ahKrGes74uooqnC.KNoAGwHUZLbipIH4NXeCW', 'lS6SNEwA13DpIHJWaFlgEUM1l4uJwRg87WoPDcwf0cDkCxik5axH8ARptI5hKyyX', '2016-12-09 07:42:31', '2016-12-09 07:42:31', 1, 0, NULL),
(56, 'Anish', 'Praveen', NULL, 'male', '/uploads/profilePic/avatar.png', 'anishp@qburst.com', '$2y$10$pmvLUrGeFT.OfhGQs92iRO4whKUzLy.nx2GAy7uB9N91Ksex/tyru', '3RGhXtVzbCcoFvY9N3C3rzzH9S7EnthnwtF22BzgRC0oFDu4645gIn8bIpE6TXJt', '2016-12-09 08:52:30', '2016-12-09 08:52:30', 1, 0, NULL),
(57, 'Muhammed', 'Althaf', NULL, 'male', '/uploads/profilePic/584a785802c4a.jpg', 'althafkm@qburst.com', '$2y$10$zPR4Q4KcbQYWvQUYb8bW6.XcUdYObN9WSnfbmqHOTqecSOqeksR/a', 'kIrqdUcYC8NlyyHqqt6G9NIv8e4vp9B0QTJlNLHI8U1baikU3vZFhqC5As11q4el', '2016-12-09 09:09:36', '2016-12-09 09:24:40', 1, 0, NULL),
(58, 'Priyesh', 'p', NULL, 'male', 'https://lh5.googleusercontent.com/-8kqcXVdFxmA/AAAAAAAAAAI/AAAAAAAABlc/bO7nQcX4NlU/photo.jpg?sz=50', 'priyesh.mec@gmail.com', '$2y$10$H6GtJFqbTPOIpPKOQonbkub6T/ismUIR6M1EjUxNnqU5v.kqF/MoW', '3HTiYlUkZg70e120lVyUZoANUfNTvhBEF3OXzCWDrLTeHXEtzWvWoeD8RRJOMrTo', '2016-12-09 10:43:45', '2016-12-09 10:43:45', 1, 0, NULL),
(59, 'Dhiya', 'Ann', NULL, 'female', 'https://lh5.googleusercontent.com/-SsRRp4CDxBA/AAAAAAAAAAI/AAAAAAAAIa4/uinErfCPyZk/photo.jpg?sz=50', 'palmhouse.dat@gmail.com', '$2y$10$dRreSbzSCCILO56ayeJm2uvWRt0Gze/fUSsU1JjM4igo6uNc2MZb6', 'SqvJh6G0QGvHLBBUG8df6Hcz34sJvog3gZdCPeMPcRH1oz8RYlCrOtYUjNsw', '2016-12-09 11:15:20', '2016-12-09 11:23:18', 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favourites_userid_postid_unique` (`userId`,`postId`),
  ADD KEY `favourites_postid_foreign` (`postId`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `followers_follower_id_user_id_unique` (`follower_id`,`user_id`),
  ADD KEY `followers_user_id_foreign` (`user_id`);

--
-- Indexes for table `mapLocation`
--
ALTER TABLE `mapLocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_userid_foreign` (`userId`),
  ADD KEY `posts_mapid_foreign` (`mapId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mapid_foreign` (`mapId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT for table `mapLocation`
--
ALTER TABLE `mapLocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_postid_foreign` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_mapid_foreign` FOREIGN KEY (`mapId`) REFERENCES `mapLocation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_mapid_foreign` FOREIGN KEY (`mapId`) REFERENCES `mapLocation` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
