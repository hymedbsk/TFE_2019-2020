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
			<option value="DT">Droit</option>
                        <option value="IT">Technologie de l'informatique</option>
                        <option value="CX">Commerce Extérieur</option>
                        <option value="CO">Comptabilité</option>
                        <option value="EB">e-Business</option>
                        <option value="EM">Électromécanique</option>
                        <option value="MA">Marketing</option>
                        <option value="AU">Automatique</option>
                    </select>
                </div>
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
              <a class="card-text" href="{{ url('download/'.$post->doc) }}"> {{ $post->doc}} </a>
              <p class="sub-card">  le {!! $post->date->format('d-m-Y') !!} </p>
	       @if(Auth::user()->id == $post->User_id)
              <a style: href="{{ url('/post/'.$post->Post_id. '/edit')}}" class="btn btn-warning float-left"> Modifier </a>
	      {{ Form::open(['action' => ['PostController@destroy', $post->Post_id], 'method' => 'POST'])}}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Supprimer', ['class' => 'btn btn-danger float-right', 'onclick' => 'return confirm(\'Vraiment supprimer cette annonce ?\')'] )}}
              {{Form::close()}}
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

