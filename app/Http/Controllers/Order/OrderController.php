<?php

namespace App\Http\Controllers\Order;

use App\Http\Filters\Order\OrderFilter;
use App\Http\Requests\Order\FilterRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param FilterRequest $request
     * @return View
     * @throws AuthorizationException
     * @throws BindingResolutionException
     */
    public function index(FilterRequest $request)
    {
        $this->authorize('viewAny', Order::class);

        $data = $request->validated();
        $filter = app()->make(OrderFilter::class, ['queryParams' => array_filter($data)]);

        $orders = Order::filter($filter)->latest()->paginate(10);
        $users = User::all()->sortBy('name');
        $statuses = Status::all();

        return view('orders.index', compact('orders', 'users', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Order::class);

        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Order::class);

        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return View
     * @throws AuthorizationException
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Order $order)
    {
        $this->authorize('update', $order);

        $products = Product::all();
        $productTypes = ProductType::all();

        return view('orders.edit', compact('order', 'products', 'productTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Order $order
     * @param UpdateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(Order $order, UpdateRequest $request)
    {
        $this->authorize('update', $order);

        $data = $request->validated();

        $this->service->update($order, $data);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);

        $order->delete();

        return redirect()->route('orders.index');
    }
}
