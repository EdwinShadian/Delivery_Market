@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                <a href="{{ route('users.create') }}" class="btn btn-outline-primary">
                    Add User
                </a>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
