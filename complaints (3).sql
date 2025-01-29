-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 01:50 PM
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `complaintdetails` text NOT NULL,
  `complaint_date` datetime DEFAULT current_timestamp(),
  `status` enum('Pending','Accepted','Denied') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `username`, `mobileno`, `complaintdetails`, `complaint_date`, `status`) VALUES
(1, 'SJCS01', 'BALAJI', 'BUS ENGIN REPAIR IN MADUKARAIN ', '2024-10-15 11:14:29', 'Denied'),
(2, 'SJCS01', 'LOKESH', 'BUS REPAIR IN VALAVANUR', '2024-10-15 11:18:02', 'Accepted'),
(3, 'SJCS01', 'MOHAN', 'BUS REPAIR IN VALAVANUR', '2024-10-15 11:41:21', 'Denied'),
(4, 'SJCS01', 'AVINASH', 'BUS REPAIR IN VALAVANUR', '2024-10-15 11:42:19', 'Accepted'),
(5, 'SJCS01', 'ROHIT', 'BUS REPAIR IN VALAVANUR', '2024-10-15 11:42:34', 'Denied'),
(6, 'SJCS01', 'VIGNESH', 'fshjtdgfghfh', '2025-01-21 11:14:40', 'Accepted'),
(7, 'malini', '1234567891', 'akjhsajl;sd flkkjflsjdfls snflsm.,sf', '2025-01-29 17:40:11', 'Accepted'),
(8, 'malini', '1234567891', 'akjhsajl;sd flkkjflsjdfls snflsm.,sf', '2025-01-29 17:41:27', 'Accepted'),
(9, 'malini', '1234567891', 'akjhsajl;sd flkkjflsjdfls snflsm.,sf', '2025-01-29 17:41:33', 'Accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
