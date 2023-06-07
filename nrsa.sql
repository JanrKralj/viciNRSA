-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 07. jun 2023 ob 19.23
-- Različica strežnika: 10.4.28-MariaDB
-- Različica PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `nrsa`
--

-- --------------------------------------------------------

--
-- Struktura tabele `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(10) NOT NULL,
  `ime_kategorije` varchar(60) NOT NULL,
  `id_kategorije` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `kategorija`
--

INSERT INTO `kategorija` (`id`, `ime_kategorije`, `id_kategorije`) VALUES
(3, 'Policijski vic', 1),
(4, 'Mujo in Haso', 2),
(5, 'Moji vici', 3),
(6, 'Ostali vici', 4);

-- --------------------------------------------------------

--
-- Struktura tabele `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_slovenian_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_slovenian_ci NOT NULL,
  `register` datetime NOT NULL,
  `zadnjaPrijava` datetime NOT NULL DEFAULT current_timestamp(),
  `nepravilnaPrijava` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `register`, `zadnjaPrijava`, `nepravilnaPrijava`) VALUES
(7, 'a@aa.com', '7c222fb2927d828af22f592134e8932480637c0d', '2023-06-03 10:26:26', '2023-06-04 10:05:59', 0),
(12, '12345678@aa.com', '7c222fb2927d828af22f592134e8932480637c0d', '2023-06-04 09:51:59', '2023-06-04 10:05:59', 0),
(13, 'janrk@example.com', '7c222fb2927d828af22f592134e8932480637c0d', '2023-06-04 10:41:21', '2023-06-06 21:59:14', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `vic`
--

CREATE TABLE `vic` (
  `id` int(10) NOT NULL,
  `naslov` varchar(60) NOT NULL,
  `vsebina` varchar(255) NOT NULL,
  `dodano` datetime DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL,
  `id_kategorije` int(10) NOT NULL,
  `datumSpremembe` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `vic`
--

INSERT INTO `vic` (`id`, `naslov`, `vsebina`, `dodano`, `id_user`, `id_kategorije`, `datumSpremembe`) VALUES
(35, 'Blondinka', 'aaaaaaaaaaaaaaaaaaaa', '2023-06-06 22:24:17', 13, 0, NULL),
(36, 'Lorem', 'aaaaaaaaaaaaaaaaaaaa', '2023-06-06 22:24:21', 13, 0, NULL),
(37, '  aaaaaa', 'QQQQQQQQQQQQQQQQQQQQQ', '2023-06-06 22:24:26', 13, 0, '2023-06-06 22:41:29');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `vic`
--
ALTER TABLE `vic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT tabele `vic`
--
ALTER TABLE `vic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id`) REFERENCES `vic` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
