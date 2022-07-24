@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Bienvenido/a {{auth()->user()->Nombre}} a la plataforma de bitácoras C&C</h1>
@stop

@section('content')
    @if(auth()->user()->hasRole('Admin'))
        <div class="card">
            <div class="card-body">
                <h5>
                    <strong>"Ver Usuarios":</strong> Sección en la que puedes ver y editar a los usuarios, además de ver sus bitácoras individuales.
                </h5>	
                <br>
                <h5>
                    <strong>"Ver Bitácoras":</strong> Sección en la que puedes ver todas las bitácoras que se han registrado.
                </h5>	
                <br>
                <h5>
                    <strong>"Gestionar Áreas":</strong> Sección en la que puedes ver y editar las áreas de trabajo de los empleados y empleadas.
                </h5>
                <br>
                <h5>
                    <strong>"Crear Área":</strong> Sección en la que puedes crear una nueva área de trabajo.
                </h5>
                <br>
                <h5>
                    <strong>"Crear Usuario":</strong> Sección en la que puedes registrar a un nuevo usuario.
                </h5>
            </div>
        </div>   
    @elseif(auth()->user()->hasRole('Supervisor'))
        <div class="card">
            <div class="card-body">
            <h5>
                    <strong>"Ver Usuarios":</strong> Sección en la que puedes ver a los usuarios, además de ver sus bitácoras individuales.
                </h5>	
                <br>
                <h5>
                    <strong>"Ver Bitácoras":</strong> Sección en la que puedes ver todas las bitácoras que se han registrado.
                </h5>	
            </div>
        </div>   
    @elseif(auth()->user()->hasRole('Usuario'))
        <div class="card">
            <div class="card-body">
            <h5>
                    <strong>"Bitácoras Personales":</strong> Sección en la que puedes ver todas tus bitácoras registradas.
                </h5>	
                <br>
                <h5>
                    <strong>"Ver Bitácora de hoy":</strong> Sección en la que puedes ver y editar tu bitácora de hoy.
                </h5>	
            </div>
        </div>      
    @else
    
    USUARIO SIN ROL

    @endif
@stop

@section('css')

@stop

@section('js')
    
@stop