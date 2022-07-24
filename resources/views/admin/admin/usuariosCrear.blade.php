
@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Crear usuario</h1>
@stop

@section('plugins.datatable',true)

@section('content')
    <div class="card">
        <div class="card-body">
            
            {!! Form::open(['route'=>['admin.users.store'],'method'=>'post']) !!}
            <div class="row">
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Nombre','Nombre:') !!}
                    {!! Form::text('Nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Segundo_nombre','Segundo Nombre:') !!}
                    {!! Form::text('Segundo_nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Segundo_nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Apellido','Apellido:') !!}
                    {!! Form::text('Apellido',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Apellido')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                                    
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Segundo_apellido','Segundo Apellido:') !!}
                    {!! Form::text('Segundo_apellido',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Segundo_apellido')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    
                </div>
            </div>
            <div class="row">
            <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('user','Usuario (Inicio de sesión):') !!}
                    {!! Form::text('user',null,['class'=>'form-control', 'autocomplete'=>'new-user']) !!}
                    @error('user')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
                
                <div class="form-group col-xs-12 col-md-3">
                    
                    {!! Form::label('password','Contraseña:') !!}
                    {!! Form::password('password',['class' => 'form-control','autocomplete'=>'new-password']) !!}
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
                <div class=" col-xs-6 col-md-1">
                    {!! Form::label('','Mostrar') !!}
                    {!! Form::button('',['class'=>'btn btn-primary fa fa-eye-slash icon','id'=>'show_password','onclick'=>'mostrarPassword()']) !!}
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    
                    {!! Form::label('ID_Area','Área:') !!}
                    {!! Form::select('ID_Area',$areas,null,['class' => 'form-control']) !!}
                    
                </div>
                <div class="form-group col-xs-12 col-md-2">
                    
                    {!! Form::label('rol','Rol:') !!}
                    {!! Form::select('rol',$roles,null,['class' => 'form-control']) !!}
                    
                </div>
            </div>

                <div class="form-group">
                    {!! Form::submit('Crear usuario',['class' => 'btn btn-primary']) !!}
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