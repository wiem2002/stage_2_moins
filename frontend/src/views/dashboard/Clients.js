import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer,
  PieChart, Pie, Cell, Legend
} from 'recharts';
import {
  FiUsers, FiUser, FiClock, FiAlertTriangle, 
  FiMap, FiBriefcase, FiPhone, FiMail,
  FiTrendingUp
} from 'react-icons/fi';

// Utility Components
const LoadingSpinner = () => (
  <div className="flex justify-center items-center h-64">
    <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-purple-500"></div>
  </div>
);

const ErrorDisplay = ({ message }) => (
  <div className="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
    <p className="font-bold">Erreur</p>
    <p>{message}</p>
  </div>
);

const DashboardHeader = () => (
  <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
    <div>
      <h1 className="text-2xl md:text-3xl font-bold text-gray-800">Tableau de Bord Clients</h1>
      <p className="text-gray-600">Synthèse de la relation client</p>
    </div>
    <div className="mt-4 md:mt-0 bg-white p-3 rounded-lg shadow-xs border border-gray-200">
      <span className="text-sm text-gray-500">Dernière mise à jour: </span>
      <span className="text-sm font-medium">{new Date().toLocaleString()}</span>
    </div>
  </div>
);

const MetricCard = ({ icon, title, value, format, trend, isNegative }) => {
  const formattedValue = format === 'currency' 
    ? new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'TND' }).format(value)
    : format === 'number'
    ? new Intl.NumberFormat('fr-FR').format(value)
    : value;

  return (
    <div className={`bg-white p-6 rounded-lg shadow-md border ${isNegative ? 'border-red-200' : 'border-gray-100'}`}>
      <div className="flex justify-between">
        <div>
          <p className="text-sm font-medium text-gray-500">{title}</p>
          <p className={`text-2xl font-bold mt-1 ${isNegative ? 'text-red-600' : 'text-gray-800'}`}>
            {formattedValue}
          </p>
        </div>
        <div className="p-3 rounded-full bg-blue-50 text-blue-600">
          {icon}
        </div>
      </div>
      {trend && (
        <div className={`flex items-center mt-2 ${trend > 0 ? 'text-red-600' : 'text-green-600'}`}>
          {trend > 0 ? (
            <FiTrendingUp className="mr-1" />
          ) : (
            <FiTrendingUp className="mr-1 transform rotate-180" />
          )}
          <span className="text-sm">{Math.abs(trend).toFixed(2)}%</span>
        </div>
      )}
    </div>
  );
};

const DataTable = ({ title, columns, data }) => {
  if (!data || data.length === 0) {
    return (
      <div className="bg-white p-6 rounded-lg shadow-md">
        <h3 className="text-lg font-semibold mb-4">{title}</h3>
        <p className="text-gray-500">Aucune donnée disponible</p>
      </div>
    );
  }

  return (
    <div className="bg-white p-6 rounded-lg shadow-md">
      <h3 className="text-lg font-semibold mb-4">{title}</h3>
      <div className="overflow-x-auto">
        <table className="min-w-full divide-y divide-gray-200">
          <thead className="bg-gray-50">
            <tr>
              {columns.map((col) => (
                <th key={col.key} className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  {col.header}
                </th>
              ))}
            </tr>
          </thead>
          <tbody className="bg-white divide-y divide-gray-200">
            {data.map((row, i) => (
              <tr key={i}>
                {columns.map((col) => {
                  let value = row[col.key];
                  if (col.format === 'currency') {
                    value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'TND' }).format(value || 0);
                  } else if (col.format === 'number') {
                    value = new Intl.NumberFormat('fr-FR').format(value || 0);
                  } else if (col.format === 'date') {
                    value = new Date(value).toLocaleDateString();
                  }
                  return (
                    <td key={col.key} className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      {value || '-'}
                    </td>
                  );
                })}
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
};

const AlertCard = ({ title, items, renderItem }) => (
  <div className="bg-red-50 p-4 rounded-lg border border-red-100">
    <h4 className="font-medium text-red-800 mb-2">{title}</h4>
    <div className="space-y-2">
      {items.length > 0 ? (
        items.slice(0, 3).map(renderItem)
      ) : (
        <p className="text-sm text-gray-500">Aucune alerte</p>
      )}
    </div>
  </div>
);

// Main Component
const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#8884D8'];

export default function ClientsDashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('/api/dashboard/clients');
        
        if (!response.data || !response.data.synthese || !response.data.details) {
          throw new Error('Structure de données incorrecte');
        }
        
        setData(response.data);
      } catch (err) {
        setError(err.response?.data?.message || err.message || 'Erreur de chargement des données');
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

  if (loading) return <LoadingSpinner />;
  if (error) return <ErrorDisplay message={error} />;
  if (!data) return <ErrorDisplay message="Aucune donnée disponible" />;

  // Safely access nested data with fallbacks
  const synthese = data.synthese || {};
  const details = data.details || {};
  const alertes = data.alertes || {};

  return (
    <div className="container mx-auto px-4 py-8">
      <DashboardHeader />
      
      {/* Summary Section */}
      <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <MetricCard 
          icon={<FiUsers />}
          title="Clients Actifs"
          value={synthese.total_clients || 0}
          format="number"
        />
        <MetricCard 
          icon={<FiUser />}
          title="Prospects"
          value={synthese.total_prospects || 0}
          format="number"
        />
        <MetricCard 
          icon={<FiUsers />}
          title="Clients Non Bloqués"
          value={synthese.clients_actifs || 0}
          format="number"
        />
        <MetricCard 
          icon={<FiClock />}
          title="Contacts Récents"
          value={synthese.contacts_recents || 0}
          format="number"
        />
      </div>

      {/* Main Charts */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div className="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
          <h3 className="text-lg font-semibold mb-4">Répartition par Région</h3>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
              <BarChart data={details.par_region || []}>
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="region" />
                <YAxis />
                <Tooltip />
                <Bar dataKey="nombre_clients" fill="#8884d8" name="Nombre de clients" />
              </BarChart>
            </ResponsiveContainer>
          </div>
        </div>

        <div className="bg-white p-6 rounded-lg shadow-md">
          <h3 className="text-lg font-semibold mb-4">Répartition par Représentant</h3>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
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
        </div>
      </div>

      {/* Tables and Details */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
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

      {/* Alerts */}
      <div className="bg-white p-6 rounded-lg shadow-md mb-8">
        <h3 className="text-lg font-semibold mb-4 flex items-center">
          <FiAlertTriangle className="text-red-500 mr-2" />
          Alertes Clients
        </h3>
        
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          <AlertCard 
            title="Clients Bloqués"
            items={alertes.clients_bloques || []}
            renderItem={(item) => (
              <div key={item.PCF_CODE || 'na'}>
                <span className="font-medium">{item.PCF_RS || 'N/A'}</span>: 
                <span className="text-red-600 ml-1">
                  Bloqué depuis {new Date(item.date_blocage).toLocaleDateString()}
                </span>
              </div>
            )}
          />

          <AlertCard 
            title="Risques d'Impayés"
            items={alertes.risques_impayes || []}
            renderItem={(item) => (
              <div key={item.PCF_CODE || 'na'}>
                <span className="font-medium">{item.PCF_RS || 'N/A'}</span>: 
                <span className="text-orange-600 ml-1">
                  Niveau risque: {item.PCF_RISQUE || 'N/A'}
                </span>
              </div>
            )}
          />

          <AlertCard 
            title="Sans Contact Récent"
            items={alertes.sans_contact_recent || []}
            renderItem={(item) => (
              <div key={item.PCF_CODE || 'na'}>
                <span className="font-medium">{item.PCF_RS || 'N/A'}</span>: 
                <span className="text-blue-600 ml-1">
                  Créé le {new Date(item.date_creation).toLocaleDateString()}
                </span>
              </div>
            )}
          />
        </div>
      </div>
    </div>
  );
}