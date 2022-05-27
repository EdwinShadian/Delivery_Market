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
