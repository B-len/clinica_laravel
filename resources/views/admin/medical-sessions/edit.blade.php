@extends('layouts.admin')
@section('title','Editar sesión')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('medical-sessions.index')}}">Historial de sesiones</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">


        {!! Form::model($medicalSession,['route'=>['medical-sessions.update',$medicalSession],'method'=>'PUT','files'=>true]) !!}
        <div class="card-body">
            @include('admin.medical-sessions.form.form')
        </div>
        <div class="card-footer">
            <a class="btn btn-danger" href="{{route('medical-sessions.index')}}">Cancelar</a>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}


    </div>
@endsection
