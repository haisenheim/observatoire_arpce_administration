
@extends('Layouts.admin')

@section('content')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<main id="main">
    <h2>RAPPORTS</h2>

  <div style="max-height:300px; overflow: scroll;" class="">
    <div class="">
        <div class="p-3">
            <table class="table table-bordered table-sm table-hover data-table">
                <thead>
                      <tr>
                            <th>ANNEE</th>
                            <th>INTITULE</th>
                            <th>ENTREPRISE</th>
                            <th>

                            </th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($rapports as $p)
                        <tr>
                            <td>{{ $p->annee }}</td>
                            <td><a href="{{ $p->fichier }}"> {{ $p->name }} </a></td>
                            <td>{{ $p->entreprise?$p->entreprise->name:'-' }}</td>
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</main>

@endsection


