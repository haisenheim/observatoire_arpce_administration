
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">COMPTES UTILISATEURS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">users</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-header">
                <div class="pull-right"><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une region"></i></button></div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>NOM</th>
                                <th>TEL</th>
                                <th>EMAIL</th>
                                <th>ROLE</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->phone }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->role?$p->role->name:'-' }}</td>

                                <td>
                                    <ul class="list-inline">
                                        @if($p->active)
                                            <li class="list-inline-item">
                                                <a href="/admin/user/disable/{{ $p->token}}" class="btn btn-xs btn-danger" title="bloquer ce compte"><i class="fa fa-lock"></i></a>
                                            </li>
                                        @else
                                            <li class="list-inline-item">
                                                <a href="/admin/user/enable/{{ $p->token}}" class="btn btn-xs btn-success" title="debloquer ce compte"><i class="fa fa-unlock"></i></a>
                                            </li>
                                        @endif
                                    </ul>



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
          <h4 class="modal-title">AJOUT D'UN COMPTE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/admin/users">
        <div class="modal-body">
            @csrf

          <fieldset>
              <legend>Infos generales</legend>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="name" required=true placeholder="Nom d'utilisation" class="form-control">
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input required type="text" name="phone" placeholder="Telephone" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input required type="text" name="email" placeholder="Email" required=true class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <input type="text" name="password" required placeholder="Mot de passe" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <select name="role_id" required id="" class="form-control">
                            <option value="">Role ..</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
          </fieldset>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

@endsection
