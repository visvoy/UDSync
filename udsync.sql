-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2012 年 12 月 31 日 14:12
-- 伺服器版本: 5.5.20
-- PHP 版本: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `udsync`
--

-- --------------------------------------------------------

--
-- 表的結構 `ud_applications`
--

CREATE TABLE IF NOT EXISTS `ud_applications` (
  `app_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_domain` text NOT NULL,
  `app_key` text NOT NULL,
  `app_date` date NOT NULL,
  PRIMARY KEY (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `ud_applications`
--

INSERT INTO `ud_applications` (`app_id`, `app_domain`, `app_key`, `app_date`) VALUES
(1, 'http://localhost:8081/', 'C00BC1299358FCF95C4DC454E15BDD0F', '2012-12-31');

-- --------------------------------------------------------

--
-- 表的結構 `ud_sessions`
--

CREATE TABLE IF NOT EXISTS `ud_sessions` (
  `ud_username` text NOT NULL,
  `ud_timestamp` date NOT NULL,
  `ud_hash` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的結構 `ud_users`
--

CREATE TABLE IF NOT EXISTS `ud_users` (
  `user_uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_register_date` date NOT NULL,
  PRIMARY KEY (`user_uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='All user''s data were saved here.' AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `ud_users`
--

INSERT INTO `ud_users` (`user_uid`, `user_name`, `user_email`, `user_password`, `user_register_date`) VALUES
(1, 'admin', 'brian6417@gmail.com', '123456', '2012-12-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
