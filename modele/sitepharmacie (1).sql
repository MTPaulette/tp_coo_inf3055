-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 jan. 2022 à 15:06
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
-- Base de données : `sitepharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `livre` tinyint(1) NOT NULL,
  `createdAt` date NOT NULL,
  `deleteAt` date DEFAULT NULL,
  `modifiedAt` date DEFAULT NULL,
  `loginInternaute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commandeproduit`
--

CREATE TABLE `commandeproduit` (
  `id` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `directeur`
--

CREATE TABLE `directeur` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `createdAt` date NOT NULL,
  `deleteAt` date DEFAULT NULL,
  `modifiedAt` date DEFAULT NULL,
  `heure` time NOT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `loginSuperAdmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `directeur`
--

INSERT INTO `directeur` (`nom`, `prenom`, `telephone`, `adresse`, `photo`, `createdAt`, `deleteAt`, `modifiedAt`, `heure`, `login`, `motDePasse`, `loginSuperAdmin`) VALUES
('Mohammed', 'Kabir', 690264775, 'douala', NULL, '2022-01-14', NULL, NULL, '10:15:18', 'kabir', '*A19F62D93F17BC24B4F3A51AA2772F9BE880D8B5', 'Adams'),
('Nsangou', 'Adamou', 690264775, 'yaounde', NULL, '2022-01-14', '2022-01-14', NULL, '10:14:25', 'pango', '*5A6D6C527AC391D1AF066310612C53B6C461DFDE', 'Adams');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `etat` varchar(100) NOT NULL,
  `createAt` date NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `dateConnexion` date DEFAULT NULL,
  `heureConnexion` time DEFAULT NULL,
  `dateDeconnexion` date DEFAULT NULL,
  `heureDeconnexion` time DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL,
  `loginDirecteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`nom`, `prenom`, `telephone`, `adresse`, `photo`, `etat`, `createAt`, `modifiedAt`, `dateConnexion`, `heureConnexion`, `dateDeconnexion`, `heureDeconnexion`, `login`, `motDePasse`, `loginDirecteur`) VALUES
('Ndang', 'Essi', 690909090, 'yaounde', NULL, 'poste', '2022-01-14', '2022-01-14', '2022-01-14', '14:00:10', NULL, NULL, 'essi', '*2BDAEEFA806E65977F1BD8C29BF2BB5174CAA7E4', 'pango'),
('Ndang', 'Essi2', 690909090, 'yaounde', NULL, 'poste', '2022-01-14', NULL, '2022-01-14', '14:01:14', '2022-01-14', '14:02:43', 'essi2', '*062368DE41744899849DAF185DBB296ADC87F497', 'kabir'),
('Paulette', 'Mayogue', 690909090, 'yaounde', NULL, 'poste', '2022-01-14', NULL, NULL, NULL, NULL, NULL, 'yeki', '*1DD144B39232FBE05DE3FA432C3504AEFC6FE9DF', 'pango'),
('Paulette', 'Mayogue', 690909090, 'yaounde', NULL, 'poste', '2022-01-14', NULL, NULL, NULL, NULL, NULL, 'yeki2', '*1DD144B39232FBE05DE3FA432C3504AEFC6FE9DF', 'kabir');

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `createdAt` date NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `dateConnexion` date DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`nom`, `prenom`, `telephone`, `adresse`, `createdAt`, `modifiedAt`, `dateConnexion`, `login`, `motDePasse`) VALUES
('', 'Chris', 6909090, 'yaounde', '2022-01-14', NULL, '2022-01-14', 'mabelle', 'mabelle2');

-- --------------------------------------------------------

--
-- Structure de la table `nouvellevente`
--

CREATE TABLE `nouvellevente` (
  `id` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `dateVente` date NOT NULL,
  `heure` time NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nomPharmacie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `nom` varchar(100) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `createdAt` date NOT NULL,
  `deleteAt` date DEFAULT NULL,
  `modifiedAt` date DEFAULT NULL,
  `ouvert` tinyint(1) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `loginDirecteur` varchar(100) NOT NULL,
  `loginSuperAdmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`nom`, `localisation`, `photo`, `createdAt`, `deleteAt`, `modifiedAt`, `ouvert`, `etat`, `loginDirecteur`, `loginSuperAdmin`) VALUES
('maPharmacie', 'simeyong', NULL, '2022-01-14', '2022-01-14', '2022-01-14', 1, 'disponible', 'pango', 'Adams'),
('maPharmacie2', 'simeyong2', NULL, '2022-01-14', NULL, NULL, 1, 'disponible', 'kabir', 'Adams');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `nomp` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `ancienne_quantite` int(11) DEFAULT NULL,
  `quantite_ajouter` int(11) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `createdAt` date NOT NULL,
  `heure` time NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `nomPharmacie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`nomp`, `description`, `prix`, `quantite`, `ancienne_quantite`, `quantite_ajouter`, `type`, `photo`, `createdAt`, `heure`, `modifiedAt`, `loginEmploye`, `nomPharmacie`) VALUES
('diclo', 'soigne', 100, 58, 40, 20, 'medoc', NULL, '2022-01-14', '11:47:32', '2022-01-14', 'yeki', 'maPharmacie'),
('diclo', 'soigne', 100, 60, 40, 20, 'medoc', NULL, '2022-01-14', '11:47:32', '2022-01-14', 'yeki2', 'maPharmacie2'),
('metro', 'soigne', 100, 38, 0, 0, 'medoc', NULL, '2022-01-14', '11:47:32', '2022-01-14', 'essi', 'maPharmacie'),
('metro', 'soigne', 100, 0, 40, 20, 'medoc', NULL, '2022-01-14', '11:47:32', '2022-01-14', 'essi2', 'maPharmacie2'),
('parat', 'soigne', 100, 20, 0, 20, 'medoc', NULL, '2022-01-14', '13:35:22', '2022-01-14', 'yeki', 'maPharmacie');

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

CREATE TABLE `superadmin` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `date_connexion` date DEFAULT NULL,
  `date_deconnexion` date DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `motDePasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `superadmin`
--

INSERT INTO `superadmin` (`nom`, `prenom`, `telephone`, `adresse`, `date_connexion`, `date_deconnexion`, `login`, `motDePasse`) VALUES
('Nsangou', 'Adamou', 690264774, 'yaounde', '2022-01-14', '2022-01-14', 'Adams', 'alima');

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

CREATE TABLE `vendre` (
  `id` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `dateVente` date NOT NULL,
  `heure` time NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nomPharmacie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vendre`
--

INSERT INTO `vendre` (`id`, `nomProduit`, `loginEmploye`, `dateVente`, `heure`, `quantite`, `prix`, `nomPharmacie`) VALUES
(1, 'diclo', 'essi', '2022-01-14', '13:31:24', 2, 200, 'maPharmacie'),
(2, 'metro', 'essi', '2022-01-14', '13:33:21', 2, 200, 'maPharmacie'),
(3, 'metro', 'essi2', '2022-01-14', '13:34:34', 2, 200, 'maPharmacie2'),
(4, 'metro', 'essi2', '2022-01-14', '13:44:22', 3, 300, 'maPharmacie2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginInternaute` (`loginInternaute`);

--
-- Index pour la table `commandeproduit`
--
ALTER TABLE `commandeproduit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `nomProduit` (`nomProduit`);

--
-- Index pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD PRIMARY KEY (`login`),
  ADD KEY `loginSuperAdmin` (`loginSuperAdmin`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`login`),
  ADD KEY `loginDirecteur` (`loginDirecteur`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `nouvellevente`
--
ALTER TABLE `nouvellevente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomProduit` (`nomProduit`),
  ADD KEY `nomPharmacie` (`nomPharmacie`),
  ADD KEY `loginEmploye` (`loginEmploye`);

--
-- Index pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD PRIMARY KEY (`nom`),
  ADD KEY `loginDirecteur` (`loginDirecteur`),
  ADD KEY `loginSuperAdmin` (`loginSuperAdmin`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`nomp`,`nomPharmacie`),
  ADD KEY `nomPharmacie` (`nomPharmacie`),
  ADD KEY `loginEmploye` (`loginEmploye`);

--
-- Index pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomProduit` (`nomProduit`),
  ADD KEY `nomPharmacie` (`nomPharmacie`),
  ADD KEY `loginEmploye` (`loginEmploye`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `nouvellevente`
--
ALTER TABLE `nouvellevente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vendre`
--
ALTER TABLE `vendre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`loginInternaute`) REFERENCES `internaute` (`login`);

--
-- Contraintes pour la table `commandeproduit`
--
ALTER TABLE `commandeproduit`
  ADD CONSTRAINT `commandeproduit_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `commandeproduit_ibfk_2` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nomp`);

--
-- Contraintes pour la table `directeur`
--
ALTER TABLE `directeur`
  ADD CONSTRAINT `directeur_ibfk_1` FOREIGN KEY (`loginSuperAdmin`) REFERENCES `superadmin` (`login`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`loginDirecteur`) REFERENCES `directeur` (`login`);

--
-- Contraintes pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD CONSTRAINT `pharmacie_ibfk_1` FOREIGN KEY (`loginDirecteur`) REFERENCES `directeur` (`login`),
  ADD CONSTRAINT `pharmacie_ibfk_2` FOREIGN KEY (`loginSuperAdmin`) REFERENCES `superadmin` (`login`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`nomPharmacie`) REFERENCES `pharmacie` (`nom`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`loginEmploye`) REFERENCES `employe` (`login`);

--
-- Contraintes pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD CONSTRAINT `vendre_ibfk_1` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nomp`),
  ADD CONSTRAINT `vendre_ibfk_2` FOREIGN KEY (`nomPharmacie`) REFERENCES `produit` (`nomPharmacie`),
  ADD CONSTRAINT `vendre_ibfk_3` FOREIGN KEY (`loginEmploye`) REFERENCES `employe` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
