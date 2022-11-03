@extends('adminlte::page')

@section('title', 'Bolsas')

@section('content_header')
    <h1>Lista de Bolsas</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($bolsas as $bolsa)
            <p id="name">{{ $bolsa->id }} - {{ $bolsa->valor }}</p>
            <a href="/bolsas/{{ $bolsa->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop