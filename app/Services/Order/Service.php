<?php

namespace App\Services\Order;

use App\Models\Order;

class Service
{
    /**
     * @param Order $order
     * @param $data
     * @return void
     */
    public function update(Order $order, $data): void
    {
        $order->update($data);
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
