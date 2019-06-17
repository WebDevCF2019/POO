-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 17 juin 2019 à 09:36
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cursus`
--
CREATE DATABASE IF NOT EXISTS `cursus` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cursus`;

-- --------------------------------------------------------

--
-- Structure de la table `thesection`
--

DROP TABLE IF EXISTS `thesection`;
CREATE TABLE IF NOT EXISTS `thesection` (
  `idthesection` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` varchar(100) NOT NULL,
  `thedesc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idthesection`),
  UNIQUE KEY `thetitle_UNIQUE` (`thetitle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thesection`
--

INSERT INTO `thesection` (`idthesection`, `thetitle`, `thedesc`) VALUES
(1, 'Développeur Web', 'Le développeur Web réalise l’ensemble des fonctionnalités d’un site internet. Après analyse des besoins du client, il préconise et met en oeuvre une solution technique pour concevoir des sites sur mesure ou adapter des solutions techniques existantes.'),
(2, 'Opérateur PAO', 'L’opérateur PAO est chargé de la conception graphique de projets pour divers types d’imprimés (livres, catalogues, logos, affiches…).\r\n\r\nIl dispose harmonieusement les textes, les illustrations, les photos, et agence l’ensemble en accord avec la demande du client.\r\nIl a une bonne connaissance technique des outils graphiques sur ordinateur.\r\nIl sait créer un style, un « look » adapté au produit à réaliser.');

-- --------------------------------------------------------

--
-- Structure de la table `thesection_has_thestudent`
--

DROP TABLE IF EXISTS `thesection_has_thestudent`;
CREATE TABLE IF NOT EXISTS `thesection_has_thestudent` (
  `thesection_idthesection` int(10) UNSIGNED NOT NULL,
  `thestudent_idthestudent` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`thesection_idthesection`,`thestudent_idthestudent`),
  KEY `fk_thesection_has_thestudent_thestudent1_idx` (`thestudent_idthestudent`),
  KEY `fk_thesection_has_thestudent_thesection_idx` (`thesection_idthesection`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thesection_has_thestudent`
--

INSERT INTO `thesection_has_thestudent` (`thesection_idthesection`, `thestudent_idthestudent`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `thestudent`
--

DROP TABLE IF EXISTS `thestudent`;
CREATE TABLE IF NOT EXISTS `thestudent` (
  `idthestudent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thename` varchar(80) NOT NULL,
  `thesurname` varchar(80) NOT NULL,
  PRIMARY KEY (`idthestudent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `thestudent`
--

INSERT INTO `thestudent` (`idthestudent`, `thename`, `thesurname`) VALUES
(1, 'Pitz', 'Michaël'),
(2, 'Sandron', 'Pierre');

-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
  `idtheuser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` varchar(80) NOT NULL,
  `thepwd` char(64) NOT NULL COMMENT 'sha-256',
  PRIMARY KEY (`idtheuser`),
  UNIQUE KEY `thelogin_UNIQUE` (`thelogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theuser`
--

INSERT INTO `theuser` (`idtheuser`, `thelogin`, `thepwd`) VALUES
(1, 'lulu', 'd2435e88f3575be3ee762a3183629548165f9ed6a81a6ab13725967e3c72ef36');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thesection_has_thestudent`
--
ALTER TABLE `thesection_has_thestudent`
  ADD CONSTRAINT `fk_thesection_has_thestudent_thesection` FOREIGN KEY (`thesection_idthesection`) REFERENCES `thesection` (`idthesection`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thesection_has_thestudent_thestudent1` FOREIGN KEY (`thestudent_idthestudent`) REFERENCES `thestudent` (`idthestudent`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
