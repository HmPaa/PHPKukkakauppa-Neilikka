-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 10:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yhteydenotot_neilikka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttajatunnus` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `salasana` blob NOT NULL,
  `email` char(50) COLLATE utf8_swedish_ci NOT NULL,
  `pvm` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `is_active` varchar(5) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuotekategoria`
--

CREATE TABLE `tuotekategoria` (
  `id` int(20) NOT NULL,
  `tuotekategoria` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `kuvaus` char(100) COLLATE utf8_swedish_ci NOT NULL,
  `kuva` char(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tuotteet`
--

CREATE TABLE `tuotteet` (
  `id` int(11) NOT NULL,
  `nimi` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `kuvaus` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `hinta` decimal(7,2) NOT NULL,
  `kuva` longtext COLLATE utf8_swedish_ci NOT NULL,
  `kategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenotot`
--

CREATE TABLE `yhteydenotot` (
  `ID` int(255) NOT NULL,
  `Paivays` timestamp NOT NULL DEFAULT current_timestamp(),
  `Nimi` char(30) COLLATE utf8_swedish_ci NOT NULL,
  `Sahkoposti` char(100) COLLATE utf8_swedish_ci NOT NULL,
  `Aihe` char(20) COLLATE utf8_swedish_ci NOT NULL,
  `Vapaa_teksti` char(200) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`kayttajatunnus`);

--
-- Indexes for table `tuotekategoria`
--
ALTER TABLE `tuotekategoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuotekategoria` (`tuotekategoria`);

--
-- Indexes for table `tuotteet`
--
ALTER TABLE `tuotteet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`);

--
-- Indexes for table `yhteydenotot`
--
ALTER TABLE `yhteydenotot`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuotekategoria`
--
ALTER TABLE `tuotekategoria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuotteet`
--
ALTER TABLE `tuotteet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yhteydenotot`
--
ALTER TABLE `yhteydenotot`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tuotteet`
--
ALTER TABLE `tuotteet`
  ADD CONSTRAINT `kategoria_va` FOREIGN KEY (`kategoria_id`) REFERENCES `tuotekategoria` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
