
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">GICS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Gics</li>
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
                                <th>DESIGNATION</th>
                                <th>PRODUCTEURS</th>
                                <th>IMMATRICULATION</th>
                                <th>DATE DE CREATION</th>
                                <th>REGION</th>
                                <th>ARRONDISSEMENT</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($gics as $p)
                            <tr>
                                <td><a href="/admin/cooperatives/{{$p->id}}"></a> {{ $p->name }}</td>
                                <td>{{ App\Helpers\NumberFr::format($p->exploitants->count()) }}</td>
                                <td>{{ $p->immatriculation }}</td>
                                <td>{{ date_format($p->dtn,'d/m/Y') }}</td>
                                <td>{{ $p->region?$p->region->name:'-' }}</td>
                                <td>{{ $p->arrondissement?$p->arrondissement->name:'-' }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>


  <!-- /.modal -->
@endsection
