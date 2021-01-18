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

        {!! Form::model($client,['route'=>['clients.update',$client->id],'method'=>'PUT','files'=>'true']) !!}
            @include('admin.clients.form.form')
        <a href="{{route('clients.index')}}">Cancelar</a>
        {!! Form::submit('Guardar') !!}
        {!! Form::close() !!}

    </div>
@endsection
