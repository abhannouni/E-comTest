<?php

namespace App\Services\Implementations;

use App\Models\Product;
use App\Repositories\Specifications\IOrderRepository;
use App\Services\Specifications\IOrderService;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderService implements IOrderService
{
    private IOrderRepository $iOrderRepository;

    public function __construct(protected IOrderRepository $orderRepository)
    {
        $this->iOrderRepository = $orderRepository;
    }

    public function order(array $data)
    {
        try {
            $data['user_id'] = auth()->user()->id;
            $order = $this->iOrderRepository->store($data);
            

            $totalPrice = 0;

            foreach ($data['products'] as $productData) {
                $product = Product::findOrFail($productData['id']);

                $priceAtPurchase = $product->price;
                $quantity = $productData['quantity'];
                $totalPrice += $priceAtPurchase * $quantity;

                $order->products()->attach($product->id, [
                    'quantity' => $quantity,
                    'price_at_purchase' => $priceAtPurchase,
                ]);

                $product->decrement('stock_quantity', $quantity);
            }


            $order->update(['total_price' => $totalPrice]);
            return $order;
        } catch (Exception $e) {
            Log::error('an error occured while ordering: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
