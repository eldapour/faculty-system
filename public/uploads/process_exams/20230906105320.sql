-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2023 at 07:28 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.6

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
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الاعلان',
  `background_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الاعلان',
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `service_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي مصلحه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `description`, `image`, `background_image`, `file`, `category_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"zxzXz\", \"en\": \"XzX\", \"fr\": \"Xxasad\"}', '{\"ar\": \"<p>xxzXxzX</p>\", \"en\": \"<p>zXXz</p>\", \"fr\": \"<p>XX</p>\"}', '20230709112359.jpg', '20230711111257.jpg', NULL, 1, 3, '2023-07-09 08:23:59', '2023-07-11 08:12:57'),
(2, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(3, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(4, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(5, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(7, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(8, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(9, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(10, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(11, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(12, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(13, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(14, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(15, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(16, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(17, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(18, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(19, '{\"ar\": \"dasdasd\", \"en\": \"dasdasd\", \"fr\": \"asdasd\"}', '{\"ar\": \"<p>xzXZx</p>\", \"en\": \"<p>xzXz</p>\", \"fr\": \"<p>xZX</p>\"}', '20230709114251.jpg', '20230711111244.jpg', NULL, 1, 3, '2023-07-09 08:42:51', '2023-07-11 08:12:44'),
(20, '{\"ar\": \"zxzXz\", \"en\": \"XzX\", \"fr\": \"Xxasad\"}', '{\"ar\": \"<p>xxzXxzX</p>\", \"en\": \"<p>zXXz</p>\", \"fr\": \"<p>XX</p>\"}', '20230709112359.jpg', '20230711111257.jpg', NULL, 1, 3, '2023-07-09 08:23:59', '2023-07-11 08:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"كلية\", \"en\": \"College\", \"fr\": \"Collège\"}', '2023-06-13 02:48:11', NULL),
(2, '{\"ar\": \"قسم\", \"en\": \"Section\", \"fr\": \"Section\"}', '2023-06-13 02:48:11', NULL),
(3, '{\"ar\": \"التكوينات\", \"en\": \"Configurations\", \"fr\": \"Configurations\"}', '2023-06-13 02:48:11', NULL),
(4, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '2023-06-13 02:48:11', NULL),
(5, '{\"ar\": \"الحياة الطلابية\", \"en\": \"Student Life\", \"fr\": \"Vie étudiante\"}', '2023-06-13 02:48:11', NULL),
(6, '{\"ar\": \"مدونة\", \"en\": \"Blog\", \"fr\": \"Blog\"}', '2023-06-13 02:48:11', NULL),
(7, '{\"ar\": \"تقدم الدراسة\", \"en\": \"Study Progress\", \"fr\": \"Progrès de l étude\"}', '2023-06-13 02:48:11', NULL),
(8, '{\"ar\": \"الخدمات الرقمية\", \"en\": \"Digital Services\", \"fr\": \"Services numériques\"}', '2023-06-13 02:48:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `certificate_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `validation_year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سنه استيفاء الدبلوم',
  `situation_with_management` tinyint(1) DEFAULT '0' COMMENT 'الوضعيه مع الاداره',
  `situation_with_treasury` tinyint(1) DEFAULT '0' COMMENT 'الوضعيه مع الخزانه',
  `description_situation_with_management` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin COMMENT 'ملاحظات علي الوضعيه مع الاداره',
  `description_situation_with_treasury` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin COMMENT 'ملاحظه علي الوضعيه مع الخزانه',
  `year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `certificate_type_id`, `validation_year`, `situation_with_management`, `situation_with_treasury`, `description_situation_with_management`, `description_situation_with_treasury`, `year`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2022', 0, 1, NULL, NULL, '2023', '2023-06-19 09:01:26', '2023-06-19 09:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_types`
--

CREATE TABLE `certificate_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificate_type_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_type_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_type_fr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الكود باللاتيني',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_types`
--

INSERT INTO `certificate_types` (`id`, `certificate_type_ar`, `certificate_type_en`, `certificate_type_fr`, `code`, `created_at`, `updated_at`) VALUES
(1, 'شهاده هندسه الحاسوب', 'Computer Engineering Degree', 'Diplôme d\'ingénieur en informatique', '#ccc', '2023-06-19 11:38:27', '2023-06-19 11:38:27'),
(2, 'شهاده هندسه الاتصالات', 'Communication Engineering Degree', 'Diplôme d\'ingénieur en communication', '#ddd', '2023-06-19 11:38:27', '2023-06-19 11:38:27'),
(3, 'شهاده هندسه الكهرباء', 'Electrical engineering degree', 'Diplôme d\'ingénieur en électricité', '#fff', '2023-06-19 11:38:27', '2023-06-19 11:38:27');

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
  `deadline_date_start` date NOT NULL,
  `deadline_date_end` date NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `deadline_type` tinyint(1) NOT NULL COMMENT '1 => طلب استدراك 0 => طلب معالجه نقطه',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `deadline_date_start`, `deadline_date_end`, `year`, `period`, `deadline_type`, `created_at`, `updated_at`) VALUES
(2, '2023-07-30', '2023-09-09', '2023', 'ربيعيه', 1, '2023-07-30 13:35:55', '2023-07-30 13:35:55'),
(3, '2023-07-30', '2023-09-09', '2023', 'ربيعيه', 0, '2023-07-30 13:45:18', '2023-07-30 13:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `department_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رمز المسلك',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_code`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هندسه\", \"en\": \"Engineering\", \"fr\": \"Engineering\"}', '#aaa', '2023-06-13 03:07:46', '2023-06-19 05:13:50'),
(2, '{\"ar\": \"حاسبات ومعلومات\", \"en\": \"computers and data\", \"fr\": \"ordinateurs et données\"}', '#bbb', '2023-06-13 03:08:06', '2023-06-19 05:14:13'),
(3, '{\"ar\": \"لغه عربيه\", \"en\": \"Arabic Language\", \"fr\": \"Langue Arabe\"}', '#ccc', '2023-06-13 03:08:18', '2023-06-19 05:14:28'),
(4, '{\"ar\": \"علوم\", \"en\": \"science\", \"fr\": \"les sciences\"}', '#ddd', '2023-06-13 03:08:31', '2023-06-19 05:14:47'),
(5, '{\"ar\": \"اصول دين\", \"en\": \"The fundamentals of religion\", \"fr\": \"Les fondamentaux de la religion\"}', '#eee', '2023-06-13 03:08:43', '2023-06-19 05:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `department_branches`
--

CREATE TABLE `department_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `department_branch_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رمز المسار',
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department_branches`
--

INSERT INTO `department_branches` (`id`, `branch_name`, `department_branch_code`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هندسه ميكانيكا\", \"en\": \"Mechanical Engineering\", \"fr\": \"Mechanical Engineering\"}', 'rwer3423', 1, '2023-06-13 03:14:14', '2023-06-13 03:14:14'),
(2, '{\"ar\": \"هندسه اتصالات\", \"en\": \"communication Engineering\", \"fr\": \"communication Engineering\"}', NULL, 1, '2023-06-13 03:14:38', '2023-06-13 03:14:38'),
(3, '{\"ar\": \"هندسه مدني\", \"en\": \"civil engineering\", \"fr\": \"civil engineering\"}', NULL, 1, '2023-06-13 03:14:59', '2023-06-13 03:14:59'),
(4, '{\"ar\": \"هندسه حاسبات\", \"en\": \"Computer Engineering\", \"fr\": \"Computer Engineering\"}', NULL, 1, '2023-06-13 03:16:45', '2023-06-13 03:16:45'),
(5, '{\"ar\": \"علوم الحاسب\", \"en\": \"Computer Science\", \"fr\": \"Computer Science\"}', NULL, 2, '2023-06-13 03:17:20', '2023-06-13 03:17:20'),
(6, '{\"ar\": \"تكنولوجيا المعلومات\", \"en\": \"information technology\", \"fr\": \"information technology\"}', NULL, 2, '2023-06-13 03:17:53', '2023-06-13 03:17:53'),
(7, '{\"ar\": \"نظم المعلومات\", \"en\": \"Information Systems\", \"fr\": \"Information Systems\"}', NULL, 2, '2023-06-13 03:18:41', '2023-06-13 03:18:41'),
(8, '{\"ar\": \"الذكاء الصناعي\", \"en\": \"artificial intelligence\", \"fr\": \"artificial intelligence\"}', NULL, 2, '2023-06-13 03:19:21', '2023-06-13 03:19:21'),
(9, '{\"ar\": \"النقد\", \"en\": \"criticism\", \"fr\": \"criticism\"}', NULL, 3, '2023-06-13 03:20:08', '2023-06-13 03:20:08'),
(10, '{\"ar\": \"البلاغة\", \"en\": \"rhetoric\", \"fr\": \"rhetoric\"}', NULL, 3, '2023-06-13 03:20:49', '2023-06-13 03:20:49'),
(11, '{\"ar\": \"الأدب\", \"en\": \"literature\", \"fr\": \"literature\"}', NULL, 3, '2023-06-13 03:22:16', '2023-06-13 03:22:16'),
(12, '{\"ar\": \"النحو والصرف\", \"en\": \"Grammar\", \"fr\": \"Grammar\"}', NULL, 3, '2023-06-13 03:24:34', '2023-06-13 03:24:34'),
(13, '{\"ar\": \"قسم الرياضيات\", \"en\": \"Mathematics department\", \"fr\": \"Mathematics department\"}', NULL, 4, '2023-06-13 03:25:22', '2023-06-13 03:25:22'),
(14, '{\"ar\": \"قسم الفيزياء\", \"en\": \"physics department\", \"fr\": \"physics department\"}', NULL, 4, '2023-06-13 03:25:43', '2023-06-13 03:25:43'),
(15, '{\"ar\": \"قسم الكيمياء\", \"en\": \"chemistry department\", \"fr\": \"chemistry department\"}', NULL, 4, '2023-06-13 03:26:05', '2023-06-13 03:26:05'),
(16, '{\"ar\": \"قسم الجيولوجيا\", \"en\": \"Department of Geology\", \"fr\": \"Department of Geology\"}', NULL, 4, '2023-06-13 03:26:29', '2023-06-13 03:26:29'),
(17, '{\"ar\": \"قسم اللغة العربية\", \"en\": \"the department of Arabic language\", \"fr\": \"the department of Arabic language\"}', NULL, 5, '2023-06-13 03:27:08', '2023-06-13 03:27:08'),
(18, '{\"ar\": \"قسم الدراسات الإسلامية\", \"en\": \"Department of Islamic Studies\", \"fr\": \"Department of Islamic Studies\"}', NULL, 5, '2023-06-13 03:27:48', '2023-06-13 03:27:48'),
(19, '{\"ar\": \"قسم تقنيات التحليلات المرضية\", \"en\": \"Department of Pathological Analytics Techniques\", \"fr\": \"Department of Pathological Analytics Techniques\"}', NULL, 5, '2023-06-13 03:28:16', '2023-06-19 05:34:25');

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
(1, '2023', 1, 1, 5, '2023-06-13 03:33:10', '2023-07-19 12:12:49'),
(2, '2023', 0, 4, 5, '2023-06-13 03:33:10', '2023-06-18 08:21:21'),
(3, '2023', 0, 5, 14, '2023-06-13 03:33:10', '2023-06-18 08:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `department_students`
--

CREATE TABLE `department_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب  المسلك',
  `confirm_request` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_students`
--

INSERT INTO `department_students` (`id`, `user_id`, `department_id`, `year`, `period`, `confirm_request`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023', 'ربيعيه', 1, '2023-07-31 06:56:25', '2023-07-31 06:56:25'),
(2, 4, 2, '2023', 'ربيعيه', 1, '2023-07-31 06:56:25', '2023-07-31 06:56:25'),
(3, 5, 4, '2023', 'ربيعيه', 1, '2023-07-31 06:56:25', '2023-07-31 06:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `document_type_id` bigint(20) UNSIGNED NOT NULL COMMENT 'نوع الوثيقه',
  `withdraw_by_proxy` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'سحب بالوكاله',
  `person_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'اسم الموكل اليه',
  `national_id_of_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رقم البطاقه الوطنيه للموكل اليه',
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
(1, 1, 1, 1, 'اسلام محمد رجب', 'ddd332323223', '20230727153254.png', '2023-07-27', 'temporary', '2023-08-03', '2023-08-05', 'under_processing', '2023-07-27', '2023-07-27 12:32:54', '2023-07-27 12:32:54'),
(2, 1, 3, 1, 'جمال السيد', 'ddd332323223', '20230727153355.png', '2023-07-27', 'final', '2023-08-05', '2023-08-23', 'new', NULL, '2023-07-27 12:33:55', '2023-07-27 12:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `document_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"وثيقه سحب بكالوريا\", \"en\": \"Bachelor\'s degree certificate\", \"fr\": \"Certificat de baccalauréat\"}', '2023-06-26 08:02:32', '2023-06-26 08:02:32'),
(2, '{\"ar\": \"سحب وثيقه ميلاد\", \"en\": \"Withdraw a birth certificate\", \"fr\": \"Retirer un acte de naissance\"}', '2023-06-26 08:02:50', '2023-06-26 08:02:50'),
(3, '{\"ar\": \"سحب وثيقه شهاده الاعداديه\", \"en\": \"Bachelor\'s degree certificate\", \"fr\": \"Certificat de baccalauréat\"}', '2023-06-26 08:03:02', '2023-06-26 08:03:02'),
(4, '{\"ar\": \"سحب شهاده التخرج\", \"en\": \"Bachelor\'s degree certificate\", \"fr\": \"Certificat de baccalauréat\"}', '2023-06-26 08:03:16', '2023-06-26 08:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `element_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_latin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `element_code`, `name_ar`, `name_latin`, `session`, `department_id`, `created_at`, `updated_at`) VALUES
(16, '#ccc', 'عنصر تكنولوجيا', 'technology', 'ربيعيه', 1, '2023-08-07 09:44:10', '2023-08-07 09:44:10'),
(17, '#aaa', 'عنصر الاحياء', 'technology', 'ربيعيه', 1, '2023-08-07 09:44:10', '2023-08-07 09:44:10'),
(18, '#bbb', 'عنصر الرياضيات', 'technology math', 'ربيعيه', 1, '2023-08-07 09:44:10', '2023-08-07 09:44:10'),
(19, '#dscavsd', 'عنصر الكيمياء', 'technology', 'ربيعيه', 1, '2023-08-16 13:29:53', '2023-08-16 13:29:53'),
(20, '#dacsnbhg', 'عنصر ماده الفيزياء', 'technology phyisic', 'ربيعيه', 1, '2023-08-16 13:30:55', '2023-08-16 13:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره الحدث',
  `background_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'صوره خلفيه الحدث',
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `background_image`, `category_id`, `file`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Voluptas voluptates\", \"en\": \"Maxime ut deserunt e\", \"fr\": \"Culpa labore obcaeca\"}', '{\"ar\": \"<p>aaaaaaaa</p>\", \"en\": \"<p>aaaaaaaaa</p>\", \"fr\": \"<p>aaaaaaaa</p>\"}', 'uploads/events/images/17831689063431.png', 'uploads/events/background_image/49971689063431.jpg', 7, NULL, '2023-07-11 08:17:11', '2023-07-11 08:17:11'),
(12, '{\"ar\": \"Voluptas voluptates\", \"en\": \"Maxime ut deserunt e\", \"fr\": \"Culpa labore obcaeca\"}', '{\"ar\": \"<p>aaaaaaaa</p>\", \"en\": \"<p>aaaaaaaaa</p>\", \"fr\": \"<p>aaaaaaaa</p>\"}', 'uploads/events/images/17831689063431.png', 'uploads/events/background_image/49971689063431.jpg', 7, NULL, '2023-07-11 08:17:11', '2023-07-11 08:17:11'),
(13, '{\"ar\": \"Voluptas voluptates\", \"en\": \"Maxime ut deserunt e\", \"fr\": \"Culpa labore obcaeca\"}', '{\"ar\": \"<p>aaaaaaaa</p>\", \"en\": \"<p>aaaaaaaaa</p>\", \"fr\": \"<p>aaaaaaaa</p>\"}', 'uploads/events/images/17831689063431.png', 'uploads/events/background_image/49971689063431.jpg', 7, NULL, '2023-07-11 08:17:11', '2023-07-11 08:17:11'),
(14, '{\"ar\": \"Voluptas voluptates\", \"en\": \"Maxime ut deserunt e\", \"fr\": \"Culpa labore obcaeca\"}', '{\"ar\": \"<p>aaaaaaaa</p>\", \"en\": \"<p>aaaaaaaaa</p>\", \"fr\": \"<p>aaaaaaaa</p>\"}', 'uploads/events/images/17831689063431.png', 'uploads/events/background_image/49971689063431.jpg', 7, NULL, '2023-07-11 08:17:11', '2023-07-11 08:17:11'),
(15, '{\"ar\": \"Voluptas voluptates\", \"en\": \"Maxime ut deserunt e\", \"fr\": \"Culpa labore obcaeca\"}', '{\"ar\": \"<p>aaaaaaaa</p>\", \"en\": \"<p>aaaaaaaaa</p>\", \"fr\": \"<p>aaaaaaaa</p>\"}', 'uploads/events/images/17831689063431.png', 'uploads/events/background_image/49971689063431.jpg', 7, NULL, '2023-07-11 08:17:11', '2023-07-11 08:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_counts`
--

CREATE TABLE `faculty_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `count` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_counts`
--

INSERT INTO `faculty_counts` (`id`, `image`, `title`, `count`, `created_at`, `updated_at`) VALUES
(2, 'uploads/facultyCount/1491689242089.png', '{\"ar\": \"مجموع الطلاب\", \"en\": \"Total students\", \"fr\": \"Total des étudiants\"}', 344, '2023-07-13 09:54:49', '2023-07-13 09:54:49'),
(3, 'uploads/facultyCount/62431689242133.png', '{\"ar\": \"الأطقم الإدارية\", \"en\": \"Administrative crews\", \"fr\": \"Equipes administratives\"}', 98, '2023-07-13 09:55:33', '2023-07-13 09:55:33'),
(4, 'uploads/facultyCount/9201689242302.png', '{\"ar\": \"أطقم تعليمية\", \"en\": \"Educational crews\", \"fr\": \"Equipes éducatives\"}', 44, '2023-07-13 09:58:22', '2023-07-13 09:58:22'),
(5, 'uploads/facultyCount/69301689242351.png', '{\"ar\": \"طلاب إجازة\", \"en\": \"vacation students\", \"fr\": \"étudiants en vacances\"}', 902, '2023-07-13 09:59:11', '2023-07-13 09:59:11'),
(6, 'uploads/facultyCount/74041689242404.png', '{\"ar\": \"طلاب الماجستير\", \"en\": \"Master\'s Students\", \"fr\": \"Étudiants à la maîtrise\"}', 433, '2023-07-13 10:00:04', '2023-07-13 10:00:57'),
(7, 'uploads/facultyCount/33571689242497.png', '{\"ar\": \"طلاب الدكتوراه\", \"en\": \"Doctoral students\", \"fr\": \"Étudiants au doctorat\"}', 68, '2023-07-13 10:01:37', '2023-07-13 10:01:37');

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
  `group_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `group_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رمز الفوج',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `group_code`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"الفوج الاول\", \"en\": \"The First regiment\", \"fr\": \"The first regiment\"}', '#aaa', '2023-06-13 02:49:06', '2023-06-19 04:49:16'),
(2, '{\"ar\": \"الفوج الثاني\", \"en\": \"The second regiment\", \"fr\": \"The second regiment\"}', '#ddd', '2023-06-13 02:49:15', '2023-06-19 04:48:12'),
(3, '{\"ar\": \"الفوج التالت\", \"en\": \"The third regiment\", \"fr\": \"The third regiment\"}', '#ppp', '2023-06-13 02:49:27', '2023-06-19 04:48:27'),
(4, '{\"ar\": \"الفوج الرابع\", \"en\": \"The fourth regiment\", \"fr\": \"The fourth regiment\"}', '#ccc', '2023-06-13 02:49:40', '2023-06-19 04:48:40'),
(5, '{\"ar\": \"الفوج الخامس\", \"en\": \"The five regiment\", \"fr\": \"The five regiment\"}', '#sss', '2023-06-13 02:49:52', '2023-06-26 09:09:30'),
(7, '{\"ar\": \"الفوج السادس\", \"en\": \"Sixth regiment\", \"fr\": \"Sixth regiment\"}', '#ggggg', '2023-06-26 09:09:13', '2023-06-26 09:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `internal_ads`
--

CREATE TABLE `internal_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `time_ads` time NOT NULL,
  `url_ads` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('show','hide') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'show',
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `internal_ads`
--

INSERT INTO `internal_ads` (`id`, `title`, `description`, `time_ads`, `url_ads`, `status`, `service_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"ddsds\", \"en\": \"sdsd\", \"fr\": \"sdsd\"}', '{\"ar\": \"<p>sasasa</p>\", \"en\": \"<p>sasasa</p>\", \"fr\": \"<p>sasasas</p>\"}', '10:56:00', 'https://www.facebook.com/', 'show', 3, '2023-07-09 06:55:37', '2023-07-09 07:29:46'),
(2, '{\"ar\": \"sjdjshdjdsdsd\", \"en\": \"sddsdsd\", \"fr\": \"saSAs\"}', '{\"ar\": \"<p>ASAsa</p>\", \"en\": \"<p>AsaS</p>\", \"fr\": \"<p>SA</p>\"}', '11:28:00', 'https://www.facebook.com/', 'show', 2, '2023-07-09 07:28:17', '2023-07-16 11:33:33'),
(3, '{\"ar\":\"Excepturi voluptate\",\"en\":\"Fugiat sapiente et s\",\"fr\":\"Molestiae soluta rec\"}', '{\"ar\":\"<p>dsds<\\/p>\",\"en\":\"<p>dsds<\\/p>\",\"fr\":\"<p>dsdsd<\\/p>\"}', '04:05:00', 'uploads/internal_ads/18831693746210.png', 'show', 2, '2023-09-03 13:03:30', '2023-09-03 13:03:30');

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
(9, '2023_05_22_111729_create_services_table', 1),
(10, '2023_05_22_111846_create_internal_ads_table', 1),
(11, '2023_05_22_113159_create_settings_table', 1),
(12, '2023_05_22_113320_create_groups_table', 1),
(13, '2023_05_22_113438_create_units_table', 1),
(14, '2023_05_22_113439_create_subjects_table', 1),
(15, '2023_05_22_114031_create_subject_students_table', 1),
(16, '2023_05_22_114420_create_subject_unit_doctors_table', 1),
(19, '2023_05_22_122053_create_categories_table', 1),
(20, '2023_05_22_122219_create_videos_table', 1),
(21, '2023_05_22_122506_create_advertisements_table', 1),
(22, '2023_05_22_124303_create_presentations_table', 1),
(23, '2023_05_22_124801_create_sliders_table', 1),
(24, '2023_05_22_124911_create_words_table', 1),
(25, '2023_05_22_125358_create_pages_table', 1),
(26, '2023_05_22_125631_create_university_settings_table', 1),
(27, '2023_05_28_065027_create_document_types_table', 1),
(31, '2023_05_29_062617_create_process_exams_table', 1),
(32, '2023_05_29_063315_create_student_requests_table', 1),
(35, '2023_05_29_072115_create_data_modifications_table', 1),
(36, '2023_05_31_091849_add_department_and_department_branches_to_subjects_table', 1),
(37, '2023_06_04_075401_create_schedules_table', 1),
(38, '2023_06_04_075929_create_events_table', 1),
(40, '2023_06_07_074627_create_periods_table', 1),
(42, '2023_05_22_120413_create_subject_exams_table', 2),
(49, '2023_05_28_112907_create_certificate_types_table', 6),
(50, '2023_05_29_071604_create_certificates_table', 6),
(51, '2023_06_19_082107_create_reasons_redresses_table', 7),
(52, '2023_06_19_065647_add_regiment_code_to_groups_table', 8),
(53, '2023_06_19_075015_add_department_code_to_departments_table', 8),
(54, '2023_06_19_075156_add_department_branch_code_to_department_branches_table', 8),
(55, '2023_06_19_075311_add_unit_code_to_units_table', 8),
(58, '2023_07_03_083844_email_verification', 10),
(59, '2023_07_11_092810_add_stamp_logo_to_university_settings_table', 11),
(60, '2023_07_11_134917_add_doctor_type_to_users_table', 12),
(61, '2023_07_13_111240_create_faculty_counts_table', 13),
(62, '2023_07_13_140358_add_dashboard_link_to_university_settings', 14),
(65, '2014_10_11_164310_create_student_types_table', 16),
(69, '2023_05_29_064057_create_documents_table', 19),
(70, '2023_07_30_113243_add_file_to_events', 20),
(71, '2023_07_30_113446_add_file_to_advertisements', 20),
(73, '2023_05_22_111516_create_deadlines_table', 21),
(74, '2014_10_13_104121_create_department_students_table', 22),
(76, '2023_05_29_055841_create_process_degrees_table', 23),
(77, '2023_05_29_055119_create_elements_table', 24),
(78, '2023_05_22_121421_create_subject_exam_student_results_table', 25),
(79, '2023_08_24_115615_add_group_id_to_subject_exams_table', 26),
(80, '2023_06_06_055323_create_subject_exam_students_table', 27),
(82, '2023_05_29_061751_create_point_statements_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `images`, `files`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collège\"}', '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Structure du Collèg\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-13 02:48:11', NULL),
(2, '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '{\"ar\": \"مجلس التأسيس\", \"en\": \"Foundation Board \", \"fr\": \"Conseil de fondation\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-13 02:48:11', NULL),
(3, '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '{\"ar\": \"جمعية الأعمال الاجتماعية\", \"en\": \"Social Business Association\", \"fr\": \"Association des entreprises sociales\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 1, '2023-06-13 02:48:11', NULL),
(4, '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الاول\", \"en\": \"Section One\", \"fr\": \"Section un\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-13 02:48:11', NULL),
(5, '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section un\"}', '{\"ar\": \"قسم الثاني\", \"en\": \"Section Two\", \"fr\": \"Section deux\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 2, '2023-06-13 02:48:11', NULL),
(6, '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '{\"ar\": \"العطلة\", \"en\": \"Holiday\", \"fr\": \"Vacances\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-13 02:48:11', NULL),
(7, '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '{\"ar\": \"ماجستير\", \"en\": \"Master\", \"fr\": \"Maître\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-13 02:48:11', NULL),
(8, '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '{\"ar\": \"دكتور فى الفلسفة\", \"en\": \"PHD\", \"fr\": \"Doctorat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 3, '2023-06-13 02:48:11', NULL),
(9, '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '{\"ar\": \"شراكة\", \"en\": \"Partnership\", \"fr\": \"Partenariat\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-13 02:48:11', NULL),
(10, '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '{\"ar\": \"بحث\", \"en\": \"Research\", \"fr\": \"Recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-13 02:48:11', NULL),
(11, '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '{\"ar\": \"بنية البحث\", \"en\": \"Search Structure\", \"fr\": \"Structure de la recherche\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 4, '2023-06-13 02:48:11', NULL),
(12, '{\"ar\": \"نوادي\", \"en\": \"Clubs\", \"fr\": \"Clubs\"}', '{\"ar\": \"<p>نوادي</p>\", \"en\": \"<p>Clubs</p>\", \"fr\": \"<p>Clubs</p>\"}', '[\"uploads/pagesImage/71211689068837.jpg\", \"uploads/pagesImage/64351689068838.jpg\", \"uploads/pagesImage/68631689068838.jpg\"]', '[]', 5, '2023-06-13 02:48:11', '2023-07-11 09:47:18'),
(13, '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '{\"ar\": \"طلاب اجانب\", \"en\": \"Foreign Students\", \"fr\": \"Étudiants étrangers\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-13 02:48:11', NULL),
(14, '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '{\"ar\": \"مؤسسة القانون الداخلي\", \"en\": \"Institution Internal Law\", \"fr\": \"Institution Droit interne\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 5, '2023-06-13 02:48:11', NULL),
(15, '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '{\"ar\": \"البرمجة السنوية\", \"en\": \"Annual Programming\", \"fr\": \"Programmation annuelle\"}', '[\"assets/front/assets/photo/evn-img-2.jpg\", \"assets/front/assets/photo/evn-img-1.jpg\", \"assets/front/assets/photo/evn-img-3.jpg\"]', '[\"assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf\", \"assets/front/assets/pdf/file1.pdf\"]', 7, '2023-06-13 02:48:11', NULL);

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
(1, '2023-06-13', '2023-10-13', 'ربيعيه', 'عاديه', '2023', '2024', 'start', '2023-06-13 04:20:29', '2023-06-13 04:20:29');

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
  `element_id` bigint(20) UNSIGNED NOT NULL,
  `degree_student` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'درجه الطالب',
  `degree_element` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'درجه العنصر',
  `course` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'الدوره',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_statements`
--

INSERT INTO `point_statements` (`id`, `user_id`, `element_id`, `degree_student`, `degree_element`, `course`, `year`, `created_at`, `updated_at`) VALUES
(12, 1, 17, '30', '50', 'عاديه', '2023', '2023-09-05 14:13:13', '2023-09-05 14:13:13'),
(13, 1, 18, '80', '100', 'عاديه', '2023', '2023-09-05 14:13:13', '2023-09-05 14:13:13'),
(14, 1, 19, '90', '100', 'عاديه', '2023', '2023-09-05 14:13:13', '2023-09-05 14:13:13'),
(15, 1, 20, '77', '100', 'عاديه', '2023', '2023-09-05 14:13:13', '2023-09-05 14:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sub_desc` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `experience_year` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `title`, `description`, `sub_desc`, `images`, `experience_year`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Ducimus reprehender\", \"en\": \"Tempor qui voluptas\", \"fr\": \"Rerum velit neque e\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\"}', '{\"ar\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"en\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\", \"fr\": \"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; porro laborum molestias. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; quam?</p>\"}', '[\"uploads/presentationImage/26311689078228.jpg\", \"uploads/presentationImage/28361689078228.jpg\", \"uploads/presentationImage/27861689078228.jpg\", \"uploads/presentationImage/92711689078228.jpg\"]', '25', 1, '2023-06-13 02:48:12', '2023-07-11 12:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `process_degrees`
--

CREATE TABLE `process_degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `doctor_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم دكتور الماده',
  `period` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'الدوره اللي الطالب امتحن فيها الماده دي',
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
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'سبب طلب الاعاده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasons_redresses`
--

CREATE TABLE `reasons_redresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reasons_redresses`
--

INSERT INTO `reasons_redresses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"غائب\", \"en\": \"absent\", \"fr\": \"absent\"}', '2023-06-26 08:08:55', '2023-06-26 08:08:55'),
(2, '{\"ar\": \"الصحه غير جيده\", \"en\": \"Health is not good\", \"fr\": \"Health is not good\"}', '2023-06-26 08:09:47', '2023-06-26 08:09:47'),
(3, '{\"ar\": \"حاله وفاه\", \"en\": \"case of death\", \"fr\": \"case of death\"}', '2023-06-26 08:10:14', '2023-06-26 08:10:14'),
(4, '{\"ar\": \"حادثه سير\", \"en\": \"car accident\", \"fr\": \"car accident\"}', '2023-06-26 08:10:48', '2023-06-26 08:10:48'),
(5, '{\"ar\": \"امر طاريء\", \"en\": \"Urgent matter\", \"fr\": \"Urgent matter\"}', '2023-06-26 08:11:25', '2023-06-26 08:11:25');

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
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `department_id`, `unit_id`, `description`, `pdf_upload`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'جدول محاضرات الفرقه الاولي مسلك هندسه', '1.pdf', '2023', '2023-06-19 06:15:29', '2023-06-19 06:15:29'),
(2, 2, 1, 'جدول محاضرات الفرقه الاولي مسلك حاسبات ومعلومات', '2.pdf', '2023', '2023-06-19 06:15:29', '2023-06-19 06:15:29'),
(3, 2, 1, 'جدول محاضرات الفرقه الاولي مسلك لغه عربيه', '3.pdf', '2023', '2023-06-19 06:15:29', '2023-06-19 06:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"مصلحه الشئؤن\", \"en\": \"affairs interest\", \"fr\": \"affairs interest\"}', '2023-06-26 08:00:39', '2023-06-26 08:00:39'),
(2, '{\"ar\": \"مصلحه الاداره\", \"en\": \"management interest\", \"fr\": \"management interest\"}', '2023-06-26 08:01:14', '2023-06-26 08:01:14'),
(3, '{\"ar\": \"مصلحه النشر\", \"en\": \"Publication interest\", \"fr\": \"Publication interest\"}', '2023-06-26 08:01:43', '2023-06-26 08:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `setting_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"هيكل الكلية\", \"en\": \"College Structure\", \"fr\": \"Ipsa repellendus L\"}', '{\"ar\": \"<p>هيكل الكلية</p>\", \"en\": \"<p>College Structure</p>\", \"fr\": \"<p>Ipsa repellendus L</p>\"}', 'assets/front/assets/photo/slider_bg_01.ac8b8779408287a47977.png', '2023-06-13 02:48:12', NULL),
(2, '{\"ar\": \"كيف حالك\", \"en\": \"how are you\", \"fr\": \"Sed sed est cum mini\"}', '{\"ar\": \"<p>كيف حالك</p>\", \"en\": \"<p>how are you</p>\", \"fr\": \"<p>Sed sed est cum mini</p>\"}', 'assets/front/assets/photo/slider_bg.6e3f0f1a1b58ac6d6c12.png', '2023-06-13 02:48:12', NULL);

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
-- Table structure for table `student_types`
--

CREATE TABLE `student_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_type` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ملاحظه علي انواع الطلاب',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_types`
--

INSERT INTO `student_types` (`id`, `student_type`, `notes`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"طلبة ماستر\", \"en\": \"Master\'s students\", \"fr\": \"Étudiants en master\"}', NULL, '2023-07-19 09:42:30', '2023-07-19 09:42:30'),
(2, '{\"ar\": \"طلبة إجازة\", \"en\": \"vacation students\", \"fr\": \"étudiants en vacances\"}', 'طلبة إجازة', '2023-07-19 09:46:19', '2023-07-19 09:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'اسم الماده',
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'القسم',
  `department_branch_id` bigint(20) UNSIGNED NOT NULL COMMENT 'التخصص',
  `unit_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الفصل الدراسي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `code`, `department_id`, `department_branch_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\": \"رياضيات هندسية\", \"en\": \"Engineering Mathematics\", \"fr\": \"Engineering Mathematics\"}', '#vvvv', 1, 3, 1, '2023-06-13 03:42:04', '2023-06-26 08:31:12'),
(3, '{\"ar\": \"تفاضل وتكامل\", \"en\": \"Calculus\", \"fr\": \"Calculus\"}', '#qqqqq', 1, 3, 1, '2023-06-13 03:42:34', '2023-06-26 08:30:55'),
(4, '{\"ar\": \"طرق عددية هندسية\", \"en\": \"Engineering Numerical Methods\", \"fr\": \"Engineering Numerical Methods\"}', '#cccc', 1, 3, 1, '2023-06-13 03:43:49', '2023-06-26 08:30:41'),
(5, '{\"ar\": \"هندسة جيوتقنية\", \"en\": \"Geotechnical Engineering\", \"fr\": \"Geotechnical Engineering\"}', '#ppp', 1, 3, 1, '2023-06-13 03:44:43', '2023-06-26 08:30:30'),
(6, '{\"ar\": \"هندسة بيئية\", \"en\": \"Environmental Engineering\", \"fr\": \"Environmental Engineering\"}', '#oooo', 1, 3, 1, '2023-06-13 03:45:51', '2023-06-26 08:30:18'),
(7, '{\"ar\": \"هيدرولوجيا\", \"en\": \"Hydrology\", \"fr\": \"Hydrology\"}', '#ttt', 1, 3, 1, '2023-06-13 03:48:04', '2023-06-26 08:30:03'),
(8, '{\"ar\": \"مقاومة مواد\", \"en\": \"Strength of Materials\", \"fr\": \"Strength of Materials\"}', '#iiii', 1, 3, 1, '2023-06-13 03:48:41', '2023-06-26 08:29:51'),
(9, '{\"ar\": \"تطبيقات الحاسوب\", \"en\": \"Computer Applications\", \"fr\": \"Computer Applications\"}', '#rrrrrr', 1, 3, 1, '2023-06-13 03:49:09', '2023-06-26 08:29:16'),
(10, '{\"ar\": \"مقدمه الحاسب\", \"en\": \"Computer introduction\", \"fr\": \"Computer introduction\"}', '#wwww', 2, 5, 1, '2023-06-13 03:49:41', '2023-06-26 06:31:21'),
(11, '{\"ar\": \"رياضيات 1\", \"en\": \"Mathematics 1\", \"fr\": \"Mathematics 1\"}', '#pppp', 2, 5, 1, '2023-06-13 03:50:54', '2023-06-26 06:28:55'),
(12, '{\"ar\": \"تراكيب محددة\", \"en\": \"specific compositions\", \"fr\": \"specific compositions\"}', '#www', 2, 5, 1, '2023-06-13 03:51:19', '2023-06-26 08:29:40'),
(13, '{\"ar\": \"مبادئ برمجة\", \"en\": \"Programming principles\", \"fr\": \"Programming principles\"}', '#dddd', 2, 5, 1, '2023-06-13 04:10:14', '2023-06-26 06:24:58'),
(14, '{\"ar\":\"\\u0627\\u0633\\u062a\\u064a\\u0644\",\"en\":\"Estiel\",\"fr\":\"Este\"}', '#xmkloas', 1, 3, 1, '2023-09-05 11:36:06', '2023-09-05 11:36:06'),
(15, '{\"ar\":\"\\u0627\\u0633\\u062a\\u0631\\u0627\\u0643\\u0634\\u0631\",\"en\":\"Structure\",\"fr\":\"Struc\"}', '#dsaspppdvcbg', 1, 3, 1, '2023-09-05 11:36:49', '2023-09-05 11:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `subject_exams`
--

CREATE TABLE `subject_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'الفوج',
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

--
-- Dumping data for table `subject_exams`
--

INSERT INTO `subject_exams` (`id`, `subject_id`, `group_id`, `exam_date`, `time_start`, `time_end`, `exam_day`, `year`, `period`, `session`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2023-07-30', '02:56:06', '03:56:06', 'السبت', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(7, 3, 1, '2023-08-01', '02:56:06', '03:56:06', 'الاحد', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(8, 4, 1, '2023-08-02', '02:56:06', '03:56:06', 'الاثنين', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(9, 5, 1, '2023-08-03', '02:56:06', '03:56:06', 'الثلاثاء', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(10, 6, 1, '2023-08-04', '02:56:06', '03:56:06', 'الاربعاء', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(11, 7, 1, '2023-08-05', '02:56:06', '03:56:06', 'الخميس', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(12, 8, 1, '2023-08-06', '02:56:06', '03:56:06', 'الجمعه', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(13, 9, 1, '2023-08-07', '02:56:06', '03:56:06', 'السبت', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(14, 14, 1, '2023-08-08', '02:56:06', '03:56:06', 'الاحد', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06'),
(15, 15, 1, '2023-08-09', '02:56:06', '03:56:06', 'الاتنين', '2023', 'ربيعيه', 'عاديه', '2023-09-05 09:56:06', '2023-09-05 09:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `subject_exam_students`
--

CREATE TABLE `subject_exam_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الطالب',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الفوج',
  `exam_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره',
  `session` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'عاديه' COMMENT 'الدوره',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_exam_students`
--

INSERT INTO `subject_exam_students` (`id`, `user_id`, `subject_id`, `group_id`, `exam_code`, `section`, `period`, `session`, `year`, `created_at`, `updated_at`) VALUES
(6, 1, 2, 1, '#aaa', 'Section 1', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(7, 1, 3, 1, '#bbb', 'Section 2', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(8, 1, 4, 1, '#ccc', 'Section 3', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(9, 1, 5, 1, '#ddd', 'Section 4', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(10, 1, 6, 1, '#eee', 'Section 5', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(11, 1, 7, 1, '#fff', 'Section 6', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(12, 1, 8, 1, '#ggg', 'Section 7', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(13, 1, 9, 1, '#kkk', 'Section 8', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(14, 1, 14, 1, '#lll', 'Section 9', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21'),
(15, 1, 15, 1, '#mmm', 'Section 10', 'ربيعيه', 'عاديه', '2023', '2023-09-05 10:00:21', '2023-09-05 10:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `subject_exam_student_results`
--

CREATE TABLE `subject_exam_student_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_enter_degree` date NOT NULL,
  `period` enum('عاديه','استدراكيه') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'الدوره اللي امتحن فيها الطالب',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الوحده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_exam_student_results`
--

INSERT INTO `subject_exam_student_results` (`id`, `student_degree`, `exam_degree`, `date_enter_degree`, `period`, `year`, `user_id`, `group_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(16, '80', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 2, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(17, '60', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 3, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(18, '70', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 4, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(19, '95', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 5, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(20, '92', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 6, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(21, '85', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 7, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(22, '55', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 8, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(23, '73', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 9, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(24, '79', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 14, '2023-09-05 10:03:51', '2023-09-05 10:03:51'),
(25, '89', '100', '2023-09-05', 'عاديه', '2023', 1, 1, 15, '2023-09-05 10:03:51', '2023-09-05 10:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `subject_students`
--

CREATE TABLE `subject_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الطالب',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي هيسجل فيها الطالب الماده دي',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_students`
--

INSERT INTO `subject_students` (`id`, `year`, `user_id`, `subject_id`, `group_id`, `period`, `created_at`, `updated_at`) VALUES
(27, '2023', 1, 2, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(28, '2023', 1, 3, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(29, '2023', 1, 4, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(30, '2023', 1, 5, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(31, '2023', 1, 6, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(32, '2023', 1, 7, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(33, '2023', 1, 8, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(34, '2023', 1, 9, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(35, '2023', 1, 14, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44'),
(36, '2023', 1, 15, 1, 'ربيعيه', '2023-09-05 09:28:44', '2023-09-05 09:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `subject_unit_doctors`
--

CREATE TABLE `subject_unit_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'الدكتور',
  `subject_id` bigint(20) UNSIGNED NOT NULL COMMENT 'اسم الماده',
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `period` enum('ربيعيه','خريفيه') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ربيعيه' COMMENT 'الفتره اللي الدكتور هيسجل فيها الماده',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_unit_doctors`
--

INSERT INTO `subject_unit_doctors` (`id`, `year`, `user_id`, `subject_id`, `group_id`, `period`, `created_at`, `updated_at`) VALUES
(9, '2023', 3, 2, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(10, '2023', 3, 2, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(11, '2023', 3, 2, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(12, '2023', 7, 3, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(13, '2023', 7, 3, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(14, '2023', 7, 3, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(15, '2023', 10, 4, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(16, '2023', 10, 4, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(17, '2023', 10, 4, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(18, '2023', 11, 5, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(19, '2023', 11, 5, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(20, '2023', 11, 5, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(21, '2023', 12, 6, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(22, '2023', 12, 6, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(23, '2023', 12, 6, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(24, '2023', 13, 7, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(25, '2023', 13, 7, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(26, '2023', 13, 7, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(27, '2023', 14, 8, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(28, '2023', 14, 8, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(29, '2023', 14, 8, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(30, '2023', 16, 9, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(31, '2023', 16, 9, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(32, '2023', 16, 9, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(33, '2023', 17, 14, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(34, '2023', 17, 14, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(35, '2023', 17, 14, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(36, '2023', 18, 15, 1, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(37, '2023', 18, 15, 2, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29'),
(38, '2023', 18, 15, 3, 'ربيعيه', '2023-09-05 08:36:29', '2023-09-05 08:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'اسم الفصل',
  `unit_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رمز الفصل',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_code`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"الفصل الدراسي الاول\", \"en\": \"Second Semester\", \"fr\": \"Third semester\"}', '#pppp', '2023-06-13 02:52:01', '2023-06-13 02:52:01'),
(2, '{\"ar\": \"الفصل الدراسي الثاني\", \"en\": \"Second Semester\", \"fr\": \"Second Semester\"}', '#qqqq', '2023-06-13 02:52:23', '2023-06-13 02:52:23'),
(3, '{\"ar\": \"الفصل الدراسي الثالث\", \"en\": \"Third semester\", \"fr\": \"Third semester\"}', '#rrrrrr', '2023-06-13 02:52:35', '2023-06-13 02:52:35'),
(4, '{\"ar\": \"الفصل الدراسي الرابع\", \"en\": \"Fourth semester\", \"fr\": \"Fourth semester\"}', '#oooo', '2023-06-13 02:52:48', '2023-06-19 05:49:24'),
(5, '{\"ar\": \"الفصل الدراسي الخامس\", \"en\": \"Fifth semester\", \"fr\": \"Fifth semester\"}', '#ttt', '2023-06-13 02:53:00', '2023-06-13 02:53:00'),
(6, '{\"ar\": \"الفصل الدراسي السادس\", \"en\": \"Sixth semester\", \"fr\": \"Sixth semester\"}', '#rrrr', '2023-06-13 02:53:13', '2023-06-13 02:53:13'),
(7, '{\"ar\": \"الفصل الدراسي السابع\", \"en\": \"Seventh semester\", \"fr\": \"Seventh semester\"}', '#eeee', '2023-06-13 02:53:54', '2023-06-13 02:53:54'),
(8, '{\"ar\": \"الفصل الدراسي الثامن\", \"en\": \"The eighth semester\", \"fr\": \"The eighth semester\"}', '#sss', '2023-06-13 02:54:28', '2023-06-13 02:54:28'),
(9, '{\"ar\": \"الفصل الدراسي التاسع\", \"en\": \"Ninth semester\", \"fr\": \"Ninth semester\"}', '#yyyy', '2023-06-13 02:57:00', '2023-06-13 02:57:00'),
(10, '{\"ar\": \"الفصل الدراسي العاشر\", \"en\": \"The tenth semester\", \"fr\": \"The tenth semester\"}', '#wwww', '2023-06-13 02:57:41', '2023-06-26 06:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `university_settings`
--

CREATE TABLE `university_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stamp_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT 'ختم المؤسسسه',
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reregister_start` date DEFAULT NULL,
  `reregister_end` date DEFAULT NULL,
  `reregister_the_track_start` date DEFAULT NULL,
  `reregister_the_track_end` date DEFAULT NULL,
  `maintenance` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `digital_student_platform` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `colleges_digital_platform` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `colleges_digital_magazine` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university_settings`
--

INSERT INTO `university_settings` (`id`, `email`, `logo`, `stamp_logo`, `title`, `description`, `address`, `reregister_start`, `reregister_end`, `reregister_the_track_start`, `reregister_the_track_end`, `maintenance`, `phone`, `facebook_link`, `whatsapp_link`, `youtube_link`, `created_at`, `updated_at`, `digital_student_platform`, `colleges_digital_platform`, `colleges_digital_magazine`) VALUES
(1, 'qeducato@gmail.com', '20230711103150.png', '20230711100951.png', '{\"ar\": \"كليتي\", \"en\": \"Kolity\", \"fr\": \"Kolity\"}', '{\"ar\": \"<p>الكلية هي مؤسسة تعليمية تعنى بتقديم برامج تعليمية عالية الجودة في مختلف المجالات الأكاديمية. تهدف الكلية إلى تطوير مهارات ومعارف الطلاب وتأهيلهم للعمل في مختلف المجالات الوظيفية. وتتميز الكلية بتوفير بيئة تعليمية متميزة تشجع على الإبداع والابتكار، وتتمثل هذه البيئة في وجود هياكل</p>\", \"en\": \"<p>The college is an educational institution concerned with providing high-quality educational programs in various academic fields. The college aims to develop students&#39; skills and knowledge and qualify them to work in various job fields. The college is characterized by providing a distinct educational environment that encourages creativity and innovation, and this environment is represented by the presence of structures</p>\", \"fr\": \"<p>Le coll&egrave;ge est un &eacute;tablissement d&#39;enseignement soucieux de fournir des programmes &eacute;ducatifs de haute qualit&eacute; dans divers domaines acad&eacute;miques. Le coll&egrave;ge vise &agrave; d&eacute;velopper les comp&eacute;tences et les connaissances des &eacute;tudiants et &agrave; les qualifier pour travailler dans divers domaines d&#39;emploi. Le coll&egrave;ge se caract&eacute;rise par offrir un environnement &eacute;ducatif distinct qui encourage la cr&eacute;ativit&eacute; et l&#39;innovation, et cet environnement est repr&eacute;sent&eacute; par la pr&eacute;sence de structures</p>\"}', '{\"ar\": \"المغرب\", \"en\": \"Magreb\", \"fr\": \"Magreb\"}', '2023-06-13', '2023-08-30', '2023-08-09', '2023-09-13', 0, '12345678910', 'https://www.facebook.com/Qeducato', 'https://www.whatsapp.com/Qeducato', 'https://www.whatsapp.com/Qeducato', '2023-06-13 02:48:12', '2023-07-13 11:18:01', 'http://localhost:8000/ar/login-student', 'http://localhost:8000', 'http://localhost:8000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name_latin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_latin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double(12,2) NOT NULL DEFAULT '0.00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `university_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'رقم الكارنيه الجامعي',
  `national_id` bigint(20) DEFAULT NULL COMMENT 'رقم القومي للبطاقه',
  `national_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الرقم القومي',
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'الجنسيه',
  `birthday_date` date DEFAULT NULL,
  `birthday_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_latin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_address_latin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` enum('active','un_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_type` enum('student','doctor','manger','employee','factor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `professor_position` enum('official_professor','visiting_professor') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'وضعيه الاستاذ',
  `job_id` bigint(20) DEFAULT NULL COMMENT 'الرقم الوظيفي خاصه لغير الطالب',
  `student_type_id` bigint(20) DEFAULT NULL,
  `university_register_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `first_name_latin`, `last_name_latin`, `email`, `password`, `image`, `points`, `email_verified_at`, `university_email`, `identifier_id`, `national_id`, `national_number`, `nationality`, `birthday_date`, `birthday_place`, `city_ar`, `city_latin`, `address`, `country_address_ar`, `country_address_latin`, `user_status`, `user_type`, `professor_position`, `job_id`, `student_type_id`, `university_register_year`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'اسلام', 'محمد', 'Islamo', 'Mohammo', 'islam123@gmail.com', '$2y$10$mkO2LcLPUDjeTgeulSBANOiggkBvvlTiUF2kavAqhffTAZVHXMO/2', '20230711155727.jpg', 0.00, NULL, 'university@gmail.com', '119000610', 8888390852345632, '78756735763476', 'azerbaijani', '2000-06-10', 'الحامول', 'منوف', 'Menouf', 'القاهره', 'مصر', 'Cairo', 'active', 'student', NULL, NULL, 2, '2023', NULL, '2023-06-13 02:48:11', '2023-08-15 09:50:20'),
(2, 'عبد الله', 'محمود', 'Abdullah', 'Mahmmoud', 'admin@admin.com', '$2y$10$4KNXm1oS/mQHeAOXyeWH9OtJDAm6riIjTvLe8PdRKf5kye3VjgI7e', '20230711153429.jpg', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'employee', NULL, 5345345345, NULL, NULL, NULL, '2023-06-13 02:48:11', '2023-07-11 12:34:29'),
(3, 'دكتور.رفعت', 'اسماعيل', 'Refaat', 'Esmail', 'Refaat@gmail.com', '$2y$10$4KNXm1oS/mQHeAOXyeWH9OtJDAm6riIjTvLe8PdRKf5kye3VjgI7e', '20230711145606.jpg', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'official_professor', 3333333, NULL, NULL, NULL, '2023-06-13 02:48:11', '2023-07-12 13:52:08'),
(4, 'جمال', 'محمد', 'Gammalo', 'Mohammo', 'gamal@gmail.com', '$2y$10$mkVs47xMTaHPWKveYiLSR.GNiwWYDFWXthth5yd.TIC801hWKV.IO', '20230711155743.jpg', 0.00, NULL, 'unv123@gmail.com', '119000612', 22334455, '78756735763410', 'bahraini', '2000-06-10', 'الحامول', 'منوف', 'Menouf', 'القاهره', 'مصر', 'Cairo', 'active', 'student', NULL, NULL, 2, '2023', NULL, '2023-06-13 02:48:11', '2023-08-15 09:50:07'),
(5, 'عبد الله', 'محمد', 'Abdallo', 'Mohammo', 'Abdullah123@gmail.com', '$2y$10$IY8dmmJeJAuJrpKYOl0p9.0bzh7mptcjgJ3Q2ATnKLbHu0GREhba6', '20230711155642.jpg', 0.00, NULL, 'Abdullahunv@gmail.com', '375835838540', 8888390852345620, '78756735763400', 'bahamian', '2000-06-10', 'شبرا بلوله', 'منوف', 'Menouf', 'القاهره', 'مصر', 'Cairo', 'active', 'student', NULL, NULL, 2, '2023', NULL, '2023-06-13 02:48:11', '2023-08-15 09:49:58'),
(6, 'السيد', 'علي', 'Elsayed', 'Ali', 'ali22222@gmail.com', '$2y$10$2a0zjNCrER7cE18sKdupgOwAxRNjRpG9nzJrDfGYc4d21Sd4JxUGq', '20230709160136.jpg', 2.00, NULL, 'ali22200@gmail.com', '434343222', 44444333222, '222222233344455', 'albanian', '2000-10-06', 'شبين', 'القاهره', 'Menouf', 'منوف-المنوفيه', 'السعوديه', 'Saudi', 'un_active', 'student', NULL, NULL, 2, '2023', NULL, '2023-07-09 13:01:36', '2023-08-15 09:49:44'),
(7, 'دكتور.محمد', 'علاء', 'Mohammo', 'Alla', 'mohamedali123456@gmail.com', '$2y$10$CYZYQcLjSvHfjg6bMAKB0.MMveYCOZ4TKrye07cpg0GeSZ92P2Zf6', '20230711145701.jpg', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 43423423, NULL, NULL, NULL, '2023-07-11 11:57:01', '2023-07-12 13:52:09'),
(8, 'السباغ', 'احمد', 'Elsapgh', 'Ahmed', 'ahmed11226578@gmail.com', '$2y$10$4KNXm1oS/mQHeAOXyeWH9OtJDAm6riIjTvLe8PdRKf5kye3VjgI7e', '20230816153714.jpg', 0.00, NULL, 'ahmeduniversity123@gmail.com', '63098765', 64343, 'fd988n45gf', 'afghan', '2023-08-26', 'شبين', 'القاهره', 'Menouf', 'منوف-المنوفيه', 'السعوديه', 'Cair', 'un_active', 'student', NULL, NULL, 2, '2023', NULL, '2023-08-16 13:37:14', '2023-08-16 13:37:14'),
(9, 'احمد', 'سعد', 'Ahmed', 'Saad', 'ahmedsaad123@gmail.com', '$2y$10$4KNXm1oS/mQHeAOXyeWH9OtJDAm6riIjTvLe8PdRKf5kye3VjgI7e', '20230711155727.jpg', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'manger', NULL, NULL, NULL, NULL, NULL, '2023-06-13 02:48:11', '2023-08-15 09:50:20'),
(10, 'دكتور.سيد', 'عادل', 'Sayed', 'Adel', 'Sayed@gmail.com', '$2y$10$hN1nO6DVN9RE0dCmXbhDmei8cki.cPci/GS8cSPFadxSBzKFue3Nm', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'official_professor', 30, NULL, NULL, NULL, '2023-09-03 11:24:15', '2023-09-03 11:24:15'),
(11, 'دكتور.شادي', 'جمال', 'Shady', 'Gamal', 'Shady@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 44, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(12, 'دكتور.امجد', 'السيد', 'Amagad', 'Elsayed', 'Amagad1234@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 998152976, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(13, 'دكتور.عثمان', 'السيد', 'Osman', 'Elsayed', 'Osman1234@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 127542, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(14, 'دكتور.احمد', 'الصباغ', 'Ahmed', 'Elsapagh', 'AhmedElsapgh22345@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 90129876, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(16, 'دكتور.ماذن', 'رافت', 'Mazen', 'Rafeet', 'MazenRafeet12900@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 66210955678, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(17, 'دكتور.حمصي', 'ابو زعبل', 'Hemsy', 'Abo Zabel', 'Hemsy40912345@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 66666098, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02'),
(18, 'دكتور.جاد', 'علي', 'Gaad', 'Ali', 'Gaad7209987@gmail.com', '$2y$10$jiqLuSf65/MmAFbMQd7vAeXXX7DXBnGuQgQEbNny9eKECI1X8AkHG', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'doctor', 'visiting_professor', 4345309, NULL, NULL, NULL, '2023-09-03 11:30:02', '2023-09-03 11:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `background_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `background_image`, `video_url`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"Consequatur officia\", \"en\": \"At quas et aliquid n\", \"fr\": \"Ex do dolore ea qui\"}', '{\"ar\": \"<p>aaa</p>\", \"en\": \"<p>aaa</p>\", \"fr\": \"<p>aaa</p>\"}', 'uploads/videos/57691689078355.png', 'https://www.youtube.com/embed/pmJSrL2GpUQ', '2023-07-11 12:25:55', '2023-07-11 12:25:55'),
(2, '{\"ar\": \"Consequatur officia\", \"en\": \"At quas et aliquid n\", \"fr\": \"Ex do dolore ea qui\"}', '{\"ar\": \"<p>aaa</p>\", \"en\": \"<p>aaa</p>\", \"fr\": \"<p>aaa</p>\"}', 'uploads/videos/57691689078355.png', 'https://www.youtube.com/embed/pmJSrL2GpUQ', '2023-07-11 12:25:55', '2023-07-11 12:25:55'),
(3, '{\"ar\": \"Consequatur officia\", \"en\": \"At quas et aliquid n\", \"fr\": \"Ex do dolore ea qui\"}', '{\"ar\": \"<p>aaa</p>\", \"en\": \"<p>aaa</p>\", \"fr\": \"<p>aaa</p>\"}', 'uploads/videos/57691689078355.png', 'https://www.youtube.com/embed/pmJSrL2GpUQ', '2023-07-11 12:25:55', '2023-07-11 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'الصفه الوظيفيه',
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'تبع انهي قسم',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `name`, `description`, `role`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\": \"كلمة عميد الكلية\", \"en\": \"Dean\'s speech\", \"fr\": \"Discours du doyen\"}', '{\"ar\": \"<p>عزيزي الطالبات والطلاب، أنا بفخر وسرور كبير أقف أمامكم بصفتي عميدًا لكليتنا العزيزة. إنه لشرف كبير أن أتولى هذا المنصب الهام وأعمل على تطوير ورقي الكلية. كليتنا هي مكان للتعلم والاكتشاف، حيث يجتمع الطلاب المتحمسون والأساتذة المختصون في مجالات متنوعة. نحن نسعى جاهدين لتوفير بيئة تعليمية حافزة ومليئة بالتحديات التي تساعدكم على تنمية مهاراتكم واكتساب المعرفة العميقة التي تحتاجونها في حياتكم المهنية والشخصية. كعميد للكلية، أتعهد بتوفير رؤية استراتيجية قوية للتطوير والابتكار. سنعمل جميعًا على تحسين البرامج الأكاديمية وتوسيع الفرص التعليمية. سنعزز التواصل والتفاعل بين الطلاب وأعضاء هيئة التدريس بهدف تعزيز التفوق الأكاديمي وتوفير بيئة داعمة ومحفزة. سنسعى أيضًا إلى توطيد صلاتنا مع المجتمع المحلي والقطاعات الاقتصادية لتوفير فرص تعليمية وتدريبية ذات جودة عالية لطلابنا. نشجع البحث العلمي والابتكار، ونسعى لتكوين جيل من الخريجين المبدعين والقادة الذين يمكنهم المساهمة بشكل فعال في تطوير المجتمع. أيضًا، أفتح ذراعي لاستقبال اقتراحاتكم وملاحظاتكم لنواصل تحسين الخدمات والمناخ الأكاديمي في الكلية. لا تترددوا في التواصل معي وفريق الإدارة لأي استفسارات أو احتياجات تحتاجون إلى مساعدتنا فيها. أختتم كلمتي هذه بتذكيركم بأن المستقبل يعتمد على جهودنا المشتركة وشغفنا بالتعلم والتطور. لنعمل معًا نحو بناء كلية متميزة ونجاح طلابها. مع أطيب التمنيات، 🎓 عميد الكلية 🎓</p>\", \"en\": \"<p>Dear students and students,</p>\\r\\n\\r\\n<p>With great pride and pleasure I stand before you as Dean of our dear college. It is a great honor to take on this important position and advance my college career.</p>\\r\\n\\r\\n<p>Our college is a place of learning and discovery, where enthusiastic students and professors who are experts in diverse fields meet. We strive to provide a stimulating and challenging learning environment that helps you develop your skills and gain the in-depth knowledge you need in your professional and personal life.</p>\\r\\n\\r\\n<p>As Dean of the College, I pledge to provide a strong strategic vision for development and innovation. We will all work to improve academic programs and expand educational opportunities. We will enhance communication and interaction between students and faculty members with the aim of promoting academic excellence and providing a supportive and stimulating environment.</p>\\r\\n\\r\\n<p>We will also seek to strengthen our links with the local community and economic sectors to provide high quality educational and training opportunities for our students. We encourage scientific research and innovation, and seek to create a generation of creative graduates and leaders who can contribute effectively to the development of society.</p>\\r\\n\\r\\n<p>Also, I open my arms to receive your suggestions and comments so that we can continue to improve the services and the academic climate in the college. Do not hesitate to contact me and the management team for any inquiries or needs you need our assistance with.</p>\\r\\n\\r\\n<p>I conclude by reminding you that the future depends on our joint efforts and our passion for learning and development. Let&#39;s work together towards building an outstanding college and the success of its students.</p>\\r\\n\\r\\n<p>best wishes,</p>\\r\\n\\r\\n<p>🎓 Dean of the College 🎓</p>\", \"fr\": \"<p>Chers &eacute;tudiants et &eacute;tudiantes,</p>\\r\\n\\r\\n<p>C&#39;est avec beaucoup de fiert&eacute; et de plaisir que je me tiens devant vous en tant que doyen de notre cher coll&egrave;ge. C&#39;est un grand honneur d&#39;occuper ce poste important et de faire progresser ma carri&egrave;re universitaire.</p>\\r\\n\\r\\n<p>Notre coll&egrave;ge est un lieu d&#39;apprentissage et de d&eacute;couverte, o&ugrave; se rencontrent des &eacute;tudiants enthousiastes et des professeurs experts dans divers domaines. Nous nous effor&ccedil;ons de fournir un environnement d&#39;apprentissage stimulant et stimulant qui vous aide &agrave; d&eacute;velopper vos comp&eacute;tences et &agrave; acqu&eacute;rir les connaissances approfondies dont vous avez besoin dans votre vie professionnelle et personnelle.</p>\\r\\n\\r\\n<p>En tant que doyen du Coll&egrave;ge, je m&#39;engage &agrave; fournir une vision strat&eacute;gique forte pour le d&eacute;veloppement et l&#39;innovation. Nous travaillerons tous pour am&eacute;liorer les programmes acad&eacute;miques et &eacute;largir les opportunit&eacute;s &eacute;ducatives. Nous am&eacute;liorerons la communication et l&#39;interaction entre les &eacute;tudiants et les membres du corps professoral dans le but de promouvoir l&#39;excellence acad&eacute;mique et de fournir un environnement favorable et stimulant.</p>\\r\\n\\r\\n<p>Nous chercherons &eacute;galement &agrave; renforcer nos liens avec la communaut&eacute; locale et les secteurs &eacute;conomiques afin d&#39;offrir des opportunit&eacute;s d&#39;&eacute;ducation et de formation de haute qualit&eacute; &agrave; nos &eacute;tudiants. Nous encourageons la recherche scientifique et l&#39;innovation, et cherchons &agrave; cr&eacute;er une g&eacute;n&eacute;ration de dipl&ocirc;m&eacute;s et de leaders cr&eacute;atifs qui peuvent contribuer efficacement au d&eacute;veloppement de la soci&eacute;t&eacute;.</p>\\r\\n\\r\\n<p>Aussi, je vous ouvre les bras pour recevoir vos suggestions et commentaires afin que nous puissions continuer &agrave; am&eacute;liorer les services et le climat acad&eacute;mique au coll&egrave;ge. N&#39;h&eacute;sitez pas &agrave; me contacter, ainsi qu&#39;&agrave; l&#39;&eacute;quipe de direction, pour toute demande ou besoin pour lequel vous avez besoin de notre aide.</p>\\r\\n\\r\\n<p>Je conclus en vous rappelant que l&#39;avenir d&eacute;pend de nos efforts conjoints et de notre passion pour l&#39;apprentissage et le d&eacute;veloppement. Travaillons ensemble &agrave; b&acirc;tir un coll&egrave;ge exceptionnel et la r&eacute;ussite de ses &eacute;tudiants.</p>\\r\\n\\r\\n<p>Avec mes meilleurs v&oelig;ux,</p>\\r\\n\\r\\n<p>🎓 Doyen du Coll&egrave;ge 🎓</p>\"}', '{\"ar\": \"العميد\", \"en\": \"Faculty Dean\", \"fr\": \"Doyen du Collège\"}', 'uploads/word/25611689074062.jpg', 1, '2023-06-13 02:48:11', '2023-07-11 11:14:22');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_department_code_unique` (`department_code`);

--
-- Indexes for table `department_branches`
--
ALTER TABLE `department_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_branches_department_branch_code_unique` (`department_branch_code`),
  ADD KEY `department_branches_department_id_foreign` (`department_id`);

--
-- Indexes for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_branch_students_user_id_foreign` (`user_id`),
  ADD KEY `department_branch_students_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `department_students`
--
ALTER TABLE `department_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_students_user_id_foreign` (`user_id`),
  ADD KEY `department_students_department_id_foreign` (`department_id`);

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
  ADD KEY `elements_department_id_foreign` (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexes for table `faculty_counts`
--
ALTER TABLE `faculty_counts`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_group_code_unique` (`group_code`);

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
  ADD KEY `point_statements_user_id_foreign` (`user_id`),
  ADD KEY `point_statements_element_id_foreign` (`element_id`);

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
-- Indexes for table `student_types`
--
ALTER TABLE `student_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codeo` (`code`),
  ADD KEY `subjects_unit_id_foreign` (`unit_id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`),
  ADD KEY `subjects_department_branch_id_foreign` (`department_branch_id`);

--
-- Indexes for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exams_subject_id_foreign` (`subject_id`),
  ADD KEY `group_id_foreign` (`group_id`);

--
-- Indexes for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_students_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_exam_students_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_students_group_id_foreign` (`group_id`);

--
-- Indexes for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_exam_student_results_group_id_foreign` (`group_id`),
  ADD KEY `subject_exam_student_results_user_id_foreign` (`user_id`),
  ADD KEY `subject_exam_student_results_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `subject_students`
--
ALTER TABLE `subject_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_students_user_id_foreign` (`user_id`),
  ADD KEY `subject_students_subject_id_foreign` (`subject_id`),
  ADD KEY `group_id__foreign` (`group_id`);

--
-- Indexes for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_unit_doctors_user_id_foreign` (`user_id`),
  ADD KEY `subject_unit_doctors_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_unit_doctors_cons_goup_id` (`group_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unit_code_unique` (`unit_code`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `certificate_types`
--
ALTER TABLE `certificate_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_modifications`
--
ALTER TABLE `data_modifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_branches`
--
ALTER TABLE `department_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department_branch_students`
--
ALTER TABLE `department_branch_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_students`
--
ALTER TABLE `department_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty_counts`
--
ALTER TABLE `faculty_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `internal_ads`
--
ALTER TABLE `internal_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `reasons_redresses`
--
ALTER TABLE `reasons_redresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `student_types`
--
ALTER TABLE `student_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_exams`
--
ALTER TABLE `subject_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject_students`
--
ALTER TABLE `subject_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `university_settings`
--
ALTER TABLE `university_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `department_students`
--
ALTER TABLE `department_students`
  ADD CONSTRAINT `department_students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `department_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `elements_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `point_statements_element_id_foreign` FOREIGN KEY (`element_id`) REFERENCES `elements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `subjects_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exams`
--
ALTER TABLE `subject_exams`
  ADD CONSTRAINT `group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subject_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_students`
--
ALTER TABLE `subject_exam_students`
  ADD CONSTRAINT `subject_exam_students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_exam_student_results`
--
ALTER TABLE `subject_exam_student_results`
  ADD CONSTRAINT `subject_exam_student_results_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_student_results_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_exam_student_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_students`
--
ALTER TABLE `subject_students`
  ADD CONSTRAINT `group_id__foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subject_students_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_unit_doctors`
--
ALTER TABLE `subject_unit_doctors`
  ADD CONSTRAINT `subject_unit_doctors_cons_goup_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
