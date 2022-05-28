<?php

namespace App\Services\Product;

use App\Models\Product;

class Service
{
    /**
     * @param Product $product
     * @param $data
     * @return void
     */
    public function update(Product $product, $data): void
    {
        $product->update($data);
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data): void
    {
        Product::create([
            'name' => $data['name'],
            'product_type_id' => $data['product_type_id'],
        ]);
    }
}
