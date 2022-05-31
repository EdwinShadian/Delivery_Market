<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class Service
{
    /**
     * @param Order $order
     * @param $orderData
     * @return void
     */
    public function update(Order $order, $orderData): void
    {
        $quantities = array_intersect_key($orderData['quantities'], $orderData['products']);
        $products = $orderData['products'];

        unset($orderData['quantities'], $orderData['products']);

        $orderData['user_id'] = auth()->user()->id;
        $orderData['status_id'] = Status::READY_FOR_DELIVERY_STATUS_ID;

        $order->update($orderData);

        foreach ($products as $product) {
            $row = [];
            $row['order_id'] = $order->id;
            $row['product_id'] = (int) $product;
            $row['quantity'] = (int) $quantities[$product];
            DB::table('order_product')->insert($row);
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
            'status_id' => Status::CREATED_STATUS_ID,
            'comment' => $data['comment'],
        ]);
    }
}
