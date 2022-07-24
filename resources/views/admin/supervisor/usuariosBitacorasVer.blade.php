@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@if(auth()->user()->hasRole('Admin')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácoras del día {{$bitacora->Fecha}} de "{{$user->Nombre}} {{$user->Apellido}}"</h1>
@stop

@section('content')
    @livewire('supervisor.usuario-bitacoras-ver',['bitacora' => $bitacora->ID_Bitacora])
@stop

@section('css')
    
@stop

@section('js')
@stop