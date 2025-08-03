import React from "react";

export function Card({ children, className }) {
  return (
    <div className={`bg-white rounded-lg shadow ${className || ""}`}>
      {children}
    </div>
  );
}

export function CardHeader({ children }) {
  return <div className="p-4 border-b">{children}</div>;
}

export function CardTitle({ children }) {
  return <h3 className="text-lg font-semibold">{children}</h3>;
}

export function CardContent({ children }) {
  return <div className="p-4">{children}</div>;
}
