import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  AreaChart, Area, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer,
  PieChart, Pie, Cell, Legend
} from 'recharts';
import { FiPackage, FiDatabase, FiAlertTriangle } from 'react-icons/fi';

const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884D8'];

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

function MetricCard({ icon, title, value, format, isNegative }) {
  const formatValue = () => {
    if (format === 'currency') {
      return value.toLocaleString('fr-FR', { style: 'currency', currency: 'TND' });
    }
    if (format === 'number') {
      return value.toLocaleString('fr-FR');
    }
    return value;
  };

  return (
    <div style={{
      background: '#fff',
      padding: 20,
      borderRadius: 10,
      boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
      flex: '1',
      display: 'flex',
      justifyContent: 'space-between',
      alignItems: 'center',
      minWidth: 220,
      marginBottom: 20,
    }}>
      <div>
        <div style={{ fontSize: 14, color: '#666' }}>{title}</div>
        <div style={{ fontSize: 24, fontWeight: 'bold', color: isNegative ? '#c53030' : '#2d3748' }}>
          {formatValue()}
        </div>
      </div>
      <div style={{ fontSize: 28, color: '#3182ce' }}>
        {icon}
      </div>
    </div>
  );
}

function Table({ title, columns, data }) {
  return (
    <div style={{
      background: '#fff',
      padding: 20,
      borderRadius: 10,
      boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
      marginBottom: 30
    }}>
      <h3 style={{ marginBottom: 12 }}>{title}</h3>
      <table style={{ width: '100%', borderCollapse: 'collapse' }}>
        <thead>
          <tr>
            {columns.map(col => (
              <th key={col.key} style={{ borderBottom: '1px solid #ddd', padding: 8, textAlign: 'left', fontWeight: 'bold', fontSize: 14, color: '#555' }}>
                {col.header}
              </th>
            ))}
          </tr>
        </thead>
        <tbody>
          {data.length === 0 ? (
            <tr><td colSpan={columns.length} style={{ textAlign: 'center', padding: 20 }}>Aucune donnée disponible</td></tr>
          ) : data.map((row, i) => (
            <tr key={i} style={{ borderBottom: '1px solid #eee' }}>
              {columns.map(col => {
                let val = row[col.key];
                if (col.format === 'currency') val = (val || 0).toLocaleString('fr-FR', { style: 'currency', currency: 'TND' });
                if (col.format === 'number') val = (val || 0).toLocaleString('fr-FR');
                if (val === null || val === undefined) val = '-';
                return <td key={col.key} style={{ padding: 8, fontSize: 14, color: '#444' }}>{val}</td>;
              })}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

function AlertSection({ title, items, renderItem }) {
  return (
    <div style={{
      backgroundColor: '#fff5f5',
      border: '1px solid #feb2b2',
      borderRadius: 10,
      padding: 20,
      marginBottom: 30
    }}>
      <h4 style={{ color: '#c53030', marginBottom: 12 }}>{title}</h4>
      {items.length === 0 ? (
        <p style={{ color: '#a0aec0' }}>Aucune alerte</p>
      ) : (
        items.slice(0, 5).map(renderItem)
      )}
    </div>
  );
}

export default function StocksDashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios.get('http://localhost:8000/api/dashboard/stocks')
      .then(res => {
        if (!res.data || !res.data.synthese || !res.data.details || !res.data.alertes) {
          throw new Error('Données API invalides');
        }
        setData(res.data);
        setLoading(false);
      })
      .catch(err => {
        setError(err.message || 'Erreur lors du chargement');
        setLoading(false);
      });
  }, []);

  if (loading) return <Loading />;
  if (error) return <Error message={error} />;
  if (!data) return <div style={{ textAlign: 'center', padding: 40 }}>Aucune donnée</div>;

  const { synthese, details, alertes } = data;

  return (
    <div style={{ padding: 20, fontFamily: 'Arial, sans-serif', backgroundColor: '#f7fafc', minHeight: '100vh' }}>
      <h1 style={{ textAlign: 'center', marginBottom: 30 }}>Tableau de Bord Stocks</h1>

      {/* Cartes Synthèse */}
      <div style={{ display: 'flex', gap: 20, flexWrap: 'wrap', justifyContent: 'center', marginBottom: 40 }}>
        <MetricCard icon={<FiPackage />} title="Articles en Stock" value={synthese.total_articles || 0} format="number" />
        <MetricCard icon={<FiDatabase />} title="Valeur Totale" value={synthese.total_valeur || 0} format="currency" />
        <MetricCard icon={<FiAlertTriangle />} title="Alertes Stock Bas" value={synthese.alertes_stock_bas || 0} format="number" isNegative />
      </div>

      {/* Graphiques */}
      <div style={{ display: 'flex', gap: 30, flexWrap: 'wrap', marginBottom: 40 }}>
        <div style={{ flex: 1, minWidth: 320, background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', height: 300 }}>
          <h3 style={{ marginBottom: 16 }}>Valeur par Catégorie</h3>
          <ResponsiveContainer width="100%" height="90%">
            <AreaChart data={details.par_categorie || []}>
              <CartesianGrid strokeDasharray="3 3" />
              <XAxis dataKey="ART_CATEG" />
              <YAxis />
              <Tooltip formatter={v => v.toLocaleString('fr-FR') + ' DT'} />
              <Area type="monotone" dataKey="valeur" stroke="#8884d8" fill="#8884d8" />
            </AreaChart>
          </ResponsiveContainer>
        </div>

        <div style={{ flex: 1, minWidth: 320, background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', height: 300 }}>
          <h3 style={{ marginBottom: 16 }}>Répartition par Emplacement</h3>
          <ResponsiveContainer width="100%" height="90%">
            <PieChart>
              <Pie
                data={details.par_emplacement || []}
                cx="50%"
                cy="50%"
                outerRadius={80}
                dataKey="quantite"
                nameKey="DEP_CODE"
                label={({ name, percent }) => `${name} ${(percent * 100).toFixed(1)}%`}
              >
                {(details.par_emplacement || []).map((entry, index) => (
                  <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip formatter={v => v.toLocaleString('fr-FR')} />
              <Legend />
            </PieChart>
          </ResponsiveContainer>
        </div>
      </div>

      {/* Tables */}
      <Table
        title="Articles avec Stock Bas"
        columns={[
          { key: 'ART_CODE', header: 'Code' },
          { key: 'ART_LIB', header: 'Libellé' },
          { key: 'STK_REEL', header: 'Stock', format: 'number' },
          { key: 'STK_SEUIL', header: 'Seuil', format: 'number' },
          { key: 'valeur', header: 'Valeur', format: 'currency' }
        ]}
        data={details.articles_stock_bas || []}
      />

      <Table
        title="Mouvements Récents"
        columns={[
          { key: 'DOC_DATE', header: 'Date' },
          { key: 'type', header: 'Type' },
          { key: 'ART_CODE', header: 'Article' },
          { key: 'INV_QTE', header: 'Quantité', format: 'number' }
        ]}
        data={details.mouvements_recents || []}
      />

      {/* Alertes */}
      <div style={{ marginTop: 30 }}>
        <h3 style={{ marginBottom: 20, color: '#c53030', textAlign: 'center' }}>
          Alertes et Indicateurs
        </h3>
        <AlertSection
          title="Stock Bas"
          items={alertes.stock_bas || []}
          renderItem={item => (
            <div key={item.ART_CODE} style={{ marginBottom: 8 }}>
              <strong>{item.ART_CODE}</strong> :&nbsp;
              <span style={{ color: '#c53030' }}>
                {item.STK_REEL} / Seuil {item.STK_SEUIL}
              </span>
            </div>
          )}
        />
        <AlertSection
          title="Péremption Proche"
          items={alertes.peremption || []}
          renderItem={item => (
            <div key={item.LLI_NUMLOT} style={{ marginBottom: 8 }}>
              <strong>Lot {item.LLI_NUMLOT}</strong> :&nbsp;
              <span style={{ color: '#dd6b20' }}>
                {new Date(item.LLI_DT_PER).toLocaleDateString()} ({item.jours_restants} jours)
              </span>
            </div>
          )}
        />
        <AlertSection
          title="Mouvements Anormaux"
          items={alertes.mouvements_anormaux || []}
          renderItem={item => (
            <div key={`${item.DOC_DATE}-${item.ART_CODE}`} style={{ marginBottom: 8 }}>
              <strong>{item.ART_CODE}</strong> :&nbsp;
              <span style={{ color: '#3182ce' }}>
                {item.type} de {item.INV_QTE} unités
              </span>
            </div>
          )}
        />
      </div>
    </div>
  );
}
