<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AtribuidoController;

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

Route::middleware('auth')->group(function(){
    Route::view('/', 'home')->name('home');
    Route::resource('chamados', ChamadoController::class);
    Route::get('/solicitante', [SolicitanteController::class, 'buscar']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/atribuido', [AtribuidoController::class, 'buscar']);
});

Route::view('/login', 'login')->name('login');
Route::post('/login/validar', [LoginController::class, 'validar'])->name('login.validar');



