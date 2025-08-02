
import React from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import './App.css';
import Header from './components/Header';
import Sidebar from './components/Sidebar';
import Home from './views/Home';
import Entreprise from './views/Entreprise';

import Ventes from "./views/dashboard/Ventes";
import Achats from "./views/dashboard/Achats";
import Stocks from "./views/dashboard/Stocks";
import Clients from "./views/dashboard/Clients";
import Comptabilite from "./views/dashboard/Comptabilite";
import Projets from "./views/dashboard/Projets";

function AppLayout() {
  return (
    <div className="App">
      <Header />
      <div style={{ display: 'flex' }}>
        <Sidebar />
        <main style={{ flex: 1, padding: '1rem' }}>
          <Route path="/" element={<Home />} />
            <Route path="/dashboard/ventes" element={<Ventes />} />
            <Route path="/dashboard/achats" element={<Achats />} />
            <Route path="/dashboard/stocks" element={<Stocks />} />
            <Route path="/dashboard/clients" element={<Clients />} />
            <Route path="/dashboard/comptabilite" element={<Comptabilite />} />
            <Route path="/dashboard/projets" element={<Projets />} />
          <Home />
        </main>
      </div>
    </div>
  );
}

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/entreprise" element={<Entreprise />} />
        <Route path="/*" element={<AppLayout />} />
        
      </Routes>
    </Router>
  );
}

export default App;
