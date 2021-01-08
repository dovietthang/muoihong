-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2020 lúc 03:50 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `muoihong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `check_cate` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `id_menu`, `check_cate`, `active`, `created_at`, `updated_at`) VALUES
(16, '11111111111111111111111111111111', 0, 'product', 1, '2019-12-25 23:52:59', '2019-12-26 00:02:27'),
(17, 'scsacsa', 0, NULL, 1, '2019-12-25 23:53:38', '2019-12-25 23:53:38'),
(18, '99999999', 0, NULL, 1, '2019-12-25 23:55:11', '2019-12-25 23:55:11'),
(19, 'rrvrvrtbtrb', 0, 'product', 1, '2020-01-05 20:34:11', '2020-01-05 20:34:11'),
(20, 'èerrvreve', 0, 'create', 1, '2020-01-05 20:34:41', '2020-01-05 20:34:41'),
(21, 'vrever', 0, 'post', 1, '2020-01-05 20:37:33', '2020-01-05 20:37:33'),
(22, 'rrrrrrrrrrrr3', 0, 'product', 1, '2020-01-05 20:37:51', '2020-01-05 20:38:00'),
(23, 'vvvv111', 0, 'post', 1, '2020-01-05 20:38:11', '2020-01-05 20:38:18'),
(24, 'ưdsca', 2, 'post', 1, '2020-01-06 02:13:31', '2020-01-06 02:13:39'),
(25, 'ok', 4, 'post', 1, '2020-01-07 00:27:08', '2020-01-07 00:27:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `keys` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `keys`, `value`, `created_at`, `updated_at`) VALUES
(1, 'namesite', 'okhttt', NULL, NULL),
(2, 'F', '10', NULL, NULL),
(3, 'F1', '5', NULL, NULL),
(4, 'F2', '33', NULL, NULL),
(5, 'F3', '3', NULL, NULL),
(6, 'F4', '2', NULL, NULL),
(10, 'map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.22744207057!2d105.84616728597273!3d21.030410754414277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abbf59d8f429%3A0x7830a3dfd6e566a1!2zSG_DoG4gS2nhur9tLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1578305271802!5m2!1svi!2s\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', NULL, NULL),
(11, 'address', '283A Nguyễn Bình, Ấp 2, Xã Phú Xuân, Huyện Nhà Bè, TP. Hồ Chí Minh', NULL, NULL),
(12, 'sdt', '12345678', NULL, NULL),
(13, 'email', 'demo@gmail.com', NULL, NULL),
(14, 'footer', 'Copyright © 2019 BAN MUOI- Thiết kế Web : EVOTEK Co., Ltd ---ok', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(23) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `ip`, `full_name`, `email`, `sdt`, `note`, `address`, `date`, `active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'sấc', 'vietdong123@gmail.com', 987654321, '1123', NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'sấc', 'vietdong123@gmail.com', 987654321, '1123', NULL, NULL, NULL, NULL, NULL),
(3, '1', 'sấc', 'vietdong123@gmail.com', 987654321, '1123', NULL, NULL, NULL, NULL, NULL),
(4, '127.0.0.1', 'sấc', 'vietdong123@gmail.com', 987654321, '1123', NULL, NULL, NULL, NULL, NULL),
(5, '127.0.0.1', 'qxsac', 'vietdong123@gmail.com', 987654321, 'các', 'ádsdw', NULL, NULL, NULL, NULL),
(6, '127.0.0.1', 'dongdv a', 'vietdong123@gmail.com', 987654321, '11', 'ádsdw', NULL, NULL, NULL, NULL),
(8, '127.0.0.1', 'dongdv a', 'vietdong123@gmail.com', 987654321, 'sc', 'ádsdw', '07/01/2020', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stk` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RefID` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`id`, `name`, `password`, `cmnd`, `email`, `full_name`, `sdt`, `address`, `back_name`, `stk`, `gender`, `birthday`, `RefID`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'dongdv a', '$2y$10$s36vf1RR3N4517o1zZa8q.W2BDc6EI2SdpoW6FGtHwaqU4Dasus3S', '2', 'admin@gmail.com', 'dongdv a', 987654321, 'ádsdw', 'a', 1234122, 'Nam', '12344', 0, 'pCfc8VCYVeO63HvLPH7ikZ37KMUor0mDpVhtDjT3ved5lI9JKUFSZzwcYNIZ', 1, '2019-12-26 02:02:58', '2019-12-31 00:53:01'),
(2, 'scascs', '1234', '3', 'admin@gmail.com', 'dongdv 1', 11111, 'ádsdw', 'a', 1111, 'Nam', '1w1', 111111, NULL, 1, '2019-12-26 02:40:50', '2019-12-26 02:40:50'),
(3, 'scascs', '1234', '9', 'admin@gmail.com', 'dongdv 2', 11111, 'ádsdw', 'a', 1111, 'Nam', '1w1', 2, NULL, 1, '2019-12-26 02:40:50', '2019-12-26 02:40:50'),
(4, 'xsasacsa', '1234', '111111', 'admin@gmail.com', 'dongdv 3', 987654321, 'ádsdw', 'a', 1234, 'Nam', '12/10/2019', 9, NULL, 0, '2019-12-26 03:58:16', '2019-12-26 03:58:16'),
(5, 'cccccccc', '$2y$10$fGK8ThmwFJRXdHfSZIv.4.jabAc3uxIDnhJHyn37TeOryGIOLRTEe', '1234567', 'admin@gmail.com', '123', 123, '123', '123', 123, 'Nam', '01/08/2020', 123, NULL, NULL, '2020-01-05 21:11:49', '2020-01-05 21:11:49'),
(6, 'dd', '$2y$10$QMtjXuU.km3GiP4nDzLx4.SMmphCchHBdVu1WSlQK5DkfbjlHkKOu', '123', 'admin@gmail.com', '123', 1111, '111', '1111', 1111, 'Nam', '01/08/2020', 123, NULL, NULL, '2020-01-05 21:20:29', '2020-01-05 21:20:29'),
(8, '111111', '$2y$10$JrdGDQM2R8ozKOZ0o16NROdWrKZ6DV7TU57TiSwa/MO64El4.fhbK', '111', 'admin1@gmail.com111', '111', 111, '11', '11', 11, 'Nam', '01/08/2020', 111, NULL, NULL, '2020-01-05 21:36:36', '2020-01-05 21:36:36'),
(9, '111', '$2y$10$Tu8HEsgNMqa1Xfmak9AKMu5vwqHad/MxGBP7XWbu/PaaqTSUUTDJC', '111', 'admin123@gmail.com', '111', 11, '11', '11', 11, '0', '01/08/2020', NULL, NULL, NULL, '2020-01-05 21:38:29', '2020-01-05 21:38:29'),
(10, 'dongdv a', '$2y$10$04l2.e5xkuHexzH.v42vJemEa1ogfQbnEQttysERSrSc0su4z9p6.', 'ádsdw', 'admin2222@gmail.com', 'dongdv a', 987654321, 'ádsdw', 'a', 11, 'Nam', '01/08/2020', 11, NULL, NULL, '2020-01-05 21:43:22', '2020-01-05 21:43:22'),
(11, '111', '$2y$10$y03EYtzhRjwcwPJ8FFAJ1.c3OHM6.SI0goZxlRphoyuPGMEkLCWLG', '111', 'admin11@gmail.com', '1', 1, '1', '1', 1, 'Nam', '1', NULL, NULL, NULL, '2020-01-05 21:57:46', '2020-01-05 21:57:46'),
(13, 'admin@gmail.com', '$2y$10$uh9Xubo7iAx5Kmlx4rX.i.edIDSVfIjSDzke79y.EQW96eoMlYk4u', '1', '3', '4', 5, '6', '7', 8, 'Nam', NULL, 2, NULL, NULL, '2020-01-06 00:12:58', '2020-01-06 00:12:58'),
(14, 'admin@gmail.com', '$2y$10$..qgMGUDNnfIxVcz0NfJc.OekQNPmmTh8Vo4Er/4cbIhjnfzBH3RK', '998', '1', '1', 1, '1', '1', 123445555, '0', NULL, 998, NULL, NULL, '2020-01-06 01:05:24', '2020-01-06 01:05:24'),
(15, 'admin@gmail.com', '$2y$10$Z/JhGLYsq4JCUHzIkDNB6Of2vOHKGsFVOhavrifweh7gaWHxp44mO', '1223', 'vietdong123@gmail.com', 'dongdv a', 987654321, 'ádsdw', 'a', 12121, '0', NULL, 1111, NULL, NULL, '2020-01-06 01:08:14', '2020-01-06 01:08:14'),
(16, 'admin@gmail.com', '$2y$10$UhbjWKsknALB7Q//DY1BmuBbnsfCj2caerK7a5x/qQJg3BcdxFjpa', '111112121', '11', '11', 11, '11', '11', 111212, '0', NULL, 11, NULL, NULL, '2020-01-06 07:55:17', '2020-01-06 07:55:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `slug`) VALUES
(2, 'giới thiệu', 'gioi-thieu'),
(3, 'chia sẻ khách hàng', 'chia-se-khach-hang'),
(4, 'hợp tác kinh doanh', 'hop-tac-kinh-doanh'),
(5, 'thư viện sức khỏe', 'thu-vien-suc-khoe'),
(6, 'tin tức', 'tin-tuc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`id`, `id_order`, `id_product`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, NULL, NULL),
(2, 2, 2, 2, NULL, NULL),
(3, 2, 1, 3, NULL, NULL),
(4, 4, 2, 2, NULL, NULL),
(5, 5, 1, 3, NULL, NULL),
(6, 6, 2, 2, NULL, NULL),
(7, 7, 1, 3, NULL, NULL),
(8, 7, 2, 2, NULL, NULL),
(9, 16, 1, 3, NULL, NULL),
(10, 16, 2, 2, NULL, NULL),
(11, 17, 1, 3, NULL, NULL),
(12, 17, 2, 2, NULL, NULL),
(13, 18, 1, 3, NULL, NULL),
(14, 18, 2, 2, NULL, NULL),
(15, 19, 1, 4, NULL, NULL),
(16, 19, 2, 2, NULL, NULL),
(17, 20, 1, 6, NULL, NULL),
(18, 20, 2, 4, NULL, NULL),
(19, 20, 3, 1, NULL, NULL),
(20, 21, 1, 7, NULL, NULL),
(21, 21, 2, 4, NULL, NULL),
(22, 21, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `date` varchar(23) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `id_cate`, `name`, `slug`, `description`, `image`, `active`, `date`, `created_at`, `updated_at`) VALUES
(2, 24, 'Donec sollicitudin molestie malesuada', 'donec-sollicitudin-molestie-malesuada', '<p>fewfeDonec sollicitudin molestie malesuada</p>', '1578282924cfe55f5b4e62b73cee73.jpg', 1, '07/01/2020', '2020-01-05 20:55:24', '2020-01-06 21:06:07'),
(3, 24, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'vestibulum-ante-ipsum-primis-in-faucibus-orci-luctus-et-ultrices-posuere-cubilia-curae', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-13px; position:absolute; top:-6px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>', '1578328172bg.jpg', 1, '07/01/2020', '2020-01-06 09:29:32', '2020-01-06 21:06:13'),
(4, 21, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'vestibulum-ante-ipsum-primis-in-faucibus-orci-luctus-et-ultrices-posuere-cubilia-curae', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>', '1578328180banner.jpg', 1, '07/01/2020', '2020-01-06 09:29:40', '2020-01-06 21:04:48'),
(5, 21, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'vestibulum-ante-ipsum-primis-in-faucibus-orci-luctus-et-ultrices-posuere-cubilia-curae', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>', '1578328188banner (2).jpg', 1, NULL, '2020-01-06 09:29:48', '2020-01-06 09:29:48'),
(6, 24, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'vestibulum-ante-ipsum-primis-in-faucibus-orci-luctus-et-ultrices-posuere-cubilia-curae', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>', '1578328197banner.jpg', 1, NULL, '2020-01-06 09:29:57', '2020-01-06 09:29:57'),
(7, 24, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 'vestibulum-ante-ipsum-primis-in-faucibus-orci-luctus-et-ultrices-posuere-cubilia-curae', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>', '1578328204201606011705444221_noi-ve-dn.jpg', 1, NULL, '2020-01-06 09:30:04', '2020-01-06 09:30:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `ma_sp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `id_cate`, `description`, `price`, `ma_sp`, `quantity`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'demo có', 'demo-co', 16, '<p>sấcsssssssssssssssssss</p>', 111, '123', 11111, '1577439735201606011705444221_noi-ve-dn.jpg', 1, NULL, '2020-01-06 01:24:03'),
(2, 'csacsa', NULL, 16, 'csacsa', 1111, 'scsa', 11111, '1577439825bg.jpg', 1, '2019-12-26 01:19:51', '2019-12-27 02:43:45'),
(3, 'dongdv a', NULL, NULL, 'dvds', 1111, 'cacsa', 111, '1577439834banner (2).jpg', 1, '2019-12-27 02:29:35', '2019-12-27 02:43:54'),
(4, 'csacs', NULL, NULL, 'sấc', 111, 'câcs', 11111, '1577439735201606011705444221_noi-ve-dn.jpg', 1, NULL, '2019-12-27 02:42:15'),
(5, 'csacsa', NULL, NULL, 'csacsa', 1111, 'scsa', 11111, '1577439825bg.jpg', 1, '2019-12-26 01:19:51', '2019-12-27 02:43:45'),
(6, 'dongdv a', NULL, NULL, 'dvds', 1111, 'cacsa', 111, '1577439834banner (2).jpg', 1, '2019-12-27 02:29:35', '2019-12-27 02:43:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `code_order` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_order` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shop_order`
--

INSERT INTO `shop_order` (`id`, `member_id`, `price`, `code_order`, `date_order`, `address`, `note`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 9, NULL, NULL, NULL, NULL, 1, '2019-12-30 20:47:31', '2019-12-30 20:47:31'),
(2, 2, 9, NULL, NULL, NULL, NULL, 1, '2019-12-30 20:55:54', '2019-12-30 20:55:54'),
(3, 5, 9, NULL, NULL, NULL, NULL, 1, '2019-12-30 20:57:02', '2019-12-30 20:57:02'),
(5, 3, 9, 'R7LJK2', NULL, NULL, NULL, 1, '2019-12-30 20:59:29', '2019-12-30 20:59:29'),
(6, 3, 9, 'DEFG4J', NULL, NULL, NULL, 1, '2019-12-30 21:00:51', '2019-12-30 21:00:51'),
(8, 2, 9, 'ZDZNUB', NULL, NULL, NULL, NULL, '2019-12-30 21:01:41', '2019-12-30 21:01:41'),
(9, 13, 9, 'OY1EHV', NULL, NULL, NULL, NULL, '2019-12-30 21:02:07', '2019-12-30 21:02:07'),
(10, 4, 9, 'A46RP5', NULL, NULL, NULL, NULL, '2019-12-30 21:02:41', '2019-12-30 21:02:41'),
(11, 4, 9, 'XVTHVX', NULL, NULL, NULL, NULL, '2019-12-30 21:03:28', '2019-12-30 21:03:28'),
(12, 13, 9, 'MP4FGV', NULL, NULL, NULL, NULL, '2019-12-30 21:06:47', '2019-12-30 21:06:47'),
(13, 1, 9, 'KVOELS', NULL, 'hà nội - hà nội - hà nội', 'ưqdwq', NULL, '2019-12-30 21:08:21', '2019-12-30 21:08:21'),
(14, 1, 9, 'RD83KS', '2019-12-31 04:12:08', 'hà nội - ưdqw - hàm nghi', 'ưqdwq', NULL, '2019-12-30 21:12:08', '2019-12-30 21:12:08'),
(15, 1, 9, 'D5V29D', '2019-12-31', 'hà nội - ưdqw - hàm nghi', 'ưqdwq', NULL, '2019-12-30 21:13:59', '2019-12-30 21:13:59'),
(16, 1, 9, 'VBOFRS', '31/12/2019', 'hà nội - ưdqw - hàm nghi', 'ưqdwq', NULL, '2019-12-30 21:14:30', '2019-12-30 21:14:30'),
(17, 1, 9, 'QKAFMF', '31/12/2019', 'hà nội - ưdqw - hàm nghi', 'ưqdwq', NULL, '2019-12-30 21:15:13', '2019-12-30 21:15:13'),
(18, 1, 9, 'MF38CU', '31/12/2019', 'hà nội - ưdqw - hàm nghi', 'ưqdwq', NULL, '2019-12-30 21:24:27', '2019-12-30 21:24:27'),
(19, 1, 9, 'XYZSEG', '31/12/2019', 'hà nội - qqqqqqq - hàm nghi', NULL, NULL, '2019-12-30 21:25:15', '2019-12-30 21:25:15'),
(20, 1, 9, 'XRXBXX', '31/12/2019', 'hà nội - 1111 - hàm nghi', '111', NULL, '2019-12-30 21:31:00', '2019-12-30 21:31:00'),
(21, 1, 9, '7OUDFF', '31/12/2019', 'hà nội - 11 - hàm nghi', '11111111', NULL, '2019-12-30 21:49:40', '2019-12-30 21:49:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dongdv', 'admin@gmail.com', NULL, '$2a$10$cNfJNDIp0ICi3hAn3a4ozOCwGWY.GPNXOPaVAH/y4M/sRyoP6TrDq', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop_order`
--
ALTER TABLE `shop_order`
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
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
