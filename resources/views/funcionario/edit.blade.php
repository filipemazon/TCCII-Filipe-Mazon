@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
    <h1><center>Editar dados de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('funcionarios.edit', ['funcionario' => $funcionario])}}">
                @csrf
                @method('POST')
                <label>Nome : </label>
                <br><input class="form-control" type="text" id="name" name="name" value='{{$funcionario->name}}'>
                <br><label>Email : </label>
                <br><input class="form-control" type="email" id="email" name="email" value='{{$funcionario->email}}'>
                <br><label>CPF : </label>
                <br><input class="form-control" type="text" id="cpf" name="cpf" value={{$funcionario->cpf}}>
                <br><label>Data de Nascimento : </label>
                <br><input class="form-control" type="date" id="nascimento" name="nascimento" value={{$funcionario->nascimento}}>
                <br><label>Endereço : </label>
                <br><input class="form-control" type="text" id="endereco" name="endereco" value='{{$funcionario->endereco}}'>
                <br><label>Salário : </label>
                <br><input class="form-control" type="float" id="remuneracao" name="remuneracao" value={{$funcionario->remuneracao}}>
                <br><label>Data de Contratação : </label>
                <br><input class="form-control" type="date" id="contratacao" name="contratacao" value={{$funcionario->contratacao}}>
                <br><label>Setor : </label>
                <br><select class="form-control" id="id_setor" name="id_setor">
                    <option selected="selected" value={{$setor->id}}> {{$setor->name}} </option>
                    @foreach($setores as $s)
                        @unless ($s->id === $setor->id)
                            <option value={{$s->id}}> {{$s->name}} </option>
                        @endunless
                    @endforeach
                </select>
                <br><label>Cargo : </label>
                <br><select class="form-control" id="id_cargo" name="id_cargo">
                <option selected="selected" value={{$cargo->id}}> {{$cargo->name}} </option>
                @foreach($cargos as $c)
                        @unless ($c->id === $cargo->id)
                            <option value={{$c->id}}> {{$c->name}} </option>
                        @endunless
                @endforeach
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