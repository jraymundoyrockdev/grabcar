<?php

Route::group(['middleware' => ['web']], function () {
    Route::resource('transaction', 'TransactionController');
});
