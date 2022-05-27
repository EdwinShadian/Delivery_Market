<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $products = Product::paginate(30);

        return view('products.index', compact('products'));
    }
}
