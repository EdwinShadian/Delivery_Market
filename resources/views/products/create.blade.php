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
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Product name
                        </label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"
                               required>

                        <label for="product_type_id" class="form-label">
                            Product type
                        </label>
                        <select class="form-select form-control" id="product_type_id" name="product_type_id">
                            @foreach($productTypes as $productType)
                                <option
                                    value="{{ $productType->id }}" {{ old('product_type_id') == $productType->id ? ' selected' : '' }}>
                                    {{ $productType->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Add product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
