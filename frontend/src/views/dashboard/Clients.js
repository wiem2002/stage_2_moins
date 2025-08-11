import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer,
  PieChart, Pie, Cell, Legend
} from 'recharts';
import {
  FiUsers, FiUser, FiClock, FiAlertTriangle
} from 'react-icons/fi';

// Couleurs graphiques
const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884D8'];

// Styles simples CSS en JS
const styles = {
  container: {
    maxWidth: 1200,
    margin: '0 auto',
    padding: 20,
    fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
    backgroundColor: '#f9fafb',
    minHeight: '100vh'
  },
  header: {
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-between',
    marginBottom: 32
  },
  headerTitle: {
    fontSize: 28,
    fontWeight: 'bold',
    color: '#2d3748',
    marginBottom: 6
  },
  headerSubtitle: {
    color: '#718096',
    fontSize: 16
  },
  timestamp: {
    backgroundColor: 'white',
    padding: 10,
    borderRadius: 8,
    border: '1px solid #e2e8f0',
    color: '#4a5568',
    fontSize: 14,
    alignSelf: 'center'
  },
  grid4: {
    display: 'grid',
    gridTemplateColumns: 'repeat(auto-fit, minmax(220px, 1fr))',
    gap: 16,
    marginBottom: 40
  },
  metricCard: {
    backgroundColor: 'white',
    padding: 20,
    borderRadius: 8,
    boxShadow: '0 2px 6px rgba(0,0,0,0.1)',
    border: '1px solid #e2e8f0',
    display: 'flex',
    justifyContent: 'space-between',
    alignItems: 'center'
  },
  metricInfo: {
    display: 'flex',
    flexDirection: 'column'
  },
  metricTitle: {
    fontSize: 14,
    color: '#718096',
    marginBottom: 4,
    fontWeight: '600'
  },
  metricValue: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#2d3748'
  },
  metricIconWrapper: {
    fontSize: 36,
    color: '#3182ce',
    backgroundColor: '#ebf8ff',
    padding: 12,
    borderRadius: '50%'
  },
  section: {
    marginBottom: 40
  },
  sectionTitle: {
    fontSize: 20,
    fontWeight: '600',
    color: '#2d3748',
    marginBottom: 16
  },
  dataTable: {
    backgroundColor: 'white',
    borderRadius: 8,
    padding: 20,
    boxShadow: '0 2px 6px rgba(0,0,0,0.1)',
    border: '1px solid #e2e8f0',
    overflowX: 'auto'
  },
  table: {
    width: '100%',
    borderCollapse: 'collapse'
  },
  th: {
    textAlign: 'left',
    padding: '12px 8px',
    fontSize: 12,
    fontWeight: '700',
    color: '#4a5568',
    borderBottom: '2px solid #e2e8f0',
    textTransform: 'uppercase'
  },
  td: {
    padding: '10px 8px',
    fontSize: 14,
    color: '#4a5568',
    borderBottom: '1px solid #e2e8f0'
  },
  alertCard: {
    backgroundColor: '#fff5f5',
    borderRadius: 8,
    padding: 16,
    border: '1px solid #feb2b2',
    color: '#c53030',
    fontWeight: '600',
    fontSize: 14
  },
  alertItem: {
    marginBottom: 8
  },
  loading: {
    textAlign: 'center',
    padding: 40,
    fontSize: 24,
    color: '#718096'
  },
  error: {
    backgroundColor: '#fed7d7',
    color: '#c53030',
    padding: 20,
    borderRadius: 8,
    textAlign: 'center',
    fontWeight: '600'
  }
};

function Loading() {
  return <div style={styles.loading}>Chargement des données...</div>;
}

function Error({ message }) {
  return <div style={styles.error}>Erreur: {message}</div>;
}

function MetricCard({ icon, title, value, format }) {
  let displayValue = value;
  if (format === 'currency') {
    displayValue = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'TND' }).format(value || 0);
  } else if (format === 'number') {
    displayValue = new Intl.NumberFormat('fr-FR').format(value || 0);
  }
  return (
    <div style={styles.metricCard}>
      <div style={styles.metricInfo}>
        <div style={styles.metricTitle}>{title}</div>
        <div style={styles.metricValue}>{displayValue}</div>
      </div>
      <div style={styles.metricIconWrapper}>{icon}</div>
    </div>
  );
}

function DataTable({ title, columns, data }) {
  if (!data || data.length === 0) {
    return (
      <div style={styles.dataTable}>
        <h3 style={styles.sectionTitle}>{title}</h3>
        <p>Aucune donnée disponible</p>
      </div>
    );
  }
  return (
    <div style={styles.dataTable}>
      <h3 style={styles.sectionTitle}>{title}</h3>
      <table style={styles.table}>
        <thead>
          <tr>
            {columns.map(col => (
              <th key={col.key} style={styles.th}>{col.header}</th>
            ))}
          </tr>
        </thead>
        <tbody>
          {data.map((row, i) => (
            <tr key={i}>
              {columns.map(col => {
                let val = row[col.key];
                if (col.format === 'currency') {
                  val = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'TND' }).format(val || 0);
                } else if (col.format === 'date') {
                  val = val ? new Date(val).toLocaleDateString() : '-';
                } else if (col.format === 'number') {
                  val = new Intl.NumberFormat('fr-FR').format(val || 0);
                }
                return <td key={col.key} style={styles.td}>{val || '-'}</td>;
              })}
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

function AlertCard({ title, items, renderItem }) {
  return (
    <div style={{ ...styles.alertCard, marginBottom: 20 }}>
      <h4 style={{ marginBottom: 12 }}>{title}</h4>
      {items && items.length > 0 ? items.slice(0, 3).map(renderItem) : <p>Aucune alerte</p>}
    </div>
  );
}

export default function ClientsDashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios.get('/api/dashboard/clients')
      .then(res => {
        setData(res.data);
        setLoading(false);
      })
      .catch(err => {
        setError(err.response?.data?.message || err.message || 'Erreur chargement');
        setLoading(false);
      });
  }, []);

  if (loading) return <Loading />;
  if (error) return <Error message={error} />;
  if (!data) return <Error message="Aucune donnée disponible" />;

  const { synthese = {}, details = {}, alertes = {} } = data;

  return (
    <div style={styles.container}>
      {/* Header */}
      <header style={styles.header}>
        <div>
          <h1 style={styles.headerTitle}>Tableau de Bord Clients</h1>
          <p style={styles.headerSubtitle}>Synthèse de la relation client</p>
        </div>
        <div style={styles.timestamp}>
          Dernière mise à jour : {new Date(data.timestamp).toLocaleString()}
        </div>
      </header>

      {/* Synthèse */}
      <section style={styles.grid4}>
        <MetricCard icon={<FiUsers />} title="Total Clients" value={synthese.total_clients} format="number" />
        <MetricCard icon={<FiUser />} title="Total Prospects" value={synthese.total_prospects} format="number" />
        <MetricCard icon={<FiUsers />} title="Clients Actifs (Non Bloqués)" value={synthese.clients_actifs} format="number" />
        <MetricCard icon={<FiClock />} title="Contacts Récents (30j)" value={synthese.contacts_recents} format="number" />
      </section>

      {/* Graphiques */}
      <section style={{ display: 'flex', gap: 20, marginBottom: 40, flexWrap: 'wrap' }}>
        <div style={{ backgroundColor: 'white', padding: 20, borderRadius: 8, boxShadow: '0 2px 6px rgba(0,0,0,0.1)', flex: '2 1 600px', minHeight: 320 }}>
          <h3 style={styles.sectionTitle}>Répartition par Région</h3>
          <ResponsiveContainer width="100%" height={280}>
            <BarChart data={details.par_region || []}>
              <CartesianGrid strokeDasharray="3 3" />
              <XAxis dataKey="region" />
              <YAxis />
              <Tooltip />
              <Bar dataKey="nombre_clients" fill="#8884d8" name="Nombre de clients" />
            </BarChart>
          </ResponsiveContainer>
        </div>

        <div style={{ backgroundColor: 'white', padding: 20, borderRadius: 8, boxShadow: '0 2px 6px rgba(0,0,0,0.1)', flex: '1 1 300px', minHeight: 320 }}>
          <h3 style={styles.sectionTitle}>Répartition par Représentant</h3>
          <ResponsiveContainer width="100%" height={280}>
            <PieChart>
              <Pie
                data={details.par_representant || []}
                cx="50%"
                cy="50%"
                outerRadius={100}
                fill="#8884d8"
                dataKey="nombre_clients"
                nameKey="REP_CODE"
                label={({ name, percent }) => `${name} ${(percent * 100).toFixed(1)}%`}
              >
                {(details.par_representant || []).map((entry, index) => (
                  <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip />
              <Legend />
            </PieChart>
          </ResponsiveContainer>
        </div>
      </section>

      {/* Tables */}
      <section style={{ display: 'flex', gap: 20, flexWrap: 'wrap', marginBottom: 40 }}>
        <div style={{ flex: '1 1 600px' }}>
          <DataTable
            title="Clients Importants"
            columns={[
              { key: 'PCF_CODE', header: 'Code' },
              { key: 'PCF_RS', header: 'Raison Sociale' },
              { key: 'capital', header: 'Capital', format: 'currency' },
              { key: 'PCF_VILLE', header: 'Ville' }
            ]}
            data={details.clients_importants || []}
          />
        </div>
        <div style={{ flex: '1 1 600px' }}>
          <DataTable
            title="Derniers Contacts"
            columns={[
              { key: 'CCT_NOM', header: 'Nom' },
              { key: 'CCT_PRENOM', header: 'Prénom' },
              { key: 'PCF_RS', header: 'Client' },
              { key: 'CCT_FONCT', header: 'Fonction' },
              { key: 'CCT_TELD', header: 'Téléphone' },
              { key: 'date_contact', header: 'Date', format: 'date' }
            ]}
            data={details.derniers_contacts || []}
          />
        </div>
      </section>

      {/* Alertes */}
      <section style={{ display: 'flex', gap: 20, flexWrap: 'wrap' }}>
        <div style={{ flex: '1 1 300px' }}>
          <AlertCard
            title="Clients Bloqués"
            items={alertes.clients_bloques || []}
            renderItem={item => (
              <div key={item.PCF_CODE} style={styles.alertItem}>
                <strong>{item.PCF_RS || '-'}</strong> : <span>Bloqué depuis {new Date(item.date_blocage).toLocaleDateString()}</span>
              </div>
            )}
          />
        </div>
        <div style={{ flex: '1 1 300px' }}>
          <AlertCard
            title="Risques d'Impayés"
            items={alertes.risques_impayes || []}
            renderItem={item => (
              <div key={item.PCF_CODE} style={styles.alertItem}>
                <strong>{item.PCF_RS || '-'}</strong> : <span>Niveau de risque : {item.PCF_RISQUE || '-'}</span>
              </div>
            )}
          />
        </div>
        <div style={{ flex: '1 1 300px' }}>
          <AlertCard
            title="Sans Contact Récent"
            items={alertes.sans_contact_recent || []}
            renderItem={item => (
              <div key={item.PCF_CODE} style={styles.alertItem}>
                <strong>{item.PCF_RS || '-'}</strong> : <span>Créé le {new Date(item.date_creation).toLocaleDateString()}</span>
              </div>
            )}
          />
        </div>
      </section>
    </div>
  );
}
