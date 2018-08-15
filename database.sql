-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.3.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para piloti
CREATE DATABASE IF NOT EXISTS `piloti` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `piloti`;

-- Copiando estrutura para tabela piloti.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela piloti.migrations: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela piloti.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela piloti.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Getulio Prado', 'thutnaweb@gmail.com', '$2y$10$ptWf6c2Qjh/QELMA/lr3v.OdxAqbX7F2q9iBSvq93v/XjVlST0pZy', 1, '1R6yvWCJRDYdulEJFYhIr71gQbWhVvkPMLyuoODVp20qUwypwIGxGlcKT20t', '2018-08-14 23:07:08', '2018-08-14 23:48:44', NULL),
	(2, 'Thut Prado', 'getnaweb@gmail.com', '$2y$10$vaUeogblFaCBgB/5G3GWwep6.9At27YHMukwtcbC6fR1eacSHeTVi', 0, 'tQEWSQBuqIGUiFWW87wORH26FYeG0FDzvI7GnvekLofU5lZHv8A0ChjdKayM', '2018-08-14 23:08:30', '2018-08-14 23:29:18', NULL),
	(3, 'TThulio Prado', 'thutdhutn@gmail.com', '$2y$10$uyqh1x8djv9powwor.SWNeZvY9/U6Yg4zbMY/cvHH/1JRyLPnGURK', 0, 'WSffSuvjxyGiKBxeWOuKTxfqzyG09lAiMoe2FgCn8ZECzSaromSvXs9AfXav', '2018-08-14 23:08:54', '2018-08-14 23:48:17', '2018-08-14 23:48:17'),
	(4, 'Breninho Piloti', 'breninho@piloti.com.br', '$2y$10$OAT4akvstRBUenp9PiOPOOgT2Cw/WqDp80IIEveSobK3gb7GZY.7K', 0, 'hyUQYX5XH102s9ZyUy89h5MQHqHMLnjk1qhDXam0fFLz7Vbt4nofqIjbBSf1', '2018-08-14 23:09:24', '2018-08-14 23:09:24', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
