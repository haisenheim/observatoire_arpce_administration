
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">ENTREPRISES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Entreprises</li>
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
                                <th>NOM</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                                <th>SECTEUR</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($entreprises as $p)
                            <tr>
                                <td><a href="{{ route('admin.entreprises.show',$p->id) }}"></a> {{ $p->name }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->secteur?$p->secteur->name:'-' }}</td>
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
          <h4 class="modal-title">NOUVELLE ENTREPRISE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.entreprises.store') }}">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Nom" class="form-control">
                  </div>
              </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="phone" required placeholder="Telephone" class="form-control">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="email" required placeholder="email" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <select name="secteur_id" id="" required class="form-control">
                        <option value="">Secteur ...</option>
                        @foreach ($secteurs as $op)
                            <option value="{{ $op->id }}">{{ $op->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">LOGO </label>
                    <input type="file" name="image_uri" required placeholder="image" class="form-control">
                </div>
            </div>
          </div>
          <fieldset>
              <legend>Infos Admin</legend>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="user_name" required=true placeholder="Nom de l'administrateur" class="form-control">
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
