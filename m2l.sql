-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 fév. 2018 à 15:42
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `code_postal` int(255) NOT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_a`, `rue`, `numero`, `ville`, `code_postal`) VALUES
(1, 'rue du liéton', 52, 'Paris', 77015),
(2, 'de la mardotte', 49, 'Mouroux', 77120),
(12, 'rue de je sais pas', 85, 'Pommeuse', 77515);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `id_p` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_debut` date NOT NULL,
  `nb_jour` int(255) NOT NULL,
  `nb_place` int(255) NOT NULL,
  PRIMARY KEY (`id_f`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_f`, `id_p`, `titre`, `contenu`, `date_debut`, `nb_jour`, `nb_place`) VALUES
(1, 1, 'Tennis', 'formation tennnis Eodem tempore etiam Hymetii praeclarae indolis viri negotium est actitatum, cuius hunc novimus esse textum. cum Africam pro consule regeret Carthaginiensibus victus inopia iam lassatis, ex horreis Romano populo destinatis frumentum dedit, pauloque postea cum provenisset segetum copia, integre sine ulla restituit mora.', '2017-12-13', 3, 0),
(2, 1, 'FootBall', 'Eodem tempore etiam Hymetii praeclarae indolis viri negotium est actitatum, cuius hunc novimus esse textum. cum Africam pro consule regeret Carthaginiensibus victus inopia iam lassatis, ex horreis Romano populo destinatis frumentum dedit, pauloque postea cum provenisset segetum copia, integre sine ulla restituit mora.', '2018-01-17', 2, 0),
(4, 1, 'Foot', 'grjfmo huvdsg vuspdg vufsg vuildgvuisdguksdgl cjxk  vdsguvg sduivo gduiv guil vkjhv dgvdsogv iusgv ukmvg usodmg vudmwgxv udmo gu', '2018-02-01', 3, 0),
(5, 1, 'Foot', 'bvhsjdj gcsd vgdskl vsdl', '2018-01-31', 5, 2),
(6, 1, 'TESTTITRE', 'bdnbfg d hrtd h f', '2018-02-15', 15, 2),
(8, 12, 'TESTTITRE2', 'njsdfvg sdk vgdusv gusmvg sdom&lt;', '2018-02-16', 25, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `id_a` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `mail` varchar(40) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id_p`, `id_a`, `nom`, `tel`, `mail`) VALUES
(1, 1, 'Sam eco', '0600000000', 'sameco@gmail.com'),
(2, 2, 'TESTNom', 'TESTTEL', 'TESTMAIL@GMAIL.COM'),
(12, 12, 'Logitech', '0649646891', 'logitech@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL,
  `credits` int(25) NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`id_s`, `nom`, `prenom`, `email`, `mdp`, `lvl`, `credits`) VALUES
(1, 'Goncalves', 'Paul', 'paulgoncalves.mr@gmail.com', 'bc76e0b50f70dfbdfc7ae7d674a2bde607b442ef', 3, 100),
(2, 'Marchand', 'Jean-Luc', 'jean-luc@gmail.com', 'bc76e0b50f70dfbdfc7ae7d674a2bde607b442ef', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

DROP TABLE IF EXISTS `type_formation`;
CREATE TABLE IF NOT EXISTS `type_formation` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `id_s` int(25) NOT NULL,
  `id_f` int(25) NOT NULL,
  PRIMARY KEY (`id_t`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_formation`
--

INSERT INTO `type_formation` (`id_t`, `libelle`, `id_s`, `id_f`) VALUES
(18, 'En attente', 2, 4),
(17, 'En attente', 2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
