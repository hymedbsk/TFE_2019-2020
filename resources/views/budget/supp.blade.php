@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($budgets as $budget)
                    @if($budget->date_supp !== NULL)
                        <div class="col-md-6">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-body">

                                    <h5 class="card-title"><i style="color:#fed136" class="fas fa-wallet fa-2x"></i>
                                    </h5>
                                    <p class="card-text"><strong> {{ $budget->nom }}</p></strong>
                                    <p class="card-text"><strong> Budget pour l'année : {{ $budget->annee }}</p>
                                    </strong>
                                    <p class="card-text">Supprimé le
                                        {{ $budget->date_supp->format('d-m-yy') }}</p>
                                    <p class="sub-card" style="color:red">
                                        Budget supprimer
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</header>
