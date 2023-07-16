
@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">ZONES D'EXPLOITATION</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Zones</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
  <div class="">
        <div class="card card-light">
            <div class="card-body">

                <table class="table table-bordered table-sm table-hover data-table">
                    <thead>
                          <tr>
                                <th>NOM</th>
                                <th>REGION</th>
                                <th>ARRONDISSEMENT</th>
                                <th>NOM DE VILLAGES</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($zones as $p)
                            <tr>
                                <td><a href="/admin/secteurs/{{$p->id}}"></a> {{ $p->name }}</td>

                                <td>{{ $p->region?$p->region->name:'-' }}</td>
                                <td>{{ $p->arrondissement?$p->arrondissement->name:'-' }}</td>
                                <td>{{ number_format($p->villages->count()) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>


  <!-- /.modal -->
@endsection
