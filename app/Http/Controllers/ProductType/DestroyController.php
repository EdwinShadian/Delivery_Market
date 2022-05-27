<?php

namespace App\Http\Controllers\ProductType;

use App\Http\Controllers\Controller;
use App\Models\ProductType;

class DestroyController extends Controller
{
    public function __invoke(ProductType $productType)
    {
        $productType->delete();

        return redirect()->route('product-types.index');
    }
}
