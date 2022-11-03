@extends('adminlte::page')

@section('title', 'Férias')

@section('content_header')
    <h1>Lista de Férias</h1>
@stop

@section('content')
    <div class="funcs">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Funcionário</th>
                            <th>Data do Ínicio</th>
                            <th>Data do Fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ferias as $feria)
                            <tr>
                                <td>{{ $feria->funcionario }}</td>
                                <td>
                                @php
                                    $datai = date_create($feria->data_inicial);
                                    $datai = date_format($datai, 'd/m/Y');
                                @endphp
                                {{ $datai }}
                                </td>
                                <td>
                                @php
                                    $dataf = date_create($feria->data_final);
                                    $dataf = date_format($dataf, 'd/m/Y');
                                @endphp
                                {{ $dataf }}
                                </td>                           
                                <td>
                                    <div class="table-actions">
                                        <a href="/ferias/{{ $feria->id }}" class="text-muted">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('ferias.destroy', $feria->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button id="swalDefaultSuccess" class="fas fa-trash" type="submit"></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        <!-- em caso de querer paginar  -->
                        {{-- {{ $ferias->links()}} --}}

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
