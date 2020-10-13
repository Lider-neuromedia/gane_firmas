<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Audit;

class EstadisticaConstroller extends Controller
{
    protected $guarded = [];

    public function index()
    {
        $count = User::all()->count();
        $masters = User::where('roles_id', '=', 1)->count();
        $admins = User::where('roles_id', '=', 2)->count();
        $colaboradores = User::where('roles_id', '=', 3)->count();
        $bloqueados = User::where('estados_id', '=', 0)->count();
        $download_total = User::sum('download');
        // SELECT count(accion) FROM audits where accion = 'login' AND users_id = 140

        return view('admin.estadisticas', compact('count', 'masters', 'admins', 'colaboradores', 'bloqueados', 'download_total'));
    }

    public function auditoria()
    {
        return view('admin.auditoria');
    }
}
