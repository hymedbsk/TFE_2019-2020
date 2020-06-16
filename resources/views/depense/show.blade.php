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
                            <h3 style="color:black"> Détails de la dépense </h3>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12 float-center">
                                    <h5 class="card-title"><i style="color:red" class="fas fa-euro-sign fa-4x"></i></h5>
                                    <p class="card-text">Dépense de <strong style="color:red"> :
                                            {{ $depense->montant }}€</p></strong>
                                    <p class="card-text"> Libellé : {{ $depense->libelle }}
                                        <p class="card-text"> Description: {{ $depense->description }}
                                            <p class="card-text"> Ajouter par {{ $depense->users->prenom }}
                                                {{ $depense->users->nom }} le
                                                {{ $depense->date_cree->format('d-m-yy') }}</p>
                                            @if($depense->budgets->date_supp == NULL)
                                                <a class=" sub-text float-right"
                                                    href={{ url('budget/depense/'.Crypt::encrypt($depense->dep_id).'/delete') }}
                                                    method="DELETE"
                                                    onclick="return confirm('Voulez-vous supprimer la dépense?')"> <i
                                                        class="fas fa-trash fa-2x" style="color:red"></i></a>
                                            @else
                                                <p class="sub-card" style="color:red">
                                                    Budget supprimé
                                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection