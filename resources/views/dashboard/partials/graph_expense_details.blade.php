<section class="widget">

    <div class="body no-margin">

        <div id="detailed_expense_transactions"
             style="min-width: 265px; height: 400px; margin: 0 auto;"></div>

        <table id="detailed_expense_transactions_list" style="display: none;">
            <thead>
            <tr>
                <th></th>
                <th>Gas / Fuel</th>
                <th>Phone Load</th>
                <th>Driver's Rent</th>
                <th>Grab Top Up</th>
                <th>Car Wash</th>
                <th>Driver Salary</th>
            </tr>
            </thead>
            <tbody>
            @foreach($expenseDetailedTransactions as $expense)
                <tr>
                    <th>{!! $expense['date'] !!}</th>
                    <th>{!! $expense['gas'] !!}</th>
                    <td>{!! $expense['load'] !!}</td>
                    <td>{!! $expense['rent']!!}</td>
                    <td>{!! $expense['top_up'] !!}</td>
                    <td>{!! $expense['car_wash'] !!}</td>
                    <td>{!! $expense['driver_salary'] !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="visits-info well well-sm">
            <div class="row">
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-beer"></i> Gas / Fuel&nbsp;</div>
                    <div class="value">{!! number_format($expenseDetailTotals['gas']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-mobile-phone"></i> Phone Load</div>
                    <div class="value">{!! number_format($expenseDetailTotals['load']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-bed"></i> Driver's Rent</div>
                    <div class="value">{!! number_format($expenseDetailTotals['rent']) !!}</div>
                </div>

                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-credit-card"></i> Grab Top-Up</div>
                    <div class="value">{!! number_format($expenseDetailTotals['top_up']) !!}</div>
                </div>

                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-car"></i> Car Wash</div>
                    <div class="value">{!! number_format($expenseDetailTotals['car_wash']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-money"></i> Driver Salary</div>
                    <div class="value">{!! number_format($expenseDetailTotals['driver_salary']) !!}</div>
                </div>
            </div>
        </div>
        
    </div>

</section>