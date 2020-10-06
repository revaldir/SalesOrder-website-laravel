@extends('layouts.admin')

@section('title', 'Create New Report')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('reports.index') }}">Report</a>
        </li>
        <li class="breadcrumb-item active">New</li>
    </ol>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-white" style="background: #0D276B">
                        Create New Report
                    </div>
                    <div class="card-body">
                        @include('admin.report._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
