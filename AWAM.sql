-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 08 mars 2021 à 12:39
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `AWAM`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `pseudo` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `cat` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `password`, `pseudo`, `avatar`, `cat`) VALUES
(1, 'Alaa', 'Naoufal', 'alaanaoufal2@gmail.com', '100', 'Alaa_naoufal', '1.jpg', 'admin'),
(2, 'test', 'test', 'alaanaoufal@gmail.com', '11', 'naoufal.alaa', '2.png', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `descript` text COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `date_time_publication` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `descript`, `contenu`, `date_time_publication`, `views`) VALUES
(12, 'Journée d\'innauguration', 'Au skate-park Hay Hassani Marrakech', 'Journée très important pour notre futur et notre association sportive', '2020-05-20 08:01:28', 1),
(14, 'Première rencontre culturelle ENS Marrakech', 'Ceremonie à l\'ENS Marrakech', 'Remerciements', '2020-05-20 08:07:38', 1),
(17, 'Deuxième rencontre Sportive Hay Hassani', 'Rencontre footbalistique au skate-park Hay hassani', 'Merci aux participants', '2020-05-20 08:30:15', 1),
(18, 'Première rencontre Sportive', 'Complexe sportif Zerktouni', 'La participation de plusieurs cadres et jeune pour faire de cet événement un succès', '2020-05-20 07:19:04', 1),
(20, 'ملف الجمعية', 'Formation du conseil', 'Journée de formation du conseil de l\'association', '2020-05-20 23:54:01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `email` text NOT NULL,
  `adresse` text NOT NULL,
  `codeP` int(11) DEFAULT NULL,
  `phone` text NOT NULL,
  `montant` text NOT NULL,
  `date_commande` datetime NOT NULL,
  `qS` int(11) NOT NULL DEFAULT 0,
  `qM` int(11) NOT NULL DEFAULT 0,
  `qL` int(11) NOT NULL DEFAULT 0,
  `id_prod` int(11) NOT NULL,
  `validate` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `nom`, `prenom`, `email`, `adresse`, `codeP`, `phone`, `montant`, `date_commande`, `qS`, `qM`, `qL`, `id_prod`, `validate`, `quantity`) VALUES
(8, 'rabai', 'Personne', 'alaanaoufal2000@gmail.com', 'hay hassani, bloc49 Marrakech', 40130, '0622975254', '100', '2020-04-28 21:33:17', 0, 1, 0, 6, 1, 1),
(9, 'rabai', 'Personne', 'alaanaoufal2000@gmail.com', 'hay hassani, bloc49 Marrakech', 40130, '0622975254', '100', '2020-04-28 21:35:58', 0, 1, 0, 6, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom`, `id_article`) VALUES
(12, '', 28),
(13, '', 29),
(14, '', 30),
(15, '', 31),
(16, '', 32),
(17, '', 33),
(18, '', 34);

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

CREATE TABLE `inscrits` (
  `id` int(11) NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_eleve` text COLLATE utf8_unicode_ci NOT NULL,
  `age_eleve` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `poids` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `taille` text COLLATE utf8_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `date_naiss` date NOT NULL,
  `date_insc` date NOT NULL,
  `verify` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `inscrits` (`id`, `nom`, `prenom`, `email`, `phone_eleve`, `age_eleve`, `poids`, `taille`, `adresse`, `date_naiss`, `date_insc`, `verify`) VALUES
(23, 'Personne', 'Personne', 'aaaa@aaaa.aaaaaa', '0622975254', '22', '50', '173', 'marrakech, hay hassani', '1997-04-04', '2020-02-14', 1),
(24, 'naoufal', 'alaa', 'alaanaoufal2000@gmail.com', '0622975254', '20', '57', '173', 'marrakech, Hay hassani, Bloc 49', '1999-06-09', '2020-02-14', 1),
(25, 'naoufal', 'alaa', 'alaanaoufal@hotmail.com', '0622975254', '20', '60', '173', 'marrakech, Hay hassani, Bloc 49', '1999-10-07', '2020-02-15', 1),
(28, 'naoufal', 'mowajid', 'alaanaoufal2000@gmail.com', '0622975254', '19', '57', '172', 'marrakech, Hay hassani, Bloc 49', '2000-06-01', '2020-03-27', 0),
(29, 'hatim', 'ouahbi', 'ouahbi.hatim01@gmail.com', '0654332112', '18', '60', '173', 'Agadir, Massa', '2001-10-17', '2020-03-28', 0),
(30, 'rabai', 'Personne', 'alaanaoufal2000@gmail.com', '09384829', '22', '43', '172', 'hay hassani, bloc49', '1998-02-04', '2020-04-03', 0),
(39, 'rabai', 'Personne', 'zzz@gmail.com', '09384829', '17', '57', '173', 'hay hassani, bloc49', '2003-01-30', '2020-04-29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `site` text DEFAULT 'pas de mention',
  `visite` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `nom`, `site`, `visite`) VALUES
(3, 'Sidi Ali', 'Http://www.leseauxmineralesdoulmes.com/pages/sidi-ali', 5),
(10, 'ENS marrakech', 'Http://www.ens-marrakech.ac.ma/', 5);

-- --------------------------------------------------------

--
-- Structure de la table `pic_eleve`
--

CREATE TABLE `pic_eleve` (
  `id` int(11) NOT NULL,
  `titre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pic_eleve`
--

INSERT INTO `pic_eleve` (`id`, `titre`) VALUES
(3, 'Forum'),
(4, 'Membres'),
(5, 'Forum 1'),
(6, 'Forum Sportif'),
(7, 'Forum Sportif 1'),
(8, 'Match et recompenses'),
(9, 'Rencontre sportive'),
(10, 'Match à l\'ancienne'),
(11, 'Journée d\'ouvertre'),
(13, 'Première rencontre Sportive'),
(14, 'ملف الجمعية');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `descript` text NOT NULL,
  `prix` text NOT NULL,
  `s` int(11) NOT NULL DEFAULT 0,
  `m` int(11) NOT NULL DEFAULT 0,
  `l` int(11) NOT NULL DEFAULT 0,
  `date_time_publication` datetime NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `titre`, `descript`, `prix`, `s`, `m`, `l`, `date_time_publication`, `stock`) VALUES
(6, 'france', 'une tenue complete', '100', 3, 12, 6, '2020-04-28 17:52:57', 21),
(7, 'new', 'une tenue complete', '120', 2, 1, 0, '2020-04-28 22:12:07', 3);

-- --------------------------------------------------------

--
-- Structure de la table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `ip_user` varchar(12) NOT NULL,
  `visited` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `views`
--

INSERT INTO `views` (`id`, `ip_user`, `visited`) VALUES
(2, '127.0.0.1', 1),
(3, '127.0.0.1', 1),
(4, '127.0.0.1', 1),
(5, '127.0.0.1', 1),
(6, '127.0.0.1', 1),
(7, '127.0.0.1', 1),
(10, '127.0.0.1', 1),
(11, '127.0.0.1', 1),
(12, '127.0.0.1', 1),
(13, '127.0.0.1', 1),
(14, '127.0.0.1', 1),
(15, '127.0.0.1', 1),
(17, '127.0.0.1', 1),
(18, '127.0.0.1', 1),
(20, '127.0.0.1', 1),
(21, '127.0.0.1', 1),
(24, '127.0.0.1', 1),
(25, '127.0.0.1', 1),
(26, '127.0.0.1', 1),
(27, '127.0.0.1', 1),
(28, '127.0.0.1', 1),
(34, '127.0.0.1', 1),
(37, '127.0.0.1', 1),
(38, '127.0.0.1', 1),
(40, '127.0.0.1', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscrits`
--
ALTER TABLE `inscrits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pic_eleve`
--
ALTER TABLE `pic_eleve`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`,`ip_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `inscrits`
--
ALTER TABLE `inscrits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `pic_eleve`
--
ALTER TABLE `pic_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
