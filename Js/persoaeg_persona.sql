-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 01:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persoaeg_persona`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `c` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `username`, `pass`, `c`) VALUES
(1, 'info@persona-eg.com', 'GpNnROnaccTw7VqHfcO/BQ==', 'wyYO6/ZTgHUAZIs6mD2qpg==');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `orderN` int(11) NOT NULL,
  `name` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `link` text NOT NULL,
  `description` text NOT NULL,
  `description_ar` text NOT NULL,
  `p_photo` text NOT NULL,
  `s_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `orderN`, `name`, `type`, `link`, `description`, `description_ar`, `p_photo`, `s_photo`) VALUES
(0, 0, 'ETMCO', 0, 'https://etmcoeg.com', 'Simple and attractive website for an authorized and official distributor for Canon that allows Customers to shop and search for their needs on the website in addition to the delivery of an admin panel that allows the owner to add, edit, or delete products.', '', 'etmco_pr.webp', 'etmco1.webp,etmco2.webp,etmco3.webp,etmco4.webp,etmco5.webp'),
(1, 0, 'We have got chemistry', 1, 'https://wehavegotchemistry.com', 'web app to make teacher can upload videos, documents, homeworks and receive answers from students for these homeworks. Also, the website is designed to divide students into several levels.', '', 'chemistry_pr.webp', 'chemistry1.webp,chemistry2.webp,chemistry3.webp,chemistry4.webp,chemistry5.webp'),
(2, 1, 'Sedia furniture', 0, 'https://sediafurniture.000webhostapp.com', 'website for a manufacturer of fine classic and contemporary furniture with a simple gallery that has custom filters in addition to an admin panel to make the owner can change the carousel elements, gallery elements, and custom filters.', '', 'sedia_pr.webp', 'sedia1.webp,sedia2.webp,sedia3.webp,sedia4.webp,sedia5.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
