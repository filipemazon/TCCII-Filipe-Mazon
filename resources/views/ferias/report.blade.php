@extends('adminlte::page')

@section('title', 'Ferias')

@section('content_header')
    <h1>Lista de Férias</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($ferias as $ferias)
            <p id="name">{{ $ferias->id }} - {{ $ferias->data_inicial }} - {{ $ferias->data_final }}</p>
            <a href="/ferias/{{ $ferias->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop