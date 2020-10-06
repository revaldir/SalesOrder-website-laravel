@extends('layouts.admin')

@section('title', 'Add New Outflow')

@section('content')
<main class="main">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('outflows.index')}}">Outflow</a>
        </li>
        <li class="breadcrumb-item active">New</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Add New Outflow
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'outflows.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @include('admin.outflow._form')
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Action
                    </div>
                    <div class="card-footer bg-transparent">
                        <button class="btn btn-success btn-block" type="submit">
                            Add
                        </button>
                    </div>
                </div>
            </div>
                        {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection
