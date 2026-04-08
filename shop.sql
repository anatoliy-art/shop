-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2026 г., 09:10
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `slug`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 0, 'Shose', 'shose', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/vijouZHpLS7LaGmErAZamhN6ig3phW3ghEJ5XMHv.jpg', '2026-03-24 17:10:33', '2026-03-24 17:10:33'),
(2, 0, 'Janse', 'janse', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/KNpQqsjMHLFDtKUs7RmK15Q2Kw9EKLILYGl4rKea.jpg', '2026-03-24 17:22:36', '2026-03-24 17:22:36'),
(3, 0, 'SportsWear', 'sportwear', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/QYy9DTldvaFHCkPUYU85fwJnxGS5aTDbpxNdHhpp.jpg', '2026-03-24 17:24:27', '2026-03-24 17:24:27'),
(4, 3, 'Men`s SportsWear', 'mens-sportswear', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/ApGEvFf2C0ncEoLFZkoBcKFi5eJMEMJqSJi0Oj5G.jpg', '2026-03-24 17:26:04', '2026-03-24 17:26:04'),
(5, 3, 'Womens`s SportsWear', 'womenss-sportswear', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'posts/2026-03-24/S29xqB7si2qpSu6NMvw3yHn6m3H9gxqYytKRmBXa.jpg', '2026-03-24 17:30:25', '2026-03-24 18:44:56'),
(6, 3, 'Body`s SportsWear', 'bodys-sportswear', NULL, NULL, '2026-03-24 17:32:43', '2026-03-24 18:40:20'),
(7, 0, 'Coats', 'coats', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/2U157Gb9NEti23dKTLzlwNgrABcABDp2yapBAu95.jpg', '2026-03-24 17:33:15', '2026-03-24 17:33:15'),
(8, 0, 'Sherts', 'sherts', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, aperiam!', 'category/2026-03-24/NqjQnhcm092TJK6s0lI5YBW3eSHLj0PDnOOBTg0X.jpg', '2026-03-24 17:33:40', '2026-03-24 17:33:40'),
(18, 0, 'Test', 'test', 'desc', 'category/2026-03-27/gjjru45Iu0piWgTa6bsb8goJFY15Ksckkiovy0Tu.jpg', '2026-03-27 04:11:43', '2026-03-27 04:11:43');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2026-03-26 05:33:19', '2026-03-26 05:33:19'),
(2, 'Blue', '2026-03-26 05:33:19', '2026-03-26 05:33:19'),
(3, 'Green', '2026-03-26 05:33:59', '2026-03-26 05:33:59'),
(4, 'Yllow', '2026-03-26 05:33:59', '2026-03-26 05:33:59'),
(5, 'White', '2026-03-26 05:34:26', '2026-03-26 05:34:26'),
(6, 'Black', '2026-03-26 05:34:26', '2026-03-26 05:34:26');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `name`, `comment`, `rate`, `is_published`, `created_at`, `updated_at`) VALUES
(4, 99, 'Bill', 'Optio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas.\r\nOptio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas.', 4, 1, '2026-04-07 01:22:13', '2026-04-07 01:43:29'),
(5, 99, 'Stig', 'Optio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas.', 1, 1, '2026-04-07 01:22:50', '2026-04-07 01:38:02'),
(6, 99, 'Stig2', 'Optio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas. Optio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas.', 5, 1, '2026-04-07 01:25:07', '2026-04-07 01:37:58');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_03_24_071256_create_categories_table', 2),
(7, '2026_03_24_221357_create_products_table', 3),
(8, '2026_03_26_034847_create_options_table', 4),
(11, '2026_04_06_021737_create_orders_table', 5),
(13, '2026_04_06_023540_create_order_items_table', 6),
(15, '2026_04_06_072745_create_comments_table', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `parent_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'Colors', 'Colors', '2026-03-26 01:20:03', '2026-03-26 01:20:03'),
(2, 1, 'Red', 'Red', '2026-03-26 01:20:45', '2026-03-26 01:20:45'),
(3, 1, 'Blue', 'Blue', '2026-03-26 01:21:30', '2026-03-26 01:21:30'),
(4, 1, 'Green', 'Green', '2026-03-26 01:21:48', '2026-03-26 01:21:48'),
(5, 0, 'Sizes', 'Sizes', '2026-03-26 01:22:07', '2026-03-26 01:22:07'),
(6, 5, 'S', 'S', '2026-03-26 01:22:31', '2026-03-26 01:22:31'),
(7, 5, 'L', 'L', '2026-03-26 01:22:45', '2026-03-26 01:22:45'),
(8, 5, 'M', 'M', '2026-03-26 01:23:10', '2026-03-26 01:23:10'),
(9, 5, 'XL', 'XL', '2026-03-26 01:23:26', '2026-03-26 01:23:26');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int NOT NULL,
  `summ` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `qty`, `summ`, `status`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(7, 2, 3, '10446.00', 0, 'Bill-2', 'bill@mail.ru', '111', '222', '2026-04-06 04:42:29', '2026-04-06 04:42:29'),
(8, 2, 2, '11910.00', 0, 'Bill', 'bill@mail.ru', '111', '222', '2026-04-07 03:25:25', '2026-04-07 03:25:25');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty_item` int NOT NULL,
  `summ_item` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `thumbnail`, `title`, `price`, `qty_item`, `summ_item`, `created_at`, `updated_at`) VALUES
(6, 7, 99, NULL, 'Itaque.', '2544.00', 1, '2544.00', '2026-04-06 04:42:29', '2026-04-06 04:42:29'),
(7, 7, 97, NULL, 'Ab voluptas ipsa.', '1228.00', 1, '1228.00', '2026-04-06 04:42:29', '2026-04-06 04:42:29'),
(8, 7, 96, NULL, 'A.', '6674.00', 1, '6674.00', '2026-04-06 04:42:29', '2026-04-06 04:42:29'),
(9, 8, 93, NULL, 'Possimus esse iusto iste non.', '5094.00', 1, '5094.00', '2026-04-07 03:25:25', '2026-04-07 03:25:25'),
(10, 8, 91, NULL, 'Esse sed.', '6816.00', 1, '6816.00', '2026-04-07 03:25:25', '2026-04-07 03:25:25');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `old_price` decimal(10,2) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `stars` int NOT NULL DEFAULT '0',
  `view` int NOT NULL DEFAULT '0',
  `colors` json DEFAULT NULL,
  `sizes` json DEFAULT NULL,
  `hit` tinyint(1) NOT NULL DEFAULT '0',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `sale` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `description`, `price`, `old_price`, `thumbnail`, `gallery`, `stars`, `view`, `colors`, `sizes`, `hit`, `new`, `sale`, `created_at`, `updated_at`) VALUES
(1, 1, 'Qui aliquid est recusandae.', 'qui-aliquid-est-recusandae', 'Consequatur eaque tempore recusandae reprehenderit exercitationem. Animi enim rerum totam vel minima ut. Dolore perspiciatis quos nostrum voluptatem. Autem qui optio ut. Labore minima odit esse necessitatibus voluptate. Ut eos voluptas omnis cupiditate sit. Dignissimos ipsa sed at velit aspernatur. Qui saepe delectus voluptas perferendis nihil excepturi ut et. Dicta at non unde voluptate optio ut recusandae.', '806.00', '1397.00', NULL, NULL, 2, 19, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(2, 2, 'Voluptatibus et cupiditate sed molestiae.', 'voluptatibus-et-cupiditate-sed-molestiae', 'Aperiam veritatis similique cum eos qui. Sed blanditiis est eos ab. Possimus nobis possimus ut soluta. Optio alias repudiandae dolorum illo nulla. Molestiae facere commodi et qui velit beatae. Quisquam rerum exercitationem ratione veniam aut quaerat.', '1779.00', '6831.00', NULL, NULL, 3, 1, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(3, 4, 'Placeat non necessitatibus sed.', 'placeat-non-necessitatibus-sed', 'Mollitia beatae debitis accusantium voluptatem. Quo quis et libero impedit ullam voluptas quam. Cumque eius ipsa blanditiis illum velit exercitationem aspernatur. Maiores vel asperiores expedita dolorem. Officiis sunt officia expedita nihil architecto.', '5298.00', '2221.00', NULL, NULL, 0, 36, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(4, 1, 'Voluptates ut quasi.', 'voluptates-ut-quasi', 'Libero quis voluptatem officia iste ut dicta. Molestiae ipsa quo impedit architecto delectus soluta accusantium. Aut explicabo quo velit et.', '6219.00', '9854.00', NULL, NULL, 0, 95, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(5, 2, 'Omnis eum minima est.', 'omnis-eum-minima-est', 'Et magnam distinctio rerum. Nostrum enim error quo consequatur exercitationem est et qui. Qui aut dicta minus ex corporis commodi totam in. Amet aliquid et dolor asperiores ut. Dolorem sunt itaque fuga est itaque voluptatem. Autem accusantium atque quis voluptate quia nam.', '8952.00', '332.00', NULL, NULL, 3, 53, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(6, 7, 'Ullam qui.', 'ullam-qui', 'Nihil quisquam eaque et ut sit dolores officia. Id dolorem et nostrum sed id. Nulla earum placeat consequuntur iusto ut. Dolor cumque voluptas voluptas fugiat qui vero hic inventore. A autem autem exercitationem. Quasi iusto temporibus deleniti velit ea. Rerum aliquid distinctio laborum ullam. Harum sint quidem consequatur esse eaque.', '3328.00', '6272.00', NULL, NULL, 3, 42, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(7, 7, 'Corrupti accusamus cumque.', 'corrupti-accusamus-cumque', 'Possimus doloremque velit dolore consequatur accusamus et sit corporis. Quod et praesentium quo qui odit. Libero aut esse in magnam aut. Voluptates odio minima quisquam suscipit. Nihil tenetur fugit itaque et. Rerum nemo qui et ipsa quod dolores. Vel neque deserunt labore voluptatem.', '9437.00', '3067.00', NULL, NULL, 0, 89, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(8, 6, 'Tempora odit non.', 'tempora-odit-non', 'Perspiciatis repellat enim fugit. Alias autem distinctio est ea et et. Ratione maiores voluptate fugit rerum minima. Tenetur quibusdam ut asperiores nihil totam. Sit repudiandae odit itaque ea. Rem soluta ipsam dolorum eos omnis. Fugit cupiditate est aperiam praesentium nulla omnis et. Enim ut est ut minima vel et amet labore.', '844.00', '1417.00', NULL, NULL, 1, 92, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(9, 8, 'Incidunt architecto.', 'incidunt-architecto', 'Debitis nemo molestiae error eius in dolores quis doloribus. Hic eveniet accusamus ipsum nihil deserunt qui fugit. Cum cupiditate cum sunt molestiae quo. Et aperiam eum accusamus. Nostrum dolores consequatur alias accusantium id a. Voluptas cum quaerat laudantium perspiciatis.', '2815.00', '6142.00', NULL, NULL, 4, 26, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(10, 5, 'Neque et voluptatem.', 'neque-et-voluptatem', 'Eos quam quis recusandae. Quos doloribus beatae repudiandae et. Nisi vitae omnis esse rem veniam dolor. Ad provident quis eaque incidunt consequatur nisi. Quia eos eum consequuntur perspiciatis occaecati minus. Quia non maiores dicta distinctio impedit quaerat deleniti.', '1127.00', '495.00', NULL, NULL, 3, 62, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(11, 6, 'Corrupti inventore dolor.', 'corrupti-inventore-dolor', 'Doloribus consequatur doloremque est recusandae omnis quisquam laudantium. Doloremque eius quia accusantium voluptas iure. Aspernatur quam alias voluptatem excepturi rerum non. Quo reiciendis quia sequi aut. Quisquam quas recusandae tenetur molestias cumque totam debitis.', '6161.00', '8542.00', NULL, NULL, 0, 0, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(12, 8, 'Consequatur repellendus.', 'consequatur-repellendus', 'Suscipit odio et ea qui magni asperiores voluptatibus non. Labore qui enim nam veniam. Dolore laborum ut quia rem sit quis aliquam itaque. Blanditiis assumenda harum quaerat sed beatae aliquid. Impedit necessitatibus officiis sunt voluptatem accusamus. Incidunt et provident pariatur et minima mollitia. Dolorum sapiente aspernatur necessitatibus.', '262.00', '2428.00', NULL, NULL, 5, 39, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(13, 1, 'Et et quidem.', 'et-et-quidem', 'Rem excepturi et sit reprehenderit laboriosam. Quidem harum voluptatem tempora iste voluptatem. Corporis soluta id in doloribus facilis totam. Ipsam reprehenderit totam tenetur neque est magni veniam. Dolor voluptatem sapiente maxime aut eveniet ut perspiciatis.', '9877.00', '6932.00', NULL, NULL, 2, 26, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(14, 2, 'Soluta impedit voluptas odio commodi.', 'soluta-impedit-voluptas-odio-commodi', 'Voluptatibus quis omnis voluptatem porro. Id qui veniam nobis iusto. Tempore voluptates est numquam. Facilis impedit sint et quam. Aut perferendis blanditiis voluptatibus voluptates. Ab non eos laudantium repellat exercitationem. Provident mollitia nulla harum.', '4343.00', '5622.00', NULL, NULL, 5, 62, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(15, 6, 'Minima velit et.', 'minima-velit-et', 'Dolores nihil dolore unde rerum. Qui corporis qui asperiores dolorem autem. Sit recusandae nemo labore perspiciatis. Neque laboriosam dolore in illo et sunt est. In magni at ipsum voluptatem rerum minima. Corporis doloribus voluptas aut.', '9025.00', '1143.00', NULL, NULL, 3, 85, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(16, 6, 'Libero ullam.', 'libero-ullam', 'Dolore veniam ut alias quo. Odio in explicabo ipsam nihil praesentium laudantium qui. Ad necessitatibus eum nam vel quas. Sint quae quisquam nostrum mollitia soluta omnis voluptas est. Quidem incidunt facilis facere neque in et pariatur. Modi voluptatum neque vel alias molestias totam nulla. Et ratione corrupti labore laudantium incidunt. Qui odio asperiores laboriosam est exercitationem excepturi omnis.', '3289.00', '3822.00', NULL, NULL, 2, 37, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(17, 3, 'Qui.', 'qui', 'Molestias dolor cupiditate mollitia sed ducimus ex. Et nobis atque dolores. Nulla quasi ipsam esse similique. Necessitatibus ut optio quia velit eligendi. Eius rem ullam quia tempore culpa molestias suscipit molestiae. Sint eos non minus suscipit maxime rerum voluptatem sint.', '1841.00', '7430.00', NULL, NULL, 2, 25, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(18, 6, 'Quia.', 'quia', 'Dolor perferendis eaque vero. Exercitationem nam amet molestiae quo nobis. Quo quis soluta recusandae. Corrupti nihil est eaque nam excepturi magni consequatur. In reprehenderit earum veritatis dolorem facilis ullam. Sint at tempore minima qui fugit. At molestias mollitia doloribus doloribus iusto voluptate. Ut aut necessitatibus ut voluptatem omnis suscipit illo ut. Delectus blanditiis fugiat in pariatur.', '4681.00', '6644.00', NULL, NULL, 2, 22, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(19, 6, 'Voluptas ducimus non.', 'voluptas-ducimus-non', 'Quo commodi dicta magni at. Consequuntur debitis et tenetur soluta ut. Voluptate ullam sed repellat et exercitationem. Praesentium dolor quis quam amet fugit excepturi qui. Et aut sint magni exercitationem. Quo at eius tenetur reprehenderit fugit et ut. Incidunt est accusamus in praesentium qui unde aliquam.', '7491.00', '8660.00', NULL, NULL, 5, 64, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(20, 8, 'Nisi.', 'nisi', 'Consequuntur ducimus maxime quis praesentium. Ad sint expedita officia molestiae illo. Recusandae provident voluptas esse dolorem et. Rerum non et inventore praesentium deleniti quo qui nemo. Est facilis qui expedita sunt et unde omnis culpa. Quis ut harum optio harum sunt ea et. Dolores reprehenderit fugiat ut quia quidem cumque ut. Alias non eum perferendis perferendis labore numquam eos.', '1450.00', '1694.00', NULL, NULL, 4, 7, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(21, 8, 'Consectetur quis cumque et.', 'consectetur-quis-cumque-et', 'Inventore laborum commodi voluptate voluptas vel delectus. Debitis omnis voluptatibus quae quia corporis qui. Quibusdam sit perferendis quaerat consequuntur nulla ea. Voluptas sint nisi aperiam ab. Neque voluptatem cum consequatur tenetur quia. Delectus possimus nihil ut exercitationem. Explicabo autem quia provident veniam dolorem aperiam. Libero debitis voluptas quasi.', '8626.00', '2690.00', NULL, NULL, 2, 34, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(22, 1, 'Aut quidem voluptatibus.', 'aut-quidem-voluptatibus', 'Ut est in fugit neque aut adipisci et. Molestias et ut voluptates tempora. Voluptas omnis ad aut. Doloribus modi velit iste.', '7111.00', '2549.00', NULL, NULL, 0, 89, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(23, 3, 'Maxime itaque et.', 'maxime-itaque-et', 'Quos quia qui culpa rerum. Enim voluptatem nulla iusto et vel. Provident qui distinctio dolorem vitae harum id. Aliquid minima in sunt hic est. Vel debitis non eius quidem est libero ad et.', '4573.00', '9444.00', NULL, NULL, 5, 65, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(24, 8, 'Facilis aspernatur.', 'facilis-aspernatur', 'Sapiente in voluptatem temporibus debitis consequatur. Repudiandae est veniam cumque necessitatibus. In aperiam omnis aut voluptas. Corporis mollitia enim est ducimus.', '8820.00', '6958.00', NULL, NULL, 5, 59, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(25, 1, 'Sint repudiandae.', 'sint-repudiandae', 'Vero et amet dolor iure et. Distinctio praesentium molestias veniam distinctio doloribus similique. Mollitia eveniet ut ea. Nulla ut ut a tempore ab ut. Alias quis quidem aut reiciendis aut. Ea dolorum tempora et suscipit temporibus quo id ad. In expedita saepe et voluptas ea. Cumque sunt qui omnis vero eos est voluptatem.', '6739.00', '125.00', NULL, NULL, 4, 20, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(26, 8, 'Similique dolore.', 'similique-dolore', 'Incidunt quibusdam veniam corrupti quia ullam eveniet. Blanditiis maxime at sit magnam voluptatem ipsam beatae. Maxime ut explicabo accusantium est enim. Perspiciatis voluptatibus quaerat rerum esse rerum eaque ducimus alias. Sunt dolore repellendus vero non pariatur.', '8439.00', '4670.00', NULL, NULL, 5, 79, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(27, 1, 'Est qui quo.', 'est-qui-quo', 'Adipisci tempora reiciendis amet consectetur voluptas corporis asperiores. Placeat quae excepturi soluta voluptatem laudantium fugiat facilis. Quia quas reiciendis sequi quisquam rerum voluptates adipisci nam. Et accusantium corporis occaecati eum. Sequi autem totam nulla cum. Eos sit sint numquam placeat magnam consequatur adipisci. Eius deserunt non quod. Quas perspiciatis quasi vitae repudiandae dolore.', '973.00', '249.00', NULL, NULL, 1, 94, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(28, 4, 'Ipsum eveniet inventore.', 'ipsum-eveniet-inventore', 'Natus sint aut eos ut illum quia necessitatibus. Aut laborum beatae est accusamus aut eos soluta. Voluptatem et repudiandae odit molestias est eum mollitia. Aut dolor commodi magnam praesentium qui nulla. Nihil culpa dolorem quia laudantium voluptatibus. Reprehenderit nam sit a. Et nostrum voluptas temporibus.', '4752.00', '2254.00', NULL, NULL, 3, 60, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(29, 4, 'Velit odit sed.', 'velit-odit-sed', 'Est ex veniam molestiae perspiciatis et fugiat. Sunt occaecati sed quia necessitatibus et. Sit dolorem sint dolorem fugit. Sunt est praesentium et nihil hic. Quisquam ipsa iure in velit laborum.', '9992.00', '7716.00', NULL, NULL, 3, 5, NULL, NULL, 0, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(30, 8, 'Maiores dolorem.', 'maiores-dolorem', 'Et ut voluptatibus aut ut. Nihil debitis excepturi sunt quasi placeat. Qui voluptates deserunt sunt quis. Nobis aliquid nesciunt recusandae ut ducimus non vero aliquam. Consequatur illum dolor quisquam molestias assumenda ex dolores. A delectus voluptatem et commodi. Eligendi quo facere a. Dicta aperiam laudantium fugiat necessitatibus ut perferendis culpa.', '8829.00', '8902.00', NULL, NULL, 1, 2, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(31, 1, 'Est.', 'est', 'Assumenda recusandae illum soluta eos. Cupiditate ipsum in possimus alias cupiditate. Dolorum nam esse omnis error repellat. Itaque aut iste facilis tempora earum consequatur. Et aliquid temporibus voluptatem ipsum voluptatibus at. Modi aliquid officia tempora. Natus quam a quia pariatur ex et ut. Consectetur fugit dolores voluptate aut minima laudantium aut.', '585.00', '9798.00', NULL, NULL, 5, 0, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(32, 3, 'Numquam aut ea.', 'numquam-aut-ea', 'Est consequatur ea consequatur ut. Vitae aperiam placeat doloremque aut sit reprehenderit non aliquam. Aliquid veniam quaerat sint quibusdam. Necessitatibus autem consequatur nihil architecto optio vel. Possimus nostrum aut qui quibusdam eveniet. Aspernatur sed eaque ducimus iste. Reprehenderit ut voluptatem et sunt. Veritatis officia in enim impedit qui. Officia quia sed qui.', '2958.00', '1722.00', NULL, NULL, 1, 0, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(33, 2, 'Beatae libero exercitationem.', 'beatae-libero-exercitationem', 'Porro dicta quidem et tempore. At aut sit dolores dolor. Iusto eligendi vel rerum voluptatem aut velit. A sed debitis eveniet optio. Qui autem sed quaerat assumenda. Non placeat omnis sed neque quae. Et et accusamus quos.', '1434.00', '8002.00', NULL, NULL, 3, 51, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(34, 2, 'In eos sit asperiores et.', 'in-eos-sit-asperiores-et', 'Rem animi iure nulla voluptatibus. Velit ut nihil qui expedita dicta aliquam. Sit quis voluptate et. Et earum autem repellendus illum consectetur consequatur dolor est. Est sequi consectetur reprehenderit placeat et qui voluptas possimus.', '1631.00', '5866.00', NULL, NULL, 5, 59, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(35, 7, 'Quae quasi et.', 'quae-quasi-et', 'Sequi inventore culpa ullam ea autem minus. Et tenetur rerum soluta qui repellat ea laboriosam. Quaerat voluptatem et nihil consequatur. At incidunt sit aut consequatur temporibus et ea. Eum voluptatem placeat totam repellendus. Deserunt occaecati harum est qui quo voluptas. Deleniti sunt eum autem sed provident sint.', '3964.00', '5683.00', NULL, NULL, 3, 42, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(36, 8, 'Ipsum laboriosam debitis ut.', 'ipsum-laboriosam-debitis-ut', 'Rerum delectus repudiandae debitis necessitatibus incidunt nesciunt excepturi sapiente. Ab numquam et velit possimus nihil ea. Eaque molestias omnis at ut. Iure ut laborum ut in. Eos molestiae vero et accusantium nihil velit. Omnis voluptatem quia repellat reiciendis.', '3945.00', '7635.00', NULL, NULL, 5, 87, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(37, 4, 'Aut distinctio.', 'aut-distinctio', 'Totam omnis minima aut sint. Mollitia ab aut nihil cumque optio. Maxime exercitationem porro aut doloremque est libero facere doloremque. Aut voluptatem quia aut. Ut consequatur eum necessitatibus beatae.', '8860.00', '9081.00', NULL, NULL, 4, 35, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(38, 2, 'Fugiat labore quia ipsam officia est.', 'fugiat-labore-quia-ipsam-officia-est', 'Vero quo voluptatem adipisci ipsa omnis inventore vitae. Eaque voluptas et modi porro. Expedita sunt est mollitia. Earum consequatur illum nam.', '512.00', '4025.00', NULL, NULL, 0, 20, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(39, 5, 'Qui quam.', 'qui-quam', 'Et rerum dolorem sed et. Quam autem animi magni. Quidem accusantium tempore consectetur inventore. Voluptatem laboriosam cupiditate maxime quos laboriosam vel necessitatibus. Consectetur vitae neque distinctio praesentium.', '7565.00', '5174.00', NULL, NULL, 1, 65, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(40, 5, 'Sit quod.', 'sit-quod', 'Vel sed voluptatum molestiae quis maiores aut quia. Eos soluta quo id sit voluptatem error et. Alias et distinctio enim molestias est quo excepturi. Nesciunt minus quos vel modi ipsam. Fugit sequi quibusdam ipsum exercitationem nemo minus.', '3066.00', '5640.00', NULL, NULL, 0, 68, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(41, 6, 'Autem quam pariatur nemo.', 'autem-quam-pariatur-nemo', 'Est dignissimos sit alias enim. Delectus eos quia rerum nulla. Illum enim neque rerum optio sunt vel. Sapiente minus magni officiis eius corporis. Alias accusamus adipisci sed est doloremque asperiores cum. Consectetur qui sapiente nemo dolores quia omnis. Iure molestiae voluptatum necessitatibus veritatis explicabo itaque iste dicta. Perspiciatis voluptate culpa voluptates at iste consequatur. Quis vitae tempore reprehenderit quo. Recusandae aliquam velit alias qui est esse et.', '5996.00', '5402.00', NULL, NULL, 1, 22, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(42, 1, 'Veritatis mollitia eos recusandae.', 'veritatis-mollitia-eos-recusandae', 'Mollitia enim voluptatem voluptatem magni velit sit quis. Id officia quibusdam qui vel omnis occaecati nam. Aut earum rerum cupiditate aut alias dolorem aut. Dolores quos deleniti laborum et. Placeat fugit sit inventore natus neque impedit.', '4360.00', '8544.00', NULL, NULL, 3, 95, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(43, 5, 'Est quasi.', 'est-quasi', 'Sint tenetur accusamus sint at magni. Corrupti repudiandae adipisci laborum natus. Maiores et iure sed odit dolor nemo reprehenderit. Soluta omnis dolor suscipit est rerum. Odit recusandae in aliquid ad eius aut soluta. Alias sint at et totam quia et ducimus.', '5690.00', '5364.00', NULL, NULL, 3, 71, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(44, 7, 'Sed commodi.', 'sed-commodi', 'Ducimus consequatur laudantium earum quia eaque explicabo. Repellendus consequuntur nostrum sequi molestiae est alias. Magni occaecati eius dignissimos similique et libero. Earum recusandae eos eveniet doloribus in debitis nulla. Reprehenderit quidem rem rem magni aut et occaecati. Voluptatem fuga rem a voluptatem.', '9039.00', '268.00', NULL, NULL, 0, 28, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(45, 2, 'Tempora et saepe quae et.', 'tempora-et-saepe-quae-et', 'Velit nemo amet et dolorum doloribus. Sit veritatis aut quaerat est aut aut accusantium est. Alias ab non cum ex autem aut. Consequatur magni inventore quos reiciendis omnis aliquid autem. Accusantium soluta dolorem eius quibusdam necessitatibus quis.', '9943.00', '6364.00', NULL, NULL, 2, 42, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(46, 4, 'Aliquid porro iste.', 'aliquid-porro-iste', 'Accusantium ea nesciunt atque quia aspernatur. Blanditiis dolore possimus quia sit cumque ratione soluta. Illo voluptatem eligendi beatae voluptates.', '1695.00', '2085.00', NULL, NULL, 4, 18, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(47, 4, 'Nihil non.', 'nihil-non', 'Corrupti et omnis voluptatem tempore aliquid at sed. Consectetur ratione nemo sit dolores sed ullam vitae. Occaecati sit dolores ea qui accusamus voluptatibus. Magni nam fuga rerum vero. Vel repellendus et mollitia est molestiae. Similique laboriosam voluptatum odit dolorem. Ab consequatur pariatur qui. Rerum autem omnis illo omnis asperiores tenetur ut. Architecto quia recusandae similique sit facilis. Nulla eos beatae nisi.', '6430.00', '4694.00', NULL, NULL, 3, 11, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(48, 6, 'Soluta tenetur vitae qui pariatur.', 'soluta-tenetur-vitae-qui-pariatur', 'Quisquam tempora dicta ut. Qui veritatis neque aut aut necessitatibus tempora voluptas. Quod itaque aut recusandae et iste dignissimos. Rerum sunt repellendus ipsam sit eaque sint cupiditate. Ut velit molestias aut blanditiis quos eligendi non.', '518.00', '5551.00', NULL, NULL, 1, 72, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(49, 8, 'Possimus ea cupiditate.', 'possimus-ea-cupiditate', 'Qui numquam iure reiciendis modi id consequatur et recusandae. Labore est quia architecto iusto voluptate sint quia odit. Quos eum voluptatem et ad expedita exercitationem veritatis. Necessitatibus amet cumque incidunt perferendis accusamus placeat. Voluptates accusantium autem asperiores et laboriosam quas qui. Omnis unde ea aut eaque perferendis. Perferendis corporis voluptatibus asperiores reprehenderit qui. Amet quae nostrum cumque repellat rerum et. Ex voluptas voluptas nam tempore.', '9858.00', '4707.00', NULL, NULL, 5, 96, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(50, 7, 'Similique.', 'similique', 'Saepe rerum quia ut ut. Facere odit fugiat numquam doloribus. Dignissimos quaerat iure vitae sit.', '6997.00', '9609.00', NULL, NULL, 4, 57, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(51, 2, 'Reprehenderit sit.', 'reprehenderit-sit', 'Similique molestiae magnam dolore laboriosam ut. Repellat explicabo commodi ut aliquid. Ratione itaque sed in in voluptatum commodi.', '9058.00', '6328.00', NULL, NULL, 4, 31, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(52, 2, 'Architecto omnis reprehenderit.', 'architecto-omnis-reprehenderit', 'Accusamus necessitatibus expedita itaque vel aut enim. Quaerat pariatur nulla neque est aut aperiam voluptas. Officiis at aliquam ut sunt maiores consectetur quas. Deserunt nulla vitae vel magnam molestiae. Cumque assumenda aliquam consequatur consequatur aut.', '5270.00', '1963.00', NULL, NULL, 3, 48, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(53, 3, 'Error ut.', 'error-ut', 'Omnis velit voluptatibus quia accusamus. Velit consequatur eveniet aliquam quia veritatis nulla officia. Id ullam quia harum quasi a explicabo quo iure. Delectus veniam voluptas omnis aut nam.', '4514.00', '5916.00', NULL, NULL, 2, 6, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(54, 4, 'Dolores consequatur sit.', 'dolores-consequatur-sit', 'Sint et eum est consectetur in. Autem occaecati aut quas eum vel quia aliquam corrupti. Et rerum veritatis quisquam et aperiam. Soluta unde tenetur voluptas similique ad iste nihil. Quasi consequatur quidem iure dolores minus quia animi. Deserunt ea est minus quis. Vel id quae aut facilis.', '1814.00', '7914.00', NULL, NULL, 1, 1, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(55, 8, 'Qui dolorem.', 'qui-dolorem', 'Facere expedita pariatur nisi. Omnis eos corrupti praesentium. Quod provident expedita et eos libero et amet eos. Nisi illo ab molestiae debitis. Et aliquam omnis est debitis consequatur consequatur.', '5576.00', '8372.00', NULL, NULL, 1, 94, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(56, 1, 'Voluptatem reprehenderit.', 'voluptatem-reprehenderit', 'Dolorum et suscipit nemo. Ea fuga iste minima nam. Et eveniet officia nemo doloribus hic minus culpa. Id et eaque in dicta vel quaerat hic molestias. Eos deserunt consequuntur quaerat sint est vel. Sapiente cupiditate optio maxime quia doloremque et.', '9034.00', '9968.00', NULL, NULL, 0, 88, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(57, 6, 'Eum rerum temporibus omnis.', 'eum-rerum-temporibus-omnis', 'Quis quae dicta officiis ea. Non qui ut accusantium odio sunt nulla sit. Hic magnam non sed nam. Eius vel perspiciatis quia assumenda excepturi iure inventore qui. Magni molestiae voluptate nemo accusamus minima temporibus doloribus.', '4729.00', '2028.00', NULL, NULL, 2, 2, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(58, 2, 'Provident provident modi.', 'provident-provident-modi', 'Et optio odit ut harum. Veritatis sapiente nesciunt et ea voluptas nihil. Est cumque distinctio quia aut perspiciatis. Nihil perspiciatis id rerum tempora voluptas ratione. Dolor explicabo illo vero. Quod saepe est quia totam ea. Vel tempora quod ducimus aut eius repudiandae aut.', '3006.00', '8224.00', NULL, NULL, 4, 68, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(59, 1, 'In modi quia nobis.', 'in-modi-quia-nobis', 'Qui ipsum non dolores ut qui non dolorem. Illo et omnis impedit eaque corporis. Praesentium in accusamus dolores ea et architecto temporibus minus. Aperiam blanditiis ullam atque tempora. Dolorem quidem et voluptas eos praesentium.', '2636.00', '2616.00', NULL, NULL, 1, 79, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(60, 7, 'Voluptatem molestiae repellendus velit eaque totam.', 'voluptatem-molestiae-repellendus-velit-eaque-totam', 'Voluptatem voluptatem voluptatem autem aut. Dignissimos debitis maiores magnam voluptas veniam. Et porro eum nihil saepe. Accusantium iusto illo commodi in illo. Quidem atque quia est.', '6183.00', '6125.00', NULL, NULL, 3, 16, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(61, 7, 'Voluptatibus eos rerum qui et.', 'voluptatibus-eos-rerum-qui-et', 'Non excepturi sed sapiente eius est rerum quidem. Ipsa ut et et non maiores perferendis. Facere exercitationem unde necessitatibus explicabo laudantium dolores. Culpa beatae reprehenderit dicta ipsa pariatur magnam porro. Est natus ab aspernatur voluptatibus perspiciatis vitae. Autem ullam harum consequatur neque voluptatem similique quibusdam soluta. Totam in eos optio officiis dolor non.', '5925.00', '4729.00', NULL, NULL, 3, 75, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(62, 8, 'Et ut excepturi.', 'et-ut-excepturi', 'Voluptatibus molestiae totam molestiae iusto molestias sunt non. Expedita consectetur natus itaque sed. Corrupti suscipit dolor recusandae. Illum laboriosam optio et hic dolores laudantium. Omnis ea accusamus rerum odit qui.', '9975.00', '328.00', NULL, NULL, 1, 19, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(63, 2, 'Dolore voluptates temporibus.', 'dolore-voluptates-temporibus', 'Repellat veritatis qui culpa aut in illum odio. Expedita in veritatis exercitationem atque quis est nihil quasi. Voluptatem libero beatae praesentium ratione autem. Deleniti est rerum accusantium occaecati reprehenderit et exercitationem. Repellendus commodi sit rerum veritatis veritatis voluptatem. Qui non accusantium sit. Est iure eos debitis error consequatur odio. Inventore dolores sunt dolorem aut quo eligendi. Molestias ullam delectus id qui ipsa aliquid culpa.', '8868.00', '9488.00', NULL, NULL, 0, 68, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(64, 3, 'Corporis consectetur.', 'corporis-consectetur', 'Quas quaerat blanditiis molestias nam. Soluta sunt ex neque asperiores. Placeat non in amet omnis corporis dolorem in officiis. Non ex rem molestiae perspiciatis fugit aut iste. Dolor aut et possimus error facilis qui dolor. Consequatur natus rerum deleniti itaque ex consequatur. Fuga sit iste ullam quos temporibus.', '6839.00', '9465.00', NULL, NULL, 5, 49, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(65, 5, 'Possimus non quibusdam tenetur.', 'possimus-non-quibusdam-tenetur', 'Error blanditiis qui quam temporibus. Incidunt non eligendi quia exercitationem ea deleniti. Corrupti sit repudiandae laboriosam ipsa voluptatem corrupti qui. Enim quia rem cupiditate aspernatur aliquam. Itaque sint laboriosam minus eum deleniti doloremque. Sequi nam autem alias in minima quibusdam cumque. Ad ipsum libero tempora quia veritatis et. Veritatis deserunt enim nesciunt quibusdam. Illum fugit hic ab est sit mollitia id.', '8415.00', '5001.00', NULL, NULL, 2, 18, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(66, 1, 'Assumenda et rerum.', 'assumenda-et-rerum', 'Est in architecto sit enim autem impedit est asperiores. Et est fuga repellendus est iste. Nemo consequatur magni dolor nam et. Soluta molestiae ducimus non quo. Molestiae quia consectetur maiores sit quos assumenda libero eos. Explicabo rerum sunt esse omnis. Architecto ut eos officia praesentium ea consectetur aut.', '1989.00', '3287.00', NULL, NULL, 2, 94, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(67, 7, 'Accusamus occaecati eveniet earum.', 'accusamus-occaecati-eveniet-earum', 'Similique ex perferendis dolor molestiae porro earum maiores. Iste possimus enim et voluptatibus possimus natus totam. Quia et rerum dicta at. Nihil quo ut ad aut. Culpa temporibus laborum ratione et vitae.', '9239.00', '9810.00', NULL, NULL, 3, 51, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(68, 7, 'Dicta.', 'dicta', 'Modi quia beatae fugiat. Porro ab similique earum non. Quo quo qui amet dolor et earum qui. Fuga et qui architecto voluptatum hic quis. Exercitationem reiciendis molestias magni nihil repudiandae.', '633.00', '2251.00', NULL, NULL, 4, 51, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(69, 1, 'Omnis accusantium totam.', 'omnis-accusantium-totam', 'Quia illum veniam sunt harum. Doloremque et veritatis qui ducimus corporis amet aliquam reiciendis. Commodi incidunt et ex sed molestias pariatur totam. Nisi non aut autem iure ut quia voluptatum. Earum qui consectetur optio. Voluptatum adipisci ea delectus. In aut dignissimos et nihil maiores.', '8272.00', '5823.00', NULL, NULL, 0, 5, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(70, 1, 'Nemo non.', 'nemo-non', 'Autem sit vel eveniet ducimus ipsum vel. Quo maiores eum ea aliquid ex. Qui sapiente distinctio quaerat quas veritatis culpa voluptas. Similique accusamus voluptate aut aut sed quas fugiat. Sed commodi qui eos est qui ipsam qui. Eveniet adipisci in dolores. Voluptate cumque magnam ut nam soluta tenetur voluptatem.', '5772.00', '3155.00', NULL, NULL, 0, 38, NULL, NULL, 0, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(71, 3, 'Error optio mollitia aut odio.', 'error-optio-mollitia-aut-odio', 'Cumque vero doloribus incidunt molestias. Nostrum rerum autem mollitia nihil suscipit cum ad. Aut sunt magni et dolorem voluptas sapiente. Est dolor qui cupiditate commodi. Ea molestiae dolorum ad voluptates id. Quam nulla fugit nihil ut earum adipisci sint. Pariatur est aut nisi ullam eum eveniet.', '2354.00', '3371.00', NULL, NULL, 1, 35, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(72, 6, 'Eum.', 'eum', 'Sit minima corrupti ut nostrum voluptatum. Ducimus velit neque et pariatur reprehenderit. Tempore architecto ut aut est. Sint occaecati velit similique dignissimos eos qui accusantium. Quia qui libero aut cupiditate hic. Et neque fuga qui quia nostrum quia aut. Et quam inventore omnis deleniti consequatur.', '990.00', '7409.00', NULL, NULL, 2, 21, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(73, 8, 'Ex sunt.', 'ex-sunt', 'Voluptates dolorem libero architecto quia tenetur quas nulla. Est molestias officia perspiciatis possimus alias aperiam. Incidunt dolore facere eligendi minima excepturi fuga quam. Autem voluptas quas enim accusamus. Rerum quo ea qui nostrum est aut. Et rerum quis velit voluptas vel voluptatem qui. Autem iste exercitationem reiciendis et harum aliquam. Ut dolor reprehenderit ea quas.', '2994.00', '2963.00', NULL, NULL, 2, 2, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(74, 7, 'Asperiores.', 'asperiores', 'Quo eius tempore ad aut temporibus. Ut voluptatum repellat blanditiis cum rerum est. Dignissimos qui recusandae et voluptatibus repellendus sed. Blanditiis excepturi est veritatis. Esse rerum commodi molestiae rerum. Accusantium placeat rerum enim. Ducimus dicta ab nemo qui aut quaerat et. Ipsum expedita distinctio quis itaque soluta aperiam. Doloribus id hic architecto explicabo cum harum repellendus maiores. Eligendi reiciendis architecto sed est saepe.', '4312.00', '3488.00', NULL, NULL, 2, 95, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(75, 3, 'Et vero.', 'et-vero', 'Recusandae quaerat sunt est molestiae nobis rerum omnis. Rerum ad fugit repellendus veritatis hic. Id doloribus quibusdam hic maxime. Voluptatem quia aut atque illum. Voluptates rerum nobis laudantium voluptatem voluptatem.', '9444.00', '834.00', NULL, NULL, 0, 75, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(76, 5, 'Corrupti quia.', 'corrupti-quia', 'Suscipit eos temporibus vitae quis. Qui impedit harum ut blanditiis cumque cupiditate. Sint est ducimus rerum rerum. Et voluptatem rerum aliquam non eum. Eius dolores dolor blanditiis qui repellendus. Sunt magni architecto tempora commodi quos.', '7002.00', '3622.00', NULL, NULL, 3, 82, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(77, 1, 'Molestiae expedita eos.', 'molestiae-expedita-eos', 'Est atque maiores placeat ut. Aut neque aut et occaecati quaerat dolor. Aliquid quo quo est iste voluptatem. Quos molestiae sapiente aut exercitationem explicabo illum voluptate. Laborum omnis non dolores dolore est iusto assumenda.', '1008.00', '1233.00', NULL, NULL, 0, 13, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(78, 3, 'Et nihil.', 'et-nihil', 'Culpa eum minus ipsam recusandae omnis doloremque. Excepturi labore recusandae vel ex laudantium. Error mollitia reprehenderit voluptas aspernatur. Ab voluptates rerum minus illum qui eligendi. Ad culpa quas quia.', '9592.00', '7018.00', NULL, NULL, 0, 83, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(79, 2, 'Sed in tenetur.', 'sed-in-tenetur', 'Iusto ea est sint mollitia itaque libero. Necessitatibus aut non numquam consectetur aut voluptates. Molestiae nemo aut doloremque minima facere nihil minus. Itaque ratione impedit qui sint non. Molestias necessitatibus dignissimos rerum suscipit temporibus et ea.', '8962.00', '5902.00', NULL, NULL, 3, 3, NULL, NULL, 0, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(80, 6, 'Laborum omnis.', 'laborum-omnis', 'Omnis soluta voluptatem qui debitis voluptates. Quia itaque in quos nostrum sit. Enim in magnam ullam. Dolores dolores blanditiis aperiam enim est reiciendis.', '1351.00', '3571.00', NULL, NULL, 0, 15, NULL, NULL, 0, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(81, 7, 'Possimus sint expedita natus.', 'possimus-sint-expedita-natus', 'Repellat rerum molestias laborum amet quidem autem. Qui soluta sint expedita dolorem vel sunt quis. Impedit neque ducimus atque voluptatem voluptas earum. Enim dolorum ducimus tenetur maiores quisquam odio omnis. Asperiores ducimus et sed omnis voluptas non. Aut rerum soluta molestias nostrum est dolor.', '5149.00', '2562.00', NULL, NULL, 1, 6, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(82, 6, 'Perspiciatis ut.', 'perspiciatis-ut', 'Qui culpa ut laudantium repellendus. Eos qui sit rerum dignissimos aliquam voluptatem cum. Et dicta fuga enim nam nam totam est. Non voluptatem quibusdam nemo. Ut officia iusto quis perspiciatis dolor.', '4545.00', '7970.00', NULL, NULL, 3, 98, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(83, 1, 'Dolores nostrum ad ex.', 'dolores-nostrum-ad-ex', 'Similique fugiat sint possimus sed architecto suscipit id. Dolorem ea aliquid possimus est nemo. Est fugiat est at dolor dolor eveniet. Eaque ipsa laudantium qui expedita qui temporibus. Repellendus illo et dolorem exercitationem ab nulla. Non repellendus nulla laboriosam corporis optio aut. Maxime corrupti pariatur ratione culpa perspiciatis ipsa. Magni ipsum exercitationem adipisci laboriosam.', '6525.00', '6552.00', NULL, NULL, 2, 55, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(84, 5, 'Aut at inventore.', 'aut-at-inventore', 'Laudantium optio assumenda sed voluptatem veritatis et vel. Omnis itaque ut rem eos rerum. In in et ipsam quisquam quas error. Fuga maiores odio sint et qui quidem porro similique. Sed incidunt quia repellendus accusamus quod amet. Laboriosam culpa esse voluptatum saepe blanditiis. Iste ut velit doloremque ducimus ut. Est officiis consequatur excepturi molestias temporibus sint. Nostrum cupiditate voluptatibus corporis laborum perspiciatis. Magnam nisi adipisci minima.', '7162.00', '3896.00', NULL, NULL, 2, 21, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(85, 1, 'Est a.', 'est-a', 'Voluptas autem quia quasi deleniti officiis eligendi quidem dolor. Ducimus veritatis nemo qui non nesciunt atque. Sapiente officiis rerum sunt necessitatibus quam dolorem et. Aut dolorem ea maiores. Rerum cupiditate ex sed dolores exercitationem. Ipsam aperiam tenetur quaerat et vel. Perferendis nesciunt aut amet quia vel numquam sint.', '8975.00', '3910.00', NULL, NULL, 0, 36, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(86, 4, 'Iusto eum numquam labore quam est.', 'iusto-eum-numquam-labore-quam-est', 'Saepe eveniet sequi facere. Ut porro nam tempore aut sit sequi consequatur. Perferendis sunt molestiae ipsam a. Voluptas blanditiis doloribus enim quis.', '1945.00', '3025.00', NULL, NULL, 3, 10, NULL, NULL, 0, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(87, 6, 'Et enim voluptates.', 'et-enim-voluptates', 'Praesentium qui ad quam quasi recusandae. Et incidunt commodi quae id voluptates et. Eos non non numquam provident dolore debitis. Minus sunt amet et dolorem dolores repellendus odit. Eveniet aspernatur adipisci sit voluptatibus. Placeat exercitationem nihil a ea et qui doloribus.', '8246.00', '2221.00', NULL, NULL, 5, 31, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(88, 4, 'Dolorem.', 'dolorem', 'Ut quo facilis harum consequatur sed at. Saepe ut qui ipsa non reiciendis id labore. Vero nesciunt dolorum consequatur velit. Ea voluptas quia enim aut.', '4506.00', '5620.00', NULL, NULL, 1, 11, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(89, 2, 'Quia et nemo facere sint.', 'quia-et-nemo-facere-sint', 'Minima quod ipsum quidem labore ea ipsa. Consectetur delectus quae molestias natus rem harum et. Neque adipisci vero labore. Est tempore consequatur qui quae aut. Sunt praesentium sed beatae accusantium repellat id quam et. Nobis aut earum asperiores veniam maiores recusandae. Aut maxime hic numquam aperiam nostrum eum nam deleniti.', '4195.00', '1624.00', NULL, NULL, 3, 91, NULL, NULL, 0, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(90, 7, 'Nihil dolorum ut.', 'nihil-dolorum-ut', 'Inventore enim dolorem perferendis cupiditate perspiciatis expedita optio. Et ducimus est omnis laboriosam aut. Vero quasi natus quia labore. Earum expedita a qui soluta qui. Similique et cupiditate et nihil nisi. Odit cupiditate quibusdam molestias officiis.', '8463.00', '8127.00', NULL, NULL, 3, 0, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(91, 5, 'Esse sed.', 'esse-sed', 'Qui occaecati eum voluptas. Pariatur velit vero reiciendis et. Rerum ut libero est ut vel quos quisquam. Amet fuga autem enim dolores. Iste cum ut sequi. Esse nulla qui blanditiis sed deserunt. Error eum quaerat animi aut enim nam. Esse consectetur optio expedita quaerat itaque.', '6816.00', '9129.00', NULL, NULL, 4, 25, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(92, 1, 'In quo facere.', 'in-quo-facere', 'Vel esse ducimus dolorum explicabo ex quos laudantium laudantium. Laboriosam est libero nam. Quos architecto minima earum. Corporis id eum incidunt quo qui eligendi. Alias ea debitis cupiditate architecto et eos facilis tenetur. Voluptas dolorem quis minima vel.', '8583.00', '1573.00', NULL, NULL, 2, 90, NULL, NULL, 0, 0, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(93, 3, 'Possimus esse iusto iste non.', 'possimus-esse-iusto-iste-non', 'Molestiae aut vitae corrupti fuga pariatur voluptatem perferendis. Nesciunt accusamus et ab quis nam blanditiis vitae sed. Rerum explicabo praesentium reprehenderit maiores exercitationem molestiae.', '5094.00', '187.00', NULL, NULL, 1, 68, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(94, 1, 'Nobis dicta inventore.', 'nobis-dicta-inventore', 'Quisquam esse laborum quod fugit rem cumque est. Qui molestiae ab sapiente optio. Enim non quam ipsum et nihil quis. In pariatur perspiciatis voluptatem saepe error. Eum tempora necessitatibus autem exercitationem voluptatibus est.', '8514.00', '6161.00', NULL, NULL, 3, 63, NULL, NULL, 1, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(95, 5, 'Ex voluptas maiores sint.', 'ex-voluptas-maiores-sint', 'Sed quaerat ad veniam corporis. Iusto aut reprehenderit quia fugit corrupti. Aut ipsam iusto autem labore consequatur. Temporibus et sed ea eum. Doloribus voluptatibus ea laboriosam iure occaecati neque.', '6296.00', '7222.00', NULL, NULL, 0, 62, NULL, NULL, 0, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(96, 7, 'A.', 'a', 'At ea ut nostrum delectus incidunt eveniet. At cumque repellendus aut. Itaque ad et quo. Et minima possimus non voluptates recusandae ipsum. Sit eum et omnis maiores atque fuga. Porro est est voluptates sapiente reiciendis porro et. Non reprehenderit est sequi non voluptas. Impedit quia corrupti qui.', '6674.00', '5054.00', NULL, NULL, 0, 82, NULL, NULL, 1, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(97, 2, 'Ab voluptas ipsa.', 'ab-voluptas-ipsa', 'Aperiam sit quo accusantium culpa vero. Molestiae eaque facere ea omnis. Quia omnis fugit qui voluptate maiores. Exercitationem nostrum nesciunt sed. Doloremque dicta in quod et. Dolor beatae perferendis ut.', '1228.00', '5183.00', NULL, NULL, 5, 56, NULL, NULL, 1, 1, 1, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(98, 5, 'Eum numquam mollitia ratione.', 'eum-numquam-mollitia-ratione', 'Consequatur iure et tempore veniam deleniti ullam id. Aliquid minima nisi eum tenetur aut et. Consequatur voluptates aspernatur est rerum dolor alias.', '445.00', '1465.00', NULL, NULL, 0, 95, NULL, NULL, 0, 1, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(99, 2, 'Itaque.', 'itaque', 'Optio ad et nostrum vero. Voluptatem rerum est incidunt minima. Aut accusamus iure delectus omnis at et est. Rem quia qui et sunt. Est quia odit ducimus eius. Nobis perspiciatis enim eum nisi molestias quisquam quas.', '2544.00', '7553.00', 'posts/2026-04-07/04XVYVdTg6kj6NVIaT11pxvPq6LFpOm8GytVFUzw.jpg', '[\"posts/2026-04-07/j175aliHLOhCjTdguDcnntfkcMioembKU50M9GRq.jpg\", \"posts/2026-04-07/LdU0Be6o36uw332aNTtPTNZtd6OTxSZxOVx7jRPE.jpg\", \"posts/2026-04-07/lrvMCjKXG4pNEsdoOz4bQLiK2svIxq4qeBOMsatP.jpg\"]', 2, 61, NULL, NULL, 1, 0, 1, '2026-03-24 20:04:38', '2026-04-07 01:34:01'),
(100, 8, 'Alias nihil libero esse.', 'alias-nihil-libero-esse', 'Eaque sunt aut impedit omnis. Adipisci non eos voluptatem voluptatem nesciunt excepturi dolor. Aut soluta eum molestiae impedit. Sit cumque natus eligendi non perspiciatis. Voluptates aut quia cupiditate est reprehenderit. Itaque libero et quos incidunt voluptatem quia. In impedit voluptas nemo quasi impedit possimus. Sit excepturi nesciunt minus commodi saepe. Aliquam non odit eos laboriosam omnis ad sint quia.', '2972.00', '1654.00', NULL, NULL, 3, 2, NULL, NULL, 0, 0, 0, '2026-03-24 20:04:38', '2026-03-24 20:04:38'),
(113, 4, 'Product 1', 'product-1', 'Consequatur iure et tempore veniam deleniti ullam id. Aliquid minima nisi eum tenetur aut et. ConsequaturConsequatur iure et tempore veniam deleniti ullam id. Aliquid minima nisi eum tenetur aut et. ConsequaturConsequatur iure et tempore veniam deleniti ullam id. Aliquid minima nisi eum tenetur aut et. Consequatur', '100.00', NULL, 'posts/2026-03-27/ZBz4M1e0nUb6L9Ayy2jkHDlWrNNh4omXoDAjn7uR.jpg', '[\"posts/2026-03-27/Xs8ZpsamJrt2CkGsQbRzE7gFWZsi3KDydoN4EJfC.jpg\"]', 0, 0, '[\"Red\", \"Blue\", \"Green\"]', '[\"M\", \"XL\", \"XXL\"]', 1, 1, 0, '2026-03-26 04:06:54', '2026-03-27 05:28:24');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'XS', '2026-03-26 05:44:57', '2026-03-26 05:44:57'),
(2, 'S', '2026-03-26 05:44:57', '2026-03-26 05:44:57'),
(3, 'M', '2026-03-26 05:45:12', '2026-03-26 05:45:12'),
(4, 'L', '2026-03-26 05:45:12', '2026-03-26 05:45:12'),
(5, 'XL', '2026-03-26 05:45:29', '2026-03-26 05:45:29'),
(6, 'XXL', '2026-03-26 05:45:29', '2026-03-26 05:45:29');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.ru', NULL, '$2y$12$L47VKgLVe.EUav7GQGWiFeLE0wAQpTM6UnSKkLCNOF3w1oDRWWK3q', '2IwkLB9CLMwuTorlCJvy9VG8bE9jnjARi0SjzdtNBPBQ0sagr3njjM18w91B', 1, '2026-03-24 15:13:49', '2026-03-24 15:13:49'),
(2, 'Bill', 'bill@mail.ru', NULL, '$2y$12$rruHleWGPntkkFusqpEK6exAPxEuFCLN1UWAgBYe4oTcfqAEHdXaK', NULL, 0, '2026-04-06 04:34:46', '2026-04-06 04:34:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
