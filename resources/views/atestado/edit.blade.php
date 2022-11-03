@extends('adminlte::page')

@section('title', 'Atestado')

@section('content_header')
    <h1>Editar dados do Atestado {{$atestado->id}} de {{ $funcionario->name }}</h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('atestados.edit', ['atestado' => $atestado])}}">
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
                <br><input class="form-control" type="date" id="data_incial" name="data_inicial" value={{$atestado->data_inicial}}>
                <br><label>Duração : </label>
                <br><input class="form-control" type="number" id="duracao" name="duracao" value={{$atestado->duracao}}>
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