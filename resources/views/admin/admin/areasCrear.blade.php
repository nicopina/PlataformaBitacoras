@extends('adminlte::page')

@section('title', 'Áreas')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Crear área</h1>
@stop

@section('content')
<div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.areas.store'],'method'=>'post']) !!}
            <div class="row">
                <div class="form-group col-xs-12 col-md-3">
                    {!! Form::label('Nombre','Nombre del área:') !!}
                    {!! Form::text('Nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
            </div>
                <div class="form-group">
                    {!! Form::submit('Crear área',['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}           
        </div>
    </div>
@stop

@section('css')
  
@stop

@section('js')
@stop