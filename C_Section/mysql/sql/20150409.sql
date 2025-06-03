-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-04-10 09:34
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
-- 테이블 구조 `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`idx`, `subject`, `name`, `date`) VALUES
(1, '2014함평국향대전"유튜브"로보세요', '정기수', '2014-11-06'),
(2, '애완견출입문의요', '고영자', '2014-11-01'),
(3, '폐막이후국향대전 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다.', '김성백', '2013-11-11'),
(4, '폐막이후국향대전 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다.', '관광진흥담당', '2013-11-12'),
(5, '조관후꽃밭에서 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다. 긴글자 컨텐츠 입니다.', '오경애', '2013-11-04'),
(6, '궁금합니다', '박숙희', '2013-11-03'),
(7, '궁금합니다', '관광진흥담당', '2013-11-04'),
(8, '애완견출입이가능한가요?', '김현우', '2013-11-01'),
(9, '시형무역스카프.헬로키티.문구.완구.머리끈', '조성태', '2013-11-01'),
(10, '국향대전개화상태알고싶습니다.', '문철원', '2013-10-31'),
(11, '국향대전개화상태알고싶습니다.', '관광진흥담당', '2013-11-01'),
(12, '야간오픈', '관광진흥담당', '2013-10-26'),
(13, '관람중문의드립니다.', '박시진', '2013-10-25'),
(14, '흥담당관람중문의드립니다.', '관광진', '2013-10-25'),
(15, '여행문의', '이종국', '2012-10-31'),
(16, '흥담당여행문의', '관광진', '2012-10-31'),
(17, '체험활동', '정다정', '2012-10-29'),
(18, '체험활동', '관광진흥담당', '2012-10-30'),
(19, '행사장관련', '김은이', '2012-10-29'),
(20, '흥담당행사장관련', '관광진', '2012-10-30'),
(21, '주차장은여유있나요2', '정영균', '2012-10-26'),
(22, '흥담당주차장은여유있나요', '관광진', '2012-10-26'),
(23, '개장시간은몇시인가요?', '권성호', '2012-10-25'),
(24, '행사연예인공연팀섭외정보원스톱OK', '정재근', '2013-10-23'),
(25, '문의잇습니다', '전호성', '2013-10-23'),
(26, '“개인회생”및“파산”에대한무료상담…', '김남윤', '2013-10-22'),
(27, '*가수"Yuri.유리"섭외문의처입니다. ', '이민섭', '2013-10-10'),
(28, '쿠폰???', '김홍수', '2013-09-30'),
(29, '쿠폰???', '관광진흥담당', '2013-10-14'),
(30, '<2012대한민국국향대전>홈페이지정보…', '오유진', '2012-11-06'),
(31, '<2012대한민국국향대전>홈페이지정보…', '관광진흥담당', '2012-11-07'),
(32, '문의사항입니다.', '김혜민', '2012-11-06'),
(33, '흥담당문의사항입니다.', '관광진', '2012-11-07'),
(34, '축제기간후관람관련문의입니다', '강경진', '2012-11-05'),
(35, '흥담당축제기간후관람관련문의입니다', '관광진', '2012-11-06'),
(36, '함평국향대전인근의펜션을소개합니다.', '박설희', '2012-11-01'),
(37, '곤충생태학교프로그램', '정다정', '2012-10-31'),
(38, '흥담당곤충생태학교프로그램', '관광진', '2012-10-31'),
(39, '흥담당개장시간은몇시인가요?', '관광진', '2012-10-26'),
(40, '입장권문의드립니다^^', '이광진', '2012-10-24'),
(41, '흥담당입장권문의드립니다^^', '관광진', '2012-10-26'),
(42, '국향대전교통편문의', '주선홍', '2012-10-21'),
(43, '국향대전교통편문의', '관광진흥담당', '2012-10-24'),
(44, '문의합니다', '김혜화', '2012-10-20'),
(45, '흥담당문의합니다', '관광진', '2012-10-24'),
(46, '문의합니다', '김윤환', '2012-10-11'),
(47, '흥담당문의합니다', '관광진', '2012-10-12'),
(48, '2012국향대전개장시간문의', '김서영', '2012-10-08'),
(49, '2012국향대전개장시간문의', '관광진흥담당', '2012-10-12'),
(50, '아름다운소리"오카리나"', '고진명', '2012-09-21'),
(51, '퓨전댄스공연팀입니다!', '김부철', '2012-09-13'),
(52, '국향대전축제문의', '조성지', '2012-07-19'),
(53, '국향대전축제문의', '관광진흥담당', '2012-09-10');

-- --------------------------------------------------------

--
-- 테이블 구조 `ep`
--

CREATE TABLE IF NOT EXISTS `ep` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `ep`
--

INSERT INTO `ep` (`idx`, `title`, `number`) VALUES
(1, '국화체험', 5),
(2, '국화그리기', 5),
(3, '국화디자인', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 테이블의 덤프 데이터 `ep_list`
--

INSERT INTO `ep_list` (`idx`, `userid`, `title`, `number`, `edate`, `date`) VALUES
(6, 'admin', '국화축제', 5, '2015-04-16', '2015-04-10'),
(7, 'admin', '국화 그리기', 2, '2015-04-17', '2015-04-10'),
(8, 'test', '국향축제', 3, '2015-04-16', '2015-04-10'),
(9, 'test', '국화디자인', 4, '2015-04-16', '2015-04-10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

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
