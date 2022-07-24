@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Editando a {{$user->user}} "{{$user->Nombre}} {{$user->Apellido}}"</h1>
@stop

@section('plugins.datatable',true)

@section('content')
    <div class="card">
        <div class="card-body">
            
            {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put']) !!}
            <div class="row">
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('id','ID:') !!}
                    {!! Form::text('id',null,['class'=>'form-control', 'readonly','placeholder'=>$user->id]) !!}

                </div>
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('rol','Rol:') !!}
                    {!! Form::text('rol',null,['class'=>'form-control', 'disabled', 'placeholder'=>$rol[0]]) !!}

                </div>
                <div class="form-group col-xs-12 col-md-3">
                    
                    {!! Form::label('ID_Area','Área:') !!}
                    {!! Form::select('ID_Area',$areas,null,['class' => 'form-control']) !!}
                    
                </div>
                @if ($user->id != '1')
                <div class="form-group col-xs-12 col-md-3">
                    <p class="font-weight-bold">Bloqueado:</p>
                    <label>
                        {!! Form::radio('Bloqueado',1,$user->Bloqueado) !!}
                        SI
                    </label>
                    <label>
                        {!! Form::radio('Bloqueado',0,$user->Bloqueado) !!}
                        NO
                    </label>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="form-group col-xs-12 col-md-4">
                    {!! Form::label('user','Usuario (Inicio de sesión):') !!}
                    {!! Form::text('user',null,['class'=>'form-control', 'autocomplete'=>'new-user']) !!}
                    @error('user')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class="form-group col-xs-12 col-md-4">
                    {!! Form::label('Nombre','Nombre:') !!}
                    {!! Form::text('Nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-4">
                    {!! Form::label('Segundo_nombre','Segundo Nombre:') !!}
                    {!! Form::text('Segundo_nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Segundo_nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    
                    {!! Form::label('password','Nueva contraseña:') !!}
                    {!! Form::password('password',['class' => 'form-control','placeholder'=>'Dejar en blanco para no editar','autocomplete'=>'new-password']) !!}
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class=" col-xs-6 col-md-1">
                    {!! Form::label('','Mostrar') !!}
                    {!! Form::button('',['class'=>'btn btn-primary fa fa-eye-slash icon','id'=>'show_password','onclick'=>'mostrarPassword()']) !!}
                </div>
                <div class="form-group col-xs-12 col-md-4">
                    {!! Form::label('Apellido','Apellido:') !!}
                    {!! Form::text('Apellido',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Apellido')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-4">
                    {!! Form::label('Segundo_apellido','Segundo Apellido:') !!}
                    {!! Form::text('Segundo_apellido',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Segundo_Apellido')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
                               
            </div>

                <div class="form-group">
                    {!! Form::submit('Editar usuario',['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
            
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
<script type="text/javascript">
    function mostrarPassword(){
            var cambio = document.getElementById("password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        } 
</script>
@stop