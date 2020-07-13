<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('empleados', function (){
    return view('empleados.index');
});
*/

//Si se van a activar todas las rutas, usar resources
//Route::get('empleados', 'EmpleadosController@index');
//Route::get('empleados/create', 'EmpleadosController@create');
Route::resource('empleados','EmpleadosController')->middleware('auth'); //Solo Ingresa a la app(EmpleadosController) si se ha identificado

Auth::routes(['register'=>false,'reset'=>false,'empleados'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'EmpleadosController@index')->name('home'); //Despues de login redirecciona a la carpeta empleados

