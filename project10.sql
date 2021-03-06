-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2017 lúc 11:04 AM
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
  `buy_comment` text CHARACTER SET utf8,
  `buy_user` int(11) DEFAULT NULL,
  `buy_used_day` date DEFAULT NULL,
  `buy_run_day` int(11) DEFAULT NULL,
  `buy_type` varchar(255) DEFAULT NULL,
  `buy_posts` text,
  `buy_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `avt_buy`
--

INSERT INTO `avt_buy` (`id`, `buy_fb`, `buy_name`, `buy_packet`, `buy_speed`, `buy_date`, `buy_comment`, `buy_user`, `buy_used_day`, `buy_run_day`, `buy_type`, `buy_posts`, `buy_created`) VALUES
(11, '123123123', 'Ha', 44, 1, 1, '', 3, '2017-11-13', 1, 'auto', NULL, '2017-11-13 03:14:59'),
(12, '456456456', 'Duc', 47, 50, 1, '', 3, '2017-11-13', 1, 'auto', NULL, '2017-11-13 03:15:15'),
(13, '789789789', 'Ngoc', 44, 1, 1, '', 3, '2017-11-13', 1, 'auto', NULL, '2017-11-13 03:15:26'),
(14, '', '', 51, 1, 1, '', 3, '2017-11-13', 10, 'buff', NULL, '2017-11-13 05:37:28');

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
(88, 44, 'post_limit', '5'),
(89, 44, 'service_like', '10'),
(90, 44, 'service_comment', '15'),
(91, 45, 'post_limit', '5'),
(92, 45, 'service_like', '20'),
(93, 45, 'service_comment', '25'),
(94, 46, 'post_limit', '5'),
(95, 46, 'service_like', '30'),
(96, 46, 'service_comment', '35'),
(97, 47, 'like_number', '10'),
(98, 47, 'post_limit', '5'),
(99, 48, 'like_number', '20'),
(100, 48, 'post_limit', '25'),
(101, 49, 'comment_number', '10'),
(102, 49, 'post_limit', '5'),
(103, 50, 'comment_number', '20'),
(104, 50, 'post_limit', '5'),
(105, 51, 'like_number', '10'),
(106, 52, 'like_number', '20'),
(107, 53, 'share_number', '10');

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
(44, 'S-100', '10000', 'service'),
(45, 'S-200', '20000', 'service'),
(46, 'S-300', '30000', 'service'),
(47, 'L-100', '10000', 'like'),
(48, 'L-200', '20000', 'like'),
(49, 'C-100', '10000', 'comment'),
(50, 'C-200', '20000', 'comment'),
(51, 'AL-100', '10000', 'up_like'),
(52, 'AL-200', '20000', 'up_like'),
(53, 'SH-100', '10000', 'up_share');

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
(9, 'shorwdfe@emlhub.com', 'Droipmmail12', '100012510492396', 'EAAAAAYsX7TsBAJMSHjsXPIfVuRJeFlYa1ZCoBrK3ZAM2nW6HbsrRLghLWNzl2odbu1ZCj4KV6JBLXIK0h6XPLyewdxC3Y3w5pLZBh5INisdZCOxEsP7z5V9hjvCatEBdk2gDZAvzxzvtZCxRHrMfEPjSBJ7sY9f8SpBuzM8MLkAlZBUJoh7ptOk2xkvehAuG9cmZAF0d7o5XnQaHAHkUl2RZCo', 1, 'female', '11/01/1968'),
(10, 'majuwozeju@payperex2.com', 'XBw@536', '100022577500781', 'EAAAAAYsX7TsBAIvUH53c6RhitoIF1p6CSpFypb2C0AapKZCZBIP2rOyoSRTOhT4TbHUrFqvjZASnVicJ6omRGb4GBR2sZBhLqUsriq5TAeu1Rt5Uib1pithZCHf5cy9H5ELeLH7R4A9cwbfGQUCyPW04dlfpZALh0OWYfNu2doZAgMeKokoWixPUmmMECEuL5nFH2mL3dciLlfceY9vWdzIDzPpAl308s0ZD', 1, 'female', '01/01/1980'),
(11, 'cibin@tinoza.org', 'BtSs@35363', NULL, NULL, 2, NULL, NULL),
(12, 'giziruf@ether123.net', 'AKJsQ@81994', NULL, NULL, 2, NULL, NULL),
(13, 'jiyadogacu@axsup.net', 'AfCU@35363', '100022549094750', 'EAAAAAYsX7TsBAHeuZBQqSkiFJ6spUPZCzYcpYyZAwX6aFlBD8rOTo7Y8AYeZBDaGhPVRsKAZA4oIeClLN2NGDcvDSSOIINgOG7qpvtY8eNbMrz8hSaZBKqIiwuo6BLxQ5atICpAmfkDx5UZCQi0w1NFgHkxrd5iZBmhPMsFOJHibx4q7W1J1WsaklrwHEUdnoCNKN51cIdcgg7S4MjDa1KNKgOZArD3Owka7k4M4S9JnoFAZDZD', 1, 'female', '04/10/1983'),
(14, 'zigigep@tinoza.org', 'TeSZs@94682', NULL, NULL, 2, NULL, NULL),
(15, 'cupucaxage@datum2.com', 'Wwdl@50753', '100022569072148', 'EAAAAAYsX7TsBAHrGZB9fEZBwsxKPeTHTPptXVmSWjSs2fJBQpaayfvBrnd6ZCE4gvPrH4gKLbCku4qHjbO4GC1djSxGd046BsDBUzZBw5o8x0qPuivwToEh3b8ZAFRfnO84TWoBxaRtBL9TqEZA2Wh6rqfZC2p6i9VbRuN8ynwo5Ry582RGfXoFxj5E3kK05R0MNzZBV6cCKky0N57e0b2pIAhabACaqifMLa4Lq1UZBkdwZDZD', 1, 'female', '06/14/1985'),
(16, 'kutolu@averdov.com', 'SRBK@50753', NULL, NULL, 2, NULL, NULL),
(17, 'dute@asorent.com', 'WFmM@50753', NULL, NULL, 2, NULL, NULL),
(18, 'keganapuf@averdov.com', 'ZwKCZ@87795', '100022609146560', 'EAAAAAYsX7TsBANmmA23T61Eq94kNZBpHTF9ULK8Wc1ffSjBZAwMmFIZACsjNG3EyOWNqrXyW2wi1yLucOrlPmCdKvyi5ZBXPyIz2OIn6EGmTak2zDLAq5XRnbpfb1GuComZBoLZADZAMUIfFVFRWwMchZC0t5ZAYWgOwDtZAPBvkk5A0UD9Rx8HGAmHyyBnmuhReU7oqkraQysWnVYmLG9DwmpPrFvY9NHMM0ZD', 1, 'female', '10/23/1988'),
(19, 'hobozodi@axsup.net', 'PIgXr@71449', '100022582030523', 'EAAAAAYsX7TsBAOstZArQTVl57iZBLHskBQ3jZCf9sIk91ZBbgb8dXB3LllbbjEb4bBJx7J5QZA3h5EYWmCG875xVvv15uBiOfZBsPrKcYEmSMDicfAZCLk7DpZAKoJeZB6ZBY6Jnhy2H25u5Mu0ZBtxzhXLd3rg1BgfOfVMlXNrTve568rIH01nPNDrosjJtZAKFHTVy0HTZBcnZC8Tcxnb9SvYkghxcwLQ4BFtioZD', 1, 'female', '08/19/1987'),
(20, 'wunipo@zhorachu.com', 'LlUwy@87795', '100022631614026', 'EAAAAAYsX7TsBAFAaNNlMWNylmLA7junETblI21WZAklpQ47hJJotQFroW9xc1Qd3p4xylypnlYhcomtlisUJArt4ZAaQhtC4AZAmo3A7rkak3xIrFvaeIZAgZA8JNryhaICstB5KR7cQuZA1E4j7RUGzrxbQ8SkSM2hIAbMVPWnR4vHOImAGLQgm8kp9pt9WGAkqOZCKulZC2n0BbmZC2GZBXwZBzg7VtXOtWMZD', 1, 'female', '10/23/1988'),
(21, 'nomul@zhorachu.com', 'Ufnbt@71449', '100022601348056', 'EAAAAAYsX7TsBANZCagBgdn6htpAvKxMPyMyxa4hqz8OQRHXzn0B9viCema4PQAbsY5XbaubmWfUheZAzwJomnZCukF3PmZCIuofp5cNw2tjvGYIMYtzLxHO8Ee3cYng9RFJCY1RlNZCVmYKac2ZC5l7bZBGYu9ZAdcTqixPSKQvlN7cLKz1TTURTgwqlf9vmoaxEfORbHfJOZBT2uDTKT3IZBZAS2yjRxDJHQK3rgR2c3v5zQZDZD', 1, 'female', '08/19/1987'),
(22, 'desikaxato@axsup.net', 'RuIiJ@87795', '100022530286867', 'EAAAAAYsX7TsBAGjyboEwIAq0xmkAPJd0d5qXiFL0VxV079RZB4135kltjrwFaDfugRReUwvKjI1KChkZBn0eCfXqydnBea7Y9vsnHNcSF3GMOaG8LOZBINeq424BVAdvHG9tewXg67KBB1CUtEbLRzMVZAoEi2gEG9hSpZB1K0dqZB3ac5oZB97bBBHZAwnNV4r2cD7KTwxvszETQ8cO1qtppIp4EJfXqO4ZD', 1, 'female', '10/23/1988'),
(23, 'dahek@zhorachu.com', 'Uhfuc@74800', '100022506019689', 'EAAAAAYsX7TsBAKxKqiw6KfeGuFCutgoCHPsuUqVzDLIj09hQ1cFBKrqlyCrowpwSrZBZAPMmq9pFQxAuojbwLQgv0Q2TGPcXdTzZCHs4Drdqzszhpk4AYZCeTtVYVe4vZAHfssAMNLz9kwTkZAsX5DDK6IBncWOsuNVp9wvFoUh993JqC7f75tn1oRiZBatwgLEvfvJ3Kp9bFcATbQ4CMAaC9tEQPeCMHEZD', 1, 'female', '09/20/1987'),
(24, 'cenajevur@axsup.net', 'LPhmN@74800', '100022616405928', 'EAAAAAYsX7TsBAN1H3Ytbz4e8JKmaEKATi0vFbq1eZAAcVlGAoKcNUrnXeEatj7a5nAe4vY5ZA9FszhNqIZCrxo8pGZBvBBgMT7zlCuZCT2ziQEj5aB4s5X6569mV7EN9fxRZCpEStoZB8jdRLD441WebRVZAvqYZCaXFuPk2JBWdbqTZBbWq4WUmTgkXDMQcxJrCYpdft9hpw9LxHTjrPmABY0UTOxd26ui6tosUUQVB6cGgZDZD', 1, 'female', '09/20/1987'),
(25, 'hajuyir@asorent.com', 'HbIfo@97005', '100022486972908', 'EAAAAAYsX7TsBALlyuCrxGtfYbuQMEBK7iIy1s3anEg380TfNJPkk5zhVzhHmyUOUvkZA8pZAMZBWS1pjTZAxpeFz4stfmOL10ZAA1Ub9HcqSRfKij7wtMTm0VauQAkmVnAbXbeHdvHGpKqlVTwagzTmUMthIMgP81LZB3jJzdKg8WAI2tyfIYkZBTuy0NZAtTT4966WNvPFv4uh6pd4ihzgLBVbpH5va5QQU3E7AGjf07wZDZD', 1, 'female', '11/26/1989'),
(26, 'hidub@ethersports.org', 'BEeG@61160', NULL, NULL, 2, NULL, NULL),
(27, 'noheg@tinoza.org', 'YmYCe@97005', '100022605786617', 'EAAAAAYsX7TsBANrevf3zWQRJPCnpfyvpfERgeFGnfmrySJslMK9OpzqiEFDaGcWV5XZBFfyH6Rgl09kcgI3wVadKAcb3AxoT39aY4ROAR0HkA9iZAeqlNadEIL4CCZBRufCnaph16OfIMnqZBZB1lE9DTnWkanmekLXYJeQt9edgNkiWtczmZAqTRggZBDZAYrujLdopBtQkqifYHqyDKL8wxMLaMnb1a2C21i9GJCtNoQZDZD', 1, 'female', '11/26/1989'),
(28, 'majuwozeju@payperex2.com', 'XBw@536', '100022577500781', 'EAAAAAYsX7TsBAHOjE3klIll7CUxxy5ZCcVzY5ja6dhhTG1DGbG5oTPeQA9fV6Qh1xHNl8IWIxOd6ZB43lj2a6VZAR8nrtpClCLGZCyohlH4f41CGsGKNyTog9YVt8sTqtyQT4kVZBmF0HZAnBuZAsZA25glfiXsswyCEnoGvfrU5EOCacVJ1wqPV9mrNyBr7by4XCvtDts4LADpheqBrRrPgWQ460ZCWgC6FLS3rMXaIIngZDZD', 1, 'female', '01/01/1980'),
(29, 'cibin@tinoza.org', 'BtSs@35363', NULL, NULL, 2, NULL, NULL),
(30, 'giziruf@ether123.net', 'AKJsQ@81994', NULL, NULL, 2, NULL, NULL),
(31, 'jiyadogacu@axsup.net', 'AfCU@35363', '100022549094750', 'EAAAAAYsX7TsBAHZCeuZASNXQWyD1NvapKvbLZCi3F06gvSSLYzbHNmbRSLb1YCZA7OkPvP6lhIb5yLzkqNTUVvCTvQ3xQuZCYZC16iTXys6sNhK6ZBZAOKRzeS6VOxY8hFeTCXOOaeFFvDoQJo9vuGTQ6ZAK888CBchXZAq7id71ZCTZCOOYnDQKY0bIYcCOb0PEzEvXhS8qKYXTzVwcyGZAFyeZACFDp8fSRRgXoZD', 1, 'female', '04/10/1983'),
(32, 'zigigep@tinoza.org', 'TeSZs@94682', NULL, NULL, 2, NULL, NULL),
(33, 'zikuziv@reftoken.net', 'AwqH@34595', '100022619225682', 'EAAAAAYsX7TsBACRX9JZCkpTJ12uGL3vPO0LVZBctYGRKGKjDbx1ZAFbtaEpEb2HMypzluV7QJ3ZCQGiKxQoHtcC9f6vGH5KD41dnl7pwn2DEl5DqOuffEsDOSeZA41VKeokMM8AqqgZB4X1rA69l4qiqqfSLqXcaP5jTWKygGwQGT9zEkXpJdadmyuzf30dKdwdfWaRD5LZAOWq20wyXqYcMMk0MlOZBxV0ZD', 1, '', ''),
(34, 'vabojad@reftoken.net', 'LXke@34595', '100022584669919', 'EAAAAAYsX7TsBABc0TBHSfRx2ZCISLjSIuEJpn2FgoO9Nn9EuM169luors1IXA9zrh5NG1QhWxxnTxThh9ngi9vb7BpCGQJBISyTnDsyPOPWOIhZAjVZC3IqdsZADNh06Ior6hBIVSJSA5lsJkZCiLNzAEHM5BVhLZCNM1KZAH5aXRkgpNFKcqjxYjZAe0C4FSjsBJ3pqSi59ygOmHHp4MhIUdNkjNTEMB3MZD', 1, 'female', '04/09/1983'),
(35, 'duvufi@zhorachu.com', 'BzOdp@98649', '100022604677588', 'EAAAAAYsX7TsBAKZBxGkgWFusH3LGxVr1ZApkmW2vkSvPbteGzCAIcFiRkPi4oCZAOtrIufadpxG4tjP9DcegWcaJRCwoTckv93ep13FSOHJzQfTuwiZAyPF6PTYzrGrNESsfSf4wZCby3MUhSyRSEFYmEShVXPTItwAAlsMVvZAiP51rFvK7UhAg8ZAxkHQPyZBZAlrFN4sgbN7AoYaw1JvxGre0ZCDLn0Eo4ZD', 1, 'female', '11/26/1989'),
(36, 'tewehiv@ether123.net', 'GJud@34595', '100022609356511', 'EAAAAAYsX7TsBAABv8rpafJa6ZAIdEYC1XoR2qPkPoI8i1Q1hyr6UlFX0se3aBe9xtnM0PRS0IQMt3J76Vo7Q1Y6zrXy1SrEa3WOSw5EbU8ZBvnvh9ZBXlmjSZCHNkKQzB4zzZBW6GWiZAjNtEeZBsK65C0oVngZCusPSrEVYTrxZCs612AzrM5voCCgp0ISbHhpy1b4KfmBADZCDIwP0m6BmOBi5dIxuZChXDoZD', 1, 'female', '04/09/1983'),
(37, 'hovawetuxi@ether123.net', 'NaB@28135', '100022568442197', 'EAAAAAYsX7TsBADXcJZAQUaQs1bYg02uGKCEeYHAFfBKbeMRXMZCJiD3vc5uMGoTanM7vb0lsefmSCtrfJz7G3ajwZCZBHpZAWRCIyjlYZBZCZBFo0T9LFUZB3DO553v6VujxuEHHIJLUdrWZCKBsHLR1pdwkykIgp1apOamvZC5b2YzOyMvW3VRLgn7IUR8KNCPndkwL7abgkrggJfrCFVz6f649658jHNZCOZAi6PVWGVt47NAZDZD', 1, 'female', '04/08/1982'),
(38, 'siledi@geronra.com', 'NXA@28135', '100022507879724', 'EAAAAAYsX7TsBANPBksPwvLKUPFwYaN0Hpfoc3xj1mZAgy8ZCWWtA5Y9A7CC4fzKA0F8JDVLCaK4BVMW0euPEMmHzthv5BnIEUjCTFIWRZBsx6wtFHlCZCx1dXnMXfZAlGa1gew2KnyZCZCZACny1XdZAiAoM7V5ZBsB2pOx4DZBP3ZB67HHKpjhwjcHOZBvi7XJGG9mYfVKybTZAIoPVQ0OPtsXrmO3XJ5w9sU3mcZD', 1, 'female', '04/08/1982'),
(40, 'cerewexit@datum2.com', 'Olb@28135', '100022488982924', 'EAAAAAYsX7TsBAEykNL1b00u5Xwb4fDwj3E0EIPgZBqiJwi6DaFo9ZA4IKzydtSyRHubk8dzhn9stE0LZCQUp7GTPjnWxmwBZBp85kCXfZBQcxLxDUUB07xQnnLtQQnBj499mtJiisi5ywgqUxUQztab6uht112oZAdyn5klNhjtzy5UkgazkFqNvXxMSetakrnSorPImYdYktiZCWZBazfMqVSWAR2b1TiMZD', 1, 'female', '04/08/1982'),
(41, 'yenodo@payperex2.com', 'JRtH@38810', '100022613616502', 'EAAAAAYsX7TsBAPRVnYA5XP7XQi1WBR8tQjcxG4t01S5y5mqvI5LgPbfDd3T38YsPdNyqZAf6qgRVRyokV8iZCPOqHsUXoYc5vXW6ZC6sDZCVHZCCanZB1qXzU1ccVDAwZCCTkFZBsVx64JfpPb4H4bdsg0Own97oX6vxpduajK79TQqvrTPNXqdPh0qVZBo43aEutIRJxQ0ZATLHYqHm9NKeer3x4VdJCJuXRnmx73hJCbEgZDZD', 1, 'female', '05/11/1983'),
(42, 'rokaxex@datum2.com', 'AmFcI@81298', '100022528726647', 'EAAAAAYsX7TsBAFFEVEPQadp6D6MYlk31BwlMhaI5ZAnzFZB4XB1lgrJFEVati8brgG1qjHOByAsLeUyHKpTuTkxqyZAKqUjiWDWJt7r5szBAwBhoZBv7UZAGPN1to9m8CI3fjZBrdW5IW4XJARP3lSgcGikmVthW3Ea4vpVHL8PeofzL9N8wrU64riUY5S3fc4PHce5MceThCNNcQECRojX4rf2vHnSsEZD', 1, 'female', '09/22/1988'),
(43, 'yugipulofi@ether123.net', 'FytO@38810', '100022571621849', 'EAAAAAYsX7TsBAJ6FGNRjZAURXzr20EEIHZCa9TKGKDJ7cnsAZAz1VhQPu0U8ZCM5GKIDcxS8HiipB41QIMDOZACna6SVwfXCXvPZB9WDNAPjCoFbCjqgWAKikSiZA74O9YSNeJoKFsFUwtRHMkHqmoLTGyJW2AvfFujNJNB1r1xLu4AkjjErhYrLaQHwJLnYAnlGlZA5xfIrQ2txejWLJyqEFAlgZCRK5riZCwgJVoEpifSgZDZD', 1, 'female', '05/11/1983'),
(44, 'lazacune@nezdiro.org', 'SUK@22464', '100022549574652', 'EAAAAAYsX7TsBAHMMCjEWdtFuwPF3L1bpy02TrAHsXAXNqxgqvYXkIL3Kg9S8uyuacTkFIlVXPZA1k20y3xDTUIRZBqvvUV6SjxHgaSuZCEIy30CewyOtm6uAozZCfh1Dphlh6oeyxwUhEDyoukV8RpnD7aaCZB1HKUBHDZCBZBuLua7VyLrEyaRyoC9j0vScNZBhVWhfxBz1ZCKgTEFZClIZAQkzUZCL5ZARgro8ZD', 1, 'female', '03/06/1982'),
(45, 'sobuwadi@tinoza.org', 'ZBdZ@38810', '100022533406398', 'EAAAAAYsX7TsBAOf1OWBKhzkzKDkGu98un66Iu3MaEO0FGvz3znW6o3fv1P77cYZAsFPqmtwfBXZCcTZCOp0n2XaY69eQSYZBQ7lBU4QA97wVET7wxtn6ik5jZAfZC6fxJwMb8zVZA6nkGYn9ZAkJpwiGeqrjfsCzJBAgZCygorkcokypHliZCZBOuzDb1Yjx8WdztK4aBpLZADpyLIM1MpjqHFO9lc7G0FlkAPYZD', 1, 'female', '05/11/1983'),
(46, 'misozez@datum2.com', 'XiEd@62145', '100022530106693', 'EAAAAAYsX7TsBAFXCZCywNTEmGZBcV4pbZAek6oMLctpOi6MrJd436nqDIg7ABBilWYFt7qPxylpfO8OgOSo53lqkbLBnVR2D9jnyKAb0LcXskxbZAZBM7aWs74Wsm1m2OWGiuOWVJQc930oj15ZCe2mZBvV31ZCyX74OhZAfnwuJQKZCd2xevpDJRzmHrptY86M8D4905Tt5TwDxxTysVW0EmCig0k5SlsMKAZD', 1, 'female', '07/17/1986'),
(48, 'vuyuta@averdov.com', 'WBRO@45799', '100022475813914', 'EAAAAAYsX7TsBAOzaxI6YS7hsgmikHDwr7YiaNY4zUaXRAWKBo8GwGHtnP3yeqjzOXumc16PRjgtSrlRDrWa2qZC09C6nKcRJllBiWT34hCXgJpJC3AZAdPxnmkzZAKy9ssbqMCJbp3iU5WREDMPIYp5LeW42jtEJT8P1tzZBlfQKttmVBwwFT8XR5dK3BMZCJqQrEfCjEQG1pdXZAh4DV7ZCTJF7vrmQB8ZD', 1, 'female', '06/12/1984'),
(49, 'lilikire@ethersports.org', 'AkQPF@71112', '100022569792142', 'EAAAAAYsX7TsBAH5Htgu2Q38yw0yc2o8K71lmqt010PCcI5hnrY2CVYucNIcbvRIkoqZCm0OgujFwJXdGhdMzOKMfYwAd1DbC2ZAseDk3V3D3G1ud1ZBpbVE71kj0MV4v2vGS8fyTZAJ6b9T6VfUMOqgOHGJLjF0RC7w13idDp9AGgeGOwuejLZBlyS18ATKttdyR8ImejHq7k9hFT45cA5NZB1HxWlJh4ZD', 1, 'female', '08/19/1987'),
(50, 'cafurozuf@nezdiro.org', 'QXVAh@71112', '100022636772616', 'EAAAAAYsX7TsBADjolvPK9TNvYvpScS0HRGK3sNBiDhOjZBu3k5zP6vQT22PQh2ZAPVuYJ6Jz993EPFUOyiynn1GCSGW8vE2tf97rYOL29c8gsFxbTgemYzPu72XsxLimE1SPI9GUvin3jvmJ4LE3yBhLibEt5EDdQGwbqMhgGIKX4PTUWhOY2L2ZBl5W40VyxgX4YieZAPBOuBSJL9jmXk2fTyICr9J3fOOa085ETwZDZD', 1, 'female', '08/19/1987'),
(51, 'zilok@averdov.com', 'SInEJ@71112', '100022511869159', 'EAAAAAYsX7TsBAEhOdEEFfCoUzaVoA48w8oAyZBMCoDWu7iiTuHZCNEYIgpJkHrOQusD0uXsYm98K8qs7dLe0EdxrMEibZAFFaZBaHI8L9GOKaZAFnUdtZBikoMVGhAZAY4nkNbeutYeylfYPVNFELUx5C5quJQLiicXUCa8dJ9ngZCynZCVLgk4wVz95TxQ1x790w0dppwn7H3MvriKH2cHj5', 1, 'female', '08/19/1987'),
(52, 'rafidez@nezdiro.org', 'QuiJ@61218', '100022581880380', 'EAAAAAYsX7TsBAPSHiOmeOJ2IQkD5mYYyl3Rm71hrM6mM6d1YHNwyLxoPzW0MKCkqkwXt0ZBMo9ZBHV8rYfSgReSMxQOtn4feZCLi9fLUHxDdwxpoeaVgL36BbqDveujn7V5YLo9yZBkJHsNZBzILA9AyxlHcD5ZAhJZBazFyQvURIDPYA5HyYNGk35l6pHj65ifmHsybEWmskXrqQ5R9tcFm9kBSeWiZCkgZD', 1, 'female', '07/16/1986'),
(53, 'guxawujago@reftoken.net', 'FTbX@61218', '100022649281560', 'EAAAAAYsX7TsBAD3LcKGhytsaMMm5aZB0BkZAe8QlBFUrb0bssZCubOQl6KEJtcakr1hA1vYl8OWWSfok0vhp8ECmfMZAkzzOQO8gEsNeMwAWSdJJP5ETxezJZCKk1c6RF8RODVT3Bzic5btHO9miGjG5uWPsIFe5Tm6w1igSsnsIbZA8foBcXbZAr3aavAadVK1OIbfFqcqQ7xtB3nnLIy86yV7jSdqkyAZD', 1, 'female', '07/16/1986'),
(54, 'xocasexup@asorent.com', 'AgTO@44873', '100022498281397', 'EAAAAAYsX7TsBAMATaH2Pg55AjkFKLWKJ5mmCcuXc6BAhrlvsQmb6rB4TN6KVyUWrL6BFBQrzWcRWc4ASSyzrR5NeAoo8E2CaDyM7cnlJ7a5WyHKSEOTX85mFRKntWFdMbNfd4pvrUdrHbZAtZCQ4fbyv6UyS8x0XF8YKYhCsKZBuZCS8zZCkvmiFrlqbPNv8ZCJ4ABwdAUz2UXmMne6dVPEwZBya8fdDAgZD', 1, 'female', '05/12/1984'),
(55, 'dalenayi@zhorachu.com', 'WeEW@44873', '100022576510680', 'EAAAAAYsX7TsBAJZCfLphZA1CBaeg85G7zKjf7VYcdFuuHwZCO9tMdBJzH4c5g52TwNs2rD2hLQU9TyyycdZBOUK7sipUCDbRZCUmVk0hFEMJCBoCj4eDVHONabgy1D45jobdEBuVlyZAKSTdYBZB9Gu8XUy9cet1W852HL4XKabP6ZAzlbVa3BFFNqD6gsZBvPa3w66YcX49t2Sp23GZAgwIk2fB0YrAeagrAZD', 1, 'female', '05/12/1984'),
(56, 'rejay@ether123.net', 'QsqV@63195', '100022619495806', 'EAAAAAYsX7TsBADh7yCxyFZBsKfIl5iWVQ3OKXzZA4oFM3DZCu6CMzZAzeXXJLhxevDuBkAFW9cYTZALQs3A7ZCTZCZBQiFr88pCnjhIQL57PoeBZCbi6m1HKWNfX2CMgCAHMPeTgVXBLx8Ju27WtQU84WdtJ1cGum9OxuqclWM8bp0tHIga8vGxbX7vXexGQNZBO8TijgKg1ZCwmSxfVCueIPyf55r7n8XGvuYZD', 1, 'female', '07/17/1986'),
(57, 'celuna@averdov.com', 'SyOq@40863', '100022636502740', 'EAAAAAYsX7TsBAA8bapWoldtzpb00qQWTazX6IpChmpRZBwqLCEssNKEHKcZAqK3gskZAN85ZC9IblwZCDO8RYwyv59GBt6L9d0KE96hMYfHk3b2mYZA05qMf9ZAQ5j3uyIgf3fiK1lTXJvRvMMiMoFmxX4UygUzW4fq8WxSZBcKI2tBvLi0OPZCUYAEcyl9ZCfpOO6YUewZCVzVLTn0GBh5V3ZBpPW8n4QOFAzUZD', 1, 'female', '05/11/1984'),
(59, 'purina@nezdiro.org', 'KFI@8792', '100022658880549', 'EAAAAAYsX7TsBAGO3AEja5kPNiucKRzotKLbOnd0kGEQVrdcgDGL4dRRguwy5jXNANgfbwzZAL68WaqsrOhf7l1Y9bvcFXiuBPZC4ZB8AksFhE6GHEVtZAjVi6w1i5XC0QBXboAvxPhPc7PA57QOS2aWzvYT5mpokwIaxPruLR21uKYJ97rZBUfdlsgjiF0bDjkZCwCJNTY1FmHBg6bfiA1nJvjNpnZBP5UZD', 1, 'female', '01/03/1980'),
(60, 'tilanum@payperex2.com', 'PIY@8792', '100022632423944', 'EAAAAAYsX7TsBAEYjINvKSEd5GeDMq1YlYXrsbBJvM9MZBuZCLZCWmIaFq9OqiZCh9WXWT3Cprk3ZBbZAB2WygjmbypEZATBg74NZArbhGZBfjZCI1W1SCpur6n2l7bDE3RSCBDKlPh9zZBxZBZBjo4jQxKr9wbjiFUoMagPuNu0TdOswcfIWEUT99lLruxlpuA2U6pdtxiiaMBeYkGIFm4WHArAk1BrMb1hct9KkZD', 1, 'female', '01/03/1980'),
(61, 'vigeh@zhorachu.com', 'OeQI@56562', '100022585450138', 'EAAAAAYsX7TsBAAujn2VT06GEnlRHP6ahZCddGeMEFZAmIUENhagPpUZCmXoeDqpjXcHJvWZAL0h3znv6cok4wCLZBfxXqEErrUF2PHwshElLe6mLsqyTBx3nz0jQZCMuADBZBRmdASXpJHlFq8ZCZB6KYjXRd89DaSjteNtQ2mM1M0IYJRjqumz0PrfAXZBTzd4X4xUvbVlnRYIqlxmykwOuRmwNZClhpfynUUZD', 1, 'female', '07/15/1985'),
(62, 'lalogujov@asorent.com', 'XooQ@56562', '100022562142634', 'EAAAAAYsX7TsBAIz5dSAYheWtwHsAcUqhsOa19HQo6OI96TabfJmRHepMKur4Ti7YY3pAPKLw8qZC7Vj0qjdYuoM0iESauJFIERZBmTJRVqvLeF5IbsNkVVlRE9sMZAvnPvZC0Yz87uQeCsrNG2PyRfRiYsuMlaxAFB0XK7s5ffuWZCTg5vpSc9SV1Q8ZBOLj6GZCYA086fYjZBI3XHV72ninQDNZBE988EdmaS2F3xY6RrwZDZD', 1, 'female', '07/15/1985'),
(63, 'bezedimu@payperex2.com', 'TWIx@56562', '100022632064099', 'EAAAAAYsX7TsBAM5ZAwRca23n8VdPR0QXaZCXLAfNZBipZCFZCcYvZApFg1xDbRsQmpj71H1ziifKohZBn6w7fJRWZAZCLYbagUIZA8WtvFpokN6SNkffZBZCiLZAuzRgl18ZBpO4bL8HZCOix4DhknahcAJYHwCglbqvvwoUrAz30sNauHbxARyNRvLoJp9EcQn75jQy2udtZBdjsvY91A2J3ChSWz3oww51cp1rvvwZD', 1, 'female', '07/15/1985'),
(64, 'dejevaral@axsup.net', 'RtwGD@71228', '100022651560771', 'EAAAAAYsX7TsBACVY33ChlCMI6d9qgZAJd5KZBwZBd5o8rNARCzeJBvDGZBZC2OTvnot5iXjWH9uR6PrQS7h9uwiUUgmjbR5P6JXaSSQwqo9YvVEKb2FFbtZBKOAcfgiHZColrjhTAAGzNQUzXJn89Oe3SZCdfrmyqTgOkTtvNAGx0ETXAmwUYUGxPzBdjdasrGUvvsaiyZA3r713SkIubKSZA9y76LulMPRN7EstisXg4CzAZDZD', 1, 'female', '08/19/1987'),
(65, 'cayutom@asorent.com', 'HKh@3789', '100022603268183', 'EAAAAAYsX7TsBAGovZCk8vUBcML3ZAzHqDIsNSGyT3VZBrjS6eGJrpSqjVrK3EVtHX0kSK8KZBZBVIeOqO2Geu2AoN8Jbegr9w3GgKTAWxQVCrVUSK8lsn7bTEw29VBQ0QNP3D81z2QkRSFVZC4ctJDizYvTTEZA3dSb4zxHdKsXlZAVu3yCRUYZB1ZCAscNyk0h5vxkAoraZCjYxnEfuxQDvYxRMX4FINWLWWZAJulThedqPxwZDZD', 1, 'female', '01/01/1980'),
(66, 'zubikacu@averdov.com', 'AJC@3789', NULL, NULL, 2, NULL, NULL),
(67, 'cirajoce@zhorachu.com', 'Vin@4311', '100022552784577', 'EAAAAAYsX7TsBAAbuVaXYiAq4NsNshdRbLYdhEZB9RC3vvxQuWEurQD7ARVeTX00HlnDQ4FrLxS0NNsealUcXhBMoVaZBnKjUhPPLNDwVAdt2k8dnXMlFTsWrshZA2qSiLZC13ZBH6HevSSiAwvbqu7ZAnHo5G3MUIgAQdr2tQiNeiONElqLiKNJJHK6muBuvJ7oI9LGnGw9ZCD0zfPt1PVLSV6ZCehpp4RPcacoYF6bjNAZDZD', 1, 'female', '01/02/1980'),
(68, 'kutel@zhorachu.com', 'Uxg@20656', '100022657230688', 'EAAAAAYsX7TsBAMQhovYkDrjR9AGcQzxOaNDozh0BHPatEcjSP5Hd4uGwG1ZCuczHgnib9jTKbiF70FUGAxMqT9sfIf6tdwgwVx0gXlilsEZBuMeYsACf4AZC8bAJZCZAZBNysDcVs8LqugPvnK6VzpD04QJU1t8JXuRdzkMYlCZC2aQJfvNPzdRHdGwJqPLlNk3lh1GWhut6i5q5b2eEEM6zlbapMxh6188VCmDfRMpywZDZD', 1, 'female', '03/06/1982'),
(69, 'rexufac@nezdiro.org', 'KiC@20656', '100022634553951', 'EAAAAAYsX7TsBAJ0ZA7eR1ZBvlEEukZBTDjzeX3b5SF8BhjwJfHY4uyv1949S4iaHiLZAwfSjkPynvcweeOxXNTlcpZCH8qglwoqvBxPiLunIGNzJR8ey9oi1wBtBe4w4mJrLQD43JVIU752OadDSN7QPfQaiz6ORi5o1UKw0ToeYmivqukwk8nf1TqezTiJZAGNNXKk8rGDyLNBlEaqwTvHyCjsH8NM4sZD', 1, 'female', '03/06/1982'),
(70, 'wekes@averdov.com', 'IfWcT@73819', '100022542135270', 'EAAAAAYsX7TsBANSqiZA9hlskHQtPpvdRNaPFt9zumB3mUhDzUMHutvItdpGVb4HzJHKN4R9WstCXutT4ZCAyU3kcUQ7xrcUstaK2qFj5oG5JViiQxJEeoFCHVGcmLShFI7q9DZAm1bspTII8mmXN4ACPozgwCVxSjNdL6JdtSbBGKkkVY7Js696OjxPfYaVlo7ek4KUkFzSIIgTXnPEwBmpaZAUKfCYZD', 1, 'female', '09/20/1987'),
(71, 'ducedohi@geronra.com', 'PcE@30427', '100022626754618', 'EAAAAAYsX7TsBAKAegZB6r6XR86RobZC8CLTHMICyy1d6jxtnaFHBUwzYAgsHjWN7dWdF6orgmnZAwx1Ko4jZBciTjsZCcZCabSNLmZAUqrn8WfUQ2cbeLCNVXx9ZCooZAlhkWYczn8NeZCrKsGfqy0CQyZBiVo6LUZAL3vsAVLRqCBPM9wzLatnwZCHZBc0ZCaveroy3nOdkEfejAJIFu9Hj4oiwJOfLMmPGDtZB5h8ZD', 1, 'female', '04/08/1983'),
(72, 'kogopo@zhorachu.com', 'LAH@30427', '100022596278894', 'EAAAAAYsX7TsBAHAtJCDtTBpkblCKw4YbcWK4aviLmHWwhlJTdkZC26ePeinAXPn4efcqk35w4OUnc6XqBhCl40ofiq3Q164jHVDS6YCnWKl9bFBT37wyKZAHdzWkjF2U3Ci3XaVq54n8yRWzhzaAZBRLR3qdqKWynJzasNyydR0POXZAnmSb4bZBZAklzLMi0CdrZCdobNZClOIqk2E1aSEayxV0j06X6YQZD', 1, 'female', '04/08/1983'),
(73, 'jofubebeh@zhorachu.com', 'OpYtB@88464', '100022559893025', 'EAAAAAYsX7TsBAIHjF2JZAsMZB11rfjLZB4XdpoT07XSoZCWWDKgtILZBCUV6XSiRwDCPiQmnVQeNZCPkEqCagxNKYEppwDJLZBEC9g3rZBpiEyZC52oW4RNwK7jqfkJzZAZCaPZBZBoEBqlYZCUg7oBsLZAJTIZBzUTXeGOMgDcDQ77ZB1fFY0IcTvrCBLZCEaE076h57BCpGYC1nH5CMwiQUTmE5RVgClPKdUydH6PbcZD', 1, 'female', '10/23/1988'),
(74, 'jihoxiw@averdov.com', 'EYN@370', '100022642082687', 'EAAAAAYsX7TsBAJ6tlP5BkZB7pJRGwZAliZCYLWx5DdbecTE4mbVOKgAWZCCWlXVHHiOF8kjeANOoMsUjDNG4mrePEiT48ZAvlkZAIpZAhXoykZAwLN3Y9mY3sjUZAgeiRs4SMPQgJgf99yR34t54VYZA5foVwpSf5uZAbnak75VIAXmt3gjVTUZCxyCeJbw5b38lvxoCv0I0BA25u0l5ev1rNKMYuatnKprfPpgZD', 1, 'female', '01/01/1980'),
(75, 'judobogol@reftoken.net', 'SFb@4290', '100022483763672', 'EAAAAAYsX7TsBAF3JJZByZBsPWeFDYuUmZAL6Y5vO2s2IU3sIJEyGBjZAZBrR4Q3RWYNlC4mWycaNc73hNLKZCc5kga7QRSGGZAbFWsv7BPshDzLGTFKhJA4Dj1BfQOXHEgZCG6a2mJN9MX4Apx45fTGQCISZCDToZBpj2fMKgBodyUMNqTptOcLJGF2YhaMnO8X90bZBq4NBNN0hKp4CJJSvA2XF0Yd9ljxQCwZAg4xqXZBEWzQZDZD', 1, 'female', '01/02/1980'),
(76, 'caniyijaxa@axsup.net', 'Nhc@4290', '100022479054156', 'EAAAAAYsX7TsBAKP9sisfqFQMlt6rJZAMfLWVqcZANsqze7OIGZC8W07t75ymEjggV1xQz7ZAaN3HwZCwN71cGewCXz1g08QC79cZAia6ICVOoShmy9r9B0l9RCQnsz7u7GtXbWeZAVH2ne5Go1ehY00PPkqJk4KmAZB0YjWuuTuwogHuKH3qb3OZCAfHKUgV36Ev4rAg8mZCrBWagP7NVS4yfAIX7FdBFGRPwZD', 1, 'female', '01/02/1980'),
(77, 'noteyanepa@ethersports.org', 'IwaJ@40134', '100022624894796', 'EAAAAAYsX7TsBAO7mhJfZAYVpGfGZB5NdwffYQuwy25NvbfW9PNmMd3zku7hPcWc1ZB89YYQ5ocMSvGE45a4UOcjNrBz7k7b6ZAFkZB4ScXSCJjLrjsYpu7qo7UnyVZANzytnnNJZBxqnDGZAH6pd2CQtBhZCVqwwH7HZAa4MIVNngVdMTR8GaaeQfxaVZAkCde8oUeUPaiiJkq8rQlGT7Bj7uDCgKRsF7A1t32i0IAhrnv1FAZDZD', 1, 'female', '05/11/1984'),
(78, 'kacehap@ethersports.org', 'KFuoy@77743', '100022594418892', 'EAAAAAYsX7TsBAF6BPk0b2neTxeZBm9DixGBuZAKnrKTmUbN2o8LPVVF3aw4jfltk2V6SMqr3eZB74PRMlywiEBCb5YyrybQxKdovztS7XJd6HIpHfsxeqKP3hIHA3EiWmkap5boA6PM48TqgQrxW4w0GfyQOJuKZAOoZBEHA6jI282VSB8u81n9BJWQOChCRRK2YjxTiVpDWyd0TJaNVa3QEoPmiaKm4ZD', 1, 'female', '09/21/1987'),
(79, 'diviyaxove@ethersports.org', 'Cui@13688', '100022639082849', 'EAAAAAYsX7TsBAMOTZBfczR7ZBHwhwkt8v414CZBhqvvtyYkjBCdizljZAsl945oUNDDipsZAmjhbBgrncgDdRyTf2FN0ZB2dUsvMPMZCoVLdI4bxy2QSYl9ZBTEojn6MNrntd4BJ9KPpqT8bIec4qS4YS3iJsgCKvENOyUiuTacZBwM6CEyLEePW9ZAYjDRZA2hpDA3FPt7jNFvBnwCBJSmsljE3I44ZBhehZA714pszLqkgFWgZDZD', 1, 'female', '02/04/1981'),
(80, 'tokanuj@tinoza.org', 'Rrh@31007', '100022580710999', 'EAAAAAYsX7TsBAIVLpWW66PsC4ZAxz0yhotBrebEryLBNGBeOE2LyvmCnuGxNVELXAoZC4uXCZBhkGbBLQCpIZC9eyXxzrObHeyCvd0Ap4JABkEmMZBqL9aTKOGK5x3pZChDwLPF7isYJpxMoShZAALSvZCf4Ls9fOoCBPi9ed1agsbcgWLBkFQvqizlZBPfkAcb25d2Xm0ZAlZAirM9BVFZCb3eoFZCIZB0FiZAuU6jor5fvvGIYwZDZD', 1, 'female', '04/09/1983'),
(81, 'xorijepu@nezdiro.org', 'Muf@31007', '100022591988988', 'EAAAAAYsX7TsBAAm4lPZCleSZCjqD8UKKnue8HpHuFPt85IB7c7ZCHbVrfaDGX5tOTiRURX4PwIlqFFT5ZAdrwU4hPiYojWgPuCG3iK94esWdP9OufsoKmmKOAuNFC3Be3JbfuxJs7fROEZBYGNCI41FCyz9DiL6Ln4PvNNp8MzDt4fTU5FO2k6ZAT7SpRqb9j68ZB4w3Ahh5sCrl6S5Wd33nOr7RxIOB4IZD', 1, 'female', '04/09/1983'),
(82, 'logudehi@datum2.com', 'MdM@31007', '100022600568547', 'EAAAAAYsX7TsBAB5Ws9KpPDeh4ITSnxTcjmNzopDlK7hoBpWeIqTIP65ZApRJJQbch5zQT92yqXgp9P93ZCYfHahIasIiIoCQfUTlOtMRGn3sMHrAKIKqqhbbjkZAkcnaUN67nW19ZB8eKRLbV2PjcPf4A7brG1tGl7kp2n9nRviCoEHT9NmpqBRBD4JipQy9mAXSIIRXBpMIayXJDPMWa7weQSZCNwWwZD', 1, 'female', '04/09/1983'),
(84, 'cedavam@ether123.net', 'QlSeG@91904', '100022519848924', 'EAAAAAYsX7TsBAHTDdcs7MPRA0pEYlW1lhnZBMNQYd1ZAtDh6WpWWmpi4NXZBQdHtAkvEYWRNsSiupU2pxFANpwqqFxZCCzbAgwRDG3ZBT7F8ZBDJEo1CAlMKskAEsOcT7SIiKgDw791yOq1LZCuKKT3BMiJMrPMs1WZC0LiLZAQA6unEaR1bIUgcjBlnG0BiR8KSlxNd3ktCkwDVSxvKGOKKFd9ToOrGvUgYZD', 1, 'female', '11/24/1989'),
(85, 'hawafucere@ethersports.org', 'UcVM@52577', '100022483883601', 'EAAAAAYsX7TsBAAd93qrOVxeMT7q9vfhjsU18HnqkkmPWMbOkPp5KYELY8TOOoCXmym6nclwXXV7kA4E0kQ3RNKiVeMY8ZCYXLZCpfN88Xmfu7Oco41ghsiSuvEbZA9OmKchDYn4ugbKwS0TqdZBYinLkAipTwzrWKc5cPFJxMeXuDizBPPZCyGyH7vMGVoAXEZCusDZAJ5BpB3oDOG8ZB2aoZA2RUd3pg6yznrZAT6gG4gygZDZD', 1, 'female', '06/14/1985'),
(86, 'lidezuj@reftoken.net', 'BFiW@34291', '100022582540545', 'EAAAAAYsX7TsBALXuSQbQ6kK8DG2tbEx2LYrBk3lbLYXYzioAZCH7bYwZCZA7xW7jjAbXNgQaChzXD97izWs2cluXYcVMPCEZBSltETHvH1k8ZAHxrBlfI3SltRAPQLw70ML4EXzXx592Vzv1Tk38hOTBdMqUQe5oOnSYw1l5FdnOIWn9hL5cyZC85yVJCxTUXzmA2cJVRkxsIeMfH3ZBqKFdKp3e2FIjDAZD', 1, 'female', '04/09/1983'),
(88, 'hiceri@nezdiro.org', 'TwXn@50752', '100022564362761', 'EAAAAAYsX7TsBALOtOIXbUgIhSiLxR0hoMTiBBcHSZC5GeMfDwTUOub3Qu8WE8kZAPXXCWDFdgZBxkcYlImHhL3McWXxLZAYpVbNOS6XVGZCyoHIBDGilwszyLQs581FJRiSZCgM0BMdjFOHfJG8JtKQVUanhDJ0QFCnSxrLRjTxb0QRRbUgD1tJxl3ZC0uGTBsQ2YtSN0QjINj5XfcUVEWZCv1E6IJr4QAEZD', 1, 'female', '06/14/1985'),
(89, 'gisibuyila@zhorachu.com', 'PKo@14908', '100022564722726', 'EAAAAAYsX7TsBAKFNFenFTpMWkCspEK7CErDkwxUsnhVwV1rRG5TQhZCox7tX3jwqW0lmsilPO9Itl2wC07uJ6hDlVLhKqPZCDjdATFOz3ZANLZBeQWUfWkkS1H51VTp1trIiVX2IVkNJkYMfmM72mCnsHkeKZCJgCRZBza6k3MfxPffUZCCbiUoNtP6NLHoeND5L5ukS7mjCtJaKApB2gyPZAszEPJ8u5GMZD', 1, 'female', '02/04/1981'),
(90, 'yozel@geronra.com', 'TwG@14908', '100022648652146', 'EAAAAAYsX7TsBAK8b0ZBpQ1aXWodPI8c0TxMfNCOvzX09mUyjKpXpFkyX2hZAoZAWEtuEpei5jlyNR1roGPA8Kx6Oou4vJTFeF1bYencLPNJGBkuKYyhNXpTwQxz5FOD6kmpnrGZBoc40yFz0sHkfeY6ZAJjhU9Yjt7MAuvWSmPUxHVtRXOponBhjIZAOMdePfn6ISziehrNx46MJAfNxQVwYvhxt3UlHYZD', 1, 'female', '02/04/1981'),
(91, 'nirekuwep@averdov.com', 'XLc@14908', '100022573690984', 'EAAAAAYsX7TsBAHKN2XdGSrTtWO5F0TzQwGi0yBRJl0CUKgOhQqrwFrXW1VFIXVyaQfLtCb4ZCNmL3TcYktfSXD29pRBA0YRZCrbshmPrTpRAEfXlyiZAk3I4WBi2jZBlVYukGBgasM25Uyvj49AM8pC5LS52928SipgGlMgXNTIylXvluY6PeUuzJoc3uugLtLQ8NWp7o74HHaJOILT3uKQEpY2p4I3iB1t39737BAZDZD', 1, 'female', '02/04/1981'),
(92, 'weyamij@payperex2.com', 'Fhts@66345', '100022542855440', 'EAAAAAYsX7TsBALSkNjOZBUp2F9xCZA6KNlQPfjBZCZCed9kqqyCa5raW0ui1qU18utEmKvQeC7dXo5LZC58ZA7KfvYCxXaksYZA89ZBm6Kc6WBVvA0xijNCyEJfehjy7CCZBTgdRAGdsMYkdtXz5j4zbzsEnXtZBvJpGH3tqXF5TGHbcu0AEyUtuEXMufZBnKwRwQbfc7PdHhe8xD122CwOBvrDEsFehcCR6dAZD', 1, 'female', '08/18/1986'),
(93, 'micojiwidu@tinoza.org', 'UZAf@66345', '100022580320994', 'EAAAAAYsX7TsBAAdOK2ZCAKJLRrMqDwPQGGQkdg7Iu5xSr7xPPWyZAzuXRtkIkUeGYtlQ58iPXVAqLTir8FZCuZAJzfRAfBSyK7yOpTZCwKCvZB0D0ETyQZBpQlumJxKQ1av2cCrJyZCbVy6xZBfgPKFxqOtnOpTnbGZAbOUogCNPVSH8V5GTlOuHTm6KLaVajyxEzAFPhFLEvsw85ZCzwL4vTO7om8ftLZAgEywZD', 1, 'female', '08/18/1986'),
(94, 'yokof@geronra.com', 'VHys@58820', '100022600028474', 'EAAAAAYsX7TsBAD2JWi8gzZAyMwB8MIOZBmY3su1gxXLZCxE4C2d8ABA6mYCh3eTRP1UyZAZBiuMX22ywXQtYlUmdrIMZChAtJBZBrsg2LOEcgnZBzqHEpCASLWkXRhb8HVZAQl5plRTcfDMx3WrYOZAfHFyZAalLDByvCZBzh945d0nDrFZAO3OapQGEZACZAReS1g3ZBVWjZATRimsNDPUaAD5kJwYkwNh7XH9N3MToZD', 1, 'female', '07/16/1985'),
(95, 'mexon@datum2.com', 'HOIt@41833', '100022537036507', 'EAAAAAYsX7TsBAB35ccCbX7vBOiyEBN9lpVyxdy8n7em8Ik9010o0KRWhZAvnwbghZC1w668asSSAlYEFJ2hJqpBSB7GEIv9k4m48estKhVyo74GayMjpE0s8CcsfdU290bccwC7Rvmrv6Qc7w1Fsli2Y9kZCXYUA308qnJsjfaKFWjxa3u0nE8nK0aUGcglVzwMXBEFfn3hN9rr4VkpDw5S3KZC5ZBEsZD', 1, 'female', '05/11/1984'),
(96, 'mowise@zhorachu.com', 'Kgl@24470', '100022593608875', 'EAAAAAYsX7TsBAOezf70puRQnqZBdG8XrQny6B7R38IhHwvYndIFSFcQRHDQyGNAaGxHnvlVdFEVxeDIcVKMAYYyTramrTVZAlo5WdyOI80i78pP1vJywbr1NAWCYTS2vdqRuPHO19n2k1rXsH9wqZBqra4PZCKxd2RAwGq2Xi4VEHJp7GkBpPdTFlH2PS6VMmisPcVM2xru8IVYxjMdMXXkAEVFZAkZA0RhrDQWkoKuwZDZD', 1, 'female', '03/07/1982'),
(97, 'goriwuwoc@asorent.com', 'Zyc@24470', '100022622165016', 'EAAAAAYsX7TsBAEV7nSxIhdLogEI3fCNzimRxxzGPuD8BVtK5Q3RJzuqjuwtSulowBYsZAeHprvb7axFRJwAEjYEkVMX0jVSTkWbp3aTYT9oZBtLHVzFvvK2Pm9FlXgSnwZB8PoOS5LqiKqnQTnK4fHRIPnH7AxkDYmgvfkA2PKyk9oWvFqBAZAj5O7DTaZCGZA27NJJuw2ejkHgZCjBhUQLuViqhXsoR9YZD', 1, 'female', '03/07/1982'),
(98, 'rokopel@axsup.net', 'ZTB@24470', '100022565742904', 'EAAAAAYsX7TsBADa1XZCmcXBpMIrI4MwCZCwljddxMEhn4ilQSfqZBufy23wY5Dx6KGj7Fys4vmHXkDD1mINOgM1568n1Gm1utzYsxapXOZB8XZAoAd86n5wXJf56esCFiyxysc5ZCWcgxZAZBx99En6PYDOz8CxazzVIYehb1r10DRuzy30nZBWu3DOKxPZC4ZAw97VkWR97Ws9yLzyR5G3oCiE0GNRBWHv3ewZD', 1, 'female', '03/07/1982'),
(99, 'kagogomazi@zhorachu.com', 'NtXu@60314', '100022622284909', 'EAAAAAYsX7TsBABTgdyvgSAvBwMo33x1UVDmnIYeL5thhtTRxSWU2yivCbqbUPZCeT4t59ACkZA4JHqKpFfw7z1IW4zdKD1QL89XFE5wR00Jxj6P9NsPbmoaMLdbTZA7ZAV6GreYk5zHKbudVmsGZA5j1exj50VdOpdZAv8qQ72S4oZBNC4U7VfypJJfSJZC2yPpaGCaI1XG5vWQO1pSFuDGs0zWjmJrHCZC8ZD', 1, 'female', '07/16/1986'),
(100, 'yiguca@zhorachu.com', 'BUiaX@93485', '100022610466948', 'EAAAAAYsX7TsBACmSJHSnvmREl7ZAsVfpjUiK2pxJSctlDzhwWDJNaQ7XmjZBH11ofEtQGWAkShn2KodZAf2ldDSRFnqD6Wolk0EiJZBOHbEx7yTgTSQZAJsAP82Ivqa7beccX1DyJDxwylLztRSZCEeLE2QiBIO6q6WAPIKkiEJoHbrEX7dhr6K5Ifo5nK8lwq0GZCttDFQptL0BJq8v3fwrtjLyZCAOsBFFavlRRPWZCdwZDZD', 1, 'female', '11/25/1989'),
(101, 'vunuv@ether123.net', 'IsR@28135', NULL, NULL, 2, NULL, NULL),
(102, 'kiga@nezdiro.org', 'WhxB@62145', NULL, NULL, 2, NULL, NULL),
(103, 'bifore@datum2.com', 'Bqwh@38058', NULL, NULL, 2, NULL, NULL),
(104, 'mago@geronra.com', 'AUX@31007', NULL, NULL, 2, NULL, NULL),
(105, 'suzuz@zhorachu.com', 'TqBwn@79384', NULL, NULL, 2, NULL, NULL);

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
(13, 3, 'user_birthday', '22.11.2017'),
(14, 3, 'user_address', '1'),
(15, 3, 'user_moreinfo', ''),
(16, 3, 'user_phone', '2'),
(17, 3, 'user_social', '{\"fb\":\"4\",\"gplus\":\"3\"}'),
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
(3, 'NOWAY', 'e10adc3949ba59abbe56e057f20f883e', 'a@gmail.com', '2017-11-04 12:01:02', 1, 'NOWAY', 670000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `avt_servicemeta`
--
ALTER TABLE `avt_servicemeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT cho bảng `avt_services`
--
ALTER TABLE `avt_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT cho bảng `avt_tokens`
--
ALTER TABLE `avt_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
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
