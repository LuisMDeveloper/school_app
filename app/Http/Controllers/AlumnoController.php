<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        //return $request->all();
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


        //$fileInput = 'certificado_secundaria';
        //if ($request->hasFile($fileInput)) {
        //    $file = $request->file($fileInput);
        //    $extension = $file->getClientOriginalExtension();
        //    $filename = snake_case($person->apellidos) .'_'. snake_case($person->nombre) . '_certificado_secundaria';
        //    Storage::disk('public')->put($filename.'.'.$extension, File::get($file));
        //    $alumno->certificado_secundaria = $filename.'.'.$extension;
        //
        //    //Get File
        //    //$storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        //    //return response()->download($storagePath.$alumno->certificado_secundaria);
        //}


        $alumno->certificado_secundaria = $this->uploadFileForAlumno($request, 'certificado_secundaria', $person);
        $alumno->acta_de_nacimiento_path = $this->uploadFileForAlumno($request, 'acta_de_nacimiento_path', $person);
        $alumno->curp = $this->uploadFileForAlumno($request, 'curp', $person);
        $alumno->comprobande_de_domicilio = $this->uploadFileForAlumno($request, 'comprobande_de_domicilio', $person);
        $alumno->certificado_parcial = $this->uploadFileForAlumno($request, 'certificado_parcial', $person);

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

    /**
     * @param Requests\CreateAlumno $request
     * @param $fileInput
     * @param $person
     * @param $alumno
     */
    public function uploadFileForAlumno(Requests\CreateAlumno $request, $fileInput, $person)
    {
        if ($request->hasFile($fileInput)) {
            $file = $request->file($fileInput);
            $extension = $file->getClientOriginalExtension();
            $filename = snake_case($person->apellidos) . '_' . snake_case($person->nombre) . '_' . $fileInput;
            Storage::disk('public')->put($filename . '.' . $extension, File::get($file));
            return $filename . '.' . $extension;
        } else {
            return '';
        }
    }
}
