<?php

Route::group(['middleware' => ['web']], function () {
    Route::resource('income', 'IncomeTransactionsController');
    Route::resource('expense', 'ExpenseTransactionsController');
});
