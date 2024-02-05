-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 05 fév. 2024 à 06:36
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `VParrotWebApp`
--

-- --------------------------------------------------------

--
-- Structure de la table `carburant`
--

CREATE TABLE `carburant` (
  `id` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carburant`
--

INSERT INTO `carburant` (`id`, `libelle`) VALUES
(1, 'Diesel'),
(2, 'Essence'),
(3, 'Électrique'),
(4, 'Hybrid'),
(5, 'GPL'),
(6, 'Hydrogène');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `roles`, `date_creation`, `password`) VALUES
(1, 'PARROT', 'Vincent', 'admin@email.com', '[\"ROLE_ADMIN\"]', '2024-02-05 05:18:03', '$2y$13$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm'),
(2, 'DOE', 'John', 'user1@email.com', '[\"ROLE_EMPLOYE\"]', '2024-02-05 05:18:03', '$2y$13$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm');

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `jour` varchar(100) NOT NULL,
  `ouverture_matin` varchar(40) NOT NULL,
  `fermeture_midi` varchar(40) DEFAULT NULL,
  `ouverture_apres_midi` varchar(40) DEFAULT NULL,
  `fermeture_soir` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `jour`, `ouverture_matin`, `fermeture_midi`, `ouverture_apres_midi`, `fermeture_soir`) VALUES
(1, 'Lundi', '08:45', '12:00', '14:00', '18:00'),
(2, 'Mardi', '08:45', '12:00', '14:00', '18:00'),
(3, 'Mercredi', '08:45', '12:00', '14:00', '18:00'),
(4, 'Jeudi', '08:45', '12:00', '14:00', '18:00'),
(5, 'Vendredi', '08:45', '12:00', '14:00', '18:00'),
(6, 'Samedi', '08:45', '12:00', 'Fermé', 'Fermé'),
(7, 'Dimanche', 'Fermé', 'Fermé', 'Fermé', 'Fermé');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'Citroën'),
(2, 'Dacia'),
(3, 'Mercedes-Benz'),
(4, 'Porsche'),
(5, 'BMW'),
(6, 'Bugatti'),
(7, 'Toyota');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id`, `marque_id`, `nom`) VALUES
(1, 1, 'C5 AIRCROSS'),
(2, 2, 'Duster'),
(3, 3, 'GT2'),
(4, 4, '911'),
(5, 5, 'i4'),
(6, 6, 'Chiron'),
(7, 7, 'Mirai II');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description1` longtext DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `description3` longtext DEFAULT NULL,
  `listeitem1` varchar(100) DEFAULT NULL,
  `listeitem2` varchar(100) DEFAULT NULL,
  `listeitem3` varchar(100) DEFAULT NULL,
  `listeitem4` varchar(100) DEFAULT NULL,
  `listeitem5` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `titre`, `description1`, `description2`, `description3`, `listeitem1`, `listeitem2`, `listeitem3`, `listeitem4`, `listeitem5`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 'Réparation de la carrosserie et de mécanique', 'Bienvenue sur notre site dédié à la réparation de carrosserie et de mécanique automobile ! Chez nous, nous sommes fiers d\'offrir une gamme complète de services de réparation pour votre véhicule, qu\'il s\'agisse de redonner à votre carrosserie son éclat d\'origine ou de résoudre des problèmes mécaniques complexes.', 'Notre équipe de professionnels expérimentés est spécialisée dans la réparation de carrosserie. Que votre voiture ait subi des dommages mineurs ou nécessite une réparation plus importante suite à une collision, nous sommes là pour restaurer son apparence et sa structure avec précision. Nous utilisons des techniques avancées et des matériaux de haute qualité pour garantir des résultats durables et esthétiquement impeccables.', 'Contactez-nous dès aujourd\'hui pour prendre rendez-vous ou pour obtenir plus d\'informations sur nos services de réparation de carrosserie et de mécanique. Notre équipe amicale est là pour répondre à toutes vos questions et pour vous fournir des solutions adaptées à vos besoins. Faites confiance à notre expertise et redonnez à votre véhicule son état optimal !', 'Réparation et remplacement de pièces de carrosserie', 'Débosselage, ponçage', 'Réparation moteur et boîte vitesses', 'Recherche de pannes mécaniques', 'Diagnostic embarqué toutes marques', 'carrepair-1-65c0545ac2a23427139470.jpg', 1087991, '2024-02-05 05:22:02'),
(2, 'Entretien régulier', 'Chez nous, nous comprenons que votre voiture est un investissement précieux, et c\'est pourquoi nous proposons une gamme complète de services d\'entretien professionnel pour garantir son bon fonctionnement.', 'Notre équipe qualifiée de techniciens automobiles expérimentés est là pour prendre soin de votre véhicule, qu\'il s\'agisse d\'une petite citadine, d\'un SUV familial ou d\'une voiture de sport. Nous nous engageons à fournir des services d\'entretien de qualité supérieure pour prolonger la durée de vie de votre voiture, améliorer sa performance et maintenir votre sécurité sur la route.', 'N\'hésitez pas à nous contacter pour planifier un rendez-vous d\'entretien ou pour obtenir des informations supplémentaires sur nos services. Nous sommes là pour vous aider à prendre soin de votre véhicule et à garantir qu\'il fonctionne de manière optimale pour les années à venir. Faites confiance à notre expertise et laissez-nous prendre soin de votre voiture avec le plus grand soin.', 'Entretien, révision, vidange', 'Climatisation (recharge, installation, détection de fuite)', 'Pré-contrôle technique', 'Diagnostic suspension-amortisseurs', 'Freins (plaquettes, disques, étriers)', 'carmaintenance1-65c054ae6bc9d567365674.jpg', 1139896, '2024-02-05 05:23:26');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` longtext NOT NULL,
  `note` int(11) NOT NULL,
  `approuve` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `temoignage`
--

INSERT INTO `temoignage` (`id`, `nom`, `commentaire`, `note`, `approuve`, `updated_at`) VALUES
(1, 'John Doe', 'Du bon travail !', 5, 1, '2024-02-05 05:25:48'),
(2, 'Johnny', 'Bravo', 3, 1, '2024-02-05 05:26:20'),
(3, 'Raphaelle', 'Ça pourrait être mieux.', 2, 1, '2024-02-05 05:28:18'),
(4, 'Daniel', 'Je vous remercie pour l\'ensemble de votre travail. Ce n\'est pas toujours évident.', 4, 1, '2024-02-05 05:30:35'),
(5, 'Sarah', 'Tout est parfait. Ça marche à merveille.', 5, 1, '2024-02-05 05:33:15');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage_employes`
--

CREATE TABLE `temoignage_employes` (
  `temoignage_id` int(11) NOT NULL,
  `employes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `temoignage_employes`
--

INSERT INTO `temoignage_employes` (`temoignage_id`, `employes_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `libelle` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `libelle`) VALUES
(1, 'Berline'),
(2, 'Coupé'),
(3, 'SUV'),
(4, '4x4');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `modele_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `carburant_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `options` longtext DEFAULT NULL,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `marque_id`, `modele_id`, `categorie_id`, `type_id`, `carburant_id`, `titre`, `prix`, `annee`, `kilometrage`, `description`, `options`, `date_ajout`) VALUES
(1, 1, 1, 1, 3, 4, 'Citroën C5 AIRCROSS', 21900, 2021, 32500, 'Velit aspernatur pariatur in molestias. Ipsum dolorum quo necessitatibus qui itaque.\r\n\r\nEaque architecto non sed aliquam libero. Rerum a inventore rerum. Et libero aut fuga dolorum sed fugit iure. Vel aut debitis tenetur similique at temporibus officiis.', 'Eaque architecto non sed aliquam libero. Rerum a inventore rerum. Et libero aut fuga dolorum sed fugit iure. Vel aut debitis tenetur similique at temporibus officiis.\r\n\r\nVelit aspernatur pariatur in molestias. Ipsum dolorum quo necessitatibus qui itaque.', '2024-02-05 06:18:10'),
(2, 2, 2, 1, 4, 1, 'Dacia Duster Blue dCi 115 4X4 Extreme', 24999, 2024, 5, 'Ducimus est ad qui at exercitationem. Reiciendis velit dolor ut.\r\n\r\nIpsam eum sit facilis eos enim qui iste qui. Alias ipsa rerum hic rerum impedit nisi aliquam.', 'Ipsam eum sit facilis eos enim qui iste qui. Alias ipsa rerum hic rerum impedit nisi aliquam.\r\n\r\nDucimus est ad qui at exercitationem. Reiciendis velit dolor ut.', '2024-02-05 06:21:00'),
(3, 3, 3, 1, 2, 2, 'Mercedes-AMG GT2', 495000, 2023, 150, 'Fugiat quidem ut quibusdam dolor sint. Optio repudiandae fugit totam. Voluptatem quo hic placeat sit nulla.\r\nAutem quo aut autem ut doloribus omnis veniam. Sint libero sit qui rem non quos possimus qui. Eos officiis officiis vitae excepturi accusamus animi et. Rerum consequatur quidem quia rem illo nulla.', 'Autem quo aut autem ut doloribus omnis veniam. Sint libero sit qui rem non quos possimus qui. Eos officiis officiis vitae excepturi accusamus animi et. Rerum consequatur quidem quia rem illo nulla.\r\n\r\nFugiat quidem ut quibusdam dolor sint. Optio repudiandae fugit totam. Voluptatem quo hic placeat sit nulla.', '2024-02-05 06:24:17'),
(4, 4, 4, 1, 2, 2, 'Porsche 911 GT3 RS', 255300, 2022, 7500, 'Corporis necessitatibus est dolore ut rerum dolores. Assumenda animi facere aliquid.\r\n\r\nAnimi et molestiae et qui pariatur alias ut placeat. Quidem dolorum nulla odio. Voluptatem est voluptatem magnam soluta.', 'Animi et molestiae et qui pariatur alias ut placeat. Quidem dolorum nulla odio. Voluptatem est voluptatem magnam soluta.\r\n\r\nCorporis necessitatibus est dolore ut rerum dolores. Assumenda animi facere aliquid.', '2024-02-05 06:26:38'),
(5, 5, 5, 1, 1, 3, 'BMW i4 M50 544ch', 87493, 2023, 350, 'Commodi earum ab cum. Accusantium repellendus velit eveniet et. Iusto molestiae ea vel praesentium autem facilis autem aut. A sed quis voluptatum iste corrupti quisquam.\r\n\r\nQui ut itaque dolores assumenda reprehenderit. Autem delectus incidunt qui soluta. Voluptates cumque magnam velit dolorem ullam harum sequi cupiditate. Voluptatum veniam veritatis fugiat nam nulla.', 'Qui ut itaque dolores assumenda reprehenderit. Autem delectus incidunt qui soluta. Voluptates cumque magnam velit dolorem ullam harum sequi cupiditate. Voluptatum veniam veritatis fugiat nam nulla.\r\n\r\nCommodi earum ab cum. Accusantium repellendus velit eveniet et. Iusto molestiae ea vel praesentium autem facilis autem aut. A sed quis voluptatum iste corrupti quisquam.', '2024-02-05 06:29:08'),
(6, 6, 6, 1, 2, 2, 'Bugatti Chiron special editions super sport 300', 4500000, 2023, 3500, 'Nesciunt optio nihil in cumque fuga. Ut et molestias quis nulla sint. Sed quas cupiditate a ut dolores.\r\n\r\nQuasi aperiam doloremque est nisi. Quia distinctio nam cum aliquid quisquam. Rem consequatur nihil voluptas optio enim officia.', 'Quasi aperiam doloremque est nisi. Quia distinctio nam cum aliquid quisquam. Rem consequatur nihil voluptas optio enim officia.\r\n\r\nNesciunt optio nihil in cumque fuga. Ut et molestias quis nulla sint. Sed quas cupiditate a ut dolores.', '2024-02-05 06:31:43'),
(7, 7, 7, 1, 1, 6, 'Toyota Mirai 154ch Hydrogène', 45700, 2022, 12547, 'Quis dolorum fugit alias. Cupiditate non voluptas iusto. Minus unde alias officia ipsa atque non.\r\n\r\nRerum at est et aut. Assumenda delectus est enim repellat et delectus omnis unde. Id maiores aut praesentium quisquam qui ut.', 'Rerum at est et aut. Assumenda delectus est enim repellat et delectus omnis unde. Id maiores aut praesentium quisquam qui ut.\r\n\r\nQuis dolorum fugit alias. Cupiditate non voluptas iusto. Minus unde alias officia ipsa atque non', '2024-02-05 06:33:58');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_employes`
--

CREATE TABLE `vehicule_employes` (
  `vehicule_id` int(11) NOT NULL,
  `employes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule_employes`
--

INSERT INTO `vehicule_employes` (`vehicule_id`, `employes_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_image`
--

CREATE TABLE `vehicule_image` (
  `id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vehicule_image`
--

INSERT INTO `vehicule_image` (`id`, `vehicule_id`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 1, 'citroen-65c06182cc263033090089.png', 437306, '2024-02-05 06:18:10'),
(2, 1, 'citroen-2-65c06182cc805293653474.png', 778139, '2024-02-05 06:18:10'),
(3, 1, 'citroen-3-65c06182ccbe2334488153.png', 888848, '2024-02-05 06:18:10'),
(4, 2, 'duster-65c0622cd26ec492223019.webp', 333220, '2024-02-05 06:21:00'),
(5, 2, 'duster1-65c0622cd36b2619591146.webp', 198910, '2024-02-05 06:21:00'),
(6, 2, 'duster2-65c0622cd3b44198767245.webp', 407360, '2024-02-05 06:21:00'),
(7, 3, 'mercedes-gt2-65c062f182043731600272.jpeg', 1001449, '2024-02-05 06:24:17'),
(8, 3, 'mercedes-gt2-2-65c062f1826fe059805274.jpeg', 823220, '2024-02-05 06:24:17'),
(9, 3, 'mercedes-gt2-3-65c062f182b79972286553.jpeg', 774763, '2024-02-05 06:24:17'),
(10, 4, 'porche-65c0637e3558e050736578.png', 707251, '2024-02-05 06:26:38'),
(11, 4, 'porche-2-65c0637e35dd3323764900.png', 617684, '2024-02-05 06:26:38'),
(12, 4, 'porche-3-65c0637e36222628437468.png', 1990786, '2024-02-05 06:26:38'),
(13, 5, 'bmw-2-65c06414ebdf4137995261.png', 278240, '2024-02-05 06:29:08'),
(14, 5, 'bmw-3-65c06414ec30c962876066.png', 274749, '2024-02-05 06:29:08'),
(15, 5, 'bmw-65c06414ec6ea138326993.png', 105640, '2024-02-05 06:29:08'),
(16, 6, 'chiron-65c064afdac60846941615.jpeg', 67496, '2024-02-05 06:31:43'),
(17, 6, 'chiron2-65c064afdb181715751472.jpeg', 34985, '2024-02-05 06:31:43'),
(18, 6, 'chiron3-65c064afdb49e159226346.jpeg', 44753, '2024-02-05 06:31:43'),
(19, 7, 'mirai-65c06536b054c274397044.jpg', 1615392, '2024-02-05 06:33:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carburant`
--
ALTER TABLE `carburant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A94BC0F0E7927C74` (`email`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_100285584827B9B2` (`marque_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temoignage_employes`
--
ALTER TABLE `temoignage_employes`
  ADD PRIMARY KEY (`temoignage_id`,`employes_id`),
  ADD KEY `IDX_2B728EF0F2410A1E` (`temoignage_id`),
  ADD KEY `IDX_2B728EF0F971F91F` (`employes_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_292FFF1D4827B9B2` (`marque_id`),
  ADD KEY `IDX_292FFF1DAC14B70A` (`modele_id`),
  ADD KEY `IDX_292FFF1DBCF5E72D` (`categorie_id`),
  ADD KEY `IDX_292FFF1DC54C8C93` (`type_id`),
  ADD KEY `IDX_292FFF1D32DAAD24` (`carburant_id`);

--
-- Index pour la table `vehicule_employes`
--
ALTER TABLE `vehicule_employes`
  ADD PRIMARY KEY (`vehicule_id`,`employes_id`),
  ADD KEY `IDX_E5193BDB4A4A3511` (`vehicule_id`),
  ADD KEY `IDX_E5193BDBF971F91F` (`employes_id`);

--
-- Index pour la table `vehicule_image`
--
ALTER TABLE `vehicule_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5E4FC0D4A4A3511` (`vehicule_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carburant`
--
ALTER TABLE `carburant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `vehicule_image`
--
ALTER TABLE `vehicule_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `temoignage_employes`
--
ALTER TABLE `temoignage_employes`
  ADD CONSTRAINT `FK_2B728EF0F2410A1E` FOREIGN KEY (`temoignage_id`) REFERENCES `temoignage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2B728EF0F971F91F` FOREIGN KEY (`employes_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `FK_292FFF1D32DAAD24` FOREIGN KEY (`carburant_id`) REFERENCES `carburant` (`id`),
  ADD CONSTRAINT `FK_292FFF1D4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `FK_292FFF1DAC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`),
  ADD CONSTRAINT `FK_292FFF1DBCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_292FFF1DC54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Contraintes pour la table `vehicule_employes`
--
ALTER TABLE `vehicule_employes`
  ADD CONSTRAINT `FK_E5193BDB4A4A3511` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E5193BDBF971F91F` FOREIGN KEY (`employes_id`) REFERENCES `employes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vehicule_image`
--
ALTER TABLE `vehicule_image`
  ADD CONSTRAINT `FK_F5E4FC0D4A4A3511` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
