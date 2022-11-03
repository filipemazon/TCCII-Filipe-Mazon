@extends('adminlte::page')

@section('title', 'Cadastrar Feedback')

@section('content_header')
    <h1><center>Cadastrar Feedback</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('feedbacks.store')}}">
            @csrf
            <label>Funcionario : </label>
            <br><select class="form-control" id="id_funcionario" name="id_funcionario">
            @foreach($funcionarios as $f)
                <option value={{$f->id}}> {{$f->name}} </option>
            @endforeach
            </select>
            <br><label>Data do Feedback : </label>
            <br><input class="form-control" type="date" id="data_inicial" name="data_inicial">
            <br><label>Resumo : </label>
            <br><textarea class="form-control" id="resumo" name="resumo"rows="3" ></textarea>
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