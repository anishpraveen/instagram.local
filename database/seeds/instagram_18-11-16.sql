-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~trusty.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2016 at 07:12 PM
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
(2, 3, 1, '2016-11-15 08:16:40', '2016-11-15 08:16:40'),
(3, 4, 1, '2016-11-15 09:30:08', '2016-11-15 09:30:08'),
(4, 4, 2, '2016-11-15 09:31:51', '2016-11-15 09:31:51'),
(6, 5, 2, '2016-11-15 10:24:44', '2016-11-15 10:24:44'),
(7, 5, 4, '2016-11-15 10:24:45', '2016-11-15 10:24:45'),
(8, 5, 5, '2016-11-15 10:24:46', '2016-11-15 10:24:46'),
(9, 5, 10, '2016-11-15 10:24:49', '2016-11-15 10:24:49'),
(10, 5, 16, '2016-11-15 10:24:53', '2016-11-15 10:24:53'),
(11, 5, 17, '2016-11-15 10:24:55', '2016-11-15 10:24:55'),
(12, 5, 20, '2016-11-15 10:25:21', '2016-11-15 10:25:21'),
(13, 5, 13, '2016-11-15 10:25:24', '2016-11-15 10:25:24'),
(14, 5, 12, '2016-11-15 10:25:26', '2016-11-15 10:25:26'),
(15, 5, 11, '2016-11-15 10:25:27', '2016-11-15 10:25:27'),
(16, 5, 9, '2016-11-15 10:25:28', '2016-11-15 10:25:28'),
(17, 5, 7, '2016-11-15 10:25:30', '2016-11-15 10:25:30'),
(18, 5, 8, '2016-11-15 10:25:31', '2016-11-15 10:25:31'),
(19, 5, 6, '2016-11-15 10:25:32', '2016-11-15 10:25:32'),
(20, 5, 3, '2016-11-15 10:25:37', '2016-11-15 10:25:37'),
(21, 5, 1, '2016-11-15 10:25:38', '2016-11-15 10:25:38'),
(22, 5, 25, '2016-11-15 10:52:38', '2016-11-15 10:52:38'),
(23, 6, 23, '2016-11-16 04:10:39', '2016-11-16 04:10:39'),
(24, 6, 21, '2016-11-16 04:10:40', '2016-11-16 04:10:40'),
(25, 6, 20, '2016-11-16 04:10:41', '2016-11-16 04:10:41'),
(26, 6, 22, '2016-11-16 04:10:42', '2016-11-16 04:10:42'),
(27, 6, 19, '2016-11-16 04:10:44', '2016-11-16 04:10:44'),
(29, 3, 14, '2016-11-16 04:11:53', '2016-11-16 04:11:53'),
(30, 3, 13, '2016-11-16 04:11:54', '2016-11-16 04:11:54'),
(31, 3, 25, '2016-11-16 09:12:36', '2016-11-16 09:12:36'),
(32, 3, 24, '2016-11-16 09:12:37', '2016-11-16 09:12:37'),
(33, 3, 23, '2016-11-16 09:12:38', '2016-11-16 09:12:38'),
(34, 3, 21, '2016-11-16 09:12:39', '2016-11-16 09:12:39'),
(35, 3, 18, '2016-11-16 09:12:41', '2016-11-16 09:12:41'),
(36, 3, 17, '2016-11-16 09:12:43', '2016-11-16 09:12:43'),
(37, 3, 19, '2016-11-16 09:15:27', '2016-11-16 09:15:27'),
(38, 3, 26, '2016-11-18 12:48:20', '2016-11-18 12:48:20');

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
(1, 4, 3, '2016-11-15 09:30:02', '2016-11-15 09:30:02'),
(2, 4, 4, '2016-11-15 09:31:34', '2016-11-15 09:31:34'),
(20, 5, 3, '2016-11-15 10:00:52', '2016-11-15 10:00:52'),
(22, 5, 4, '2016-11-15 10:20:31', '2016-11-15 10:20:31'),
(24, 5, 5, '2016-11-15 10:24:32', '2016-11-15 10:24:32'),
(29, 6, 3, '2016-11-16 04:01:40', '2016-11-16 04:01:40'),
(30, 6, 4, '2016-11-16 04:01:43', '2016-11-16 04:01:43'),
(31, 6, 5, '2016-11-16 04:01:48', '2016-11-16 04:01:48'),
(32, 7, 3, '2016-11-16 05:05:17', '2016-11-16 05:05:17'),
(36, 3, 4, '2016-11-16 13:09:00', '2016-11-16 13:09:00'),
(52, 3, 3, '2016-11-18 12:48:13', '2016-11-18 12:48:13'),
(53, 3, 5, '2016-11-18 12:48:15', '2016-11-18 12:48:15'),
(54, 8, 3, '2016-11-18 12:56:15', '2016-11-18 12:56:15'),
(60, 8, 4, '2016-11-18 13:04:18', '2016-11-18 13:04:18'),
(61, 8, 5, '2016-11-18 13:04:37', '2016-11-18 13:04:37'),
(62, 8, 6, '2016-11-18 13:04:39', '2016-11-18 13:04:39');

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
(5, 'Palarivattom Bypass, Ernakulam, Kerala 682025, India', 10.0051, 76.313, 'ChIJV4BwkhwNCDsRZC97ySoJgJ8', '2016-11-18 12:20:26', '2016-11-18 12:20:26'),
(6, 'Muscat Governorate, Oman', 23.6227, 58.1684, 'ChIJ0WK2tavykT4RYWFJzBe5lcY', '2016-11-18 12:21:23', '2016-11-18 12:21:23'),
(7, 'Muscat, Oman', 23.5957, 58.5428, 'ChIJya-ah6j_kT4RLKd5DW2HU9s', '2016-11-18 12:22:15', '2016-11-18 12:22:15'),
(8, 'Dubai - UAE', 25.1413, 55.1854, 'ChIJIaaMNUxqXz4RBFvZ_Q2JOps', '2016-11-18 12:36:06', '2016-11-18 12:36:06'),
(9, 'Ruwi, Muscat, Oman', 23.5958, 58.5439, 'ChIJh-ntXc75kT4R7J-oUsgqa6I', '2016-11-18 12:41:33', '2016-11-18 12:41:33'),
(10, 'Palarivattom, Kochi, Kerala 682025, India', 10.0047, 76.313, 'ChIJZSwMiRwNCDsR9soVblFwZHU', '2016-11-18 12:55:18', '2016-11-18 12:55:18');

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
(8, '2016_11_08_134358_create_favourites_table', 6);

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
('anishpraveen7@gmail.com', '9d959f6c212b61142de03231c1025615c3b3d5fb46c52df080a7f35faf7195a3', '2016-11-16 05:14:22');

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
(1, 'uploads/posts/582ac4516e8a7.png', 3, 'Dog', 1, '2016-11-15 08:16:17', '2016-11-15 08:16:17', '2016-11-15 08:16:17'),
(2, 'uploads/posts/582ad5ec0976e.jpg', 4, 'Birds Eye', 1, '2016-11-15 09:31:24', '2016-11-15 09:31:24', '2016-11-15 09:31:24'),
(3, 'uploads/posts/582ae0405ad74.png', 3, 'Teddy', 1, '2016-11-15 10:15:28', '2016-11-15 10:15:28', '2016-11-15 10:15:28'),
(4, 'uploads/posts/582ae04c34cec.png', 3, 'Twins', 1, '2016-11-15 10:15:40', '2016-11-15 10:15:40', '2016-11-15 10:15:40'),
(5, 'uploads/posts/582ae05a5d313.png', 3, 'hello', 1, '2016-11-15 10:15:54', '2016-11-15 10:15:54', '2016-11-15 10:15:54'),
(6, 'uploads/posts/582ae07dcf3d6.svg', 3, 'heart', 1, '2016-11-15 10:16:29', '2016-11-15 10:16:29', '2016-11-15 10:16:29'),
(7, 'uploads/posts/582ae092d4aab.svg', 3, 'Time', 1, '2016-11-15 10:16:50', '2016-11-15 10:16:50', '2016-11-15 10:16:50'),
(8, 'uploads/posts/582ae0ad35618.png', 3, 'Hello', 1, '2016-11-15 10:17:17', '2016-11-15 10:17:17', '2016-11-15 10:17:17'),
(9, 'uploads/posts/582ae0c1d54fb.png', 3, 'Friends', 1, '2016-11-15 10:17:37', '2016-11-15 10:17:37', '2016-11-15 10:17:37'),
(10, 'uploads/posts/582ae0d29db16.png', 3, 'Teddy2', 1, '2016-11-15 10:17:54', '2016-11-15 10:17:54', '2016-11-15 10:17:54'),
(11, 'uploads/posts/582ae0ec6eb47.png', 3, 'High', 1, '2016-11-15 10:18:20', '2016-11-15 10:18:20', '2016-11-15 10:18:20'),
(12, 'uploads/posts/582ae0fa6badf.jpg', 3, 'Peace', 1, '2016-11-15 10:18:34', '2016-11-15 10:18:34', '2016-11-15 10:18:34'),
(13, 'uploads/posts/582ae10c237db.png', 3, 'Hangout', 1, '2016-11-15 10:18:52', '2016-11-15 10:18:52', '2016-11-15 10:18:52'),
(14, 'uploads/posts/582ae124289e7.png', 3, 'Search', 1, '2016-11-15 10:19:16', '2016-11-15 10:19:16', '2016-11-15 10:19:16'),
(15, 'uploads/posts/582ae1b1cf3dd.png', 5, 'Hi all', 1, '2016-11-15 10:21:37', '2016-11-15 10:21:37', '2016-11-15 10:21:37'),
(16, 'uploads/posts/582ae1bcb43f0.png', 5, 'hanging low', 1, '2016-11-15 10:21:48', '2016-11-15 10:21:48', '2016-11-15 10:21:48'),
(17, 'uploads/posts/582ae1c8308ea.svg', 3, 'Follow', 1, '2016-11-15 10:22:00', '2016-11-15 10:22:00', '2016-11-15 10:22:00'),
(18, 'uploads/posts/582ae20126adb.png', 5, 'to all', 1, '2016-11-15 10:22:57', '2016-11-15 10:22:57', '2016-11-15 10:22:57'),
(19, 'uploads/posts/582ae21434f7e.png', 3, 'Dogs and cats', 1, '2016-11-15 10:23:16', '2016-11-15 10:23:16', '2016-11-15 10:23:16'),
(20, 'uploads/posts/582ae221225b3.png', 5, 'Friend', 1, '2016-11-15 10:23:29', '2016-11-15 10:23:29', '2016-11-15 10:23:29'),
(21, 'uploads/posts/582ae85f766bc.jpg', 5, 'Water', 2, '2016-11-15 10:50:07', '2016-11-15 10:50:07', '2016-11-15 10:50:07'),
(22, 'uploads/posts/582ae8ab703a1.jpg', 5, 'Sky', 2, '2016-11-15 10:51:23', '2016-11-15 10:51:23', '2016-11-15 10:51:23'),
(23, 'uploads/posts/582ae8ba1ed15.png', 5, 'High low', 2, '2016-11-15 10:51:38', '2016-11-15 10:51:38', '2016-11-15 10:51:38'),
(24, 'uploads/posts/582ae8cb262f6.jpg', 5, 'Peace', 2, '2016-11-15 10:51:55', '2016-11-15 10:51:55', '2016-11-15 10:51:55'),
(25, 'uploads/posts/582ae8da7645e.png', 5, 'Lone', 2, '2016-11-15 10:52:10', '2016-11-15 10:52:10', '2016-11-15 10:52:10'),
(26, 'uploads/posts/582ef5f351da5.jpg', 3, 'Dubai', 8, '2016-11-18 12:37:07', '2016-11-18 12:37:07', '2016-11-18 12:37:07');

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
  `profilePic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mapId` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastName`, `birthday`, `gender`, `profilePic`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `mapId`) VALUES
(3, 'Root', 'Admin', '1997-12-20', 'male', '/uploads/profilePic/582ebec6dc910.png', 'root@admin.com', 'anish12', 'EunvKs0F4QvXftUGw4fESsF0DyAPHOggtO7G1Y6N1n0D92soSDnao4LvAuFb', '2016-11-15 08:15:55', '2016-11-18 12:36:06', 8),
(4, 'Anish', 'Praveen', NULL, 'male', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50', 'anishpraveen7@gmail.com', '$2y$10$j/7duDM.fcSeyhehI0PYyeBMuOM33HA83VT7PLFlAu/nRMBMuTTW.', 'tBunbC0YxmM9F97DRyUoBBmQevdP6L6duBawIkTfBNAMrJZQRfkRdxDZzWM2', '2016-11-15 09:29:56', '2016-11-15 09:46:34', 3),
(5, 'User', 'Root', '1987-12-14', 'male', '/uploads/profilePic/582ad9df3a004.png', 'user@root.com', '$2y$10$aVZn6PrVyysp1aOVxp2JYuyGhdJ/BN5jyL1.bKRtSpFZZJzzIRjkO', 'bmxuXfIQUJgF3W0SU0WGvjwXyNWS7AyikgpvXFGK2bpFB8ojIwo2BWDhWmfS', '2016-11-15 09:48:15', '2016-11-16 04:34:11', 2),
(6, 'Anish', 'Praveen', NULL, 'male', 'https://lh4.googleusercontent.com/-5qkLeG3Qi3k/AAAAAAAAAAI/AAAAAAAAAWI/Z5uq0SuNXlc/photo.jpg?sz=50', 'anishpraveen.mec@gmail.com', '$2y$10$u54xTUCJNVZtn0SbyRAmNewRxiiCw0DtyQcIgsmZPkLo9EeD9e7Dm', 'WC97lPt5iODH3q68Z3xzld5zu8f2cxS3DlmmGhgsUIBB4JI73iOhjuLZmtJ6', '2016-11-16 04:01:36', '2016-11-16 05:14:01', 1),
(7, 'Anish', 'Praveen', '1999-12-12', 'male', '/uploads/profilePic/582be90b44cb7.png', 'anish@root.com', '$2y$10$ggzmyr5ypQcXjjMtO/Jl0eXW5U3Zx6ue9EOzPWIA350tjqFI9EBCO', 'ncXIWXXf8Dtv3FFeDIzhXdm9oTActhNHfTVofCWdahkyQKssh1HjxET1hLu0', '2016-11-16 05:05:15', '2016-11-18 12:54:03', 9),
(8, 'Test', 'User', '1995-11-15', 'female', '/uploads/profilePic/582efa1da3ae4.png', 'test@user.com', '$2y$10$CDNn/xTYHnM2E06RoSbTFei4Ztml/OjxUahTpMya7HmT90HL5qoIa', 'B3YZfmGTW8JvUrREI8QX66hBh4bDAEQXp4yurEUHAG5kHpGFqOcCVUEnCc2W', '2016-11-18 12:54:53', '2016-11-18 13:31:33', 10);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `mapLocation`
--
ALTER TABLE `mapLocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
