@extends('adminlte::page')

@section('title', 'Dependentes')

@section('content_header')
    <h1>Lista de Dependentes</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($dependentes as $dependente)
            <p id="name">{{ $dependente->id }} - {{ $dependente->name }}</p>
            <a href="/dependentes/{{ $dependente->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop