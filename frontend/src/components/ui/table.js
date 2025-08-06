// src/components/ui/table.js
import React from "react";

export function Table({ children, ...props }) {
  return <table {...props} className="w-full border-collapse">{children}</table>;
}
export function TableHeader({ children }) {
  return <thead>{children}</thead>;
}
export function TableRow({ children }) {
  return <tr>{children}</tr>;
}
export function TableHead({ children }) {
  return <th className="border p-2 text-left bg-gray-200">{children}</th>;
}
export function TableBody({ children }) {
  return <tbody>{children}</tbody>;
}
export function TableCell({ children }) {
  return <td className="border p-2">{children}</td>;
}
