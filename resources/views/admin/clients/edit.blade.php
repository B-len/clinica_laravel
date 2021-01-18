@extends('layouts.admin')
@section('title','Editar cliente')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('clients.index')}}">Clientes</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
        <div class="card">


        {!! Form::model($client,['route'=>['clients.update',$client],'method'=>'PUT','files'=>'true']) !!}
            <div class="card-body">
            @include('admin.clients.form.form')
            </div>
            <div class="card-footer">
            <a class="btn btn-danger" href="{{route('clients.index')}}">Cancelar</a>
            {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}


        </div>
@endsection
