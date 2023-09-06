
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">TEXTES REGLEMENTAIRES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Textes reglementaires</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">
                <div class="card-header">
                    <div class="pull-right"><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une entreprise"></i></button></div>
                </div>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>TITRE</th>
                                <th>STATUT</th>

                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($textes as $p)
                            <tr>
                                <td><a href="{{ $p->fichier }}"> {{ $p->name }} </a></td>
                                <td><span class="badge badge-{{ $p->active?'success':'danger' }}">{{ $p->active?'en ligne':'retirée' }}</span></td>

                                <td>
                                    @if($p->active)
                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.texte.disable',$p->id) }}">retirer</a>
                                    @else
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.texte.enable',$p->id) }}">publier</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVEAU TEXTE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.textes.store') }}">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Titre" class="form-control">
                  </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">Fichier PDF</label>
                    <input type="file" name="fichier_uri" placeholder="Nom" class="form-control">
                </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
