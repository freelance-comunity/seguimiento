{{-- resources/views/layouts/dashboard.blade.php --}}
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido al sistema {{Auth::user()->name}}.</p>
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
