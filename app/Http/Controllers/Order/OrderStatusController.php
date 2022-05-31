<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderStatusController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Order $order
     * @return RedirectResponse
     */
    public function __invoke(Order $order)
    {
        $this->authorize('changeStatus', $order);

        $statusId = $order->status_id;
        $statusId += 1;

        $order->status_id = $statusId;
        $order->user_id = auth()->user()->id;

        $order->save();

        return redirect()->route('orders.show', compact('order'));
    }
}
