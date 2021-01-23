@extends('layouts.admin')
@section('title','Gestion de clientes')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Fecha de nacimiento</th>
                        <th>Ver cliente</th>
                        <th>Editar cliente</th>
                        <th>Borrar cliente</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->name}}</td>
                            <td>{{$client->last_name}}</td>
                            <td>{{$client->dni}}</td>
                            <td>{{$client->phone_number}}</td>
                            <td>{{$client->birth_date}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('clients.show',$client)}}"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-outline-primary"  href="{{route('clients.edit',$client->id)}}">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </td>
                            <td>
                                {!! Form::open(['route'=>['clients.destroy',$client],'method'=>'DELETE']) !!}
                                <button class="btn btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                        <br>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-outline-secondary" href="{{route('clients.create')}}">Crear cliente</a>

        </div>
    </div>
@endsection
