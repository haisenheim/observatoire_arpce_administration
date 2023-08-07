
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
    <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
            <img src="{{ $article->photo }}"  alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
            <a href="#">{{ $article->name }}</a>
          </h2>

          <div class="entry-content">
            <p>{{ $article->body }}</p>

          </div>

          <div class="entry-footer">
            <i class="bi bi-folder"></i>
            <ul class="cats list-unstyled">
              <li>CATEGORIE : <a href="#">{{ $article->category?$article->category->name:'-' }}</a></li>
            </ul>

            <h6>Mots clefs</h6>
            <ul class="tags list-inline">
                @foreach ($article->tags as $tag )
                <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li>
                @endforeach
            </ul>
            @if ($article->fichier_uri)
                <a href="{{ $article->fichier }}">Telechargement</a>
            @endif
            <h6>Actions</h6>
            <ul class="list-inline">
              <li class="list-inline-item"><a data-toggle="modal" data-target="#edit" class="btn btn-xs btn-success" href="#"><i class="fa fa-pen"></i> Modifier</a></li>
              @if ($article->active)
              <li class="list-inline-item"><a class="btn btn-xs btn-danger" href="/admin/article/disable/{{ $article->id }}"><i class="fa fa-lock"></i> Suspendre</a></li>
              @else
              <li class="list-inline-item"><a class="btn btn-xs btn-warning" href="/admin/article/enable/{{ $article->id }}"><i class="fa fa-unlock"></i> Publier</a></li>
              @endif
              <li class="list-inline-item"><a data-toggle="modal" data-target="#add" class="btn btn-xs btn-info" href="#"><i class="fa fa-tags"></i> Ajouter un mot clef</a></li>
            </ul>

          </div>

        </article><!-- End blog entry -->




      </div>
  </div>

  <div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">MODIFICATION</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" enctype="multipart/form-data" action="/admin/article/update">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="id" value="{{ $article->id }}">
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <input type="text" name="name" required value="{{ $article->name }}" placeholder="Intitule ..." class="form-control">
                  </div>
              </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <textarea name="body" id="" cols="30" rows="3" required placeholder="Corps de la publication" class="form-control">{{ $article->body }}</textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <select name="category_id" id="" class="form-control">
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
                    <input type="file" name="image_uri" placeholder="image" class="form-control">
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="">FICHIER EN TELECHARGEMENT</label>
                    <input type="file" name="fichier_uri" class="form-control">
                </div>
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

  <div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">AJOUTER UN MOT CLEF</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST"  action="/admin/article/tag">
        <div class="modal-body">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
          <div class="row">
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                     <select name="tag_id" required id="" class="form-control">
                        <option value="">Choisir ...</option>
                        @foreach($tags as $opt)
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
