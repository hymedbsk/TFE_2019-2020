@extends('layouts.log')

@section('content')
<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h3> Ajouter une dépense au budget</h3>
                            </p>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' =>
                            ['depense.store',Crypt::encrypt($budget->budg_id)],'enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="form-group ">
                                <div class="form-group  {!! $errors->has('qte') ? 'has-error' : '' !!}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('libelle', null, ['class' => 'form-control border-primary',
                                            'placeholder' => 'Libellé (ex: Paquet de biscuit)', 'maxlength' => '50'])
                                            !!}
                                            {!! $errors->first('libelle', '<small class="help-block">:message</small>')
                                            !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::number('montant', null, ['class' => 'form-control border-primary',
                                            'placeholder' => 'Montant de la dépense', 'maxlength' => '6','min'=>'0',
                                            'step'=>'0.01']) !!}
                                            {!! $errors->first('montant', '<small class="help-block">:message</small>')
                                            !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group  ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  {!! $errors->has('Description') ? 'has-error' : '' !!}">
                                            {!! Form::textarea('description', null, ['class' => 'form-control border
                                            border-primary','maxlength' => '100', 'placeholder' => 'Petite description
                                            de la dépense (exemple: Achat de biscuits)' ]) !!}
                                            {!! $errors->first('description', '<small
                                                class="help-block">:message</small>') !!}
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
                        <a href="javascript:history.back()" class="btn btn-primary">
                            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection