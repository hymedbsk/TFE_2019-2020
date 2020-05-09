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
                            <h3 style="color:black"> Résumer du budget actuel</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text" >Montant de base :
                                <strong style="color:green">
                                    @foreach($totals as $total)
                                        {{$total}}€
                                    @endforeach
                                </strong>
                            </p>
                            <p class="card-text" >Total des dépenses : <strong style="color:red"> {{$totDepense}}€  </p></strong>
                            <p class="card-text" >Total des gains : <strong style="color:green">  {{$totGain}}€  </p></strong>
                            <p class="card-text" >Montant actuel : <strong style="color:green">  {{$tot}}€   </p></strong>
                            <a style: href={{ url('/budget/'.Crypt::encrypt($budget->id) .'/gain')}} class="btn btn-success float-left"> Ajouter un gain </a>
                            <a style: href={{ url('/budget/'.Crypt::encrypt($budget->id) .'/depense')}} class="btn btn-danger float-right"> Ajouter une dépense </a>
                            <a href="{{url('/downloadPDF/'.Crypt::encrypt($budget->id))}}">Download PDF</a>
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

                                            <h5 class="card-title"><i style="color:red"class="fas fa-euro-sign fa-4x"></i></h5>
                                            <p class="card-text">Dépense de  <strong style="color:red"> : {{ $depense->montant }}€</p></strong>
                                            <p class="sub-card"> Ajouter par  {{ $depense->users->prenom}}  {{ $depense->users->nom}} le {{$depense->date_cree->format('d-m-yy')}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                @endforeach
                @foreach($gains as $gain)
                            <div class="col-md-4">
                                <div class="card shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-body">
                                        <a href="#">
                                            <h5 class="card-title"><i style="color:green"class="fas fa-euro-sign fa-4x"></i></h5>
                                            <p class="card-text">Gain de  <strong style="color:green"> : {{ $gain->montant }}€</p></strong>
                                            <p class="sub-card"> Ajouter par  {{ $gain->users->prenom}}  {{ $gain->users->nom}} le {{$gain->date_cree->format('d-m-yy')}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </div>
        </div>
    </div>
</header>
