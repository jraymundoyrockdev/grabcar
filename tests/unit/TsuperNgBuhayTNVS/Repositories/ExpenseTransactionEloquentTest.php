<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use TsuperNgBuhayTNVS\Models\ExpenseTransaction;
use TsuperNgBuhayTNVS\Repositories\Eloquent\ExpenseTransactionEloquent;

class ExpenseTransactionEloquentTest extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_an_expense_when_saved()
    {
        $input = factory(ExpenseTransaction::class)->make()->toArray();

        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $result = $repository->create($input);

        $this->assertInstanceOf(ExpenseTransaction::class, $result);
    }

    /** @test */
    public function it_returns_transaction_date_and_total()
    {
        $expenseTransactions = $this->createExpenseTransactions(1, ['transaction_date_time' => date('Y-m-d H:i:s')]);

        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $expense = $repository->getTransactionsFromTo($expenseTransactions->transaction_date_time, date('Y-m-d H:i:s'));

        $this->assertArrayHasKey('expense_total', $expense[0]);
        $this->assertArrayHasKey('transaction_date', $expense[0]);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $expense);
        $this->assertInstanceOf(ExpenseTransaction::class, $expense[0]);
    }

    /** @test */
    public function it_returns_empty_if_from_and_to_dates_are_null()
    {
        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $transactions = $repository->getTransactionsFromTo();

        $this->assertEmpty($transactions);
    }

    /** @test */
    public function it_returns_detailed_expense_transactions()
    {
        $expenseTransactions = $this->createExpenseTransactions(1, ['transaction_date_time' => date('Y-m-d H:i:s')]);

        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $expense = $repository->getDetailedTransactions(
            $expenseTransactions->transaction_date_time,
            date('Y-m-d H:i:s')
        );

        $this->assertInstanceOf(ExpenseTransaction::class, $expense[0]);
        $this->assertArrayHasKey('id', $expense[0]);
        $this->assertArrayHasKey('amount', $expense[0]);
        $this->assertArrayHasKey('type', $expense[0]);
        $this->assertArrayHasKey('transaction_date', $expense[0]);
    }

    /** @test */
    public function it_returns_empty_if_from_and_to_dates_are_null_on_detailed_transactions()
    {
        $repository = $this->app->make(ExpenseTransactionEloquent::class);

        $transactions = $repository->getDetailedTransactions();

        $this->assertEmpty($transactions);
    }

    /**
     * @param int $count
     * @param array $arguments
     * @return mixed
     */
    private function createExpenseTransactions($count = 1, $arguments = [])
    {
        return factory(ExpenseTransaction::class, $count)->create($arguments);
    }
}