-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2023 at 06:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الاعلان',
  `background_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الاعلان',
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `service_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي مصلحه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"كلية\", \"en\": \"College\", \"fr\": \"Collège\"}', '2023-06-01 01:56:38', '2023-06-01 04:42:12'),
(2, '{\"ar\": \"قسم\", \"en\": \"Section\", \"fr\": \"Section\"}', '2023-06-01 04:51:21', '2023-06-01 04:51:21'),
(3, '{\"ar\": \"التكوينات\", \"en\": \"Configurations\", \"fr\": \"Configurations\"}', '2023-06-01 04:51:55', '2023-06-01 04:51:55'),
(4, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '2023-06-01 04:52:20', '2023-06-01 04:52:20'),
(5, '{\"ar\": \"الحياة الطلابية\", \"en\": \"Student Life\", \"fr\": \"Vie étudiante\"}', '2023-06-01 04:52:57', '2023-06-01 04:52:57'),
(6, '{\"ar\": \"المدونة\", \"en\": \"Blog\", \"fr\": \"Blog\"}', '2023-06-01 04:54:13', '2023-06-01 04:54:13'),
(7, '{\"ar\": \"تقدم الدراسة\", \"en\": \"Study Progress\", \"fr\": \"Progrès de l\'étude\"}', '2023-06-01 04:55:18', '2023-06-01 04:55:18'),
(8, '{\"ar\": \"الخدمات الرقمية\", \"en\": \"Digital Services\", \"fr\": \"Services numériques\"}', '2023-06-01 04:55:46', '2023-06-01 06:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `diploma_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سنه استيفاء الدبلوم',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_modifications`
--

CREATE TABLE `data_modifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `first_name_ar` double NOT NULL DEFAULT '0',
  `first_name_en` double NOT NULL DEFAULT '0',
  `first_name_fr` double NOT NULL DEFAULT '0',
  `last_name_ar` double NOT NULL DEFAULT '0',
  `last_name_en` double NOT NULL DEFAULT '0',
  `last_name_fr` double NOT NULL DEFAULT '0',
  `birthday_date` date NOT NULL,
  `birthday_place_ar` double NOT NULL DEFAULT '0',
  `birthday_place_en` double NOT NULL DEFAULT '0',
  `birthday_place_fr` double NOT NULL DEFAULT '0',
  `city_ar` double NOT NULL DEFAULT '0',
  `city_en` double NOT NULL DEFAULT '0',
  `city_fr` double NOT NULL DEFAULT '0',
  `address` double NOT NULL DEFAULT '0',
  `card_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'مرفق البطاقه الوطنيه',
  `request_date` date NOT NULL COMMENT 'تاريخ الطلب',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `id` bigint UNSIGNED NOT NULL,
  `description` json NOT NULL,
  `deadline_date_start` date NOT NULL,
  `deadline_date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `description`, `deadline_date_start`, `deadline_date_end`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"<p>يسشيشسي</p>\", \"en\": \"<p>يشسيشسيشس</p>\", \"fr\": \"<p>يشسيشس</p>\"}', '2019-06-04', '2019-10-15', '2023-06-01 01:57:14', '2023-06-01 02:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Nevada Huffman\", \"en\": \"Garrett Harper\", \"fr\": \"Alvin Nelson\"}', '2023-06-01 01:24:50', '2023-06-01 01:24:50'),
(2, '{\"ar\": \"Stewart Bass\", \"en\": \"Derek Rowe\", \"fr\": \"Galvin Floyd\"}', '2023-06-01 01:24:54', '2023-06-01 01:24:54'),
(3, '{\"ar\": \"Pearl Moses\", \"en\": \"Xandra Flores\", \"fr\": \"Tatyana Hurley\"}', '2023-06-01 01:24:58', '2023-06-01 01:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `department_branches`
--

CREATE TABLE `department_branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_name` json NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_branches`
--

INSERT INTO `department_branches` (`id`, `branch_name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Dillon Sosa\", \"en\": \"Vance Sanchez\", \"fr\": \"Nicole Harris\"}', 2, '2023-06-01 01:28:46', '2023-06-01 01:28:46'),
(2, '{\"ar\": \"Breanna Gomez\", \"en\": \"Armand Terry\", \"fr\": \"Ray Callahan\"}', 1, '2023-06-01 01:28:52', '2023-06-01 01:28:52'),
(3, '{\"ar\": \"Owen Rivera\", \"en\": \"Irene Maldonado\", \"fr\": \"Lillian Leblanc\"}', 1, '2023-06-01 01:28:58', '2023-06-01 01:28:58'),
(4, '{\"ar\": \"Gemma Thompson\", \"en\": \"Keiko Velazquez\", \"fr\": \"Keelie Alvarez\"}', 3, '2023-06-01 01:29:04', '2023-06-01 01:29:04'),
(5, '{\"ar\": \"Craig Carver\", \"en\": \"Morgan Cox\", \"fr\": \"Sade Salas\"}', 1, '2023-06-01 01:29:12', '2023-06-01 01:29:12'),
(6, '{\"ar\": \"Daphne Camacho\", \"en\": \"Jorden Stephenson\", \"fr\": \"Justin Aguilar\"}', 1, '2023-06-01 01:29:18', '2023-06-01 01:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `department_branch_students`
--

CREATE TABLE `department_branch_students` (
  `id` bigint UNSIGNED NOT NULL,
  `register_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_restart_register` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'اعاده التسجيل في ذلك التخصص الفرعي',
  `user_id` bigint UNSIGNED NOT NULL,
  `department_branch_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `document_type_id` bigint UNSIGNED NOT NULL COMMENT 'نوع الوثيقه',
  `withdraw_by_proxy` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'سحب بالوكاله',
  `person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'اسم الموكل اليه',
  `national_id_of_person` bigint DEFAULT NULL COMMENT 'رقم البطاقه الوطنيه للموكل اليه',
  `card_image` longtext COLLATE utf8mb4_unicode_ci COMMENT 'صوره البطاقه',
  `request_date` date NOT NULL COMMENT 'تاريخ الطلب',
  `pull_type` enum('temporary','final') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع السحب مؤقت او نهائي',
  `pull_date` date DEFAULT NULL COMMENT ' تاريخ السحب',
  `pull_return` date DEFAULT NULL COMMENT 'تاريخ الارجاع',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint UNSIGNED NOT NULL,
  `document_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` bigint UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `department_branch_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `group_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Tucker Goodman\", \"en\": \"Madonna Mathews\", \"fr\": \"Robin Franklin\"}', '2023-06-01 01:48:08', '2023-06-01 01:48:08'),
(2, '{\"ar\": \"Freya Kline\", \"en\": \"Lacota Finley\", \"fr\": \"Nicholas Howe\"}', '2023-06-01 01:48:13', '2023-06-01 01:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `internal_ads`
--

CREATE TABLE `internal_ads` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `date_ads` date NOT NULL,
  `url_ads` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_22_110450_create_departments_table', 1),
(6, '2023_05_22_110559_create_department_branches_table', 1),
(7, '2023_05_22_110837_create_department_branch_students_table', 1),
(8, '2023_05_22_111516_create_deadlines_table', 1),
(9, '2023_05_22_111729_create_services_table', 1),
(10, '2023_05_22_111846_create_internal_ads_table', 1),
(11, '2023_05_22_113159_create_settings_table', 1),
(12, '2023_05_22_113320_create_groups_table', 1),
(13, '2023_05_22_113439_create_subjects_table', 1),
(14, '2023_05_22_113705_create_units_table', 1),
(15, '2023_05_22_114031_create_subject_students_table', 1),
(16, '2023_05_22_114420_create_subject_unit_doctors_table', 1),
(17, '2023_05_22_120413_create_subject_exams_table', 1),
(18, '2023_05_22_121009_create_subject_exam_students_table', 1),
(19, '2023_05_22_121421_create_subject_exam_student_results_table', 1),
(20, '2023_05_22_122053_create_categories_table', 1),
(21, '2023_05_22_122219_create_videos_table', 1),
(22, '2023_05_22_122506_create_advertisements_table', 1),
(23, '2023_05_22_124303_create_presentations_table', 1),
(24, '2023_05_22_124801_create_sliders_table', 1),
(25, '2023_05_22_124911_create_words_table', 1),
(26, '2023_05_22_125358_create_pages_table', 1),
(27, '2023_05_22_125631_create_university_settings_table', 1),
(28, '2023_05_28_065027_create_document_types_table', 1),
(29, '2023_05_29_055119_create_elements_table', 1),
(30, '2023_05_29_055841_create_process_degrees_table', 1),
(31, '2023_05_29_061751_create_point_statements_table', 1),
(32, '2023_05_29_062617_create_process_exams_table', 1),
(33, '2023_05_29_063315_create_student_requests_table', 1),
(34, '2023_05_29_064057_create_documents_table', 1),
(35, '2023_05_29_071604_create_certificates_table', 1),
(36, '2023_05_29_072115_create_data_modifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `images` json DEFAULT NULL,
  `files` json DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `images`, `files`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/90861685618001.jpg\", \"uploads/pagesImage/92121685618001.jpg\", \"uploads/pagesImage/49681685618001.jpg\"]', '[]', 1, '2023-06-01 04:40:59', '2023-06-01 08:13:21'),
(2, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board\", \"fr\": \"Foundation Board\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Structure du coll&egrave;ge</p>\"}', '[\"uploads/pagesImage/8931685618107.jpg\", \"uploads/pagesImage/55221685618107.jpg\", \"uploads/pagesImage/92411685618107.jpg\"]', '[]', 1, '2023-06-01 05:07:03', '2023-06-01 08:15:07'),
(4, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/82311685618196.jpg\", \"uploads/pagesImage/15301685618196.jpg\", \"uploads/pagesImage/77151685618196.jpg\", \"uploads/pagesImage/83871685618196.png\"]', '[]', 1, '2023-06-01 04:40:59', '2023-06-01 08:16:36'),
(6, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/56091685618363.jpg\", \"uploads/pagesImage/8151685618363.png\", \"uploads/pagesImage/94501685618363.png\"]', '[]', 2, '2023-06-01 04:40:59', '2023-06-01 08:19:23'),
(7, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Deuxième partie\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/43921685618419.jpg\", \"uploads/pagesImage/54021685618419.jpg\", \"uploads/pagesImage/69631685618419.jpg\"]', '[]', 2, '2023-06-01 04:40:59', '2023-06-01 08:20:19'),
(8, '{\"ar\": \"عطلة\", \"en\": \"Holiady\", \"fr\": \"Vacances\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/39821685618513.png\", \"uploads/pagesImage/47781685618513.png\", \"uploads/pagesImage/29551685618513.jpg\"]', '[]', 3, '2023-06-01 04:40:59', '2023-06-01 08:21:53'),
(9, '{\"ar\": \"دراسات علية\", \"en\": \"Master\", \"fr\": \"Études de grenier\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/92471685618617.jpg\", \"uploads/pagesImage/30581685618617.jpg\", \"uploads/pagesImage/70211685618617.jpg\"]', '[]', 3, '2023-06-01 04:40:59', '2023-06-01 08:23:37'),
(10, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"DOCTORAT\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/19611685618705.jpg\", \"uploads/pagesImage/34491685618705.jpg\", \"uploads/pagesImage/28551685618705.jpg\"]', '[]', 3, '2023-06-01 04:40:59', '2023-06-01 08:25:05'),
(11, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/50441685605259.jpg\", \"uploads/pagesImage/3831685605259.jpg\", \"uploads/pagesImage/64031685605259.jpg\", \"uploads/pagesImage/71321685605259.jpg\", \"uploads/pagesImage/1131685605259.png\"]', '[]', 4, '2023-06-01 04:40:59', '2023-06-01 04:40:59'),
(12, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Structure du coll&egrave;ge</p>\"}', '[\"uploads/pagesImage/30421685618818.png\", \"uploads/pagesImage/17171685618818.png\", \"uploads/pagesImage/93601685618818.jpg\"]', '[]', 4, '2023-06-01 05:07:03', '2023-06-01 08:26:58'),
(13, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/60521685618894.jpg\", \"uploads/pagesImage/29491685618894.jpg\", \"uploads/pagesImage/29151685618894.jpg\"]', '[]', 4, '2023-06-01 04:40:59', '2023-06-01 08:28:14'),
(14, '{\"ar\": \"النوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/79131685618981.jpg\", \"uploads/pagesImage/98301685618981.jpg\", \"uploads/pagesImage/40711685618981.jpg\"]', '[]', 5, '2023-06-01 04:40:59', '2023-06-01 08:29:41'),
(15, '{\"ar\": \"الطلاب الاجانب\", \"en\": \"Foreign Student\", \"fr\": \"Étudiant étranger\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Structure du coll&egrave;ge</p>\"}', '[\"uploads/pagesImage/25791685619032.jpg\", \"uploads/pagesImage/88831685619032.jpg\", \"uploads/pagesImage/42321685619032.jpg\"]', '[]', 5, '2023-06-01 05:07:03', '2023-06-01 08:30:32'),
(16, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"institution Internal law\", \"fr\": \"institution Droit interne\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/6561685619115.jpg\", \"uploads/pagesImage/62481685619115.jpg\", \"uploads/pagesImage/19191685619115.jpg\"]', '[]', 5, '2023-06-01 04:40:59', '2023-06-01 08:31:55'),
(18, '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/89781685619377.jpg\", \"uploads/pagesImage/92191685619377.jpg\", \"uploads/pagesImage/5471685619377.jpg\"]', '[]', 8, '2023-06-01 04:40:59', '2023-06-01 08:36:17');
INSERT INTO `pages` (`id`, `title`, `description`, `images`, `files`, `category_id`, `created_at`, `updated_at`) VALUES
(19, '{\"ar\": \"خزانة رقمية للكلية\", \"en\": \"College Digital Locker\", \"fr\": \"Casier numérique universitaire\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/56011685619448.pdf\"]', '[]', 8, '2023-06-01 04:40:59', '2023-06-01 08:37:28'),
(20, '{\"ar\": \"مجلة الكلية الرقمية\", \"en\": \"College Digital Magazine\", \"fr\": \"Magazine numérique universitaire\"}', '{\"ar\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"en\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur!</p>\", \"fr\": \"<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Quo, Ducimus Neque. Explicabo Esse Voluptatem, Illo Non Sunt Vel Amet Et Illum, Corporis Impedit Cum Possimus Suscipit, Pariatur Incidunt Minus Quisquam&nbsp;? Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Doloribus Repellendus, Magnam Aperiam Impedit Debitis Unde Minima Nesciunt Iste, Sunt Adipisci Deleniti Reprehenderit. Totam Sequi Dolores Fugit Dicta Quam Vel Accusamus&nbsp;?</p>\\r\\n\\r\\n<p>Lorem Ipsum Dolor Sit Amet Consectetur, Adipisicing Elit. Alias Quisquam Unde Recusandae, Itaque Possimus At Maiores Eaque Et Blanditiis Dolore Nemo Quis Fuga Quaerat Explicabo Culpa Maxime Consectetur Voluptas Consequuntur&nbsp;!</p>\"}', '[\"uploads/pagesImage/25331685619508.jpg\", \"uploads/pagesImage/91641685619508.jpg\", \"uploads/pagesImage/58401685619508.jpg\"]', '[]', 8, '2023-06-01 04:40:59', '2023-06-01 08:38:28'),
(21, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"<p>البرمجة السنوية</p>\", \"en\": \"<p>Annual Programming</p>\", \"fr\": \"<p>Programmation annuelle</p>\"}', '[]', '[]', 7, '2023-06-04 03:12:51', '2023-06-04 03:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `point_statements`
--

CREATE TABLE `point_statements` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `element_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'رمز العنصر',
  `degree_student` double(12,2) NOT NULL DEFAULT '0.00' COMMENT 'درجه الطالب',
  `degree_element` double(12,2) NOT NULL DEFAULT '0.00' COMMENT 'درجه العنصر',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `images` json NOT NULL,
  `experience_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_degrees`
--

CREATE TABLE `process_degrees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `doctor_id` bigint UNSIGNED NOT NULL COMMENT 'اسم دكتور الماده',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'اسم القاعه اللي هيمتحن فيها الطالب',
  `exam_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'رقم الامتحان',
  `student_degree_before_request` double(12,2) NOT NULL DEFAULT '0.00' COMMENT 'الدرجه قبل الطلب',
  `request_type` enum('غائب','مراجعه الورقه','طلب جبر') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'مراجعه الورقه',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `student_degree_after_request` double(12,2) NOT NULL DEFAULT '0.00' COMMENT 'الدرجه بعد طلب المعالجه',
  `processing_date` date DEFAULT NULL COMMENT 'تاريخ المعالجه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_exams`
--

CREATE TABLE `process_exams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `attachment_file` longtext COLLATE utf8mb4_unicode_ci COMMENT 'مرفق اوصوره',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` date DEFAULT NULL COMMENT 'تاريخ الطلب',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سبب طلب الاعاده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process_exams`
--

INSERT INTO `process_exams` (`id`, `user_id`, `attachment_file`, `period`, `year`, `request_date`, `request_status`, `processing_request_date`, `reason`, `created_at`, `updated_at`) VALUES
(2, 1, 'uploads/process_exams/89691685513465.pdf', 'خريفيه', '2010-07-08', '2005-11-27', 'refused', '1990-02-28', '<p>dasdas</p>', '2023-05-31 03:11:05', '2023-06-01 01:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `service_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_name` json NOT NULL,
  `setting_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_requests`
--

CREATE TABLE `student_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` enum('processing_degree','processing_exam','document') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نوع الطلب',
  `request_date` date NOT NULL COMMENT 'تاريخ الطلب',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint UNSIGNED NOT NULL,
  `subject_name` json NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'الفرقه الدراسيه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `group_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Kelsey Gardner\", \"en\": \"Rigel Faulkner\", \"fr\": \"Murphy Flowers\"}', 2, '2023-06-01 01:49:13', '2023-06-01 01:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `subject_exams`
--

CREATE TABLE `subject_exams` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_date` date NOT NULL,
  `exam_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `session` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'عاديه' COMMENT 'الدوره',
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_exam_students`
--

CREATE TABLE `subject_exam_students` (
  `id` bigint UNSIGNED NOT NULL,
  `exam_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subject_exam_id` bigint UNSIGNED NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_exam_student_results`
--

CREATE TABLE `subject_exam_student_results` (
  `id` bigint UNSIGNED NOT NULL,
  `student_degree` double(12,2) NOT NULL,
  `exam_degree` double(12,2) NOT NULL,
  `date_enter_degree` date NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `subject_exam_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_students`
--

CREATE TABLE `subject_students` (
  `id` bigint UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'الطالب',
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_students`
--

INSERT INTO `subject_students` (`id`, `year`, `user_id`, `group_id`, `subject_id`, `period`, `created_at`, `updated_at`) VALUES
(1, '1994-03-28', 2, 2, 1, 'ربيعيه', '2023-06-01 01:55:11', '2023-06-01 01:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `subject_unit_doctors`
--

CREATE TABLE `subject_unit_doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'الدكتور',
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `unit_id` bigint UNSIGNED NOT NULL COMMENT 'الفصل او الوحد من الماده المختاره',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي الدكتور هيسجل فيها الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_unit_doctors`
--

INSERT INTO `subject_unit_doctors` (`id`, `year`, `user_id`, `group_id`, `subject_id`, `unit_id`, `period`, `created_at`, `updated_at`) VALUES
(1, '1977-04-10', 1, 1, 1, 2, 'ربيعيه', '2023-06-01 01:51:29', '2023-06-01 01:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_name` json NOT NULL COMMENT 'اسم الفصل',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Amethyst Rice\", \"en\": \"Beatrice Harrington\", \"fr\": \"Zelenia Jennings\"}', 1, '2023-06-01 01:50:55', '2023-06-01 01:50:55'),
(2, '{\"ar\": \"Rahim Johnson\", \"en\": \"Byron Stanley\", \"fr\": \"Lee Holder\"}', 1, '2023-06-01 01:51:06', '2023-06-01 01:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `university_settings`
--

CREATE TABLE `university_settings` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `address` json NOT NULL,
  `facebook_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double(12,2) NOT NULL DEFAULT '0.00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `university_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier_id` bigint DEFAULT NULL COMMENT 'رقم الكارنيه الجامعي',
  `national_id` bigint DEFAULT NULL COMMENT 'رقم القومي للبطاقه',
  `national_number` bigint DEFAULT NULL COMMENT 'الرقم القومي',
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الجنسيه',
  `birthday_date` date DEFAULT NULL,
  `birthday_place` json DEFAULT NULL,
  `city` json DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_type` enum('student','doctor','manger','employee','factor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `job_id` bigint DEFAULT NULL COMMENT 'الرقم الوظيفي خاصه لغير الطالب',
  `university_register_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `points`, `email_verified_at`, `university_email`, `identifier_id`, `national_id`, `national_number`, `nationality`, `birthday_date`, `birthday_place`, `city`, `address`, `user_status`, `user_type`, `job_id`, `university_register_year`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'علي', 'محمد', 'islam123@gmail.com', '$2y$10$bOpfIlQ686OCiRtnI2dKLOHthNsAM9WxFdvQWc.PH1L/F/vi5skTS', NULL, 0.00, NULL, 'university@gmail.com', 375835838573, 8888390852345632, 78756735763476, 'مصري', '2000-06-10', NULL, NULL, 'القاهره', 'active', 'student', NULL, '2022', NULL, '2023-05-30 09:14:21', '2023-05-30 09:14:21'),
(2, 'abdallah', 'mahmoud', 'admin@admin.com', '$2y$10$Hfwsrp6LxWMyF87/MnQXP.9TzOLo85WQJR0zgYi9Mq6Nh3tGNbRZa', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'manger', NULL, NULL, NULL, '2023-05-30 09:14:21', '2023-05-30 09:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `background_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` bigint UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `description` json NOT NULL,
  `role` json NOT NULL COMMENT 'الصفه الوظيفيه',
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_category_id_foreign` (`category_id`),
  ADD KEY `advertisements_service_id_foreign` (`service_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_modifications`
--
ALTER TABLE `data_modifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_modifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_branches`
--
ALTER TABLE `department_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_branches_department_id_foreign` (`department_id`);

--
-- Indexes for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_branch_students_user_id_foreign` (`user_id`),
  ADD KEY `department_branch_students_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_user_id_foreign` (`user_id`),
  ADD KEY `documents_document_type_id_foreign` (`document_type_id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elements_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internal_ads`
--
ALTER TABLE `internal_ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internal_ads_service_id_foreign` (`service_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_statements`
--
ALTER TABLE `point_statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_statements_user_id_foreign` (`user_id`);

--
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentations_category_id_foreign` (`category_id`);

--
-- Indexes for table `process_degrees`
--
ALTER TABLE `process_degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `process_degrees_user_id_foreign` (`user_id`),
  ADD KEY `process_degrees_doctor_id_foreign` (`doctor_id`),
  ADD KEY `process_degrees_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `process_exams`
--
ALTER TABLE `process_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `process_exams_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requests`
--
ALTER TABLE `student_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_group_id_foreign` (`group_id`);

--
-- Indexes for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exams_group_id_foreign` (`group_id`),
  ADD KEY `subject_exams_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject_exam_students_exam_code_unique` (`exam_code`),
  ADD KEY `subject_exam_students_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_students_subject_exam_id_foreign` (`subject_exam_id`);

--
-- Indexes for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_student_results_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_student_results_subject_exam_id_foreign` (`subject_exam_id`);

--
-- Indexes for table `subject_students`
--
ALTER TABLE `subject_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_students_user_id_foreign` (`user_id`),
  ADD KEY `subject_students_group_id_foreign` (`group_id`),
  ADD KEY `subject_students_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_unit_doctors_user_id_foreign` (`user_id`),
  ADD KEY `subject_unit_doctors_group_id_foreign` (`group_id`),
  ADD KEY `subject_unit_doctors_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_unit_doctors_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `university_settings`
--
ALTER TABLE `university_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_university_email_unique` (`university_email`),
  ADD UNIQUE KEY `users_identifier_id_unique` (`identifier_id`),
  ADD UNIQUE KEY `users_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `users_national_number_unique` (`national_number`),
  ADD UNIQUE KEY `users_job_id_unique` (`job_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `words_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_modifications`
--
ALTER TABLE `data_modifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_branches`
--
ALTER TABLE `department_branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `internal_ads`
--
ALTER TABLE `internal_ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_statements`
--
ALTER TABLE `point_statements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_degrees`
--
ALTER TABLE `process_degrees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_exams`
--
ALTER TABLE `process_exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_exams`
--
ALTER TABLE `subject_exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_students`
--
ALTER TABLE `subject_students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university_settings`
--
ALTER TABLE `university_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `advertisements_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_modifications`
--
ALTER TABLE `data_modifications`
  ADD CONSTRAINT `data_modifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_branches`
--
ALTER TABLE `department_branches`
  ADD CONSTRAINT `department_branches_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  ADD CONSTRAINT `department_branch_students_department_branch_id_foreign` FOREIGN KEY (`department_branch_id`) REFERENCES `department_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_branch_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_department_branch_id_foreign` FOREIGN KEY (`department_branch_id`) REFERENCES `department_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internal_ads`
--
ALTER TABLE `internal_ads`
  ADD CONSTRAINT `internal_ads_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `point_statements`
--
ALTER TABLE `point_statements`
  ADD CONSTRAINT `point_statements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentations`
--
ALTER TABLE `presentations`
  ADD CONSTRAINT `presentations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `process_degrees`
--
ALTER TABLE `process_degrees`
  ADD CONSTRAINT `process_degrees_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `process_degrees_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `process_degrees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `process_exams`
--
ALTER TABLE `process_exams`
  ADD CONSTRAINT `process_exams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_requests`
--
ALTER TABLE `student_requests`
  ADD CONSTRAINT `student_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD CONSTRAINT `subject_exams_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD CONSTRAINT `subject_exam_students_subject_exam_id_foreign` FOREIGN KEY (`subject_exam_id`) REFERENCES `subject_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD CONSTRAINT `subject_exam_student_results_subject_exam_id_foreign` FOREIGN KEY (`subject_exam_id`) REFERENCES `subject_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_student_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_students`
--
ALTER TABLE `subject_students`
  ADD CONSTRAINT `subject_students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_students_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  ADD CONSTRAINT `subject_unit_doctors_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_unit_doctors_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_unit_doctors_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_unit_doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
