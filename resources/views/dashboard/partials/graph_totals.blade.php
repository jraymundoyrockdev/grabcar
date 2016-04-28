<section class="widget">

    <div class="body no-margin">

        <div id="totals" style="min-width: 265px; height: 400px; margin: 0 auto;"></div>

        <table id="totals_list" style="display: none;">
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
                    <div class="key">Total Income</div>
                    <div class="value">{!! number_format($incomeTotal) !!}</div>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <div class="key">Total Expense</div>
                    <div class="value">{!! number_format($expenseTotal) !!}</div>
                </div>
            </div>
        </div>

    </div>
</section>