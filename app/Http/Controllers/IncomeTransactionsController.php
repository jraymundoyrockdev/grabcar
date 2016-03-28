<?php

namespace GrabCarJem\Http\Controllers;

use GrabCarJem\Http\Requests;
use GrabCarJem\Http\Requests\IncomeTransactionRequest;
use GrabCarJem\Repositories\Interfaces\IncomeTransactionInterface;

class IncomeTransactionsController extends Controller
{
    /**
     * @var IncomeTransactionInterface
     */
    private $income;

    /**
     * IncomeTransactionsController constructor.
     * @param IncomeTransactionInterface $income
     */
    public function __construct(IncomeTransactionInterface $income)
    {
        $this->income = $income;
    }

    public function create()
    {
        return view('income.create');
    }

    /**
     * Save transaction
     *
     * @param IncomeTransactionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IncomeTransactionRequest $request)
    {
        $income = $this->income->create($request->all());

        if ($income) {
            \Session::flash('flash_success', 'Sucessfully Sav');
        }

        return redirect()->route('income.create');
    }
}
