@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $alumno->persona->nombre }} {{ $alumno->persona->apellidos }}</div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $alumno->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $alumno->persona->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Apellidos:</td> <td>{{ $alumno->persona->apellidos }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Direccion:</td> <td>{{ $alumno->persona->direccion }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Genero:</td> <td>{{ $alumno->persona->genero }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Fecha de nacimiento:</td> <td>{{ $alumno->persona->fecha_nacimiento }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Telefono:</td> <td>{{ $alumno->persona->telefono }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">¿Como nos conociste?:</td> <td>{{ $alumno->como_nos_conociste }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre del tutor:</td> <td>{{ $alumno->nombre_del_tutor }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Numero de emergencia:</td> <td>{{ $alumno->num_emergencia }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Facebook:</td> <td>{{ $alumno->facebook }}</td>
                </tr>

            </table>

        </div>
    </div>

@endsection