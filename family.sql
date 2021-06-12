-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2021, 02:54
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `family`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `amount` double NOT NULL,
  `in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `budget`
--

INSERT INTO `budget` (`id`, `name`, `amount`, `in`) VALUES
(1, 'work', 2500, 1),
(2, 'bills', -1000, 0),
(5, 'sth', 100, 0),
(6, 'work father', 2000, 0),
(7, 'shoping', 500, 0),
(8, 'holidays', -200, 0),
(9, 'car repair', -600, 0),
(11, 'paying loans', -600, 0),
(12, 'unexpected', -300, 0),
(13, 'market', -300, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `endPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `shop`
--

INSERT INTO `shop` (`id`, `name`, `amount`, `price`, `endPrice`) VALUES
(1, 'milk', 12, 2.5, 30),
(2, 'choco', 1, 3, 3),
(6, 'flowers', 2, 5, 10),
(8, 'sth', 3, 15, 45);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data` date NOT NULL,
  `description` text COLLATE utf8mb4_polish_ci NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `data`, `description`, `priority`) VALUES
(1, 'vacuming', '2020-01-01', '', 0),
(2, 'washing the dishes', '2021-06-13', '', 0),
(4, 'shoping', '2021-06-12', '', 0),
(6, 'peeling the potatos', '2020-06-15', '', 0),
(7, 'sth', '2020-01-01', 'sth2', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
