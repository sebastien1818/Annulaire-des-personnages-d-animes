-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 mars 2023 à 05:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `manga`
--

-- --------------------------------------------------------

--
-- Structure de la table `fairy_tail`
--

CREATE TABLE `fairy_tail` (
  `id_fairy_tail` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `race` varchar(60) DEFAULT NULL,
  `genre` varchar(60) DEFAULT NULL,
  `affiliation` varchar(60) DEFAULT NULL,
  `image` varchar(60) DEFAULT NULL,
  `equipe` varchar(60) DEFAULT NULL,
  `famille` text DEFAULT NULL,
  `magie` text DEFAULT NULL,
  `equipement` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fairy_tail`
--

INSERT INTO `fairy_tail` (`id_fairy_tail`, `nom`, `race`, `genre`, `affiliation`, `image`, `equipe`, `famille`, `magie`, `equipement`) VALUES
(1, 'Natsu Dragneel', 'demon', 'homme', 'fairy tail', 'Natsu.JPG', 'équipe de Natsu', 'Pere, Mere, Igneel, Zeref Dragneel, August, Ignia', 'Magie du Chasseur de Dragon de Feu, Unison Raid, Transformation', 'Écharpe d\'Igneel'),
(2, 'Lucy Heartfilia', 'humain', 'femme', 'fairy tail', 'Lucy.JPG', 'équipe de Natsu', 'Anna Heartfilia, Jude Heartfilia, Layla Heartfilia, Gonzales', 'Magie des Constellations, Urano Metria, Unison Raid,Robe Stellaire', 'Fleuve Étoilé, 10 clefs d\'or et 5 clefs d\'argent'),
(4, 'Happy', 'exceed', 'homme', 'fairy tail', 'Happy.JPG', 'équipe de Natsu', 'Lucky, Marl', 'Aera', 'Sac à dos vert'),
(5, 'Grey Fullbuster', 'humain', 'homme', 'fairy tail', 'Grey.JPG', 'équipe de Natsu', 'Silver Fullbuster, Mika, Ur', 'Magie de Glace Constructive, Magie du Chasseur de Démon de Glace, Unison Raid', 'Mini-appareils de transmission lacrima'),
(6, 'Erza Scarlett', 'humain', 'femmme', 'fairy tail', 'Erza.JPG', 'équipe de Natsu', 'Irene Belserion, Rung', 'Le Chevalier, Épées Magiques, Télékinésie, Magie du Corps Céleste', 'plus de 100 types d\'armures différent et plus de 200 types d\'armes différents'),
(7, 'Wendy Marvel', 'humain', 'femme', 'fairy tail', 'Wendy.JPG', 'équipe de Natsu', 'Grandeeney', 'Magie du Chasseur de Dragon Céleste, Unison Raid, Enchantement', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fairy_tail`
--
ALTER TABLE `fairy_tail`
  ADD PRIMARY KEY (`id_fairy_tail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fairy_tail`
--
ALTER TABLE `fairy_tail`
  MODIFY `id_fairy_tail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
