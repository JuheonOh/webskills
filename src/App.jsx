import React, { Suspense, useState } from "react";
import { Routes, Route, Link, useLocation } from "react-router-dom";

// Lazy load pages for code splitting
const Home = React.lazy(() => import("./pages/Home"));
const Local2015 = React.lazy(() => import("./pages/Local2015"));
const National2015 = React.lazy(() => import("./pages/National2015"));
const Local2016 = React.lazy(() => import("./pages/Local2016"));
const National2016 = React.lazy(() => import("./pages/National2016"));
const Local2017 = React.lazy(() => import("./pages/Local2017"));
const National2017 = React.lazy(() => import("./pages/National2017"));
const NotFound = React.lazy(() => import("./pages/NotFound"));

// Loading Spinner Component
const LoadingFallback = () => (
  <div className="min-h-50vh flex items-center justify-center">
    <div className="border-primary border-t-accent h-8 w-8 animate-spin rounded-full border-2"></div>
  </div>
);

export default function App() {
  const { pathname } = useLocation();
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  // Scroll to top on route change
  React.useEffect(() => {
    window.scrollTo(0, 0);
    setMobileMenuOpen(false);
  }, [pathname]);

  return (
    <>
      <nav className="nav-clean sticky top-0 z-50 border-b border-black/5 bg-white/85 backdrop-blur-md">
        <div className="relative container flex h-16 max-w-7xl items-center justify-between sm:h-20">
          <Link
            to="/"
            className="group no-underline transition-opacity hover:opacity-80"
          >
            <span className="text-head flex items-baseline gap-0.5 text-xl font-bold tracking-tighter">
              Juheon
              <span className="bg-accent ring-accent/20 h-1.5 w-1.5 rounded-full ring-4 transition-all duration-300 group-hover:scale-125"></span>
              WebSkills
            </span>
          </Link>

          <div className="hidden gap-1 md:flex">
            <Link
              to="/2015-local"
              className={`nav-link ${pathname === "/2015-local" ? "active" : ""}`}
            >
              2015 지방
            </Link>
            <Link
              to="/2015-national"
              className={`nav-link ${pathname === "/2015-national" ? "active" : ""}`}
            >
              2015 전국
            </Link>
            <Link
              to="/2016-local"
              className={`nav-link ${pathname === "/2016-local" ? "active" : ""}`}
            >
              2016 지방
            </Link>
            <Link
              to="/2016-national"
              className={`nav-link ${pathname === "/2016-national" ? "active" : ""}`}
            >
              2016 전국
            </Link>
            <Link
              to="/2017-local"
              className={`nav-link ${pathname === "/2017-local" ? "active" : ""}`}
            >
              2017 지방
            </Link>
            <Link
              to="/2017-national"
              className={`nav-link ${pathname === "/2017-national" ? "active" : ""}`}
            >
              2017 전국
            </Link>
          </div>

          <button
            type="button"
            aria-label={mobileMenuOpen ? "메뉴 닫기" : "메뉴 열기"}
            aria-expanded={mobileMenuOpen}
            aria-controls="mobile-navigation"
            className="inline-flex h-10 w-10 items-center justify-center rounded-full border border-black/15 bg-white/90 text-lg font-bold md:hidden"
            onClick={() => setMobileMenuOpen((prev) => !prev)}
          >
            {mobileMenuOpen ? "✕" : "☰"}
          </button>
        </div>

        {mobileMenuOpen && (
          <div
            id="mobile-navigation"
            className="absolute inset-x-0 top-full border-b border-black/5 bg-white/95 backdrop-blur md:hidden"
          >
            <div className="container flex flex-col gap-1 py-2">
              <Link
                to="/2015-local"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2015년 지방기능경기대회
              </Link>
              <Link
                to="/2015-national"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2015년 전국기능경기대회
              </Link>
              <Link
                to="/2016-local"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2016년 지방기능경기대회
              </Link>
              <Link
                to="/2016-national"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2016년 전국기능경기대회
              </Link>
              <Link
                to="/2017-local"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2017년 지방기능경기대회
              </Link>
              <Link
                to="/2017-national"
                className="nav-link"
                onClick={() => setMobileMenuOpen(false)}
              >
                2017년 전국기능경기대회
              </Link>
            </div>
          </div>
        )}
      </nav>

      <main className="min-h-screen grow bg-gray-50">
        <Suspense fallback={<LoadingFallback />}>
          <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/2015-local" element={<Local2015 />} />
            <Route path="/2015-national" element={<National2015 />} />
            <Route path="/2016-local" element={<Local2016 />} />
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
