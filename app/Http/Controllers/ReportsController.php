<?php

namespace TsuperNgBuhayTNVS\Http\Controllers;

use TsuperNgBuhayTNVS\Http\Requests;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;

class ReportsController extends Controller
{
    /**
     * @var IncomeTransactionInterface
     */
    private $income;

    /**
     * ReportsController constructor.
     * @param IncomeTransactionInterface $income
     */
    public function __construct(IncomeTransactionInterface $income)
    {
        $this->income = $income;
    }

    public function showIncome()
    {
        $incomes = $this->income->all();

        return view('reports.income', ['incomes' => $incomes]);
    }
}
