<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles_id',
        'nombre',
        'cargo',
        'area',
        'cedula',
        'indicativo1',
        'indicativo2',
        'telefono',
        'extension',
        'celular',
        'email',
        'direccion',
        'estados_id',
        'lugar',
        'departamento_id',
        'ciudad_id',
        'imagen',
        'download'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
}
