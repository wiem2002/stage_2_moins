import React, { useEffect, useState } from "react";
import axios from "axios";
import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  Tooltip,
  Legend,
  ResponsiveContainer,
  CartesianGrid,
} from "recharts";

export default function Ventes() {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  // Les états pour toutes tes données
  const [totalVentes, setTotalVentes] = useState(0);
  const [facturesAcceptees, setFacturesAcceptees] = useState({ total: 0, montant_total: 0 });
  const [echeancesAvenir, setEcheancesAvenir] = useState({ total: 0, montant_total: 0 });
  const [reglementsRecus, setReglementsRecus] = useState({ total_recu: 0 });
  const [ventesParMois, setVentesParMois] = useState([]);
  const [topProduits, setTopProduits] = useState([]);
  const [topClients, setTopClients] = useState([]);
  const [budgetsParProjet, setBudgetsParProjet] = useState([]);
  const [reglementsParType, setReglementsParType] = useState([]);

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/dashboard/ventes")
      .then((res) => {
        const data = res.data;
        setTotalVentes(data.totalVentes || 0);
        setFacturesAcceptees(data.facturesAcceptees || { total: 0, montant_total: 0 });
        setEcheancesAvenir(data.echeancesAvenir || { total: 0, montant_total: 0 });
        setReglementsRecus(data.reglementsRecus || { total_recu: 0 });
        setVentesParMois(Array.isArray(data.ventesParMois) ? data.ventesParMois : []);
        setTopProduits(Array.isArray(data.topProduits) ? data.topProduits : []);
        setTopClients(Array.isArray(data.topClients) ? data.topClients : []);
        setBudgetsParProjet(Array.isArray(data.budgetsParProjet) ? data.budgetsParProjet : []);
        setReglementsParType(Array.isArray(data.reglementsParType) ? data.reglementsParType : []);
        setLoading(false);
      })
      .catch((err) => {
        setError("Erreur lors du chargement des données");
        setLoading(false);
      });
  }, []);

  if (loading) return <p style={{textAlign: "center"}}>Chargement...</p>;
  if (error) return <p style={{textAlign: "center", color:"red"}}>{error}</p>;

  // Préparation du data pour le graphique (ex: concat année-mois)
  const ventesGraphData = ventesParMois.map(({ annee, mois, total }) => ({
    name: `${annee}-${mois.toString().padStart(2, "0")}`,
    total: total,
  }));

  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Dashboard des Ventes</h1>

      {/* Cartes résumé */}
      <div style={styles.cardsContainer}>
        <div style={styles.card}>
          <h3>Total Ventes</h3>
          <p style={styles.cardValue}>{totalVentes.toLocaleString()} DT</p>
        </div>
        <div style={styles.card}>
          <h3>Factures Acceptées</h3>
          <p style={styles.cardValue}>{facturesAcceptees.total}</p>
          <small>Montant: {facturesAcceptees.montant_total?.toLocaleString()} DT</small>
        </div>
        <div style={styles.card}>
          <h3>Échéances à venir</h3>
          <p style={styles.cardValue}>{echeancesAvenir.total}</p>
          <small>Montant: {echeancesAvenir.montant_total?.toLocaleString()} DT</small>
        </div>
        <div style={styles.card}>
          <h3>Règlements reçus</h3>
          <p style={styles.cardValue}>{reglementsRecus.total_recu?.toLocaleString()} DT</p>
        </div>
      </div>

      {/* Graphique ventes par mois */}
      <div style={styles.chartContainer}>
        <h3>Ventes par mois</h3>
        <ResponsiveContainer width="100%" height={300}>
          <BarChart data={ventesGraphData} margin={{ top: 20, right: 30, left: 20, bottom: 5 }}>
            <CartesianGrid strokeDasharray="3 3" />
            <XAxis dataKey="name" />
            <YAxis />
            <Tooltip formatter={(value) => value.toLocaleString() + " DT"} />
            <Legend />
            <Bar dataKey="total" fill="#0088FE" name="Ventes" />
          </BarChart>
        </ResponsiveContainer>
      </div>

      {/* Tables */}
      <div style={{marginTop: 40}}>
        <h3>Top 5 Produits les plus vendus</h3>
        <TableSimple
          columns={["Produit", "Quantité", "Montant"]}
          data={topProduits.map(p => [p.ART_CODE, p.quantite, p.total_vente.toLocaleString() + " DT"])}
        />
      </div>

      <div style={{marginTop: 40}}>
        <h3>Top 5 Clients</h3>
        <TableSimple
          columns={["Client", "Montant"]}
          data={topClients.map(c => [c.PCF_CODE, c.total.toLocaleString() + " DT"])}
        />
      </div>

      <div style={{marginTop: 40}}>
        <h3>Budgets par Projet</h3>
        <TableSimple
          columns={["Projet", "Montant"]}
          data={budgetsParProjet.map(b => [b.PRJ_CODE, b.montant_total.toLocaleString() + " DT"])}
        />
      </div>

      <div style={{marginTop: 40}}>
        <h3>Règlements par Type</h3>
        <TableSimple
          columns={["Type", "Nombre", "Montant"]}
          data={reglementsParType.map(r => [r.REG_TYPE, r.nb, r.total.toLocaleString() + " DT"])}
        />
      </div>
    </div>
  );
}

// Composant simple pour afficher tableau
function TableSimple({ columns, data }) {
  return (
    <table style={styles.table}>
      <thead>
        <tr>
          {columns.map((col, i) => <th key={i}>{col}</th>)}
        </tr>
      </thead>
      <tbody>
        {data.length > 0 ? data.map((row, i) => (
          <tr key={i}>
            {row.map((cell, j) => <td key={j}>{cell}</td>)}
          </tr>
        )) : (
          <tr>
            <td colSpan={columns.length} style={{textAlign: "center"}}>Aucune donnée disponible</td>
          </tr>
        )}
      </tbody>
    </table>
  );
}

const styles = {
  container: {
    padding: 20,
    fontFamily: "Arial, sans-serif",
    backgroundColor: "#f8f9fa",
    minHeight: "100vh",
  },
  title: {
    textAlign: "center",
    marginBottom: 30,
  },
  cardsContainer: {
    display: "flex",
    gap: 20,
    justifyContent: "center",
    flexWrap: "wrap",
    marginBottom: 30,
  },
  card: {
    flex: "1 1 200px",
    background: "#fff",
    padding: 20,
    borderRadius: 10,
    boxShadow: "0 2px 5px rgba(0,0,0,0.1)",
    textAlign: "center",
    minWidth: 180,
  },
  cardValue: {
    fontSize: 22,
    fontWeight: "bold",
    color: "#0088FE",
  },
  chartContainer: {
    background: "#fff",
    padding: 20,
    borderRadius: 10,
    boxShadow: "0 2px 5px rgba(0,0,0,0.1)",
  },
  table: {
    width: "100%",
    borderCollapse: "collapse",
    marginTop: 10,
  },
  "table th, table td": {
    border: "1px solid #ddd",
    padding: 8,
  },
};
