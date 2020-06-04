@extends('layouts.log')

@section('content')

<header class="masthead">
	<div class="intro-text">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2> Vos informations personnelles </h2>
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                        <p class="text-center"> <img class="img-fluid-center" src="{{ asset('img/che2head.png') }}" alt="Logo CHE2"></p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tasks.store') }}" method="post">
                                @csrf
                                Task name:
                                <br />
                                <input type="text" name="name" />
                                <br /><br />
                                Task description:
                                <br />
                                <textarea name="description"></textarea>
                                <br /><br />
                                <br />
                                <select name='color' class=" form-control border-primary">
                                    <option value="Violet">Violet</option>
                                    <option value="SlateGray">SlateGray</option>
                                    <option value="SkyBlue">SkyBlue</option>
                                    <option value="SeaGreen">SeaGreen</option>
                                    <option value="Orchid">Orchid</option>
                                    <option value="Orange">Orange</option>
                                    <option value="NavajoWhite">NavajoWhite</option>
                                    <option value="MediumSeaGreen">MediumSeaGreen</option>
                                </select>
                                <br /><br />
                                Start time:
                                <br />
                                <input type="text" name="task_date" class="date" id="date"/>
                                <br /><br />
                                End time:
                                <br />
                                <input type="text" name="task_end" class="date" id="fin"/>
                                <br /><br />
                                <input type="submit" value="Save" />
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
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
