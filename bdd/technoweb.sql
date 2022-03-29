-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 29 mars 2022 à 20:33
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `technoweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `taille` int(11) DEFAULT NULL,
  `chemin` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id`, `name`, `taille`, `chemin`, `extension`) VALUES
(984, 'slide9-kaki-fruit-main-12365069', 35645, 'docs/dir1/dir1.1/dir1.1.1/', 'jpg'),
(985, 'taro-1686669_1920-1024x683', 60943, 'docs/dir1/dir1.1/dir1.1.1/', 'jpg'),
(986, 'tree-3330097_1920-1024x768', 80206, 'docs/dir1/dir1.1/dir1.1.1/', 'jpg'),
(987, 'mango-1239347_1920-1024x683', 67675, 'docs/dir1/dir1.1/', 'jpg'),
(988, 'papaya-771145_1920-1024x683', 47699, 'docs/dir1/dir1.1/', 'jpg'),
(989, 'passion-fruit-3519303_1920-1024x683', 52290, 'docs/dir1/dir1.1/', 'jpg'),
(990, 'food-3062139_1920-1024x683', 96715, 'docs/dir1/', 'jpg'),
(991, 'fruit-2100688_1920-1024x768', 92248, 'docs/dir1/', 'jpg'),
(992, 'guava-2880259_1920-1024x683', 82247, 'docs/dir1/', 'jpg'),
(993, 'ARS_breadfruit49', 39194, 'docs/dir2/', 'jpg'),
(994, 'iStock-1278315370-758x426', 82616, 'docs/dir2/', 'jpg'),
(995, 'vegetable-3559112_1920-1024x577', 109710, 'docs/dir2/', 'png'),
(996, 'yams-1557440_1920-1024x687', 76691, 'docs/dir2/', 'jpg'),
(997, 'slide4-mineolas%2520citrus%2520tangelo-ugli-lam2-019-main-12', 44862, 'docs/dir3/dir3.1/dir3.1.1/', 'jpg'),
(998, 'slide5-durian-durio-zibethinus-Lam2-03-main-12365052', 70159, 'docs/dir3/dir3.1/dir3.1.1/', 'png'),
(999, 'slide6-Physalis-peruviana-LAM1-main-12365074', 58094, 'docs/dir3/dir3.1/dir3.1.1/', 'jpg'),
(1000, 'slide8-papaye-carica-retouche-main-12365051', 69253, 'docs/dir3/dir3.1/dir3.1.1/', 'jpg'),
(1001, 'pomegranate-3383814_1920-1024x680', 108124, 'docs/dir3/dir3.1/', 'png'),
(1002, 'slide2-jujube-zizyphus-jujuba-retouche-main-12365055', 46127, 'docs/dir3/dir3.1/', 'jpg'),
(1003, 'slide3-fruit-de-la-passion-passiflora-edulis-main-12365075', 47684, 'docs/dir3/dir3.1/', 'jpeg'),
(1004, 'iStock-1279674489-758x426', 45736, 'docs/dir3/', 'jpg'),
(1005, 'iStock-1283279353-758x426', 82127, 'docs/dir3/', 'png'),
(1006, 'kiwano-2128077_1920-1024x576', 102405, 'docs/dir3/', 'jpg'),
(1007, 'lychee-419611_1920-1024x681', 58218, 'docs/dir3/', 'png'),
(1008, 'iStock-1202274909-758x379', 77664, 'docs/', 'png'),
(1009, 'iStock-1277110221-758x379', 93327, 'docs/', 'png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `admin` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `email`, `mdp`, `admin`) VALUES
(1, 'a@a.com', '$2y$10$vO93LdWBM3QnVBG/4hJGhOE9rOCqyTgTQjUwrxm4geI0gwtGoUVGi', b'0'),
(2, 'admin@admin.com', '$2y$10$8ji2T9rIgyoU.7Pa1UKBrupC5sjJEZGdWzz.xKMaXWRI4B6WoMOse', b'0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
