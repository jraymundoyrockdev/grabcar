<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class IncomeTransactionsControllerTest extends TestCase
{
    use DatabaseTransactions, MockeryPHPUnitIntegration;

    /** @test */
    public function it_returns_to_create_form_if_income_successfully_inserted()
    {
        $input = factory(\TsuperNgBuhayTNVS\Models\IncomeTransaction::class)->make()->toArray();

        $this->post('/income', $input)
            ->seeInDatabase('income_transactions', [
                'amount' => $input['amount'],
                'transaction_date_time' => $input['transaction_date_time'],
                'discount' => $input['discount'],
                'created_by' => $input['created_by'],
                'type' => $input['type'],
                'remarks' => $input['remarks'],
            ])->assertRedirectedToRoute('income.create');
    }

    /** @test */
    public function it_returns_to_create_form_with_errors_if_validation_failed()
    {
        $input = factory(\TsuperNgBuhayTNVS\Models\IncomeTransaction::class)->make([
            'amount' => '',
            'type' => '',
            'created_by' => '',
            'transaction_date_time' => ''
        ])->toArray();

        $this->post('/income', $input)->assertSessionHasErrors(['amount', 'type', 'created_by', 'transaction_date_time']);

    }

}