<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $playlist=Playlist::select('id','title')->get(); // Solo necesitamos el id y el titulo
        return view('playlist.playlistGeneral',compact('playlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlist.playlistCreate')
            ->with('songs',Song::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'descrip'=>'required',
            'selected_songs'=>'required',
        ]);
        $playlist=new Playlist();
        $playlist->user_id=Auth::id();
        $playlist->title=$request->title;
        $playlist->descrip=$request->descrip;
        $playlist->save();
        $playlist->song()->attach($request->selected_songs);
        return redirect()->route('playlist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playlist=Playlist::findOrFail($id);
        return view('playlist.verPlaylist',compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $playlist=Playlist::findOrFail($id);
        $songs=Song::select('id','title','genre','ubiPortada','ubiCancion')->get();
        return view('playlist.editPlaylist',compact('playlist'),compact('songs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'descrip'=>'required',
            'selected_songs'=>'required',
        ]);
        $playlist=Playlist::findOrFail($id);
        $this->authorize('update',$playlist);
        $playlist->user_id=Auth::id();
        $playlist->title=$request->title;
        $playlist->descrip=$request->descrip;
        $playlist->save();
        $playlist->song()->sync($request->selected_songs);
        return redirect()->route('playlist.misPlaylists',Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $playlist=Playlist::findOrFail($id);
        $this->authorize('delete',$playlist);
        $playlist->delete();
        return redirect()->route('playlist.index');
    }

    public function misPlaylists($sesion)
    {
        $cliente=User::findOrFail($sesion);
        $playlist=$cliente->playlists; // Realmente necesito todos los atributos, que es solo el title y la descripcion
        if ($playlist->isEmpty()) {
            abort(403, 'No tienes playlists para ver.');
        }
        foreach ($playlist as $playlistVer)
            $this->authorize('verVista',$playlistVer); 
        return view('playlist.misPlaylists',compact('playlist'));
    }
}
