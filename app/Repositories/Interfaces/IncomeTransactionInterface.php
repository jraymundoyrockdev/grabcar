<?php namespace GrabCarJem\Repositories\Interfaces;

interface IncomeTransactionInterface
{
    /**
     * Create
     *
     * @param $payload
     * @return mixed
     */
    public function create($payload);

}
