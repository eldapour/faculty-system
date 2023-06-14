-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 12:15 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.19

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الاعلان',
  `background_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الاعلان',
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `service_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي مصلحه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"كلية\", \"en\": \"College\", \"fr\": \"Collège\"}', '2023-06-06 03:33:09', NULL),
(2, '{\"ar\": \"قسم\", \"en\": \"Section\", \"fr\": \"Section\"}', '2023-06-06 03:33:09', NULL),
(3, '{\"ar\": \"التكوينات\", \"en\": \"Configurations\", \"fr\": \"Configurations\"}', '2023-06-06 03:33:09', NULL),
(4, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '2023-06-06 03:33:09', NULL),
(5, '{\"ar\": \"الحياة الطلابية\", \"en\": \"Student Life\", \"fr\": \"Vie étudiante\"}', '2023-06-06 03:33:09', NULL),
(6, '{\"ar\": \"مدونة\", \"en\": \"Blog\", \"fr\": \"Blog\"}', '2023-06-06 03:33:09', NULL),
(7, '{\"ar\": \"تقدم الدراسة\", \"en\": \"Study Progress\", \"fr\": \"Progrès de l étude\"}', '2023-06-06 03:33:09', NULL),
(8, '{\"ar\": \"الخدمات الرقمية\", \"en\": \"Digital Services\", \"fr\": \"Services numériques\"}', '2023-06-06 03:33:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `diploma_name` json NOT NULL,
  `validation_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سنه استيفاء الدبلوم',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `diploma_name`, `validation_year`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"ar\": \"شهاده الدبلوم\", \"en\": \"Diploma certificate\", \"fr\": \"Certificat d\'études\"}', '2022', '2023', '2023-05-31 04:44:56', '2023-05-31 04:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `data_modifications`
--

CREATE TABLE `data_modifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
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
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هندسه\", \"en\": \"Engineering\", \"fr\": \"Engineering\"}', '2023-05-31 05:30:05', '2023-05-31 05:30:05'),
(2, '{\"ar\": \"حاسبات ومعلومات\", \"en\": \"computers and data\", \"fr\": \"ordinateurs et données\"}', '2023-05-31 05:30:43', '2023-05-31 05:30:43'),
(3, '{\"ar\": \"لغه عربيه\", \"en\": \"Arabic Language\", \"fr\": \"Langue Arabe\"}', '2023-05-31 05:31:22', '2023-05-31 05:31:22'),
(4, '{\"ar\": \"علوم\", \"en\": \"science\", \"fr\": \"les sciences\"}', '2023-05-31 05:31:43', '2023-05-31 05:31:43'),
(5, '{\"ar\": \"اصول دين\", \"en\": \"The fundamentals of religion\", \"fr\": \"Les fondamentaux de la religion\"}', '2023-05-31 05:32:15', '2023-05-31 05:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `department_branches`
--

CREATE TABLE `department_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` json NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_branches`
--

INSERT INTO `department_branches` (`id`, `branch_name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هندسه مدني\", \"en\": \"civil engineering\", \"fr\": \"génie civil\"}', 1, '2023-05-31 05:32:54', '2023-05-31 05:32:54'),
(2, '{\"ar\": \"هندسه معماري\", \"en\": \"Architectural Engineering\", \"fr\": \"Génie architectural\"}', 1, '2023-05-31 05:33:26', '2023-05-31 05:33:26'),
(3, '{\"ar\": \"هندسه كهرباء\", \"en\": \"Electricity Engineering\", \"fr\": \"génie électrique\"}', 1, '2023-05-31 05:34:02', '2023-05-31 05:34:02'),
(4, '{\"ar\": \"هندسه اتصالات\", \"en\": \"communication Engineering\", \"fr\": \"Ingénierie de Communication\"}', 1, '2023-05-31 05:34:39', '2023-05-31 05:34:39'),
(5, '{\"ar\": \"علوم الحاسب\", \"en\": \"Computer Science\", \"fr\": \"sciences informatiques\"}', 2, '2023-05-31 05:35:46', '2023-05-31 05:35:46'),
(6, '{\"ar\": \"تكنولوجيا المعلومات\", \"en\": \"information technology\", \"fr\": \"Informatique\"}', 2, '2023-05-31 05:36:28', '2023-05-31 05:36:28'),
(7, '{\"ar\": \"نظم المعلومات\", \"en\": \"Information Systems\", \"fr\": \"Systèmes d\'information\"}', 2, '2023-05-31 05:37:42', '2023-05-31 05:37:42'),
(8, '{\"ar\": \"الذكاء الصناعي\", \"en\": \"artificial intelligence\", \"fr\": \"intelligence artificielle\"}', 2, '2023-05-31 05:38:35', '2023-05-31 05:38:35'),
(9, '{\"ar\": \"نحو\", \"en\": \"Toward\", \"fr\": \"Vers\"}', 3, '2023-05-31 05:39:51', '2023-05-31 05:39:51'),
(10, '{\"ar\": \"بلاغه\", \"en\": \"eloquence\", \"fr\": \"éloquence\"}', 3, '2023-05-31 05:40:28', '2023-05-31 05:40:28'),
(11, '{\"ar\": \"نصوص\", \"en\": \"texts\", \"fr\": \"des textes\"}', 3, '2023-05-31 05:41:18', '2023-05-31 05:41:18'),
(12, '{\"ar\": \"قسم الكيمياء\", \"en\": \"chemistry department\", \"fr\": \"chemistry department\"}', 4, '2023-05-31 05:41:49', '2023-05-31 05:41:49'),
(13, '{\"ar\": \"قسم الاحياء\", \"en\": \"Biology department\", \"fr\": \"Biology department\"}', 4, '2023-05-31 05:42:28', '2023-05-31 05:42:28'),
(14, '{\"ar\": \"قسم العضويه\", \"en\": \"Membership section\", \"fr\": \"Membership section\"}', 4, '2023-05-31 05:43:02', '2023-05-31 05:43:02'),
(15, '{\"ar\": \"قسم التفسير وعلوم القرآن\", \"en\": \"Department of interpretation and sciences of the Koran\", \"fr\": \"Département d\'interprétation et des sciences du Coran\"}', 5, '2023-05-31 05:44:58', '2023-05-31 05:44:58'),
(16, '{\"ar\": \"قسم الحديث وعلومه\", \"en\": \"Department of Hadith and its sciences\", \"fr\": \"Département du Hadith et de ses sciences\"}', 5, '2023-05-31 05:45:24', '2023-05-31 05:45:24'),
(17, '{\"ar\": \"قسم العقيدة والفلسفة\", \"en\": \"Department of Doctrine and Philosophy\", \"fr\": \"Département de doctrine et de philosophie\"}', 5, '2023-05-31 05:46:04', '2023-05-31 05:46:04'),
(18, '{\"ar\": \"قسم الدعوة والثقافة الإسلامية\", \"en\": \"Department of Da\'wah and Islamic Culture\", \"fr\": \"Department of Da\'wah and Islamic Culture\"}', 5, '2023-05-31 05:47:35', '2023-05-31 05:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `department_branch_students`
--

CREATE TABLE `department_branch_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `register_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_restart_register` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'اعاده التسجيل في ذلك التخصص الفرعي',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_branch_students`
--

INSERT INTO `department_branch_students` (`id`, `register_year`, `branch_restart_register`, `user_id`, `department_branch_id`, `created_at`, `updated_at`) VALUES
(1, '2023-05-31', 0, 1, 2, '2023-05-31 05:48:25', '2023-05-31 05:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `document_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'نوع الوثيقه',
  `withdraw_by_proxy` tinyint(1) DEFAULT '0' COMMENT 'سحب بالوكاله',
  `person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'اسم الموكل اليه',
  `national_id_of_person` bigint(20) DEFAULT NULL COMMENT 'رقم البطاقه الوطنيه للموكل اليه',
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

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `document_type_id`, `withdraw_by_proxy`, `person_name`, `national_id_of_person`, `card_image`, `request_date`, `pull_type`, `pull_date`, `pull_return`, `request_status`, `processing_request_date`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 'اسلام محمد رجب', 3339999323454323, '20230530072133.jpg', '2023-05-30', 'temporary', '2023-05-30', '2023-06-08', 'accept', '2023-05-30', '2023-05-30 04:21:33', '2023-05-30 07:58:23'),
(2, 2, 2, 1, 'جمال السيد', 3333333333333333, '20230530080118.jpg', '2023-05-30', 'temporary', '2023-06-01', '2023-06-09', 'accept', '2023-06-06', '2023-05-30 05:01:18', '2023-06-06 04:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `document_name`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\": \"وثيقه سحب بكالوريا\", \"en\": \"Bachelor\'s degree certificate\", \"fr\": \"Certificat de baccalauréat\"}', '2023-05-30 02:27:17', '2023-05-30 02:27:17'),
(3, '{\"ar\": \"سحب وثيقه ميلاد\", \"en\": \"Withdraw a birth certificate\", \"fr\": \"Retirer un acte de naissance\"}', '2023-05-30 06:41:33', '2023-05-30 06:41:33'),
(4, '{\"ar\": \"سحب شهاده التخرج\", \"en\": \"Withdraw your graduation certificate\", \"fr\": \"Retirez votre certificat de fin d\'études\"}', '2023-05-30 06:42:58', '2023-05-30 06:42:58'),
(5, '{\"ar\": \"سحب وثيقه شهاده الاعداديه\", \"en\": \"Withdraw the preparatory certificate document\", \"fr\": \"Retirer le document de certificat préparatoire\"}', '2023-05-30 06:43:45', '2023-05-30 06:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `department_branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الحدث',
  `background_image` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الحدث',
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"الفوج الاول\", \"en\": \"The first regiment\", \"fr\": \"The first regiment\"}', '2023-05-31 06:09:35', '2023-05-31 06:09:35'),
(2, '{\"ar\": \"الفوج الثاني\", \"en\": \"The second regiment\", \"fr\": \"The second regiment\"}', '2023-05-31 06:10:08', '2023-05-31 06:10:08'),
(3, '{\"ar\": \"الفوج التالت\", \"en\": \"The third regiment\", \"fr\": \"The third regiment\"}', '2023-05-31 06:10:55', '2023-05-31 06:10:55'),
(4, '{\"ar\": \"الفوج الرابع\", \"en\": \"The fourth regiment\", \"fr\": \"The fourth regiment\"}', '2023-05-31 06:11:25', '2023-05-31 06:11:25'),
(5, '{\"ar\": \"الفوج الخامس\", \"en\": \"The five regiment\", \"fr\": \"The five regiment\"}', '2023-05-31 06:11:52', '2023-05-31 06:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `internal_ads`
--

CREATE TABLE `internal_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `date_ads` date NOT NULL,
  `url_ads` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('show','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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
(15, '2023_05_22_114031_create_subject_students_table', 1),
(20, '2023_05_22_122053_create_categories_table', 1),
(21, '2023_05_22_122219_create_videos_table', 1),
(22, '2023_05_22_122506_create_advertisements_table', 1),
(23, '2023_05_22_124303_create_presentations_table', 1),
(24, '2023_05_22_124801_create_sliders_table', 1),
(25, '2023_05_22_124911_create_words_table', 1),
(26, '2023_05_22_125358_create_pages_table', 1),
(28, '2023_05_29_055119_create_elements_table', 2),
(29, '2023_05_29_055841_create_process_degrees_table', 2),
(30, '2023_05_29_061751_create_point_statements_table', 3),
(31, '2023_05_29_062617_create_process_exams_table', 4),
(32, '2023_05_29_063315_create_student_requests_table', 5),
(33, '2023_05_28_065027_create_document_types_table', 6),
(34, '2023_05_29_064057_create_documents_table', 6),
(35, '2023_05_29_071604_create_certificates_table', 7),
(37, '2023_05_31_091849_add_department_and_department_branches_to_subjects_table', 9),
(39, '2023_05_22_121421_create_subject_exam_student_results_table', 10),
(41, '2023_06_04_075929_create_events_table', 11),
(45, '2023_05_22_120413_create_subject_exams_table', 13),
(46, '2023_06_06_055323_create_subject_exam_students_table', 13),
(47, '2023_05_22_125631_create_university_settings_table', 14),
(48, '2023_06_07_074627_create_periods_table', 15),
(49, '2023_05_29_072115_create_data_modifications_table', 16),
(50, '2023_05_22_113705_create_units_table', 17),
(51, '2023_05_22_114420_create_subject_unit_doctors_table', 17),
(53, '2023_06_04_075401_create_schedules_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `images` json DEFAULT NULL,
  `files` json DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `images`, `files`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collèg\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-06 03:33:09', NULL),
(2, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-06 03:33:09', NULL),
(3, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-06 03:33:09', NULL),
(4, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-06 03:33:09', NULL),
(5, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section deux\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-06 03:33:09', NULL),
(6, '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-06 03:33:09', NULL),
(7, '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-06 03:33:09', NULL),
(8, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-06 03:33:09', NULL),
(9, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-06 03:33:09', NULL),
(10, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-06 03:33:09', NULL),
(11, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-06 03:33:09', NULL),
(12, '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-06 03:33:09', NULL),
(13, '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-06 03:33:09', NULL),
(14, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-06 03:33:09', NULL),
(15, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 7, '2023-06-06 03:33:09', NULL),
(16, '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-06 03:33:09', NULL),
(17, '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-06 03:33:09', NULL),
(18, '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-06 03:33:09', NULL),
(19, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collèg\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-12 02:56:43', NULL),
(20, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-12 02:56:43', NULL),
(21, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-12 02:56:43', NULL),
(22, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-12 02:56:43', NULL),
(23, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section deux\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-12 02:56:43', NULL),
(24, '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-12 02:56:43', NULL),
(25, '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-12 02:56:43', NULL),
(26, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-12 02:56:43', NULL),
(27, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-12 02:56:43', NULL),
(28, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-12 02:56:43', NULL),
(29, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-12 02:56:43', NULL),
(30, '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-12 02:56:43', NULL),
(31, '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-12 02:56:43', NULL),
(32, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-12 02:56:43', NULL),
(33, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 7, '2023-06-12 02:56:43', NULL),
(34, '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-12 02:56:43', NULL),
(35, '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-12 02:56:43', NULL),
(36, '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-12 02:56:43', NULL);

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
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period_start_date` date DEFAULT NULL,
  `period_end_date` date DEFAULT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `session` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'عاديه' COMMENT 'الدوره',
  `year_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'بدايه السنه اللي الطلبه هتبداء فيها',
  `year_end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'نهايه السنه اللي الطلبه هتنتهي فيها',
  `status` enum('start','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'start' COMMENT 'تحديث حاله الفتره اللي احنا فيها',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `period_start_date`, `period_end_date`, `period`, `session`, `year_start`, `year_end`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-06-07', '2023-12-07', 'ربيعيه', 'عاديه', '2023', '2024', 'start', '2023-06-07 06:10:10', '2023-06-07 06:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `description` json NOT NULL,
  `images` json NOT NULL,
  `experience_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('advertisement','news') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'advertisement',
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_degrees`
--

CREATE TABLE `process_degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `doctor_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم دكتور الماده',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `attachment_file` longtext COLLATE utf8mb4_unicode_ci COMMENT 'مرفق اوصوره',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_date` date DEFAULT NULL COMMENT 'تاريخ الطلب',
  `request_status` enum('new','accept','refused','under_processing') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new' COMMENT 'حاله الطلب',
  `processing_request_date` date DEFAULT NULL COMMENT 'تاريخ معالجه الطلب',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم المسلك',
  `unit_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الفصل الدراسي',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `pdf_upload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `department_id`, `unit_id`, `description`, `pdf_upload`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'جدول الفرقه الاولي تخصص هندسه ميكانيكا', '20230612092618.pdf', '2023-06-12 06:26:18', '2023-06-12 06:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` json NOT NULL,
  `setting_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_name`, `setting_value`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"الفتره\", \"en\": \"period\", \"fr\": \"period\"}', 'الفتره الربيعيه', '2023-05-31 05:19:18', '2023-05-31 05:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Ipsa repellendus L\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Ipsa repellendus L</p>\"}', 'assets/front/assets/photo/slider_bg_01.ac8b8779408287a47977.png', '2023-06-12 02:56:43', NULL),
(2, '{\"ar\": \"كيف حالك\", \"en\": \"how are you\", \"fr\": \"Sed sed est cum mini\"}', '{\"ar\": \"<p>كيف حالك</p>\", \"en\": \"<p>how are you</p>\", \"fr\": \"<p>Sed sed est cum mini</p>\"}', 'assets/front/assets/photo/slider_bg.6e3f0f1a1b58ac6d6c12.png', '2023-06-12 02:56:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_requests`
--

CREATE TABLE `student_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` json NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الفرقه الدراسيه',
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint(20) UNSIGNED NOT NULL COMMENT 'التخصص',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `group_id`, `department_id`, `department_branch_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هياكل البيانات\", \"en\": \"data structure\", \"fr\": \"data structure\"}', 1, 2, 5, '2023-06-11 04:32:05', '2023-06-11 04:32:05'),
(2, '{\"ar\": \"قواعد البيانت\", \"en\": \"database\", \"fr\": \"database\"}', 1, 2, 5, '2023-06-11 04:32:31', '2023-06-11 04:32:31'),
(3, '{\"ar\": \"تكنولوجيا المعلومات\", \"en\": \"information technology\", \"fr\": \"information technology\"}', 1, 2, 5, '2023-06-11 04:32:49', '2023-06-11 04:32:49'),
(4, '{\"ar\": \"ماده الرياضيات 1\", \"en\": \"math 1\", \"fr\": \"math 1\"}', 1, 2, 5, '2023-06-11 04:33:35', '2023-06-11 04:33:35'),
(5, '{\"ar\": \"تراكيب محددة\", \"en\": \"specific compositions\", \"fr\": \"specific compositions\"}', 1, 2, 5, '2023-06-11 04:34:36', '2023-06-11 04:34:36'),
(6, '{\"ar\": \"مبادئ برمجة\", \"en\": \"Programming principles\", \"fr\": \"Programming principles\"}', 1, 2, 5, '2023-06-11 04:35:10', '2023-06-11 04:35:10'),
(7, '{\"ar\": \"فيزياء\", \"en\": \"physics\", \"fr\": \"physics\"}', 1, 2, 5, '2023-06-11 04:35:48', '2023-06-11 04:35:48'),
(8, '{\"ar\": \"إحصاء واحتمالات\", \"en\": \"Statistics and odds\", \"fr\": \"Statistics and odds\"}', 1, 2, 5, '2023-06-11 04:36:27', '2023-06-11 04:36:27'),
(9, '{\"ar\": \"برمجة حاسبات\", \"en\": \"Computer programming\", \"fr\": \"Computer programming\"}', 2, 2, 5, '2023-06-11 04:37:01', '2023-06-11 04:37:01'),
(10, '{\"ar\": \"حقوق الإنسان\", \"en\": \"human rights\", \"fr\": \"human rights\"}', 2, 2, 5, '2023-06-11 04:37:25', '2023-06-11 04:37:25'),
(11, '{\"ar\": \"مدخل في علم الجودة\", \"en\": \"Introduction to the science of quality\", \"fr\": \"Introduction to the science of quality\"}', 2, 2, 5, '2023-06-11 04:37:51', '2023-06-11 04:37:51'),
(12, '{\"ar\": \"مقدمة إلكترونيات\", \"en\": \"Introduction to electronics\", \"fr\": \"Introduction to electronics\"}', 2, 2, 5, '2023-06-11 04:38:14', '2023-06-11 04:38:14'),
(13, '{\"ar\": \"رياضيات 2\", \"en\": \"Mathematics 2\", \"fr\": \"Mathematics 2\"}', 2, 2, 5, '2023-06-11 04:38:39', '2023-06-11 04:38:39'),
(14, '{\"ar\": \"مدخل إلى الجودة والاعتماد\", \"en\": \"An introduction to quality and accreditation\", \"fr\": \"An introduction to quality and accreditation\"}', 2, 2, 5, '2023-06-11 04:40:06', '2023-06-11 04:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `subject_exams`
--

CREATE TABLE `subject_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint(20) UNSIGNED NOT NULL COMMENT 'التخصص',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint(20) UNSIGNED NOT NULL COMMENT 'التخصص',
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_degree` double(12,2) NOT NULL,
  `exam_degree` double(12,2) NOT NULL,
  `date_enter_degree` date NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الوحده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_students`
--

CREATE TABLE `subject_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الطالب',
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_students`
--

INSERT INTO `subject_students` (`id`, `year`, `user_id`, `group_id`, `subject_id`, `period`, `created_at`, `updated_at`) VALUES
(5, '2023', 1, 1, 1, 'ربيعيه', '2023-06-11 08:19:51', '2023-06-11 08:48:15'),
(6, '2023', 1, 1, 2, 'ربيعيه', '2023-06-11 08:19:51', '2023-06-11 08:48:15'),
(10, '2023', 4, 1, 1, 'ربيعيه', '2023-06-11 08:49:13', '2023-06-11 08:49:13'),
(11, '2023', 4, 1, 2, 'ربيعيه', '2023-06-11 08:49:13', '2023-06-11 08:49:13'),
(12, '2023', 4, 1, 3, 'ربيعيه', '2023-06-11 08:49:14', '2023-06-11 08:49:14'),
(13, '2023', 4, 1, 4, 'ربيعيه', '2023-06-11 08:49:14', '2023-06-11 08:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `subject_unit_doctors`
--

CREATE TABLE `subject_unit_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الدكتور',
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `unit_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الفصل الدراسي',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي الدكتور هيسجل فيها الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` json NOT NULL COMMENT 'اسم الفصل',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"الفصل الدراسي الاول\", \"en\": \"First semester\", \"fr\": \"First semester\"}', '2023-06-12 03:28:15', '2023-06-12 03:28:15'),
(2, '{\"ar\": \"الفصل الدراسي الثاني\", \"en\": \"Second Semester\", \"fr\": \"Second Semester\"}', '2023-06-12 03:28:42', '2023-06-12 03:28:42'),
(3, '{\"ar\": \"الفصل الدراسي الثالث\", \"en\": \"Third semester\", \"fr\": \"Third semester\"}', '2023-06-12 03:29:46', '2023-06-12 03:29:46'),
(4, '{\"ar\": \"الفصل الدراسي الرابع\", \"en\": \"Fourth semester\", \"fr\": \"Fourth semester\"}', '2023-06-12 03:30:08', '2023-06-12 03:30:08'),
(5, '{\"ar\": \"الفصل الدراسي الخامس\", \"en\": \"Fifth semester\", \"fr\": \"Fifth semester\"}', '2023-06-12 03:30:51', '2023-06-12 03:30:51'),
(6, '{\"ar\": \"الفصل الدراسي السادس\", \"en\": \"Sixth semester\", \"fr\": \"Sixth semester\"}', '2023-06-12 03:40:33', '2023-06-12 03:40:33'),
(7, '{\"ar\": \"الفصل الدراسي السابع\", \"en\": \"Seventh semester\", \"fr\": \"Seventh semester\"}', '2023-06-12 03:41:00', '2023-06-12 03:41:00'),
(8, '{\"ar\": \"الفصل الدراسي التامن\", \"en\": \"الفصل الدراسي التامن\", \"fr\": \"الفصل الدراسي التامن\"}', '2023-06-12 03:41:26', '2023-06-12 04:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `university_settings`
--

CREATE TABLE `university_settings` (
  `id` int(10) UNSIGNED NOT NULL,
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
(1, 'qeducato@gmail.com', 'assets/front/assets/photo/logo.png', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '+212 123-4567-901', 'https://www.facebook.com/Qeducato', 'https://www.whatsapp.com/Qeducato', 'https://www.whatsapp.com/Qeducato', '2023-06-06 03:33:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double(12,2) NOT NULL DEFAULT '0.00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `university_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier_id` bigint(20) DEFAULT NULL COMMENT 'رقم الكارنيه الجامعي',
  `national_id` bigint(20) DEFAULT NULL COMMENT 'رقم القومي للبطاقه',
  `national_number` bigint(20) DEFAULT NULL COMMENT 'الرقم القومي',
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الجنسيه',
  `birthday_date` date DEFAULT NULL,
  `birthday_place` json DEFAULT NULL,
  `city` json DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_type` enum('student','doctor','manger','employee','factor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `job_id` bigint(20) DEFAULT NULL COMMENT 'الرقم الوظيفي خاصه لغير الطالب',
  `university_register_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `points`, `email_verified_at`, `university_email`, `identifier_id`, `national_id`, `national_number`, `nationality`, `birthday_date`, `birthday_place`, `city`, `address`, `user_status`, `user_type`, `job_id`, `university_register_year`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'علي', 'محمد', 'islam123@gmail.com', '$2y$10$WP7sQZdSd93PMM05.dot4up9emSOXkIQMSyOa729DsK/zvsnq9KIG', NULL, 0.00, NULL, 'university@gmail.com', 119000614, 8888390852345632, 78756735763476, NULL, '2000-06-10', '{\"ar\": \"القاهره\", \"en\": \"cairo\", \"fr\": \"cairo\"}', '{\"ar\": \"القاهره\", \"en\": \"cairo\", \"fr\": \"Caire\"}', 'القاهره', 'active', 'student', NULL, NULL, NULL, '2023-05-28 06:37:08', '2023-05-28 06:38:19'),
(2, 'abdallah', 'mahmoud', 'admin@admin.com', '$2y$10$WP7sQZdSd93PMM05.dot4up9emSOXkIQMSyOa729DsK/zvsnq9KIG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'manger', 3232132, NULL, NULL, '2023-05-28 06:37:08', '2023-05-28 06:38:40'),
(3, 'dsds', 'sds', 'admin123@admin.com', '$2y$10$TQGA/CtD0UpwpC9UWFqq.OM2Jdlbg41ptjKs9j8dEiR5E7UVijxYq', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'employee', 222222, NULL, NULL, '2023-05-28 09:00:22', '2023-05-28 09:00:22'),
(4, 'Uma', 'Christian', 'jedatyly@mailinator.com', '$2y$10$S30a4yW/3eZm5cKVCYwureke0Am70Zdkvflmu1PJnQiCaUmt4o4Rm', NULL, 0.00, NULL, 'tupafosa@mailinator.com', 119000615, 46, 420, 'macedonian', '2000-07-10', '{\"ar\": \"18\", \"en\": \"24\", \"fr\": \"3\"}', '{\"ar\": \"Velit voluptatem vol\", \"en\": \"Lorem fugiat explic\", \"fr\": \"Qui consequatur cul\"}', 'Vero aut non qui sed', 'active', 'student', NULL, NULL, NULL, '2023-05-28 09:00:55', '2023-05-28 09:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `description` json NOT NULL,
  `role` json NOT NULL COMMENT 'الصفه الوظيفيه',
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `name`, `description`, `role`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"مرحبا\", \"en\": \"hello\", \"fr\": \"hello\"}', '{\"ar\": \"كلمة العميد\", \"en\": \"word\", \"fr\": \"word\"}', '{\"ar\": \"العميد\", \"en\": \"amed\", \"fr\": \"amed\"}', 'assets/front/assets/photo/about_img.png', 1, '2023-06-06 03:33:09', NULL),
(2, '{\"ar\": \"مرحبا\", \"en\": \"hello\", \"fr\": \"hello\"}', '{\"ar\": \"كلمة العميد\", \"en\": \"word\", \"fr\": \"word\"}', '{\"ar\": \"العميد\", \"en\": \"amed\", \"fr\": \"amed\"}', 'assets/front/assets/photo/about_img.png', 1, '2023-06-12 02:56:43', NULL);

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
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_unit_id_foreign` (`unit_id`),
  ADD KEY `schedules_department_id_foreign` (`department_id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_modifications`
--
ALTER TABLE `data_modifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_branches`
--
ALTER TABLE `department_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `internal_ads`
--
ALTER TABLE `internal_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_statements`
--
ALTER TABLE `point_statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_degrees`
--
ALTER TABLE `process_degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_exams`
--
ALTER TABLE `process_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject_exams`
--
ALTER TABLE `subject_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_students`
--
ALTER TABLE `subject_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `university_settings`
--
ALTER TABLE `university_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
