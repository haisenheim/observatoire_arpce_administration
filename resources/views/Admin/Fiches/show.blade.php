
@extends('Layouts.admin')
@section('content')
    <input type="hidden" id="id" value="{{ $fiche->id }}">
    <div id="main" class="scrolled-offset">
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
                                <div class="alert alert-danger">
                                    <p>
                                        <span class="bold">EMISSION </span> <span class="badge bg-success">{{ $fiche->emission }} tCO2</span>
                                    </p>
                                </div>
                            </div>


                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th colspan="2">
                                            EAU ET ENERGIE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quantité d’eau consommée en litre / an ?</td>
                                        <td><span class="td-edit" data-name="qt_eau">{{ $fiche->qt_eau }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Énergie électrique consommée en kWh / an *</td>
                                        <td><span class="td-edit" data-name="energie_elec">{{ $fiche->energie_elec }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Pourcentage d’énergie renouvelable utilisé</td>
                                        <td><span class="td-edit" data-name="per_renew">{{ $fiche->per_renew }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Consommation d’énergie des infrastructures réseau</td>
                                        <td><span class="td-edit" data-name="conso_elec_infra">{{ $fiche->conso_elec_infra }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Quantité totale de carburant consommée par an en litre ? </td>
                                        <td><span class="td-edit" data-name="qt_carburant">{{ $fiche->qt_carburant }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Quel est le Carburant utilisé par les groupes électrogènes ?</td>
                                        <td><span class="td-edit" data-name="carburant_ge">{{ $fiche->carburant_ge }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th colspan="2">
                                            DECHETS
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quantité moyenne de papier consommée en tonne / an </td>
                                        <td><span class="td-edit" data-name="qt_moy_papier">{{ $fiche->qt_moy_papier }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Comment sont gérés les équipements obsolètes ?</td>
                                        <td><span class="td-edit" data-name="how_about_old_equip">{{ $fiche->how_about_old_equip }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>

                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th colspan="4">
                                           Équipement Informatique
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="4">Centre de données</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de data center ou salle serveur</td>
                                        <td><span class="td-edit" data-name="nb_datacenter">{{ $fiche->nb_datacenter }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh/salle </td>
                                        <td><span class="td-edit" data-name="conso_elec_datacenter">{{ $fiche->conso_elec_datacenter }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La puissance installée du Data center/salle</td>
                                        <td><span class="td-edit" data-name="puissance_datacenter">{{ $fiche->puissance_datacenter }}</span></td>
                                    </tr>
                                    <tr>
                                        <th rowspan="3">ROUTEUR</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de routeurs</td>
                                        <td><span class="td-edit" data-name="nb_router">{{ $fiche->nb_router }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh par routeur  </td>
                                        <td><span class="td-edit" data-name="conso_elec_routeur">{{ $fiche->conso_elec_router }}</span></td>
                                    </tr>
                                    <tr>
                                        <th rowspan="3">SERVEUR</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de serveurs</td>
                                        <td><span class="td-edit" data-name="nb_server">{{ $fiche->nb_server }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh par server  </td>
                                        <td><span class="td-edit" data-name="conso_elec_server">{{ $fiche->conso_elec_server }}</span></td>
                                    </tr>

                                    <tr>
                                        <th rowspan="3">SWITCH</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de switchs</td>
                                        <td><span class="td-edit" data-name="nb_switch">{{ $fiche->nb_switch }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh par switch  </td>
                                        <td><span class="td-edit" data-name="conso_elec_switch">{{ $fiche->conso_elec_switch }}</span></td>
                                    </tr>

                                    <tr>
                                        <th rowspan="3">CLIMATISATION</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de module de climatisation</td>
                                        <td><span class="td-edit" data-name="nb_clim">{{ $fiche->nb_clim }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh par module  </td>
                                        <td><span class="td-edit" data-name="conso_elec_clim">{{ $fiche->conso_elec_clim }}</span></td>
                                    </tr>

                                    <tr>
                                        <th rowspan="3">ONDULEUR</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre d'onduleur</td>
                                        <td><span class="td-edit" data-name="nb_onduleur">{{ $fiche->nb_onduleur }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La consommation moyenne d’énergie en kWh par onduleur  </td>
                                        <td><span class="td-edit" data-name="conso_elec_onduleur">{{ $fiche->conso_elec_onduleur }}</span></td>
                                    </tr>

                                    <tr>
                                        <th rowspan="3">Groupe électrogène</th>
                                    </tr>
                                    <tr>
                                        <td>Le nombre de groupe</td>
                                        <td><span class="td-edit" data-name="nb_ge">{{ $fiche->nb_ge }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>La puissance énergétique en KVA par groupe </td>
                                        <td><span class="td-edit" data-name="puissance_ge">{{ $fiche->puissance_ge }}</span></td>
                                    </tr>

                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="">
                                    <tr class="table-success">
                                        <th style="text-align: center" colspan="3">
                                            Terminaux
                                        </th>
                                    </tr>
                                    <tr style="font-size: smaller" class="table-danger">
                                        <th>Appareils</th>
                                        <th>Nombre d’équipement</th>
                                        <th>La consommation moyenne d’énergie Par appareil en kWh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Téléviseurs</th>
                                        <td><span class="td-edit" data-name="nb_tv">{{ $fiche->nb_tv }}</span></td>
                                        <td><span class="td-edit" data-name="conso_tv">{{ $fiche->conso_tv }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Ordinateurs portables</th>
                                        <td><span class="td-edit" data-name="nb_laptop">{{ $fiche->nb_laptop }}</span></td>
                                        <td><span class="td-edit" data-name="conso_laptop">{{ $fiche->conso_laptop }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Ordinateurs fixes</th>
                                        <td><span class="td-edit" data-name="nb_ordi">{{ $fiche->nb_ordi }}</span></td>
                                        <td><span class="td-edit" data-name="conso_ordi">{{ $fiche->conso_ordi }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Box internet</th>
                                        <td><span class="td-edit" data-name="nb_box">{{ $fiche->nb_box }}</span></td>
                                        <td><span class="td-edit" data-name="conso_box">{{ $fiche->conso_box }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Tablettes</th>
                                        <td><span class="td-edit" data-name="nb_tablet">{{ $fiche->nb_tablet }}</span></td>
                                        <td><span class="td-edit" data-name="conso_tablet">{{ $fiche->conso_tablet }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Téléphones fixes</th>
                                        <td><span class="td-edit" data-name="nb_phone">{{ $fiche->nb_phone }}</span></td>
                                        <td><span class="td-edit" data-name="conso_phone">{{ $fiche->conso_phone }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Vidéo projecteurs</th>
                                        <td class="td-edit" data-name="nb_projector">{{ $fiche->nb_projector }}</td>
                                        <td class="td-edit" data-name="conso_projector">{{ $fiche->conso_projector }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr style="text-align: center">
                                        <th colspan="2">
                                            INFORMATIONS GÉNÉRALES
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Avez-vous une politique environnementale ? </td>
                                        <td><span class="td-edit" data-name="has_policy">{{ $fiche->has_policy?'OUI':'NON' }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Quel est le nombre de collaborateurs ? </td>
                                        <td><span class="td-edit" data-name="nb_staff">{{ $fiche->nb_staff }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-hover table-sm table-bordered">
                                <thead class="table-success">
                                    <tr style="text-align: center">
                                        <th>
                                            SECTION DES COMMENTAIRES
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-secondary">
                                        <th>Indiquez la méthodologie utilisée pour obtenir les données présentées. Toute suggestion constructive pour faire évoluer et améliorer la fiche est encouragée.</th>
                                    </tr>
                                    <tr>
                                        <td class="td-edit" data-name="comment">{{ $fiche->comment }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $('.td-edit').dblclick(function(){
        var field = $(this).data('name');
        var id = $('#id').val();
        $(this).prop('contenteditable',true);

        $('.td-edit').keydown(function (e) {
            var key = e.which;
            if(key == 13)  // the enter key code
            {
                var value = e.target.textContent;
                $.ajax({
                    url:"{{ route('admin.fiche.save') }}",
                    type:'get',
                    dataType:'json',
                    data:{id:id,value:value,field:field},
                    success:function(){
                        window.location.reload();
                    }
                });
            }
        });
    });

</script>

<style>
    .td-edit{
        font-weight: 600;
    }
</style>
@endsection


