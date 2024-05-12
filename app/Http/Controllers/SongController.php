<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use App\Mail\NewSong;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        $song=Song::findOrFail($id); // Es una sola consulta
        $cliente=$song->client()->select('username')->get(); // Mejoramos la consulta obteniedno solo el username
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
        $song=Song::findOrFail($idSong); // Es una sola consulta
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
        $song=Song::findOrFail($idSong); // Es una sola 
        $this->authorize('delete',[$song,$request->clienteid]);
        Storage::delete('public/'.$song->ubiPortada);
        Storage::delete('public/'.$song->ubiCancion);
        $song->delete();
        return back();
    }

    public function vistaGeneral($id)
    {
        $cliente=Client::findOrFail($id);  // Es una sola consulta
        Gate::authorize('opcionesCanciones', $cliente);
        return view('canciones.cancionesGeneral',compact('cliente'));
    }

    public function Registrar($id)
    {
        $cliente=Client::findOrFail($id); // Es una sola consulta
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
        
        if(!empty($request->artista_dos))
            {
                $segundo_artista=Client::where('username',$request->artista_dos)->first(); // Necesito de forma obligada consultar en toda la tabla para encontrar al usuario, pero utilizamos where para eagerloading
                if($segundo_artista === null)
                {
                    Storage::delete('public/'.$song->ubiPortada);
                    Storage::delete('public/'.$song->ubiCancion);   
                    return redirect()->back()->withErrors('No existe el segundo artista...');
                }
            }
        $song->save();
        $cliente=Client::findOrFail($id); // Una sola consulta
        if(!empty($segundo_artista))
            {
                $segundo_artista->song()->attach($song->id);
                Mail::to($segundo_artista->email)->send(new NewSong($segundo_artista));
            }
        $cliente->song()->attach($song->id); // Primer Artista
        Mail::to($cliente->email)->send(new NewSong($cliente)); 
        return redirect()->route('canciones.show',$song->id);
    }

    public function MisCanciones($id)
    {
        $cliente=Client::findOrFail($id); // Una sola consulta
        Gate::authorize('misCanciones', $cliente);
        $songs=$cliente->song; // Realmente necesito todos los atributos de esta consulta
        return view('canciones.cancionesIndex',compact('songs'),compact('cliente'));
    }

    public function EditShow($id)
    {
        $cliente=Client::with('song')->findOrFail($id); // Una sola consulta
        Gate::authorize('ver-canciones-edit', $cliente);
        return view('canciones.cancionesEditShow',compact('cliente'));
    }

    public function EditSong($id,$id2)
    {
        $cliente=Client::findOrFail($id); // Una sola consulta
        Gate::authorize('formEdit', $cliente);
        $song=Song::findOrFail($id2); // Una sola consulta
        return view('canciones.cancionesEditSong',compact('cliente'),compact('song'));
    }

    public function DeleteShow($id)
    {
        $cliente=Client::with('song')->findOrFail($id); // Una sola consulta
        Gate::authorize('ver-canciones-delete', $cliente);
        return view('canciones.cancionesDeleteShow',compact('cliente'));
    }
}
