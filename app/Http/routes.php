<?php

use App\Alumno;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('alumnos', 'AlumnoController');
    Route::get('grupos/asignar/{id}', 'GrupoController@asignar');
    Route::get('grupos/random/{id}', 'GrupoController@random');
    Route::get('grupos/alfa/{id}', 'GrupoController@alfa');
    Route::get('grupos/ecxel/{id}', 'GrupoController@ecxel');
    Route::resource('grupos', 'GrupoController');

    Route::get('file/{file}', ['as' => 'document', function ($file) {
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        return response()->download($storagePath.$file);//
    }]);
});
