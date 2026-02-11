import React, { Suspense } from "react";
import { Routes, Route, Link, useLocation } from "react-router-dom";

// Lazy load pages for code splitting
const Home = React.lazy(() => import("./pages/Home"));
const National2016 = React.lazy(() => import("./pages/National2016"));
const Local2017 = React.lazy(() => import("./pages/Local2017"));
const National2017 = React.lazy(() => import("./pages/National2017"));
const NotFound = React.lazy(() => import("./pages/NotFound"));

// Loading Spinner Component
const LoadingFallback = () => (
  <div className="flex min-h-[50vh] items-center justify-center">
    <div className="border-primary border-t-accent h-8 w-8 animate-spin rounded-full border-2"></div>
  </div>
);

export default function App() {
  const { pathname } = useLocation();

  // Scroll to top on route change
  React.useEffect(() => {
    window.scrollTo(0, 0);
  }, [pathname]);

  return (
    <>
      <nav className="nav-clean sticky top-0 z-50 border-b border-black/5 bg-white/85 backdrop-blur-md">
        <div className="container flex h-20 max-w-7xl items-center justify-between">
          <Link
            to="/"
            className="group flex items-center gap-3 no-underline transition-opacity hover:opacity-80"
          >
            <div className="text-accent flex h-8 w-8 items-center justify-center rounded-full bg-black text-sm font-bold">
              W
            </div>
            <span className="text-head text-lg font-bold">WebSkills</span>
          </Link>

          <div className="hidden gap-1 md:flex">
            <Link
              to="/2016-national"
              className={`nav-link ${pathname === "/2016-national" ? "active" : ""}`}
            >
              2016년 전국기능경기대회
            </Link>
            <Link
              to="/2017-local"
              className={`nav-link ${pathname === "/2017-local" ? "active" : ""}`}
            >
              2017년 지방기능경기대회
            </Link>
            <Link
              to="/2017-national"
              className={`nav-link ${pathname === "/2017-national" ? "active" : ""}`}
            >
              2017년 전국기능경기대회
            </Link>
          </div>
        </div>
      </nav>

      <main className="min-h-screen grow bg-gray-50">
        <Suspense fallback={<LoadingFallback />}>
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/2016-national" element={<National2016 />} />
            <Route path="/2017-local" element={<Local2017 />} />
            <Route path="/2017-national" element={<National2017 />} />
            <Route path="*" element={<NotFound />} />
          </Routes>
        </Suspense>
      </main>

      <footer className="border-t border-black/10 bg-[#FAFAFA]">
        <div className="text-muted container flex max-w-7xl flex-col items-center justify-between gap-6 py-6 text-sm md:flex-row">
          <div className="flex flex-col items-center gap-2 text-center md:flex-row md:gap-8 md:text-left">
            <div className="text-head mb-2 text-base font-bold md:mb-0">
              WebSkills Archive.
            </div>
            <p>© 2026 Juheon Oh</p>
            <span className="hidden h-3 w-px bg-black/10 md:block"></span>
            <p>Crafting Digital Perfection</p>
          </div>
          <div className="flex gap-8 font-medium">
            <a
              href="https://github.com/JuheonOh/webskills"
              target="_blank"
              rel="noreferrer"
              className="hover:text-head transition-colors"
            >
              GitHub
            </a>
            <Link to="/" className="hover:text-head transition-colors">
              Home
            </Link>
          </div>
        </div>
      </footer>
    </>
  );
}
