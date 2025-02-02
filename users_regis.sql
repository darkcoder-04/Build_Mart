-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `build_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_regis`
--

CREATE TABLE `users_regis` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('Pending','Approved') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_regis`
--

INSERT INTO `users_regis` (`id`, `name`, `company`, `email`, `phone`, `status`, `created_at`, `unique_id`, `password`) VALUES
(4, 'Jayanhanthinhi Thangapandian', 'Sathyabama', 'nhandhu05@gmail.com', '09344983609', 'Pending', '2025-02-02 05:55:54', 'JAY5914', '$2y$10$gtq/CI2sDE7.xoZSO3i2EeIbMXtHX58YP4x7M3h2nhusPoFK/lTCe'),
(6, 'Abhinaya', 'Saksha builders', 'sbhama26@gmail.com', '9080103416', 'Pending', '2025-02-02 06:11:37', 'bm22', '$2y$10$QU36xPkST5nWYeVySaEINO0Ae9UUtFyLtiNOhA5Ouy24epOgo8TMC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_regis`
--
ALTER TABLE `users_regis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_regis`
--
ALTER TABLE `users_regis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
