@extends('layouts.log')

@section('content')
<section class="page-section">
    <div class="intro-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p>
                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h3 class="panel-title text-left" style="color:black"> <a
                                        href="{{ url('document') }}" class="" style="color:black">
                                        Documents</a> &nbsp > &nbsp @foreach($docs as $doc){{ $doc->nom }} @endforeach
                                </h3>
                            </p>
                            <p> @include('message') </p>
                        </div>
                        <div class="card-body">
                            <input class="form-control" id="myInput" type="text" placeholder="Rechercher...">
                            <script>
                                $(document).ready(function () {
                                    $("#myInput").on("keyup", function () {
                                        var value = $(this).val().toLowerCase();
                                        $("#myTable ").filter(function () {
                                            $(this).toggle($(this).text().toLowerCase().indexOf(
                                                value) > -1)
                                        });
                                    });
                                });
                            </script>
                            <div class="table-responsive">
                                @foreach($docs as $doc)
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="scope"> <a class="float-left" data-toggle="modal"
                                                    data-target="#myModal" style="color:white"> <i
                                                        class="fas fa-plus-circle fa-3x" style="color:green"></i> </a>
                                            </th>
                                            <th class="scope"> </th>
                                            <th class="scope text-left"> Nom </th>
                                            <th class="scope text-left"> Ajouter le </th>
                                            <th class="scope text-left"> Ajouter par </th>
                                            {!! Form::open(['route' => 'deleteAll','enctype'=>'multipart/form-data'])
                                            !!}
                                            <th class="scope text-left">

                                                {!! Form::submit('Supprimer !', ['class' => 'btn btn-danger
                                                pull-right']) !!}
                                            </th>
                                        </thead>
                                        @if(count($doc->files) == 0)
                                            <p style="font-size:20px; color:black; "> Dossier vide</p>
                                        @endif
                                        <tbody>
                                            @foreach($doc->files as $file)

                                                <tr id="myTable">
                                                    <td><a class="card-text"
                                                            href="{{ url('document/file/download/'.$file->nom) }} "
                                                            style="color:white"> <i class="fas fa-download"
                                                                style="color:#fed136"></i></a> </td>
                                                    <td> <a class="float-left"
                                                            href="{{ url('document/file/'.$file->file_id) }} "
                                                            style="color:white"
                                                            onclick="return confirm('Voulez-vous vraiment supprimer ce fichier ?')">
                                                            <i class="fas fa-trash" style="color:red"></i></a> </td>
                                                    <td class="text-left"><a class="file"
                                                            href={{ url('document/file/view/'.$file->nom ) }}
                                                            target="_blank"><i class="far fa-file-alt"></i>
                                                            {{ $file->nom }}</a></td>
                                                    <td class="text-left"> {!! $file->date_cree->format('d-m-Y') !!}
                                                    </td>
                                                    <td class="text-left"> {!! $file->user->prenom !!} {!!
                                                        $file->user->nom !!}</td>
                                                    <td class="text-center"> <input type="checkbox" name="file[]"
                                                            class="student_checkbox" value="{{ $file->file_id }}" />
                                                    </td>
                                                </tr>
                                                </a>
                                            @endforeach
                                @endforeach
                                {!! Form::close() !!}
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .progress {
        position: relative;
        width: 100%;
    }

    .bar {
        background-color: #fec503;
        width: 0%;
        height: 50px;
    }

    .percent {
        position: absolute;
        display: inline-block;
        left: 50%;
        color: #7F98B2;
    }
</style>
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
                    <div class="row">
                        <div class="col-md-12">

                            <select name='doc' class=" form-control border-primary">
                                @foreach($docs as $doc)
                                    <option value="{{ $doc->doc_id }} " @if(Crypt::decrypt($id)==$doc->doc_id)
                                        selected @endif> {{ $doc->nom }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::file('Nom_doc[]', ['class' => 'form-control-file border-primary btn
                            btn-info','multiple', 'required']) !!}
                            {!! $errors->first('Nom_doc[]', '<small class="help-block">:message</small>') !!}
                            <br />
                            <div class="progress">
                                <div class="bar"></div>
                                <div class="percent" style="black">0%</div>
                            </div>

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
<script type="text/javascript">
    (function () {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({

            beforeSend: function () {
                status.empty();
                var percentVal = '0%';
                var posterValue = $('input[name=file]').val();
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            success: function () {
                var percentVal = 'Sauvegarde';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            complete: function (xhr) {
                status.html(xhr.responseText);

                window.location.href =
                    "{{ url('document/'.Crypt::encrypt($doc->doc_id).'/list') }}";
            }
        });

    })();
</script>


@endsection