
import React from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import './App.css';
import Header from './components/Header';
import Sidebar from './components/Sidebar';
import Home from './views/Home';
import Entreprise from './views/Entreprise';

function AppLayout() {
  return (
    <div className="App">
      <Header />
      <div style={{ display: 'flex' }}>
        <Sidebar />
        <main style={{ flex: 1, padding: '1rem' }}>
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
