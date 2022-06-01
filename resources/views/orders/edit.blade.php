@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('orders.show', $order) }}">Order
                                №{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid float-left">
        <div class="row">
            <div class="col-3">
                <form action="{{ route('orders.update', $order) }}" method="post" id="order">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="id" class="form-label">
                            Order ID
                        </label>
                        <input type="text" readonly value="{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}" name="id"
                               id="id" class="form-control">

                        <label for="order_list">Order list</label>
                        <textarea type="text" id="order_list" class="form-control"
                                  style="height: 20rem;" readonly>{{ trim($order->comment) }}</textarea>

                        <label for=""></label>
                    </div>
                    @if(session('status'))
                        <div class="form-group">
                            <div class="form-label">
                                <div class="text-success">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Edit order
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <label for="accordionProductItems">
                    Choose products
                </label>
                <div class="accordion" id="accordionProductItems">
                    @foreach($productTypes as $productType)
                        @if(!$productType->products->isEmpty())
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $productType->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#type_{{ $productType->id }}" aria-expanded="false"
                                            aria-controls="{{ $productType->id }}">
                                        {{ $productType->name }}
                                    </button>
                                </h2>
                                <div id="type_{{ $productType->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{ $productType->id }}"
                                     data-bs-parent="#accordionProductItems">
                                    <div class="accordion-body">
                                        <div class="form-check">
                                            @foreach($products as $product)
                                                @if($product->productType->id === $productType->id )
                                                    <div class="input-group mb-3">
                                                        <div class="input-block pr-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="{{ $product->id }}"
                                                                   id="checkbox" form="order"
                                                                   name="products[{{ $product->id }}]">
                                                            <label for="checkbox"
                                                                   class="form-check-label">{{ $product->name }}</label>
                                                        </div>
                                                        <input type="number" class="form-control-range-sm"
                                                               min="1" value="1" form="order"
                                                               name="quantities[{{ $product->id }}]"
                                                               id="{{ $product->id }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="comment" class="form-label">
                        Comment
                    </label>
                    <textarea type="text" name="comment" id="comment" class="form-control" style="height: 20rem;"
                              maxlength="500" form="order"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
