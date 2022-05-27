<?php

namespace App\Http\Controllers\Product;

use App\Models\ProductType;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $productTypes = ProductType::orderBy('name', 'asc')->get();

        return view('products.create', compact('productTypes'));
    }
}
