-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 avr. 2023 à 14:59
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chatelet_portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `texte` text NOT NULL,
  `photo` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`id`, `nom`, `texte`, `photo`) VALUES
(2, 'CHATELET Yanis', 'Je m\'appelle Yanis CHATELET, j\'ai 20 ans et je suis actuellement étudiant en deuxième année de Bachelor Universitaire de Technologie Métiers du Multimédia et de l\'Internet à l\'IUT de Cergy-Pontoise sur le site de Sarcelles (34 Bd Henri Bergson). Je suis diplômé du BAC Pro Logistique avec mention \"assez bien\" en 2021, pendant lequel j\'ai réalisé 24 semaines stage dans le domaine de la Logistique. Grace a ces stages j\'ai pu avoir une vraie vision du monde du travail et ces stages m\'ont permis d\'avoir beaucoup d\'expériences mais aussi d\'obtenir un CDD à temps partiel de 3 mois. Cependant, j\'ai toujours préféré le domaine de l\'informatique, plus précisément, la programmation, c\'est pourquoi je me dirige vers le BUT MMI. J\'ai appris le codage à 16 ans en autodidacte, et je suis tombé amoureux de la programmation.', 'Photo-pro.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `mail`, `msg`) VALUES
(11, 'Adnane', 'aetmidi@gmail.com', 'Ce site est aussi ravissant que Yanis CHATELET');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rue` text NOT NULL,
  `ville` text NOT NULL,
  `pays` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `postal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `rue`, `ville`, `pays`, `email`, `tel`, `postal`) VALUES
(2, '34 Boulevard de la Muette', 'Garges-lès-Gonesse', 'France', 'ychatelet03@gmail.com', 667361618, 95140);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `titre`, `descr`) VALUES
(15, 'Map interactif', 'Dans ce projet tutoré réalisé en groupe, on a utiliser une API qui s\'appelle \"Leaflet\" afin de mettre une map dans laquelle on affiche tous les commerces situé en Ile de France'),
(23, 'Portfolio WordPress', 'Dans ce projet, j\'ai du réaliser un portfolio sous le CMS \"WordPress\". Ce projet m\'a permis de prendre en main un CMS et toutes ses variantes tels que les extensions Yoast SEO, Elementor, etc.');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projets` text NOT NULL,
  `frontend` text NOT NULL,
  `backend` text NOT NULL,
  `techno` text NOT NULL,
  `links` text NOT NULL,
  `logistique` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `projets`, `frontend`, `backend`, `techno`, `links`, `logistique`) VALUES
(1, 'Réalisation d\'un site web en touchant que la partie Front en HTML et CSS. Refonte du premier site web en mettant un back office. Donc le site est maintenant en PHP, JS et MySQL. \r\nRéalisation d\'un portfolio en HTML, CSS et JS. Réalisation d\'une map interactive avec l\'API de Google Map en JS.', 'HTML / CSS / JavaScriptt', 'Python / PHP', 'Unity / Figma / Visual Studio Code', '', 'Je n\'ai pas que des compétences en informatique. En effet, j\'ai un BAC Pro Logistique dans lequel j\'ai développer des compétences tels que: préparation de commandes, réception de commandes, contrôle qualitatif et quantitatif, j\'ai aussi obtenu un CACES catégorie 1/3/5.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mdp`) VALUES
(1, 'Yanis', 'hello');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
