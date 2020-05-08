@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
	        <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
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
                                        <a href="#">
                                            <h5 class="card-title"><i style="color:red"class="fas fa-euro-sign fa-4x"></i></h5>
                                            <p class="card-text">Dépense de  <strong style="color:red"> : {{ $depense->qte }}€</p></strong>
                                           <p class="sub-card">  </p>
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
                                            <p class="card-text">Gain de  <strong style="color:green"> : {{ $gain->qte }}€</p></strong>
                                           <p class="sub-card"> Ajouter par   </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                @endforeach
            </div>
        </div>
    </div>
</header>
