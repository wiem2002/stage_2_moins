import React, { useState, useEffect } from 'react';
import axios from 'axios';

function Loading() {
  return <div style={{ textAlign: 'center', padding: 50 }}>Chargement...</div>;
}

function Error({ message }) {
  return (
    <div style={{ color: 'red', backgroundColor: '#ffe6e6', padding: 20, borderRadius: 8, margin: 20 }}>
      <strong>Erreur :</strong> {message}
    </div>
  );
}

function Filters({ filters, setFilters }) {
  const handleChange = e => {
    const { name, value } = e.target;
    setFilters(prev => ({ ...prev, [name]: value }));
  };

  return (
    <div style={{ marginBottom: 20, display: 'flex', gap: 15, flexWrap: 'wrap' }}>
      <select
        name="emplacement"
        value={filters.emplacement}
        onChange={handleChange}
        style={{ padding: 8, flex: 1, minWidth: 150 }}
      >
        <option value="">Tous les emplacements</option>
        <option value="D01">D01</option>
        <option value="D02">D02</option>
        <option value="D03">D03</option>
        <option value="D04">D04</option>
      </select>
      <select
        name="categorie"
        value={filters.categorie}
        onChange={handleChange}
        style={{ padding: 8, flex: 1, minWidth: 150 }}
      >
        <option value="">Toutes les catégories</option>
        <option value="A">Catégorie A</option>
        <option value="B">Catégorie B</option>
      </select>
      <input
        type="number"
        name="stockMin"
        placeholder="Stock minimum"
        value={filters.stockMin}
        onChange={handleChange}
        style={{ padding: 8, width: 150 }}
        min={0}
      />
      <button 
        onClick={() => setFilters({ categorie: '', emplacement: '', stockMin: '' })}
        style={{ padding: 8, backgroundColor: '#f0f0f0', border: '1px solid #ddd' }}
      >
        Réinitialiser
      </button>
    </div>
  );
}

function Table({ data }) {
  if (data.length === 0) return <div style={{ textAlign: 'center', padding: 20 }}>Aucune donnée disponible</div>;

  return (
    <div style={{ overflowX: 'auto' }}>
      <table style={{ width: '100%', borderCollapse: 'collapse', marginBottom: 20 }}>
        <thead>
          <tr style={{ backgroundColor: '#f5f5f5' }}>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Code</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Libellé</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Gamme</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Stock Réel</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Stock Min</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Valeur (TND)</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Emplacement</th>
            <th style={{ padding: 12, border: '1px solid #ddd', textAlign: 'left' }}>Zone</th>
          </tr>
        </thead>
        <tbody>
          {data.map((item, index) => (
            <tr key={index} style={{ backgroundColor: index % 2 === 0 ? '#fff' : '#f9f9f9' }}>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.ART_CODE}</td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.ART_LIB}</td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.ART_GAMME}</td>
              <td style={{ 
                padding: 10, 
                border: '1px solid #ddd',
                color: item.STK_REEL < (item.STK_MIN || 0) ? 'red' : 'inherit',
                fontWeight: item.STK_REEL < (item.STK_MIN || 0) ? 'bold' : 'normal'
              }}>
                {item.STK_REEL}
              </td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.STK_MIN || '-'}</td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{(item.ART_PRIX * item.STK_REEL).toFixed(2)}</td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.DEP_CODE}</td>
              <td style={{ padding: 10, border: '1px solid #ddd' }}>{item.STK_ZONE}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

function Summary({ data }) {
  if (data.length === 0) return null;

  const totalStock = data.reduce((sum, item) => sum + item.STK_REEL, 0);
  const totalValue = data.reduce((sum, item) => sum + (item.ART_PRIX * item.STK_REEL), 0);
  const lowStockItems = data.filter(item => item.STK_REEL < (item.STK_MIN || 0)).length;

  return (
    <div style={{ 
      display: 'flex', 
      justifyContent: 'space-between', 
      marginBottom: 20,
      gap: 15,
      flexWrap: 'wrap'
    }}>
      <div style={{
        flex: 1,
        backgroundColor: '#e6f7ff',
        padding: 15,
        borderRadius: 8,
        minWidth: 200
      }}>
        <h3 style={{ marginTop: 0 }}>Articles en stock</h3>
        <p style={{ fontSize: 24, fontWeight: 'bold' }}>{data.length}</p>
      </div>
      <div style={{
        flex: 1,
        backgroundColor: '#f6ffed',
        padding: 15,
        borderRadius: 8,
        minWidth: 200
      }}>
        <h3 style={{ marginTop: 0 }}>Quantité totale</h3>
        <p style={{ fontSize: 24, fontWeight: 'bold' }}>{totalStock}</p>
      </div>
      <div style={{
        flex: 1,
        backgroundColor: '#fff7e6',
        padding: 15,
        borderRadius: 8,
        minWidth: 200
      }}>
        <h3 style={{ marginTop: 0 }}>Valeur totale (TND)</h3>
        <p style={{ fontSize: 24, fontWeight: 'bold' }}>{totalValue.toFixed(2)}</p>
      </div>
      <div style={{
        flex: 1,
        backgroundColor: lowStockItems > 0 ? '#fff1f0' : '#f6ffed',
        padding: 15,
        borderRadius: 8,
        minWidth: 200
      }}>
        <h3 style={{ marginTop: 0 }}>Stock faible</h3>
        <p style={{ 
          fontSize: 24, 
          fontWeight: 'bold',
          color: lowStockItems > 0 ? 'red' : 'inherit'
        }}>
          {lowStockItems}
        </p>
      </div>
    </div>
  );
}

export default function Stocks() {
  const [filters, setFilters] = useState({ categorie: '', emplacement: '', stockMin: '' });
  const [stocksData, setStocksData] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  // Simuler le chargement des données depuis les tables SQL fournies
  useEffect(() => {
    setLoading(true);
    // Simuler une requête API
    setTimeout(() => {
      try {
        // Combiner les données des tables ARTICLES et STOCK
        const combinedData = [
          {
            ART_CODE: "ART001",
            ART_LIB: "Stylo-Blue",
            ART_GAMME: "GammeA",
            ART_PRIX: 1.5,
            ART_CATEG: "A",
            DEP_CODE: "D01",
            STK_REEL: 137,
            STK_MIN: 100,
            STK_ZONE: "Zone1"
          },
          {
            ART_CODE: "ART002",
            ART_LIB: "Cahier-A4",
            ART_GAMME: "GammeA",
            ART_PRIX: 2,
            ART_CATEG: "A",
            DEP_CODE: "D01",
            STK_REEL: 94,
            STK_MIN: 200,
            STK_ZONE: "Zone2"
          },
          {
            ART_CODE: "ART003",
            ART_LIB: "Gomme",
            ART_GAMME: "GammeB",
            ART_PRIX: 0.75,
            ART_CATEG: "A",
            DEP_CODE: "D02",
            STK_REEL: 70,
            STK_MIN: 150,
            STK_ZONE: "Zone1"
          },
          {
            ART_CODE: "ART004",
            ART_LIB: "Crayon-HB",
            ART_GAMME: "GammeB",
            ART_PRIX: 0.5,
            ART_CATEG: "A",
            DEP_CODE: "D03",
            STK_REEL: 104,
            STK_MIN: 300,
            STK_ZONE: "Zone3"
          },
          {
            ART_CODE: "ART005",
            ART_LIB: "Feutre-Rouge",
            ART_GAMME: "GammeB",
            ART_PRIX: 1.7,
            ART_CATEG: "A",
            DEP_CODE: "D03",
            STK_REEL: 131,
            STK_MIN: 120,
            STK_ZONE: "Zone2"
          },
          {
            ART_CODE: "ART006",
            ART_LIB: "Bic-Mine",
            ART_GAMME: "GammeA",
            ART_PRIX: 3,
            ART_CATEG: "A",
            DEP_CODE: "D03",
            STK_REEL: 89,
            STK_MIN: 100,
            STK_ZONE: "Zone1"
          },
          {
            ART_CODE: "ART007",
            ART_LIB: "Calculatrice",
            ART_GAMME: "GammeB",
            ART_PRIX: 15.5,
            ART_CATEG: "A",
            DEP_CODE: "D04",
            STK_REEL: 130,
            STK_MIN: 50,
            STK_ZONE: "Zone3"
          }
        ];

        // Appliquer les filtres
        let filteredData = combinedData;
        
        if (filters.emplacement) {
          filteredData = filteredData.filter(item => item.DEP_CODE === filters.emplacement);
        }
        
        if (filters.categorie) {
          filteredData = filteredData.filter(item => item.ART_CATEG === filters.categorie);
        }
        
        if (filters.stockMin) {
          const minStock = parseInt(filters.stockMin);
          filteredData = filteredData.filter(item => item.STK_REEL <= minStock);
        }

        setStocksData(filteredData);
        setLoading(false);
      } catch (err) {
        setError("Erreur lors du chargement des données");
        setLoading(false);
      }
    }, 800);
  }, [filters]);

  const handleExport = () => {
    // Simuler l'export CSV
    const headers = ["Code", "Libellé", "Gamme", "Stock Réel", "Stock Min", "Valeur (TND)", "Emplacement", "Zone"];
    const csvContent = [
      headers.join(","),
      ...stocksData.map(item => [
        item.ART_CODE,
        item.ART_LIB,
        item.ART_GAMME,
        item.STK_REEL,
        item.STK_MIN || '',
        (item.ART_PRIX * item.STK_REEL).toFixed(2),
        item.DEP_CODE,
        item.STK_ZONE
      ].join(","))
    ].join("\n");

    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const url = URL.createObjectURL(blob);
    const link = document.createElement("a");
    link.setAttribute("href", url);
    link.setAttribute("download", "export_stock.csv");
    link.style.visibility = "hidden";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  };

  return (
    <div style={{ 
      maxWidth: 1200, 
      margin: '20px auto', 
      fontFamily: 'Arial, sans-serif',
      padding: 20
    }}>
      <h1 style={{ color: '#333', marginBottom: 20 }}>Gestion des Stocks</h1>
      
      <Filters filters={filters} setFilters={setFilters} />

      {loading && <Loading />}
      {error && <Error message={error} />}

      {!loading && !error && (
        <>
          <Summary data={stocksData} />
          <Table data={stocksData} />

          <div style={{ 
            display: 'flex', 
            justifyContent: 'space-between', 
            alignItems: 'center',
            marginTop: 20
          }}>
            <div>
              <span>Total: {stocksData.length} articles</span>
            </div>
            <div style={{ display: 'flex', gap: 10 }}>
              <button 
                onClick={handleExport}
                style={{
                  padding: '8px 16px',
                  backgroundColor: '#1890ff',
                  color: 'white',
                  border: 'none',
                  borderRadius: 4,
                  cursor: 'pointer'
                }}
              >
                Exporter CSV
              </button>
            </div>
          </div>
        </>
      )}
    </div>
  );
}