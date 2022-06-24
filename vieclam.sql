-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2022 lúc 06:29 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vieclam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_list`
--

CREATE TABLE `apply_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkCV` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `apply_list`
--

INSERT INTO `apply_list` (`id`, `recruitment_id`, `user_id`, `name`, `email`, `phone_number`, `linkCV`, `status`, `created_at`, `updated_at`) VALUES
(4, 6, 37, 'Nguyễn Anh Quân', 'anhquannguyen@gmail.com', '0774794604', 'frondend_CV_topdev44.pdf', 0, '2022-06-05 03:36:46', NULL),
(6, 6, 2, 'Trần Xuân Thịnh', 'thinhtr@gmail.com', '0774794604', 'hng.pdf', 1, '2022-05-28 04:48:16', NULL),
(7, 1, 1, 'Võ văn Thành', 'vothanh1320@gmail.com', '0903533725', 'Fullstack developer.pdf', 1, '2022-06-20 09:59:24', NULL),
(12, 1, 34, 'Phạm Phú Lĩnh', 'linh@gmail.com', '02363626989', 'frondend_CV_topdev56.pdf', 0, '2022-06-22 02:40:54', NULL),
(23, 6, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0874794604', 'hng.pdf', 0, '2022-06-10 04:15:59', NULL),
(27, 5, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0907368620', 'hng.pdf', 0, '2022-06-10 10:17:42', NULL),
(28, 10, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0907368620', 'hng.pdf', 0, '2022-06-11 02:26:59', NULL),
(29, 9, 1, 'Võ văn Thành', 'vothanh1320@gmail.com', '0774794604', 'Fullstack developer.pdf', 0, '2022-06-21 03:21:49', NULL),
(32, 8, 1, 'Võ văn Thành', 'vothanh1320@gmail.com', '0906889184', 'Back-end.pdf', 0, '2022-06-22 02:36:18', NULL),
(33, 10, 1, 'Võ văn Thành', 'vothanh1320@gmail.com', '0774794604', 'Fullstack developer.pdf', 0, '2022-06-23 02:49:24', NULL),
(37, 11, 1, 'Võ Văn Thành', 'vothanh1320@gmail.com', '0774794604', 'Intern Frond-end.pdf', 0, '2022-06-23 10:02:10', NULL),
(38, 2, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0907368620', 'Frontend-Intern-ReactJS-Entrance-test3.pdf', 1, '2022-06-24 03:08:56', NULL),
(39, 8, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0906889184', 'hng.pdf', 0, '2022-06-23 03:36:50', NULL),
(41, 1, 1, 'Trí Sư Đệ', 'vothanh1320@gmail.com', '0774794604', 'Intern Php.pdf', 1, '2022-06-23 15:07:25', NULL),
(44, 2, 1, 'Võ Văn Thành', 'vothanh1320@gmail.com', '0774794604', 'Intern Frond-end.pdf', 1, '2022-06-24 02:32:47', NULL),
(45, 1, 1, 'Võ Văn Thành', 'vothanh1320@gmail.com', '0774794604', 'Intern Php.pdf', 0, '2022-06-24 02:52:49', NULL),
(46, 1, 2, 'Võ Văn Đạt', 'vodat1320@gmail.com', '0906889184', 'Fresher php.pdf', 1, '2022-06-24 03:14:56', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name_school` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_year` date DEFAULT NULL,
  `end_year` date DEFAULT NULL,
  `degree` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`id`, `profile_id`, `name_school`, `start_year`, `end_year`, `degree`) VALUES
(19, 43, 'FPT Polytechnic', '2014-08-03', '2017-10-06', 'Công nghệ thông tin'),
(22, 1, 'trường Đại học Sư phạm kỹ thuật - Đã Nẵng', '2018-09-16', '2022-08-16', 'Công nghệ thông tin'),
(23, 44, 'trường Đại học Sư phạm kỹ thuật - Đã Nẵng', '2018-08-14', '2022-06-18', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experience`
--

CREATE TABLE `experience` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `name_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `experience`
--

INSERT INTO `experience` (`id`, `profile_id`, `name_company`, `start_time`, `end_time`, `job_position`, `job_details`) VALUES
(76, 43, 'AI&T JSC', '2019-06-27', '2021-11-28', 'Php Developer', '<p>- Chương tr&igrave;nh gia c&ocirc;ng phần mềm dự &aacute;n</p>\r\n\r\n<p>- Tạo khung m&atilde; h&oacute;a v&agrave; thiết kế cơ sở dữ liệu dựa tr&ecirc;n m&ocirc; tả dự &aacute;n&nbsp;</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `keywordkills`
--

CREATE TABLE `keywordkills` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `keywordkills`
--

INSERT INTO `keywordkills` (`id`, `name`) VALUES
(1, 'Python'),
(2, 'Java'),
(3, 'JavaScript'),
(4, 'HTML5'),
(5, 'CSS'),
(6, 'PHP'),
(7, 'C#'),
(8, 'C/C++'),
(9, 'R'),
(10, 'Ruby'),
(11, 'VB.NET'),
(12, 'Golang'),
(13, 'Swift'),
(14, 'Kotlin'),
(15, 'AngularJS'),
(16, 'VueJS'),
(17, 'ReactJS'),
(18, 'NodeJS'),
(19, 'Laravel'),
(20, 'Swing Java'),
(21, 'Wordpress'),
(22, 'AI'),
(23, 'AI Engineer'),
(24, 'Database'),
(25, 'Frontend'),
(26, 'Backend'),
(27, 'Fullstack'),
(28, 'Web Developer'),
(29, 'Frontend Developer'),
(30, 'Backend Developer'),
(31, 'Android'),
(32, 'Ios'),
(33, 'SQL'),
(34, 'Tester'),
(35, 'UI-UX');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_05_01_083846_create_profiles_table', 1),
(12, '2022_05_01_090953_create_experiences_table', 1),
(13, '2022_05_05_085319_create_education_table', 2),
(14, '2022_05_06_024538_create_project_table', 3),
(15, '2022_05_10_095339_create_recruitment_table', 4),
(16, '2022_05_17_090849_create_apply_list', 5),
(17, '2022_05_26_092720_create_notifications_table', 6),
(18, '2022_06_06_165519_create_statistic_apply', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('053dfcce-fbe6-45f9-b1ba-bb64169ef990', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 10, '{\"desc\":\"V\\u00f5 v\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-24 03:42:02', '2022-06-15 02:49:27', '2022-06-24 03:42:02'),
('09639a0c-c7d4-48e0-9a1c-73016c940554', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"Tr\\u00ed S\\u01b0 \\u0110\\u1ec7 \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-23 15:13:52', '2022-06-23 15:07:49', '2022-06-23 15:13:52'),
('11', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 34, '{\"id\":\"11\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', NULL, '2022-06-23 15:59:20', '2022-06-23 15:59:20'),
('12', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 34, '{\"id\":\"12\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', '2022-06-11 09:20:56', '2022-06-06 03:33:10', '2022-06-11 09:20:56'),
('13', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 36, '{\"id\":\"13\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', '2022-06-11 09:20:58', '2022-06-06 03:33:10', '2022-06-11 09:20:58'),
('15dc03bc-057f-42a2-bd10-0bcf3869c820', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 8, '{\"desc\":\"V\\u00f5 v\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-16 04:28:54', '2022-06-15 02:19:37', '2022-06-16 04:28:54'),
('1e44391c-7b41-4f47-bfb1-3e7db6a7d37c', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 10, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-24 03:42:02', '2022-06-11 02:27:00', '2022-06-24 03:42:02'),
('1f9e0d4c-563b-4859-a167-d3180e44fc83', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 35, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('2994b53d-0ddf-4839-8ee5-57d69644d7b1', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 11, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-10 04:08:42', '2022-06-10 04:08:42'),
('2a56db6b-b8e0-4415-9d91-2301fca32b97', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-23 15:35:23', '2022-06-23 15:33:09', '2022-06-23 15:35:23'),
('32', 'App\\Notifications\\userRegisterNotify', 'App\\Models\\User', 12, '{\"id\":\"32\",\"desc\":\"T\\u00e0i kho\\u1ea3n c\\u00f4ng ty bf mu\\u1ed1n \\u0111\\u0103ng k\\u00fd l\\u00e0m nh\\u00e0 tuy\\u1ec3n d\\u1ee5ng \"}', '2022-06-01 04:24:08', '2022-06-01 04:24:03', '2022-06-01 04:24:08'),
('384d34bc-9f2d-4956-8b87-bda6906913c0', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 6, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-13 01:57:55', '2022-06-10 10:17:42', '2022-06-13 01:57:55'),
('44', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 1, '{\"id\":\"44\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', '2022-06-24 02:36:37', '2022-06-24 02:36:34', '2022-06-24 02:36:37'),
('44a1ec38-8e1a-486a-9da9-d1cdb103d8e5', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 33, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('46', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 2, '{\"id\":\"46\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', '2022-06-24 03:37:11', '2022-06-24 03:37:09', '2022-06-24 03:37:11'),
('4bf6042e-367e-4b17-a85a-62c9928491d0', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 6, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-13 01:57:55', '2022-06-10 10:14:49', '2022-06-13 01:57:55'),
('5496e077-3c60-40b6-bdd3-66f8c4c116c3', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 9, '{\"desc\":\"V\\u00f5 v\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-15 08:28:52', '2022-06-14 03:21:50', '2022-06-15 08:28:52'),
('571a44cf-ba44-4f2c-8fd5-6fd4aed08261', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 32, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('724faa4f-9320-4953-be19-1abf4794985c', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 8, '{\"desc\":\"V\\u00f5 v\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-16 04:28:54', '2022-06-15 02:36:42', '2022-06-16 04:28:54'),
('7271d689-bf39-4d26-8931-ee95a127a403', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 11, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-04 02:14:59', '2022-06-03 15:16:26', '2022-06-04 02:14:59'),
('76021d0b-3db1-4111-b989-598649ed20b2', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 37, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('7e778426-4a6c-492e-b7cb-e72da29851bc', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 34, '{\"name\":\"fg\",\"desc\":\"<p>fg<\\/p>\"}', NULL, '2022-06-13 04:36:50', '2022-06-13 04:36:50'),
('879a57e9-2283-42e6-a8b9-846012ac22c5', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 37, '{\"name\":\"fg\",\"desc\":\"<p>fg<\\/p>\"}', NULL, '2022-06-13 04:36:50', '2022-06-13 04:36:50'),
('8bc0e0ce-28e9-47bf-9e9b-725dddce5d81', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 6, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-13 01:57:55', '2022-06-10 10:12:16', '2022-06-13 01:57:55'),
('8faf4c0f-79d5-462c-83be-43d70656d3f0', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 34, '{\"name\":\"fgf\",\"desc\":\"<p>vcv<\\/p>\"}', NULL, '2022-06-13 04:34:51', '2022-06-13 04:34:51'),
('9', 'App\\Notifications\\browsingNotification', 'App\\Models\\User', 35, '{\"id\":\"9\",\"image\":\"neolab64.png\",\"desc\":\"H\\u1ed3 s\\u01a1 c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c duy\\u1ec7t\"}', NULL, '2022-06-23 16:14:20', '2022-06-23 16:14:20'),
('91dc0cd5-168d-4f7c-b4a1-7dd2b36a5462', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 9, '{\"desc\":\"V\\u00f5 V\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-18 10:00:19', '2022-06-18 10:00:19'),
('9207d287-d0cc-4c1a-8848-403784076505', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"V\\u00f5 V\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-24 02:34:02', '2022-06-24 02:33:12', '2022-06-24 02:34:02'),
('980fafb2-49c3-41a9-8e19-474af291a2f4', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 6, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-13 01:57:55', '2022-06-10 10:15:56', '2022-06-13 01:57:55'),
('9fff839e-b79f-4023-bb64-ea91f7cdb54f', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-20 03:24:24', '2022-06-20 03:09:01', '2022-06-20 03:24:24'),
('a34e0091-70f7-4d03-8cc4-7d03709d71dc', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 36, '{\"name\":\"fgf\",\"desc\":\"<p>vcv<\\/p>\"}', '2022-06-13 14:32:05', '2022-06-13 04:34:51', '2022-06-13 14:32:05'),
('abc0be20-db6f-4ac6-9863-73db2d82346c', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 8, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-21 03:37:14', '2022-06-21 03:37:14'),
('c4e9a0c3-1367-4533-af85-08f6a4511291', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 9, '{\"desc\":\"V\\u00f5 V\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-18 10:02:35', '2022-06-18 10:02:35'),
('d5d7ab23-f89b-4354-bc15-457076bbe9d0', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-24 03:15:08', '2022-06-24 03:14:59', '2022-06-24 03:15:08'),
('e5844a64-0a0b-46ef-aaf9-637c820e4bc0', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 11, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-10 04:13:14', '2022-06-10 04:13:14'),
('e89e382b-8c3e-4533-8490-357042f73b09', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 5, '{\"desc\":\"V\\u00f5 V\\u0103n Th\\u00e0nh \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', '2022-06-24 02:53:23', '2022-06-24 02:52:53', '2022-06-24 02:53:23'),
('e8b806a8-9710-43c1-9b8a-e5c7eb26d451', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 34, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('e8c8564c-9ac1-435d-8306-6cc4898009ea', 'App\\Notifications\\noticeWithAdmin', 'App\\Models\\User', 36, '{\"name\":\"fff\",\"desc\":\"<p>fdfdfd<\\/p>\"}', NULL, '2022-06-23 16:36:51', '2022-06-23 16:36:51'),
('f2e9cdf8-046a-4b61-9c7b-30f6efe37e03', 'App\\Notifications\\recruitmentNotify', 'App\\Models\\User', 11, '{\"desc\":\"V\\u00f5 V\\u0103n \\u0110\\u1ea1t \\u0111\\u00e3 \\u1ee9ng tuy\\u1ec3n v\\u00e0o tin tuy\\u1ec3n d\\u1ee5ng c\\u1ee7a b\\u1ea1n\"}', NULL, '2022-06-10 04:15:59', '2022-06-10 04:15:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `male` int(11) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `title`, `image`, `name`, `email`, `phone_number`, `male`, `dateOfBirth`, `address`, `position`, `introduce`, `created_at`, `updated_at`) VALUES
(1, 1, 'Intern Frond-end', 'anhthe278.png', 'Võ văn Thành', 'vothanh1320@gmail.com', '0774794604', 1, '2000-03-01', 'Điện Bàn - Quảng Nam', 'Intern Frond-end', '<p>- L&agrave; sinh vi&ecirc;n năm cuối được trang bị kiến thức v&agrave; mong muốn trau dồi kinh nghiệm, mong muốn được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Điểm mạnh: C&ocirc;ng nghệ Front-end v&agrave; ph&aacute;t triển ứng dụng web Back-end</p>\r\n\r\n<p>- Th&agrave;nh thạo HTML, CSS, JavaScript</p>\r\n\r\n<p>- Th&agrave;nh thạo JavaScript, bao gồm thao t&aacute;c DOM v&agrave; m&ocirc; h&igrave;nh đối tượng JavaScript</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với c&aacute;c quy tr&igrave;nh l&agrave;m việc phổ biến của React.js (chẳng hạn như Flux hoặc Redux).</p>', '2022-05-02 10:08:20', '2022-06-16 15:03:19'),
(43, 2, 'Fresher php', 'anhthe176.jpg', 'Võ Văn Đạt', 'vodat1320@gmail.com', '0906889184', 1, '1996-07-06', 'K159/76 Phó Đức Chính', 'developer php', '<p>- Hơn 2 năm kinh nghiệm lập tr&igrave;nh, giao tiếp tốt, học hỏi nhanh</p>\r\n\r\n<p>- Điểm mạnh: C&ocirc;ng nghệ Front-end v&agrave; ph&aacute;t triển ứng dụng web Back-end</p>\r\n\r\n<p>- Th&agrave;nh thạo HTML, CSS, JavaScript</p>\r\n\r\n<p>- C&oacute; kinh nghiệm về: PHP, JavaScript (ReactJS, React-native), MySQL,</p>', '2022-05-28 04:46:51', '2022-06-24 03:14:36'),
(44, 1, 'Intern Php', 'anhthe216.png', 'Võ Văn Thành', 'vothanh1320@gmail.com', '0774794604', 1, '2000-03-01', 'Điện Bàn - Quảng Nam', 'developer php', '<p>- L&agrave; sinh vi&ecirc;n năm cuối được trang bị kiến thức v&agrave; mong muốn trau dồi kinh nghiệm, mong muốn được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>- Điểm mạnh: C&ocirc;ng nghệ Front-end v&agrave; ph&aacute;t triển ứng dụng web Back-end</p>\r\n\r\n<p>- Th&agrave;nh thạo HTML, CSS, JavaScript</p>', '2022-06-23 14:57:12', '2022-06-24 02:26:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name_project` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_project` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce_pro` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id`, `profile_id`, `name_project`, `time_project`, `introduce_pro`) VALUES
(18, 43, 'FOODHUB.VN', '10/2017-01/2018', '<p><strong>C&ocirc;ng nghệ:</strong></p>\r\n\r\n<p>&nbsp;- Frontend: Web + App (React-Native)<br />\r\n- Backend: PHP - Codeigniter, MariaDB, Memcached</p>\r\n\r\n<p><strong>M&ocirc; tả:</strong></p>\r\n\r\n<p>- Ứng dụng kết nối chuỗi cửa h&agrave;ng thực phẩm hữu cơ</p>'),
(20, 1, 'Website selling cake', '12/2021 - 01/2022', '<p><strong>C&ocirc;ng nghệ sử dụng</strong>: HTML, CSS, JavaScript, PHP</p>\r\n\r\n<p><strong>M&ocirc; tả</strong>: Website mua v&agrave; đặt b&aacute;nh.</p>'),
(21, 1, 'Music Player', '07/2021', '<p><strong>C&ocirc;ng nghệ sử dụng</strong>: HTML, CSS, JavaScript</p>\r\n\r\n<p><strong>M&ocirc; tả</strong>: chọn v&agrave; ph&aacute;t nhạc</p>'),
(22, 44, 'Website selling cake', '12/2021 - 01/2022', '<p><strong>C&ocirc;ng nghệ sử dụng</strong>: HTML, CSS, JavaScript, PHP</p>\r\n\r\n<p><strong>M&ocirc; tả</strong>: Website mua v&agrave; đặt b&aacute;nh.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitment`
--

CREATE TABLE `recruitment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kills` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `salary_min` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_max` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire` date NOT NULL,
  `address_work` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_requirements` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `benefit` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recruitment`
--

INSERT INTO `recruitment` (`id`, `user_id`, `title`, `name_company`, `slug_title`, `position`, `position_type`, `level`, `kills`, `experience`, `quantity`, `salary_min`, `salary_max`, `expire`, `address_work`, `job_description`, `job_requirements`, `benefit`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'PHP Developer (Laravel,MySQL)', 'Neolab VietNam', 'net-developer', 'PHP Developer', 'Fulltime', 'Fresher,Junior', 'PHP,Laravel', '2', 2, '10000000', '15000000', '2022-06-29', '344 đường 2 tháng 9, quận Hải Châu, Tp. Đà Nẵng, Việt Nam', '<p>- Ph&aacute;t triển c&aacute;c t&iacute;nh năng mới hoặc duy tr&igrave; c&aacute;c t&iacute;nh năng hiện c&oacute;&nbsp;</p>\r\n\r\n<p>- Thực hiện test để đảm bảo c&aacute;c t&iacute;nh năng được cung cấp &iacute;t xảy ra lỗi /sự cố v&agrave; đảm bảo deadline&nbsp;</p>\r\n\r\n<p>- Trao đổi với c&aacute;c team kh&aacute;c nhờ sự hỗ trợ khi cần thiết&nbsp;</p>\r\n\r\n<p>- L&agrave;m việc với m&ocirc; h&igrave;nh Scrum sử dụng phương ph&aacute;p Lean v&agrave; Agile</p>', '<p>- C&oacute; từ 1+ năm kinh nghiệm trong việc ph&aacute;t triển Laravel, Symfony hoặc CodeIgniter&nbsp;</p>\r\n\r\n<p>- C&oacute; kiến thức về OOP v&agrave; Design Patterns&nbsp;</p>\r\n\r\n<p>- C&oacute; kinh nghiệm về SQL/NoSQL, thiết kế database, tối ưu query&nbsp;</p>\r\n\r\n<p>- Hiểu biết cơ bản về front-end như JavaScript, HTML5 v&agrave; CSS3&nbsp;</p>\r\n\r\n<p>- Hiểu biết th&agrave;nh thạo về c&aacute;c c&ocirc;ng cụ quản l&yacute; source code, chẳng hạn như Git&nbsp;</p>\r\n\r\n<p>- L&agrave; lợi thế nếu:&nbsp;</p>\r\n\r\n<p>&nbsp; + C&oacute; kinh nghiệm với c&aacute;c cơ sở dữ liệu NoSQL như MongoDB.&nbsp;</p>\r\n\r\n<p>&nbsp; + Kiểm so&aacute;t được truy cập v&agrave; bảo mật tr&ecirc;n hệ thống.&nbsp;</p>\r\n\r\n<p>&nbsp; + T&iacute;ch hợp được nhiều nguồn dữ liệu v&agrave; cơ sở dữ liệu v&agrave;o một hệ thống.&nbsp;</p>\r\n\r\n<p>&nbsp; + Hiểu về những hạn chế của ng&ocirc;n ngữ PHP v&agrave; c&aacute;ch giải quyết n&oacute;.&nbsp;</p>\r\n\r\n<p>&nbsp; + Hiểu về cơ chế x&aacute;c thực v&agrave; ủy quyền người d&ugrave;ng giữa nhiều hệ thống, m&aacute;y chủ v&agrave; m&ocirc;i trường</p>', '<p>- Cơ hội được học tập v&agrave; đ&agrave;o tạo c&ugrave;ng với c&aacute;c chuy&ecirc;n gia C&ocirc;ng nghệ trong lĩnh vực HR Tech&nbsp;</p>\r\n\r\n<p>- Kinh nghiệm l&agrave;m việc thực tế tại c&ocirc;ng ty c&oacute; sản phẩm SAAS h&agrave;ng đầu Nhật Bản&nbsp;</p>\r\n\r\n<p>- Cơ hội ph&aacute;t triển nghề nghiệp v&agrave; n&acirc;ng cao kĩ năng chuy&ecirc;n ng&agrave;nh nhanh ch&oacute;ng</p>\r\n\r\n<p>- Mức lương cạnh tranh&nbsp;</p>\r\n\r\n<p>- Định hướng nghề nghiệp: được trang bị kiến thức chuy&ecirc;n m&ocirc;n trong lĩnh vực HR Tech v&agrave; kĩ năng ph&aacute;t triển SAAS&nbsp;</p>\r\n\r\n<p>- L&agrave;m việc với m&ocirc; h&igrave;nh Agile Scrum&nbsp;</p>\r\n\r\n<p>- Th&aacute;ng lương thứ 13, review lương 2 lần/năm&nbsp;</p>\r\n\r\n<p>- Mức đ&oacute;ng bảo hiểm full lương, Bảo hiểm quốc tế PTI, kiểm tra sức khỏe mỗi năm 1 lần&nbsp;</p>\r\n\r\n<p>- 12 ng&agrave;y ph&eacute;p năm&nbsp;</p>\r\n\r\n<p>- Thời gian l&agrave;m việc linh động (40h/tuần)&nbsp;</p>\r\n\r\n<p>- Du lịch c&ocirc;ng ty v&agrave; tiệc nh&acirc;n vi&ecirc;n hằng năm&nbsp;</p>\r\n\r\n<p>- Team building hằng th&aacute;ng, qu&agrave; sinh nhật, sự kiện hằng th&aacute;ng&nbsp;</p>\r\n\r\n<p>- Trợ cấp: tiếng Nhật, k&ecirc;t h&ocirc;n, ốm đau,&hellip;&nbsp;</p>\r\n\r\n<p>- Chi trả lương l&agrave;m th&ecirc;m giờ theo đ&uacute;ng quy định&nbsp;</p>', 1, '2022-06-24 03:28:00', '2022-06-22 03:27:35'),
(2, 5, 'Frontend  Dev (JavaScript, HTML, CSS)', 'Neolab VietNam', 'frontend-dev-javascript-html-css', 'frontend-dev-javascript-html-css', 'Fulltime', 'Fresher,Junior', 'JavaScript,VueJS,ReactJS', 'Chưa có kinh nghiệm', 2, '12000000', '20000000', '2022-06-30', 'Hải Châu- Đà Nẵng', '<p>- Ph&aacute;t triển c&aacute;c t&iacute;nh năng mới hoặc duy tr&igrave; c&aacute;c t&iacute;nh năng hiện c&oacute;&nbsp;</p>\r\n\r\n<p>- Thực hiện test để đảm bảo c&aacute;c t&iacute;nh năng được cung cấp &iacute;t xảy ra lỗi /sự cố v&agrave; đảm bảo deadline&nbsp;</p>\r\n\r\n<p>- Trao đổi với c&aacute;c team kh&aacute;c nhờ sự hỗ trợ khi cần thiết&nbsp;</p>\r\n\r\n<p>- L&agrave;m việc với m&ocirc; h&igrave;nh Scrum sử dụng phương ph&aacute;p Lean v&agrave; Agile</p>', '<p>- Ph&aacute;t triển c&aacute;c t&iacute;nh năng mới hoặc duy tr&igrave; c&aacute;c t&iacute;nh năng hiện c&oacute;&nbsp;</p>\r\n\r\n<p>- Thực hiện test để đảm bảo c&aacute;c t&iacute;nh năng được cung cấp &iacute;t xảy ra lỗi /sự cố v&agrave; đảm bảo deadline&nbsp;</p>\r\n\r\n<p>- Trao đổi với c&aacute;c team kh&aacute;c nhờ sự hỗ trợ khi cần thiết&nbsp;</p>\r\n\r\n<p>- L&agrave;m việc với m&ocirc; h&igrave;nh Scrum sử dụng phương ph&aacute;p Lean v&agrave; Agile</p>', '<p>- Mức lương cạnh tranh&nbsp;</p>\r\n\r\n<p>- Định hướng nghề nghiệp: được trang bị kiến thức chuy&ecirc;n m&ocirc;n trong lĩnh vực HR Tech v&agrave; kĩ năng ph&aacute;t triển SAAS&nbsp;</p>\r\n\r\n<p>- L&agrave;m việc với m&ocirc; h&igrave;nh Agile Scrum&nbsp;</p>\r\n\r\n<p>- Th&aacute;ng lương thứ 13, review lương 2 lần/năm&nbsp;</p>\r\n\r\n<p>- Mức đ&oacute;ng bảo hiểm full lương, Bảo hiểm quốc tế PTI, kiểm tra sức khỏe mỗi năm 1 lần&nbsp;</p>\r\n\r\n<p>- 12 ng&agrave;y ph&eacute;p năm&nbsp;</p>\r\n\r\n<p>- Thời gian l&agrave;m việc linh động (40h/tuần)&nbsp;</p>\r\n\r\n<p>- Du lịch c&ocirc;ng ty v&agrave; tiệc nh&acirc;n vi&ecirc;n hằng năm&nbsp;</p>\r\n\r\n<p>- Team building hằng th&aacute;ng, qu&agrave; sinh nhật, sự kiện hằng th&aacute;ng&nbsp;</p>\r\n\r\n<p>- Trợ cấp: tiếng Nhật, k&ecirc;t h&ocirc;n, ốm đau,&hellip;&nbsp;</p>\r\n\r\n<p>- Chi trả lương l&agrave;m th&ecirc;m giờ theo đ&uacute;ng quy định</p>', 1, '2022-06-24 04:18:56', '2022-06-22 03:25:01'),
(5, 6, '03 Tester ( QA QC, SQL)', 'CMC Techlonogy', 'developer', 'Tester', 'Fulltime', 'Fresher,Junior', 'SQL,Tester', 'Chưa có kinh nghiệm', 3, '10000000', '20000000', '2022-06-30', 'tầng 8 tòa nhà Thành Lợi II, số 1 Lê Đình Lý, quận Thanh Khê Đà Nẵng', '<ul>\r\n	<li>X&acirc;y dựng kịch bản test cho hệ thống LOS cho c&aacute;c dự &aacute;n trong ng&agrave;nh ng&acirc;n h&agrave;ng.</li>\r\n	<li>Nghi&ecirc;n cứu, ph&acirc;n t&iacute;ch c&aacute;c y&ecirc;u cầu nghiệp vụ để hiểu về mục ti&ecirc;u của dự &aacute;n</li>\r\n	<li>X&acirc;y dựng c&aacute;c kịch bản kiểm thử v&agrave; tạo test cases cho c&aacute;c business logic process</li>\r\n	<li>L&agrave;m việc nh&oacute;m hoặc độc lập, giao tiếp với cấp tr&ecirc;n v&agrave; th&agrave;nh vi&ecirc;n li&ecirc;n quan đến c&ocirc;ng việc test.&nbsp;</li>\r\n	<li>Thực hiện test c&aacute;c sản phẩm, dịch vụ theo y&ecirc;u cầu, ghi nhận, quản l&yacute; lỗi của phần mềm tr&ecirc;n hệ thống quản l&yacute; lỗi.</li>\r\n	<li>Nhận phản hồi kh&aacute;ch h&agrave;ng v&agrave; ph&acirc;n loại (li&ecirc;n quan design hay chức năng, nằm trong requirement hay ngo&agrave;i requirement)</li>\r\n	<li>Trao đổi c&ocirc;ng việc cụ thể khi tham gia PV.</li>\r\n</ul>', '<ul>\r\n	<li>X&acirc;y dựng kịch bản test cho hệ thống LOS cho c&aacute;c dự &aacute;n trong ng&agrave;nh ng&acirc;n h&agrave;ng.</li>\r\n	<li>Nghi&ecirc;n cứu, ph&acirc;n t&iacute;ch c&aacute;c y&ecirc;u cầu nghiệp vụ để hiểu về mục ti&ecirc;u của dự &aacute;n</li>\r\n	<li>X&acirc;y dựng c&aacute;c kịch bản kiểm thử v&agrave; tạo test cases cho c&aacute;c business logic process</li>\r\n	<li>L&agrave;m việc nh&oacute;m hoặc độc lập, giao tiếp với cấp tr&ecirc;n v&agrave; th&agrave;nh vi&ecirc;n li&ecirc;n quan đến c&ocirc;ng việc test.&nbsp;</li>\r\n	<li>Thực hiện test c&aacute;c sản phẩm, dịch vụ theo y&ecirc;u cầu, ghi nhận, quản l&yacute; lỗi của phần mềm tr&ecirc;n hệ thống quản l&yacute; lỗi.</li>\r\n	<li>Nhận phản hồi kh&aacute;ch h&agrave;ng v&agrave; ph&acirc;n loại (li&ecirc;n quan design hay chức năng, nằm trong requirement hay ngo&agrave;i requirement)</li>\r\n	<li>Trao đổi c&ocirc;ng việc cụ thể khi tham gia PV.</li>\r\n</ul>', '<ul>\r\n	<li>Lương cạnh tranh, xứng đ&aacute;ng với năng lực v&agrave; mức độ cống hiến của mỗi nh&acirc;n vi&ecirc;n</li>\r\n	<li>C&oacute; thưởng lương th&aacute;ng 13, thưởng theo t&igrave;nh h&igrave;nh kinh doanh của c&ocirc;ng ty.</li>\r\n	<li>Được x&eacute;t tăng lương định kỳ h&agrave;ng năm.</li>\r\n	<li>C&oacute; thưởng v&agrave;o c&aacute;c dịp lễ, Tết như 30/4, 1/5, 1/6; 2/9, 8/3, 20/10...</li>\r\n	<li>Bữa trưa tại văn ph&ograve;ng với những bữa ăn chuẩn cơm mẹ nấu, miễn ph&iacute; đồ uống tại khu ăn uống của c&ocirc;ng ty</li>\r\n	<li>Trợ cấp đi lại, điện thoại với những nh&acirc;n vi&ecirc;n phải l&agrave;m việc với kh&aacute;ch h&agrave;ng</li>\r\n	<li>Phụ cấp chứng chỉ IT (nếu c&oacute;)</li>\r\n</ul>', 1, '2022-06-23 03:22:50', '2022-06-22 03:18:58'),
(6, 11, 'Java Developer (Spring, MVC)', 'Paracel Technology', 'java-dev-spring-mvc', 'Java dev', 'Fulltime', 'Fresher', 'Java', 'Chưa có kinh nghiệm', 2, '6000000', '9000000', '2022-06-28', 'Phường Khuê Mỹ,Quận Ngũ Hành Sơn, Đà Nẵng', '<ul>\r\n	<li>- Chi tiết c&ocirc;ng việc trao đổi khi phỏng vấn.</li>\r\n</ul>', '<ul>\r\n	<li>- Cover được c&aacute;c y&ecirc;u cầu của fresher</li>\r\n	<li>- C&oacute; &iacute;t nhất 1-2 năm kinh nghiệm về ph&aacute;t triển Java</li>\r\n	<li>- C&oacute; kiến thức về thuật to&aacute;n dữ liệu, cấu tr&uacute;c dữ liệu v&agrave; OOP</li>\r\n	<li>- C&oacute; kinh nghiệm với Spring boot, Spring MVC, RESTful API.</li>\r\n	<li>- C&oacute; khả năng viết Unit testing: JUnit, Mock.</li>\r\n	<li>- Th&agrave;nh thạo với c&aacute;c ng&ocirc;n ngữ giao diện người d&ugrave;ng cơ bản như HTML, CSS v&agrave; JavaScript.</li>\r\n</ul>', '<ul>\r\n	<li>- Mức lương cạnh trạnh</li>\r\n	<li>- Chế độ BHXH, BHYT, th&aacute;ng lương thứ 13, c&aacute;c ng&agrave;y nghỉ ph&eacute;p v&agrave; c&aacute;c chế độ kh&aacute;c theo luật.</li>\r\n	<li>- Lớp học tiếng Nhật</li>\r\n	<li>- Tham gia c&aacute;c hoạt động du lịch v&agrave; team building với c&ocirc;ng ty.</li>\r\n	<li>- M&ocirc;i trường l&agrave;m việc th&acirc;n thiện, năng động, tiếp x&uacute;c với c&aacute;c bạn trẻ trong lĩnh vực IT.</li>\r\n	<li>- Thời gian l&agrave;m việc v&agrave; WFH linh động.</li>\r\n	<li>- Học hỏi v&agrave; trao đổi với leaded nhiều năm kinh nghiệm.</li>\r\n	<li>-&nbsp;Đ&aacute;nh gi&aacute; KPI đầy đủ.</li>\r\n</ul>', 1, '2022-06-21 09:27:04', '2022-05-25 09:44:22'),
(7, 7, 'Senior Backend Developer', 'Ubisoft Danang', 'senior-backend-developer', 'Senior Backend Developer', 'Fulltime', 'Senior', 'HTML5,JavaScript,NodeJS', 'Chưa có kinh nghiệm', 3, '12000000', '15000000', '2022-06-30', 'Luxury Buildinng - Floor 6, 205 Tran Phu, Phuoc Ninh, Hai Chau, Da Nang', '<p>L&agrave;m việc với c&aacute;c nh&agrave; ph&aacute;t triển ph&iacute;a m&aacute;y kh&aacute;ch để tạo cấu tr&uacute;c giao tiếp hiệu quả v&agrave; đảm bảo đồng bộ h&oacute;a giữa m&aacute;y kh&aacute;ch / m&aacute;y chủ.</p>\r\n\r\n<p>- L&agrave;m việc với nh&oacute;m sản xuất để tạo khu&ocirc;n khổ, API v&agrave; c&ocirc;ng cụ để sử dụng cho c&aacute;c tr&ograve; chơi th&ocirc;ng thường nhiều người chơi trực tuyến quy m&ocirc; lớn.</p>\r\n\r\n<p>- Tạo trang tổng quan dựa tr&ecirc;n web v&agrave; c&aacute;c c&ocirc;ng cụ kh&aacute;c để hỗ trợ vận h&agrave;nh, ph&acirc;n t&iacute;ch, triển khai v&agrave; thử nghiệm tr&ograve; chơi trực tiếp.</p>\r\n\r\n<p>- Viết m&atilde; ph&iacute;a m&aacute;y kh&aacute;ch v&agrave; m&aacute;y chủ để hỗ trợ t&iacute;ch hợp với c&aacute;c nền tảng b&ecirc;n thứ ba / b&ecirc;n ngo&agrave;i như ph&acirc;n t&iacute;ch, CDN, đăng nhập, mai mối, lưu trữ dữ liệu người d&ugrave;ng, v.v.</p>\r\n\r\n<p>- L&agrave;m việc với nh&oacute;m kh&aacute;ch h&agrave;ng, nh&oacute;m c&ocirc;ng nghệ cốt l&otilde;i v&agrave; c&aacute;c nh&agrave; cung cấp b&ecirc;n ngo&agrave;i để đảm bảo rằng dữ liệu tr&ograve; chơi được bảo mật, đ&aacute;ng tin cậy v&agrave; hiệu quả</p>\r\n\r\n<p>- Tạo logic tr&ograve; chơi ph&iacute;a m&aacute;y chủ cho c&aacute;c tr&ograve; chơi di động x&atilde; hội trực tuyến</p>\r\n\r\n<p>- Hỗ trợ c&aacute;c nh&agrave; lập tr&igrave;nh tr&ograve; chơi cắm tr&ograve; chơi Unity v&agrave;o chương tr&igrave;nh phụ trợ ở bất cứ nơi n&agrave;o &aacute;p dụng</p>', '<p>- C&oacute; kinh nghiệm với một hoặc nhiều khung m&aacute;y chủ, chẳng hạn như Node.js / Express, v.v.</p>\r\n\r\n<p>- Kiến thức vững chắc về Javascript / Typescript như Angular JS, ReactJs</p>\r\n\r\n<p>- Trải nghiệm với giao diện kiểu REST v&agrave; c&aacute;c c&ocirc;ng nghệ li&ecirc;n quan đến dịch vụ web kh&aacute;c</p>\r\n\r\n<p>- Quen thuộc với c&aacute;c c&ocirc;ng nghệ cơ sở dữ liệu như MySQL, Oracle v&agrave; MongoDB, Redis</p>\r\n\r\n<p>- Đ&atilde; triển khai th&agrave;nh c&ocirc;ng logic ph&iacute;a m&aacute;y chủ cho một hoặc nhiều tr&ograve; chơi nhiều người chơi hoặc c&aacute;c ứng dụng kh&aacute;c c&oacute; tương t&aacute;c tương tự.</p>\r\n\r\n<p>- C&oacute; kinh nghiệm với lập tr&igrave;nh kết nối d&agrave;i, chẳng hạn như với TCP / IP, Websockets, Socket.io, v.v.</p>\r\n\r\n<p>- Trải nghiệm với c&ocirc;ng cụ tr&ograve; chơi Unity</p>', '<p>- Một m&ocirc;i trường quốc tế, chuy&ecirc;n nghiệp, hợp t&aacute;c, hiện đại v&agrave; s&aacute;ng tạo</p>\r\n\r\n<p>- G&oacute;i đ&atilde;i ngộ hấp dẫn</p>\r\n\r\n<p>- C&aacute;c dự &aacute;n th&uacute; vị s&aacute;ng tạo v&agrave; bất tận</p>\r\n\r\n<p>- Thời gian l&agrave;m việc linh hoạt</p>\r\n\r\n<p>- Bảo hiểm chăm s&oacute;c sức khỏe cao cấp cho bạn v&agrave; gia đ&igrave;nh bạn</p>\r\n\r\n<p>- Miễn ph&iacute; truy cập to&agrave;n bộ thư viện tr&ograve; chơi PC của Ubisoft</p>', 1, '2022-06-22 04:03:00', NULL),
(8, 8, 'Java Developer (Spring, MySQL)', 'TECHZEN', 'java-developer-spring-mysql', 'Java Developer', 'Fulltime', 'Junior,Senior', 'Java', 'Chưa có kinh nghiệm', 3, '12000000', '18000000', '2022-06-29', 'Tầng 10, Công Viên Phần Mềm số 02 Quang Trung, Hai Chau, Da Nang', '<p>- Techzen cần tuyển vị tr&iacute; Lập tr&igrave;nh vi&ecirc;n Java</p>', '<p>- C&oacute; kinh nghiệm l&agrave;m việc với Java 1-2 năm.</p>\r\n\r\n<p>- Nắm vững về Java core, J2EE, Hibernate, Spring.</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c nguy&ecirc;n tắc ph&aacute;t triển application qua Restful API.</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c cơ sở dữ liệu Oracle, MySQL.</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ quản l&yacute; m&atilde; nguồn v&agrave; dự &aacute;n như Git, Github, viết t&agrave;i liệu cho API, c&ocirc;ng cụ để quản l&yacute; chất lượng code, API doc.</p>\r\n\r\n<p>- Khả năng tư duy, s&aacute;ng tạo, ph&acirc;n t&iacute;ch, tổng hợp tốt</p>\r\n\r\n<p>- C&oacute; tinh thần tr&aacute;ch nghiệm cao trong c&ocirc;ng việc</p>\r\n\r\n<p>- Ưu ti&ecirc;n ứng vi&ecirc;n tốt nghiệp chuy&ecirc;n ng&agrave;nh c&ocirc;ng nghệ th&ocirc;ng tin</p>\r\n\r\n<p>- Biết tiếng Nhật l&agrave; một lợi thế</p>', '<p>- Nghỉ lễ theo quy định nh&agrave; nước</p>\r\n\r\n<p>- Được đ&oacute;ng BHYT,BHXH theo quy định nh&agrave; nước</p>\r\n\r\n<p>- Mức lương thay đổi linh hoạt dựa v&agrave;o chế độ review lương 4 lần/năm</p>\r\n\r\n<p>- C&oacute; phụ cấp kỹ năng cho c&aacute;c nh&acirc;n vi&ecirc;n c&oacute; sự phấn đấu trong việc n&acirc;ng cao kỹ năng nghiệp vụ</p>\r\n\r\n<p>- Ngo&agrave;i c&aacute;c dịp lễ tết, c&ocirc;ng ty c&oacute; 2 đợt thưởng ch&iacute;nh trong năm</p>\r\n\r\n<p>- Chế độ du lịch, nghỉ m&aacute;t hằng năm, Teambuilding, ...</p>\r\n\r\n<p>- Thời gian làm việc : giờ hành chính, từ T2- T6: 8h00 ~ 17h00 (Nghỉ thứ 7, chủ nhật)</p>\r\n\r\n<p>- Môi trường làm việc năng động trẻ trung thoải mái sáng tạo tư duy khả năng của bản thân</p>\r\n\r\n<p>- Nhiều cơ hội thăng tiến v&agrave; ph&aacute;t triển bản th&acirc;n</p>', 1, '2022-06-21 04:08:06', '2022-06-16 04:32:06'),
(9, 9, 'PHP Web Developer', 'Supremetech', 'php-web-developer', 'PHP Web Developer', 'Fulltime', 'Junior,Senior', 'PHP', '3', 2, '11000000', '17000000', '2022-06-28', '2F Ricco building, 363 Nguyen Huu Tho Cam Le Da Nang', '<p>- Ph&aacute;t triển những dự &aacute;n mới, tối ưu, ổn định, cho người d&ugrave;ng trải nghiệm th&acirc;n thiện</p>\r\n\r\n<p>- Duy tr&igrave;, hỗ trợ, ph&aacute;t triển chức năng cho c&aacute;c hệ thống c&oacute; sẵn</p>\r\n\r\n<p>- B&aacute;o c&aacute;o, li&ecirc;n lạc với quản l&yacute; ở Nhật</p>', '<p>- Ưu ti&ecirc;n cho c&aacute;c bạn c&oacute; 3 năm kinh nghiệm l&agrave;m việc với Laravel</p>\r\n\r\n<p>- C&oacute; kinh nghiệm l&agrave;m việc với Git v&agrave; Git flow</p>\r\n\r\n<p>- C&oacute; kinh nghiệm thiết kế database v&agrave; l&agrave;m việc với MySQL</p>\r\n\r\n<p>- C&oacute; kinh nghiệm l&agrave;m việc với Hệ thống Linux, hệ thống mạng l&agrave; một lợi thế</p>\r\n\r\n<p>- C&oacute; tinh thần tr&aacute;ch nhiệm, chăm chỉ, ho&agrave; đồng.</p>\r\n\r\n<p>- Kỹ năng giao tiếp, viết tốt khi trao đổi, tr&igrave;nh b&agrave;y về c&aacute;c vấn đề, giải ph&aacute;p li&ecirc;n quan tới kỹ thuật</p>', '<p>- Được hưởng bảo hiểm y tế, bảo hiểm x&atilde; hội, theo luật lao động Việt Nam</p>\r\n\r\n<p>- Lương, thưởng cạnh tranh</p>\r\n\r\n<p>- C&oacute; cơ hội l&agrave;m việc tại Nhật Bản</p>\r\n\r\n<p>- Tham dự c&aacute;c event của c&ocirc;ng ty</p>\r\n\r\n<p>- Chế độ l&agrave;m việc c&acirc;n bằng 40 tiếng/tuần, thứ 2 tới thứ 6.</p>\r\n\r\n<p>- Nghỉ giữa giờ, snack.</p>', 1, '2022-06-21 04:23:03', NULL),
(10, 10, 'Sr Fullstack Dev', 'EM&AI', 'sr-fullstack-dev', 'Sr Fullstack Dev', 'Fulltime', 'Junior,Senior', 'JavaScript,NodeJS', '3', 4, '15000000', '20000000', '2022-06-29', '30 Nguyen Huu Tho, Hai Chau, Da Nang', '<p>- Tham gia v&agrave;o to&agrave;n bộ chu k&igrave; ph&aacute;t triển của sản phẩm phần mềm, dự &aacute;n đang triển khai</p>\r\n\r\n<p>- L&agrave;m việc với c&aacute;c bộ phận nội bộ (nh&oacute;m sản phẩm, thiết kế, b&aacute;n h&agrave;ng), hoặc kh&aacute;ch h&agrave;ng, đối t&aacute;c để đảm bảo hoạt động của dự &aacute;n</p>\r\n\r\n<p>- Quản trị hiệu năng, load testing v&agrave; review code; đ&oacute;ng g&oacute;p cho sự cải thiện của hệ thống kỹ thuật</p>\r\n\r\n<p>- Đề xuất v&agrave; ph&aacute;t triển t&iacute;nh năng (Frontend + Backend) chất lượng cao để tăng tốc độ, quy m&ocirc; v&agrave; khả năng sử dụng</p>\r\n\r\n<p>- C&aacute;c c&ocirc;ng việc kh&aacute;c theo chỉ đạo của gi&aacute;m đốc, leaders.</p>', '<p><strong>- Th&agrave;nh thạo NodeJS, Angular.</strong></p>\r\n\r\n<p>- Ưu ti&ecirc;n khả năng giỏi xử l&yacute; vấn đề, ứng vi&ecirc;n c&oacute; từ 02 năm kinh nghiệm trở l&ecirc;n.</p>\r\n\r\n<p>- C&oacute; khả năng tự lập kế hoạch v&agrave; chịu tr&aacute;ch nhiệm với kế hoạch của m&igrave;nh, l&agrave;m việc với tinh thần v&agrave; tr&aacute;ch nhiệm cao nhất với c&ocirc;ng việc.</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c nguy&ecirc;n tắc ph&aacute;t triển application qua API v&agrave; kiến tr&uacute;c server.</p>\r\n\r\n<p>- Biết d&ugrave;ng một trong c&aacute;c cơ sở dữ liệu từ cơ bản tới ph&acirc;n t&aacute;n như MySQL, MongoDB.</p>\r\n\r\n<p>- Th&agrave;nh thạo c&aacute;c c&ocirc;ng cụ quản l&yacute; m&atilde; nguồn v&agrave; dự &aacute;n như Git, Github.</p>\r\n\r\n<p>- C&oacute; khả năng l&agrave;m việc độc lập v&agrave; l&agrave;m việc theo nh&oacute;m, l&agrave;m việc ở cường độ cao v&agrave; chịu &aacute;p lực tốt; c&oacute; tư duy logic, tự học hỏi c&ocirc;ng nghệ mới nhanh; chủ động v&agrave; s&aacute;ng tạo trong c&ocirc;ng việc.</p>', '<p><strong>- Mức lương hấp dẫn Up to $2000</strong></p>\r\n\r\n<p><strong>- Ưu ti&ecirc;n ứng vi&ecirc;n l&agrave;m onsite tại văn ph&ograve;ng tại Đ&agrave; Nẵng</strong></p>\r\n\r\n<p>- Lương thưởng xứng đ&aacute;ng với năng lực. Được đ&aacute;nh gi&aacute; chất lượng, mức độ ho&agrave;n th&agrave;nh c&ocirc;ng việc 2 lần/ 1 năm;</p>\r\n\r\n<p>- Đ&oacute;ng bảo hiểm theo quy định nh&agrave; nước, 12 ng&agrave;y ph&eacute;p/ năm;&nbsp;</p>\r\n\r\n<p>- C&ocirc;ng ty tổ chức Team building hằng năm;</p>\r\n\r\n<p>- L&agrave;m việc trong m&ocirc;i trường năng động, trẻ trung; C&ocirc;ng ty Start-up c&ocirc;ng nghệ theo xu hướng mới;&nbsp;</p>\r\n\r\n<p>- Sản phẩm mới tại thị trường Đ&agrave; Nẵng, gi&agrave;u tiềm năng ph&aacute;t triển ra thị trường quốc tế;&nbsp;</p>\r\n\r\n<p>- Cơ hội để ph&aacute;t triển nhanh ch&oacute;ng, ch&agrave;o đ&oacute;n những &yacute; tưởng mới mẻ, s&aacute;ng tạo, l&agrave; nơi để thử những c&aacute;i mới.</p>', 1, '2022-06-23 04:27:21', NULL),
(11, 9, 'Frontend Dev(HTML5/Javascript)', 'LVT STAR', 'frontend-devhtml5javascript', 'Frontend Dev', 'Fulltime', 'Fresher,Junior', 'JavaScript,HTML5,CSS', 'Chưa có kinh nghiệm', 3, '8000000', '12000000', '2022-06-29', '167 Nguyễn Đình Chiểu, Phường Khuê Mỹ, Ngũ Hành Sơn, Đà Nẵng', '<p>- Dựa tr&ecirc;n file design, t&agrave;i liệu đặc tả để x&acirc;y dựng web b&aacute;n h&agrave;ng quốc tế.</p>\r\n\r\n<p>- Tham gia ph&acirc;n t&iacute;ch, thiết kế, lập tr&igrave;nh website tr&ecirc;n nền tảng Shopify, wordpress;</p>\r\n\r\n<p>- Kết hợp với c&aacute;c bộ phận design, marketing trong việc chỉnh sửa, customize.</p>\r\n\r\n<p>- L&agrave;m mới v&agrave; cập nhật c&aacute;c component theo y&ecirc;u cầu của dự &aacute;n.</p>', '<p>- Dựa tr&ecirc;n file design, t&agrave;i liệu đặc tả để x&acirc;y dựng web b&aacute;n h&agrave;ng quốc tế.</p>\r\n\r\n<p>- Tham gia ph&acirc;n t&iacute;ch, thiết kế, lập tr&igrave;nh website tr&ecirc;n nền tảng Shopify, wordpress;</p>\r\n\r\n<p>- Kết hợp với c&aacute;c bộ phận design, marketing trong việc chỉnh sửa, customize.</p>\r\n\r\n<p>- L&agrave;m mới v&agrave; cập nhật c&aacute;c component theo y&ecirc;u cầu của dự &aacute;n.</p>', '<p>- Mức lương cơ bản: Junior từ 10 triệu đến 25 triệu (t&ugrave;y theo năng lực)</p>\r\n\r\n<p>- Thưởng kết quả c&ocirc;ng việc v&agrave; thưởng theo doanh thu tr&aacute;ch nhiệm l&ecirc;n tới 15% cho mỗi dự &aacute;n.</p>\r\n\r\n<p>- C&oacute; lộ tr&igrave;nh thăng tiến v&agrave; l&agrave;m với c&aacute;c dự &aacute;n cho c&aacute;c brand quốc tế lớn, đa dạng v&agrave; nhiều thay đổi li&ecirc;n tục.</p>\r\n\r\n<p>- Gắn b&oacute; l&acirc;u d&agrave;i v&agrave; giữ vị tr&iacute; cao trong c&ocirc;ng ty sẽ c&oacute; những ch&iacute;nh s&aacute;ch ri&ecirc;ng: hỗ trợ tiền thu&ecirc; nh&agrave; ở, quyền mua cổ phần ưu đ&atilde;i.</p>\r\n\r\n<p>- Được đ&oacute;ng bảo hiểm v&agrave; c&aacute;c chế độ ph&uacute;c lợi kh&aacute;c.</p>\r\n\r\n<p>- M&ocirc;i trường l&agrave;m việc trẻ trung th&acirc;n thiện, đa số ở độ tuổi 9x</p>\r\n\r\n<p>- C&aacute;c ph&uacute;c lợi kh&aacute;c: hỗ trợ tiền ăn trưa, tiền gửi xe, sinh nhật, du lịch h&agrave;ng năm</p>\r\n\r\n<p>- Xem x&eacute;t tăng lương 2 lần/ năm</p>', 1, '2022-06-22 02:07:36', '2022-06-16 02:08:41'),
(12, 6, 'Nodejs Software Engineer', 'CMC Techlonogy', 'nodejs-software-engineer', 'NodeJs Engineer', 'Fulltime', 'Fresher,Junior', 'HTML5,JavaScript,NodeJS', 'Chưa có kinh nghiệm', 5, '15000000', '20000000', '2022-06-30', 'CMC Global Office, 11 Lê Đìnnh Ly , Thanh Khê, Đà Nẵng', '<p>- Tham gia x&acirc;y dựng v&agrave; ph&aacute;t triển dự &aacute;n.</p>\r\n\r\n<p>- L&agrave;m việc theo quy tr&igrave;nh, c&aacute;c c&ocirc;ng cụ phần mềm hỗ trợ của c&ocirc;ng ty (quản l&yacute; dự &aacute;n, ph&acirc;n c&ocirc;ng c&ocirc;ng việc&hellip;).</p>\r\n\r\n<p>- Nghi&ecirc;n cứu c&ocirc;ng nghệ v&agrave; ph&aacute;t triển sản phẩm.</p>', '<p>- Đ&atilde; tốt nghiệp chuy&ecirc;n ng&agrave;nh CNTT &ndash; phần mềm.</p>\r\n\r\n<p>- C&oacute; kinh nghiệm từ 1 năm trở l&ecirc;n lập tr&igrave;nh Backend</p>\r\n\r\n<p>- C&oacute; kiến thức về 1 ng&ocirc;n ngữ Backend (ưu ti&ecirc;n: Golang, NodeJS)</p>\r\n\r\n<p>- C&oacute; kiến thức về c&aacute;c loại Database</p>\r\n\r\n<p>- Tư duy tốt, c&oacute; khả năng ph&acirc;n t&iacute;ch v&agrave; giải quyết vấn đề</p>', '<p>- Được tham gia v&agrave;o c&aacute;c buổi đ&agrave;o tạo nội bộ, chia sẻ kinh nghiệm của c&ocirc;ng ty.</p>\r\n\r\n<p>- M&ocirc;i trường l&agrave;m việc năng động, đồng nghiệp trẻ trung, th&acirc;n thiện;</p>\r\n\r\n<p>- Được hưởng đầy đủ chế độ BHXH, BHYT, BHTN.</p>\r\n\r\n<p>- Nghỉ ph&eacute;p h&agrave;ng năm: 12 ng&agrave;y/năm, tăng th&ecirc;m 1 ng&agrave;y với 3 năm l&agrave;m việc;</p>\r\n\r\n<p>- C&aacute;c sự kiện nội bộ: Hoạt động gắn kết, Team Building, Sinh nhật c&ocirc;ng ty, Sharing Day h&agrave;ng qu&yacute;, Tiệc cuối năm&hellip;</p>', 1, '2022-06-22 03:40:16', '2022-06-22 02:48:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'developer'),
(3, 'employer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statisticapply`
--

CREATE TABLE `statisticapply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_id` int(11) NOT NULL,
  `quantity_apply` int(11) NOT NULL,
  `quantity_browsing` int(11) NOT NULL,
  `date_apply` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `statisticapply`
--

INSERT INTO `statisticapply` (`id`, `recruitment_id`, `quantity_apply`, `quantity_browsing`, `date_apply`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 3, '2022-06-18', '2022-06-18 02:54:41', '2022-06-21 03:17:35'),
(2, 1, 10, 2, '2022-06-20', '2022-06-20 02:54:48', '2022-06-23 16:14:20'),
(3, 1, 4, 2, '2022-06-21', '2022-06-21 02:54:51', '2022-06-14 03:42:45'),
(4, 1, 7, 3, '2022-06-22', '2022-06-22 02:54:54', NULL),
(5, 1, 5, 2, '2022-06-23', '2022-06-23 03:16:48', '2022-06-14 03:17:29'),
(7, 9, 1, 0, '2022-06-21', '2022-06-21 03:21:50', '2022-06-14 03:21:50'),
(9, 8, 9, 4, '2022-06-22', '2022-06-22 02:36:42', '2022-06-15 02:36:42'),
(10, 10, 7, 5, '2022-06-23', '2022-06-23 02:49:27', '2022-06-15 02:49:27'),
(11, 11, 2, 0, '2022-06-23', '2022-06-23 10:00:19', '2022-06-18 10:02:35'),
(12, 2, 2, 1, '2022-06-24', '2022-06-24 03:09:01', '2022-06-24 02:36:33'),
(13, 8, 1, 0, '2022-06-23', '2022-06-23 03:37:14', '2022-06-21 03:37:14'),
(14, 1, 5, 3, '2022-06-23', '2022-06-23 15:07:49', '2022-06-23 15:59:22'),
(15, 2, 1, 0, '2022-06-23', '2022-06-23 15:33:09', '2022-06-23 15:33:09'),
(16, 1, 2, 1, '2022-06-24', '2022-06-24 02:52:53', '2022-06-24 03:37:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `account_type`, `status`, `remember_token`, `company`, `website`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Võ Văn Thành', 'avatar73.jpg', 'vothanh1320@gmail.com', NULL, '$2y$10$pq3t.IUPg9IsvBnt3UNuTerlfTPUNlE9HEPQAzij3qvM9n4iBrwSm', 2, 1, NULL, NULL, NULL, '0774794604', NULL, '2022-05-02 03:02:50', '2022-06-16 15:17:55'),
(2, 'Võ Văn Đạt', 'avatar52.jpg', 'vodat1320@gmail.com', NULL, '$2y$10$.ccjD4tbMEbrBE9NSq0tquvsX0G088SgW4Tn/oYxwZVQruj8P.S2S', 2, 0, NULL, NULL, NULL, '0908751304', NULL, '2022-05-02 19:48:44', '2022-06-24 03:39:09'),
(5, 'Vũ Anh Khoa', 'neolab64.png', 'neolab@gmail.com', NULL, '$2y$10$St9c9CSHiIRU0d/b7tweDeuNCHNaAkB8XUYn5YQwHnpXNQoaaXfW.', 3, 1, NULL, 'Neolab VietNam', 'https://neo-lab.vn/', '02363539292', '344 Đường 2 Tháng 9, Hoà Cường Bắc, Hải Châu, Đà Nẵng', '2022-05-10 02:48:49', '2022-06-16 04:36:09'),
(6, 'Nguyễn Quốc Sử', 'cmc65.jpg', 'cmc@gmail.com', NULL, '$2y$10$qX0zHXJTQGoufQgcvl3Ec./E15G4YuF8cbgSJ4PqgorJZxektGsZq', 3, 1, NULL, 'CMC Techlonogy', 'https://cmcts.com.vn/', '02437958686', 'tầng 8 tòa nhà Thành Lợi II, số 1 Lê Đình Lý, quận Thanh Khê Đà Nẵng', '2022-05-11 01:14:52', '2022-06-23 16:35:24'),
(7, 'Trần Quốc Tuấn', 'ubisoft82.png', 'ubisoft@gmail.com', NULL, '$2y$10$i9LPD.NZsr.IMbadCGbKAOSiCvGZLfPRnMgNyGZCAFLXluHds4x4m', 3, 1, NULL, 'Ubisoft Danang', 'https://www.ubisoft.com/en-us/company/careers/locations/da-nang', '0774794604', 'K159/76 Phó Đức Chính', '2022-05-12 01:17:41', '2022-06-13 03:01:16'),
(8, 'Lê Duy Linh', 'techzen83.png', 'techzen@gmail.com', NULL, '$2y$10$6ZRJ8IQauNArLNvQVqyLiuxXtI3Ib6OaZWkvRW8XjM33NmzHJFs4S', 3, 1, NULL, 'TECHZEN', 'http://www.techzen.net.cn/en/', '0774794604', 'Tầng 10, công viên phần mềm Đà Nẵng, 02 Quang Trung, Phường Thạch Thang, Quận Hải Châu, Thành phố Đà Nẵng.', '2022-05-25 01:31:26', '2022-06-23 16:35:29'),
(9, 'Nguyễn Hữu Nhật Huy', 'lvtstart51.png', 'lvtstart@gmail.com', NULL, '$2y$10$p.iUMjLqgU.IeSYCW5zLpuzokxzdcG3gmOEZS71tf8PWz5EkGWaP.', 3, 1, NULL, 'LVT STAR', 'https://www.supremetech.vn/', '02363626989', 'Tầng 3, Tòa nhà ATM, 165 Võ Như Hưng, Phường Mỹ An, Quận Ngũ Hành Sơn, Đà Nẵng.', '2022-05-25 01:35:38', '2022-06-23 16:35:30'),
(10, 'Nguyễn Phú Thứ', 'em&ai57.png', 'contact@emandai.com', NULL, '$2y$10$ZIxsfq0I.E3XfFhFw.RSUOIKwlsX90gr4kzoYuvYDv8gJH6skvZH6', 3, 1, NULL, 'EM&AI', 'https://emandai.net/', '0903533725', 'Tầng 7, Tòa nhà Đường Việt, 30 Nguyễn Hữu Thọ, Hòa Thuận Tây, Hải Châu, Đà Nẵng', '2022-05-25 02:00:40', '2022-06-24 03:43:30'),
(11, 'Trần Tiến Đạt', 'paracel91.png', 'info@paracelsoft.com', NULL, '$2y$10$eM5mYvFHTA4IwxWzFFziDOO2tV5S.YTuuv4k.N9vi2ULsNOh286Hi', 3, 1, NULL, 'Paracel Technology', 'https://paraceltech.com/vi/', '0774794604', 'Tầng 3, Toà Nhà Thuận Nhĩ, Lô 15B3.1 Đường Bùi Tá Hán, Phường Khuê Mỹ, Quận Ngũ Hành Sơn, Thành Phố Đà Nẵng', '2022-05-25 09:30:00', '2022-06-24 03:43:31'),
(12, 'admin', 'logo-black.png', 'admin@gmail.com', NULL, '$2a$10$4iZha5ph1FdTRq0uDBe4o.NLZ.mTlOIV1H9KG3sKaarCyhnYqXNlO', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Phạm Trung Đông', NULL, 'dongpham@gmail.com', NULL, '$2y$10$V.jASp1o3Lktnhn5igXd/.I.ipqS8rL2.MddI0fSTd9pd203agf3a', 2, 1, NULL, 'bf', 's', '0919758452', 'e', '2022-06-01 04:24:03', '2022-06-24 03:37:39'),
(33, 'Phạm Văn Nghĩa', NULL, 'nghiapham12872@gmail', NULL, '$2y$10$Zv9Du9iVybQ6nTQLKV9A0e.qlde6t8LLCR8FRoPG4g5qXdisHnNcC', 2, 1, NULL, 'fse', 'fea', '0724487534', 'K159/76 Phó Đức Chính', '2022-06-03 15:13:34', '2022-06-24 03:37:41'),
(34, 'Phạm Phú Lĩnh', NULL, 'linh@gmail.com', NULL, '$2y$10$uaBAhYp9u3VwYzh5DKpbP.g1sdt88AuKz5FAjGGT1YDSuBBXTVKyi', 2, 1, NULL, NULL, NULL, '0983672584', NULL, '2022-06-06 02:31:02', '2022-06-11 09:24:44'),
(35, 'Trịnh Bảo Hoàng', NULL, 'hoangbt@gmail.com', NULL, '$2y$10$avLf4JM1/3T1.yPa6gUMauvlOGYuEbpjdJbQe9jYjNYFx/bkOZU.S', 2, 1, NULL, NULL, NULL, '0972858754', NULL, '2022-06-06 02:31:52', '2022-06-11 09:24:44'),
(36, 'Trần Xuân Thịnh', NULL, 'thinhtr@gmail.com', NULL, '$2y$10$bxzT72Ut7Fo5CdnaJz.rHu8PgBZK4srLDq.Hh67KShe2LqVEkYAB6', 2, 1, NULL, NULL, NULL, '0989126854', NULL, '2022-06-06 02:32:33', '2022-06-11 09:24:45'),
(37, 'Nguyễn Anh Quân', NULL, 'anhquannguyen@gmail.com', NULL, '$2y$10$qC9ePP9eAHcMR2f6MxgLWebGJW3FoKgd.EEzqlN8ZqgBxwR3kcFYC', 2, 1, NULL, NULL, NULL, '0906889184', NULL, '2022-06-06 02:33:12', '2022-06-11 09:24:47');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apply_list`
--
ALTER TABLE `apply_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_id` (`recruitment_id`);

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `keywordkills`
--
ALTER TABLE `keywordkills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statisticapply`
--
ALTER TABLE `statisticapply`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apply_list`
--
ALTER TABLE `apply_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `experience`
--
ALTER TABLE `experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `keywordkills`
--
ALTER TABLE `keywordkills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `statisticapply`
--
ALTER TABLE `statisticapply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
