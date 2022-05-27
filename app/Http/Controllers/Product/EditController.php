<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\ProductType;

class EditController extends BaseController
{
    public function __invoke(Product $product)
    {
        $productTypes = ProductType::orderBy('name', 'asc')->get();

        return view('products.edit', compact('product', 'productTypes'));
    }
}
