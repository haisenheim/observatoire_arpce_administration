
@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">FOURNISSEURS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Fournisseurs</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">

                <table class="table table-bordered table-sm table-hover">
                    <thead>
                          <tr>
                                <th>NOM</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                                <th>ADRESSE</th>
                                <th> <button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-plus-circle" title="Ajouter un fournisseur"></i></button> </th>
                            </tr>  
                    </thead>
                    <tbody>
                        @foreach ($fournisseurs as $fournisseur)
                            <tr>
                                <td>{{ $fournisseur->name }}</td>
                                <td>{{ $fournisseur->phone }}</td>
                                <td>{{ $fournisseur->email }}</td>
                                <td>{{ $fournisseur->address }}</td>
                                <td></td>
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
          <h4 class="modal-title">NOUVEAU FOURNISSEUR</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/fournisseurs">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-8 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Nom" class="form-control">
                  </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="text" name="percent" placeholder="Pourcentage" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" placeholder="Telephone" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="email" placeholder="email" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <input type="text" name="address" placeholder="Adresse" class="form-control">
                </div>
            </div>
          </div>
          <fieldset>
              <legend>Infos Admin</legend>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="fn" required=true placeholder="Prenom" class="form-control">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="ln" required=true placeholder="Nom" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="user_phone" placeholder="Telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="user_email" placeholder="Email" required=true class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="password" required placeholder="Mot de passe" class="form-control">
                    </div>
                </div>
              </div>
          </fieldset>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
