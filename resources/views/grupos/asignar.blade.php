@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Asignar alumnos a grupo <strong>{{ $grupo->nombre }}</strong>
        </div>
        <div class="panel-body">
            <div class="page-header">
                <h1><small>Asignacion masiva</small></h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Aleatoriamente
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            El grupo sera llenado de forma aleatoria con los alumnos que no tengan un grupo asignado respetando el limite del grupo.
                        </div>
                    </div>
                    <a class="btn btn-primary pull-right" href="{{ URL::to('grupos/random/'. $grupo->id) }}" role="button">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Asignar
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Aleatoriamente
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            El grupo sera llenado de forma alfabetica con los alumnos que no tengan un grupo asignado respetando el limite del grupo.
                        </div>
                    </div>
                    <a class="btn btn-primary pull-right" href="{{ URL::to('grupos/alfa/'. $grupo->id) }}" role="button">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Asignar
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection