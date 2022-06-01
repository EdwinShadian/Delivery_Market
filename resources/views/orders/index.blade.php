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
                        <li class="breadcrumb-item active">Orders</li>
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
                    <div class="container-fluid mb-3">
                        <a href="{{ route('orders.create') }}" class="btn btn-outline-primary">
                            Create order
                        </a>
                    </div>
                @endcan
                <div class="container-fluid">
                    <form action="{{ route('orders.index') }}" method="get" class="form-group-sm">
                        <h5>
                            Filters
                        </h5>
                        <label for="user_id" class="form-label mt-1">User</label>
                        <select name="user_id" id="user_id" class="form-select form-control-sm mb-2"
                                style="width: 15rem;">
                            <option value="" {{ app('request')->input('user_id') == '' ? ' selected' : '' }}>
                                --none--
                            </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ app('request')->input('user_id') == $user->id ? ' selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="status_id" class="form-label">Status</label>
                        <select name="status_id" id="status_id" class="form-select form-control-sm mb-3"
                                style="width: 15rem;">
                            <option value="" {{ app('request')->input('status_id') == '' ? ' selected' : '' }}>
                                --none--
                            </option>
                            @foreach($statuses as $status)
                                <option
                                    value="{{ $status->id }}" {{ app('request')->input('status_id') == $status->id ? ' selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="submit" class="btn btn-outline-info mr-2" value="Use Filter">
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Clear</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                {{ $orders->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
