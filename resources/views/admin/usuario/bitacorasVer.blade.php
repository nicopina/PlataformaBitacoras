@extends('adminlte::page')

@section('title', 'Bitácoras')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Admin'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácora del día {{$bitacora->Fecha}}</h1>
@stop

@section('content')
    @livewire('usuario.ver-entrada',['bitacora' => $bitacora])
@stop

@section('css')

@stop

@section('js')
@stop