<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type==1) {
            $reservations = DB::table('clients')->join('reservations', 'client_id', '=', 'clients.id')->select('name', 'clients.id', 'date', 'phone_number')->get();
            $today = mktime(0, 0, 0, date('m'), date('d'), date('y'));
            $mes = $this->mes($today);
            $dias = $this->lastDay($today);
            return view('admin/reservations.index', compact('mes', 'dias', 'reservations'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function nextMonth($date){
        if (Auth::user()->user_type==1) {
            $newDate = mktime(0, 0, 0, date('m', $date) + 1, date('d', $date), date('y', $date));
            $reservations = DB::table('clients')->join('reservations', 'client_id', '=', 'clients.id')->select('name', 'clients.id', 'date', 'phone_number')->get();
            $dias = $this->lastDay($newDate);
            $mes = $this->mes($newDate);
            return view('admin/reservations.index', compact('mes', 'dias', 'reservations'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function lastMonth($date){
        if (Auth::user()->user_type==1) {
            $newDate = mktime(0, 0, 0, date('m', $date) - 1, date('d', $date), date('y', $date));
            $reservations = DB::table('clients')->join('reservations', 'client_id', '=', 'clients.id')->select('name', 'clients.id', 'date', 'phone_number')->get();
            $dias = $this->lastDay($newDate);
            $mes = $this->mes($newDate);
            return view('admin/reservations.index', compact('mes', 'dias', 'reservations'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }

    public function create()
    {
        if (Auth::user()->user_type==1) {
            return view('admin.reservations.create');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type==1) {
            $request->validate([
                'client_id' => 'required',
                'date' => 'required',
                'time' => 'required'
            ]);

            Reservation::create($request->all());

            return redirect()->route('reservations.index')->with('info', 'Creado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function show($day)
    {
        if (Auth::user()->user_type==1) {
            $reservations = DB::table('clients')->join('reservations', 'client_id', '=', 'clients.id')->select('name', 'dni', 'time', 'phone_number','reservations.id')->where('date', '=', date('Y-m-d', $day))->get();
            return view('admin/reservations.show', compact('reservations'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');
    }


    public function edit($reservation)
    {
        if (Auth::user()->user_type==1) {
            $reservation=Reservation::where('id',$reservation)->firstOrFail();
            return view('admin/reservations.edit',compact('reservation'));
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function update(Request $request, Reservation $reservation)
    {
        if (Auth::user()->user_type==1) {
            $request->validate([
                'client_id' => 'required',
                'date' => 'required',
                'time' => 'required'
            ]);
            $reservation->update($request->all());
            return redirect()->route('reservations.index')->with('info', 'Se ha actualizado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function destroy($reservation)
    {
        if (Auth::user()->user_type==1) {
            $reservation=Reservation::where('id',$reservation)->firstOrFail();
            $reservation->delete();
            return redirect()->route('reservations.index')->with('info', 'Se ha eliminado correctamente');
        }
        return redirect()->route('welcome')->with('error','No tiene acceso a esta página');

    }

    public function mes($date){
        $meses=['01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre'];

        return $meses[date('m',$date)];
    }

    public function lastDay($date){
        $month=date('m',$date);
        $year=date('Y',$date);
        $day=date('d',mktime(0,0,0,$month+1,0,$year));

        $i=1;
        $days=[];
        do{
            $days[$i]=mktime(0,0,0,$month,$i,$year);
            $i++;
        }while($i<=$day);
        return $days;

    }
}
