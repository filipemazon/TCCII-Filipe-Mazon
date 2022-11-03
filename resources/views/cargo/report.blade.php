@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <h1>Lista de Cargos</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($cargos as $cargo)
            <p id="name">{{ $cargo->id }} - {{ $cargo->name }}</p>
            <a href="/cargos/{{ $cargo->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop