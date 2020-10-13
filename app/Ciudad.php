<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = ['nombre'];

    public static function ciudades($id)
    {
        return Ciudad::where('departamento_id','=',$id)->get();
    }
}

