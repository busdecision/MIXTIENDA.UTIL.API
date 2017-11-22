<?php

namespace App\Http\Controllers\API;

use App\Repositories\ProductGroupRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductGroupController extends Controller
{
    protected $productGroupRepository;

    public function __construct(ProductGroupRepository $productGroupRepository)
    {
        $this->productGroupRepository = $productGroupRepository;
    }

    public function search(Request $request, $param)
    {
        $size = $request->get('size');
        $search_param = $param != "null" ? $param : null;

        return $this->productGroupRepository->search($search_param, $size);
    }
}
