
        <div class="form-group ">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null) !!}
        </div>
        <div class="form-group ">
            {!! Form::label('last_name','Apellido') !!}
            {!! Form::text('last_name',null) !!}
        </div>



{!! Form::label('dni','DNI') !!}
{!! Form::text('dni',null) !!}
{!! Form::label('address','Dirección') !!}
{!! Form::text('address',null) !!}
{!! Form::label('phone_number','Teléfono') !!}
{!! Form::number('phone_number',null) !!}
{!! Form::label('birth_date','Fecha de nacimiento') !!}
{!! Form::date('birth_date',null) !!}
{!! Form::label('email','Email') !!}
{!! Form::email('email',null) !!}
{!! Form::label('group','Grupo') !!}
{!! Form::select('group',['Amigos'=>'Amigos','Generales'=>'Generales'],null,['placeholder'=>'Selecciona un grupo']) !!}

