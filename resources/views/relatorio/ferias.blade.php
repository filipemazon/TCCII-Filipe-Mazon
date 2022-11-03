
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="card-employees"> Férias</h1>
@stop

@section('content')

    <!-- /TABELA DE ADVERTÊNCIAS -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">  </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Funcionário</th>
                        <th>Data Inicial</th>
                        <th>Data Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ferias as $ferias)
                        <tr>
                            <td>{{ $ferias->funcionario }}</td>   
                            <td>
                            @php
                                $datai = date_create($ferias->data_inicial);
                                $datai = date_format($datai, 'd/m/Y');
                            @endphp
                            {{ $datai }}
                            </td>       
                            <td>
                            @php
                                $dataf = date_create($ferias->final);
                                $dataf = date_format($dataf, 'd/m/Y');
                            @endphp
                            {{ $dataf }}
                            </td>                                    
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

    </div>

    @stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        console.log('Hi!');
    </script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    @stop