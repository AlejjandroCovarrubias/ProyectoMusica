<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
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
        return view('canciones.cancionesShow',compact('song'));
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
    public function update(Request $request, $id)
    {
        $song=Song::findOrFail($id);
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
    public function destroy($idSong)
    {
        $song=Song::findOrFail($idSong);
        $cliente=$song->client()->get();
        dd($cliente);
        Storage::delete('public/'.$song->ubiPortada);
        Storage::delete('public/'.$song->ubiCancion);
        $song->delete();
    }

    public function vistaGeneral($id)
    {
        $cliente=Client::findOrFail($id);
        return view('canciones.cancionesGeneral',compact('cliente'));
    }

    public function Registrar($id)
    {
        $cliente=Client::findOrFail($id);
        return view('canciones.cancionesCreate',compact('cliente'));
    }

    public function asignarOwner(Request $request, $id)
    {
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
        return redirect()->route('canciones.show',$song->id);
    }

    public function MisCanciones($id)
    {
        $cliente=Client::findOrFail($id);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesIndex',compact('songs'));
    }

    public function EditShow($id)
    {
        $cliente=Client::findOrFail($id);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesEditShow',compact('songs'),compact('cliente'));
    }

    public function EditSong($id,$id2)
    {
        $cliente=Client::findOrFail($id);
        $song=Song::findOrFail($id2);
        return view('canciones.cancionesEditSong',compact('cliente'),compact('song'));
    }

    public function DeleteShow($id)
    {
        $cliente=Client::findOrFail($id);
        $songs=$cliente->song()->get();
        return view('canciones.cancionesDeleteShow',compact('songs'),compact('cliente'));
    }
}
