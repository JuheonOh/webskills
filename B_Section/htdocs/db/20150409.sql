-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-04-10 03:28
-- 서버 버전: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `20150409`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `ep`
--

CREATE TABLE IF NOT EXISTS `ep` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 테이블의 덤프 데이터 `ep`
--

INSERT INTO `ep` (`idx`, `title`, `number`) VALUES
(1, '국화체험', 5);

-- --------------------------------------------------------

--
-- 테이블 구조 `ep_list`
--

CREATE TABLE IF NOT EXISTS `ep_list` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `edate` date NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `ep_list`
--

INSERT INTO `ep_list` (`idx`, `userid`, `title`, `number`, `edate`, `date`) VALUES
(1, 'admin', '국화축제', 4, '2015-04-10', '2015-04-09'),
(2, 'test', '국화축제', 1, '2015-04-08', '2015-04-09'),
(3, 'test', '국화축제', 2, '2015-04-08', '2015-04-09');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `lv` varchar(100) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`, `email`, `code`, `lv`) VALUES
(14, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', 'admin@admin.com', '59f5f', '관리자'),
(18, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '테스터', 'tester@test.com', '1d81f', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(100) NOT NULL,
  `child` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`idx`, `parent`, `child`, `title`, `content`, `type`) VALUES
(1, '0', 'main1', '축제안내', '', 'index'),
(2, '0', 'main2', '오시는길', '', 'index'),
(3, '0', 'main3', '체험신청', '', 'index'),
(4, '0', 'main4', '체험신청목록', '', 'index'),
(5, '0', 'main5', '커뮤니티', '', 'index'),
(6, '1', 'join', '회원가입', '', 'index'),
(7, '1', 'edit', '회원정보수정', '', 'index');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
