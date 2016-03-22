@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Alumnos</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Fecha de nacimiento</td>
                    <td>Tel�fono</td>
                    <td>Nombre del tutor</td>
                    <td>Tel�fono de emergencia</td>
                    <td>Facebook</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $key => $alumno)
                        <tr>
                            <td>{{ $alumno->id }}</td>
                            <td>{{ $alumno->persona->nombre }}</td>
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
            <ul>

            </ul>
        </div>
    </div>
@endsection