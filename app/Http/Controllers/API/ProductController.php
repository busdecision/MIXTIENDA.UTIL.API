<?php

namespace App\Http\Controllers\API;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->all();
    }

    public function search($param)
    {
        $search_param = $param != "null" ? $param : null;

        return $this->productRepository->search($search_param);
    }

}
