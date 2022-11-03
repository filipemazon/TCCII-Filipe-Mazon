@extends('adminlte::page')

@section('title', 'Setors')

@section('content_header')
    <h1>Lista de Setores</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setors as $setor)
                            <tr>
                                <td>{{ $setor->name }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="/setors/{{ $setor->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('setores.destroy', $setor->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $setors->links()}} --}}

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
          title: 'Setor deletado com sucesso.'
        })
      });
    });
</script>
    <script>
        console.log('Hi!');
    </script>
@stop
