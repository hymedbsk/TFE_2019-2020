@extends('layouts.log')

@section('content')

<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h3 class="panel-title "> Liste des annonces</h3>
                            </p>
                            <p> @include('message') </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="scope"> <a class="float-left" data-toggle="modal"
                                                data-target="#myModal" style="color:white"> <i
                                                    class="fas fa-plus-circle fa-3x" style="color:green"></i> </a></th>
                                        <th class="scope "> Titre de l'annonce </th>
                                        <th class="scope "> Ajouter le </th>
                                        <th class="scope "> Ajouter par </th>
                                        <th class="scope "> </th>
                                    </thead>
                                    <tbody>
                                        @foreach($annonces as $annonce)
                                            <tr id="myTable">
                                                <td></td>
                                                <td> <a class=""
                                                        href={{ url('membre/annonc/'.Crypt::encrypt($annonce->annonce_id)."/show") }}
                                                        style="color:black"> {{ $annonce->titre }}</a> </td>
                                                <td class="text-center doc"> {!! $annonce->date_cree->format('d-m-Y')
                                                    !!}</td>
                                                <td class="text-center doc"> {!! $annonce->user->prenom !!} {!!
                                                    $annonce->user->nom !!}</td>
                                                <td>
                                                    <a class="float-center"
                                                        href={{ url('membre/annonce/'.Crypt::encrypt($annonce->annonce_id)) }}
                                                        method="DELETE" style="color:white"
                                                        onclick="return confirm('Voulez-vous vraiment désactiver l\'annonce?')">
                                                        <i class="fas fa-times-circle fa-2x" style="color:red"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="text-align:center">
                    <h3> Créer une annonce</h3>
                </p>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['annonce.store'],'enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::text('titre', null, ['class' => 'form-control border-primary', 'placeholder' =>
                            'Titre de l\'annonce', 'minlength'=>'10', 'maxlength' => '100']) !!}
                            {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                            <br />
                        </div>
                        <br />
                        <div class="col-md-12">
                            {!! Form::textarea('contenu', null,['class' => 'form-control border-primary', 'placeholder'
                            => 'Contenu', 'minlength'=>'10', 'maxlength'=>"100"]) !!}
                            {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    {!! Form::submit('Créer l\'annonce !', ['class' => 'btn btn-info ']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary" data-dismiss="modal">
                <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
            </a>
        </div>
    </div>
</div>
@endsection