@extends('adminlte::page')

@section('title', 'Cadastrar Cargo')

@section('content_header')
    <h1><center>Cadastrar Cargo</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('cargos.store')}}">
            @csrf
            <br><label>Cargo  : </label>
            <br><input class="form-control" type="text" id="name" name="name">
            <br><label>Salário Base : </label>
            <br><input class="form-control" type="float" id="salario_base" name="salario_base">
            <br><input class="btn btn-primary" btn-lg next" value="Cadastrar" type="submit">
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop