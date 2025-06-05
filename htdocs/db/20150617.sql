-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-07-10 08:03
-- 서버 버전: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `20150617`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `cidx` int(11) NOT NULL AUTO_INCREMENT,
  `carname` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `fuel` varchar(100) NOT NULL,
  `carnumber` varchar(100) NOT NULL,
  PRIMARY KEY (`cidx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=217 ;

--
-- 테이블의 덤프 데이터 `car`
--

INSERT INTO `car` (`cidx`, `carname`, `color`, `fuel`, `carnumber`) VALUES
(145, '에쿠스/Equss', '검정', '휘발유', '82허2252'),
(146, '에쿠스/Equss', '검정', '경유', '96허3780'),
(147, '에쿠스/Equss', '검정', '하이브리드', '68허8185'),
(148, '에쿠스/Equss', '흰색', '휘발유', '72허6271'),
(149, '에쿠스/Equss', '흰색', '경유', '72허8020'),
(150, '에쿠스/Equss', '흰색', '하이브리드', '72허1268'),
(151, '에쿠스/Equss', '회색', '휘발유', '85허5271'),
(152, '에쿠스/Equss', '회색', '경유', '36허2555'),
(153, '에쿠스/Equss', '회색', '하이브리드', '35허3917'),
(154, '에쿠스/Equss', '빨간색', '휘발유', '30허5299'),
(155, '에쿠스/Equss', '빨간색', '경유', '67허9945'),
(156, '에쿠스/Equss', '빨간색', '하이브리드', '72허2238'),
(157, '제네시스/Genesis', '검정', '휘발유', '85허3774'),
(158, '제네시스/Genesis', '검정', '경유', '76허4542'),
(159, '제네시스/Genesis', '검정', '하이브리드', '86허7072'),
(160, '제네시스/Genesis', '흰색', '휘발유', '76허3299'),
(161, '제네시스/Genesis', '흰색', '경유', '41허1575'),
(162, '제네시스/Genesis', '흰색', '하이브리드', '55허5657'),
(163, '제네시스/Genesis', '회색', '휘발유', '25허3751'),
(164, '제네시스/Genesis', '회색', '경유', '78허9257'),
(165, '제네시스/Genesis', '회색', '하이브리드', '32허7543'),
(166, '제네시스/Genesis', '빨간색', '휘발유', '49허5150'),
(167, '제네시스/Genesis', '빨간색', '경유', '19허3356'),
(168, '제네시스/Genesis', '빨간색', '하이브리드', '25허7658'),
(169, '그랜져/Grandeur', '검정', '휘발유', '79허5942'),
(170, '그랜져/Grandeur', '검정', '경유', '18허5982'),
(171, '그랜져/Grandeur', '검정', '하이브리드', '97허6702'),
(172, '그랜져/Grandeur', '흰색', '휘발유', '26허8016'),
(173, '그랜져/Grandeur', '흰색', '경유', '31허7676'),
(174, '그랜져/Grandeur', '흰색', '하이브리드', '76허1211'),
(175, '그랜져/Grandeur', '회색', '휘발유', '38허4826'),
(176, '그랜져/Grandeur', '회색', '경유', '13허7679'),
(177, '그랜져/Grandeur', '회색', '하이브리드', '99허6962'),
(178, '그랜져/Grandeur', '빨간색', '휘발유', '99허2587'),
(179, '그랜져/Grandeur', '빨간색', '경유', '77허4582'),
(180, '그랜져/Grandeur', '빨간색', '하이브리드', '53허8621'),
(181, '소나타/Sonata', '검정', '휘발유', '44허1104'),
(182, '소나타/Sonata', '검정', '경유', '11허2294'),
(183, '소나타/Sonata', '검정', '하이브리드', '66허5300'),
(184, '소나타/Sonata', '흰색', '휘발유', '26허7422'),
(185, '소나타/Sonata', '흰색', '경유', '46허8355'),
(186, '소나타/Sonata', '흰색', '하이브리드', '20허2861'),
(187, '소나타/Sonata', '회색', '휘발유', '21허4481'),
(188, '소나타/Sonata', '회색', '경유', '97허6343'),
(189, '소나타/Sonata', '회색', '하이브리드', '20허1819'),
(190, '소나타/Sonata', '빨간색', '휘발유', '32허8166'),
(191, '소나타/Sonata', '빨간색', '경유', '14허5386'),
(192, '소나타/Sonata', '빨간색', '하이브리드', '68허4801'),
(193, '싼타페/Santafe', '검정', '휘발유', '75허9312'),
(194, '싼타페/Santafe', '검정', '경유', '28허8286'),
(195, '싼타페/Santafe', '검정', '하이브리드', '34허7402'),
(196, '싼타페/Santafe', '흰색', '휘발유', '35허3916'),
(197, '싼타페/Santafe', '흰색', '경유', '11허4061'),
(198, '싼타페/Santafe', '흰색', '하이브리드', '29허5695'),
(199, '싼타페/Santafe', '회색', '휘발유', '75허8323'),
(200, '싼타페/Santafe', '회색', '경유', '40허3502'),
(201, '싼타페/Santafe', '회색', '하이브리드', '23허5834'),
(202, '싼타페/Santafe', '빨간색', '휘발유', '64허4850'),
(203, '싼타페/Santafe', '빨간색', '경유', '40허1419'),
(204, '싼타페/Santafe', '빨간색', '하이브리드', '42허1024'),
(205, '그랜드 스타렉스/Grand Starex', '검정', '휘발유', '99허5624'),
(206, '그랜드 스타렉스/Grand Starex', '검정', '경유', '73허1414'),
(207, '그랜드 스타렉스/Grand Starex', '검정', '하이브리드', '97허4989'),
(208, '그랜드 스타렉스/Grand Starex', '흰색', '휘발유', '33허1821'),
(209, '그랜드 스타렉스/Grand Starex', '흰색', '경유', '18허8533'),
(210, '그랜드 스타렉스/Grand Starex', '흰색', '하이브리드', '83허6699'),
(211, '그랜드 스타렉스/Grand Starex', '회색', '휘발유', '73허2185'),
(212, '그랜드 스타렉스/Grand Starex', '회색', '경유', '41허1236'),
(213, '그랜드 스타렉스/Grand Starex', '회색', '하이브리드', '92허3852'),
(214, '그랜드 스타렉스/Grand Starex', '빨간색', '휘발유', '68허4771'),
(215, '그랜드 스타렉스/Grand Starex', '빨간색', '경유', '26허7908'),
(216, '그랜드 스타렉스/Grand Starex', '빨간색', '하이브리드', '69허7439');

-- --------------------------------------------------------

--
-- 테이블 구조 `main3sub1`
--

CREATE TABLE IF NOT EXISTS `main3sub1` (
  `midx` int(11) NOT NULL AUTO_INCREMENT,
  `carname` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `fuel` varchar(100) NOT NULL,
  `carnumber` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `st_date` date NOT NULL,
  `en_date` date NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`midx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `main3sub1`
--

INSERT INTO `main3sub1` (`midx`, `carname`, `color`, `fuel`, `carnumber`, `userid`, `st_date`, `en_date`, `date`) VALUES
(1, '그랜져/Grandeur', '검정', '경유', '18허5982', 'admin', '2015-06-23', '2015-06-29', '2015-06-22'),
(2, '그랜드 스타렉스/Grand Starex', '흰색', '경유', '18허8533', 'admin', '2015-06-24', '2015-06-30', '2015-06-22'),
(3, '그랜져/Grandeur', '검정', '하이브리드', '97허6702', 'admin', '2015-06-24', '2015-06-30', '2015-06-22');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `cellular` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lv` varchar(100) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `cellular`, `email`, `lv`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '비공개', '비공개', '관리자'),
(3, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '12354', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(100) NOT NULL,
  `child` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `contents` text NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`idx`, `parent`, `child`, `title`, `contents`, `type`) VALUES
(1, '0', 'main1', '회사소개', '', ''),
(2, 'main1', 'sub1', '회사소개', '', 'index'),
(3, 'main1', 'sub2', '찾아오시는 길', '', 'index'),
(4, '0', 'main2', '대여가이드', '', ''),
(5, 'main2', 'sub1', '대여안내', '', 'index'),
(6, 'main2', 'sub2', '차량안내', '', 'index'),
(7, '0', 'main3', '온라인예약', '', ''),
(8, 'main3', 'sub1', '예약하기', '', 'index'),
(9, 'main3', 'sub2', '예약목록', '', 'index'),
(10, '0', 'main4', '차량검색', '', 'index'),
(11, 'main4', 'search', '차량검색', '', 'index'),
(12, '1', 'default', '기타페이지', '', 'index'),
(13, 'default', 'join', '회원가입', '', 'index'),
(14, '2', 'admin', '관리자페이지', '', ''),
(15, 'admin', 'slide', '애니메이션 관리 페이지', '', 'index');

-- --------------------------------------------------------

--
-- 테이블 구조 `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `sidx` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`sidx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 테이블의 덤프 데이터 `slide`
--

INSERT INTO `slide` (`sidx`, `file`, `type`) VALUES
(1, 'slide1.jpg', 1),
(2, 'slide2.jpg', 1),
(3, 'slide3.jpg', 1),
(27, '20150624_13976.jpg', 0),
(28, '20150624_27649.jpg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
