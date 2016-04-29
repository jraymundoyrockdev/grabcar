<?php namespace TsuperNgBuhayTNVS\Repositories\Interfaces;

interface ExpenseTransactionInterface
{
    /**
     * Create
     *
     * @param $payload
     * @return mixed
     */
    public function create($payload);

    /**
     * @param $from
     * @param $to
     * @return mixed
     */
    public function getTransactionsFromTo($from, $to);

    /**
     * @param null $from
     * @param null $to
     * @return mixed
     */
    public function getDetailedTransactions($from = null, $to = null);

}
