@extends('layouts.log')

@section('content')
<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
				                <h3>Partage de document </h3>
                            </p>
                        </div>
                         <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="text-left doc"> <a class="btn btn-success" href="document/add"> Créer un dossier </a>
                                        <th class="text-left doc ">Nom du dossier</th>
                                        <th class="text-left doc"> Crée le </th>
                                        <th class="text-left doc"> Crée par </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($docs as $doc)
                                            <tr>
                                                <td> </td>
                                                <td class="text-left doc"><i class="fa fa-folder"><a class="doc" href="{{ url('document/'.Crypt::encrypt($doc->doc_id).'/list')}}"> {{$doc->nom}} </a></i></td>
                                                <td class="text-left doc"> {{$doc->cree_le->format('d-m-Y')}} </td>
                                                <td class="text-left doc"> {{$doc->user->prenom}} {{$doc->user->nom}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</header>    <!-- /#page-wrapper -->
@endsection
