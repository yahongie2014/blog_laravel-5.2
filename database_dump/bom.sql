-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 01:47 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bom`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'hello', 7, 16, '2017-01-21 22:39:34', '2017-01-21 22:39:34'),
(2, 'asl;sa', 7, 16, '2017-01-21 22:41:15', '2017-01-21 22:41:15'),
(3, 'looooooooool', 4, 16, '2017-01-21 22:41:41', '2017-01-21 22:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 13, 2, '2017-01-21 22:00:00', '2017-01-20 22:00:00', '2017-01-20 22:00:00'),
(2, 13, 2, '2017-01-21 22:00:00', '2017-01-20 22:00:00', '2017-01-20 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_01_19_153109_posts', 2),
('2017_01_19_153151_comments', 2),
('2017_01_20_225056_create_likes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 'Bootstrap Snippet Comment Posts Layout using HTML CSS ...', 'http://bootsnipp.com/snippets/featured/comment-posts-layout', 'Following from the documentation exactly, yet I''m getting an error thrown:\nNon-static method Illuminate\\Http\\Request::has() should not be called statically, assuming $this from incompatible context\nI''m not sure what I''m doing wrong here, I tried following the documentation as closely as possible.', 4, '2017-01-20 13:37:04', '2017-01-20 15:15:36'),
(24, 'Posts Layout using HTML CSc', 'http://bootsnipp.com/snippets/featured/comment-posts-layout', 'Following from the documentation exactly, yet I''m getting an error thrown:\r\nNon-static method Illuminate\\Http\\Request::has() should not be called statically, assuming $this from incompatible context\r\nI''m not sure what I''m doing wrong here, I tried following the ', 7, '2017-01-21 21:18:29', '2017-01-21 21:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'ahmed@admin.com', '$2y$10$.78LtvUoej48Ts77ZgZ9QOLoc2nWniebiilB5KVH8YLU87YmrJQim', 'jGxslR2Q4ZTDMXfHFb4y4o4gXzXvTOApI1pITPlCLTqzCUq87XIt13lXZewU', '2017-01-07 19:16:15', '2017-01-07 19:28:41'),
(2, 'radwa', 'radwa@admin.com', '$2y$10$JroKjU1X/1.NSk8FtPHMeOmWXYGK6ConJCK.Cv/0EyVMn0qloQzeW', 'fqrmrnS9Lr32ETEr7BYX7sYJSMpVF65X6U7PhZeHwpJckQSeBobIn9pkSXlt', '2017-01-07 19:28:59', '2017-01-07 19:29:25'),
(3, 'yahongie', 'Seri@admin.com', '$2y$10$gBTehSJgWg/j8IdyXBY.seiaF3zSuOVYP5iZNFrew8W01PPuk7s4W', 'yokrAJX1rBtkoa85lAjmb3l5F4OxfwPcrRUrJJTYqxvgiamthZZkucimZHAe', '2017-01-09 16:15:20', '2017-01-09 17:01:21'),
(4, 'yahongie', 'yahongie@seri.com', '$2y$10$sjPuhyQWZPeg0BczD1h6K.hjHt8kDo262BNQWto94UBDltRfCqIPu', '3bDgdrZVav0pZtJlow2gRetR0LrSTIWuNPnGuaSHB4q7362TW2cu91crme1w', '2017-01-19 13:02:57', '2017-01-21 22:42:14'),
(5, 'talaat', 'talaat@admin.com', '$2y$10$jkZJ4A2yCa9f3ny.XLAXP.h6es7QcIDwaaqU7PuHT7rUvDFAoHdy6', 'Pl9i7uud1XPPR8H4SUpUQvRnHVsNSDIAVy76SHJkKxbEzHDXuDpA0UkNBWSJ', '2017-01-19 17:11:20', '2017-01-19 18:31:34'),
(6, 'manar', 'manar@admin.com', '$2y$10$L9FmvdB6w0AQeTyIph5AL.OHOLlKTMqlo1nQDSwkLjOa4PFx.UpM6', 'qhbWqJrwi2PZDpw4BEq9LpnFJbzWzxhHireUMgWbgYashPjf4kM5eykmh4To', '2017-01-19 17:58:17', '2017-01-20 17:37:29'),
(7, 'manar', 'manar@seri.com', '$2y$10$kzcu9w/MEKSFw70jmJGFg.Oo3bWyyZjorRmfmSuSSIfMklZLtlTtm', 'nfGlGpXQEqaorqY2dYWzCUto4wTJLsOkIDalNcba0thGq81ZZ71tsCyoRYKc', '2017-01-21 13:00:23', '2017-01-21 22:45:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`) USING BTREE,
  ADD KEY `id` (`id`),
  ADD KEY `user_id_4` (`user_id`),
  ADD KEY `post_id` (`post_id`) USING BTREE,
  ADD KEY `post_id_3` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
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
  ADD UNIQUE KEY `user_id` (`id`,`title`),
  ADD KEY `user_id_3` (`user_id`) USING BTREE;

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
