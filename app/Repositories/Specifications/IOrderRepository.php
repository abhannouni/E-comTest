<?php

namespace App\Repositories\Specifications;

interface IOrderRepository
{
    /**
     * Stores a new order.
     */
    public function store(array $data);
}
