-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: mysql
-- 생성 시간: 25-06-05 11:02
-- 서버 버전: 9.3.0
-- PHP 버전: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `20150826`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `idx` int NOT NULL,
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`idx`, `id`, `name`, `content`, `date`) VALUES
(4, 'admin', '관리자', '하하하하 심심한 내 하루하루...', '2015-08-22 16:03:06'),
(5, 'admin', '관리자', '오늘도 내일도 힘냅시다. 화이팅', '2015-08-22 16:03:14'),
(6, 'admin', '관리자', '가시처럼 깊게 박힌 기억은', '2015-08-22 16:03:30'),
(7, 'admin', '관리자', '밥먹고싶다.', '2015-08-23 03:47:41'),
(8, 'admin', '관리자', '진짜 배고프다.', '2015-08-23 03:47:49'),
(9, 'admin', '관리자', '먹을것도 없는데', '2015-08-23 03:47:56'),
(10, 'admin', '관리자', '말하는거 다쓰게?', '2015-08-23 03:48:03'),
(21, 'admin', '관리자', 'a', '2015-08-23 04:07:05'),
(22, 'admin', '관리자', 'b', '2015-08-23 04:07:08'),
(23, 'admin', '관리자', 'c', '2015-08-23 04:07:13');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int NOT NULL,
  `userid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pw` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `district` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cellular` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `lv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`, `city`, `district`, `cellular`, `email`, `lv`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', '서울특별시', '종로구', '010-4509-0920', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE `menu` (
  `idx` int NOT NULL,
  `turn` int NOT NULL,
  `parent` varchar(255) NOT NULL,
  `child` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`idx`, `turn`, `parent`, `child`, `title`, `content`, `type`) VALUES
(1, 1, '0', 'main1', '인사말', '', ''),
(2, 2, '0', 'main2', '메뉴 소개', '', ''),
(3, 3, '0', 'main3', '레스토랑 예약', '', ''),
(4, 4, '0', 'main4', '고객리뷰', '', ''),
(5, 0, 'main1', 'sub1', '인사말', '', 'index'),
(6, 1, 'main1', 'sub2', '레스토랑 소개', '', 'index'),
(7, 2, 'main1', 'sub3', '오시는 길', '', 'index'),
(8, 0, 'main2', 'sub1', 'CHEF 추천요리', '', 'index'),
(9, 1, 'main2', 'sub2', '특선요리', '', 'index'),
(10, 0, 'main3', 'sub1', '예약하기', '', 'index'),
(11, 1, 'main3', 'sub2', '예약조회', '', 'index'),
(12, 0, 'main4', 'sub1', '고객리뷰', '', 'index'),
(13, 0, '1', 'default', '기타페이지', '', ''),
(14, 0, 'default', 'sitemap', 'sitemap', '', 'index'),
(15, 0, 'default', 'member_info', '회원정보보기', '', 'index'),
(16, 0, 'default', 'login', '로그인', '', 'index'),
(17, 0, '0', 'main', 'HOME', '', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `rsv`
--

CREATE TABLE `rsv` (
  `idx` int NOT NULL,
  `id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `hall` varchar(255) NOT NULL,
  `seat` text NOT NULL,
  `seat_number` int NOT NULL,
  `menu` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `d` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `rsv`
--

INSERT INTO `rsv` (`idx`, `id`, `date`, `time`, `hall`, `seat`, `seat_number`, `menu`, `price`, `d`) VALUES
(33, 'admin', '2015-08-31', 'lunch', 'European Hall', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]', 20, ' Course A|1,Course B|2', 550000, '2015-08-30'),
(34, 'admin', '2015-09-03', 'dinner', 'Chinese Hall', '[\"14\",\"15\",\"19\",\"20\"]', 4, ' Course A|1,Course B|1,Course C|1,Course D|1', 550000, '2015-09-01'),
(35, 'admin', '2015-08-25', 'lunch', 'European Hall', '[\"6\",\"7\",\"8\",\"9\"]', 4, ' Course B|2,Course C|1', 530000, '2015-08-22'),
(36, 'admin', '2015-08-23', 'lunch', 'European Hall', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 5, ' Course A|1,Course B|1', 330000, '2015-08-22'),
(37, 'admin', '2015-08-31', 'lunch', 'Japanese Hall', '[\"1\",\"7\",\"13\"]', 3, ' Course A|1,Course B|1', 330000, '2015-08-22'),
(38, 'admin', '2015-08-31', 'dinner', 'Chinese Hall', '[\"5\",\"9\",\"11\",\"13\",\"17\"]', 5, ' Course B|1', 220000, '2015-08-22'),
(39, 'admin', '2015-08-31', 'dinner', 'Japanese Hall', '[\"5\",\"9\",\"11\",\"13\",\"17\"]', 5, ' Course B|1', 220000, '2015-08-22'),
(40, 'admin', '2015-08-25', 'lunch', 'Japanese Hall', '[\"6\",\"7\",\"8\",\"11\",\"12\",\"13\",\"16\",\"17\",\"18\"]', 9, ' Course B|2,Course C|1', 220000, '2015-08-22'),
(41, 'admin', '2015-08-23', 'lunch', 'European Hall', '[\"6\",\"7\",\"8\",\"9\",\"10\"]', 5, ' Course A|1,Course B|1', 330000, '2015-08-22');

--
-- 덤프된 테이블의 인덱스
--

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
-- 테이블의 인덱스 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `rsv`
--
ALTER TABLE `rsv`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `rsv`
--
ALTER TABLE `rsv`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
