import React from "react";
import ProjectDetail from "../components/ProjectDetail";

export default function National2016() {
  const meta = {
    category: "National Competition",
    year: "2016",
    location: "Seoul",
    title: "Arumnuri",
    subtitle: "Arts Collection",
    urlSafe: "2016-national",
  };

  const description = (
    <>
      서울시민의 일상의 가치를 높이는 <strong>'아름누리 예술재단'</strong> 웹사이트 구축 과제입니다. <br />
      <strong>CSS Skew(18도) 변형</strong>과 그림자 효과를 이용한 입체적인 섹션 디자인이 특징이며,
      라디오 버튼과 체크박스 해킹(Checkbox Hack)을 통해 <strong>자바스크립트 없이</strong> 동작하는
      슬라이딩 배너와 로그인 박스 등 고난도 Pure CSS 인터랙션을 구현했습니다.
    </>
  );

  const task2 = {
    title: "Task 2: Website Layout (Pure CSS)",
    description: "JavaScript 사용이 전면 금지된 환경에서 CSS3만으로 인터랙션을 구현했습니다.",
    url: "/2016-national/2-WebsiteLayout/index.html",
  };

  const requirements = {
    title: "Competition Requirements",
    description: "웹 표준 준수와 브라우저 호환성(IE, Firefox), 그리고 프레임워크 없는 순수 개발 역량을 평가합니다.",
    list: [
      "1200px(스크린), 720px(태블릿), 480px(모바일) 반응형 레이아웃",
      "스크립트 없이 CSS만으로 로그인 박스 On/Off 및 풀다운 메뉴 구현",
      "기울어져 접힌 섹션 디자인 및 그림자 효과 구현 (CSS Transform)",
    ],
  };

  const designSpecs = {
    primaryColors: [
      { code: "#ae1948" },
      { code: "#f43441" },
      { code: "#333333" },
    ],
    colorDesc: "Deep Red / Bright Red / Dark Gray",
    features: [
      { label: "Logic", value: "Checkbox Hack" },
      { label: "Key CSS", value: "Skew Transform" },
    ],
  };

  const task3Guide = (
    <>
      <h4 className="mb-8 flex items-center gap-3 text-xl font-extrabold text-head tracking-tight">
        <span className="flex h-8 w-8 items-center justify-center rounded-lg bg-accent/20 text-lg">🚀</span>
        Inside Seoul 구현 및 테스트 가이드
      </h4>

      <div className="flex flex-col gap-10">
        <div className="relative space-y-10 before:absolute before:top-2 before:bottom-2 before:left-[15px] before:w-[2px] before:bg-black/5">
          {/* Step 1 */}
          <div className="relative pl-10">
            <div className="absolute left-0 top-1.5 h-8 w-8 rounded-full border-2 border-accent bg-white text-center text-xs font-bold leading-7 text-head shadow-sm">
              01
            </div>
            <h5 className="mb-2 font-bold text-head text-lg tracking-tight">
              관리자 권한 및 파일 업로드
            </h5>
            <p className="text-sm leading-relaxed text-body">
              상단 우측 <strong>톱니 버튼 클릭 후 로그인</strong>(ID: <code>admin</code> /
              PW: <code>1234</code>) 하면 관리 기능이 활성화됩니다. 구를 선택한 상태에서
              드롭 영역에 파일(이미지/동영상)을 놓으면 즉시 반영됩니다.
            </p>
          </div>

          {/* Step 2 */}
          <div className="relative pl-10">
            <div className="absolute left-0 top-1.5 h-8 w-8 rounded-full border-2 border-accent bg-white text-center text-xs font-bold leading-7 text-head shadow-sm">
              02
            </div>
            <h5 className="mb-2 font-bold text-head text-lg tracking-tight">SVG 지능형 인터랙션</h5>
            <p className="text-sm leading-relaxed text-body">
              SVG 좌표 데이터와 경로(Path)를 연동하여 마우스 오버 시 실시간
              하이라이트 효과를 구현했으며, 클릭 시 해당 지역의 JSON 데이터를
              매칭하여 상세 정보를 SPA 방식으로 로드합니다.
            </p>
          </div>

          {/* Step 3 */}
          <div className="relative pl-10">
            <div className="absolute left-0 top-1.5 h-8 w-8 rounded-full border-2 border-accent bg-white text-center text-xs font-bold leading-7 text-head shadow-sm">
              03
            </div>
            <h5 className="mb-2 font-bold text-head text-lg tracking-tight">
              실시간 미디어 프로세싱 (Thumbnail)
            </h5>
            <p className="text-sm leading-relaxed text-body">
              MP4 파일 업로드 시 <code>Canvas API</code>를 활용하여 영상의
              지정된 시간(1.5초) 프레임을 추출하고, 이를 썸네일로 자동 변환하여
              갤러리에 시각화하는 고난도 기술을 포함합니다.
            </p>
          </div>

          {/* Step 4 */}
          <div className="relative pl-10">
            <div className="absolute left-0 top-1.5 h-8 w-8 rounded-full border-2 border-accent bg-white text-center text-xs font-bold leading-7 text-head shadow-sm">
              04
            </div>
            <h5 className="mb-2 font-bold text-head text-lg tracking-tight">
              히스토리 기반 커스텀 라우팅
            </h5>
            <p className="text-sm leading-relaxed text-body">
              Home 및 Back 버튼 클릭 시 단순 가시성 전환이 아닌,{" "}
              <code>SessionStorage</code>와 연계된 히스토리 스택을 관리하여
              사용자 직관에 맞는 3단계 내비게이션 환경을 제공합니다.
            </p>
          </div>
        </div>

        <div className="rounded-3xl bg-black/2 border border-black/5 p-8">
          <p className="mb-4 flex items-center gap-2 font-bold text-head">
            <span className="text-accent">●</span> 주요 테스트 포인트
          </p>
          <ul className="space-y-3">
            {[
              "SVG 지도 마우스 오버 및 클릭 반응",
              "관리자 로그인 후 드래그 앤 드롭 파일 업로드",
              "동영상 업로드 시 썸네일 추출 및 갤러리 반영 확인",
              "상단 내비게이션 버튼을 통한 세션 상태 유지",
            ].map((item, idx) => (
              <li key={idx} className="flex items-start gap-3 text-sm text-body">
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
    title: "Task 3: Inside Seoul (App)",
    description: (
      <>
        서울시 25개 자치구 정보를 제공하는 <strong>'인사이드서울'</strong> 웹 애플리케이션입니다. <br />
        SVG 지도의 좌표 데이터와 JSON 비동기 로딩을 결합하여 인터랙티브한 대시보드를 구축했으며,{" "}
        Canvas 기반의 <strong>실시간 미디어 프로세싱</strong>(동영상 프레임 캡처)과 드래그 앤 드롭 파일 관리 시스템을{" "}
        별도의 프레임워크 없이 <strong>자바스크립트와 jQuery</strong>만으로 완벽하게 구현했습니다.
      </>
    ),
    tags: ["SVG Map Interaction", "Video Frame Capture", "Drag & Drop", "History Management"],
    url: "/2016-national/3-ClientSide/index.html",
    guide: task3Guide,
  };

  return (
    <ProjectDetail
      meta={meta}
      description={description}
      task2={task2}
      requirements={requirements}
      designSpecs={designSpecs}
      task3={task3}
    />
  );
}
