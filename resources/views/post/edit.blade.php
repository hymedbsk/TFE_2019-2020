@extends('layouts.log')

@section('content')

<header class="masthead">
    <div class="intro-text">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
			
                    <div class="card">
                        
                        <div class="card-header">
                            <p>
                                <img src="http://www.che2-ephec.be/img/che2head.png" alt="logo che2">
				<h3> Modifier votre post </h3>
                            </p>
                        </div>
                         <div class="card-body">
                            {!! Form::model($posts,['route' => ['post.update', $posts->Post_id], 'method' => 'put', 'class' => 'form-horizontal panel', 'enctype'=>'multipart/form-data']) !!} 
                           <div class="form-group ">

                                    <div class="col-md-12">
                                        <div class="form-group  ">
                                     	 {!! Form::text('Titre', $posts->titre, ['class' => 'form-control border border-info']) !!}
                                        
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="Option_Nom" class=" form-control border-primary">
                                            <option value="IT">Technologie de l'informatique</option>
                                            <option value="CX">Commerce Extérieur</option>
                                            <option value="CO">Comptabilité</option>
                                            <option value="DT">Droit</option>
                                            <option value="EB">e-Business</option>
                                            <option value="EM">Électromécanique</option>
                                            <option value="MA">Marketing</option>
                                            <option value="AU">Automatique</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                    <select name="Bac" class=" form-control border-primary">
                                        <option value="1">Bac 1</option>
                                        <option value="2">Bac 2</option>
                                        <option value="3">Bac 3</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
				<div class="col-md-12">
                            <input class="form-control-file border-primary btn  btn-info" name="Nom_doc" type="file">
						
					</div>
				</div>
                </div>
           </div>
                            <div class="form-group  ">
                                <div class="col-md-12">
                                    <div class="form-group  ">
                                        
                                        {!! Form::textarea ('Description', $posts->description, ['class' => 'form-control border-info ']) !!}
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            
                            <div class="col-lg-12 text-center">
                              {!! Form::submit('Envoyer', ['class' => 'btn btn-info']) !!}
                                
                            </div>
			{!! Form::close() !!}
				</div>
					 <a href="javascript:history.back()" class="btn btn-primary">
        				    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
       					 </a>
                            	</div>
                        	</div> 
	    		</div>
		</div>
	</div>
</header>
