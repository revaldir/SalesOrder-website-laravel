@extends('layouts.user')

@section('title', 'Edit SO ' . $outflow->id)

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('user.outflows.index') }}">Outflow</a>
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
                        {!! Form::model($outflow, ['route' => ['user.outflows.update', $outflow->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                        @include('fe.outflow._form')
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
