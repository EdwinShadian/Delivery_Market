@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    <div class="form-group">
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
