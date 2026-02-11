import React from "react";
import { Link } from "react-router-dom";
import { Helmet } from "react-helmet-async";

export default function NotFound() {
  return (
    <div className="animate-enter flex min-h-[70vh] flex-col items-center justify-center px-6 text-center">
      <Helmet>
        <title>Page Not Found | WebSkills Archive</title>
        <meta name="robots" content="noindex" />
      </Helmet>
      <div className="text-head mb-4 text-[120px] leading-none font-bold opacity-10">
        404
      </div>
      <h1 className="text-head mb-4 text-3xl font-bold">Page Not Found</h1>
      <p className="text-body mx-auto mb-8 max-w-lg leading-relaxed">
        요청하신 페이지가 존재하지 않거나, 다른 경로로 이동되었을 수 있습니다.
      </p>
      <Link to="/" className="btn-primary">
        홈으로 돌아가기
      </Link>
    </div>
  );
}
