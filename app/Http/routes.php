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

    //Route::get('file/{file}', function ($file) {
    //    $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
    //    return response()->download($storagePath.$file);
    //    //return view('welcome');
    //});

    Route::get('file/{file}', ['as' => 'document', function ($file) {
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        return response()->download($storagePath.$file);//
    }]);
});
