@extends('adminlte::page')

@section('title', 'Setor')

@section('content_header')
    <h1><center>Editar dados do Setor {{ $setor->name }}<center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('setores.edit', ['setore' => $setor])}}">
                @csrf
                <br><label>Nome : </label>
                <br><input type="text" id="name" name="name" value='{{$setor->name}}'>
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