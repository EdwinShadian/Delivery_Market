@extends('layouts.main')
@section('content')
    <div class="container-xxl">
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
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#createModal">
                    Add product type
                </button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" form="addProductType" class="btn btn-success">
                        Add
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            No
                        </button>
                        <form action="{{ route('product-types.destroy', $productType) }}" method="post" id="delete">
                            @csrf
                            @method('delete')
                        </form>
                        <input form="delete" type="submit" class="btn btn-danger" value="Yes">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
