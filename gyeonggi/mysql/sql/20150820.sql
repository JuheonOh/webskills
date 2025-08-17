-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: mysql
-- 생성 시간: 25-08-17 06:26
-- 서버 버전: 9.3.0
-- PHP 버전: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `20150820`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `food`
--

CREATE TABLE `food` (
  `idx` int NOT NULL,
  `ridx` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `food`
--

INSERT INTO `food` (`idx`, `ridx`, `name`, `number`, `cost`) VALUES
(17, 14, '커피를 갈아 만든 소프트 케잌', 4, 11000),
(18, 15, '7성급 주방장이 만든 LA 폭립구이', 2, 23500),
(19, 16, '제빵 명장이 만드는 초코 케이크', 2, 13000),
(20, 16, '자연의 색차가 싱그러운 야채쌈', 1, 6500),
(21, 17, '제빵 명장이 만드는 초코 케이크', 2, 13000),
(22, 17, '자연의 색차가 싱그러운 야채쌈', 1, 6500),
(23, 18, '커피를 갈아 만든 소프트 케잌', 3, 11000),
(24, 19, '7성급 주방장이 만든 LA 폭립구이', 1, 23500),
(25, 19, '제빵 명장이 만드는 초코 케이크', 1, 13000),
(26, 19, '추운 칼바람을 맞고 자란 딸기 디저트', 1, 7700);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int NOT NULL,
  `userid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pw` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `lv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`, `lv`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', '관리자'),
(2, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '일반회원', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE `menu` (
  `idx` int NOT NULL,
  `parent` varchar(255) NOT NULL,
  `child` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`idx`, `parent`, `child`, `title`, `content`, `type`) VALUES
(1, '0', 'main1', '레스토랑', '', 'index'),
(2, '0', 'main2', '메뉴소개', '', 'index'),
(3, '0', 'main3', '온라인 예약', '', 'index'),
(4, '0', 'main4', '이용후기', '', 'index'),
(5, '0', 'main5', '예약현황', '', 'index'),
(6, '1', 'reservation_status', '내 예약현황', '', 'index');

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `idx` int NOT NULL,
  `ridx` int NOT NULL,
  `memo` text NOT NULL,
  `mark` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `review`
--

INSERT INTO `review` (`idx`, `ridx`, `memo`, `mark`) VALUES
(1, 14, 'ABDa', 5),
(2, 15, '굳', 5),
(3, 18, '나이스', 5);

-- --------------------------------------------------------

--
-- 테이블 구조 `rsv`
--

CREATE TABLE `rsv` (
  `idx` int NOT NULL,
  `userid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `room` varchar(255) NOT NULL,
  `room_cost` int NOT NULL,
  `redate` date NOT NULL,
  `st_time` time NOT NULL,
  `en_time` time NOT NULL,
  `date` date NOT NULL,
  `review` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `rsv`
--

INSERT INTO `rsv` (`idx`, `userid`, `room`, `room_cost`, `redate`, `st_time`, `en_time`, `date`, `review`) VALUES
(14, 'admin', '모던한 식기가 가지런한 옥내 테이블', 120000, '2015-08-16', '09:00:00', '11:00:00', '2015-08-18', 1),
(15, 'test', '모던한 식기가 가지런한 옥내 테이블', 120000, '2025-08-15', '09:00:00', '11:00:00', '2025-08-16', 1),
(16, 'test', '모던한 식기가 가지런한 옥내 테이블', 120000, '2025-08-15', '09:00:00', '11:00:00', '2025-08-16', 0),
(17, 'test', '모던한 식기가 가지런한 옥내 테이블', 120000, '2025-08-20', '15:00:00', '17:00:00', '2025-08-16', 0),
(18, 'test', '맛있는 고기와 함께하는 옥외 테이블', 150000, '2025-08-16', '12:00:00', '14:00:00', '2025-08-16', 1),
(19, 'test', '모던한 식기가 가지런한 옥내 테이블', 120000, '2025-08-17', '09:00:00', '11:00:00', '2025-08-17', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `food`
--
ALTER TABLE `food`
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
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
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
-- 테이블의 AUTO_INCREMENT `food`
--
ALTER TABLE `food`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `rsv`
--
ALTER TABLE `rsv`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
