import { useEffect, useState } from "react";
import axios from "axios";
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, ResponsiveContainer } from "recharts";

function Ventes() {
  const [data, setData] = useState(null);

  useEffect(() => {
    axios.get("http://localhost:8000/api/dashboard/ventes")
      .then(res => setData(res.data))
      .catch(err => console.error(err));
  }, []);

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
      <h2 className="text-2xl font-bold col-span-full">📊 Dashboard Ventes</h2>

      <Card>
        <CardHeader>
          <CardTitle>Total des ventes</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl font-semibold text-green-700">
            {data?.totalVentes.toLocaleString()} DT
          </p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Factures acceptées</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl">{data?.facturesAcceptees}</p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Échéances à venir</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl">{data?.echeancesAvenir}</p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Règlements reçus</CardTitle>
        </CardHeader>
        <CardContent>
          <p className="text-xl text-blue-700">{data?.reglementsRecus} DT</p>
        </CardContent>
      </Card>

      <Card className="col-span-full">
        <CardHeader>
          <CardTitle>Ventes par mois</CardTitle>
        </CardHeader>
        <CardContent style={{ height: 300 }}>
          {data?.ventesParMois && (
            <ResponsiveContainer width="100%" height="100%">
              <BarChart data={data.ventesParMois}>
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="mois" />
                <YAxis />
                <Tooltip />
                <Bar dataKey="total" fill="#4f46e5" />
              </BarChart>
            </ResponsiveContainer>
          )}
        </CardContent>
      </Card>
    </div>
  );
}

export default Ventes;
