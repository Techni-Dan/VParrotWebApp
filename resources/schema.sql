CREATE DATABASE IF NOT EXISTS VParrotWebAppOne;
USE VParrotWebAppOne;

CREATE TABLE IF NOT EXISTS carburant (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(32) NOT NULL UNIQUE
);

INSERT INTO `carburant` (`id`, `libelle`) VALUES (1, 'Diesel'), (2, 'Essence'), (3, 'Électrique'), (4, 'Hybrid'), (5, 'GPL'), (6, 'Hydrogène');

CREATE TABLE IF NOT EXISTS categorie (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(32) NOT NULL UNIQUE
);

INSERT INTO `categorie` (`id`, `libelle`) VALUES (1, 'Voiture'), (2, 'Moto'), (3, 'Camion'), (4, 'Utilitaire');

CREATE TABLE IF NOT EXISTS contact (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    message longtext NOT NULL,
    date_envoi datetime NOT NULL
);

CREATE TABLE employes (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(180) NOT NULL UNIQUE,
  roles longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  date_creation datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  password varchar(255) NOT NULL
);

INSERT INTO `employes` (`id`, `nom`, `prenom`, `email`, `roles`, `date_creation`, `password`) VALUES
(1, 'PARROT', 'Vincent', 'admin@email.com', '[\"ROLE_ADMIN\"]', '2024-02-09 18:09:53', '$2y$13$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm'),
(2, 'DOE', 'John', 'user1@email.com', '[\"ROLE_EMPLOYE\"]', '2024-02-09 18:09:53', '$2y$13$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm');

CREATE TABLE horaire (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  jour varchar(100) NOT NULL,
  ouverture_matin varchar(40) NOT NULL,
  fermeture_midi varchar(40) DEFAULT NULL,
  ouverture_apres_midi varchar(40) DEFAULT NULL,
  fermeture_soir varchar(40) DEFAULT NULL
);

INSERT INTO `horaire` (`id`, `jour`, `ouverture_matin`, `fermeture_midi`, `ouverture_apres_midi`, `fermeture_soir`) VALUES
(1, 'Lundi', '08:45', '12:00', '14:00', '18:00'),
(2, 'Mardi', '08:45', '12:00', '14:00', '18:00'),
(3, 'Mercredi', '08:45', '12:00', '14:00', '18:00'),
(4, 'Jeudi', '08:45', '12:00', '14:00', '18:00'),
(5, 'Vendredi', '08:45', '12:00', '14:00', '18:00'),
(6, 'Samedi', '08:45', '12:00', 'Fermé', 'Fermé'),
(7, 'Dimanche', 'Fermé', 'Fermé', 'Fermé', 'Fermé');

CREATE TABLE marque (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom varchar(40) NOT NULL UNIQUE
);

INSERT INTO `marque` (`id`, `nom`) VALUES
(1, 'Bugatti'),
(2, 'Toyota');

CREATE TABLE modele (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  marque_id int(11) NOT NULL,
  nom varchar(50) NOT NULL,
  FOREIGN KEY (marque_id) REFERENCES marque(id)
);

INSERT INTO `modele` (`id`, `marque_id`, `nom`) VALUES
(1, 1, 'Chiron'),
(2, 2, 'Mirai II');

CREATE TABLE service (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titre varchar(100) NOT NULL,
  description1 longtext DEFAULT NULL,
  description2 longtext DEFAULT NULL,
  description3 longtext DEFAULT NULL,
  listeitem1 varchar(100) DEFAULT NULL,
  listeitem2 varchar(100) DEFAULT NULL,
  listeitem3 varchar(100) DEFAULT NULL,
  listeitem4 varchar(100) DEFAULT NULL,
  listeitem5 varchar(100) DEFAULT NULL,
  image_name varchar(255) DEFAULT NULL,
  image_size int(11) DEFAULT NULL,
  updated_at datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
);

INSERT INTO `service` (`id`, `titre`, `description1`, `description2`, `description3`, `listeitem1`, `listeitem2`, `listeitem3`, `listeitem4`, `listeitem5`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 'Réparation de la carrosserie et de mécanique', 'Bienvenue sur notre site dédié à la réparation de carrosserie et de mécanique automobile ! Chez nous, nous sommes fiers d\'offrir une gamme complète de services de réparation pour votre véhicule, qu\'il s\'agisse de redonner à votre carrosserie son éclat d\'origine ou de résoudre des problèmes mécaniques complexes.', 'Notre équipe de professionnels expérimentés est spécialisée dans la réparation de carrosserie. Que votre voiture ait subi des dommages mineurs ou nécessite une réparation plus importante suite à une collision, nous sommes là pour restaurer son apparence et sa structure avec précision. Nous utilisons des techniques avancées et des matériaux de haute qualité pour garantir des résultats durables et esthétiquement impeccables.', 'Contactez-nous dès aujourd\'hui pour prendre rendez-vous ou pour obtenir plus d\'informations sur nos services de réparation de carrosserie et de mécanique. Notre équipe amicale est là pour répondre à toutes vos questions et pour vous fournir des solutions adaptées à vos besoins. Faites confiance à notre expertise et redonnez à votre véhicule son état optimal !', 'Réparation et remplacement de pièces de carrosserie', 'Débosselage, ponçage', 'Réparation moteur et boîte vitesses', 'Recherche de pannes mécaniques', 'Diagnostic embarqué toutes marques', 'carrepair-1-65c0545ac2a23427139470.jpg', 1087991, '2024-02-05 05:22:02'),
(2, 'Entretien régulier', 'Chez nous, nous comprenons que votre voiture est un investissement précieux, et c\'est pourquoi nous proposons une gamme complète de services d\'entretien professionnel pour garantir son bon fonctionnement.', 'Notre équipe qualifiée de techniciens automobiles expérimentés est là pour prendre soin de votre véhicule, qu\'il s\'agisse d\'une petite citadine, d\'un SUV familial ou d\'une voiture de sport. Nous nous engageons à fournir des services d\'entretien de qualité supérieure pour prolonger la durée de vie de votre voiture, améliorer sa performance et maintenir votre sécurité sur la route.', 'N\'hésitez pas à nous contacter pour planifier un rendez-vous d\'entretien ou pour obtenir des informations supplémentaires sur nos services. Nous sommes là pour vous aider à prendre soin de votre véhicule et à garantir qu\'il fonctionne de manière optimale pour les années à venir. Faites confiance à notre expertise et laissez-nous prendre soin de votre voiture avec le plus grand soin.', 'Entretien, révision, vidange', 'Climatisation (recharge, installation, détection de fuite)', 'Pré-contrôle technique', 'Diagnostic suspension-amortisseurs', 'Freins (plaquettes, disques, étriers)', 'carmaintenance1-65c054ae6bc9d567365674.jpg', 1139896, '2024-02-05 05:23:26');

CREATE TABLE temoignage (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom varchar(100) NOT NULL,
  commentaire longtext NOT NULL,
  note int(11) NOT NULL,
  approuve tinyint(1) NOT NULL,
  updated_at datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
);

INSERT INTO `temoignage` (`id`, `nom`, `commentaire`, `note`, `approuve`, `updated_at`) VALUES
(1, 'John Doe', 'Du bon travail !', 5, 1, '2024-02-05 05:25:48'),
(2, 'Johnny', 'Bravo', 3, 1, '2024-02-05 05:26:20');

CREATE TABLE temoignage_employes (
  temoignage_id int(11) NOT NULL,
  employes_id int(11) NOT NULL,
  PRIMARY KEY (temoignage_id, employes_id),
  FOREIGN KEY (temoignage_id) REFERENCES temoignage(id),
  FOREIGN KEY (employes_id) REFERENCES employes(id)
);

INSERT INTO `temoignage_employes` (`temoignage_id`, `employes_id`) VALUES
(1, 2),
(2, 2);

CREATE TABLE type (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  libelle varchar(32) NOT NULL UNIQUE
);

INSERT INTO `type` (`id`, `libelle`) VALUES
(1, '4x4'),
(2, 'Berline'),
(3, 'Break'),
(4, 'Cabriolet'),
(5, 'Citadine'),
(6, 'Coupé'),
(7, 'Minibus'),
(8, 'Monospace'),
(9, 'Moto'),
(10, 'Pick-up'),
(11, 'Suv'),
(12, 'Voiture société');

CREATE TABLE vehicule (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  marque_id int(11) NOT NULL,
  modele_id int(11) NOT NULL,
  categorie_id int(11) NOT NULL,
  type_id int(11) NOT NULL,
  carburant_id int(11) NOT NULL,
  titre varchar(255) NOT NULL,
  prix int(11) NOT NULL,
  annee int(11) NOT NULL,
  kilometrage int(11) NOT NULL,
  description longtext NOT NULL,
  options longtext DEFAULT NULL,
  date_ajout datetime NOT NULL,
  FOREIGN KEY (marque_id) REFERENCES marque(id),
  FOREIGN KEY (modele_id) REFERENCES modele(id),
  FOREIGN KEY (categorie_id) REFERENCES categorie(id),
  FOREIGN KEY (type_id) REFERENCES type(id),
  FOREIGN KEY (carburant_id) REFERENCES carburant(id)
);

INSERT INTO `vehicule` (`id`, `marque_id`, `modele_id`, `categorie_id`, `type_id`, `carburant_id`, `titre`, `prix`, `annee`, `kilometrage`, `description`, `options`, `date_ajout`) VALUES
(1, 1, 1, 1, 6, 2, 'Bugatti Chiron special editions super sport 300', 4500000, 2023, 3500, 'Nesciunt optio nihil in cumque fuga. Ut et molestias quis nulla sint. Sed quas cupiditate a ut dolores.\r\n\r\nQuasi aperiam doloremque est nisi. Quia distinctio nam cum aliquid quisquam. Rem consequatur nihil voluptas optio enim officia.', 'Quasi aperiam doloremque est nisi. Quia distinctio nam cum aliquid quisquam. Rem consequatur nihil voluptas optio enim officia.\r\n\r\nNesciunt optio nihil in cumque fuga. Ut et molestias quis nulla sint. Sed quas cupiditate a ut dolores.', '2024-02-09 07:57:59'),
(2, 2, 2, 1, 2, 6, 'Toyota Mirai 154ch Hydrogène', 45700, 2022, 12670, 'Quis dolorum fugit alias. Cupiditate non voluptas iusto. Minus unde alias officia ipsa atque non.\r\n\r\nRerum at est et aut. Assumenda delectus est enim repellat et delectus omnis unde. Id maiores aut praesentium quisquam qui ut.', 'Rerum at est et aut. Assumenda delectus est enim repellat et delectus omnis unde. Id maiores aut praesentium quisquam qui ut.\r\n\r\nQuis dolorum fugit alias. Cupiditate non voluptas iusto. Minus unde alias officia ipsa atque non', '2024-02-09 07:59:21');

CREATE TABLE vehicule_employes (
  vehicule_id int(11) NOT NULL,
  employes_id int(11) NOT NULL,
  PRIMARY KEY (vehicule_id, employes_id),
  FOREIGN KEY (vehicule_id) REFERENCES vehicule(id),
  FOREIGN KEY (employes_id) REFERENCES employes(id)
);

INSERT INTO `vehicule_employes` (`vehicule_id`, `employes_id`) VALUES
(1, 2),
(2, 2);

CREATE TABLE vehicule_image (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  vehicule_id int(11) NOT NULL,
  image_name varchar(255) DEFAULT NULL,
  image_size int(11) DEFAULT NULL,
  updated_at datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  FOREIGN KEY (vehicule_id) REFERENCES vehicule(id)
);

INSERT INTO `vehicule_image` (`id`, `vehicule_id`, `image_name`, `image_size`, `updated_at`) VALUES
(1, 1, 'chiron-65c064afdac60846941615.jpeg', 67496, '2024-02-10 12:00:00'),
(2, 1, 'chiron2-65c064afdb181715751472.jpeg', 34985, '2024-02-10 12:00:01'),
(3, 1, 'chiron3-65c064afdb49e159226346.jpeg', 44753, '2024-02-10 12:00:02'),
(4, 2, 'mirai-65c06536b054c274397044.jpg', 1615392, '2024-02-10 12:00:03');
