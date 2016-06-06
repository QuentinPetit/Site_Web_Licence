-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juin 2016 à 15:55
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

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

CREATE TABLE `actualites` (
  `ID_actualites` int(11) UNSIGNED NOT NULL,
  `DateCreation` date NOT NULL,
  `Titre` varchar(80) NOT NULL,
  `Article` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `administrateur` (
  `ID_administrateur` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des administrateurs ';

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_administrateur`, `Nom`, `Prenom`, `UserName`, `Password`) VALUES
(1, 'Monsieur', 'Patate', 'potato', 'puree');

-- --------------------------------------------------------

--
-- Structure de la table `anneescolaire`
--

CREATE TABLE `anneescolaire` (
  `ID_Annee` int(11) UNSIGNED NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`ID_Annee`, `DateDebut`, `DateFin`) VALUES
(5, '2015-09-14', '2016-06-30');

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `ID_data` int(11) UNSIGNED NOT NULL,
  `ID_type` int(11) UNSIGNED NOT NULL,
  `Lien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 1, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLeapMotion.png'),
(23, 1, './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/disque.png'),
(24, 1, './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/imgvideo360.png'),
(25, 2, './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/tes2t.mp4'),
(26, 2, './Projets/2015-2016/3DTR/NongWilliam_RV/PalmsInTheWind.mp4'),
(27, 3, 'https://www.youtube.com/embed/KobjtEguk9g'),
(28, 1, './Projets/2015-2016/3DTR/NongWilliam_RV/ScreenshotLM.png'),
(29, 1, './Projets/2015-2016/3DTR/NongWilliam_RV/ScreenshotOS.png'),
(30, 3, 'https://www.youtube.com/embed/hiQ4ek3O534'),
(31, 2, './Projets/2015-2016/3DTR/QuentinPETIT_RV/export_360_youtube.mp4'),
(32, 1, './Projets/2015-2016/3DTR/QuentinPETIT_RV/GameView.png'),
(33, 3, 'https://www.youtube.com/embed/im3E86WHUKM'),
(34, 1, './Projets/2015-2016/3DTR/UniversalTournament/MiniatureVer0.png'),
(35, 1, './Projets/2015-2016/3DTR/UniversalTournament/ChasseurLourdHumain.png'),
(36, 1, './Projets/2015-2016/3DTR/UniversalTournament/EncadrementEcran.png'),
(37, 1, './Projets/2015-2016/3DTR/UniversalTournament/Portaill.png'),
(38, 1, './Projets/2015-2016/3DTR/UniversalTournament/Station.png'),
(39, 1, './Projets/2015-2016/3DTR/UniversalTournament/StationPublicitaire.png'),
(40, 1, './Projets/2015-2016/3DTR/UniversalTournament/Tourelle.png'),
(41, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauLegerAlien.png'),
(42, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseaulegerrMecansSansTex.png'),
(43, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauLourdMecan.png'),
(44, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauMecanLeger.png'),
(45, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauMereAlien.png'),
(46, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauMereHumain.png'),
(47, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauMereMecans.png'),
(48, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauReparateurAlien.png'),
(49, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauReparateurHumain.png'),
(50, 1, './Projets/2015-2016/3DTR/UniversalTournament/VaisseauReparateurMecan.png'),
(51, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Baril/Rendu1.jpg'),
(52, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Baril/Rendu2.jpg'),
(53, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Baril/Rendu3.jpg'),
(54, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Boite/Boite.jpg'),
(55, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Citerne/Citerne_Rendu_1.png'),
(56, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Citerne/Citerne_Rendu_2.png'),
(57, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Citerne/Citerne_Rendu_3.png'),
(58, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Space/Space.jpg'),
(59, 1, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Voiture/Voiture.png'),
(60, 2, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Feu_dartifice.mp4\r\n'),
(61, 1, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine.jpg'),
(62, 1, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine 2.jpg'),
(63, 1, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine 3.jpg'),
(64, 1, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine 4.jpg'),
(65, 1, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine 5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `datatoprojets`
--

CREATE TABLE `datatoprojets` (
  `ID_datatoprojets` int(11) UNSIGNED NOT NULL,
  `ID_data` int(11) UNSIGNED NOT NULL,
  `ID_projets` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 22, 12),
(23, 23, 14),
(24, 24, 15),
(25, 25, 15),
(26, 26, 16),
(27, 27, 16),
(28, 28, 17),
(29, 29, 18),
(30, 30, 19),
(31, 31, 19),
(32, 32, 20),
(33, 33, 21),
(34, 34, 21),
(35, 35, 21),
(36, 36, 21),
(37, 37, 21),
(38, 38, 21),
(39, 39, 21),
(40, 40, 21),
(41, 41, 21),
(42, 42, 21),
(43, 43, 21),
(44, 44, 21),
(45, 45, 21),
(46, 46, 21),
(47, 47, 21),
(48, 48, 21),
(49, 49, 21),
(50, 50, 21),
(51, 51, 22),
(52, 52, 22),
(53, 53, 22),
(54, 54, 23),
(55, 55, 24),
(56, 56, 24),
(57, 57, 24),
(58, 58, 25),
(59, 59, 26),
(60, 60, 27),
(61, 61, 29),
(62, 62, 29),
(63, 63, 29),
(64, 64, 29),
(65, 65, 29);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `ID_eleves` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `CV_visibility` tinyint(1) NOT NULL DEFAULT '0',
  `CV_PDF` tinytext,
  `CV_en_Ligne` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des élèves de la promo. ';

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ID_eleves`, `Nom`, `Prenom`, `UserName`, `Password`, `CV_visibility`, `CV_PDF`, `CV_en_Ligne`) VALUES
(13, 'PETIT', 'Quentin', '', '', 1, '', 'http://quentinpetit.alwaysdata.net/'),
(14, 'NONG', 'William', 'user', '1234', 1, '', 'https://fr.linkedin.com/in/william-nong-2b2b84a4'),
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
(28, 'COUDERT', 'Florian', '', '', 0, '', ''),
(29, 'PHILIPPE', 'Benjamin', '', '', 0, '', ''),
(30, 'BEAUNE', 'Elodie', '', '', 1, '', 'http://elodie-beaune.wix.com/beaune-elodie'),
(31, 'ARGAUD', 'Nicolas', '', '', 1, '', 'http://nicolasargaud.wix.com/portfolio'),
(32, 'WERNERT', 'Romain', '', '', 1, '', 'http://romainwernert.wix.com/romain-wernert'),
(33, 'MERIGOT', 'Léa', '', '', 1, '', 'leamerigot.wix.com/portfolio'),
(34, 'DUBOURGNON', 'Alexis', '', '', 0, '', ''),
(35, 'MORICO', 'Jessica', '', '', 0, '', ''),
(36, 'CHARRIER', 'Camille', '', '', 0, '', ''),
(37, 'BERNAUD', 'Jordy', '', '', 0, '', ''),
(38, 'PRIVAT', 'Gauthier', '', '', 0, '', ''),
(39, 'DAUSSY', 'Johann', '', '', 0, '', ''),
(40, 'BITTANTE', 'Roseline', '', '', 0, '', ''),
(41, 'NOUEL', 'Paul', '', '', 0, '', ''),
(43, 'CORAL', 'Céline', '', '', 0, '', ''),
(47, 'Aigre', 'Doux', 'Sauce', 'chinois', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `elevestoprojet`
--

CREATE TABLE `elevestoprojet` (
  `ID_elevestoprojet` int(11) UNSIGNED NOT NULL,
  `ID_eleves` int(11) UNSIGNED NOT NULL,
  `ID_projets` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 17, 12),
(13, 18, 13),
(14, 18, 14),
(15, 18, 15),
(16, 14, 16),
(17, 14, 17),
(18, 14, 18),
(19, 13, 19),
(20, 13, 20),
(21, 13, 21),
(22, 14, 21),
(23, 15, 21),
(24, 16, 21),
(25, 17, 21),
(26, 18, 21),
(27, 19, 21),
(28, 29, 21),
(29, 20, 22),
(30, 20, 23),
(31, 20, 24),
(32, 20, 25),
(33, 20, 26),
(34, 20, 27),
(35, 36, 29);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `ID_entreprises` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `Logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `ID_matieres` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'Algorithmes de Synthèse d\'Images Avancés'),
(12, 'Développement de jeu'),
(13, 'Texturing'),
(14, 'Mise à niveau 3DSMax'),
(15, 'Initiation 3DSMax'),
(16, 'Synthèse d\'Images'),
(17, 'Initiation Photoshop'),
(18, 'Autocad'),
(19, 'Modé Pré-calculée'),
(20, 'Architecture'),
(21, 'Artistique'),
(22, 'Montage Vidéo Post-Production'),
(23, 'Photoshop'),
(24, 'Photographie'),
(25, 'Préparation d\'animations'),
(26, 'Texturing sous ZBrush'),
(27, 'Texturing avec Shaders'),
(28, 'Synthèse d\'Images sous Lumion'),
(29, 'Animation Pré-calculée'),
(30, 'Pipeline'),
(31, 'Modélisation Grande Échelle');

-- --------------------------------------------------------

--
-- Structure de la table `matierestoprojet`
--

CREATE TABLE `matierestoprojet` (
  `ID_matierestoprojet` int(11) UNSIGNED NOT NULL,
  `ID_projets` int(11) UNSIGNED NOT NULL,
  `ID_matieres` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 12, 8),
(13, 13, 8),
(14, 14, 8),
(15, 15, 8),
(16, 16, 8),
(17, 17, 8),
(18, 18, 8),
(19, 19, 8),
(20, 20, 8),
(21, 21, 2),
(22, 22, 26),
(23, 23, 13),
(24, 24, 13),
(25, 25, 13),
(26, 26, 19),
(27, 27, 14),
(28, 29, 24);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `ID_parcours` int(11) UNSIGNED NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Dossier` varchar(10) NOT NULL,
  `Description` text NOT NULL,
  `Objectifs` text NOT NULL,
  `Competences` text NOT NULL,
  `Logiciels` text NOT NULL,
  `Admission` text NOT NULL,
  `Plaquette` varchar(100) NOT NULL,
  `Mascotte` varchar(200) NOT NULL,
  `Fond` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`ID_parcours`, `Nom`, `Dossier`, `Description`, `Objectifs`, `Competences`, `Logiciels`, `Admission`, `Plaquette`, `Mascotte`, `Fond`) VALUES
(1, 'Infographie pour l\'Architecture', 'Archi', 'Thèmes abordés : illustrations, architecture intérieure 3D, architecture extérieure 3D, mise en situation photo-réaliste, animations 3D en architecture – visites virtuelles, initiation à la maquette numérique 3D – BIM (Building Information Model)', 'Former des infographistes 3D pour l\'Architecture.\n2 domaines principaux :\n<li>archi intérieure/archi extérieure ; thèmes abordés : illustrations, architecture intérieure 3D, architecture extérieure 3D, mise en situation photo-réaliste, animations 3D en architecture – visites virtuelles,</li><li>\ninitiation à la maquette numérique 3D, initiation au BIM (Building Information Model).</li>', 'Acquisition des notions d\'infographie pour l\'architecture (plans de masse, élévations, architecture intérieure/extérieure…), de la modélisation au rendu, de la réalisation d\'animation et de vidéo architecturale, de la prise en compte de l\'éclairage, de maquette numérique - BIM (partie visualisation 3D)', '3DSMax, AutoCAD, ArchiCAD, Photoshop, After Effects, VRay, Lumion<br>\n[Prévision 2016 : BIM (Archicad, Revit), Sketchup]', 'Le parcours <b>Infographie pour l\'architecture</b> est accessible aux titulaires d\'un BAC+2, principalement :\n<li>BTS AEA Agencement Environnement Architectural/BTS ERA Etude et Réalisation d\'Agencements,</li><li>\nBTS Design d\'Espace,</li><li>\nDUT Informatique (Imagerie Numérique)/ DUT MMI (avec connaissances de modélisation). </li>\nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '', 'Images/Mascottes/Lapin.png', '../Images/backgroundParcours/vue_interieure_2b.jpg'),
(2, 'Technical Artist', 'TechArt', 'Étude de la chaîne complète : dessin main levée, modélisation, texturing, animation [rigging, skinning] ; initiation à la modélisation et l\'animation procédurales.', 'Former des infographistes 3D pour l\'Animation.\n2 domaines principaux :\n<li>* modélisation et animation traditionnelles ; étude de la chaîne complète : dessin main levée, modélisation, texturing, animation [rigging,skinning]</li><li>\n* [2016] modélisation et animation procédurales</li>', 'Maîtrise de la chaîne de production (dessin main levée, modélisation, texturing, animation [rigging,skinng]) selon les approches modélisation et animation traditionnelles et procédurales.', '3DSMax, Photoshop, After Effects, Substance Designer', 'Le parcours <b>Technical Artist</b> est accessible aux titulaires d\'un BAC+2, ayant des connaissances  d\'un modeleur 3D (par ex. : 3dsMAX, Maya ou Blender) et en programmation, principalement :\n<li>DUT Informatique (Imagerie Numérique),</li><li>\nDUT MMI,</li><li>\nDiplôme des Métiers d\'Arts (DMA) cinéma d\'animation,</li><li>\nBTS Design Graphique option communication et médias numériques [+ connaissances de modélisation et programmation],</li><li>\nBTS Métiers de l\'Audiovisuel option métiers de l\'image,</li><li>\nautres formations titulaires d\'une Mise à niveau en arts appliqués (MANAA) … </li>\n \nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.\n<b>ATTENTION : à partir de 2016,</b> il sera demandé aux candidats de <b>connaître un langage de programmation</b>, afin de faire l\'acquisition des modélisation et animation procédurales.', '', 'Images/Mascottes/Dragon.png', '../Images/backgroundParcours/Perso2.png'),
(3, '3D Temps Réel et Réalité Virtuelle', '3DTR', 'Thèmes abordés : développement de projet informatique, concepts avancés liés aux jeux vidéos (Game/Level Design, Intelligence Artificielle, algorithmes de synthèse/traitement d\'images, shaders), développement d\'applications utilisant différents périphériques de Réalité Virtuelle (LeapMotion, Oculus Rift …).', 'Former des programmeurs pour le jeu vidéo ou pour la Réalité Virtuelle.\n2 domaines principaux :\n<li>3D Temps Réel : développement d\'un jeu vidéo (Unity 3D, shaders, intelligence artificielle ...)</li><li>\nRéalité Virtuelle : découverte de différents périphériques (Oculus Rift ...)</li>', 'Développement de projet informatique en groupe (analyse, conception, organisation, planification)\r\net prise de responsabilités associées (chef de projet …), maîtrise d\'un moteur haut niveau de création\r\nde jeux vidéo (focus intelligence artificielle, développement de shaders), initiation à la réalité virtuelle.', 'Visual Studio, C++, Git, SourceTree, GanttProject, CMake, Unity (ShaderLab), Unreal Engine 4<br>\n[Prévision 2016 : Unreal Engine 4]', 'Le parcours <b>3D Temps Réel et Réalité Virtuelle</b> est accessible aux titulaires d\'un BAC+2, ayant un très bon niveau en langage de programmation orienté objet (C++ ou C#) ainsi que des connaissances en modélisation (3dsMax ou Blender), principalement :\n<li>DUT Informatique (Imagerie Numérique)\n</li><li>DUT MMI,\n</li><li>BTS Services Informatiques aux Organisations (SIO), option SLAM (Solutions Logicielles et Applications Métiers),\n</li><li>BTS Systèmes Numériques, Option Informatique et Réseaux.</li>\nLe recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '', 'Images/Mascottes/Lynx.png', '../Images/backgroundParcours/CaptureMenu.png');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `ID_projets` int(11) UNSIGNED NOT NULL,
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
  `Lien` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`ID_projets`, `ID_Annee`, `Nom`, `Date`, `Description`, `Caracteristique`, `Logiciel`, `Materiel`, `Poids`, `Miniature`, `Fichier_Projet`, `Lien`) VALUES
(1, 5, 'Oculus Curseur', '2016-03-23', 'Ceci est un mini-jeu de destruction de cibles où l\'utilisateur utilise son regard via un Oculus Rift pour détruire une cible.', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle', '<li>Unity</li>\r\n<li>Oculus SDK</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 20, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/oculuscurseur.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/OculusCurseur.zip', ''),
(2, 5, 'Pokémon Simulator', '2016-03-23', 'Revivez la saga Pokémon grâce à un mini-jeu dans lequel vous pourrez capturer vos propres Pokémon et les utiliser. Reproduisez les mouvements d\'un dresseur Pokémon pour lancer vos pokéballs.', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>', '<li>Leap Motion</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 30, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/Pokeball.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/Pokemon Simulator.zip', ''),
(3, 5, 'Jeu 360', '2016-03-23', 'Ceci est un jeu de quête dans lequel l\'utilisateur doit retrouver 3 objets afin de terminer le niveau. Durant sa partie, le joueur peut effectuer un enregistrement d\'une vidéo à 360°.', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 40, './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU360.png', './Projets/2015-2016/3DTR/MAATE_Soufian_RV/ProjetJEU360.zip', ''),
(4, 5, '360 Blaze This', '2016-03-23', 'Ce projet avait pour but de réaliser une vidéo 360°. La scène représentée est une vue à 360° d\'un banc de sardines.', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>\r\n', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 35, './Projets/2015-2016/3DTR/Abel_Antoine_RV/360Sardines.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/360BlazeThis.zip', ''),
(5, 5, 'Leap Motion Test', '2016-03-23', 'Non renseigné', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n', '<li>Leap Motion</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 10, './Projets/2015-2016/3DTR/Abel_Antoine_RV/leap.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/leapMotionTest.zip', ''),
(6, 5, 'Target TP', '2016-03-23', 'Non renseigné', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle\r\n', '<li>Unity</li>\r\n<li>Oculus SDK</li>\r\n\r\n', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 15, './Projets/2015-2016/3DTR/Abel_Antoine_RV/Oculus.png', './Projets/2015-2016/3DTR/Abel_Antoine_RV/TargetTP.zip', ''),
(7, 5, 'Leap Motion Shaders', '2016-03-23', 'Application de VJing fonctionnant grâce au Leap Motion et au logiciel ', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n<li>Résolum</li>', '<li>Leap Motion</li>\r\n<li>Contrôleur Midi Korg</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 50, './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.jpg', './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.zip', ''),
(8, 5, 'VR360', '2016-03-23', 'Non Renseigné', 'Non Renseigné', '<li>Unity</li>\r\n<li>Oculus SDK</li>\r\n<li>360 Panorama Capture</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 39, './Projets/2015-2016/3DTR/Got_Bruno_RV/LeapMotionShaders.jpg', './Projets/2015-2016/3DTR/Got_Bruno_RV/VR360.zip', ''),
(9, 5, '360Enregistrement', '2016-03-23', 'Enregistrement d\'une vidéo 360°', 'Enregistrement d\'une vidéo 360°, Réalité virtuel', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>\r\n\r\n', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n\r\n', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureEnregistrement.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/360Enregistrement.zip', ''),
(10, 5, '360LectureVideo', '2016-03-23', 'Lecteur de vidéo 360*', 'Non renseigner', '<li>Unity</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLecture2.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/360LectureVideo.zip', ''),
(11, 5, 'Jeu360', '2016-03-23', 'Non renseigner', 'Non renseigner', '<li>Unity</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureJeu1.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/Jeu360.zip', ''),
(12, 5, 'JeuLeapMotion', '2016-03-23', 'Non renseigner', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n\r\n', '<li>Leap Motion</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n\r\n', 15, './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/MiniatureLeapMotion.png', './Projets/2015-2016/3DTR/COUTURIER_ETienne_RV/JeuLeapMotion.zip', ''),
(13, 5, 'Projet Leap Motion', '2016-03-23', 'Non renseigner', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>\r\n', '<li>Leap Motion</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 20, './Images/placeholder.png', './Projets/2015-2016/3DTR/Mathieu_Marilly_RV/Projet Leap Motion.zip', ''),
(14, 5, 'Projet Oculus Disque', '2016-03-24', 'Non renseigné', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle', '<li>Unity</li>\r\n<li>Oculus SDK</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 15, './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/disque.png', './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/Projet Oculus disque.zip', ''),
(15, 5, 'Projet Vidéo 360', '2016-03-24', 'Non Renseigner', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 20, './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/imgvideo360.png', './Projets/2015-2016/3DTR/Matthieu_Marilly_RV/Projet Video 360.zip', ''),
(16, 5, '360Video', '2016-03-24', 'Ce projet consiste en deux scènes Unity, l\'une étant une visionneuse de vidéos 360° et l\'autre étant un terrain avec un lac et des palmiers. Dans cette dernière, il est possible d\'enregistrer des vidéàs 360°.', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 20, './Images/placeholder.png', './Projets/2015-2016/3DTR/NongWilliam_RV/360Video.zip', ''),
(17, 5, 'LeapMotion', '2016-03-24', 'Ce projet est un jeu de pong en 3D dans lequel la raquette du joueur suit les mouvements de la main captée par une Leap Motion.', 'Réalité Virtuelle, Gestion des mouvement avec un Leap Motion', '<li>Unity</li>\r\n<li>Leap Motion SDK</li>', '<li>Leap Motion</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 20, './Projets/2015-2016/3DTR/NongWilliam_RV/ScreenshotLM.png', './Projets/2015-2016/3DTR/NongWilliam_RV/LeapMotion.zip', ''),
(18, 5, 'OculusShooter', '2016-03-24', 'Ce projet consiste d\'une scène dans laquelle l\'utilisateur doit détruire des cibles, pour ce faire, il devra les regarder au travers d\'un Oculus Rift.', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle', '<li>Unity</li>\r\n<li>Oculus SDK</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>\r\n', 20, './Projets/2015-2016/3DTR/NongWilliam_RV/ScreenshotOS.png', './Projets/2015-2016/3DTR/NongWilliam_RV/OculusShooter.zip', ''),
(19, 5, '360Video', '2016-03-24', 'Ce projet est composé de deux scène Unity : le "viewer" et "l\'exporter". <li>Le "viewer" est un utilitaire permettant de visionner une vidéo réalisée à 360°. Cet utilitaire permet de jouer ou de mettre en pause la vidéo avec le clique gauche de la souris, le clique droit, quant à lui, permet de recommencer la vidéo.</li>\r\n<li>"L\'exporter" est un utilitaire permettant de céer une vidéo à 360° ou simplement un panorama à 360°. </li>', 'Réalité virtuelle, Enregistrement de vidéos 360°', '<li>Unity</li>\r\n<li>360 Panorama Capture</li>', '<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 25, './Images/placeholder.png', './Projets/2015-2016/3DTR/QuentinPETIT_RV/360Video.zip', ''),
(20, 5, 'Oculus', '2016-03-24', 'Ce projet est composé d\'une scène dans laquelle l\'utilisateur doit détruire des cibles, pour ce faire, il devra les regarder au travers d\'un Oculus Rift.', 'Lancé de rayons, Sauvegarde dans le registre,Réalité Virtuelle', '<li>Unity</li>\r\n<li>Oculus SDK</li>', '<li>Oculus Rift</li>\r\n<li>GeForce GTX 670</li>\r\n<li>Intel Xeon CPU E5-1620</li>\r\n<li>8 Go de RAM</li>', 25, './Projets/2015-2016/3DTR/QuentinPETIT_RV/GameView.png', './Projets/2015-2016/3DTR/QuentinPETIT_RV/Oculus.zip', ''),
(21, 5, 'Universal Tournament', '2016-03-24', 'Notre jeu reprend un contexte proche du jeu League of Legend, suite aux Guerres Exarques qui ont ravagés la galaxie, les principales factions encore présente ont décidé de mettre en place un moyen d’éviter les guerres à l’avenir en mettant en place l’Universal Tournament, où chaque belligérant pourra engager des pilotes confirmés pour défendre sa cause. Avec les avancés technologiques qui ont pu être effectué grâce aux conflits, les pilotes peuvent piloter leurs vaisseaux à distance, réduisant ainsi drastiquement les risques corporelles et permettant à l’Universal Tournament d’être reconnu comme sport le plus populaire de la galaxie.', 'Développement en équipe, Intéligence Atrificielle, Shader, Lancer de rayon, Modélisations Low Poly, Réseau, C#, Texturing, UV Mapping, Gestion de projet, Diagramme de Gantt', '<li>Unity</li>\r\n<li>Visual Studio 2015</li>\r\n<li>Blender</li>\r\n<li>3DS Max</li>\r\n<li>Cinema 4D</li>\r\n<li>Photoshop</li>', '<li>Intel Core i7-48000MQ ou équivalent</li>\r\n<li>8Go de RAM</li>\r\n<li>AMD Radeon HD 8790M</li>\r\n<li>Nvidia GTX 760M</li>', 90, './Projets/2015-2016/3DTR/UniversalTournament/Miniature.png', './Projets/UniversalTournament/UniversalTournament.zip', 'http://iutweb-lepuy.u-clermont1.fr/3dtr2016/'),
(22, 5, 'Texturing/Rendu de baril', '2016-03-24', 'Dépliage des UV d\'un modélisation déjà faite d\'un baril.\r\nCréation et application de la texture/Rendu.\r\nBut : Obtenir une texture rouillée avec quelques reliefs et détails (logo, noirceur sur les bords).', 'UV Mapping, Texturing,Rendu', '<li>Photoshop</li>\r\n<li>ZBrush</li>\r\n<li>3ds Max</li>', '', 50, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Baril/Rendu1.jpg', '', ''),
(23, 5, 'Texturing/Rendu d\'une caisse en Bois', '2016-03-24', 'Création d\'une texture de boite métalisée sur les bords/Rendu.\r\nBut : Donner du reliefs aux bords et aux planches en diagonale en utilisant seulement les textures créées (Displacement textures).', 'Texturing, Rendu', '<li>Photoshop</li>\r\n<li>3ds Max</li>', '', 55, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Boite/Boite.jpg', '', ''),
(24, 5, 'Citerne', '2016-03-24', 'Dépliage des UV d\'un modélisation déjà faite d\'une citerne.\r\nCréation et application de la texture/Rendu.\r\nBut : Obtenir une texture rouillée/usée par le temps avec quelques détails (logo, noirceur sur les bords).', 'UV Mapping, Texturing, Rendu', '<li>3ds Max</li>\r\n<li>Photoshop</li>', '', 75, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Citerne/Citerne_Rendu_1.png', '', ''),
(25, 5, 'Space', '2016-03-24', 'Application texture planète sur 3 sphères/Rendu.', 'Rendu', '3ds Max', '', 40, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Space/Space.jpg', '', ''),
(26, 5, 'Voiture', '2016-03-24', 'Modélisation d\'une voiture/Rendu', 'Modélisation, Rendu', '3ds Max', '', 80, './Projets/2015-2016/TechArt/Images Eléa Bouyssou/Voiture/Voiture.png', '', ''),
(27, 5, 'Feu D\'artifice', '2016-03-24', 'Utilisation du système de particules de 3ds Max pour la création d\'un feu d\'artifice.', 'Modélisation', '3ds Max', '', 30, './Images/placeholder.png', '', ''),
(29, 5, 'Visite du musée de la mine', '2016-03-24', 'Non Renseigné', 'Photographie', '', '', 50, './Projets/2015-2016/Archi/Camille/Cliché musée de la mine.jpg', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `projetstoparcours`
--

CREATE TABLE `projetstoparcours` (
  `ID_projetstoparcours` int(10) UNSIGNED NOT NULL,
  `ID_projets` int(10) UNSIGNED NOT NULL,
  `ID_parcours` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 3),
(17, 17, 3),
(18, 18, 3),
(19, 19, 3),
(20, 20, 3),
(21, 21, 3),
(22, 22, 2),
(23, 23, 2),
(24, 24, 2),
(25, 25, 2),
(26, 26, 2),
(27, 27, 2),
(28, 29, 1);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `ID_Promo` int(11) NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `ID_Annee` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promotions`
--

INSERT INTO `promotions` (`ID_Promo`, `Lien`, `ID_Annee`) VALUES
(1, './Images/Promotion/promotion2015-2016.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reseausociaux`
--

CREATE TABLE `reseausociaux` (
  `ID_reseausociaux` int(11) UNSIGNED NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `NomReseau` varchar(40) NOT NULL,
  `ID_parcours` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `type` (
  `ID_type` int(11) UNSIGNED NOT NULL,
  `Type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`ID_type`, `Type`) VALUES
(1, 'Image'),
(2, 'Vidéo MP4'),
(3, 'Vidéo Youtube'),
(4, 'Modélisation');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualites`
--
ALTER TABLE `actualites`
  ADD PRIMARY KEY (`ID_actualites`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_administrateur`);

--
-- Index pour la table `anneescolaire`
--
ALTER TABLE `anneescolaire`
  ADD PRIMARY KEY (`ID_Annee`);

--
-- Index pour la table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID_data`),
  ADD KEY `ID_type` (`ID_type`);

--
-- Index pour la table `datatoprojets`
--
ALTER TABLE `datatoprojets`
  ADD PRIMARY KEY (`ID_datatoprojets`),
  ADD KEY `ID_data` (`ID_data`),
  ADD KEY `ID_projets` (`ID_projets`);

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`ID_eleves`);

--
-- Index pour la table `elevestoprojet`
--
ALTER TABLE `elevestoprojet`
  ADD PRIMARY KEY (`ID_elevestoprojet`),
  ADD KEY `ID_eleves` (`ID_eleves`),
  ADD KEY `ID_projets` (`ID_projets`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`ID_entreprises`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`ID_matieres`);

--
-- Index pour la table `matierestoprojet`
--
ALTER TABLE `matierestoprojet`
  ADD PRIMARY KEY (`ID_matierestoprojet`),
  ADD KEY `ID_projets` (`ID_projets`),
  ADD KEY `ID_matieres` (`ID_matieres`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`ID_parcours`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`ID_projets`),
  ADD KEY `ID_Annee` (`ID_Annee`);

--
-- Index pour la table `projetstoparcours`
--
ALTER TABLE `projetstoparcours`
  ADD PRIMARY KEY (`ID_projetstoparcours`),
  ADD KEY `ID_projets` (`ID_projets`),
  ADD KEY `ID_parcours` (`ID_parcours`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`ID_Promo`),
  ADD KEY `ID_Annee` (`ID_Annee`);

--
-- Index pour la table `reseausociaux`
--
ALTER TABLE `reseausociaux`
  ADD PRIMARY KEY (`ID_reseausociaux`),
  ADD KEY `ID_parcours` (`ID_parcours`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ID_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualites`
--
ALTER TABLE `actualites`
  MODIFY `ID_actualites` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_administrateur` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `anneescolaire`
--
ALTER TABLE `anneescolaire`
  MODIFY `ID_Annee` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `data`
--
ALTER TABLE `data`
  MODIFY `ID_data` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `datatoprojets`
--
ALTER TABLE `datatoprojets`
  MODIFY `ID_datatoprojets` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `ID_eleves` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `elevestoprojet`
--
ALTER TABLE `elevestoprojet`
  MODIFY `ID_elevestoprojet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `ID_entreprises` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `ID_matieres` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `matierestoprojet`
--
ALTER TABLE `matierestoprojet`
  MODIFY `ID_matierestoprojet` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `ID_parcours` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `ID_projets` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `projetstoparcours`
--
ALTER TABLE `projetstoparcours`
  MODIFY `ID_projetstoparcours` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `reseausociaux`
--
ALTER TABLE `reseausociaux`
  MODIFY `ID_reseausociaux` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `ID_type` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
