// src/components/Sidebar.js
import React from "react";
import { NavLink } from "react-router-dom";
import logo from "../assets/img/tactic.PNG";

const navItems = [
  { label: "Ventes", icon: "📈", to: "/dashboard/ventes" },
  { label: "Achats", icon: "🛒", to: "/dashboard/achats" },
  { label: "Stocks", icon: "📦", to: "/dashboard/stocks" },
  { label: "Clients", icon: "👥", to: "/dashboard/clients" },
  { label: "Comptabilité", icon: "💰", to: "/dashboard/comptabilite" },
  { label: "Projets", icon: "📁", to: "/dashboard/projets" },
];

const Sidebar = () => {
  return (
    <div 
      className="h-full"
      style={{
        width: "240px",
        background: "linear-gradient(135deg, #667eea 0%, #764ba2 100%)",
        color: "#fff",
        borderRadius: "20px",
        margin: "16px",
        boxShadow: "0 8px 32px 0 rgba(31, 38, 135, 0.37)",
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
        padding: "2rem 1rem",
      }}
    >
      {/* Logo et titre */}
      <div style={{ marginBottom: "2rem", textAlign: "center" }}>
        <img
          src={logo}
          alt="Logo"
          style={{
            width: "80px",
            height: "80px",
            borderRadius: "50%",
            boxShadow: "0 4px 16px rgba(0,0,0,0.2)",
            marginBottom: "1rem",
            border: "3px solid #fff",
          }}
        />
        <h2 style={{ margin: 0, fontWeight: 700, fontSize: "1.5rem" }}>
          TAC TIC
        </h2>
        <p style={{ fontSize: "0.95rem", opacity: 0.8 }}>Welcome</p>
      </div>

      {/* Navigation */}
      <nav style={{ width: "100%", flex: 1 }}>
        <ul style={{ listStyle: "none", padding: 0, width: "100%" }}>
          {navItems.map((item) => (
            <li key={item.to} style={{ margin: "1rem 0" }}>
              <NavLink
                to={item.to}
                style={({ isActive }) => ({
                  display: "flex",
                  alignItems: "center",
                  gap: "1rem",
                  color: isActive ? "#ffe082" : "#fff",
                  textDecoration: "none",
                  fontWeight: 500,
                  fontSize: "1.1rem",
                  padding: "0.75rem 1rem",
                  borderRadius: "12px",
                  background: isActive ? "rgba(255,255,255,0.15)" : "none",
                  transition: "all 0.2s",
                })}
              >
                <span style={{ fontSize: "1.3rem" }}>{item.icon}</span>
                {item.label}
              </NavLink>
            </li>
          ))}
        </ul>
      </nav>

      {/* Footer */}
      <div
        style={{
          marginTop: "auto",
          opacity: 0.7,
          fontSize: "0.9rem",
          textAlign: "center",
          width: "100%",
        }}
      >
        <hr
          style={{
            border: "none",
            borderTop: "1px solid rgba(255,255,255,0.2)",
            margin: "2rem 0 1rem 0",
          }}
        />
        <p>&copy; 2024 My Creative App</p>
      </div>
    </div>
  );
};

export default Sidebar;