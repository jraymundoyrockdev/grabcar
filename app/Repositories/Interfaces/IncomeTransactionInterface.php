<?php namespace TsuperNgBuhayTNVS\Repositories\Interfaces;

interface IncomeTransactionInterface
{
    /**
     * Create
     *
     * @param $payload
     * @return mixed
     */
    public function create($payload);

    /**
     * Fetch all income
     *
     * @return mixed
     */
    public function all();

    /**
     * Get last transactions from to date
     * 
     * @param $from
     * @param $to
     * @return mixed
     */
    public function getTransactionsFromTo($from, $to);
}
