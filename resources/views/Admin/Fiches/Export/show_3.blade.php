<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <h2 style="font-weight: 900; font-size:32px" class="text-bold">I  - Emissions de GES et consommations énergétiques des opérateurs de communications électroniques</h2>
    <h3 style="font-weight: 800; font-size:28px" class="text-bold mt-4 mb-4">I.1 Emissions de GES</h3>
    <table class="table table-hover table-sm table-bordered">
        <thead class="table-success">
            <tr>
                <th>Ensemble des émissions  de gaz à effet de serre au Congo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Groupe electrogène (temps de fonctionnement et Puissance)</td>
                <td>{{ $fiche->ges_ge }}</td>
            </tr>
            <tr>
                <td>Equipement des datacenters (données supplémentaires en annexe)</td>
                <td>{{ $fiche->ges_equip_dc }}</td>
            </tr>
            <tr>
                <td>Construction de l'infrastructure des réseaux (données supplémentaires en annexe) </td>
                <td>{{ $fiche->ges_infra }}</td>
            </tr>
        </tbody>
    </table>
    <h4 style="font-weight: 900; font-size:28px" class="bg-light text-dark">Données caractéristiques des centres de données</h4>
    <div>
        <table class="table table-sm table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <td>DATACENTER</td>
                    <td>COMMUNE</td>
                    <td>Conso. élec. annuelle</td>
                    <td>Conso. élec. annuelle des équip. info.</td>
                    <td>Vol. d'eau annuel entrant</td>
                    <td>Vol. d'eau annuel sortant</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($fiche->datafiches as $d)
                    <tr>
                        <td>{{ $d->datacenter->name }}</td>
                        <td>{{ $d->datacenter->commune?$d->datacenter->commune->name:'-' }}</td>
                        <td>{{ $d->conso_elec_dc }} GWh</td>
                        <td>{{ $d->conso_elec_equip }} GWh</td>
                        <td>{{ $d->vol_eau_entrant }} m3</td>
                        <td>{{ $d->vol_eau_sortant }} m3</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
