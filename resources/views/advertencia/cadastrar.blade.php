@extends('adminlte::page')

@section('title', 'Cadastrar Advertência')

@section('content_header')
    <h1><center>Cadastrar Advertência</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('advertencias.store')}}">
            @csrf
            <label>Funcionario : </label>
            <br><select class="form-control" id="id_funcionario" name="id_funcionario">
            @foreach($funcionarios as $f)
                <option value={{$f->id}}> {{$f->name}} </option>
            @endforeach
            </select>
            <br><label>Data : </label>
            <br><input type="date" class="form-control" id="data" name="data">
            <br><label>Motivo : </label>
            <br><textarea class="form-control" id="motivo" name="motivo" rows="3" ></textarea>
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