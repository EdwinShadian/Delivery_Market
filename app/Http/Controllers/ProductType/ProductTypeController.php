<?php

namespace App\Http\Controllers\ProductType;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductType\StoreRequest;
use App\Models\ProductType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $productTypes = ProductType::all();

        return view('product-types.index', compact('productTypes'));
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

        ProductType::firstOrCreate($data);

        return redirect()->route('product-types.index')->with('status', 'Product type adding successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductType $productType
     * @return RedirectResponse
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return redirect()->route('product-types.index');
    }
}
