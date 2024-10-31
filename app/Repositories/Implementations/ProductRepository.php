<?php

namespace App\Repositories\Implementations;

use App\Models\Product;
use App\Repositories\Specifications\IProductRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductRepository implements IProductRepository
{
    public function getAll()
    {
        try {
            return Product::all();
        } catch (Exception $e) {
            Log::error('an error occured while getting all products: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
