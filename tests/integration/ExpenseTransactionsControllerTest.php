<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class ExpenseTransactionsControllerTest extends TestCase
{
    use  DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_to_create_form_if_expense_successfully_inserted()
    {
        $input = factory(\TsuperNgBuhayTNVS\Models\ExpenseTransaction::class)->make()->toArray();

        $this->post('/expense', $input)
            ->seeInDatabase('expense_transactions', [
                'amount' => $input['amount'],
                'transaction_date_time' => $input['transaction_date_time'],
                'created_by' => $input['created_by'],
                'type' => $input['type'],
                'remarks' => $input['remarks'],
            ])->assertRedirectedToRoute('expense.create');
    }

    /** @test */
    public function it_returns_to_create_form_with_errors_if_validation_failed()
    {
        $input  = factory(\TsuperNgBuhayTNVS\Models\ExpenseTransaction::class)->make([
            'amount' => '',
            'type' => '',
            'created_by' => '',
            'transaction_date_time' => ''
        ])->toArray();

        $this->post('/expense', $input)->assertSessionHasErrors(['amount', 'type', 'created_by', 'transaction_date_time']);

    }
}