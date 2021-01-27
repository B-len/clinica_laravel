<div class="row ">
    <div class="col">
        {!! Form::label('client_id','ID del cliente') !!}
        {!! Form::text('client_id',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col ">
        {!! Form::label('date','Día cita') !!}
        {!! Form::date('date',null,['class'=>'form-control']) !!}
    </div>
    <div class="col ">
        {!! Form::label('time','Hora cita') !!}
        {!! Form::time('time',null,['class'=>'form-control']) !!}
    </div>
</div>
