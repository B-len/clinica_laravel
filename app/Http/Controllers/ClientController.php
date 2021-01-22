<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients=Client::orderBy('id','DESC')->paginate(30);
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $today=Carbon::now();
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'dni'=>'required|min:9|max:9|unique:clients',
            'phone_number'=>'min:9|max:9',
            'birth_date'=>'before:today'
        ]);
        Client::create($request->all());
        return redirect()->route('clients.index')->with('info','Se ha agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }


    public function edit(Client $client)
    {
        return view('admin.clients.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'last_name'=>'required',
            'dni'=>'required|min:9|max:9',
            'phone_number'=>'min:9|max:9',
            'birth_date'=>'before:today',

        ]);
        $client->update($request->all());
        return redirect()->route('clients.index')->with('info','Se ha actualizado correctamente');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('info','Borrado exitosamente');
    }
}
