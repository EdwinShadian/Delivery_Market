@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Product types</li>
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
                            Product type
                        </th>
                        <th>
                            Delete product type
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($productTypes))
                        @foreach($productTypes as $productType)
                            <tr>
                                <th scope="row">
                                    {{ $productType->id }}
                                </th>
                                <td>
                                    {{ $productType->name }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                        Delete product type
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#createModal">
                    Add product type
                </button>
            </div>
            <div class="row">
                <div class="container-fluid">
                    {{ $productTypes->withQueryString()->links() }}
                </div>
            </div>
        </div>
        <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">
                            Add new product type
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product-types.store') }}" method="post" id="addProductType">
                            @csrf
                            <div class="form-group">
                                <label for="name">
                                    Name
                                </label>
                                <input class="form-control" id="name" name="name" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="addProductType" class="btn btn-success mr-1">
                            Add
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($productType))
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
                            Do you really want to delete product type?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('product-types.destroy', $productType) }}" method="post" id="delete">
                                @csrf
                                @method('delete')
                            </form>
                            <input form="delete" type="submit" class="btn btn-danger mr-1" value="Yes">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                No
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
@endsection
