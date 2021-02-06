-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 08:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$nkXOIT9qqI/ejW.PN5kij.nY2yagnGyRMspn4vNWu30tTziy/uHBS', '2020-11-21 17:26:15', '2020-11-21 17:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Florida', 1, '2020-11-21 11:36:14', NULL),
(2, 'Crafted', 1, '2020-11-21 11:36:18', NULL),
(3, 'Aldi', 1, '2020-11-21 11:36:22', NULL),
(4, 'fhdjhja', 1, '2020-11-21 11:36:27', NULL),
(5, 'fladhfl', 1, '2020-11-21 11:36:32', NULL),
(6, 'Meat Range', 1, '2020-11-21 11:36:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `price`, `user_ip`, `created_at`, `updated_at`) VALUES
(2, 3, 4, 23, '::1', NULL, '2020-11-24 12:36:11'),
(3, 2, 7, 22, '::1', NULL, '2020-11-24 14:17:03'),
(5, 1, 1, 22, '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Vegetables', 1, '2020-11-21 11:35:39', NULL),
(4, 'Fruit & Nut Gifts', 1, '2020-11-21 11:35:43', NULL),
(5, 'Ocean Foods', 1, '2020-11-21 11:35:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NEWYEAR', '10', '1', '2020-11-21 12:11:30', NULL),
(2, '2020', '8', '1', '2020-11-21 12:13:09', NULL);

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_04_07_145007_create_admins_table', 1),
(9, '2020_11_21_170026_create_brands_table', 2),
(10, '2020_11_21_170055_create_shippings_table', 2),
(11, '2020_11_21_170128_create_products_table', 2),
(12, '2020_11_21_170144_create_order_items_table', 2),
(13, '2020_11_21_170202_create_orders_table', 2),
(14, '2020_11_21_170220_create_coupons_table', 2),
(15, '2020_11_21_170238_create_categories_table', 2),
(16, '2020_11_21_170256_create_carts_table', 2),
(17, '2020_11_22_160256_create_wishlists_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_slug`, `product_code`, `product_quantity`, `short_description`, `long_description`, `price`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Vagetable', 'vgt', '11', '30', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 22, 'public/backend/uploadImages/1683993543739738.jpg', 'public/backend/uploadImages/1683993543795418.jpg', 'public/backend/uploadImages/1683993543811192.jpg', 1, '2020-11-21 11:56:31', '2020-11-21 12:06:47'),
(2, 5, 6, 'Vagetable 2', 'v-table-2', 'Vagetable 2', '3', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 22, 'public/backend/uploadImages/1684176627296378.jpg', 'public/backend/uploadImages/1684176627362265.jpg', 'public/backend/uploadImages/1684176627408252.jpg', 1, '2020-11-23 12:26:33', NULL),
(3, 4, 2, 'Alomelo', 'dssdsdsz', '2', '3', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 'My name is Md. Shah Jamal. I am a full-stack developer, entrepreneur, and owner of this laravel demo site. I like writing tutorials and tips that can help other developers. I share tutorials of PHP, Javascript, JQuery, Laravel, Livewire, Codeigniter, Vue JS, Angular JS, React Js, WordPress, and Bootstrap from a starting stage. As well as demo example.', 23, 'public/backend/uploadImages/1684176725679528.jpg', 'public/backend/uploadImages/1684176725726638.jpg', 'public/backend/uploadImages/1684176725742319.jpg', NULL, '2020-11-23 12:28:07', NULL),
(4, 5, 6, 'Salmon', 'sl', '33', '6', 'In a large bowl, combine the miso paste with 1 tbsp rice wine vinegar and 1 tsp sugar. Put the cod fillets in the marinade and turn over so they are evenly coated. Cover with cling film and chill for 1 hr.\r\nPut the radishes in a small bowl with the black sesame seeds, the remaining vinegar and sugar, and a pinch of salt. Leave to pickle for at least 30 mins.\r\n\r\nFor the wasabi tartare sauce, combine all the ingredients and season well. Set aside or chill in the fridge until needed.', 'In a large bowl, combine the miso paste with 1 tbsp rice wine vinegar and 1 tsp sugar. Put the cod fillets in the marinade and turn over so they are evenly coated. Cover with cling film and chill for 1 hr.\r\n\r\nSTEP 2\r\nPut the radishes in a small bowl with the black sesame seeds, the remaining vinegar and sugar, and a pinch of salt. Leave to pickle for at least 30 mins.\r\n\r\nSTEP 3\r\nFor the wasabi tartare sauce, combine all the ingredients and season well. Set aside or chill in the fridge until needed.\r\n\r\nSTEP 4\r\nMeanwhile, put the sweet potato chips in a large saucepan filled with cold salted water. Bring to the boil and cook for 7-8 mins until slightly tender. Drain and leave to steam-dry for 2 mins.\r\n\r\nSTEP 5\r\nFill a large saucepan with the oil until two-thirds full. Place over a medium-high heat until the oil reaches 180C on a temperature probe (or until a piece of bread crisps up in 20 secs). Meanwhile, make the tempura batter by combining the flours and gradually whisking in the soda water. Whisk until the batter is lump-free, then chill until needed.\r\n\r\nSTEP 6\r\nOnce the oil has come to temperature, fry the sweet potato chips in batches until golden and cooked through, about 5 mins. Transfer to a baking sheet, season with salt and place in a low oven to keep warm while you fry the fish.\r\n\r\nSTEP 7\r\nTip some seasoned flour onto a plate and dip the cod fillets in it, patting off any excess. Dip into the batter and fry in the same oil as the chips for 3-4 mins, until the batter is golden and the fish is cooked. Drain on kitchen paper.\r\n\r\nSTEP 8\r\nServe the cod with the chips, wasabi tartare, pickled radishes and lime for squeezing over.', 250, 'public/backend/uploadImages/1684271067072737.jpg', 'public/backend/uploadImages/1684271067388492.jpg', 'public/backend/uploadImages/1684271067491773.jpg', NULL, '2020-11-24 13:27:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$nkXOIT9qqI/ejW.PN5kij.nY2yagnGyRMspn4vNWu30tTziy/uHBS', NULL, '2020-11-21 11:25:03', '2020-11-21 11:25:03'),
(2, 'Sam', 'sam@gmail.com', NULL, '$2y$10$jrno1oSq9KocLJFVu7EwoeTV2RAyLt8EWZ7nwm/DTF8rplMbtDGN6', NULL, '2020-11-22 10:38:09', '2020-11-22 10:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 3, NULL, NULL),
(6, 2, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
