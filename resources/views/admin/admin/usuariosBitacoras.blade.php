@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Bitácoras de "{{$user->Nombre}} {{$user->Apellido}}"</h1>
@stop

@section('content')
    @livewire('admin.user-bitacora',['user' => $user])
@stop

@section('css')
    
@stop

@section('js')
@stop