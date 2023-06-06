-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2023 at 12:51 PM
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

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `image`, `background_image`, `category_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Dolorem rem nisi vol\", \"en\": \"Dolorem rem nisi vol\", \"fr\": \"Dolorem rem nisi vol\"}', '{\"ar\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"en\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"fr\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\"}', 'uploads/advertisements/images/23121685953998.png', 'uploads/advertisements/background_image/10611685883374.jpg', 1, 5, '2023-06-04 09:56:14', '2023-06-05 08:42:35'),
(2, '{\"ar\": \"Exercitationem do ei\", \"en\": \"Exercitationem do ei\", \"fr\": \"Exercitationem do ei\"}', '{\"ar\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"en\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"fr\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\"}', 'uploads/advertisements/images/27341685954007.png', 'uploads/advertisements/background_image/28821685954476.jpg', 1, 5, '2023-06-04 09:56:27', '2023-06-05 08:42:30'),
(3, '{\"ar\": \"Praesentium doloribu\", \"en\": \"Praesentium doloribu\", \"fr\": \"Praesentium doloribu\"}', '{\"ar\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"en\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"fr\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\"}', 'uploads/advertisements/images/18421685953982.png', 'uploads/advertisements/background_image/95361685883400.jpg', 1, 5, '2023-06-04 09:56:40', '2023-06-05 08:42:23'),
(4, '{\"ar\": \"Vero architecto est\", \"en\": \"Vero architecto est\", \"fr\": \"Vero architecto est\"}', '{\"ar\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"en\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\", \"fr\": \"<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\"}', 'uploads/advertisements/images/95751685953974.png', 'uploads/advertisements/background_image/16081685883415.png', 1, 5, '2023-06-04 09:56:55', '2023-06-05 08:42:06');

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
(1, '{\"ar\": \"كلية\", \"en\": \"College\", \"fr\": \"Collège\"}', '2023-06-04 09:51:11', NULL),
(2, '{\"ar\": \"قسم\", \"en\": \"Section\", \"fr\": \"Section\"}', '2023-06-04 09:51:11', NULL),
(3, '{\"ar\": \"التكوينات\", \"en\": \"Configurations\", \"fr\": \"Configurations\"}', '2023-06-04 09:51:11', NULL),
(4, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '2023-06-04 09:51:11', NULL),
(5, '{\"ar\": \"الحياة الطلابية\", \"en\": \"Student Life\", \"fr\": \"Vie étudiante\"}', '2023-06-04 09:51:11', NULL),
(6, '{\"ar\": \"مدونة\", \"en\": \"Blog\", \"fr\": \"Blog\"}', '2023-06-04 09:51:11', NULL),
(7, '{\"ar\": \"تقدم الدراسة\", \"en\": \"Study Progress\", \"fr\": \"Progrès de l étude\"}', '2023-06-04 09:51:11', NULL),
(8, '{\"ar\": \"الخدمات الرقمية\", \"en\": \"Digital Services\", \"fr\": \"Services numériques\"}', '2023-06-04 09:51:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `diploma_name` json NOT NULL,
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
  `data_modification_type` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'البيانات المراد تغيرها',
  `card_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'مرفق البطاقه الوطنيه',
  `request_date` date NOT NULL COMMENT 'تاريخ الطلب',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci COMMENT 'كتابة ملاحظات',
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
(1, '{\"ar\": \"Quon Gordon\", \"en\": \"Yvonne Hughes\", \"fr\": \"Ashton Rogers\"}', '2023-06-05 05:45:59', '2023-06-05 05:45:59'),
(2, '{\"ar\": \"Brandon Avila\", \"en\": \"Victor French\", \"fr\": \"Scott Caldwell\"}', '2023-06-05 05:49:09', '2023-06-05 05:49:09'),
(3, '{\"ar\": \"Ursula Sargent\", \"en\": \"Eugenia Armstrong\", \"fr\": \"Ciara Cooley\"}', '2023-06-05 05:49:24', '2023-06-05 05:49:24');

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
(1, '{\"ar\": \"Joelle Simon\", \"en\": \"Jerry Meyer\", \"fr\": \"Jena Mcgowan\"}', 1, '2023-06-05 06:02:44', '2023-06-05 06:02:44'),
(2, '{\"ar\": \"Cade Dominguez\", \"en\": \"Quon Wilder\", \"fr\": \"Darius Dunn\"}', 3, '2023-06-05 06:02:50', '2023-06-05 06:02:50'),
(3, '{\"ar\": \"Savannah Atkins\", \"en\": \"Wesley Pollard\", \"fr\": \"Julian Finch\"}', 3, '2023-06-05 06:02:55', '2023-06-05 06:02:55'),
(4, '{\"ar\": \"Gray Maxwell\", \"en\": \"Caesar Compton\", \"fr\": \"Caldwell Adkins\"}', 3, '2023-06-05 06:03:00', '2023-06-05 06:03:00');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الحدث',
  `background_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الحدث',
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `background_image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Dolor accusamus ipsu\", \"en\": \"Possimus consequatu\", \"fr\": \"Magna est vitae in a\"}', '{\"ar\": \"<p>Ut fugit libero und</p>\", \"en\": \"<p>Ut fugit libero und</p>\", \"fr\": \"<p>Ut fugit libero und</p>\"}', 'uploads/events/images/91761685883436.jpg', 'uploads/events/background_image/76071685883436.png', 8, '2023-06-04 09:57:16', '2023-06-04 09:57:16'),
(2, '{\"ar\": \"Commodi doloribus qu\", \"en\": \"Qui adipisci elit u\", \"fr\": \"Accusamus officia eu\"}', '{\"ar\": \"<p>Ut fugit libero und</p>\", \"en\": \"<p>Ut fugit libero und</p>\", \"fr\": \"<p>Ut fugit libero und</p>\"}', 'uploads/events/images/42501685953144.jpg', 'uploads/events/background_image/62291685883449.jpg', 6, '2023-06-04 09:57:29', '2023-06-05 05:19:04'),
(3, '{\"ar\": \"Pariatur Voluptas l\", \"en\": \"Mollitia voluptatum\", \"fr\": \"Quis duis maxime des\"}', '{\"ar\": \"<p>Ut fugit libero und</p>\", \"en\": \"<p>Ut fugit libero und</p>\", \"fr\": \"<p>Ut fugit libero und</p>\"}', 'uploads/events/images/20271685883461.png', 'uploads/events/background_image/2551685883461.png', 4, '2023-06-04 09:57:41', '2023-06-04 09:57:41'),
(4, '{\"ar\": \"Qui repudiandae sed\", \"en\": \"Quis nobis ad offici\", \"fr\": \"Nulla cillum volupta\"}', '{\"ar\": \"<p>Ut fugit libero und</p>\", \"en\": \"<p>Ut fugit libero und</p>\", \"fr\": \"<p>Ut fugit libero und</p>\"}', 'uploads/events/images/38691685883479.jpg', 'uploads/events/background_image/59541685883479.jpg', 2, '2023-06-04 09:57:59', '2023-06-04 09:57:59');

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
(1, '{\"ar\": \"Baker Clark\", \"en\": \"Brooke Roman\", \"fr\": \"Quentin Frost\"}', '2023-06-05 05:45:24', '2023-06-05 05:45:24'),
(2, '{\"ar\": \"Kendall Larsen\", \"en\": \"Adrienne Preston\", \"fr\": \"Stella Kelley\"}', '2023-06-05 05:45:29', '2023-06-05 05:45:29'),
(3, '{\"ar\": \"Vernon Bailey\", \"en\": \"Hermione Holman\", \"fr\": \"Imelda Wilkerson\"}', '2023-06-05 05:45:34', '2023-06-05 05:45:34');

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
(19, '2023_05_22_122053_create_categories_table', 1),
(20, '2023_05_22_122219_create_videos_table', 1),
(21, '2023_05_22_122506_create_advertisements_table', 1),
(22, '2023_05_22_124303_create_presentations_table', 1),
(23, '2023_05_22_124801_create_sliders_table', 1),
(24, '2023_05_22_124911_create_words_table', 1),
(25, '2023_05_22_125358_create_pages_table', 1),
(27, '2023_05_28_065027_create_document_types_table', 1),
(28, '2023_05_29_055119_create_elements_table', 1),
(29, '2023_05_29_055841_create_process_degrees_table', 1),
(30, '2023_05_29_061751_create_point_statements_table', 1),
(31, '2023_05_29_062617_create_process_exams_table', 1),
(32, '2023_05_29_063315_create_student_requests_table', 1),
(33, '2023_05_29_064057_create_documents_table', 1),
(34, '2023_05_29_071604_create_certificates_table', 1),
(35, '2023_05_29_072115_create_data_modifications_table', 1),
(36, '2023_05_31_091849_add_department_and_department_branches_to_subjects_table', 1),
(37, '2023_06_04_075401_create_schedules_table', 1),
(38, '2023_06_04_075929_create_events_table', 1),
(41, '2023_05_22_125631_create_university_settings_table', 2),
(42, '2023_05_22_120413_create_subject_exams_table', 3),
(43, '2023_05_22_121421_create_subject_exam_student_results_table', 3),
(44, '2023_06_06_055323_create_subject_exam_students_table', 3);

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
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collèg\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-04 09:51:11', NULL),
(2, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-04 09:51:11', NULL),
(3, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-04 09:51:11', NULL),
(4, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-04 09:51:11', NULL),
(5, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section deux\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-04 09:51:11', NULL),
(6, '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-04 09:51:11', NULL),
(7, '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-04 09:51:11', NULL),
(8, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-04 09:51:11', NULL),
(10, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-04 09:51:11', NULL),
(11, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-04 09:51:11', NULL),
(12, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-04 09:51:11', NULL),
(13, '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-04 09:51:11', NULL),
(14, '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-04 09:51:11', NULL),
(15, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-04 09:51:11', NULL),
(16, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 7, '2023-06-04 09:51:11', NULL),
(17, '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-04 09:51:11', NULL),
(18, '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-04 09:51:11', NULL),
(19, '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-04 09:51:11', NULL);

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
  `sub_desc` json DEFAULT NULL,
  `images` json NOT NULL,
  `experience_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `title`, `description`, `sub_desc`, `images`, `experience_year`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Ducimus reprehender\", \"en\": \"Tempor qui voluptas\", \"fr\": \"Rerum velit neque e\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias.</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis</p>\\r\\n\\r\\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\"}', '[\"uploads/presentationImage/2481685948192.png\", \"uploads/presentationImage/84211685948192.jpg\", \"uploads/presentationImage/80131685948192.jpg\"]', '25', 1, '2023-06-05 02:44:01', '2023-06-05 03:56:32');

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

--
-- Dumping data for table `process_degrees`
--

INSERT INTO `process_degrees` (`id`, `user_id`, `subject_id`, `doctor_id`, `period`, `year`, `section`, `exam_code`, `student_degree_before_request`, `request_type`, `request_status`, `student_degree_after_request`, `processing_date`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 'ربيعيه', '1970-09-14', 'Aliquam molestiae as', '91', 82.00, 'غائب', 'new', 0.00, '2003-11-14', '2023-06-06 08:35:47', '2023-06-06 08:35:47'),
(2, 2, 2, 4, 'ربيعيه', '1974-12-21', 'Mollit et velit cill', '40', 26.00, 'غائب', 'new', 0.00, '1977-09-29', '2023-06-06 08:42:32', '2023-06-06 09:19:49');

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

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Anika Mckinney\", \"en\": \"Carlos Boyer\", \"fr\": \"Wayne Craig\"}', '2023-06-04 09:55:34', '2023-06-04 09:55:34'),
(2, '{\"ar\": \"Tara Tyler\", \"en\": \"Cleo Wilder\", \"fr\": \"Lois Barry\"}', '2023-06-04 09:55:40', '2023-06-04 09:55:40'),
(3, '{\"ar\": \"Chava Barr\", \"en\": \"Kimberly Pollard\", \"fr\": \"Genevieve Garrison\"}', '2023-06-04 09:55:44', '2023-06-04 09:55:44'),
(4, '{\"ar\": \"Whoopi Beard\", \"en\": \"Erasmus Weaver\", \"fr\": \"Kadeem Cardenas\"}', '2023-06-04 09:55:48', '2023-06-04 09:55:48'),
(5, '{\"ar\": \"Maris Witt\", \"en\": \"Chaim Williams\", \"fr\": \"Brynn Fitzgerald\"}', '2023-06-04 09:55:53', '2023-06-04 09:55:53');

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

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Ipsa repellendus L\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Ipsa repellendus L</p>\"}', 'uploads/sliders/37501685883173.png', '2023-06-04 09:52:53', '2023-06-04 09:52:53'),
(2, '{\"ar\": \"كيف حالك\", \"en\": \"how are you\", \"fr\": \"Sed sed est cum mini\"}', '{\"ar\": \"<p>كيف حالك</p>\", \"en\": \"<p>how are you</p>\", \"fr\": \"<p>Sed sed est cum mini</p>\"}', 'uploads/sliders/23741685883191.png', '2023-06-04 09:53:11', '2023-06-04 09:53:11');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint UNSIGNED NOT NULL COMMENT 'التخصص'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `group_id`, `created_at`, `updated_at`, `department_id`, `department_branch_id`) VALUES
(2, '{\"ar\": \"Yoshio Conley\", \"en\": \"Drake Tran\", \"fr\": \"Nicole Horn\"}', 3, '2023-06-06 04:31:16', '2023-06-06 04:31:16', 1, 1),
(3, '{\"ar\": \"Shellie Holman\", \"en\": \"Herrod Park\", \"fr\": \"Kylie Fitzpatrick\"}', 1, '2023-06-06 06:27:21', '2023-06-06 06:27:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_exams`
--

CREATE TABLE `subject_exams` (
  `id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `department_id` bigint UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint UNSIGNED NOT NULL COMMENT 'التخصص',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `exam_date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `exam_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `session` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'عاديه' COMMENT 'الدوره',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_exam_students`
--

CREATE TABLE `subject_exam_students` (
  `id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `department_id` bigint UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint UNSIGNED NOT NULL COMMENT 'التخصص',
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `exam_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `session` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'عاديه' COMMENT 'الدوره',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الوحده',
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
(1, '2018-10-02', 4, 1, 2, 2, 'ربيعيه', '2023-06-06 06:38:40', '2023-06-06 06:45:56');

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
(1, '{\"ar\": \"Quamar Briggs\", \"en\": \"Henry Drake\", \"fr\": \"Elton Charles\"}', 2, '2023-06-06 06:27:00', '2023-06-06 06:27:00'),
(2, '{\"ar\": \"Channing May\", \"en\": \"Nasim Landry\", \"fr\": \"Wang Holt\"}', 2, '2023-06-06 06:27:06', '2023-06-06 06:27:06'),
(3, '{\"ar\": \"Hiram Mckenzie\", \"en\": \"Tatiana Heath\", \"fr\": \"Shelby Figueroa\"}', 2, '2023-06-06 06:27:11', '2023-06-06 06:27:11'),
(4, '{\"ar\": \"Daniel Clarke\", \"en\": \"Darius Morse\", \"fr\": \"Rowan Levy\"}', 2, '2023-06-06 06:27:33', '2023-06-06 06:27:33'),
(5, '{\"ar\": \"Athena Adams\", \"en\": \"Keefe Woodard\", \"fr\": \"Blaine Ruiz\"}', 3, '2023-06-06 06:27:42', '2023-06-06 06:27:42'),
(6, '{\"ar\": \"Felicia Hickman\", \"en\": \"Kelly Whitehead\", \"fr\": \"Palmer Sheppard\"}', 3, '2023-06-06 06:27:51', '2023-06-06 06:27:51'),
(7, '{\"ar\": \"Iola Todd\", \"en\": \"Doris Fitzgerald\", \"fr\": \"Blair Alexander\"}', 2, '2023-06-06 06:27:56', '2023-06-06 06:27:56');

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
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_settings`
--

INSERT INTO `university_settings` (`id`, `email`, `logo`, `title`, `description`, `address`, `phone`, `facebook_link`, `whatsapp_link`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'qeducato@gmail.com', 'assets/front/assets/photo/logo.png', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '+212 123-4567-901', 'https://www.facebook.com/Qeducato', 'https://www.whatsapp.com/Qeducato', 'https://www.whatsapp.com/Qeducato', '2023-06-05 09:53:06', NULL);

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
(1, 'علي', 'محمد', 'islam123@gmail.com', '$2y$10$JOnFaKsSM5x9sgY1/Uu7leyM/h28PGWs8Cd4mtc5Qz4VC9gVVtxQG', NULL, 0.00, NULL, 'university@gmail.com', 375835838573, 8888390852345632, 78756735763476, 'مصري', '2000-06-10', NULL, NULL, 'القاهره', 'active', 'student', NULL, '2022', NULL, '2023-06-04 09:50:17', '2023-06-04 09:50:17'),
(2, 'abdallah', 'mahmoud', 'admin@admin.com', '$2y$10$GxsBTi1a5vhxAteZ8z/1auCX/.UjsOvEIclFrS01nAdn4K5Dj.ZS2', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'manger', NULL, NULL, NULL, '2023-06-04 09:50:18', '2023-06-04 09:50:18'),
(4, 'abdallah', 'mahmoud', 'admin@admin1.com', '$2y$10$GxsBTi1a5vhxAteZ8z/1auCX/.UjsOvEIclFrS01nAdn4K5Dj.ZS2', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', NULL, NULL, NULL, '2023-06-04 09:50:18', '2023-06-04 09:50:18');

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

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `background_image`, `video_url`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Ut quas Nam non ipsu\", \"en\": \"Incididunt nisi obca\", \"fr\": \"Sint nulla magna qua\"}', '{\"ar\": \"<p>Ut quas Nam non ipsu</p>\", \"en\": \"<p>Ut quas Nam non ipsu</p>\", \"fr\": \"<p>Ut quas Nam non ipsu</p>\"}', 'uploads/videos/10081685943112.jpg', 'Voluptas magni non v', '2023-06-05 02:31:52', '2023-06-05 02:31:52'),
(2, '{\"ar\": \"Eum ipsam ratione es\", \"en\": \"Incididunt amet sae\", \"fr\": \"Fugiat at sapiente\"}', '{\"ar\": \"<p>Ut quas Nam non ipsu</p>\", \"en\": \"<p>Ut quas Nam non ipsu</p>\", \"fr\": \"<p>Ut quas Nam non ipsu</p>\"}', 'uploads/videos/71431685943125.jpg', 'Harum similique est', '2023-06-05 02:32:05', '2023-06-05 02:32:05'),
(3, '{\"ar\": \"Non in reprehenderit\", \"en\": \"Ipsa consectetur la\", \"fr\": \"Maxime reprehenderit\"}', '{\"ar\": \"<p>Ut quas Nam non ipsu</p>\", \"en\": \"<p>Ut quas Nam non ipsu</p>\", \"fr\": \"<p>Ut quas Nam non ipsu</p>\"}', 'uploads/videos/81661685943137.jpg', 'Ex laborum porro ali', '2023-06-05 02:32:17', '2023-06-05 02:32:17');

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
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `name`, `description`, `role`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"مرحبا\", \"en\": \"hello\", \"fr\": \"hello\"}', '{\"ar\": \"كلمة العميد\", \"en\": \"word\", \"fr\": \"word\"}', '{\"ar\": \"العميد\", \"en\": \"amed\", \"fr\": \"amed\"}', 'assets/front/assets/photo/about_img.png', 1, '2023-06-04 09:51:11', NULL);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

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
  ADD KEY `subjects_group_id_foreign` (`group_id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`),
  ADD KEY `subjects_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exams_department_id_foreign` (`department_id`),
  ADD KEY `subject_exams_department_branch_id_foreign` (`department_branch_id`),
  ADD KEY `subject_exams_group_id_foreign` (`group_id`),
  ADD KEY `subject_exams_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_students_group_id_foreign` (`group_id`),
  ADD KEY `subject_exam_students_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_exam_students_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_students_department_id_foreign` (`department_id`),
  ADD KEY `subject_exam_students_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_student_results_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_student_results_subject_id_foreign` (`subject_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_branches`
--
ALTER TABLE `department_branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internal_ads`
--
ALTER TABLE `internal_ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `process_degrees`
--
ALTER TABLE `process_degrees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process_exams`
--
ALTER TABLE `process_exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `university_settings`
--
ALTER TABLE `university_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `subjects_department_branch_id_foreign` FOREIGN KEY (`department_branch_id`) REFERENCES `department_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD CONSTRAINT `subject_exams_department_branch_id_foreign` FOREIGN KEY (`department_branch_id`) REFERENCES `department_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exams_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exams_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD CONSTRAINT `subject_exam_students_department_branch_id_foreign` FOREIGN KEY (`department_branch_id`) REFERENCES `department_branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD CONSTRAINT `subject_exam_student_results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
