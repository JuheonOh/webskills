import React from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";
import Card from "../components/Card";

// Projects Data
const projects = [
  {
    to: "/2015-local",
    tag: "LOCAL",
    year: "2015",
    title: "2015년 지방기능경기대회",
    desc: "2015 지방대회 Task4 서버사이드 결과물을 새 탭에서 확인할 수 있습니다.",
    img: "images/screenshots/2015-local.jpg",
    imgAlt: "2015 Local Project Screenshot",
  },
  {
    to: "/2015-national",
    tag: "NATIONAL",
    year: "2015",
    title: "2015년 전국기능경기대회",
    desc: "2015 전국대회 Task4 서버사이드 결과물을 새 탭에서 확인할 수 있습니다.",
    img: "images/screenshots/2015-national.jpg",
    imgAlt: "2015 National Project Screenshot",
  },
  {
    to: "/2016-local",
    tag: "LOCAL",
    year: "2016",
    title: "2016년 지방기능경기대회",
    desc: "2016 지방대회 Task4 서버사이드 결과물을 새 탭에서 확인할 수 있습니다.",
    img: "images/screenshots/2016-local.jpg",
    imgAlt: "2016 Local Project Screenshot",
  },
  {
    to: "/2016-national",
    tag: "NATIONAL",
    year: "2016",
    title: "2016년 전국기능경기대회",
    desc: "아름누리 예술단 주제로 구현한 프로젝트입니다. CSS 기반 인터랙션과 SVG·Canvas 연동 구성을 확인할 수 있습니다.",
    img: "images/screenshots/2016-national.jpg",
    imgAlt: "2016 National Project Screenshot",
  },
  {
    to: "/2017-local",
    tag: "LOCAL",
    year: "2017",
    title: "2017년 지방기능경기대회",
    desc: "서울 여행 가이드를 주제로 제작한 프로젝트입니다. app.js 단일 파일 기반의 동적 DOM 제어와 인터랙션을 포함합니다.",
    img: "images/screenshots/2017-local.jpg",
    imgAlt: "2017 Local Project Screenshot",
  },
  {
    to: "/2017-national",
    tag: "NATIONAL",
    year: "2017",
    title: "2017년 전국기능경기대회",
    desc: "제주 관광을 주제로 한 프로젝트입니다. 3D 전환 효과와 WebSQL·LocalStorage 기반 상태 관리 기능을 포함합니다.",
    img: "images/screenshots/2017-national.jpg",
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
          content="Archive of WorldSkills Korea web design projects (2015-2017). Explore the evolution of web technologies and interactive design by Juheon Oh."
        />
      </Helmet>

      {/* Hero Section */}
      <section className="bg-primary min-h-72vh md:min-h-85vh relative flex w-full items-center px-4 pt-16 md:px-0 md:pt-20 lg:pt-0">
        <div className="container grid h-full max-w-6xl grid-cols-1 items-center gap-10 sm:gap-14 lg:grid-cols-2">
          {/* Left: Content */}
          <div className="animate-enter z-10 order-2 flex flex-1 flex-col gap-8 pb-12 lg:order-1 lg:pb-0">
            <div className="flex flex-col gap-3">
              <div className="flex items-center gap-2">
                <span className="bg-accent mb-1 rounded-full px-3 py-1 text-[10px] font-bold tracking-widest text-black uppercase">
                  Established 2016
                </span>
              </div>
              <h1 className="text-head -ml-1 text-4xl leading-[1.2] font-extrabold tracking-tight sm:text-5xl md:text-7xl lg:text-7xl">
                도전의 기록을
                <span className="relative mt-2 inline-block">
                  이어갑니다.
                  <svg
                    className="absolute -bottom-2 left-0 -z-10 w-full"
                    viewBox="0 0 300 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M5 15C50 5 150 5 295 15"
                      stroke="var(--color-accent)"
                      strokeWidth="8"
                      strokeLinecap="round"
                      opacity="0.6"
                    />
                  </svg>
                </span>
              </h1>
            </div>

            <p className="text-body max-w-xl text-base leading-relaxed break-keep sm:text-lg">
              기능경기대회 웹디자인/개발 과제 아카이브입니다.
              <br className="hidden lg:block" />
              제약이 강한 실전 환경에서 만들어진 코드와 결과물을
              <br className="hidden lg:block" />
              한 곳에서 확인할 수 있습니다.
            </p>

            <div className="flex flex-col gap-3 sm:flex-row sm:gap-4">
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

            <div className="mt-8 flex flex-wrap items-center gap-3 border-t border-black/5 pt-8">
              <div className="flex flex-col">
                <span className="text-head text-2xl font-bold">{projects.length}</span>
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
          <div className="animate-enter relative order-1 flex w-full items-center justify-center pb-10 delay-200 lg:order-2 lg:h-full lg:pb-0">
            <div className="animate-float relative h-70 w-80 sm:h-80 sm:w-88 lg:h-150 lg:w-120">
              <div className="absolute top-0 right-0 h-full w-full rotate-6 transform rounded-[40px] bg-[#D4D6D2] transition-transform duration-1000 group-hover:rotate-12"></div>
              <div className="bg-accent absolute top-0 right-0 h-full w-full rotate-3 transform rounded-[40px] opacity-90 shadow-xl transition-transform duration-1000 group-hover:rotate-6"></div>
              <div className="bg-surface absolute inset-0 transform overflow-hidden rounded-[40px] shadow-2xl transition-transform duration-700 hover:-translate-y-4">
                <div className="relative h-full w-full bg-[#FAFAFA]">
                  <div className="flex h-20 items-center gap-4 border-b border-black/5 px-5 sm:px-8">
                    <div className="h-3 w-3 rounded-full bg-[#E5E5E5]"></div>
                    <div className="h-3 w-3 rounded-full bg-[#E5E5E5]"></div>
                    <div className="flex-1"></div>
                    <div className="bg-accent h-8 w-8 rounded-full"></div>
                  </div>
                  <div className="flex flex-col gap-6 p-5 sm:p-7 lg:p-8">
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

      {/* Projects Section */}
      <section className="max-w-8xl container py-20 sm:py-24 lg:py-32">
        <div className="animate-enter mb-8 flex flex-col justify-between delay-300 md:flex-row md:items-end">
          <div>
            <h2 className="text-head mb-4 text-3xl font-bold tracking-tight sm:text-4xl lg:text-5xl">
              Selected Works
            </h2>
            <p className="text-body max-w-2xl text-base sm:text-lg">
              연도별 기능경기대회 과제를 한눈에 살펴보고
              <br className="hidden md:block" />
              구현 결과물과 기술 포인트를 확인해보세요.
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
