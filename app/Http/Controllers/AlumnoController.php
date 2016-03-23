<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Alumno;
use App\Persona;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('alumnos.index')->with('alumnos', $alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreateAlumno $request)
    {
        $person = new Persona();
        $person->nombre =  $request->input('nombre');
        $person->apellidos =  $request->input('apellidos');
        $person->direccion =  $request->input('direccion');
        $person->genero =  $request->input('genero');
        $person->fecha_nacimiento =  $request->input('fecha_nacimiento');
        $person->telefono =  $request->input('telefono');
        $person->save();

        $alumno = new Alumno();
        $alumno->persona_id =  $person->id;
        $alumno->como_nos_conociste =  $request->input('como_nos_conociste');
        $alumno->nombre_del_tutor =  $request->input('nombre_del_tutor');
        $alumno->num_emergencia =  $request->input('num_emergencia');
        $alumno->facebook =  $request->input('facebook');
        $alumno->save();

        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('alumnos.show')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
