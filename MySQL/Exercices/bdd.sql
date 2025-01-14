-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 jan. 2025 à 16:22
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
-- Base de données : `testdb_complete`
--

CREATE DATABASE `exosql`;
USE `exosql`;

-- --------------------------------------------------------

--
-- Structure de la table `aliment`
--

CREATE TABLE `aliment` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `date_peremption` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `aliment`
--

INSERT INTO `aliment` (`id`, `nom`, `date_peremption`) VALUES
(1, 'Pomme', '2025-01-01'),
(2, 'Banane', '2025-01-15'),
(3, 'Lait', '2024-12-01');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `etat` enum('à vendre','vendu','sous compromis') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `description`, `etat`) VALUES
(1, 'Appartement 3 pièces à Paris', 'Beau 3 pièces situé dans le Marais', 'à vendre'),
(2, 'Maison familiale à Lyon', 'Maison avec jardin, 4 chambres', 'à vendre');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `date_publication` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `auteur_id`, `statut_id`, `date_publication`) VALUES
(1, 'Introduction à SQL', 'Ceci est un article sur SQL.', 1, 1, NULL),
(2, 'Avancé en SQL', 'Concepts avancés.', 3, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article_categorie`
--

CREATE TABLE `article_categorie` (
  `article_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article_categorie`
--

INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Informatique'),
(2, 'Bases de données');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `utilisateur_id`, `produit_id`, `quantite`) VALUES
(1, 1, 1, 1),
(2, 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `contenu` text DEFAULT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `contenu`, `auteur_id`, `article_id`) VALUES
(1, 'Super article !', 2, 1),
(2, 'Très utile, merci.', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `domaine` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `nom`, `domaine`) VALUES
(1, 'SQL', 'Informatique'),
(2, 'Java', 'Informatique'),
(3, 'Python', 'Informatique'),
(4, 'Développement Web', 'Informatique'),
(5, 'Communication', 'Marketing'),
(6, 'Gestion de projet', 'Management');

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `saison_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`id`, `nom`, `numero`, `saison_id`) VALUES
(1, 'Winter Is Coming', 1, 1),
(2, 'The Kingsroad', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hello`
--

CREATE TABLE `hello` (
  `id` int(11) NOT NULL,
  `col1` int(11) DEFAULT NULL,
  `col2` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hello`
--

INSERT INTO `hello` (`id`, `col1`, `col2`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `impot`
--

CREATE TABLE `impot` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `montant_du` decimal(10,2) DEFAULT NULL,
  `montant_encaisse` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `impot`
--

INSERT INTO `impot` (`id`, `utilisateur_id`, `montant_du`, `montant_encaisse`) VALUES
(1, 1, '500.00', '200.00'),
(2, 2, '300.00', '300.00'),
(3, 3, '700.00', '600.00'),
(4, 4, '400.00', '400.00');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `utilisateur_id`) VALUES
(1, 'SQL pour les débutants', 1),
(2, 'Avancé en SQL', 3);

-- --------------------------------------------------------

--
-- Structure de la table `machin`
--

CREATE TABLE `machin` (
  `truc` int(11) NOT NULL,
  `muche` int(11) DEFAULT NULL,
  `bidule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `machin`
--

INSERT INTO `machin` (`truc`, `muche`, `bidule`) VALUES
(1, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'Toyota'),
(2, 'Ford');

-- --------------------------------------------------------

--
-- Structure de la table `message_forum`
--

CREATE TABLE `message_forum` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `contenu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message_forum`
--

INSERT INTO `message_forum` (`id`, `utilisateur_id`, `contenu`) VALUES
(1, 1, 'Ce produit est nul, j\'en ai marre!'),
(2, 2, 'J\'adore ce film, il est génial!'),
(3, 3, 'C\'est un vrai idiot celui-là!'),
(4, 4, 'Je suis d\'accord, c\'est incroyable!');

-- --------------------------------------------------------

--
-- Structure de la table `nom`
--

CREATE TABLE `nom` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nom`
--

INSERT INTO `nom` (`id`, `nom`) VALUES
(14, 'Dupont'),
(15, 'Martin'),
(16, 'Lemoine'),
(17, 'Durand'),
(18, 'Lemoine'),
(19, 'Benoit'),
(20, 'Thomas'),
(21, 'Lemoine');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `utilisateur_id`, `produit_id`, `quantite`) VALUES
(1, 1, 1, 2),
(2, 4, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `prenom`
--

CREATE TABLE `prenom` (
  `id` int(11) NOT NULL,
  `prenom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prenom`
--

INSERT INTO `prenom` (`id`, `prenom`) VALUES
(6, 'Alice'),
(3, 'Claire'),
(8, 'Élise'),
(1, 'Jean'),
(5, 'Louis'),
(7, 'Lucas'),
(4, 'Paul'),
(2, 'Sophie');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `provenance_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `provenance_id`) VALUES
(1, 'Ordinateur', '800.00', 1),
(2, 'Clavier', '20.00', 2),
(3, 'Souris', '10.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `provenance`
--

CREATE TABLE `provenance` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `provenance`
--

INSERT INTO `provenance` (`id`, `nom`) VALUES
(1, 'France'),
(2, 'Chine');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'Admin'),
(2, 'Auteur'),
(3, 'Lecteur');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id` int(11) NOT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`id`, `serie`, `numero`) VALUES
(1, 'Game of Thrones', 1);

-- --------------------------------------------------------

--
-- Structure de la table `station_essence`
--

CREATE TABLE `station_essence` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `prix_gazole` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `station_essence`
--

INSERT INTO `station_essence` (`id`, `nom`, `adresse`, `ville`, `code_postal`, `prix_gazole`) VALUES
(1, 'Station Total', '123 Rue de la Paix', 'Paris', '75001', '1.55'),
(2, 'Station BP', '45 Avenue des Champs', 'Lyon', '69000', '1.50'),
(3, 'Station Shell', '78 Boulevard Haussmann', 'Marseille', '13001', '1.45');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`) VALUES
(1, 'Publié'),
(2, 'Brouillon');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `genre` enum('Homme','Femme','Autre') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `psw` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `genre`, `email`, `role_id`, `psw`, `age`) VALUES
(1, 'Dupont', 'Jean', 'Homme', 'jean@example.com', 2, NULL, 30),
(2, 'Martin', 'Sophie', 'Femme', 'sophie@example.com', NULL, NULL, 25),
(3, 'Lemoine', 'Claire', 'Femme', 'claire@example.com', 1, NULL, 35),
(4, 'Durand', 'Paul', 'Homme', 'paul@example.com', 3, NULL, 28),
(5, 'Moreau', 'Alice', 'Femme', 'alice@example.com', NULL, NULL, 22);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `type_carburation` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `marque_id` int(11) DEFAULT NULL,
  `proprietaire_id` int(11) DEFAULT NULL,
  `date_mise_en_service` date DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `modele`, `type_carburation`, `categorie`, `marque_id`, `proprietaire_id`, `date_mise_en_service`, `station_id`) VALUES
(1, 'Corolla', 'Essence', 'Berline', 1, 1, NULL, 1),
(2, 'Focus', 'Diesel', 'Compacte', 2, NULL, NULL, 2),
(3, 'Tesla Model S', 'Électrique', 'Berline', 1, NULL, '2022-05-01', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aliment`
--
ALTER TABLE `aliment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_auteur` (`auteur_id`),
  ADD KEY `fk_article_statut` (`statut_id`);

--
-- Index pour la table `article_categorie`
--
ALTER TABLE `article_categorie`
  ADD PRIMARY KEY (`article_id`,`categorie_id`),
  ADD KEY `fk_article_categorie_categorie` (`categorie_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commande_utilisateur` (`utilisateur_id`),
  ADD KEY `fk_commande_produit` (`produit_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commentaire_auteur` (`auteur_id`),
  ADD KEY `fk_commentaire_article` (`article_id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_episode_saison` (`saison_id`);

--
-- Index pour la table `hello`
--
ALTER TABLE `hello`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `impot`
--
ALTER TABLE `impot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livre_utilisateur` (`utilisateur_id`);

--
-- Index pour la table `machin`
--
ALTER TABLE `machin`
  ADD PRIMARY KEY (`truc`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_forum`
--
ALTER TABLE `message_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `nom`
--
ALTER TABLE `nom`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_panier_utilisateur` (`utilisateur_id`),
  ADD KEY `fk_panier_produit` (`produit_id`);

--
-- Index pour la table `prenom`
--
ALTER TABLE `prenom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prenom` (`prenom`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_provenance` (`provenance_id`);

--
-- Index pour la table `provenance`
--
ALTER TABLE `provenance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `station_essence`
--
ALTER TABLE `station_essence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilisateur_role` (`role_id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehicule_marque` (`marque_id`),
  ADD KEY `fk_vehicule_proprietaire` (`proprietaire_id`),
  ADD KEY `fk_vehicule_station` (`station_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `aliment`
--
ALTER TABLE `aliment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `hello`
--
ALTER TABLE `hello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `impot`
--
ALTER TABLE `impot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message_forum`
--
ALTER TABLE `message_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nom`
--
ALTER TABLE `nom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `prenom`
--
ALTER TABLE `prenom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `station_essence`
--
ALTER TABLE `station_essence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_article_statut` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`);

--
-- Contraintes pour la table `article_categorie`
--
ALTER TABLE `article_categorie`
  ADD CONSTRAINT `fk_article_categorie_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_article_categorie_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_produit` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_commande_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_commentaire_auteur` FOREIGN KEY (`auteur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `fk_episode_saison` FOREIGN KEY (`saison_id`) REFERENCES `saison` (`id`);

--
-- Contraintes pour la table `impot`
--
ALTER TABLE `impot`
  ADD CONSTRAINT `impot_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `fk_livre_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `message_forum`
--
ALTER TABLE `message_forum`
  ADD CONSTRAINT `message_forum_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_panier_produit` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `fk_panier_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_produit_provenance` FOREIGN KEY (`provenance_id`) REFERENCES `provenance` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `fk_vehicule_marque` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `fk_vehicule_proprietaire` FOREIGN KEY (`proprietaire_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `fk_vehicule_station` FOREIGN KEY (`station_id`) REFERENCES `station_essence` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
