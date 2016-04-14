@extends('layouts.master')
@section('main-body')

    <h2 class="page-title">Dashboard
        <small>Transactions</small>
    </h2>

    <div class="row">
        <div class="col-lg-12">
            <section class="widget">

                <div class="body no-margin">

                    <div id="container" style="min-width: 265px; height: 400px; margin: 0 auto;"></div>

                    <table id="datatable" style="display: none;">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Income</th>
                            <th>Expense</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($transactionDailyTotals as $transaction)
                            <tr>
                                <th>{!! $transaction['date'] !!}</th>
                                <td>{!! $transaction['income'] !!}</td>
                                <td>{!! $transaction['expense']!!}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="visits-info well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="key"><i class="fa fa-users"></i> Total Income</div>
                                <div class="value">{!! number_format($incomeTotal) !!}</div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="key"><i class="fa fa-users"></i> Total Expense</div>
                                <div class="value">{!! number_format($expenseTotal) !!}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>

@endsection

@section('module-scripts')

    <script type="text/javascript">

        $(function () {
            $('#container').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Daily Total Transactions'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'Pesos'
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
