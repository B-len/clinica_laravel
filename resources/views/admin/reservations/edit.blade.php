@extends('layouts.admin')
@section('title','Editar cita')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('reservations.index')}}">Citas</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">

        {!! Form::model($reservation,['route'=>['reservations.update',$reservation],'method'=>'PUT','files'=>true]) !!}
        <div class="card-body">
            @include('admin.reservations.form.form')
        </div>
        <div class="card-footer">
            <a class="btn btn-danger" href="{{route('reservations.index')}}">Cancelar</a>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}


    </div>
@endsection
