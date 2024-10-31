<?php

namespace App\Http\Controllers;

use App\Services\Specifications\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductService $iProductService;

    public function __construct(IProductService $productService)
    {
        $this->iProductService = $productService;
    }

    public function list()
    {
        $products = $this->iProductService->list();

        return response()->json([
            'products' => $products
        ]);
    }
}
