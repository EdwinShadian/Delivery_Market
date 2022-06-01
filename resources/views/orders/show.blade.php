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
                        <li class="breadcrumb-item active">Order №{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid float-left">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Order №{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <h5>
                            Status
                        </h5>
                        <div
                            @switch($order->status_id)

                                @case($order->status_id === \App\Models\Status::CANCELLED_STATUS_ID)
                                class="text-danger"
                            @break

                            @case(\App\Models\Status::CREATED_STATUS_ID)
                            class="text-secondary"
                            @break

                            @case(\App\Models\Status::READY_FOR_DELIVERY_STATUS_ID)
                            class="text-blue"
                            @break

                            @case(\App\Models\Status::DELIVERY_STATUS_ID)
                            class="text-yellow"
                            @break

                            @case(\App\Models\Status::DELIVERED_STATUS_ID)
                            class="text-success"
                            @break

                            @endswitch
                        >
                            {{ $order->status->name }} (updated at: {{ $order->updated_at->format('H:i') }})
                        </div>
                        <hr>
                        <h5>
                            Responsible user:
                        </h5>
                        <p class="card-text">
                            {{ $order->user->name }} ({{ $order->user->role->name }})
                        </p>
                        @if(!$order->products->isEmpty())
                            <hr>
                            <div class="card-group">
                                <h5>
                                    Products
                                </h5>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>
                                            Product
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>
                                                {{ $product->pivot->quantity }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <hr>
                        <h5>
                            Address:
                        </h5>
                        <p class="card-text">
                            {{ $order->address }}
                        </p>
                        @if(!empty($order->comment))
                            <hr>
                            <h5>
                                Comment:
                            </h5>
                            <p class="card-text">
                                {{ $order->comment }}
                            </p>
                        @endif
                    </div>
                    @if($order->status_id < \App\Models\Status::DELIVERED_STATUS_ID)
                        <div class="card-footer">
                            <div class="card-group">
                                @if($order->status_id < \App\Models\Status::READY_FOR_DELIVERY_STATUS_ID)
                                    @can('update', $order)
                                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary m-2">
                                            Edit order
                                        </a>
                                    @endcan
                                @endif

                                @if($order->status_id === \App\Models\Status::READY_FOR_DELIVERY_STATUS_ID)
                                    @can('changeStatus', $order)
                                        <form action="{{ route('orders.changestatus', $order) }}" method="post"
                                              id="deliveryStatusForm">
                                            @csrf
                                        </form>
                                        <input type="submit" class="btn btn-primary m-2" value="Take for delivery"
                                               form="deliveryStatusForm">
                                    @endcan
                                @endif

                                @if($order->status_id === \App\Models\Status::DELIVERY_STATUS_ID)
                                    @can('changeStatus', $order)
                                        <form action="{{ route('orders.changestatus', $order) }}" method="post"
                                              id="doneStatusForm">
                                            @csrf
                                        </form>
                                        <input type="submit" class="btn btn-success m-2" value="Delivered"
                                               form="doneStatusForm">
                                    @endcan
                                @endif

                                @can('cancel', $order)
                                    <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal"
                                            data-bs-target="#cancelModal">
                                        Cancel order
                                    </button>
                                @endcan
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal fade" id="cancelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">
                            Warning!
                        </h4>
                    </div>
                    <div class="modal-body">
                        Do you really want to cancel order?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('orders.cancel', $order) }}" method="post" id="deleteForm">
                            @csrf
                        </form>
                        <input type="submit" class="btn btn-danger" value="Yes" form="deleteForm">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>
@endsection
