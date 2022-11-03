@extends('adminlte::page')

@section('title', 'Cadastrar Setor')

@section('content_header')
    <h1><center>Cadastrar Setor</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('setores.store')}}">
            @csrf
            <br><label>Nome : </label>
            <br><input class="form-control" type="text" id="name" name="name">
            <br><input class="btn btn-primary" value="Cadastrar" type="submit">
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop