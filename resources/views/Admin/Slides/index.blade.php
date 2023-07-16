
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Slides</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Slides</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="">
            <div class="">
                <div class="pull-right"><button data-target="#addFournisseur" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-plus-circle" title="Ajouter une slide"></i> Ajouter</button></div>
            </div>
            <div class="">
                <div class="row">
                    @foreach ($slides as $item)
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ $item->photo }}" style="width: 100%;" alt="" class="img" height="200">
                                    <h4>{{ $item->name }}</h4>
                                    <p>{{ $item->caption }}</p>
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
  </div>

  <div class="modal fade" id="addFournisseur">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">NOUVELLE SLIDE</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="/admin/slides">
        <div class="modal-body">
            @csrf
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input  required type="text" name="name" placeholder="Intitule" class="form-control" >
                  </div>
              </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <textarea name="caption" id="" cols="30" required class="form-control" placeholder="text" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="">IMAGE </label>
                        <input type="file" name="image_uri" required placeholder="image" class="form-control">
                    </div>
                </div>

          </div>
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
