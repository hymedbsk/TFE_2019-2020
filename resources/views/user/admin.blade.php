@extends('layouts.log')
@section('content')
<header class="masthead">
  <div class="intro-text">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                 <div class="card-header">
	 	     
		     <p>  
                       <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
			<h3 class="panel-title">Gestion des admins</h3>    
			@include('message') 
		    </p>
 		  </div>
		  <div class="card-body">
			{{ $links}}
                  <table class="table">
			<div class="table-responsive">
                   	 <thead>
                              <th class="scope">Matricule</th>
                              <th class="scope">Email</th>
				<th></th>
                        </thead>
                        <tbody>
                       	    @foreach ($users as $user)
                           	 <tr>
                                    <td class="text-primary"><strong>{!! $user->matricule !!}</strong></td>
                                    <td class="text-primary"><strong>{!! $user->email !!}</strong></td>
				    <td>
				      @if($user->membre == 0)
			              {!! Form::open([ 'method'=>'put', 'route' => ['admin.add', $user->id, 'method'=>'put']]) !!}
				      {!! Form::submit('Passer membre', ['class' => 'btn btn-success btn-block', 'onclick' => 'return confirm(\'Vraiment le passer membre ?\')']) !!}
				      {!! Form::close() !!}
				     
				    
					@endif
					@if($user->membre == 1)
				     
                                      {!! Form::open([ 'method'=>'put', 'route' => ['admin.add', $user->id, 'method'=>'put']]) !!}
                                      {!! Form::submit('Enlever membre', ['class' => 'btn btn-warning btn-block', 'onclick' => 'return confirm(\'Vraiment le retirer des membres ?\')']) !!}
                                      {!! Form::close() !!}  
				     </td>
					@endif
                                </tr>
                          @endforeach
                      </tbody>
                </table>
		</div>
            </div>
        </div>
        </div>
    </div>
   </div>
  </div>
</header>

@endsection


