@extends('adminlte::page')

@section('title', 'Feedback')

@section('content_header')
    <h1><center>Editar dados do Feedback {{$feedback->id}} de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form">
            <form method="post" id=func-form action="{{route('feedbacks.edit', ['feedback' => $feedback])}}">
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
                <br><label>Data do Feedback : </label>
                <br><input class="form-control" type="date" id="data_inicial" name="data_inicial" value={{$feedback->data_inicial}}>
                <br><label>Resumo : </label>
                <br><textarea class="form-control" type="text" id="resumo" name="resumo" value='{{$feedback->resumo}}'></textarea>
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