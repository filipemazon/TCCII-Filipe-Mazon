@extends('adminlte::page')

@section('title', 'Cargo')

@section('content_header')
    <h1><center>Editar dados do Cargo {{ $cargo->name }}<center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('cargos.edit', ['cargo' => $cargo])}}">
                @csrf
                <br><label>Cargo  : </label>
                <br><input class="form-control" type="text" id="name" name="name" value='{{$cargo->name}}'>
                <br><label>Salário Base  : </label>
                <br><input class="form-control" type="float" id="salario_base" name="salario_base" value={{$cargo->salario_base}}>
                <br><input class="btn btn-primary" value="Editar" type="submit">
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop