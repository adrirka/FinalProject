-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Juin 2017 à 17:02
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
(16, 'qsdsdqsdqsdqs', 'ddqsdqsdqsdqsdqsdqsds', NULL, 'accepted', 'dqsjgdhqsgdhqsgd', 'djqsgdjgqsjdgqjsd@dqsdqsd.com', 'rdv', 'dqsdqsdqsdqsdqsdqsd'),
(17, 'ASSOCATION PARIS', 'tetetstststshhhjjkkklllll', NULL, 'pending', 'adriiiiiiiien', 'test3@test.fr', 'rdv', 'tettwtststtstststsghggggh');

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
(3, 'Saraba est sur le Web !', 'C’est avec un grand plaisir que nous lançons officiellement la mise en ligne de notre site Internet. Nous sommes heureux de vous y accueillir.\r\n\r\nVous y retrouverez l’ensemble des actualités et des événements de notre association. Complètement actualisé, il sera maintenant plus agréable pour nos visiteurs et pour notre clientèle établie. Vous naviguerez à travers une interface intuitive avec régulièrement tout plein de contenus et de photos.\r\n\r\nNous vous invitons également à vous abonner à notre NEWSLETTER afin de recevoir de  rester informé des différents événements et autres actions de notre association.\r\n\r\nBonne navigation !', 'Bievenue', '59527fae409ea_Bienvenue.png'),
(5, 'Rejoignez-nous !', 'Saraba est désormais présents sur les réseaux sociaux tels que Facebook, Twitter et Youtube donc n\'hésitez pas à nous rejoindre pour ne rien rater de nos actus !', 'Réseaux sociaux', '5952153fe178e_fb.jpg');

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
(3, '59523b2edd4ec_photo1.jpg'),
(4, '59523b3a5377a_photo2.jpg'),
(5, '59523b4471157_photo3.jpg'),
(6, '59523b50778d9_photo4.jpg'),
(7, '59523b5eb2bc2_photo5.jpg'),
(8, '59523b682ccfe_photo6.jpg'),
(9, '59523b71d90a6_photo7.jpg'),
(10, '59523b7d971d7_photo8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date`) VALUES
(1, 'test@test.fr', '2017-06-28 10:19:07'),
(2, 'adrien.webforce@gmail.com', '2017-06-28 16:04:46');

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
(1, 'La Direction de la Protection Judiciaire de la Jeunesse', 'Le champ d\'action de la DPJJ s\'étend de la conception des normes et des cadres d\'organisation, à la mise en œuvre et à la vérification de la qualité de ces mises en œuvre. La DPJJ est également en charge de la politique et gestion des ressources humaines, la politique de formation, du pilotage opérationnel et budgétaire (missions \"support\" décrites dans le décret 2008-689). Depuis la loi du 5 mars 2007, le président du Conseil général est, quant à lui, le chef de file de la protection de l\'enfance (prise en charge des mineurs en danger).', 'PJJ_logo.jpg'),
(4, 'Fondation d\'Auteuil', 'La fondation d’Auteuil (nommée les Orphelins apprentis d\'Auteuil jusqu’en 20091, se faisant appeler Apprentis d’Auteuil2 depuis 2010 et également connue sous le sigle OAA), créée en 1866 par l\'abbé Louis Roussel, est une œuvre sociale qui se consacre à l\'accueil, la formation et l\'aide à l\'insertion des jeunes en difficulté sociale. Depuis le milieu des années 2000, Apprentis d\'Auteuil accompagne également les familles dans le cadre d\'une démarche préventive. C\'est une fondation catholique sous tutelle du ministère de l\'Intérieur, de l\'archevêché de Paris et de la congrégation du Saint-Esprit (Spiritains).', 'Fondation d\'Auteuil_Logo-fondation-auteuil.jpg'),
(5, 'iosdhdsifds', 'sdfsdggsfgfsf', 'iosdhdsifds_fb.jpg'),
(6, 'qsdsdqsdqsdqs', 'ddqsdqsdqsdqsdqsdqsds', 'qsdsdqsdqsdqs_fb.jpg');

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
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
