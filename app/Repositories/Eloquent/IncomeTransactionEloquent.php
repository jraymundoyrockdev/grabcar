<?php

namespace TsuperNgBuhayTNVS\Repositories\Eloquent;

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

}
