<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('welcome');
})->middleware('auth');

Route::get('/admin/contactos', 'ContactoController@index')->name('contactos')->middleware('auth');
Route::get('/admin/contactos/create', 'ContactoController@create')->name('contactos.create')->middleware('auth');
Route::get('/admin/contactos/show/{contacto}', 'ContactoController@show')->name('contactos.show')->middleware('auth');
Route::get('/admin/contactos/edit/{contacto}', 'ContactoController@edit')->name('contactos.edit')->middleware('auth');
Route::get('/admin/contactos/destroy/{contacto}', 'ContactoController@destroy')->name('contactos.destroy')->middleware('auth');

Route::post('grabarRegistro', 'ContactoController@store')->middleware('auth');
Route::put('/admin/contactos/update/{contacto}', 'ContactoController@update')->name('contactos.update')->middleware('auth');



Route::get('/admin/conexiones/create/{contacto}', 'ConexionController@create')->name('conexiones.create')->middleware('auth');
Route::get('/admin/conexiones/destroy/{conexione}', 'ConexionController@destroy')->name('conexiones.destroy')->middleware('auth');

Route::get('/admin/conexiones/edit/{conexion}', 'ConexionController@edit')->name('conexiones.edit')->middleware('auth');
Route::put('/admin/conexiones/update/{conexion}', 'ConexionController@update')->name('conexiones.update')->middleware('auth');

Route::post('grabarRegistroConexion', 'ConexionController@store')->middleware('auth');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::get('/auth/register', function () {
//    return view('auth.register');
//});
