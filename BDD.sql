-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 30 nov. 2017 à 19:41
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `EyesHelp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Personnes`
--

CREATE TABLE `Personnes` (
  `Mail_User` varchar(50) NOT NULL,
  `LastName_User` varchar(30) NOT NULL,
  `FirstName_User` varchar(30) NOT NULL,
  `Birthday_User` int(10) NOT NULL,
  `Password_User` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Personnes`
--

INSERT INTO `Personnes` (`Mail_User`, `LastName_User`, `FirstName_User`, `Birthday_User`, `Password_User`) VALUES
('a', 'a', 'a', 0, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
('a@a.fr', 'a', 'a', 0, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
('john.david@gmail.com', 'david', 'john', 0, 'a51dda7c7ff50b61eaea0444371f4a6a9301e501'),
('julienr85@gmail.com', 'Julien', 'Robert', 0, '556c43bd496b04b2ac8be888dc8a82afb054c3fc'),
('rj.robert.julien@gmail.fr', 'Julien Robert', 'Robert', 0, 'f10f1e52dcc52c82b5ca0a195ab8b7f71940f10b'),
('robert.julien@gmail.com', 'julien', 'Robert', 0, 'f551162ff90e09c3300a9e2b0509e4d6b602fdb1');

-- --------------------------------------------------------

--
-- Structure de la table `Provider`
--

CREATE TABLE `Provider` (
  `IdentifiantPersonnes` varchar(50) NOT NULL,
  `Provider_Name` varchar(40) NOT NULL,
  `ContactLens_Name` varchar(40) NOT NULL,
  `Renewal` varchar(15) NOT NULL,
  `UseFrequency` int(20) NOT NULL,
  `timeSlot` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Provider`
--

INSERT INTO `Provider` (`IdentifiantPersonnes`, `Provider_Name`, `ContactLens_Name`, `Renewal`, `UseFrequency`, `timeSlot`) VALUES
('julienr85@gmail.com', 'COOPERVISION', 'Biofinity Energys', 'Journalier', 1, '12 h (Max) / jour'),
('rj.robert.julien@gmail.fr', '', '', '', 0, ''),
('robert.julien@gmail.com', 'COOPERVISION', 'Biofinity Energys', 'Bi-Mensuel', 15, '8h à 10h (Max) / jou'),
('john.david@gmail.com', '', '', '', 0, ''),
('a@a.fr', 'ALCON', 'DAILIES TOTAL 1 ®', 'Journalier', 1, '12 h (Max) / jour'),
('a', 'ALCON', 'DAILIES TOTAL 1 ®', 'Journalier', 1, '12 h (Max) / jour');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Personnes`
--
ALTER TABLE `Personnes`
  ADD PRIMARY KEY (`Mail_User`);

--
-- Index pour la table `Provider`
--
ALTER TABLE `Provider`
  ADD KEY `fkey` (`IdentifiantPersonnes`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Provider`
--
ALTER TABLE `Provider`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`IdentifiantPersonnes`) REFERENCES `Personnes` (`Mail_User`);
