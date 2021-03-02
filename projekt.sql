-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Mar 2021, 18:16
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ach`
--

CREATE TABLE `ach` (
  `id` int(10) NOT NULL,
  `title` varchar(128) NOT NULL,
  `des` varchar(255) NOT NULL,
  `src_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `id_quest` int(4) NOT NULL,
  `des` varchar(255) NOT NULL,
  `good` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `battle`
--

CREATE TABLE `battle` (
  `id` int(10) NOT NULL,
  `id_game1` int(10) NOT NULL,
  `id_game2` int(10) NOT NULL,
  `date_start` datetime NOT NULL DEFAULT current_timestamp(),
  `date_end` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `description_quest`
--

CREATE TABLE `description_quest` (
  `id` int(10) NOT NULL,
  `id_quest` int(4) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game`
--

CREATE TABLE `game` (
  `id` int(10) NOT NULL,
  `id_user` int(4) NOT NULL,
  `date_start` datetime NOT NULL DEFAULT current_timestamp(),
  `date_end` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `dif` int(1) NOT NULL,
  `points` int(3) NOT NULL,
  `id_cat` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `game_quest`
--

CREATE TABLE `game_quest` (
  `id` int(4) NOT NULL,
  `id_battle` int(4) NOT NULL,
  `id_quest` int(4) NOT NULL,
  `points` int(3) NOT NULL,
  `date_start` datetime NOT NULL DEFAULT current_timestamp(),
  `date_end` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quests`
--

CREATE TABLE `quests` (
  `id` int(10) NOT NULL,
  `des` varchar(255) NOT NULL,
  `id_cat` int(4) NOT NULL,
  `dif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `nick` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nick`, `email`, `password`, `role`) VALUES
(1, 'Doh', 'kolega803@interia.eu', '8dbd62498c41b3d712bd4e1625882a22c133a298019166bca14e845391547f95', 1),
(2, 'Doh2', 'test@vp.pl', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3),
(3, '13526', 'kolega803@interia.pl', '8dbd62498c41b3d712bd4e1625882a22c133a298019166bca14e845391547f95', 3),
(4, 'nick1234', 'kolega803@interia.ppl', '8dbd62498c41b3d712bd4e1625882a22c133a298019166bca14e845391547f95', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_ach`
--

CREATE TABLE `user_ach` (
  `id` int(10) NOT NULL,
  `id_user` int(4) NOT NULL,
  `id_ach` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ach`
--
ALTER TABLE `ach`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quest` (`id_quest`);

--
-- Indeksy dla tabeli `battle`
--
ALTER TABLE `battle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game1` (`id_game1`),
  ADD KEY `id_game2` (`id_game2`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `description_quest`
--
ALTER TABLE `description_quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quest` (`id_quest`);

--
-- Indeksy dla tabeli `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `game_quest`
--
ALTER TABLE `game_quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_battle` (`id_battle`),
  ADD KEY `id_quest` (`id_quest`);

--
-- Indeksy dla tabeli `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_ach`
--
ALTER TABLE `user_ach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ach` (`id_ach`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ach`
--
ALTER TABLE `ach`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `battle`
--
ALTER TABLE `battle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `description_quest`
--
ALTER TABLE `description_quest`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `game`
--
ALTER TABLE `game`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `game_quest`
--
ALTER TABLE `game_quest`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `user_ach`
--
ALTER TABLE `user_ach`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`id_quest`) REFERENCES `quests` (`id`);

--
-- Ograniczenia dla tabeli `battle`
--
ALTER TABLE `battle`
  ADD CONSTRAINT `battle_ibfk_1` FOREIGN KEY (`id_game1`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `battle_ibfk_2` FOREIGN KEY (`id_game2`) REFERENCES `game` (`id`);

--
-- Ograniczenia dla tabeli `description_quest`
--
ALTER TABLE `description_quest`
  ADD CONSTRAINT `description_quest_ibfk_1` FOREIGN KEY (`id_quest`) REFERENCES `quests` (`id`);

--
-- Ograniczenia dla tabeli `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `game_quest`
--
ALTER TABLE `game_quest`
  ADD CONSTRAINT `game_quest_ibfk_1` FOREIGN KEY (`id_battle`) REFERENCES `battle` (`id`),
  ADD CONSTRAINT `game_quest_ibfk_2` FOREIGN KEY (`id_quest`) REFERENCES `quests` (`id`);

--
-- Ograniczenia dla tabeli `quests`
--
ALTER TABLE `quests`
  ADD CONSTRAINT `quests_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`);

--
-- Ograniczenia dla tabeli `user_ach`
--
ALTER TABLE `user_ach`
  ADD CONSTRAINT `user_ach_ibfk_1` FOREIGN KEY (`id_ach`) REFERENCES `ach` (`id`),
  ADD CONSTRAINT `user_ach_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
