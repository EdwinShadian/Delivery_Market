@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="id" class="form-label">
                            User ID
                        </label>
                        <input type="text" readonly value="{{ $user->id }}" name="id" id="id" class="form-control">

                        <label for="role_id" class="form-label">
                            Role
                        </label>
                        <select class="form-control" id="role_id" name="role_id">
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}" {{ $role->id == $user->role->id ? ' selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="name" class="form-label">
                            Username
                        </label>
                        <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control"
                               required>

                        <label for="email">
                            E-mail
                        </label>
                        <input type="email" value="{{ $user->email }}" name="email" id="email" class="form-control"
                               required>

                        <label for="password" class="form-label">
                            Password
                        </label>
                        <input type="password" value="" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror" required
                               autocomplete="new-password" minlength="8">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>Password and its confirmation aren't match!</strong>
                                    </span>
                        @enderror

                        <label for="password_confirmed" class="form-label">
                            Password confirm
                        </label>
                        <input type="password" value="" name="password_confirmed" id="password_confirmed"
                               class="form-control @error('password') is-invalid @enderror" required
                               autocomplete="new-password" minlength="8">
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
                        <button type="submit" class="btn btn-primary">
                            Edit user
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                            Delete user
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
                    Do you really want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        No
                    </button>
                    <form action="{{ route('users.destroy', $user) }}" method="post" id="delete">
                        @csrf
                        @method('delete')
                    </form>
                    <input form="delete" type="submit" class="btn btn-danger" value="Yes">
                </div>
            </div>
        </div>
    </div>
@endsection
