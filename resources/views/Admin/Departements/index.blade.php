
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">DEPARTEMENTS</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Departements</li>
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
                                <th>EXPLOITANTS</th>
                                <th>COOPERATIVES</th>
                                <th>GICS</th>
                                <th>ZONES</th>
                                <th>VILLAGES</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($departements as $p)
                            <tr>
                                <td><a href="/admin/departements/{{$p->id}}"></a> {{ $p->name }}</td>
                                <td>{{ number_format($p->exploitants->count()) }}</td>
                                <td>{{ number_format($p->cooperatives->count()) }}</td>
                                <td>{{ number_format($p->gics->count()) }}</td>
                                <td>{{ number_format($p->zones->count()) }}</td>
                                <td>{{ number_format($p->villages->count()) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>



@endsection
