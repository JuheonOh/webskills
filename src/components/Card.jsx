import React from "react";
import { Link } from "react-router-dom";

export default function Card({ to, tag, year, title, desc, img, imgAlt }) {
  return (
    <Link to={to} className="card-base group flex h-full flex-col no-underline">
      {/* Image Container */}
      <div className="relative aspect-4/3 w-full overflow-hidden bg-white">
        <img
          src={img}
          alt={imgAlt}
          className="h-full w-full object-cover object-top transition-transform duration-700 ease-out group-hover:scale-105"
          loading="lazy"
        />
        <div className="absolute inset-0 bg-black/0 transition-colors duration-300 group-hover:bg-black/5" />
      </div>

      {/* Content */}
      <div className="flex grow flex-col p-6 sm:p-8">
        <div className="mb-4 flex items-center gap-3">
          <span className="bg-primary text-head rounded-full px-3 py-1 text-xs font-bold tracking-wider uppercase">
            {tag}
          </span>
          <span className="text-muted text-sm font-medium">{year}</span>
        </div>

        <h3 className="text-head group-hover:text-body mb-3 text-lg font-bold sm:text-xl transition-colors">
          {title}
        </h3>

        <p className="text-body mb-6 grow text-sm leading-relaxed">
          {desc}
        </p>

        {/* CTA Arrow */}
        <div className="text-head mt-auto flex items-center gap-2 text-sm font-bold transition-all group-hover:gap-3">
          <span>View Project</span>
          <svg
            width="16"
            height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            strokeWidth="2.5"
            strokeLinecap="round"
            strokeLinejoin="round"
          >
            <line x1="5" y1="12" x2="19" y2="12"></line>
            <polyline points="12 5 19 12 12 19"></polyline>
          </svg>
        </div>
      </div>
    </Link>
  );
}
