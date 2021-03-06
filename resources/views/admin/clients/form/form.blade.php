
        <div class="row ">
            <div class="col">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="col ">
                {!! Form::label('last_name','Apellidos') !!}
                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! Form::label('dni','DNI') !!}
                {!! Form::text('dni',null,['class'=>'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('address','Dirección') !!}
                {!! Form::text('address',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! Form::label('phone_number','Teléfono') !!}
                {!! Form::number('phone_number',null,['class'=>'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('birth_date','Fecha de nacimiento') !!}
                {!! Form::date('birth_date',null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! Form::label('email','Email') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('group','Grupo') !!}
                {!! Form::select('group',['Amigos'=>'Amigos','Generales'=>'Generales'],null,['class'=>'form-control','placeholder'=>'Selecciona un elemento']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {!! Form::label('medical_data','Datos médicos') !!}
                {!! Form::textarea('medical_data',null,['class'=>'form-control']) !!}
            </div>
        </div>




