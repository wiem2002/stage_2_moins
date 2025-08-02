import React from "react";
import logo from "../assets/img/reactlogo.png";

function Sidebar() {
  return (
    <aside
      style={{
        width: '240px',
        height: '100vh',
        background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
        color: '#fff',
        borderRadius: '20px',
        margin: '16px',
        boxShadow: '0 8px 32px 0 rgba(31, 38, 135, 0.37)',
        display: 'flex',
        flexDirection: 'column',
        alignItems: 'center',
        padding: '2rem 1rem',
      }}
    >
      <div style={{ marginBottom: '2rem', textAlign: 'center' }}>
        <img
          src={logo}
          alt="Logo"
          style={{
            width: '80px',
            height: '80px',
            borderRadius: '50%',
            boxShadow: '0 4px 16px rgba(0,0,0,0.2)',
            marginBottom: '1rem',
            border: '3px solid #fff',
          }}
        />
        <h2 style={{ margin: 0, fontWeight: 700, fontSize: '1.5rem' }}>TAC TIC</h2>
        <p style={{ fontSize: '0.95rem', opacity: 0.8 }}>Welcome</p>
      </div>
      <nav style={{ width: '100%' }}>
        <ul style={{ listStyle: 'none', padding: 0, width: '100%' }}>
          {[
            { label: 'Ventes', icon: '🏠', href: '#home' },
            { label: 'Founisseurs', icon: 'ℹ️', href: '#about' },
            { label: 'Produit', icon: '💼', href: '#projects' },
            { label: 'Contact', icon: '✉️', href: '#contact' },
          ].map((item) => (
            <li key={item.label} style={{ margin: '1rem 0' }}>
              <a
                href={item.href}
                style={{
                  display: 'flex',
                  alignItems: 'center',
                  gap: '1rem',
                  color: '#fff',
                  textDecoration: 'none',
                  fontWeight: 500,
                  fontSize: '1.1rem',
                  padding: '0.75rem 1rem',
                  borderRadius: '12px',
                  transition: 'background 0.2s, color 0.2s',
                }}
                onMouseOver={e => {
                  e.currentTarget.style.background = 'rgba(255,255,255,0.15)';
                  e.currentTarget.style.color = '#ffe082';
                }}
                onMouseOut={e => {
                  e.currentTarget.style.background = 'none';
                  e.currentTarget.style.color = '#fff';
                }}
              >
                <span style={{ fontSize: '1.3rem' }}>{item.icon}</span>
                {item.label}
              </a>
            </li>
          ))}
        </ul>
      </nav>
      <div style={{ marginTop: 'auto', opacity: 0.7, fontSize: '0.9rem' }}>
        <hr style={{ border: 'none', borderTop: '1px solid #fff2', margin: '2rem 0 1rem 0', width: '100%' }} />
        <p>&copy; 2024 My Creative App</p>
      </div>
    </aside>
  );
}

export default Sidebar;
