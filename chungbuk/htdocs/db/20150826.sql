-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- 호스트: mysql
-- 생성 시간: 25-06-11 12:09
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
  `userid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`idx`, `userid`, `username`, `content`, `date`) VALUES
(4, 'user', '사용자', '처음 방문했는데, 분위기부터 음식까지 모든 것이 완벽했습니다. 특히 스테이크의 굽기와 소스가 인상적이었고, 직원분들의 세심한 서비스도 감동이었습니다. 다음엔 가족 모임 때 꼭 다시 오고 싶어요!', '2015-08-22 16:03:06'),
(5, 'user2', '이서연', '조용하고 고급스러운 분위기에서 여유롭게 식사할 수 있어 좋았습니다. 디저트까지 정성이 느껴졌고, 커피도 너무 맛있었어요. 특별한 날에 방문하기 좋은 곳입니다.', '2015-08-22 16:03:14'),
(6, 'user3', '김민재', '전체적으로 만족스러웠어요. 음식 플레이팅이 정말 예뻐서 사진 찍는 재미도 있었고, 와인 추천도 센스 있었어요. 다만 예약 시간보다 약간 늦게 자리 안내받은 점이 아쉬웠습니다.', '2015-08-22 16:03:30'),
(7, 'user2', '이서연', '인테리어가 정말 고급스러워서 데이트 장소로 최고였어요. 음식 하나하나가 섬세하게 준비된 느낌이 들었고, 가격 대비 퀄리티도 만족스러웠습니다. 재방문 의사 100%입니다!', '2015-08-23 03:47:41'),
(8, 'user3', '김민재', '조명이 은은해서 분위기가 정말 좋았어요. 오랜만에 조용하고 품격 있는 저녁을 즐겼습니다. 직원분들도 너무 친절하셔서 기분 좋게 식사하고 왔습니다.', '2015-08-23 03:47:49'),
(9, 'user4', '박하늘', '코스 요리를 주문했는데, 식전빵부터 디저트까지 모두 완성도 높았어요. 특히 해산물 요리는 신선함이 느껴졌습니다. 다음에는 부모님과 함께 오고 싶네요.\n\n', '2015-08-23 03:47:56'),
(10, 'user4', '박하늘', '기념일이라 특별한 식사를 원했는데 기대 이상이었어요. 와인 셀렉션도 다양해서 음식과 잘 어울렸습니다. 덕분에 소중한 하루를 더 특별하게 보낼 수 있었어요.', '2015-08-23 03:48:03'),
(21, 'user', '사용자', '예약할 때 창가 자리를 부탁드렸는데, 요청을 잘 반영해주셔서 감사합니다. 음식은 훌륭했고, 분위기도 한적해서 대화 나누기에 좋았습니다. 다음엔 친구들과 함께 올게요.\n\n', '2015-08-23 04:07:05'),
(22, 'user2', '이서연', '서비스가 정말 최고였습니다. 세심하게 챙겨주셔서 편안하게 식사할 수 있었고, 음식도 정갈하게 나와서 만족스러웠습니다. 외국인 손님과 방문해도 자랑스러운 곳이에요.', '2015-08-23 04:07:08'),
(23, 'user3', '김민재', '디저트가 특히 인상 깊었어요. 플레이트에 작은 꽃 장식까지 있어 눈으로 먼저 즐기게 되네요. 다음엔 런치 코스도 도전해보려고요. 추천합니다!', '2015-08-23 04:07:13'),
(24, 'user', '사용자', '분위기, 서비스, 음식 모두 완벽했어요. 조용하게 대화 나누기 좋아서 특별한 날에 딱인 곳이에요. 사진도 예쁘게 나와서 SNS에 올리기도 좋았네요.', '2025-06-11 11:57:34');

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
  `lv` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`, `city`, `district`, `cellular`, `email`, `lv`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', '서울특별시', '종로구', '010-4509-0920', 'admin@admin.com', 'admin'),
(3, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '사용자', '광주광역시', '동구', '010-1234-1234', 'user@user.com', ''),
(4, 'user2', '81dc9bdb52d04dc20036dbd8313ed055', '이서연', '서울특별시', '용산구', '010-1111-1111', 'lsy@lsy.com', ''),
(5, 'user3', '81dc9bdb52d04dc20036dbd8313ed055', '김민재', '인천광역시', '동구', '010-2222-2222', 'kmj@kmj.com', ''),
(6, 'user4', '81dc9bdb52d04dc20036dbd8313ed055', '박하늘', '경기도', '의정부시', '010-3333-3333', 'psky@psky.com', '');

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
  `userid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
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

INSERT INTO `rsv` (`idx`, `userid`, `date`, `time`, `hall`, `seat`, `seat_number`, `menu`, `price`, `d`) VALUES
(33, 'admin', '2015-08-31', 'lunch', 'European Hall', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\"]', 20, ' Course A|1,Course B|2', 550000, '2015-08-30'),
(34, 'admin', '2015-09-03', 'dinner', 'Chinese Hall', '[\"14\",\"15\",\"19\",\"20\"]', 4, ' Course A|1,Course B|1,Course C|1,Course D|1', 550000, '2015-09-01'),
(35, 'admin', '2015-08-25', 'lunch', 'European Hall', '[\"6\",\"7\",\"8\",\"9\"]', 4, ' Course B|2,Course C|1', 530000, '2015-08-22'),
(36, 'admin', '2015-08-23', 'lunch', 'European Hall', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 5, ' Course A|1,Course B|1', 330000, '2015-08-22'),
(37, 'admin', '2015-08-31', 'lunch', 'Japanese Hall', '[\"1\",\"7\",\"13\"]', 3, ' Course A|1,Course B|1', 330000, '2015-08-22'),
(38, 'admin', '2015-08-31', 'dinner', 'Chinese Hall', '[\"5\",\"9\",\"11\",\"13\",\"17\"]', 5, ' Course B|1', 220000, '2015-08-22'),
(39, 'admin', '2015-08-31', 'dinner', 'Japanese Hall', '[\"5\",\"9\",\"11\",\"13\",\"17\"]', 5, ' Course B|1', 220000, '2015-08-22'),
(40, 'admin', '2015-08-25', 'lunch', 'Japanese Hall', '[\"6\",\"7\",\"8\",\"11\",\"12\",\"13\",\"16\",\"17\",\"18\"]', 9, ' Course B|2,Course C|1', 220000, '2015-08-22'),
(41, 'admin', '2015-08-23', 'lunch', 'European Hall', '[\"6\",\"7\",\"8\",\"9\",\"10\"]', 5, ' Course A|1,Course B|1', 330000, '2015-08-22'),
(42, 'user', '2025-06-12', 'lunch', 'European Hall', '[\"1\",\"2\",\"3\"]', 3, ' Course A|1,Course B|1,Course D|1', 460000, '2025-06-11'),
(43, 'user', '2025-06-12', 'lunch', 'European Hall', '[\"13\",\"14\",\"15\"]', 3, ' Course A|1,Course B|1,Course C|1,Course D|1', 620000, '2025-06-11');

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
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 테이블의 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 테이블의 AUTO_INCREMENT `rsv`
--
ALTER TABLE `rsv`
  MODIFY `idx` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
