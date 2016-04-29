<section class="widget">

    <div class="body no-margin">

        <div id="detailed_income_transactions"
             style="min-width: 265px; height: 400px; margin: 0 auto;"></div>

        <table id="detailed_income_transactions_list" style="display: none;">
            <thead>
            <tr>
                <th></th>
                <th>Grab Cash</th>
                <th>Grab Card</th>
                <th>Grab Incentives</th>
                <th>Uber Cash</th>
                <th>Uber Card</th>
            </tr>
            </thead>
            <tbody>

            @foreach($incomeDetailedTransactions as $income)
                <tr>
                    <th>{!! $income['date'] !!}</th>
                    <td>{!! $income['grab_cash'] !!}</td>
                    <td>{!! $income['grab_card']!!}</td>
                    <td>{!! $income['grab_incentives'] !!}</td>
                    <td>{!! $income['uber_cash'] !!}</td>
                    <td>{!! $income['uber_card'] !!}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div class="visits-info well well-sm">
            <div class="row">
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-money"></i> Grab Cash</div>
                    <div class="value">{!! number_format($incomeDetailTotals['grab_cash']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-credit-card"></i> Grab Card</div>
                    <div class="value">{!! number_format($incomeDetailTotals['grab_card']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-plus"></i> Grab Incen</div>
                    <div class="value">{!! number_format($incomeDetailTotals['grab_incentives']) !!}</div>
                </div>

                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-money"></i> Uber Cash</div>
                    <div class="value">{!! number_format($incomeDetailTotals['uber_cash']) !!}</div>
                </div>

                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-credit-card"></i> Uber Card</div>
                    <div class="value">{!! number_format($incomeDetailTotals['uber_card']) !!}</div>
                </div>
                <div class="col-sm-2 col-xs-2">
                    <div class="key"><i class="fa fa-car"></i> Car Rent</div>
                    <div class="value">{!! number_format($incomeDetailTotals['rent']) !!}</div>
                </div>
            </div>
        </div>

    </div>
</section>