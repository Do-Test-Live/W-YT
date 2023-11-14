-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 12:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(500) NOT NULL,
  `admin_pass` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`, `status`) VALUES
(1, 'Super Admin', 'superadmin@yt.com', '@BCD1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(3, 'Test 1', '2023-11-05 12:23:34', '0000-00-00 00:00:00'),
(4, 'Test 2', '2023-11-05 12:23:39', '0000-00-00 00:00:00'),
(5, 'Test 3', '2023-11-05 12:23:44', '0000-00-00 00:00:00'),
(6, '商業及專業服務', '2023-11-05 18:47:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `industry_type_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `website` varchar(255) NOT NULL,
  `location` varchar(500) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `cat_id`, `sub_cat_id`, `industry_type_id`, `company_name`, `phone`, `fax`, `website`, `location`, `inserted_at`, `updated_at`) VALUES
(2, 4, 2, 2, 'Test Company', '000000', '111111', 'www.xyz.com', 'Hong Kong', '2023-11-05 18:10:17', '0000-00-00 00:00:00'),
(3, 6, 4, 5, '泰時實業有限公司', '2793 2853', '2793 2853', 'www.xyz.com', 'Hong Kong', '2023-11-05 18:50:27', '0000-00-00 00:00:00'),
(4, 6, 5, 4, '聯寶夾萬貿易公司', '2366 3888', '2366 3888', 'www.xyz.com', '紅磡 凱旋工商中心', '2023-11-05 18:51:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `industry_type`
--

CREATE TABLE `industry_type` (
  `industry_type_id` int(11) NOT NULL,
  `industry_name` varchar(255) NOT NULL,
  `cat_id` int(50) NOT NULL,
  `sub_cat_id` int(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry_type`
--

INSERT INTO `industry_type` (`industry_type_id`, `industry_name`, `cat_id`, `sub_cat_id`, `created_at`, `updated_at`) VALUES
(2, 'Test Industry', 4, 2, '2023-11-05 15:11:38', '0000-00-00 00:00:00'),
(3, '夾萬─批發及製造', 6, 4, '2023-11-05 18:48:52', '0000-00-00 00:00:00'),
(4, '廢物清除及處理服務', 6, 5, '2023-11-05 18:49:11', '0000-00-00 00:00:00'),
(5, '廠商代理', 6, 6, '2023-11-05 18:49:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `created_at`, `updated_at`) VALUES
(1, 1, '', '2023-11-05 12:41:05', '2023-11-05 14:20:55'),
(2, 4, 'Test 2', '2023-11-05 12:41:28', '0000-00-00 00:00:00'),
(4, 6, '保安服務', '2023-11-05 18:47:59', '0000-00-00 00:00:00'),
(5, 6, '清潔、滅蟲服務', '2023-11-05 18:48:12', '0000-00-00 00:00:00'),
(6, 6, '貿易、商業服務', '2023-11-05 18:48:20', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `industry_type`
--
ALTER TABLE `industry_type`
  ADD PRIMARY KEY (`industry_type_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `industry_type`
--
ALTER TABLE `industry_type`
  MODIFY `industry_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
