-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 21 Mars 2016 à 13:15
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_data`
--
CREATE DATABASE IF NOT EXISTS `site_data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `site_data`;

-- --------------------------------------------------------

--
-- Structure de la table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `ID_actualites` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateCreation` date NOT NULL,
  `Titre` varchar(80) NOT NULL,
  `Article` varchar(140) NOT NULL,
  PRIMARY KEY (`ID_actualites`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_administrateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des administrateurs ';

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaire`
--

DROP TABLE IF EXISTS `anneescolaire`;
CREATE TABLE IF NOT EXISTS `anneescolaire` (
  `ID_Annee` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL,
  PRIMARY KEY (`ID_Annee`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `ID_data` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_type` int(11) UNSIGNED NOT NULL,
  `Lien` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_data`),
  KEY `ID_type` (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `datatoprojets`
--

DROP TABLE IF EXISTS `datatoprojets`;
CREATE TABLE IF NOT EXISTS `datatoprojets` (
  `ID_datatoprojets` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_data` int(11) UNSIGNED NOT NULL,
  `ID_projets` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_datatoprojets`),
  KEY `ID_data` (`ID_data`),
  KEY `ID_projets` (`ID_projets`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `ID_eleves` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `CV_visibility` tinyint(1) NOT NULL,
  `CV_PDF` tinytext NOT NULL,
  `CV_en_Ligne` tinytext NOT NULL,
  PRIMARY KEY (`ID_eleves`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des élèves de la promo. ';

-- --------------------------------------------------------

--
-- Structure de la table `elevestoprojet`
--

DROP TABLE IF EXISTS `elevestoprojet`;
CREATE TABLE IF NOT EXISTS `elevestoprojet` (
  `ID_elevestoprojet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_eleves` int(11) UNSIGNED NOT NULL,
  `ID_projets` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_elevestoprojet`),
  KEY `ID_eleves` (`ID_eleves`),
  KEY `ID_projets` (`ID_projets`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `ID_entreprises` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(40) NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `Logo` varchar(80) NOT NULL,
  PRIMARY KEY (`ID_entreprises`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `ID_matieres` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_matieres`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matierestoprojet`
--

DROP TABLE IF EXISTS `matierestoprojet`;
CREATE TABLE IF NOT EXISTS `matierestoprojet` (
  `ID_matierestoprojet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_projets` int(11) UNSIGNED NOT NULL,
  `ID_matieres` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_matierestoprojet`),
  KEY `ID_projets` (`ID_projets`),
  KEY `ID_matieres` (`ID_matieres`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE IF NOT EXISTS `parcours` (
  `ID_parcours` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(40) NOT NULL,
  `Description` text NOT NULL,
  `Objectifs` text NOT NULL,
  `Competences` text NOT NULL,
  `Logiciels` text NOT NULL,
  `Admission` text NOT NULL,
  `Plaquette` varchar(100) NOT NULL,
  `Couleur` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_parcours`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `ID_projets` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_Annee` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Description` text NOT NULL,
  `Caracteristique` text NOT NULL,
  `Logiciel` text NOT NULL,
  `Materiel` text NOT NULL,
  `Poids` int(3) NOT NULL,
  `Miniature` varchar(200) NOT NULL,
  `Fichier_Projet` varchar(200) NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `Video` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Mode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_projets`),
  KEY `ID_Annee` (`ID_Annee`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projetstoparcours`
--

DROP TABLE IF EXISTS `projetstoparcours`;
CREATE TABLE IF NOT EXISTS `projetstoparcours` (
  `ID_projetstoparcours` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ID_projets` int(10) UNSIGNED NOT NULL,
  `ID_parcours` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_projetstoparcours`),
  KEY `ID_projets` (`ID_projets`),
  KEY `ID_parcours` (`ID_parcours`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `ID_Promo` int(11) NOT NULL AUTO_INCREMENT,
  `Lien` varchar(200) NOT NULL,
  `ID_Annee` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_Promo`),
  KEY `ID_Annee` (`ID_Annee`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reseausociaux`
--

DROP TABLE IF EXISTS `reseausociaux`;
CREATE TABLE IF NOT EXISTS `reseausociaux` (
  `ID_reseausociaux` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Lien` varchar(200) NOT NULL,
  `NomReseau` varchar(40) NOT NULL,
  `ID_parcours` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`ID_reseausociaux`),
  KEY `ID_parcours` (`ID_parcours`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `ID_type` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Type` tinytext NOT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`ID_type`) REFERENCES `type` (`ID_type`);

--
-- Contraintes pour la table `datatoprojets`
--
ALTER TABLE `datatoprojets`
  ADD CONSTRAINT `datatoprojets_ibfk_1` FOREIGN KEY (`ID_data`) REFERENCES `data` (`ID_data`),
  ADD CONSTRAINT `datatoprojets_ibfk_2` FOREIGN KEY (`ID_projets`) REFERENCES `projets` (`ID_projets`);

--
-- Contraintes pour la table `elevestoprojet`
--
ALTER TABLE `elevestoprojet`
  ADD CONSTRAINT `elevestoprojet_ibfk_1` FOREIGN KEY (`ID_eleves`) REFERENCES `eleves` (`ID_eleves`),
  ADD CONSTRAINT `elevestoprojet_ibfk_2` FOREIGN KEY (`ID_projets`) REFERENCES `projets` (`ID_projets`);

--
-- Contraintes pour la table `matierestoprojet`
--
ALTER TABLE `matierestoprojet`
  ADD CONSTRAINT `matierestoprojet_ibfk_1` FOREIGN KEY (`ID_projets`) REFERENCES `projets` (`ID_projets`),
  ADD CONSTRAINT `matierestoprojet_ibfk_2` FOREIGN KEY (`ID_matieres`) REFERENCES `matieres` (`ID_matieres`);

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_ibfk_2` FOREIGN KEY (`ID_Annee`) REFERENCES `anneescolaire` (`ID_Annee`);

--
-- Contraintes pour la table `projetstoparcours`
--
ALTER TABLE `projetstoparcours`
  ADD CONSTRAINT `projetstoparcours_ibfk_1` FOREIGN KEY (`ID_projets`) REFERENCES `projets` (`ID_projets`),
  ADD CONSTRAINT `projetstoparcours_ibfk_2` FOREIGN KEY (`ID_parcours`) REFERENCES `parcours` (`ID_parcours`);

--
-- Contraintes pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`ID_Annee`) REFERENCES `anneescolaire` (`ID_Annee`);

--
-- Contraintes pour la table `reseausociaux`
--
ALTER TABLE `reseausociaux`
  ADD CONSTRAINT `reseausociaux_ibfk_1` FOREIGN KEY (`ID_parcours`) REFERENCES `parcours` (`ID_parcours`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
