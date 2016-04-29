<?php

namespace TsuperNgBuhayTNVS\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use TsuperNgBuhayTNVS\Models\ExpenseTransaction;
use TsuperNgBuhayTNVS\Repositories\Interfaces\ExpenseTransactionInterface;

class ExpenseTransactionEloquent implements ExpenseTransactionInterface
{
    /**
     * @var ExpenseTransaction
     */
    protected $expense;

    /**
     * @param ExpenseTransaction $expense
     * @internal param FundItem $fundItem
     */
    public function __construct(ExpenseTransaction $expense)
    {
        $this->expense = $expense;
    }

    /**
     * @param $payload
     * @return bool
     */
    public function create($payload)
    {
        return $this->expense->create($payload);
    }

    /**
     * Get last transactions from to date
     *
     * @param int $from
     * @param $to
     * @return mixed
     */
    public function getTransactionsFromTo($from, $to)
    {
        return $this->expense->select(DB::raw('SUM(amount) AS expense_total, CAST(transaction_date_time AS date) AS transaction_date'))
            ->whereBetween('transaction_date_time', [$from, $to])
            ->groupBy(DB::raw('CAST(transaction_date_time AS date)'))
            ->get();
    }

    /**
     * Get detailed expense transaction
     *
     * @param int $from
     * @param $to
     * @return mixed
     */
    public function getDetailedTransactions($from = null, $to = null)
    {
        return $this->expense->select(DB::raw('id, amount, type, CAST(transaction_date_time AS date) AS transaction_date'))
            ->whereBetween('transaction_date_time', [$from, $to])
            ->get();
    }
}
