@extends('adminlte::page')

@section('title', 'Ferias')

@section('content_header')
    <h1><center>Editar dados ds Ferias {{$feria->id}} de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form">
            <form method="post" id=func-form action="{{route('ferias.edit', ['feria' => $feria])}}">
                @csrf
                @method('POST')
                <label>Funcionario : </label>
                <br><select class="form-control" id="id_funcionario" name="id_funcionario">
                    <option selected="selected" value={{$funcionario->id}}> {{$funcionario->name}} </option>
                    @foreach($funcionarios as $f)
                        @unless ($f->id === $funcionario->id)
                            <option value={{$f->id}}> {{$f->name}} </option>
                        @endunless
                    @endforeach
                </select>
                <br><label>Data Inicial : </label>
                <br><input class="form-control" type="date" id="data_inicial" name="data_inicial" value={{$feria->data_inicial}}>
                <br><label>Data Final : </label>
                <br><input class="form-control" type="date" id="data_final" name="data_final" value={{$feria->data_final}}>
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