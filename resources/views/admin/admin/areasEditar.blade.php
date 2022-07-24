@extends('adminlte::page')

@section('title', 'Áreas')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Editando área de trabajo "{{$area->Nombre}}"</h1>
@stop

@section('content')
<div class="card">
        <div class="card-body">
            
            {!! Form::model($area,['route'=>['admin.areas.update',$area->ID_Area],'method'=>'put']) !!}
            <div class="row">
                <div class="form-group col-xs-12 col-md-6">
                    {!! Form::label('id','ID:') !!}
                    {!! Form::text('id',$area->ID_Area,['class'=>'form-control', 'readonly']) !!}

                </div>
                <div class="form-group col-xs-12 col-md-6">
                    {!! Form::label('Nombre','Nombre:') !!}
                    {!! Form::text('Nombre',null,['class'=>'form-control', 'autocomplete'=>'off']) !!}
                    @error('Nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror

                </div>
            </div>
                <div class="form-group">
                    {!! Form::submit('Editar área',['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            
        </div>
    </div>
@stop

@section('css')
  
@stop

@section('js')
@stop