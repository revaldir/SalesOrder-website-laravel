@extends('layouts.admin')

@section('title', 'Add New Budget')

@section('content')
<main class="main">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('budgets.index')}}">Budget</a>
        </li>
        <li class="breadcrumb-item active">New</li>
    </ol>
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger import">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Add New Budget
                    </div>
                    <div class="card-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'budgets.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @include('admin.budget._form')
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Action
                    </div>
                    <div class="card-footer bg-transparent">
                        {{-- <input type="button" name="btn" value="Add" id="confirmBtn" class="btn btn-success btn-block" data-toggle="modal" data-target="#Modal"> --}}
                        {{-- <button id="confirmBtn" class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#Modal"> --}}
                        <button class="btn btn-success btn-block" type="submit">
                            Add
                        </button>
                        <hr>
                        <a href="#" class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#Modal">Import</a>
                    </div>
                </div>
            </div>
                        {!! Form::close() !!}
        </div>
    </div>
    @include('admin.budget.import')
</main>
@endsection

@section('js')
<script>
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);
</script>
@endsection
