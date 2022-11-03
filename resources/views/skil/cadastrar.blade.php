@extends('adminlte::page')

@section('title', 'Cadastrar Skil')

@section('content_header')
    <h1><center>Cadastrar Skill</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('skills.store')}}">
            @csrf
            <br><label>Descrição : </label>
            <br><input class="form-control" type="text" id="descricao" name="descricao">
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