import React, { useState, useEffect, useRef } from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";

/**
 * LazyLoadedIframe Component
 */
function LazyIframe({
  src,
  title,
  className,
  heightClass = "h-75vh min-h-750",
}) {
  const [isVisible, setIsVisible] = useState(false);
  const [isLoading, setIsLoading] = useState(true);
  const containerRef = useRef(null);

  useEffect(() => {
    const observer = new IntersectionObserver(
      (entries) => {
        if (entries[0].isIntersecting) {
          setIsVisible(true);
          observer.disconnect();
        }
      },
      { rootMargin: "200px" },
    );

    if (containerRef.current) {
      observer.observe(containerRef.current);
    }

    return () => observer.disconnect();
  }, []);

  return (
    <div
      ref={containerRef}
      className={`browser-frame ${className} bg-surface relative overflow-hidden`}
    >
      <div className="browser-header relative z-10 flex items-center justify-between border-b border-black/5 bg-gray-50 px-3 py-2 sm:px-4">
        <div className="mr-4 flex min-w-0 flex-1 items-center gap-2">
          <div className="dot"></div>
          <div className="dot"></div>
          <div className="dot"></div>
          <div className="text-muted max-w-60p ml-4 flex w-full items-center overflow-hidden rounded-lg bg-[#F1F1F1] px-4 py-1.5 text-xs text-ellipsis whitespace-nowrap sm:max-w-sm">
            🔒 juheonoh.github.io/webskills
            {src.split("/").slice(0, 2).join("/")}
          </div>
        </div>

        <a
          href={src}
          target="_blank"
          rel="noopener noreferrer"
          className="text-muted hover:text-head flex shrink-0 items-center gap-1.5 text-xs font-medium whitespace-nowrap transition-colors"
          title="새 탭에서 전체화면으로 보기"
        >
          <span className="hidden sm:inline">Open Fullscreen</span>
          <span className="sm:hidden">Open</span>
          <svg
            className="h-3.5 w-3.5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
            ></path>
          </svg>
        </a>
      </div>

      {isLoading && (
        <div className="absolute inset-0 top-12 z-0 bg-white p-6 sm:p-8 md:p-12">
          <div className="mx-auto flex h-full max-w-6xl animate-pulse flex-col gap-8 sm:gap-12">
            {/* Navigation Skeleton (Flex) */}
            <div className="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
              <div className="h-6 w-32 rounded-lg bg-black/5"></div>
              <div className="flex gap-4 sm:gap-8">
                <div className="h-3 w-16 rounded-full bg-black/5"></div>
                <div className="h-3 w-16 rounded-full bg-black/5"></div>
                <div className="h-3 w-16 rounded-full bg-black/5"></div>
              </div>
            </div>

            {/* Hero Section Skeleton (Flex-col) */}
            <div className="flex flex-col items-center gap-6 pt-8">
              <div className="h-12 w-2/3 rounded-xl bg-black/5"></div>
              <div className="h-4 w-1/2 rounded-lg bg-black/5"></div>
              <div className="mt-10 h-64 w-full rounded-3xl bg-black/5"></div>
            </div>

            {/* Row Content Skeleton (Flex) */}
            <div className="flex flex-col gap-5 pt-4 sm:flex-row">
              {[1, 2, 3].map((i) => (
                <div key={i} className="flex flex-1 flex-col gap-4">
                  <div className="aspect-video w-full rounded-2xl bg-black/5"></div>
                  <div className="h-4 w-3/4 rounded-lg bg-black/5"></div>
                  <div className="h-3 w-1/2 rounded-lg bg-black/5"></div>
                </div>
              ))}
            </div>
          </div>
        </div>
      )}

      {isVisible ? (
        <iframe
          src={src}
          title={title}
          className={`w-full ${heightClass} border-0 transition-opacity duration-500 ${isLoading ? "opacity-0" : "opacity-100"}`}
          onLoad={() => setIsLoading(false)}
          loading="lazy"
        />
      ) : (
        <div className={`w-full ${heightClass} bg-gray-50`} />
      )}
    </div>
  );
}

export default function ProjectDetail({
  meta,
  description,
  task2,
  requirements,
  designSpecs,
  task3,
  layoutConfig = { iframeFullWidth: false },
}) {
  return (
    <div className="max-w-10xl animate-enter container py-6 sm:py-8">
      <Helmet>
        <title>{meta.title} | WebSkills Archive</title>
        <meta
          name="description"
          content={`${meta.year} ${meta.location} ${meta.category} - ${meta.subtitle}. Explore the ${meta.title} project and its implementation details.`}
        />
      </Helmet>

      <div className="mx-auto max-w-7xl">
        <Link
          to="/"
          className="text-body hover:text-head inline-flex items-center gap-2 font-medium transition-colors"
        >
          ← 목록으로 돌아가기
        </Link>
      </div>

      {/* Hero Section */}
      <div className="mx-auto my-16 max-w-3xl sm:my-24">
        <div className="mb-6 flex items-center gap-3">
          <span className="bg-primary text-head rounded-full px-3 py-1 text-xs font-bold tracking-wider uppercase">
            {meta.category}
          </span>
          <span className="text-muted text-sm font-medium tracking-tight">
            {meta.year} {meta.location}
          </span>
        </div>
        <h1 className="text-head pb-10 text-3xl leading-[1.15] font-extrabold tracking-tight md:text-5xl lg:text-6xl">
          {meta.title}
          <br />
          <span className="text-body block pt-4 text-xl font-normal sm:text-2xl md:text-3xl">
            {meta.subtitle}
          </span>
        </h1>
        <div className="text-body text-base leading-relaxed break-keep sm:text-[1.125rem]">
          {description}
        </div>
      </div>

      {/* Task 2 Iframe */}
      <div className="mx-auto max-w-7xl">
        <h3 className="text-muted flex items-center gap-4 pb-4 text-sm font-bold tracking-wider uppercase">
          {task2.title}
          <span className="h-px flex-1 bg-black/10"></span>
        </h3>
      </div>

      <LazyIframe
        src={task2.url}
        title={task2.title}
        className={`mx-auto mb-24 sm:mb-32 ${layoutConfig.iframeFullWidth ? "max-w-10xl" : "max-w-8xl"}`}
        heightClass="h-62vh min-h-420 sm:min-h-500"
      />

      {/* Challenge & Solution */}
      <div className="mx-auto mb-20 flex max-w-7xl flex-col items-center justify-between gap-10 md:mb-28 md:flex-row lg:gap-24">
        <div className="flex flex-1 flex-col gap-8 self-center">
          <h2 className="text-head text-2xl font-extrabold tracking-tight sm:text-3xl">
            {requirements.title}
          </h2>
          <p className="text-body text-[1.125rem] leading-relaxed">
            {requirements.description}
          </p>
          <ul className="space-y-4">
            {requirements.list.map((req, index) => (
              <li key={index} className="text-body flex items-center gap-3">
                <span className="text-accent text-xl leading-none font-bold">
                  ✓
                </span>
                <span className="leading-relaxed">{req}</span>
              </li>
            ))}
          </ul>
        </div>

        <div className="bg-surface shadow-soft w-full max-w-xs basis-full rounded-4xl border border-black/5 p-8 md:max-w-none md:basis-5/12 lg:p-12">
          <h3 className="text-head mb-6 text-center text-xl font-bold lg:text-start">
            Design Specs
          </h3>

          <div className="flex flex-col gap-6">
            <div className="flex flex-col items-center gap-6 lg:items-start">
              <div className="text-muted block text-xs font-bold tracking-wider uppercase">
                Primary Colors
              </div>
              <div className="flex flex-wrap justify-center gap-3 sm:gap-6 lg:justify-normal">
                {designSpecs.primaryColors.map((color, idx) => (
                  <div
                    key={idx}
                    className="h-8 w-8 rounded-xl border border-black/5 shadow-sm transition-transform hover:-translate-y-1 lg:w-16"
                    style={{ backgroundColor: color.code }}
                    title={color.code}
                  />
                ))}
              </div>
              <div className="text-muted text-xs font-medium">
                {designSpecs.colorDesc}
              </div>
            </div>

            <div className="h-px bg-black/5"></div>

            <div className="flex flex-col gap-4 sm:flex-row sm:gap-8">
              {designSpecs.features.map((feature, idx) => (
                <div key={idx} className="flex basis-1/2 flex-col gap-2">
                  <div className="text-muted text-xs font-bold tracking-wider uppercase">
                    {feature.label}
                  </div>
                  <div className="text-head text-lg font-semibold">
                    {feature.value}
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      {/* Task 3 */}
      <div className="max-w-8xl mx-auto mb-28 border-t border-black/5 pt-16 sm:pt-24 md:mb-36">
        <div className="mx-auto mb-12 flex max-w-7xl flex-col items-start justify-between gap-10 sm:mb-16 md:flex-row lg:gap-24">
          <div className="top-24 flex w-full flex-col gap-8 sm:static md:sticky md:top-30 md:flex-1">
            <h2 className="text-head text-2xl font-extrabold tracking-tight sm:text-3xl">
              {task3.title}
            </h2>
            <div className="text-body text-base leading-relaxed break-keep sm:text-[1.125rem]">
              {task3.description}
            </div>
            <div className="flex flex-wrap gap-4">
              {task3.tags.map((tag, idx) => (
                <span
                  key={idx}
                  className="text-body rounded-full bg-gray-100 px-5 py-2.5 text-sm font-medium"
                >
                  {tag}
                </span>
              ))}
            </div>
          </div>
          <div className="bg-surface shadow-soft basis-full rounded-4xl border border-black/5 p-6 sm:p-8 md:basis-5/12">
            {task3.guide}
          </div>
        </div>

        <LazyIframe
          src={task3.url}
          title={task3.title}
          className=""
          heightClass="h-70vh min-h-420 md:min-h-560 lg:min-h-680"
        />
      </div>
    </div>
  );
}
