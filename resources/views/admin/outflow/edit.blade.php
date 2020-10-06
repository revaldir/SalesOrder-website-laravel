@extends('layouts.admin')

@section('title', 'Edit Outflow SO ID #' . $outflow->id)

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home.admin') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('outflows.index') }}">Outflow</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('outflows.show', $outflow->id) }}">Outflow #{{ $outflow->id }} Detail</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Edit Outflow
                    </div>
                    <div class="card-body">
                        {!! Form::model($outflow, ['route' => ['outflows.update', $outflow->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
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
                        <button type="submit" class="btn btn-success btn-block">
                            Update
                        </button>
                    </div>
                </div>
            </div>
                        {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection
