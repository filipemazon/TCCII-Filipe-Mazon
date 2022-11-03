@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
    <h1>Lista de Funcionários</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Setor</th>
                            <th>Status</th>
                            <th>Contratação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->cargo }}</td>
                                <td>{{ $funcionario->setor }}</td>
                                <td>
                                    @if ($funcionario->ativo == 1)
                                        <i class="text-success"> Ativo </i>
                                    @else
                                        <i class="text-danger"> Desligado </i>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $data = date_create($funcionario->contratacao);
                                        $data = date_format($data, 'd/m/Y');
                                    @endphp
                                    {{ $data }}
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="/funcionarios/{{ $funcionario->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $funcionarios->links()}} --}}

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
  
      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Funcionário deletado com sucesso.'
        })
      });
    });
</script>
    <script>
        console.log('Hi!');
    </script>
@stop
