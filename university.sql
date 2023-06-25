-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2023 at 06:22 AM
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
(1, '{\"ar\": \"كلية\", \"en\": \"College\", \"fr\": \"Collège\"}', '2023-06-25 03:03:23', NULL),
(2, '{\"ar\": \"قسم\", \"en\": \"Section\", \"fr\": \"Section\"}', '2023-06-25 03:03:23', NULL),
(3, '{\"ar\": \"التكوينات\", \"en\": \"Configurations\", \"fr\": \"Configurations\"}', '2023-06-25 03:03:23', NULL),
(4, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '2023-06-25 03:03:23', NULL),
(5, '{\"ar\": \"الحياة الطلابية\", \"en\": \"Student Life\", \"fr\": \"Vie étudiante\"}', '2023-06-25 03:03:23', NULL),
(6, '{\"ar\": \"مدونة\", \"en\": \"Blog\", \"fr\": \"Blog\"}', '2023-06-25 03:03:23', NULL),
(7, '{\"ar\": \"تقدم الدراسة\", \"en\": \"Study Progress\", \"fr\": \"Progrès de l étude\"}', '2023-06-25 03:03:23', NULL),
(8, '{\"ar\": \"الخدمات الرقمية\", \"en\": \"Digital Services\", \"fr\": \"Services numériques\"}', '2023-06-25 03:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `certificate_type_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `validation_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سنه استيفاء الدبلوم',
  `situation_with_management` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'الوضعيه مع الاداره',
  `situation_with_treasury` tinyint(1) DEFAULT '0' COMMENT 'الوضعيه مع الخزانه',
  `description_situation_with_management` json DEFAULT NULL COMMENT 'ملاحظات علي الوضعيه مع الاداره',
  `description_situation_with_treasury` json DEFAULT NULL COMMENT 'ملاحظه علي الوضعيه مع الخزانه',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificate_types`
--

CREATE TABLE `certificate_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` json NOT NULL,
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
  `department_code` json DEFAULT NULL COMMENT 'رمز المسلك',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_branches`
--

CREATE TABLE `department_branches` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_name` json NOT NULL,
  `department_branch_code` json DEFAULT NULL COMMENT 'رمز المسار',
  `department_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `group_code` json NOT NULL COMMENT 'رمز الفوج',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2023_05_22_113438_create_units_table', 1),
(14, '2023_05_22_113439_create_subjects_table', 1),
(15, '2023_05_22_114031_create_subject_students_table', 1),
(16, '2023_05_22_114420_create_subject_unit_doctors_table', 1),
(17, '2023_05_22_120413_create_subject_exams_table', 1),
(18, '2023_05_22_121421_create_subject_exam_student_results_table', 1),
(19, '2023_05_22_122053_create_categories_table', 1),
(20, '2023_05_22_122219_create_videos_table', 1),
(21, '2023_05_22_122506_create_advertisements_table', 1),
(22, '2023_05_22_124303_create_presentations_table', 1),
(23, '2023_05_22_124801_create_sliders_table', 1),
(24, '2023_05_22_124911_create_words_table', 1),
(25, '2023_05_22_125358_create_pages_table', 1),
(26, '2023_05_22_125631_create_university_settings_table', 1),
(27, '2023_05_28_065027_create_document_types_table', 1),
(28, '2023_05_28_112907_create_certificate_types_table', 1),
(29, '2023_05_29_055119_create_elements_table', 1),
(30, '2023_05_29_055841_create_process_degrees_table', 1),
(31, '2023_05_29_061751_create_point_statements_table', 1),
(32, '2023_05_29_062617_create_process_exams_table', 1),
(33, '2023_05_29_063315_create_student_requests_table', 1),
(34, '2023_05_29_064057_create_documents_table', 1),
(35, '2023_05_29_071604_create_certificates_table', 1),
(36, '2023_05_29_072115_create_data_modifications_table', 1),
(37, '2023_05_31_091849_add_department_and_department_branches_to_subjects_table', 1),
(38, '2023_06_04_075401_create_schedules_table', 1),
(39, '2023_06_04_075929_create_events_table', 1),
(40, '2023_06_06_055323_create_subject_exam_students_table', 1),
(41, '2023_06_07_074627_create_periods_table', 1),
(42, '2023_06_19_065647_add_regiment_code_to_groups_table', 1),
(43, '2023_06_19_075015_add_department_code_to_departments_table', 1),
(44, '2023_06_19_075156_add_department_branch_code_to_department_branches_table', 1),
(45, '2023_06_19_075311_add_unit_code_to_units_table', 1),
(46, '2023_06_19_082107_create_reasons_redresses_table', 1);

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
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collèg\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-25 03:03:23', NULL),
(2, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-25 03:03:23', NULL),
(3, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-25 03:03:23', NULL),
(4, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-25 03:03:23', NULL),
(5, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section deux\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-25 03:03:23', NULL),
(6, '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-25 03:03:23', NULL),
(7, '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-25 03:03:23', NULL),
(8, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-25 03:03:23', NULL),
(9, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-25 03:03:23', NULL),
(10, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-25 03:03:23', NULL),
(11, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-25 03:03:23', NULL),
(12, '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-25 03:03:23', NULL),
(13, '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-25 03:03:23', NULL),
(14, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-25 03:03:23', NULL),
(15, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 7, '2023-06-25 03:03:23', NULL),
(16, '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '{\"ar\": \"منصة الطالب الرقمية\", \"en\": \"Digital Student Platform\", \"fr\": \"Plateforme étudiante numérique\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-25 03:03:23', NULL),
(17, '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '{\"ar\": \"المنصة الرقمية للكليات\", \"en\": \"Colleges Digital Platform\", \"fr\": \"Plateforme numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-25 03:03:23', NULL),
(18, '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '{\"ar\": \"مجلة الكليات الرقمية\", \"en\": \"Colleges Digital Magazine\", \"fr\": \"Magazine numérique des collèges\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 8, '2023-06-25 03:03:23', NULL);

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
  `id` bigint UNSIGNED NOT NULL,
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
  `sub_desc` json NOT NULL,
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
(1, '{\"ar\": \"Ducimus reprehender\", \"en\": \"Tempor qui voluptas\", \"fr\": \"Rerum velit neque e\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia\\n\\n                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur\\n\\n                                    porro laborum molestias.\\n\\n                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet\\n\\n                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis\\n\\n                                    quam?</p>\"}', '[\"assets/front/assets/photo/about_img.png\", \"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/inner_b1.jpg\"]', '25', 1, '2023-06-25 03:03:23', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `reasons_redresses`
--

CREATE TABLE `reasons_redresses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reasons_redresses`
--

INSERT INTO `reasons_redresses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"تأخر عن موعد الامتحان\", \"en\": \"Being late for the exam\", \"fr\": \"Être en retard à l examen\"}', '2023-06-25 03:03:23', NULL),
(2, '{\"ar\": \"مرض\", \"en\": \"Illness\", \"fr\": \"maladie\"}', '2023-06-25 03:03:23', NULL),
(3, '{\"ar\": \"حالة وفاة داخل الاسرة\", \"en\": \"A death within the family\", \"fr\": \"Un décès dans la famille\"}', '2023-06-25 03:03:23', NULL),
(4, '{\"ar\": \"حالات اجتماعية اخرة\", \"en\": \"other social situations\", \"fr\": \"autres situations sociales\"}', '2023-06-25 03:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL COMMENT 'اسم المسلك',
  `unit_id` bigint UNSIGNED NOT NULL COMMENT 'الفصل الدراسي',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `pdf_upload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Ipsa repellendus L\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Ipsa repellendus L</p>\"}', 'assets/front/assets/photo/slider_bg_01.ac8b8779408287a47977.png', '2023-06-25 03:03:23', NULL),
(2, '{\"ar\": \"كيف حالك\", \"en\": \"how are you\", \"fr\": \"Sed sed est cum mini\"}', '{\"ar\": \"<p>كيف حالك</p>\", \"en\": \"<p>how are you</p>\", \"fr\": \"<p>Sed sed est cum mini</p>\"}', 'assets/front/assets/photo/slider_bg.6e3f0f1a1b58ac6d6c12.png', '2023-06-25 03:03:23', NULL);

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
  `unit_id` bigint UNSIGNED NOT NULL COMMENT 'الفصل الدراسي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint UNSIGNED NOT NULL COMMENT 'التخصص'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_exams`
--

CREATE TABLE `subject_exams` (
  `id` bigint UNSIGNED NOT NULL,
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
  `subject_id` bigint UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي الدكتور هيسجل فيها الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `unit_name` json NOT NULL COMMENT 'اسم الفصل',
  `unit_code` json DEFAULT NULL COMMENT 'رمز الفصل',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `facebook_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `university_settings`
--

INSERT INTO `university_settings` (`id`, `email`, `logo`, `title`, `description`, `address`, `phone`, `maintenance`, `facebook_link`, `whatsapp_link`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'qeducato@gmail.com', 'assets/front/assets/photo/logo.png', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '{\"ar\": \"Qeducato\", \"en\": \"Qeducato\", \"fr\": \"Qeducato\"}', '+212 123-4567-901', 0, 'https://www.facebook.com/Qeducato', 'https://www.whatsapp.com/Qeducato', 'https://www.whatsapp.com/Qeducato', '2023-06-25 03:03:23', NULL);

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
(1, 'علي', 'محمد', 'islam123@gmail.com', '$2y$10$yOaTydI0HtsySotf6zGTZOVLE7gPVVIuUV3ABbQ4py.3PYQCRbJR6', NULL, 0.00, NULL, 'university@gmail.com', 375835838573, 8888390852345632, 78756735763476, 'مصري', '2000-06-10', NULL, NULL, 'القاهره', 'active', 'student', NULL, '2022', NULL, '2023-06-25 03:03:23', '2023-06-25 03:03:23'),
(2, 'abdallah', 'mahmoud', 'admin@admin.com', '$2y$10$7e8nPU.UJXcQ8xwgmrsm1.9GL8YSpqgsIeWctYyuT.L4Z1FJM320e', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'manger', NULL, NULL, NULL, '2023-06-25 03:03:23', '2023-06-25 03:03:23');

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
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `name`, `description`, `role`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"مرحبا\", \"en\": \"hello\", \"fr\": \"hello\"}', '{\"ar\": \"كلمة العميد\", \"en\": \"word\", \"fr\": \"word\"}', '{\"ar\": \"العميد\", \"en\": \"amed\", \"fr\": \"amed\"}', 'assets/front/assets/photo/about_img.png', 1, '2023-06-25 03:03:23', NULL);

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
  ADD KEY `certificates_user_id_foreign` (`user_id`),
  ADD KEY `certificates_certificate_type_id_foreign` (`certificate_type_id`);

--
-- Indexes for table `certificate_types`
--
ALTER TABLE `certificate_types`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reasons_redresses`
--
ALTER TABLE `reasons_redresses`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `subjects_unit_id_foreign` (`unit_id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`),
  ADD KEY `subjects_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exams_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_students_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_exam_students_user_id_foreign` (`user_id`);

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
  ADD KEY `subject_unit_doctors_subject_id_foreign` (`subject_id`);

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
-- AUTO_INCREMENT for table `certificate_types`
--
ALTER TABLE `certificate_types`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_branches`
--
ALTER TABLE `department_branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internal_ads`
--
ALTER TABLE `internal_ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process_exams`
--
ALTER TABLE `process_exams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasons_redresses`
--
ALTER TABLE `reasons_redresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `university_settings`
--
ALTER TABLE `university_settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `certificates_certificate_type_id_foreign` FOREIGN KEY (`certificate_type_id`) REFERENCES `certificate_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `subjects_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD CONSTRAINT `subject_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
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
  ADD CONSTRAINT `subject_unit_doctors_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
