import React from "react";
import logo from "../assets/img/tactic.PNG";

function Header() {
  return (
    <header
      style={{
        width: '100%',
        background: 'rgba(255,255,255,0.85)',
        boxShadow: '0 2px 12px 0 rgba(31, 38, 135, 0.07)',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between',
        padding: '0.75rem 2rem',
        borderRadius: '0 0 20px 20px',
        position: 'sticky',
        top: 0,
        zIndex: 100,
        backdropFilter: 'blur(6px)',
      }}
    >
      <div style={{ display: 'flex', alignItems: 'center', gap: '1rem' }}>
        <img
          src={logo}
          alt="Logo"
          style={{ width: '40px', height: '40px', borderRadius: '50%' }}
        />
        <span
          style={{
            fontWeight: 700,
            fontSize: '1.3rem',
            letterSpacing: '0.03em',
            color: '#333',
            fontFamily: 'Segoe UI, Arial, sans-serif',
          }}
        >
          TAC-TIC
        </span>
      </div>
      <div style={{ display: 'flex', alignItems: 'center', gap: '1.5rem' }}>
        {/* Minimalist user avatar or icon */}
        <div
          style={{
            width: '36px',
            height: '36px',
            borderRadius: '50%',
            background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            color: '#fff',
            fontWeight: 600,
            fontSize: '1.1rem',
            boxShadow: '0 2px 8px rgba(31,38,135,0.10)',
          }}
        >
          U
        </div>
      </div>
    </header>
  );
}

export default Header; 