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

}
