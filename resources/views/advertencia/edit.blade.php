@extends('adminlte::page')

@section('title', 'Advertência')

@section('content_header')
    <h1><center>Editar dados da Advertência {{$advertencia->id}} de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('advertencias.edit', ['advertencia' => $advertencia])}}">
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
                <br><label>Data : </label>
                <br><input class="form-control" type="date" id="data" name="data" value={{$advertencia->data}}>
                <br><label>Motivo : </label>
                <br><textarea class="form-control" id="motivo" name="motivo" value='{{$advertencia->motivo}}' rows="3"></textarea>
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