import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  AreaChart, Area, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer,
  PieChart, Pie, Cell, Legend
} from 'recharts';
import { FiDollarSign, FiTrendingUp, FiAlertTriangle, FiShoppingCart, FiPercent } from 'react-icons/fi';

const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884D8'];

function Loading() {
  return <div style={{textAlign: 'center', padding: 50}}>Chargement...</div>;
}

function Error({ message }) {
  return (
    <div style={{color: 'red', backgroundColor: '#ffe6e6', padding: 20, borderRadius: 8, margin: 20}}>
      <strong>Erreur :</strong> {message}
    </div>
  );
}

function MetricCard({ icon, title, value, format, trend, isNegative }) {
  const formatValue = () => {
    if (format === 'currency') {
      return value.toLocaleString('fr-FR', { style: 'currency', currency: 'TND' });
    }
    if (format === 'percentage') {
      return `${value.toFixed(2)}%`;
    }
    return value;
  };

  return (
    <div style={{
      background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', flex: '1',
      display: 'flex', justifyContent: 'space-between', alignItems: 'center', minWidth: 220,
    }}>
      <div>
        <div style={{fontSize: 14, color: '#666'}}>{title}</div>
        <div style={{fontSize: 24, fontWeight: 'bold', color: isNegative ? '#c53030' : '#2d3748'}}>
          {formatValue()}
        </div>
        {typeof trend === 'number' && (
          <div style={{marginTop: 4, color: trend > 0 ? '#c53030' : '#38a169', display: 'flex', alignItems: 'center'}}>
            {trend > 0 ? '▲' : '▼'}&nbsp;{Math.abs(trend).toFixed(2)}%
          </div>
        )}
      </div>
      <div style={{fontSize: 28, color: '#3182ce'}}>
        {icon}
      </div>
    </div>
  );
}

function Table({ title, columns, data }) {
  return (
    <div style={{background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', marginBottom: 30}}>
      <h3 style={{marginBottom: 12}}>{title}</h3>
      <table style={{width: '100%', borderCollapse: 'collapse'}}>
        <thead>
          <tr>
            {columns.map(col => (
              <th key={col.key} style={{borderBottom: '1px solid #ddd', padding: 8, textAlign: 'left', fontWeight: 'bold', fontSize: 14, color: '#555'}}>
                {col.header}
              </th>
            ))}
          </tr>
        </thead>
        <tbody>
          {data.length === 0 ? (
            <tr><td colSpan={columns.length} style={{textAlign: 'center', padding: 20}}>Aucune donnée disponible</td></tr>
          ) : data.map((row, i) => (
            <tr key={i} style={{borderBottom: '1px solid #eee'}}>
              {columns.map(col => {
                let val = row[col.key];
                if (col.format === 'currency') val = (val || 0).toLocaleString('fr-FR', { style: 'currency', currency: 'TND' });
                if (val === null || val === undefined) val = '-';
                return <td key={col.key} style={{padding: 8, fontSize: 14, color: '#444'}}>{val}</td>;
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
    <div style={{backgroundColor: '#fff5f5', border: '1px solid #feb2b2', borderRadius: 10, padding: 20, marginBottom: 30}}>
      <h4 style={{color: '#c53030', marginBottom: 12}}>{title}</h4>
      {items.length === 0 ? (
        <p style={{color: '#a0aec0'}}>Aucune alerte</p>
      ) : (
        items.slice(0, 5).map(renderItem)
      )}
    </div>
  );
}

export default function AchatsDashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios.get('http://localhost:8000/api/dashboard/achats')
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
  if (!data) return <div style={{textAlign:'center', padding:40}}>Aucune donnée</div>;

  const { synthese, details, alertes } = data;

  return (
    <div style={{padding: 20, fontFamily: 'Arial, sans-serif', backgroundColor: '#f7fafc', minHeight: '100vh'}}>
      <h1 style={{textAlign: 'center', marginBottom: 30}}>Tableau de Bord Achats</h1>

      {/* Cartes Synthèse */}
      <div style={{display: 'flex', gap: 20, flexWrap: 'wrap', justifyContent: 'center', marginBottom: 40}}>
        <MetricCard icon={<FiDollarSign />} title="Budget Total" value={synthese.total_budget || 0} format="currency" trend={synthese.ecart_budget?.pourcentage || 0} />
        <MetricCard icon={<FiShoppingCart />} title="Dépenses Réalisées" value={synthese.total_realise || 0} format="currency" />
        <MetricCard icon={<FiPercent />} title="Taux d'Engagement" value={synthese.taux_engagement || 0} format="percentage" />
        <MetricCard icon={<FiTrendingUp />} title="Écart Budget" value={synthese.ecart_budget?.montant || 0} format="currency" isNegative={(synthese.ecart_budget?.montant || 0) < 0} />
      </div>

      {/* Graphiques */}
      <div style={{display: 'flex', gap: 30, flexWrap: 'wrap', marginBottom: 40}}>
        <div style={{flex: 1, minWidth: 320, background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', height: 300}}>
          <h3 style={{marginBottom: 16}}>Évolution Mensuelle</h3>
          <ResponsiveContainer width="100%" height="90%">
            <AreaChart data={details.evolution_mensuelle || []}>
              <CartesianGrid strokeDasharray="3 3" />
              <XAxis dataKey="mois" tickFormatter={m => m.toString().padStart(2, '0')} />
              <YAxis />
              <Tooltip formatter={v => v.toLocaleString('fr-FR') + ' DT'} />
              <Area type="monotone" dataKey="budget" stroke="#8884d8" fill="#8884d8" />
              <Area type="monotone" dataKey="total" stroke="#82ca9d" fill="#82ca9d" />
            </AreaChart>
          </ResponsiveContainer>
        </div>

        <div style={{flex: 1, minWidth: 320, background: '#fff', padding: 20, borderRadius: 10, boxShadow: '0 2px 8px rgba(0,0,0,0.1)', height: 300}}>
          <h3 style={{marginBottom: 16}}>Répartition par Catégorie</h3>
          <ResponsiveContainer width="100%" height="90%">
            <PieChart>
              <Pie
                data={details.par_categorie || []}
                cx="50%"
                cy="50%"
                outerRadius={80}
                dataKey="montant"
                nameKey="categorie"
                label={({ name, percent }) => `${name} ${(percent * 100).toFixed(1)}%`}
              >
                {(details.par_categorie || []).map((entry, index) => (
                  <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip formatter={v => v.toLocaleString('fr-FR') + ' DT'} />
              <Legend />
            </PieChart>
          </ResponsiveContainer>
        </div>
      </div>

      {/* Tables */}
      <Table 
        title="Dépenses par Projet" 
        columns={[
          { key: 'PRJ_CODE', header: 'Projet' },
          { key: 'budget', header: 'Budget', format: 'currency' },
          { key: 'realise', header: 'Réalisé', format: 'currency' },
        ]} 
        data={details.par_projet || []} 
      />

      <Table 
        title="Top Fournisseurs" 
        columns={[
          { key: 'fournisseur', header: 'Fournisseur' },
          { key: 'montant', header: 'Montant', format: 'currency' },
          { key: 'projets', header: 'Projets' },
        ]} 
        data={details.par_fournisseur || []} 
      />

      {/* Alertes */}
      <div style={{marginTop: 30}}>
        <h3 style={{marginBottom: 20, color: '#c53030', textAlign: 'center'}}>
          <FiAlertTriangle /> Alertes et Indicateurs
        </h3>
        <AlertSection 
          title="Dépassements Budget" 
          items={alertes.depassements || []} 
          renderItem={item => (
            <div key={item.PRJ_CODE} style={{marginBottom: 8}}>
              <strong>{item.PRJ_CODE}</strong> :&nbsp;
              <span style={{color: '#c53030'}}>
                {item.realise?.toLocaleString('fr-FR')} DT / {item.budget?.toLocaleString('fr-FR')} DT
              </span>
            </div>
          )}
        />
        <AlertSection 
          title="Réappro Urgent" 
          items={alertes.reappro_urgent || []} 
          renderItem={item => (
            <div key={item.ART_CODE} style={{marginBottom: 8}}>
              <strong>{item.ART_CODE}</strong> :&nbsp;
              <span style={{color: '#dd6b20'}}>
                Stock {item.stock} / Cmd {item.commande}
              </span>
            </div>
          )}
        />
        <AlertSection 
          title="Remises Manquées" 
          items={alertes.remises_manquees || []} 
          renderItem={item => (
            <div key={item.PCF_CODE} style={{marginBottom: 8}}>
              <strong>{item.PCF_CODE}</strong> :&nbsp;
              <span style={{color: '#3182ce'}}>
                {item.remise_appliquee}% au lieu de {item.remise_negociee}%
              </span>
            </div>
          )}
        />
      </div>
    </div>
  );
}
