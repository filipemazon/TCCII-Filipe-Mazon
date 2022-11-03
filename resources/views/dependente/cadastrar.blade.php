@extends('adminlte::page')

@section('title', 'Cadastrar Dependente')

@section('content_header')
    <h1><center>Cadastrar Dependente</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('dependentes.store')}}">
            @csrf
            <label>Funcionario : </label>
            <br><select class="form-control" id="id_funcionario" name="id_funcionario">
            @foreach($funcionarios as $f)
                <option value={{$f->id}}> {{$f->name}} </option>
            @endforeach
            </select>
            <br><label>Nome : </label>
            <br><input class="form-control" type="text" id="name" name="name" >
            <br><label>CPF : </label>
            <br><input class="form-control" type="text" id="cpf" name="cpf" >
            <br><label>Data de Nascimento : </label>
            <br><input class="form-control" type="date" id="nasc" name="nasc">
            <br><label>Grau de Parentesco : </label>
            <br><select class="form-control" id="parentesco" name="parentesco" >
                <option value="Cônjuge"> Cônjuge </option>
                <option value="Filho">Filho </option>
                <option value="Pai">Pai </option>
                <option value="Mãe">Mãe </option>
            </select>
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