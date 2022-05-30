<?php

namespace App\Services\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Service
{
    /**
     * @param Order $order
     * @param $data
     * @return void
     */
    public function update(Order $order, $data): void
    {
        $quantities = array_intersect_key($data['quantities'], $data['products']);
        $products = $data['products'];

        unset($data['quantities'], $data['products']);

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 2;
        $data['comment'] = $data['comment'] ?? '';

        $order->update($data);

        foreach ($products as $product) {
            $row = [];
            $row['order_id'] = $order->id;
            $row['product_id'] = (int) $product;
            $row['quantity'] = (int) $quantities[$product];
            DB::table('order_products')->insert($row);
        }
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data): void
    {
        Order::create([
            'user_id' => auth()->user()->id,
            'status_id' => 1,
            'comment' => $data['comment'],
        ]);
    }
}
