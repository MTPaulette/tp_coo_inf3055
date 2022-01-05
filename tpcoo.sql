-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 jan. 2022 à 06:28
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpcoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `livre` tinyint(1) NOT NULL,
  `idInternaute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commandeproduit`
--

CREATE TABLE `commandeproduit` (
  `id` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `dateConnexion` date NOT NULL,
  `heureConnexion` time NOT NULL,
  `dadeDeconnexion` date NOT NULL,
  `heureDeconnexion` time NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `idDirecteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `dateConnexion` date NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`id`, `nom`, `prenom`, `telephone`, `adresse`, `dateConnexion`, `login`, `motDePasse`) VALUES
(1, '', 'Andamou', 690264775, 'yaounde', '2022-01-04', 'Adams', 'Alima'),
(2, '', 'Andamou', 690264775, 'yaounde', '2022-01-04', 'Adams', 'Alim'),
(3, '', 'Andamou', 690264775, 'yaounde', '2022-01-04', 'Adam', 'Alim'),
(4, '', 'Andamou', 690264775, 'yaounde', '2022-01-04', 'Adam', '*DD2FE30CF3CC2F288DC6408822456CE82183F3A2');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `dateCration` date NOT NULL,
  `ouvert` tinyint(1) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `idDirecteur` int(11) NOT NULL,
  `idSuperAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `idEmploye` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `tel` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

CREATE TABLE `vendre` (
  `id` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  `dateVente` varchar(100) NOT NULL,
  `heure` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idInternaute` (`idInternaute`);

--
-- Index pour la table `commandeproduit`
--
ALTER TABLE `commandeproduit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDirecteur` (`idDirecteur`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDirecteur` (`idDirecteur`),
  ADD KEY `idSuperAdmin` (`idSuperAdmin`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmploye` (`idEmploye`);

--
-- Index pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idEmploye` (`idEmploye`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandeproduit`
--
ALTER TABLE `commandeproduit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `directeur`
--
ALTER TABLE `directeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `internaute`
--
ALTER TABLE `internaute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vendre`
--
ALTER TABLE `vendre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idInternaute`) REFERENCES `internaute` (`id`);

--
-- Contraintes pour la table `commandeproduit`
--
ALTER TABLE `commandeproduit`
  ADD CONSTRAINT `commandeproduit_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commandeproduit_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`idDirecteur`) REFERENCES `directeur` (`id`);

--
-- Contraintes pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD CONSTRAINT `pharmacie_ibfk_1` FOREIGN KEY (`idDirecteur`) REFERENCES `directeur` (`id`),
  ADD CONSTRAINT `pharmacie_ibfk_2` FOREIGN KEY (`idSuperAdmin`) REFERENCES `superadmin` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`id`);

--
-- Contraintes pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD CONSTRAINT `vendre_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `vendre_ibfk_2` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
