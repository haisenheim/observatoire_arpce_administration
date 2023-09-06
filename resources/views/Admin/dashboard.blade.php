
@extends('Layouts/admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">DONNEES COLLECTEES</h1>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="container">
       <div class="row">
        @foreach ($fiches as $p)
            <div class="col-md-3 col-sm-12">
                <a href="{{ route('admin.fiche.show',$p->token) }}">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div style="height:200px;">
                                <img src="{{ $p->entreprise->photo }}" style="max-height: 180px" class="img-fluid" alt="">
                            </div>

                        </div>
                        <div style="height: 200px; font-weight: 900" class="card-footer text-center">
                            <p>{{ $p->entreprise->name }}</p>
                            <p>{{ $p->annee }} - <span class="text-success">{{ $p->entreprise->secteur->name }}</span></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
       </div>
  </div>
@endsection
