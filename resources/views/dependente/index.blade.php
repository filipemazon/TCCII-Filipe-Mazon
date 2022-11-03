@extends('adminlte::page')

@section('title', 'Dependentes')

@section('content_header')
    <h1>Lista de Dependentes</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Nome do Funcionário</th>
                            <th>Nome do Dependente</th>
                            <th>Grau de Parentesco</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dependentes as $dependente)
                            <tr>
                                <td>{{ $dependente->funcionario }}</td>
                                <td>{{ $dependente->name }}</td>
                                <td>{{ $dependente->parentesco }}</td>                            
                                <td>
                                    <div class="table-actions">
                                        <a href="/dependentes/{{ $dependente->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dependentes.destroy', $dependente->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $dependentes->links()}} --}}

                    </tbody>
                </table>
            </div>
        </div>
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
          title: 'Atestado deletado com sucesso.'
        })
      });
    });
</script>
@stop
