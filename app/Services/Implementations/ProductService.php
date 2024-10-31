<?php

namespace App\Services\Implementations;

use App\Repositories\Specifications\IProductRepository;
use App\Repositories\Specifications\IUserRepository;
use App\Services\Specifications\IProductService;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductService implements IProductService
{
    private IProductRepository $iProductRepository;

    public function __construct(protected IProductRepository $productRepository)
    {
        $this->iProductRepository = $productRepository;
    }

    public function list()
    {
        try {
            return $this->iProductRepository->getAll();
        } catch (Exception $e) {
            Log::error('An error occurred while listing all products: ' . $e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
