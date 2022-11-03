@extends('adminlte::page')

@section('title', 'PSI')

@section('content_header')
    <h1>Lista de Processos Seletivos Internos</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Funcionário Responsável</th>
                            <th>Setor</th>
                            <th>Cargo</th>
                            <th>Data de Início</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($psis as $psi)
                            <tr>
                                <td>{{ $psi->funcionario }}</td>
                                <td>{{ $psi->setor }}</td>
                                <td>{{ $psi->cargo }}</td>      
                                <td>
                                @php
                                    $data = date_create($psi->data_inicial);
                                    $data = date_format($data, 'd/m/Y');
                                @endphp
                                {{ $data }}
                                </td>                            
                                <td>
                                    <div class="table-actions">
                                        <a href="/psis/{{ $psi->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('psis.destroy', $psi->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $psis->links()}} --}}

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
