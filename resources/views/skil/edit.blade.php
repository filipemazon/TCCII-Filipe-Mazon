@extends('adminlte::page')

@section('title', 'Setor')

@section('content_header')
    <h1>Editar dados da Skil {{ $skill->descricao }}</h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('skills.edit', ['skill' => $skill])}}">
                @csrf
                <br><label>Descrição : </label>
                <br><input class="form-control"type="text" id="name" name="descricao" value='{{$skill->descricao}}'>
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