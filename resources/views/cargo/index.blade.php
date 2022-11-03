@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <h1>Lista de Cargos</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Cargo</th>
                            <th>Salário Base</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr>
                                <td>{{ $cargo->name }}</td>
                                <td>{{ $cargo->salario_base }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="/cargos/{{ $cargo->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cargos.destroy', $cargo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $cargos->links()}} --}}

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
          title: 'Cargo deletado com sucesso.'
        })
      });
    });
</script>
    <script>
        console.log('Hi!');
    </script>
@stop
