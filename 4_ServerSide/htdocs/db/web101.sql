-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 17-04-07 03:18
-- 서버 버전: 10.1.10-MariaDB
-- PHP 버전: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `web101`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `board`
--

CREATE TABLE `board` (
  `idx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `title` text NOT NULL,
  `contents` text NOT NULL,
  `cat` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `board`
--

INSERT INTO `board` (`idx`, `midx`, `title`, `contents`, `cat`, `file`, `date`) VALUES
(1, 1, '첫번째 글의 제목 입니다.', '첫번째 글의 내용 입니다.', 'life', '', '2017-04-07 10:02:35'),
(2, 1, '두번째 글의 제목 입니다.', '두번째 글의 내용 입니다.', 'life', '', '2017-04-07 10:02:47'),
(3, 1, '세번째 글의 제목 입니다.', '세번째 글의 내용 입니다.', 'life', '', '2017-04-07 10:02:58'),
(4, 1, '네번째 글의 제목 입니다.', '세번째 글의 내용입니다.', 'life', '', '2017-04-07 10:03:06'),
(5, 1, '다섯번째 글의 제목입니다.', '다섯번째 글의 내용입니다.', 'life', '', '2017-04-07 10:03:38'),
(6, 1, '여섯번째 글의 제목입니다.', '여섯번째 글의 내용입니다.', 'life', '', '2017-04-07 10:03:52'),
(7, 1, '일곱번째 글의 제목입니다.', '일곱번째 글의 내용입니다.', 'life', '', '2017-04-07 10:05:49'),
(8, 1, '여덟번째 글의 제목입니다.', '여덟번째 글의 내용입니다.', 'art', '20170407-100658_sample2.jpg', '2017-04-07 10:06:05'),
(9, 1, '아홉번째 글 제목입니다.', '아홉번째 글 본문입니다.', 'etcs', '20170407-101540_sample2.jpg', '2017-04-07 10:15:40'),
(10, 1, '열 번째 글 제목입니다.', '열 번째 글 내용입니다.', 'fashion', '', '2017-04-07 10:16:07'),
(11, 1, '열 한 번째 글 제목입니다.', '열 한 번째 글 본문입니다.', 'technics', '', '2017-04-07 10:16:21');

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `idx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `bidx` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`) VALUES
(1, 'user@user.com', '1234', '사용자');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
