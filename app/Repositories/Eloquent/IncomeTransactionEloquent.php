<?php

namespace GrabCarJem\Repositories\Eloquent;

use GrabCarJem\Models\IncomeTransaction;
use GrabCarJem\Repositories\Interfaces\IncomeTransactionInterface;

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

}
