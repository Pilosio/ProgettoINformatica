-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2024 alle 15:07
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fittofit`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `adminr`
--

CREATE TABLE `adminr` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `adminr`
--

INSERT INTO `adminr` (`id`, `email`, `password`) VALUES
(2, 'sonounAdmin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struttura della tabella `dieta`
--

CREATE TABLE `dieta` (
  `id` int(11) NOT NULL,
  `titolo` text NOT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `dieta`
--

INSERT INTO `dieta` (`id`, `titolo`, `descrizione`) VALUES
(1, 'IPerCalorica', 'Dieta per aumentare Peso'),
(2, 'Mantenimento Peso', 'Dieta per mantenere il peso '),
(3, 'Ipocalorica', 'Dieta per diminuire il Peso');

-- --------------------------------------------------------

--
-- Struttura della tabella `piani_coach`
--

CREATE TABLE `piani_coach` (
  `id` int(11) NOT NULL,
  `fk_id` text NOT NULL,
  `coach` text NOT NULL,
  `Numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `piani_coach`
--

INSERT INTO `piani_coach` (`id`, `fk_id`, `coach`, `Numero`) VALUES
(37, '4', 'Marco Toro', 0),
(38, '3', 'Marco Toro', 0),
(39, '3', 'Marco Toro', 0),
(40, '3', 'Marco Toro', 0),
(41, '3', 'Marco Toro', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `piani_dieta`
--

CREATE TABLE `piani_dieta` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `dieta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `piani_dieta`
--

INSERT INTO `piani_dieta` (`id`, `fk_id`, `dieta`) VALUES
(20, 3, 'Dieta Mantenimento'),
(21, 3, 'Dieta Ipercalorica');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `messaggio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `nome`, `cognome`, `password`, `email`) VALUES
(1, 'braian', 'pilosio', '363b122c528f54df4a0446b6bab05515', 'pilosio.braian@gmail.com'),
(2, 'braian', 'pilosio', '7b064dad507c266a161ffc73c53dcdc5', 'pilosio.braian@gmail.com'),
(3, 'a', 'b', 'c4ca4238a0b923820dcc509a6f75849b', 'a@gmail.com'),
(4, 'braian', 'pilosio', 'c4ca4238a0b923820dcc509a6f75849b', 'pilosio.braian@gmail.com'),
(5, 'a', 'b', 'e369853df766fa44e1ed0ff613f563bd', 'pilosio.braian@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `adminr`
--
ALTER TABLE `adminr`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `dieta`
--
ALTER TABLE `dieta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `piani_coach`
--
ALTER TABLE `piani_coach`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `piani_dieta`
--
ALTER TABLE `piani_dieta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `adminr`
--
ALTER TABLE `adminr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `dieta`
--
ALTER TABLE `dieta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `piani_coach`
--
ALTER TABLE `piani_coach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT per la tabella `piani_dieta`
--
ALTER TABLE `piani_dieta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
