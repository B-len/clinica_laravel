<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations=DB::table('clients')->join('reservations','client_id','=','clients.id')->select('name','clients.id','date','phone_number')->get();
        $dias=$this->lastDay();
        $mes=$this->mes(Carbon::now());

        return view('admin/reservations.index',compact('mes','dias','reservations'));
    }
    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'date'=>'required',
            'time'=>'required'
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('info','Creado correctamente');
    }

    public function show($day)
    {
        $reservations=DB::table('clients')->join('reservations','client_id','=','clients.id')->select('name','dni','time','phone_number')->where('date','=',date('Y-m-d',$day))->get();
        return view('admin/reservations.show',compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function mes(Carbon $day){
        $meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        return $meses[$day->month-1];
    }

    public function lastDay(){
        $month=date('m');
        $year=date('Y');
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
