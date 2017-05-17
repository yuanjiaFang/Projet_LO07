-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Mai 2017 à 01:29
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
(96385, 1),
(96385, 2),
(96385, 3),
(96385, 4),
(96385, 5),
(96385, 6),
(74185, 7),
(74185, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `element_formation`
--

INSERT INTO `element_formation` (`num_element`, `sem_seq`, `sem_label`, `sigle`, `categorie`, `affectation`, `utt`, `profil`, `credit`, `resultat`) VALUES
(1, 1, 'ISI1', 'NF16', 'CS', 'TCBR', 'Y', 'Y', 6, 'A'),
(2, 1, 'ISI1', 'LO12', 'TM', 'TCBR', 'Y', 'Y', 6, 'B'),
(3, 1, 'ISI1', 'GE31', 'EC', 'TCBR', 'Y', 'Y', 4, 'A'),
(4, 2, 'ISI2', 'LO07', 'TM', 'TCBR', 'Y', 'Y', 6, 'A'),
(5, 2, 'ISI2', 'LO12', 'CS', 'TCBR', 'Y', 'Y', 6, 'B'),
(6, 2, 'ISI2', 'GE34', 'EC', 'TCBR', 'Y', 'Y', 4, 'C'),
(7, 1, 'TC1', 'MT01', 'CS', 'TC', 'Y', 'Y', 6, 'A'),
(8, 1, 'TC3', 'LO07', 'TM', 'TC', 'Y', 'Y', 0, 'A');

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
(35424, 'ROUX', 'Thomas', 'BR', 'LIB'),
(74185, 'FANG', 'Yuanjia', 'TC', '?'),
(75727, 'GILBERT', 'Valentin', 'BR', 'MPL'),
(96385, 'PHAN', 'David', 'BR', '?');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `FK_element_cursus` FOREIGN KEY (`element_formation`) REFERENCES `element_formation` (`num_element`),
  ADD CONSTRAINT `FK_etudiant_cursus` FOREIGN KEY (`num_etudiant`) REFERENCES `etudiant` (`num_carte`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
