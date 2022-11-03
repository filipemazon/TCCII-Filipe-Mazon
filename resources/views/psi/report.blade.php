@extends('adminlte::page')

@section('title', 'PSI')

@section('content_header')
    <h1>Lista de Processos Seletivos Internos</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($psis as $psi)
            <p id="name">{{ $psi->id }} - {{ $psi->data_inicial }} - {{ $psi->data_final }}</p>
            <a href="/psis/{{ $psi->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop