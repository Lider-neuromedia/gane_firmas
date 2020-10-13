<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', function(){
    $users = \App\User::query()
            ->select('users.id','users.roles_id','roles.name as roles','users.cedula','users.nombre', 'users.cargo', 'users.area', 'users.indicativo1', 'users.indicativo2', 'users.telefono', 'users.extension', 'users.celular', 'users.direccion', 'users.email', 'ciudades.nombre as ciudad','ciudades.id as ciudades_id','departamentos.nombre as departamento', 'departamentos.id as departamento_id','users.lugar','estados.id as estados_id','estados.name as estados','users.imagen','users.download')
            ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
            ->join('ciudades', 'ciudades.id', '=', 'users.ciudad_id')
            ->join('estados', 'estados.id', '=', 'users.estados_id')
            ->join('roles', 'roles.id', '=', 'users.roles_id');
            // ->get();
    return datatables()
        ->eloquent($users)
        ->addColumn('btn', 'admin.partials.actions')
        ->addColumn('state', function($user){
            $btnEstado = '';
            if($user->estados_id == 1){
                $btnEstado = '<a href="/administrador/usuarios/'.$user->id.'/0" class="btn btn-xs w-100 btn-success"><i class="fas fa-check pr-1"></i>'.$user->estados.'</a>';
            }else if($user->estados_id == 0){
                $btnEstado = '<a href="/administrador/usuarios/'.$user->id.'/1" class="btn btn-xs w-100 btn-danger"><i class="fas fa-times pr-1"></i>'.$user->estados.'</a>';
            }
            return $btnEstado;
        })
        ->addColumn('roles', function ($user) {
            return '<span" class="btn btn-xs w-100 btn-blue text-white btn-unlink"><i class="fas fa-user-tag pr-1"></i>'.$user->roles.'</span>';
        })
        ->rawColumns(['btn', 'state', 'roles'])
        ->toJson();
});

Route::get('usersMetric', function(){
    $users = \App\User::query()
            ->select('users.id','users.roles_id','roles.name as roles','users.cedula','users.nombre', 'users.cargo', 'users.area', 'users.indicativo1', 'users.indicativo2', 'users.telefono', 'users.extension', 'users.celular', 'users.direccion', 'users.email', 'ciudades.nombre as ciudad','ciudades.id as ciudades_id','departamentos.nombre as departamento', 'departamentos.id as departamento_id','users.lugar','estados.id as estados_id','estados.name as estados','users.imagen','users.download')
            ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
            ->join('ciudades', 'ciudades.id', '=', 'users.ciudad_id')
            ->join('estados', 'estados.id', '=', 'users.estados_id')
            ->join('roles', 'roles.id', '=', 'users.roles_id');
            // ->get();

    return datatables()
        ->eloquent($users)
        ->addColumn('download', function ($user) {
            // return '<span" class="btn btn-xs w-100 btn-blue text-white btn-unlink"><i class="fas fa-user-tag pr-1"></i>'.$user->download.'</span>'
            if($user->download == '' || $user->download == null)
                return '<small class="badge badge-warning pt-2 pb-2 pl-3 pr-3"><i class="fas fa-exclamation-circle"></i> Sin registro</small>';
            else
                return '<small class="badge badge-success pt-2 pb-2 pl-3 pr-3"><i class="fas fa-cloud-download-alt"></i> '.$user->download.' descargas</small>';    
        })
        ->rawColumns(['download'])
        ->toJson();
});

Route::get('auditsInicio', function(){

    $users = \App\User::query()
            ->select('users.nombre', DB::raw('count(audits.accion) as accion'), 'audits.users_id', 'users.download')
            ->join('audits', 'users.id', '=', 'audits.users_id')
            ->where('audits.accion','=' , "login")
            ->groupBy('users.nombre', 'audits.accion', 'audits.users_id', 'users.download');

    return datatables()
        ->eloquent($users)
        ->addColumn('acciones', function ($user) {
            // return '<span" class="btn btn-xs w-100 btn-blue text-white btn-unlink"><i class="fas fa-user-tag pr-1"></i>'.$user->download.'</span>'
            if($user->accion == '' || $user->accion == null)
                return '<small class="badge badge-warning pt-2 pb-2 pl-3 pr-3"><i class="fas fa-sign-in-alt"></i> Sin registro</small>';
            else
                return '<small class="badge badge-success pt-2 pb-2 pl-3 pr-3"><i class="fas fa-sign-in-alt"></i> '.$user->accion.' en total</small>';    
        })
        ->rawColumns(['acciones'])
        ->toJson();
});

Route::get('auditsCerrada', function(){

    $users = \App\User::query()
            ->select('users.nombre', DB::raw('count(audits.accion) as accion'), 'audits.users_id', 'users.download')
            ->join('audits', 'users.id', '=', 'audits.users_id')
            ->where('audits.accion','=' , "logout")
            ->groupBy('users.nombre', 'audits.accion', 'audits.users_id', 'users.download');

    return datatables()
        ->eloquent($users)
        ->addColumn('acciones', function ($user) {
            // return '<span" class="btn btn-xs w-100 btn-blue text-white btn-unlink"><i class="fas fa-user-tag pr-1"></i>'.$user->download.'</span>'
            if($user->accion == '' || $user->accion == null)
                return '<small class="badge badge-warning pt-2 pb-2 pl-3 pr-3"><i class="fas fa-sign-out-alt"></i> Sin registro</small>';
            else
                return '<small class="badge badge-success pt-2 pb-2 pl-3 pr-3"><i class="fas fa-sign-out-alt"></i> '.$user->accion.' en total</small>';    
        })
        ->rawColumns(['acciones'])
        ->toJson();
});

Route::get('auditsActualizada', function(){

    $users = \App\User::query()
            ->select('users.nombre', DB::raw('count(audits.accion) as accion'), 'audits.users_id', 'users.download')
            ->join('audits', 'users.id', '=', 'audits.users_id')
            ->where('audits.accion','=' , "updated")
            ->groupBy('users.nombre', 'audits.accion', 'audits.users_id', 'users.download');

    return datatables()
        ->eloquent($users)
        ->addColumn('acciones', function ($user) {
            // return '<span" class="btn btn-xs w-100 btn-blue text-white btn-unlink"><i class="fas fa-user-tag pr-1"></i>'.$user->download.'</span>'
            if($user->accion == '' || $user->accion == null)
                return '<small class="badge badge-warning pt-2 pb-2 pl-3 pr-3"><i class="fas fa-edit"></i> Sin registro</small>';
            else
                return '<small class="badge badge-success pt-2 pb-2 pl-3 pr-3"><i class="fas fa-edit"></i> '.$user->accion.' en total</small>';    
        })
        ->rawColumns(['acciones'])
        ->toJson();
});

Route::get('audits', function(){

    $users = \App\Audit::query()
            ->select('audits.id','admins.nombre as nombre', 'colabs.nombre as nombre_auditado', 'audits.accion' ,'audits.resumen', 'audits.fecha')
            ->join('users as admins', 'admins.id', '=', 'audits.users_id')
            ->leftJoin('users as colabs', 'colabs.id', '=', 'audits.audited_id');
    return datatables()
    ->eloquent($users)
    ->toJson();
});
