@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard de Advertências</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($advertencias as $advertencia)
            <p id="name">{{ $advertencia->id }} - {{ $advertencia->motivo }}</p>
            <a href="/advertencias/{{ $advertencia->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop