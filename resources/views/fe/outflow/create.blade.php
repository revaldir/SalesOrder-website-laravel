@extends('layouts.user')

@section('title', 'Create New Outflow')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="li breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="li breadcrumb-item">
            <a href="{{ route('user.outflows.index') }}">Outflow</a>
        </li>
        <li class="li breadcrumb-item active">Create</li>
    </ol>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Add New Outflow
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'user.outflows.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @include('fe.outflow._form')
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-success">Create</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
