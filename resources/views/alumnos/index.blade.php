@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Alumnos <span class="badge">{{ count($alumnos) }}</span>
            <a href="{{ URL::to('alumnos') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Fecha de nacimiento</td>
                    <td>Teléfono</td>
                    <td>Nombre del tutor</td>
                    <td>Teléfono de emergencia</td>
                    <td>Facebook</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $key => $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->persona->nombre }}</a></td>
                            <td>{{ $alumno->persona->apellidos }}</td>
                            <td>{{ $alumno->persona->fecha_nacimiento }}</td>
                            <td>{{ $alumno->persona->telefono }}</td>
                            <td>{{ $alumno->nombre_del_tutor }}</td>
                            <td>{{ $alumno->num_emergencia }}</td>
                            <td>{{ $alumno->facebook }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection