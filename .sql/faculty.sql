-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2023 at 06:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faculty`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultation_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete_time` datetime NOT NULL,
  `meeting_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `student_id`, `faculty_id`, `slot_id`, `message`, `consultation_date`, `complete_time`, `meeting_link`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 36, 30, 17, 'GHfgdfg', '2023-04-23', '2023-04-24 22:07:00', 'LcPJ-bxeVZKNfSnRLN3CIU5nLvwNweRC2fjZVI9hHBs', 'Completed', '2023-04-20 10:57:15', '2023-04-24 10:07:00'),
(9, 36, 30, 21, 'Hey [Rejected as the consultation slot expired]', '2023-04-25', '2023-04-25 01:36:09', 'JtLDhQdFT_vT9w6vcyNso8gO8YivoTWM5MNkS3NIq0k', 'Rejected', '2023-04-24 13:27:47', '2023-04-24 13:30:00'),
(10, 36, 30, 19, 'Hello Please approve.', '2023-04-30', '2023-04-25 12:33:00', 'hPecaqIHmWUKUT2QzpnPzYBhcdY15afEo1VfqF3jEYo', 'Completed', '2023-04-24 13:36:34', '2023-04-25 00:33:00'),
(13, 36, 30, 42, 'I need help!', '2023-04-26', '2023-04-26 13:30:00', 'JDxz77SmeUF9sl5RVX2GKJIlmLwkbsymdn-1pI9Mpls', 'Completed', '2023-04-25 00:59:56', '2023-04-26 09:07:00'),
(14, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Approved', '2023-04-25 01:00:11', '2023-04-25 10:13:38'),
(15, 36, 30, 22, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Approved', '2023-04-25 01:00:11', '2023-04-25 10:13:38'),
(16, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Approved', '2023-04-25 01:00:11', '2023-04-26 12:14:43'),
(17, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Pending', '2023-04-25 01:00:11', '2023-04-25 10:13:38'),
(18, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Pending', '2023-04-25 01:00:11', '2023-04-25 10:13:38'),
(19, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-26 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Cancelled', '2023-04-25 01:00:11', '2023-04-26 09:07:00'),
(20, 36, 30, 21, 'I need help! Please', '2023-04-30', '2023-04-30 13:15:00', 'aWng6vvmibBcrYq8rlSmfj-3-McKpHwimhn1Tu76vcQ', 'Pending', '2023-04-25 01:00:11', '2023-04-25 10:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `consultation_slots`
--

CREATE TABLE `consultation_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultation_slots`
--

INSERT INTO `consultation_slots` (`id`, `faculty_id`, `day_of_week`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(17, 30, 'Sunday', '12:00', '12:15', 1, '2023-04-19 14:13:35', '2023-04-19 14:13:35'),
(18, 30, 'Sunday', '12:15', '12:30', 0, '2023-04-19 14:13:35', '2023-04-25 00:42:10'),
(19, 30, 'Sunday', '12:30', '12:45', 1, '2023-04-19 14:13:35', '2023-04-19 14:13:35'),
(20, 30, 'Sunday', '12:45', '13:00', 1, '2023-04-19 14:13:35', '2023-04-19 14:13:35'),
(21, 30, 'Sunday', '13:00', '13:15', 1, '2023-04-19 14:13:35', '2023-04-19 14:13:35'),
(22, 30, 'Sunday', '13:15', '13:30', 1, '2023-04-19 14:13:35', '2023-04-19 14:13:35'),
(32, 30, 'Monday', '12:00', '12:15', 1, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(33, 30, 'Monday', '12:15', '12:30', 1, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(34, 30, 'Monday', '12:30', '12:45', 1, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(35, 30, 'Monday', '12:45', '13:00', 1, '2023-04-20 05:47:01', '2023-04-25 00:42:02'),
(36, 30, 'Monday', '13:00', '13:15', 0, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(37, 30, 'Monday', '13:15', '13:30', 0, '2023-04-20 05:47:01', '2023-04-25 00:42:07'),
(38, 30, 'Monday', '13:30', '13:45', 1, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(39, 30, 'Monday', '13:45', '14:00', 1, '2023-04-20 05:47:01', '2023-04-20 05:47:01'),
(40, 30, 'Wednesday', '13:00', '13:15', 1, '2023-04-24 13:41:04', '2023-04-24 13:41:04'),
(41, 30, 'Wednesday', '13:15', '13:30', 1, '2023-04-24 13:41:04', '2023-04-24 13:41:04'),
(42, 30, 'Wednesday', '13:30', '13:45', 1, '2023-04-24 13:41:04', '2023-04-24 13:41:04'),
(43, 30, 'Wednesday', '13:45', '14:00', 1, '2023-04-24 13:41:04', '2023-04-24 13:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_title`, `course_credit`, `created_at`, `updated_at`) VALUES
(1, 'CSE100', 'INTRODUCTION TO COMPUTING', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(2, 'CSE101', 'INTRODUCTION TO COMPUTER SCIENCE', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(3, 'CSE110', 'PROGRAMMING LANGUAGE I', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(4, 'CSE111', 'PROGRAMMING LANGUAGE-II', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(5, 'CSE115', 'INTRODUCTION TO COMPUTER SCIENCE', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(6, 'CSE120', 'PROGRAMMING LANGUAGE II', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(7, 'CSE121', 'CIRCUITS AND ELECTRONICS', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(8, 'CSE161', 'COMPUTER PROGRAMMING', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(9, 'CSE163', 'COMPUTER PROGRAMMING II', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(10, 'CSE210', 'DATA STRUCTURES', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(11, 'CSE211', 'DISCRETE MATHEMATICS', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(12, 'CSE220', 'DATA STRUCTURES', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(13, 'CSE221', 'ALGORITHMS', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33'),
(14, 'CSE230', 'DISCRETE MATHEMATICS', '3', '2023-04-19 04:24:33', '2023-04-19 04:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `courses`, `created_at`, `updated_at`) VALUES
(3, '7, 10, 12, 13, 14', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(4, '2, 3', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(5, '6, 10, 11', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(6, '5, 9, 12', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(9, '11', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(13, '4, 11, 12, 13, 14', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(14, '7', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(16, '3', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(17, '3, 5, 6, 9, 12', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(21, '1, 2, 4, 10, 11', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(22, '8', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(23, '4, 7, 14', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(26, '3, 6, 12, 13', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(27, '2, 3, 9, 12, 13', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(29, '6', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(30, '6,3,9,13', '2023-04-19 04:24:34', '2023-04-26 02:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(295, '2014_10_12_000000_create_users_table', 1),
(296, '2014_10_12_100000_create_password_resets_table', 1),
(297, '2019_08_19_000000_create_failed_jobs_table', 1),
(298, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(299, '2023_02_03_125755_create_courses_table', 1),
(300, '2023_02_03_162150_create_faculties_table', 1),
(301, '2023_02_11_125117_create_reviews_table', 1),
(302, '2023_04_17_193223_create_consultation_slots_table', 1),
(303, '2023_04_17_193228_create_consultations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAnonymous` tinyint(1) NOT NULL,
  `isApproved` tinyint(1) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `faculty_id`, `course_id`, `rating`, `review`, `isAnonymous`, `isApproved`, `isDeleted`, `created_at`, `updated_at`) VALUES
(1, 25, 5, 9, 5, 'Omnis nesciunt ut totam et. Enim itaque quis saepe. A pariatur nulla consequatur.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(2, 15, 17, 13, 2, 'Dolorem necessitatibus modi odit. Eum omnis ex doloribus quo.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(3, 19, 27, 13, 5, 'Cupiditate ut rerum cupiditate omnis. Nulla omnis est dolores consequatur sit perferendis beatae.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(4, 19, 4, 9, 2, 'Assumenda itaque et qui odio. Cupiditate optio quia praesentium debitis. A soluta rem possimus.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(5, 12, 4, 2, 3, 'Rerum illum reprehenderit qui quibusdam ipsa qui qui. Illo autem illo tempora est a iure nihil.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(6, 24, 6, 14, 4, 'Animi earum rerum ut. Minima inventore earum eos dolorem.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(7, 8, 27, 9, 5, 'Velit et natus adipisci aliquid. Voluptatem maxime dolores exercitationem vel enim ad non corrupti.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(8, 24, 3, 2, 5, 'Ducimus quo non in qui. Ut sapiente dignissimos aliquid et. Quidem laboriosam dolor et dolore.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(9, 18, 4, 2, 5, 'Dignissimos dolorum sunt enim eos accusantium ratione. Facere quidem iste reprehenderit animi.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(10, 11, 9, 11, 4, 'Natus numquam itaque quod maxime. Qui vitae soluta qui doloribus et. Qui qui quod totam unde ab.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(11, 25, 3, 8, 5, 'Commodi illo libero in quos ratione. Libero neque est dolores reiciendis hic.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(12, 7, 9, 4, 3, 'Et aut unde eligendi cumque libero sed atque. Soluta odio aut autem maiores saepe ex quod.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(13, 12, 6, 14, 3, 'Eaque placeat similique voluptatum non. Sapiente et deleniti vero error dolor.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(14, 24, 9, 6, 5, 'Natus tempore dolor voluptatum qui nulla. Dolor nemo suscipit excepturi voluptatem neque numquam.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(15, 7, 21, 14, 2, 'Ullam tempore est aliquid beatae. Ipsa doloremque labore facilis aperiam facere ex.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(16, 25, 5, 12, 1, 'Ullam sunt cumque non et iusto omnis. Aut dolore optio voluptas quos. Fuga ut commodi et et modi.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(17, 24, 13, 10, 1, 'Rem odio ad qui exercitationem aut. Odio suscipit tempore molestiae non aut facilis eligendi.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(18, 2, 23, 14, 4, 'Aperiam vitae ipsum magnam sed. Doloremque laboriosam quia neque omnis dignissimos odio.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(19, 25, 16, 1, 5, 'Non iure deserunt cumque non. Sequi ullam non nihil impedit consequuntur.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(20, 1, 16, 2, 1, 'Est et ducimus eligendi quis ut ut. Sit numquam eius maiores id laborum.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(21, 12, 13, 3, 4, 'Dolor rerum saepe dolore corporis. Ipsam asperiores debitis et ducimus eos quaerat.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(22, 10, 13, 7, 1, 'Quia est consequuntur soluta vel ad. Vero animi iusto nihil. Debitis neque sed ad ea sit.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(23, 8, 3, 1, 1, 'Dolore autem odio et incidunt minus et aut asperiores. Incidunt enim et eius animi voluptate.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(24, 25, 13, 1, 3, 'Soluta assumenda a nulla animi. Consequatur dolores saepe ut eligendi quis est incidunt.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(25, 10, 4, 8, 5, 'Quia enim aperiam cupiditate eius ea cum dolorum. Qui quia sed illo quia quas.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(26, 28, 30, 7, 1, 'Fugit in veniam numquam eveniet sit. Libero error aut eaque nihil. Placeat ut aut eos dolore.', 0, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(27, 10, 23, 1, 2, 'Qui omnis labore dolorum quos asperiores vel. In quae et tempore tempore culpa culpa optio.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(28, 18, 29, 3, 5, 'Eius aut eveniet repellendus et ad non ipsam. Culpa cumque rerum sunt reiciendis eaque non nemo.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(29, 7, 4, 10, 3, 'Aut laboriosam ut enim in. Placeat occaecati quia rerum enim.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(30, 11, 30, 13, 1, 'Neque aut quia natus nihil dolorum enim iste. Quasi iste debitis est quia occaecati impedit.', 1, 1, 0, '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(31, 36, 3, 7, 5, 'Great!', 0, 1, 1, '2023-04-25 11:36:32', '2023-04-26 09:08:10'),
(32, 36, 4, 2, 4, 'Great', 0, 1, 0, '2023-04-26 09:08:24', '2023-04-26 09:08:24'),
(33, 36, 4, 3, 3, 'B', 1, 1, 0, '2023-04-26 09:08:48', '2023-04-26 09:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `university_id`, `role`, `department`, `website`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Margot Rippin', 'margot.rippin@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '22249068', 'student', 'Department of Computer Science and Engineering', NULL, 'FD0T9VuFqh', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(2, 'Reta Auer Jr.', 'reta.auer.jr.@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '20105505', 'student', 'Department of Electrical and Electronic Engineering', NULL, '56MPJqHSkD', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(3, 'Amber Anderson IV', 'amber.anderson.iv@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AMB', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, '8Nd7bUr3RB', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(4, 'Mr. Arlo Lubowitz MD', 'mr.arlo.lubowitz.md@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MRA', 'faculty', 'Department of Computer Science and Engineering', NULL, 'G2UFFki7Zc', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(5, 'Priscilla Fisher', 'priscilla.fisher@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PRI', 'faculty', 'Department of Computer Science and Engineering', NULL, 'e5UiyalqgB', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(6, 'Dr. Rico Gutkowski', 'dr.rico.gutkowski@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DRR', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'KzL7hsYdM0', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(7, 'Russ Will', 'russ.will@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '23109865', 'student', 'Department of Computer Science and Engineering', NULL, 'ukEI3ajuPT', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(8, 'Julio Brown', 'julio.brown@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2120607', 'student', 'Department of Electrical and Electronic Engineering', NULL, '99gH0r8DCY', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(9, 'Lamar Rice', 'lamar.rice@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LAM', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'N9TYptf6Bk', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(10, 'Dr. Kara Heller', 'dr.kara.heller@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '22241887', 'student', 'Department of Computer Science and Engineering', NULL, 'EXTTydGMBN', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(11, 'Prof. Cullen Schuster Sr.', 'prof.cullen.schuster.sr.@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '21208251', 'student', 'Department of Computer Science and Engineering', NULL, 'O6vPH7FpEd', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(12, 'Dr. Sammie Becker DDS', 'dr.sammie.becker.dds@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2120620', 'student', 'Department of Computer Science and Engineering', NULL, 'hQu4z0LrX0', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(13, 'Zetta Quigley', 'zetta.quigley@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZET', 'faculty', 'Department of Computer Science and Engineering', NULL, 'nuiG8nwkZs', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(14, 'Maxwell Connelly', 'maxwell.connelly@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MAX', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'xZiMnsFbOc', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(15, 'Serenity Nikolaus', 'serenity.nikolaus@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '21209015', 'student', 'Department of Electrical and Electronic Engineering', NULL, '1620rqjttk', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(16, 'Lavon Howe', 'lavon.howe@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LAV', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'esSg6rwROT', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(17, 'Prof. Wilbert Daniel II', 'prof.wilbert.daniel.ii@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PRO', 'faculty', 'Department of Computer Science and Engineering', NULL, 'XDIiQlg7v0', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(18, 'Prof. Trinity Dickinson', 'prof.trinity.dickinson@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '20104997', 'student', 'Department of Electrical and Electronic Engineering', NULL, 'TzQIz9cQqL', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(19, 'Ella D\'Amore DDS', 'ella.d\'amore.dds@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '23101009', 'student', 'Department of Electrical and Electronic Engineering', NULL, 'rK1nN1mLDq', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(20, 'Ms. Vernice Jaskolski Jr.', 'ms.vernice.jaskolski.jr.@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '21206849', 'student', 'Department of Electrical and Electronic Engineering', NULL, 'iudSEmgttW', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(21, 'Jerome Parker', 'jerome.parker@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JER', 'faculty', 'Department of Computer Science and Engineering', NULL, 'TVNpeFQyCq', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(22, 'Jacquelyn Osinski', 'jacquelyn.osinski@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JAC', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'N40tkR5U9C', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(23, 'Prof. Ibrahim Bergstrom DDS', 'prof.ibrahim.bergstrom.dds@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PRO', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'gBb4kqPbtj', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(24, 'Mr. Tillman Kshlerin III', 'mr.tillman.kshlerin.iii@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '23101973', 'student', 'Department of Electrical and Electronic Engineering', NULL, 'DsW1GnLlts', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(25, 'Jocelyn Champlin', 'jocelyn.champlin@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '21209397', 'student', 'Department of Electrical and Electronic Engineering', NULL, 'CKELRJejQG', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(26, 'Prof. Ernesto Quitzon II', 'prof.ernesto.quitzon.ii@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PRO', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, '3XuBhTop1R', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(27, 'Keara Abernathy', 'keara.abernathy@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KEA', 'faculty', 'Department of Electrical and Electronic Engineering', NULL, 'cR7ses9fj5', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(28, 'Zoila Miller', 'zoila.miller@g.bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '22244657', 'student', 'Department of Electrical and Electronic Engineering', NULL, '1ERMp4tDuy', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(29, 'Kallie Beier', 'kallie.beier@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KAL', 'faculty', 'Department of Computer Science and Engineering', NULL, 'Eev75hoNk259HPH3EMAlaj4D93rbCwoakfjImaZpeQr3yvYcK7yLqcMEupRk', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(30, 'Prof. Asa O\'Keefe', 'Juston.Conn@bracu.ac.bd', '2023-04-19 04:24:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PRO', 'faculty', 'Department of Computer Science and Engineering', NULL, 'oz9X2Kn147AOsNN8PzYyasKUwT2ESzwxwuH6FsolCTqpkOT8o9f6VDQ8uLQL', '2023-04-19 04:24:34', '2023-04-19 04:24:34'),
(36, 'Ehsanur Rahman Rhythm', 'ehsanur.rahman.rhythm@g.bracu.ac.bd', '2023-04-19 04:44:55', '$2y$10$SojNxB72qn3r8hc2AWcIoezPSFzQgRD58eVH6jEnbQNEsSzUnRLy.', '22241163', 'student', 'CSE', NULL, NULL, '2023-04-19 04:44:35', '2023-04-26 11:55:41'),
(37, 'FacultyPedia Admin', 'facultypedia@errhythm.me', '2023-04-19 04:44:55', '$2y$10$IC27yO37O2Ypndq8e.xUQ.Qh4SsoKeuOAFpsF2224HnryluPHfRxS', '22241163', 'admin', 'CSE', NULL, NULL, '2023-04-19 04:44:35', '2023-04-26 10:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_student_id_foreign` (`student_id`),
  ADD KEY `consultations_slot_id_foreign` (`slot_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultation_slots_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD UNIQUE KEY `faculties_id` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_faculty_id_foreign` (`faculty_id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultations_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `consultation_slots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `consultation_slots`
--
ALTER TABLE `consultation_slots`
  ADD CONSTRAINT `consultation_slots_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `reviews_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
