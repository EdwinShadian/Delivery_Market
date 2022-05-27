<?php

namespace App\Http\Controllers\ProductType;

use App\Http\Controllers\Controller;
use App\Models\ProductType;

class IndexController extends Controller
{
    public function __invoke()
    {
        $productTypes = ProductType::all();

        return view('product-types.index', compact('productTypes'));
    }
}
