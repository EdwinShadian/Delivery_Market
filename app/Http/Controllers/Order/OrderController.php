<?php

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $orders = Order::paginate(30);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function edit(Order $order)
    {
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
     */
    public function update(Order $order, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->service->update($order, $data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
