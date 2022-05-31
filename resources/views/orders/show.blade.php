@extends('layouts.main')
@section('content')
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
                    @endswitch">
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
            <div class="card-footer">
                @can('update', $order)
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">
                        Edit order
                    </a>
                @endcan
                @can('changeStatus', $order)
                    @if($order->status_id === \App\Models\Status::READY_FOR_DELIVERY_STATUS_ID)
                        <form action="{{ route('orders.changestatus', $order) }}" method="post"
                              id="deliveryStatusForm">
                            @csrf
                        </form>
                        <input type="submit" class="btn btn-primary" value="Take for delivery"
                               form="deliveryStatusForm">
                    @endif
                @endcan
                @can('changeStatus', $order)
                    @if($order->status_id === \App\Models\Status::DELIVERY_STATUS_ID)
                        <form action="{{ route('orders.changestatus', $order) }}" method="post"
                              id="doneStatusForm">
                            @csrf
                        </form>
                        <input type="submit" class="btn btn-success" value="Delivered"
                               form="doneStatusForm">
                    @endif
                @endcan
                @can('delete', $order)
                    <form action="{{ route('orders.destroy', $order) }}" method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    <input type="submit" class="btn btn-danger" value="Cancel order" form="deleteForm">
                @endcan
            </div>
        </div>
    </div>
@endsection
