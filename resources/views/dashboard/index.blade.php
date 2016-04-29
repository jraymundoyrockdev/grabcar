@extends('layouts.master')
@section('main-body')

    <p>&nbsp;</p>
    <h2 class="page-title">Dashboard
        <small>Transactions</small>
    </h2>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.partials.graph_totals')
        </div>

        <div class="col-lg-6">
            @include('dashboard.partials.graph_income_details')
        </div>

        <div class="col-lg-6">
            @include('dashboard.partials.graph_expense_details')
        </div>
    </div>

@endsection

@section('module-scripts')

    <script type="text/javascript">

        $(function () {
            $('#totals').highcharts({
                colors: ['#4ab0ce', '#f25118', '#efb31d', '#e6e6e6', '#f2c34d', '#A308FD'],
                data: {
                    table: 'totals_list'
                },
                chart: {
                    type: 'areaspline',
                    backgroundColor: null,
                    style: {
                        color: '#FFFFFF'
                    }
                },
                title: {
                    text: 'Daily Total Transactions',
                    style: {
                        color: '#FFFFFF'
                    }
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Pesos',
                        style: {
                            'color': '#FFFFFF'
                        }
                    },
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    },
                    gridLineColor: '#A9A9A9'
                },
                xAxis: {
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    },
                },
                legend: {
                    itemStyle: {
                        color: '#FFFFFF'
                    }
                },
                exporting: {
                    enabled: true
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                                $.number(this.point.y, 2);
                    }
                }
            });

            $('#detailed_income_transactions').highcharts({
                colors: ['#4ab0ce', '#f25118', '#efb31d', '#e6e6e6', '#800000', '#A308FD'],
                data: {
                    table: 'detailed_income_transactions_list'
                },
                chart: {
                    type: 'column',
                    backgroundColor: null,
                    style: {
                        color: '#FFFFFF'
                    }
                },
                title: {
                    text: 'Detailed Daily Income Transactions',
                    style: {
                        color: '#FFFFFF'
                    }
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Pesos',
                        style: {
                            'color': '#FFFFFF'
                        }
                    },
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    }
                },
                xAxis: {
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    }
                },
                legend: {
                    itemStyle: {
                        color: '#FFFFFF'
                    }
                },
                exporting: {
                    enabled: true
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                                $.number(this.point.y, 2);
                    }
                }
            });

            $('#detailed_expense_transactions').highcharts({
                colors: ['#4ab0ce', '#f25118', '#efb31d', '#e6e6e6', '#800000', '#A308FD'],
                data: {
                    table: 'detailed_expense_transactions_list'
                },
                chart: {
                    type: 'column',
                    backgroundColor: null,
                    style: {
                        color: '#FFFFFF'
                    }
                },
                title: {
                    text: 'Detailed Daily Expense Transactions',
                    style: {
                        color: '#FFFFFF'
                    }
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Pesos',
                        style: {
                            'color': '#FFFFFF'
                        }
                    },
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    }
                },
                xAxis: {
                    labels: {
                        style: {
                            'color': '#FFFFFF',
                            'font-size': '13px'
                        }
                    }
                },
                legend: {
                    itemStyle: {
                        color: '#FFFFFF'
                    }
                },
                exporting: {
                    enabled: true
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.series.name + '</b><br/>' +
                                $.number(this.point.y, 2);
                    }
                }
            });
        });
    </script>

@endsection
