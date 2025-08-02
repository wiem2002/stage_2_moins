import React from 'react';
import { useNavigate } from 'react-router-dom';
import './Entreprise.css';
import bgImage from '../assets/img/devoui.png'; // Mets ici le chemin de ton image de fond

const Entreprise = () => {
  const navigate = useNavigate();

  return (
    <div className="entreprise-landing">
      {/* Bandeau image + titre */}
      <div
        className="entreprise-hero"
        style={{
          backgroundImage: `url(${bgImage})`,
        }}
      >
        <div className="hero-overlay">
          <h1 className="hero-title">DÉVELOPPEMENT WEB ET MOBILE</h1>
          <div className="hero-breadcrumbs">
            Services &gt; Développement web et mobile
          </div>
          {/* === Bouton pour aller à Home === */}
          <button className="btn-home" onClick={() => navigate('/')}>
          Dashboard
          </button>
        </div>
      </div>

      {/* Section blanche avec texte fort */}
      <section className="entreprise-section">
        <div className="entreprise-highlight">
          <h2>
            Le digital est devenu le facteur clef de succès de toute entreprise !
          </h2>
          <p>
            TAC-TIC conseille et accompagne les entreprises dans la conception des solutions numériques afin de les aider à booster leur business
          </p>
        </div>
      </section>

      {/* Section services */}
      <section className="entreprise-row">
        <div className="entreprise-row-image">
          <img src={require('../assets/img/12.PNG')} alt="Site web vitrine" />
        </div>
        <div className="entreprise-row-text">
          <h3>Développement et conception de sites Web : site web vitrine, e-commerce, plateforme, etc.</h3>
        </div>
      </section>

      <section className="entreprise-row reverse">
        <div className="entreprise-row-text">
          <h3>Développement des applications Mobiles sur mesure</h3>
        </div>
        <div className="entreprise-row-image">
          <img src={require('../assets/img/200.PNG')} alt="Applications mobiles" />
        </div>
      </section>

      <section className="frameworks-hero">
        <div className="frameworks-hero-bg"></div>
        <div className="frameworks-hero-content">
          <h2 className="frameworks-question">Quels Frameworks utiliser ?</h2>
          <div className="frameworks-divider">
            <span className="frameworks-icon">🛠️</span>
          </div>
          <h1 className="frameworks-title">
            DÉVELOPPEMENT DE VOTRE APPLICATION AVEC<br />
            UNE MULTITUDE DE FRAMEWORKS OPEN SOURCE
          </h1>
          <p className="frameworks-desc">
            Un framework défini des conventions et des méthodologies standardisées pour un certain nombre de tâches,
            d’où le terme « convention over configuration », le respect de ces pratiques dans un framework permet de
            faciliter l’entrée d’un nouveau développeur dans un projet existant dès le moment où celui-ci connait le
            framework utilisé. Pour terminer, l’un de ses points les plus positifs est qu’il assure une maintenance évolutive
            des applications.
          </p>
        </div>
      </section>

      <section className="frameworks-card">
        <img
          src={require('../assets/img/framework.PNG')}
          alt="Nuage de frameworks"
          className="frameworks-cloud-img"
        />
      </section>
    </div>
  );
};

export default Entreprise;
