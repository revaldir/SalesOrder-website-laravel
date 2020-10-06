@extends('layouts.user')

@section('title', 'Details of #' . $outflow->id)

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('user.outflows.index') }}">Outflow</a>
        </li>
        <li class="breadcrumb-item active">#{{ $outflow->id }} Details</li>
    </ol>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
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
                        @if(Auth::user()->name == $outflow->submitter)
                        <a href="{{ route('user.outflows.edit', $outflow->id) }}" class="btn btn-block btn-ghost-warning"><i class="cil-pencil"></i> Edit</a>
                        @endif
                        <a href="{{ route('user.outflows.index') }}" class="btn btn-block btn-ghost-primary"><i class="cil-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-footer text-white text-center font-weight-lighter" style="background: #0D276B">
                        Submitted by {{ $outflow->submitter }} at {{ date('H:i d/m/y', strtotime($outflow->created_at)) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
