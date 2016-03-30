<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * Get the grupo of this alumno.
     */
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }
}
