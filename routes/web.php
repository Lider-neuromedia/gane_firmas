<?php

use App\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Utilidades
// Route::get('departamentos', 'UtilitiesController@departamentos');
// Route::get('user/verify/{id}', 'UserController@verify');
// Route::resource('user', 'UserController', ['except' => ['show']]);


// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });

Auth::routes();
  // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');


// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('dashboard', function () {
// 	return view('dashboard.dashboard');
// })->middleware('auth');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'administrador'], function () {
	Route::get('estadisticas', 'EstadisticaConstroller@index')->name('estadisticas');
	Route::get('auditoria', 'EstadisticaConstroller@auditoria')->name('auditoria');

	Route::get('usuarios', 'AdminController@getUsers')->name('usuarios');
	Route::post('usuario','AdminController@store')->name('admin.store');
	Route::get('usuario/{id}/editar/','AdminController@edit');
	Route::get('usuario/{id}','AdminController@show');
	Route::post('update-usuario', 'AdminController@update')->name('update.usuario')->middleware('auth');
	Route::get('usuarios/{id}/{estado}', 'AdminController@changeState')->middleware('auth');
	Route::get('usuarios', 'AdminController@getDepartamentos')->name('usuarios')->middleware('auth');
	Route::get('ciudades/{id}', 'AdminController@getCiudades')->middleware('auth');
	Route::get('template', 'Admincontroller@indexTemplate')->name('template');
	Route::get('changeTemplates/{id}', 'AdminController@changeTemplates')->name('admin.template')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('descargar', 'Admincontroller@countDownload')->name('countDownload');
	
	Route::get('getTemplate', 'Admincontroller@getTemplate')->middleware('auth');
	Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
	Route::get('dashboard', 'UserController@getDepartamentos')->name('dashboard')->middleware('auth');
	// Route::get('dashboard', 'UserController@getCiudades2')->name('dashboard')->middleware('auth');
	Route::get('ciudades/{id}', 'UserController@getCiudades')->middleware('auth');;
	Route::post('update-perfil', 'UserController@perfilUpdate')->name('perfil.update')->middleware('auth');
	Route::get('data', 'UserController@data');
});

Route::get('/clear-cache', function () {
	$exitCode = Artisan::call('config:clear');
	$exitCode = Artisan::call('cache:clear');
	$exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('view:clear');
	$exitCode = Artisan::call('route:clear');
	return 'DONE';
});
Route::get('/foo', function () {
    Artisan::call('storage:link');
    return "link ok";
});
Route::get('/php', function () {
    phpinfo();
});
