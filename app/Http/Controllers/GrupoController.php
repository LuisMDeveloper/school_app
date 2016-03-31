<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Grupo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();

        return view('grupos.index')->with('grupos', $grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::find($id);

        return view('grupos.show')->with('grupo', $grupo);
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
     * Pantalla de asignasion de alumnos
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar($id)
    {
        $grupo = Grupo::find($id);

        return view('grupos.asignar')->with('grupo', $grupo);
    }

    /**
     * Asignasion de alumnos aleatoria
     *
     * @return \Illuminate\Http\Response
     */
    public function random($id)
    {
        $alumnos = Alumno::all()->where('grupo_id', 0);
        $grupo = Grupo::find($id);

        $limite = $grupo->limite;

        $shuffled = $alumnos->shuffle();


        foreach($shuffled as $key => $alumno) {
            if($limite > 0) {
                $alumno->grupo_id = $grupo->id;
                $alumno->save();
            }
            $limite--;
        }
        $grupo->limite = $limite;
        $grupo->save();


        return redirect('grupos');
    }

    /**
     * Asignasion de alumnos alfabetica
     *
     * @return \Illuminate\Http\Response
     */
    public function alfa($id)
    {

        //return view('grupos.asignar')->with('grupo', $grupo);
    }

    /**
     * Export to Exel
     *
     * @return \Illuminate\Http\Response
     */
    public function ecxel($id)
    {
        $grupo = Grupo::find($id);
        Excel::create('Lista '.$grupo->nombre, function($excel) use ($grupo) {

            $excel->setTitle('Lista de asistencia '.$grupo->nombre);

            $excel->sheet('Lista', function($sheet) use ($grupo) {
                $sheet->fromArray($grupo->alumnos);
            });

        })->download('xls');
    }
}
