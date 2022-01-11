-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 jan. 2022 à 11:00
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
-- Base de données : `tppharmacies`
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

INSERT INTO `directeur` (`nom`, `prenom`, `telephone`, `adresse`, `createdAt`, `deleteAt`, `modifiedAt`, `heure`, `login`, `motDePasse`, `loginSuperAdmin`) VALUES
('Nsangou', 'Adamou', 36868, 'yaounde', '2022-01-10', NULL, NULL, '00:00:00', 'Adam', 'Alima', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:10:04', 'Adama', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('Nsangou', 'Adamou', 690264775, 'yaounde', '2022-01-10', NULL, NULL, '10:12:36', 'Adamou', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '10:13:05', 'Adams', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:19:17', 'idr', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:18:50', 'idri', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:18:17', 'idris', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:15:09', 'idriss', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams'),
('nsagou', 'Adamou', 690264775, 'Yaounde', '2022-01-10', NULL, NULL, '11:11:04', 'Pango', '*A55088846B3EFBDA73328E9AD3229CFF2FA2E646', 'Adams');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` int(9) NOT NULL,
  `adresse` varchar(100) NOT NULL,
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

INSERT INTO `employe` (`nom`, `prenom`, `telephone`, `adresse`, `etat`, `createAt`, `modifiedAt`, `dateConnexion`, `heureConnexion`, `dateDeconnexion`, `heureDeconnexion`, `login`, `motDePasse`, `loginDirecteur`) VALUES
('Nsangou', 'Admou', 690264775, 'yaounde', 'poste', '2022-01-10', NULL, '2022-01-11', '08:26:06', '2022-01-11', '08:26:07', 'pango', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'idr'),
('Nsangou', 'Admou', 690264775, 'yaounde', 'supprime', '2022-01-10', NULL, NULL, NULL, NULL, NULL, 'pangolin', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'Pango');

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

-- --------------------------------------------------------

--
-- Structure de la table `nouvellevente`
--

CREATE TABLE `nouvellevente` (
  `id` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `dateVente` varchar(100) NOT NULL,
  `heure` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nomPharmacie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nouvellevente`
--

INSERT INTO `nouvellevente` (`id`, `nomProduit`, `loginEmploye`, `dateVente`, `heure`, `quantite`, `prix`, `nomPharmacie`) VALUES
(1, 'parat', 'pango', 'Tuesday January 11, 2022', '09:58:19', 4, 400, ''),
(2, 'parat', 'pango', 'Tuesday January 11, 2022', '10:37:05', 8, 800, 'maPharmacie2'),
(3, 'parat', 'pango', 'Tuesday January 11, 2022', '10:37:32', 8, 800, 'maPharmacie2'),
(4, 'metro', 'pango', 'Tuesday January 11, 2022', '10:52:52', 5, 500, 'maPharmacie2');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE `pharmacie` (
  `nom` varchar(100) NOT NULL,
  `localisation` varchar(100) NOT NULL,
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

INSERT INTO `pharmacie` (`nom`, `localisation`, `createdAt`, `deleteAt`, `modifiedAt`, `ouvert`, `etat`, `loginDirecteur`, `loginSuperAdmin`) VALUES
('maPharmacie', 'simeyong', '2022-01-10', NULL, NULL, 1, 'disponible', 'Adams', 'Adams'),
('maPharmacie2', 'simeyong', '2022-01-10', NULL, NULL, 1, 'suspendue', 'idr', 'Adams');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `nom` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `ancienne_quantite` int(11) DEFAULT NULL,
  `quantite_ajouter` int(11) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `createdAt` date NOT NULL,
  `heure` time NOT NULL,
  `modifiedAt` date DEFAULT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `nomPharmacie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`nom`, `description`, `prix`, `quantite`, `ancienne_quantite`, `quantite_ajouter`, `type`, `photo`, `createdAt`, `heure`, `modifiedAt`, `loginEmploye`, `nomPharmacie`) VALUES
('diclo', 'soigne les maux de tête', 100, 10, 0, 10, 'medoc', NULL, '2022-01-11', '05:55:00', NULL, 'pango', 'maPharmacie2'),
('metro', 'soigne les maux de tête', 100, 25, 20, 10, 'medoc', NULL, '2022-01-11', '08:12:55', '2022-01-11', 'pango', 'maPharmacie2'),
('parat', 'soigne les maux de tête', 100, -44, 30, 10, 'medoc', NULL, '2022-01-10', '23:39:15', '2022-01-11', 'pango', 'maPharmacie2');

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
('Nsangou', 'Adamou', 690264774, 'yaounde', NULL, '2022-01-10', 'Adams', 'Alima');

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

CREATE TABLE `vendre` (
  `id` int(11) NOT NULL,
  `nomProduit` varchar(100) NOT NULL,
  `loginEmploye` varchar(100) NOT NULL,
  `dateVente` varchar(100) NOT NULL,
  `heure` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nomPharmacie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vendre`
--

INSERT INTO `vendre` (`id`, `nomProduit`, `loginEmploye`, `dateVente`, `heure`, `quantite`, `prix`, `nomPharmacie`) VALUES
(1, 'parat', 'pango', 'Tuesday January 11, 2022', '09:46:35', 4, 400, ''),
(2, 'parat', 'pango', 'Tuesday January 11, 2022', '09:52:39', 4, 400, ''),
(3, 'parat', 'pango', 'Tuesday January 11, 2022', '09:52:53', 4, 400, ''),
(4, 'parat', 'pango', 'Tuesday January 11, 2022', '09:53:22', 4, 400, ''),
(5, 'parat', 'pango', 'Tuesday January 11, 2022', '09:58:19', 4, 400, ''),
(6, 'parat', 'pango', 'Tuesday January 11, 2022', '10:31:47', 8, 800, 'maPharmacie2'),
(7, 'parat', 'pango', 'Tuesday January 11, 2022', '10:33:03', 8, 800, 'maPharmacie2'),
(8, 'parat', 'pango', 'Tuesday January 11, 2022', '10:34:33', 8, 800, 'maPharmacie2'),
(9, 'parat', 'pango', 'Tuesday January 11, 2022', '10:37:05', 8, 800, 'maPharmacie2'),
(10, 'parat', 'pango', 'Tuesday January 11, 2022', '10:37:32', 8, 800, 'maPharmacie2'),
(11, 'metro', 'pango', 'Tuesday January 11, 2022', '10:52:52', 5, 500, 'maPharmacie2');

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
  ADD PRIMARY KEY (`nom`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `commandeproduit_ibfk_2` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nom`);

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
-- Contraintes pour la table `nouvellevente`
--
ALTER TABLE `nouvellevente`
  ADD CONSTRAINT `nouvellevente_ibfk_1` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nom`),
  ADD CONSTRAINT `nouvellevente_ibfk_2` FOREIGN KEY (`loginEmploye`) REFERENCES `employe` (`login`);

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
  ADD CONSTRAINT `vendre_ibfk_1` FOREIGN KEY (`nomProduit`) REFERENCES `produit` (`nom`),
  ADD CONSTRAINT `vendre_ibfk_2` FOREIGN KEY (`loginEmploye`) REFERENCES `employe` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
