<?php

namespace TsuperNgBuhayTNVS\Http\Controllers;

use TsuperNgBuhayTNVS\Http\Requests;
use TsuperNgBuhayTNVS\Http\Requests\ExpenseTransactionRequest;
use TsuperNgBuhayTNVS\Repositories\Interfaces\ExpenseTransactionInterface;

class ExpenseTransactionsController extends Controller
{
    /**
     * @var ExpenseTransactionInterface
     */
    private $expense;

    private $expenseList = [
        'gas' => 'Gas',
        'load' => 'Sim Card Load',
        'rent' => 'Driver\'s Rent',
        'top_up' => 'Grab Top Up',
        'car_wash' => 'Car Wash',
        'driver_salary' => 'Driver Salary'
    ];

    /**
     * IncomeTransactionsController constructor.
     * @param ExpenseTransactionInterface $expense
     */
    public function __construct(ExpenseTransactionInterface $expense)
    {
        $this->expense = $expense;
    }

    public function create()
    {
        return view('expense.create', ['expenseList' => $this->expenseList]);
    }

    /**
     * Save transaction
     *
     * @param ExpenseTransactionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ExpenseTransactionRequest $request)
    {
        $expense = $this->expense->create($request->all());

        if ($expense) {
            \Session::flash('flash_success', 'Successfully Save');
        }

        return redirect()->route('expense.create');
    }
}
