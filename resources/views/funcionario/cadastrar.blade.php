@extends('adminlte::page')

@section('title', 'Cadastrar Funcionário')

@section('content_header')
    <h1><center>Cadastrar Funcionário</center></h1>
@stop

@section('content')
    <div class="form">
        <form method="post" id=func-form action="{{route('funcionarios.store')}}">
            @csrf
            <label>Nome : </label>
            <br><input class="form-control" type="text" id="name" name="name">
            <br><label>Email : </label>
            <br><input class="form-control" type="email" id="email" name="email">
            <br><label>CPF : </label>
            <br><input class="form-control" type="text" id="cpf" name="cpf">
            <br><label>Data de Nascimento : </label>
            <br><input class="form-control" type="date" id="nascimento" name="nascimento">
            <br><label>Endereço : </label>
            <br><input class="form-control" type="text" id="endereco" name="endereco">
            <br><label>Salário : </label>
            <br><input class="form-control" type="float" id="remuneracao" name="remuneracao">
            <br><label>Data de Contratação : </label>
            <br><input class="form-control" type="date" id="contratacao" name="contratacao">
            <br><label>Setor : </label>
            <br><select class="form-control" id="id_setor" name="id_setor">
            @foreach($setores as $setor)
                <option value={{$setor->id}}> {{$setor->name}} </option>
            @endforeach
            </select>
            <br><label>Cargo : </label>
            <br><select class="form-control" id="id_cargo" name="id_cargo">
            @foreach($cargos as $cargo)
                <option value={{$cargo->id}}> {{$cargo->name}} </option>
            @endforeach
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