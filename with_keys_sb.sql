-- --------------------------------------------------------
-- Hostiteľ:                     127.0.0.1
-- Verze serveru:                8.0.28 - MySQL Community Server - GPL
-- OS serveru:                   Win64
-- HeidiSQL Verzia:              12.0.0.6502
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportování struktury pro tabulka laravel_learning.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.failed_jobs: ~0 rows (přibližně)

-- Exportování struktury pro tabulka laravel_learning.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.migrations: ~6 rows (přibližně)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(25, '2014_10_12_000000_create_users_table', 1),
	(26, '2014_10_12_100000_create_password_resets_table', 1),
	(27, '2019_08_19_000000_create_failed_jobs_table', 1),
	(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(29, '2022_04_27_161615_create_posts_table', 1),
	(30, '2022_04_27_161822_create_tags_table', 1);

-- Exportování struktury pro tabulka laravel_learning.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.password_resets: ~0 rows (přibližně)

-- Exportování struktury pro tabulka laravel_learning.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.personal_access_tokens: ~0 rows (přibližně)

-- Exportování struktury pro tabulka laravel_learning.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.posts: ~5 rows (přibližně)
INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `text`, `heading`, `slug`, `user_id`) VALUES
	(1, '2022-05-07 13:07:14', '2022-05-07 13:07:14', 'Tears \'Curiouser and curiouser!\' cried Alice hastily, afraid that it had finished this short speech, they all spoke at once, while all the creatures order one about, and called out to sea as you.', 'Expedita vitae itaque ut aut.', 'perferendis-odio-quia-qui-sapiente', 2),
	(2, '2022-05-07 13:07:14', '2022-05-07 13:07:14', 'I to do?\' said Alice. \'Call it what you mean,\' the March Hare,) \'--it was at the sides of it; so, after hunting all about it!\' Last came a rumbling of little birds and animals that had made the.', 'Minus veniam qui id aut.', 'eos-eligendi-fugit-aut-voluptatem', 2),
	(3, '2022-05-07 13:07:14', '2022-05-07 13:07:14', 'Mock Turtle, \'they--you\'ve seen them, of course?\' \'Yes,\' said Alice, and she sat down with one finger pressed upon its nose. The Dormouse shook its head impatiently, and said, very gravely, \'I.', 'Debitis similique id libero.', 'similique-vitae-a-harum-nihil', 1),
	(4, '2022-05-07 13:07:14', '2022-05-07 13:07:14', 'Alice, \'they\'re sure to happen,\' she said to the Knave of Hearts, he stole those tarts, And took them quite away!\' \'Consider your verdict,\' the King added in an offended tone. And she thought there.', 'Rem totam cupiditate enim.', 'ut-debitis-illo-labore-voluptate', 1),
	(5, '2022-05-07 13:07:14', '2022-05-07 13:07:14', 'I\'ve been changed several times since then.\' \'What do you mean that you think I should think you\'ll feel it a very poor speaker,\' said the Gryphon. \'Then, you know,\' the Hatter hurriedly left the.', 'Totam et harum qui est quis.', 'ratione-exercitationem-sed-dolores-aut', 2);

-- Exportování struktury pro tabulka laravel_learning.post_tag
CREATE TABLE IF NOT EXISTS `post_tag` (
  `post_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportování dat pro tabulku laravel_learning.post_tag: ~1 rows (přibližně)
INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
	(2, 2);

-- Exportování struktury pro tabulka laravel_learning.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.tags: ~10 rows (přibližně)
INSERT INTO `tags` (`id`, `name`) VALUES
	(1, 'Aiden Kassulke'),
	(2, 'Dr. Mack Thompson V'),
	(3, 'Raven Renner'),
	(4, 'Carlos Cummings'),
	(5, 'Noemi Hettinger'),
	(6, 'Ms. Amanda Berge'),
	(7, 'Rita Johns'),
	(8, 'Tyreek Hackett'),
	(9, 'Dr. Ilene Friesen'),
	(10, 'Pearline Jerde');

-- Exportování struktury pro tabulka laravel_learning.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Exportování dat pro tabulku laravel_learning.users: ~2 rows (přibližně)
INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Addison', 'Mohr', 'billy.murray@example.net', '2022-05-07 13:07:14', '$2y$10$/.sZw2.UtYKTnyqm09GwH.bE1rMKll0rFmhXm5wIOuu9FHvxJcGri', 'zwniynYSpA', '2022-05-07 13:07:14', '2022-05-07 13:07:14'),
	(2, 'Clare', 'Torphy', 'camylle27@example.com', '2022-05-07 13:07:14', '$2y$10$DEKL7jZQylklAcjvPsz7ue3wcNsXjLZ9srSFoJSzTSgTMg7NR62wS', 'sAn4YqswIv', '2022-05-07 13:07:14', '2022-05-07 13:07:14'),
	(3, 'Michal', 'Dzurík', 'misko7104@gmail.com', NULL, '$2y$10$Asy32B5V0kXkBge5RLWuy.OAQmb/HzkY/XysoWlEP2/hvk/WDifgG', NULL, '2022-05-07 13:21:25', '2022-05-07 13:21:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
