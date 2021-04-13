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
    return view('home');
});

Route::resource("contatos", "App\Http\Controllers\ContatoController");

Route::get('apagarfoto/{id}', 'App\Http\Controllers\ContatoController@deleteimage');

Route::get('tabuada', 'App\Http\Controllers\Tabuada2Controller@tabuada')->name('tabuada');

Route::get('piramide', 'App\Http\Controllers\PiramideController@piramide')->name('piramide');

Route::get('notas', 'App\Http\Controllers\NotasController@analisenota')->name('notas');

Route::get('numeros', 'App\Http\Controllers\NumerosController@numeroscont')->name('numeros');
