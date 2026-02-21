<!-- markdownlint-disable MD033 -->

# 스크린샷 (htdocs 기능 기준)

## 1. 메인 페이지

- 관련 코드: `htdocs/index.php`, `htdocs/page/main.php`
- 메인 슬라이드 배너, 로그인 박스, MOOC 소개, 공지사항 요약, 강좌 카드(자세히 보기) 영역을 보여줍니다.

![메인-1](screenshots/1-1.jpg)

## 2. 회원가입 / 로그인 다이얼로그

- 관련 코드: `htdocs/include/login.php`, `htdocs/include/join.php`
- 다이얼로그 기반 인증 UI와 회원가입 입력 흐름을 보여줍니다.

<p align="center">
  <img src="screenshots/1-2.jpg" alt="로그인 다이얼로그" width="48%" />
  <img src="screenshots/1-3.jpg" alt="회원가입 다이얼로그" width="48%" />
</p>

## 3. MOOC 소개

- 관련 코드: `htdocs/page/main1/sub1/index.php`
- MOOC 개념 설명, FAQ, 안내 텍스트 등 소개 콘텐츠 화면을 보여줍니다.

![MOOC 소개](screenshots/2.jpg)

## 4. 강좌 목록 / 수강 신청

- 관련 코드: `htdocs/page/main2/sub1/index.php`, `htdocs/page/main2/sub1/list.php`, `htdocs/page/main2/sub1/educate.php`, `htdocs/page/main2/sub1/educate_ok.php`, `htdocs/include/join.php`, `htdocs/include/join_ok.php`
- 강좌 목록 조회와 상세 다이얼로그를 제공하며, 로그인 사용자는 `educate_ok.php`, 비로그인 사용자는 회원가입(`join.php` -> `join_ok.php`) 경로로 수강 신청이 처리됩니다.

<p align="center">
  <img src="screenshots/3-1.jpg" alt="강좌-1" width="48%" />
  <img src="screenshots/3-2.jpg" alt="강좌-2" width="48%" />
</p>

![강좌-3](screenshots/3-3.jpg)

## 5. 공지사항 / 댓글

- 관련 코드: `htdocs/page/main4/sub1/index.php`, `htdocs/page/main4/sub1/view.php`, `htdocs/page/main4/sub1/comment.php`
- 공지 목록(비동기 로딩), 본문 확장, 댓글 작성/조회 인터랙션을 보여줍니다.

![공지-1](screenshots/4-1.jpg)
![공지-2](screenshots/4-2.jpg)

## 6. 관리자 강좌 관리

- 관련 코드: `htdocs/page/admin/sub1/index.php`
- 강좌 추가/수정/삭제, 신청자 수 확인, TXT/CSV/XML 다운로드 기능(`file_download_code.php`, `download.php`)을 보여줍니다.

![관리자-1](screenshots/5-1.jpg)

<p align="center">
  <img src="screenshots/5-2.jpg" alt="관리자-2" width="32%" />
  <img src="screenshots/5-3.jpg" alt="관리자-3" width="32%" />
  <img src="screenshots/5-5.jpg" alt="관리자-5" width="32%" />
</p>

![관리자-4](screenshots/5-4.jpg)
