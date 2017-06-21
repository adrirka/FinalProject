-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 21 Juin 2017 à 13:02
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `saraba`
--

-- --------------------------------------------------------

--
-- Structure de la table `addpartner`
--

CREATE TABLE `addpartner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `status` enum('pending','accepted','refused') NOT NULL DEFAULT 'pending',
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` enum('rdv') NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `addpartner`
--

INSERT INTO `addpartner` (`id`, `title`, `content`, `img`, `status`, `nom`, `email`, `sujet`, `message`) VALUES
(2, 'title', 'content', NULL, 'accepted', 'name', 'email', 'rdv', 'message'),
(3, 'dsqjdqsdgregergerggregerger', 'dqsdqsdqsdqsdqsdqsdqsdqsdqsd', NULL, 'accepted', 'dqsdqsdqsd', 'From: qsdqsdqsd@qdsdqsd.com  \nMIME-Version: 1.0 \r\nContent-type: text/html; charset=iso-8859-1 \r\n', 'rdv', 'Nom : dqsdqsdqsd\nMessage : dqsdqsdqsdqsdqsdqsdd'),
(4, 'dsqjdqsdgregergerggregerger', 'dqsdqsdqsdqsdqsdqsdqsdqsdqsd', NULL, 'pending', 'dqsdqsdqsd', 'qsdqsdqsd@qdsdqsd.com', 'rdv', 'dqsdqsdqsdqsdqsdqsdd'),
(5, 'title', 'content', NULL, 'pending', 'name', 'email', '', 'message'),
(6, 'title', 'content', NULL, 'pending', 'name', 'email', '', 'message'),
(7, 'title', 'content', NULL, 'pending', 'name', 'email', '', 'message'),
(8, 'title', 'content', NULL, 'pending', 'name', 'email', '', 'message'),
(9, 'title', 'content', NULL, 'pending', 'name', 'email', '', 'message'),
(10, 'title', 'content', NULL, 'pending', 'name', 'email', 'rdv', 'message'),
(11, 'title', 'content', NULL, 'refused', 'name', 'email', 'rdv', 'message');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `short_content` text NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `short_content`, `img`) VALUES
(3, 'ads', 'fqsfdqsd', 'dqsdqsdqsd', 'ads_pantalon2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gallery`
--

INSERT INTO `gallery` (`id`, `img`) VALUES
(1, '594a2e0c063af_pull1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partner`
--

INSERT INTO `partner` (`id`, `title`, `content`, `img`) VALUES
(1, 'dsqjdqsdgregergerggregerger', 'dqsdqsdqsdqsdqsdqsdqsdqsdqsd', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role`) VALUES
(1, '$2y$10$HvMgJvLAOAHKH9IJRfjpauohegNObE7.rkGH4Jw9Ht9E4x3UR8qHW', 'admin@admin.com', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `addpartner`
--
ALTER TABLE `addpartner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `addpartner`
--
ALTER TABLE `addpartner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
