/*
 Navicat Premium Data Transfer

 Source Server         : Mamp
 Source Server Type    : MySQL
 Source Server Version : 50542
 Source Host           : localhost
 Source Database       : project10

 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 10/18/2017 09:29:07 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `avt_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `avt_tokens`;
CREATE TABLE `avt_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `token` text,
  `token_status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `avt_tokens`
-- ----------------------------
BEGIN;
INSERT INTO `avt_tokens` VALUES ('5', 'leeit.1992@gmail.com', 'letrungha1992', '100008173780979', 'EAAAAAYsX7TsBAJ5v9twL4zqnTP7EZAbW3heRe18qHF5ixn9HRLlg877ffvwJSdj5e7XZC4iHFhJ0DJkMdMnMdXjUSTrsJzPxB0cySOXflG9qmSYk9ZCsxhIl2XkXsA2Iy3JfZBrRcN9UGBoAmWBkhJQomZBKFuZCr6mXl3lILoh0JaAxSvZBRYZAqZCxU24Af9V8UuwqzyARZAZCYcAJLHjDJC1', '1'), ('6', 'ducngoc110', 'tinhphaiks93', '100008234730718', 'EAAAAAYsX7TsBAOiRIZBRUZA6XMgt9VdhCOBMFoNnRAX7ZB48uz7kVI5DRzLgzFaaybx0qGhRJ4tOFisd2yGFgi3mrGFv2vZCX01utj3SsTRlZC3ZBuUIW2jp7ntwEClRSjoqZAgWZA4wP8RFyZBwdMRE0CeciGlqfKTBoPA5lwIyoRbcznbIhYzZAwy92nnpBjIxJkpo2mUOaWpefZBQ2CKnDZB6', '1'), ('7', 'jaykiu1991@gmail.com', 'ngankhanh16', '100003960373185', 'EAAAAAYsX7TsBAGZCFX7VWySUQBY13b3LSYDLJLW7HLTv6wXRDxKJhTdn3SgjgOnMuWxTP6GR0NnFZCbvckRxR1Xwe50pHe7cgdgXfO7wc4C3ZAhmD0SlfzMmVEYaryoVhPl7XbJlWCxZCjfwDe9xkbu4GdLMt4mMAXJiOJVjq06nxMDmHZBx1CI6tHrmMERVRpNSuHlJi1R2Wyr3n9kFI', '1'), ('8', 'urmvytygb@emltmp.com', 'Droipmmail12', '100010306488152', 'EAAAAAYsX7TsBANwuaIHCBYZB04saOYBEt1Wv3ym0SF22d8jLnHLMSITtAu47mfwIk4eX72sLACJNZA6TgEF3UGMCEmZCBcN7LlEgvKtBt2VMEdgj7ajeFhgn6gvlAFnMQT6Nd7ZANSNsE4dbktoRDVazZBxgbMZBNgzZAg6J1alWzwejmMFz0F3Fgq3P2kUDmFIjcl7w1c7apU1ZApxPZAxGX', '1'), ('9', 'shorwdfe@emlhub.com', 'Droipmmail12', '100012510492396', 'EAAAAAYsX7TsBAJMSHjsXPIfVuRJeFlYa1ZCoBrK3ZAM2nW6HbsrRLghLWNzl2odbu1ZCj4KV6JBLXIK0h6XPLyewdxC3Y3w5pLZBh5INisdZCOxEsP7z5V9hjvCatEBdk2gDZAvzxzvtZCxRHrMfEPjSBJ7sY9f8SpBuzM8MLkAlZBUJoh7ptOk2xkvehAuG9cmZAF0d7o5XnQaHAHkUl2RZCo', '2'), ('10', 'leeit.1992@gmail.com', 'letrungha1992', '100008173780979', '1EAAAAAYsX7TsBAJ5v9twL4zqnTP7EZAbW3heRe18qHF5ixn9HRLlg877ffvwJSdj5e7XZC4iHFhJ0DJkMdMnMdXjUSTrsJzPxB0cySOXflG9qmSYk9ZCsxhIl2XkXsA2Iy3JfZBrRcN9UGBoAmWBkhJQomZBKFuZCr6mXl3lILoh0JaAxSvZBRYZAqZCxU24Af9V8UuwqzyARZAZCYcAJLHjDJC1', '1'), ('11', 'ducngoc110', 'tinhphaiks93', '100008234730718', '1EAAAAAYsX7TsBAOiRIZBRUZA6XMgt9VdhCOBMFoNnRAX7ZB48uz7kVI5DRzLgzFaaybx0qGhRJ4tOFisd2yGFgi3mrGFv2vZCX01utj3SsTRlZC3ZBuUIW2jp7ntwEClRSjoqZAgWZA4wP8RFyZBwdMRE0CeciGlqfKTBoPA5lwIyoRbcznbIhYzZAwy92nnpBjIxJkpo2mUOaWpefZBQ2CKnDZB6', '1'), ('12', 'jaykiu1991@gmail.com', 'ngankhanh16', '100003960373185', 'EAAAAAYsX7TsBAGZCFX7VWySUQBY13b3LSYDLJLW7HLTv6wXRDxKJhTdn3SgjgOnMuWxTP6GR0NnFZCbvckRxR1Xwe50pHe7cgdgXfO7wc4C3ZAhmD0SlfzMmVEYaryoVhPl7XbJlWCxZCjfwDe9xkbu4GdLMt4mMAXJiOJVjq06nxMDmHZBx1CI6tHrmMERVRpNSuHlJi1R2Wyr3n9kFI', '1'), ('13', 'urmvytygb@emltmp.com', 'Droipmmail12', '100010306488152', 'EAAAAAYsX7TsBANwuaIHCBYZB04saOYBEt1Wv3ym0SF22d8jLnHLMSITtAu47mfwIk4eX72sLACJNZA6TgEF3UGMCEmZCBcN7LlEgvKtBt2VMEdgj7ajeFhgn6gvlAFnMQT6Nd7ZANSNsE4dbktoRDVazZBxgbMZBNgzZAg6J1alWzwejmMFz0F3Fgq3P2kUDmFIjcl7w1c7apU1ZApxPZAxGX', '1'), ('14', 'shorwdfe@emlhub.com', 'Droipmmail12', '100012510492396', 'EAAAAAYsX7TsBAJMSHjsXPIfVuRJeFlYa1ZCoBrK3ZAM2nW6HbsrRLghLWNzl2odbu1ZCj4KV6JBLXIK0h6XPLyewdxC3Y3w5pLZBh5INisdZCOxEsP7z5V9hjvCatEBdk2gDZAvzxzvtZCxRHrMfEPjSBJ7sY9f8SpBuzM8MLkAlZBUJoh7ptOk2xkvehAuG9cmZAF0d7o5XnQaHAHkUl2RZCo', '2');
COMMIT;

-- ----------------------------
--  Table structure for `avt_usermeta`
-- ----------------------------
DROP TABLE IF EXISTS `avt_usermeta`;
CREATE TABLE `avt_usermeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `avt_users`
-- ----------------------------
DROP TABLE IF EXISTS `avt_users`;
CREATE TABLE `avt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_registered` datetime DEFAULT NULL,
  `user_status` tinyint(2) DEFAULT NULL,
  `user_display_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `avt_users`
-- ----------------------------
BEGIN;
INSERT INTO `avt_users` VALUES ('1', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2017-09-18 08:47:14', '1', 'Admin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
