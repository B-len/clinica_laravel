<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->user_type==1) {
            $clients = Client::orderBy('id', 'DESC')->paginate(30);
            return view('admin.clients.index', compact('clients'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        if (Auth::user()->user_type==1) {
            return view('admin.clients.create');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type==1) {
            $today = Carbon::now();
            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'dni' => 'required|min:9|max:9|unique:clients',
                'phone_number' => 'min:9|max:9',
                'birth_date' => 'before:today'
            ]);
            Client::create($request->all());
            return redirect()->route('clients.index')->with('info', 'Se ha agregado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function show(Client $client)
    {
        if (Auth::user()->user_type==1) {
            $sessions = DB::table('medical_sessions')->where('client_id', $client->id)->get();
            return view('admin.clients.show', compact('sessions', 'client'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }


    public function edit(Client $client)
    {
        if (Auth::user()->user_type==1) {
            return view('admin.clients.edit', compact('client'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function update(Request $request, Client $client)
    {
        if (Auth::user()->user_type==1) {
            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'dni' => 'required|min:9|max:9',
                'phone_number' => 'min:9|max:9',
                'birth_date' => 'before:today',

            ]);
            $client->update($request->all());
            return redirect()->route('clients.index')->with('info', 'Se ha actualizado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function destroy(Client $client)
    {
        if (Auth::user()->user_type==1) {
            $client->delete();
            return back()->with('info', 'Borrado exitosamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }
}
