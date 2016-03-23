-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Mars 2016 à 16:55
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`ID_actualites`, `DateCreation`, `Titre`, `Article`) VALUES
(1, '2016-02-12', 'Journée Portes Ouvertes', 'Venez participer aux journées portes ouvertes le 12 Mars, de 9h à 17h sur le site du Puy En Velay.'),
(2, '2016-02-19', 'Inscriptions', 'Inscription du 1er mars au 31 mars 2016 :\r\nhttps://candidature.u-clermont1.fr/WebCiell2');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`ID_Annee`, `DateDebut`, `DateFin`) VALUES
(5, '2015-09-14', '2016-06-30');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`ID_data`, `ID_type`, `Lien`) VALUES
(1, 1, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/oculuscurseur.png'),
(2, 1, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/Pokeball.png'),
(3, 1, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU360.png'),
(4, 2, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU 11_02_2016 09_58_16.mp4'),
(5, 3, 'https://www.youtube.com/embed/nj1w6YaWJI4'),
(6, 1, './Projets/2015-2016/3DTR/Abel_Antoine_RV/Oculus.png'),
(7, 1, './Projets/2015-2016/3DTR/Abel_Antoine_RV/leap.png'),
(8, 1, './Projets/2015-2016/3DTR/Abel_Antoine_RV/360Sardines.png'),
(9, 2, './Projets/2015-2016/3DTR/Abel_Antoine_RV/Test360.mp4'),
(10, 3, 'https://www.youtube.com/embed/PyUGlr63AVo'),
(11, 1, './Projets/2015-2016/3DTR/Got_Bruno_RV/_2016-02-29_16-25-40-325.png'),
(12, 1, './Projets/2015-2016/3DTR/Got_Bruno_RV/_2016-02-29_16-27-00-530.png'),
(13, 1, './Projets/2015-2016/3DTR/Got_Bruno_RV/_2016-02-29_16-29-40-049.png'),
(14, 1, './Projets/2015-2016/3DTR/Got_Bruno_RV/_2016-02-29_16-30-12-371.png'),
(15, 1, './Projets/2015-2016/3DTR/Got_Bruno_RV/_2016-02-29_16-30-39-345.png'),
(16, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureEnregistrement.png'),
(17, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLecture1.png'),
(18, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLecture2.png'),
(19, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureJeu1.png'),
(20, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureJeu2.png'),
(21, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureJeu3.png'),
(22, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLeapMotion.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `datatoprojets`
--

INSERT INTO `datatoprojets` (`ID_datatoprojets`, `ID_data`, `ID_projets`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 6),
(7, 7, 5),
(8, 8, 4),
(9, 9, 4),
(10, 10, 4),
(11, 11, 8),
(12, 12, 8),
(13, 13, 8),
(14, 14, 8),
(15, 15, 8),
(16, 16, 9),
(17, 17, 10),
(18, 18, 10),
(19, 19, 11),
(20, 20, 11),
(21, 21, 11),
(22, 22, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des élèves de la promo. ';

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ID_eleves`, `Nom`, `Prenom`, `UserName`, `Password`, `CV_visibility`, `CV_PDF`, `CV_en_Ligne`) VALUES
(13, 'PETIT', 'Quentin', '', '', 1, '', 'http://quentinpetit.alwaysdata.net/'),
(14, 'NONG', 'William', '', '', 1, '', 'https://fr.linkedin.com/in/william-nong-2b2b84a4'),
(15, 'GOT', 'Bruno', '', '', 1, '', 'http://www.bruno-got.net/'),
(16, 'ABEL', 'Antoine', '', '', 1, '', 'http://antoien.wix.com/antoineabelcv'),
(17, 'COUTURIER', 'Étienne', '', '', 1, '', 'http://www.couturieretienne.fr/'),
(18, 'MARILLY', 'Mathieu', '', '', 0, '', ''),
(19, 'MAATE', 'Soufian', '', '', 1, '', 'http://soufianmaate.wix.com/moncv'),
(20, 'BOUYSSOU', 'Eléa', '', '', 1, '', 'bouyssouelea.fr'),
(21, 'LANET', 'Florian', '', '', 0, '', ''),
(22, 'BRASSECASSE', 'Gabriel', '', '', 0, '', ''),
(23, 'CAMPS', 'Juline', '', '', 0, '', ''),
(24, 'GARRIGUE', 'Fabien', '', '', 0, '', ''),
(25, 'MOGEOT', 'Bastien', '', '', 0, '', ''),
(26, 'HUANG', 'Yao Feng', '', '', 1, '', 'http://841163555.wix.com/minimal-designer-por'),
(27, 'GOUNON', 'Grégory', '', '', 1, '', 'http://gounongregory.wix.com/porfolio'),
(28, 'COUDERT', 'Florian', '', '', 0, '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `elevestoprojet`
--

INSERT INTO `elevestoprojet` (`ID_elevestoprojet`, `ID_eleves`, `ID_projets`) VALUES
(1, 19, 1),
(2, 19, 2),
(3, 19, 3),
(4, 16, 4),
(5, 16, 5),
(6, 16, 6),
(7, 15, 7),
(8, 15, 8),
(9, 17, 9),
(10, 17, 10),
(11, 17, 11),
(12, 17, 12);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `ID_matieres` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_matieres`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`ID_matieres`, `Nom`) VALUES
(1, 'Remise à niveau en C++'),
(2, 'Unity 3D'),
(3, 'Modélisation Temps Réel'),
(4, 'Interface Utilisateur'),
(5, 'Gestion de Projets'),
(6, 'Méthodologie de développement'),
(7, 'Intelligence Artificielle'),
(8, 'Réalité Virtuelle'),
(9, 'Anglais'),
(10, 'Projets Tuteurés'),
(11, 'Algorithmes de Synthèse d''Images Avancés'),
(12, 'Développement de jeu'),
(13, 'Texturing'),
(14, 'Mise à niveau 3DSMax'),
(15, 'Initiation 3DSMax'),
(16, 'Synthèse d''Images'),
(17, 'Initiation Photoshop'),
(18, 'Autocad'),
(19, 'Modé Pré-calculée'),
(20, 'Architecture'),
(21, 'Artistique'),
(22, 'Montage Vidéo Post-Production'),
(23, 'Photoshop'),
(24, 'Photographie'),
(25, 'Préparation d''animations'),
(26, 'Texturing sous ZBrush'),
(27, 'Texturing avec Shaders'),
(28, 'Synthèse d''Images sous Lumion'),
(29, 'Animation Pré-calculée'),
(30, 'Pipeline'),
(31, 'Modélisation Grande Échelle'),
(32, 'Pipeline');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matierestoprojet`
--

INSERT INTO `matierestoprojet` (`ID_matierestoprojet`, `ID_projets`, `ID_matieres`) VALUES
(1, 1, 8),
(2, 2, 8),
(3, 3, 8),
(4, 4, 8),
(5, 5, 8),
(6, 6, 8),
(7, 7, 8),
(8, 8, 8),
(9, 9, 8),
(10, 10, 8),
(11, 11, 8),
(12, 12, 8);

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

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`ID_parcours`, `Nom`, `Description`, `Objectifs`, `Competences`, `Logiciels`, `Admission`, `Plaquette`, `Couleur`) VALUES
(1, 'Infographie pour l''Architecture', 'Thèmes abordés : illustrations, architecture intérieure 3D, architecture extérieure 3D, mise en situation photo-réaliste, animations 3D en architecture – visites virtuelles, initiation à la maquette numérique 3D – BIM (Building Information Model)', 'Former des infographistes 3D pour l''Architecture.\n2 domaines principaux :\n<li>archi intérieure/archi extérieure ; thèmes abordés : illustrations, architecture intérieure 3D, architecture extérieure 3D, mise en situation photo-réaliste, animations 3D en architecture – visites virtuelles,</li><li>\ninitiation à la maquette numérique 3D, initiation au BIM (Building Information Model).</li>', 'Acquisition des notions d''infographie pour l''architecture (plans de masse, élévations, architecture intérieure/extérieure…), de la modélisation au rendu, de la réalisation d''animation et de vidéo architecturale, de la prise en compte de l''éclairage, de maquette numérique - BIM (partie visualisation 3D)', '3DSMax, AutoCAD, ArchiCAD, Photoshop, After Effects, VRay, Lumion<br>\n[Prévision 2016 : BIM (Archicad, Revit), Sketchup]', 'Le parcours <b>Infographie pour l''architecture</b> est accessible aux titulaires d''un BAC+2, principalement :\n<li>BTS AEA Agencement Environnement Architectural/BTS ERA Etude et Réalisation d''Agencements,</li><li>\nBTS Design d''Espace,</li><li>\nDUT Informatique (Imagerie Numérique)/ DUT MMI (avec connaissances de modélisation). </li>\nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '', '#ffca80'),
(2, 'Technical Artist', 'Étude de la chaîne complète : dessin main levée, modélisation, texturing, animation [rigging, skinning] ; initiation à la modélisation et l''animation procédurales.', 'Former des infographistes 3D pour l''Animation.\n2 domaines principaux :\n<li>* modélisation et animation traditionnelles ; étude de la chaîne complète : dessin main levée, modélisation, texturing, animation [rigging,skinning]</li><li>\n* [2016] modélisation et animation procédurales</li>', 'Maîtrise de la chaîne de production (dessin main levée, modélisation, texturing, animation [rigging,skinng]) selon les approches modélisation et animation traditionnelles et procédurales.', '3DSMax, Photoshop, After Effects, Substance Designer', 'Le parcours <b>Technical Artist</b> est accessible aux titulaires d''un BAC+2, ayant des connaissances  d''un modeleur 3D (par ex. : 3dsMAX, Maya ou Blender) et en programmation, principalement :\n<li>DUT Informatique (Imagerie Numérique),</li><li>\nDUT MMI,</li><li>\nDiplôme des Métiers d''Arts (DMA) cinéma d''animation,</li><li>\nBTS Design Graphique option communication et médias numériques [+ connaissances de modélisation et programmation],</li><li>\nBTS Métiers de l''Audiovisuel option métiers de l''image,</li><li>\nautres formations titulaires d''une Mise à niveau en arts appliqués (MANAA) … </li>\n \nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.\n<b>ATTENTION : à partir de 2016,</b> il sera demandé aux candidats de <b>connaître un langage de programmation</b>, afin de faire l''acquisition des modélisation et animation procédurales.', '', '#ff69f7'),
(3, '3D Temps Réel et Réalité Virtuelle', 'Thèmes abordés : développement de projet informatique, concepts avancés liés aux jeux vidéos (Game/Level Design, Intelligence Artificielle, algorithmes de synthèse/traitement d''images, shaders), développement d''applications utilisant différents périphériques de Réalité Virtuelle (LeapMotion, Oculus Rift …).', 'Former des programmeurs pour le jeu vidéo ou pour la Réalité Virtuelle.\n2 domaines principaux :\n<li>3D Temps Réel : développement d''un jeu vidéo (Unity 3D, shaders, intelligence artificielle ...)</li><li>\nRéalité Virtuelle : découverte de différents périphériques (Oculus Rift ...)</li>', 'Développement de projet informatique en groupe (analyse, conception, organisation, planification)\r\net prise de responsabilités associées (chef de projet …), maîtrise d''un moteur haut niveau de création\r\nde jeux vidéo (focus intelligence artificielle, développement de shaders), initiation à la réalité virtuelle.', 'Visual Studio, C++, Git, SourceTree, GanttProject, CMake, Unity (ShaderLab), Unreal Engine 4<br>\n[Prévision 2016 : Unreal Engine 4]', 'Le parcours <b>3D Temps Réel et Réalité Virtuelle</b> est accessible aux titulaires d''un BAC+2, ayant un très bon niveau en langage de programmation orienté objet (C++ ou C#) ainsi que des connaissances en modélisation (3dsMax ou Blender), principalement :\n<li>DUT Informatique (Imagerie Numérique)\n</li><li>DUT MMI,\n</li><li>BTS Services Informatiques aux Organisations (SIO), option SLAM (Solutions Logicielles et Applications Métiers),\n</li><li>BTS Systèmes Numériques, Option Informatique et Réseaux.</li>\nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '', '#80ceff');

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
  PRIMARY KEY (`ID_projets`),
  KEY `ID_Annee` (`ID_Annee`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`ID_projets`, `ID_Annee`, `Nom`, `Date`, `Description`, `Caracteristique`, `Logiciel`, `Materiel`, `Poids`, `Miniature`, `Fichier_Projet`, `Lien`) VALUES
(1, 5, 'Oculus Curseur', '2016-03-23', 'Ceci est un mini-jeu de destruction de cibles où l''utilisateur utilise son regard via un Oculus Rift pour détruire une cible.', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle', '<li>Unity</li>\r\n<li>Oculus SDK</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 20, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/oculuscurseur.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/OculusCurseur.zip', ''),
(2, 5, 'Pokémon Simulator', '2016-03-23', 'Revivez la saga Pokémon grâce à un mini-jeu dans lequel vous pourrez capturer vos propres Pokémon et les utiliser. Reproduisez les mouvements d''un dresseur Pokémon pour lancer vos pokéballs.', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>', '<li>Leap Motion/li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 30, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/Pokeball.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/Pokemon Simulator.zip', ''),
(3, 5, 'Jeu 360', '2016-03-23', 'Ceci est un jeu de quête dans lequel l''utilisateur doit retrouver 3 objets afin de terminer le niveau. Durant sa partie, le joueur peut effectuer un enregistrement d''une vidéo à 360°.', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 40, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU360.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU360.zip', ''),
(4, 5, '360 Blaze This', '2016-03-23', 'Ce projet avait pour but de réaliser une vidéo 360°. La scène représentée est une vue à 360° d''un banc de sardines.', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>\r\n', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 35, './Projets/2015-2016/3DTR/Abel_Antoine_RV/360Sardines.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/360BlazeThis.zip', ''),
(5, 5, 'Leap Motion Test', '2016-03-23', 'Non renseigné', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n', '<li>Leap Motion/li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 10, './Projets/2015-2016/3DTR/Abel_Antoine_RV/leap.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/leapMotionTest.zip', ''),
(6, 5, 'Target TP', '2016-03-23', 'Non renseigné', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle\r\n', '<li>Unity</li>\r\n<li>Oculus SDK</li>\r\n\r\n', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 15, './Projets/2015-2016/3DTR/Abel_Antoine_RV/Oculus.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/TargetTP.zip', ''),
(7, 5, 'Leap Motion Shaders', '2016-03-23', 'Application de VJing fonctionnant grâce au Leap Motion et au logiciel ', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n<li>Résolum</li>', '<li>Leap Motion/li>\r\n<li>Contrôleur Midi Korg</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 50, './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.jpg', './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.zip', ''),
(8, 5, 'VR360', '2016-03-23', 'Non Renseigné', 'Non Renseigné', '<li>Unity</li>\r\n<li>Oculus SDK</li>\r\n<li>360 Panorama Capture</li>', '<li>Oculus Rift/li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 39, './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.jpg', './Projets/2015-2016/3DTR/Got_Bruno_RV/VR360.zip', ''),
(9, 5, '360Enregistrement', '2016-03-23', 'Enregistrement d''une vidéo 360°', 'Enregistrement d''une vidéo 360°, Réalité virtuel', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>\r\n\r\n', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n\r\n', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureEnregistrement.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/360Enregistrement.zip', ''),
(10, 5, '360LectureVideo', '2016-03-23', 'Lecteur de vidéo 360*', 'Non renseigner', '<li>Unity</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLecture2.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/360LectureVideo.zip', ''),
(11, 5, 'Jeu360', '2016-03-23', 'Non renseigner', 'Non renseigner', '<li>Unity</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureJeu1.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/Jeu360.zip', ''),
(12, 5, 'JeuLeapMotion', '2016-03-23', 'Non renseigner', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n\r\n', '<li>Leap Motion/li>\n<li>GeForce GTX 670</li>\n<li>Intel Xeon CPU E5-1620</li>\n<li>8 Go de RAM</li>\n\n', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLeapMotion.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/JeuLeapMotion.zip', ''),
(13, 5, 'Projet Leap Motion', '2016-03-23', 'Non renseigner', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n', '<li>Leap Motion/li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 20, './Images/placeholder.png', './Projets/2015-2016/3DTR/Mathieu_Marilly_RV/Projet Leap Motion.zip', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projetstoparcours`
--

INSERT INTO `projetstoparcours` (`ID_projetstoparcours`, `ID_projets`, `ID_parcours`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(9, 9, 3),
(10, 10, 3),
(11, 11, 3),
(12, 12, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promotions`
--

INSERT INTO `promotions` (`ID_Promo`, `Lien`, `ID_Annee`) VALUES
(1, './Images/Promotion/promotion2015-2016.jpg', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reseausociaux`
--

INSERT INTO `reseausociaux` (`ID_reseausociaux`, `Lien`, `NomReseau`, `ID_parcours`) VALUES
(1, 'https://twitter.com/LicenceMIND3DTR', 'twitter', 3),
(2, 'https://twitter.com/LicenceMINDArch', 'twitter', 1),
(3, 'https://twitter.com/LicenceMINDTA', 'twitter', 2),
(4, 'https://plus.google.com/108769605229460730961/posts', 'google-plus', 2),
(5, 'https://plus.google.com/116795798420491985205/posts', 'google-plus', 1),
(6, 'https://plus.google.com/114066764502272808569/posts', 'google-plus', 3);

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
-- Contenu de la table `type`
--

INSERT INTO `type` (`ID_type`, `Type`) VALUES
(1, 'Image'),
(2, 'Vidéo MP4'),
(3, 'Vidéo Youtube'),
(4, 'Modélisation');

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
