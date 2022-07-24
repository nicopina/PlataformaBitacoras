@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácora del día {{$bitacora->Fecha}}</h1>
@stop

@section('content')
    @livewire('admin.user-bitacora-ver',['bitacora' => $bitacora])
@stop

@section('css')
    
@stop

@section('js')
@stop