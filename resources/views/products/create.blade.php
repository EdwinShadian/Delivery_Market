@extends('layouts.main')
@section('content')
    <div class="container float-left">
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
