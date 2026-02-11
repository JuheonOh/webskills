import React from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";
import Card from "../components/Card";

// Projects Data
const projects = [
  {
    to: "/2016-national",
    tag: "NATIONAL",
    year: "2016",
    title: "제51회 전국기능경기대회",
    desc: "CSS Skew 변형과 Checkbox Hack을 활용한 Pure CSS 기반의 '아름누리 예술재단' 사이트. SVG 지도와 Canvas 실시간 미디어 프로세싱이 적용된 SPA를 포함합니다.",
    img: "/images/screenshots/2016-national.jpg",
    imgAlt: "2016 National Project Screenshot",
  },
  {
    to: "/2017-local",
    tag: "LOCAL",
    year: "2017",
    title: "광주광역시 지방기능경기대회",
    desc: "1440px 와이드 레이아웃과 정교한 타이포그래피가 돋보이는 서울 여행 가이드. 레거시 환경을 가정한 app.js 단일 파일 기반의 동적 DOM 제어 기술을 다룹니다.",
    img: "/images/screenshots/2017-local.jpg",
    imgAlt: "2017 Local Project Screenshot",
  },
  {
    to: "/2017-national",
    tag: "NATIONAL",
    year: "2017",
    title: "제52회 전국기능경기대회",
    desc: "3D Flip 슬라이더와 WebSQL 클라이언트 DB를 활용한 '제주 위키' 앱. LocalStorage 기반의 상태 유지와 무한 스크롤 등 고도화된 웹 기술의 집약체입니다.",
    img: "/images/screenshots/2017-national.jpg",
    imgAlt: "2017 National Project Screenshot",
  },
];

export default function Home() {
  return (
    <main className="flex min-h-screen flex-col">
      <Helmet>
        <title>WebSkills Archive - WorldSkills Korea Projects</title>
        <meta
          name="description"
          content="Archive of WorldSkills Korea web design projects (2016-2017). Explore the evolution of web technologies and interactive design by Juheon Oh."
        />
      </Helmet>

      {/* ── Hero Section ── */}
      <section className="bg-primary relative flex min-h-[85vh] w-full items-center pt-20 lg:pt-0">
        <div className="container grid h-full max-w-7xl grid-cols-1 items-center gap-16 lg:grid-cols-2">
          {/* Left: Content */}
          <div className="animate-enter z-10 order-2 flex max-w-2xl flex-col gap-8 pb-12 lg:order-1 lg:pb-0">
            <div className="flex flex-col gap-3">
              <div className="flex items-center gap-2">
                <span className="bg-accent text-black rounded-full px-3 py-1 text-[10px] font-bold tracking-widest uppercase mb-1">
                  Established 2016
                </span>
              </div>
              <h1 className="text-head -ml-1 text-7xl leading-[1.2] font-extrabold tracking-tight">
                디지털의 완벽함을 <br />
                <span className="relative inline-block mt-2">
                  빚어내다.
                  <svg className="absolute -bottom-2 left-0 -z-10 w-full" viewBox="0 0 300 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 15C50 5 150 5 295 15" stroke="var(--color-accent)" strokeWidth="8" strokeLinecap="round" opacity="0.6" />
                  </svg>
                </span>
              </h1>
            </div>

            <p className="text-body max-w-lg text-lg leading-relaxed break-keep">
              기능경기대회 웹디자인 및 개발 직종의 모든 기록.
              <br className="hidden lg:block" />
              극한의 제약 속에서 피어난 코드와 디자인,
              <br className="hidden lg:block" />그{" "}
              <strong>가장 순수한 열정</strong>을 아카이빙합니다.
            </p>

            <div className="mt-2 flex flex-wrap gap-4">
              <Link to="/2016-national" className="btn-primary">
                구현 결과물 자세히 보기
              </Link>
              <a
                href="https://github.com/JuheonOh/webskills"
                target="_blank"
                rel="noreferrer"
                className="btn-secondary"
              >
                GitHub Repository
              </a>
            </div>

            <div className="mt-8 flex items-center gap-6 border-t border-black/5 pt-8">
              <div className="flex flex-col">
                <span className="text-head text-2xl font-bold">3</span>
                <span className="text-muted text-xs font-medium tracking-wider uppercase">
                  Major Projects
                </span>
              </div>
              <div className="h-8 w-px bg-black/10"></div>
              <div className="flex flex-col">
                <span className="text-head text-2xl font-bold">100%</span>
                <span className="text-muted text-xs font-medium tracking-wider uppercase">
                  Web Standards
                </span>
              </div>
            </div>
          </div>

          {/* Right: Graphic */}
          <div className="animate-enter relative order-1 flex h-[500px] w-full items-center justify-center delay-200 lg:order-2 lg:h-full">
            <div className="relative h-[460px] w-[320px] lg:h-[600px] lg:w-[480px] animate-float">
              <div className="absolute top-0 right-0 h-full w-full rotate-6 transform rounded-[40px] bg-[#D4D6D2] transition-transform duration-1000 group-hover:rotate-12"></div>
              <div className="bg-accent absolute top-0 right-0 h-full w-full rotate-3 transform rounded-[40px] opacity-90 shadow-xl transition-transform duration-1000 group-hover:rotate-6"></div>
              <div className="bg-surface absolute inset-0 transform overflow-hidden rounded-[40px] shadow-2xl transition-transform duration-700 hover:-translate-y-4">
                <div className="relative h-full w-full bg-[#FAFAFA]">
                  <div className="flex h-20 items-center gap-4 border-b border-black/5 px-8">
                    <div className="h-3 w-3 rounded-full bg-[#E5E5E5]"></div>
                    <div className="h-3 w-3 rounded-full bg-[#E5E5E5]"></div>
                    <div className="flex-1"></div>
                    <div className="bg-accent h-8 w-8 rounded-full"></div>
                  </div>
                  <div className="flex flex-col gap-6 p-8">
                    <div className="bg-primary h-12 w-2/3 animate-pulse rounded-xl"></div>
                    <div className="flex gap-4">
                      <div className="h-32 w-full rounded-2xl bg-[#F1F1F1]"></div>
                      <div className="h-32 w-full rounded-2xl bg-[#F1F1F1]"></div>
                    </div>
                    <div className="space-y-3">
                      <div className="bg-primary h-4 w-full rounded-full"></div>
                      <div className="bg-primary h-4 w-5/6 rounded-full"></div>
                      <div className="bg-primary h-4 w-4/6 rounded-full"></div>
                    </div>
                    <div className="bg-head mt-8 flex h-16 w-full items-center justify-between rounded-full px-6">
                      <div className="h-2 w-24 rounded-full bg-white/20"></div>
                      <div className="bg-accent h-8 w-8 rounded-full"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* ── Projects Section ── */}
      <section className="max-w-8xl container py-32">
        <div className="animate-enter mb-8 flex flex-col justify-between delay-300 md:flex-row md:items-end">
          <div>
            <h2 className="text-head mb-4 text-4xl font-bold tracking-tight lg:text-5xl">
              Selected Works
            </h2>
            <p className="text-body max-w-2xl text-lg">
              치열했던 대회 현장의 고민과 해결 과정이 담긴
              <br className="hidden md:block" />
              실제 웹사이트 구현 결과물입니다.
            </p>
          </div>
          <div className="hidden pb-2 md:block">
            <span className="text-head border-accent border-b-2 pb-1 text-sm font-bold tracking-widest uppercase">
              Scroll Down
            </span>
          </div>
        </div>

        <div className="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
          {projects.map((p, idx) => (
            <div
              key={p.to}
              className="animate-enter"
              style={{ animationDelay: `${0.4 + idx * 0.1}s` }}
            >
              <Card {...p} />
            </div>
          ))}
        </div>
      </section>
    </main>
  );
}
