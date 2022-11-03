@extends('adminlte::page')

@section('title', 'Advertências')

@section('content_header')
    <h1>Lista de Advertências</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($advertencias as $advertencia)
                            <tr>
                                <td>{{ $advertencia->funcionario }}</td>
                                <td>
                                @php
                                    $data = date_create($advertencia->data);
                                    $data = date_format($data, 'd/m/Y');
                                @endphp
                                {{ $data }}
                                </td>
                                <td>{{ $advertencia->motivo }}</td>                            
                                <td>
                                    <div class="table-actions">
                                        <a href="/advertencias/{{ $advertencia->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('advertencias.destroy', $advertencia->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $advertencias->links()}} --}}

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
          title: 'Advertência deletada com sucesso.'
        })
      });
    });
</script>
@stop
