-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 07 mai 2022 à 13:13
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_scolaire_l2`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `filiere` varchar(30) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `niveau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `date_cours` varchar(30) NOT NULL,
  `heure_debut` varchar(30) NOT NULL,
  `heure_fin` varchar(30) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `professeur_module`
--

CREATE TABLE `professeur_module` (
  `module_id` int(11) NOT NULL,
  `professeur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `quartier` varchar(50) DEFAULT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe_id` (`classe_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `professeur_id` (`professeur_id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `professeur_module`
--
ALTER TABLE `professeur_module`
  ADD KEY `module_id` (`module_id`),
  ADD KEY `professeur_id` (`professeur_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`classe_id`) REFERENCES `classe` (`id`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`professeur_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `professeur_module`
--
ALTER TABLE `professeur_module`
  ADD CONSTRAINT `professeur_module_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `professeur_module_ibfk_2` FOREIGN KEY (`professeur_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
