@extends('layouts.admin')
@section('title','Crear cliente')
@section('breadcrumb')
    <li class="breadcrumb-item active">
        <a href="{{route('clients.index')}}">Clientes</a>
    </li>
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<h3>Registro de cliente</h3>
    {!! Form::open (['route'=>'clients.store','method'=>'POST','files'=>true]) !!}
    @include('admin.clients.form.form')
    <a href="{{route('clients.index')}}">Cancelar</a>
    {!! Form::submit('Guardar') !!}
    {!! Form::close() !!}
@endsection
