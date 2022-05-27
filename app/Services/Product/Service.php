<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function update(Product $product, $data)
    {
        $product->update($data);
    }

    public function store($data)
    {
        Product::create([
            'name' => $data['name'],
            'product_type_id' => $data['product_type_id'],
        ]);
    }
}
