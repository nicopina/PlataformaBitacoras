@extends('adminlte::page')

@section('title', 'Áreas')

@section('content_header')
@if(auth()->user()->hasRole('Supervisor')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Áreas de trabajo</h1>
@stop

@section('content')
    @livewire('admin.areas')
@stop

@section('css')

@stop

@section('js')
@stop