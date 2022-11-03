@extends('adminlte::page')

@section('title', 'Bolsa')

@section('content_header')
    <h1><center>Editar dados da Bolsa {{$bolsa->id}} de {{ $funcionario->name }}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('bolsas.edit', ['bolsa' => $bolsa])}}">
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
                <br><label>Data Inicial : </label>
                <br><input class="form-control" type="date" id="data_inicial" name="data_inicial" value={{$bolsa->data_inicial}}>
                <br><label>Data Final : </label>
                <br><input class="form-control" type="date" id="data_final" name="data_final" value={{$bolsa->data_final}}>
                <br><label>Data Valor : </label>
                <br><input class="form-control" type="float" id="valor" name="valor" value={{$bolsa->valor}}>
                
                @unless ($bolsa->renovado == '1')
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="0" >
                    <label class="form-check-label" for="renovado"> <b>SIM </b></label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="1" checked>
                    <label class="form-check-label" for="renovado"> <b>NÃO </b></label>
                    </div>
                @endunless
                @unless ($bolsa->renovado == '0')
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="0" checked>
                    <label class="form-check-label" for="renovado"> <b>SIM </b></label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="renovado" name="renovado" value="1" >
                    <label class="form-check-label" for="renovado"> <b>NÃO </b></label>
                    </div> 
                @endunless
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