@extends('adminlte::page')

@section('title', 'Feedbacks')

@section('content_header')
    <h1>Lista de Feedbacks</h1>
@stop

@section('content')
    <div class="funcs">
        @foreach ($feedbacks as $feedback)
            <p id="name">{{ $feedback->id }} - {{ $feedback->data_inicial }}</p>
            <a href="/feedbacks/{{ $feedback->id }}"><button class="edit-button">Editar</button></a>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop