@extends('adminlte::page')

@section('title', 'Skils')

@section('content_header')
    <h1>Lista de Skils</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($skils as $skil)
            <p id="name">{{ $skil->id }} - {{ $skil->descricao }}</p>
            <a href="/skils/{{ $skil->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop