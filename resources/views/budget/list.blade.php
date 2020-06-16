@extends('layouts.log')

@section('content')

<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a type="button" style="color:white" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal">Nouveau budget</a>

                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p style="text-align:center">
                            <h3> Créer un budget</h3>
                        </p>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => ['budget.store'],'enctype'=>'multipart/form-data']) !!}
                        @csrf
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::text('nom', null, ['class' => 'form-control border-primary', 'placeholder'
                                    => 'Nom du budget','minlength'=>'2', 'maxlength' => '20', 'required']) !!}
                                    {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                                </div>
                                <br>
                                <div class="col-md-6">
                                    {!! Form::text('annee', '2019/2020', ['class' => 'form-control border-primary',
                                    'placeholder' => 'année/année', 'min'=>'9', 'max'=>'9',
                                    'maxlength'=>"9",'required']) !!}
                                    {!! $errors->first('annee', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::number('total', null, ['class' => 'form-control border-primary',
                                    'placeholder' => 'Montant du budget', 'maxlength' => '7','min'=>'0', 'step'=>"0.01",
                                    'required']) !!}
                                    {!! $errors->first('total', '<small class="help-block">:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            {!! Form::submit('Enregister le budget !', ['class' => 'btn btn-info pull-right']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <a href="javascript:history.back()" class="btn btn-primary" data-dismiss="modal">
                        <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($budgets as $budget)

                    <div class="col-md-6">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="card-body">
                                <a
                                    href="{{ url('budget/'.Crypt::encrypt($budget->budg_id)) }}">
                                    <h5 class="card-title"><i style="color:#fed136" class="fas fa-wallet fa-2x"></i>
                                    </h5>
                                    <p class="card-text"><strong>
                                            <h4 style="color:black">{{ $budget->nom }}</h4>
                                    </p></strong>
                                    <p class="card-text"><strong> Budget pour l'année : {{ $budget->annee }}</p>
                                    </strong>
                                    <p class="sub-text" style="color:black"> Ajouter par
                                        {{ $budget->users->prenom }} {{ $budget->users->nom }} le
                                        {{ $budget->date_cree->format('d-m-yy') }}</p>
                                    @if($budget->date_supp == NULL)

                                        <p class="sub-text">
                                            <a style:
                                                href={{ url('/budget/'.Crypt::encrypt($budget->budg_id). '/edit') }}
                                                class="float-left"> <i class="fas fa-edit fa-3x"
                                                    style="color:#fed136"></i> </a>
                                        </p>
                                        {{ Form::open(['action' => ['BudgetController@destroy', Crypt::encrypt($budget->budg_id)]]) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Supprimer', ['class' => 'btn btn-danger float-right', 'onclick' => 'return confirm(\'Vraiment supprimer ce budget ?\')'] ) }}
                                        {{ Form::close() }}
                                        </p>
                                    @else
                                        <p class="sub-text" style="color:red">
                                            Budget supprimé
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</section>