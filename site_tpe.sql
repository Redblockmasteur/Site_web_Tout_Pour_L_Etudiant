-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2021 at 09:15 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_tpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id_article` int(3) NOT NULL,
  `titre_article` varchar(50) NOT NULL,
  `ref_article` varchar(12) NOT NULL,
  `prix_article` float NOT NULL,
  `description_article` varchar(254) NOT NULL,
  `article_photo` varchar(30) NOT NULL,
  `article_toc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `titre_article`, `ref_article`, `prix_article`, `description_article`, `article_photo`, `article_toc`) VALUES
(1, 'Rangement pour cahiers', 'SKU: BST-498', 15.04, 'Rangement pratique pour les documents', 'media/RPC.jpg', '2021-11-16 18:04:47'),
(2, 'Rangement salle de bain', 'SKU: BST-548', 50, 'Rangement de salle de bain pratique pour les petits espaces', 'media/RSDB.jpg', '2021-11-16 18:07:03'),
(3, 'Coque de MacBook', 'BST-456', 36.75, 'Coque universelle pour MacBook', 'media/CO.jpg', '2021-11-17 22:14:14'),
(4, 'Lit Canapé', 'SKU: BST-765', 107.99, 'Canapé lit abordable conçut pour les étudiants', 'media/LC.jpg', '2021-11-17 22:16:39'),
(5, 'Machine à café', 'SKU: BST-458', 27.99, 'Cafetière de qualité conçue pour les étudiants', 'media/MC.jpg', '2021-11-22 08:39:51'),
(6, 'Set de crayon à papier', 'SKU: BST-738', 9.99, 'Lot de crayons et accessoires conçut pour les étudiants', 'media/SCP.jpg', '2021-11-22 08:55:22'),
(7, 'Set de cahier style carton', 'SKU: BST-198', 25.99, 'Lot de crayons et de cahiers conçut pour les étudiants', 'media/SESB.jpg', '2021-11-22 08:58:04'),
(8, 'Table à manger pour 2', 'SKU: BST-568', 50, 'Table à manger design et pratique conçue pour 2 personnes', 'media/TAM.jpg', '2021-11-22 09:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
