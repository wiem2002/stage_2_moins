import React, { useState, useEffect } from 'react';
import axios from 'axios';
import {
  AreaChart, Area, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer,
  PieChart, Pie, Cell, Legend
} from 'recharts';
import {
  FiPackage, FiAlertTriangle, FiTrendingUp,
  FiShoppingCart, FiPercent, FiDatabase, FiBox
} from 'react-icons/fi';

// Utility Components (identique à AchatsDashboard)
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

const NoDataAvailable = () => (
  <div className="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
    <p>Aucune donnée disponible</p>
  </div>
);

const DashboardHeader = () => (
  <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
    <div>
      <h1 className="text-2xl md:text-3xl font-bold text-gray-800">Tableau de Bord Stocks</h1>
      <p className="text-gray-600">Synthèse des niveaux de stock</p>
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
    <div className="bg-white p-6 rounded-lg shadow-md border border-gray-100">
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

const DataTable = ({ title, columns, data }) => (
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

export default function StocksDashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('/api/dashboard/stocks');
        
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
  if (!data) return <NoDataAvailable />;

  // Safely access nested data with fallbacks
  const synthese = data.synthese || {};
  const details = data.details || {};
  const alertes = data.alertes || {};

  return (
    <div className="container mx-auto px-4 py-8">
      <DashboardHeader />
      
      {/* Summary Section */}
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <MetricCard 
          icon={<FiPackage />}
          title="Articles en Stock"
          value={synthese.total_articles || 0}
          format="number"
        />
        <MetricCard 
          icon={<FiDatabase />}
          title="Valeur Totale"
          value={synthese.total_valeur || 0}
          format="currency"
        />
        <MetricCard 
          icon={<FiAlertTriangle />}
          title="Alertes Stock Bas"
          value={synthese.alertes_stock_bas || 0}
          isNegative={true}
        />
      </div>

      {/* Main Charts */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div className="bg-white p-6 rounded-lg shadow-md lg:col-span-2">
          <h3 className="text-lg font-semibold mb-4">Valeur par Catégorie</h3>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
              <AreaChart data={details.par_categorie || []}>
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="ART_CATEG" />
                <YAxis />
                <Tooltip formatter={(value) => [`${value} DT`, 'Valeur']} />
                <Area type="monotone" dataKey="valeur" stroke="#8884d8" fill="#8884d8" />
              </AreaChart>
            </ResponsiveContainer>
          </div>
        </div>

        <div className="bg-white p-6 rounded-lg shadow-md">
          <h3 className="text-lg font-semibold mb-4">Répartition par Emplacement</h3>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
              <PieChart>
                <Pie
                  data={details.par_emplacement || []}
                  cx="50%"
                  cy="50%"
                  outerRadius={100}
                  fill="#8884d8"
                  dataKey="quantite"
                  nameKey="DEP_CODE"
                  label={({ name, percent }) => `${name} ${(percent * 100).toFixed(1)}%`}
                >
                  {(details.par_emplacement || []).map((entry, index) => (
                    <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                  ))}
                </Pie>
                <Tooltip formatter={(value) => [`${value}`, 'Quantité']} />
                <Legend />
              </PieChart>
            </ResponsiveContainer>
          </div>
        </div>
      </div>

      {/* Tables and Details */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <DataTable 
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

        <DataTable 
          title="Mouvements Récents"
          columns={[
            { key: 'DOC_DATE', header: 'Date', format: 'date' },
            { key: 'type', header: 'Type' },
            { key: 'ART_CODE', header: 'Article' },
            { key: 'INV_QTE', header: 'Quantité', format: 'number' }
          ]}
          data={details.mouvements_recents || []}
        />
      </div>

      {/* Alerts */}
      <div className="bg-white p-6 rounded-lg shadow-md mb-8">
        <h3 className="text-lg font-semibold mb-4 flex items-center">
          <FiAlertTriangle className="text-red-500 mr-2" />
          Alertes Stocks
        </h3>
        
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          <AlertCard 
            title="Stock Bas"
            items={alertes.stock_bas || []}
            renderItem={(item) => (
              <div key={item.ART_CODE || 'na'}>
                <span className="font-medium">{item.ART_CODE || 'N/A'}</span>: 
                <span className="text-red-600 ml-1">
                  {item.STK_REEL || 0} / Seuil {item.STK_SEUIL || 0}
                </span>
              </div>
            )}
          />

          <AlertCard 
            title="Péremption proche"
            items={alertes.peremption || []}
            renderItem={(item) => (
              <div key={item.LLI_NUMLOT || 'na'}>
                <span className="font-medium">Lot {item.LLI_NUMLOT || 'N/A'}</span>: 
                <span className="text-orange-600 ml-1">
                  {new Date(item.LLI_DT_PER).toLocaleDateString()} ({item.jours_restants || 0} jours)
                </span>
              </div>
            )}
          />

          <AlertCard 
            title="Mouvements anormaux"
            items={alertes.mouvements_anormaux || []}
            renderItem={(item) => (
              <div key={`${item.DOC_DATE}-${item.ART_CODE}` || 'na'}>
                <span className="font-medium">{item.ART_CODE || 'N/A'}</span>: 
                <span className="text-blue-600 ml-1">
                  {item.type} de {item.INV_QTE || 0} unités
                </span>
              </div>
            )}
          />
        </div>
      </div>
    </div>
  );
}