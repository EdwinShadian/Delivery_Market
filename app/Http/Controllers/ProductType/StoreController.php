<?php

namespace App\Http\Controllers\ProductType;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\StoreRequest;
use App\Models\ProductType;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        ProductType::firstOrCreate($data);

        return redirect()->route('product-types.index')->with('status', 'Product type adding successfully!');
    }
}
