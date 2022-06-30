<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;

class CancelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Order $order
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function __invoke(Order $order)
    {
        $this->authorize('cancel', $order);

        $order->status_id = Status::CANCELLED_STATUS_ID;
        $order->user_id = auth()->user()->id;

        $order->save();

        return redirect()->route('orders.index');
    }
}
