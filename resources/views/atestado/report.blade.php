@extends('adminlte::page')

@section('title', 'Atestados')

@section('content_header')
    <h1>Lista de Atestados</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($atestados as $atestado)
            <p id="name">{{ $atestado->id }} - {{ $atestado->data_inicial }}</p>
            <a href="/atestados/{{ $atestado->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop