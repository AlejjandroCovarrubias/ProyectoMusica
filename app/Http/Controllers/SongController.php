<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
 

    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones.cancionesCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect()->route('canciones.show',$song->id);
        
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
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }

    public function vistaGeneral($id)
    {
        $cliente=Client::findOrFail($id);
        return view('canciones.cancionesGeneral',compact('cliente'));
    }
}
