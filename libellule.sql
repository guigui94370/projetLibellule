-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Février 2016 à 16:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `libellule`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `idSpe` int(11) NOT NULL,
  `codePostal` varchar(5) NOT NULL,
  `ville` varchar(150) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `locX` float DEFAULT NULL,
  `locY` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idSpe` (`idSpe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `idSpe`, `codePostal`, `ville`, `adresse`, `locX`, `locY`) VALUES
(1, 'Swayze', 'Patrick', 1, '75011', 'Paris', '5 avenue de la République', NULL, NULL),
(2, 'Dujardin', 'Jean', 2, '75005', 'Paris', '2 rue du Chemin Vert', NULL, NULL),
(3, 'Bieber', 'Justin', 3, '75001', 'Paris', 'Sous un pont', NULL, NULL),
(4, 'Leforestier', 'Maxime', 4, '75014', 'Paris', '784 avenue des Champs Elysées', NULL, NULL),
(5, 'Lataupe', 'René', 5, '94200', 'Saint-Maur-des-Fossés', '42 rue de la Paix', NULL, NULL),
(6, 'Zuckenberg', 'Mark', 3, '75013', 'Paris', '6 rue de Facebook', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id`, `libelle`) VALUES
(1, 'Sofrologue'),
(2, 'Perruquier'),
(3, 'Chirurgien Plasticien'),
(4, 'Kinésithérapeute'),
(5, 'Osthéopathe');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`idSpe`) REFERENCES `specialite` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
