@extends('layouts.admin')

@section('title', 'Edit ' . $user->username)

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="">User</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('users.show', $user->id) }}">Detail of {{ $user->username }}</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Edit {{ $user->username }}
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                            @include('admin.user._form')
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Action
                    </div>
                    <div class="card-body">
                        <button class="btn btn-block btn-success" type="submit">
                            Save
                        </button>
                    </div>
                </div>
            </div>
                        {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection
