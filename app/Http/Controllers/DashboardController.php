<?php

namespace TsuperNgBuhayTNVS\Http\Controllers;

use TsuperNgBuhayTNVS\Http\Requests;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;

class DashboardController extends Controller
{
    /**
     * @var IncomeTransactionInterface
     */
    private $income;

    /**
     * DashboardController constructor.
     * @param IncomeTransactionInterface $income
     */
    public function __construct(IncomeTransactionInterface $income)
    {
        $this->income = $income;
    }

    public function index()
    {
        list($incomeTotal, $incomeDailyTotals) = $this->getIncomeTotals('monday', 'sunday');

        return view('dashboard.index', ['incomeTotal' => $incomeTotal, 'incomeDailyTotals' => $incomeDailyTotals]);
    }

    /**
     * Get daily totals and weekly total
     *
     * @param $from
     * @param $to
     * @return array
     */
    private function getIncomeTotals($from, $to)
    {
        $total = 0;

        $dateFrom = $this->getDateThisWeek($from);
        $dateTo = $this->getDateThisWeek($to);

        $incomeTotals = $this->createZeroTotalsPerDay(7);
        $totalsThisWeek = $this->income->getTransactionsFromTo($dateFrom, $dateTo);

        foreach ($totalsThisWeek as $totalThisWeek) {
            $incomeTotals[$totalThisWeek->transaction_date]['total'] = $totalThisWeek->total;
            $total += $totalThisWeek->total;
        }

        return [$total, $incomeTotals];
    }

    /**
     * Get the date this week via 'n' day
     *
     * @param int $day
     * @return mixed
     */
    private function getDateThisWeek($day)
    {
        return date('Y-m-d', strtotime($day . ' this week'));
    }

    /**
     * Create zero totals per day
     *
     * @return array
     */
    private function createZeroTotalsPerDay()
    {
        $days = [];
        $daysBank = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($daysBank as $day) {

            $todayUnixTimeStamp = strtotime($day . ' this week');

            $today = date('Y-m-d', $todayUnixTimeStamp);

            $days[$today]['total'] = 0;

            $days[$today]['date'] = date('M-j', $todayUnixTimeStamp);
        }

        return $days;
    }
}
