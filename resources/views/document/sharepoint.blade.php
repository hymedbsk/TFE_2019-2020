@extends('layouts.log')

@section('content')
<section class="page-section">
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
                                        <th class="text-left doc"> <a class="btn btn-success" href="document/add"> Créer
                                                un dossier </a>
                                        <th class="text-left doc ">Nom du dossier</th>
                                        <th class="text-left doc"> Crée le </th>
                                        <th class="text-left doc"> Crée par </th>
                                    </thead>
                                    <tbody>
                                        @if(count($docs) == 0)
                                            <p style="font-size:20px; color:black; "> Aucun dossier</p>
                                        @endif
                                        @foreach($docs as $doc)
                                            <tr>
                                                <td> <a class="float-center"
                                                        href={{ url('document/'.Crypt::encrypt($doc->doc_id)) }}
                                                        style="color:white"
                                                        onclick="return confirm('Voulez-vous vraiment supprimer ce dossier ?')">
                                                        <i class="fas fa-trash" style="color:red"></i></a> </td>
                                                <td class="text-left doc"><i class="fa fa-folder fa-2x"><a class="doc"
                                                            href="{{ url('document/'.Crypt::encrypt($doc->doc_id).'/list') }}">
                                                            {{ $doc->nom }} </a></i></td>
                                                <td class="text-left doc">
                                                    {{ $doc->date_cree->format('d-m-Y') }} </td>
                                                <td class="text-left doc"> {{ $doc->user->prenom }}
                                                    {{ $doc->user->nom }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection