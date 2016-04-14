<?php

namespace TsuperNgBuhayTNVS\Http\Controllers;

use TsuperNgBuhayTNVS\Http\Requests;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;
use TsuperNgBuhayTNVS\Repositories\Interfaces\ExpenseTransactionInterface;

class DashboardController extends Controller
{
    /**
     * @var IncomeTransactionInterface
     */
    private $income;
    /**
     * @var ExpenseTransactionInterface
     */
    private $expense;

    /**
     * DashboardController constructor.
     * @param IncomeTransactionInterface $income
     * @param ExpenseTransactionInterface $expense
     */
    public function __construct(IncomeTransactionInterface $income, ExpenseTransactionInterface $expense)
    {
        $this->income = $income;
        $this->expense = $expense;
    }

    public function index()
    {
        list($incomeTotal, $expenseTotal, $transactionDailyTotals) = $this->getTransactionTotals();

        return view('dashboard.index', [
            'incomeTotal' => $incomeTotal,
            'expenseTotal' => $expenseTotal,
            'transactionDailyTotals' => $transactionDailyTotals
        ]);
    }

    /**
     * Get daily totals and weekly total
     *
     * @param $from
     * @param $to
     * @return array
     */
    private function getTransactionTotals($from = 'monday', $to = 'sunday')
    {
        $incomeTotal = 0;
        $expenseTotal = 0;

        $dateFrom = $this->getDateThisWeek($from);
        $dateTo = $this->getDateThisWeek($to);

        $transactionDailyTotals = $this->createZeroTotalsPerDay();

        $weekIncomeTransactions = $this->income->getTransactionsFromTo($dateFrom, $dateTo);
        $weekExpenseTransactions = $this->expense->getTransactionsFromTo($dateFrom, $dateTo);

        foreach ($weekIncomeTransactions as $income) {
            $transactionDailyTotals[$income->transaction_date]['income'] = $income->income_total;
            $incomeTotal += $income->income_total;
        }

        foreach ($weekExpenseTransactions as $expense) {
            $transactionDailyTotals[$expense->transaction_date]['expense'] = $expense->expense_total;
            $expenseTotal += $expense->expense_total;
        }

        return [$incomeTotal, $expenseTotal, $transactionDailyTotals];
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

            $days[$today]['income'] = 0;

            $days[$today]['expense'] = 0;

            $days[$today]['date'] = date('M-j', $todayUnixTimeStamp);
        }

        return $days;
    }
}
