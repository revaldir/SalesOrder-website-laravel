@extends('layouts.admin')

@section('title', 'Detail of ' . $user->username)

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('users.index') }}">User</a>
        </li>
        <li class="breadcrumb-item active">Detail of {{ $user->username }}</li>
    </ol>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background: #0D276B">
                        <h5 class="card-title">User #{{ $user->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm table-hover">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>E-mail Address</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->role->name }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    @if($user->is_active == TRUE)
                                    <td>Active</td>
                                    @else
                                    <td class="text-muted d-flex justify-content-between">
                                        Inactive (Require activation)
                                        <form action="{{ route('home.approve', $user->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button class="btn btn-sm btn-success" type="submit">
                                            <span><i class="icon-check"></i></span>
                                        </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        {{ date('d/m/y', strtotime($user->created_at)) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        <h5 class="card-title">Action</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('users.index') }}" class="btn btn-lg btn-block btn-outline-primary">
                                <i class="fa fa-long-arrow-left"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-lg btn-block btn-outline-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-lg btn-block btn-outline-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
