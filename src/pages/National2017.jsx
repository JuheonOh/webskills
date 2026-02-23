import React from "react";
import ProjectDetail from "../components/ProjectDetail";

export default function National2017() {
  const meta = {
    category: "National Competition",
    year: "2017",
    location: "Jeju",
    title: "JEJU TOURISM",
    subtitle: "Interactive Experience",
    urlSafe: "2017-national",
  };

  const description = (
    <>
      제주도의 수려한 자연경관을 홍보하는 <strong>'JEJU TOURISM'</strong>{" "}
      웹사이트 구축 과제입니다. <br />
      핑크와 파스텔 톤의 부드러운 색감을 바탕으로,{" "}
      <strong>Perspective 3D Flip</strong> 애니메이션이 적용된 메인 슬라이더와
      자동으로 전환되는 배경 이미지 시스템을 갖추고 있습니다. 라디오 버튼과
      체크박스를 활용하여 섹션 확장 및 비디오 토글 기능을 구현하는 등{" "}
      <strong>자바스크립트 없는 고난도 인터랙션</strong>의 정수를 보여줍니다.
    </>
  );

  const task2 = {
    title: "Task 2: Website Layout",
    url: "2017-national/2-WebsiteLayout/index.html",
  };

  const requirements = {
    title: "Competition Requirements",
    description: (
      <>
        전국기능경기대회의 까다로운 제약 조건을 만족시키기 위해{" "}
        <strong>HTML/CSS Only (No JavaScript)</strong> 원칙을 준수했습니다.
        스크립트 사용 없이 복잡한 상태 관리와 애니메이션을 CSS만으로 구현해야
        하는 고난도 과제였습니다.
      </>
    ),
    list: [
      "Perspective를 활용한 3D Flip 메인 슬라이더",
      "CSS Keyframes를 이용한 4단계 자동 배경 전환 시스템",
      "전환 효과(Transition)와 RotateZ를 이용한 섹션 확장 UI",
      "Checkbox & Radio Hack을 이용한 스크립트 프리 상태 관리",
      "고밀도 그림자(ShadowBox)를 활용한 입체적 레이아웃 구성",
    ],
  };

  const designSpecs = {
    primaryColors: [
      { code: "#fc7171", desc: "Coral Red" },
      { code: "#ffa9a9", desc: "Soft Pink" },
      { code: "#444444", desc: "Dark Gray" },
    ],
    colorDesc: "Coral Red / Soft Pink / Dark Gray",
    features: [
      { label: "Key CSS", value: "3D Flip / Rotate" },
      { label: "Motion", value: "Auto BG-Slide" },
    ],
  };

  const task3Guide = (
    <>
      <h4 className="text-head mb-8 flex items-center gap-3 text-xl font-extrabold tracking-tight">
        <span className="bg-accent/20 flex h-8 w-8 items-center justify-center rounded-lg text-lg">
          🚀
        </span>
        Jeju Wiki 구축 및 테스트 가이드
      </h4>

      <div className="flex flex-col gap-10">
        <div className="relative space-y-10 before:absolute before:top-2 before:bottom-2 before:left-3.75 before:w-0.5 before:bg-black/5">
          {/* Step 1 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              01
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              WebSQL 기반 데이터베이스 연동
            </h5>
            <p className="text-body text-sm leading-relaxed">
              별도의 서버 없이 브라우저 내장 DB(<code>WebSQL</code>)를 활용하여
              회원 정보, 게시글, 댓글을 영구 저장합니다. 관리자 계정(
              <code>admin</code> / <code>1234</code>)으로 로그인하면 데이터 수정
              권한이 부여됩니다.
            </p>
          </div>

          {/* Step 2 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              02
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              지능형 검색 및 오토컴플릿
            </h5>
            <p className="text-body text-sm leading-relaxed">
              <code>jQuery UI Autocomplete</code>와 연동하여 DB 내의 모든
              장소명을 실시간으로 검색하며, 검색어 및 카테고리 필터 상태를{" "}
              <code>LocalStorage</code>에 저장하여 새로고침 후에도 유지되도록
              구현했습니다.
            </p>
          </div>

          {/* Step 3 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              03
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              무한 스크롤 및 지연 로딩
            </h5>
            <p className="text-body text-sm leading-relaxed">
              사용자가 바닥에 도달할 때마다 3개씩 추가 데이터를 로드하는 무한
              스크롤 시스템이 탑재되었으며, <code>scrollTop</code> 값을 추적하여
              마지막 보던 위치로 자동 복구되는 기능을 구현했습니다.
            </p>
          </div>

          {/* Step 4 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              04
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              실시간 콘텐츠 에디터 및 댓글
            </h5>
            <p className="text-body text-sm leading-relaxed">
              관리자 모드에서 '더 보기 &gt; 정보수정'을 통해 텍스트 및 이미지를
              즉시 변경할 수 있으며, <code>SessionStorage</code> 기반의 사용자
              인증을 통해 본인 댓글만 삭제 가능한 CRUD 로직을 처리합니다.
            </p>
          </div>
        </div>

        <div className="rounded-3xl border border-black/5 bg-black/2 p-8">
          <p className="text-head mb-4 flex items-center gap-2 font-bold">
            <span className="text-accent">●</span> 주요 테스트 포인트
          </p>
          <ul className="space-y-3">
            {[
              "관리자 계정으로 로그인 후 게시글 정보(텍스트/이미지) 수정",
              "검색창 자동완성 작동 확인 및 필터링 결과 확인",
              "스크롤 바닥 도달 시 하단 로딩바와 함께 데이터 추가 확인",
              "WebSQL 지원 브라우저(Chrome/Edge) 환경에서 테스트 권장",
            ].map((item, idx) => (
              <li
                key={idx}
                className="text-body flex items-start gap-3 text-sm"
              >
                <span className="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-black/20"></span>
                {item}
              </li>
            ))}
          </ul>
        </div>
      </div>
    </>
  );

  const task3 = {
    title: "Task 3: Jeju Wiki (App)",
    description: (
      <>
        제주도의 풍부한 관광 정보를 관리하는 <strong>'제주 위키'</strong> 웹
        애플리케이션입니다. <br />
        브라우저 내장 데이터베이스인 <strong>WebSQL</strong>을 이용해 서버
        없이도 로그인, 회원가입, 댓글, 게시물 수정을 완벽하게 처리하며,{" "}
        <strong>LocalStorage</strong>와 <strong>SessionStorage</strong>를 결합해
        새로고침 후에도 스크롤 위치와 검색 필터를 유지하는 상태 관리 로직을
        구현했습니다.
      </>
    ),
    tags: ["WebSQL DB", "Infinite Scroll", "State Persistence", "jQuery UI"],
    url: "2017-national/3-ClientSide/index.html",
    guide: task3Guide,
  };

  const task4 = {
    title: "Task 4: Jeju Hotel (Server Side)",
    description:
      "Task 4 서버사이드 구현은 OCI 환경에서 별도로 운영됩니다. 로그인/세션 안정성을 위해 GitHub Pages 내 iframe 대신 새 탭으로 연결합니다.",
    url: "http://2017-national.134.185.111.209.nip.io/",
  };

  return (
    <ProjectDetail
      meta={meta}
      description={description}
      task2={task2}
      requirements={requirements}
      designSpecs={designSpecs}
      task3={task3}
      task4={task4}
      layoutConfig={{ iframeFullWidth: true }}
    />
  );
}
