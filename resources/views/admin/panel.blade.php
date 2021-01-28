@extends('layouts.admin')
@section('tile','Panel administrador')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col" style="width: 18rem;">
                <img src="{{asset('img/clients.png')}}" alt="Imagen clientes" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Gestión de clientes</h5>
                    <p class="card-text">Desde aquí se pueden gestionar los clientes de la clínica</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('clients.index')}}" class="btn btn-primary">Gestión clientes</a>
                </div>
            </div>

            <div class="card col" style="width: 18rem;">
                <img src="{{asset('img/historial_sesiones.jpg')}}" alt="Imagen historial sesión" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Gestión de sesiones médicas</h5>
                    <p class="card-text">Desde aquí se pueden gestionar las sesiones médicas</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('medical-sessions.index')}}" class="btn btn-primary">Gestión sesiones</a>
                </div>
            </div>

            <div class="col card">
                <img src="{{asset('img/reservations.png')}}" alt="Imagen reservas calendario" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Calendario con las reservas</h5>
                    <p class="card-text">Desde aquí se pueden gestionar las reservas médicas</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('reservations.index')}}" class="btn btn-primary">Gestión reservas</a>
                </div>
            </div>
        </div>
    </div>


@endsection
