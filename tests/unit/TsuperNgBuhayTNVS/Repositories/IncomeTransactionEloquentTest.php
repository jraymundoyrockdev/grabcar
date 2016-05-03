<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use TsuperNgBuhayTNVS\Models\IncomeTransaction;
use TsuperNgBuhayTNVS\Repositories\Eloquent\IncomeTransactionEloquent;

class IncomeTransactionEloquentTest extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_an_income_when_saved()
    {
        $input = factory(IncomeTransaction::class)->make()->toArray();

        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $result = $repository->create($input);

        $this->assertInstanceOf(IncomeTransaction::class, $result);
    }


    /** @test */
    public function it_returns_income_transactions()
    {
        $expenseTransactions = $this->createIncomeTransactions(1, ['transaction_date_time' => date('Y-m-d H:i:s')]);

        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $income = $repository->getTransactionsFromTo($expenseTransactions->transaction_date_time, date('Y-m-d H:i:s'));

        $this->assertArrayHasKey('income_total', $income[0]);
        $this->assertArrayHasKey('transaction_date', $income[0]);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $income);
        $this->assertInstanceOf(IncomeTransaction::class, $income[0]);
    }

    /** @test */
    public function it_returns_empty_when_income_transaction_from_and_to_is_null()
    {
        $this->createIncomeTransactions(1, ['transaction_date_time' => date('Y-m-d H:i:s')]);

        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $income = $repository->getTransactionsFromTo();

        $this->assertEmpty($income);
    }

    /** @test */
    public function it_returns_detailed_income_transactions()
    {
        $incomeTransactions = $this->createIncomeTransactions(1, ['transaction_date_time' => date('Y-m-d H:i:s')]);

        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $income = $repository->getDetailedTransactions(
            $incomeTransactions->transaction_date_time,
            date('Y-m-d H:i:s')
        );

        $this->assertInstanceOf(IncomeTransaction::class, $income[0]);
        $this->assertArrayHasKey('id', $income[0]);
        $this->assertArrayHasKey('amount', $income[0]);
        $this->assertArrayHasKey('type', $income[0]);
        $this->assertArrayHasKey('transaction_date', $income[0]);
    }

    /** @test */
    public function it_returns_empty_if_from_and_to_dates_are_null_on_detailed_transactions()
    {
        $repository = $this->app->make(IncomeTransactionEloquent::class);

        $transactions = $repository->getDetailedTransactions();

        $this->assertEmpty($transactions);
    }

    /**
     * @param int $count
     * @param array $arguments
     * @return mixed
     */
    private function createIncomeTransactions($count = 1, $arguments = [])
    {
        return factory(IncomeTransaction::class, $count)->create($arguments);
    }
}