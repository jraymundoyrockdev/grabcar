<?php

namespace TsuperNgBuhayTNVS\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use TsuperNgBuhayTNVS\Models\IncomeTransaction;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;

class IncomeTransactionEloquent implements IncomeTransactionInterface
{
    /**
     * @var IncomeTransaction
     */
    protected $income;

    /**
     * @param IncomeTransaction $income
     * @internal param FundItem $fundItem
     */
    public function __construct(IncomeTransaction $income)
    {
        $this->income = $income;
    }

    /**
     * @param $payload
     * @return bool
     */
    public function create($payload)
    {
        return $this->income->create($payload);
    }

    /**
     * Fetch all income
     *
     * @return mixed
     */
    public function all()
    {
        return $this->income->orderBy('transaction_date_time', 'desc')->take(100)->get();
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
        return $this->income->select(DB::raw('SUM(fare) AS income_total, CAST(transaction_date_time AS date) AS transaction_date'))
            ->whereBetween('transaction_date_time', [$from, $to])
            ->groupBy(DB::raw('CAST(transaction_date_time AS date)'))
            ->get();
    }

}
