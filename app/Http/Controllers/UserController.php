<?php

namespace App\Http\Controllers;

use App\User;
use App\Departamento;
use App\Ciudad;
use App\Audit;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }


    public function getDepartamentos()
    {
        $deptos = \DB::table('departamentos')->get();
        $ciudades = \DB::Table('ciudades')->get();
        return view('dashboard.dashboard', compact('deptos', 'ciudades'));
    }

    // public function getCiudades2()
    // {
    //     return view('dashboard.dashboard')->with('ciudades', $ciudades);
    // }

    public function getCiudades($departamento)
    {
        $ciudades = \DB::Table('ciudades')
            ->where('departamento_id', $departamento)
            ->orderBy('nombre')
            ->get();

        return $ciudades;
    }

    public function data()
    {
        $id = auth()->user()->id;
        $datas = \DB::Table('users')
            ->select('users.id','users.nombre', 'users.cargo', 'users.area', 'users.indicativo1', 'users.indicativo2', 'users.telefono', 'users.extension', 'users.celular', 'users.direccion', 'users.email', 'users.lugar','ciudades.nombre as ciudad','departamentos.nombre as departamento', 'users.imagen')
            ->join('departamentos', 'departamentos.id', '=', 'users.departamento_id')
            ->join('ciudades', 'ciudades.id', '=', 'users.ciudad_id')
            ->where('users.id', $id)
            ->get();
        foreach($datas as $data){
            return response()->json($data);
        }
    }


    public function perfilUpdate(Request $request){
        $user = auth()->user();
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'imagen' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->passes()){
            $data['imagen'] = $user->imagen;
            if($request->hasFile('imagen') && $request->file('imagen')->isValid()){
                $name = $request->cedula.'-'.kebab_case($request->nombre);
                $extension = $request->imagen->extension();
                $nameFile = "{$name}.{$extension}";
                $path = public_path('storage/users/'.$user->imagen);
                unlink($path);
                $data['imagen'] = $nameFile;
                
                $upload = $request->imagen->storeAs('/users', $nameFile);
                
                if(!$upload){
                    return redirect()->back()->with('error','Error al subir la imagen');
                }
            }
            $update = $user->update($data);

            $usuario = Auth::user();
            $audits = new Audit;
            $audits->users_id = $user->id;
            $audits->audited_id = $user->id;
            $audits->accion = 'updated';
            $audits->resumen = 'datos actualizados';
            date_default_timezone_set('America/Bogota');
            $audits->fecha = date('Y-m-d H:i:s');
            $registerAudits = $audits->save();

            if($update){
                return redirect()
                        ->route('dashboard')
                        ->with('success','Información actualizada con exito!!!');
            }else{    
                return redirect()
                        ->back()
                        ->with('error','Por favor verifica los campos obligatorios');            
            }
        }else{
            
            return redirect()
            ->back()
            ->with('error','Por favor subir archivos de tipo imagen tipo (png, jpeg)');    
        }
        

        // dd($request->all());
    }
    // public function verify($numIdentificacion){
    //         $usuario = \DB::Table('users')
    //             ->where('cedula', $user->num_identificacion)
    //             ->first();

    //     if(isset($usuario) && is_object($usuario)){

    //         $data = [
    //             "status" => "error",
    //             "code" => 403
    //         ];

    //     } else {

    //         $data = [
    //             "information" => $asistencia,
    //             "status" => "success",
    //             "code" => 200
    //         ];
    //     }

    //     return response()->json($data, $data['code']);
    // }
}