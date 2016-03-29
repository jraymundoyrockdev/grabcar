<?php

namespace TsuperNgBuhayTNVS\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseTransaction extends Model
{
    protected $table = 'expense_transactions';

    protected $fillable = [
        'amount',
        'transaction_date_time',
        'remarks',
        'created_by',
        'type'
    ];
}
