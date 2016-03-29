<?php

Route::group(['middleware' => ['web']], function () {
    Route::resource('income', 'IncomeTransactionsController');
    Route::resource('expense', 'ExpenseTransactionsController');
    Route::get('report/income', ['as' => 'report.income', 'uses' => 'ReportsController@showIncome']);
    Route::get('report/expense', ['as' => 'report.expense', 'uses' => 'ReportsController@showExpense']);
});
