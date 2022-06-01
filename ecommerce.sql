-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 11:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutinformation`
--

CREATE TABLE `aboutinformation` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=dec8;

-- --------------------------------------------------------

--
-- Table structure for table `brandinformation`
--

CREATE TABLE `brandinformation` (
  `id` bigint(255) NOT NULL,
  `sl` varchar(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoryinformation`
--

CREATE TABLE `categoryinformation` (
  `id` bigint(100) NOT NULL,
  `sl` varchar(255) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contactinformation`
--

CREATE TABLE `contactinformation` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `question` varchar(500) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `howtobuy`
--

CREATE TABLE `howtobuy` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iteminformation`
--

CREATE TABLE `iteminformation` (
  `id` bigint(20) NOT NULL,
  `sl` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productinformation`
--

CREATE TABLE `productinformation` (
  `id` bigint(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` longtext NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `purchase_price` varchar(255) DEFAULT NULL,
  `sale_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_details` longtext DEFAULT NULL,
  `full_details` longtext DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `stock_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settinginformation`
--

CREATE TABLE `settinginformation` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliderinformation`
--

CREATE TABLE `sliderinformation` (
  `id` int(20) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=dec8;

-- --------------------------------------------------------

--
-- Table structure for table `termcondition`
--

CREATE TABLE `termcondition` (
  `id` int(30) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `address`, `password`, `confirmpassword`, `status`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bidhan Nath', 'bidhannath939362@gmail.com', NULL, '', '', '$2y$10$fPOpsGJAgH2CkcBDV8WKUOlvGUQHKM1YcygTB8fG1Fm07kmJMGHHi', '', '', NULL, NULL, '2022-01-18 09:48:49', '2022-01-18 09:48:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutinformation`
--
ALTER TABLE `aboutinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandinformation`
--
ALTER TABLE `brandinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoryinformation`
--
ALTER TABLE `categoryinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactinformation`
--
ALTER TABLE `contactinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howtobuy`
--
ALTER TABLE `howtobuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iteminformation`
--
ALTER TABLE `iteminformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productinformation`
--
ALTER TABLE `productinformation`
  ADD PRIMARY KEY (`id`,`product_code`);

--
-- Indexes for table `settinginformation`
--
ALTER TABLE `settinginformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderinformation`
--
ALTER TABLE `sliderinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termcondition`
--
ALTER TABLE `termcondition`
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
-- AUTO_INCREMENT for table `aboutinformation`
--
ALTER TABLE `aboutinformation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brandinformation`
--
ALTER TABLE `brandinformation`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryinformation`
--
ALTER TABLE `categoryinformation`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactinformation`
--
ALTER TABLE `contactinformation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `howtobuy`
--
ALTER TABLE `howtobuy`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iteminformation`
--
ALTER TABLE `iteminformation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productinformation`
--
ALTER TABLE `productinformation`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settinginformation`
--
ALTER TABLE `settinginformation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliderinformation`
--
ALTER TABLE `sliderinformation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `termcondition`
--
ALTER TABLE `termcondition`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
