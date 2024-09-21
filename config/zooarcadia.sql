-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 sep. 2024 à 17:38
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zooarcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `health_status` varchar(255) NOT NULL,
  `views` int(11) DEFAULT 0,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `image`, `name`, `species`, `health_status`, `views`, `habitat_id`) VALUES
(1, 'images/animals/66ec748430919_leo.png', 'Leopard', 'Félins', 'bonne santé', 16, 1),
(2, 'images/animals/66ec749230b94_ara bleu.png', 'Ara Bleu', 'Oiseau', 'bonne santé', 5, 1),
(3, 'images/animals/66ec74af2347f_Hippopotames.png', 'Hippopotames', 'Mammifères', 'Bonne santé', 3, 2),
(4, 'images/animals/66ec74bed87f4_Poisson Clown.png', 'Poisson Clown', 'Poisson', 'Bonne santé', 3, 2),
(5, 'images/animals/66ec74caa0e54_Scorpion.png', 'Scorpion', 'Arachnides', 'Malade', 0, 3),
(6, 'images/animals/66ec74d2493f2_Dromadaire.png', 'Dromadaire', 'Mammifères', 'Bonne santé', 1, 3),
(7, 'images/animals/66ec74e3179fc_Elephant.png', 'Elephant', 'Mammifères', 'Bonne santé', 9, 4),
(8, 'images/animals/66ec74f053b02_lionne.png', 'Lionne', 'Félins', 'Enceinte', 10, 4),
(9, 'images/animals/66ec750fd3b5e_boa.png', 'Boa Emeraude', 'reptiles', 'bonne', 29, 1),
(10, 'images/animals/66edbd3889a87_chimp.png', 'Chimpanzé', 'Singe', 'bonne', 9, 1),
(11, 'images/animals/66edbd54e29fb_dendrobate.png', 'Dendrobate', 'Grenouille', '', 2, 1),
(12, 'images/animals/66edbd70a595a_gibon.png', 'Gibon', 'Singe', '', 3, 1),
(13, 'images/animals/66edbda3c898a_recroqueville.png', 'Recroquevillé', 'Serpent', '', 2, 1),
(14, 'images/animals/66edbde21b390_Outres.png', 'Outres', 'Mammifères', '', 1, 2),
(15, 'images/animals/66edbe1045830_Perche.png', 'Perche', 'Poisson', '', 1, 2),
(16, 'images/animals/66edbe2760e19_Plongeon.png', 'Plongeon', 'Oiseau', '', 0, 2),
(17, 'images/animals/66edbe48e4653_Oies de lac.png', 'Oies de lac', 'Oiseau', '', 2, 2),
(18, 'images/animals/66edbe65268f9_Crocodile.png', 'Crocodile', 'Alligators', '', 0, 2),
(19, 'images/animals/66edbe89bcbc2_Gazelle.png', 'Gazelle', 'Bovidés', '', 0, 3),
(20, 'images/animals/66edbea38d279_Cobra.png', 'Cobra', 'Serpent', '', 1, 3),
(21, 'images/animals/66edbed3169ab_Diable épineux.png', 'Diable épineux 	', 'reptiles', '', 0, 3),
(22, 'images/animals/66edbee7a4951_Vipère cornu.png', 'Vipère cornu', 'reptiles', '', 0, 3),
(23, 'images/animals/66edbef85818a_Chamelle.png', 'Chamelle', 'Mammifères', '', 3, 3),
(24, 'images/animals/66edbf2445570_lion.png', 'Lion', 'Félins', '', 0, 4),
(25, 'images/animals/66edbf42bd9b2_Lycaon.png', 'Lycaon', 'Canidés', '', 0, 4),
(26, 'images/animals/66edbf5b516e4_Chacal.png', 'Chacal', 'Canidés', '', 0, 4),
(27, 'images/animals/66edbf6ed41d3_Gnou.png', 'Gnou', 'Mammifères', '', 0, 4),
(28, 'images/animals/66edbf83b3597_Buffle.png', 'Buffle', 'Mammifères', '', 0, 4),
(29, 'images/animals/66edbf9a33b3e_Girafe.png', 'Girafe', 'Mammifères', '', 0, 4),
(30, 'images/animals/66eeb5a8ac754_Lézard à crête.png', 'Lézard à crête', 'reptiles', 'bonne et enceinte', 6, 3),
(31, 'images/animals/66eeb5d4254f6_Iguane.png', 'Iguane', 'reptiles', 'très bonne santé', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `animal_consultations`
--

CREATE TABLE `animal_consultations` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `consultation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `is_read`) VALUES
(1, 'Boris Diaw', 'samirolivier@gmail.com', 'faire du benevoltat', '2024-09-16 14:41:45', 1),
(2, 'samir olivier', 'email@entreprise.com', 'je suis intéresser pour bosser avec vous.\r\nmerci de me repondre ', '2024-09-16 16:07:35', 1),
(3, 'rahima', 'rahima@monsite.com', 'je veux un contact', '2024-09-16 16:13:01', 1),
(4, 'rico', 'rico@monsite.com', 'hello', '2024-09-16 16:14:35', 1),
(5, 'nina', 'nina@site.com', 'suis la', '2024-09-16 16:15:36', 1),
(6, 'momy', 'momy@site.com', 'appelez moi', '2024-09-16 16:16:18', 1),
(7, 'mami', 'mami@site.c', 'je suis la', '2024-09-16 16:16:58', 1),
(8, 'ahlem', 'ahlem@gmail.com', 'allo!!!!', '2024-09-16 16:18:10', 1),
(9, 'rakia', 'rakia@gmail.com', 'allo', '2024-09-16 16:21:55', 1),
(10, 'ikram', 'ikram@gmail.com', 'allo', '2024-09-16 16:22:37', 1),
(11, 'bazil', 'bazil@gmail.com', 'allo', '2024-09-16 16:23:29', 1),
(12, 'amir', 'amir@gmailcom', 'youpi', '2024-09-16 19:35:34', 1),
(13, 'fezfge', 'samir@yahoo.fr', 'cool', '2024-09-16 21:48:14', 1),
(14, 'ismael', 'ismael@gmail.com', 'je veux parler au DG', '2024-09-18 20:10:28', 1),
(15, 'samol', 'samol@gmail.com', 'super cool', '2024-09-20 21:23:48', 1),
(16, 'mamichou', 'mamichou@gmail.com', 'je sui ravis', '2024-09-21 12:03:37', 1);

-- --------------------------------------------------------

--
-- Structure de la table `feeding_logs`
--

CREATE TABLE `feeding_logs` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `food_type` varchar(255) NOT NULL,
  `grammage` decimal(10,2) NOT NULL,
  `feeding_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `feeding_logs`
--

INSERT INTO `feeding_logs` (`id`, `animal_id`, `user_id`, `food_type`, `grammage`, `feeding_time`) VALUES
(1, 1, 3, 'viande de boeuf', '30.00', '2024-09-18 13:59:54'),
(2, 2, 3, 'arrachide', '50.20', '2024-09-18 14:01:00'),
(3, 3, 3, 'pastèque', '30.00', '2024-09-18 14:01:46'),
(4, 4, 3, 'granulés', '25.00', '2024-09-18 14:01:46'),
(5, 5, 3, 'insectes', '5.30', '2024-09-18 14:02:34'),
(6, 6, 3, 'herbes/graines', '300.00', '2024-09-18 14:02:34'),
(7, 7, 3, 'herbes', '1500.00', '2024-09-18 14:03:26'),
(8, 8, 3, 'viande de boeuf', '850.00', '2024-09-18 14:03:26'),
(9, 1, 3, 'poulet', '200.00', '2024-09-18 20:46:00'),
(10, 9, 3, 'souris', '300.00', '2024-09-18 22:09:00'),
(11, 4, 3, 'granulé et vers', '300.00', '2024-09-19 22:41:00'),
(12, 9, 3, 'souris', '250.00', '2024-09-20 23:40:00'),
(13, 10, 3, 'banane', '100.00', '2024-09-21 13:47:00'),
(14, 31, 3, 'insectes', '75.50', '2024-09-21 14:04:00'),
(15, 30, 3, 'insectes', '12.50', '2024-09-21 14:31:00'),
(16, 23, 3, 'herbes', '250.00', '2024-09-21 14:31:00');

-- --------------------------------------------------------

--
-- Structure de la table `habitats`
--

CREATE TABLE `habitats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `habitats`
--

INSERT INTO `habitats` (`id`, `name`, `description`, `image`) VALUES
(1, 'Forêts Tropicales', 'Ces habitats reproduisent les conditions chaudes et humides des forêts', 'images/habitats/66ec7384b47fa_tropicale.png'),
(2, 'Rivières & Humides', 'Habitats aquatiques avec des rivières, des marais, des étangs et des plantes', 'riviere/assets/riviere.png'),
(3, 'Déserts et Dunes', 'Habitats arides avec du sable, des rochers, et des plantes désertiques', 'desert/assets/desert.png'),
(4, 'Savane Africaine', 'Un espace ouvert avec des herbes hautes, des arbres épars.', 'savane/assets/savane.png');

-- --------------------------------------------------------

--
-- Structure de la table `habitat_comments`
--

CREATE TABLE `habitat_comments` (
  `id` int(11) NOT NULL,
  `habitat_id` int(11) NOT NULL,
  `veterinarian_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `habitat_comments`
--

INSERT INTO `habitat_comments` (`id`, `habitat_id`, `veterinarian_id`, `comment`, `created_at`) VALUES
(1, 1, 2, 'ajouter encore des abris', '2024-09-18 20:03:51'),
(2, 2, 2, 'plus arbre', '2024-09-18 20:04:03'),
(3, 4, 2, 'beaucoup plus de fleurs', '2024-09-19 20:40:08'),
(4, 3, 2, 'a revoir', '2024-09-21 12:08:09');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `veterinarian_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `description` text NOT NULL,
  `health_status` varchar(255) DEFAULT NULL,
  `feeding_comments` text DEFAULT NULL,
  `habitat_comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`id`, `veterinarian_id`, `animal_id`, `report_date`, `description`, `health_status`, `feeding_comments`, `habitat_comments`, `created_at`) VALUES
(1, 2, 1, '2024-09-18', 'il à l\'aire en forme', 'parfaite sante', 'ajouter 10g de plus', 'planter plus d\'arbres', '2024-09-18 19:25:12'),
(2, 2, 2, '2024-09-18', 'grandi bien', 'bien', 'ajouter 2g', '', '2024-09-18 19:51:49'),
(3, 2, 3, '2024-09-18', 'grandi', 'super bine', 'ajouter 200g', 'ça va', '2024-09-18 20:04:31'),
(4, 2, 4, '2024-09-19', 'augmenter encore d\'autres', 'bonne', 'augmenter des vers', 'bien', '2024-09-19 20:40:56'),
(5, 2, 1, '2024-09-19', 'bien', 'bonne', 'ok', '', '2024-09-19 20:43:43'),
(6, 2, 9, '2024-09-20', 'grandit bien', 'enceinte', 'a surveiller de près', '', '2024-09-20 21:42:00'),
(7, 2, 9, '2024-09-20', 'bien', 'bonne santé', 'bonne sante', 'bien', '2024-09-20 21:46:48'),
(8, 2, 1, '2024-09-21', 'ok', 'bonne', '', '', '2024-09-21 11:26:59'),
(9, 2, 1, '2024-09-21', 'ok', 'bonne', '', '', '2024-09-21 11:33:57'),
(10, 2, 10, '2024-09-21', 'en forme', 'bien', '', '', '2024-09-21 11:34:15'),
(11, 2, 10, '2024-09-21', 'en forme', 'bien', '', '', '2024-09-21 11:34:20'),
(12, 2, 9, '2024-09-21', 'ok', 'bonne', '', '', '2024-09-21 11:46:07'),
(13, 2, 10, '2024-09-21', 'ok', 'bonne', '', '', '2024-09-21 11:46:35'),
(14, 2, 31, '2024-09-21', 'en forme', 'très bonne santé', 'bien', 'parfait', '2024-09-21 12:08:00'),
(15, 2, 30, '2024-09-21', 'ok', 'bonne et enceinte', '', '', '2024-09-21 12:20:18');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `is_validated` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `visitor_name`, `review`, `is_validated`, `created_at`) VALUES
(1, 'rico', 'cool', 1, '2024-09-15 09:59:16'),
(2, 'nina', 'super sympa', 1, '2024-09-15 09:59:37'),
(9, 'olivier', 'genial', 1, '2024-09-15 11:28:27'),
(10, 'bazile', 'waooh.....', 1, '2024-09-15 11:28:42'),
(113, 'shakira', 'super', 1, '2024-09-15 15:27:18'),
(114, 'nadine', 'j\'adore', 1, '2024-09-15 15:27:43'),
(120, 'nadege', 'bazil est un salaud', 1, '2024-09-15 15:34:58'),
(123, 'claude', 'j\'y reviendrai', 1, '2024-09-15 15:42:16'),
(124, 'nahima', 'un zoo agreable', 1, '2024-09-15 17:43:59'),
(125, 'mami', 'super', 1, '2024-09-16 16:25:55'),
(126, 'momy', 'waooh', 1, '2024-09-16 16:26:15'),
(127, 'mamaichou', 'super', 1, '2024-09-21 12:06:02');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES
(1, 'Restauration', 'Le parc propose diverses options de restauration pour satisfaire les besoins et les goûts de tous les visiteurs.', 'images/services/66ec6a0aa311c_restauration.png'),
(2, 'Visite des Habitats  ', 'Le parc propose des visites guidées gratuites pour offrir aux visiteurs une expérience éducative et enrichissante.', 'images/services/66ec6a2de8ea7_a23ea2c72189e67069ff1817613dc7e9a744a15b.png'),
(3, 'Visite en Petit Train', 'Le parc propose également un service de petit train pour offrir une manière confortable et divertissante de découvrir le zoo.', 'images/services/66ec6a6bb29ad_visitetrain.png');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','veterinaire','employe') NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `username`, `created_at`) VALUES
(1, 'sam@gmail.com', '$2y$10$FQY93EuQgbfgrdMT8cy4BeMEGw0tKJ5Vte31oPlSpppLXo.fwsVJ2', 'admin', 'sam', '2024-09-18 11:57:29'),
(2, 'olivier@gmail.com', '$2y$10$Asx34/o8Fd33rrpHCTqO8eGAgCytdQJq/iqvU49ZjG6G5zGXAF0lq', 'veterinaire', 'olivier', '2024-09-18 11:57:29'),
(3, 'bocs@gmail.com', '$2y$10$Asx34/o8Fd33rrpHCTqO8eGAgCytdQJq/iqvU49ZjG6G5zGXAF0lq', 'employe', 'bocs', '2024-09-18 11:57:54'),
(4, 'samirolivier@gmail.com', '$2y$10$YDzeZCVug7bj88eYErdCQeSE17MO60V33Y8kYReclrbt8IZaVAqmK', '', '', '2024-09-21 11:04:17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Index pour la table `animal_consultations`
--
ALTER TABLE `animal_consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `feeding_logs`
--
ALTER TABLE `feeding_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feeding_logs_ibfk_1` (`animal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat_comments`
--
ALTER TABLE `habitat_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`),
  ADD KEY `veterinarian_id` (`veterinarian_id`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veterinarian_id` (`veterinarian_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_token` (`session_token`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `animal_consultations`
--
ALTER TABLE `animal_consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `feeding_logs`
--
ALTER TABLE `feeding_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `habitat_comments`
--
ALTER TABLE `habitat_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`);

--
-- Contraintes pour la table `animal_consultations`
--
ALTER TABLE `animal_consultations`
  ADD CONSTRAINT `animal_consultations_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Contraintes pour la table `feeding_logs`
--
ALTER TABLE `feeding_logs`
  ADD CONSTRAINT `feeding_logs_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feeding_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `habitat_comments`
--
ALTER TABLE `habitat_comments`
  ADD CONSTRAINT `habitat_comments_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `habitat_comments_ibfk_2` FOREIGN KEY (`veterinarian_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`veterinarian_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
