-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Mars 2016 à 16:50
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

--
-- Contenu de la table `actualites`
--

INSERT INTO `actualites` (`ID_actualites`, `DateCreation`, `Titre`, `Article`) VALUES
(1, '2016-02-01', 'Puy-en-Velay', 'Toto a la piscine'),
(2, '2016-02-25', 'Patate', 'Frite a la cantine'),
(3, '2016-02-12', 'Toto bisous', 'Toto et maman');

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

--
-- Contenu de la table `anneescolaire`
--

INSERT INTO `anneescolaire` (`ID_Annee`, `DateDebut`, `DateFin`) VALUES
(1, '2013-09-03', '2014-08-29'),
(2, '2014-09-01', '2015-08-28'),
(3, '2015-09-01', '2016-08-29'),
(4, '2012-09-03', '2013-08-28');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`ID_data`, `ID_type`, `Lien`) VALUES
(1, 2, '../Video/VideoTest.mp4'),
(2, 2, '../Video/VideoTest2.mp4'),
(18, 1, '../Pictures/0b4f995a.jpg'),
(19, 1, '../Pictures/1d3878a9.jpg'),
(20, 1, '../Pictures/c7d064d4.jpg'),
(21, 1, '../Pictures/136c27e7.jpg'),
(22, 1, '../Pictures/apk0duvhadivsgm9htgfsqkavtfce0gv75apectsa7ivpnotldxefyjpayzkjk6rqoxybietolzo2hsb3f7leiw3sfaug_mk5ljjmdwnsi55bgrqbbuakzf8z8czmiih8.jpg'),
(23, 1, '../Pictures/croatie-lacs-plitvice-cascades-7.jpg'),
(24, 1, '../Pictures/d6ec1e3e9f_seychelles-45.jpg'),
(25, 1, '../Pictures/0ced1177.jpg'),
(26, 1, '../Pictures/6812976929_6654ee46d1_b.jpg'),
(27, 1, '../Pictures/Aesthetics.png'),
(28, 1, '../Pictures/Arizona.jpeg'),
(29, 1, '../Pictures/Sadboys.png'),
(30, 1, '../Pictures/Yunglean.jpg'),
(31, 1, '../Pictures/xKsMP6n.jpg'),
(32, 1, '../Pictures/logo.png');

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
  `CV_PDF` varchar(40) NOT NULL,
  `CV_en_Ligne` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_eleves`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des élèves de la promo. ';

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`ID_eleves`, `Nom`, `Prenom`, `UserName`, `Password`, `CV_PDF`, `CV_en_Ligne`) VALUES
(1, 'toto', 'tito', '', '', '', ''),
(2, 'lennon', 'bob', '', '', '', ''),
(3, 'einz', 'albert', '', '', '', ''),
(4, 'lamare', 'andy', '', '', '', ''),
(5, 'maate', 'soufian', '', '', '', ''),
(6, 'abel', 'antoine', '', '', '', ''),
(7, 'got', 'bruno', '', '', '', ''),
(8, 'marilly', 'mathieu', '', '', '', ''),
(9, 'nong', 'william', '', '', '', ''),
(10, 'petit', 'quentin', '', '', '', ''),
(11, 'sio', 'fanta', '', '', '', ''),
(12, 'inshape', 'tibo', '', '', '', '');

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

--
-- Contenu de la table `elevestoprojet`
--

INSERT INTO `elevestoprojet` (`ID_elevestoprojet`, `ID_eleves`, `ID_projets`) VALUES
(1, 2, 4),
(2, 3, 4),
(3, 5, 4),
(4, 9, 4),
(5, 5, 2),
(6, 7, 2),
(7, 10, 2),
(8, 12, 2);

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

--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`ID_entreprises`, `Nom`, `Lien`, `Logo`) VALUES
(1, 'Microsoft', 'https://www.microsoft.com/fr-fr', '../Pictures/Logo/microsoft.png'),
(2, 'Maskott', 'http://www.maskott.com/', '../Pictures/Logo/maskott.png');

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

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`ID_matieres`, `Nom`) VALUES
(1, 'ASIA'),
(2, 'Unity 3D'),
(3, 'Modélisation'),
(4, 'Anglais'),
(5, 'Réalité Virtuelle');

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

--
-- Contenu de la table `matierestoprojet`
--

INSERT INTO `matierestoprojet` (`ID_matierestoprojet`, `ID_projets`, `ID_matieres`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 4, 5),
(4, 11, 4),
(5, 12, 1),
(6, 13, 3),
(7, 14, 3),
(8, 15, 4),
(9, 16, 3),
(10, 2, 4),
(11, 5, 2),
(13, 3, 3),
(14, 6, 1),
(15, 8, 4),
(16, 9, 2),
(17, 10, 4);

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
(1, 'Infographie', 'L’année 1866 fut marquée par un événement\nbizarre, un phénomène inexpliqué et inexplicable\nque personne n’a sans doute oublié. Sans parler\ndes   rumeurs   qui   agitaient   les   populations   des\nports et surexcitaient l’esprit public à l’intérieur\ndes   continents,   les   gens   de   mer   furent\nparticulièrement   émus.   Les   négociants,\narmateurs,   capitaines   de   navires,   skippers   et\nmasters de l’Europe et de l’Amérique, officiers\ndes marines militaires de tous pays, et, après eux,\nles   gouvernements   des   divers   États   des   deux\ncontinents, se préoccupèrent de ce fait au plus\nhaut point.', 'Former des infographistes 3D pour l''Architecture. 2 domaines principaux : <li> Archi intérieure/archi extérieure ; thèmes abordés : illustrations, architecture intérieure 3D, architecture extérieure 3D, mise en situation photo-réaliste, animations 3D en architecture – visites virtuelles, </li>\n<li> initiation à la maquette numérique 3D, initiation au BIM (Building Information Model). </li>', 'Acquisition des notions d''infographie pour l''architecture (plans de masse, élévations, architecture intérieure/extérieure…), de la modélisation au rendu, de la réalisation d''animation et de vidéo architecturale, de la prise en compte de l''éclairage, de maquette numérique - BIM (partie visualisation 3D)', '3DSMax, AutoCAD, ArchiCAD, Photoshop, After Effects, VRay, Lumion [Prévision 2016 : BIM (Archicad, Revit), Sketchup]', 'Le parcours Infographie pour l''architecture est accessible aux titulaires d''un BAC+2, principalement : <li> BTS AEA Agencement Environnement Architectural/BTS ERA Etude et Réalisation d''Agencements, </li><li> BTS Design d''Espace, </li><li> DUT Informatique (Imagerie Numérique)/ DUT MMI (avec connaissances de modélisation).</li> Le recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '../PDF/AvatarDrive.zip', '#36802D'),
(2, 'Technical Artist', 'Les faits relatifs à cette apparition, consignés\r\naux   divers   livres   de   bord,   s’accordaient   assez\r\nexactement sur la structure de l’objet ou de l’être\r\nen question, la vitesse inouïe de ses mouvements,\r\nla puissance surprenante de sa locomotion, la vie\r\nparticulière dont il semblait doué. Si c’était un\r\ncétacé, il surpassait en volume tous ceux que la\r\nscience avait classés jusqu’alors. Ni Cuvier, ni\r\nLacépède, ni M. Dumeril, ni M. de Quatrefages\r\nn’eussent admis l’existence d’un tel monstre – à\r\nmoins de l’avoir vu, ce qui s’appelle vu de leurs\r\npropres yeux de savants', 'Former des infographistes 3D pour l''Animation. 2 domaines principaux : <li> modélisation et animation traditionnelles ; étude de la chaîne complète : dessin main levée, modélisation, texturing, animation [rigging,skinning] </li> <li> [2016] modélisation et animation procédurales </li>', 'Maîtrise de la chaîne de production (dessin main levée, modélisation, texturing, animation [rigging,skinng]) selon les approches modélisation et animation traditionnelles et procédurales.', '3DSMax, Photoshop, After Effects, Substance Designer', 'Le parcours Technical Artist est accessible aux titulaires d''un BAC+2, ayant des connaissances  d''un modeleur 3D (par ex. : 3dsMAX, Maya ou Blender) et en programmation, principalement : <li> DUT Informatique (Imagerie Numérique), </li><li> DUT MMI, </li><li> Diplôme des Métiers d''Arts (DMA) cinéma d''animation, </li><li> BTS Design Graphique option communication et médias numériques [+ connaissances de modélisation et programmation], </li><li> BTS Métiers de l''Audiovisuel option métiers de l''image, </li><li> autres formations titulaires d''une Mise à niveau en arts appliqués (MANAA) … </li> Le recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés. <b>ATTENTION : à partir de 2016,</b> il sera demandé aux candidats de <b>connaître un langage de programmation</b>, afin de faire l''acquisition des modélisation et animation procédurales.', '../PDF/TP2___OSG__Semestre_4__2013_2014.pdf', '#F215C9'),
(3, '3D Temps réel et Réalité Virtuelle', 'En   effet,   le   20   juillet   1866,   le   steamer\r\nGovernor Higginson\r\n, de Calcutta and Burnach\r\nSteam Navigation Company, avait rencontré cette\r\nmasse mouvante à cinq milles dans l’est des côtes\r\nde l’Australie. Le capitaine Baker se crut, tout\r\nd’abord, en présence d’un écueil inconnu\r\n; il se\r\ndisposait   même   à   en   déterminer   la   situation\r\nexacte, quand deux colonnes d’eau, projetées par\r\nl’inexplicable objet, s’élancèrent en sifflant à cent\r\ncinquante pieds dans l’air. Donc, à moins que cet\r\nécueil   ne   fût   soumis   aux   expansions\r\nintermittentes   d’un   geyser,   le   \r\nGovernor\r\nHigginson\r\n  avait   affaire   bel   et   bien   à   quelque\r\nmammifère   aquatique,   inconnu   jusque-là,   qui\r\nrejetait   par   ses   évents   des   colonnes   d’eau,\r\nmélangées d’air et de vapeur.', 'Former des programmeurs pour le jeu vidéo ou pour la Réalité Virtuelle. 2 domaines principaux : <li> 3D Temps Réel : développement d''un jeu vidéo (Unity 3D, shaders, intelligence artificielle ...) </li><li> Réalité Virtuelle : découverte de différents périphériques (Oculus Rift ...) </li>', 'Développement de projet informatique en groupe (analyse, conception, organisation, planification) et prise de responsabilités associées (chef de projet …), maîtrise d''un moteur haut niveau de création de jeux vidéo (focus intelligence artificielle, développement de shaders), initiation à la réalité virtuelle.', 'Visual Studio, C++, Git, SourceTree, GanttProject, CMake, Unity (ShaderLab), Unreal Engine 4 [Prévision 2016 : Unreal Engine 4]', 'Le parcours 3D Temps Réel et Réalité Virtuelle est accessible aux titulaires d''un BAC+2, ayant un très bon niveau en langage de programmation orienté objet (C++ ou C#) ainsi que des connaissances en modélisation (3dsMax ou Blender), principalement : <li> DUT Informatique (Imagerie Numérique) </li><li> DUT MMI, </li><li> BTS Services Informatiques aux Organisations (SIO), option SLAM (Solutions Logicielles et Applications Métiers), </li><li> BTS Systèmes Numériques, Option Informatique et Réseaux. </li> Le recrutement se fait sur dossier, examiné par un jury ; CV (description des logiciels connus/utilisés), portfolio en ligne et lettre de motivation sont exigés.', '../PDF/TP3___OSG__Semestre_4__2013_2014.pdf', '#F9EC31');

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

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`ID_projets`, `ID_Annee`, `Nom`, `Date`, `Description`, `Caracteristique`, `Logiciel`, `Materiel`, `Poids`, `Miniature`, `Fichier_Projet`, `Lien`, `Video`, `Image`, `Mode`) VALUES
(1, 3, 'eeee', '2016-01-01', 'azedjgvfkza', '2.5D', 'Potato', 'Une Passoire', 2, '../Pictures/0b4f995a.jpg', 'aqdohziuqq', '', 'asdf', NULL, NULL),
(2, 3, 'ASDF the Game', '2016-01-01', 'ASDF', 'ASDF', 'ASDF', 'ASDF', 4, '../Pictures/1d3878a9.jpg', 'ASDF', '', '../Video/VideoTest2.mp4', NULL, NULL),
(3, 3, 'Tequilla', '2016-02-29', 'zdqsdf', 'dqfezfd', 'qzefqzfd', 'zzsfqzef', 5, '../Pictures/c7d064d4.jpg', 'azsd', '', NULL, NULL, NULL),
(4, 3, 'Derp', '2016-02-02', 'gd', 'b', 'qrfq', 'qesrggqqes', 5, '../Pictures/136c27e7.jpg', '../PDF/AvatarDrive.zip', 'http://iutweb-lepuy.u-clermont1.fr/nawak/', '../Video/VideoTest.mp4', NULL, NULL),
(5, 3, 'Derp 2', '2016-02-17', 'Derp''s revenge', 'zef', 'Unity', 'JH NBJH? ', 0, '../Pictures/apk0duvhadivsgm9htgfsqkavtfce0gv75apectsa7ivpnotldxefyjpayzkjk6rqoxybietolzo2hsb3f7leiw3sfaug_mk5ljjmdwnsi55bgrqbbuakzf8z8czmiih8.jpg', 'aaaasssssssss', '', 'rsrgfvere', NULL, NULL),
(6, 3, 'Toto à la plage', '2016-02-27', 'EIUD', 'EQUFZQ', 'FCLJKQ', 'zefis', 4, '../Pictures/croatie-lacs-plitvice-cascades-7.jpg', 'rese', '', 'zqrgf', NULL, NULL),
(8, 3, 'What''s 9+10', '2016-02-21', '21', '21', '21', '21', 2, '../Pictures/d6ec1e3e9f_seychelles-45.jpg', '21', '', '21', NULL, NULL),
(9, 3, 'OOOOOOOOOOO', '2016-02-10', 'OOOOOOOOOOOOOOOOOOOOOOOO', 'OOOOOOOOOOOOOO', 'OOOOOOOOOOOOO', 'O', 0, '../Pictures/0ced1177.jpg', 'OOOOOOOOOOOOO', '', 'OOOOOOOOOOOOOOOOOOOOOOOOO', NULL, NULL),
(10, 3, 'Derp Origins', '2016-03-16', 'Derp Begins', 'Real 4.5D', 'kjckcvj', 'Balançoire', 1337, '../Pictures/6812976929_6654ee46d1_b.jpg', 'AAAAAAAAAAAAAA', '', 'Andthisisthevideo', NULL, NULL),
(11, 2, 'AESTHETICS', '2015-02-01', 'sadboys2002', 'Vaporwave AESTHETICS', 'Vaporwa.ve', 'Une bouteille de Fiji', 5, '../Pictures/Aesthetics.png', 'oahdoii', '', NULL, NULL, NULL),
(12, 2, 'Arizona Ice Tea', '2015-02-01', 'zad', 'rgzerf', 'Windows 95', 'Une canette d''Arizona', 3, '../Pictures/Arizona.jpeg', 'asasdada', '', NULL, NULL, NULL),
(13, 1, 'Sadboys.exe', '2014-01-01', 'AAAA', 'asd', 'qerfsd', 'qzdefqs', 4, '../Pictures/Sadboys.png', 'azdqdd', '', NULL, NULL, NULL),
(14, 4, 'Gingseng Strip 2002', '2013-02-07', 'azdsd', 'adsqsddsq', 'yunglean.exe', 'Arizona cans', 4, '../Pictures/Yunglean.jpg', 'asdqsdaz', '', NULL, NULL, NULL),
(15, 1, 'despair', '2014-01-01', 'whatislife?', 'ayy lmao', 'aaa', 'dqsdqsd', 3, '../Pictures/xKsMP6n.jpg', 'aozidbjajsd', '', NULL, NULL, NULL),
(16, 4, 'brbrbrbr', '2013-02-07', 'brbr', 'gibe moni pls', 'br.exe', 'brbrbr', 3, '../Pictures/logo.png', 'azsdqsd', '', 'qsddqfz', NULL, NULL);

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

--
-- Contenu de la table `projetstoparcours`
--

INSERT INTO `projetstoparcours` (`ID_projetstoparcours`, `ID_projets`, `ID_parcours`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 8, 3),
(8, 9, 3),
(9, 10, 3),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1),
(13, 14, 1),
(14, 15, 1),
(15, 16, 1),
(16, 4, 2),
(17, 2, 3);

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

--
-- Contenu de la table `promotions`
--

INSERT INTO `promotions` (`ID_Promo`, `Lien`, `ID_Annee`) VALUES
(1, '../Pictures/worker.jpg', 3),
(2, '../Pictures/worker2.jpg', 2);

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

--
-- Contenu de la table `reseausociaux`
--

INSERT INTO `reseausociaux` (`ID_reseausociaux`, `Lien`, `NomReseau`, `ID_parcours`) VALUES
(1, 'https://twitter.com/LicenceMIND3DTR', 'twitter', 3),
(2, 'https://twitter.com/LicenceMINDTA', 'twitter', 2),
(3, 'https://www.facebook.com/zuck', 'facebook', 3);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `ID_type` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`ID_type`, `type`) VALUES
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
