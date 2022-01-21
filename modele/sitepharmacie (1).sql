-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 jan. 2022 à 16:55
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
('Tchinda', 'Cyrile', 694479785, 'bafoussam_marche_b', NULL, '2022-01-20', NULL, NULL, '14:52:22', 'cyrile', '*757213C8017BFA488DE84764E9692136E5405062', 'Adams'),
('Ndang', 'Essi', 690943737, 'yaounde_emana', NULL, '2022-01-20', NULL, NULL, '14:35:06', 'essi', '*2BDAEEFA806E65977F1BD8C29BF2BB5174CAA7E4', 'Adams'),
('Mayogue', 'Paulette', 690095004, 'yaounde_essos', NULL, '2022-01-20', NULL, NULL, '14:37:52', 'paulette', '*B5F633DAB76AC9D0C66CE2F9E4C4E5AC4D58B334', 'Adams'),
('Ouabo', 'Samuel', 656972082, 'yaounde_emombo', NULL, '2022-01-20', NULL, NULL, '14:40:07', 'samuel', '*3BFD69CF28F2AAECB462B777C0F223C5D79D3DA9', 'Adams');

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
  `createdAt` date NOT NULL,
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

INSERT INTO `employe` (`nom`, `prenom`, `telephone`, `adresse`, `photo`, `etat`, `createdAt`, `modifiedAt`, `dateConnexion`, `heureConnexion`, `dateDeconnexion`, `heureDeconnexion`, `login`, `motDePasse`, `loginDirecteur`) VALUES
('Nsangou', 'Adamou', 690264775, 'yaounde_simeyong', 'essi_Nsangou.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '15:37:39', NULL, NULL, 'adams', '*459E0647F37E688AB0ADC9FD6A9D297F122963C5', 'essi'),
('Nsangou', 'Adamou', 690264775, 'yaounde_simeyong', 'paulette_Nsangou.jpg', 'poste', '2022-01-20', NULL, NULL, NULL, '2022-01-20', '16:39:22', 'adams2', '*CF236EEA3EF59762808CAE584363C0122A411B72', 'paulette'),
('Dorine', 'Dorine', 690909090, 'yaounde_essos', 'paulette_Dorine.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '16:28:08', '2022-01-20', '16:34:52', 'dorine', '*EFDDCAA4614804FAFAF873D85329E6C4B36BA8B1', 'paulette'),
('Ndang', 'Essi', 690943737, 'yaounde_emana', 'essi_Ndang.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '16:11:00', '2022-01-20', '16:25:51', 'essi', '*2BDAEEFA806E65977F1BD8C29BF2BB5174CAA7E4', 'essi'),
('Jouer', 'Jouer', 690943737, 'yaounde_simeyong', 'samuel_Jouer.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '16:39:53', NULL, NULL, 'jouer', '*C5332423085F82E2D14852B7E682AF8692B71F26', 'samuel'),
('Lion', 'Lion', 690943737, 'yaounde_simeyong', 'samuel_Lion.jpg', 'poste', '2022-01-20', NULL, NULL, NULL, NULL, NULL, 'lion', '*BE762BE2C6572CE157B27D65F31103F943D4C28C', 'samuel'),
('Sakgouo ', 'Luce', 690264775, 'yaounde_kolbissong', 'essi_Sakgouo .png', 'poste', '2022-01-20', '2022-01-20', NULL, NULL, NULL, NULL, 'luce', '*B6321593A4B588B67F3EA4519637A6D8DD8B9C77', 'essi'),
('Maraf', 'Maraf', 690943737, 'yaounde_simeyong', 'samuel_Maraf.jpg', 'poste', '2022-01-20', NULL, NULL, NULL, NULL, NULL, 'maraf', '*D9C9CECC3A7A04432DEBA1A1326597CAE2D1388C', 'samuel'),
('Mayogue', 'Paulette', 678513874, 'yaounde_essos', 'essi_Mayogue.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '16:27:27', '2022-01-20', '16:28:01', 'paulette', '*B5F633DAB76AC9D0C66CE2F9E4C4E5AC4D58B334', 'essi'),
('Ouabo', 'Samuel', 656972082, 'yaounde_emombo', 'essi_Ouabo.jpg', 'poste', '2022-01-20', NULL, '2022-01-20', '16:39:31', '2022-01-20', '16:39:42', 'samuel', '*3BFD69CF28F2AAECB462B777C0F223C5D79D3DA9', 'essi'),
('Ouabo', 'Samuel', 656972082, 'yaounde_emombo', 'paulette_Ouabo.jpg', 'poste', '2022-01-20', NULL, NULL, NULL, NULL, NULL, 'samuel2', '*D73E24752C5D1CECA6F20EE84ACD3F78C893A0EC', 'paulette'),
('Verra', 'Verra', 690943737, 'yaounde_medong', 'samuel_Verra.jpg', 'poste', '2022-01-20', NULL, NULL, NULL, NULL, NULL, 'verra', '*BED86B612826F6471E35207289B6D000DF8DB993', 'samuel');

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
  `dateVente` date NOT NULL,
  `heure` time NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nomPharmacie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nouvellevente`
--

INSERT INTO `nouvellevente` (`id`, `nomProduit`, `loginEmploye`, `dateVente`, `heure`, `quantite`, `prix`, `nomPharmacie`) VALUES
(11, 'Meda_betadine', 'essi', '2022-01-20', '16:16:00', 2, 5000, 'Pharmacie_du_soleil'),
(12, 'passedyl', 'essi', '2022-01-20', '16:17:15', 4, 13000, 'Pharmacie_du_soleil'),
(13, 'seringue', 'essi', '2022-01-20', '16:20:08', 6, 600, 'Pharmacie_du_soleil');

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
('pharmacie_des_anges', 'bafoussam_marche_a', 'Adams_pharmacie_des_anges.jpg', '2022-01-20', NULL, NULL, 1, 'disponible', 'cyrile', 'Adams'),
('pharmacie_du_cigne', 'yaounde_vog_ada', 'Adams_pharmacie_du_cigne.jpg', '2022-01-20', NULL, NULL, 0, 'disponible', 'paulette', 'Adams'),
('Pharmacie_du_soleil', 'yaounde_essos', 'Adams_Pharmacie_du_soleil.jpg', '2022-01-20', NULL, NULL, 0, 'disponible', 'essi', 'Adams'),
('pharmacie_is_is', 'yaounde_emombo', 'Adams_pharmacie_is_is.jpg', '2022-01-20', NULL, NULL, 1, 'disponible', 'samuel', 'Adams');

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
('amoxicilin', 'soigne', 4000, 6000, 0, 6000, 'medicament', 'jouer_amoxicilin.jpg', '2022-01-20', '16:52:40', '2022-01-20', 'jouer', 'pharmacie_is_is'),
('Biofar', 'soigne', 4000, 150, 0, 150, 'medicament', 'dorine_Biofar.jpg', '2022-01-20', '16:31:18', '2022-01-20', 'dorine', 'pharmacie_du_cigne'),
('Ciprofloxacine', 'soigne', 4500, 890, 0, 890, 'medicament', 'adams2_Ciprofloxacine.png', '2022-01-20', '16:35:56', '2022-01-20', 'adams2', 'pharmacie_du_cigne'),
('Ciprofloxacine', 'soigne', 1500, 150, 0, 150, 'medicament', 'jouer_Ciprofloxacine.png', '2022-01-20', '16:51:43', '2022-01-20', 'jouer', 'pharmacie_is_is'),
('feuilledemoringa', 'soigne', 1500, 9000, 0, 9000, 'medicament', 'adams2_feuilledemoringa.jpg', '2022-01-20', '16:37:30', '2022-01-20', 'adams2', 'pharmacie_du_cigne'),
('flagile', 'soigne', 2000, 150, 0, 150, 'medicament', 'dorine_flagile.png', '2022-01-20', '16:32:07', '2022-01-20', 'dorine', 'pharmacie_du_cigne'),
('flagile', 'pour les maux de ventre', 500, 150, 0, 150, 'medicament', 'adams_flagile.png', '2022-01-20', '15:56:43', '2022-01-20', 'adams', 'Pharmacie_du_soleil'),
('helicidine', 'soigne', 690, 900, 0, 900, 'medicament', 'adams2_helicidine.jpg', '2022-01-20', '16:36:41', '2022-01-20', 'adams2', 'pharmacie_du_cigne'),
('iso_Betadine', 'Solution pour application cutanée pour la prévention et le traitement des infection de l', 1500, 150, 0, 150, 'medicament', 'adams_iso_Betadine.jpg', '2022-01-20', '15:48:47', '2022-01-20', 'adams', 'Pharmacie_du_soleil'),
('Meda_betadine', 'pour les blessures', 2500, 148, 0, 150, 'medicament', 'essi_Meda_betadine.jpg', '2022-01-20', '16:13:38', '2022-01-20', 'essi', 'Pharmacie_du_soleil'),
('Metronidazole', 'soigne', 1000, 1500, 0, 1500, 'medicament', 'adams2_Metronidazole.png', '2022-01-20', '16:38:28', '2022-01-20', 'adams2', 'pharmacie_du_cigne'),
('passedyl', 'pour l\'affection respiratoire', 3250, 146, 0, 150, 'medicament', 'adams_passedyl.jpg', '2022-01-20', '15:55:39', '2022-01-20', 'adams', 'Pharmacie_du_soleil'),
('PediaKid', 'soigne', 5000, 150, 0, 150, 'medicament', 'essi_PediaKid.jpg', '2022-01-20', '16:15:03', '2022-01-20', 'essi', 'Pharmacie_du_soleil'),
('pediakid', 'soigne', 6000, 400, 0, 400, 'medicament', 'jouer_pediakid.jpg', '2022-01-20', '16:55:14', '2022-01-20', 'jouer', 'pharmacie_is_is'),
('seringue', 'pique', 100, 10000, 0, 10000, 'medicament', 'dorine_seringue.jpg', '2022-01-20', '16:34:10', '2022-01-20', 'dorine', 'pharmacie_du_cigne'),
('seringue', 'effectue la piqure ', 100, 144, 0, 150, 'medicament', 'adams_seringue.jpg', '2022-01-20', '15:50:20', '2022-01-20', 'adams', 'Pharmacie_du_soleil'),
('strepsil', 'soigne', 1800, 900, 0, 900, 'medicament', 'jouer_strepsil.jpg', '2022-01-20', '16:40:40', '2022-01-20', 'jouer', 'pharmacie_is_is'),
('vitaminec', 'redonne de l\'énergie', 1000, 150, 0, 150, 'medicament', 'adams_vitaminec.jpg', '2022-01-20', '15:51:57', '2022-01-20', 'adams', 'Pharmacie_du_soleil'),
('vitaminec', 'soigne', 1000, 150, 0, 150, 'medicament', 'jouer_vitaminec.jpg', '2022-01-20', '16:42:16', '2022-01-20', 'jouer', 'pharmacie_is_is'),
('vitaminec1000', 'donne l\'énergie', 1000, 150, 0, 150, 'medicament', 'adams_vitaminec1000.jpg', '2022-01-20', '15:52:52', '2022-01-20', 'adams', 'Pharmacie_du_soleil');

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
('Nsangou', 'Adamou', 690264774, 'yaounde', '2022-01-20', '2022-01-14', 'Adams', 'alima');

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
(11, 'Meda_betadine', 'essi', '2022-01-20', '16:16:00', 2, 5000, 'Pharmacie_du_soleil'),
(12, 'passedyl', 'essi', '2022-01-20', '16:17:15', 4, 13000, 'Pharmacie_du_soleil'),
(13, 'seringue', 'essi', '2022-01-20', '16:20:08', 6, 600, 'Pharmacie_du_soleil');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `vendre`
--
ALTER TABLE `vendre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
