<?php

namespace GrabCarJem\Http\Controllers;

use Illuminate\Http\Request;

use GrabCarJem\Http\Requests;

class ExpenseTransactionController extends Controller
{
    public function create()
    {
        return view('expense.create');
    }
}
