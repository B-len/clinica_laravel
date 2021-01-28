<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MedicalSession;
use Illuminate\Http\Request;

class MedicalSessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->user_type==1) {
            $sessions = MedicalSession::orderBy('id', 'DESC')->paginate(10);
            return view('admin.medical-sessions.index', compact('sessions'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function create()
    {
        if (Auth::user()->user_type==1) {
            return view('admin.medical-sessions.create');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type==1) {
            $request->validate([
                'client_id' => 'required',
                'date' => 'required',
                'injury' => 'required',
                'price' => 'required'
            ]);
            MedicalSession::create($request->all());

            return redirect()->route('medical-sessions.index')->with('info', 'Se ha agregado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function show(MedicalSession $medicalSession)
    {
        //
    }

    public function edit(MedicalSession $medicalSession)
    {
        if (Auth::user()->user_type==1) {
            return view('admin.medical-sessions.edit', compact('medicalSession'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function update(Request $request, MedicalSession $medicalSession)
    {
        if (Auth::user()->user_type==1) {
            $request->validate([
                'client_id' => 'required',
                'date' => 'required',
                'injury' => 'required',
                'price' => 'required'
            ]);
            $medicalSession->update($request->all());

            return redirect()->route('medical-sessions.index')->with('info', 'Se ha actualizado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function destroy(MedicalSession $medicalSession)
    {
        if (Auth::user()->user_type==1) {
            $medicalSession->delete();
            return back()->with('info', 'Se ha eliminado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }
}
