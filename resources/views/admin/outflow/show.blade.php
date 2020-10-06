@extends('layouts.admin')

@section('title', 'Detail of SO ID #' . $outflow->id)

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
        <li class="breadcrumb-item active">Outflow #{{ $outflow->id }} Detail</li>
    </ol>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-white font-weight-bold" style="background: #0D276B">
                        SO ID #{{ $outflow->id }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Proyek</th>
                                    <td>{{ $outflow->proyek }}</td>
                                </tr>
                                <tr>
                                    <th>Bulan</th>
                                    <td>{{ $outflow->month->month }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $outflow->category->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nominal</th>
                                    <td>Rp {{ number_format($outflow->out_value,2,',','.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-white text-center font-weight-lighter" style="background: #0D276B">
                        Submitted by {{ $outflow->submitter }} at {{ date('H:i d/m/y', strtotime($outflow->created_at)) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white" style="background: #0D276B">
                        Action
                    </div>
                    <div class="card-footer bg-transparent">
                        <form action="{{ route('outflows.destroy', $outflow->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('outflows.index') }}" class="btn btn-lg btn-block btn-primary" style="padding-bottom: 0px; padding-top: 0px;">
                                <span class="btn-label"><i class="fa fa-chevron-left"></i></span>
                                Back
                            </a>
                            <a href="{{ route('outflows.edit', $outflow->id) }}" class="btn btn-lg btn-block btn-warning" style="padding-bottom: 0px; padding-top: 0px;">
                                <span class="btn-label btn-label-right"><i class="fa fa-edit"></i></span>
                                Edit
                            </a>
                            <button type="submit" class="btn btn-lg btn-block btn-danger" style="padding-bottom: 0px; padding-top: 0px;" onclick="return confirm('Are you sure you want to delete this item?');">
                                <span class="btn-label btn-label-right"><i class="fa fa-trash"></i></span>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
