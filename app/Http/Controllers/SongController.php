<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Mail\NewSong;
use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Laravel\Facades\Image;


class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 

    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $song=Song::findOrFail($id);
        $cliente=$song->client()->get();
        return view('canciones.cancionesShow',compact('song'),compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idSong)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'image' => 'required',
            'mp3' => 'required',
        ]);
        $song=Song::findOrFail($idSong);
        $this->authorize('update',[$song,$request->clienteid]);
        $song->title=$request->title;
        $song->genre=$request->genre;
        Storage::delete('public/'.$song->ubiPortada);
        Storage::delete('public/'.$song->ubiCancion);
        if ($request->file('image')->isValid() && $request->file('mp3')->isValid()) 
        {
            $song->ubiPortada=$request->image->store('','public');
            $song->mimePortada=$request->image->getClientMimeType();
            $song->ubiCancion=$request->mp3->store('','public');
            $song->mimeCancion=$request->mp3->getClientMimeType();
        }
        $song->save();
        return redirect()->route('canciones.show',$song->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$idSong)
    {
        $song=Song::findOrFail($idSong);
        $this->authorize('delete',[$song,$request->clienteid]);
        Storage::delete('public/'.$song->ubiPortada);
        Storage::delete('public/'.$song->ubiCancion);
        $song->delete();
        return back();
    }

    public function vistaGeneral($id)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('opcionesCanciones', $cliente);
        return view('canciones.cancionesGeneral',compact('cliente'));
    }

    public function Registrar($id)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('formCreate', $cliente);
        return view('canciones.cancionesCreate',compact('cliente'));
    }

    public function asignarOwner(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'image' => 'required',
            'mp3' => 'required',
        ]);
        $song=new Song();
        $song->title=$request->title;
        $song->genre=$request->genre;
        if ($request->file('image')->isValid() && $request->file('mp3')->isValid()) 
        {
            $song->ubiPortada=$request->image->store('','public');
            $song->mimePortada=$request->image->getClientMimeType();
            $song->ubiCancion=$request->mp3->store('','public');
            $song->mimeCancion=$request->mp3->getClientMimeType();
        }
        $song->save();
        $cliente=Client::findOrFail($id);
        $cliente->song()->attach($song->id);
        Mail::to($cliente->email)->send(new NewSong($cliente));
        return redirect()->route('canciones.show',$song->id);
    }

    public function MisCanciones($id)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('misCanciones', $cliente);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesIndex',compact('songs'),compact('cliente'));
    }

    public function EditShow($id)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('ver-canciones-edit', $cliente);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesEditShow',compact('songs'),compact('cliente'));
    }

    public function EditSong($id,$id2)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('formEdit', $cliente);
        $song=Song::findOrFail($id2);
        return view('canciones.cancionesEditSong',compact('cliente'),compact('song'));
    }

    public function DeleteShow($id)
    {
        $cliente=Client::findOrFail($id);
        Gate::authorize('ver-canciones-delete', $cliente);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesDeleteShow',compact('songs'),compact('cliente'));
    }
}
