<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIncomeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->timestamp('transaction_date_time')->useCurrent = true;
            $table->integer('discount')->default(0);
            $table->integer('created_by');
            $table->text('type');
            $table->text('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('income_transactions');
    }
}
