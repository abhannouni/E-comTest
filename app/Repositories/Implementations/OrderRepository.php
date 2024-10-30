<?php

namespace App\Repositories\Implementations;

use App\Models\Order;
use App\Repositories\Specifications\IOrderRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderRepository implements IOrderRepository
{
    public function store(array $data)
    {
        try {
            return Order::create($data);
        } catch (Exception $e) {
            Log::error('an error occured while creating a new order: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
