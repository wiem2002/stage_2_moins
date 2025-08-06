import { useEffect, useState } from "react";
import axios from "axios";
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from "../../components/ui/card";
import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  ResponsiveContainer,
  PieChart,
  Pie,
  Cell,
  Legend,
} from "recharts";

const COLORS = ["#4f46e5", "#16a34a", "#eab308", "#ef4444", "#06b6d4"];

function Ventes() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/dashboard/ventes")
      .then((res) => {
        console.log("✅ Données reçues :", res.data);
        setData(res.data);
        setLoading(false);
      })
      .catch((err) => {
        console.error("❌ Erreur API :", err);
        setLoading(false);
      });
  }, []);

  const dataAvecLabels = data?.ventesParMois?.map((item) => ({
    ...item,
    moisLabel: `${item.annee}-${item.mois.toString().padStart(2, "0")}`,
  }));

  if (loading) {
    return <p className="p-6 text-center">Chargement des données...</p>;
  }

  if (!data) {
    return (
      <p className="p-6 text-center text-red-600">
        Erreur lors du chargement des données.
      </p>
    );
  }

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
      <h2 className="text-2xl font-bold col-span-full">📊 Dashboard Ventes</h2>

      {/* Total ventes */}
      <Card>
        <CardHeader>
          <CardTitle>Total des ventes</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl font-semibold text-green-700">
            {Number(data.totalVentes).toLocaleString()} DT
          </p>
        </CardContent>
      </Card>

      {/* Montant total règlements reçus */}
      <Card>
        <CardHeader>
          <CardTitle>Règlements reçus</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl text-blue-700">
            {Number(data.reglementsRecus?.total_recu).toLocaleString()} DT
          </p>
        </CardContent>
      </Card>

      {/* Factures acceptées */}
      <Card>
        <CardHeader>
          <CardTitle>Factures acceptées</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl">
            {data.facturesAcceptees?.total} factures –{" "}
            {Number(data.facturesAcceptees?.montant_total).toLocaleString()} DT
          </p>
        </CardContent>
      </Card>

      {/* Échéances à venir */}
      <Card>
        <CardHeader>
          <CardTitle>Échéances à venir</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl">
            {data.echeancesAvenir?.total} échéances –{" "}
            {Number(data.echeancesAvenir?.montant_total).toLocaleString()} DT
          </p>
        </CardContent>
      </Card>

      {/* Ventes par mois */}
      <Card className="col-span-full">
        <CardHeader>
          <CardTitle>Ventes réelles par mois</CardTitle>
        </CardHeader>
        <CardContent style={{ height: 300 }}>
          <ResponsiveContainer width="100%" height="100%">
            <BarChart data={dataAvecLabels}>
              <CartesianGrid strokeDasharray="3 3" />
              <XAxis dataKey="moisLabel" />
              <YAxis />
              <Tooltip />
              <Bar dataKey="total" fill="#4f46e5" />
            </BarChart>
          </ResponsiveContainer>
        </CardContent>
      </Card>

      {/* Top 5 produits */}
      <Card>
        <CardHeader>
          <CardTitle>Top 5 Produits</CardTitle>
        </CardHeader>
        <CardContent>
          <ul className="text-sm space-y-1">
            {data.topProduits.map((prod, idx) => (
              <li key={idx}>
                <span className="font-semibold">{prod.ART_CODE}</span> –{" "}
                {prod.quantite} unités – {Number(prod.total_vente).toLocaleString()} DT
              </li>
            ))}
          </ul>
        </CardContent>
      </Card>

      {/* Top 5 clients */}
      <Card>
        <CardHeader>
          <CardTitle>Top 5 Clients</CardTitle>
        </CardHeader>
        <CardContent>
          <ul className="text-sm space-y-1">
            {data.topClients.map((cli, idx) => (
              <li key={idx}>
                <span className="font-semibold">{cli.PCF_CODE}</span> –{" "}
                {Number(cli.total).toLocaleString()} DT
              </li>
            ))}
          </ul>
        </CardContent>
      </Card>

      {/* Budgets par projet */}
      <Card className="col-span-full">
        <CardHeader>
          <CardTitle>Budgets par projet</CardTitle>
        </CardHeader>
        <CardContent>
          <ul className="text-sm space-y-1">
            {data.budgetsParProjet.map((prj, idx) => (
              <li key={idx}>
                <span className="font-semibold">{prj.PRJ_CODE}</span> –{" "}
                {Number(prj.montant_total).toLocaleString()} DT
              </li>
            ))}
          </ul>
        </CardContent>
      </Card>

      {/* Répartition des règlements par type */}
      <Card className="col-span-full">
        <CardHeader>
          <CardTitle>Règlements par type</CardTitle>
        </CardHeader>
        <CardContent style={{ height: 300 }}>
          <ResponsiveContainer width="100%" height="100%">
            <PieChart>
              <Pie
                data={data.reglementsParType}
                dataKey="total"
                nameKey="REG_TYPE"
                cx="50%"
                cy="50%"
                outerRadius={80}
                fill="#8884d8"
                label={({ name }) => name}
              >
                {data.reglementsParType.map((_, idx) => (
                  <Cell key={idx} fill={COLORS[idx % COLORS.length]} />
                ))}
              </Pie>
              <Tooltip />
              <Legend />
            </PieChart>
          </ResponsiveContainer>
        </CardContent>
      </Card>
    </div>
  );
}

export default Ventes;
