import React from 'react';

const Home = () => {
  const features = [
    {
      title: 'Inventory Management',
      description: 'Track and manage your stock levels in real-time',
      icon: '📦',
    },
    {
      title: 'Client Relations',
      description: 'Manage customer information and interactions',
      icon: '👥',
    },
    {
      title: 'Financial Tracking',
      description: 'Monitor your business finances and profitability',
      icon: '💰',
    },
    {
      title: 'Purchase Orders',
      description: 'Create and track your supply chain operations',
      icon: '🛒',
    },
  ];

  return (
    <div style={{
      padding: '20px',
      fontFamily: 'Arial, sans-serif',
      maxWidth: '1200px',
      margin: '0 auto'
    }}>
      {/* Hero Section */}
      <div style={{
        background: 'linear-gradient(135deg, #6e8efb, #a777e3)',
        color: 'white',
        padding: '3rem 2rem',
        textAlign: 'center',
        borderRadius: '8px',
        marginBottom: '2rem',
      }}>
        <h1 style={{ fontSize: '2.5rem', marginBottom: '1rem' }}>Welcome to TAC-TIC</h1>
        <p style={{ fontSize: '1.25rem' }}>Your comprehensive business management solution</p>
      </div>

      {/* Features Section */}
      <h2 style={{ fontSize: '1.75rem', marginBottom: '1.5rem' }}>Key Features</h2>
      
      <div style={{
        display: 'grid',
        gridTemplateColumns: 'repeat(auto-fit, minmax(250px, 1fr))',
        gap: '20px',
        marginBottom: '2rem'
      }}>
        {features.map((feature, index) => (
          <div key={index} style={{
            background: 'white',
            borderRadius: '8px',
            padding: '20px',
            boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
            transition: 'transform 0.3s',
            textAlign: 'center',
          }}>
            <div style={{ fontSize: '2.5rem', marginBottom: '1rem' }}>{feature.icon}</div>
            <h3 style={{ fontSize: '1.25rem', marginBottom: '0.5rem' }}>{feature.title}</h3>
            <p style={{ color: '#666' }}>{feature.description}</p>
          </div>
        ))}
      </div>

      {/* Getting Started Section */}
      <div style={{
        background: '#f5f5f5',
        borderRadius: '8px',
        padding: '20px',
        marginBottom: '2rem'
      }}>
        <h2 style={{ fontSize: '1.75rem', marginBottom: '1rem' }}>Getting Started</h2>
        <p style={{ marginBottom: '1rem' }}>
          To begin using TAC-TIC, navigate to any of the sections in the sidebar menu. Each module is designed to help you manage a specific aspect of your business.
        </p>
        <p>
          Need help? Contact our support team at <span style={{ fontWeight: 'bold' }}>support@tac-tic.com</span>.
        </p>
      </div>

      {/* Footer */}
      <div style={{ textAlign: 'center', color: '#777', fontSize: '0.875rem' }}>
        TAC-TIC v1.0.0 | © {new Date().getFullYear()} All Rights Reserved
      </div>
    </div>
  );
};

export default Home;