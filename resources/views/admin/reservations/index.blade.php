@extends('layouts.admin')
@section('title','Calendario')


@section('content')
    <div class="nombre_mes">
        <h2>{{$mes}}</h2>
    </div>


<div class="mes">
    <div class="nombres_dias">
        <h5 class="nombre_dia">Lunes</h5>
        <h5 class="nombre_dia">Martes</h5>
        <h5 class="nombre_dia">Miercoles</h5>
        <h5 class="nombre_dia">Jueves</h5>
        <h5 class="nombre_dia">Viernes</h5>
        <h5 class="nombre_dia">Sábado</h5>
        <h5 class="nombre_dia">Domingo</h5>
    </div>

    @foreach($dias as $dia)
        <div class="dia">
            <p class="texto_dia">{{date('d',$dia)}}</p>
            <div class="">
                @foreach($reservations as $reservation)
                    @if(date('d-m-y',$dia)==date('d-m-y',strtotime($reservation->date)))
                        <a class="btn btn-outline-primary" href="{{route('reservations.show',$dia)}}"><i class="fas fa-user-clock"></i></a>
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</div>

    <br>
    <br>

<div class="card container">
    {!! Form::open (['route'=>'reservations.store','method'=>'POST','files'=>true]) !!}
    <div class="card-body">
        @include('admin.reservations.form.form')
    </div>
    <div class="card-footer">
        {!! Form::submit('Añadir cita',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>


@endsection
