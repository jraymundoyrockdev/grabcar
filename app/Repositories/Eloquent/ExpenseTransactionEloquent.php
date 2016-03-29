<?php

namespace TsuperNgBuhayTNVS\Repositories\Eloquent;

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
}
