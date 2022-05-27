@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('products.update', $product) }}" method="post" id="edit">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="id" class="form-label">
                            Product ID
                        </label>
                        <input type="text" readonly value="{{ $product->id }}" name="id" id="id" class="form-control">

                        <label for="name" class="form-label">
                            Product name
                        </label>
                        <input type="text" value="{{ $product->name }}" name="name" id="name" class="form-control"
                               required>

                        <label for="product_type_id" class="form-label">
                            Product type
                        </label>
                        <select class="form-control" id="product_type_id" name="product_type_id">
                            @foreach($productTypes as $productType)
                                <option
                                    value="{{ $productType->id }}" {{ $productType->id == $product->productType->id ? ' selected' : '' }}>
                                    {{ $productType->name }}
                                </option>
                            @endforeach
                        </select>

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
                        <input type="submit" class="btn btn-primary" form="edit" value="Edit product">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                            Delete product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">
                        Warning!
                    </h4>
                </div>
                <div class="modal-body">
                    Do you really want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('products.destroy', $product) }}" method="post" id="delete">
                        @csrf
                        @method('delete')
                    </form>
                    <input form="delete" type="submit" class="btn btn-danger" value="Yes">
                </div>
            </div>
        </div>
    </div>
@endsection
