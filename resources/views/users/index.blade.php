@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-10">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        E-mail
                    </th>
                    <th>
                        Role
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">
                            {{ $user->id }}
                        </th>
                        <td>
                            <a href="{{ route('users.edit', $user) }}">{{ $user->name }}</a>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role->name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-success">
                <a href="{{ route('users.create') }}" class="text-white">
                    Add User
                </a>
            </button>
        </div>
    </div>
@endsection
