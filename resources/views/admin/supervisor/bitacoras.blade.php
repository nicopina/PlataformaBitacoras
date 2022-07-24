@extends('adminlte::page')

@section('title', 'Bitácoras')

@section('content_header')
@if(auth()->user()->hasRole('Admin')||auth()->user()->hasRole('Usuario'))
    <meta http-equiv="refresh" content="0; url=https://bitacoras.consultorescyc.cl/login">
@endif
    <h1>Días en los que se registraron bitácoras</h1>
@stop

@section('content')
    @livewire('supervisor.bitacoras')
@stop

@section('css')
    
@stop

@section('js')
@stop