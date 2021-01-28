@extends('layouts.admin')
@section('title','Calendario')


@section('content')
    <div class="container">
        <div class="nombre_mes">
            <h2> <a class="btn btn-outline-light"  href="{{route('lastMonth',$dias[1])}}"><i class="fas fa-chevron-left"></i></a> {{$mes}} <a class="btn btn-outline-light"  href="{{route('nextMonth',$dias[1])}}"><i class="fas fa-chevron-right"></i></a></h2>
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
                    <p class="texto_dia"><a href="{{route('reservations.show',$dia)}}">{{date('d',$dia)}}</a></p>
                    <div class="">
                        @foreach($reservations as $reservation)
                            @if(date('d-m-y',$dia)==date('d-m-y',strtotime($reservation->date)))
                                <i class="fas fa-user-clock"></i>
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <br>
    <br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Nueva cita</h2>
        </div>
        {!! Form::open (['route'=>'reservations.store','method'=>'POST','files'=>true]) !!}
        <div class="card-body">
            @include('admin.reservations.form.form')
        </div>
        <div class="card-footer">
            {!! Form::submit('Añadir cita',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

    <br>
    <br>

@endsection
