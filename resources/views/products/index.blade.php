@extends('layouts.main')
@section('content')
    <div class="container-xxl">
        <div class="row">
            <div class="col-10">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Product type
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">
                                {{ $product->id }}
                            </th>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a>
                            </td>
                            <td>
                                {{ $product->productType->name }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success mb-3">
                    <a href="{{ route('products.create') }}" class="text-white">
                        Add Product
                    </a>
                </button>
                <span class="pb-2"></span>
                <button type="button" class="btn btn-primary">
                    <a href="{{ route('product-types.index') }}" class="text-white">
                        Product Types List
                    </a>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
