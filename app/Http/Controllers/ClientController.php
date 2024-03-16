<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
        $clients=Auth::user()->clients;
        return view('cliente/clienteIndex',compact('clients'));
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
            'password'=>'required|max:255',
            'twitter'=>'max:255',
            'facebook'=>'max:255',
            'instagram'=>'max:255',
            'descrip'=>'required|min:10'
        ]);
        // Guardar informacion
        $client=new Client();
        $client->user_id=Auth::id();
        $client->username=$request->username;
        $client->email=$request->email;
        $client->password=$request->password;
        $client->twitter=$request->twitter;
        $client->facebook=$request->facebook;
        $client->instagram=$request->instagram;
        $client->descrip=$request->descrip;
        $client->save();
        //Redireccion
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client=Client::findOrFail($id);
        return view('cliente.clienteShow',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client=Client::findOrFail($id);
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
            'password'=>'required|max:255',
            'twitter'=>'max:255',
            'facebook'=>'max:255',
            'instagram'=>'max:255',
            'descrip'=>'required|min:10'
        ]);
        // Guardar informacion
        $client=Client::findOrFail($id);
        $client->user_id=Auth::id();
        $client->username=$request->username;
        $client->email=$request->email;
        $client->password=$request->password;
        $client->twitter=$request->twitter;
        $client->facebook=$request->facebook;
        $client->instagram=$request->instagram;
        $client->descrip=$request->descrip;
        $client->save();
        //Redireccion
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client=Client::findOrFail($id);
        $client->delete();
        return redirect()->route('cliente.index');
    }
}
