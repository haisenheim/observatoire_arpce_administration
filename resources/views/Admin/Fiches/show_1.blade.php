
@extends('Layouts.admin')

@section('content')
    <div class="container">
        <div class="m-5">
            <div style="max-width: 700px; margin:10px auto;" class="">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title">
                            <div class="d-flex justify-content-xl-between">
                                <div>
                                    <h5>FICHE DE COLLECTE DE DONNEES {{ $fiche->annee }}</h5>
                                </div>
                                <div class="">
                                    <a class="btn btn-sm btn-success" href="{{ route('admin.fiche.export',$fiche->token) }}"><i class="fa fa-file-excel"></i> Exporter</a>
                                </div>
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
                                    <td>Fabrication des réseaux (données supplémentaires en annexe) </td>
                                    <td>{{ $fiche->ges_reseaux }}</td>
                                </tr>
                                <tr>
                                    <td>Construction de l'infrastructure des réseaux (données supplémentaires en annexe) </td>
                                    <td>{{ $fiche->ges_infra }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6 class="text-bold mt-4 mb-4">I.2 Consommation énergétique</h6>
                        <table class="table table-hover table-sm table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Consommation  énergétique totale en GWh</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Consommation énergétique des réseaux</td>
                                    <td><span class="text-bold text-success">{{ $fiche->conso_reseaux }}</span></td>
                                </tr>
                                <tr>
                                    <td>Consommation énergétique des data centers</td>
                                    <td><span class="text-bold">{{ $fiche->conso_dc }}</span></td>
                                </tr>
                                <tr>
                                    <td>Consommation énergétique des box internet et décodeurs</td>
                                    <td><span class="text-bold">{{ $fiche->conso_box }}</span></td>
                                </tr>
                                <tr>
                                    <td>Autres consommations énergétiques</td>
                                    <td><span class="text-bold">{{ $fiche->conso_autres }}</span></td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="bg-light mt-4 mb-4">II  - Equipement et ventes de téléphones mobiles</h4>
                        <h6 class="bg-light mb-4">II.1 Equipement et ventes de téléphones mobiles</h6>
                        <table class="table table-hover table-sm table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Téléphones mobiles  en service</th>
                                    <th>Parc grand public</th>
                                    <th>Parc entreprise</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>dont achetés neufs</td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_achat_new_public }}</span></td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_achat_new_private }}</span></td>
                                </tr>
                                <tr>
                                    <td>dont achetés reconditionnés</td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_achat_old_public }}</span></td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_achat_old_private }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-hover table-sm table-bordered">
                            <thead class="table-success">
                                <tr>
                                    <th>Ventes de téléphones mobiles</th>
                                    <th>Parc grand public</th>
                                    <th>Parc entreprise</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>dont vendus neufs</td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_vente_new_public }}</span></td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_vente_new_private }}</span></td>
                                </tr>
                                <tr>
                                    <td>dont vendus reconditionnés</td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_vente_old_public }}</span></td>
                                    <td><span class="text-bold">{{ $fiche->equip_phone_vente_old_private }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
          </div>
        </div>
    </div>
@endsection
