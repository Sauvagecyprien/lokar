-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 12 Septembre 2019 à 10:34
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lokar`
--

-- --------------------------------------------------------

--
-- Structure de la table `menbre`
--

CREATE TABLE `menbre` (
  `ID` int(255) NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Age` int(255) NOT NULL,
  `Pass` blob NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Véhicules`
--

CREATE TABLE `Véhicules` (
  `ID` int(255) NOT NULL,
  `Marque` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Modele` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Kilometrage` int(255) NOT NULL,
  `Immatriculation` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nombre_de_places` int(1) NOT NULL,
  `PrixJour` int(3) NOT NULL,
  `Motorisation` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Boite_de_Vitesse` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Climatiseur` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Véhicules`
--

INSERT INTO `Véhicules` (`ID`, `Marque`, `Modele`, `Date`, `Kilometrage`, `Immatriculation`, `Nombre_de_places`, `PrixJour`, `Motorisation`, `Boite_de_Vitesse`, `Climatiseur`, `Photo`) VALUES
(1, 'Citroën', 'DS3', '2004-07-22', 236559, 'BX568LP', 5, 45, 'Diesel', 'Manuel', 'Oui', 'https://cutt.ly/VwSfUHA'),
(2, 'Mazda', '3', '2005-11-28', 26489, 'DB569OP', 5, 75, 'Essence', 'Automatique', 'Oui', 'https://cutt.ly/nwD9j3G'),
(3, 'Audi', 'R8', '2018-10-19', 8045, 'OG420CQ', 2, 167, 'Essence', 'Automatique', 'Oui', 'https://cutt.ly/nwD9j3G'),
(4, 'Citroën', 'c4', '2019-09-13', 1546521, 'BX520BX', 5, 30, 'Essence', 'Automatique', 'Oui', 'https://cutt.ly/nwD9j3G');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menbre`
--
ALTER TABLE `menbre`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Véhicules`
--
ALTER TABLE `Véhicules`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menbre`
--
ALTER TABLE `menbre`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Véhicules`
--
ALTER TABLE `Véhicules`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
