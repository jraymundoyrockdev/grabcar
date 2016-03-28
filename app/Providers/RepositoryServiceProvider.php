<?php namespace GrabCarJem\Providers;

use GrabCarJem\Repositories\Eloquent\IncomeTransactionEloquent;
use GrabCarJem\Repositories\Interfaces\IncomeTransactionInterface;
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
    }
}
