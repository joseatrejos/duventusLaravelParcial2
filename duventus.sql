-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 02:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duventus`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `instalacion`
--

CREATE TABLE `instalacion` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `foto` text DEFAULT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `ubicacion` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instalacion`
--

INSERT INTO `instalacion` (`id`, `id_user`, `estado`, `foto`, `fecha_hora`, `ubicacion`, `created_at`, `updated_at`) VALUES
(40, 1, 'Terminado', NULL, '2020-04-11 22:07:45', 'Wuuuu', '2020-04-16 19:15:08', '2020-04-23 08:52:03'),
(41, 7, 'Pendiente', 'Annotation 2020-04-21 115944.png', '2020-04-11 22:07:45', 'asdf', '2020-04-16 20:27:19', '2020-04-22 02:08:24'),
(42, 2, 'En proceso', '6pzpvj1FFItUZGXUf8uAVhTWMdbBpwNcBzMrYXY2.png', '1995-09-22 22:07:45', 'PRUEBA DE LA FOTOOOOOOAAAAAA', '2020-04-22 02:11:01', '2020-04-22 06:42:11'),
(43, 3, 'Terminado', 'Annotation 2020-04-21 120500.png', '2020-04-11 22:07:45', 'asdf', '2020-04-22 06:38:49', '2020-04-22 06:38:59'),
(44, 31, 'Pendiente', NULL, '2020-04-11 22:07:45', 'ftgfyhfttftb', '2020-04-23 08:54:18', '2020-04-24 08:44:03'),
(45, 30, 'Pendiente', NULL, '2020-04-11 22:07:45', 'ftgfyhfttftb', '2020-04-24 07:59:03', '2020-04-24 08:01:38'),
(46, 30, 'Terminado', NULL, '1995-07-04 00:00:00', 'Somebody save me', '2020-04-24 08:01:28', '2020-04-24 08:01:28'),
(47, 31, 'Terminado', NULL, '1995-07-04 00:00:00', 'Somebody save me', '2020-04-24 08:36:31', '2020-04-24 08:36:31'),
(48, 31, 'Terminado', NULL, '1995-07-04 00:00:00', 'Somebody save me', '2020-04-24 08:43:56', '2020-04-24 08:43:56'),
(49, 31, 'Terminado', NULL, '1995-07-04 00:00:00', 'Somebody save me', '2020-04-24 09:04:25', '2020-04-24 09:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(7, '2016_06_01_000004_create_oauth_clients_table', 2),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1f4cb357652f1b6b46410d8080c45f2ea5ecb008c6baa24413fbc43abe65697f9c63df1f949949e9', 30, 2, NULL, '[]', 0, '2020-04-24 07:29:08', '2020-04-24 07:29:08', '2021-04-24 00:29:08'),
('3dbf34f9a01e3d9b3094abe738fa120eda3d0c3a350802ebe2996897f44c3167df8bd30f4c7dd83e', 30, 2, NULL, '[]', 0, '2020-04-24 08:46:43', '2020-04-24 08:46:43', '2021-04-24 01:46:43'),
('830de03d1adafe57f99ce7022988712668e94bf3d6c4a573bf74295a14ca9bd4d241cd3b34a2a128', 29, 2, NULL, '[]', 0, '2020-04-23 08:16:33', '2020-04-23 08:16:33', '2021-04-23 01:16:33'),
('b096d409c2d46d1146c145b2468f573c1d00c96d31847224e3c3f36ee7586bc35a9455aa3d14de7f', 31, 2, NULL, '[]', 0, '2020-04-24 08:13:36', '2020-04-24 08:13:36', '2021-04-24 01:13:36'),
('d512b53e2f9ff6ba9e519c43f2416777a747f5fc0bd1e90c02cc128e330f2a3155a8a44f17248a2a', 1, 2, NULL, '[]', 0, '2020-04-02 08:40:34', '2020-04-02 08:40:34', '2021-04-02 01:40:34'),
('fb0376423c6f0d3ca64edf0089dc70fc84f30763f786d55dc3842cd900e1657b83843d66113e695c', 30, 2, NULL, '[]', 0, '2020-04-24 08:12:31', '2020-04-24 08:12:31', '2021-04-24 01:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'OeXtXxEOpR6q1qpuxptYHi0UpeYGMh5HY1gYML0S', 'http://localhost', 1, 0, 0, '2020-04-02 07:56:47', '2020-04-02 07:56:47'),
(2, NULL, 'Laravel Password Grant Client', 'N8uCvnDKSLSbbDcpIu19iQ1vZ1RjtRqgdZZK9gP8', 'http://localhost', 0, 1, 0, '2020-04-02 07:56:47', '2020-04-02 07:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-02 07:56:47', '2020-04-02 07:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('0e7a19a56942041c68838259fa123b99a1c81d45e1a30112fa2b5c5d9a3bad9cabe8601365ed7d80', '1f4cb357652f1b6b46410d8080c45f2ea5ecb008c6baa24413fbc43abe65697f9c63df1f949949e9', 0, '2021-04-24 00:29:08'),
('515b12fffd8e5182e59b077331f9846188a85964a29075315f7877bf15e5decf342a0303903f1cda', '3dbf34f9a01e3d9b3094abe738fa120eda3d0c3a350802ebe2996897f44c3167df8bd30f4c7dd83e', 0, '2021-04-24 01:46:43'),
('77902a2b5b45ba983b20c4091b53059011f2d918672130824ba3e82e0c02a74c9bbd3743c5aaf1f8', 'fb0376423c6f0d3ca64edf0089dc70fc84f30763f786d55dc3842cd900e1657b83843d66113e695c', 0, '2021-04-24 01:12:31'),
('9babd2c8f2b2258bc09a0757ad5e3ac08eb753d97a4b273a3c6cc56e9b71a2a80ef8cba75c668e59', 'd512b53e2f9ff6ba9e519c43f2416777a747f5fc0bd1e90c02cc128e330f2a3155a8a44f17248a2a', 0, '2021-04-02 01:40:34'),
('e5c595c43fbf297363fd87bb595292eb0305ad1bad127c8fae0ad8f0aab10312ef9101a99bac4576', '830de03d1adafe57f99ce7022988712668e94bf3d6c4a573bf74295a14ca9bd4d241cd3b34a2a128', 0, '2021-04-23 01:16:33'),
('f513be4269ba995bfeadd43ee6a3bb9e89325dc6a84d79cc71001c8e58226dbdd3f4b154d95e982b', 'b096d409c2d46d1146c145b2468f573c1d00c96d31847224e3c3f36ee7586bc35a9455aa3d14de7f', 0, '2021-04-24 01:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reparacion`
--

CREATE TABLE `reparacion` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `foto` mediumtext DEFAULT NULL,
  `descripcion` mediumtext NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `ubicacion` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reparacion`
--

INSERT INTO `reparacion` (`id`, `id_user`, `estado`, `foto`, `descripcion`, `fecha_hora`, `ubicacion`, `created_at`, `updated_at`) VALUES
(21, 6666, 'Terminado', 'zXmwPIFPerNVA7Th8jEB2t28MIkBSIpdRpW4GwvX.png', 'sdfghjk', '1995-09-22 22:07:45', 'PRUEBA DE LA FOTOOOOOO2', '2020-04-16 17:43:42', '2020-04-22 06:43:20'),
(22, 1, 'Pendiente', NULL, 'Prueba del edittt', '1995-04-11 22:07:45', 'Prueba del edit3', '2020-04-24 07:31:25', '2020-04-24 07:39:44'),
(23, 1, 'Terminado', NULL, 'Prueba del edittt', '1995-04-11 22:07:45', 'Prueba del edit3', '2020-04-24 07:31:26', '2020-04-24 07:40:11'),
(24, 31, 'Pendiente', NULL, 'Funciono?', '1995-04-11 22:07:45', 'Prueba del edit S.O.S.', '2020-04-24 07:31:27', '2020-04-24 08:45:17'),
(25, 30, 'Pendiente', NULL, 'Funciono?', '1995-04-11 22:07:45', 'Prueba del edit S.O.S.', '2020-04-24 07:31:28', '2020-04-24 08:04:50'),
(26, 1, 'Pendiente', NULL, 'Funciono?', '1995-04-11 22:07:45', 'Prueba del edit S.O.S.', '2020-04-24 07:44:43', '2020-04-24 07:45:46'),
(27, 30, 'Terminado', NULL, 'WTF2', '2020-04-11 22:07:45', 'Pruebaaaaaaaaaaaaaaaa', '2020-04-24 07:49:46', '2020-04-24 07:49:46'),
(28, 30, 'Terminado', NULL, 'WTF2', '2020-04-11 22:07:45', 'Pruebaaaaaaaaaaaaaaaa', '2020-04-24 07:57:47', '2020-04-24 07:57:47'),
(29, 31, 'Terminado', NULL, 'WTF2', '2020-04-11 22:07:45', 'Pruebaaaaaaaaaaaaaaaa', '2020-04-24 08:45:09', '2020-04-24 08:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `foto`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(30, 'Administrador', NULL, 'Jose Alberto Trejo', 'joseatrejos@hotmail.com', NULL, '$2y$10$qxt7byWM5qFDW4UCztNOMuDhKbAmeE68CCfc.TOz/432QSkSWpkOe', NULL, '2020-04-24 06:50:24', '2020-04-24 06:50:24'),
(31, 'Usuario', NULL, 'Jose Alberto Trejo 2', 'joseatrejos@yahoo.com', NULL, '$2y$10$vF4pcaAHYbNbQRJ6jyD/0.dYK8OWEfKCRqSrQkObQDELPX/VvFNnm', NULL, '2020-04-24 07:06:19', '2020-04-24 07:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reparacion`
--
ALTER TABLE `reparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
