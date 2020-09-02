@extends('layouts.log')

@section('content')

  <header class="masthead">
<div class="intro-text">
    <div class="container">
	 <div class="row justify-content-center">

                        <div class="card">
                            <div class="card-header">
      	<h3> Filtre <h3>
        {!! Form::open(['route' => 'post.search']) !!}
        <div class="form-group ">
		<div class="row">
                <div class="col-md-5 option">
                    <select name='Option_Nom' class=" form-control border-info option">
			<option value="Droit">Droit</option>
                        <option value="Technologie de l'informatique">Technologie de l'informatique</option>
                        <option value="Commerce Extérieur">Commerce Extérieur</option>
                        <option value="Comptabilité">Comptabilité</option>
                        <option value="e-Business">e-Business</option>
                        <option value="Electromécanique"> Electromécanique</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Automatique">Automatique</option>
                    </select>
                </div>
		<br>
                <div class="col-md-3 bac">
                <select name='Bac' class=" form-control border-info">
                    <option value="1">Bac 1</option>
                    <option value="2">Bac 2</option>
                    <option value="3">Bac 3</option>
                </select>
                </div>
		<div class="col-md-4">
                {!! Form::submit('Filtrer ', ['class' => 'btn btn-info pull-right']) !!}
	    </div>
           </div>
		@include('message')
	  </div>
 	 </div>
	</div>
      </div>
			</div>
	</div>
        {!! Form::close() !!}

        <div class="container">
            {{ $links }}
            <div class="row">
        @foreach($posts as $post)

        <div class="col-md-6 ">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <h5 class="card-title">{{ $post->titre }}</h5>
		<hr>
              <p class="card-text">{{ $post->description }}</p>
              <a class="card-text" href="{{ url('/post/download/'.$post->user->matricule.'/'.$post->doc) }}"> Télécharger le document </a>
		<p class="sub-card">  {!! $post->option !!} bac {{$post->bac}} </p>      	 
              <p class="sub-card">  le {!! $post->date_cree->format('d-m-Y') !!} </p>
	       @if(Auth::user()->id == $post->User_id || Auth::user()->membre==1)
              <a style: href="{{ url('/post/'.Crypt::encrypt($post->Post_id). '/edit')}}" class="btn btn-warning float-left"> Modifier </a>
	      {{ Form::open(['action' => ['PostController@destroy', $post->Post_id], 'method' => 'POST'])}}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Supprimer', ['class' => 'btn btn-danger float-right', 'onclick' => 'return confirm(\'Vraiment supprimer cette annonce ?\')'] )}}
              {{Form::close()}}
		@endif
		@if(Auth::user()->membre==1)
			<a class="card-text btn btn-success " href="{{ url('preview/'.$post->doc) }}"> Visionner le document</a>
			<p class="sub-card">  Ecrit par {{$post->user->nom}} {{$post->user->prenom}} {{$post->user->matricule}} </p>
			
		@endif
            </div>
          </div>
      </div>
      @endforeach
      </div>
    </div>

</div>
</div>
  </header>

@endsection

