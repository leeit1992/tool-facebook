-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2017 lúc 09:15 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project10`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_banks`
--

CREATE TABLE `avt_banks` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_buy`
--

CREATE TABLE `avt_buy` (
  `id` int(11) NOT NULL,
  `buy_fb` varchar(255) DEFAULT NULL,
  `buy_name` varchar(255) DEFAULT NULL,
  `buy_packet` int(11) DEFAULT NULL,
  `buy_speed` int(11) DEFAULT NULL,
  `buy_date` int(11) DEFAULT NULL,
  `buy_comment` text,
  `buy_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_servicemeta`
--

CREATE TABLE `avt_servicemeta` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_servicemeta`
--

INSERT INTO `avt_servicemeta` (`id`, `service_id`, `meta_key`, `meta_value`) VALUES
(51, 27, 'like_number', '100'),
(52, 27, 'like_post', '100'),
(53, 28, 'like_number', '100'),
(54, 28, 'like_post', '100'),
(55, 29, 'like_number', '100'),
(56, 29, 'like_post', '100'),
(57, 30, 'like_number', '100'),
(58, 30, 'like_post', '100'),
(59, 31, 'like_number', '100'),
(60, 31, 'like_post', '100'),
(61, 32, 'comment_number', '100'),
(62, 32, 'comment_post', '100'),
(63, 33, 'comment_number', '100'),
(64, 33, 'comment_post', '100'),
(65, 34, 'comment_number', '100'),
(66, 34, 'comment_post', '100'),
(67, 35, 'comment_number', '100'),
(68, 35, 'comment_post', '100');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_services`
--

CREATE TABLE `avt_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_price` varchar(255) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_services`
--

INSERT INTO `avt_services` (`id`, `service_name`, `service_price`, `service_type`) VALUES
(27, 'L-100', '30000', 'like'),
(28, 'L-200', '50000', 'like'),
(29, 'L-300', '75000', 'like'),
(30, 'L-400', '100000', 'like'),
(31, 'L-500', '120000', 'like'),
(32, 'C-100', '30000', 'comment'),
(33, 'C-200', '50000', 'comment'),
(34, 'C-300', '75000', 'comment'),
(35, 'C-400', '100000', 'comment');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_tokens`
--

CREATE TABLE `avt_tokens` (
  `id` int(11) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `token` text,
  `token_status` tinyint(2) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_tokens`
--

INSERT INTO `avt_tokens` (`id`, `account`, `password`, `fb_id`, `token`, `token_status`, `gender`, `birthday`) VALUES
(5, 'leeit.1992@gmail.com', 'letrungha1992', '100008173780979', 'EAAAAAYsX7TsBAJ5v9twL4zqnTP7EZAbW3heRe18qHF5ixn9HRLlg877ffvwJSdj5e7XZC4iHFhJ0DJkMdMnMdXjUSTrsJzPxB0cySOXflG9qmSYk9ZCsxhIl2XkXsA2Iy3JfZBrRcN9UGBoAmWBkhJQomZBKFuZCr6mXl3lILoh0JaAxSvZBRYZAqZCxU24Af9V8UuwqzyARZAZCYcAJLHjDJC1', 1, 'male', '06/23/1992'),
(6, 'ducngoc110', 'tinhphaiks93', '100008234730718', 'EAAAAAYsX7TsBAOiRIZBRUZA6XMgt9VdhCOBMFoNnRAX7ZB48uz7kVI5DRzLgzFaaybx0qGhRJ4tOFisd2yGFgi3mrGFv2vZCX01utj3SsTRlZC3ZBuUIW2jp7ntwEClRSjoqZAgWZA4wP8RFyZBwdMRE0CeciGlqfKTBoPA5lwIyoRbcznbIhYzZAwy92nnpBjIxJkpo2mUOaWpefZBQ2CKnDZB6', 1, 'male', '10/01/1993'),
(7, 'jaykiu1991@gmail.com', 'ngankhanh16', '100003960373185', 'EAAAAAYsX7TsBAGZCFX7VWySUQBY13b3LSYDLJLW7HLTv6wXRDxKJhTdn3SgjgOnMuWxTP6GR0NnFZCbvckRxR1Xwe50pHe7cgdgXfO7wc4C3ZAhmD0SlfzMmVEYaryoVhPl7XbJlWCxZCjfwDe9xkbu4GdLMt4mMAXJiOJVjq06nxMDmHZBx1CI6tHrmMERVRpNSuHlJi1R2Wyr3n9kFI', 1, 'male', '03/06/1991'),
(8, 'urmvytygb@emltmp.com', 'Droipmmail12', '100010306488152', 'EAAAAAYsX7TsBANwuaIHCBYZB04saOYBEt1Wv3ym0SF22d8jLnHLMSITtAu47mfwIk4eX72sLACJNZA6TgEF3UGMCEmZCBcN7LlEgvKtBt2VMEdgj7ajeFhgn6gvlAFnMQT6Nd7ZANSNsE4dbktoRDVazZBxgbMZBNgzZAg6J1alWzwejmMFz0F3Fgq3P2kUDmFIjcl7w1c7apU1ZApxPZAxGX', 1, 'female', '07/04/1987'),
(9, 'shorwdfe@emlhub.com', 'Droipmmail12', '100012510492396', 'EAAAAAYsX7TsBAJMSHjsXPIfVuRJeFlYa1ZCoBrK3ZAM2nW6HbsrRLghLWNzl2odbu1ZCj4KV6JBLXIK0h6XPLyewdxC3Y3w5pLZBh5INisdZCOxEsP7z5V9hjvCatEBdk2gDZAvzxzvtZCxRHrMfEPjSBJ7sY9f8SpBuzM8MLkAlZBUJoh7ptOk2xkvehAuG9cmZAF0d7o5XnQaHAHkUl2RZCo', 1, 'female', '11/01/1968');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_usermeta`
--

CREATE TABLE `avt_usermeta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_usermeta`
--

INSERT INTO `avt_usermeta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'user_birthday', ''),
(2, 1, 'user_address', ''),
(3, 1, 'user_moreinfo', ''),
(4, 1, 'user_phone', ''),
(5, 1, 'user_social', '{\"fb\":\"\",\"gplus\":\"\"}'),
(6, 1, 'user_role', 'admin'),
(13, 3, 'user_birthday', ''),
(14, 3, 'user_address', ''),
(15, 3, 'user_moreinfo', ''),
(16, 3, 'user_phone', ''),
(17, 3, 'user_social', '{\"fb\":\"\",\"gplus\":\"\"}'),
(18, 3, 'user_role', 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `avt_users`
--

CREATE TABLE `avt_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_registered` datetime DEFAULT NULL,
  `user_status` tinyint(2) DEFAULT NULL,
  `user_display_name` varchar(255) DEFAULT NULL,
  `user_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_users`
--

INSERT INTO `avt_users` (`id`, `user_name`, `user_password`, `user_email`, `user_registered`, `user_status`, `user_display_name`, `user_money`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2017-11-02 09:15:22', 1, 'Admin', 100000000),
(3, 'NOWAY', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', '2017-11-02 09:14:20', 1, 'NOWAY', 1000000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `avt_banks`
--
ALTER TABLE `avt_banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_buy`
--
ALTER TABLE `avt_buy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_servicemeta`
--
ALTER TABLE `avt_servicemeta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_services`
--
ALTER TABLE `avt_services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_tokens`
--
ALTER TABLE `avt_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_usermeta`
--
ALTER TABLE `avt_usermeta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `avt_users`
--
ALTER TABLE `avt_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `avt_banks`
--
ALTER TABLE `avt_banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `avt_buy`
--
ALTER TABLE `avt_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `avt_servicemeta`
--
ALTER TABLE `avt_servicemeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT cho bảng `avt_services`
--
ALTER TABLE `avt_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT cho bảng `avt_tokens`
--
ALTER TABLE `avt_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `avt_usermeta`
--
ALTER TABLE `avt_usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `avt_users`
--
ALTER TABLE `avt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
