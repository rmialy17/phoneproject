-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 avr. 2022 à 00:05
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phoneproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_81398E09E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `created_at`, `username`, `roles`) VALUES
(19, 'mobilephoneandco@gmail.com', '$2y$13$L6Db5ByCj3EPnlSHQYCAreI.zLct63qvxqq0Uxm/yxjLeeb0eNNhK', '2022-04-01 01:26:53', 'MobilePhoneandCo', 'a:0:{}'),
(20, 'phone.company@gmail.com', '$2y$13$F8bTR3BtaV.PrpKMe76sEeFst9v3nzGxQzOW27BwKJ7zxdBHUzJx6', '2022-04-01 01:26:53', 'PhoneCompany', 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220328150136', '2022-03-30 16:19:25', 83),
('DoctrineMigrations\\Version20220328152132', '2022-03-30 16:19:25', 24),
('DoctrineMigrations\\Version20220328154221', '2022-03-30 16:19:25', 30),
('DoctrineMigrations\\Version20220328154439', '2022-03-30 16:19:25', 50),
('DoctrineMigrations\\Version20220328160301', '2022-03-30 21:17:23', 206),
('DoctrineMigrations\\Version20220328191118', '2022-03-30 21:19:01', 76),
('DoctrineMigrations\\Version20220330102554', '2022-03-30 21:19:25', 137),
('DoctrineMigrations\\Version20220330111307', '2022-03-30 21:19:25', 72),
('DoctrineMigrations\\Version20220330212033', '2022-03-30 21:20:40', 388),
('DoctrineMigrations\\Version20220401004237', '2022-04-01 00:43:02', 164);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `currency` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `currency`, `brand`, `created_at`) VALUES
(31, 'XIAOMI REDMI NOTE 11 BLEU', '4go ram+128go de stockage-snapdragon 680.', 1267.99, 'EUR', 'Xiaomi', '2022-04-01 01:26:53'),
(32, 'APPLE IPHONE 13 PRO MAX BLANC', 'OS iOS 15 - 128Go de ROM.', 910.99, 'EUR', 'Apple', '2022-04-01 01:26:53'),
(33, 'SAMSUNG GALAXY S20 NOIR', 'Grand écran ultra fluide Infinity 6,5 Full HD+ : (2400 x 1080) – 405 ppp 120 Hz.', 887.9, 'EUR', 'Samsung', '2022-04-01 01:26:53'),
(34, 'SAMSUNG GALAXY S21 ARGENT', 'OS Android 12 - 128Go de ROM 6Go de RAM.', 899, 'EUR', 'Samsung', '2022-04-01 01:26:53'),
(35, 'APPLE IPHONE 13 PRO MAX OR', 'OS iOS 15 - 128Go de ROM.', 752.5, 'EUR', 'Samsung', '2022-04-01 01:26:53'),
(36, 'XIAOMI 11 LITE NOIR', 'OS Android - 128Go de ROM, 8Go de RAM.', 855, 'EUR', 'Apple', '2022-04-01 01:26:53'),
(37, 'GOOGLE PIXEL 6 BLEU', 'OS Android - 128Go de ROM, 12Go de RAM.', 1165.99, 'EUR', 'Google', '2022-04-01 01:26:53'),
(38, 'XIAOMI REDMI NOTE 10 BLANC', 'MIUI 12 basé sur Android 11 - 128 Go de ROM et 6 Go de RAM.', 926.76, 'EUR', 'Xiaomi', '2022-04-01 01:26:53'),
(39, 'ONEPLUS ONEPLUS 9 BLEU', 'Qualcomm® snapdragon™ 888.', 1003.99, 'EUR', 'One Plus', '2022-04-01 01:26:53'),
(40, 'APPLE IPHONE XR NOIR', 'OS iOS 15 - 256Go de ROM.', 698, 'EUR', 'Apple', '2022-04-01 01:26:53');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D6499395C3F3` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `customer_id`, `email`, `created_at`, `first_name`, `last_name`) VALUES
(15, 19, 'user1@gmail.com', '2022-04-01 01:26:53', 'Edouard', 'Leclerc'),
(16, 20, 'user2@gmail.com', '2022-04-01 01:26:53', 'Jean', 'Latour'),
(17, 19, 'user3@gmail.fr', '2022-04-01 01:26:53', 'Ernest', 'Dupont'),
(18, 20, 'user4@gmail.com', '2022-04-01 01:26:53', 'Martine', 'Durand'),
(19, 19, 'user5@gmail.com', '2022-04-01 01:26:53', 'Louise', 'Chateau');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6499395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
