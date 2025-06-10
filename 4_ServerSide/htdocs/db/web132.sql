-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 17-09-08 11:03
-- 서버 버전: 10.1.21-MariaDB
-- PHP 버전: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `web132`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `application`
--

CREATE TABLE `application` (
  `aidx` int(11) NOT NULL,
  `ridx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `stdate` date NOT NULL,
  `endate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `faq`
--

CREATE TABLE `faq` (
  `fidx` int(11) NOT NULL,
  `midx` int(11) NOT NULL,
  `memo` text NOT NULL,
  `wdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `midx` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `point` double NOT NULL,
  `lv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`midx`, `userid`, `pw`, `username`, `point`, `lv`) VALUES
(1, 'admin', '1234', '관리자', 0, 'admin');

-- --------------------------------------------------------

--
-- 테이블 구조 `room`
--

CREATE TABLE `room` (
  `ridx` int(11) NOT NULL,
  `number` varchar(100) NOT NULL,
  `floor` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `side` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `room`
--

INSERT INTO `room` (`ridx`, `number`, `floor`, `price`, `side`) VALUES
(1, '101', 1, 15000, '바다'),
(2, '103', 1, 15000, '바다'),
(3, '105', 1, 15000, '바다'),
(4, '107', 1, 15000, '바다'),
(5, '109', 1, 15000, '바다'),
(6, '111', 1, 15000, '바다'),
(7, '113', 1, 15000, '바다'),
(8, '115', 1, 15000, '바다'),
(9, '117', 1, 15000, '바다'),
(10, '119', 1, 15000, '바다'),
(11, '102', 1, 10000, '육지'),
(12, '104', 1, 10000, '육지'),
(13, '106', 1, 10000, '육지'),
(14, '108', 1, 10000, '육지'),
(15, '110', 1, 10000, '육지'),
(16, '112', 1, 10000, '육지'),
(17, '114', 1, 10000, '육지'),
(18, '116', 1, 10000, '육지'),
(19, '118', 1, 10000, '육지'),
(20, '120', 1, 10000, '육지'),
(21, '201', 2, 25000, '바다'),
(22, '203', 2, 25000, '바다'),
(23, '205', 2, 25000, '바다'),
(24, '207', 2, 25000, '바다'),
(25, '209', 2, 25000, '바다'),
(26, '211', 2, 25000, '바다'),
(27, '213', 2, 25000, '바다'),
(28, '215', 2, 25000, '바다'),
(29, '217', 2, 25000, '바다'),
(30, '219', 2, 25000, '바다'),
(31, '202', 2, 20000, '육지'),
(32, '204', 2, 20000, '육지'),
(33, '206', 2, 20000, '육지'),
(34, '208', 2, 20000, '육지'),
(35, '210', 2, 20000, '육지'),
(36, '212', 2, 20000, '육지'),
(37, '214', 2, 20000, '육지'),
(38, '216', 2, 20000, '육지'),
(39, '218', 2, 20000, '육지'),
(40, '220', 2, 20000, '육지'),
(41, '301', 3, 35000, '바다'),
(42, '303', 3, 35000, '바다'),
(43, '305', 3, 35000, '바다'),
(44, '307', 3, 35000, '바다'),
(45, '309', 3, 35000, '바다'),
(46, '311', 3, 35000, '바다'),
(47, '313', 3, 35000, '바다'),
(48, '315', 3, 35000, '바다'),
(49, '317', 3, 35000, '바다'),
(50, '319', 3, 35000, '바다'),
(51, '302', 3, 30000, '육지'),
(52, '304', 3, 30000, '육지'),
(53, '306', 3, 30000, '육지'),
(54, '308', 3, 30000, '육지'),
(55, '310', 3, 30000, '육지'),
(56, '312', 3, 30000, '육지'),
(57, '314', 3, 30000, '육지'),
(58, '316', 3, 30000, '육지'),
(59, '318', 3, 30000, '육지'),
(60, '320', 3, 30000, '육지'),
(61, '401', 4, 45000, '바다'),
(62, '403', 4, 45000, '바다'),
(63, '405', 4, 45000, '바다'),
(64, '407', 4, 45000, '바다'),
(65, '409', 4, 45000, '바다'),
(66, '411', 4, 45000, '바다'),
(67, '413', 4, 45000, '바다'),
(68, '415', 4, 45000, '바다'),
(69, '417', 4, 45000, '바다'),
(70, '419', 4, 45000, '바다'),
(71, '402', 4, 40000, '육지'),
(72, '404', 4, 40000, '육지'),
(73, '406', 4, 40000, '육지'),
(74, '408', 4, 40000, '육지'),
(75, '410', 4, 40000, '육지'),
(76, '412', 4, 40000, '육지'),
(77, '414', 4, 40000, '육지'),
(78, '416', 4, 40000, '육지'),
(79, '418', 4, 40000, '육지'),
(80, '420', 4, 40000, '육지'),
(81, '501', 5, 55000, '바다'),
(82, '503', 5, 55000, '바다'),
(83, '505', 5, 55000, '바다'),
(84, '507', 5, 55000, '바다'),
(85, '509', 5, 55000, '바다'),
(86, '511', 5, 55000, '바다'),
(87, '513', 5, 55000, '바다'),
(88, '515', 5, 55000, '바다'),
(89, '517', 5, 55000, '바다'),
(90, '519', 5, 55000, '바다'),
(91, '502', 5, 50000, '육지'),
(92, '504', 5, 50000, '육지'),
(93, '506', 5, 50000, '육지'),
(94, '508', 5, 50000, '육지'),
(95, '510', 5, 50000, '육지'),
(96, '512', 5, 50000, '육지'),
(97, '514', 5, 50000, '육지'),
(98, '516', 5, 50000, '육지'),
(99, '518', 5, 50000, '육지'),
(100, '520', 5, 50000, '육지');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`aidx`);

--
-- 테이블의 인덱스 `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`fidx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`midx`);

--
-- 테이블의 인덱스 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ridx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `application`
--
ALTER TABLE `application`
  MODIFY `aidx` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `faq`
--
ALTER TABLE `faq`
  MODIFY `fidx` int(11) NOT NULL AUTO_INCREMENT;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `midx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 테이블의 AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `ridx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
