
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Indicateurs</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Indicateurs</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row #3d9970 -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">
                <div class="">
                    <div class=""><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter un indicateur"></i> Ajouter un indicateur</button></div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-hover data-table">
                        <thead>
                              <tr>
                                    <th>Indicateur</th>
                                    <th>Annee</th>
                                    <th>Valeur</th>
                                    <th></th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($indicateurs as $p)
                                <tr>
                                    <td> {{ $p->type?$p->type->name:'-' }}</td>

                                    <td> {{ $p->annee }}</td>
                                    <td> {{ $p->valeur }} {{ $p->type?$p->type->unite:'-' }}</td>
                                    <th></th>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">SAISIE D'UN INDICATEUR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST"  action="/admin/indicateurs">
        <div class="modal-body">
            @csrf
          <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="form-group">
                    <select name="type_id" id="" required class="form-control">
                        <option value="">Indicateur ...</option>
                        @foreach ($types as $op)
                            <option value="{{ $op->id }}">{{ $op->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="number" required name="annee" placeholder="annee" class="form-control">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <input type="text" required name="valeur" placeholder="Valeur" class="form-control">
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
          </div>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
