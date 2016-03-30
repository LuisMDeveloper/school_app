@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Alumnos <span class="badge">{{ count($alumnos) }}</span>
            <a href="{{ URL::to('alumnos/create') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Teléfono</th>
                    <th>Nombre del tutor</th>
                    <th>Teléfono de emergencia</th>
                    <th>Facebook</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $key => $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->nombre }}</a></td>
                            <td>{{ $alumno->apellidos }}</td>
                            <td>{{ $alumno->fecha_nacimiento }}</td>
                            <td>{{ $alumno->telefono }}</td>
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