-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Mars 2016 à 17:47
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `ID_actualites` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `DateCreation` date NOT NULL,
  `Titre` varchar(80) NOT NULL,
  `Article` varchar(140) NOT NULL,
  PRIMARY KEY (`ID_actualites`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `ID_administrateur` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_administrateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des administrateurs ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `ID_eleves` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `CV_PDF` varchar(40) NOT NULL,
  `CV_en_Ligne` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_eleves`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table représente chacun des élèves de la promo. ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `elevestoprojet`
--

DROP TABLE IF EXISTS `elevestoprojet`;
CREATE TABLE IF NOT EXISTS `elevestoprojet` (
  `ID_elevestoprojet` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ID_eleves` int(11) unsigned NOT NULL,
  `ID_projets` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_elevestoprojet`),
  KEY `ID_eleves` (`ID_eleves`),
  KEY `ID_projets` (`ID_projets`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

DROP TABLE IF EXISTS `entreprises`;
CREATE TABLE IF NOT EXISTS `entreprises` (
  `ID_entreprises` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(40) NOT NULL,
  `Lien` varchar(200) NOT NULL,
  `Logo` varchar(80) NOT NULL,
  PRIMARY KEY (`ID_entreprises`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `ID_matieres` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` int(11) NOT NULL,
  PRIMARY KEY (`ID_matieres`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `matierestoprojet`
--

DROP TABLE IF EXISTS `matierestoprojet`;
CREATE TABLE IF NOT EXISTS `matierestoprojet` (
  `ID_matierestoprojet` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ID_projets` int(11) unsigned NOT NULL,
  `ID_matieres` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_matierestoprojet`),
  KEY `ID_projets` (`ID_projets`),
  KEY `ID_matieres` (`ID_matieres`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE IF NOT EXISTS `parcours` (
  `ID_parcours` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(40) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Plaquette` varchar(100) NOT NULL,
  `Couleur` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_parcours`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `parcours`
--

INSERT INTO `parcours` (`ID_parcours`, `Nom`, `Description`, `Plaquette`, `Couleur`) VALUES
(1, 'Infographie', 'L’année 1866 fut marquée par un événement\r\nbizarre, un phénomène inexpliqué et inexplicable\r\nque personne n’a sans doute oublié. Sans parler\r\ndes   rumeurs   qui   agitaient   les   populations   des\r\nports et surexcitaient l’esprit public à l’intérieur\r\ndes   continents,   les   gens   de   mer   furent\r\nparticulièrement   émus.   Les   négociants,\r\narmateurs,   capitaines   de   navires,   skippers   et\r\nmasters de l’Europe et de l’Amérique, officiers\r\ndes marines militaires de tous pays, et, après eux,\r\nles   gouvernements   des   divers   États   des   deux\r\ncontinents, se préoccupèrent de ce fait au plus\r\nhaut point.', '../PDF/AvatarDrive.zip', '#36802D'),
(2, 'Technical Artist', 'Les faits relatifs à cette apparition, consignés\r\naux   divers   livres   de   bord,   s’accordaient   assez\r\nexactement sur la structure de l’objet ou de l’être\r\nen question, la vitesse inouïe de ses mouvements,\r\nla puissance surprenante de sa locomotion, la vie\r\nparticulière dont il semblait doué. Si c’était un\r\ncétacé, il surpassait en volume tous ceux que la\r\nscience avait classés jusqu’alors. Ni Cuvier, ni\r\nLacépède, ni M. Dumeril, ni M. de Quatrefages\r\nn’eussent admis l’existence d’un tel monstre – à\r\nmoins de l’avoir vu, ce qui s’appelle vu de leurs\r\npropres yeux de savants', '../PDF/TP2___OSG__Semestre_4__2013_2014.pdf', '#F215C9'),
(3, '3D Temps réel et Réalité Virtuelle', 'En   effet,   le   20   juillet   1866,   le   steamer\r\nGovernor Higginson\r\n, de Calcutta and Burnach\r\nSteam Navigation Company, avait rencontré cette\r\nmasse mouvante à cinq milles dans l’est des côtes\r\nde l’Australie. Le capitaine Baker se crut, tout\r\nd’abord, en présence d’un écueil inconnu\r\n; il se\r\ndisposait   même   à   en   déterminer   la   situation\r\nexacte, quand deux colonnes d’eau, projetées par\r\nl’inexplicable objet, s’élancèrent en sifflant à cent\r\ncinquante pieds dans l’air. Donc, à moins que cet\r\nécueil   ne   fût   soumis   aux   expansions\r\nintermittentes   d’un   geyser,   le   \r\nGovernor\r\nHigginson\r\n  avait   affaire   bel   et   bien   à   quelque\r\nmammifère   aquatique,   inconnu   jusque-là,   qui\r\nrejetait   par   ses   évents   des   colonnes   d’eau,\r\nmélangées d’air et de vapeur.', '../PDF/TP3___OSG__Semestre_4__2013_2014.pdf', '#F9EC31');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `ID_projets` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(2000) NOT NULL,
  `Caractéristique` varchar(2000) NOT NULL,
  `Logiciel` varchar(2000) NOT NULL,
  `Matériel` varchar(2000) NOT NULL,
  `Poids` int(3) NOT NULL,
  `Miniature` varchar(200) NOT NULL,
  `Fichier_Projet` varchar(200) NOT NULL,
  `Vidéo` varchar(200) NOT NULL,
  `ID_parcours` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_projets`),
  KEY `ID_parcours` (`ID_parcours`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`ID_projets`, `Nom`, `Date`, `Description`, `Caractéristique`, `Logiciel`, `Matériel`, `Poids`, `Miniature`, `Fichier_Projet`, `Vidéo`, `ID_parcours`) VALUES
(1, 'eeee', '2016-02-01', 'azedjgvfkza', '2.5D', 'Potato', 'Une Passoire', 2, '../Pictures/0b4f995a.jpg', 'aqdohziuqq', 'asdf', 1),
(2, 'ASDF the Game', '2016-01-01', 'ASDF', 'ASDF', 'ASDF', 'ASDF', 4, '../Pictures/1d3878a9.jpg', 'ASDF', 'ASDF', 1),
(3, 'Tequilla', '2016-02-29', 'zdqsdf', 'dqfezfd', 'qzefqzfd', 'zzsfqzef', 5, '../Pictures/c7d064d4.jpg', 'azsd', 'zefef', 2),
(4, 'Derp', '2016-02-02', 'gd', 'b', 'qrfq', 'qesrggqqes', 5, '../Pictures/136c27e7.jpg', 'WEZ4ERRF', 'qqrzqersq', 1),
(5, 'Derp 2', '2016-02-17', 'Derp''s revenge', 'zef', 'Unity', 'JH NBJH? ', 0, '../Pictures/apk0duvhadivsgm9htgfsqkavtfce0gv75apectsa7ivpnotldxefyjpayzkjk6rqoxybietolzo2hsb3f7leiw3sfaug_mk5ljjmdwnsi55bgrqbbuakzf8z8czmiih8.jpg', 'aaaasssssssss', 'rsrgfvere', 2),
(6, 'Toto à la plage', '2016-02-27', 'EIUD', 'EQUFZQ', 'FCLJKQ', 'zefis', 4, '../Pictures/croatie-lacs-plitvice-cascades-7.jpg', 'rese', 'zqrgf', 2),
(8, 'What''s 9+10', '2016-02-21', '21', '21', '21', '21', 2, '../Pictures/d6ec1e3e9f_seychelles-45.jpg', '21', '21', 3),
(9, 'OOOOOOOOOOO', '2016-02-10', 'OOOOOOOOOOOOOOOOOOOOOOOO', 'OOOOOOOOOOOOOO', 'OOOOOOOOOOOOO', 'O', 0, '../Pictures/0ced1177.jpg', 'OOOOOOOOOOOOO', 'OOOOOOOOOOOOOOOOOOOOOOOOO', 3),
(10, 'Derp Origins', '2016-03-16', 'Derp Begins', 'Real 4.5D', 'kjckcvj', 'Balançoire', 1337, '../Pictures/6812976929_6654ee46d1_b.jpg', 'AAAAAAAAAAAAAA', 'Andthisisthevideo', 3);

-- --------------------------------------------------------

--
-- Structure de la table `reseausociaux`
--

DROP TABLE IF EXISTS `reseausociaux`;
CREATE TABLE IF NOT EXISTS `reseausociaux` (
  `ID_reseausociaux` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Lien` varchar(200) NOT NULL,
  `Logo` varchar(200) NOT NULL,
  `ID_parcours` int(11) unsigned NOT NULL,
  PRIMARY KEY (`ID_reseausociaux`),
  KEY `ID_parcours` (`ID_parcours`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `reseausociaux`
--

INSERT INTO `reseausociaux` (`ID_reseausociaux`, `Lien`, `Logo`, `ID_parcours`) VALUES
(1, 'https://twitter.com/LicenceMIND3DTR', '../Pictures/Logo/twitter.jpg', 3),
(2, 'https://twitter.com/LicenceMINDTA', '../Pictures/Logo/twitter.jpg', 2),
(3, 'https://www.facebook.com/zuck', '../Pictures/Logo/facebook.png', 3);

--
-- Contraintes pour les tables exportées
--

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
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`ID_parcours`) REFERENCES `parcours` (`ID_parcours`);

--
-- Contraintes pour la table `reseausociaux`
--
ALTER TABLE `reseausociaux`
  ADD CONSTRAINT `reseausociaux_ibfk_1` FOREIGN KEY (`ID_parcours`) REFERENCES `parcours` (`ID_parcours`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
