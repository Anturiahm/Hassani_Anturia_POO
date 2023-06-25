-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 25 juin 2023 à 21:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parc_moto`
--

-- --------------------------------------------------------

--
-- Structure de la table `moto`
--

DROP TABLE IF EXISTS `moto`;
CREATE TABLE IF NOT EXISTS `moto` (
  `moto_id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`moto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `moto`
--

INSERT INTO `moto` (`moto_id`, `brand`, `model`, `type`, `image`) VALUES
(1, 'Yamaha', 'Le modèle ? Euh... ', 'Enduro', '6498a92e857a3jpeg'),
(2, 'Suzuki', 'Désolée je ne sais pas ', 'Custom', '6498a941bd5fdjpeg'),
(3, 'Kawasaki', 'Je m\'y connais pas en moto sorry', 'Sportive', '6498a952f0380jpeg'),
(4, 'Yamaha', 'Euuuuuuh ...... ', 'Roadster', '6498a960b47b8jpeg'),
(5, 'Harley Davidson', 'Un beau modèle', 'Sportive', '6498a982328c8jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`utilisateur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `username`, `name`, `firstname`, `password`) VALUES
(1, 'admin', 'AdminName', 'AdminFirstname', '$2y$10$HwlBSeSaac.cTiilc5YkIeJLHZDkH8oupaPBKxhvgPmQZlfhL8tiW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
