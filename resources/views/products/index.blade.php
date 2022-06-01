@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid float-left">
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
                                <a href="{{ route('products.edit', $product) }}">{{ $product->name }}</a>
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
                <a href="{{ route('products.create') }}" class="btn btn-outline-primary m-3">
                    Add Product
                </a>
                <a href="{{ route('product-types.index') }}" class="btn btn-outline-info ml-3">
                    Product Types List
                </a>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
