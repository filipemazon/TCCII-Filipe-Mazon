@extends('adminlte::page')

@section('title', 'Cadastrar PSI')

@section('content_header')
    <h1><center>Cadastrar PSI</center></h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('psis.store')}}">
            @csrf
            <label>Setor : </label>
            <br><select class="form-control" id="id_setor" name="id_setor">
            @foreach($setors as $s)
                <option value={{$s->id}}> {{$s->name}} </option>
            @endforeach
            </select>

            <br> <label>Cargo : </label>
            <br><select class="form-control" id="id_cargo" name="id_cargo">
            @foreach($cargos as $c)
                <option value={{$c->id}}> {{$c->name}} </option>
            @endforeach
            </select>

            <br><label>Data Inicial : </label>
            <br><input class="form-control" type="date" id="data_inicial" name="data_inicial">
            <br><label>Data Final : </label>
            <br><input class="form-control" type="date" id="data_final" name="data_final">

            <br><label>Funcionario Responsável : </label>
            <br><select class="form-control" id="funcionario_responsavel" name="funcionario_responsavel">
            @foreach($funcionarios as $f)
                <option value={{$f->id}}> {{$f->name}} </option>
            @endforeach
            </select>

            <br><label>Convertido em Contrataçao : </label>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="1">
            <label class="form-check-label" for="convertido"> <b>SIM </b></label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="0">
            <label class="form-check-label" for="convertido"> <b> NÃO </b></label>
            </div>
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