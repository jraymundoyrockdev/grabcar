<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use TsuperNgBuhayTNVS\Models\IncomeTransaction;
use TsuperNgBuhayTNVS\Repositories\Eloquent\IncomeTransactionEloquent;

class IncomeTransactionEloquentEloquent extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_a_user_when_saved()
    {
        $input = factory(IncomeTransaction::class)->make()->toArray();

        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $result = $repository->create($input);

        $this->assertInstanceOf(IncomeTransaction::class, $result);
    }
}