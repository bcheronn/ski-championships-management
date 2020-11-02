SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de données : `scm`
--
CREATE DATABASE IF NOT EXISTS `scm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `scm`;
-- --------------------------------------------------------
--
-- Structure de la table `event`
--
DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `competitor`
--
DROP TABLE IF EXISTS `competitor`;
CREATE TABLE IF NOT EXISTS `competitor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `category_id` int NOT NULL,
  `profile_id` int NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `bib_number` smallint,
  `email` varchar(320) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(2048) COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_EVENT_ID` (`event_id`),
  KEY `IDX_CATEGORY_ID` (`category_id`),
  KEY `IDX_PROFILE_ID` (`profile_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `category`
--
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `profile`
--
DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `run`
--
DROP TABLE IF EXISTS `run`;
CREATE TABLE IF NOT EXISTS `run` (
  `event_id` int NOT NULL,
  `competitor_id` int NOT NULL,
  `number` int NOT NULL,
  `time` time(6) NOT NULL,
  PRIMARY KEY (`event_id`, `competitor_id`),
  KEY `IDX_EVENT_ID` (`event_id`),
  KEY `IDX_COMPETITOR_ID` (`competitor_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Structure de la table `result`
--
DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `event_id` int NOT NULL,
  `competitor_id` int NOT NULL,
  `time` time(6) NOT NULL,
  PRIMARY KEY (`event_id`, `competitor_id`),
  KEY `IDX_EVENT_ID` (`event_id`),
  KEY `IDX_COMPETITOR_ID` (`competitor_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `competitor`
--
ALTER TABLE `competitor`
ADD CONSTRAINT `FK_COMPETITOR_EVENT_ID` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_COMPETITOR_CATEGORY_ID` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_COMPETITOR_PROFILE_ID` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);
--
-- Contraintes pour la table `run`
--
ALTER TABLE `run`
ADD CONSTRAINT `FK_RUN_EVENT_ID` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RUN_COMPETITOR_ID` FOREIGN KEY (`competitor_id`) REFERENCES `competitor` (`id`) ON DELETE CASCADE;
--
-- Contraintes pour la table `result`
--
ALTER TABLE `result`
ADD CONSTRAINT `FK_RESULT_EVENT_ID` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_RESULT_COMPETITOR_ID` FOREIGN KEY (`competitor_id`) REFERENCES `competitor` (`id`) ON DELETE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;