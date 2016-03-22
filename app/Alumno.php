<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * Get the person associated with the student.
     */
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
}
