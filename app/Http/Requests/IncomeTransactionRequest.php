<?php

namespace TsuperNgBuhayTNVS\Http\Requests;

class IncomeTransactionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|integer|min:1',
            'type' => 'required',
            'created_by' => 'required|integer',
            'transaction_date_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'amount.integer' => 'Amount must be a number',
            'amount.min' => 'Amount must be at least 1 peso',
        ];
    }
}
