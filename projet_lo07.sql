-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 26 Juin 2017 à 17:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_lo07`
--

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE IF NOT EXISTS `cursus` (
  `num_etudiant` int(11) NOT NULL,
  `element_formation` int(11) NOT NULL,
  PRIMARY KEY (`num_etudiant`,`element_formation`),
  KEY `FK_element_cursus` (`element_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cursus`
--

INSERT INTO `cursus` (`num_etudiant`, `element_formation`) VALUES
(74185, 7),
(74185, 8),
(96385, 9),
(96385, 10),
(96385, 11),
(96385, 12),
(96385, 13),
(96385, 14),
(12546, 15),
(12546, 16),
(12546, 17),
(12546, 18),
(12546, 19),
(12546, 20),
(12546, 21),
(12546, 22),
(12546, 23),
(12546, 24),
(12546, 25),
(12546, 26),
(12546, 27),
(12546, 28),
(12546, 29),
(12546, 30),
(12546, 31),
(12546, 32),
(12546, 33),
(12546, 34),
(12546, 35),
(12546, 36),
(12546, 37),
(12546, 38),
(12546, 39),
(12546, 40),
(12546, 41),
(12546, 42),
(12546, 43),
(12546, 44),
(12546, 45),
(12546, 46),
(12546, 47);

-- --------------------------------------------------------

--
-- Structure de la table `description_reglement`
--

CREATE TABLE IF NOT EXISTS `description_reglement` (
  `reglement` int(5) NOT NULL,
  `element_regle` int(11) NOT NULL,
  PRIMARY KEY (`reglement`,`element_regle`),
  KEY `element_regle` (`element_regle`),
  KEY `element_regle_2` (`element_regle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `description_reglement`
--

INSERT INTO `description_reglement` (`reglement`, `element_regle`) VALUES
(21, 265),
(21, 266),
(21, 267),
(21, 268),
(21, 269),
(21, 270),
(21, 271),
(21, 272),
(21, 273),
(21, 274),
(21, 275),
(21, 276),
(21, 277),
(22, 278),
(22, 279),
(22, 280),
(22, 281),
(22, 282),
(22, 283),
(22, 284),
(22, 285),
(22, 286),
(22, 287),
(22, 288),
(22, 289),
(22, 290),
(22, 291),
(22, 292);

-- --------------------------------------------------------

--
-- Structure de la table `element_formation`
--

CREATE TABLE IF NOT EXISTS `element_formation` (
  `num_element` int(11) NOT NULL AUTO_INCREMENT,
  `sem_seq` int(11) NOT NULL,
  `sem_label` varchar(10) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `categorie` varchar(10) NOT NULL,
  `affectation` varchar(10) NOT NULL,
  `utt` varchar(1) NOT NULL,
  `profil` varchar(1) NOT NULL,
  `credit` int(11) NOT NULL,
  `resultat` varchar(10) NOT NULL,
  PRIMARY KEY (`num_element`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `element_formation`
--

INSERT INTO `element_formation` (`num_element`, `sem_seq`, `sem_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) VALUES
(7, 1, 'TC1', 'MT01', 'CS', 'TC', 'Y', 'Y', 6, 'A'),
(8, 1, 'TC3', 'LO07', 'TM', 'TC', 'Y', 'Y', 0, 'A'),
(9, 1, 'ISI1', 'NF16', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(10, 1, 'ISI1', 'GE31', 'EC', 'TCBR', 'Y', 'Y', 4, 'A'),
(11, 1, 'ISI1', 'LO12', 'TM', 'TCBR', 'Y', 'Y', 6, 'B'),
(12, 2, 'ISI2', 'LO12', 'CS', 'TCBR', 'Y', 'Y', 6, 'B'),
(13, 2, 'ISI2', 'LO07', 'TM', 'TCBR', 'Y', 'Y', 6, 'A'),
(14, 2, 'ISI2', 'GE34', 'EC', 'TCBR', 'Y', 'Y', 4, 'C'),
(15, 1, 'ISI1', 'SY02', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(16, 1, 'ISI1', 'SC00', 'CT', 'TCBR', 'Y', 'Y', 4, 'A'),
(17, 1, 'ISI1', 'IF14', 'TM', 'TCBR', 'Y', 'Y', 6, 'A'),
(18, 1, 'ISI1', 'BULE', 'NPML', 'TCBR', 'Y', 'Y', 0, 'ADM'),
(19, 1, 'ISI1', 'NF16', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(20, 1, 'ISI1', 'LE08', 'EC', 'BR', 'Y', 'Y', 4, 'A'),
(21, 1, 'ISI1', 'NF20', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(22, 1, 'ISI1', 'GE04', 'ME', 'BR', 'Y', 'Y', 4, 'B'),
(23, 2, 'ISI2', 'LO12', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(24, 2, 'ISI2', 'HT05', 'CT', 'BR', 'Y', 'Y', 4, 'A'),
(25, 2, 'ISI2', 'IF02', 'CS', 'TCBR', 'Y', 'Y', 6, 'C'),
(26, 2, 'ISI2', 'LC00', 'EC', 'BR', 'Y', 'Y', 4, 'A'),
(27, 2, 'ISI2', 'AC10', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(28, 2, 'ISI2', 'LO07', 'TM', 'TCBR', 'Y', 'Y', 6, 'C'),
(29, 2, 'ISI2', 'ATDOC2', 'HP', 'BR', 'Y', 'Y', 0, 'ADM'),
(30, 2, 'ISI2', 'IF03', 'TM', 'TCBR', 'Y', 'Y', 6, 'B'),
(31, 2, 'ISI2', 'ATDOC1', 'HP', 'BR', 'Y', 'Y', 0, 'ADM'),
(32, 3, 'ISI3', 'IF16', 'TM', 'FCBR', 'Y', 'Y', 6, 'B'),
(33, 3, 'ISI3', 'PH15', 'CT', 'BR', 'Y', 'Y', 4, 'C'),
(34, 3, 'ISI3', 'IF15', 'CS', 'FCBR', 'Y', 'Y', 6, 'B'),
(35, 3, 'ISI3', 'LC01', 'EC', 'BR', 'Y', 'Y', 4, 'A'),
(36, 3, 'ISI3', 'IF20', 'CS', 'FCBR', 'Y', 'Y', 6, 'B'),
(37, 3, 'ISI3', 'ATDOC4', 'HP', 'BR', 'Y', 'Y', 0, 'ADM'),
(38, 3, 'ISI3', 'IF17', 'CS', 'FCBR', 'Y', 'Y', 6, 'A'),
(39, 3, 'ISI3', 'ATDOC3', 'HP', 'BR', 'Y', 'Y', 0, 'ADM'),
(40, 4, 'ISI4', 'TN09', 'ST', 'TCBR', 'Y', 'Y', 30, 'A'),
(41, 5, 'ISI5', 'UX70', 'ME', 'BR', 'N', 'Y', 4, 'EQU'),
(42, 5, 'ISI5', 'UX51', 'TM', 'FCBR', 'N', 'Y', 6, 'EQU'),
(43, 5, 'ISI5', 'SE', 'SE', 'BR', 'Y', 'Y', 0, 'ADM'),
(44, 5, 'ISI5', 'UX50', 'TM', 'FCBR', 'N', 'Y', 6, 'EQU'),
(45, 5, 'ISI5', 'UX80', 'CT', 'BR', 'N', 'Y', 4, 'EQU'),
(46, 5, 'ISI5', 'UX71', 'ME', 'BR', 'N', 'Y', 4, 'EQU'),
(47, 6, 'ISI6', 'TN10', 'ST', 'FCBR', 'Y', 'Y', 30, 'A');

-- --------------------------------------------------------

--
-- Structure de la table `element_regle`
--

CREATE TABLE IF NOT EXISTS `element_regle` (
  `num_element` int(11) NOT NULL AUTO_INCREMENT,
  `label_regle` varchar(5) NOT NULL,
  `agregat` varchar(10) NOT NULL,
  `cible_agregat` varchar(10) NOT NULL,
  `etape` varchar(10) NOT NULL,
  `seuil` int(5) NOT NULL,
  PRIMARY KEY (`num_element`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=293 ;

--
-- Contenu de la table `element_regle`
--

INSERT INTO `element_regle` (`num_element`, `label_regle`, `agregat`, `cible_agregat`, `etape`, `seuil`) VALUES
(265, 'R01', 'SUM', 'CS+TM', 'TCBR', 54),
(266, 'R02', 'SUM', 'CS+TM', 'FCBR', 30),
(267, 'R03', 'SUM', 'CS', 'BR', 30),
(268, 'R04', 'SUM', 'TM', 'BR', 30),
(269, 'R05', 'SUM', 'ST', 'TCBR', 30),
(270, 'R06', 'SUM', 'ST', 'FCBR', 30),
(271, 'R07', 'SUM', 'EC', 'BR', 12),
(272, 'R08', 'SUM', 'ME', 'BR', 4),
(273, 'R09', 'SUM', 'CT', 'BR', 4),
(274, 'R10', 'SUM', 'ME+CT', 'BR', 16),
(275, 'R11', 'SUM', 'UTT(CS+TM)', 'BR', 60),
(276, 'R12', 'EXIST', 'SE', 'UTT', 0),
(277, 'R13', 'EXIST', 'NPML', 'UTT', 0),
(278, 'R01', 'SUM', 'CS+TM', 'TCBR', 42),
(279, 'R02', 'SUM', 'CS+TM', 'FCBR', 18),
(280, 'R03', 'SUM', 'CS', 'BR', 24),
(281, 'R04', 'SUM', 'TM', 'BR', 24),
(282, 'R05', 'SUM', 'CS+TM', 'BR', 84),
(283, 'R06', 'SUM', 'ST', 'TCBR', 30),
(284, 'R07', 'SUM', 'ST', 'FCBR', 30),
(285, 'R08', 'SUM', 'EC', 'BR', 12),
(286, 'R09', 'SUM', 'ME', 'BR', 4),
(287, 'R10', 'SUM', 'CT', 'BR', 4),
(288, 'R11', 'SUM', 'ME+CT', 'BR', 16),
(289, 'R12', 'SUM', 'UTT(CS+TM)', 'BR', 60),
(290, 'R13', 'EXIST', 'SE', 'BR', 0),
(291, 'R14', 'EXIST', 'NPML', 'BR', 0),
(292, 'R15', 'SUM', '', 'ALL', 180);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_carte` int(5) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `admission` varchar(2) NOT NULL,
  `filiere` varchar(3) NOT NULL,
  PRIMARY KEY (`num_carte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_carte`, `nom`, `prenom`, `admission`, `filiere`) VALUES
(12345, 'LEMERCIER', 'Marc', 'TC', 'MSI'),
(12546, 'PRIOR', 'beatrice', 'BR', 'MSI'),
(35424, 'ROUX', 'Thomas', 'BR', 'LIB'),
(74185, 'FANG', 'Yuanjia', 'TC', '?'),
(75727, 'GILBERT', 'Valentin', 'BR', 'MPL'),
(96385, 'PHAN', 'David', 'BR', '?');

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE IF NOT EXISTS `reglement` (
  `nom_reglement` varchar(20) NOT NULL,
  `num_reglement` int(11) NOT NULL AUTO_INCREMENT,
  `application` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`num_reglement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `reglement`
--

INSERT INTO `reglement` (`nom_reglement`, `num_reglement`, `application`) VALUES
('R_ACTUEL_BR.csv', 21, 1),
('R_FUTUR_BR.csv', 22, 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `FK_element_cursus` FOREIGN KEY (`element_formation`) REFERENCES `element_formation` (`num_element`),
  ADD CONSTRAINT `FK_etudiant_cursus` FOREIGN KEY (`num_etudiant`) REFERENCES `etudiant` (`num_carte`);

--
-- Contraintes pour la table `description_reglement`
--
ALTER TABLE `description_reglement`
  ADD CONSTRAINT `FK_reglement_num_reglement` FOREIGN KEY (`reglement`) REFERENCES `reglement` (`num_reglement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_element_regle_num_element` FOREIGN KEY (`element_regle`) REFERENCES `element_regle` (`num_element`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
