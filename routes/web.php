<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cliente',ClientController::class);

Route::resource('canciones',SongController::class);

Route::get('/cliente/{cliente}/seleccion-cuenta',[ClientController::class,'crearCanciones'])->name('cliente.seleccion-cuenta');    

Route::get('/canciones/{cliente}/vista-general',[SongController::class,'vistaGeneral'])->name('canciones.vista-general');
//Route::post('/cliente/{cliente}/seleccion-cuenta',[ClientController::class,'crearCanciones'])->name('cliete.seleccion-cuenta');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
