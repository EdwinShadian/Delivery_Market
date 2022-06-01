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
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid float-left">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" required maxlength="500" id="address" name="address">

                        <label for="comment" class="form-label">
                            Order list
                        </label>
                        <textarea type="text" name="comment" id="comment" class="form-control" style="height: 20rem;"
                                  required maxlength="500"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
