import React, { useEffect, useState } from "react";
import axios from "axios";
import {
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  ResponsiveContainer,
  PieChart,
  Pie,
  Cell,
  Legend,
  AreaChart,
  Area
} from "recharts";
import {
  FiShoppingCart,
  FiDollarSign,
  FiFileText,
  FiClock,
  FiTrendingUp,
  FiActivity,
  FiEye
} from "react-icons/fi";

const COLORS = ["#6366F1", "#10B981", "#F59E0B", "#EF4444", "#3B82F6", "#8B5CF6"];

function Dashboard() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios.get("http://localhost:8000/api/dashboard/ventes")
      .then((res) => {
        setData(res.data);
        setLoading(false);
      })
      .catch(() => setLoading(false));
  }, []);

  if (loading) return (
    <div className="flex justify-center items-center h-screen">
      <div className="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-purple-500"></div>
    </div>
  );

  if (!data) return (
    <div className="flex justify-center items-center h-screen">
      <div className="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        Erreur lors du chargement des données
      </div>
    </div>
  );

  // Formatage des données pour les graphiques
  const salesData = data.ventesParMois.map((item) => ({
    ...item,
    moisLabel: `${item.annee}-${item.mois.toString().padStart(2, "0")}`,
  }));

  // Fonction pour calculer le pourcentage de part
  const calculatePercentage = (value, total) => {
    return Math.round((value / total) * 100);
  };

  return (
    <div className="min-h-screen bg-gray-50 p-6">
      {/* Header */}
      <div className="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
          <h1 className="text-2xl md:text-3xl font-bold text-gray-800">Tableau de bord des ventes</h1>
          <p className="text-gray-600 mt-1">Synthèse des performances commerciales</p>
        </div>
        <div className="mt-4 md:mt-0 bg-white p-3 rounded-lg shadow-xs border border-gray-200">
          <span className="text-sm text-gray-500">Dernière mise à jour: </span>
          <span className="text-sm font-medium">{new Date().toLocaleString()}</span>
        </div>
      </div>

      {/* Metrics Cards */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {/* Revenue Card */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
          <div className="p-5">
            <div className="flex justify-between items-start">
              <div>
                <p className="text-sm font-medium text-gray-500">Total des ventes</p>
                <p className="text-2xl font-bold mt-1 text-gray-800">
                  {Number(data.totalVentes).toLocaleString()} DT
                </p>
                <div className="flex items-center mt-2">
                  <FiTrendingUp className="text-green-500 mr-1" />
                  <span className="text-sm text-green-600">12% vs mois dernier</span>
                </div>
              </div>
              <div className="p-3 rounded-full bg-purple-50">
                <FiDollarSign className="text-purple-600 text-xl" />
              </div>
            </div>
          </div>
        </div>

        {/* Payments Card */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
          <div className="p-5">
            <div className="flex justify-between items-start">
              <div>
                <p className="text-sm font-medium text-gray-500">Règlements reçus</p>
                <p className="text-2xl font-bold mt-1 text-gray-800">
                  {Number(data.reglementsRecus?.total_recu).toLocaleString()} DT
                </p>
                <div className="flex items-center mt-2">
                  <FiActivity className="text-blue-500 mr-1" />
                  <span className="text-sm text-blue-600">8% vs mois dernier</span>
                </div>
              </div>
              <div className="p-3 rounded-full bg-blue-50">
                <FiTrendingUp className="text-blue-600 text-xl" />
              </div>
            </div>
          </div>
        </div>

        {/* Invoices Card */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
          <div className="p-5">
            <div className="flex justify-between items-start">
              <div>
                <p className="text-sm font-medium text-gray-500">Factures acceptées</p>
                <p className="text-2xl font-bold mt-1 text-gray-800">
                  {data.facturesAcceptees?.total}
                </p>
                <div className="flex items-center mt-2">
                  <FiEye className="text-green-500 mr-1" />
                  <span className="text-sm text-green-600">5 nouvelles</span>
                </div>
              </div>
              <div className="p-3 rounded-full bg-green-50">
                <FiFileText className="text-green-600 text-xl" />
              </div>
            </div>
          </div>
        </div>

        {/* Due Payments Card */}
        <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
          <div className="p-5">
            <div className="flex justify-between items-start">
              <div>
                <p className="text-sm font-medium text-gray-500">Échéances à venir</p>
                <p className="text-2xl font-bold mt-1 text-gray-800">
                  {data.echeancesAvenir?.total}
                </p>
                <div className="flex items-center mt-2">
                  <FiClock className="text-yellow-500 mr-1" />
                  <span className="text-sm text-yellow-600">
                    {Number(data.echeancesAvenir?.montant_total).toLocaleString()} DT
                  </span>
                </div>
              </div>
              <div className="p-3 rounded-full bg-yellow-50">
                <FiClock className="text-yellow-600 text-xl" />
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Charts Section */}
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        {/* Sales Trend */}
        <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100 lg:col-span-2">
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-lg font-semibold text-gray-800">Tendance des ventes</h3>
            <select className="text-sm border border-gray-200 rounded-md px-3 py-1 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500">
              <option>12 mois</option>
              <option>6 mois</option>
              <option>3 mois</option>
            </select>
          </div>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
              <AreaChart data={salesData}>
                <defs>
                  <linearGradient id="colorSales" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="5%" stopColor="#6366F1" stopOpacity={0.8}/>
                    <stop offset="95%" stopColor="#6366F1" stopOpacity={0}/>
                  </linearGradient>
                </defs>
                <CartesianGrid strokeDasharray="3 3" vertical={false} stroke="#f0f0f0" />
                <XAxis 
                  dataKey="moisLabel" 
                  axisLine={false} 
                  tickLine={false} 
                  tick={{ fill: '#6b7280' }}
                />
                <YAxis 
                  axisLine={false} 
                  tickLine={false} 
                  tick={{ fill: '#6b7280' }}
                />
                <Tooltip 
                  contentStyle={{
                    backgroundColor: '#fff',
                    border: '1px solid #e5e7eb',
                    borderRadius: '0.5rem',
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1)'
                  }}
                />
                <Area 
                  type="monotone" 
                  dataKey="total" 
                  stroke="#6366F1" 
                  fillOpacity={1} 
                  fill="url(#colorSales)" 
                />
              </AreaChart>
            </ResponsiveContainer>
          </div>
        </div>

        {/* Payment Methods */}
        <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-lg font-semibold text-gray-800">Méthodes de paiement</h3>
            <div className="text-sm text-gray-500">
              Total: {Number(data.reglementsRecus?.total_recu).toLocaleString()} DT
            </div>
          </div>
          <div className="h-80">
            <ResponsiveContainer width="100%" height="100%">
              <PieChart>
                <Pie
                  data={data.reglementsParType}
                  dataKey="total"
                  nameKey="REG_TYPE"
                  cx="50%"
                  cy="50%"
                  innerRadius={70}
                  outerRadius={100}
                  paddingAngle={2}
                  label={({ name, percent }) => `${name} ${(percent * 100).toFixed(0)}%`}
                  labelLine={false}
                >
                  {data.reglementsParType.map((entry, index) => (
                    <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                  ))}
                </Pie>
                <Tooltip 
                  formatter={(value) => [`${value} DT`, 'Montant']}
                  contentStyle={{
                    backgroundColor: '#fff',
                    border: '1px solid #e5e7eb',
                    borderRadius: '0.5rem',
                    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1)'
                  }}
                />
                <Legend 
                  layout="vertical" 
                  verticalAlign="middle" 
                  align="right"
                />
              </PieChart>
            </ResponsiveContainer>
          </div>
        </div>
      </div>

      {/* Top Products & Clients */}
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        {/* Top Products */}
        <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-lg font-semibold text-gray-800">Top 5 Produits</h3>
            <span className="text-sm text-gray-500">Par quantité vendue</span>
          </div>
          <div className="space-y-4">
            {data.topProduits.map((prod, idx) => {
              const totalQuantity = data.topProduits.reduce((sum, p) => sum + p.quantite, 0);
              const percentage = calculatePercentage(prod.quantite, totalQuantity);
              
              return (
                <div key={idx} className="flex items-center">
                  <div className={`w-10 h-10 rounded-full flex items-center justify-center text-white font-bold ${
                    idx === 0 ? 'bg-purple-600' : 
                    idx === 1 ? 'bg-blue-600' : 
                    idx === 2 ? 'bg-green-600' : 'bg-gray-400'
                  }`}>
                    {idx + 1}
                  </div>
                  <div className="ml-4 flex-1">
                    <div className="flex justify-between">
                      <span className="font-medium text-gray-800">{prod.ART_CODE}</span>
                      <span className="font-semibold">{Number(prod.total_vente).toLocaleString()} DT</span>
                    </div>
                    <div className="w-full bg-gray-100 rounded-full h-2 mt-2">
                      <div 
                        className="h-2 rounded-full" 
                        style={{ 
                          width: `${percentage}%`,
                          backgroundColor: COLORS[idx % COLORS.length]
                        }}
                      ></div>
                    </div>
                    <div className="flex justify-between text-xs text-gray-500 mt-1">
                      <span>{prod.quantite} unités vendues</span>
                      <span>{percentage}% du total</span>
                    </div>
                  </div>
                </div>
              );
            })}
          </div>
        </div>

        {/* Top Clients */}
        <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div className="flex justify-between items-center mb-6">
            <h3 className="text-lg font-semibold text-gray-800">Top 5 Clients</h3>
            <span className="text-sm text-gray-500">Par chiffre d'affaires</span>
          </div>
          <div className="space-y-4">
            {data.topClients.map((cli, idx) => {
              const totalCA = data.topClients.reduce((sum, c) => sum + c.total, 0);
              const percentage = calculatePercentage(cli.total, totalCA);
              
              return (
                <div key={idx} className="flex items-center">
                  <div className={`w-10 h-10 rounded-full flex items-center justify-center text-white font-bold ${
                    idx === 0 ? 'bg-purple-600' : 
                    idx === 1 ? 'bg-blue-600' : 
                    idx === 2 ? 'bg-green-600' : 'bg-gray-400'
                  }`}>
                    {idx + 1}
                  </div>
                  <div className="ml-4 flex-1">
                    <div className="flex justify-between">
                      <span className="font-medium text-gray-800">{cli.PCF_CODE}</span>
                      <span className="font-semibold">{Number(cli.total).toLocaleString()} DT</span>
                    </div>
                    <div className="w-full bg-gray-100 rounded-full h-2 mt-2">
                      <div 
                        className="h-2 rounded-full" 
                        style={{ 
                          width: `${percentage}%`,
                          backgroundColor: COLORS[idx % COLORS.length]
                        }}
                      ></div>
                    </div>
                    <div className="flex justify-between text-xs text-gray-500 mt-1">
                      <span>{percentage}% du CA</span>
                      <span>5 commandes</span>
                    </div>
                  </div>
                </div>
              );
            })}
          </div>
        </div>
      </div>

      {/* Recent Activity */}
      <div className="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h3 className="text-lg font-semibold text-gray-800 mb-6">Activité récente</h3>
        <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div className="p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
            <div className="flex items-center">
              <div className="p-2 bg-purple-100 rounded-full mr-3">
                <FiShoppingCart className="text-purple-600" />
              </div>
              <div>
                <p className="font-medium">Nouvelles ventes</p>
                <p className="text-sm text-gray-500">8 aujourd'hui</p>
              </div>
            </div>
          </div>
          <div className="p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
            <div className="flex items-center">
              <div className="p-2 bg-green-100 rounded-full mr-3">
                <FiFileText className="text-green-600" />
              </div>
              <div>
                <p className="font-medium">Factures créées</p>
                <p className="text-sm text-gray-500">5 ce mois-ci</p>
              </div>
            </div>
          </div>
          <div className="p-4 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
            <div className="flex items-center">
              <div className="p-2 bg-blue-100 rounded-full mr-3">
                <FiDollarSign className="text-blue-600" />
              </div>
              <div>
                <p className="font-medium">Paiements reçus</p>
                <p className="text-sm text-gray-500">12 ce mois-ci</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Dashboard;