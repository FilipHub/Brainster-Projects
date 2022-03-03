-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2021 at 03:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BrainsterPreneurs`
--

-- --------------------------------------------------------

--
-- Table structure for table `academies`
--

CREATE TABLE `academies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academies`
--

INSERT INTO `academies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Backend Development', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(2, 'Frontend Development', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(3, 'Marketing', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(4, 'Data Science', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(5, 'Design', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(6, 'QA', '2021-10-22 13:26:32', '2021-10-22 13:26:32'),
(7, 'UX/UI', '2021-10-22 13:26:32', '2021-10-22 13:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `academies_projects`
--

CREATE TABLE `academies_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `academy_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academies_projects`
--

INSERT INTO `academies_projects` (`id`, `project_id`, `academy_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 3, 6, NULL, NULL),
(9, 3, 7, NULL, NULL),
(10, 4, 1, NULL, NULL),
(11, 5, 3, NULL, NULL),
(12, 5, 4, NULL, NULL),
(13, 5, 5, NULL, NULL),
(14, 6, 1, NULL, NULL),
(15, 6, 2, NULL, NULL),
(16, 6, 3, NULL, NULL),
(17, 6, 4, NULL, NULL),
(18, 6, 5, NULL, NULL),
(19, 6, 6, NULL, NULL),
(20, 7, 1, NULL, NULL),
(21, 7, 4, NULL, NULL),
(22, 7, 5, NULL, NULL),
(23, 7, 7, NULL, NULL),
(24, 8, 1, NULL, NULL),
(25, 8, 3, NULL, NULL),
(26, 8, 6, NULL, NULL),
(27, 8, 7, NULL, NULL),
(28, 9, 2, NULL, NULL),
(29, 9, 6, NULL, NULL),
(30, 9, 7, NULL, NULL),
(31, 10, 2, NULL, NULL),
(32, 11, 1, NULL, NULL),
(33, 11, 2, NULL, NULL),
(34, 11, 3, NULL, NULL),
(35, 11, 6, NULL, NULL),
(36, 12, 2, NULL, NULL),
(37, 12, 5, NULL, NULL),
(38, 12, 6, NULL, NULL),
(39, 12, 7, NULL, NULL),
(40, 13, 1, NULL, NULL),
(41, 13, 4, NULL, NULL),
(42, 13, 5, NULL, NULL),
(43, 13, 6, NULL, NULL),
(44, 14, 2, NULL, NULL),
(45, 14, 3, NULL, NULL),
(46, 14, 4, NULL, NULL),
(47, 14, 5, NULL, NULL),
(48, 14, 7, NULL, NULL),
(49, 15, 3, NULL, NULL),
(50, 15, 4, NULL, NULL),
(51, 15, 5, NULL, NULL),
(52, 15, 7, NULL, NULL),
(53, 16, 2, NULL, NULL),
(54, 16, 3, NULL, NULL),
(55, 16, 4, NULL, NULL),
(56, 16, 5, NULL, NULL),
(57, 17, 1, NULL, NULL),
(58, 17, 3, NULL, NULL),
(59, 17, 4, NULL, NULL),
(60, 18, 3, NULL, NULL),
(61, 19, 2, NULL, NULL),
(62, 19, 4, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_13_162554_create_academies_table', 1),
(6, '2021_09_13_162744_create_skills_table', 1),
(7, '2021_09_13_163242_add_academy_id_to_users_table', 1),
(8, '2021_09_14_090613_create_users_skills_table', 1),
(9, '2021_09_20_114027_create_projects_table', 1),
(10, '2021_09_20_114412_create_projects_users_table', 1),
(11, '2021_09_20_114525_create_academies_projects_table', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Elliott Elliott', 'Animi est maxime au', '2021-10-22 13:34:10', '2021-10-22 13:27:25', '2021-10-22 13:34:10'),
(2, 1, 'Keelie Lang', 'Explicabo Nulla eaq', '2021-10-22 15:21:59', '2021-10-22 13:34:49', '2021-10-22 15:21:59'),
(3, 2, 'Jaime Pollard', 'Magna qui exercitati', '2021-10-22 15:22:39', '2021-10-22 14:55:25', '2021-10-22 15:22:39'),
(4, 4, 'Jordan Bird', 'Architecto ab ration', '2021-10-22 15:23:15', '2021-10-22 15:23:08', '2021-10-22 15:23:15'),
(5, 4, 'Amber Jackson', 'Assumenda est cupid', '2021-10-22 15:25:07', '2021-10-22 15:23:22', '2021-10-22 15:25:07'),
(6, 5, 'September Stuart', 'Animi temporibus of', '2021-10-22 16:27:30', '2021-10-22 15:26:03', '2021-10-22 16:27:30'),
(7, 5, 'Dominique Henry', 'Porro aut debitis co', '2021-10-22 16:28:03', '2021-10-22 15:26:07', '2021-10-22 16:28:03'),
(8, 5, 'Fallon Zamora', 'Eaque debitis quia e', '2021-10-22 16:27:30', '2021-10-22 15:26:12', '2021-10-22 16:27:30'),
(9, 6, 'Lacy Macias', 'Qui ad consectetur', NULL, '2021-10-22 16:29:11', '2021-10-22 16:29:11'),
(10, 6, 'Kareem Oconnor', 'Voluptatibus amet c', NULL, '2021-10-22 16:29:17', '2021-10-22 16:29:17'),
(11, 7, 'Jamal Mercado', 'Et qui recusandae E', NULL, '2021-10-22 16:31:02', '2021-10-22 16:31:02'),
(12, 7, 'Brent Beach', 'Delectus aut eaque', NULL, '2021-10-22 16:31:07', '2021-10-22 16:31:07'),
(13, 7, 'Kylan Hawkins', 'Facere laborum Sint', NULL, '2021-10-22 16:31:11', '2021-10-22 16:31:11'),
(14, 1, 'Zoe Lyons', 'Vitae natus consequu', NULL, '2021-10-22 21:23:15', '2021-10-22 21:23:15'),
(15, 8, 'Clementine Chambers', 'Fugiat porro illum', NULL, '2021-10-23 16:57:52', '2021-10-23 16:57:52'),
(16, 10, 'Wyoming Peters', 'Occaecat iure quia e', NULL, '2021-10-24 22:00:23', '2021-10-24 22:00:23'),
(17, 10, 'Quin Schneider', 'Deserunt cupidatat v', NULL, '2021-10-24 22:00:27', '2021-10-24 22:00:27'),
(18, 10, 'Serena Gillespie', 'Qui enim dolores acc', NULL, '2021-10-24 22:00:32', '2021-10-24 22:00:32'),
(19, 21, 'Isadora Hood', 'Error cupidatat even', NULL, '2021-10-25 09:48:40', '2021-10-25 09:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `project_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `user_id`, `project_id`, `project_message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL, NULL, NULL),
(2, 3, 3, NULL, NULL, NULL, NULL),
(3, 3, 2, NULL, NULL, NULL, NULL),
(4, 4, 2, NULL, NULL, NULL, NULL),
(5, 4, 3, NULL, NULL, NULL, NULL),
(6, 5, 5, NULL, NULL, NULL, NULL),
(7, 6, 8, NULL, NULL, NULL, NULL),
(8, 6, 6, NULL, NULL, NULL, NULL),
(9, 6, 7, NULL, NULL, NULL, NULL),
(10, 7, 10, NULL, NULL, NULL, NULL),
(11, 1, 13, NULL, NULL, NULL, NULL),
(12, 1, 10, NULL, NULL, NULL, NULL),
(15, 1, 9, NULL, NULL, NULL, NULL),
(16, 1, 11, NULL, NULL, NULL, NULL),
(17, 1, 15, NULL, NULL, NULL, NULL),
(18, 1, 16, NULL, NULL, NULL, NULL),
(19, 1, 17, NULL, NULL, NULL, NULL),
(20, 1, 18, NULL, NULL, NULL, NULL),
(21, 11, 18, NULL, NULL, NULL, NULL),
(22, 11, 17, NULL, NULL, NULL, NULL),
(26, 11, 13, NULL, NULL, NULL, NULL),
(27, 11, 12, NULL, NULL, NULL, NULL),
(28, 11, 10, NULL, NULL, NULL, NULL),
(29, 11, 11, NULL, NULL, NULL, NULL),
(30, 11, 9, NULL, NULL, NULL, NULL),
(31, 12, 18, NULL, NULL, NULL, NULL),
(32, 13, 14, NULL, NULL, NULL, NULL),
(33, 14, 14, NULL, NULL, NULL, NULL),
(34, 16, 12, NULL, NULL, NULL, NULL),
(35, 16, 14, NULL, NULL, NULL, NULL),
(36, 16, 9, NULL, NULL, NULL, NULL),
(37, 21, 18, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Data Analysis', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(2, 'Business Intelligence', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(3, 'Machine Learning', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(4, 'Data Visualizations', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(5, 'Deep Learning', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(6, 'Statistics', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(7, 'Power Bi', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(8, 'NumPy', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(9, 'Keras', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(10, 'TensorFlow', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(11, 'Pandas', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(12, 'OpenCV', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(13, 'Writing and Executing Test Cases and Scenarios', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(14, 'Test Design', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(15, 'Test Design', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(16, 'Translating Manual Test Cases Into Automation Scripts', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(17, 'Quality Assurance', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(18, 'Waterfall and SCRUM Methodology', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(19, 'C#', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(20, 'Kiwi', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(21, 'Selenium Web Driver', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(22, 'Illustrator', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(23, 'Photoshop', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(24, 'InDesign', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(25, 'XD', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(26, 'LightRoom', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(27, 'Typography', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(28, 'Branding', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(29, 'Poster Design', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(30, 'Logo Design', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(31, 'Package Design', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(32, 'Digital Marketing Strategy', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(33, 'Social Media Marketing', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(34, 'Facebook and Instagram Ads', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(35, 'Google Ads', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(36, 'Copywriting', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(37, 'Content Marketing', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(38, 'Landing Pages', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(39, 'Lead Generation', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(40, 'E-mail Marketing', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(41, 'Search Engine Optimization', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(42, 'HTML', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(43, 'CSS', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(44, 'Bootstrap', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(45, 'JavaScript', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(46, 'jQuery', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(47, 'AJAX', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(48, 'PHP', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(49, 'ReactJS', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(50, 'GIT', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(51, 'UX/UI', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(52, 'MySQL', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(53, 'InVision Studio', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(54, 'Figma', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(55, 'SQL', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(56, 'Data Warehouse', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(57, 'AWS Management Control', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(58, 'Big Data', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(59, 'Database Management', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(60, 'Postman', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(61, 'Apache', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(62, 'JMeter', '2021-10-22 13:26:28', '2021-10-22 13:26:28'),
(63, 'Google Analytics', '2021-10-22 13:26:28', '2021-10-22 13:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `academy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `biography`, `academy_id`, `image`, `registration_step`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Filip', 'Petrusevski', 'filip@email.com', NULL, '$2y$10$Yv3yBjpjQqJkuWGKwPfmvOBcxDpAvPmm0tbtAAVKriYquUlmWIfSS', 'Hello world', 7, 'uploads/users/images/NpWyomNSoumYSeX3bVeDrBTOTN4KI7abRMlKcTDi.png', '4', NULL, '2021-10-22 13:26:56', '2021-10-24 19:54:28'),
(2, 'Rashad Dickerson', 'Jacobson', 'jugykun@mailinator.com', NULL, '$2y$10$Hfh45SrTE7hNDFlRy6ce3.E9Evx4F973NHNrza6UW8LE1DJLcrzHa', 'Sint ratione culpa', 1, 'uploads/users/images/7Job0nKQKM3csIqMiTmemloyQLpIIadlGRVbMm8L.jpg', '4', NULL, '2021-10-22 14:02:35', '2021-10-22 14:02:53'),
(3, 'Tanya Burt', 'Lowe', 'jycoca@mailinator.com', NULL, '$2y$10$I.zovLfG7HfFFu/c9xwCgOcrDCwllFvWXwJodVIUAJ1QVzjAprDue', 'Dolor nobis veritati', 2, 'uploads/users/images/ury9gMWS53sxwwZf6c2DSVAGAjvZrZf8QT7Owj4b.jpg', '4', NULL, '2021-10-22 14:55:33', '2021-10-22 14:55:48'),
(4, 'admin', 'admin', 'admin@email.com', NULL, '$2y$10$.8sjCMcRTCaxAtZvlLUFfehJfw4qAF1y7P8GXa2iYjARvD7z87TKe', 'admin', 4, 'uploads/users/images/KnX9SQMANsGLvWxnLlkVXzknE7KxsRfvQajdKrLL.png', '4', NULL, '2021-10-22 15:08:10', '2021-10-22 15:08:38'),
(5, 'Marcia Livingston', 'Clay', 'moji@mailinator.com', NULL, '$2y$10$sHsbEe6zRILWI6JDG2M/tepbMJmHFvGr6TSFCNQbhpHPaRG/N4wdS', 'Ea necessitatibus la', 2, 'uploads/users/images/ISjB4DXvvP96NMZzVy8qGOGUW3zn0fWFHrs7cAGd.jpg', '4', NULL, '2021-10-22 15:24:38', '2021-10-22 15:24:55'),
(6, 'Zia Coffey', 'Weiss', 'samyjaqa@mailinator.com', NULL, '$2y$10$m7qToWsBjLsjaC23TBdbBubCr8frmh4GjwSG2kC.uJAZuo143JXAa', 'Odit quae fuga Moll', 2, 'uploads/users/images/LpZPqAeGvor8Lmc7VHjgi9ANHRnP0xbm6YaRhDen.jpg', '4', NULL, '2021-10-22 15:26:27', '2021-10-22 15:26:39'),
(7, 'Harlan Wilcox', 'Holcomb', 'lunukyp@mailinator.com', NULL, '$2y$10$5i.Zcj8uoX8HQWLASRPgYuUlhagVJMMv/.s8dGPY6t9CDndIPPEoG', 'Fuga Sed eaque recu', 2, 'uploads/users/images/X0AcHTbo5VLpJMOCdgDZmXYqevLaG0pvcKXbQ8QA.jpg', '4', NULL, '2021-10-22 16:29:27', '2021-10-22 16:29:41'),
(8, 'Dylan Hurley', 'Mosley', 'sawunyb@mailinator.com', NULL, '$2y$10$CuKtpXf44NJDjk7hwmnQzODyLlIgI4cKdK2BIXkxT6.dLFNMl5NCy', 'Excepteur et aut pla', 2, 'uploads/users/images/LpZPqAeGvor8Lmc7VHjgi9ANHRnP0xbm6YaRhDen.jpg', '4', NULL, '2021-10-23 16:56:35', '2021-10-23 16:57:39'),
(9, 'Kirsten Mcfarland', 'Roach', 'jufojavaho@mailinator.com', NULL, '$2y$10$7/MsbsEH/B5JEjoQ4KEmqu4zGcH8.0BGJHOoTRCXcPGJDMJIIg7cy', 'Beatae nisi in porro', 2, 'uploads/users/images/fQosbgYHt5BM2dK7pK2Ntsuxf9a0MMhItKNRd2LJ.png', '4', NULL, '2021-10-24 18:57:31', '2021-10-24 19:17:53'),
(10, 'Malcolm Duffy', 'Huffman', 'vogi@mailinator.com', NULL, '$2y$10$K.nGKIOc5cAV0OFfPHL9KOFdoF8SLJuWQUj1JvFKnZZbYtbHPvWES', 'Et eligendi vitae cu', 5, 'uploads/users/images/MGScmTIFvrLUxxmmm8qByvouVVZ3dcrsAi5pCD4g.jpg', '4', NULL, '2021-10-24 21:59:51', '2021-10-24 22:00:15'),
(11, 'hana', 'spaho', 'hana@email.com', NULL, '$2y$10$H5mwHxgT0TXAb/nbSwUY7uj18ad/1PSKGiytuxHI4.HkbQhCGZqKG', 'hi', 1, 'uploads/users/images/NA3juKJQQfQDHilWueca9OrGocDe0lZwPYqLzSDN.jpg', '4', NULL, '2021-10-24 22:03:06', '2021-10-24 22:03:25'),
(12, 'hana', 'spaho', 'hanaa@email.com', NULL, '$2y$10$KLrPsMeBwH/29R34z1n3Vew38vu78uddbjGo25CXjs803IwtBntnq', 'asda', 3, 'uploads/users/images/5zhPgleNVivNkJtj1VgL8gVkUpycDYcOBUrKEBIL.jpg', '4', NULL, '2021-10-24 22:27:33', '2021-10-24 22:27:49'),
(13, 'Elaine Stanton', 'Landry', 'rifasux@mailinator.com', NULL, '$2y$10$oB74JoyV1zMdE1OUqeUlLen3RhOp5FvUlvs5HYuNxGW10a5VwvaeG', 'Eum reiciendis facer', 3, 'uploads/users/images/rg2vFhUPWxNJZW1yY3HaOpgQWqLfOfBu1QZPQ3Zt.jpg', '4', NULL, '2021-10-24 22:45:26', '2021-10-24 22:45:50'),
(14, 'Dorian Allen', 'Stephenson', 'pibymehat@mailinator.com', NULL, '$2y$10$r5/R8oMn1Zs2WrB24nMVh.syEyD3IFD8yqBVfuvUGHwCUf.q1bM9q', 'Sit dolorem omnis ut', 2, 'uploads/users/images/7EEwH1YugPwvExIUvaojquPjXWqqL7cYa2vs89Bk.jpg', '4', NULL, '2021-10-24 22:46:09', '2021-10-24 22:46:30'),
(15, 'Irene Gallegos', 'Gonzales', 'mexymywowu@mailinator.com', NULL, '$2y$10$FJsd8a9S.OP0UpYQyl3jIOXEI0tdRR8PxPNbixYS.GENCGKMI5SvK', 'Facilis ea praesenti', NULL, NULL, '1', NULL, '2021-10-24 23:17:45', '2021-10-24 23:17:45'),
(16, 'Maisie Wiley', 'Elliott', 'wedibolaf@mailinator.com', NULL, '$2y$10$3JQK/IoNVrBS2qDi0R4R0eYT3879yLTWEwCUYqPDp/GlSBihzGu7G', 'Est voluptatibus id', 3, 'uploads/users/images/LPOVLaViYloMQyUFnrNCsyLkH58VxEe8hILFltM7.jpg', '4', NULL, '2021-10-24 23:41:06', '2021-10-24 23:42:37'),
(17, 'Ina Leon', 'Richard', 'fasesyg@mailinator.com', NULL, '$2y$10$wlhx9hGIylmdjz4QHVs3wOP4weivjQmXudqAiAPwEifDDIeeJsUb2', 'Quia consequatur Si', 1, NULL, '2', NULL, '2021-10-25 08:04:00', '2021-10-25 08:29:37'),
(18, 'Thane Ayala', 'Evans', 'tidabonufy@mailinator.com', NULL, '$2y$10$yFCbfzxL6VF0mvl6GblrjOQ0grVL/liQdyzEwU2yDwmbOFVpQwHQe', 'Aut est repudiandae', 5, 'uploads/users/images/2BwmVEfBNipcGuU9uSQ1NUCt9AKJI4ATdayxjkGH.jpg', '4', NULL, '2021-10-25 09:06:53', '2021-10-25 09:07:18'),
(19, 'Olympia Gates', 'Armstrong', 'sakeza@mailinator.com', NULL, '$2y$10$nrsO6PRt3BA4kE6kaBHz5.KoB.BkyGK6PqhAE2gi8nt0NyIUXvj5G', 'Est incididunt ut s', 5, 'uploads/users/images/OqCSOW288fGyhsTJAvC4Egx1zD3cyFqwdIf5kFM4.jpg', '4', NULL, '2021-10-25 09:07:31', '2021-10-25 09:38:36'),
(20, 'Owen Buchanan', 'Wallace', 'betu@mailinator.com', NULL, '$2y$10$PC/KrF.3oqoes2twh2/ukOITzgh0kJYeRolxqg5tz6kkT6G.gF1.O', 'Sit cupiditate in e', NULL, NULL, '1', NULL, '2021-10-25 09:42:06', '2021-10-25 09:42:06'),
(21, 'Rajah Patrick', 'Black', 'gatijutok@mailinator.com', NULL, '$2y$10$h9Nj.ESc4XPJF1Ug9hCX/uGlKBrBBSEmt8B.QOLEhlsL/LMv5Cuqa', 'Incididunt ipsam dui', 3, 'uploads/users/images/hhuXmxQovHDPvwFrl5cTxrORwgMvMRg1hRJbLSjJ.jpg', '4', NULL, '2021-10-25 09:44:44', '2021-10-25 09:48:23'),
(22, 'Brittany Park', 'Galloway', 'xahoforux@mailinator.com', NULL, '$2y$10$tiZ86046x7H2J3yXuwopb.tsMMFFdip.9ARbgzjk5oPLgGgWalFOW', 'Reprehenderit alias', 3, 'uploads/users/images/wUcTp07tW1n7fWEJv2TCym2Lzy469JJwu7zSkPRE.jpg', '4', NULL, '2021-10-25 09:50:34', '2021-10-25 10:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `users_skills`
--

CREATE TABLE `users_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_skills`
--

INSERT INTO `users_skills` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 6, NULL, NULL),
(3, 1, 7, NULL, NULL),
(4, 1, 8, NULL, NULL),
(5, 1, 10, NULL, NULL),
(6, 1, 11, NULL, NULL),
(7, 1, 12, NULL, NULL),
(8, 1, 13, NULL, NULL),
(9, 1, 14, NULL, NULL),
(10, 2, 2, NULL, NULL),
(11, 2, 3, NULL, NULL),
(12, 2, 10, NULL, NULL),
(13, 2, 11, NULL, NULL),
(14, 2, 12, NULL, NULL),
(15, 2, 13, NULL, NULL),
(16, 2, 14, NULL, NULL),
(17, 3, 3, NULL, NULL),
(18, 3, 4, NULL, NULL),
(19, 3, 5, NULL, NULL),
(20, 3, 12, NULL, NULL),
(21, 3, 13, NULL, NULL),
(22, 3, 14, NULL, NULL),
(23, 4, 2, NULL, NULL),
(24, 4, 3, NULL, NULL),
(25, 4, 4, NULL, NULL),
(26, 4, 5, NULL, NULL),
(27, 4, 6, NULL, NULL),
(28, 5, 4, NULL, NULL),
(29, 5, 5, NULL, NULL),
(30, 5, 12, NULL, NULL),
(31, 5, 13, NULL, NULL),
(32, 5, 14, NULL, NULL),
(33, 6, 4, NULL, NULL),
(34, 6, 10, NULL, NULL),
(35, 6, 11, NULL, NULL),
(36, 6, 12, NULL, NULL),
(37, 6, 13, NULL, NULL),
(38, 7, 2, NULL, NULL),
(39, 7, 9, NULL, NULL),
(40, 7, 10, NULL, NULL),
(41, 7, 11, NULL, NULL),
(42, 7, 12, NULL, NULL),
(43, 8, 2, NULL, NULL),
(44, 8, 3, NULL, NULL),
(45, 8, 10, NULL, NULL),
(46, 8, 11, NULL, NULL),
(47, 8, 12, NULL, NULL),
(48, 9, 10, NULL, NULL),
(49, 9, 11, NULL, NULL),
(50, 9, 12, NULL, NULL),
(51, 9, 13, NULL, NULL),
(52, 9, 14, NULL, NULL),
(53, 10, 2, NULL, NULL),
(54, 10, 3, NULL, NULL),
(55, 10, 4, NULL, NULL),
(56, 10, 9, NULL, NULL),
(57, 10, 10, NULL, NULL),
(58, 10, 11, NULL, NULL),
(59, 11, 8, NULL, NULL),
(60, 11, 9, NULL, NULL),
(61, 11, 10, NULL, NULL),
(62, 11, 11, NULL, NULL),
(63, 11, 12, NULL, NULL),
(64, 11, 13, NULL, NULL),
(65, 12, 2, NULL, NULL),
(66, 12, 3, NULL, NULL),
(67, 12, 9, NULL, NULL),
(68, 12, 10, NULL, NULL),
(69, 12, 11, NULL, NULL),
(70, 13, 2, NULL, NULL),
(71, 13, 3, NULL, NULL),
(72, 13, 9, NULL, NULL),
(73, 13, 10, NULL, NULL),
(74, 13, 12, NULL, NULL),
(75, 14, 3, NULL, NULL),
(76, 14, 9, NULL, NULL),
(77, 14, 10, NULL, NULL),
(78, 14, 12, NULL, NULL),
(79, 14, 13, NULL, NULL),
(80, 16, 9, NULL, NULL),
(81, 16, 10, NULL, NULL),
(82, 16, 11, NULL, NULL),
(83, 16, 12, NULL, NULL),
(84, 16, 13, NULL, NULL),
(85, 18, 4, NULL, NULL),
(86, 18, 6, NULL, NULL),
(87, 18, 7, NULL, NULL),
(88, 18, 12, NULL, NULL),
(89, 18, 13, NULL, NULL),
(90, 18, 14, NULL, NULL),
(91, 19, 3, NULL, NULL),
(92, 19, 4, NULL, NULL),
(93, 19, 5, NULL, NULL),
(94, 19, 12, NULL, NULL),
(95, 19, 13, NULL, NULL),
(96, 21, 5, NULL, NULL),
(97, 21, 6, NULL, NULL),
(98, 21, 7, NULL, NULL),
(99, 21, 10, NULL, NULL),
(100, 21, 11, NULL, NULL),
(101, 21, 12, NULL, NULL),
(102, 21, 13, NULL, NULL),
(103, 21, 14, NULL, NULL),
(104, 22, 3, NULL, NULL),
(105, 22, 5, NULL, NULL),
(106, 22, 6, NULL, NULL),
(107, 22, 9, NULL, NULL),
(108, 22, 11, NULL, NULL),
(109, 22, 13, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academies`
--
ALTER TABLE `academies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academies_projects`
--
ALTER TABLE `academies_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academies_projects_project_id_foreign` (`project_id`),
  ADD KEY `academies_projects_academy_id_foreign` (`academy_id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_users_user_id_foreign` (`user_id`),
  ADD KEY `projects_users_project_id_foreign` (`project_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_academy_id_foreign` (`academy_id`);

--
-- Indexes for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_skills_user_id_foreign` (`user_id`),
  ADD KEY `users_skills_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academies`
--
ALTER TABLE `academies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `academies_projects`
--
ALTER TABLE `academies_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_skills`
--
ALTER TABLE `users_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academies_projects`
--
ALTER TABLE `academies_projects`
  ADD CONSTRAINT `academies_projects_academy_id_foreign` FOREIGN KEY (`academy_id`) REFERENCES `academies` (`id`),
  ADD CONSTRAINT `academies_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD CONSTRAINT `projects_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `projects_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_academy_id_foreign` FOREIGN KEY (`academy_id`) REFERENCES `academies` (`id`);

--
-- Constraints for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `users_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
