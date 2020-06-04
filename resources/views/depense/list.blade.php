@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                            <h3 style="color:black"> Résumer du budget {{ $budget->nom }} </h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Montant de base :
                                <strong style="color:green">
                                    @foreach($totals as $total)
                                        {{ $total }}€
                                    @endforeach
                                </strong>
                            </p>
                            <p class="card-text">Total des dépenses : <strong style="color:red"> {{ $totDepense }}€ </p>
                            </strong>
                            <p class="card-text">Total des gains : <strong style="color:green"> {{ $totGain }}€ </p>
                            </strong>
                            <p class="card-text">Montant actuel : <strong style="color:blue"> {{ $tot }}€ </p></strong>
                            <button type="button" class="btn btn-success float-left" data-toggle="modal"
                                data-target="#gain">Ajouter un gain</button></p>

                            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                data-target="#depense">Ajouter une dépense</button></p>
                            <a href="{{ url('/downloadPDF/'.Crypt::encrypt($budget->budg_id)) }}"
                                class="btn btn-warning float-center">Télécharger le PDF du budget</a>
                        </div>
                    </div>
                </div>
                @include('message')
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($depenses as $depense)
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <a href={{ url('/budget/depense/' .Crypt::encrypt($depense->dep_id)) }}
                                    target="_blank">
                                    <h5 class="card-title"><i style="color:red" class="fas fa-euro-sign fa-4x"></i></h5>
                                    <p class="card-text">Dépense de <strong style="color:red"> :
                                            {{ $depense->montant }}€</p></strong>
                                    <p class="sub-card"> Ajouter par {{ $depense->users->prenom }}
                                        {{ $depense->users->nom }} le
                                        {{ $depense->date_cree->format('d-m-yy') }}</p>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
                @foreach($gains as $gain)
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <a href={{ url('/budget/gain/' .Crypt::encrypt($gain->gain_id)) }}
                                    target="_blank">
                                    <h5 class="card-title"><i style="color:green" class="fas fa-euro-sign fa-4x"></i>
                                    </h5>
                                    <p class="card-text">Gain de <strong style="color:green"> : {{ $gain->montant }}€
                                    </p></strong>
                                    <p class="sub-card"> Ajouter par {{ $gain->users->prenom }}
                                        {{ $gain->users->nom }} le
                                        {{ $gain->date_cree->format('d-m-yy') }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</header>

<div id="gain" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="text-align:center">

                    <h3 style="color:green">Ajouter un gain</h3>
                </p>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' =>
                ['gain.store',Crypt::encrypt($budget->budg_id)],'enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group ">
                    <div class="form-group  {!! $errors->has('qte') ? 'has-error' : '' !!}">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::text('libelle', null, ['class' => 'form-control border-primary', 'placeholder'
                                => 'Libellé ', 'maxlength' => '50']) !!}
                                {!! $errors->first('libelle', '<small class="help-block">:message</small>') !!}
                                <br>
                            </div>
                            <div class="col-md-6">
                                {!! Form::number('montant', null, ['class' => 'form-control border-primary',
                                'placeholder' => 'Montant de la dépense', 'maxlength' => '6','min'=>'0','step'=>'0.02'])
                                !!}
                                {!! $errors->first('montant', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group  ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                {!! Form::textarea('description', null, ['class' => 'form-control border
                                border-primary','maxlength' => '100', 'placeholder' => 'Petite description de la dépense
                                (exemple: Achat de biscuits)' ]) !!}
                                {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <a href="javascript:history.back()" class="btn btn-primary" data-dismiss="modal">
                <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
            </a>
        </div>
    </div>
</div>

<div id="depense" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p style="text-align:center">

                    <h3 style="color:red">Ajouter une dépense</h3>
                </p>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' =>
                ['depense.store',Crypt::encrypt($budget->budg_id)],'enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group ">
                    <div class="form-group  {!! $errors->has('qte') ? 'has-error' : '' !!}">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::text('libelle', null, ['class' => 'form-control border-primary', 'placeholder'
                                => 'Libellé ', 'maxlength' => '50']) !!}
                                {!! $errors->first('libelle', '<small class="help-block">:message</small>') !!}
                                <br>
                            </div>
                            <div class="col-md-6">
                                {!! Form::number('montant', null, ['class' => 'form-control border-primary',
                                'placeholder' => 'Montant de la dépense', 'maxlength' => '6','min'=>'0','step'=>'0.02'])
                                !!}
                                {!! $errors->first('montant', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group  ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                {!! Form::textarea('description', null, ['class' => 'form-control border
                                border-primary','maxlength' => '100', 'placeholder' => 'Petite description de la dépense
                                (exemple: Achat de biscuits)' ]) !!}
                                {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
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
