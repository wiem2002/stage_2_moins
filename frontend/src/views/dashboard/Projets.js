import React, { useEffect, useState } from "react";
import axios from "axios";

export default function Projets() {
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const [totalProjets, setTotalProjets] = useState(0);
  const [projetsParEtat, setProjetsParEtat] = useState([]);
  const [activitesParProjet, setActivitesParProjet] = useState([]);
  const [datesPlanning, setDatesPlanning] = useState({ date_min: null, date_max: null });

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/dashboard/projets")
      .then((res) => {
        const data = res.data;
        setTotalProjets(data.totalProjets || 0);
        setProjetsParEtat(Array.isArray(data.projetsParEtat) ? data.projetsParEtat : []);
        setActivitesParProjet(Array.isArray(data.activitesParProjet) ? data.activitesParProjet : []);
        setDatesPlanning(data.datesPlanning || { date_min: null, date_max: null });
        setLoading(false);
      })
      .catch(() => {
        setError("Erreur lors du chargement des données projets");
        setLoading(false);
      });
  }, []);

  if (loading) return <p style={styles.loading}>Chargement...</p>;
  if (error) return <p style={styles.error}>{error}</p>;

  return (
    <div style={styles.container}>
      <h1 style={styles.title}>Dashboard Projets</h1>

      {/* Carte total projets */}
      <div style={styles.cardContainer}>
        <div style={styles.card}>
          <h2 style={styles.cardNumber}>{totalProjets}</h2>
          <p style={styles.cardLabel}>Total Projets</p>
        </div>
      </div>

      {/* Projets par état */}
      <section style={styles.section}>
        <h2 style={styles.sectionTitle}>Projets par état</h2>
        <table style={styles.table}>
          <thead>
            <tr>
              <th style={styles.th}>État</th>
              <th style={styles.th}>Nombre</th>
            </tr>
          </thead>
          <tbody>
            {projetsParEtat.length ? projetsParEtat.map((item, i) => (
              <tr key={i} style={i % 2 === 0 ? styles.trEven : styles.trOdd}>
                <td style={styles.td}>{item.PRJ_ETAT || "N/A"}</td>
                <td style={styles.td}>{item.total}</td>
              </tr>
            )) : (
              <tr><td colSpan={2} style={styles.noData}>Aucune donnée</td></tr>
            )}
          </tbody>
        </table>
      </section>

      {/* Top projets par activités */}
      <section style={styles.section}>
        <h2 style={styles.sectionTitle}>Top 5 projets par nombre d'activités planning</h2>
        <table style={styles.table}>
          <thead>
            <tr>
              <th style={styles.th}>Code Projet</th>
              <th style={styles.th}>Libellé</th>
              <th style={styles.th}>Nb Activités</th>
            </tr>
          </thead>
          <tbody>
            {activitesParProjet.length ? activitesParProjet.map((item, i) => (
              <tr key={i} style={i % 2 === 0 ? styles.trEven : styles.trOdd}>
                <td style={styles.td}>{item.PRJ_CODE}</td>
                <td style={styles.td}>{item.PRJ_LIB}</td>
                <td style={styles.td}>{item.nb_activites}</td>
              </tr>
            )) : (
              <tr><td colSpan={3} style={styles.noData}>Aucune donnée</td></tr>
            )}
          </tbody>
        </table>
      </section>

      {/* Dates planning */}
      <section style={styles.section}>
        <h2 style={styles.sectionTitle}>Dates planning</h2>
        <p><strong>Début : </strong>{datesPlanning.date_min ? new Date(datesPlanning.date_min).toLocaleDateString() : "-"}</p>
        <p><strong>Fin : </strong>{datesPlanning.date_max ? new Date(datesPlanning.date_max).toLocaleDateString() : "-"}</p>
      </section>
    </div>
  );
}

const styles = {
  container: {
    maxWidth: 960,
    margin: "30px auto",
    fontFamily: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
    color: "#333",
    padding: "0 20px",
  },
  title: {
    textAlign: "center",
    marginBottom: 30,
    color: "#004d99",
  },
  cardContainer: {
    display: "flex",
    justifyContent: "center",
    marginBottom: 40,
  },
  card: {
    backgroundColor: "#007acc",
    color: "white",
    padding: "30px 50px",
    borderRadius: 12,
    boxShadow: "0 4px 10px rgba(0, 0, 0, 0.15)",
    textAlign: "center",
    minWidth: 180,
  },
  cardNumber: {
    fontSize: 48,
    fontWeight: "700",
    margin: 0,
  },
  cardLabel: {
    fontSize: 18,
    marginTop: 6,
    opacity: 0.85,
  },
  section: {
    marginBottom: 40,
  },
  sectionTitle: {
    fontSize: 24,
    borderBottom: "2px solid #007acc",
    paddingBottom: 8,
    marginBottom: 20,
    color: "#004d99",
  },
  table: {
    width: "100%",
    borderCollapse: "collapse",
    boxShadow: "0 2px 8px rgba(0,0,0,0.1)",
  },
  th: {
    textAlign: "left",
    padding: "12px 15px",
    backgroundColor: "#007acc",
    color: "white",
    fontWeight: "600",
  },
  td: {
    padding: "12px 15px",
  },
  trEven: {
    backgroundColor: "#f5faff",
  },
  trOdd: {
    backgroundColor: "white",
  },
  noData: {
    textAlign: "center",
    padding: 20,
    color: "#777",
    fontStyle: "italic",
  },
  loading: {
    textAlign: "center",
    marginTop: 60,
    fontSize: 18,
    color: "#007acc",
  },
  error: {
    textAlign: "center",
    marginTop: 60,
    fontSize: 18,
    color: "red",
  },
};
