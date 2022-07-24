@extends('adminlte::page')

@section('title', 'Hoy')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Admin'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácora de hoy</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['usuario.entradas.store'],'method'=>'post']) !!}
            <div class="row align-items-center">
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Nombre_actividad','Nombre actividad:') !!}
                    {!! Form::text('Nombre_actividad',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Nombre_actividad')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Descripcion_actividad','Descripcion actividad :') !!}
                    {!! Form::text('Descripcion_actividad',null,['class'=>'form-control', 'autocomplete'=>'off', 'size' => '30x3']) !!}
                    @error('Descripcion_actividad')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-xs-12 col-md-2">
                    
                    {!! Form::label('Frecuencia','Frecuencia:') !!}
                    {!! Form::select('Frecuencia',$frecuencia,null,['class' => 'form-control']) !!}
                    
                </div>
                <div class="form-group col-xs-12 col-md-2">
                    {!! Form::label('Hora','Hora de inicio:') !!}
                    {!! Form::time('Hora',Carbon\Carbon::now()->format('H:i'),['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Hora')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col-xs-12 col-md-2 text-center">
                    {!! Form::submit('Crear entrada',['class' => 'btn btn-primary']) !!}
                </div>
                </div>
            {!! Form::close() !!}           
        </div>
    </div>
    @livewire('usuario.hoy-entradas')
@stop

@section('css')

@stop

@section('js')
@stop