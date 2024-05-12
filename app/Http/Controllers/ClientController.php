<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Database\Factories\ClientFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

use function Laravel\Prompts\select;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.clienteCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|max:255',
            'email'=>'required|max:255',
            'twitter'=>'max:255',
            'facebook'=>'max:255',
            'instagram'=>'max:255',
            'image'=>'required',
            'descrip'=>'required|min:10'
        ]);
        // Guardar informacion
        $client=new Client();
        if ($request->file('image')->isValid()) 
        {
            $client->ubiFoto=$request->image->store('','public');
            $client->mimeFoto=$request->image->getClientMimeType();
        }
        $client->user_id=Auth::id();
        $client->username=$request->username;
        $client->email=$request->email;
        $client->twitter=$request->twitter;
        $client->facebook=$request->facebook;
        $client->instagram=$request->instagram;
        $client->descrip=$request->descrip;
        $client->save();
        //Redireccion
        return $this->crearCanciones();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client=Client::findOrFail($id); // Una sola consulta
        $songs=$client->song()->orderBy('created_at','desc')->take(2)->get(); // Necesito realmente toda la informacion de la consulta...
        return view('cliente.clienteShow',compact('client'),compact('songs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client=Client::findOrFail($id); // Una sola consulta
        $this->authorize('update',$client);
        return view('cliente.clienteEdit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username'=>'required|max:255',
            'email'=>'required|max:255',
            'twitter'=>'max:255',
            'facebook'=>'max:255',
            'image'=>'required',
            'instagram'=>'max:255',
            'descrip'=>'required|min:10'
        ]);
        // Guardar informacion
        $client=Client::findOrFail($id); // Una sola consulta
        $this->authorize('update',$client);
        Storage::delete('public/'.$client->ubiFoto);
        if ($request->file('image')->isValid()) 
        {
            $client->ubiFoto=$request->image->store('','public');
            $client->mimeFoto=$request->image->getClientMimeType();
        }
        $client->user_id=Auth::id(); 
        $client->username=$request->username;
        $client->email=$request->email;
        $client->twitter=$request->twitter;
        $client->facebook=$request->facebook;
        $client->instagram=$request->instagram;
        $client->descrip=$request->descrip;
        $client->save();
        //Redireccion
        return $this->crearCanciones();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id); // Una sola consulta
        $this->authorize('delete',$client);
        Storage::delete('public/'.$client->ubiFoto);
        $client->delete();
        return $this->crearCanciones();
    }

    public function crearCanciones()
    {
        $clients=Auth::user()->clients; // No es consulta como tal si ya se ha cargado
        foreach ($clients as $client)
            $this->authorize('vista',$client); 
        return view('cliente.clienteSeleccion',compact('clients'));
    }

    public function AllProfiles()
    {
        $clients=Auth::user()->clients; // No es consulta como tal si ya se ha cargado
        foreach ($clients as $client)
            $this->authorize('AllProfile',$client);
        return view('generales.AllProfiles',compact('clients'));
    }
}
