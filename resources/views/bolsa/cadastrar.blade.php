@extends('adminlte::page')

@section('title', 'Cadastrar Bolsa')

@section('content_header')
    <h1>Cadastrar Bolsa</h1>
@stop

@section('content')
    <div class="form-group">
        <form method="post" id=func-form action="{{route('bolsas.store')}}">
            @csrf
            <label>Funcionario : </label>
            <br><select class="form-control" id="id_funcionario" name="id_funcionario">
            @foreach($funcionarios as $f)
                <option value={{$f->id}}> {{$f->name}} </option>
            @endforeach
            </select>
            <br><label>Data Inicial : </label>
            <br><input class="form-control" type="date" id="data_inicial" name="data_inicial">
            <br><label>Data Final : </label>
            <br><input class="form-control" type="date" id="data_final" name="data_final">
            <br><label>Valor : </label>
            <br><input class="form-control" type="float" id="valor" name="valor">
            <br><label>Renovado : </label>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="1">
            <label class="form-check-label" for="renovado"> <b>SIM </b></label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="0">
            <label class="form-check-label" for="renovado"> <b> NÃO </b></label>
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