-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-08-24 16:26:48
-- 服务器版本: 5.5.42-log
-- PHP 版本: 5.2.17p1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ecshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `ecs_stats`
--

CREATE TABLE IF NOT EXISTS `ecs_stats` (
  `access_time` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  `visit_times` smallint(5) unsigned NOT NULL DEFAULT '1',
  `browser` varchar(60) NOT NULL DEFAULT '',
  `system` varchar(20) NOT NULL DEFAULT '',
  `language` varchar(20) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  `referer_domain` varchar(100) NOT NULL DEFAULT '',
  `referer_path` varchar(200) NOT NULL DEFAULT '',
  `access_url` varchar(255) NOT NULL DEFAULT '',
  KEY `access_time` (`access_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ecs_stats`
--

INSERT INTO `ecs_stats` (`access_time`, `ip_address`, `visit_times`, `browser`, `system`, `language`, `area`, `referer_domain`, `referer_path`, `access_url`) VALUES
(1465764556, '101.86.17.125', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764556, '221.5.49.35', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764556, '121.225.224.146', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764557, '180.154.116.9', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764557, '58.35.122.37', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764559, '124.127.66.105', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764562, '106.38.148.4', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764562, '115.209.12.58', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764562, '222.77.23.8', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764563, '125.70.32.235', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764564, '115.209.12.58', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764564, '140.224.17.93', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764566, '124.127.66.105', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764567, '116.226.189.96', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764568, '171.100.162.176', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'RIPE', '', '', '/user.php'),
(1465764570, '222.247.40.139', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764570, '125.39.68.35', 1, 'Unknow browser', 'Unknown', '', '', '', '', '/user.php'),
(1465764570, '183.67.58.236', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764571, '58.219.206.195', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764571, '116.226.230.193', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764572, '59.37.23.180', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764573, '101.86.17.125', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764574, '118.81.82.64', 1, 'Unknow browser', 'Unknown', '', 'ɽ', '', '', '/user.php'),
(1465764574, '171.80.245.60', 1, 'Unknow browser', 'Unknown', '', 'RIPE', '', '', '/user.php'),
(1465764575, '103.214.169.94', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764576, '125.76.218.120', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764578, '116.210.192.148', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764578, '58.210.134.186', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764581, '171.221.42.216', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'ARIN', '', '', '/user.php'),
(1465764582, '218.22.234.177', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764583, '61.148.199.6', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764584, '49.81.91.150', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764585, '27.18.47.237', 1, 'Unknow browser', 'Unknown', '', 'IANA', '', '', '/user.php'),
(1465764585, '36.63.177.108', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764585, '27.18.47.237', 1, 'Unknow browser', 'Unknown', '', 'IANA', '', '', '/user.php'),
(1465764585, '123.97.94.246', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764586, '123.153.53.192', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764587, '106.6.80.145', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764587, '27.152.20.103', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764587, '117.80.126.112', 1, 'Unknow browser', 'Unknown', '', '', '', '', '/user.php'),
(1465764589, '111.147.153.32', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764589, '120.41.78.182', 1, 'Unknow browser', 'Unknown', '', 'APNIC', '', '', '/user.php'),
(1465764590, '115.171.77.215', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764590, '123.249.26.77', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764591, '36.63.106.229', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764591, '116.233.145.175', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764592, '124.128.223.200', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'ɽ', '', '', '/user.php'),
(1465764593, '116.233.145.175', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764596, '111.2.176.183', 1, 'Unknow browser', 'Unknown', '', 'IANA', '', '', '/user.php'),
(1465764596, '222.77.59.143', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764597, '123.249.26.77', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764598, '111.147.153.32', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764599, '111.147.153.32', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764599, '175.43.133.38', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764601, '110.81.111.53', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764601, '112.26.237.9', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764602, '121.25.87.1', 1, 'Unknow browser', 'Unknown', '', '', '', '', '/user.php'),
(1465764602, '14.155.233.25', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764604, '124.127.66.105', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764605, '223.215.65.27', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764605, '117.87.178.117', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764606, '123.97.94.246', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764608, '58.35.122.37', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764610, '180.175.7.104', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764610, '125.39.239.77', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764614, '39.69.232.3', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764615, '59.172.10.191', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764615, '118.103.168.26', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764616, '121.225.224.146', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764617, '175.43.133.38', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764618, '110.211.141.156', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764618, '121.207.73.193', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764618, '36.248.246.26', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764619, '218.22.234.177', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764619, '171.11.7.207', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764619, '61.154.34.148', 1, 'Unknow browser', 'Unknown', '', '', '', '', '/user.php'),
(1465764620, '101.81.243.39', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764620, '218.22.234.177', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764623, '124.90.121.146', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764626, '116.21.90.195', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764626, '123.97.94.246', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764627, '113.0.114.128', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764628, '121.207.37.185', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764629, '124.128.223.200', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'ɽ', '', '', '/user.php'),
(1465764630, '218.22.234.177', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764630, '223.86.255.211', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764633, '113.68.216.247', 1, 'Unknow browser', 'Unknown', '', 'IANA', '', '', '/user.php'),
(1465764634, '116.226.243.207', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764636, '123.168.236.60', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'ɽ', '', '', '/user.php'),
(1465764637, '183.52.173.139', 1, 'Unknow browser', 'Unknown', '', '[δ֪IP0801]', '', '', '/user.php'),
(1465764637, '27.18.47.237', 1, 'Unknow browser', 'Unknown', '', 'IANA', '', '', '/user.php'),
(1465764638, '122.246.66.174', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764638, '122.243.148.110', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764640, '113.66.128.108', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764642, '183.46.86.189', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '[δ֪IP0801]', '', '', '/user.php'),
(1465764642, '27.187.8.84', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764644, '218.22.234.177', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764644, '113.241.25.49', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', 'IANA', '', '', '/user.php'),
(1465764645, '116.21.90.195', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php'),
(1465764648, '116.22.165.246', 1, 'Safari 537.36', 'Windows XP', 'zh-cn', '', '', '', '/user.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
