<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * Get the student associated with the person.
     */
    public function alumno()
    {
        return $this->hasOne('App\Alumno');
    }
}
