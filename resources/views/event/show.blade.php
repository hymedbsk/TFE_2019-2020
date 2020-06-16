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
                <h3 class="panel-title text-center" style="color:black"> Détails de l'évènement </h3>
              </p>
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-12 float-center">
                    <h5 class="card-title"><i style="color:#fec503" class="fas fa-calendar fa-4x"></i></h5>
                    <p class="card-text"> Titre : {{ $event->titre }} </p>
                    <p class="card-text"> Description : {{ $event->description }} </p>
                    <p class="card-text"> Date de début : {{ $event->début }} date de fin : {{ $event->fin }}
                    </p>

                    <a class=" sub-text float-right"
                      href={{ url('event/'. Crypt::encrypt($event->event_id)) }}
                      method="DELETE" onclick="return confirm('Voulez-vous supprimer l'évènement ?')"> <i
                        class="fas fa-trash fa-2x" style="color:red"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>