@extends('adminlte::page')

@section('title', 'Setores')

@section('content_header')
    <h1>Lista de Setores</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($setors as $setor)
            <p id="name">{{ $setor->id }} - {{ $setor->name }}</p>
            <a href="/setors/{{ $setor->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop