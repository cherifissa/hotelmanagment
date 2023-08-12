@extends('layouts.manager.app')
@section('titre')
    manager
@endsection

@section('content')
    <section class="content bg-gradient-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div id="expense-chart"></div>
                </div>
                <div class="col-md-6">
                    <div id="gain-chart"></div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div id="service-chart"></div>
                </div>
                <div class="col-md-6">
                    <div id="service-gain-chart"></div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var expenseData = @json($expenseData); // Use the correct variable name
            var serviceData = @json($service); // Use the correct variable name

            if (expenseData.length > 0) {
                Highcharts.chart('expense-chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Bénéfice total par date de réservation'
                    },
                    xAxis: {
                        categories: expenseData.map(item => item.date_arrive)
                    },
                    yAxis: {
                        title: {
                            text: 'Bénéfice total'
                        }
                    },
                    series: [{
                        name: 'Bénéfice total',
                        data: expenseData.map(item => parseFloat(item
                            .total_expense))
                    }]
                });
                Highcharts.chart('gain-chart', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Bénéfice total par date de réservation'
                    },
                    xAxis: {
                        categories: expenseData.map(item => item.date_arrive)
                    },
                    yAxis: {
                        title: {
                            text: 'Bénéfice total'
                        }
                    },
                    series: [{
                        name: 'Bénéfice total',
                        data: expenseData.map(item => parseFloat(item
                            .total_expense))
                    }]
                });
            } else {
                document.getElementById('expense-chart').innerHTML =
                    "<h3  class='text-center'>Pas de données disponibles.</h3>";
            }

            if (serviceData.length > 0) {
                Highcharts.chart('service-chart', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Bénéfice total du restaurant par date'
                    },
                    xAxis: {
                        categories: serviceData.map(item => formatDate(item
                            .created_at))
                    },
                    yAxis: {
                        title: {
                            text: 'Bénéfice total'
                        }
                    },
                    series: [{
                        name: 'Bénéfice total',
                        data: serviceData.map(item => parseFloat(item
                            .total_expense))
                    }]
                });
                Highcharts.chart('service-gain-chart', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Bénéfice total du restaurant par date'
                    },
                    xAxis: {
                        categories: serviceData.map(item => formatDate(item
                            .created_at))
                    },
                    yAxis: {
                        title: {
                            text: 'Bénéfice total'
                        }
                    },
                    series: [{
                        name: 'Bénéfice total',
                        data: serviceData.map(item => parseFloat(item
                            .total_expense))
                    }]
                });
            } else {
                document.getElementById('expense-chart').innerHTML =
                    "<h3  class='text-center'>Pas de données disponibles.</h3>";
            }
        });

        function formatDate(datetime) {
            const date = new Date(datetime);
            const year = date.getFullYear();
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    </script>
@endsection
