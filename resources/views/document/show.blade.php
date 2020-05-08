@extends('layouts.post')

@section('content')
<header class="masthead">
    <div class="intro-text">
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                        <p>
                            <img src="{{ asset('/img/che2Head.png')}}" alt="logo che2">
                             <h3 class="panel-title">Fichier </h3>
                        </p>


                        <p> @include('message') </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @foreach($docs as $doc)
                            <table class="table table-hover">
                                <thead>
                                    <th class="scope"> <a class="btn btn-success" href= "{{ url('document/file/create') }}" style="color:white"> Ajouter un fichier </a></th>
                                    <th class="scope"> Nom </th>
                                    <th class="scope"> Ajouter le  </th>
                                    <th class="scope"> Ajouter par </th>
                                    <th class="scope"> </th>
                                    <th class="scope"> </th>
                                </thead>

                                    <tbody>

                                           @foreach($doc->files as $file)
                                                <tr>
                                                    <td> </td>
                                                    <td class="text"><a class="file" href="#" download><i class="far fa-file-alt"></i> {{$file->file_nom}}</a></td>
                                                    <td class="text"> {!! $file->ajoute_le->format('d-m-Y') !!}</td>
                                                    <td class="text"> {!! $file->user->prenom !!} {!! $file->user->nom !!}</td>
                                                </tr>
                                           @endforeach

                                                   <!-- <td class="text-primary"><strong>
                                                    <td class="text-primary"><strong>
                                                    <td class="text-primary"><strong>
                                                        <div class="form-group ">
                                                            <div class ="row">
                                                                <div class="col-md-12">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                    </td>
                                                    </div> !-->

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
