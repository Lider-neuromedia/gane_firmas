<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Audit;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $usuario = User::where('cedula', '=', $request->cedula)->first(); 
        
        $this->validate($request, [
            'cedula'           => 'required|min:6|max:10',
        ]);
        if(isset($usuario)){
            if($usuario->roles_id == 3 && $usuario->estados_id == 1){
                $audits = new Audit;
                $audits->users_id = $usuario->id;
                $audits->accion = 'login';
                $audits->resumen = 'autenticado en el sistema';
                date_default_timezone_set('America/Bogota');
                $audits->fecha = date('Y-m-d H:i:s');
                $registerAudits = $audits->save();
                Auth::login($usuario);
                return redirect('dashboard');
            }elseif(($usuario->roles_id == 1 || $usuario->roles_id == 2) && $usuario->estados_id == 1){
                $audits = new Audit;
                $audits->users_id = $usuario->id;
                $audits->audited_id = null;
                $audits->accion = 'login';
                $audits->resumen = 'autenticado en el sistema';
                date_default_timezone_set('America/Bogota');
                $audits->fecha = date('Y-m-d H:i:s');
                $registerAudits = $audits->save();
                Auth::login($usuario);
                return redirect('administrador/estadisticas');
            }else{
                return redirect()->back()->withErrors(['active' => 'No te encuentras activado']);
            }
        } else{
            return redirect()->back()->withErrors(['cedula' => 'No te encuentras registrado']);
        }
    }

    public function logout()
    {
        $usuario = Auth::user();
        $audits = new Audit;
        $audits->users_id = $usuario->id;
        $audits->audited_id = null;
        $audits->accion = 'logout';
        $audits->resumen = 'cerrando sesión del sistema';
        date_default_timezone_set('America/Bogota');
        $audits->fecha = date('Y-m-d H:i:s');
        $registerAudits = $audits->save();
        Auth::logout();
        return redirect('/');
    }
}
