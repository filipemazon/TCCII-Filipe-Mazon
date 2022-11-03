@extends('adminlte::page')

@section('title', 'PSI')

@section('content_header')
    <h1><center>Editar dados do PSI {{$psi->id}}</center></h1>
@stop

@section('content')
    <div class="func">
        <div class="form-group">
            <form method="post" id=func-form action="{{route('psis.edit', ['psi' => $psi])}}">
                @csrf
                @method('POST')
                <label>Setor : </label>
                <br><select class="form-control" id="id_setor" name="id_setor">
                    <option selected="selected" value={{$setor->id}}> {{$setor->name}} </option>
                    @foreach($setors as $s)
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

                <br><label>Data Inicial : </label>
                <br><input class="form-control" type="date" id="data_inicial" name="data_inicial" value={{$psi->data_inicial}}>
                <br><label>Data Final : </label>
                <br><input class="form-control" type="date" id="data_final" name="data_final" value={{$psi->data_final}}>

                <br><label>Funcionário Responsável : </label>
                <br><select class="form-control" id="id_funcionario" name="id_funcionario">
                    <option selected="selected" value={{$funcionario->id}}> {{$funcionario->name}} </option>
                    @foreach($funcionarios as $f)
                        @unless ($f->id === $funcionario->id)
                            <option value={{$f->id}}> {{$f->name}} </option>
                        @endunless
                    @endforeach
                </select>

                <br><label>Convertido em Contratação : </label>
                @unless ($psi->convertido == '1')
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="0" >
                    <label class="form-check-label" for="convertido"> <b>SIM </b></label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="1" checked>
                    <label class="form-check-label" for="convertido"> <b>NÃO </b></label>
                    </div>
                @endunless
                @unless ($psi->convertido == '0')
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="0" checked>
                    <label class="form-check-label" for="convertido"> <b>SIM </b></label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="convertido" name="convertido" value="1" >
                    <label class="form-check-label" for="convertido"> <b>NÃO </b></label>
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