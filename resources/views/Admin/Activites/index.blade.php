
@extends('Layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">ACTIVITES</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
        <li class="breadcrumb-item active">Activites</li>
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
                                <th>NB. PRODUCTEURS</th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($activites as $p)
                            <tr>
                                <td> {{ $p->name }}</td>
                                <td>{{ App\Helpers\NumberFr::format($p->exploitants->count()) }}</td>
                                <td></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>


  <!-- /.modal -->
@endsection
