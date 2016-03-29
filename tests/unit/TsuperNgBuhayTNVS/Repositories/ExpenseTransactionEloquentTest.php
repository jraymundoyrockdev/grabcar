<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use TsuperNgBuhayTNVS\Models\ExpenseTransaction;
use TsuperNgBuhayTNVS\Repositories\Eloquent\ExpenseTransactionEloquent;

class ExpenseTransactionEloquentTest extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_a_user_when_saved()
    {
        $input = factory(ExpenseTransaction::class)->make()->toArray();

        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $result = $repository->create($input);

        $this->assertInstanceOf(ExpenseTransaction::class, $result);
    }
}