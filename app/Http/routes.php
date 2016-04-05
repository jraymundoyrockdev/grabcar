<?php

Route::group(['middleware' => ['web']], function () {
    Route::resource('/', 'DashboardController', ['only' => 'index']);
    Route::resource('income', 'IncomeTransactionsController');
    Route::resource('expense', 'ExpenseTransactionsController');
    Route::resource('dashboard', 'DashboardController', ['only' => 'index']);
    Route::get('report/income', ['as' => 'report.income', 'uses' => 'ReportsController@showIncome']);
    Route::get('report/expense', ['as' => 'report.expense', 'uses' => 'ReportsController@showExpense']);
});
