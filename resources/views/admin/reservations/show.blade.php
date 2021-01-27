@extends('layouts.admin')
@section('title','Vista de citas')
@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
    <div class="container">
        <table class="table">
            @for($i=8;$i<=21;$i++)
                @for($j=0;$j<60;$j+=10)
                    @if(($i>7)&&($i<10)||($i>14) )
                        <tr>
                            <td>
                                @if($i<10)
                                    @if($j<10)
                                        0{{$i}}:0{{$j}}
                                    @else
                                        0{{$i}}:{{$j}}
                                    @endif
                                @elseif($i>14)
                                    @if($j<10)
                                        {{$i}}:0{{$j}}
                                    @else
                                        {{$i}}:{{$j}}
                                    @endif
                                @endif
                            </td>
                            <td>
                                @foreach($reservations as $reservation)
                                    @if($i==substr($reservation->time,0,2) && $j==substr($reservation->time,-5,2))
                                        &nbsp;&nbsp;&nbsp;&nbsp;Cita: {{$reservation->name}}/
                                        {{$reservation->phone_number}}/
                                        {{$reservation->dni}}
                                    @endif

                                @endforeach
                            </td>
                        </tr>
                    @endif
                @endfor
             @endfor
        </table>
        <div class="card-footer">
            <a class="btn btn-outline-danger" href="{{route('reservations.index')}}">Volver</a>
        </div>
    </div>
<br>
    <br>
    <br>
@endsection
