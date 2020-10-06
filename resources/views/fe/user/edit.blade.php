@extends('layouts.user')

@section('title', 'Edit Profile')

@section('content')
<main class="main">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"  style="background: #0D276B">
                        <h5 class="card-title text-white">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        {!! Form::model($user, ['route' => ['user.users.update', $user->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                        @include('fe.user._form')
                        <button class="btn btn-block btn-success">Update</button>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
