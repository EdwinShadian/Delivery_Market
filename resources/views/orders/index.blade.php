@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-10">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        Responsible User
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Created at
                    </th>
                    <th>
                        Updated at
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @can('view', $order)
                        <tr>
                            <th scope="row">
                                <a href="{{ route('orders.show', $order) }}">{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</a>
                            </th>
                            <td>
                                {{ $order->user->name }} ({{ $order->user->role->name }})
                            </td>
                            <td>
                                {{ $order->status->name }}
                            </td>
                            <td>
                                {{ $order->created_at->format('H:i d.m.Y') }}
                            </td>
                            <td>
                                {{ $order->updated_at->format('H:i d.m.Y') }}
                            </td>
                        </tr>
                    @endcan
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2">
            @can('create', \App\Models\Order::class)
                <a href="{{ route('orders.create') }}" class="btn btn-success">
                    Create order
                </a>
            @endcan
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            {{ $orders->withQueryString()->links() }}
        </div>
    </div>
@endsection
