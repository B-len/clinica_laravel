<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MedicalSession;
use Illuminate\Http\Request;

class MedicalSessionController extends Controller
{
    public function index()
    {
        $sessions=MedicalSession::orderBy('id','DESC')->paginate(10);
        return view('admin.medical-sessions.index',compact('sessions'));
    }

    public function create()
    {
        return view('admin.medical-sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'date'=>'required',
            'injury'=>'required',
            'price'=>'required'
        ]);
        MedicalSession::create($request->all());

        return redirect()->route('medical-sessions.index')->with('info','Se ha agregado correctamente');
    }

    public function show(MedicalSession $medicalSession)
    {
        //
    }

    public function edit(MedicalSession $medicalSession)
    {
        return view('admin.medical-sessions.edit',compact('medicalSession'));
    }

    public function update(Request $request, MedicalSession $medicalSession)
    {
        $request->validate([
            'client_id'=>'required',
            'date'=>'required',
            'injury'=>'required',
            'price'=>'required'
        ]);
        $medicalSession->update($request->all());

        return redirect()->route('medical-sessions.index')->with('info','Se ha actualizado correctamente');

    }

    public function destroy(MedicalSession $medicalSession)
    {
        $medicalSession->delete();
        return back()->with('info','Se ha eliminado correctamente');
    }
}
