@extends('layouts.log')

@section('content')

<header class="masthead">
	<div class="intro-text">
        <div class="container">


<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
    $('.fin').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">

                                <img src="{{ asset('/img/che2head.png') }}" alt="logo che2">
                                <h2> Calendrier </h2>
                        </div>
                        <div class="card-body">
                          <p>  <button type="button" class="btn btn-danger btn-lg float-center" data-toggle="modal" data-target="#myModal">Ajouter un évènement</button>
                          </p><br>
                            <div id='calendar'></div>
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>

                            <script src='{{ asset('js/locale-all.js') }}'></script>
                            <script>
                                $(document).ready(function() {

                                    $('#calendar').fullCalendar({
                                        dragScroll :true,
                                        events : [
                                            @foreach($tasks as $task)
                                            {
                                                title : '{{ $task->name }}',
                                                start : '{{ $task->task_date }}',
                                                end : '{{ $task->task_end }}',
                                                url : "",
                                                color :"{{ $task->color }}"
                                            },
                                            @endforeach
                                        ],
                                        locale: 'fr',
                                        selectable: true,
                                        selectHelper: true,
                                        select: function (start, end, allDay) {
                                            console.log(start.format('DD-MM-Y'));
                                            $("input#date").val(start.format());
                                            $("input#fin").val(end.format());
                                            console.log(end.format('DD-MM-Y'));
                                            $('#myModal2').modal('show');
                                        },

                                    });
                                });
                            </script>
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
                      <h3> Créer un event</h3>
                </p>
            </div>
             <div class="modal-body">
                {!! Form::open(['route' => 'tasks.store','enctype'=>'multipart/form-data']) !!}
                    @csrf
                    <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                       <div class ="row">
                           <div class="col-md-12">

                            {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Nom de l\'event', 'maxlength' => '20']) !!}

                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                           <div class ="row">
                               <div class="col-md-12">
                                {!! Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' => 'Description de l\'event', 'maxlength' => '100']) !!}

                                </div>
                            </div>
                    </div>
                    <div class="form-group ">
                        <div class ="row">
                            <div class="col-md-12">
                                <select name='color' class=" form-control ">
                                    <option  style="background-color:Violet" value="Violet">Violet</option>
                                    <option  style="background-color:SlateGray" value="SlateGray">SlateGray</option>
                                    <option  style="background-color:SkyBlue" value="SkyBlue">SkyBlue</option>
                                    <option  style="background-color:SeaGreen" value="SeaGreen">SeaGreen</option>
                                    <option  style="background-color:Orchid" value="Orchid">Orchid</option>
                                    <option  style="background-color:Orange" value="Orange">Orange</option>
                                    <option  style="background-color:NavajoWhite" value="NavajoWhite">NavajoWhite</option>
                                    <option  style="background-color:MediumSeaGreen" value="MediumSeaGreen">MediumSeaGreen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class ="row">
                            <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">Date de début</label>
                                    <input name="task_date"  id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" type="date" >
                            </div>
                             <br>
                             <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">Date de fin</label>
                                <input name="task_end"  id="fin" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" type="date" >

                            </div>
                         </div>
                 </div>

                 <div class="col-md-12 text-center">
                    {!! Form::submit('Créer !', ['class' => 'btn btn-success pull-right']) !!}
                    {!! Form::close() !!}
                </div>
             </div>
        </div>
    </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <p style="text-align:center">
                      <h3> Créer un event</h3>
                </p>
            </div>
             <div class="modal-body">
                {!! Form::open(['route' => 'tasks.store','enctype'=>'multipart/form-data']) !!}
                    @csrf
                    <div class="form-group  {!! $errors->has('Titre') ? 'has-error' : '' !!}">
                       <div class ="row">
                           <div class="col-md-12">

                            {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Nom de l\'event', 'maxlength' => '20']) !!}

                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                           <div class ="row">
                               <div class="col-md-12">
                                {!! Form::textarea('description', null, ['class' => 'form-control ', 'placeholder' => 'Description de l\'event', 'maxlength' => '100']) !!}

                                </div>
                            </div>
                    </div>
                    <div class="form-group ">
                        <div class ="row">
                            <div class="col-md-12">
                                <select name='color' class=" form-control ">
                                    <option  style="background-color:Violet" value="Violet">Violet</option>
                                    <option  style="background-color:SlateGray" value="SlateGray">SlateGray</option>
                                    <option  style="background-color:SkyBlue" value="SkyBlue">SkyBlue</option>
                                    <option  style="background-color:SeaGreen" value="SeaGreen">SeaGreen</option>
                                    <option  style="background-color:Orchid" value="Orchid">Orchid</option>
                                    <option  style="background-color:Orange" value="Orange">Orange</option>
                                    <option  style="background-color:NavajoWhite" value="NavajoWhite">NavajoWhite</option>
                                    <option  style="background-color:MediumSeaGreen" value="MediumSeaGreen">MediumSeaGreen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class ="row">
                            <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">Date de début</label>
                                    <input name="task_date"  id="date" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" type="text" readonly>
                            </div>
                             <br>
                             <div class="col-md-6">
                                <label for="email" class=" col-form-label text-md-right">Date de fin</label>
                                <input name="task_end"  id="fin" class="form-control" style="width: 100%; display: inline;" onchange="invoicedue(event);" required="" type="text" readonly>

                            </div>
                         </div>
                 </div>

                 <div class="col-md-12 text-center">
                    {!! Form::submit('Créer !', ['class' => 'btn btn-success pull-right']) !!}
                    {!! Form::close() !!}
                </div>
             </div>
        </div>
    </div>
</div>

@endsection
