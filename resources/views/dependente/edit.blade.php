@extends('adminlte::page')

@section('title', 'Dependente')

@section('content_header')
    <h1><center>Editar dados do Dependente {{$dependente->name}} de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form">
            <form method="post" id=func-form action="{{route('dependentes.edit', ['dependente' => $dependente])}}">
                @csrf
                @method('POST')
                <label>Funcionario : </label>
                <select class="form-control" id="id_funcionario" name="id_funcionario">
                    <option selected="selected" value={{$funcionario->id}}> {{$funcionario->name}} </option>
                    @foreach($funcionarios as $f)
                        @unless ($f->id === $funcionario->id)
                            <option value={{$f->id}}> {{$f->name}} </option>
                        @endunless
                    @endforeach
                </select>
                <br><label>Nome : </label>
		        <br><input class="form-control" type="text" id="name" name="name" value='{{$dependente->name}}'>
                <br><label>CPF : </label>
                <br><input class="form-control" type="text" id="cpf" name="cpf" value='{{$dependente->cpf}}'>
                <br><label>Data de Nascimento : </label>
                <br><input class="form-control" type="date" id="nasc" name="nasc" value={{$dependente->nasc}}>
                <br><label>Grau de Parentesco : </label>
		        <br><select class="form-control" type="text" id="paretesco" name="parentesco" value='{{$dependente->parentesco}}'>
                        <option value="Cônjuge"> Cônjuge </option>
                        <option value="Filho">Filho </option>
                        <option value="Pai">Pai </option>
                        <option value="Mãe">Mãe </option>
                    </select>
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