@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="form-label">
                            Role
                        </label>
                        <select class="form-control" id="role_id" name="role_id">
                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}" {{ old('role_id') == $role->id ? ' selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

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
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create user
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
