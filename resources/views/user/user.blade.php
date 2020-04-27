@extends('layouts.log')

@section('content')
<header class="masthead">
  <div class="intro-text">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                 <div class="card-header">
	 	     <h3 class="panel-title">Liste des utilisateurs</h3>
		     <p>  
                       <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
		    	@include('message') 
		    </p>
	
           	     @if(session()->has('ok'))
                  	<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
           	     @endif
 		  </div>
		  <div class="card-body">
                      <table class="table">
                   	 <thead>
                              <th class="scope">Matricule</th>
                              <th class="scope">Email</th>
                        </thead>
                        <tbody>
                       	    @foreach ($users as $user)
                           	 <tr>
                                    <td class="text-primary"><strong>{!! $user->matricule !!}</strong></td>
                                    <td class="text-primary"><strong>{!! $user->email !!}</strong></td>
                                    <td>{!! link_to_route('user.edit', 'Modifier', [$user->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                                    <td>
                                      {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                      {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                      {!! Form::close() !!} </td>
			           <td>
				  
			              {!! Form::open([ 'method'=>'put', 'route' => ['user.admin', $user->id, 'method'=>'put']]) !!}
				      {!! Form::submit('Passer membre', ['class' => 'btn btn-success btn-block', 'onclick' => 'return confirm(\'Vraiment le passer membre ?\')']) !!}
				      {!! Form::close() !!}
				 </td>
				<td>
				
				   
                                      {!! Form::open([ 'method'=>'put', 'route' => ['user.delAdmin', $user->id, 'method'=>'put']]) !!}
                                      {!! Form::submit('Enlever membre', ['class' => 'btn btn-warning btn-block', 'onclick' => 'return confirm(\'Vraiment le retirer des membres ?\')']) !!}
                                      {!! Form::close() !!}  
				</td>
				  
                                </tr>
                          @endforeach
                      </tbody>
                </table>
            </div>
            {!! link_to_route('user.create', 'Ajouter un utilisateur', [], ['class' => 'btn btn-info pull-right']) !!}
            {!! $links !!}
        </div>
        </div>
    </div>
   </div>
  </div>
</header>

@endsection

