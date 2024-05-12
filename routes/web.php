<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongController;
use App\Models\Playlist;
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
    return view('generales.index');
});

Route::get('/AllProfiles/{cliente}',[ClientController::class,'AllProfiles'])->name('generales.AllProfiles');

Route::resource('cliente',ClientController::class);

Route::resource('playlist',PlaylistController::class);

Route::resource('canciones',SongController::class);

Route::get('/playlist/{cliente}/misplaylists',[PlaylistController::class,'misPlaylists'])->name('playlist.misPlaylists');

Route::get('/cliente/{cliente}/seleccion-cuenta',[ClientController::class,'crearCanciones'])->name('cliente.seleccion-cuenta');    

Route::get('/canciones/{cancion}/vista-general',[SongController::class,'vistaGeneral'])->name('canciones.vista-general');

Route::get('/canciones/{cancion}/Registrar',[SongController::class,'Registrar'])->name('canciones.registrar');

Route::get('/canciones/{cancion}/MisCanciones',[SongController::class,'MisCanciones'])->name('canciones.MisCanciones');

Route::get('/canciones/{cancion}/MisCancionesEdit',[SongController::class,'EditShow'])->name('canciones.EditShow');

Route::get('/canciones/{cancion}/MisCancionesDelete',[SongController::class,'DeleteShow'])->name('canciones.DeleteShow');

Route::get('/canciones/{cliente}/{cancion}/Edit',[SongController::class,'EditSong'])->name('canciones.EditSong');

Route::post('/cliente/{cliente}/relacion', [SongController::class, 'asignarOwner'])->name('song.relacion.client.song');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
