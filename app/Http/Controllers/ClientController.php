<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::all();
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
            'descrip'=>'required|min:10'
        ]);
        // Guardar informacion
        $client=new Client();
        $client->username=$request->username;
        $client->email=$request->email;
        $client->password=$request->password;
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
            'descrip'=>'required|min:10'
        ]);
        $client=Client::findOrFail($id);
        // Guardar informacion
        $client->username=$request->username;
        $client->email=$request->email;
        $client->password=$request->password;
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
