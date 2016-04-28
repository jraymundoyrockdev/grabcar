<?php

namespace TsuperNgBuhayTNVS\Http\Controllers;

use TsuperNgBuhayTNVS\Http\Requests;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;
use TsuperNgBuhayTNVS\Repositories\Interfaces\ExpenseTransactionInterface;

class DashboardController extends Controller
{
    private $daysBank = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    private $fieldReports = [
        'income-details' => [
            'grab_cash' => 0,
            'grab_card' => 0,
            'grab_incentives' => 0,
            'uber_cash' => 0,
            'uber_card' => 0,
            'rent' => 0
        ],
        'totals' => [
            'income' => 0,
            'expense' => 0
        ]
    ];

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
        list($incomeDetailedTransactions, $incomeDetailTotals) = $this->getIncomeTransactionDetails();
        
        return view('dashboard.index', [
            'incomeTotal' => $incomeTotal,
            'expenseTotal' => $expenseTotal,
            'transactionDailyTotals' => $transactionDailyTotals,
            'incomeDetailedTransactions' => $incomeDetailedTransactions,
            'incomeDetailTotals' => $incomeDetailTotals
        ]);
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    private function getIncomeTransactionDetails($from = 'monday', $to = 'sunday')
    {
        $incomeDetailTotals = $this->fieldReports['income-details'];

        $incomeTransactions = $this->income->getDetailedTransactions(
            $this->getDateThisWeek($from),
            $this->getDateThisWeek($to)
        );

        $incomeTransactionDaily = $this->buildZeroFieldsReport('income-details');

        foreach ($incomeTransactions as $income) {
            $incomeTransactionDaily[$income->transaction_date][$income->type] += $income->amount;
            $incomeDetailTotals[$income->type]+=$income->amount;
        }

        return [$incomeTransactionDaily, $incomeDetailTotals];
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

        $transactionDailyTotals = $this->buildZeroFieldsReport('totals');

        $weekIncomeTransactions = $this->income->getTransactionsFromTo(
            $this->getDateThisWeek($from),
            $this->getDateThisWeek($to)
        );

        $weekExpenseTransactions = $this->expense->getTransactionsFromTo(
            $this->getDateThisWeek($from),
            $this->getDateThisWeek($to)
        );

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
     * @param string $reportType
     * @return array
     */
    private function buildZeroFieldsReport($reportType = 'totals')
    {
        $days = [];

        foreach ($this->daysBank as $day) {

            $todayUnixTimeStamp = strtotime($day . ' this week');

            $today = date('Y-m-d', $todayUnixTimeStamp);

            $days[$today] = $this->fieldReports[$reportType];

            $days[$today]['date'] = date('M-j', $todayUnixTimeStamp);
        }

        return $days;
    }

}
