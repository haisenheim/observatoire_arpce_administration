
@extends('Layouts.admin')

@section('content')
    <div class="container">
        <div class="m-5">
            <div style="max-width: 700px; margin:10px auto;" class="">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title">
                            <h5>FICHE DE COLLECTE DE DONNEES {{ $fiche->annee }}</h5>
                            <div class="float-right">
                                <a class="btn btn-sm btn-success" href="{{ route('admin.fiche.export',$fiche->token) }}"><i class="fa fa-file-excel"></i> Exporter</a>
                            </div>
                        </div>

                        <h4 class="text-bold">I  - Emissions de GES et consommations énergétiques des opérateurs de communications électroniques</h4>
                        <h6 class="text-bold mt-4 mb-4">I.1 Emissions de GES</h6>
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
                        <hr>
                        <h4 class="bg-light text-dark">Données caractéristiques des centres de données</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


