@extends('adminlte::page')

@section('title', 'Bitácoras')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácora del día {{$fecha->Fecha}} de "{{$usuario->Nombre}} {{$usuario->Apellido}}"</h1>
@stop

@section('content')
    @livewire('admin.bitacoras-usuarios-ver',['bitacora' => $bitacora])
@stop

@section('css')
    
@stop

@section('js')
@stop