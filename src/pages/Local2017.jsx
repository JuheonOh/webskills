import React from "react";
import ProjectDetail from "../components/ProjectDetail";

export default function Local2017() {
  const meta = {
    category: "Local Competition",
    year: "2017",
    location: "Gwangju",
    title: "Seoul Travel",
    subtitle: "Your Best Memories",
    urlSafe: "2017-local",
  };

  const description = (
    <>
      한국산업인력공단(HRDKorea) 외국인 교육생들을 위한 서울 여행 가이드{" "}
      <strong>'Seoul Travel'</strong> 구축 과제입니다. <br />
      가로 <strong>1440px</strong>의 와이드한 레이아웃을 기반으로{" "}
      <strong>780px, 480px</strong> 반응형 대응력을 평가하며, 굴림체와
      나눔고딕을 혼용한 타이포그래피와 이미지 중심의 히어로 섹션 배치를 통해
      프레임워크 없이 오직 <strong>Pure HTML/CSS</strong>만으로 정보의 가독성과
      레이아웃의 안정성을 동시에 확보했습니다.
    </>
  );

  const task2 = {
    title: "Task 2: Website Layout (Pure CSS)",
    url: "2017-local/2-WebsiteLayout/index.html",
  };

  const requirements = {
    title: "Competition Requirements",
    description:
      "제공된 디자인을 바탕으로 웹 표준을 준수하며, 프레임워크 없이 순수 CSS만으로 구현해야 합니다.",
    list: [
      "1440px / 780px / 480px 3단계 반응형 레이아웃 구현",
      "JavaScript 사용 금지, 오직 HTML5/CSS3만으로 인터랙션 완성",
      "단일 HTML과 단일 CSS 파일만을 활용하여 페이지 구성",
      "IE11 및 Chrome 브라우저 간의 크로스 브라우징 호환성 확보",
      "모든 링크와 아이콘 요소에 상호작용(Hover) 효과 적용",
    ],
  };

  const designSpecs = {
    primaryColors: [
      { code: "#0d3182", desc: "Navy" },
      { code: "#0099ff", desc: "Sky Blue" },
      { code: "#625539", desc: "Earth Brown" },
    ],
    colorDesc: "Navy / Sky Blue / Earth Brown",
    features: [
      { label: "Layout", value: "Fixed 1440px Base" },
      { label: "Responsive", value: "780px, 480px" },
    ],
  };

  const task3Guide = (
    <>
      <h4 className="text-head mb-8 flex items-center gap-3 text-xl font-extrabold tracking-tight">
        <span className="bg-accent/20 flex h-8 w-8 items-center justify-center rounded-lg text-lg">
          🚀
        </span>
        app.js 구현 가이드 및 제약사항
      </h4>

      <div className="flex flex-col gap-10">
        <div className="relative space-y-10 before:absolute before:top-2 before:bottom-2 before:left-3.75 before:w-0.5 before:bg-black/5">
          {/* Step 1 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              01
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              스무스 스크롤 애니메이션 (2초 이내)
            </h5>
            <p className="text-body text-sm leading-relaxed">
              내비게이션 메뉴 클릭 시 단순 이동이 아닌{" "}
              <code>animate({"{scrollTop}"})</code>를 활용하여 2초 이내에 해당
              섹션으로 부드럽게 도달하도록 구현되었습니다.
            </p>
          </div>

          {/* Step 2 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              02
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              동적 슬라이더 (이미지 강제 삽입)
            </h5>
            <p className="text-body text-sm leading-relaxed">
              HTML 수정 없이 <code>#slider</code>에 이미지 3장을 스크립트로
              추가하고, 1~3초 사이의 전환 효과를 가진 무한 루프 슬라이더를
              구축했습니다.
            </p>
          </div>

          {/* Step 3 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              03
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              조건부 Parallax 및 Read More
            </h5>
            <p className="text-body text-sm leading-relaxed">
              섹션 상단이 브라우저 상단에 닿을 때 이미지를 회전/확대합니다.{" "}
              <code>.hidden-text</code> 영역은 Read More 버튼 클릭 시 슬라이드
              다운으로 확장됩니다.
            </p>
          </div>

          {/* Step 4 */}
          <div className="relative pl-10">
            <div className="border-accent text-head absolute top-1.5 left-0 h-8 w-8 rounded-full border-2 bg-white text-center text-xs leading-7 font-bold shadow-sm">
              04
            </div>
            <h5 className="text-head mb-2 text-lg font-bold tracking-tight">
              데이터 매칭 팝업 시스템
            </h5>
            <p className="text-body text-sm leading-relaxed">
              갤러리 이미지 클릭 시 <code>big_</code> 접두어를 붙여 고해상도
              이미지를 로드하고, 메달리스트 클릭 시 JSON 데이터를 매칭한 상세
              다이얼로그를 생성합니다.
            </p>
          </div>
        </div>

        <div className="rounded-3xl border border-black/5 bg-black/2 p-8">
          <p className="text-head mb-4 flex items-center gap-2 font-bold">
            <span className="text-accent">●</span> 심사 포인트 확인
          </p>
          <ul className="space-y-3">
            {[
              "슬라이드 전환 시간: 1초 이상 ~ 3초 이내",
              "스크롤 애니메이션: 2초 이내",
              "팝업 규격: 갤러리 팝업 시 640x426 사이즈",
              "자립형 구현: HTML/CSS 원본 수정 없이 작동",
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
    title: "Task 3: Dynamic Parallax & JS Control",
    description: (
      <>
        제공된 템플릿의 소스 수정을 일절 배제하고, 오직 <strong>app.js</strong>{" "}
        파일 하나로 DOM 조작부터 복잡한 타이밍 기반 애니메이션까지 제어하는
        프로젝트입니다. 실무에서 흔히 접하는 '수정 불가능한 레거시 환경'에서의
        개발 역량을 테스트합니다.
      </>
    ),
    tags: ["DOM Injection", "Scroll Trigger", "Data Parsing", "jQuery UI"],
    url: "2017-local/3-ClientSide/index.html",
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
