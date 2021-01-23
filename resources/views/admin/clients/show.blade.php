@extends('layouts.admin')
@section('title','Vista de cliente')
@section('content')
    <div class="card">
        <div class="card-header ">
            <div class="row bg-gradient-gray">
                <div class="col">
                    <h2 class="card-title text-left ">Nombre:{{$client->name}} {{$client->last_name}}</h2>
                </div>
                <div class="col">
                    <p class="card-text text-right">DNI {{$client->dni}}</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <p class="card-text text-left"><b>Teléfono: </b> {{$client->phone_number}}</p>
                </div>
                <div class="col">
                    <p class="card-text text-left"><b>Dirección: </b> {{$client->address}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="card-text text-left"><b>Fecha de nacimiento: </b> {{$client->birth_date}}</p>
                </div>
                <div class="col">
                    <p class="card-text text-left"><b>Email: </b> {{$client->email}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="card-text text-left"><b>Grupo: </b> {{$client->group}}</p>
                </div>
                <div class="col">
                    <p class="card-text text-left"><b>Datos médicos: </b> {{$client->medical_data}}</p>
                </div>
            </div>

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="card-title font-weight-bold">Historial sesiones</h2>
                </div>
            </div>
            <br>
            @foreach($sessions as $session)
            <div class="row">
                <div class="col">
                    <p class="card-text text-left"><b>Fecha: </b> {{$session->date}}</p>
                </div>
                <div class="col">
                    <p class="card-text text-left"><b>Lesión: </b> {{$session->injury}}</p>
                </div>
                <div class="col">
                    <p class="card-text text-left"><b>Precio: </b> {{$session->price}}€</p>
                </div>
            </div>
                <div class="row">
                    <div class="col">
                        <p class="card-text text-left"><b>Trataminto: </b> {{$session->treatment}}</p>
                    </div>
                </div>
            @endforeach
            <br>
            <a class="btn btn-outline-primary" href="{{route('medical-sessions.create')}}">Crear sesión</a>
        </div>


        <div class="card-footer">
            <a class="btn btn-outline-primary" href="{{route('clients.index')}}">Volver</a>
        </div>
    </div>
@endsection
