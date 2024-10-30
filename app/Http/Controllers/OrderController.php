<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\Specifications\IOrderService;

class OrderController extends Controller
{
    private IOrderService $iOrderService;

    public function __construct(protected IOrderService $orderService) {
        $this->iOrderService = $orderService;
    }

    public function order(OrderRequest $request) {
        $order = $this->iOrderService->order($request->all());

        return response()->json([
            'order' => $order
        ]);
    }

    
}
