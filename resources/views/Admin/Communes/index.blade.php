
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">COMMUNES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">COMMUNES</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">
                <div class="card-header">
                    <div class="pull-right"><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une commune"></i></button></div>
                </div>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>COMMUNE</th>
                                <th>DEPARTEMENT</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($communes as $p)
                            <tr>
                                <td><a href="#"></a> {{ $p->name }}</td>

                                <td><a></a> {{ $p->departement?$p->departement->name:'-' }}</td>
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
          <h4 class="modal-title">NOUVELLE COMMUNE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/communes">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" required placeholder="Nom" class="form-control">
                  </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <select name="departement_id" id="" required class="form-control">
                        <option value="">Departement ...</option>
                        @foreach ($departements as $opt)
                            <option value="{{ $opt->id }}">{{ $opt->name }}</option>
                        @endforeach
                    </select>
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
