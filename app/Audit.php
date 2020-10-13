<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Audit extends Model
{

    protected $table = "audits";

    protected $fillable = [
        'users_id',        
        'accion',
        'resumen',
        'download',
        'fecha',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
