@extends('layouts.log')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                        <p>
                            <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                             <h3 class="panel-title text-left" style="color:black"> <a href="{{url('document')}}" class="" style="color:black"> Documents</a>  &nbsp >  &nbsp @foreach($docs as $doc){{$doc->nom}} @endforeach </h3>
                        </p>
                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        <input class="form-control" id="myInput" type="text" placeholder="Recherche...">
                        <script>
                            $(document).ready(function(){
                              $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable ").filter(function() {
                                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                              });
                            });
                            </script>
                        <div class="table-responsive">
                            @foreach($docs as $doc)
                            <table class="table table-hover">
                                <thead>
                                    <th class="scope"> <a class="float-left"  data-toggle="modal" data-target="#myModal" style="color:white"> <i class="fas fa-plus-circle fa-3x" style="color:green"></i> </a></th>
                                    <th class="scope"> </th>
                                    <th class="scope text-left"> Nom </th>
                                    <th class="scope text-left"> Ajouter le  </th>
                                    <th class="scope text-left"> Ajouter par </th>
                                </thead>
                                    <tbody>
                                           @foreach($doc->files as $file)
                                                <tr>
                                                    <td><a class="card-text" href="{{ url('downloads/'.$file->file_nom) }} " style="color:white"> <i class="fas fa-download" style="color:#fed136"></i></a>  </td>
                                                    <td>  <a class="float-left" href="{{ url('file/'.$file->file_id) }} " style="color:white" onclick="confirm(\'Voulez-vous vraimer supprimer ce fichier ?\')"> <i class="fas fa-trash" style="color:red"></i></a>  </td>
                                                    <td class="text-left"><a class="file" href={{ url('download/'.$file->file_nom )}} target="_blank" ><i class="far fa-file-alt"></i> {{$file->file_nom}}</a></td>
                                                    <td class="text-left"> {!! $file->ajoute_le->format('d-m-Y') !!}</td>
                                                    <td class="text-left"> {!! $file->user->prenom !!} {!! $file->user->nom !!}</td>
                                                </tr>
                                           @endforeach
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
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <p style="text-align:center">
                      <h3> Nouveau(x) document(s)</h3>
                </p>
            </div>
             <div class="modal-body">
                {!! Form::open(['route' => 'file.store','enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="form-group ">
                    <div class ="row">
                        <div class="col-md-12">

                            <select name='doc' class=" form-control border-primary">
                                @foreach($docs as $doc)
                                    <option value="{{$doc->doc_id}} "  @if(Crypt::decrypt($id) == $doc->doc_id) selected @endif> {{$doc->nom}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="form-group ">
                        <div class ="row">
                            <div class="col-md-12">
                                {!! Form::file('Nom_doc[]', ['class' => 'form-control-file border-primary btn  btn-info','multiple']) !!}
                                {!! $errors->first('Nom_doc', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12 text-center">
                            {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                            {!! Form::close() !!}
                        </div>
               </div>
        <a href="javascript:history.back()" class="btn btn-primary" data-dismiss="modal">
             <span class="glyphicon glyphicon-circle-arrow-left"> Retour</span>
        </a>
   </div>
</div>
</div>
@endsection
