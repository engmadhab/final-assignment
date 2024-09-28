-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2024 at 08:15 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `stars`, `created_at`, `updated_at`) VALUES
(1, 'Audi', 'Audi', 'A4', 2018, 'Sedan', 50.00, 'Available', '/images/cars/Audi_A4.jpg', 5, NULL, '2024-09-28 02:12:34'),
(2, 'Model S', 'Tesla', 'Long Range', 2022, 'Electric', 45.00, 'Available', '/images/cars/Tesla_Model_3.jpg', 5, NULL, NULL),
(3, 'BMW', 'BMW', 'X5', 2021, 'Electric', 60.00, 'Available', '/images/cars/BMW_X5.jpg', 5, NULL, NULL),
(4, 'Altima', 'Nissan', 'SL', 2015, 'Sedan', 48.00, 'Available', '/images/cars/Nissan_Altima.jpg', 5, NULL, '2024-09-28 02:12:44'),
(5, 'Civic', 'Honda', 'EX', 2016, 'Sedan', 40.00, 'Available', '/images/cars/Honda_Civic.jpg', 5, NULL, '2024-09-28 02:13:13'),
(6, 'Hyundai_Tucson', 'Hyundai', 'Tucson', 2014, 'Slipper', 62.00, 'Reserved', '/images/cars/Hyundai_Tucson.jpg', 5, NULL, '2024-09-27 02:49:48');

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
(46, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(47, '2024_09_21_101258_create_users_table', 1),
(48, '2024_09_21_101956_create_cars_table', 1),
(49, '2024_09_22_043311_create_rentals_table', 1),
(50, '2024_09_22_095712_add_details_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int NOT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `days`, `price_per_day`, `total_price`, `status`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2024-09-27', '2024-09-30', 3, 50.00, 150.00, 'Completed', 'By Cash', 'Paid', '2024-09-27 02:25:27', '2024-09-28 02:12:39'),
(2, 3, 4, '2024-09-27', '2024-09-30', 3, 48.00, 144.00, 'Completed', 'By Cash', 'Paid', '2024-09-27 02:41:54', '2024-09-28 02:12:48'),
(3, 3, 5, '2024-09-27', '2024-09-30', 3, 40.00, 120.00, 'Canceled', 'By Cash', 'Canceled', '2024-09-27 02:47:19', '2024-09-28 02:13:13'),
(4, 3, 6, '2024-09-27', '2024-09-30', 3, 62.00, 186.00, 'Ongoing', 'By Cash', 'Pending', '2024-09-27 02:49:48', '2024-09-28 02:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@email.com', '1234567890', 'Sector 11, Uttara Dhaka', NULL, '$2y$10$LH1F9xElFSfvi6yH8BjkBO2RoOR9PxpgFrUN2Ff5bK61rIUtqVZMW', NULL, 'admin', '2024-09-27 02:24:38', '2024-09-27 02:24:38'),
(2, 'Customer User', 'customer@email.com', '1234567890', 'Sector 11, Uttara Dhaka', NULL, '$2y$10$uIrbWPGdSXoBtSnUXaVZeuslE00HkPy3MZQWpX9EaD7i56U8TPCje', NULL, 'customer', '2024-09-27 02:24:39', '2024-09-27 02:24:39'),
(3, 'Madhab Chandra Shill', 'joy@gingham.com.bd', '01747654201', 'House 33, Road 24/30, Gulshan-1, Dhaka-1212', NULL, '$2y$10$orrXn/qKirfbKRGoKdDvI.zOlT8ove96xv.qqtaVJIhtOPuh.K5XG', NULL, 'customer', '2024-09-27 02:25:13', '2024-09-27 02:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
