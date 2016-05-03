<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class DashboardControllerTest extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_income_expense_transaction_details_when_index_is_called()
    {
        $this->get('/dashboard')->assertViewHas([
            'incomeTotal',
            'expenseTotal',
            'transactionDailyTotals',
            'incomeDetailedTransactions',
            'incomeDetailTotals',
            'expenseDetailedTransactions',
            'expenseDetailTotals'
        ]);
    }
}