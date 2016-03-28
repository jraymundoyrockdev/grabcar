<?php

namespace GrabCarJem\Http\Requests;

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
            'fare' => 'required|integer|min:1',
            'type' => 'required',
            'created_by' => 'required|integer',
            'trip_date_time' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fare.integer' => 'Fare must be a number',
            'fare.min' => 'Fare must be at least 1 peso',
        ];
    }
}
