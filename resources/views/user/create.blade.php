@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Username
                        </label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"
                               required>

                        <label for="email" class="form-label">
                            E-mail
                        </label>
                        <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control"
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

                        <div class="form-group">
                            <label for="role" class="form-label">
                                Role
                            </label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Storekeeper</option>
                                <option value="4">Courier</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
