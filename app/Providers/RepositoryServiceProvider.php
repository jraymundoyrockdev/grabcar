<?php namespace TsuperNgBuhayTNVS\Providers;

use TsuperNgBuhayTNVS\Repositories\Eloquent\ExpenseTransactionEloquent;
use TsuperNgBuhayTNVS\Repositories\Eloquent\IncomeTransactionEloquent;
use TsuperNgBuhayTNVS\Repositories\Interfaces\ExpenseTransactionInterface;
use TsuperNgBuhayTNVS\Repositories\Interfaces\IncomeTransactionInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repository IoC bindings
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IncomeTransactionInterface::class, IncomeTransactionEloquent::class);
        $this->app->bind(ExpenseTransactionInterface::class, ExpenseTransactionEloquent::class);
    }
}
