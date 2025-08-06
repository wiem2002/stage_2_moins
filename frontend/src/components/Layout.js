import React from 'react';
import Sidebar from './Sidebar';

const Layout = ({ children }) => {
  return (
    <div className="flex h-screen bg-gray-50">
      {/* Sidebar - Prend 1/5 de l'écran */}
      <div className="w-1/5 bg-gradient-to-b from-blue-600 to-purple-700 text-white p-4">
        <Sidebar />
      </div>
      
      {/* Contenu principal - Prend 4/5 de l'écran */}
      <div className="w-4/5 overflow-y-auto p-6">
        {children}
      </div>
    </div>
  );
};

export default Layout;