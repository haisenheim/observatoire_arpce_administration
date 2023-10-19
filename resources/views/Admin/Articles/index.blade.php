
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">ARTICLES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Articles</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">
                <div class="card-header">
                    <div class="pull-right"><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une publication"></i> Ajouter</button></div>
                </div>
                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>Date</th>
                                <th>Titre</th>
                                <th>Categorie</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $p)
                            <tr>
                                <td>{{ date_format($p->created_at,'d/m/Y H:i') }}</td>
                                <td><a href="{{ route('admin.articles.show',$p->id) }}"> {{ $p->name }}</a></td>
                                <td>{{ $p->category?$p->category->name:'-' }}</td>
                                <td><span class="badge badge-{{ $p->status['color'] }}">{{ $p->status['name'] }}</span></td>
                                <td>
                                    @if ($p->active)
                                        <span><a class="btn btn-xs btn-danger" href="{{ route('admin.article.disable',$p->id) }}">suspendre</a></span>
                                    @else
                                        <span><a class="btn btn-xs btn-warning" href="{{ route('admin.article.enable',$p->id) }}">publier</a></span>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE PUBLICATION</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.articles.store') }}">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" placeholder="Intitule ..." class="form-control">
                  </div>
              </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <textarea name="body" id="" cols="30" rows="3" placeholder="Corps de la publication" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <select name="category_id" id="" required class="form-control">
                        <option value="">Categorie ...</option>
                        @foreach ($categories as $op)
                            <option value="{{ $op->id }}">{{ $op->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">Image </label>
                    <input type="file" name="image_uri" required placeholder="image" class="form-control">
                </div>
            </div>
            {{-- <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">FICHIER EN TELECHARGEMENT</label>
                    <input type="file" name="fichier_uri" placeholder="Fichier" class="form-control">
                </div>
            </div> --}}
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
