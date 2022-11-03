@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="card-employees">Dashboard</h1>
@stop

@section('content')

    <p> Data de hoje: {{ $result }} </p>

    <div class="cards">

        <div class="card" id="dash_blue">
            <div class="inner-card">
                <div class="infos">
                    <p class="value">{{ $funcionarios }} </p>
                    <p class="title">Funcionários</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-users fa-3x"></i>
                </div>
            </div>
            <a class="more" href="#">
                <div>
                    Mais informações
                    <i class="fas fa-fw fa-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="card" id="dash_green">
            <div class="inner-card">
                <div class="infos">
                    <p class="value">{{ $contratadosmes }}</p>
                    <p class="title">Contratados neste mês</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-user-plus fa-3x"></i>
                </div>
            </div>
            <a class="more" href="#">
                <div>
                    Mais informações
                    <i class="fas fa-fw fa-chevron-right"></i>
                </div>
            </a>
        </div>

        <div class="card" id="dash_yellow">
            <div class="inner-card">
                <div class="infos">
                    <p class="value">{{ $psiativo }} </p>
                    <p class="title">PSI ativos </p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-book fa-3x"></i>
                </div>
            </div>
            <a class="more" href="#">
                <div>
                    Mais informações
                    <i class="fas fa-fw fa-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>

    <!-- DONUT CHART -->
    <div class="charts">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Cargos por setor</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /DONUT CHART -->

        <div class="charts">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Contratações por mês</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="LineChart"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>


    <!-- /TABELA DE BOLSAS -->

    <!-- <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Bolsas</h3>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Funcionário</th>
                        <th>Início</th>
                        <th>Término</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bolsas as $bolsa)
                        <tr>
                            <td>
                                {{ $bolsa->id }}
                            </td>
                            <td>{{ $bolsa->name }}</td>
                            <td>
                                @php
                                    $data_inicial = date_create($bolsa->data_inicial);
                                    $data_inicial = date_format($data_inicial, 'd/m/Y');
                                @endphp
                                {{ $data_inicial }}
                            </td>
                            <td>
                                @php
                                    $data_final = date_create($bolsa->data_final);
                                    $data_final = date_format($data_final, 'd/m/Y');
                                @endphp
                                {{ $data_final }}
                            </td>
                            <td>
                                R${{ $bolsa->valor }}
                            </td>
                            <td>
                                @if ($bolsa->renovado == 1)
                                    <i class="text-success"> Renovado </i>
                                @else
                                    <i class="text-danger"> Finalizado </i>
                                @endif
                            </td>
                            <td>
                                <a href="/bolsas/{{ $bolsa->id }}" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
    <!-- /TABELA DE BOLSAS -->

    <!-- <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Relatório de Funcionários com Bolsa : </h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Funcionário</th>
                                                    <th>Início</th>
                                                    <th>Término</th>
                                                    <th>Valor</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bolsas as $bolsa)
    <tr>
                                                        <td>{{ $bolsa->name }}</td>
                                                        <td>
                                                            @php
                                                                $data_inicial = date_create($bolsa->data_inicial);
                                                                $data_inicial = date_format($data_inicial, 'd/m/Y');
                                                            @endphp
                                                            {{ $data_inicial }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $data_final = date_create($bolsa->data_final);
                                                                $data_final = date_format($data_final, 'd/m/Y');
                                                            @endphp
                                                            {{ $data_final }}
                                                        </td>
                                                        <td>
                                                            R${{ $bolsa->valor }}
                                                        </td>
                                                        <td>
                                                            @if ($bolsa->renovado == 1)
    <i class="text-success"> Renovado </i>
@else
    <i class="text-danger"> Não-renovado </i>
    @endif
                                                        </td>
                                                    </tr>
    @endforeach
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                </div> -->


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
    <!-- ChartJS -->
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('donutChart').getContext('2d');
        var dataAux = {!! json_encode($cargos->toArray()) !!};
        var labels = [];
        var data = [];
        dataAux.forEach(geraLabels);
        dataAux.forEach(geraData);

        function geraLabels(item, index, arr) {
            labels[index] = item.setores;
        }

        function geraData(item, index, arr) {
            data[index] = item.cargos;
        }

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: labels,
                datasets: [{
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    data: data,
                    
                }]
            },

            // Configuration options go here
            options: {
                responsive: true
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('LineChart').getContext('2d');
        var dataAux = {!! json_encode($contratacoes->toArray()) !!};
        var labels = [];
        var data = [];
        dataAux.forEach(geraLabels);
        dataAux.forEach(geraData);

        function geraLabels(item, index, arr) {
            labels[index] = item.month_year;
            console.log("label", item.month_year);
        }

        function geraData(item, index, arr) {
            data[index] = item.funcionarios;
        }

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: labels,
                datasets: [{
                    borderColor: '#f56954',
                    data: data,
                    fill: false,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 10
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1 // this worked as expected          
                        }
                    }]
                }
            }
        });
    </script>

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
