-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- 생성 시간: 16-06-07 14:35
-- 서버 버전: 10.1.13-MariaDB
-- PHP 버전: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `20160407`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `comment`
--

CREATE TABLE `comment` (
  `idx` int(11) NOT NULL,
  `nidx` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `comment`
--

INSERT INTO `comment` (`idx`, `nidx`, `username`, `comment`, `date`) VALUES
(1, '8', 'admin', 'awetawetawet', '2016-06-07 17:31:47'),
(2, '8', 'admin', 'wer\r\nawer\r\nawer\r\naw\r\nera\r\nwera', '2016-06-07 17:43:09'),
(3, '8', 'admin', 'ㅁㅈㄷㅅ', '2016-06-07 17:54:50'),
(4, '17', 'admin', '모두 사라지지 않겠죠 우릴 스치는 안개처럼', '2016-06-07 17:58:01'),
(5, '17', 'admin', '아무것도 묻지 않을게요', '2016-06-07 17:58:10'),
(6, '17', 'admin', '이대로 묻어둘래요 나는요', '2016-06-07 17:58:16'),
(7, '17', 'admin', '거짓말 처럼 또 하루가 사라지겠죠', '2016-06-07 17:58:25'),
(8, '17', 'admin', '말할 수 없어서', '2016-06-07 18:02:56'),
(9, '6', 'admin', 'ㅁㅈㄷㄱ', '2016-06-07 18:03:42');

-- --------------------------------------------------------

--
-- 테이블 구조 `educate`
--

CREATE TABLE `educate` (
  `idx` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `st_date` date NOT NULL,
  `en_date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `educate`
--

INSERT INTO `educate` (`idx`, `title`, `info`, `teacher`, `code`, `st_date`, `en_date`, `image`) VALUES
(1, '웹표준 퍼블리싱', '"어느 순간 단어 자체가 웹 저작기술인 듯 되어버린 ''웹표준''의 시작은 그 누구든 원하는 웹 콘텐츠에 접근하여 제대로 누릴 수 있도록 하자는 ''약속''이었습니다. 다시 말해, ''웹표준 퍼블리싱''을 완벽히 구현하려면 우선 그 이유가 되었던 ''접근성''의 개념과 기준을 먼저 알고, 이를 위해 변경된 여러 요소들의 활용을 이해해야 합니다. 진정한 크로스브라우징을 위한 HTML5와 CSS3의 작성법뿐 아니라 디바이스 간의 경계를 허물어 준 반응형 웹 기술과 프레임워크까지, 이제 누구나 데스크탑과 모바일 환경을 아우르는 표준화된 웹퍼블리싱을 제대로 시작할 수 있습니다."', '우강사', 'M02P80', '2016-05-07', '2018-03-10', '1.jpg'),
(2, 'HTML5', '"HTML5, CSS3 입문을 위한 간결하고 쉬운 설명이 특징입니다. HTML5는 단순히 HTML 태그만이 아니라 CSS3와 JavaScript를 종합적으로 포함한 기술로, 지금까지는 애드온 등에 의존해 왔던 많은 다양한 기능들이 HTML5로 가능해졌습니다. HTML의 기본적인 내용과 더불어 HTML5에 새로 도입된 기술들을 다양한 예제로 경험하고, 다이나믹하고 화려하면서 빠른 사이트를 만들기 위해 필요한 기술을 경험할 수 있습니다. "', '김강사', 'M01H71', '2014-09-25', '2014-10-01', '2.jpg'),
(3, 'HTML과 드림위버', '"간단한 웹문서에서 고급 기능을 구현한 문서는 물론 사이트 관리에서도 탁월한 성능을 발휘하는 최고의 웹에디터 프로그램입니다. 다른 에디터 프로그램과는 달리 지속적인 기능추가로 신기술을 바로 사용할 수 있으며, 초보자도 쉽게 자바스크립트를 이용할 수 있습니다. "', '권강사', 'M01D72', '2015-11-01', '2015-11-07', '3.jpg'),
(4, 'jQuery', '"프로그래밍을 잘 모르는 웹 디자이너와 웹 퍼블리셔, jQuery를 처음 배우는 개발자가 이해할 수 있는 수준으로 jQuery의 기초를 설명합니다. jQuery의 기본 개념을 그림으로 풀이한 도해를 적극적으로 이용하여 어렵고 딱딱하기만 했던 프로그래밍 개념을 편하고 재미있게 실무에서 익힐 수 있도록 해줍니다."', '유강사', 'M03J99', '2014-07-21', '2014-07-27', '4.jpg'),
(5, 'Interactive Portfolio', '"웹표준 퍼블리싱 기술에 익숙한 학습자를 대상으로 기본과정이 집약된 상호작용형태의 실전, 포토샵 전문 아트웍, 타이포 효과, 웹페이지 제작, UX를 고려한 UI 피드백 구현을 목표로 합니다."', '이강사', 'M04P91', '2015-07-02', '2015-07-08', '5.jpg'),
(6, '포토샵', '"기능 설명을 위한 단순 예제를 무작정 따라해서는 실무 감각을 익히기 어렵습니다. 실무에서 실력을 발휘하려면 디자인 사무실에서 많이 쓰이는 실무 예제를 경험해보아야 합니다. 다양한 실무형 예제는 물론, 선배 어깨너머로 배워야 했던 궁극의 디자인 노하우를 설명합니다."', '함강사', 'M03S88', '2013-04-11', '2013-04-17', '6.jpg'),
(7, '일러스트레이터', '"전문 디자이너들이 포토샵과 함께 일러스트레이터를 쓰는 이유는 작업물에 따라 일러스트레이터가 훨씬 효과적일 때가 많기 때문입니다. 일러스트레이터를 이용하면 빠르고 쉽게 완성도 높은 이미지를 만들 수 있습니다. 간혹 일러스트레이터를 그리기 툴로 잘못 아는 경우가 많은데 일러스트레이터 기능 중 그리기 기능은 일부일 뿐입니다. 물론 드로잉 실력이 있다면 더 빠르게 이미지를 만들 순 있습니다. 하지만 드로잉 실력이 없는 사람도 기본 툴과 기능만으로도 완성도 높은 이미지를 빠르게 만들어낼 수 있습니다."', '조강사', 'M02I33', '2015-10-06', '2015-10-12', '7.jpg'),
(8, '웹표준＆접근성', '"W3C의 HTML, XHTML, CSS의 구현 스펙을 지원하는 브라우저들이 늘어나고 있습니다. 브라우저의 종류와 관계없이 상호 호환성을 유지할 수 있는 최신 웹표준기술 적용하여 접근성 높은 페이지를 제작할 수 있습니다. 레이아웃 요소와 데이터 요소를 분리하여 홈페이지를 구성할 수 있는 CSS와 웹표준을 완벽히 준수하여 페이지를 제작하는 방법을 배울 수 있습니다."', '손강사', 'M57W81', '2016-03-10', '2016-03-13', '8.jpg'),
(9, 'J-Query & JavaScript', '"모바일과 웹 양쪽 모두의 사이트에서 플래시와 액션스크립트를 대신할 수 있는 웹디자인의 신기술입니다. 객체지향 스크립트의 이해, 플래시에 의존하지 않은 웹사이트의 동적인 구성 및 요소를 추가하는 것이 가능하고 브라우저간의 호환성 또한 강력합니다. 웹디자이너로서 웹표준 코딩과 함께 필수로 익혀야 할 신기술이며 기존 Javascript의 공동 활용으로 더욱 힘을 얻고 있는 개발기술이기도 합니다."', '최강사', 'M22Q99', '2016-02-15', '2016-02-20', '9.jpg'),
(10, '테스트', 'awetaetawtawetawtawetawetawetawet\r\n\r\ndrty\r\ndrty\r\ndrt\r\nyd\r\n\r\ndrty\r\n\r\n"우리"\r\n\r\ndrty', 'awetjh', 'WLSaP', '2016-06-01', '2016-06-08', '20160607-115911_test.png');

-- --------------------------------------------------------

--
-- 테이블 구조 `educate_list`
--

CREATE TABLE `educate_list` (
  `idx` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `st_date` date NOT NULL,
  `en_date` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `educate_list`
--

INSERT INTO `educate_list` (`idx`, `code`, `title`, `st_date`, `en_date`, `username`, `userid`, `edate`) VALUES
(1, 'WLSaP', '테스트', '2016-06-01', '2016-06-08', '관리자', 'admin', '2016-06-07');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `lv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `pw`, `username`, `email`, `gender`, `year`, `lv`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '관리자', 'admin@admin.com', '남성', '1999', 'admin'),
(2, 'user', '81dc9bdb52d04dc20036dbd8313ed055', '사용자', 'user', '남성', '', 'user');

-- --------------------------------------------------------

--
-- 테이블 구조 `menu`
--

CREATE TABLE `menu` (
  `idx` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `child` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `contents` text NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `menu`
--

INSERT INTO `menu` (`idx`, `parent`, `child`, `title`, `contents`, `type`) VALUES
(1, '0', 'main1', 'MOOC 소개', '', ''),
(2, 'main1', 'sub1', '', 'MOOC(Massive Open Online Course)란 온라인을 통해서 누구나, 어디서나, 원하는 강의를 무료로 들을 수 있는 온라인 공개강좌 서비스를 말합니다.', 'index'),
(3, '0', 'main2', 'MOOC 보기', '', ''),
(4, 'main2', 'sub1', '', '웹디자인 무크(Web-Design MOOC)는 웹표준 최신 기술을 학습할 수 있는 강좌로 구성되어 있으며, 국내 최고 수준의 강좌를 개발하여 제공하고 있습니다.', 'index'),
(5, '0', 'main3', '마이페이지', '', ''),
(6, 'main3', 'sub1', '신청강좌', '수강인원의 제한없이 누구나 수강이 가능하여 학습자는 배경지식이 다른 학습자간 지식 공유를 통해 대학의 울타리를 넘어 새로운 학습경험을 하게 될 것입니다.', 'index'),
(7, 'main3', 'sub2', '수강강좌', '무크(MOOC)는 학습자가 수동적으로 듣기만 하던 기존의 온라인 학습동영상과 달리 양방향 학습이 가능한 새로운 교육 환경을 제공합니다.', 'index'),
(8, '0', 'main4', '공지사항', '', ''),
(9, 'main4', 'sub1', '', '일반 학습자의 경우에는 개인의 역량을 강화하거나 각종 자격, 시험 등을 대비할 수 있으며, 기업 재직자의 경우에는 최신 지식정보를 얻거나 직업 업무능력을 계발하는 데 활용할 수 있습니다.', 'index'),
(10, '0', 'admin', '관리자페이지', '', ''),
(11, 'admin', 'sub1', '', '모든 강좌에 대한 정보를 알 수 있고, 수정할 수 있습니다.', 'index');

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `idx` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `memo` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`idx`, `title`, `memo`, `username`, `date`, `count`) VALUES
(6, '그 영원한', '약속들을', '관리자', '2016-06-07 14:47:20', 11),
(7, '눈을 떠보면', '온통 그대만이', '관리자', '2016-06-07 14:48:23', 14),
(8, '보이는', '전부가 된거죠', '관리자', '2016-06-07 14:48:27', 221),
(9, '다른 사람', '곁에 서있는 네 모습이', '관리자', '2016-06-07 17:55:22', 1),
(10, '조금 어색', '하지만', '관리자', '2016-06-07 17:55:30', 0),
(11, '다 버리지 않아도', '어떻게든 이겨낼 수 있어', '관리자', '2016-06-07 17:55:43', 0),
(12, '다른 사람 찾아', '가버린 네 얼굴이', '관리자', '2016-06-07 17:55:51', 0),
(13, '그렇게 밉진', '않아', '관리자', '2016-06-07 17:55:56', 0),
(14, '이젠 우리 같은', '시간 속을', '관리자', '2016-06-07 17:56:07', 0),
(15, '이젠 우리 같은', '시간 속을', '관리자', '2016-06-07 17:56:07', 1),
(16, '남 처럼', '그렇게 걸으면 되', '관리자', '2016-06-07 17:56:15', 2),
(17, '달아나도', '가지 못할 기억마저', '관리자', '2016-06-07 17:56:22', 11);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `educate`
--
ALTER TABLE `educate`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `educate_list`
--
ALTER TABLE `educate_list`
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
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 테이블의 AUTO_INCREMENT `educate`
--
ALTER TABLE `educate`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 테이블의 AUTO_INCREMENT `educate_list`
--
ALTER TABLE `educate_list`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 테이블의 AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
