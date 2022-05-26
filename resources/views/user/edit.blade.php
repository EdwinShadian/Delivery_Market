@extends('layouts.main')
@section('content')
    <div class="container float-left">
        <div class="row">
            <div class="col-4">
                <form action="{{ route('user.update', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    @if(session('status'))
                        <div class="form-label">
                            <div class="text-success">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="id" class="form-label">
                            User ID
                        </label>
                        <input type="text" readonly value="{{ $user->id }}" name="id" id="id" class="form-control">

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

                        <label for="password">
                            Change password
                        </label>
                        <input type="password" value="" name="password" id="password"
                               class="form-control" required autocomplete="new-password" minlength="8">
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
