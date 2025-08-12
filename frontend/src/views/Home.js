import React from 'react';

const Home = () => {
  const features = [
    {
      title: 'Gestion des Stocks',
      description: 'Suivez et gérez vos niveaux de stock en temps réel',
      icon: '📦',
    },
    {
      title: 'Relations Clients',
      description: 'Gérez les informations et interactions avec vos clients',
      icon: '👥',
    },
    {
      title: 'Suivi Financier',
      description: 'Surveillez les finances et la rentabilité de votre entreprise',
      icon: '💰',
    },
    {
      title: 'Commandes Fournisseurs',
      description: 'Créez et suivez vos opérations de chaîne d’approvisionnement',
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
      {/* Section d'accueil */}
      <div style={{
        background: 'linear-gradient(135deg, #6e8efb, #a777e3)',
        color: 'white',
        padding: '3rem 2rem',
        textAlign: 'center',
        borderRadius: '8px',
        marginBottom: '2rem',
      }}>
        <h1 style={{ fontSize: '2.5rem', marginBottom: '1rem' }}>Bienvenue sur TAC-TIC</h1>
        <p style={{ fontSize: '1.25rem' }}>Votre solution complète de gestion d’entreprise</p>
      </div>

      {/* Section des fonctionnalités */}
      <h2 style={{ fontSize: '1.75rem', marginBottom: '1.5rem' }}>Fonctionnalités Clés</h2>
      
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

      {/* Section démarrage */}
      <div style={{
        background: '#f5f5f5',
        borderRadius: '8px',
        padding: '20px',
        marginBottom: '2rem'
      }}>
        <h2 style={{ fontSize: '1.75rem', marginBottom: '1rem' }}>Pour Bien Commencer</h2>
        <p style={{ marginBottom: '1rem' }}>
          Pour commencer à utiliser TAC-TIC, accédez à l’une des sections dans le menu latéral. 
          Chaque module est conçu pour vous aider à gérer un aspect précis de votre entreprise.
        </p>
        <p>
          Besoin d’aide ? Contactez notre équipe support à <span style={{ fontWeight: 'bold' }}>support@tac-tic.com</span>.
        </p>
      </div>

      {/* Pied de page */}
      <div style={{ textAlign: 'center', color: '#777', fontSize: '0.875rem' }}>
        TAC-TIC v1.0.0 | © {new Date().getFullYear()} Tous droits réservés
      </div>
    </div>
  );
};

export default Home;
