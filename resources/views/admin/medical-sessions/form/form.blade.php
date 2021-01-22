<div class="row ">
    <div class="col">
        {!! Form::label('client_id','ID del cliente') !!}
        {!! Form::text('client_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col ">
        {!! Form::label('date','Día sesión') !!}
        {!! Form::date('date',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col">
        {!! Form::label('injury','Lesión') !!}
        {!! Form::text('injury',null,['class'=>'form-control']) !!}
    </div>
    <div class="col">
        {!! Form::label('price','Precio') !!}
        <div class="input-group mb-2">
            {!! Form::number('price',null,['class'=>'form-control']) !!}
            <div class="input-group-append">
                <div class="input-group-text">€</div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        {!! Form::label('treatment','Tratamiento') !!}
        {!! Form::textarea('treatment',null,['class'=>'form-control']) !!}
    </div>
</div>
