@extends('layouts.log')

@section('content')
<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                            <h3 style="color:black"> Détails du gain </h3>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <h5 class="card-title"><i style="color:green" class="fas fa-euro-sign fa-4x"></i>
                                    </h5>
                                    <p class="card-text">Gain de <strong style="color:green"> : {{ $gain->montant }}€
                                    </p></strong>
                                    <p class="card-text"> Libellé : {{ $gain->libelle }} </p>
                                    <p class="card-text"> Description : {{ $gain->description }} </p>
                                    <p class="sub-card"> Ajouter par {{ $gain->users->prenom }}
                                        {{ $gain->users->nom }} le
                                        {{ $gain->date_cree->format('d-m-yy') }}</p>
                                    <a class="sub-card float-right"
                                        href={{ url('budget/gain/'.Crypt::encrypt($gain->gain_id).'/delete') }}
                                        method="DELETE" style="color:white"
                                        onclick="return confirm('Voulez-vous vraiment supprimer le gain')"> <i
                                            class="fas fa-trash fa-2x" style="color:red"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>