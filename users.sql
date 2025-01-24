-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 09:17 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `role`, `created_at`) VALUES
(1, 'BM001', '$2y$10$yHctfvKAjti1/NH0Oxcj5ONWZikz88UmlHjx3vuGKGEmBOeZq.mqq', '', 'admin', '2025-01-24 05:26:46'),
(2, 'BALAJIS', '$2y$10$DvFr49WNAV51T6beHjonSeieYc7SvxlETt1MoJwFhw.CrWss.Cyg6', '', 'user', '2025-01-24 05:28:02'),
(3, 'balaji', '$2y$10$btI0FUvZSh//W0cdLsRG3u4SV7IbIdk9UOhHCEpAdUc838/4ete0y', '', 'user', '2025-01-24 05:29:46'),
(4, 'bm', '$2y$10$Lg0AOUzL02GkXpnQvsdd7uZ7g2EJuRg/8GSi78JrnaI2VzHVFEQuO', '', 'admin', '2025-01-24 05:36:28'),
(5, 'bm01', '$2y$10$U.Xj8Fui1ks8cWaKmrTsb.SeELNPGKoViG0Fv4yTEkoH/kcMrIpV.', '8838818193', 'admin', '2025-01-24 05:52:20'),
(6, 'atchu', '$2y$10$96U3HfJ6pn4rFkPJ9kunIuliHB4crakQVohEJzoC.D/glFX0E5PKG', '1234567891', 'user', '2025-01-24 06:33:28'),
(7, 'bala', '$2y$10$PCcKH58Kuk6m8gcOmMZmD.rP6hb6/XmUMTbe1MJk4HUXDl8CyS49y', '8838818193', 'admin', '2025-01-24 07:15:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
