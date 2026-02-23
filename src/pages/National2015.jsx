import React from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";

export default function National2015() {
  const task4Url = "http://2015-national.134.185.111.209.nip.io/";

  return (
    <section className="container max-w-5xl py-8 sm:py-12">
      <Helmet>
        <title>2015 전국기능경기대회 | WebSkills Archive</title>
        <meta
          name="description"
          content="2015 전국기능경기대회 과제 결과물 페이지"
        />
      </Helmet>

      <Link
        to="/"
        className="text-body hover:text-head inline-flex items-center gap-2 font-medium transition-colors"
      >
        목록으로 돌아가기
      </Link>

      <div className="bg-surface shadow-soft mt-8 rounded-4xl border border-black/5 p-7 sm:p-10">
        <div className="mb-4 flex items-center gap-3">
          <span className="bg-primary text-head rounded-full px-3 py-1 text-xs font-bold tracking-wider uppercase">
            NATIONAL COMPETITION
          </span>
          <span className="text-muted text-sm font-medium">2015 Ulsan</span>
        </div>

        <h1 className="text-head text-3xl font-extrabold tracking-tight sm:text-4xl">
          2015 전국기능경기대회 과제 결과물
        </h1>
        <p className="text-body mt-4 text-base leading-relaxed sm:text-[1.125rem]">
          OCI 인스턴스에 배포된 과제 결과물입니다.
          <br />
          아래 버튼을 눌러 새 탭에서 바로 확인할 수 있습니다.
        </p>

        <div className="mt-8 flex flex-wrap items-center gap-4">
          <a
            href={task4Url}
            target="_blank"
            rel="noopener noreferrer"
            className="bg-head hover:bg-head/90 inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold text-white transition-colors sm:text-base"
          >
            과제 결과물 새 탭으로 열기
          </a>

          <code className="text-muted rounded-full bg-black/4 px-4 py-2 text-xs break-all sm:text-sm">
            {task4Url}
          </code>
        </div>
      </div>
    </section>
  );
}
