-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 14.05.2024 klo 11:13
-- Palvelimen versio: 8.0.37
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noekiv23_t2asettocorsa`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `Auton kategoria`
--

CREATE TABLE `Auton kategoria` (
  `kategoriaID` int NOT NULL,
  `kategorian nimi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Auton kategoria`
--

INSERT INTO `Auton kategoria` (`kategoriaID`, `kategorian nimi`) VALUES
(1, 'jdm'),
(2, 'track'),
(3, 'luxury '),
(4, 'german');

-- --------------------------------------------------------

--
-- Rakenne taululle `Autot`
--

CREATE TABLE `Autot` (
  `AutoID` int NOT NULL,
  `nimi` text NOT NULL,
  `hevosvoimat` varchar(255) NOT NULL,
  `hinta` varchar(255) NOT NULL,
  `paino` varchar(255) NOT NULL,
  `kategoriaID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Autot`
--

INSERT INTO `Autot` (`AutoID`, `nimi`, `hevosvoimat`, `hinta`, `paino`, `kategoriaID`) VALUES
(2, 'R34 Skyline', '1200hp', '230 000€', '1500kg', 1),
(3, 'BMW E36', '450hp', '40 000€', '1100kg', 4),
(4, 'Rolls Royce Ghost', '550hp', '300 000€', '1700kg', 3),
(5, 'Porsche 911 992 GT3 RS', '800hp', '500 000€', '1 000kg', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `Pelaaja`
--

CREATE TABLE `Pelaaja` (
  `PelaajaID` int NOT NULL,
  `gamertag` varchar(255) NOT NULL,
  `level` int NOT NULL,
  `maa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Pelaaja`
--

INSERT INTO `Pelaaja` (`PelaajaID`, `gamertag`, `level`, `maa`) VALUES
(1, 'EpicGamer777', 7, 'norja '),
(2, 'Kanje Länsi ', 4, 'kiina'),
(3, 'ano777', 99, 'none');

-- --------------------------------------------------------

--
-- Rakenne taululle `Rata`
--

CREATE TABLE `Rata` (
  `RataID` int NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `pituus` varchar(255) NOT NULL,
  `olosuhteet` varchar(255) NOT NULL,
  `max pelaajien määrä` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Rata`
--

INSERT INTO `Rata` (`RataID`, `nimi`, `pituus`, `olosuhteet`, `max pelaajien määrä`) VALUES
(1, 'Sutoku interwall', '15km', 'sateinen', '100'),
(2, 'nurburgring', '5.148 km', 'selkeä ja kuiva', '25');

-- --------------------------------------------------------

--
-- Rakenne taululle `Sessio`
--

CREATE TABLE `Sessio` (
  `SessioID` int NOT NULL,
  `pelaajaID` int NOT NULL,
  `rataID` int NOT NULL,
  `autoID` int NOT NULL,
  `kesto` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `Sessio`
--

INSERT INTO `Sessio` (`SessioID`, `pelaajaID`, `rataID`, `autoID`, `kesto`) VALUES
(1, 1, 2, 5, '99:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Auton kategoria`
--
ALTER TABLE `Auton kategoria`
  ADD PRIMARY KEY (`kategoriaID`);

--
-- Indexes for table `Autot`
--
ALTER TABLE `Autot`
  ADD PRIMARY KEY (`AutoID`),
  ADD KEY `kategoriaID` (`kategoriaID`);

--
-- Indexes for table `Pelaaja`
--
ALTER TABLE `Pelaaja`
  ADD PRIMARY KEY (`PelaajaID`);

--
-- Indexes for table `Rata`
--
ALTER TABLE `Rata`
  ADD PRIMARY KEY (`RataID`);

--
-- Indexes for table `Sessio`
--
ALTER TABLE `Sessio`
  ADD PRIMARY KEY (`SessioID`),
  ADD KEY `pelaajaID` (`pelaajaID`),
  ADD KEY `rataID` (`rataID`),
  ADD KEY `autoID` (`autoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Auton kategoria`
--
ALTER TABLE `Auton kategoria`
  MODIFY `kategoriaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Autot`
--
ALTER TABLE `Autot`
  MODIFY `AutoID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Pelaaja`
--
ALTER TABLE `Pelaaja`
  MODIFY `PelaajaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Rata`
--
ALTER TABLE `Rata`
  MODIFY `RataID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Sessio`
--
ALTER TABLE `Sessio`
  MODIFY `SessioID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `Autot`
--
ALTER TABLE `Autot`
  ADD CONSTRAINT `Autot_ibfk_1` FOREIGN KEY (`kategoriaID`) REFERENCES `Auton kategoria` (`kategoriaID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Rajoitteet taululle `Sessio`
--
ALTER TABLE `Sessio`
  ADD CONSTRAINT `Sessio_ibfk_1` FOREIGN KEY (`pelaajaID`) REFERENCES `Pelaaja` (`PelaajaID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Sessio_ibfk_2` FOREIGN KEY (`rataID`) REFERENCES `Rata` (`RataID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Sessio_ibfk_3` FOREIGN KEY (`autoID`) REFERENCES `Autot` (`AutoID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
