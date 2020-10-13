<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect,Response;
use Illuminate\Support\Facades\Auth;
use App\Audit;
use App\Template;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    protected $guarded = [];

    public function getUsers(){
        return view('admin.usuarios.index');
    }

    public function getDepartamentos()
    {
        $deptos = \DB::table('departamentos')->get();
        $ciudades = \DB::Table('ciudades')->get();
        return view('admin.usuarios.index', compact('deptos', 'ciudades'));
    }

    public function changeState($id, $estado)
    {
        $users = User::find($id);
        $users->update(["estados_id"=>$estado]);
        return redirect('/administrador/usuarios');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'roles_id' => 'required',
            'estados_id' => 'required',
            'cargo' => 'required',
            'area' => 'required',
            'cedula' => ['required','unique:users'],
            'indicativo1' => 'required',
            'indicativo2' => 'required',
            'extension' => 'required',
            'celular' => 'required',
            'email' => ['required','unique:users'],
            'direccion' => 'required',
            'lugar' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required'
        ]);

        $user = new User;
        $user->nombre = $request->get('nombre');
        $user->roles_id = $request->get('roles_id');
        $user->estados_id = $request->get('estados_id');
        $user->cargo = $request->get('cargo');
        $user->area = $request->get('area');
        $user->cedula = $request->get('cedula');
        $user->indicativo1 = $request->get('indicativo1');
        $user->indicativo2 = $request->get('indicativo2');
        $user->extension = $request->get('extension');
        $user->celular = $request->get('celular');
        $user->email = $request->get('email');
        $user->direccion = $request->get('direccion');
        $user->lugar = $request->get('lugar');
        $user->departamento_id = $request->get('departamento_id');
        $user->ciudad_id = $request->get('ciudad_id');
        $create = $user->save();

        $usuario = Auth::user();
        $audits = new Audit;
        $audits->users_id = $usuario->id;
        $audits->audited_id = $user->id;
        $audits->accion = 'created';
        $audits->resumen = 'usuario creado';
        date_default_timezone_set('America/Bogota');
        $audits->fecha = date('Y-m-d H:i:s');
        $registerAudits = $audits->save();
        
        if($request->ajax()){
            return response()->json(array(
                'success' => true,
                'data'   => $user
            ));
        }
    }

    public function show($id)
    {
        $where = array('id' => $id);
		$user = User::where($where)->first();
		return Response::json($user);
    }

    public function edit($id)
    {
        // $where = array('id' => $id);
		// $user = User::where($where)->first();
		// return Response::json($user);
    }

    public function update(Request $request)
    {
        // $user = new User;
        $this->validate($request, [
            'nombre' => 'required',
            'roles_id' => 'required',
            'estados_id' => 'required',
            'cargo' => 'required',
            'area' => 'required',
            'cedula' => ['required','unique:users,cedula,'.$request->get('id')],
            'indicativo1' => 'required',
            'indicativo2' => 'required',
            'extension' => 'required',
            'celular' => 'required',
            'email' => ['required','unique:users,email,'.$request->get('id')],
            'direccion' => 'required',
            'lugar' => 'required',
            'departamento_id' => 'required',
            'ciudad_id' => 'required'
        ]);
        $user = User::find($request->get('id'));
        $user->roles_id = $request->get('roles_id');
        $user->nombre = $request->get('nombre');
        $user->estados_id = $request->get('estados_id');
        $user->cargo = $request->get('cargo');
        $user->area = $request->get('area');
        $user->cedula = $request->get('cedula');
        $user->indicativo1 = $request->get('indicativo1');
        $user->indicativo2 = $request->get('indicativo2');
        $user->extension = $request->get('extension');
        $user->celular = $request->get('celular');
        $user->email = $request->get('email');
        $user->direccion = $request->get('direccion');
        $user->lugar = $request->get('lugar');
        $user->departamento_id = $request->get('departamento_id');
        $user->ciudad_id = $request->get('ciudad_id');
        $update = $user->save();
        
        $usuario = Auth::user();
        $audits = new Audit;
        $audits->users_id = $usuario->id;
        $audits->audited_id = $request->get('id');
        $audits->accion = 'updated';
        $audits->resumen = 'usuario actualizado';
        date_default_timezone_set('America/Bogota');
        $audits->fecha = date('Y-m-d H:i:s');
        $registerAudits = $audits->save();

        if($request->ajax()){
            return response()->json(array(
                'success' => true,
                'data'   => $update
            ));
        }
        
    }

    public function countDownload()
    {
        $usuario = Auth::user()->id;
        $user = User::find($usuario);
        $user->download++;
        $user->save();
        return redirect('/dashboard');
    }

    public function getTemplate()
    {
        $templates = \DB::table('templates')->get();
        return response()->json($templates);
    }

    public function indexTemplate()
    {
        $templates = Template::all();
        return view('admin.template', compact('templates'));
    }


    public function changeTemplates($id)
    {
        $templates = Template::all();
        foreach($templates as $data){
            $data->estado = 0;
            $data->save();
        }        

        $template = Template::find($id);
        if($template->estado == 1){
            $template->estado = 0;
        }else{
            $template->estado = 1;
        }
        if($template->save()){
            return "estado cambiado";
        }

    }

}
