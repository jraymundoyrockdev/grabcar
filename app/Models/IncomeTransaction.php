<?php

namespace TsuperNgBuhayTNVS\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeTransaction extends Model
{
    protected $table = 'income_transactions';

    protected $fillable = [
        'fare',
        'transaction_date_time',
        'discount',
        'remarks',
        'created_by',
        'type'
    ];
}
