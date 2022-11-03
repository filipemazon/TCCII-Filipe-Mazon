@extends('adminlte::page')

@section('title', 'Feedbacks')

@section('content_header')
    <h1>Lista de Feedbacks</h1>
@stop

@section('content')
<div class="funcs">
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>Funcionário</th>
                        <th>Data</th>
                        <th>Resumo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->name }}</td>
                            <td>
                                @php
                                    $data = date_create($feedback->data);
                                    $data = date_format($data, 'd/m/Y');
                                @endphp
                                {{ $data }}
                            </td>
                            <td>{{ $feedback->resumo }}</td>
                            <td>
                                <div class="table-actions">
                                    <a href="/feedbacks/{{ $feedback->id }}" class="text-muted">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    <!-- em caso de querer paginar  -->
                    {{-- {{ $feedbacks->links()}} --}}

                </tbody>
            </table>
        </div>
    </div>
    <!-- /TABELA DE BOLSAS -->
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop