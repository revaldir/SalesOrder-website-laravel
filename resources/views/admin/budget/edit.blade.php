@extends('layouts.admin')

@section('title', 'Edit Budget #' . $budget->id)

@section('content')
<main class="main">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('budgets.index') }}">Budget</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Edit Budget
                    </div>
                    <div class="card-body">
                        {!! Form::model($budget, ['route' => ['budgets.update', $budget->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
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
